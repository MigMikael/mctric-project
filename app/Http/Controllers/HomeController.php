<?php

namespace App\Http\Controllers;

use App\Business;
use App\Careers;
use App\Clients;
use App\Awards;
use App\User;
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
        $careers = Careers::all();
        return view('home', [
            'clients' => $clients,
            'awards' => $awards,
            'careers' => $careers
        ]);
    }

    public function dashboard()
    {
        $businesses = Business::paginate(6);
        $clients = Clients::paginate(9);
        $awards = Awards::paginate(9);
        $careers = Careers::paginate(9);
        $users = User::all();
        return view('dashboard', [
            'businesses' => $businesses,
            'clients' => $clients,
            'awards' => $awards,
            'careers' => $careers,
            'users' => $users,
        ]);
    }

    public function dashboardBusiness()
    {
        $businesses = Business::paginate(6);
        return view('dashboard', [
            'businesses' => $businesses,
            'clients' => [],
            'awards' => [],
            'careers' => [],
            'users' => [],
            'activeTab' => 'businesses',
        ]);
    }

    public function dashboardCareers()
    {
        $careers = Careers::paginate(9);
        return view('dashboard', [
            'businesses' => [],
            'clients' => [],
            'awards' => [],
            'careers' => $careers,
            'users' => [],
            'activeTab' => 'careers',
        ]);
    }

    public function dashboardClients()
    {
        $clients = Clients::paginate(9);
        return view('dashboard', [
            'businesses' => [],
            'clients' => $clients,
            'awards' => [],
            'careers' => [],
            'users' => [],
            'activeTab' => 'clients',
        ]);
    }

    public function dashboardAwards()
    {
        $awards = Awards::paginate(9);
        return view('dashboard', [
            'businesses' => [],
            'clients' => [],
            'awards' => $awards,
            'careers' => [],
            'users' => [],
            'activeTab' => 'awards',
        ]);
    }

    public function dashboardUsers()
    {
        $users = User::all();
        return view('dashboard', [
            'businesses' => [],
            'clients' => [],
            'awards' => [],
            'careers' => [],
            'users' => $users,
            'activeTab' => 'users',
        ]);
    }

    public function about()
    {
        $clients = Clients::all();
        $awards = Awards::all();
        return view('about', [
            'clients' => $clients,
            'awards' => $awards,
        ]);
    }
}
