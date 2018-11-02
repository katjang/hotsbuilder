<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class RatingPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return request('build')->user_id != $user->id;
    }
}
