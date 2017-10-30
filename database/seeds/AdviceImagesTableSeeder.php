<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdviceImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advice_images')->insert([
            'advice_id' => '1',
            'user_id' => '1',
            'thumbnail'      => 'uploads/advices/14/Ескіз12.png',
            'image'      => 'uploads/advices/14/Ескіз12.png',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'advice_id' => '1',
            'user_id' => '1',
            'thumbnail'      => 'uploads/advices/14/Ескіз12.png',
            'image'      => 'uploads/advices/14/Ескіз12.png',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'advice_id' => '1',
            'user_id' => '1',
            'thumbnail'      => 'uploads/advices/14/Ескіз12.png',
            'image'      => 'uploads/advices/14/Ескіз12.png',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'advice_id' => '1',
            'user_id' => '1',
            'thumbnail'      => 'uploads/advices/14/Ескіз12.png',
            'image'      => 'uploads/advices/14/Ескіз12.png',
            'created_at' => Carbon::now()->toDateString()
        ]);
    }
}
