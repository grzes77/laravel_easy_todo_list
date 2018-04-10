<?php

use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $to_do = ['zrob menu', 'zrob nawigacje', 'zrob content', 'zrob backend', 'upieksz to'];

            for($i=1 ; $i <4; $i++) {
                foreach ($to_do as $to_do_one) {
                    $tasks = new \App\Task();
                    $tasks->to_do = $to_do_one .' '. 'uzytkowniku'.' '.  $i;
                    $tasks->user_id = $i;
                    $tasks->is_to_do = '0';
                    $tasks->unique_code = bcrypt($tasks->to_do . $tasks->to_do);
                    $tasks->save();
                }
            }
    }
}
