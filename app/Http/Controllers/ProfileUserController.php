<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function Index(){

        return view('Frontend.Dashboard.profile');
    }

    public function UpdateUserProfile(){
        
    }
}
