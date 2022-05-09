<?php

namespace App\Http\Controllers;

use App\Models\CustomerLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerLoginController extends Controller
{
    //
    function index(){
        return view('auth.register');
    }
    function customer_login(Request $request){
        if (Auth::guard('customerlogin')->attempt(['email'=> $request->email,'password'=> $request->password])) {
            return redirect('/');
        }
        else{
            return redirect('register');
        }

    }
    function customer_register(Request $request){
        CustomerLogin::insert([
          'name'=>$request->name,
          'email'=>$request->email,
         'password'=>bcrypt($request->password),
         'created_at'=>Carbon::now(),
        ]);
        return back();

    }

}
