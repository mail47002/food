<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('products')->insert([
            [
                'user_id'     => 1,
                'name'        => 'Продукт 1',
                'description' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
                'ingredients' => json_encode(['Картопля', 'Лосось', 'Цукіні', '"Оливкова олія']),
                'image'       => 'uploads/food1.jpg',
                'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                'sort_order'  => 0,
                'status'      => 1,
                'created_at'  => Carbon::now()->toDateTimeString()
            ], [
                'user_id'     => 1,
                'name'        => 'Продукт 2',
                'description' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
                'ingredients' => json_encode(['Картопля', 'Лосось', 'Цукіні', '"Оливкова олія']),
                'image'       => 'uploads/food1.jpg',
                'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                'sort_order'  => 1,
                'status'      => 1,
                'created_at'  => Carbon::now()->toDateTimeString()
            ], [
                'user_id'     => 1,
                'name'        => 'Продукт 3',
                'description' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
                'ingredients' => json_encode(['Картопля', 'Лосось', 'Цукіні', '"Оливкова олія']),
                'image'       => 'uploads/food1.jpg',
                'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                'sort_order'  => 2,
                'status'      => 1,
                'created_at'  => Carbon::now()->toDateTimeString()
            ], [
                'user_id'     => 1,
                'name'        => 'Продукт 4',
                'description' => 'Lorem Ipsum - це текст-"риба", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною "рибою" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку та склав на ній підбірку зразків шрифтів. "Риба" не тільки успішно пережила п\'ять століть, але й прижилася в електронному верстуванні, залишаючись по суті незмінною. Вона популяризувалась в 60-их роках минулого сторіччя завдяки виданню зразків шрифтів Letraset, які містили уривки з Lorem Ipsum, і вдруге - нещодавно завдяки програмам комп\'ютерного верстування на кшталт Aldus Pagemaker, які використовували різні версії Lorem Ipsum.',
                'ingredients' => json_encode(['Картопля', 'Лосось', 'Цукіні', '"Оливкова олія']),
                'image'       => 'uploads/food1.jpg',
                'videos'      => json_encode(['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']),
                'sort_order'  => 3,
                'status'      => 1,
                'created_at'  => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
