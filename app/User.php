<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function builds()
    {
        return $this->hasMany(Build::class);
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function favorites()
    {
        return $this->belongsToMany(Build::class, 'favorites');
    }

    function ratedBuilds()
    {
        return $this->belongsToMany(Build::class, 'ratings');
    }
}
