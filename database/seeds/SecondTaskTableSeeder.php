<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SecondTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('task_second')->insert([
            'user_id' => '3',
            'weight' => '1',
            'waist' => 1,
            'chest' => 0,
            'hip'=> 1,
            'images'=> '',
        ]);

        DB::table('task_second')->insert([
            'user_id' => '4',
            'weight' => '1',
            'waist' => 1,
            'chest' => 0,
            'hip'=> 1,
            'images'=> '',
        ]);
    }
}
