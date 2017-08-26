<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'role' => 'user',
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('role')->insert([
            'role' => 'administrator',
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
