<?php

namespace App\Providers;

use App\Build;
use App\Comment;
use App\Policies\BuildPolicy;
use App\Policies\CommentPolicy;
use App\Policies\RatingPolicy;
use App\Rating;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Build::class => BuildPolicy::class,
        Comment::class => CommentPolicy::class,
        Rating::class => RatingPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
