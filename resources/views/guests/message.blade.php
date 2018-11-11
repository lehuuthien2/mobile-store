@extends('layouts.guests')
@section('content')
    <div class="clear"></div>
    <div class="message-body">
        <div class="message-content">
            <h2 style="font-size: 200%; color: red; padding-top: 20px;">CHÚC MỪNG BẠN ĐÃ ĐẶT HÀNG THÀNH CÔNG</h2>
            <h2 style="font-size: 200%; color: red; text-align: center; padding-bottom: 20px; border-bottom: 1px solid #e5e5e5;">THÀNH CÔNG</h2>
            <h3 style="font-size: 150%; padding: 10px 0;">SẢN PHẨM CỦA BẠN LÀ:</h3>
            <div class="order-success">
                <div class="product-success">
                    <div class="product-img">
                        <img src="images/XS/xs-search.png">
                    </div>
                    <div class="order-info">
                        <p>Iphone XS Max 256GB</p>
                        <p>Màu : Đen</p>
                        <p>Số lượng : </p>
                        <p>Giá</p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="product-success">
                    <div class="product-img">
                        <img src="images/XS/xs-search.png">
                    </div>
                    <div class="order-info">
                        <p>Iphone XS Max 256GB</p>
                        <p>Màu : Đen</p>
                        <p>Số lượng : </p>
                        <p>Giá</p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="product-success">
                    <div class="product-img">
                        <img src="images/XS/xs-search.png">
                    </div>
                    <div class="order-info">
                        <p>Iphone XS Max 256GB</p>
                        <p>Màu : Đen</p>
                        <p>Số lượng : </p>
                        <p>Giá</p>
                    </div>
                </div>
                <div class="clear"></div>
                <p style="font-size: 150%; font-weight: bold; margin: 1em 0;">TỔNG TIỀN :</p>
                <a href="{{route('guests.index')}}" style="margin-left: 40%; padding-top: 3em;">Trở về trang chủ</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
