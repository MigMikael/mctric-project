<?php

namespace App\Http\Controllers;

use App\Business;
use App\Clients;
use App\Awards;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Clients::all();
        $awards = Awards::all();
        return view('home', [
            'clients' => $clients,
            'awards' => $awards
        ]);
    }

    public function dashboard()
    {
        $businesses = Business::all();
        $clients = Clients::all();
        $awards = Awards::all();
        return view('dashboard', [
            'businesses' => $businesses,
            'clients' => $clients,
            'awards' => $awards
        ]);
    }
}
