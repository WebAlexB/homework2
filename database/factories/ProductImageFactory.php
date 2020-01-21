<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker,$product_id) {
    return [
        'image_path' => $faker->image('public/storage/images/products',300,400,null,true),
        'product_id'=>$product_id
    ];
});

