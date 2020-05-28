<?php


use App\Post;
use App\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(AdminsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(AdminRoleTableSeeder::class);
      
         factory(User::class,50)->create()->each( function($user) { 
             $user->post()->save(factory(Post::class)->make());
             
        });
    }
}
