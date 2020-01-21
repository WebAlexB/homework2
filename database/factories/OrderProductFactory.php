<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderProduct;

$factory->define(OrderProduct::class, function ($order_id, $product_id) {
    return [
        'order_id' => $order_id,
        'product_id' => $product_id,
        'product_count' => mt_rand(3, 19)
    ];
});
