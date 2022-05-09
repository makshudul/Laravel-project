<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    function index(){
          $categories=Category::all();
          $trash_categories=Category::onlyTrashed()->get();
          return view('admin.category.index',compact('categories','trash_categories'));
    }

    function insert(CategoryRequest $request){
      $category_id = Category::insertGetId([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
        $category_image=$request->category_image;
        $extention=$category_image->getClientOriginalExtension();
        $file_name=$category_id.'.'.$extention;
        Image::make($category_image)->resize(680,680)->save(public_path('/uploads/category/'.$file_name));

        Category::find($category_id)->update([
            'category_image'=>$file_name,
        ]);


        return back()->with('success','Category Added Successfully');
    }


    function SoftDelete($softdelete_id){
      Category::find($softdelete_id)->delete();
      return back()->with('success','Soft Delete Successfully');

    }
    function restore($restore_id){
        Category::onlyTrashed()->find($restore_id)->restore();
        return back();
    }
    function delete($category_id){
        foreach(SubCategory::where('category_id',$category_id)->get()as $subcategory){
            SubCategory::find($subcategory->id)->delete();
        }
        $image=Category::onlyTrashed()->find($category_id);
        $image_name=$image->category_image;
        $delete_from=public_path('/uploads/category/'.$image_name);
        unlink($delete_from);
        Category::onlyTrashed()->find($category_id)->forceDelete();
        return back();

    }
    function category_edit($category_id){
        $category_info=Category::find($category_id);
        return view('admin.category.edit_category',compact('category_info'));
    }
    function update(Request $request){
        Category::find($request->id)->update([
        'category_name'=>$request->category_name,
        'added_by'=>Auth::id(),
        ]);
        return redirect('/category');
    }
    function Alldelete(Request $request){
        foreach($request->mark as $mark){
            Category::find($mark)->delete();
        }
        return back()->with('success','All Delete Successfully');

    }
    function AllRestore(Request $request){
        foreach($request->RestoreMark as $RestoreMark){
            Category::onlyTrashed()->restore();
        }
        return back()->with('success','All Restore Successfully');

    }

}

