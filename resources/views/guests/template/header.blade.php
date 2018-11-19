@php
    $factories = \mobileS\Factory::all();

@endphp
<head>

</head>
<div class="wrap">
    <!----start-Header---->
    <div class="header">
        <div class="clear"></div>
        <div class="header-top-nav">
            <ul>
                @if(!Auth::check())
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    <li><a href="{{route('register')}}">Đăng ký</a></li>
                @else
                    <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                           href="{{route('user', Auth::user()->user_id)}}" role="button"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            {{--<span class="caret"></span>--}}
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li>
                        <a href="{{route('guests.orders', Auth::user()->user_id)}}">
                            Lịch sử đặt hàng
                        </a>
                    </li>
                @endif
                <li><a href="{{route('guests.cart')}}"><span>Giỏ hàng:</span> Có {{Cart::content()->count()}} sản phẩm</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
<div class="top-header">
    <div class="wrap">
        <!----start-logo---->
        <div class="logo">
            <a href="{{ route('guests.index') }}"><img src="{{asset('images/logo.png')}}" title="logo"/></a>
        </div>
        <!----end-logo---->
        <!----start-top-nav---->
        <div class="top-nav" style="">
            <ul>
                <li><a href="{{ route('guests.index') }}">TRANG CHỦ</a></li>
                <li><a>HÃNG SẢN XUẤT</a>
                    <ul>

                        @foreach($factories as $factory)
                            <li><a href="{{route('guests.factory', $factory->slug)}}">{{$factory->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('guests.news')}}">TIN TỨC</a></li>
                <li><a href="{{route('guests.contact')}}">LIÊN HỆ</a></li>
                <li>
                    <div class="search-bar" style="">
                        {!! Form::open(['method' => 'GET', 'route' => ['guests.search', isset($keyword)]]) !!}
                        {!! Form::text('keyword', null, ['placeholder' => 'nhập tên sản phẩm muốn tìm']) !!}
                        <button type="submit">Tìm kiếm</button>
                        {!! Form::close() !!}
                    </div>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!----End-top-nav---->
<!----End-Header---->
