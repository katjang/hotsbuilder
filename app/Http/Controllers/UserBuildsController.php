<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBuildsController extends Controller
{
    function index()
    {
        $builds = Auth::user()->builds;
        return view('', compact('builds'));
    }

    function store()
    {

    }

    function delete()
    {

    }

    function update()
    {

    }
}
