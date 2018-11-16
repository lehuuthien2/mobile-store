@extends('layouts.guests')

@section('content')
    <!--start-image-slider---->
    <div class="wrap">
        <div class="image-slider">
            <!-- Slideshow 1 -->
            <ul class="rslides" id="slider1">
                <li><img src="images/banner/banner-2.png" alt=""></li>
                <li><img src="images/banner/banner-3.png" alt=""></li>
                <li><img src="images/banner/banner-4.jpg" alt=""></li>
            </ul>
            <!-- Slideshow 2 -->
        </div>
        <!--End-image-slider---->
    </div>
    <div class="clear"></div>
    <div class="wrap">
        <div class="content">
            <div class="top-3-grids">
                <h4 style="font-size: 2em; color: #575757; margin-top: 20px;">Sản phẩm mới</h4>
                <div class="section group">
                    @foreach($new_products as $product)
                        <div class="grid_1_of_3 images_1_of_3">
                            <a href="{{ route('guests.product_detail', $product->slug) }}">
                                <img src="{{asset($product->picture['0'])}}">
                                <h3> {{$product->name}} </h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="content-grids">
                <h4>Sản phẩm bán chạy</h4>
                <div class="section group">
                    @foreach($best_products as $product)

                        <div class="grid_1_of_4 images_1_of_4 products-info">
                            <a href="{{ route('guests.product_detail', $product->slug) }}">
                                <img src="{{asset($product->picture['0'])}}">
                                {{$product->name}}
                                <h3>{{number_format($product->price, 0, ',','.')}}</h3>
                            </a>
                        </div>


                    @endforeach
                </div>
            </div>
            <div class="content-grids">
                <h4>Điện thoại Iphone</h4>
                <div class="section group">
                    @foreach($iphones as $product)

                        <div class="grid_1_of_4 images_1_of_4 products-info">
                            <a href="{{ route('guests.product_detail', $product->slug) }}">
                                <img src="{{asset($product->picture['0'])}}">
                                {{$product->name}}
                                <h3>{{number_format($product->price, 0, ',','.')}}</h3>
                            </a>
                        </div>


                    @endforeach
                </div>
                <div class="content-grids">
                    <h4>Điện thoại Samsung</h4>
                    <div class="section group">
                        @foreach($samsungs as $product)

                            <div class="grid_1_of_4 images_1_of_4 products-info">
                                <a href="{{ route('guests.product_detail', $product->slug) }}">
                                    <img src="{{asset($product->picture['0'])}}">
                                    {{$product->name}}
                                    <h3>{{number_format($product->price, 0, ',','.')}}</h3>
                                </a>
                            </div>

                        @endforeach
                    </div>

                </div>
            </div>
            <div class="clear"></div>
        </div>

@endsection

