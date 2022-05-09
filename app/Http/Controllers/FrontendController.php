<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProductDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    function index(){
        $Latest_Product=Product::take(6)->orderBy('id','DESC')->get();
        $topview_product=Product::take(10)->orderBy('count','DESC')->get();
        $all_category=Category::all();
        $new_products=Product::take(4)->orderBy('id','DESC')->get();
                        //   this code is bestselling view code
        $bestselling = DB::table('products')
        ->leftJoin('order_product_details','products.id','=','order_product_details.product_id')
        ->selectRaw('products.id, SUM(order_product_details.quantity) as total')
        ->groupBy('products.id')
        ->orderBy('total','desc')
        ->take(10)
        ->get();
         $topProducts = [];
         foreach ($bestselling as $s){
        $p = Product::findOrFail($s->id);
        $p->totalQty = $s->total;
        $topProducts[] = $p;
                            //  bestselling view code end
    }



        return view('frontend.index',[
            'Latest_Product'=>$Latest_Product,
            'all_category'=>$all_category,
            'new_products'=>$new_products,
            'topview_product'=>$topview_product,
            'topProducts'=>$topProducts,
        ]);
    }
    function Product_details($product_id){
        $product_info=Product::find($product_id);
        $related_products=Product::where('category_id',$product_info->category_id)->where('id','!=',$product_id)->get();
                       Product::where('id',$product_id)->increment('count');
             return view('frontend.product_details',[
                 'product_info'=>$product_info,
                 'related_products'=>$related_products,
             ]);
    }
    function contact(){
        return view('frontend.contact');
    }
    function about(){
        return view('frontend.about');
    }
    function shop(){
        return view('frontend.shop');
    }
    function category_Product_details($product_id){
        $category_product_info=Product::where('category_id',$product_id)->get();
        return view('frontend.category_product',[
            'category_product_info'=>$category_product_info,
        ]);
    }
}
