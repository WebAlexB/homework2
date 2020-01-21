@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h2>
                        <div class="text-center">
                        </div>
                        {{ __('Creat Order') }}
                    </h2>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('cart.store.order')}}">
                        @csrf

                        <div class="row justify-content-center">
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
                                        @each('cart.parts.product_view_order',Cart::instance('cart')->content() , 'row')
                                        </tbody>

                                        <table class="table table-dark" style="width: 50%;float: right;">
                                            <tbody>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                                <td>Subtotal</td>
                                                <td>{{Cart::subtotal()}} $</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                                <td>Tax</td>
                                                <td>{{Cart::tax()}} $</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                                <td>Total</td>
                                                <td>{{Cart::total()}} $</td>
                                            </tr>
                                            </tbody>

                                            <div class="form-group row">
                                                <label for="customername"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Customer Name') }}</label>
                                                <div class="col-md-6">
                                                    <input id="customername" type="text"
                                                           class="form-control @error('customername') is-invalid @enderror"
                                                           name="customername" value={{$customerName}} required autofocus>

                                                    @error('customername')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="customersurname"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Customer Surname') }}</label>
                                                <div class="col-md-6">
                                                    <input id="customersurname" type="text"
                                                           class="form-control @error('customersurname') is-invalid @enderror"
                                                           name="customersurname" value={{$customerSurname}} required autofocus>

                                                    @error('customersurname')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="shipping_data_country"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Shipping Country') }}</label>
                                                <div class="col-md-6">
                                                    <input id="shipping_data_country" type="text"
                                                           class="form-control @error('shipping_data_country') is-invalid @enderror"
                                                           name="shipping_data_country" value="{{ old('shipping_data_country') }}" max="100" required
                                                           autocomplete="shipping_data_country" autofocus>

                                                    @error('shipping_data_country')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="shipping_data_city"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Shipping City') }}</label>
                                                <div class="col-md-6">
                                                    <input id="shipping_data_city" type="text"
                                                           class="form-control @error('shipping_data_city') is-invalid @enderror"
                                                           name="shipping_data_city"  value="{{ old('shipping_data_city') }}" max="50" required
                                                           autocomplete="shipping_data_city" autofocus>

                                                    @error('shipping_data_city')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="shipping_data_address"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>
                                                <div class="col-md-6">
                                                    <input id="shipping_data_address" type="text"
                                                           class="form-control @error('shipping_data_address') is-invalid @enderror"
                                                           name="shipping_data_address" value="{{ old('shipping_data_address') }}" max="150" required
                                                           autocomplete="shipping_data_address" autofocus>

                                                    @error('shipping_data_address')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </table>
                                    </table>

                            </div>
                            @else
                                <h3 class="text-center">
                                    There are no products in cart !
                                </h3>
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Store order') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

