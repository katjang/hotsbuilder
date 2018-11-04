<?php

namespace App\Policies;

use App\Build;
use App\User;
use App\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuildPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->ratedBuilds->count() >= 5 || $user->role == UserRole::MODERATOR;
    }

    public function update(User $user, Build $build)
    {
        return $user->id === (int)$build->user_id;
    }

    public function delete(User $user, Build $build)
    {
        return $user->id === (int)$build->user_id;
    }
}
