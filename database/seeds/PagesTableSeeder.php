<?php

use Illuminate\Database\Seeder;

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
            ], [
                'title'         => 'Допомога',
                'slug'          => str_slug('Допомога'),
                'meta_title'    => 'Допомога',
            ], [
                'title'         => 'Правила',
                'slug'          => str_slug('Правила'),
                'meta_title'    => 'Правила',
            ], [
                'title'         => 'Умови та конфіденційність',
                'slug'          => str_slug('Умови та конфіденційність'),
                'meta_title'    => 'Умови та конфіденційність',
            ], [
                'title'         => 'Зворотний звя\'зок',
                'slug'          => str_slug('Зворотний звя\'зок'),
                'meta_title'    => 'Зворотний звя\'зок',
            ]
        ]);
    }
}
