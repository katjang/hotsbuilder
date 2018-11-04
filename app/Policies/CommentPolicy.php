<?php

namespace App\Policies;

use App\Comment;
use App\User;
use App\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function remove(User $user, Comment $comment)
    {
        return $user->id === (int)$comment->user_id || $user->role == UserRole::MODERATOR;
    }
}
