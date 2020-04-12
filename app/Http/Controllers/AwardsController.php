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
        $awards = Awards::all();
        return view('award.index', ['awards' => $awards]);
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
        $file = $request->file('image');
        $image = $this->storeImage($file, '');
        $award['image_id'] = $image->id;

        Awards::create($award);
        return redirect()->action("HomeController@dashboard");
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
        return redirect()->action("HomeController@dashboard");
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

        return redirect()->action("HomeController@dashboard");
    }
}
