<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function create()
    {
        return response(view('user.create'));
    }

    public function store(Request $request)
    {
        # Todo Validate Password
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
        # Todo Change Password Sequence
        $user = User::findOrFail($id);
        $updateUser = $request->all();

        $user->update($updateUser);
        return redirect()->action("HomeController@dashboardUsers");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->action("HomeController@dashboardUsers");
    }
}
