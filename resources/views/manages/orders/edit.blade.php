@extends('manages.index')

@section('content')
    <section class="wrapper">
        <!-- Form validations -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Chỉnh sửa đơn hàng
                        <a href="{{route('orders.index')}}" class="btn btn-success" style="float:right">Bảng đơn
                            hàng</a>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            {!! Form::model($order, ['url' => 'manages/orders/' . $order->order_id , 'method' => 'PUT',
                            'class' => 'form-validate form-horizontal', 'id' => 'selectform', 'files' => 'true']) !!}
                            <div class="form-group">
                                {!! Form::label('user_name', 'Người đặt hàng <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('user_name', old('user_name', isset($order) ? $order->user_name : null) , ['class' => 'form-control']) !!}
                                    @if ($errors->has('user_name'))
                                        <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('total', 'Tổng tiền <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('total',  isset($order) ? $order->total : null , ['class' => 'form-control','disabled']) !!}
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('address', 'Địa chỉ <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('address', old('address',isset($order) ? $order->address : null), ['class' => 'form-control'] ) !!}
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('tel', 'Số điện thoại <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('tel', old('tel',isset($order) ? $order->tel : null), ['class' => 'form-control'] ) !!}
                                    @if ($errors->has('tel'))
                                        <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', 'Tình trạng <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
                                <div class="col-sm-10">
                                    {!! Form::select('status', STATUS ,old('status',isset($order) ? $order->status : null), ['class' => 'form-control'] ) !!}
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('note', 'Ghi chú',['class' => 'control-label col-sm-2']) !!}
                                <div class="col-sm-10">
                                    {!! Form::label('note', isset($order) ? $order->note : null, ['class' => 'control-label'] ) !!}
                                </div>
                            </div>
                            <div class="col-lg-offset-2 col-lg-10">
                                {!! Form::submit('Lưu', ['class' =>'btn btn-primary']) !!}
                                <input type="button" name="clear" value="Nhập lại" onclick="clearForm(this.form);"
                                       class="btn btn-default">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
@endsection
