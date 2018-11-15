<!DOCTYPE HTML>
<html>
<head>
    <title>T&M Mobile</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <meta name="keywords"
          content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <link rel="stylesheet" href="{{asset('css/responsiveslides.css')}}">
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
<script src="{{asset('js\jquery-ui.min.js')}}"></script>
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
