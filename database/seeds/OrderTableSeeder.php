<?php

use App\Product;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Order::class, 7)->create()->each(
            function ($order) {
                $order->product()->attach(Product::all()->random(3),
                    [
                        'product_count' => rand(1, 10)
                    ]
                );
            }
        );
    }
}
