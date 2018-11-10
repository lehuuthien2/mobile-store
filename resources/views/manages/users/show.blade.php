@extends('manages.index')

@section('content')
    <style>
        label {
            float: left;
            width: 200px;
            font-size: 1.5em;
        }

        p {
            font-size: 1.5em;
        }
    </style>
    <section class="wrapper">
        <a href="{{route('users.index')}}" class="btn btn-success">Bảng nhân viên</a>
        <a href="{{route('users.customer')}}" class="btn btn-success">Bảng khách hàng</a>
        <h2>{{$user->name}}</h2>
        @if($user->permission != 1)
        <a class="btn btn-success" href="{{route('users.edit', $user->user_id)}}">
            <span class="icon_pencil-edit"></span>
            Edit
        </a>
        @endif
        <form action="{{route('users.destroy', $user->user_id)}}"
              method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a class="btn btn-danger" href="javascript:void(0);" onclick="$(this).parent().submit();">
                <i class="icon_close_alt"></i>
                Delete
            </a>
        </form>
        <br>
        <label>Ngày sinh:</label>
        <p>@if($user->birthday == '')
                {{'Trống'}}
            @else {{$user->birthday}}
            @endif
        </p>
        <label>Giới tính:</label>
        <p>@if($user->gender == MALE){{'Nam'}} @elseif ($user->gender == FEMALE){{'Nữ'}}
            @else {{'Trống'}}
            @endif</p>
        <label>Email:</label>
        <p>{{$user->email}}</p>
        <label>Số điện thoại:</label>
        <p>{{$user->tel}}</p>
        <label>Địa chỉ:</label>
        <p>{{$user->address}}</p>
        <label>Ảnh đại diện:</label>
        @if(isset($user->avatar))
            <img src="{{(asset(isset($user) ? $user->avatar : null))}}" alt="Ảnh đại diện" width="150px" height="150px">
        @endif
        {{--<p>Last edited: {{$user->updated_at->diffForHumans()}}</p>--}}
    </section>
@endsection
