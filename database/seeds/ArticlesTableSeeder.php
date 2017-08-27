<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('articles')->insert([
            'category_id' => 1,
            'name' => 'Article 1',
            'slug' => 'Article 1',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('articles')->insert([
            'category_id' => 2,
            'name' => 'Article 2',
            'slug' => 'Article 2',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('articles')->insert([
            'category_id' => 3,
            'name' => 'Article 3',
            'slug' => 'Article 3',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('articles')->insert([
            'category_id' => 2,
            'name' => 'Article 4',
            'slug' => 'Article 4',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('articles')->insert([
            'category_id' => 1,
            'name' => 'Article 5',
            'slug' => 'Article 5',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
