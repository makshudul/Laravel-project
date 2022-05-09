<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

         'category_name'=>'required|unique:categories',
         'category_image'=>'required|image|mimes:jpg,bmp,png,PNG|file|max:500',

        ];

    }
    function messages(){
        return [

           'category_name.required'=>'Please input Category Name',
           'category_image.required'=>'Please input Image',
           'category_name.unique'=>'This Category already taken',
        ];

       }
}
