<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $guarded = [];

    public function heroes()
    {
        return $this->belongsToMany(Hero::class);
    }
}
