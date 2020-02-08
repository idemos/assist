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
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'type' => '1',
            'password' => Hash::make('admin'),
        ],[
            'name' => 'user',
            'email' => 'user@user.com',
            'type' => '0',
            'password' => Hash::make('user'),
        ]);
    }
}
