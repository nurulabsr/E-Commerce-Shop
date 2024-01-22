<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ProfileUserController extends Controller
{
    public function Index(){

        return view('Frontend.Dashboard.profile');
    }

    public function UpdateUserProfile(Request $request){
         $request->validate([
            'user_name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'use_email' => ['required', 'email', 'max:80', Rule::endsWith(['edu.com', 'gmail.com', 'yandex.com', 'yahoo.com', 'outlook.com',])],
            'user_detail' => ['required', 'string', 'min:5', 'max:500', 'regex:/^[\w\s\-]+$/'],
            'user_profile_image' => ['required', 'image', 'file', 'max:4096'],
         ]);
        
         $user = Auth::user();
         if($request->hasFile('user_profile_image')){
            if(File::exists(public_path($user->user_profile_image))){
              File::delete(public_path($user->user_image));
            }
         }

         $image = $request->image;
         $image_name = Str::uuid() .'__'.Str::slug($image->getClientOriginalName());
         $image->move(public_path('uploads'), $image_name);
    }

    public function UpdateUserPassword(){

    }
}
