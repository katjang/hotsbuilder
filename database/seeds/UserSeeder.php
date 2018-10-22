<?php

use App\Admin;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Niek',
            'email' => 'niek@test.com',
            'password' => bcrypt('testtest')
        ]);

        User::create([
            'name' => 'SomeoneElse',
            'email' => 'test@test.com',
            'password' => bcrypt('testtest')
        ]);

        Admin::create([
            'email' => 'baws@test.com',
            'name' => 'Swagger boi',
            'password' => bcrypt('testtest')
        ]);

    }
}
