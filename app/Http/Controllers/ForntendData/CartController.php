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

        $product = Product::findOrFail($request->product_id);
        // Cart::add();
        $variants = [];
        $variantTotalAmount = 0;
          if($request->has('variants_items')){
            foreach($request->variants_items as $item_id){

                $variantItem = ProductVariantItem::findOrFail($item_id);
                $variants[$variantItem->productVariant->product_variant_name]['product_variant_item_name'] = $variantItem->product_variant_item_name;
                $variants[$variantItem->productVariant->product_variant_name]['product_variant_item_price'] = $variantItem->product_variant_item_price;
                $variantTotalAmount += $variantItem->product_variant_item_price;
             
            }
          }
        $productPrice = 0;
        if(checkDiscount($product)){
           $productPrice = $product->product_offer_price;
        }else{
            $productPrice = $product->product_price;
        }

        // dd($variants);
        $cartData = [];
        $cartData["id"] = $product->id;
        $cartData["name"] = $product->product_name;
        $cartData["qty"] = $request->qty;
        $cartData["price"] = $productPrice;
        $cartData["weight"] = 10;
        $cartData["options"]["variants"] = $variants;
        $cartData["options"]["variantTotalAmount"] = $variantTotalAmount;
        $cartData["options"]["image"] = $product->product_thumnail_img;
        $cartData["options"]["slug"] = $product->product_slug;
        // dd($cartData);

        Cart::add($cartData);

     }

     public function CartDetails(){

      $cartItems = Cart::content();
     

      return view('Frontend.pages.cart-detail', compact('cartItems'));
     }

     public function UpdateCartQuantity(Request $request){
       Cart::update($request->rowId, $request->quantity);
       return response(['status' => 'success', 'message' => 'Quantity Updated Successfully!']);
     }
}
