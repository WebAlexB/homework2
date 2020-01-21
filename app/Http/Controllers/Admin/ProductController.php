<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductCreateRequest $request)
    {
        $categories = Category::all();
        return view('admin.product.create',
            [
                'categories' => $categories
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pathThumbnail = $request->thumbnail->store(
            "/images/products/{$request->sku}",
            'public'
        );

        $product = new \App\Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->in_stock = $request->in_stock;
        $product->count = $request->count;
        $product->thumbnail = $pathThumbnail;

        if ($product->save()) {
            foreach ($request->selectcategory as $categoryID) {
                $product->category()->attach(
                    $categoryID
                );
                if (!empty($request->productimagesies)) {
                    foreach ($request->productimagesies as $ProductImage) {
                        $pathProductImage = $ProductImage->store(
                            "/images/products/{$request->sku}",
                            'public'
                        );
                        $product->image()->attach(
                            $pathProductImage
                        );
                    }
                }
            }
            return redirect()->route('product');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        dd($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        dd($product);
    }
}
