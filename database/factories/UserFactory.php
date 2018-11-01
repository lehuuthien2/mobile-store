<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factory
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factory provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(mobileS\User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'password' => $faker->password,
        'name' => $faker->name,
        'birthday' => $faker->date(),
        'gender' => $faker->numberBetween(1, 2),
        'address' => $faker->address,
        'tel' => '09052244' . $faker->numberBetween(10,99),
        'email' => $faker->unique()->safeEmail,
        'remember_token' => str_random(10),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
$factory->define(mobileS\Product::class, function (Faker $faker) {
    return [
        'factory_id' => $faker->numberBetween(1, 4),
        'name' => $faker->name,
        'body' => $faker->text,
        'color' => $faker->colorName,
        'price' => $faker->randomNumber(8),
        'storage' => '32 GB',
        'description' => $faker->text,
        'picture' => $faker->text,
        'in_stock' => $faker->randomNumber(2),
        'slug' => str_slug('name idf'),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});
$factory->define(mobileS\News::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,20),
        'title' => $faker->text(255),
        'summary' => $faker->text,
        'body' => $faker->text,
        'slug' => $faker->text(255),
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});

$factory->define(mobileS\Order::class, function (Faker $faker) {
    return [
        'factory_id' => $faker->numberBetween(1, 4),
        'user_id' => $faker->numberBetween(1,20),
        'total' => $faker->randomNumber(8),
        'user_name' => $faker->name,
        'address' => $faker->address,
        'tel' => $faker->phoneNumber,
        'status' => 'Đang tiến hành',
        'created_at' => $faker->unixTime,
        'updated_at' => $faker->unixTime,
    ];
});

