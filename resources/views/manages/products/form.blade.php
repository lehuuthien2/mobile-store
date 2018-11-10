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
    {!! Form::label('name', 'Tên sản phẩm <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name', isset($product) ? $product->name : null) , ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('factory', 'Nhà sản xuất <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::select('factory_id') !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('price', 'Giá tiền <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('price', null, ['class' => 'control-label col-sm-2']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('color', 'Màu sắc <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('color',  null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('storage', 'Bộ nhớ <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
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
    {!! Form::label('description', 'Cấu hình',['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class' => 'form-control'] ) !!}
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
