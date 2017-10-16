<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => $faker->randomDigitNotNull,
        'name'        => $faker->name,
        'description' => $faker->text,
        'ingredient'  => [$faker->name, $faker->name, $faker->name, $faker->name],
        'thumbnail'   => $faker->imageUrl($width = 325, $height = 220),
        'image'       => $faker->imageUrl($width = 960, $height = 700),
        'video'       => ['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU']
    ];
});

$factory->define(\App\ProductImage::class, function ( Faker\Generator $faker) {
    return [
        'user_id'    => $faker->randomDigitNotNull,
        'product_id' => $faker->randomDigitNotNull,
        'thumbnail'  => $faker->imageUrl($width = 325, $height = 220),
        'image'      => $faker->imageUrl($width = 960, $height = 700)
    ];
});