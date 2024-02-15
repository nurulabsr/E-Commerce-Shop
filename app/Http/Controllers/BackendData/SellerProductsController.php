<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\SellerProductsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Termwind\render;

class SellerProductsController extends Controller
{
    public function sellerProduct(SellerProductsDataTable $datatable){
        return $datatable->render('admin.products.seller-products.all');
    }
}
