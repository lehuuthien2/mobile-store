<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mobileS\Factory;
use Validator;

class FactoryController extends Controller
{
    /**
     * FactoryController constructor.
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
        if (!Auth::check() || Auth::user()->permission != 4 && Auth::user()->permission != 2) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $factories = Factory::all();
        return view('manages/factories.index', compact('factories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check() || Auth::user()->permission != 4 && Auth::user()->permission != 2) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        return view('manages/factories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|unique:factories,name',
        ],[
            'required' => 'Nhà sản xuất không được để trống',
            'max' => 'Tối đa :max ký tự',
            'unique' => 'Tên này đã được dùng rồi'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        Factory::create($data);
        return redirect(route('factories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $factory_id
     * @return \Illuminate\Http\Response
     */
    public function edit($factory_id)
    {
        if (!Auth::check() || Auth::user()->permission != 4 && Auth::user()->permission != 2) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $factory = Factory::find($factory_id);
        return view('manages/factories.edit', compact('factory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $factory_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $factory_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|unique:factories,name',
        ],[
            'required' => 'Nhà sản xuất không được để trống',
            'max' => 'Tối đa :max ký tự',
            'unique' => 'Tên này đã được dùng rồi'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        $factory = Factory::find($factory_id);
        $factory->update($data);
        return redirect(route('factories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $factory_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($factory_id)
    {
        $factory = Factory::find($factory_id);
        $factory->delete();
        return redirect(route('factories.index'));
    }
}
