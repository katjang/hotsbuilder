<?php

namespace App\Http\Controllers;

use App\Build;
use App\Hero;
use App\Http\Requests\SaveBuild;
use App\Services\BuildService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBuildsController extends Controller
{
    function __construct(BuildService $buildService)
    {
        $this->buildService = $buildService;
    }

    function index()
    {
        $builds = $this->buildService->addFavoritesAttribute(Auth::user()->builds()->orderBy('id', 'desc')->with('hero')->get());
        return view('user.build.index', compact('builds'));
    }

    function store(SaveBuild $request)
    {
        $build = new Build;
        $build->hero_id = $request->hero_id;
        $this->buildService->saveBuild($request, $build, Auth::user());
        return redirect()->route('user.build.show', compact('build'))->with('status', 'Build has been created');
    }

    function delete(Build $build)
    {
        $build->delete();
        return redirect()->route('user.builds')->with('status', "Build has been deleted");
    }

    function update(Build $build, SaveBuild $request)
    {
        $this->buildService->saveBuild($request, $build, Auth::user());
        return redirect()->route('user.build.show', compact('build'))->with('status', 'Build has been updated');
    }

    function show(Build $build)
    {
        $hero = $build->hero()->with('abilities')->first();
        $hero->talents = $hero->talents()->orderBy('id')->get()->groupBy('level');
        $build->talents = $build->talents->groupBy('level');
        return view('user.build.show', compact('build', 'hero'));
    }
}
