<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

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

        $faker = Factory::create();

        // generate 3 users/author
        DB::table('users')->insert([
        	[
        		'name' => "johnny Hongthuch",
            'slug'  => "johnny-hongthuch",
        		'email' => "johnny@mail.com",
        		'password' => bcrypt('770728'),
            'bio' => $faker->text(rand(250, 300))
        	],

        	[
        		'name' => "Rakiin Hongthuch",
            'slug'  => "rakiin-hongthuch",
        		'email' => "rakiin@mail.com",
        		'password' => bcrypt('770728'),
            'bio' => $faker->text(rand(250, 300))
        	],

        	[
        		'name' => "Suchada Rayain",
            'slug'  => "suchada-rayain",
        		'email' => "suchada@mail.com",
        		'password' => bcrypt('770728'),
            'bio' => $faker->text(rand(250, 300))
        	],

          [
            'name' => "ant Rayain",
            'slug'  => "ant-rayain",
            'email' => "ant.gbn@mail.com",
            'password' => bcrypt('770728'),
            'bio' => $faker->text(rand(250, 300))
          ],

        ]);

    }
}
