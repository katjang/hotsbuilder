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
            'name' => 'Boi',
            'email' => 'boi@test.com',
            'password' => bcrypt('testtest')
        ]);

        User::create([
            'name' => 'SomeOtherDude',
            'email' => 'somedude@test.com',
            'password' => bcrypt('testtest')
        ]);

        User::create([
            'name' => 'Pepe',
            'email' => 'pepe@test.com',
            'password' => bcrypt('testtest')
        ]);

        User::create([
            'name' => 'Doggo',
            'email' => 'doggo@test.com',
            'password' => bcrypt('testtest')
        ]);

        User::create([
            'name' => 'Harold',
            'email' => 'hide@thepain.com',
            'password' => bcrypt('testtest')
        ]);

        User::create([
            'name' => 'Smurf',
            'email' => 'smurf@test.com',
            'password' => bcrypt('testtest')
        ]);

        $mod = User::create([
            'name' => 'Moderator',
            'email' => 'mod@test.com',
            'password' => bcrypt('testtest'),
        ]);
        $mod->role = \App\UserRole::MODERATOR;
        $mod->save();


        Admin::create([
            'email' => 'admin@test.com',
            'name' => 'admin',
            'password' => bcrypt('testtest')
        ]);

    }
}
