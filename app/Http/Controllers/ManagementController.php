<?php

namespace App\Http\Controllers;

use App\Image;
use App\Management;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $managements = Management::where('display', true)
            ->orderBy('priority', 'asc')
            ->get();

        return view('managements.index', [
            'managements' => $managements
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->query('query');

        $managements = Management::when($query, function ($q) use ($query) {
            $q->where(function ($sub) use ($query) {
                $sub->where('first_name', 'like', "%{$query}%")
                    ->orWhere('last_name', 'like', "%{$query}%")
                    ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$query}%"]);
            });
        })
            ->paginate(9)
            ->appends(['query' => $query]);

        return view('dashboard', [
            'businesses' => [],
            'clients' => [],
            'awards' => [],
            'careers' => [],
            'users' => [],
            'managements' => $managements,
            'activeTab' => 'managements',
            'inProgressCount' => null,
            'completeCount' => null,
            'search' => $query
        ]);
    }

    public function attemptSearch(Request $request)
    {
        $request = $request->all();
        $query = $request['query'];

        return redirect("/managements/search?query=" . $query);
    }

    public function sort()
    {
        $managements = Management::orderBy('priority', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return response(view('management.sort', [
            'managements' => $managements
        ]));
    }

    public function storeSort(Request $request)
    {
        $data = $request->validate([
            'order' => 'required|array|min:1',
            'order.*' => 'required|integer|min:1|distinct',
        ]);

        // เทียบ ID เป็นข้อความเหมือนกันทั้งสองฝั่ง
        $orderedIds = array_map('strval', array_values($data['order']));

        DB::transaction(function () use ($orderedIds) {
            $managements = Management::orderBy('id')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            $currentIds = array_map('strval', $managements->keys()->all());

            if (
                count($orderedIds) !== count($currentIds) ||
                array_diff($currentIds, $orderedIds) ||
                array_diff($orderedIds, $currentIds)
            ) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'order' => 'จำนวนคณะกรรมการเปลี่ยนแปลงไป กรุณาลองใหม่อีกครั้ง',
                ]);
            }

            foreach ($orderedIds as $index => $id) {
                $management = $managements->get($id);
                $management->priority = $index + 1;

                if (!$management->save()) {
                    throw new \RuntimeException('ไม่สามารถบันทึกการจัดลำดับได้ กรุณาลองใหม่อีกครั้ง');
                }
            }
        });

        return redirect()->action('HomeController@dashboardManagements');
    }

    public function create()
    {
        return response(view('management.create'));
    }

    public function store(Request $request)
    {
        $management = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'display' => 'required|boolean',
            'cropped_image' => 'required|string',
        ], [
            'cropped_image.required' => 'กรุณาอัปโหลดรูปโปรไฟล์',
            'cropped_image.string' => 'ข้อมูลรูปโปรไฟล์ไม่ถูกต้อง',
        ]);

        $croppedImage = $management['cropped_image'];
        unset($management['cropped_image']);

        $image = $this->storeCropperImage($croppedImage);
        $management['image_id'] = $image->id;

        $management['priority'] = (int) Management::max('priority') + 1;

        Management::create($management);

        return redirect()->action("HomeController@dashboardManagements");
    }

    public function show($id)
    {
        $management = Management::findOrFail($id);
        return view('management.show', ['management' => $management]);
    }

    public function edit($id)
    {
        $management = Management::findOrFail($id);

        return view('management.edit', [
            'management' => $management
        ]);
    }

    public function update(Request $request, $id)
    {
        $management = Management::findOrFail($id);

        $updateManagement = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'display' => 'required|boolean',
            'cropped_image' => 'nullable|string',
        ]);

        $croppedImage = $updateManagement['cropped_image'] ?? null;
        unset($updateManagement['cropped_image']);

        $oldImageId = null;

        if ($croppedImage !== null && $croppedImage !== '') {
            $oldImageId = $management->image_id;
            $image = $this->storeCropperImage($croppedImage);
            $updateManagement['image_id'] = $image->id;
        }

        $updateManagementResult = $management->update($updateManagement);

        if ($updateManagementResult && $oldImageId !== null) {
            $this->deleteImageIfUnused($oldImageId);
        }

        return redirect()->action('HomeController@dashboardManagements');
    }

    public function destroy($id)
    {
        $management = Management::findOrFail($id);
        $oldImageId = $management->image_id;

        $deleteManagementResult = $management->delete();

        if ($deleteManagementResult && $oldImageId !== null) {
            $this->deleteImageIfUnused($oldImageId);
        }

        return redirect()->action('HomeController@dashboardManagements');
    }

    private function storeCropperImage(string $croppedImage)
    {
        $parts = explode(',', $croppedImage, 2);

        $binary = isset($parts[1])
            ? base64_decode($parts[1], true)
            : false;

        $imageInfo = $binary !== false
            ? @getimagesizefromstring($binary)
            : false;

        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ];

        if (
            $imageInfo === false ||
            !isset($extensions[$imageInfo['mime']])
        ) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'cropped_image' => 'ข้อมูลรูปภาพไม่ถูกต้อง',
            ]);
        }

        $mime = $imageInfo['mime'];
        $fileName = 'management-profile.' . $extensions[$mime];
        $temporaryPath = tempnam(sys_get_temp_dir(), 'management_');

        if ($temporaryPath === false) {
            throw new \RuntimeException('Unable to create temporary image.');
        }

        try {
            if (file_put_contents($temporaryPath, $binary) !== strlen($binary)) {
                throw new \RuntimeException('Unable to write temporary image.');
            }

            $file = new \Illuminate\Http\UploadedFile(
                $temporaryPath,
                $fileName,
                $mime,
                UPLOAD_ERR_OK,
                true
            );

            return $this->storeImage($file, '');
        } finally {
            if (is_file($temporaryPath)) {
                unlink($temporaryPath);
            }
        }
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
