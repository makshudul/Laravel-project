<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductThumbnail;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //
    function index(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
         return view('admin.product.index',[
             'categories'=>$categories,
             'subcategories'=>$subcategories,
         ]);
    }
    function getSubcategory(Request $request)
    {
         $str_to_send='<option value=""> <----- Select Category-----> </option>';
        foreach(SubCategory::where('category_id',$request->category_id)->get() as $subcategories){
            $str_to_send.='<option value="'.$subcategories->id.'">'.$subcategories->subcategory_name.'</option>';
        }
        echo $str_to_send;
    }
    function insert( Request $request){
          $product_id = Product::insertGetId([
          'category_id'=>$request->category_id,
          'subcategory_id'=>$request->subcategory_id,
          'product_name'=>$request->product_name,
          'quantity'=>$request->quantity,
          'product_price'=>$request->product_price,
          'product_discount'=>$request->product_discount,
          'after_discount'=>$request->product_price-($request->product_price*$request->product_discount)/100,
          'product_code'=>$request->product_code,
          'short_desp'=>$request->short_desp,
          'long_desp'=>$request->long_desp,

      ]);
      $product_preview = $request->preview;
      $extension=$product_preview ->getClientOriginalExtension();
      $product_preview_name=$product_id.'.'.$extension;
      Image::make($product_preview)->resize(680,680)->save(public_path('/uploads/products/preview/'.$product_preview_name));
      Product::find($product_id)->update([
           'preview'=>$product_preview_name,
       ]);
        $loop=1;
       $product_thumbnails= $request->thumbnails;
       foreach($product_thumbnails as $product_tham){
           $thumbails_extension=$product_tham->getClientOriginalExtension();
           $product_thumbnails_name=$product_id.'-'.$loop.'.'.$thumbails_extension;
           Image::make($product_tham)->resize(680,680)->save(public_path('/uploads/products/thumbnails/'.$product_thumbnails_name));
           ProductThumbnail::insert([
               'product_id'=>$product_id,
               'thumbnails'=>$product_thumbnails_name,
           ]);
           $loop++;
       }
      return back()->with('product_added','Product Added Successfully');

    }
    function showProducts(){
        $product= Product::with('rel_to_category')->select('id','category_id','product_name','quantity','short_desp','product_price','preview')->get();
        return view('admin.product.productindex',compact('product'));
    }

}
