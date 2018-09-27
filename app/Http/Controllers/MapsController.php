<?php

namespace App\Http\Controllers;

use App\Map;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    function index()
    {
        $maps = Map::all();
        return view('map.index', compact('maps'));
    }
}
