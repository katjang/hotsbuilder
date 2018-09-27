<?php

namespace App\Http\Controllers;

use App\Hero;
use App\Talent;
use Illuminate\Http\Request;

class BuildsController extends Controller
{
    function index(Hero $hero)
    {
        $builds = $hero->builds()->with('hero', 'user')->get();
        return view('hero.build.index', compact('hero', 'builds'));
    }

    function create(Hero $hero)
    {
        $hero->talents = $hero->talents()->orderBy('id')->get()->groupBy('level');
//        $hero->talents = $hero->talents()->orderBy('level')->orderBy('sort')->get()->groupBy('level');
        $hero->abilities;
        return view('hero.build.create', compact('hero'));
    }
}
