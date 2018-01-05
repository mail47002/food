<?php

use Illuminate\Database\Seeder;

class ProductToCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_to_category')->insert([
            [
                'product_id'  => 1,
                'category_id' => 1
            ], [
                'product_id'  => 2,
                'category_id' => 1
            ], [
                'product_id'  => 3,
                'category_id' => 2
            ], [
                'product_id'  => 4,
                'category_id' => 2
            ]
        ]);
    }
}
