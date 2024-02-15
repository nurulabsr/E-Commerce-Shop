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


    public function changeProductApproveStatus(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->is_product_approved = $request->vale;
        $product->save();
    }
}
