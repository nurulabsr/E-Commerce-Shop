<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Index(){
        return view('admin.profile.index');
    }

    public function UpdateProfile(Request $request){
        // return view();
        dd($request->all());
    }
}
