@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    $factories = \mobileS\Factory::pluck('name','factory_id');

@endphp
<div class="form-group">
    {!! Form::label('name', 'Tên sản phẩm <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name', isset($product) ? $product->name : null) , ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('factory', 'Nhà sản xuất <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::select('factory_id', old('factory_id', isset($factories) ? $factories : null), null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('price', 'Giá tiền <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('color', 'Màu sắc <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {{Form::select('color[]', COLOR, old('color',isset($product) ? $product->color : null),
         ['class' => 'form-control', 'multiple' => 'multiple'])}}
    </div>
</div>
<div class="form-group">
    {!! Form::label('storage', 'Bộ nhớ trong <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('storage',  null , ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('picture', 'Hình ảnh <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        <input type="file" name="picture[]" class="form-control">
    </div>
</div>
<div class="form-group">
    {!! Form::label('promotion', 'Khuyến mãi',['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('promotion', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('in_stock', 'Số lượng',['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::number('in_stock', old('in_stock', isset($product) ? $product->in_stock : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Cấu hình',['class' => 'control-label col-sm-6']) !!}
    {{--<div class="col-sm-10">--}}
    {{--{!! Form::text('description', null, ['class' => 'form-control'] ) !!}--}}
    {{--</div>--}}
</div>
<div class="form-group">
    {!! Form::label('screen', 'Màn hình', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('screen', old('screen', isset($product) ? $product->screen : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('OS', 'Hệ điều hành', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('OS', old('OS', isset($product) ? $product->OS : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('camera', 'Camera', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('camera', old('screen', isset($product) ? $product->camera : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('cpu', 'CPU', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('cpu', old('cpu', isset($product) ? $product->cpu : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('ram', 'Ram', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('ram', old('ram', isset($product) ? $product->ram : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('sim', 'Thẻ sim', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('sim', old('sim', isset($product) ? $product->sim : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('pin', 'Dung lượng pin', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('pin', old('pin', isset($product) ? $product->pin : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('fingerprint', 'Vân tay', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('fingerprint', old('fingerprint', isset($product) ? $product->fingerprint : null), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'bài viết',['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('body', null, ['class' => 'form-control'] ) !!}
    </div>
</div>
{{Form::hidden('product_id', isset($product) ? $product->product_id : null)}}
<div class="col-lg-offset-2 col-lg-10">
    {!! Form::submit('Lưu', ['class' =>'btn btn-primary']) !!}
    <input type="button" name="clear" value="Nhập lại" onclick="clearForm(this.form);">
</div>
