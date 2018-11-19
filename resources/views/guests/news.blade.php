@extends('layouts.guests')

@section('content')
    <div class="clear"></div>
    <div class="wrap">
        <div class="content">
            <div class="content-grids">
                <div class="blog">
                    @foreach($news as $item)
                        <div class="blog-grid">
                            <a href="{{route('guests.news_detail', $item->slug)}}">
                                <div class="blog-grid-header">
                                    <h3 style="color: black; font-size:1.5em;">{{$item->title}}</h3>
                                    <ul>
                                        <li><img src="{{asset('images/cal.png')}}"
                                                 alt="">{{$item->created_at->diffForHumans()}}
                                            , {{date_format($item->created_at, 'd-m-y h:i:s')}}</li>
                                    </ul>
                                </div>
                                <div class="image group">
                                    <div class="grid images_3_of_1" >
                                        <img src="{{asset($item->thumbnail)}}" width="293px">
                                    </div>
                                    <div class="grid span_2_of_3">
                                        <p style="font-size:1.25em">{{str_limit($item->summary, 500)}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="clear"></div>
                    <div class="pagination">
                        {{$news->links()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection
