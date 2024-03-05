<?php
use Illuminate\Support\Facades\Route;
function SetActive(array $routes)
{
    foreach ($routes as $route) {
        if (Route::is($route)) {
            return "active";
        }
    }
    
    return "";
}

function checkDiscount($product){
   $currentDate = date('Y-m-d');
   if($product->product_offer_price > 0 && $currentDate >= $product->product_offer_start_date && $currentDate <= $product->product_offer_end_date){
      return true;
   }

   return false;
}


function caculateDisCountPrice($orginalPrice, $discuntPrice){
   $discountAmmount = $orginalPrice - $discuntPrice;
   $discoutInPercentage = ($discountAmmount/$orginalPrice) * 100;
   return $discoutInPercentage;

}