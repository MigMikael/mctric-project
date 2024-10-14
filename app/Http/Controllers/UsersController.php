<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Log;

class UsersController extends Controller
{
    //
    public function create()
    {
        return response(view('user.create'));
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        $users = User::where("name", "like", "%".$query."%")
                ->orWhere("email", "like", "%".$query."%")
                ->orderBy('created_at', 'desc')
                ->paginate(9)
                ->appends(['query' => $query]);
        return view('dashboard', [
            'businesses' => [],
            'clients' => [],
            'awards' => [],
            'careers' => [],
            'users' => $users,
            'activeTab' => 'users',
            'inProgressCount' => null,
            'completeCount' => null,
            'search' => $query
        ]);
    }

    public function attemptSearch(Request $request)
    {
        $request = $request->all();
        $query = $request['query'];

        return redirect("/users/search?query=".$query);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $user = $request->all();
        User::create($user);

        return redirect()->action("HomeController@dashboardUsers");
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'min:0|same:password_confirmation',
            'password_confirmation' => 'min:0'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if($request->has('password')){
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        return redirect()->action("HomeController@dashboardUsers");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->action("HomeController@dashboardUsers");
    }
}
