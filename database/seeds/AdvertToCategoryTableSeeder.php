<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdvertToCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AdvertToCategory::class, 20)->create();
    }
}
