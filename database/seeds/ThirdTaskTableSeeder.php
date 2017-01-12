<?php


use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ThirdTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_third')->insert([
            'user_id' => 3,
            'weight'=>0,
            'length'=> '1',
         
        ]);



    }
}
