<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mobileS\Http\Middleware\RedirectIfAuthentimanageed;
use mobileS\Http\Requests\UserRequest;
use mobileS\User;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check() || Auth::user()->permission != 4) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $users = User::whereIn('permission', [2, 3])->orderBy('created_at', 'desc')->paginate(30);
        return view('manages/users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check() || Auth::user()->permission != 4) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
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
        if ($request->hasFile('avatar')) {
//            $pathName = $request->avatar->storeAs('avatars',$request->avatar->getClientOriginalName(),'public');
            $pathName = $request->avatar->store('avatars', 'uploads');
            $data['avatar'] = 'uploads/' . $pathName;
        }
        User::create($data);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user_id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!Auth::check() || Auth::user()->permission != 4) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
//        $user = User::find('user_id', $user_id);
        return view('manages/users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        if (!Auth::check() || Auth::user()->permission != 4) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $user = User::where('user_id', $user_id)->first();
        return view('manages/users.edit', compact('user'));
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
        $user = User::find($user_id);
        if ($request->hasFile('avatar')) {
            // Kiểm tra user đã có avatar chưa
            if (!empty($user->avatar)) {
                //xoá avatar cũ
                unlink($user->avatar);
            }

//            $pathName = $request->avatar->storeAs('avatars',$request->avatar->getClientOriginalName(),'public');
            $pathName = $request->avatar->store('avatars', 'uploads');
            $data['avatar'] = 'uploads/' . $pathName;
        }
        $data['password'] = bcrypt($data['password']);
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
        if (!empty($user->avatar)) {
            //xoá avatar cũ
            unlink($user->avatar);
        }
        $user->delete();
        if ($user->permission == 1) {
            return redirect(route('users.customer'));
        }
        return redirect(route('users.index'));
    }

    /**
     * Display home of managers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function manage_index()
    {
        if (!Auth::check() || Auth::user()->permission == 1) {
            return redirect(route('guests.index'));
        }
//        dd(Auth::user()->permission);
        $h = 2;
        return view('manages.index', compact('h'));
    }

    /**
     * Display a listing of customer (only admin can access)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function customer_index()
    {
        if (!Auth::check() || Auth::user()->permission != 4) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $users = User::where('permission', 1)->orderBy('created_at', 'desc')->paginate(30);
        return view('manages/users.customers', compact('users'));
    }

    /**
     * Display a listing of staffs for result of search (keyword is name of staff)
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){
        $c = 1;
        $keyword = $request->keyword;
        $users = User::where('name', 'like' ,'%'. $keyword .'%')->paginate(20);
        return view('manages/users.index', compact('users','c'));
    }

    /**
     * Display a listing of customers for result of search (keyword is name of customer)
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchCustomers(Request $request){
        $c = 1;
        $keyword = $request->keyword;
        $users = User::where('name', 'like' ,'%'. $keyword .'%')->where('permission', 1)->paginate(20);
        return view('manages/users.customers', compact('users','c'));
    }
}
