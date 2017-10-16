<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdvertImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_images')->insert([
            [
                'advert_id'  => 1,
                'image'      => 'uploads/food1.jpg',
                'alt'        => 'image1',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 1,
                'image'      => 'uploads/food1.jpg',
                'alt'        => 'image1',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 2,
                'image'      => 'uploads/food1.jpg',
                'alt'        => 'image1',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 2,
                'image'      => 'uploads/food1.jpg',
                'alt'        => 'image1',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
