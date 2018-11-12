<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factory
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factory provide a conve nient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(mobileS\User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'password' => bcrypt('123123'),
        'name' => $faker->name,
        'birthday' => $faker->date(),
        'gender' => $faker->numberBetween(1, 2),
        'address' => $faker->address,
        'tel' => '09052244' . $faker->numberBetween(10, 99),
        'email' => $faker->unique()->safeEmail,
        'remember_token' => str_random(10),
        'permission' => $faker->numberBetween(1,3),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
$factory->define(mobileS\Product::class, function (Faker $faker) {
    return [
        'factory_id' => $faker->numberBetween(1, 4),
        'name' => $faker->name,
        'body' => $faker->text,
        'color' => json_encode([COLOR[array_rand(COLOR)], COLOR[array_rand(COLOR)]]),
        'price' => $faker->randomNumber(8),
        'storage' => json_encode([array_rand(STORAGE), array_rand(STORAGE)]),
        'description' => $faker->text,
        'picture' => json_encode(
            ['dfdf4545s56ss11dkf.jpg',
                '394534sdfsidfd454.jpg']),
        'in_stock' => $faker->randomNumber(2),
        'slug' => str_slug($faker->name),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
$factory->define(mobileS\News::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 20),
        'title' => $faker->text(255),
        'summary' => $faker->text,
        'body' => $faker->text,
        'slug' => str_slug($faker->text(255)),
        'thumbnail' => $faker->text(255),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});

$factory->define(mobileS\Order::class, function (Faker $faker) {
    return [
        'factory_id' => $faker->numberBetween(1, 4),
        'user_id' => $faker->numberBetween(1, 20),
        'total' => $faker->randomNumber(8),
        'user_name' => $faker->name,
        'address' => $faker->address,
        'tel' => $faker->phoneNumber,
        'status' => $faker->numberBetween(1,3),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});

