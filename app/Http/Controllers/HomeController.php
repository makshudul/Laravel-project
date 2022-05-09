<?php

namespace App\Http\Controllers;

use App\Http\Requests\Userinsert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logged_user=Auth::user()->name;
        return view('home', compact('logged_user'));
    }
    public function users()
    {
        $logged_user=Auth::user()->name;
        $logged_user_id=Auth::id();
        $total_user=User::count();
             //this is super admin power
        if (Auth::user()->role==1){

            $user_all_data=User::Where('id','!=',$logged_user_id)->get();
        }
        else{
            return view('error');
        }
            // end super admin power
        return view('admin.user.users', compact('logged_user','user_all_data','total_user'));
    }
    function user_delete($user_id){
           User::find($user_id)->delete();
           return back()->with('success','User Deleted Successfully');

    }
    function user_edit($user_id){
        $user_info=User::find($user_id);
        return view('admin.user.edit_user',compact('user_info'));
     }

     public function user_update(Request $request)
     {
       User::find($request->id)->update([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>bcrypt($request->password),
       ]);
       return back()->with('update','User Updated!');
         //return redirect('/home');
       // other page show then code is -> * redirect('page link ') *
     }
     function dashboard(){
         return view('layouts.dashboard');
     }
     function add_users(){

        if (Auth::user()->role==1){

            return view('admin.user.add_user');
        }
        else{
            return view('error');
        }

     }
     function users_insert(Userinsert $request){

        User::insert([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>encrypt($request->password),
          'role'=>$request->role,
          'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','User insert Successfully');

     }
}
