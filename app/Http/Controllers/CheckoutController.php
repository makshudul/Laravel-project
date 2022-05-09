<?php

namespace App\Http\Controllers;

use App\Models\BillingDetails;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\CustomerLogin;
use App\Models\Order;
use App\Models\OrderProductDetails;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    function index(){

       $carts=Cart::where('user_id',Auth::guard('customerlogin')->id())->get();
       $sub_total=0;
       foreach($carts as $cart){
           $sub_total += $cart->rel_to_product->after_discount*$cart->quantity;
       }

        $countries=Country::all();
        return view('frontend.checkout',[
            'countries'=>$countries,
             'sub_total'=>$sub_total,
        ]);
    }
    function getCity(Request $request){
        $cities= City::where('country_id',$request->country_id)->get();
        $str=' <option value="">Select a City&hellip;</option>';
        foreach($cities as $city){
            $str.='<option value="'.$city->id.'">'.$city->name.'</option>';
        }
       echo $str;
    }
    function order(Request $request){
        if($request->payment_method==1){
            $orderId= Order::insertGetId([
                'user_id'=>Auth::guard('customerlogin')->id(),
                'discount'=>$request->discount,
                'delivery_charge'=>$request->delivery_charge,
                'total'=>$request->sub_total-($request->sub_total*$request->discount)/100 + ($request->delivery_charge),
                'payment_method'=>$request->payment_method,
                'created_at'=>Carbon::now(),
              ]);
              BillingDetails::insert([
                 'order_id'=>$orderId,
                 'user_id'=>Auth::guard('customerlogin')->id(),
                 'name'=>$request->name,
                 'email'=>$request->email,
                 'company'=>$request->company,
                 'phone'=>$request->phone,
                 'country_id'=>$request->country_id,
                 'city_id'=>$request->city_id,
                 'address'=>$request->address,
                 'notes'=>$request->notes,
                 'created_at'=>Carbon::now(),
              ]);
              $carts=Cart::where('user_id',Auth::guard('customerlogin')->id())->get();
              foreach($carts as $cart){
                  OrderProductDetails::insert([
                      'order_id'=>$orderId,
                      'product_id'=>$cart->product_id,
                      'product_name'=>$cart->rel_to_product->product_name,
                      'product_price'=>$cart->rel_to_product->after_discount,
                      'quantity'=>$cart->quantity,
                  ]);

              }
              foreach($carts as $cart){
                Product::where('id',$cart->product_id)->decrement('quantity',$cart->quantity);
                Cart::find($cart->id)->delete();
               }
              return back()->with('Order_insert','Order Placed Successfully');
        }
        else if($request->payment_method==2){
               echo 'SSL';
        }
        else if($request->payment_method==3){
           echo 'option 3';
        }
    }
}
