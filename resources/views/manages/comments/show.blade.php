@extends('manages.index')

@section('content')
    <style>
        label {
            float: left;
            width: 10em;
        }
    </style>
    <p class="wrapper">
        <a href="{{route('comments.index')}}" class="btn btn-success">Quay lại</a>
    <h2>Người bình luận: {{$comment->user->name}}</h2>
    @if($comment->status == 1)
        <a href="{{route('display', $comment->comment_id)}}" class="btn btn-success">OK</a>
    @endif
    <form action="{{route('comments.destroy', $comment->comment_id)}}"
          method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a class="btn btn-danger" href="javascript:void(0);" onclick="$(this).parent().submit();">
            <i class="icon_close_alt"></i>
            Delete
        </a>
    </form>
    <br>
    <p>{{$comment->content}}</p>
    <p>Thời gian: {{$comment->created_at->diffForHumans()}}, {{date_format($comment->created_at, 'd-m-Y h:i:s')}}</p>
@endsection
