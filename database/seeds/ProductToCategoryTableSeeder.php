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
            'product_id' => 1,
            'product_category_id' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('product_to_category')->insert([
            'product_id' => 2,
            'product_category_id' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('product_to_category')->insert([
            'product_id' => 3,
            'product_category_id' => 2,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('product_to_category')->insert([
            'product_id' => 4,
            'product_category_id' => 2,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
