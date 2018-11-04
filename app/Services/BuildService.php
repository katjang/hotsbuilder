<?php namespace App\Services;

use App\Build;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class BuildService
{
    public function saveBuild($request, $build, $user)
    {
        $build->fill(array_only($request->all(), ['title', 'description']));
        $build->hero_id = $request->hero_id;

        $user->builds()->save($build);
        $build->talents()->sync([
            $request->talent_1 => ['note' => $request->note_1],
            $request->talent_2 => ['note' => $request->note_2],
            $request->talent_3 => ['note' => $request->note_3],
            $request->talent_4 => ['note' => $request->note_4],
            $request->talent_5 => ['note' => $request->note_5],
            $request->talent_6 => ['note' => $request->note_6],
            $request->talent_7 => ['note' => $request->note_7]
        ]);
        $build->maps()->sync(array_values($request->maps?:[]));
    }

    public function deleteBuild(Build $build)
    {
        $build->users()->detach();
        $build->ratings()->detach();
        $build->maps()->detach();
        $build->delete();
    }
}