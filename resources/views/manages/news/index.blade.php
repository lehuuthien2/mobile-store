@extends('manages.index')

@section('content')
    <!--main content start-->
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group" style="text-align: right;margin-bottom: 30px;">
                    {!! Form::open(['method' => 'GET', 'route' => ['searchNews', isset($keyword)]]) !!}
                    <div class="col-sm-12">
                        {!! Form::text('keyword', null, ['placeholder' => 'nhập tiêu đề bài viết bạn muốn tìm','class' => 'search-input']) !!}
                        <button type="submit" class="btn btn-send ">Tìm kiếm</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <section class="panel">
                    <header class="panel-heading">
                        @if(empty($c))
                        Bảng tin tức
                        <a class="btn btn-success" href="{{route('news.create')}}" style="float:right"><i
                                class="icon_pencil"></i> Thêm tin mới</a>
                        @else <a href="{{route('news.index')}}" class="btn btn-success" style="float:right">Quay
                            lại</a>
                        @endif
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th>Stt</th>
                            <th><i class="icon_book"></i> Tiêu đề</th>
                            <th><i class="icon_profile"></i> Người đăng</th>
                            <th><i class="icon_pin_alt"></i> Tiêu đề</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @php $i = 0 @endphp
                        @foreach($news as $item)
                            @php $i++ @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td><a href="{{route('news.show', $item->news_id)}}">{{str_limit($item->title, 20)}}</a></td>
                            <td>{{$item->user->name}}</td>
                            <td>{{str_limit($item->summary, 20)}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success" href="{{route('news.edit', $item->news_id)}}"><i
                                            class="icon_pencil-edit"></i></a>
                                    <form action="{{route('news.destroy', $item->news_id)}}"
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
            {{$news->appends(Request::except('page'))->links()}}
        </div>
        <!-- page end-->
    </section>
    <!--main content end-->
@endsection
