<?php

use Illuminate\Database\Seeder;

class AdvertProductTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_product_terms')->insert([
            'advert_id' => 1,
            'date_start' => '2014-06-26',
            'date_end' => '2014-06-26',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_product_terms')->insert([
            'advert_id' => 2,
            'date_start' => '2014-06-26',
            'date_end' => '2014-06-26',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_product_terms')->insert([
            'advert_id' => 3,
            'date_start' => '2014-06-26',
            'date_end' => '2014-06-26',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_product_terms')->insert([
            'advert_id' => 4,
            'date_start' => '2014-06-26',
            'date_end' => '2014-06-26',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
