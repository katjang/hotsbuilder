<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guard = 'admin';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
