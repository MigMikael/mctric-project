<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function create()
    {
        return response(view('user.create'));
    }

    public function search(Request $request)
    {
        $query = $request->query('query');

        $users = User::where("name", "like", "%" . $query . "%")
            ->orWhere("email", "like", "%" . $query . "%")
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

        return redirect("/users/search?query=" . $query);
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user['password'] = Hash::make($user['password']);

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
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->filled('password')) {
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
