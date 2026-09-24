<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
// use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public function storeImage($file, $type)
    {
        //Log::info($file);

        /* old code
        $ex = $file->getClientOriginalExtension();

        $image_name = date('Ymd') . '_' . Str::random(10) . '.' . $ex;

        Storage::disk('local')->put($image_name, File::get($file));

        $fileRecord = [
            'name' => $image_name,
            'mime' => $file->getClientMimeType(),
            'original_name' => $file->getClientOriginalName(),
        ];

        $file = \App\Image::create($fileRecord);

        //$this->compress($file);
        //self::resizeImage($file, $type);

        return $file;
        */

        // 1. กำหนดชื่อไฟล์ใหม่โดยแปลงนามสกุลเป็น .webp เสมอ
        $image_name = date('Ymd') . '_' . Str::random(10) . '.webp';

        // 2. โหลดไฟล์และประมวลผลบีบอัดเป็น WebP (กำหนดคุณภาพที่ 80%)
        $compressed_image = Image::make($file);
        $encoded_image = $compressed_image->encode('webp', 80);

        // 3. บันทึกข้อมูลไบนารีลง Storage
        Storage::disk('local')->put($image_name, $encoded_image->getEncoded());

        $fileRecord = [
            'name' => $image_name,
            'mime' => 'image/webp',
            'original_name' => $file->getClientOriginalName(),
        ];

        $file = \App\Image::create($fileRecord);

        return $file;
    }

    public function compress($file)
    {
        $size = Storage::disk('local')->size($file->name);

        if (App::environment('local')) {
            //windows path
            $img_path = storage_path() . '\\app\\' . $file->name;
            $des_path = storage_path() . '\\app\\cp_' . $file->name;
        } else {
            //linux path
            $img_path = storage_path() . '/app/' . $file->name;
            $des_path = storage_path() . '/app/cp_' . $file->name;
        }

        if ($file->mime == 'image/jpeg')
            //$image = imagecreatefrompng($img_path);
            $image = imagecreatefromjpeg($img_path);

        elseif ($file->mime == 'image/gif')
            //$image = imagecreatefrompng($img_path);
            $image = imagecreatefromgif($img_path);

        elseif ($file->mime == 'image/png')
            $image = imagecreatefrompng($img_path);

        else return abort(500);

        if ($size > 10000000) { //         5 MB
            imagejpeg($image, $des_path, 10);
        } elseif ($size > 2000000) { //     2 MB
            imagejpeg($image, $des_path, 20);
        } elseif ($size > 1000000) { //     1 MB
            imagejpeg($image, $des_path, 25);
        } elseif ($size > 200000) { //      200 KB
            imagejpeg($image, $des_path, 50);
        } else {
            imagejpeg($image, $des_path, 80);
        }

        $file->name = 'cp_' . $file->name;
        $file->save();
    }

    public function resizeImage($file, $type)
    {
        $image = Storage::disk('local')->get($file->name);
        $old_filename = $file->name;

        if ($type == 'profile') {
            $width = '900';
            $height = $width;
        } elseif ($type == 'cover') {
            $width = '1920';
            $height = $width / 4 * 3;
        } else {
            // default value
            $width = '500';
            $height = $width;
        }

        $img = Image::make($image)->resize($width, $height);

        if (App::environment('local')) {
            //windows path
            $img->save(storage_path() . '\\app\\re_' . $file->name);
        } else {
            //linux path
            $img->save(storage_path() . '/app/re_' . $file->name);
        }

        $file->name = 're_' . $file->name;
        $file->save();

        // make image thumbnail
        $img = Image::make($image)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        if (App::environment('local')) {
            //windows path
            $img->save(storage_path() . '\\app\\thumb_' . $file->name);
        } else {
            //linux path
            $img->save(storage_path() . '/app/thumb_' . $file->name);
        }

        Storage::delete($old_filename);
    }
}
