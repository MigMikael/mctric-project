<?php

namespace App\Http\Controllers;

use App\Careers;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class CareersController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Careers::all();
        return response(view('career.index', [
            'careers' => $careers
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('career.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $career = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $this->storeImage($file, "");
            $career['image_id'] = $image->id;
        }
        Careers::create($career);
        return redirect()->action("HomeController@dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $career = Careers::findOrFail($id);
        return view('career.show', ['career' => $career]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $career = Careers::findOrFail($id);

        return view('career.edit', [
            'career' => $career
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
        $career = Careers::findOrFail($id);
        $updateCareer = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $this->storeImage($file, '');
            $updateCareer['image_id'] = $image->id;
        }

        $career->update($updateCareer);
        return redirect()->action("HomeController@dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $career = Careers::findOrFail($id);
        $career->delete();

        return redirect()->action("HomeController@dashboard");
    }
}