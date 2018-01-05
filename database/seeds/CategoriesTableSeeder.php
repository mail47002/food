<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
      	    [
                'name'       => 'Супи',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Другі страви',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Каші',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Десерти і торти',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Закуски',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Салати',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Випічка і пироги',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Напої',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Спеції',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Консервація',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Алкоголь',
                'sort_order' => 0,
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
