<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    function wishlist_index(){
        return view('frontend.wishlist');
    }

     function wishlist_insert(Request $request){
         wishlist::insert([
            'user_id'=>Auth::guard('customerlogin')->id(),
            'product_id'=>$request->product_id,
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'created_at'=>Carbon::now(),
         ]);
         return back();
    }
}
