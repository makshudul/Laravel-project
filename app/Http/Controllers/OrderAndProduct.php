<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderAndProduct extends Controller
{
    function index(){
    $order_info=Order::all();
      return view('admin.order_product.order')->with([
          'order_info'=>$order_info,
      ]);
    }
    function need_product(){
        $need_product=Product::where('quantity','<','10')->get();
        return view('admin.order_product.need_buy_product')->with(['need_product'=>$need_product]);
    }

}
