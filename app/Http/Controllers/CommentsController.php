<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    function store($commentable)
    {
        dd($commentable);
    }

    function delete()
    {

    }
}
