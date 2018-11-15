@extends('layouts.guests')

@section('content')
    <div class="wrap">
        <div class="content">
            <div class="content-grids">
                <h4>Điện thoại {{$factory->name}}</h4>
                <div class="section group">
                    @foreach($products as $product)
                        <div class="grid_1_of_4 images_1_of_4 products-info">
                            <a href="{{route('guests.product_detail', $product->product_id)}}">
                                <img src="{{asset($product->picture['0'])}}">
                                {{$product->name}}
                                <h3>{{$product->price}}</h3>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="pagnation">
                    {{$products->links()}}
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection

