<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show(User $user){
        $builds = $user->builds()->with('user', 'hero')->orderBy('updated_at', 'desc')->limit(5)->get();
        return view('user.show', compact('user', 'builds'));
    }
}
