<?php

namespace App\Http\Controllers;

use App\Build;
use App\Hero;
use App\Services\BuildService;
use App\Talent;
use Illuminate\Http\Request;

class BuildsController extends Controller
{
    function __construct(BuildService $buildService)
    {
        $this->buildService = $buildService;
    }

    function index(Request $request){
        $roles = array_keys($request->only('assassin', 'specialist', 'warrior', 'support'));

        $builds = Build::when($roles || $request->get('search'), function($query){
            return $query->join('heroes', 'heroes.id', '=', 'builds.hero_id')
                ->join('users', 'users.id', '=', 'builds.user_id');
        })->search($request->get('search'))
            ->filterRole($roles)
            ->with('hero', 'user')
            ->select('builds.*')
            ->get();

        return view('build.index', compact('builds'));
    }

    function create(Hero $hero)
    {
        $hero->talents = $hero->talents->groupBy('level');
        return view('hero.build.create', compact('hero'));
    }

    function edit(Build $build){
        $hero = $build->hero()->with('abilities')->first();
        $hero->talents = $hero->talents()->orderBy('id')->get()->groupBy('level');
        $build->talents = $build->talents->groupBy('level');
        return view('build.edit', compact('hero', 'build'));
    }

    function show(Build $build)
    {
        $build = Build::where('id', $build->id)->with('comments.comments.comments.comments.comments')->first();
        $hero = $build->hero;
        $hero->talents = $hero->talents->groupBy('level');

        $build->talents = $build->talents->groupBy('level');
        return view('build.show', compact('build', 'hero'));
    }
}
