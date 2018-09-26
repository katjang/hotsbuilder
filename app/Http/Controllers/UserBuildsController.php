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
        $builds = Auth::user()->builds()->with('hero')->get();
        return view('user.builds', compact('builds'));
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'hero_id' => 'required|integer|exists:heroes,id',
            'talent_1' => 'required|integer|exists:talents,id',
            'talent_2' => 'required|integer|exists:talents,id',
            'talent_3' => 'required|integer|exists:talents,id',
            'talent_4' => 'required|integer|exists:talents,id',
            'talent_5' => 'required|integer|exists:talents,id',
            'talent_6' => 'required|integer|exists:talents,id',
            'talent_7' => 'required|integer|exists:talents,id',
        ]);

        $build = new Build;
        $build->fill(array_only($request->all(), ['title', 'description', 'hero_id']));
        $build->user_id = Auth::id();

        $build->save();
        $build->talents()->sync([
            $request->talent_1,
            $request->talent_2,
            $request->talent_3,
            $request->talent_4,
            $request->talent_5,
            $request->talent_6,
            $request->talent_7
        ]);

        return redirect('user.builds')->with('status', 'Build has been submitted');
    }

    function delete(Build $build)
    {
        $build->delete();
        return redirect()->route('user.builds')->with('status', "Build has been deleted");
    }

    function update(Build $build)
    {

    }
}
