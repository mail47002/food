<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'user_id'    => 1,
                'city'       => 'Vinnica',
                'street'     => 'Strilecka',
                'build'      => 75,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'user_id'    => 2,
                'city'       => 'Vinnica',
                'street'     => 'Strilecka',
                'build'      => 73,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'user_id'    => 3,
                'city'       => 'Vinnica',
                'street'     => 'Strilecka',
                'build'      => 74,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'user_id'    => 4,
                'city'       => 'Vinnica',
                'street'     => 'Strilecka',
                'build'      => 76,
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);

    }
}
