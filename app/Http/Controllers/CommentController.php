<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mobileS\Comment;
use mobileS\User;
use Validator;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->permission != 4 & Auth::user()->permission != 3) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $comments = Comment::orderBy('created_at', 'desc')->paginate(50);
        return view('manages/comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $validator = Validator::make($request->all(), [
            'content' => 'required|max:255',
        ],[
            'required' => 'Nội dung bình luận không được để trống',
            'max' => 'Nội dung tối đa :max ký tự'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['content'] = nl2br($request->content, false);
        Comment::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $comment_id
     * @return \Illuminate\Http\Response
     */
    public function show($comment_id)
    {
        if (Auth::user()->permission != 4 & Auth::user()->permission != 3) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $comment = Comment::find($comment_id);
        return view('manages/comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $comment_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        $comment = Comment::find($comment_id);
        $comment->delete();
        return redirect(route('comments.index'));
    }

    public function search(Request $request){
        $c = 1;
        $keyword = $request->keyword;
        $comments = Comment::where('content', 'like' ,'%'. $keyword .'%')->paginate(20);
        return view('manages/comments.index', compact('comments','c'));
    }

}
