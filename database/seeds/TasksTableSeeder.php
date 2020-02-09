<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('tasks')->insert([
            'name' => 'Microsoft Office License',
        ],[
            'name' => 'Email Access Granted',
        ],[
            'name' => 'Git Repository Granted',
        ],[
            'name' => 'JiraAccess Granted',
        ]);
    }
}
