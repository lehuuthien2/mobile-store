@extends('layouts.guests')

@section('content')
    <div class="col-auto" style="width: 80%; margin:0 auto;">
        <table class="table table-striped table-advance table-hover" style="margin: 0 auto;">
            <tbody>
            <tr>
                <th> Hoá đơn</th>
                <th>Người nhận</th>
                <th><i class=""></i> Địa chỉ</th>
                <th><i class=""></i> Tổng tiền</th>
                <th>Chi tiết</th>
                <th>Tình trạng</th>
            </tr>
            @php $i = 1 @endphp
            @foreach($orders as $order)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$order->user_name}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{number_format($order->total,0,',','.')}} VND</td>
                    <td><a href="{{route('guests.order_detail', $order->order_id)}}">Chi tiết</a></td>
                    <td>{{STATUS[$order->status]}}
                        @if($order->status == 1)
                            <a href="{{route('guests.cancel', $order->order_id)}}">Huỷ</a>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{$orders->links()}}
        </div>
    </div>
    <div class="clear"></div>
@endsection
