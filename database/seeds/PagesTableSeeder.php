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
                'title'      => 'Про проект',
                'slug'       => str_slug('Про проект'),
                'content'    => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                'meta_title' => 'Про проект',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'title'      => 'Допомога',
                'slug'       => str_slug('Допомога'),
                'content'    => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                'meta_title' => 'Допомога',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'title'      => 'Правила',
                'slug'       => str_slug('Правила'),
                'content'    => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                'meta_title' => 'Правила',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'title'      => 'Умови та конфіденційність',
                'slug'       => str_slug('Умови та конфіденційність'),
                'content'    => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                'meta_title' => 'Умови та конфіденційність',
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'title'      => 'Зворотний звя\'зок',
                'slug'       => str_slug('Зворотний звя\'зок'),
                'content'    => 'Lorem Ipsum є псевдо латинський текст використовується у веб  дизайні типографіка  верстка і друку замість англійської підкреслити елементи дизайну над змістом',
                'meta_title' => 'Зворотний звя\'зок',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
