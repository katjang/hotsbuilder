<?php

namespace App\Http\Controllers;

use App\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoritesController extends Controller
{
    function index()
    {
        $builds = Auth::user()->favorites;
        return view('user.builds', compact('builds'));
    }

    function store(Build $build)
    {
        Auth::user()->favorites()->syncWithoutDetaching($build); //prevents duplicates
        return redirect()->back()->with(['status' => 'Build has been added to your favorites']);
    }

    function delete(Build $build)
    {
        Auth::user()->favorites()->detach($build);
        return redirect()->back()->with(['status' => 'Build has been removed from your favorites']);
    }
}