<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
            'name' => 'admin',
            'avatar' => asset('avatars/Avatar.jpg'),
            'password' => bcrypt('admin'),
            'email' => 'admin@mecha-forum.me',
            'admin' => 1,
        ]);

        \App\User::create([
            'name' => 'Ahmad',
            'avatar' => asset('avatars/Sub_avatar.png'),
            'password' => bcrypt('password'),
            'email' => 'ahmad@outlook.com',
            'admin' => 0,
        ]);
    }
}
