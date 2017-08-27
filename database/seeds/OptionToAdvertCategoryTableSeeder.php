<?php

use Illuminate\Database\Seeder;

class OptionToAdvertCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_to_advert_category')->insert([
            'advert_category_id' => 1,
            'option_id' => 1,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('option_to_advert_category')->insert([
            'advert_category_id' => 2,
            'option_id' => 2,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

          DB::table('option_to_advert_category')->insert([
            'advert_category_id' => 3,
            'option_id' => 3,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

           DB::table('option_to_advert_category')->insert([
            'advert_category_id' => 4,
            'option_id' => 4,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
