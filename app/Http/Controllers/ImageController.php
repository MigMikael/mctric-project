<?php

namespace App\Http\Controllers;

use App\Business;
use App\Image;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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

        $ret= array();
        foreach ($images as $image) {
            $path = Storage::disk('local')->path($image->name);
            $details = array();
            $details['name']=$image->original_name;
            $details['path']=url('/image/show/'.$image->id);
            $details['size']=filesize($path);
            $details['id']=$image->id;
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
        $details['name']=$image->original_name;
        $details['path']=url('/image/show/'.$image->id);
        $details['size']=filesize($path);
        $details['id']=$image->id;

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
        $image = Image::findOrFail($id);
        $file = Storage::disk('local')->get($image->name);

        return response($file, 200)->header('Content-type', $image->mime);
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
