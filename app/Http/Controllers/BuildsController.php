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

    function create(Hero $hero)
    {
        $hero->talents = $hero->talents->groupBy('level');
        $hero->abilities;
        return view('hero.build.create', compact('hero'));
    }

    function edit(Build $build){
        $hero = $build->hero()->with('abilities')->first();
        $hero->talents = $hero->talents()->orderBy('id')->get()->groupBy('level');
        $build->talents = $build->talents->groupBy('level');
        return view('user.build.edit', compact('hero', 'build'));
    }
}
