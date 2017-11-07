<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Recipe::class, 10)->create();
    }
}
