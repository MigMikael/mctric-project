<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageTrait;

class BusinessController extends Controller
{
    use ImageTrait;
    public $status = [
        'on going' => 'On Going',
        'in process' => 'In Process',
        'complete' => 'Complete'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::all();
        return response(view('business.index', ['businesses' => $businesses]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('business.create', ['status' => $this->status]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $business = $request->all();
        $business['slug'] = str_replace(" ", "_", $business['name']);

        $image = $request->file('image');
        $image = $this->storeImage($image, "");
        $business['image'] = $image->id;

        Business::create($business);

        return redirect()->action("BusinessController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $business = Business::findOrFail($id);
        return view('business.show', ['business' => $business]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $business = Business::findOrFail($id);
        Log::info("Business");
        Log::info($business->name);

        return view('business.edit', ['business' => $business, 'status' => $this->status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $business = Business::findOrFail($id);
        $updateBusiness = $request->all();
        $updateBusiness['slug'] = str_replace(" ", "_", $updateBusiness['name']);

        $business->update($updateBusiness);
        return redirect()->action("BusinessController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $business = Business::findOrFail($id);
        $business->delete();

        return redirect()->action("BusinessController@index");
    }
}
