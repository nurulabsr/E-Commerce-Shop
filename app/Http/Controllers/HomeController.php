<?php

namespace App\Http\Controllers;

use App\Models\FlashSell;
use App\Models\FlashSellItem;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller{
    
    public function Index(){
        
        $sliders = Slider::where('slider_status', 1)->orderBy('slider_serial', 'asc')->get();
        $flashsell = FlashSell::first();
        $flashsellItems = FlashSellItem::where('show_at_home_page', 1)->where('status', 1)->get();
        return view('Frontend.Home.home', compact(
           'sliders',
           'flashsell',
           'flashsellItems',

        ));
    }
}
