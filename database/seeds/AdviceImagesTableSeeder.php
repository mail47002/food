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
            'image'      => 'uploads/advices/14/Ескіз12.png',
            'alt'        => 'image 11',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'advice_id' => '1',
            'image'      => 'uploads/advices/14/Ескіз12.png',
            'alt'        => 'image 22',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'advice_id' => '2',
            'image'      => 'uploads/advices/14/Ескіз12.png',
            'alt'        => 'image 33',
            'created_at' => Carbon::now()->toDateString()
        ], [
            'advice_id' => '2',
            'image'      => 'uploads/advices/14/Ескіз12.png',
            'alt'        => 'image 33',
            'created_at' => Carbon::now()->toDateString()
        ]);
    }
}
