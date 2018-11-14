@extends('layouts.guests')

@section('content')
    <div class="clear"></div>
    <div class="search-result">
        <h4 style="font-size: 2em; color: #575757;">Kết quả tìm kiếm :</h4>

            @if(!empty($products))
                @foreach($products as $product)
                    <a href="{{route('guests.product_detail', $product->product_id)}}">
                        <div class="search-content">
                            <div class="search-image">
                                <img src="{{asset($product->picture)}}" width="150px" height="150px">
                            </div>
                            <div class="search-info">
                                <div class="brand-value">
                                    <h3>{{$product->name}}</h3>
                                    <div class="search-product-detail">
                                        <ul>
                                            <li>Giá:</li>
                                            @if(isset($product->promotion))
                                                <li><span>{{number_format($product->price)}} VND</span></li>
                                                <li>
                                                    <h5>{{number_format($product->price - ($product->price * $product->promtion / 100))}}
                                                        VND</h5></li>
                                            @else <h5>{{number_format($product->price)}} VND</h5>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </a>
                @endforeach
            @else
                <h2>Không có sản phẩm nào phù hợp</h2>
            @endif
        </div>
        <div class="clear"></div>
@endsection

