<?php

namespace App\Http\Controllers;

use App\Models\BillingDetails;
use App\Models\Order;
use App\Models\OrderProductDetails;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class CustomerController extends Controller
{
    function customer_acccount(){

        $orders=Order::where('user_id',Auth::guard('customerlogin')->id())->get();
        return view('frontend.account',[
            'orders'=>$orders,
        ]);
    }
    function customer_logout(){
        Auth::guard('customerlogin')->Logout();
        return redirect('/register');
    }
    function invoice_download($invoice_id){
        $billing_info=BillingDetails::where('order_id',$invoice_id)->get();
        $order_info=Order::where('id',$invoice_id)->get();
        $product_info=OrderProductDetails::where('order_id',$invoice_id)->get();
      $data=[
          'billing_info'=>$billing_info,
          'order_info'=>$order_info,
          'product_info'=>$product_info,
      ];
      return view('frontend.invoice',$data);
        // $pdf = PDF::loadView('frontend.invoice', $data);
        // return $pdf->download('invoice.pdf');
    }
}
