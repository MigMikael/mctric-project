<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageTrait;

class BusinessController extends Controller
{
    use ImageTrait;
    public $status = [
        'work_in_process' => 'Work In Process',
        'complete' => 'Complete'
    ];

    public $status_translate = [
        'work_in_process' => 'messages.status.workInProgress',
        'complete' => 'messages.status.complete'
    ];

    public $category = [
        'mechanical_electrical_services_plumbing_services' => 'Mechanical & Electrical Services & Plumbing Services (MEP)',
        'civil_construction' => 'Civil & Construction',
        'utility_pipeline' => 'Utility Pipeline',
        'renew_energy' => 'Renew Energy',
        'supply_chain_automation_systems' => 'Supply Chain Automation Systems',
        'joint_venture_project' => 'Joint Venture Project'
    ];

    public $category_translate = [
        'mechanical_electrical_services_plumbing_services' => 'messages.business.mechanicalMenu',
        'civil_construction' => 'messages.business.civilMenu',
        'utility_pipeline' => 'messages.business.utilityMenu',
        'renew_energy' => 'messages.business.renewableMenu',
        'supply_chain_automation_systems' => 'messages.business.supplyMenu',
        'joint_venture_project' => 'messages.business.jointVentureProject'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::where('display', true)->get();
        return response(view('business.index', [
            'businesses' => $businesses
        ]));
    }

    public function filter($category)
    {
        $businesses = Business::where("category", "=", $category)->where('display', true)->paginate(6);
        return view('business.list', [
            'businesses' => $businesses,
            'category' => $this->category[$category],
            'headingTranslate' => $this->category_translate[$category]
        ]);
    }

    public function status($status)
    {
        $businesses = Business::where("status", "=", $status)->where('display', true)->paginate(6);
        return view('business.list', [
            'businesses' => $businesses,
            'status' => $this->status[$status],
            'headingTranslate' => $this->status_translate[$status]
        ]);
    }

    public function search(Request $request)
    {
        $request = $request->all();
//        Log::info("Query", $request);

        $query = $request['query'];
        $businesses = Business::where("name", "like", "%".$query."%")->where('display', true)->paginate(6);
        return view('business.list', [
            'businesses' => $businesses,
//            'status' => $this->status[$status],
            'headingTranslate' => "Search : ". $query
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

        $file = $request->file('cover_image');
        $cover_image = $this->storeImage($file, "");
        $business['cover_image'] = $cover_image->id;

        $business = Business::create($business);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $image = $this->storeImage($file, "");
                $business_image = [
                    'business_id' => $business->id,
                    'image_id' => $image->id
                ];
                BusinessImage::create($business_image);
                # Log::info("Store success here");
            }
        }

        //return redirect()->action("BusinessController@filter", ['category' => $business->category]);
        return redirect()->action("HomeController@dashboardBusinesses");
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
        $business->images;

        //return $business;
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

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $cover_image = $this->storeImage($file, '');
            $updateBusiness['cover_image'] = $cover_image->id;
        }

        if ($request->hasFile('images')) {
            BusinessImage::where('business_id', '=', $business->id)->delete();
            $files = $request->file('images');
            foreach ($files as $file) {
                $image = $this->storeImage($file, "");
                $business_image = [
                    'business_id' => $business->id,
                    'image_id' => $image->id
                ];
                BusinessImage::create($business_image);
                Log::info("Store success here");
            }
        }

        $business->update($updateBusiness);
        //return redirect()->action("BusinessController@filter", ['category' => $business->category]);
        return redirect()->action("HomeController@dashboardBusinesses");
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

        return redirect()->action("HomeController@dashboardBusinesses");
    }
}
