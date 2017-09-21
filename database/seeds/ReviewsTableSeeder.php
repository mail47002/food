<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'advert_id'  => 1,
                'user_id'    => 1,
                'text'       => 'review 1',
                'rating'     => 3.2,
                'status'     => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 2,
                'user_id'    => 2,
                'text'       => 'review 2',
                'rating'     => 4.2,
                'status'     => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 3,
                'user_id'    => 3,
                'text'       => 'review 3',
                'rating'     => 5.0,
                'status'     => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'advert_id'  => 4,
                'user_id'    => 4,
                'text'       => 'review 4',
                'rating'     => 2.5,
                'status'     => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
