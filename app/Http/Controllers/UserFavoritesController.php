<?php

namespace App\Http\Controllers;

use App\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoritesController extends Controller
{
    function index()
    {
        //do not need to add the favorite attributes because i know they are all favorite.
        $builds = Auth::user()->favorites()->with('user', 'hero')->get();
        return view('user.build.index', compact('builds'));
    }

    function store(Build $build)
    {
        Auth::user()->favorites()->syncWithoutDetaching($build); //prevents duplicates

        return redirect()->back()->with("message", "Build has been added to your favorites");
    }

    function delete(Build $build)
    {
        Auth::user()->favorites()->detach($build);
        return redirect()->back()->with("message", "Build has been removed from your favorites");
    }
}
