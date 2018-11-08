@extends('layouts.guests')

@section('content')
<div class="clear"></div>
<div class="wrap">
    <div class="content">
        <div class="content-grids">
            <div class="details-page">
                <div class="back-links">
                    <ul>
                        <li><a href="{{ route('guests.index') }}">Trang chủ</a><img src="images/arrow.png" alt=""></li>
                        <li><a href="#">Hãng sản Xuất</a><img src="images/arrow.png" alt=""></li>
                        <li><a>Tên sản phẩm</a></li>
                    </ul>
                </div>
            </div>
            <div class="detalis-image">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="images/xsMax.png">
                            <div class="thumb-image"><img src="images/xsMax.png" data-imagezoom="true"
                                                          class="img-responsive" alt=""/></div>
                        </li>
                        <li data-thumb="images/xsMax.png">
                            <div class="thumb-image"><img src="images/xsMax.png" data-imagezoom="true"
                                                          class="img-responsive" alt=""/></div>
                        </li>
                        <li data-thumb="images/xsMax.png">
                            <div class="thumb-image"><img src="images/xsMax.png" data-imagezoom="true"
                                                          class="img-responsive" alt=""/></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="detalis-image-details">
                <br>
                <div class="brand-value">
                    <h3 style="font-size: 200%;">Iphone XS Max 256GB</h3>
                    <div class="left-value-details">
                        <ul>
                            <li>Giá:</li>
                            <li><span>39.990.000 đ</span></li>
                            <li><h5>37.990.000 đ</h5></li>
                        </ul>
                    </div>
<!--                    <div class="right-value-details">-->
<!--                        <a href="#">Instock</a>-->
<!--                        <p>No reviews</p>-->
<!--                    </div>-->
                    <div class="clear"></div>
                </div>
                <div class="brand-history">
                    <h3>Chương trình khuyến mãi :</h3><br>
                    <h2>Thế giới màn hình lớn chào đón bạn.</h2>
                    <p>
                        Xin giới thiệu chiếc iPhone màn hình lớn nhất từ trước đến nay khi bạn sẽ có
                        hai lựa chọn kích thước màn hình khác nhau, cùng ở chuẩn độ phân giải
                        Super Retina siêu sắc nét. Face ID cực nhanh, con chip mạnh mẽ và thông
                        minh nhất thế giới smartphone, hệ thống camera kép đột phá, iPhone Xs tập
                        hợp những điều bạn yêu thích nhất trên một chiếc iPhone.
                    </p>
                    <a href="{{route('guests.cart')}}">Add cart</a>
                </div>
                <!--		    		<div class="share">-->
                <!--		    			<ul>-->
                <!--		    				<li> <a href="#"><img src="images/facebook.png" title="facebook" /> Facebook</a></li>-->
                <!--		    				<li> <a href="#"><img src="images/twitter.png" title="Twiiter" />Twiiter</a></li>-->
                <!--		    				<li> <a href="#"><img src="images/rss.png" title="Rss" />Rss</a></li>-->
                <!--		    			</ul>-->
                <!--		    		</div>-->
                <div class="clear"></div>

            </div>
            <div class="clear"></div>
            <div class="menu_container">
                <div class="info-detail">
                    <p class="menu_head" style="font-size: 130%;">Thông tin chi tiết<span class="plusminus">+</span></p>
                    <div class="menu_body" style="display: none;">
                        <img  name="image" src="images/XS/xs-1.png" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum.</p>
                        <img  name="image2" src="images/XS/xs-4.png" alt="">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum.</p>
                        <img  name="image3" src="images/XS/xs-5.png" alt="">

                    </div>
                    <p class="menu_head" style="font-size: 130%;">Bình luận & Đánh giá<span class="plusminus">+</span></p>
                    <div class="menu_body" style="display: none;">
                        <p>theonlytutorials.com is providing a great varitey of tutorials and scripts to use it immediate on
                            any project!</p>
                    </div>
                </div>
                <div class="thongso-kt">
                    <p class="menu_head" style="color: white; font-size: 130%;">Thông số kỹ thuật<span class="plusminus">+</span></p>
                    <div class="menu_body" style="display: none;">
                        <p style="color: red; font-size: 120%;">Màn hình</p>
                        <p>Công nghệ màn hình :</p>
                        <p>Màu màn hình :</p>
                        <p>Chuẩn màn hình :</p>
                        <p>Độ phân giải màn hình :</p>
                        <p>Công nghệ cảm ứng :</p>
                        <p>Mặt kính màn hình :</p>
                        <p style="color: red; font-size: 120%;">Camera trước</p>
                        <p>Video Call :</p>
                        <p>Độ phân giải :</p>
                        <p>Thông tin khác :</p>
                        <p style="color: red; font-size: 120%;">Camera sau</p>
                        <p>Độ phân giải :</p>
                        <p>Quay phim :</p>
                        <p>Đèn Flash :</p>
                        <p>Chụp ảnh nâng cao :</p>
                        <p style="color: red; font-size: 120%;">Cấu hình phần cứng</p>
                        <p>Tốc độ CPU :</p>
                        <p>Số nhân :</p>
                        <p>Chipset :</p>
                        <p>RAM :</p>
                        <p>Chip đồ họa (GPU) :</p>
                        <p style="color: red; font-size: 120%;">Bộ nhớ & Lưu trữ</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--		    	<div class="content-sidebar">-->
    <!--		    		<h4>Categories</h4>-->
    <!--						<ul>-->
    <!--							<li><a href="#">Accord Mobiles</a></li>-->
    <!--							<li><a href="#">Ace Mobile</a></li>-->
    <!--							<li><a href="#">Acer Mobile</a></li>-->
    <!--							<li><a href="#">Airfone</a></li>-->
    <!--							<li><a href="#">Apple</a></li>-->
    <!--							<li><a href="#">Blackberry</a></li>-->
    <!--							<li><a href="#">Byond Tech</a></li>-->
    <!--							<li><a href="#">Celkon Mobiles</a></li>-->
    <!--							<li><a href="#">Dell Mobile Phones </a></li>-->
    <!--							<li><a href="#">Fly Mobile</a></li>-->
    <!--							<li><a href="#">Fujezone Mobiles </a></li>-->
    <!--							<li><a href="#">HTC</a></li>-->
    <!--							<li><a href="#">LG Mobiles</a></li>-->
    <!--							<li><a href="#">Longtel Mobile</a></li>-->
    <!--							<li><a href="#">Maxx</a></li>-->
    <!--							<li><a href="#">Micromax Mobiles </a></li>-->
    <!--							<li><a href="#">Samsung Mobiles</a></li>-->
    <!--							<li><a href="#">Sony Ericsson Mobiles</a></li>-->
    <!--							<li><a href="#">Wynncom Mobiles</a></li>-->
    <!--						</ul>-->
    <!--		    	</div>-->
</div>
<div class="clear"></div>
</div>
@endsection


