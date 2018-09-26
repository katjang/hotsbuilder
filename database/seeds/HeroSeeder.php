<?php

use App\Ability;
use App\Hero;
use App\Talent;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = file_get_contents('http://hotsapi.net/api/v1/heroes');

        $heroes = json_decode($response, true);

        foreach ($heroes as $hero) {
            $hero['image'] = $hero['icon_url']['92x93'];
            $newHero = Hero::create(array_except($hero, ['translations', 'icon_url', 'abilities', 'talents']));
            foreach ($hero['abilities'] as $ability) {
                $ability['hero_id'] = $newHero->id;
                Ability::create(array_except($ability, ['owner']));
            }
            $talents = collect($hero['talents'])->sortBy(function ($talent){
                return [$talent['level'], $talent['sort']];
            })->toArray(); // can't orderBy()->orderBy()

            foreach ($talents as $talent) {
                $talent['name'] = $talent['title'];
                $talent['image'] = $talent['icon_url']['64x64'];
                $talent['hero_id'] = $newHero->id;

                // there seemed to be duplicates in the API data, this gets rid of that.
                if (Talent::where([
                        ['hero_id', $newHero->id],
                        ['level', $talent['level']],
                        ['sort', $talent['sort']]
                    ])->doesntExist()) {
                    Talent::create(array_except($talent, ['title', 'icon', 'icon_url']));
                }
            }
        }
    }
}
