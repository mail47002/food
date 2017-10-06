<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            [
                'type'       => 'type 1',
                'name'       => 'type 1',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'type'       => 'type 2',
                'name'       => 'type 2',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'type'       => 'type 3',
                'name'       => 'type 3',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'type'       => 'type 4',
                'name'       => 'type 5',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
