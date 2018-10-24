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

        if(!$comment->has_comment){
            $comment->has_comment = true;
            $comment->save();
        }

        return redirect()->back();
    }

    function remove(Comment $comment)
    {
        $comment->body = null;
        $comment->save();

        return redirect()->back();
    }

    function show(Comment $comment)
    {
        // for some reason "Comment::where('id', $comment->id)" is neccesairy,
        // just $comment->with... returns all comments as well as Comment::find($build->id)->with...,
        // which is kinda odd... (one extra query :( i could change route to commentId, but i want to keep the routes consistant)
        $comment = Comment::where('id', $comment->id)->with('comments.comments.comments.comments')->get();
        return view('comment.show', ['comments' => $comment]);
    }
}
