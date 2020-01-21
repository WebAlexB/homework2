@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center"> {{ __ ('WishList Page') }} </h1>
            </div>
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                @if(Cart::instance('wishlist')->count()>0)
                    <table class="table table-light">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                        </tr>
                        </thead>

                        <tbody>
                        @each('wishlist.parts.product_view',Cart::instance('wishlist')->content() , 'row')
                        </tbody>

                        <table class="table table-dark" style="width: 50%;float: right;">
                            <tbody>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>Subtotal</td>
                                <td>{{Cart::instance('wishlist')->subtotal()}} $</td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>Tax</td>
                                <td>{{Cart::instance('wishlist')->tax()}} $</td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>Total</td>
                                <td>{{Cart::instance('wishlist')->total()}} $</td>
                            </tr>
                            </tbody>

                        </table>
                        {{--                        <tfoot>--}}

                        {{--                        </tfoot>--}}
                    </table>

            </div>
            <div class="btn-group">
                <a href="{{ route('wishlist.create.order') }}"
                   class="btn btn-success">{{ __('Make an order') }}</a>
            </div>
            @else
                <h3 class="text-center">
                    There are no products in wishlist !
                </h3>
            @endif
        </div>

    </div>
@endsection

