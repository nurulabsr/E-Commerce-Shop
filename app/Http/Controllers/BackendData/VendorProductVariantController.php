<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\VendorProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
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
