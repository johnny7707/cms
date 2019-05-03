<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();


        DB::table('categories')->insert( [
            [
                'title' => 'Students',
                'slug'  => 'students'
            ],

            [
                'title'  => 'Teachers',
                'slug'   => 'teachers'
            ],

            [
                'title'  => 'News',
                'slug'   => 'news'
            ],

            [
                'title'  => 'Activities',
                'slug'   => 'activities'
            ],
        ]);

        // update the post data
        for ($post_id = 1; $post_id <= 10; $post_id++)
        {
            $category_id = rand(1, 4);

            DB::table('posts')
                ->where('id', $post_id)
                ->update(['category_id' => $category_id]);
        }
    }
}
