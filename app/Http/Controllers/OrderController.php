<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mobileS\Http\Requests\OrderRequest;
use mobileS\Order;
use mobileS\Order_detail;
use mobileS\Product;
use Cart;



class OrderController extends Controller
{
    /**
     * OrderController constructor.
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
        $orders = Order::orderBy('created_at', 'desc')->paginate(30);
        return view('manages/orders.index', compact('orders'));
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
     * @param  OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        if(Cart::count() == 0)
        {
            return back()->withErrors('Bạn chưa chọn sản phẩm nào');
        }
        //lấy dữ liệu để tạo order
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

    /**
     * Display the specified resource.
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        if (!Auth::check() || Auth::user()->permission != 4 && Auth::user()->permission != 2) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        $order = Order::find($order_id);
        return view('manages/orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        if (!Auth::check() || Auth::user()->permission != 4 && Auth::user()->permission != 2) {
            return redirect()
                ->route('manages.index')
                ->withError('Access denied');
        }
        return view('manages/orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $order_id)
    {
        $data = $request->all();
        $order = Order::find($order_id);
        if($order->status == 0){
            return redirect(route('orders.index'))->withErrors('Không thể cập nhật hoá đơn đã huỷ');
        }
        if($data['status'] == 3){
            foreach ($order->order_details as $item){
                $product = $item->product;
                $product->in_stock -= $item->product_quantity;
                $product->update();
            }
        }
        $order->update($data);
        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $order_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $order = Order::find($order_id);
        foreach ($order->order_details as $order_detail) {
            $order_detail->delete();
        }
        $order->delete();
        return redirect(route('orders.index'));
    }


    /**
     * Display shopping cart of customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart()
    {
        $cart = Cart::content();
        $subtotal = Cart::subtotal();
        return view('guests.cart', compact('cart', 'subtotal'));
    }

    /**
     * Allow customer to add a product into shopping cart
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCart(Product $product, Request $request)
    {
        if (isset($product->promotion))
            Cart::add([
                'id' => $product->product_id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price - ($product->price * $product->promotion / 100),
                'options' => ['promotion' => $product->promotion, 'storage' => $product->storage, 'color' => $request->color, 'slug' => $product->slug]
            ]);
        else
            Cart::add([
                'id' => $product->product_id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'options' => ['promotion' => null, 'storage' => $product->storage, 'color' => $request->color, 'slug' => $product->slug]
            ]);
        return back();
    }

    /**
     * Update quantity of specified product of shopping cart
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCart(Request $request)
    {
        Cart::update($request['rowId'], $request['qty']);
        return back();
    }

    /**
     * Remove a product from shopping cart
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request)
    {
        Cart::remove($request['rowId']);
        return back();
    }

    /**
     * Display a listing of orders for result of search (keyword is order_id of order)
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){
        $c = 1;
        $keyword = $request->keyword;
        $orders = Order::where('order_id', 'like', '%'. $keyword .'%')->paginate(20);
        return view('manages/orders.index', compact('orders','c'));
    }
}

