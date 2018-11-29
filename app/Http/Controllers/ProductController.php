<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use mobileS\Http\Requests\ProductRequest;
use mobileS\Product;
use mobileS\Comment;
use Illuminate\Support\Facades\DB;
use Auth;

class ProductController extends Controller
{

    /**
     * ProductController constructor.
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
        $products = Product::orderBy('created_at', 'desc')->paginate(20);
        return view('manages/products.index', compact('products'));
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
        return view('manages/products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  mobileS\Http\Requests\ProductRequest $request
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
        if ($request->hasFile('pic')) {
            foreach ($request->file('pic') as $pic) {
                $pathName = $pic->store('products', 'uploads');
                $picture = 'uploads/' . $pathName;
                $pictures[] = $picture;
            }
        }
        if ($request->hasFile('plus')) {
            foreach ($request->file('plus') as $plus) {
                $pathName = $plus->store('products', 'uploads');
                $picture = 'uploads/' . $pathName;
                $pictures[] = $picture;
            }
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
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (!Auth::check() || Auth::user()->permission != 4 && Auth::user()->permission != 2) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $product->picture = json_decode($product->picture);
        $product->color = json_decode($product->color);
        $product->description = json_decode($product->description);
        return view('manages/products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (!Auth::check() || Auth::user()->permission != 4 && Auth::user()->permission != 2) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $product->picture = json_decode($product->picture);
        $product->color = json_decode($product->color);
        $product->description = json_decode($product->description);
        return view('manages/products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  mobileS\Http\Requests\ProductRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->picture = json_decode($product->picture);
        $product->picture = array_filter($product->picture);

        $data = [];
        $data['name'] = $request->name;
        $data['factory_id'] = $request->factory_id;
        $data['price'] = $request->price;
        $data['storage'] = $request->storage;
        $data['promotion'] = $request->promotion;
        $data['color'] = json_encode($request->color);

        $pictures = [];
        if ($request->hasFile('pic')) {
            foreach ($request->file('pic') as $pic) {
                $pathName = $pic->store('products', 'uploads');
                $picture = 'uploads/' . $pathName;
                $pictures[] = $picture;
            }
            $product->picture = array_merge($product->picture, $pictures);
        }

        //Kiểm tra phần tử của mảng picture, nếu bé hơn 3 sẽ báo lỗi
        if (count($product->picture) < 3){
            return back()->withErrors(['3pic' => 'phải có ít nhất 3 hình'] );
        }

        $data['picture'] = json_encode($product->picture);

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
    public
    function destroy($id)
    {
        $product = Product::find($id);
        $product->picture = json_decode($product->picture);
        foreach ($product->picture as $item) {
            unlink($item);
        }
        $product->delete();
        return redirect(route('products.index'));
    }

    /**
     * Display a listing of products for result of search (keyword is name of product, in admin template)
     * @param Illuminate\Http\Request $request
     * @return Response
     */
    public
    function search(Request $request)
    {
        $c = 1;
        $keyword = $request->keyword;
        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(20);
        return view('manages/products.index', compact('products', 'c'));
    }

    /**
     * Allow Sale to remove a picture from product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function removeImage(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->picture = json_decode($product->picture);
        $picture = [];
        foreach ($product->picture as $pic) {
            if ($pic == $request->image) {
                unlink($pic);
            } else $picture[] = $pic;
        }
        $product->picture = json_encode($picture);
        $product->update();
        return back();
    }

    /**
     * Allow Sale to add a picture into product
     * @param int $product_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function addImage($product_id)
    {
        $product = Product::find($product_id);
        $product->picture = json_decode($product->picture, true);
//        dd($product->picture);
        $picture = [''];
        $product->picture = array_merge($product->picture, $picture);
        $product->picture = json_encode($product->picture);
        $product->update();
        return back();
    }
}
