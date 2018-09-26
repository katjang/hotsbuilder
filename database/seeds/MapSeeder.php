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
        $response = file_get_contents('http://hotsapi.net/api/v1/maps');

        $maps = json_decode($response, true);

        foreach($maps as $map){
            Map::create(array_except($map, ['translations']));
        }
    }
}