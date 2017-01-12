<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FirstTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('task_first')->insert([
             'user_id' => 3,
            'username' => 'Fedor',
            'surname'=> 'test',
            'birthday' => Carbon::now(),
            'gender' => 1,
            'country' => 'Russia',
             'city' => 'Sankt-Peterburg',
            'avatar'=> 'path/to/image',
        ]);

        DB::table('task_first')->insert([
            'user_id' => 4,
            'username' => 'Ann4',
            'surname'=> 'Vkiok',
            'birthday' => Carbon::now(),
            'gender' => 1,
            'country' => 'Russia',
            'city' => 'Sankt-Peterburg',
            'avatar'=> 'path/to/image',
        ]);


        DB::table('task_first')->insert([
            'user_id' => 5,
            'username' => 'XZ4',
            'surname'=> 'Hjkfjkf',
            'birthday' => Carbon::now(),
            'gender' => 0,
            'country' => 'Russia',
            'city' => 'Sankt-Peterburg',
            'avatar'=> 'path/to/image',
        ]);
        
        
        
        

    }
}
