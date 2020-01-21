@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <hr>
                <h3 class="text-center"> {{ __ ('My Orders') }} </h3>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="album py-12 bg-light">
                    <div class="container">
                        <div class="row ">
                            @if (count($orders) !== 0)
                                @each('account.order.parts.order_view',$orders,'order')
                            @else

                                <div class="col-md-12">

                                    <h3 class="text-center"> {{ __ ('No orders !') }} </h3>
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        {{$orders->links()}}
    </div>
@endsection

