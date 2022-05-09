<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Image;

class ProfileController extends Controller
{
    //
    function profile_index(){
        return view('admin.profile.profile_page');
    }
    function profile_name_update(Request $request){
        User::find(Auth::id())->update([
            'name'=>$request->name,
        ]);
        return back()->with('success','Name Update Successfully');
    }
    function profile_password_update(Request $request){
        $request->validate([
            'old_password'=>'required',
            'password'=>'required |confirmed',
            'password'=>Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols(),
            'password_confirmation'=>'required',

        ]);
        if(Hash::check($request->old_password,Auth::user()->password)){
            User::find(Auth::id())->update([
             'password'=>bcrypt($request->password),
            ]);
            return back()->with('success','Password Update successfully');

        }
        else{
               return back()->with('wrong_password','Please check Old Password');
        }

    }
    function profile_photo_update(Request $request){
               $request->validate([
                'profile_photo' => 'mimes:jpg,bmp,png',
               ]);

                 $profile_photo=$request->profile_photo;
               if(Auth::user()->image !='default.png'){
                   $path=public_path('uploads/users/'.Auth::user()->image);
                   unlink($path);
                   $extention=$profile_photo->getClientOriginalExtension();
                   $file_name=Auth::id().'.'.$extention;
                   Image::make($profile_photo)->save(public_path('uploads/users/'.$file_name));

                   User::find(Auth::id())->update([
                       'image'=>$file_name,
                   ]);
                   return back()->with('success','Profile Photo Changed');
               }
               else
            {
                $extention=$profile_photo->getClientOriginalExtension();
                $file_name=Auth::id().'.'.$extention;
                Image::make($profile_photo)->save(public_path('uploads/users/'.$file_name));

                User::find(Auth::id())->update([
                    'image'=>$file_name,
                ]);
                return back()->with('success','Profile Photo Changed');
            }
    }
}
