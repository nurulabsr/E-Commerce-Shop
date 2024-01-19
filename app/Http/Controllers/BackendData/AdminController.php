<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller{
  
    public function Dashboard(){

        return view('admin/dashboard');
    }
}
