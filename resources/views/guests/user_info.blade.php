@extends('layouts.guests')

@section('content')
    <style>
        .required {
            color: red;
        }
    </style>
    {!! Form::model($user, ['url' => 'user/' . $user->user_id , 'method' => 'PUT',
                            'class' => 'form-validate form-horizontal', 'id' => 'selectform', 'files' => 'true',
                            'style' => 'margin:0 auto; width: 80%;']) !!}
    <div class="form-group">
        {!! Form::label('password', 'Password ' ,['class' => 'control-label col-sm-2'], false) !!}
        <div class="col-sm-9">
            {!! Form::password('password', ['class' => 'form-control'], old('password', isset($user) ? $user->password : null)) !!}
            @if ($errors->has('password'))
                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password-confirm ', 'Password confirm' ,['class' => 'control-label col-sm-2'],
        false) !!}
        <div class="col-sm-9">
            {!! Form::password('password_confirmation', ['class' => 'form-control'], old('password', isset($user) ? $user->password :
            null)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Họ và tên <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
        <div class="col-sm-9">
            {!! Form::text('name', old('name', isset($user) ? $user->name : null) , ['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('birthday', 'Ngày sinh' ,['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-9">
            {!! Form::text('birthday', old('birthday', isset($user) ? $user->birthday : null) , ['class' => 'form-control datepicker']) !!}
            @if ($errors->has('birthday'))
                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('gender', 'Giới tính' ,['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-6">
            <label>{!! Form::radio('gender', MALE,true, ['id' => 'gender_male']) !!}Nam</label>
            <label>{!! Form::radio('gender', FEMALE, false, ['id' => 'gender_female']) !!}Nữ</label>
            @if ($errors->has('gender'))
                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('tel', 'Số điện thoại <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
        <div class="col-sm-9">
            {!! Form::text('tel', old('tel', isset($user) ? $user->tel : null), ['class' => 'form-control']) !!}
            @if ($errors->has('tel'))
                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
        <div class="col-sm-9">
            {!! Form::email('email', old('email', isset($user) ? $user->email : null) , ['class' => 'form-control']) !!}
            @if ($errors->has('email'))
                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('address', 'Địa chỉ <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
        <div class="col-sm-9">
            {!! Form::text('address', old('adđress', isset($user) ? $user->adđress : null), ['class' => 'form-control']) !!}
            @if ($errors->has('address'))
                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('avatar', 'Ảnh đại diện',['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-9">
            <input type="file" name="avatar" class="form-control">
            @if(isset($user->avatar))
                <img class="img-thumbnail" src="{{(asset($user->avatar))}}" alt="Ảnh đại diện" width="150px"
                     height="150px">
            @endif
            @if ($errors->has('avatar'))
                <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    {!! Form::hidden('permission', 1) !!}
    {!! Form::hidden('username', $user->username) !!}
    {{Form::hidden('user_id', isset($user) ? $user->user_id : null)}}
    <div class="col-lg-offset-5 col-lg-7">
        {!! Form::submit('Lưu', ['class' =>'btn btn-primary']) !!}
        <input type="button" name="clear" value="Nhập lại" onclick="clearForm(this.form);" class="btn btn-default">
    </div>
    {!! Form::close() !!}
    <div class="clear"></div>
@endsection
