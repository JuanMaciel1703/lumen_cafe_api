<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{User, Product, Image};
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
        'type' => 'PRODUCT_TYPE_CAKE',
        'price' => $faker->randomFloat(2, 0, 200),
        'active' => $faker->numberBetween(0,1)
    ];
});

$factory->define(Image::class, function (Faker $faker) {
    return [
        'uri' => $faker->imageUrl('1000', '1000', 'food')
    ];
});