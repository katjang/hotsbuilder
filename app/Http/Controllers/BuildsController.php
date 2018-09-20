<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;

class BuildsController extends Controller
{
    function index(Hero $hero){
        $hero->builds;
        return view('builds', compact('hero'));
    }

    function create(){
        return view('builds.create');
    }
}
