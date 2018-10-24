<?php

namespace App\Policies;

use App\Build;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuildPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Build $build)
    {
        return $user->id === $build->user_id;
    }

    public function delete(User $user, Build $build)
    {
        return $user->id === $build->user_id;
    }
}
