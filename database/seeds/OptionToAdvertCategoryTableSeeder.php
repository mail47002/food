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
            'option_id' => 1,
            'name' => 'option 1',
            'sort_order' => 1,
            'required' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

         DB::table('option_to_advert_category')->insert([
            'option_id' => 2,
            'name' => 'option 1',
            'sort_order' => 2,
            'required' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

          DB::table('option_to_advert_category')->insert([
            'option_id' => 3,
            'name' => 'option 1',
            'sort_order' => 3,
            'required' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

           DB::table('option_to_advert_category')->insert([
            'option_id' => 4,
            'name' => 'option 1',
            'sort_order' => 4,
            'required' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
