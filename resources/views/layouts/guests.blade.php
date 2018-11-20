<!DOCTYPE HTML>
<html>
<head>
    <title>T&M Mobile</title>
    <link rel="shortcut icon" href="{{asset('images/icons/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <meta name="keywords"
          content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <link rel="stylesheet" href="{{asset('css/responsiveslides.css')}}">
    <meta name="keywords"
          content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen"/>

    <!-- FlexSlider -->

    <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
    {{--<script src="{{asset('js/imagezoom.js')}}"></script>--}}
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
                controlNav: "true",
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
</head>
<body>
<div class="container">
    <div class="page-header">
        @include('../guests/template.header')
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    @yield('content')
    <div class="page-footer">
        @include('../guests/template.footer')
    </div>
</div>
<!-- Scripts -->
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $(function () {
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
</body>

</html>
