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
        DB::table('roles')->insert([
            'role' => 'user',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('roles')->insert([
            'role' => 'administrator',
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
