@extends('layouts.guests')

@section('content')
    <div class="clear"></div>
    <div class="wrap">
        <div class="content">
            <div class="content-grids">
                <div class="details-page">
                    <div class="back-links">
                        <ul>
                            <li><a href="{{ route('guests.index') }}">Trang chủ</a><img
                                        src="{{asset('images/arrow.png')}}" alt="">
                            </li>
                            <li><a href="#">{{$product->factory->name}}</a><img src="{{asset('images/arrow.png')}}"
                                                                                alt=""></li>
                            {{--                        @php dd($product) @endphp--}}
                            <li><a>{{$product->name}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="detalis-image">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{asset('images/xsMax.png')}}">
                                <div class="thumb-image"><img src="{{asset('images/xsMax.png')}}" data-imagezoom="true"
                                                              class="img-responsive" alt=""/></div>
                            </li>
                            <li data-thumb="{{asset('images/xsMax.png')}}">
                                <div class="thumb-image"><img src="{{asset('images/xsMax.png')}}" data-imagezoom="true"
                                                              class="img-responsive" alt=""/></div>
                            </li>
                            <li data-thumb="{{asset('images/xsMax.png')}}">
                                <div class="thumb-image"><img src="{{asset('images/xsMax.png')}}" data-imagezoom="true"
                                                              class="img-responsive" alt=""/></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="detalis-image-details">
                    <br>
                    <div class="brand-value">
                        <h3 style="font-size: 200%;">{{$product->name}}</h3>
                        <div class="left-value-details">
                            <ul>
                                <li>Giá:</li>
                                @if(isset($product->promotion))
                                    <li><span>{{$product->price}}đ</span></li>
                                    <li><h5>{{$product->price - ($product->price * $product->promtion / 100)}}</h5></li>
                                @else <h5>{{$product->price}} </h5>
                                @endif
                            </ul>
                        </div>
                        <!--                    <div class="right-value-details">-->
                        <!--                        <a href="#">Instock</a>-->
                        <!--                        <p>No reviews</p>-->
                        <!--                    </div>-->
                        <div class="clear"></div>
                    </div>
                    <div class="brand-history">
                        <h3 style="padding-bottom: 20px; color: red; font-weight: bold;">Chương trình khuyến mãi :</h3>
                        <p>Bắt đầu từ 1/12/2018 Khi mua hàng tại hệ thống cửa hàng T&M Mobile.
                            Quý khách sẽ được ( BẢO HÀNH Tại các hệ thống của T&M Mobile)
                            NGUỒN và MÀN HÌNH 1 tháng PHẦN CỨNG 6 tháng, ĐỔI MỚI trong 30 ngày và được gói KHUYẾN MẠI
                            cực khủng:
                        </p>
                        <p>-Gói KM : Cáp + Sac chính hãng trị giá 250k, tai nghe S7 trị giá 150k, ốp lưng trị giá 100k,
                            dán màn hình</p>
                        <p>ƯU ĐÃI LỚN:</p>

                        <p> -DÙNG THỬ 10 NGÀY MIẾN PHÍ</p>

                        <p> -TRẢ GÓP LÃI XUẤT THẤP CMND+BLX</p>

                        <p> -TRẢ GÓP LÃI XUẤT 0% QUA THẺ TÍN DỤNG</p>

                        <p> -Trợ giá mua tai nghe AKG với giá chỉ 99.000đ</p>

                        <p> -Tặng ngay gậy selfie mini trị giá 150.000 VNĐ</p>

                        <p> -Tặng ngay Que chọc sim cao cấp trị giá :20.000đ</p>


                        <p> ♥ Freeship khi khách hàng đặt hàng ONLINE chuyển khoản 100% giá trị sản phẩm.</p>

                        <p> KHUYẾN MÃI HOT:</p>

                        <p> ♥ Mừng ngày nhà giáo Việt Nam 20/11 giảm 150.000đ tất cả khách hàng mới mua săm tại T&M
                            Mobile.</p>
                        <p> ♥ Đặc biệt giáo viên và học sinh sẽ giảm 200.0000đ trên toàn hệ thống T&M Mobile.</p>
                        <a href="{{route('guests.cart')}}">Add cart</a>
                    </div>
                    <div class="clear"></div>

                </div>
                <div class="clear"></div>
                <div class="menu_container">
                    <div class="info-detail">
                        <p class="menu_head" style="font-size: 130%;">Thông tin chi tiết<span class="plusminus">+</span>
                        </p>
                        <div class="menu_body" style="display: none;">
                            {{$product->body}}
                        </div>
                        <p class="menu_head" style="font-size: 130%;">Bình luận<span class="plusminus">+</span></p>
                        <div class="menu_body" style="display: none;">
                            <div class="add-comment"
                                 style="margin-bottom: 30px; padding-bottom: 30px; border-bottom: 1px solid #e5e5e5;">
                                <p>BÌNH LUẬN VỀ SẢN PHẨM</p>
                                <textarea name="comment-text" placeholder="Mời bạn nhập bình luận ..."
                                          style="width: 90%; height: 150px;"></textarea>
                            </div>
                            <div class="comment-reply">
                                <p>Tên user</p>
                                <p>Nội dung bình luận của user</p>
                                <p>Trả lời : July 11, 2018</p>
                                <p style="border: 1px dashed black;">Nội dung trả lời của addmin</p>
                            </div>
                            <div class="comment-reply">
                                <p>Tên user</p>
                                <p>Nội dung bình luận của user</p>
                                <p>Trả lời : July 11, 2018</p>
                                <p style="border: 1px dashed black;">Nội dung trả lời của addmin</p>
                            </div>
                            <div class="comment-reply">
                                <p>Tên user</p>
                                <p>Nội dung bình luận của user</p>
                                <p>Trả lời : July 11, 2018</p>
                                <p style="border: 1px dashed black;">Nội dung trả lời của addmin</p>
                            </div>
                            <div class="comment-reply">
                                <p>Tên user</p>
                                <p>Nội dung bình luận của user</p>
                                <p>Trả lời : July 11, 2018</p>
                                <p style="border: 1px dashed black;">Nội dung trả lời của addmin</p>
                            </div>
                            <div class="comment-reply">
                                <p>Tên user</p>
                                <p>Nội dung bình luận của user</p>
                                <p>Trả lời : July 11, 2018</p>
                                <p style="border: 1px dashed black;">Nội dung trả lời của addmin</p>
                            </div>
                            <div class="pagnation">
                                <ul>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a>....</li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="thongso-kt">
                        <p class="menu_head" style="color: white; font-size: 130%;">Thông số kỹ thuật<span
                                    class="plusminus">+</span></p>
                        <div class="menu_body" style="display: none;">
                            {{$product->description}}
                            {{--<p style="color: red; font-size: 120%;">Màn hình</p>--}}
                            {{--<p>Công nghệ màn hình :</p>--}}
                            {{--<p>Màu màn hình :</p>--}}
                            {{--<p>Chuẩn màn hình :</p>--}}
                            {{--<p>Độ phân giải màn hình :</p>--}}
                            {{--<p>Công nghệ cảm ứng :</p>--}}
                            {{--<p>Mặt kính màn hình :</p>--}}
                            {{--<p style="color: red; font-size: 120%;">Camera trước</p>--}}
                            {{--<p>Video Call :</p>--}}
                            {{--<p>Độ phân giải :</p>--}}
                            {{--<p>Thông tin khác :</p>--}}
                            {{--<p style="color: red; font-size: 120%;">Camera sau</p>--}}
                            {{--<p>Độ phân giải :</p>--}}
                            {{--<p>Quay phim :</p>--}}
                            {{--<p>Đèn Flash :</p>--}}
                            {{--<p>Chụp ảnh nâng cao :</p>--}}
                            {{--<p style="color: red; font-size: 120%;">Cấu hình phần cứng</p>--}}
                            {{--<p>Tốc độ CPU :</p>--}}
                            {{--<p>Số nhân :</p>--}}
                            {{--<p>Chipset :</p>--}}
                            {{--<p>RAM :</p>--}}
                            {{--<p>Chip đồ họa (GPU) :</p>--}}
                            {{--<p style="color: red; font-size: 120%;">Bộ nhớ & Lưu trữ</p>--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="clear"></div>
    </div>
@endsection


