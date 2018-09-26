<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;

class HeroesController extends Controller
{
    function index(){
        $heroes = Hero::all();
        return view('hero.index', compact('heroes'));
    }
}
