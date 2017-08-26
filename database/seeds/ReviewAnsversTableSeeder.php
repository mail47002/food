<?php

use Illuminate\Database\Seeder;

class ReviewAnsversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review_ansvers')->insert([
            'review_id' => 1,
            'text' => 'text 1',
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('review_ansvers')->insert([
            'review_id' => 2,
            'text' => 'text 2',
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('review_ansvers')->insert([
            'review_id' => 3,
            'text' => 'text 3',
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('review_ansvers')->insert([
            'review_id' => 4,
            'text' => 'text 4',
            'status' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
