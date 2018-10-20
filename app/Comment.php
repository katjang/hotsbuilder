<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function replies()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
