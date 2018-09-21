<?php

namespace App\Http\Controllers;

use App\Build;
use App\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBuildsController extends Controller
{
    function index()
    {
        $user = Auth::user();
        $user->builds = $user->builds()->with('hero')->get();
        return view('builds.index', compact('user'));
    }

    function store(Request $request)
    {
        $build = new Build;
        $build->fill(array_only($request->all(), ['title', 'description', 'hero_id']));
        $build->user_id = Auth::id();

        $build->save();
        $build->talents()->sync([$request->talent_1, $request->talent_2]);
    }

    function delete(Build $build)
    {

    }

    function update(Build $build)
    {

    }
}
