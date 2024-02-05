<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
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
