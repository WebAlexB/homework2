@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if( Storage::has ($product->thumbnail))
                <img src="{{ Storage::url($product->thumbnail) }}" height="250" width="250" class="card-img-top"
                     style="max-width: 45%; margin: 0 auto; display: block;">
            @endif
            <div class="col-md-6">
                <h4>Title :</h4>
                <p> {{__($product->title) }} </p>
                <h4>Discription :</h4>
                <p> {{__($product->description) }} </p>
                <p>Price: {{($product->getPrice()) }}</p>
                <p>SKU: {{($product->sku) }}</p>
                <p>Count: {{($product->count) }}</p>
            </div>
            <div class="col-md-6">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div>
                            <p>Product Categories : </p>
                            @each('categories.parts.category_view',$categories,'category')
                        </div>
                    </div>
                    @auth
                        @if($product->count>0)
                            <div>
                                <p>Add to Cart :</p>
                                <form action="{{route('cart.add',$product)}}" method="post" form class="form-inline">
                                    @csrf
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="product_count" class="sr-only">Count</label>
                                        <input type="number" name="product_count" class="form-control" id="product_count" min="1" max="{{$product->count}}" value="1">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Buy</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </div>
@endsection
