<?php

namespace App\Http\Controllers;

use App\Models\FlashSell;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller{
    
    public function Index(){
        
        $sliders = Slider::where('slider_status', 1)->orderBy('slider_serial', 'asc')->get();
        $flashsell = FlashSell::first();
        return view('Frontend.Home.home', compact(
           'sliders',
           'flashsell'

        ));
    }
}
