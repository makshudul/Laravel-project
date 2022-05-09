<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SubCategoryController extends Controller
{
    function index(){
        $categories=Category::all();
        $Trustsubcategories=SubCategory::onlyTrashed()->get();
        $subcategories=SubCategory::all();
        return view('admin.subcategory.index',compact('categories','subcategories','Trustsubcategories'));
    }
    function insert(Request $request){
             SubCategory::insert([
            'subcategory_name'=>$request->subcategory_name,
            'category_id'=>$request->category_id,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success',' Added Successfully');
    }
    function SubSoftDelete($softdelete_id){
        SubCategory::find($softdelete_id)->delete();
        return back()->with('success','Soft Delete Successfully');

      }
      function SubRestore($restore_id){
        SubCategory::onlyTrashed()->find($restore_id)->restore();
        return back();
    }

    function Subdelete($category_id){
        SubCategory::onlyTrashed()->find($category_id)->forceDelete();
        return back()->with('success','Delete Successfully');

    }
    function Subcategory_edit($category_id){
        $subcategory_info=SubCategory::find($category_id);
        $categories=Category::all();
        return view('admin.subcategory.edit_subcategory',compact('subcategory_info','categories'));
    }


}
