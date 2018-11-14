<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use mobileS\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->get();
        return view('manages/products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manages/products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['factory_id'] = $request->factory_id;
        $data['price'] = $request->price;
        $data['storage'] = $request->storage;
        $data['promotion'] = $request->promotion;
        $data['color'] = 'den';
        $data['picture'] = 'dasdasdasd';
        $description = [
            'screen' => $request->screen,
            'OS' => $request->OS,
            'camera' => $request->camera,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'sim' => $request->sim,
            'pin' => $request->pin,
            'fingerprint' => $request->fingerprint
        ];
        $data['description'] = json_encode($description);
        $data['body'] = $request->body;
        $data['in_stock'] = $request->in_stock;
        $data['slug'] = str_slug($data['name']);
        Product::create($data);
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->description = json_decode($product->description);
        return view('manages/products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('manages/products.edit', compact('product'));
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
}
