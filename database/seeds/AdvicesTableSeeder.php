<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdvicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory('App\Advice', 10)->create();
    }
}
