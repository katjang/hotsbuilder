<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show(User $user){
        return view('user.show', compact('user'));
    }
}
