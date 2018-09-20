<?php

namespace App\Http\Controllers;

use App\Hero;
use App\Talent;
use Illuminate\Http\Request;

class BuildsController extends Controller
{
    function index(Hero $hero){
        $hero->builds;
        return view('heroes.builds.index', compact('hero'));
    }

    function create(Hero $hero){
        $hero->talents = $hero->talents()->get()->groupBy('level');
        $hero->abilities;
        return view('builds.create', compact('hero'));
    }
}
