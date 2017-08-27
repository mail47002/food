<?php

use Illuminate\Database\Seeder;

class AdvertAdressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_adresses')->insert([
            'advert_id' => 1,
            'city' => 'Vinnica',
            'street' => 'Strilecka',
            'build' => 75,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_adresses')->insert([
            'advert_id' => 2,
            'city' => 'Vinnica',
            'street' => 'Strilecka',
            'build' => 74,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_adresses')->insert([
            'advert_id' => 3,
            'city' => 'Vinnica',
            'street' => 'Strilecka',
            'build' => 75,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('advert_adresses')->insert([
            'advert_id' => 4,
            'city' => 'Vinnica',
            'street' => 'Strilecka',
            'build' => 73,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);


    }
}
