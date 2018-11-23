@extends('manages.index')

@section('content')
    <!--main content start-->
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group" style="text-align: right;margin-bottom: 30px;">
                    {!! Form::open(['method' => 'GET', 'route' => ['searchOrder', isset($keyword)]]) !!}
                    <div class="col-sm-12">
                        {!! Form::text('keyword', null, ['placeholder' => 'nhập mã đơn hàng muốn tìm','class' => 'search-input']) !!}
                        <button type="submit" class="btn btn-send ">Tìm kiếm</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <section class="panel">
                    <header class="panel-heading">
                        @if(empty($c))
                            Bảng đơn hàng
                        @else    <a href="{{route('orders.index')}}" class="btn btn-success" style="float:right">Quay
                            lại</a>
                        @endif
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th><i class="icon_profile"></i> Người đặt</th>
                            <th><i class=""></i> Địa chỉ</th>
                            <th><i class=""></i> Tổng tiền</th>
                            <th>Tình trạng</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @php $i = 1 @endphp
                        @foreach($orders as $order)
                            <tr>
                                <td><a href="{{route('orders.show', $order->order_id)}}">{{$order->order_id}}</a></td>
                                <td>{{$order->user_name}}</td>
                                <td>{{str_limit($order->address,30)}}</td>
                                <td>{{number_format($order->total,0,',','.')}} VND</td>
                                <td @if($order->status == 1) style="color:red;" @elseif ($order->status == 2) style="color:blue;"
                                    @elseif ($order->status == 0) style="color:black; text-decoration: line-through" @endif>
                                    {{STATUS[$order->status]}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="{{route('orders.edit', $order->order_id)}}"><i
                                                class="icon_pencil-edit"></i></a>
                                        <form action="{{route('orders.destroy', $order->order_id)}}"
                                              method="POST" onsubmit="return confirm('Are you sure?');"
                                              style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a class="btn btn-danger" href="javascript:void(0);"
                                               onclick="$(this).parent().submit();">
                                                <i class="icon_close_alt"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <div id="pagination" class="text-center">
            {{$orders->appends(Request::except('page'))->links()}}
        </div>
        <!-- page end-->
    </section>
    <!--main content end-->
@endsection
