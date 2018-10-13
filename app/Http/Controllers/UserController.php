<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = User::all();
        return 'yes';
    }

    function show(User $user){
        return view('user.show', compact('user'));
    }
}
