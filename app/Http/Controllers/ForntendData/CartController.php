<?php

namespace App\Http\Controllers\ForntendData;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Request $request){

        // $product = Product::findOrFail($request->product_id);
        // Cart::add();
        $variants = [];
        // dd($request->variants_items);
        foreach($request->variants_items as $item_id){

            $variantItem = ProductVariantItem::findOrFail($item_id);
            $variants[$variantItem->productVariant->product_variant_name]['product_variant_item_name'] = $variantItem->product_variant_item_name;
         
        }

        dd($variants);

     }
}
