<?php

namespace App\Http\Controllers;

use App\Hero;
use App\Services\BuildService;
use Illuminate\Http\Request;

class HeroesController extends Controller
{
    function __construct(BuildService $buildService)
    {
        $this->buildService = $buildService;
    }

    function index(){
        $heroes = Hero::all();
        return view('hero.index', compact('heroes'));
    }

    function show(Hero $hero)
    {
        $builds = $this->buildService->addFavoritesAttribute($hero->builds()->with('hero', 'user')->get());
        return view('hero.show', compact('hero', 'builds'));
    }
}
