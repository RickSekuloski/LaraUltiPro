<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([

            [
            'name'=>'superadmin',
            'email'=>'superadmin@gmail.com',
            'password'=>Hash::make('123456789'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            ],
            [
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456789'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            ],
            [
            'name'=>'admin-editor',
            'email'=>'admin-editor@gmail.com',
            'password'=>Hash::make('123456789'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            ],
        ]);
    }
}
