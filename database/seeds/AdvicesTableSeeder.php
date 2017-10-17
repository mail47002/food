<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdvicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('advices')->insert([
             [
                 'name'        => 'advice 1',
                 'user_id'     => 1,
                 'slug'        => 'advice-1',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ], [
                 'name'        => 'advice 2',
                 'user_id'     => 1,
                 'slug'        => 'advice-3',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ], [
                 'name'        => 'advice 4',
                 'user_id'     => 1,
                 'slug'        => 'advice-4',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ], [
                 'name'        => 'advice 5',
                 'user_id'     => 1,
                 'slug'        => 'advice-5',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ], [
                 'name'        => 'advice 6',
                 'user_id'     => 1,
                 'slug'        => 'advice-7',
                 'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                 'image'       => 'uploads/food1.jpg',
                 'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                 'created_at'  => Carbon::now()->toDateTimeString()
             ]
         ]);
    }
}
