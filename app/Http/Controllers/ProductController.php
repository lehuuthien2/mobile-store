<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use mobileS\Http\Requests\ProductRequest;
use mobileS\Product;
use mobileS\Comment;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('manages/products.index', compact('products'));
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
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['factory_id'] = $request->factory_id;
        $data['price'] = $request->price;
        $data['storage'] = $request->storage;
        $data['promotion'] = $request->promotion;
        $data['color'] = json_encode($request->color);
        $pictures = [];
//        dd($request->pic1);
        if ($request->hasFile('pic1')) {
            $pathName = $request->pic1->store('products', 'uploads');
            $picture = 'uploads/' . $pathName;
            $pictures[] = $picture;
        }

        if ($request->hasFile('pic2')) {
            $pathName = $request->pic2->store('products', 'uploads');
            $picture = 'uploads/' . $pathName;
            $pictures[] = $picture;
        }
        if ($request->hasFile('pic3')) {
            $pathName = $request->pic3->store('products', 'uploads');
            $picture = 'uploads/' . $pathName;
            $pictures[] = $picture;
        }
//        dd($pictures);
        $data['picture'] = json_encode($pictures);
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
     * @param  int $product_id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->picture = json_decode($product->picture);
        $product->color = json_decode($product->color);
        $product->description = json_decode($product->description);
        return view('manages/products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->picture = json_decode($product->picture);
        $product->color = json_decode($product->color);
        $product->description = json_decode($product->description);
        return view('manages/products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->picture = json_decode($product->picture);
        $data = [];
        $data['name'] = $request->name;
        $data['factory_id'] = $request->factory_id;
        $data['price'] = $request->price;
        $data['storage'] = $request->storage;
        $data['promotion'] = $request->promotion;
        $data['color'] = json_encode($request->color);
        $pictures = [];
//        dd($request->all());
        if ($request->hasFile('pic1')) {
            if ($request->pic1 == $product->picture['0']) {
                $pictures[] = $request->pic1;
            } else {
                unlink($product->picture['0']);
                $pathName = $request->pic1->store('products', 'uploads');
                $picture = 'uploads/' . $pathName;
                $pictures[] = $picture;
            }
        }
        if ($request->hasFile('pic2')) {
            if ($request->pic1 == $product->picture['0']) {
                $pictures[] = $request->pic2;
            } else {
                unlink($product->picture['1']);
                $pathName = $request->pic2->store('products', 'uploads');
                $picture = 'uploads/' . $pathName;
                $pictures[] = $picture;
            }
        }
        if ($request->hasFile('pic3')) {
            if ($request->pic3 == $product->picture['0']) {
                $pictures[] = $request->pic3;
            } else {
                unlink($product->picture['2']);
                $pathName = $request->pic3->store('products', 'uploads');
                $picture = 'uploads/' . $pathName;
                $pictures[] = $picture;
            }
        }
        $data['picture'] = json_encode($pictures);

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

        $product->update($data);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->picture = json_decode($product->picture);
        foreach ($product->picture as $item) {
            unlink($item);
        }
        $product->delete();
        return redirect(route('products.index'));
    }


}
