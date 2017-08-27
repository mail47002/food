<?php

use Illuminate\Database\Seeder;

class ArticleCategoryriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categories')->insert([
            'name' => 'Category 1',
            'meta_title' => 'Category 1',
            'meta_description' => 'Category 1',
            'meta_keyword' => 'Category 1',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('article_categories')->insert([
            'name' => 'Category 2',
            'meta_title' => 'Category 2',
            'meta_description' => 'Category 2',
            'meta_keyword' => 'Category 2',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('article_categories')->insert([
            'name' => 'Category 3',
            'meta_title' => 'Category 3',
            'meta_description' => 'Category 3',
            'meta_keyword' => 'Category 3',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('article_categories')->insert([
            'name' => 'Category 4',
            'meta_title' => 'Category 4',
            'meta_description' => 'Category 4',
            'meta_keyword' => 'Category 4',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('article_categories')->insert([
            'name' => 'Category 5',
            'meta_title' => 'Category 5',
            'meta_description' => 'Category 5',
            'meta_keyword' => 'Category 5',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
