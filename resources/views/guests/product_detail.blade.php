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
                        {!! Form::open(['url' => 'addCart/'. $product->product_id]) !!}
                        <h3 style="font-size: 200%;">{{$product->name}}</h3>
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
                        <br>
                        <label>Chọn màu :</label>
                        {!! Form::radio('color', 'Đen', true) !!}Đen
                        {!! Form::radio('color', 'Trắng') !!}<span
                            style="color: #d7ebf6">Trắng</span>
                        {!! Form::radio('color', 'Đỏ') !!}<span style="color: red;">Đỏ</span>
                    </div>
                    <div class="left-value-details">
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
                        {{--<a href="{{route('addCart', $product->product_id)}}" class="btn btn-warning"><span--}}
                        {{--class="glyphicon glyphicon-shopping-cart">Thêm vào giỏ hàng</span></a>--}}
                        <a href="#">{!! Form::submit('Thêm vào giỏ hàng',['style' => 'background: white; border: none; font-size: 1.5em']) !!}</a>
                        {!! Form::close() !!}
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
                    <div class="comments">
                        <p class="comment_head" style="font-size: 130%;">Bình luận</p>
                        <div class="comment_body" style="">
                            @if(Auth::check())
                                <div class="add-comment"
                                     style="margin-bottom: 30px; padding-bottom: 40px; border-bottom: 1px solid #e5e5e5;">
                                    <p>BÌNH LUẬN VỀ SẢN PHẨM</p>
                                    {!! Form::open(['url' => '/comment']) !!}
                                    {!! Form::hidden('user_id', Auth::user()->user_id) !!}
                                    {!! Form::hidden('product_id', $product->product_id) !!}
                                    <div>

                                    <textarea name="content" placeholder="Mời bạn nhập bình luận ..."
                                              class="form-control"
                                              style="width: 99%; height: 150px; margin: 0 auto"></textarea>
                                        {!! Form::submit('Đăng',['class' => 'btn btn-warning', 'style' => 'float:right; margin-top: 5px;']) !!}
                                    </div>
                                </div>
                            @endif
                            {!! Form::close() !!}
                            @php $i = 0; @endphp
                            @foreach($pagins as $item)
                                @foreach($comments as $comment)
                                    @if($comment['comment_id'] == $item->comment_id)
                                        @php $i++; @endphp
                                        <div class="comment-reply">
                                            <h3>{{$comment['name']}}</h3>
                                            <h3 style="font-size: 150%;">{!! $comment['content'] !!}</h3>
                                            <p>{{$comment['created_at']}}</p>
                                            @if(Auth::check())
                                                <button onclick="$('#reply{{$i}}').toggle()" class="btn btn-info">Trả lời
                                                </button>
                                                <div class="add-comment"
                                                     style="margin-bottom: 30px; margin-top:10px; padding-bottom: 20px; display:none" id="reply{{$i}}">
                                                    {!! Form::open(['url' => 'comment', 'id' => "reply$i"]) !!}

                                                    {!! Form::hidden('product_id', $product->product_id) !!}
                                                    {!! Form::hidden('user_id', Auth::user()->user_id) !!}
                                                    {!! Form::hidden('parent_id', $comment['comment_id']) !!}
                                                    <div>
                                                        <textarea name="content" placeholder="Mời bạn nhập bình luận ..."
                                                                  class="form-control"
                                                                  style="width: 99%; height: 150px; margin: 0 auto"></textarea>
                                                        {!! Form::submit('Đăng',['class' => 'btn btn-warning', 'style' => ' margin-top: 5px; float:right;']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            @endif
                                            @if(!empty($comment['reply']))
                                                @foreach($comment['reply'] as $reply)
                                                    <div class="comment-reply" style="margin-left:50px">
                                                        <h3>{{$reply['name']}}</h3>
                                                        <h3 style="font-size: 150%;">{!! $reply['content'] !!}</h3>
                                                        <p>{{$reply['created_at']}}</p>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            <div class="pagnation">
                                {{$pagins->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="clear"></div>
    </div>
    <script>
        // Get the button, and when the user clicks on it, execute myFunction
        document.getElementById("myBtn").onclick = function () {
            myFunction()
        };

        /* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
@endsection


