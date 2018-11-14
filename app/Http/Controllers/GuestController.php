<?php

namespace mobileS\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mobileS\Comment;
use mobileS\Factory;
use mobileS\Order;
use mobileS\Order_detail;
use mobileS\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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
        $data = Comment::where('product_id', $product_id)
            ->orderBy('parent_id', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        $comments = array();
        foreach ($data as $item) {
            if (empty($item->parent_id)) {
                $comments[$item->comment_id] = array(
                    'content' => $item->content,
                    'name' => $item->user->name,
                    'created_at' => $item->created_at,
                    'comment_id' => $item->comment_id,
                );
            } else {
                $comments[$item->parent_id]['reply'][] = array(
                    'content' => $item->content,
                    'name' => $item->user->name,
                    'created_at' => $item->created_at,
                    'comment_id' => $item->comment_id,
                );
            }
        }
//        dd($comments);

        $pagins = DB::table('comments')->where([
            ['product_id', $product_id],
            ['parent_id', null]
        ])->orderBy('created_at', 'desc')
            ->paginate(15);
        $product = Product::where('product_id', $product_id)->first();
        return view('guests.product_detail', compact('product','comments','pagins'));
    }

    public function contact()
    {
        return view('guests.contact');
    }

    public function factory($slug)
    {
        $factory = Factory::where('slug', $slug)->first();
        $products = Product::where('factory_id', $factory->factory_id)->paginate(12);
        return view('guests.factory', compact('products', 'factory'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('name', 'like', '%'. $keyword . '%')->take(4)->get();
        return view('guests.search_product', compact('products'));
    }

    public function news_detail()
    {
        return view('guests.news_detail');
    }

    public function success(Request $request)
    {
        //lấy dữ liệu để tạo order
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $price = 0;
        $data = [];
        $cart = Cart::content();
        foreach ($cart as $item) {
            $price += $item->subtotal;
        }
        $data['total'] = $price;
        $data['user_name'] = $request->user_name;
        $data['address'] = $request->address;
        $data['tel'] = $request->tel;
        if ($request->user_id != '') {
            $data['user_id'] = $request->user_id;
        }
        if ($request->note != '') {
            $data['note'] = $request->note;
        }
        Order::create($data);

        //lấy dữ liệu để tạo order_detail
        $order_id = Order::orderBy('order_id', 'desc')->first()->order_id;

        $detail = [];
        foreach ($cart as $item) {
            $detail['order_id'] = $order_id;
            $detail['product_id'] = $item->id;
            $detail['amount'] = $item->price * $item->qty;

            //lấy lại giá gốc
            if ($item->promotion != null) {
                $item->price = $item->price * 100 / (100 - $item->promotion);
            }

            $detail['product_price'] = $item->price;
            $detail['product_quantity'] = $item->qty;
            $detail['product_name'] = $item->name;
            $detail['product_color'] = $item->options['color'];
            $detail['product_promotion'] = $item->options['promotion'];
            $detail['product_storage'] = $item->options['storage'];

            Order_detail::create($detail);
            $detail = [];
        }
        Cart::destroy();
        return view('guests.success');
    }

    public function cart()
    {
        $cart = Cart::content();
        $subtotal = Cart::subtotal();
        return view('guests.cart', compact('cart', 'subtotal'));
    }

    public function addCart(Product $product, Request $request)
    {
        if (isset($product->promotion))
            Cart::add([
                'id' => $product->product_id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price - ($product->price * $product->promotion / 100),
                'options' => ['promotion' => $product->promotion, 'storage' => $product->storage, 'color' => $request->color]
            ]);
        else
            Cart::add([
                'id' => $product->product_id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'options' => ['promotion' => null, 'storage' => $product->storage, 'color' => $request->color ]
            ]);
        return back();
    }

    public function updateCart(Request $request)
    {
        Cart::update($request['rowId'], $request['qty']);
        return back();
    }

    public function remove(Request $request)
    {
        Cart::remove($request['rowId']);
        return back();
    }

    public function comment(Request $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $data = $request->all();
        $data['content'] = nl2br($request->content, false);
        Comment::create($data);
        return back();
    }
}
