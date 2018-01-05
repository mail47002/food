<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RecipeImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RecipeImage::class, 50)->create();
    }
}
