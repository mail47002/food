<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            [
                'type'       => 'text',
                'name'       => 'Text',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
               'type'       => 'textarea',
               'name'       => 'Textarea',
               'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'type'       => 'checkbox',
                'name'       => 'Checkbox',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'type'       => 'radio',
                'name'       => 'Radio',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'type'       => 'select',
                'name'       => 'Select',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'type'       => 'date',
                'name'       => 'Date',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
