<?php

namespace App\Http\Controllers;

use App\Build;
use App\Hero;
use App\Http\Requests\SaveBuild;
use App\Map;
use App\Services\BuildService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBuildsController extends Controller
{
    function __construct(BuildService $buildService)
    {
        $this->buildService = $buildService;
    }

    function index(User $user, Request $request)
    {
        $heroArray = Hero::selectArray();
        $mapArray = Map::selectArray();

        $builds = $user->builds()
            ->filter($request)
            ->with('hero', 'user', 'maps')
            ->withRating()
            ->orderBy('avg_rating', 'desc')
            ->get();

        return view('user.build.index', compact('builds', 'heroArray', 'mapArray'));
    }

    function store(User $user, SaveBuild $request)
    {
        $build = new Build;
        $build->hero_id = $request->hero_id;
        $this->buildService->saveBuild($request, $build, Auth::user());
        return redirect()->route('build.show', compact('build'))->with("message", "Build has been created");
    }

    function delete(User $user, Build $build)
    {
        $this->buildService->deleteBuild($build);
        return redirect()->back()->with("message", "Build has been deleted");
    }

    function update(User $user, Build $build, SaveBuild $request)
    {
        $this->buildService->saveBuild($request, $build, Auth::user());
        return redirect()->route('build.show', compact('build'))->with("message", "Build has been updated");
    }
}
