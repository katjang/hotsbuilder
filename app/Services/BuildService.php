<?php namespace App\Services;

use App\Build;
use Illuminate\Support\Facades\Auth;

class BuildService
{
    public function addFavoritesAttribute($builds)
    {
        $favorites = Auth::user()->favorites->pluck('id');

        foreach($builds as $build){
            in_array($build->id, $favorites->toArray()) ? $build->favorite = 1 : $build->favorite = 0;
        }
        return $builds;
    }

}