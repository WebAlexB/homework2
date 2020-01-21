<?php

use App\ProductImage;
use App\Product;
use Illuminate\Database\Seeder;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idProducty = Product::all('id')->toArray();
        foreach ($idProducty as $index => $item) {
            factory(ProductImage::class, rand(2, 6))->create(['product_id' => $item['id']]);
        }
    }
}
