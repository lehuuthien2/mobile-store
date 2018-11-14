@extends('layouts.guests')
@section('content')

    <div class="clear"></div>
    <div class="cart-body">
        <div class="guest-cart">
            <h4 style="font-size: 1.5em; color: #575757;">GIỎ HÀNG CỦA BẠN :</h4>
            <div class="cart">
                @if(isset($cart))
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th class="name">Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th class="quantity">Số lượng</th>
                            <th class="quantity">Đơn giá</th>
                            <th class="total">Số tiền</th>
                            <th colspan="2">Hành động</th>

                        </tr>
                        @foreach($cart as $item)
                            {!! Form::open(['url' => '/Cart/' . $item->rowId  , 'method' => 'POST']) !!}
                            <tr>
                                <td class="name"><a
                                        href="{{route('guests.product_detail', $item->id)}}">{{ $item->name }}</a>
                                </td>
                                <td>{{$item->options['color']}}</td>
                                <td class="name">{!! Form::selectRange('qty', 1, 20, old('qty', $item->qty )) !!}</td>
                                <td class="price">{{ number_format($item->price,0 ,'.', ',') }} VND</td>
                                <td class="total">{{ number_format($item->subtotal,0 ,'.', ',') }} VND</td>
                                {{--{!! Form::hidden('rowId', $item->rowId) !!}--}}
                                <td>{!!  Form::submit('Cập nhật', ['class' => 'btn btn-success'])!!}
                                </td>
                                {!!  Form::close()!!}
                                <td>
                                    {!! Form::open(['url' => '/Cart/' . $item->rowId  , 'method' => 'DELETE',
                                    'onsubmit' => "return confirm('Bạn muốn xoá sản phẩm này khỏi giỏ hàng?');"]) !!}
                                    {!! Form::submit('Xoá khỏi giỏ hàng',['class' => 'btn btn-danger']) !!}
                                    {!!  Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
            <div class="clear"></div>
        </div>
        <div class="guest-info">
            {!! Form::open(['url' => '/success', 'method' => 'POST']) !!}
            <p style="font-size: 1.5em; color: red; font-weight: bold; padding-left: 20px;">Thông tin khách hàng </p>
            <br>
            <div class="info">
                @if(Auth::check())
                    <label>Họ và tên:<sup>*</sup></label>
                    <input type="text" name="user_name" placeholder="Nhập họ và tên"
                           value="{{old('user_name', Auth::user()->name)}}">
                    <label>Số điện thoại:<sup>*</sup></label>
                    <input type="text" name="tel" placeholder="Nhập số điện thoại"
                           value="{{old('tel',Auth::user()->tel)}}">
                    <label>Địa chỉ:<sup>*</sup></label>
                    <input type="text" name="address" placeholder="Nhập địa chỉ"
                           value="{{old('address', Auth::user()->address)}}">
                    <label>Ghi chú :</label><textarea name="note-text" placeholder="Ghi chú ..."
                                                      style="width: 75%; height: 100px; float: right;">{{old('note')}}</textarea>
                    <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                @else
                    <label>Họ và tên:<sup>*</sup></label>
                    <input type="text" name="user_name" placeholder="Nhập họ và tên" value="{{old('user_name')}}">
                    <label>Số điện thoại:<sup>*</sup></label>
                    <input type="text" name="tel" placeholder="Nhập số điện thoại" value="{{old('tel')}}">
                    <label>Địa chỉ:<sup>*</sup></label>
                    <input type="text" name="address" placeholder="Nhập địa chỉ" value="{{old('address')}}">
                    <label>Ghi chú :</label><textarea name="note-text" placeholder="Ghi chú ..."
                                                      style="width: 75%; height: 100px; float: right;">{{old('note')}}</textarea>
                @endif
            </div>
            <div class="clear"></div>
            {!! Form::submit('Đặt hàng', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
            <div class="clear"></div>
        </div>
        <!--    <button type="button" class="button" name="order">ĐẶT HÀNG</button>-->
    </div>
@endsection
