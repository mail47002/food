<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdvertTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_types')->insert([
            [
                'name'       => 'Меню по датам',
                'slug'       => 'by_date',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Готові страви',
                'slug'       => 'in_stock',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Страви під замовлення',
                'slug'       => 'pre_order',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
