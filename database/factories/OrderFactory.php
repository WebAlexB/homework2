<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\OrderStatus;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $user_id = User::all('id')->random(1)->toArray();
    $status_id = OrderStatus::all('id')->random(1)->toArray();
    return [
        'user_id' => $user_id[0]['id'],
        'status_id' => $status_id[0]['id'],
        'shopping_data_customer' => $faker->firstName.' '.$faker->LastName,
        'shopping_data_country' => $faker->country,
        'shopping_data_city' => $faker->city,
        'shopping_data_address' => $faker->address,
        'total_price' => $faker->randomFloat(2, 99,1200)
    ];
});

