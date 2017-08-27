<?php

use Illuminate\Database\Seeder;

class AdvertCoockingTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('advert_coocking_time')->insert([
            'name' => 'coocing 1',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('advert_coocking_time')->insert([
            'name' => 'coocing 2',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('advert_coocking_time')->insert([
            'name' => 'coocing 3',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('advert_coocking_time')->insert([
            'name' => 'coocing 4',
            'description' => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
