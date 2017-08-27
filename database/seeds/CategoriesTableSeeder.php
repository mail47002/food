<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	DB::table('categories')->insert([
            'name' => 'Category 1',
            'sort_order' => '4',
            'status' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('categories')->insert([
            'name' => 'Category 2',
            'sort_order' => '3',
            'status' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('categories')->insert([
            'name' => 'Category 3',
            'sort_order' => '2',
            'status' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('categories')->insert([
            'name' => 'Category 4',
            'sort_order' => '1',
            'status' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
