<?php

namespace App\Http\Controllers;

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
        $article = News::where('display', true)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('news.show', ['article' => $article]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateArticle($request);
        $data = $this->saveCoverImage($request, $data);

        DB::transaction(function () use ($data) {
            // คอลัมน์ slug บังคับให้มีค่า แต่ยังไม่รู้ ID ก่อนสร้างข่าว
            $data['slug'] = 'pending-' . Str::uuid()->toString();

            $newsItem = News::create($data);

            $date = $newsItem->created_at->copy()
                ->timezone('Asia/Bangkok')
                ->format('Ymd');

            $newsItem->slug = $date . '-' . $newsItem->id;
            $newsItem->save();

            if (!$newsItem->save()) {
                throw new \RuntimeException('Unable to save the news slug.');
            }
        });

        return redirect()->action('HomeController@dashboardNews');
    }

    public function edit($id)
    {
        $article = News::findOrFail($id);

        return view('news.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = News::findOrFail($id);
        $data = $this->validateArticle($request, $article);
        $data = $this->saveCoverImage($request, $data);

        $article->update($data);

        return redirect()->action('NewsController@dashboard');
    }

    public function destroy($id)
    {
        $article = News::findOrFail($id);
        $article->delete();

        return redirect()->action('NewsController@dashboard');
    }

    private function validateArticle(Request $request, ?News $article = null)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string|required_if:display,1',
            'display' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120'
                . '|dimensions:max_width=4000,max_height=4000',
        ], [
            'content.required_if' => 'กรุณาระบุเนื้อหาก่อนเผยแพร่ข่าว',
        ]);

        $hasCover = $request->hasFile('cover_image')
            || ($article !== null && $article->cover_image_id !== null);

        if ((bool) $data['display'] && !$hasCover) {
            throw ValidationException::withMessages([
                'cover_image' => 'กรุณาเลือกรูปปกก่อนเผยแพร่ข่าว',
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
}
