<head>

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <meta name="keywords"
          content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet'
          type='text/css'>
    <script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
    <script src="js/imagezoom.js"></script>
    <!-- FlexSlider -->

    <script defer src="js/jquery.flexslider.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 1
            $("#slider1").responsiveSlides({
                maxwidth: 1600,
                speed: 600
            });
        });
    </script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!----->
    <script>
        $(document).ready(function () {
            $(".menu_body").hide();
            //toggle the componenet with class menu_body
            $(".menu_head").click(function () {
                $(this).next(".menu_body").slideToggle(600);
                var plusmin;
                plusmin = $(this).children(".plusminus").text();

                // $(this).children(".plusminus").text(plusmin == '+' ? '-' : '+');


                if (plusmin == '+')
                    $(this).children(".plusminus").text('-');
                else
                    $(this).children(".plusminus").text('+');
            });
        });
    </script>
    <script type="text/javascript">
        window.onload = function(){
            setTimeout("switch_Image()", 3000);
        }
        var current = 1;
        var num_image = 9;
        function switch_Image(){
            current++;
            document.images['image'].src ='images/XS/xs-' + current + '.png';
            if(current < num_image){
                setTimeout("switch_Image()", 3000);
            }else if(current == num_image){
                current = 0;
                setTimeout("switch_Image()", 3000);
            }
        }
    </script>
    <script>

    </script>
</head>
<div class="wrap">
    <!----start-Header---->
    <div class="header">
        <div class="clear"></div>
        <div class="header-top-nav">
            <ul>
                <li><a href="#">Register</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="{{route('guests.cart')}}"><span>shopping cart&nbsp;&nbsp;: </span></a><label> &nbsp;noitems</label></li>
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
            <a href="{{ route('guests.index') }}"><img src="images/logo.png" title="logo"/></a>
        </div>
        <!----end-logo---->
        <!----start-top-nav---->
        <div class="top-nav" style="">
            <ul>
                <li><a href="{{ route('guests.index') }}">TRANG CHỦ</a></li>
                <li><a>HÃNG SẢN XUẤT</a>
                    <ul>
                        <li><a href="{{ route('guests.factory') }}">IPHONE</a></li>
                        <li><a href="{{ route('guests.factory') }}">SAMSUNG</a></li>
                        <li><a href="{{ route('guests.factory') }}">NOKIA</a></li>
                        <li><a href="{{ route('guests.factory') }}">HUAWEI</a></li>
                        <li><a href="{{ route('guests.factory') }}">XIAOMI</a></li>
                        <li><a href="{{ route('guests.factory') }}">OPPO</a></li>
                    </ul>
                </li>
                {{--<li><a href="store.php">PHỤ KIỆN</a></li>--}}
                <li><a href="{{route('guests.news')}}">TIN TỨC</a></li>
                {{--<li><a href="#">KHUYẾN MÃI</a></li>--}}
                <li><a href="{{route('guests.contact')}}">LIÊN HỆ</a></li>
                <li>
                    <div class="search-bar" style="">
                        {!! Form::open(['method' => 'Get', 'route' => ['guests.search', isset($search)]]) !!}
                        {!! Form::text('search') !!}
                        <button type="submit">Search</button>
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
