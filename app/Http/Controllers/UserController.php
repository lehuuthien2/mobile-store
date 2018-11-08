<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mobileS\Http\Middleware\RedirectIfAuthenticated;
use mobileS\Http\Requests\UserRequest;
use mobileS\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereIn('permission', [2,3])->get();
        return view('manages/users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manages/users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  mobileS\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        User::create($data);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::where('user_id', $user_id)->first();
        return view('manages/users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \mobileS\Http\Requests\UserRequest $request
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $user_id)
    {
        $data = $request->all();
        $user = User::where('user_id', $user_id)->first();
        $user->update($data);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        if($user->permission == 1)
        {
            return redirect(route('users.customer'));
        }
        return redirect(route('users.index'));
    }

    public function manage_index()
    {
        if(!Auth::check() || Auth::user()->permission == 1){
            return redirect(route('guests.index'))->withErrors('Access Denied');
        }
        return view('manages.index');
    }

    public function customer_index()
    {
        $users = User::where('permission', 1)->get();
        return view('manages/users.customers', compact('users'));
    }
}
