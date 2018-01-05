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
        factory(App\AdvertImage::class, 50)->create();
    }
}
