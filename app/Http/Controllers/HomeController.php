<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller{
    
    public function Index(){
        $sliders = Slider::where('slider_status', 1)->get();
        return view('Frontend.Home.home', compact(
           'sliders'

        ));
    }
}
