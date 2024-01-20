<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    
    return redirect()->back();
    }
}
