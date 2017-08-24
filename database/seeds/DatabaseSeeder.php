<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    }
}

class ProductSeeder extends Seeder {

    public function run()
    {
        DB::table('product')->delete();

        Product::create([
            'title' => 'First Post',
            'slug' => 'first-post',
            'excerpt' => 'First Post body',
            'content' => 'Content First Post body',
            'published' => true,
            //'published_at' => DB::raw('NOW()'), // для DateTime
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), // для timestamp
        ]);

        Product::create([
            'title' => 'Second Post',
            'slug' => 'second-post',
            'excerpt' => 'Second Post body',
            'content' => 'Content Second Post body',
            'published' => false,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);

        Product::create([
            'title' => 'Third Post',
            'slug' => 'third-post',
            'excerpt' => 'Third Post body',
            'content' => 'Content Third Post body',
            'published' => false,
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}