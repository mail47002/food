<?php

use Illuminate\Database\Seeder;

class RecipeToCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_to_category')->insert([
            'recipe_id' => 1,
            'category_id' => 2
        ], [
            'recipe_id' => 2,
            'category_id' => 2
        ], [
            'recipe_id' => 2,
            'category_id' => 1
        ], [
            'recipe_id' => 3,
            'category_id' => 1
        ], [
            'recipe_id' => 3,
            'category_id' => 2
        ]);
    }
}
