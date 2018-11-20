@extends('layouts.guests')

@section('content')
    <style>
        .required {
            color: red;
            font-size: 1.5em;
        }
    </style>
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
                            <li>
                                <a href="{{route('guests.factory', $product->factory->slug)}}">{{$product->factory->name}}</a><img
                                    src="{{asset('images/arrow.png')}}"
                                    alt=""></li>
                            <li><a href="{{route('guests.product_detail', $product->slug)}}">{{$product->name}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="detalis-image">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($product->picture as $item)
                                <li data-thumb="{{asset($item)}}">
                                    <div class="thumb-image"><img src="{{asset($item)}}" data-imagezoom="true"
                                                                  class="img-responsive" alt=""/></div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="detalis-image-details">
                    <br>
                    <div class="brand-value">
                        {!! Form::open(['url' => 'addCart/'. $product->product_id]) !!}
                        <h3 style="font-size: 200%;">{{$product->name}}</h3>
                        <ul>
                            @if($product->in_stock == 0)
                                <li>
                                    Đã hết hàng
                                </li>
                            @else
                                <li>Giá:</li>
                                @if(isset($product->promotion))
                                    <li><span style="text-decoration: line-through">{{number_format($product->price, 0, ',' ,'.')}}
                                            VND</span></li>
                                    <li>
                                        <h5 style="font-size: 1.25em;">{{number_format($product->price - ($product->price * $product->promotion / 100) , 0 ,',','.')}}
                                            VND</h5></li>
                                @else <h5>{{number_format($product->price, 0 ,',','.')}} VND</h5>
                                @endif

                        </ul>
                        <br>
                        <label>Chọn màu :</label>
                        @foreach($product->color as $color)
                            <label>{!! Form::radio('color', $color, true) !!} {{$color}}</label>
                        @endforeach
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

                        <p> -Tặng ngay gậy selfie mini trị giá 150.000 VNĐ</p>

                        <p> -Tặng ngay Que chọc sim cao cấp trị giá :20.000đ</p>

                        <p> KHUYẾN MÃI HOT:</p>

                        <p> ♥ Mừng ngày nhà giáo Việt Nam 20/11 giảm 150.000đ tất cả khách hàng mới mua săm tại T&M
                            Mobile.</p>
                        <p> ♥ Đặc biệt giáo viên và học sinh sẽ giảm 200.0000đ trên toàn hệ thống T&M Mobile.</p>

                        {!! Form::submit('Thêm vào giỏ hàng',['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @endif
                    </div>
                    <div class="clear"></div>

                </div>
                <div class="clear"></div>
                <div class="menu_container">
                    <div class="info-detail">
                        <p class="menu_head" style="font-size: 130%;">Thông tin chi tiết<span class="plusminus">+</span>
                        </p>
                        <div class="menu_body" style="display: none;">
                            {!! $product->body !!}
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="thongso-kt">
                        <p class="menu_head" style="color: white; font-size: 130%;">Thông số kỹ thuật<span
                                class="plusminus">+</span></p>
                        <div class="menu_body" style="display: none;">
                            <label>Màn hình</label>
                            <p><b>{{$product->description->screen}}</b></p>
                            <label>Hệ điều hành</label>
                            <p>{{$product->description->OS}}</p>
                            <label>Camera</label>
                            <p>{{$product->description->camera}}</p>
                            <label>CPU</label>
                            <p>{{$product->description->cpu}}</p>
                            <label>Ram</label>
                            <p>{{$product->description->ram}}</p>
                            <label>Sim</label>
                            <p>{{$product->description->sim}}</p>
                            <label>Pin</label>
                            <p>{{$product->description->pin}}</p>
                            <label>Cảm biến vân tay</label>
                            <p>{{$product->description->fingerprint}}</p>
                        </div>
                    </div>
                    @if(!empty($comments) or Auth::check())
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
                                            @if ($errors->has('content'))
                                                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                            @endif
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
                                                <h3 style="font-size: 150%; ">{{$comment['name']}}</h3>
                                                <h3 style="color: #808080e3;">{!! $comment['content'] !!}</h3>
                                                <p>{{$comment['created_at']->diffForHumans()}}
                                                    , {{date_format($comment['created_at'], 'd-m-y h:i:s')}}</p>
                                                @if(Auth::check())
                                                    <button onclick="$('#reply{{$i}}').toggle()" class="btn btn-info">
                                                        Trả
                                                        lời
                                                    </button>
                                                    <div class="add-comment"
                                                         style="margin-bottom: 30px; margin-top:10px; padding-bottom: 20px; display:none"
                                                         id="reply{{$i}}">
                                                        {!! Form::open(['url' => 'comment', 'id' => "reply$i"]) !!}

                                                        {!! Form::hidden('product_id', $product->product_id) !!}
                                                        {!! Form::hidden('user_id', Auth::user()->user_id) !!}
                                                        {!! Form::hidden('parent_id', $comment['comment_id']) !!}
                                                        <div>
                                                        <textarea name="content"
                                                                  placeholder="Mời bạn nhập bình luận ..."
                                                                  class="form-control"
                                                                  style="width: 99%; height: 150px; margin: 0 auto"
                                                        ></textarea>
                                                            @if ($errors->has('content'))
                                                                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                                            @endif
                                                            {!! Form::submit('Đăng',['class' => 'btn btn-warning', 'style' => ' margin-top: 5px; float:right;']) !!}
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                @endif
                                                @if(!empty($comment['reply']))
                                                    @foreach($comment['reply'] as $reply)
                                                        <div class="comment-reply" style="margin-left:50px">
                                                            <h3 style="font-size: 150%; ">{{$reply['name']}}</h3>
                                                            <h3 style="color: #808080e3;">{!! $reply['content'] !!}</h3>
                                                            <p>{{$reply['created_at']->diffForHumans()}}
                                                                , {{date_format($reply['created_at'], 'd-m-y h:i:s')}}</p>
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
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="clear"></div>
    </div>
    <script>
        /* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
@endsection


