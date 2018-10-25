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

    function index(Request $request){
        $roles = array_keys($request->only('assassin', 'specialist', 'warrior', 'support'));

        $heroes = Hero::search($request->get('search'))
            ->filterRole($roles)
            ->get();

        return view('hero.index', compact('heroes'));
    }

    function show(Hero $hero)
    {
        $builds = $hero->builds()->with('hero', 'user')->get();
        return view('hero.show', compact('hero', 'builds'));
    }
}
