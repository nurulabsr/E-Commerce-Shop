<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\SellerPendingProductsDataTable;
use App\DataTables\SellerProductsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use function Termwind\render;

class SellerProductsController extends Controller
{
    public function sellerProduct(SellerProductsDataTable $datatable){
        return $datatable->render('admin.products.seller-products.all');
    }


    public function SellerPendingProduct(SellerPendingProductsDataTable $datatable){
        return $datatable->render('admin.products.seller-products.pending');
    }
    

    public function changeProductPendingStatus(Request $request) {
        $product = Product::findOrFail($request->id);
        $product->is_product_approved = $request->value;
        $product->save();
        return response(['message' => 'Product pending status has changed!']);
    }
    

    public function changeProductApproveStatus(Request $request){
       $product = Product::findOrFail($request->id);
       $product->is_product_approved = $request->value;
       $product->save();
       return response(['message' => 'Product approve status has changed!']);

    }

    
}
