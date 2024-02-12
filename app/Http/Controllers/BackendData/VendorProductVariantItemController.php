<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\VendorProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class VendorProductVariantItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VendorProductVariantItemDataTable $datatable, Request $request)
    {   
        $product = Product::findOrFail($request->product);
        return $datatable->render('vendor.products.productVariantItems.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   $product = Product::findOrFail($request->product);
        $vendorProductVariant = ProductVariant::findOrFail($request->variant);
        return view('vendor.products.productVariantItems.create', compact('vendorProductVariant', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required', 'string', 'max:254', 'not_regex:/<[^>]*>|[=\';"]/'],
           'product' => ['required', 'numeric', 'not_regex:/<[^>]*>|[=\';"]/'],
           'product_variant_item_price' => ['required', 'numeric', 'not_regex:/<[^>]*>|[=\';"]/'],
           'product_variant_item_is_default' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
           'status' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
