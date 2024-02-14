<?php

namespace App\Http\Controllers\BackendData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function Index(){
        return view('admin.profile.index');
    }

    public function UpdateProfile(Request $request){
      {
         $request->validate([
             'name' => ['required', 'max:50', 'string'],
             'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
         ]);
 
         $user = Auth::user(); // Retrieve current user using User model
         $user->name = $request->name;
         $user->email = $request->email;
         $user->save(); // Save changes to the User model
        
         toastr()->success('Profile Updated Successfully!');
         return redirect()->back();
     }
   }

  public function UpdatePassword(Request $request){
   
         $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
         ]);

         $user = Auth::user(); // Retrieve current user using User model
         if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            toastr()->success('Password Updated Successfully!');
            return redirect()->back()->with('success', 'Password updated successfully.');
         } else {
            return redirect()->back()->with('error', 'Current password is incorrect.');
         }
  
     }

}
