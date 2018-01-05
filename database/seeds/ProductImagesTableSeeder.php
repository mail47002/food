<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductImage::class, 50)->create();
    }
}
