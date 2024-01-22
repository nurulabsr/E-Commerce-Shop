<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class ProfileVendorController extends Controller
{
    public function Index(){
        return view('vendor.Dashboard.profile');
    }

    public function UpdateVendorProfile(Request $request){ 
        $request->validate([
            'user_name' => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
            'user_email' => ['required', 'email', 'max:80', 'ends_with:edu.com, gmail.com,yandex.com,yahoo.com,outlook.com', 'unique:users,email,'. Auth::user()->id],
            'user_detail' => ['required', 'string', 'min:4', 'max:500', 'regex:/^[\w\s\-]+$/'],
            'user_profile_image' => ['required', 'image', 'file', 'max:4096'],
         ]);

         /*
                       use Illuminate\Support\Facades\Validator;

                        // ...

                        $validator = Validator::make($request->all(), [
                            'user_email' => ['required', 'email', 'max:80', 'ends_with:gmail.com,yandex.com,yahoo.com,outlook.com'],
                        ]);

                        if ($validator->fails()) {
                            // Handle validation failure
                        }

         */
        
         $user = Auth::user();
         if($request->hasFile('user_profile_image')){
            if(File::exists(public_path($user->user_profile_image))){
              File::delete(public_path($user->user_image));
            }
         }

         $image = $request->user_profile_image;
         $image_name = Str::uuid() .'__'.Str::slug($image->getClientOriginalName());
         $image->move(public_path('uploads'), $image_name);
         $image_path = 'uploads/'.$image_name;

         $user->name = $request->user_name;
         $user->email = $request->user_email;
         $user->user_detail = $request->user_detail;
         $user->user_image = $image_path;
         $user->save();
         toastr()->success('Profile Updated Successfully!');
         return redirect()->back();
    }

    public function UpdateVendorPassword(Request $request){
            $request->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'confirmed', 'min:8']
            ]);
    
            $request->user()->update([
                'password' => bcrypt($request->password),
             ]);
    
             toastr()->success('Password Updated Successfully!');
             return redirect()->back();
        
    }
}
