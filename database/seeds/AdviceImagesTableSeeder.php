<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdviceImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AdviceImage::class, 50)->create();
    }
}
