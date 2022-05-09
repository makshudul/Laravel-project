<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class Userinsert extends FormRequest
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
            'name'=>'required',
            'role'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required |confirmed',
            'password'=>Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols(),
            'confrom_password'=>'required',
        ];
    }
    function messages(){
        return [

           'name.required'=>'Please input User Name',
           'role.required'=>'Please Select Role',
           'email.required'=>'Please input Email',
           'email.unique'=>'This Email Already taken',
           'password.required'=>'Please Input Password',
           'password.confirmed'=>'Password does not match ',
           'confrom_password.required'=>'Please input Confrom Password',
        ];

       }
}
