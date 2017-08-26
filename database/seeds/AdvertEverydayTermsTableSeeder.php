<?php

use Illuminate\Database\Seeder;

class AdvertEverydayTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_everyday_terms')->insert([
            'advert_id' => 1,
            'date_start' => 1503742221,
            'date_end' => 1503742321,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_everyday_terms')->insert([
            'advert_id' => 2,
            'date_start' => 1503742421,
            'date_end' => 1503742521,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_everyday_terms')->insert([
            'advert_id' => 3,
            'date_start' => 1503742521,
            'date_end' => 1503742621,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_everyday_terms')->insert([
            'advert_id' => 4,
            'date_start' => 1503742621,
            'date_end' => 1503742721,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
