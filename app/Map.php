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

    static function selectArray()
    {
        $mapArray = Map::orderBy('name')->get()->pluck('name', 'id');
        $mapArray->prepend('Any', 0);

        return $mapArray;
    }
}
