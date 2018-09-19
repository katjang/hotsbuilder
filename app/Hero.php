<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $guarded = [];

    function abilities()
    {
        return $this->hasMany(Ability::class);
    }

    function talents()
    {
        return $this->hasMany(Talent::class);
    }
}
