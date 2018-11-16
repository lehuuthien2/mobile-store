@extends('manages.index')

@section('content')
    <style>
        label{
            float:left;
            width:10em;
        }
    </style>
    <p class="wrapper">
        <a href="{{route('orders.index')}}" class="btn btn-success">Quay lại</a>
    <h2>Người đặt:      {{$order->user_name}}</h2>
    <h2>Địa chỉ:        {{$order->address}}</h2>
    <h2>Số điện thoại:  {{$order->tel}}</h2>
    <a class="btn btn-success" href="{{route('orders.edit', $order->order_id)}}">
        <span class="icon_pencil-edit"></span>
        Edit
    </a>
    <form action="{{route('orders.destroy', $order->order_id)}}"
          method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a class="btn btn-danger" href="javascript:void(0);" onclick="$(this).parent().submit();">
            <i class="icon_close_alt"></i>
            Delete
        </a>
    </form>
    <br>
    <label style="font-size: 1.5em;">Hoá đơn gồm:</label>
    <p style="font-size: 1.5em;">{{$order->order_details->count()}} sản phẩm</p>
    <br>
    @foreach($order->order_details as $item)
        <label>Tên sản phẩm:</label>
        <p><a href="{{route('products.show', $item->product_id)}}">{{$item->product_name}}</a></p>
        <label>Bộ nhớ:</label>
        <p>{{$item->product_storage}}</p>
        <label>Màu sắc:</label>
        <p>{{$item->product_color}}</p>
        <label>Đơn giá:</label>
        <p>{{number_format($item->product_price,0,',','.')}}</p>
        <label>Số lượng:</label>
        <p>{{$item->product_quantity}}</p>
        @if(!empty($item->product_promotion))
            <label>Khuyến mãi:</label>
            <p>{{$item->product_promotion}}</p>
            @endif
        <label>Số tiền:</label>
        <p>{{number_format($item->amount,0,',','.')}}</p>
        <br>
        @endforeach
    <p>Last edited: {{$order->updated_at->diffForHumans()}}, {{date_format($order->updated_at, 'd-m-Y h:i:s')}}</p>
@endsection
