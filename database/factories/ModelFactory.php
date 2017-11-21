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
        'user_id'     => random_int(1, 3),
        'name'        => $faker->name,
        'description' => $faker->text,
        'ingredient'  => [$faker->name, $faker->name, $faker->name, $faker->name],
        'image'       => $faker->imageUrl($width = 960, $height = 700),
        'video'       => ['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU'],
    ];
});

$factory->define(App\ProductImage::class, function (Faker\Generator $faker) {
    return [
        'product_id' => $faker->randomDigitNotNull,
        'image'      => $faker->imageUrl($width = 960, $height = 700)
    ];
});

$factory->define(App\Advert::class, function (Faker\Generator $faker) {
    return [
        'user_id'      => random_int(1, 3),
        'product_id'   => $faker->randomDigitNotNull,
        'sticker_id'   => $faker->randomElement([1, 2, 3]),
        'name'         => $faker->name,
        'description'  => $faker->text,
        'slug'         => str_slug($faker->name . '-' . str_random(8)),
        'quantity'     => $faker->randomDigitNotNull,
        'price'        => $faker->randomDigitNotNull,
        'custom_price' => $faker->randomDigitNotNull,
        'image'        => $faker->imageUrl($width = 960, $height = 700),
        'type'         => $faker->randomElement(['by_date', 'in_stock', 'pre_order']),
        'date'         => \Carbon\Carbon::now(),
        'date_from'    => \Carbon\Carbon::now(),
        'date_to'      => \Carbon\Carbon::now()
    ];
});

$factory->define(App\AdvertImage::class, function (Faker\Generator $faker) {
    return [
        'advert_id' => $faker->randomDigitNotNull,
        'image'     => $faker->imageUrl($width = 960, $height = 700)
    ];
});

$factory->define(App\AdvertToCategory::class, function (Faker\Generator $faker) {
    return [
        'advert_id'   => $faker->randomDigitNotNull,
        'category_id' => random_int(1, 11)
    ];
});

$factory->define(App\AdvertSticker::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => str_slug($faker->name)
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'role_id'  => random_int(0, 1),
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

$factory->define(App\Recipe::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => random_int(1, 3),
        'name'        => $faker->name,
        'description' => $faker->text,
        'ingredient'  => [$faker->name, $faker->name, $faker->name, $faker->name],
        'image'       => $faker->imageUrl($width = 960, $height = 700),
        'video'       => ['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU'],
    ];
});

$factory->define(App\RecipeImage::class, function (Faker\Generator $faker) {
    return [
        'recipe_id' => $faker->randomDigitNotNull,
        'image'     => $faker->imageUrl($width = 960, $height = 700)
    ];
});

$factory->define(App\Advice::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => random_int(1, 3),
        'name'        => $faker->name,
        'slug'        => str_slug($faker->name),
        'description' => $faker->text,
        'image'       => $faker->imageUrl($width = 960, $height = 700),
        'video'       => ['https://www.youtube.com/watch?v=ymGTJRw5lyU', 'https://www.youtube.com/watch?v=ymGTJRw5lyU'],
    ];
});

$factory->define(App\AdviceImage::class, function (Faker\Generator $faker) {
    return [
        'advice_id' => $faker->randomDigitNotNull,
        'image'     => $faker->imageUrl($width = 960, $height = 700)
    ];
});

$factory->define(App\Review::class, function (Faker\Generator $faker) {
    return [
        'product_id' => random_int(1, 20),
        'user_id'    => random_int(1, 3),
        'text'       => $faker->text(),
        'rating'     => random_int(1, 5)
    ];
});