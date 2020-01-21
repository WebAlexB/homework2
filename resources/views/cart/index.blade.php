@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center"> {{ __ ('Cart Page') }} </h1>
            </div>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                @if(Cart::instance('cart')->count()>0)
                    <table class="table table-light">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Count</th>
                            <th>Price</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>

                        <tbody>
                        @each('cart.parts.product_view',Cart::instance('cart')->content() , 'row')
                        </tbody>

                        <table class="table table-dark" style="width: 50%;float: right;">
                            <tbody>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>Subtotal</td>
                                <td>{{Cart::instance('cart')->subtotal()}} $</td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>Tax</td>
                                <td>{{Cart::instance('cart')->tax()}} $</td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>Total</td>
                                <td>{{Cart::instance('cart')->total()}} $</td>
                            </tr>
                            </tbody>

                        </table>
                    </table>

            </div>
            <div class="btn-group">
                <a href="{{ route('cart.create.order') }}"
                   class="btn btn-success">{{ __('Make an order') }}</a>
            </div>
            @else
                <h3 class="text-center">
                    There are no products in cart !
                </h3>
            @endif
        </div>

    </div>
@endsection
