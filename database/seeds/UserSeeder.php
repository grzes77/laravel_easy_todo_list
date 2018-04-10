<?php

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
        $user = new User();
        $user->name = 'user1';
        $user->email = 'user1@user.com';
        $user->password = bcrypt('test');
        $user->role = 'user';
        $user->save();


        $user = new User();
        $user->name = 'user2';
        $user->email = 'user2@user.com';
        $user->password = bcrypt('test');
        $user->role = 'user';
        $user->save();

        $user = new User();
        $user->name = 'user3';
        $user->email = 'user3@user.com';
        $user->password = bcrypt('test');
        $user->role = 'user';
        $user->save();
    }
}
