<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];



    function rel_to_category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    function rel_to_product_thumbnail(){
        return $this->hasMany(ProductThumbnail::class,'product_id');
    }
    function rel_to_need_category_product(){
        return $this->belongsTo(Category::class,'category_id');
    }
    function rel_to_need_product(){
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
}
