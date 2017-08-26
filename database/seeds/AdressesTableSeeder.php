<?php

use Illuminate\Database\Seeder;

class AdressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adresses')->insert([
            'user_id' => 1,
            'city' => Vinnica,
            'street' => Strilecka,
            'build' => 75,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('adresses')->insert([
            'user_id' => 2,
            'city' => Vinnica,
            'street' => Strilecka,
            'build' => 73,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('adresses')->insert([
            'user_id' => 3,
            'city' => Vinnica,
            'street' => Strilecka,
            'build' => 74,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('adresses')->insert([
            'user_id' => 4,
            'city' => Vinnica,
            'street' => Strilecka,
            'build' => 76,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

    }
}
