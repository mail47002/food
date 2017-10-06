<?php

use Illuminate\Database\Seeder;

class AdvertToCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_to_category')->insert([
            [
                'advert_id'   => 1,
                'category_id' => 1
            ], [
                'advert_id'   => 2,
                'category_id' => 2
            ], [
                'advert_id'   => 3,
                'category_id' => 1
            ], [
                'advert_id'   => 4,
                'category_id' => 2
            ]
        ]);
    }
}
