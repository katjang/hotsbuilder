<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    protected $guarded = [];

    function builds(){
        return $this->belongsToMany(Build::class);
    }
}
