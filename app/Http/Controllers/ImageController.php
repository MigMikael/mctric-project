<?php

namespace App\Http\Controllers;

use App\Business;
use App\Image;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function preload($id)
    {
        $business = Business::find($id);
        $images = $business->images;

        $ret = array();
        foreach ($images as $image) {
            $path = Storage::disk('local')->path($image->name);
            $details = array();
            $details['name'] = $image->original_name;
            $details['path'] = url('/image/show/' . $image->id);
            $details['size'] = filesize($path);
            $details['id'] = $image->id;
            $ret[] = $details;
        }
        return response(json_encode($ret), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $image = $this->storeImage($file, "");
        $path = Storage::disk('local')->path($image->name);
        $details = array();
        $details['name'] = $image->original_name;
        $details['path'] = url('/image/show/' . $image->id);
        $details['size'] = filesize($path);
        $details['id'] = $image->id;

        return response(json_encode($details), 200)->header('Content-Type', 'application/json');
    }

    public function deleteImage(Request $request)
    {
        $id = $request->get("id");
        $op = $request->get("op");
        Log::info($id);
        Log::info($op);
        if ($op == "delete") {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function show($id)
    {
        /* เก่ามาก ไม่ใช้แล้ว
        $image = Image::findOrFail($id);
        $file = Storage::disk('local')->get($image->name);

        return response($file, 200)->header('Content-type', $image->mime);
        */

        /* ใช้ก่อนหน้านี้
        $image = Image::findOrFail($id);
        $disk = Storage::disk('local');

        if (!$disk->exists($image->name)) {
            abort(404);
        }

        return response()->file(
            $disk->path($image->name),
            [
                'Content-Type' => $image->mime,
                'Cache-Control' => 'public, max-age=86400',
            ]
        );
        */

        // 1. ดึงเฉพาะ column ที่ต้องใช้ และใช้ DB Query Builder เพื่อลด Eloquent Overhead
        $image = DB::table('images')
            ->select('name', 'mime', 'updated_at')
            ->where('id', $id)
            ->first();

        if (!$image) {
            abort(404);
        }

        $disk = Storage::disk('local');
        //$path = $disk->path($image->name);

        // ป้องกันชื่อไฟล์ใน DB มี path traversal แอบแฝง
        $safeFilename = basename($image->name);
        $path = $disk->path($safeFilename);

        // เลี่ยงการเรียก $disk->exists() ถ้าใช้ file_exists ของ native PHP จะเร็วกว่า
        if (!file_exists($path)) {
            abort(404);
        }

        // 2. ตรวจสอบ ETag เพื่อคืน 304 ทันทีถ้าไฟล์ไม่มีการเปลี่ยนแปลง
        // (ใช้ hash จากชื่อไฟล์ + เวลาแก้ไขล่าสุด)
        $lastModified = filemtime($path);
        $etag = '"' . md5($image->name . $lastModified) . '"';

        $clientEtag = request()->header('If-None-Match');
        $clientModifiedSince = request()->header('If-Modified-Since');

        if ($clientEtag === $etag || ($clientModifiedSince && strtotime($clientModifiedSince) >= $lastModified)) {
            return response('', 304, [
                'Cache-Control' => 'public, max-age=604800, immutable',
                'ETag' => $etag,
                'Last-Modified' => gmdate('D, d M Y H:i:s', $lastModified) . ' GMT',
            ]);
        }

        // 3. ส่งไฟล์พร้อม Header แคชระยะยาว (เช่น 7 วัน)
        return response()->file(
            $path,
            [
                'Content-Type' => $image->mime,
                'Cache-Control' => 'public, max-age=604800, immutable',
                'ETag' => $etag,
                'Last-Modified' => gmdate('D, d M Y H:i:s', $lastModified) . ' GMT',
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
