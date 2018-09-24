<?php

namespace App\Http\Controllers;

use App\Hero;
use App\Talent;
use Illuminate\Http\Request;

class BuildsController extends Controller
{
    function index(Hero $hero)
    {
        $builds = $hero->builds()->with('hero')->get();
        return view('heroes.builds.index', compact('hero', 'builds'));
    }

    function create(Hero $hero)
    {
        $hero->talents = $hero->talents()->orderBy('level')->get()->groupBy('level');
        $hero->abilities;
        return view('builds.create', compact('hero'));
    }
}
