@php
    $factories = \mobileS\Factory::pluck('name','factory_id');
@endphp
<div class="form-group">
    {!! Form::label('name', 'Tên sản phẩm <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name', isset($product) ? $product->name : null) , ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('factory', 'Nhà sản xuất <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::select('factory_id', $factories, old('factory_id', isset($product) ? $product->factory_id : null), ['class' => 'form-control']) !!}
        @if ($errors->has('factory_id'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('factory_id') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('price', 'Giá tiền <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::number('price', isset($product) ? $product->price : null, ['class' => 'form-control']) !!}
        @if ($errors->has('price'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('color', 'Màu sắc <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {{Form::select('color[]', COLOR, old('color',isset($product) ? $product->color : null),
         ['class' => 'form-control js-example-basic-multiple', 'multiple' => 'multiple'])}}
        @if ($errors->has('color'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('storage', 'Bộ nhớ trong <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('storage',  isset($product) ? $product->storage : null , ['class' => 'form-control']) !!}
        @if ($errors->has('storage'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('storage') }}</strong>
                                    </span>
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
    {!! Form::label('in_stock', 'Số lượng <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::number('in_stock', old('in_stock', isset($product) ? $product->in_stock : null), ['class' => 'form-control']) !!}
        @if ($errors->has('in_stock'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('in_stock') }}</strong>
                                    </span>
        @endif
    </div>
</div>
@if(isset($product))
    <div class="form-group">
        @php
            $count = count($product->picture);
        @endphp

        <a href="{{route('addImage', $product->product_id)}} "
           class="btn btn-success addImage col-sm-offset-5" style="">
            <span>Thêm hình</span>
        </a>
    </div>
@endif
<div class="form-group">
    @if(empty($product->picture))
        @for($k = 1; $k <= 3; $k++)
            {!! Form::label("pic$k", "Hình $k<span class='required'>*</span> " ,['class' => 'control-label col-sm-2'], false) !!}
            <div class="col-sm-2">
                <input type="file" name="pic[]" class="form-control">
                @if ($errors->has('pic'))
                    <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('pic') }}</strong>
                                    </span>
                @endif
                <div style="width:150px; height: 160px;"></div>
            </div>
        @endfor
    @else
        @php $i = 0 @endphp
        @for($k = 0; $k < $count; $k++)
            @php $i++ @endphp
            {!! Form::label("pic$i", "Hình $i<span class='required'>*</span> " ,['class' => 'control-label col-sm-2'], false) !!}
            <div class="col-sm-2" style="">
                <input type="file" name="pic[]" class="form-control">
                @if ($errors->has('pic'))
                    <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('pic') }}</strong>
                                    </span>
                @endif
                @if(($product->picture[$k]) != '')
                    <img src="{{asset($product->picture[$k])}}" alt="Ảnh {{$i}}" width="150px" height="150px">
                    <a href="{{route('removeImage', ['product_id' => $product->product_id, 'image' => $product->picture[$k]])}} "
                       onclick="return confirm('Bạn muốn xoá hình này?')"
                       class="btn btn-danger removeImage" style="margin-left:50px; margin-bottom: 10px;">
                        <span>X</span>
                    </a>
                @else
                    <div style="width:150px; height: 160px;"></div>
                @endif
            </div>
        @endfor
    @endif
</div>

<div class="form-group">
    {!! Form::label('description', 'Cấu hình',['class' => 'control-label col-sm-offset-5', 'style'=> 'font-size: 2em;']) !!}
</div>

<div class="form-group">
    {!! Form::label('screen', 'Màn hình <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('screen', old('screen', isset($product) ? $product->description->screen : null), ['class' => 'form-control']) !!}
        @if ($errors->has('screen'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('screen') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('OS', 'Hệ điều hành <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('OS', old('OS', isset($product) ? $product->description->OS : null), ['class' => 'form-control']) !!}
        @if ($errors->has('OS'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('OS') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('camera', 'Camera <span class="required">*</span>', ['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('camera', old('screen', isset($product) ? $product->description->camera : null), ['class' => 'form-control']) !!}
        @if ($errors->has('camera'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('camera') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('cpu', 'CPU <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('cpu', old('cpu', isset($product) ? $product->description->cpu : null), ['class' => 'form-control']) !!}
        @if ($errors->has('cpu'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('cpu') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('ram', 'Ram <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('ram', old('ram', isset($product) ? $product->description->ram : null), ['class' => 'form-control']) !!}
        @if ($errors->has('ram'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('ram') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('sim', 'Thẻ sim <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('sim', old('sim', isset($product) ? $product->description->sim : null), ['class' => 'form-control']) !!}
        @if ($errors->has('sim'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('sim') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('pin', 'Dung lượng pin <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('pin', old('pin', isset($product) ? $product->description->pin : null), ['class' => 'form-control']) !!}
        @if ($errors->has('pin'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('pin') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('fingerprint', 'Vân tay <span class="required">*</span>', ['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('fingerprint', old('fingerprint', isset($product) ? $product->description->fingerprint : null), ['class' => 'form-control']) !!}
        @if ($errors->has('fingerprint'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('fingerprint') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Bài viết <span class="required">*</span>',['class' => 'control-label col-sm-offset-5', 'style'=> 'font-size: 2em;'], false) !!}
    <div class="col-sm-12">
        {!! Form::textarea('body', old('body',isset($product) ? $product->body : null),
         ['class' => 'form-control ckeditor'] ) !!}
        @if ($errors->has('body'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
        @endif
    </div>
</div>
{{Form::hidden('product_id', isset($product) ? $product->product_id : null)}}
<div class="col-lg-offset-5 col-lg-7">
    {!! Form::submit('Lưu', ['class' =>'btn btn-primary']) !!}
    <input type="button" name="clear" value="Nhập lại" onclick="clearForm(this.form);" class="btn btn-default">
</div>

<script type="application/javascript">

    $(document).ready(function () {
        $('a.removeImage').click(function (event) {
            event.preventDefault();

            var url = $(this).attr('href');

            $.ajax({
                method: 'GET',
                url: url,
                success: function (response) {
                    $('#container').replaceWith(response);
                },
                error: function (err) {
                    console.log(err);
                }
            });
            // return false;
        });
    });
    $(document).ready(function () {
        $('a.addImage').click(function (event) {
            event.preventDefault();

            var url = $(this).attr('href');

            $.ajax({
                method: 'GET',
                url: url,
                success: function (response) {
                    $('#container').replaceWith(response);
                },
                error: function (err) {
                    console.log(err);
                }
            });
            // return false;
        });
    });
</script>
