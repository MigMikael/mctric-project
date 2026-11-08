<?php

namespace App\Http\Controllers;

use App\Image;
use App\News;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $articles = News::where('display', true)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(9);

        return view('news.index', ['articles' => $articles]);
    }

    public function search(Request $request)
    {
        $query = $request->query('query');

        $news = News::where("title", "like", "%" . $query . "%")
            ->paginate(9)
            ->appends(['query' => $query]);

        return view('dashboard', [
            'businesses' => [],
            'clients' => [],
            'awards' => [],
            'careers' => [],
            'users' => [],
            'managements' => [],
            'news' => $news,
            'activeTab' => 'news',
            'inProgressCount' => null,
            'completeCount' => null,
            'search' => $query
        ]);
    }

    public function attemptSearch(Request $request)
    {
        $request = $request->all();
        $query = $request['query'];

        return redirect("/news/search?query=" . $query);
    }

    public function show($slug)
    {
        $newsItem = News::where('display', true)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('news.show', ['newsItem' => $newsItem]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateNews($request);
        $data = $this->saveCoverImage($request, $data);

        DB::transaction(function () use ($data) {
            // คอลัมน์ slug บังคับให้มีค่า แต่ยังไม่รู้ ID ก่อนสร้างข่าว
            $data['slug'] = 'pending-' . Str::uuid()->toString();

            $newsItem = News::create($data);

            $date = $newsItem->created_at->copy()
                ->timezone('Asia/Bangkok')
                ->format('Ymd');

            $newsItem->slug = $date . '-' . $newsItem->id;
            $createNewsResult = $newsItem->save();

            if (!$createNewsResult) {
                throw new \RuntimeException('Unable to save the news slug.');
            }
        });

        return redirect()->action('HomeController@dashboardNews');
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);

        return view('news.edit', ['newsItem' => $newsItem]);
    }

    public function update(Request $request, $id)
    {
        $newsItem = News::findOrFail($id);

        $oldCoverImageId = $newsItem->cover_image_id;

        $data = $this->validateNews($request, $newsItem);
        $data = $this->saveCoverImage($request, $data);

        $coverChanged = isset($data['cover_image_id'])
            && (string) $data['cover_image_id'] !== (string) $oldCoverImageId;

        $updateNewsResult  = $newsItem->update($data);

        if (!$updateNewsResult) {
            return back()->withErrors(['update' => 'อัปเดตข่าวไม่สำเร็จ']);
        }

        if ($coverChanged && $oldCoverImageId !== null) {
            $this->deleteImageIfUnused($oldCoverImageId);
        }

        return redirect()->action('HomeController@dashboardNews');
    }

    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);

        $imageIds = $this->contentImageIds($newsItem->content);

        if ($newsItem->cover_image_id !== null) {
            $imageIds[] = (string) $newsItem->cover_image_id;
        }

        if (!$newsItem->delete()) {
            return back()->withErrors([
                'delete' => 'ลบข่าวไม่สำเร็จ',
            ]);
        }

        foreach (array_unique($imageIds) as $imageId) {
            $this->deleteImageIfUnused($imageId);
        }

        return redirect()->action('HomeController@dashboardNews');
    }

    private function validateNews(Request $request, ?News $article = null)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'display' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120'
                . '|dimensions:max_width=4000,max_height=4000',
        ], [
            'content.required' => 'กรุณาระบุเนื้อหาข่าว',
        ]);

        $hasCover = $request->hasFile('cover_image')
            || ($article !== null && $article->cover_image_id !== null);

        if (!$hasCover) {
            throw ValidationException::withMessages([
                'cover_image' => 'กรุณาเลือกรูปปกข่าว',
            ]);
        }

        unset($data['cover_image']);

        return $data;
    }

    private function saveCoverImage(Request $request, array $data)
    {
        if ($request->hasFile('cover_image')) {
            $image = $this->storeImage($request->file('cover_image'), '');
            $data['cover_image_id'] = $image->id;
        }

        return $data;
    }

    public function uploadContentImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png|max:5120'
                . '|dimensions:max_width=4000,max_height=4000',
        ]);

        $image = $this->storeImage($request->file('file'), '');

        return response()->json([
            'location' => url('image/show/' . $image->id),
        ], 201);
    }

    private function contentImageIds(?string $content): array
    {
        if ($content === null || trim($content) === '') {
            return [];
        }

        $document = new \DOMDocument();

        $loaded = $document->loadHTML(
            '<?xml encoding="UTF-8">' . $content,
            LIBXML_NONET | LIBXML_NOERROR | LIBXML_NOWARNING
        );

        if (!$loaded) {
            return [];
        }

        $imageBase = parse_url(url('image/show'));
        $basePath = rtrim($imageBase['path'], '/');
        $pattern = '~^' . preg_quote($basePath, '~') . '/([1-9][0-9]*)$~';
        $ids = [];

        foreach ($document->getElementsByTagName('img') as $tag) {
            $url = parse_url(trim($tag->getAttribute('src')));

            if ($url === false || !isset($url['path'])) {
                continue;
            }

            if (
                isset($url['scheme']) &&
                !in_array(strtolower($url['scheme']), ['http', 'https'], true)
            ) {
                continue;
            }

            if (
                isset($url['host']) &&
                strcasecmp($url['host'], $imageBase['host']) !== 0
            ) {
                continue;
            }

            if (preg_match($pattern, $url['path'], $matches)) {
                $ids[] = $matches[1];
            }
        }

        return array_values(array_unique($ids));
    }

    private function deleteImageIfUnused($imageId)
    {
        $image = Image::find($imageId);

        if (!$image) {
            return;
        }

        $fileName = $image->name;

        if ($image->delete()) {
            \Illuminate\Support\Facades\Storage::disk('local')->delete($fileName);
        }
    }
}
