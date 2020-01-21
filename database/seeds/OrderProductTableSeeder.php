<?php

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Database\Seeder;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_id = Order::all('id')->toArray();
        $product_id = Product::all('id')->toArray();
        foreach ($order_id as $index => $item) {
            shuffle($product_id);
            $maxProduct = mt_rand(1, count($product_id) / 2);
            for ($i = 0; $i < $maxProduct; $i++) {
                factory(OrderProduct::class)->create([
                    'order_id' => $item['id'],
                    'product_id' => $product_id[$i]['id']
                ]);
            }
        }
    }
}


//public function run()
//{
//    factory(App\ProductGallery::class,10)->create();
//    factory(App\Product::class,5)->create()->each(
//        function ($product) {
//            $product->galleryImages()->attach(\App\ProductGallery::all()->random(6));
//            $product->categories()->attach(\App\Category::all()->random(2));
//        });
//}

