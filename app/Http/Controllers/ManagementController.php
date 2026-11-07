<?php

namespace App\Http\Controllers;

use App\Management;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

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
            ->orderBy('created_at', 'desc')
            ->get();

        return view('award.index', [
            'manag$managements' => $managements
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

    public function create()
    {
        return response(view('management.create'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cropped_image' => 'required|string',
        ], [
            'cropped_image.required' => 'กรุณาอัปโหลดรูปโปรไฟล์และกดยืนยันการครอป',
            'cropped_image.string' => 'ข้อมูลรูปโปรไฟล์ไม่ถูกต้อง',
        ]);

        $management = $request->all();

        if ($request->get('cropped_image')) {
            $croppedImage = $request->get('cropped_image');

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

            // เขียนข้อมูลรูปลงไฟล์ชั่วคราวก่อน
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

            $image = $this->storeImage($file, '');
            $management['image_id'] = $image->id;
        }

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
        $updateManagement = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $this->storeImage($file, "");
            $updateManagement['image_id'] = $image->id;
        }

        $management->update($updateManagement);
        return redirect()->action("HomeController@dashboardManagements");
    }

    public function destroy($id)
    {
        $management = Management::findOrFail($id);
        $management->delete();

        return redirect()->action("HomeController@dashboardManagements");
    }
}
