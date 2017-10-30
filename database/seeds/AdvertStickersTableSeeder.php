<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdvertStickersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AdvertSticker::class, 20)->create();

    }
}
