<?php namespace App\Services;

use App\Build;
use Illuminate\Support\Facades\Auth;

class BuildService
{
    public function addFavoritesAttribute($builds)
    {
        if(!Auth::check()){
            return $builds;
        }
        $favorites = Auth::user()->favorites->pluck('id');

        foreach($builds as $build){
            in_array($build->id, $favorites->toArray()) ? $build->favorite = 1 : $build->favorite = 0;
        }
        return $builds;
    }

    public function saveBuild($request, $build, $user)
    {
        $build->fill(array_only($request->all(), ['title', 'description']));
        $build->hero_id = $request->hero_id;

        $user->builds()->save($build);
        $build->talents()->sync([
            $request->talent_1,
            $request->talent_2,
            $request->talent_3,
            $request->talent_4,
            $request->talent_5,
            $request->talent_6,
            $request->talent_7
        ]);
    }

}