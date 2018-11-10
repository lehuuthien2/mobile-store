@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    {!! Form::label('username', 'Username <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('username', old('username', isset($user) ? $user->username : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('password', 'Password <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::password('password', ['class' => 'form-control'], old('password', isset($user) ? $user->password : null)) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'Họ và tên <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name', isset($user) ? $user->name : null) , ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('birthday', 'Ngày sinh <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('birthday', old('birthday', isset($user) ? $user->birthday : null) , ['class' => 'form-control datepicker']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('gender', 'Giới tính <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-6">
        <label>{!! Form::radio('gender', MALE,true ) !!}Nam</label>
        <label>{!! Form::radio('gender', FEMALE) !!}Nữ</label>
    </div>
</div>
<div class="form-group">
    {!! Form::label('tel', 'Số điện thoại <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('tel', old('tel', isset($user) ? $user->tel : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('email', 'Email <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::email('email', old('email', isset($user) ? $user->email : null) , ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('address', 'Địa chỉ <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('address', old('adđress', isset($user) ? $user->adđress : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('avatar', 'Ảnh đại diện',['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        <input type="file" name="avatar" class="form-control"
               value="{{old('avatar', isset($user) ? $user->avatar : null)}}">
        @if(isset($user->avatar))
            <img src="{{(asset($user->avatar))}}" alt="Ảnh đại diện" width="150px" height="150px">
            @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('permission', 'Chức vụ <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::select('permission', [
                '2' => 'Sale',
                '3' => 'Writer'], old('permission', isset($user) ? $user->permission : null),
                 ['class' => 'form-control']) !!}
    </div>
</div>
{{Form::hidden('user_id', isset($user) ? $user->user_id : null)}}
<div class="col-lg-offset-2 col-lg-10">
    {!! Form::submit('Lưu', ['class' =>'btn btn-primary']) !!}
    <input type="button" name="clear" value="Nhập lại" onclick="clearForm(this.form);">
</div>
