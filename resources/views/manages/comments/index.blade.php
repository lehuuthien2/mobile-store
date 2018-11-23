@extends('manages.index')

@section('content')
    <!--main content start-->
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group" style="text-align: right;margin-bottom: 30px;">
                    {!! Form::open(['method' => 'GET', 'route' => ['searchComment', isset($keyword)]]) !!}
                    <div class="col-sm-12">
                        {!! Form::text('keyword', null, ['placeholder' => 'nhập nội dung bạn muốn tìm','class' => 'search-input']) !!}
                        <button type="submit" class="btn btn-send ">Tìm kiếm</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <section class="panel">
                    <header class="panel-heading">
                        @if(empty($c))
                            Bảng bình luận
                        @else   <a href="{{route('comments.index')}}" class="btn btn-success" style="float:right">Quay
                            lại</a>
                        @endif
                    </header>
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th>Stt</th>
                            <th><i class="icon_profile"></i> Người bình luận</th>
                            <th>Sản phẩm</th>
                            <th><i class=""></i> nội dung</th>
                            <th>Trạng thái</th>
                            <th><i class="icon_cogs"></i> Action</th>
                        </tr>
                        @php $i = 1 @endphp
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>
                                    <a href="{{route('guests.product_detail', $comment->product->slug)}}">{{$comment->product->name}}</a>
                                </td>
                                <td>
                                    <a href="{{route('comments.show', $comment->comment_id)}}">{{str_limit($comment->content, 25)}}</a>
                                </td>
                                <td>
                                    @if($comment->status == 1)
                                        Chờ xử lí
                                    @else Được phép hiển thị
                                    @endif
                                </td>
                                <td>
                                    @if($comment->status == 1)
                                    <a href="{{route('display', $comment->comment_id)}}" class="btn btn-success">OK</a>
                                    @endif
                                    <div class="btn-group">
                                        <form action="{{route('comments.destroy', $comment->comment_id)}}"
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
            {{$comments->appends(Request::except('page'))->links()}}
        </div>
        <!-- page end-->
    </section>
    <!--main content end-->
@endsection
