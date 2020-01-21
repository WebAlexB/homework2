<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddProductToCart(Request $request, Product $product)
    {
        Cart::instance('cart')->add(
            $product->id,
            $product->title,
            $request->product_count,
            $product->getPrice()
        )->associate('App\Product');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProductCount(Request $request, Product $product)
    {
        if ($product->count < $request->product_count) {
            return redirect()->back()->with("status", "The product '{$product->title}'' has only {$product->count}");
        }
        Cart::instance('cart')->update(
            $request->rowId,
            $request->product_count
        );
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct(Request $request, Product $product)
    {
        Cart::instance('cart')->remove($request->rowId);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createOrder(Request $request)
    {
        return view('cart.create', [
            'customerName' => Auth::user()->name,
            'customerSurname' => Auth::user()->surname
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreateRequest $request)
    {
        $order = new \App\Order();
        $order->user_id = Auth::user()->id;
        $order->status_id = $order->InProcess();
        $order->shipping_data_customer = $request->customername . '  ' . $request->customersurname;
        $order->shipping_data_country = $request->shipping_data_country;
        $order->shipping_data_city = $request->shipping_data_city;
        $order->shipping_data_address = $request->shipping_data_address;
        $order->total_price = Cart::instance('cart')->total();

        if ($order->save()) {
            foreach (Cart::instance('cart')->content() as $product) {
                $order->product()->attach($product->id, ['product_count' => $product->qty]);
            }
            Cart::instance('cart')->destroy();
            return redirect()->route('home');
        }
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
