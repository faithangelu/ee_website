<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'customer_first_name' => $faker->name,
        'customer_last_name' => $faker->name,
        'customer_email' => $faker->unique()->safeEmail,
        'customer_username' => $faker->name,
        'customer_user_type' => $faker->name,
        'customer_status' => $faker->name,
        'customer_password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
