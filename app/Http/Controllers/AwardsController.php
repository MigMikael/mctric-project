<?php

namespace App\Http\Controllers;

use App\Awards;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class AwardsController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $awards = Awards::where('display', true)
            ->orderBy('priority', 'desc')
            ->get();
        return view('award.index', ['awards' => $awards]);
    }

    public function search(Request $request)
    {
        $request = $request->all();
        $query = $request['query'];
        $awards = Awards::where("name", "like", "%".$query."%")->paginate(9);
        return view('dashboard', [
            'businesses' => [],
            'clients' => [],
            'awards' => $awards,
            'careers' => [],
            'users' => [],
            'activeTab' => 'awards',
            'inProgressCount' => null,
            'completeCount' => null,
            'search' => $query
        ]);
    }

    public function sort()
    {
        $awards = Awards::orderBy('priority', 'desc')->get();
        return response(view('award.sort', [
            'awards' => $awards
        ]));
    }

    public function storeSort(Request $request)
    {
        $request = $request->all();
        $sortedAwards = $request['sorted'];

        $idString = str_replace('order[]=', '', $sortedAwards);
        $idString = str_replace('&', '', $idString);
        $idArr = str_split($idString);

        $total = Awards::all()->count();
        foreach ($idArr as $id) {
            $business = Awards::find($id);
            $business->priority = $total;
            $business->save();
            $total--;
        }

        return redirect()->action("HomeController@dashboardAwards");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('award.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $award = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $this->storeImage($file, '');
            $award['image_id'] = $image->id;
        }
        $total = Awards::all()->count();
        $award['priority'] = $total + 1;

        Awards::create($award);
        return redirect()->action("HomeController@dashboardAwards");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Awards  $awards
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $award = Awards::findOrFail($id);
        return view('award.show', ['award' => $award]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $award = Awards::findOrFail($id);

        return view('award.edit', [
            'award' => $award
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
        $award = Awards::findOrFail($id);
        $updateAward = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $this->storeImage($file, "");
            $updateAward['image_id'] = $image->id;
        }

        $award->update($updateAward);
        return redirect()->action("HomeController@dashboardAwards");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Awards  $awards
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $award = Awards::findOrFail($id);
        $award->delete();

        return redirect()->action("HomeController@dashboardAwards");
    }
}
