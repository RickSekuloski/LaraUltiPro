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
        //
        DB::table('users')->insert([
            [
            'name'=>'author',
            'email'=>'author@gmail.com',
            'password'=>Hash::make('123456789'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            ],
            [
            'name'=>'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('123456789'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            ],
            [
            'name'=>'subscriber',
            'email'=>'subscriber@gmail.com',
            'password'=>Hash::make('123456789'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            ],
        ]);
    }
}
