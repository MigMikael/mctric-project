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

    public function dashboardSummary()
    {
        $inProgressCount = Business::where("status", "work_in_process")->count();
        $completeCount = Business::where("status", "complete")->count();
        return view('dashboard', [
            'businesses' => [],
            'clients' => [],
            'awards' => [],
            'careers' => [],
            'users' => [],
            'activeTab' => 'summary',
            'inProgressCount' => $inProgressCount,
            'completeCount' => $completeCount
        ]);
    }

    public function dashboardBusinesses()
    {
        $businesses = Business::paginate(6);
        return view('dashboard', [
            'businesses' => $businesses,
            'clients' => [],
            'awards' => [],
            'careers' => [],
            'users' => [],
            'activeTab' => 'businesses',
            'inProgressCount' => null,
            'completeCount' => null
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
            'inProgressCount' => null,
            'completeCount' => null
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
            'inProgressCount' => null,
            'completeCount' => null
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
            'inProgressCount' => null,
            'completeCount' => null
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
            'inProgressCount' => null,
            'completeCount' => null
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
