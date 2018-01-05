<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'advert_id'  => 1,
                'user_id'    => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 2,
                'user_id'    => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 3,
                'user_id'    => 3,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 4,
                'user_id'    => 4,
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
