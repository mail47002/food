<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReviewAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review_answers')->insert([
            [
                'review_id'  => 1,
                'text'       => 'text 1',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'review_id'  => 2,
                'text'       => 'text 2',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'review_id'  => 3,
                'text'       => 'text 3',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'review_id'  => 4,
                'text'       => 'text 4',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
