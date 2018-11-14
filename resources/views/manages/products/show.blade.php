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
        <h2>{{$product->name}}</h2>
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
        <p>{{$product->factory->name}}</p>
        <label>Giá tiền</label>
        <p>{{$product->price}}</p>
        <label>Màu sắc</label>
        <p>{{$product->color}}</p>
        <label>Hình ảnh</label>
        <p>{{$product->picture}}</p>
        <label>Cấu hình</label>
        <br>
        <br>
        <label>Màn hình</label>
        <p>{{$product->description->screen}}</p>
        <label>Hệ điều hành</label>
        <p>{{$product->description->OS}}</p>
        <label>Camera</label>
        <p>{{$product->description->camera}}</p>
        <label>CPU</label>
        <p>{{$product->description->cpu}}</p>
        <label>Ram</label>
        <p>{{$product->description->ram}}</p>
        <label>Sim</label>
        <p>{{$product->description->sim}}</p>
        <label>Pin</label>
        <p>{{$product->description->pin}}</p>
        <label>Vân tay</label>
        <p>{{$product->description->fingerprint}}</p>
        <p>Bài viết</p>
        <p>{{$product->body}}</p>
        {{--<p>Last edited: {{$user->updated_at->diffForHumans()}}</p>--}}
    </section>
@endsection
