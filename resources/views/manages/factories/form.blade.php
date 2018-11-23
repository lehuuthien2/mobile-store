<div class="form-group">
    {!! Form::label('name', 'Nhà sản xuất <span class="required">*</span>' ,['class' => 'control-label col-sm-2'], false) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name', isset($factory) ? $factory->name : null) , ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="invalid-feedback required" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
    </div>
</div>

{{Form::hidden('user_id', Auth::user()->user_id)}}
<div class="col-lg-offset-5 col-lg-7">
    {!! Form::submit('Lưu', ['class' =>'btn btn-primary']) !!}
    <input type="button" name="clear" value="Nhập lại" onclick="clearForm(this.form);" class="btn btn-default">
</div>
