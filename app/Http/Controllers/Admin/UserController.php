<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request)
    {
        $users = User::search($request->get('search'))->orderBy('role', 'desc')->paginate(10);
        $roles = UserRole::getRoles();

        return view('admin.users', compact('users', 'roles'));
    }

    function update(Request $request, User $user)
    {
        $this->validate($request, [
            'role' => 'required|integer|in:'.implode(',', array_keys(UserRole::getRoles()))
        ]);
        $user->fill($request->except('role'));
        $user->role = $request->get('role');
        $user->save();

        return redirect()->back()->with('message', 'Updated user: '. $user->name);
    }
}
