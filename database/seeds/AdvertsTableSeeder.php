<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdvertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Advert::class, 20)->create();
    }
}
