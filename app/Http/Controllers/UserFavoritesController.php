<?php

namespace App\Http\Controllers;

use App\Build;
use App\Hero;
use App\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFavoritesController extends Controller
{
    function index(Request $request)
    {
        $heroArray = Hero::selectArray();
        $mapArray = Map::selectArray();

        $builds = Auth::user()
            ->favorites()
            ->filter($request)
            ->groupBy('favorites.user_id')
            ->withRating()
            ->with('user', 'hero')
            ->paginate(20);

        Build::addFilterParameters($request, $builds);

        return view('build.index', compact('builds', 'heroArray', 'mapArray'));
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
