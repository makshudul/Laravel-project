<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];


    function rel_to_user(){
        return $this->belongsTo(User::class,'added_by');
    }

    function rel_to_products(){
        return $this->hasMany(Product::class);
    }

}
