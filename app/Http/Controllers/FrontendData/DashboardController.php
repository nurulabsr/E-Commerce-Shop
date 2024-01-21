<?php

namespace App\Http\Controllers\FrontendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index(){
        
        return view('Frontend.Dashboard.dashboard');
    }
}
