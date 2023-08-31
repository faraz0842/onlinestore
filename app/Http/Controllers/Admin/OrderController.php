<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderShow()
    {
        $order = Order::all();

        //  return response()->json($order);
        return view('admin.order')->with('order', $order);
    }

    public function orderDetailShow($order_id)
    {
        $order_detail = Order::where('order_detail.order_id', $order_id)
        ->join('order_detail', 'order_detail.order_id', 'order.order_id')
        ->join('product','product.product_id','order_detail.product_id')
        ->select('order_detail.*', 'order.*','product.*')->get();

        // return response()->json($order_detail);
        return view('admin.order_detail')->with('order_detail', $order_detail);
    }
}
