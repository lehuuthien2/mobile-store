@extends('manages.index')

@section('content')
    <!--main content start-->
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="clear"></div>
                <section class="panel">
                    <header class="panel-heading" style="text-align: center;">
                        Thống kê số lượng sản phẩm trong
                        {!! Form::open(['url' => 'manages/statistics', 'method' => 'GET' ]) !!}
                        {!! Form::label('month', 'Tháng') !!}
                        {!! Form::selectRange('month', 1, 12, !empty(request()->input('month')) ? request()->input('month') : date('m') ) !!}
                        {!! Form::label('year', 'Năm') !!}
                        {!! Form::selectYear('year', 2017, 2050, !empty(request()->input('year')) ? request()->input('year') : date('Y') ) !!}
                        {!! Form::submit('Tìm', ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th>Stt</th>
                            <th><i class="icon_info_alt"></i> Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            {{--<th>Password</th>--}}
                            {{--<th><i class="icon_cogs"></i> Action</th>--}}
                        </tr>
                        @php $i = 1 @endphp

                        @if(isset($products))
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{\mobileS\Product::find($product->product_id)->name}}</td>
                                    <td>{{\mobileS\Product::find($product->product_id)->price}}</td>
                                    <td>{{$product->qty}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <div id="pagination" class="text-center">
            @if(isset($products))
                {{$products->appends(Request::except('page'))->links()}}
            @endif
        </div>
        <!-- page end-->
    </section>
    <!--main content end-->
@endsection
