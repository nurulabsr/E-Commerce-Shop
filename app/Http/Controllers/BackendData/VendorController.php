<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller{
    
    public function Dashboard(){
        return view('vendor.dashboard');
    }
}
