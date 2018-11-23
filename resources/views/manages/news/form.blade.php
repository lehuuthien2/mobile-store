<div class="form-group">
    {!! Form::label('title', 'Tiêu đề <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('title', old('title', isset($news) ? $news->title : null) , ['class' => 'form-control']) !!}
        @if ($errors->has('title'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('summary', 'Tóm tắt' ,['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-10">
        {!! Form::text('summary',  isset($news) ? $news->summary : null , ['class' => 'form-control']) !!}
        @if ($errors->has('summary'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('summary') }}</strong>
                                    </span>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('thumbnail', 'Ảnh đại diện <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        <input type="file" name="thumbnail" class="form-control">
        @if(isset($news->thumbnail))
            <img src="{{(asset($news->thumbnail))}}" alt="Ảnh thu nhỏ" width="150px" height="150px">
        @endif
        @if ($errors->has('thumbnail'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('thumbnail') }}</strong>
                                    </span>
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('body', 'Bài viết',['class' => 'control-label col-sm-6', 'style'=> 'font-size: 2em;']) !!}
    <div class="col-sm-12">
        {!! Form::textarea('body', old('body',isset($news) ? $news->body : null),
         ['class' => 'form-control ckeditor'] ) !!}
        @if ($errors->has('body'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
        @endif
    </div>
</div>
{{Form::hidden('news_id', isset($news) ? $news->news_id : null)}}
{{Form::hidden('user_id', Auth::user()->user_id)}}
<div class="col-lg-offset-5 col-lg-7">
    {!! Form::submit('Lưu', ['class' =>'btn btn-primary']) !!}
    <input type="button" name="clear" value="Nhập lại" onclick="clearForm(this.form);" class="btn btn-default">
</div>
