@extends('layouts.guests')
@section('content')
    <div class="clear"></div>
    <div class="news-content">
        <div class="news-detail-body">
            <div class="news-header">
                <p style="font-size: 2em; font-weight: bold; padding-left: 20px;">{{$news->title}}</p><br>
                <img src="{{asset('images/cal.png')}}" alt="">{{$news->created_at->diffForHumans()}}
                , {{date_format($news->created_at, 'd-m-y h:i:s')}}
                <p style="font-weight: bold;">{{$news->summary}}</p>
                <div class="clear"></div>
            </div>
            <div class="news-body">
                {!! $news->body !!}
            </div>
        </div>
    </div>
@endsection
