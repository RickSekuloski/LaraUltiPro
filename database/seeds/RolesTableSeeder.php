<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([

            [
                'name'=>'superadmin',
                'created_at'=> date("Y-m-d H:i:s"),
                'updated_at'=> date("Y-m-d H:i:s"),
            ],
            [
                'name'=>'admin',
                'created_at'=> date("Y-m-d H:i:s"),
                'updated_at'=> date("Y-m-d H:i:s"),
            ],
            [
                'name'=>'admin-editor',
                'created_at'=> date("Y-m-d H:i:s"),
                'updated_at'=> date("Y-m-d H:i:s"),
            ],
            [
                'name'=>'user',
                'created_at'=> date("Y-m-d H:i:s"),
                'updated_at'=> date("Y-m-d H:i:s"),
            ],
            [
                'name'=>'user-editor',
                'created_at'=> date("Y-m-d H:i:s"),
                'updated_at'=> date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
