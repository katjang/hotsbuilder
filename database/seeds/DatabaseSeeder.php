<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(HeroSeeder::class);
         $this->call(MapSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(BuildSeeder::class);
    }
}
