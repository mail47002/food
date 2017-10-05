<?php

use Illuminate\Database\Seeder;

class ArticleImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_image')->insert([
            'article_id' => '1',
            'image' => 'uploads/articles/14/Ескіз12.png',
            'alt' => 'image 11',
            'sort_order' => 1,
            'status' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('article_image')->insert([
            'article_id' => '1',
            'image' => 'uploads/articles/14/Ескіз12.png',
            'alt' => 'image 22',
            'sort_order' => 1,
            'status' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('article_image')->insert([
            'article_id' => '2',
            'image' => 'uploads/articles/14/Ескіз12.png',
            'alt' => 'image 33',
            'sort_order' => 1,
            'status' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('article_image')->insert([
            'article_id' => '2',
            'image' => 'uploads/articles/14/Ескіз12.png',
            'alt' => 'image 33',
            'sort_order' => 1,
            'status' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
