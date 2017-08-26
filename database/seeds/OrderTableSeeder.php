<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert([
            'advert_id' => 1,
            'user_id' => 1,
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('order')->insert([
            'advert_id' => 2,
            'user_id' => 1,
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('order')->insert([
            'advert_id' => 3,
            'user_id' => 3,
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('order')->insert([
            'advert_id' => 4,
            'user_id' => `4,
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
