<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\VendorProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class VendorProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VendorProductVariantDataTable $datatable)
    {
        return $datatable->render('vendor.products.productVariants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   $product = Product::findOrFail($request->product);
        return view('vendor.products.productVariants.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'name' => ['required', 'string', 'max:250', 'not_regex:/<[^>]*>|[=\';"]/'],
             'product' => ['numeric', 'not_regex:/<[^>]*>|[=\';"]/'],
             'status' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
        ]);

        $vendorProductVariant = new ProductVariant();
        $vendorProductVariant->product_variant_name = $request->name;
        $vendorProductVariant->product_variant_status = $request->status;
        $vendorProductVariant->product_variant_product_id = $request->product;
        $vendorProductVariant->save();
        toastr()->success($request->name ."Created Successfully!");
        return redirect()->route('vendor.products-variant.index', ['product' => $request->product]);
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
    public function edit(string $id, Request $request)
    {  
        // dd($id);
        $product = Product::findOrFail($request->product);
        $vendorProductVariant = ProductVariant::findOrFail($id);
        return view('vendor.products.productVariants.update', compact('vendorProductVariant', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:250', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product' => ['numeric', 'not_regex:/<[^>]*>|[=\';"]/'],
            'status' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
        ]);

        $vendorProductVariant = ProductVariant::findOrFail($id);
        $vendorProductVariant->product_variant_name = $request->name;
        $vendorProductVariant->product_variant_status = $request->status;
        $vendorProductVariant->product_variant_product_id = $request->product;
        $vendorProductVariant->save();
        toastr()->success($request->name ."Updated Successfully!");
        return redirect()->route('vendor.products-variant.index', ['product' => $request->product]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
