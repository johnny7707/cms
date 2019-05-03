<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users/author
        DB::table('users')->insert([
        	[
        		'name' => "johnny Hongthuch",
        		'email' => "johnny@mail.com",
        		'password' => bcrypt('secret')
        	],

        	[
        		'name' => "Rakiin Hongthuch",
        		'email' => "rakiin@mail.com",
        		'password' => bcrypt('secret')
        	],

        	[
        		'name' => "Suchada Rayain",
        		'email' => "suchada@mail.com",
        		'password' => bcrypt('secret')
        	],
        ]);

    }
}
