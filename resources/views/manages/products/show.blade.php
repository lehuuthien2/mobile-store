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
        <a href="{{route('products.index')}}" class="btn btn-success">Quay lại</a>
        <h2>Tên sản phẩm</h2>
        <a class="btn btn-success" href="#">
            <span class="icon_pencil-edit"></span>
            Edit
        </a>
        <form action="#"
              method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a class="btn btn-danger" href="javascript:void(0);" onclick="$(this).parent().submit();">
                <i class="icon_close_alt"></i>
                Delete
            </a>
        </form>
        <br>
        <label>Nhà sản xuất</label>
        <p>Trống</p>
        <label>Giá tiền</label>
        <p>Trống</p>
        <label>Màu sắc</label>
        <p>Trống</p>
        <label>Bộ nhớ</label>
        <p>Trống</p>
        <label>Hình ảnh</label>
        <p>Trống</p>
        <label>Cấu hình</label>
        <p>Trống</p>
        <p>Bài viết</p>
        <p>Trống</p>
        {{--<p>Last edited: {{$user->updated_at->diffForHumans()}}</p>--}}
    </section>
@endsection
