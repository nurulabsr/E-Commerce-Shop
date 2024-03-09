<?php

namespace App\Http\Controllers\FrontendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function producDetails(){
        return view('Frontend.pages.products.product-details');
    }
}
