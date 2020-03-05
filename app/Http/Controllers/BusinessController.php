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
        'on_going' => 'On Going',
        'in_process' => 'In Process',
        'complete' => 'Complete'
    ];

    public $category = [
        'mechanical_electrical_services_plumbing_services' => 'Mechanical & Electrical Services & Plumbing Services (MEP)',
        'civil_construction' => 'Civil & Construction',
        'utility_pipeline' => 'Utility Pipeline',
        'renew_energy' => 'Renew Energy',
        'supply_chain_automation_systems' => 'Supply Chain Automation Systems'
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

    public function filter($category)
    {
        Log::info("Category");
        Log::info($category);
        $businesses = Business::where("category", "=", $category)->get();
        return view('business.list', [
            'businesses' => $businesses,
            'category' => $this->category[$category]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('business.create', [
            'status' => $this->status,
            'category' => $this->category
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
     * @param \App\Business $business
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

        return view('business.edit', [
            'business' => $business,
            'status' => $this->status,
            'category' => $this->category
        ]);
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
        return redirect()->action("BusinessController@filter", ['category' => $business->category]);
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
