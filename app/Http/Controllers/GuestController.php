<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use mobileS\Factory;
use mobileS\Product;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_products = Product::orderBy('created_at', 'desc')->take(3)->get();
        $iphones = Product::where('factory_id', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $samsungs = Product::where('factory_id', 2)->orderBy('created_at', 'desc')->take(4)->get();
        return view('guests.index', compact('new_products', 'iphones', 'samsungs'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function news()
    {
        return view('guests.news');
    }
    public function product_detail($product_id)
    {
        $product = Product::where('product_id', $product_id)->first();
        return view('guests.product_detail', compact('product'));
    }
    public function contact()
    {
        return view('guests.contact');
    }
    public function factory($slug)
    {
        $factory = Factory::where('slug', $slug)->first();
        $products = Product::where('factory_id', $factory->factory_id)->paginate(12);
        return view('guests.factory',compact('products','factory'));
    }
    public function cart()
    {
        return view('guests.cart');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        return view('guests.search_product', compact('search'));
    }
    public function news_detail()
    {
        return view('guests.news_detail');
    }

    public function message(Request $request)
    {
        $message = $request->get('message');
        return view('guests.message', compact('message'));
    }

}
