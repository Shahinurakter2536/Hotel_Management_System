<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Shahinur Akter',
            'username' => 'Shahinur',
            'email' => 'shahinur@gmail.com',
            'password' => bcrypt('adminadmin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Mr Guest',
            'username' => 'Guest',
            'email' => 'guest@gmail.com',
            'password' => bcrypt('guestguest'),
        ]);
    }
}
