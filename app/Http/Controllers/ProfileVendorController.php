<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileVendorController extends Controller
{
    public function Index(){
        return view('vendor.Dashboard.profile');
    }
}
