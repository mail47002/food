<?php

use Illuminate\Database\Seeder;

class AdvertCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_categories')->insert([
            'name' => 'AdvertCategories 1',
            'sort_order' => 1,
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_categories')->insert([
            'name' => 'AdvertCategories 2',
            'sort_order' => 1,
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_categories')->insert([
            'name' => 'AdvertCategories 3',
            'sort_order' => 1,
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_categories')->insert([
            'name' => 'AdvertCategories 4',
            'sort_order' => 1,
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
