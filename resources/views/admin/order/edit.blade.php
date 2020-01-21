@extends('layouts.app')

@section('content')

    <div class="container">

        <form action="{{route ('admin.order.update',$order->id)}}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="text-center">{{('Edit Order-'.$order->id)}}  </h1>
                    <hr>
                    <h2 class="text-center">{{('Customer-'.$order->getUserName())}}  </h2>
                    <hr>
                    <h3 class="text-center">{{('Shopping Customer-'.$order->shopping_data_customer)}}  </h3>
                    <hr>
                    <h5 class="text-center">{{('Status-'.$order->getStatus())}}  </h5>
                    <h5 class="text-center">
                        <fieldset>
                            <legend>Please select order status:</legend>
                            <div>
                                @foreach ($orderStatus as $status)
                                    <div class="container">
                                        <input type="radio" id="statusChoice{{$status->id}}"
                                               name="status" value="{{$status->name}}"
                                               @if($order->getStatus()===$status->name) checked @endif >
                                        <label for="statusChoice{{$status->id}}">{{$status->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </h5>
                    <hr>
                    <h5 class="text-center">{{('Shopping country-'.$order->shopping_data_country)}}  </h5>
                    <h5 class="text-center">{{('Shopping city-'.$order->shopping_data_city)}}  </h5>
                    <h5 class="text-center">{{('Shopping address-'.$order->shopping_data_address)}}  </h5>
                    <hr>
                    <h5 class="text-center">{{('Total price-'.$order->total_price)}}  </h5>
                    <hr>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <div class="btn-group">
                        <a href="{{ url()->previous() }}"
                           class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>

            {{--                <div class="d-flex justify-content-between align-items-center">--}}
            {{--                    <div class="btn-group">--}}
            {{--                        <a href="{{ url()->previous() }}"--}}
            {{--                           class="btn btn-sm btn-outline-dark">{{ __('Back') }}</a>--}}
            {{--                    </div>--}}
            {{--                    <div class="btn-group">--}}
            {{--                        <a href="{{route ('admin.order.update',$order->id)}} "--}}
            {{--                           class="btn btn-sm btn-outline-dark">{{ __('Save') }}</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </form>

        {{--        <form action="{{url()->previous()}}" method="get">--}}
        {{--            @csrf--}}
        {{--            <button type="submit" class="btn btn-primary">Back</button>--}}
        {{--        </form>--}}


    </div>


@endsection