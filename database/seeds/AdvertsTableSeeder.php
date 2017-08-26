<?php

use Illuminate\Database\Seeder;

class AdvertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adverts')->insert([
            'name' => 'Adverts 1',
            'description' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'product_id' => 1,
            'quantity' => 5,
            'price' => 120.5,
            'custom_price' => 140.5,
            'everyday' => 1,
            'category_id' => 1,
            'sticker_id' => 2,
            'sort_order' => 1,
            'status' => 1,
            'coocking_time_id' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        DB::table('adverts')->insert([
            'name' => 'Adverts 2',
            'description' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'product_id' => 2,
            'quantity' => 5,
            'price' => 120.5,
            'custom_price' => 140.5,
            'everyday' => 1,
            'category_id' => 1,
            'sticker_id' => 2,
            'sort_order' => 1,
            'status' => 1,
            'coocking_time_id' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

      	DB::table('adverts')->insert([
            'name' => 'Adverts 3',
            'description' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'product_id' => 3,
            'quantity' => 5,
            'price' => 120.5,
            'custom_price' => 140.5,
            'everyday' => 1,
            'category_id' => 1,
            'sticker_id' => 2,
            'sort_order' => 1,
            'status' => 1,
            'coocking_time_id' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

      	DB::table('adverts')->insert([
            'name' => 'Adverts 4',
            'description' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
            'product_id' => 4,
            'quantity' => 5,
            'price' => 120.5,
            'custom_price' => 140.5,
            'everyday' => 1,
            'category_id' => 1,
            'sticker_id' => 2,
            'sort_order' => 1,
            'status' => 1,
            'coocking_time_id' => 1,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);
    }
}
