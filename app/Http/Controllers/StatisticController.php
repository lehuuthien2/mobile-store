<?php

namespace mobileS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    /**
     * Display listing of products order by descending sell quantity in month
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(empty($request->month)){
            $request->month = date('m');
        }
        if(empty($request->year)){
            $request->year = date('Y');
        }
        $products = DB::table("order_details")
            ->select(DB::raw("*, SUM(product_quantity) as qty"))
            ->join('orders', 'orders.order_id', '=', 'order_details.order_id')
            ->where('status', '!=' ,0)
            ->whereMonth("orders.created_at", $request->month)
            ->whereYear('orders.created_at', $request->year)
            ->groupBy('product_id')
            ->orderBy("qty", 'desc')
            ->paginate(5);

        return view('Statistics.index', compact('products'));
    }

}
