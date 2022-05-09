<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CustomerLogin;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
     function cart(Request $request){
         $message=null;
         $coupon_code=$request->coupon;
        $cart_product= Cart::where('user_id',Auth::guard('customerlogin')->id())->get();


        if ($coupon_code=='') {
            $discount=0;
        }
        else{
            if (Coupon::where('coupon_code',$coupon_code)->exists()) {
                if (Carbon::now()->format('Y-m-d') > Coupon::where('coupon_code',$coupon_code)->first()->validity) {
                    $message='Coupon Code Expired';
                    $discount=0;

                } else {
                    $discount=Coupon::where('coupon_code',$coupon_code)->first()->discount;
                }

            } else {
                $message='Invaild Coupon Code';
                $discount=0;
            }

        }


          return view('frontend.cart_view',[
              'cart_product'=>$cart_product,
              'discount'=>$discount,
              'message'=>$message,
          ]);

     }
    function cart_insert(Request $request){

        if(Cart::where('user_id',Auth::guard('customerlogin')->id())->where('product_id',$request->product_id)->exists()){

            Cart::where('user_id',Auth::guard('customerlogin')->id())->where('product_id',$request->product_id)->increment('quantity',$request->quanity);
            return back()-> with('cart_added','Cart Update Successful !');
        }
        else{
            Cart::insert([
                'user_id'=>Auth::guard('customerlogin')->id(),
                'product_id'=>$request->product_id,
                'quantity'=>$request->quanity,
                'created_at'=>Carbon::now(),
                ]);
                return back()-> with('cart_added','Cart Added Successful !');
        }

    }
    function cart_delete($card_id){
        Cart::find($card_id)->delete();
        return back()->with('cart_added','Card Delete Successful');

    }

    function cart_update(Request $request){
      foreach($request->quantity as $cart_id=>$quantity){
          Cart::find($cart_id)->update([
            'quantity'=>$quantity,
          ]);
      }
      return back()->with('cart_added','Cart Update Successful');
    }
}
