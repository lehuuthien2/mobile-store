<?php

namespace mobileS\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mobileS\Comment;
use mobileS\Factory;
use mobileS\Http\Requests\OrderRequest;
use mobileS\Http\Requests\UserRequest;
use mobileS\News;
use mobileS\Order;
use mobileS\Order_detail;
use mobileS\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use mobileS\User;

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

        $sales = DB::table("order_details")
			->select(DB::raw("*, SUM(product_quantity) as qty"))
            ->join('orders', 'orders.order_id', '=', 'order_details.order_id')
            ->where('status', 3)
			->groupBy('product_id')
            ->orderBy("qty", 'desc')
            ->take(4)
            ->get();
//			dd($sales);

        //cách 2
//        $sales = DB::select(DB::raw("SELECT *, SUM(product_quantity) as qty FROM `order_details` JOIN orders
//                        On orders.order_id = order_details.order_id
//                        where STATUS = 3
//                        GROUP BY product_id
//                        order BY qty DESC
//                        Limit 4"));
        $best_products = [];
        foreach ($sales as $product)
        {
            $item = Product::find($product->product_id);
            $item->picture = json_decode($item->picture);
            $best_products[] = $item;
        }

        foreach ($new_products as $product) {
            $product->picture = json_decode($product->picture);
        }
        foreach ($iphones as $product) {
            $product->picture = json_decode($product->picture);
        }
        foreach ($samsungs as $product) {
            $product->picture = json_decode($product->picture);
        }
//        dd($new_products);

        return view('guests.index', compact('new_products', 'iphones', 'samsungs', 'best_products'));
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
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('guests.news', compact('news'));
    }

    public function product_detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->picture = json_decode($product->picture);
        $product->description = json_decode($product->description);
//        dd($product);
        $product->color = json_decode($product->color);
        $data = Comment::where('product_id', $product->product_id)
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
            ['product_id', $product->product_id],
            ['parent_id', null]
        ])->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('guests.product_detail', compact('product', 'comments', 'pagins'));
    }

    public function contact()
    {
        return view('guests.contact');
    }

    public function factory($slug)
    {
        $factory = Factory::where('slug', $slug)->first();
        $products = Product::where('factory_id', $factory->factory_id)->paginate(12);
        foreach ($products as $product) {
            $product->picture = json_decode($product->picture);
        }
        return view('guests.factory', compact('products', 'factory'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(10);
        foreach ($products as $product) {
            $product->picture = json_decode($product->picture, true);
        }
        return view('guests.search_product', compact('products'));
    }

    public function news_detail($slug)
    {
        $news = News::where('slug', $slug)->first();
        return view('guests.news_detail', compact('news'));
    }


    public function user_info($user_id)
    {
        $user = User::find($user_id);
        return view('guests.user_info', compact('user'));
    }

    public function updateCustomer(UserRequest $request, $user_id)
    {
        $user = User::find($user_id);
        $data = $request->all();
        if (empty($request->password)) {
            $data['password'] = bcrypt($user->password);
        }
        else $data['password'] = bcrypt($data['password']);
        if ($request->hasFile('avatar')) {
            // Kiểm tra user đã có avatar chưa
            if (!empty($user->avatar)) {
                //xoá avatar cũ
                unlink($user->avatar);
            }
            $pathName = $request->avatar->store('customers', 'uploads');
            $data['avatar'] = 'uploads/' . $pathName;
//            dd($data);
        }
        $user->update($data);
        return redirect(route('guests.index'));
    }

    public function orders($user_id)
    {
        $orders = Order::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(10);
        return view('guests.orders', compact('orders'));
    }

    public function order_detail($order_id)
    {
        $order = Order::find($order_id);
        return view('guests.order_detail', compact('order'));
    }

    public function cancelOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->status = 0;
        $order->update();
        return back();
    }
}
