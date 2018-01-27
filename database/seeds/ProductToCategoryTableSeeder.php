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
        factory(App\ProductToCategory::class, 20)->create();
    }
}
