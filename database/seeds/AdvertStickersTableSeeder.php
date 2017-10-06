<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            [
                'name'       => 'share',
                'image'      => 'products/image1.jpg',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'sale',
                'image'      => 'products/image2.jpg',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'share',
                'image'      => 'products/image3.jpg',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'sale',
                'image'      => 'products/image4.jpg',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);

    }
}
