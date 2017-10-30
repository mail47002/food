<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdvertStickersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advert_stickers')->insert([
            [
                'name'       => 'Знижка',
                'slug'       => 'discount',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Нова',
                'slug'       => 'new',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'name'       => 'Улюблена',
                'slug'       => 'heart',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);

    }
}
