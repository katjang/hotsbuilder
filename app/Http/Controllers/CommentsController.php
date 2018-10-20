<?php

namespace App\Http\Controllers;

use App\Build;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    function comment(Build $build, Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment = new Comment;

        $comment->body = $request->get('body');
        $comment->user()->associate(Auth::user());
        $build->comments()->save($comment);

        return redirect()->back();
    }

    function reply(Comment $comment, Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $nComment = new Comment;

        $nComment->body = $request->get('body');
        $nComment->user()->associate(Auth::user());
        $comment->comments()->save($nComment);

        return redirect()->back();
    }

    function delete()
    {

    }
}
