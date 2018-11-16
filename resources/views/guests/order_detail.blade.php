@extends('layouts.guests')
@section('content')
    <style>
        label{
            float:left;
            width:10em;
        }
    </style>
    <div style="width: 40%; margin:0 auto;">
    <label style="font-size: 1.5em;">Hoá đơn gồm:</label>
    <p style="font-size: 1.5em;">{{$order->order_details->count()}} sản phẩm</p>
    <br>
    @foreach($order->order_details as $item)
        <label>Tên sản phẩm:</label>
        <p><a href="{{route('guests.product_detail', $item->product->slug)}}">{{$item->product_name}}</a></p>
        <label>Bộ nhớ:</label>
        <p>{{$item->product_storage}}</p>
        <label>Màu sắc:</label>
        <p>{{$item->product_color}}</p>
        <label>Đơn giá:</label>
        <p>{{number_format($item->product_price,0,',','.')}}</p>
        <label>Số lương:</label>
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
    </div>
@endsection
