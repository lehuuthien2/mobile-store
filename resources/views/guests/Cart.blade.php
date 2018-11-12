@extends('layouts.guests')
@section('content')
    <div class="clear"></div>
    <div class="cart-body">
        <div class="guest-cart">
            <h4 style="font-size: 1.5em; color: #575757;">GIỎ HÀNG CỦA BẠN :</h4>
            <div class="cart">
                <div class="product-order">
                    <div class="cart-img">
                        <img src="images/XS/xs-search.png">
                    </div>
                    <div class="cart-info">
                        <div class="brand-value">
                            <h3 style="font-size: 200%;">Iphone XS Max 256GB</h3>
                            <br><label>Chọn màu :</label>
                            <input name="product-color" type="radio" value="color-1" checked alt="/"><span
                                        style="color: #d7ebf6">Trắng</span>
                            <input name="product-color" type="radio" value="color-2" alt="/">Đen
                            <input name="product-color" type="radio" value="color-3" alt="/"><span style="color: red;">Đỏ</span>

                            {{--</h3>--}}
                            <div class="left-value-details">
                                <ul>
                                    <li>Giá:</li>
                                    <li><span>39.990.000 đ</span></li>
                                    <li><h5>37.990.000 đ</h5></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div style="float:right; margin: 15px 50px 0 0;">
                            <label>Số lượng</label>
                            {{Form::selectRange('quantity', 1, 20)}}
                            <br><button type="button" class="button" name="xoa" style="margin-top: 20px;"><strong>Xóa sản phẩm</strong></button>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="product-order">
                    <div class="cart-img">
                        <img src="images/XS/xs-search.png">
                    </div>
                    <div class="cart-info">
                        <div class="brand-value">
                            <h3 style="font-size: 200%;">Iphone XS Max 256GB</h3>
                            <br><label>Chọn màu :</label>
                            <input name="product-color" type="radio" value="color-1" checked alt="/"><span
                                    style="color: #d7ebf6">Trắng</span>
                            <input name="product-color" type="radio" value="color-2" alt="/">Đen
                            <input name="product-color" type="radio" value="color-3" alt="/"><span style="color: red;">Đỏ</span>

                            {{--</h3>--}}
                            <div class="left-value-details">
                                <ul>
                                    <li>Giá:</li>
                                    <li><span>39.990.000 đ</span></li>
                                    <li><h5>37.990.000 đ</h5></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div style="float:right; margin: 15px 50px 0 0;">
                            <label>Số lượng</label>
                            {{Form::selectRange('quantity', 1, 20)}}
                            <br><button type="button" class="button" name="xoa" style="margin-top: 20px;"><strong>Xóa sản phẩm</strong></button>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="product-order">
                    <div class="cart-img">
                        <img src="images/XS/xs-search.png">
                    </div>
                    <div class="cart-info">
                        <div class="brand-value">
                            <h3 style="font-size: 200%;">Iphone XS Max 256GB</h3>
                            <br><label>Chọn màu :</label>
                            <input name="product-color" type="radio" value="color-1" checked alt="/"><span
                                    style="color: #d7ebf6">Trắng</span>
                            <input name="product-color" type="radio" value="color-2" alt="/">Đen
                            <input name="product-color" type="radio" value="color-3" alt="/"><span style="color: red;">Đỏ</span>

                            {{--</h3>--}}
                            <div class="left-value-details">
                                <ul>
                                    <li>Giá:</li>
                                    <li><span>39.990.000 đ</span></li>
                                    <li><h5>37.990.000 đ</h5></li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div style="float:right; margin: 15px 50px 0 0;">
                            <label>Số lượng</label>
                            {{Form::selectRange('quantity', 1, 20)}}
                            <br><button type="button" class="button" name="xoa" style="margin-top: 20px;"><strong>Xóa sản phẩm</strong></button>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="guest-info">
            <p style="font-size: 1.5em; color: red; font-weight: bold; padding-left: 20px;">Thông tin khách hàng </p>
            <br>
            <div class="info">
                <label>Họ và tên:<sup>*</sup></label><input type="text" name="hoten" placeholder="Nhập họ và tên">
                <label>Số điện thoại:<sup>*</sup></label><input type="text" name="phone"
                                                                placeholder="Nhập số điện thoại">
                <label>Địa chỉ:<sup>*</sup></label><input type="text" name="email" placeholder="Nhập địa chỉ">
                <label>Ghi chú :</label><textarea name="note-text" placeholder="Ghi chú ..." style="width: 75%; height: 100px; float: right;"></textarea>
            </div>
            <div class="clear"></div>
            <button type="button" class="btn btn-primary" name="message"><strong>ĐẶT HÀNG</strong></button>
            <div class="clear"></div>
        </div>
        <!--    <button type="button" class="button" name="order">ĐẶT HÀNG</button>-->
    </div>
@endsection
