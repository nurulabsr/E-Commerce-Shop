<?php

namespace App\Http\Controllers\FrontendData;

use App\Http\Controllers\Controller;
use App\Models\FlashSell;
use App\Models\FlashSellItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function producDetails(string $slug){
        $product = Product::with(['brands', 'FlashSellItem', 'category', 'productImageGallery', 'productVariants'])->where('product_slug', $slug)->where('product_status', 1)->first();
        $flashsell = FlashSell::first();
        $flashsellItems = FlashSellItem::where('status', 1)->orderBy('id', 'DESC')->paginate(120);
        return view('Frontend.pages.products.product-details', compact('product', 'flashsell', 'flashsellItems'));
    }
}
