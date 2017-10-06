<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
             [
                 'name'        => 'Article 1',
                 'user_id'     => 1,
                 'slug'        => 'Article-1',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ], [
                 'name'        => 'Article 2',
                 'user_id'     => 1,
                 'slug'        => 'Article-3',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ], [
                 'name'        => 'Article 4',
                 'user_id'     => 1,
                 'slug'        => 'Article-4',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ], [
                 'name'        => 'Article 5',
                 'user_id'     => 1,
                 'slug'        => 'Article-5',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ], [
                 'name'        => 'Article 6',
                 'user_id'     => 1,
                 'slug'        => 'Article-7',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ]
         ]);
    }
}
