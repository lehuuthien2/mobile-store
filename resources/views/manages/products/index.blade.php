@extends('manages.index')

@section('content')
    <!--main content start-->
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group" style="text-align: right;margin-bottom: 30px;">
                    {!! Form::open(['method' => 'GET', 'route' => ['searchProduct', isset($keyword)]]) !!}
                    <div class="col-sm-12">
                        {!! Form::text('keyword', null, ['placeholder' => 'nhập tên sản phẩm muốn tìm','class' => 'search-input']) !!}
                        <button type="submit" class="btn btn-send ">Tìm kiếm</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="clear"></div>
                <section class="panel">
                    <header class="panel-heading">
                        @if(empty($c))
                        Bảng sản phẩm
                            <a class="btn btn-success" href="{{route('products.create')}}" style="float:right"><i
                                    class="icon_pencil"></i> Thêm sản phẩm mới</a>
                        @else <a href="{{route('products.index')}}" class="btn btn-success" style="float:right">Quay lại</a>
                        @endif
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th>Stt</th>
                            <th><i class="icon_profile"></i> Tên sản phẩm</th>
                            <th><i class="icon_mail_alt"></i> Nhà sản xuất</th>
                            <th><i class="icon_mobile"></i> Bộ nhớ</th>
                            <th><i class="icon_pin_alt"></i> Giá tiền</th>
                            {{--<th>Password</th>--}}
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @php $i = 0 @endphp
                        @foreach($products as $product)
                            @php $i++ @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td><a href="{{route('products.show', $product->product_id)}}">{{$product->name}}</a>
                                </td>
                                <td>{{$product->factory->name}}</td>
                                <td>{{$product->storage}}</td>
                                <td>{{number_format($product->price, 0 , ',' ,'.')}} VND</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success"
                                           href="{{route('products.edit', $product->product_id)}}"><i
                                                class="icon_pencil-edit"></i></a>
                                        <form action="{{route('products.destroy', $product->product_id)}}"
                                              method="POST" onsubmit="return confirm('Are you sure?');"
                                              style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a class="btn btn-danger" href="javascript:void(0);"
                                               onclick="$(this).parent().submit();">
                                                <i class="icon_close_alt"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <div id="pagination" class="text-center">
            {{$products->appends(Request::except('page'))->links()}}
        </div>
        <!-- page end-->
    </section>
    <!--main content end-->
@endsection
