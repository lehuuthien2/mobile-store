@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Đăng ký') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Tài khoản') }}
                                    <span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }} <span
                                        style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Xác nhận mật khẩu') }} <span
                                        style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ email') }}
                                    <span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Họ và tên') }} <span
                                        style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Ngày sinh') }} </label>

                                <div class="col-md-6">
                                    {!! Form::text('birthday', old('birthday', isset($user) ? $user->birthday : null), ['class' => 'form-control datepicker']) !!}
                                    @if ($errors->has('birthday'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Giới tính') }} </label>

                                <div class="col-md-6">
                                    <label><input type="radio" name="gender" value="{{MALE}}" checked> Nam</label>
                                    <label><input type="radio" name="gender" value="{{FEMALE}}"> Nữ</label><br>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Số điện thoại') }}
                                    <span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="tel" type="text"
                                           class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"
                                           name="tel" value="{{ old('tel') }}" required>

                                    @if ($errors->has('tel'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ') }}
                                    <span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                           name="address" value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group row">--}}
                            {{--<label for="avatar"--}}
                            {{--class="col-md-4 col-form-label text-md-right">{{ __('Ảnh đại diện') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="avatar" type="text"--}}
                            {{--class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}"--}}
                            {{--name="avatar" value="{{ old('avatar') }}">--}}

                            {{--@if ($errors->has('avatar'))--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $errors->first('avatar') }}</strong>--}}
                            {{--</span>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Đăng ký') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
