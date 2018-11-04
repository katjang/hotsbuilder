<?php

use App\Build;
use App\User;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::whereIn('id', [3,4,5])->get();

        $builds = Build::all();

        foreach($users as $user){
            foreach($builds as $build){
                if(rand(1,2) == 1){
                    $build->ratings()->syncWithoutDetaching([$user->id => ['rating' => rand(1,5)]]);
                }
            }
        }
    }
}
