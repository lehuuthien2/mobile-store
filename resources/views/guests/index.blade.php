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
                        <a href="{{ route('guests.product_detail', $product->product_id) }}">
                            <div class="grid_1_of_3 images_1_of_3">
                                <img src="{{asset($product->picture)}}">
                                <h3> {{$product->name}} </h3>
                                {{--                            @php  dd($product) @endphp--}}
                                {{--                            <p>{{$product->price}}</p>--}}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="content-grids">
                <h4>Sản phẩm bán chạy</h4>
                <div class="section group">
                    <div class="grid_1_of_4 images_1_of_4 products-info">
                        <img src="images/m1.jpg">
                        <a href="#">Duis aute irure dolor in reprehenderit sed do
                            eiusmod
                            tempor incididunt</a>
                        <h3>$260</h3>
                        {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    </div>
                    <div class="grid_1_of_4 images_1_of_4 products-info">
                        <img src="images/m2.jpg">
                        <a href="#">Duis aute irure dolor in reprehenderit sed do
                            eiusmod
                            tempor incididunt</a>
                        <h3>$150</h3>
                        <ul>
                            {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                            {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                            {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                            {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        </ul>
                    </div>
                    <div class="grid_1_of_4 images_1_of_4 products-info">
                        <img src="images/m7.jpg">
                        <a href="#">Duis aute irure dolor in reprehenderit sed do
                            eiusmod
                            tempor incididunt</a>
                        <h3>$130</h3>
                        <ul>
                            {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                            {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                            {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                            {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        </ul>
                    </div>
                    <div class="grid_1_of_4 images_1_of_4 products-info">
                        <img src="images/m4.jpg">
                        <a href="#">Duis aute irure dolor in reprehenderit sed do
                            eiusmod
                            tempor incididunt</a>
                        <h3>$460</h3>
                        <ul>
                            <li><a class="cart" href="#"> </a></li>
                            <li><a class="i" href="#"> </a></li>
                            <li><a class="Compar" href="#"> </a></li>
                            <li><a class="Wishlist" href="#"> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-grids">
                <h4>Điện thoại Iphone</h4>
                <div class="section group">
                    @foreach($iphones as $product)
                        <a href="{{ route('guests.product_detail', $product->product_id) }}">
                            <div class="grid_1_of_4 images_1_of_4 products-info">
                                <img src="{{asset($product->picture)}}">
                                {{$product->name}}
                                <h3>{{$product->price}}</h3>
                            </div>
                        </a>
                    @endforeach
                    {{--<div class="grid_1_of_4 images_1_of_4 products-info">--}}
                    {{--<img src="images/m6.jpg">--}}
                    {{--<a href="{{ route('guests.product_detail') }}">Duis aute irure dolor in reprehenderit sed do--}}
                    {{--eiusmod--}}
                    {{--tempor incididunt</a>--}}
                    {{--<h3>$100</h3>--}}
                    {{--<ul>--}}
                    {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="grid_1_of_4 images_1_of_4 products-info">--}}
                    {{--<img src="images/m7.jpg">--}}
                    {{--<a href="{{ route('guests.product_detail') }}">Duis aute irure dolor in reprehenderit sed do--}}
                    {{--eiusmod--}}
                    {{--tempor incididunt</a>--}}
                    {{--<h3>$180</h3>--}}
                    {{--<ul>--}}
                    {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="grid_1_of_4 images_1_of_4 products-info">--}}
                    {{--<img src="images/m1.jpg">--}}
                    {{--<a href="{{ route('guests.product_detail') }}">Duis aute irure dolor in reprehenderit sed do--}}
                    {{--eiusmod--}}
                    {{--tempor incididunt</a>--}}
                    {{--<h3>$140</h3>--}}
                    {{--<ul>--}}
                    {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="content-grids">
                    <h4>Điện thoại Samsung</h4>
                    <div class="section group">
                        @foreach($samsungs as $product)
                            <a href="{{ route('guests.product_detail', $product->product_id) }}">
                                <div class="grid_1_of_4 images_1_of_4 products-info">
                                    <img src="{{asset($product->picture)}}">
                                    {{$product->name}}
                                    <h3>{{$product->price}}</h3>
                                </div>
                            </a>
                        @endforeach
                        {{--<div class="grid_1_of_4 images_1_of_4 products-info">--}}
                        {{--<img src="images/m2.jpg">--}}
                        {{--<a href="{{ route('guests.product_detail') }}">Duis aute irure dolor in reprehenderit sed do--}}
                        {{--eiusmod--}}
                        {{--tempor incididunt</a>--}}
                        {{--<h3>$260</h3>--}}
                        {{--<ul>--}}
                        {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="grid_1_of_4 images_1_of_4 products-info">--}}
                        {{--<img src="images/m6.jpg">--}}
                        {{--<a href="{{ route('guests.product_detail') }}">Duis aute irure dolor in reprehenderit sed do--}}
                        {{--eiusmod--}}
                        {{--tempor incididunt</a>--}}
                        {{--<h3>$100</h3>--}}
                        {{--<ul>--}}
                        {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="grid_1_of_4 images_1_of_4 products-info">--}}
                        {{--<img src="images/m7.jpg">--}}
                        {{--<a href="{{ route('guests.product_detail') }}">Duis aute irure dolor in reprehenderit sed do--}}
                        {{--eiusmod--}}
                        {{--tempor incididunt</a>--}}
                        {{--<h3>$180</h3>--}}
                        {{--<ul>--}}
                        {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="grid_1_of_4 images_1_of_4 products-info">--}}
                        {{--<img src="images/m1.jpg">--}}
                        {{--<a href="{{ route('guests.product_detail') }}">Duis aute irure dolor in reprehenderit sed do--}}
                        {{--eiusmod--}}
                        {{--tempor incididunt</a>--}}
                        {{--<h3>$140</h3>--}}
                        {{--<ul>--}}
                        {{--<li><a class="cart" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="i" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Compar" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--<li><a class="Wishlist" href="{{ route('guests.product_detail') }}"> </a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    </div>

                </div>
            </div>
            <div class="clear"></div>
        </div>

@endsection

