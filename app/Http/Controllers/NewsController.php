<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use mobileS\Http\Requests\NewsRequest;
use mobileS\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('manages/news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manages/news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  mobileS\Http\Requests\NewsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('thumbnail')) {
//            $pathName = $request->avatar->storeAs('avatars',$request->avatar->getClientOriginalName(),'public');
            $pathName = $request->thumbnail->store('news', 'uploads');
            $data['thumbnail'] = 'uploads/' . $pathName;
        }
        $data['slug'] = str_slug($request->title);
        News::create($data);
        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $news_id
     * @return \Illuminate\Http\Response
     */
    public function show($news_id)
    {
        $news = News::find($news_id);
        return view('manages/news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('manages/news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  mobileS\Http\Requests\NewsRequest $request
     * @param  int $news_id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $news_id)
    {
        $data = $request->all();
//        dd($request->all());
        $news = News::find($news_id);
        if ($request->hasFile('thumbnail')) {
            // Kiểm tra user đã có avatar chưa
            if (!empty($news->thumbnail)) {
                //xoá avatar cũ
                unlink($news->thumbnail);
            }

//            $pathName = $request->avatar->storeAs('avatars',$request->avatar->getClientOriginalName(),'public');
            $pathName = $request->thumbnail->store('avatars', 'uploads');
            $data['thumbnail'] = 'uploads/' . $pathName;
        }
        $news->update($data);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $news_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($news_id)
    {
        $news = News::find($news_id);
        if (isset($news->thumbnail)) {
            unlink($news->thumbnail);
        }
        $news->delete();
        return redirect(route('news.index'));
    }

    public function search(Request $request){
        $c = 1;
        $keyword = $request->keyword;
        $news = News::where('title', 'like' ,'%'. $keyword .'%')->paginate(20);
        return view('manages/news.index', compact('news','c'));
    }
}
