<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessCategory;
use App\BusinessImage;
use App\Category;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Traits\ImageTrait;
use function GuzzleHttp\Psr7\str;

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
        $businesses = Business::where('display', true)
                    ->orderBy('priority', 'desc')
                    ->get();
        return response(view('business.index', [
            'businesses' => $businesses
        ]));
    }

    public function filter(Request $request)
    {
        $category = $request['category'];
        $category = Category::where('slug', '=', $category)->first();
        $businesses_categories = BusinessCategory::where('category_id', $category->id)->pluck('business_id');

        $year = 0;
        if ($request->has('year') && $request->query('year') != 0) {
            $year = $request->query('year');
            $businesses = Business::whereIn('id', $businesses_categories)
            //->whereYear('show_year', '<=', intval($year))
            //->whereYear('show_year', '>=', intval($year))
                ->whereYear('show_year_start', '<=', intval($year))
                ->whereYear('show_year_end', '>=', intval($year))
                ->where('display', true)
                ->orderBy('priority', 'desc')
                ->paginate(9);
        } else {
            $businesses = Business::whereIn('id', $businesses_categories)
                ->where('display', true)
                ->orderBy('priority', 'desc')
                ->paginate(9);
        }

        $minDate = Business::all()->min('show_year_start');
        $minYear = explode('-', $minDate)[0];

        $maxDate = Business::all()->max('show_year_end');
        $maxYear = explode('-', $maxDate)[0];
        //$maxYear = date('Y');

        $years = [];
        $years[0] = 'All';
        for ($i = $minYear; $i <= $maxYear; $i++) {
            $years[strval($i)] = intval($i);
        }

        return view('business.list', [
            'businesses' => $businesses,
            'category' => $category,
            'headingTranslate' => $this->category_translate[$category->slug],
            'years' => $years,
            'year' => $year
        ]);
    }

    public function status(Request $request)
    {
        $status = $request['status'];

        $heading_status = "";
        if ($status == "work_in_process") {
            $heading_status = "messages.status.workInProgress";
        }
        else if ($status == "complete") {
            $heading_status = "messages.status.complete";
        }


        $year = 0;
        if ($request->has('year') && $request->query('year') != 0) {
            $year = $request->query('year');
            $businesses = Business::where("status", "=", $status)
                //->whereYear('show_year', '<=', intval($year))
                //->whereYear('show_year', '>=', intval($year))
                ->whereYear('show_year_start', '<=', intval($year))
                ->whereYear('show_year_end', '>=', intval($year))
                ->where('display', true)
                ->orderBy('priority', 'desc')
                ->paginate(9);
        } else {
            $businesses = Business::where("status", "=", $status)
                ->where('display', true)
                ->orderBy('priority', 'desc')
                ->paginate(9);
        }

        $minDate = Business::all()->min('show_year_start');
        $minYear = explode('-', $minDate)[0];

        $maxDate = Business::all()->max('show_year_end');
        $maxYear = explode('-', $maxDate)[0];

        $years = [];
        $years[0] = 'All';
        for ($i = $minYear; $i <= $maxYear; $i++) {
            $years[strval($i)] = intval($i);
        }

        return view('business.list', [
            'businesses' => $businesses,
            'status' => $status,
            'headingTranslate' => $heading_status,
            'years' => $years,
            'year' => $year
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        $businesses = Business::where("name", "like", "%".$query."%")
                    ->orderBy('created_at', 'desc')
                    ->paginate(9)
                    ->appends(['query' => $query]);
        return view('dashboard', [
            'businesses' => $businesses,
            'clients' => [],
            'awards' => [],
            'careers' => [],
            'users' => [],
            'activeTab' => 'businesses',
            'inProgressCount' => null,
            'completeCount' => null,
            'search' => $query
        ]);
    }

    public function attemptSearch(Request $request)
    {
        $request = $request->all();
        $query = $request['query'];

        return redirect("/businesses/search?query=".$query);
    }

    public function sort()
    {
        $businesses = Business::orderBy('priority', 'desc')->get();
        return response(view('business.sort', [
            'businesses' => $businesses
        ]));
    }

    public function storeSort(Request $request)
    {
        $request = $request->all();
        $sortedBusinesses = $request['sorted'];

        $idString = str_replace('order[]=', '', $sortedBusinesses);
        $idString = str_replace('&', ' ', $idString);
        $idArr = explode(' ', $idString);

        $total = Business::all()->count();
        foreach ($idArr as $id) {
            $business = Business::find($id);
            $business->priority = $total;
            $business->save();
            $total--;
        }

        return redirect()->action("HomeController@dashboardBusinesses");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name', 'id');
        return response(view('business.create', [
            'status' => $this->status,
            'category' => $category
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
        $categories = $business['category'];
        $business['category'] = "";

        $totalBusiness = Business::all()->count();
        $business['priority'] = $totalBusiness + 1;

        $images = $business['images'];
        unset($business['images']);

        $business = Business::create($business);

        foreach ($categories as $category) {
			if(!empty($business) && !empty($category)) {
				$business_category = [
					'business_id' => $business->id,
					'category_id' => intval($category)
				];
				BusinessCategory::create($business_category);
			}
        }

//        if ($request->hasFile('images')) {
//            $files = $request->file('images');
//            foreach ($files as $file) {
//                $image = $this->storeImage($file, "");
//                $business_image = [
//                    'business_id' => $business->id,
//                    'image_id' => $image->id
//                ];
//                BusinessImage::create($business_image);
//            }
//        }

        $images_ids = explode(",", $images);
        foreach ($images_ids as $id) {
            // $image = Image::find($id);
			if(!empty($business) && !empty($id)) {
				$business_image = [
					'business_id' => $business->id,
					'image_id' => $id
				];
				BusinessImage::create($business_image);
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
        $business->categories();
        $category = Category::pluck('name', 'id');

        return view('business.edit', [
            'business' => $business,
            'status' => $this->status,
            'category' => $category
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

//        if ($request->hasFile('images')) {
//            BusinessImage::where('business_id', '=', $business->id)->delete();
//            $files = $request->file('images');
//            foreach ($files as $file) {
//                $image = $this->storeImage($file, "");
//                $business_image = [
//                    'business_id' => $business->id,
//                    'image_id' => $image->id
//                ];
//                BusinessImage::create($business_image);
//                Log::info("Store success here");
//            }
//        }
        $images = $updateBusiness['images'];
        unset($updateBusiness['images']);

        $edit_image = $updateBusiness['edit_image'];
        unset($updateBusiness['edit_image']);

        $images_ids = explode(",", $images);
        if ($edit_image == "True") {
            BusinessImage::where('business_id', '=', $business->id)->delete();

            if (!is_null($images)) {
                foreach ($images_ids as $id) {
                    $image = Image::find($id);
					if(!empty($business) && !empty($image)) {
						$business_image = [
							'business_id' => $business->id,
							'image_id' => $image->id
						];
						BusinessImage::create($business_image);
					}
                }
            }
        }

        BusinessCategory::where('business_id', '=', $business->id)->delete();
        $categories = $updateBusiness['category'];
        foreach ($categories as $category) {
            $business_category = [
                'business_id' => $business->id,
                'category_id' => intval($category)
            ];
            BusinessCategory::create($business_category);
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
        BusinessCategory::where('business_id', $id)->delete();

        $business = Business::findOrFail($id);
        $business->delete();

        return redirect()->action("HomeController@dashboardBusinesses");
    }
}
