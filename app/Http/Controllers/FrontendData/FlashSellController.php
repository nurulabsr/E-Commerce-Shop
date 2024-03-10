<?php

namespace App\Http\Controllers\FrontendData;

use App\Http\Controllers\Controller;
use App\Models\FlashSell;
use App\Models\FlashSellItem;
use Illuminate\Http\Request;

class FlashSellController extends Controller
{

    public function index(){
        $flashsell = FlashSell::first();
        $flashsellItems = FlashSellItem::where('status', 1)->orderBy('id', 'DESC')->paginate(120);
        return  view('Frontend.pages.flashsell', compact('flashsell', 'flashsellItems'));
    }
}
