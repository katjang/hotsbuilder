<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index(){
        return view('home');
    }
}
