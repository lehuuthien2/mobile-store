@extends('manages.index')

@section('content')
    <p class="wrapper">
        <a href="{{route('news.index')}}" class="btn btn-success">Quay lại</a>
    <h2>{{$news->title}}</h2>
    <a class="btn btn-success" href="{{route('news.edit', $news->news_id)}}">
        <span class="icon_pencil-edit"></span>
        Edit
    </a>
    <form action="{{route('news.destroy', $news->news_id)}}"
          method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a class="btn btn-danger" href="javascript:void(0);" onclick="$(this).parent().submit();">
            <i class="icon_close_alt"></i>
            Delete
        </a>
    </form>
    <br>
    @if(isset($news->summary))
        <p>{!! $news->summary !!}</p>
        @endif
    <p>{!! $news->body !!}</p>
    <p>Last edited: {{$news->updated_at->diffForHumans()}}, {{date_format($news->updated_at, 'd-m-Y h:i:s')}}</p>
@endsection
