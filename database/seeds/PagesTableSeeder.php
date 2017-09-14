<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'title'         => 'Про проект',
                'slug'          => str_slug('Про проект'),
                'meta_title'    => 'Про проект',
                'status'        => 1,
                'created_at'    => Carbon::now()->toDateTimeString()
            ], [
                'title'         => 'Допомога',
                'slug'          => str_slug('Допомога'),
                'meta_title'    => 'Допомога',
                'status'        => 1,
                'created_at'    => Carbon::now()->toDateTimeString()
            ], [
                'title'         => 'Правила',
                'slug'          => str_slug('Правила'),
                'meta_title'    => 'Правила',
                'status'        => 1,
                'created_at'    => Carbon::now()->toDateTimeString()
            ], [
                'title'         => 'Умови та конфіденційність',
                'slug'          => str_slug('Умови та конфіденційність'),
                'meta_title'    => 'Умови та конфіденційність',
                'status'        => 1,
                'created_at'    => Carbon::now()->toDateTimeString()
            ], [
                'title'         => 'Зворотний звя\'зок',
                'slug'          => str_slug('Зворотний звя\'зок'),
                'meta_title'    => 'Зворотний звя\'зок',
                'status'        => 1,
                'created_at'    => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
