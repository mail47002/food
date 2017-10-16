<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_images')->insert([
            'article_id' => '1',
            'image'      => 'uploads/articles/14/Ескіз12.png',
            'alt'        => 'image 11',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'article_id' => '1',
            'image'      => 'uploads/articles/14/Ескіз12.png',
            'alt'        => 'image 22',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'article_id' => '2',
            'image'      => 'uploads/articles/14/Ескіз12.png',
            'alt'        => 'image 33',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'article_id' => '2',
            'image'      => 'uploads/articles/14/Ескіз12.png',
            'alt'        => 'image 33',
            'created_at' => Carbon::now()->toDateString()
        ]);
    }
}
