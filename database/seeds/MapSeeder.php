<?php

use App\Map;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$response = file_get_contents('http://hotsapi.net/api/v1/maps');
        //$maps = json_decode($response, true);
        //only used the name from the API and it was needed to filter out some of them, in the end it was easier to just make my own array.


        $maps = [
            "Alterac Pass",
            "Battlefield of Eternity",
            "Blackheart's Bay",
            "Braxis Holdout",
            "Cursed Hollow",
            "Dragon Shire",
            "Garden of Terror",
            "Hanamura Temple",
            "Haunted Mines",
            "Infernal Shrines",
            "Sky Temple",
            "Tomb of the Spider Queen",
            "Towers of Doom",
            "Volskaya Foundry",
            "Warhead Junction"
        ];



        foreach($maps as $map){
            $tmap = [];
            $tmap['image'] = 'img/maps/'. strtolower(str_replace(' ', '-', $map)) . '.jpg';
            $tmap['name'] = $map;
            Map::create($tmap);
        }
    }
}
