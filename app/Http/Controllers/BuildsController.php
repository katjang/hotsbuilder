<?php

namespace App\Http\Controllers;

use App\Build;
use App\Hero;
use App\Map;
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

        $heroArray = Hero::selectArray();
        $mapArray = Map::selectArray();

        $builds = Build::filter($request)
            ->with('hero', 'user', 'maps')
            ->withRating()
            ->orderBy('avg_rating', 'desc')
            ->paginate(20);

        Build::addFilterParameters($request, $builds);

        return view('build.index', compact('builds', 'heroArray', 'mapArray'));
    }

    function create(Hero $hero)
    {
        $hero->talents = $hero->talents->groupBy('level');
        $maps = Map::all();
        return view('hero.build.create', compact('hero', 'maps'));
    }

    function edit(Build $build){
        $hero = $build->hero()->with('abilities')->first();
        $hero->talents = $hero->talents()->orderBy('id')->get()->groupBy('level');
        $build->talents = $build->talents->groupBy('level');
        $maps = Map::all();

        return view('build.edit', compact('hero', 'build', 'maps'));
    }

    function show(Build $build)
    {
        $build = Build::where('id', $build->id)
            ->with('comments.comments.comments.comments.comments')
            ->withRating()
            ->first();

        $hero = $build->hero;
        $hero->talents = $hero->talents->groupBy('level');

        $build->talents = $build->talents->groupBy('level');
        return view('build.show', compact('build', 'hero'));
    }
}
