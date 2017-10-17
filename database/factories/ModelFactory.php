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

$factory->define(App\ProductImage::class, function (Faker\Generator $faker) {
    return [
        'user_id'    => $faker->randomDigitNotNull,
        'product_id' => $faker->randomDigitNotNull,
        'thumbnail'  => $faker->imageUrl($width = 325, $height = 220),
        'image'      => $faker->imageUrl($width = 960, $height = 700)
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'     => $faker->name,
        'slug'     => str_slug($faker->name),
        'about'    => $faker->text,
        'image'    => $faker->imageUrl(210, 210),
        'phone'    => ['+38 (011) 111 11 11', '+38 (022) 222 22 22'],
        'email'    => $faker->email,
        'password' => bcrypt('123456'),
        'verified' => 1
    ];
});

$factory->define(App\UserRole::class, function (Faker\Generator $faker) {
    return [
        'role_id' => $faker->randomElement([0, 1]),
    ];
});