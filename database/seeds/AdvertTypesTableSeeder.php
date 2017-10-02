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
                'sort_order' => 0,
                'status'     => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Готові страви',
                'sort_order' => 0,
                'status'     => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Страви під замовлення',
                'sort_order' => 0,
                'status'     => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
