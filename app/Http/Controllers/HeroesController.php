<?php

namespace App\Http\Controllers;

use App\Hero;
use App\Services\BuildService;
use Illuminate\Http\Request;

class HeroesController extends Controller
{
    function index(Request $request){
        $heroes = Hero::filter($request)->get();

        return view('hero.index', compact('heroes'));
    }

    function show(Hero $hero)
    {
        $builds = $hero->builds()->with('hero', 'user')->get();
        return view('hero.show', compact('hero', 'builds'));
    }
}
