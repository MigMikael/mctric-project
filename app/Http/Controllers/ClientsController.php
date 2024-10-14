<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Log;

class ClientsController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clients = Clients::where('display', true)
                ->orderBy('created_at', 'asc')
                ->get();
        return view('client.index', ['clients' => $clients]);
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        $clients = Clients::where("name", "like", "%".$query."%")->paginate(9)
            ->appends(['query' => $query]);
        return view('dashboard', [
            'businesses' => [],
            'clients' => $clients,
            'awards' => [],
            'careers' => [],
            'users' => [],
            'activeTab' => 'clients',
            'inProgressCount' => null,
            'completeCount' => null,
            'search' => $query
        ]);
    }

    public function attemptSearch(Request $request)
    {
        $request = $request->all();
        $query = $request['query'];

        return redirect("/clients/search?query=".$query);
    }

    public function sort()
    {
        $clients = Clients::orderBy('priority', 'desc')->get();
        return response(view('client.sort', [
            'clients' => $clients
        ]));
    }

    public function storeSort(Request $request)
    {
        $request = $request->all();
        $sortedClients = $request['sorted'];

        $idString = str_replace('order[]=', '', $sortedClients);
        $idString = str_replace('&', ' ', $idString);
        $idArr = explode(' ', $idString);

        $total = Clients::all()->count();
        foreach ($idArr as $id) {
            $business = Clients::find($id);
            $business->priority = $total;
            $business->save();
            $total--;
        }

        return redirect()->action("HomeController@dashboardClients");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('client.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $client = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $this->storeImage($file, '');
            $client['image_id'] = $image->id;
        }
        $total = Clients::all()->count();
        $client['priority'] = $total + 1;

        Clients::create($client);
        return redirect()->action("HomeController@dashboardClients");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Clients::findOrFail($id);
        return view('client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $client = Clients::findOrFail($id);

        return view('client.edit', [
            'client' => $client
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
        $client = Clients::findOrFail($id);
        $updateClient = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $this->storeImage($file, "");
            $updateClient['image_id'] = $image->id;
        }

        $client->update($updateClient);
        return redirect()->action("HomeController@dashboardClients");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $client = Clients::findOrFail($id);
        $client->delete();

        return redirect()->action("HomeController@dashboardClients");
    }
}
