<?php

use Illuminate\Database\Seeder;

class AdvertStickersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_stickers')->insert([
            'name' => 'share',
            'image' => '/products/image1.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_stickers')->insert([
            'name' => 'sale',
            'image' => '/products/image2.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_stickers')->insert([
            'name' => 'share',
            'image' => '/products/image3.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_stickers')->insert([
            'name' => 'sale',
            'image' => '/products/image4.jpg',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

    }
}
