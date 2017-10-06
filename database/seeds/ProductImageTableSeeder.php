<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_image')->insert([
            [
                'product_id' => '1',
                'image'      => 'uploads/products/14/Ескіз12.png',
                'alt'        => 'image 11',
                'sort_order' => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'product_id' => '1',
                'image'      => 'uploads/products/14/Ескіз12.png',
                'alt'        => 'image 22',
                'sort_order' => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'product_id' => '2',
                'image'      => 'uploads/products/14/Ескіз12.png',
                'alt'        => 'image 33',
                'sort_order' => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'product_id' => '2',
                'image'      => 'uploads/products/14/Ескіз12.png',
                'alt'        => 'image 33',
                'sort_order' => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
