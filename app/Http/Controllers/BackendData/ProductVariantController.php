<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductVariantDataTable $datatable)
    {
        return $datatable->render('admin.products.ProductVariant.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.ProductVariant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'product_variant_name' => ['required', 'string', 'max:254', 'not_regex:/<[^>]*>|[=\';"]/'],
             'product_variant_status' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
             'product_variant_product_id' => ['required', 'numeric', 'not_regex:/<[^>]*>|[=\';"]/'],
        ]);

        $productVariant = new ProductVariant();
        $productVariant->product_variant_name = $request->product_variant_name;
        $productVariant->product_variant_status = $request->product_variant_status;
        $productVariant->product_variant_product_id = $request->product_variant_product_id;
        $productVariant->save();
        toastr()->success("Product Variant Added Successfully!");
        return redirect()->back();
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
