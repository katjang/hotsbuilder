<?php

namespace App\Http\Controllers;

use App\Build;
use App\Hero;
use App\Http\Requests\SaveBuild;
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
        $roles = array_keys($request->only('assassin', 'specialist', 'warrior', 'support'));

        $builds = $user->builds()->when($roles || $request->get('search'), function($query){
            return $query->join('heroes', 'heroes.id', '=', 'builds.hero_id')
                ->join('users', 'users.id', '=', 'builds.user_id');
        })->search($request->get('search'))
            ->filterRole($roles)
            ->with('hero', 'user')
            ->select('builds.*')
            ->get();

        return view('user.build.index', compact('builds'));
    }

    function store(SaveBuild $request)
    {
        $build = new Build;
        $build->hero_id = $request->hero_id;
        $this->buildService->saveBuild($request, $build, Auth::user());
        return redirect()->route('build.show', compact('build'))->with("message", "Build has been created");
    }

    function delete(Build $build)
    {
        $build->users()->detach();
        $build->delete();
        return redirect()->back()->with("message", "Build has been deleted");
    }

    function update(Build $build, SaveBuild $request)
    {
        $this->buildService->saveBuild($request, $build, Auth::user());
        return redirect()->route('build.show', compact('build'))->with("message", "Build has been updated");
    }
}
