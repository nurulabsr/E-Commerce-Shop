<?php

namespace App\Http\Controllers\FrontendData;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function producDetails(string $slug){
        $product = Product::where('product_slug', $slug)->where('product_status', 1)->first();
        return view('Frontend.pages.products.product-details', compact('product'));
    }
}
