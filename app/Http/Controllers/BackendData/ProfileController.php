<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function Index(){
        return view('admin.profile.index');
    }

    public function UpdateProfile(Request $request){
       $request->validate([
          'name_admin' => ['required', 'max:50', 'string'],
          'email_admin' => ['required', 'email', 'unique:users,email,'. Auth::user()->id],
       ]);

       $user = Auth::user();
       $user->name = $request->name_admin;
       $user->email = $request->email_admin;
       $user->save();
       toastr()->success('Profile Updated Successfully!');
    return redirect()->back();
    }

  public function UpdatePassword(Request $request){
     $request->validate([
         'current_password' => ['required', 'current_password'],
         'password' => ['required', 'confirmed', 'min:8']
     ]);
     $request->user()->update([
        'password' => bcrypt($request->password),
     ]);
     toastr()->success('Password Updated Successfully!');
     return redirect()->back()->with('success', 'Password updated successfully.');;
  }

}
