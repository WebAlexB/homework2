<?php

use App\Category;
use App\ProductCategory;
use App\Product;
use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idProduct = Product::all('id')->toArray();
        $idCategory = Category::all('id')->toArray();
        foreach ($idProduct as $index => $item) {
            mt_srand(time() * 1,0000);
            shuffle($idCategory);
            $maxCategory = mt_rand(2, count($idCategory) - 1);
            for ($i = 0; $i < $maxCategory; $i++) {
                factory(ProductCategory::class)
                    ->create([
                        'product_id' => $item['id'],
                        'category_id' => $idCategory[$i]['id']
                    ]);
            }
        }
    }
}