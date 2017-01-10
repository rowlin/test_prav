<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'phone'=> '8888888',
            'email' => 'admin3@admin.com',
            'code' => 1,
            'pay' =>6000,
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'username' => 'admin2',
            'phone'=> '8888888',
            'email' => 'admin2@admin.com',
            'code' => 1,
            'pay' =>4000,
            'password' => bcrypt('admin'),
        ]);
        DB::table('users')->insert([
            'username' => 'user3',
            'phone'=> '8888888',
            'email' => 'user3@used.com',
            'code' => 0,
            'pay' =>500,
            'password' => bcrypt('user'),
        ]);
        DB::table('users')->insert([
            'username' => 'user2',
            'phone'=> '8888888',
            'email' => 'user2@used.com',
            'code' => 0,
            'pay' =>0,
            'password' => bcrypt('user'),
        ]);

        DB::table('users')->insert([
            'username' => 'user1',
            'phone'=> '8888888',
            'email' => 'user1@used.com',
            'code' => 0,
            'pay' =>2000,
            'password' => bcrypt('user'),
        ]);

    }
}
