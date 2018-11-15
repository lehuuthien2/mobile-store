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
        {!! Form::select('factory_id', $factories, old('factory_id', isset($factories) ? $factories : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('price', 'Giá tiền <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::number('price', isset($product) ? $product->price : null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('color', 'Màu sắc <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {{Form::select('color[]', COLOR, old('color',isset($product) ? $product->color : null),
         ['class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple'])}}
    </div>
</div>
<div class="form-group">
    {!! Form::label('storage', 'Bộ nhớ trong <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('storage',  isset($product) ? $product->storage : null , ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('pic1', 'Hình 1 <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-2">
        <input type="file" name="pic1" class="form-control"
               value="{!! isset($product) ? $product->picture['0'] : null !!}">
        @if(isset($product))
            <img src="{{(asset($product->picture['0']))}}" alt="Ảnh 1" width="150px" height="150px">
        @endif
    </div>

    {!! Form::label('pic2', 'Hình 2 <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-2">
        <input type="file" name="pic2" class="form-control"
               value="{!!  isset($product) ? $product->picture['1'] : null !!}">
        @if(isset($product))
            <img src="{{(asset($product->picture['1']))}}" alt="Ảnh 2" width="150px" height="150px">
        @endif
    </div>
    {!! Form::label('pic3', 'Hình 3 <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-2">
        <input type="file" name="pic3" class="form-control"
               value="{!!  isset($product) ? $product->picture['2'] : null !!}">
        @if(isset($product))
            <img src="{{(asset($product->picture['2']))}}" alt="Ảnh 3" width="150px" height="150px">
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('promotion', 'Khuyến mãi',['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('promotion', isset($product) ? $product->promotion : null, ['class' => 'form-control'] ) !!}
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
</div>
<div class="form-group">
    {!! Form::label('screen', 'Màn hình', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('screen', old('screen', isset($product) ? $product->description->screen : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('OS', 'Hệ điều hành', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('OS', old('OS', isset($product) ? $product->description->OS : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('camera', 'Camera', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('camera', old('screen', isset($product) ? $product->description->camera : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('cpu', 'CPU', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('cpu', old('cpu', isset($product) ? $product->description->cpu : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('ram', 'Ram', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('ram', old('ram', isset($product) ? $product->description->ram : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('sim', 'Thẻ sim', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('sim', old('sim', isset($product) ? $product->description->sim : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('pin', 'Dung lượng pin', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('pin', old('pin', isset($product) ? $product->description->pin : null), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('fingerprint', 'Vân tay', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('fingerprint', old('fingerprint', isset($product) ? $product->description->fingerprint : null), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Bài viết',['class' => 'control-label col-sm-6', 'style'=> 'font-size: 2em;']) !!}
    <div class="col-sm-12">
        {!! Form::textarea('body', old('body',isset($product) ? $product->body : null),
         ['class' => 'form-control' , 'id' => 'editor1'] ) !!}
    </div>
</div>
{{Form::hidden('product_id', isset($product) ? $product->product_id : null)}}
<div class="col-lg-offset-2 col-lg-10">
    {!! Form::submit('Lưu', ['class' =>'btn btn-primary']) !!}
    <input type="button" name="clear" value="Nhập lại" onclick="clearForm(this.form);" class="btn btn-default">
</div>
