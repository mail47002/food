<?php

use Illuminate\Database\Seeder;

class AdvertImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_image')->insert([
            'advert_id' => 1,
            'image' => '/products/image1.jpg',
            'alt' => 'image1',
            'sort_order' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_image')->insert([
            'advert_id' => 1,
            'image' => '/products/image2.jpg',
            'alt' => 'image1',
            'sort_order' => 2,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_image')->insert([
            'advert_id' => 2,
            'image' => '/products/image1.jpg',
            'alt' => 'image1',
            'sort_order' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_image')->insert([
            'advert_id' => 2,
            'image' => '/products/image2.jpg',
            'alt' => 'image1',
            'sort_order' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
