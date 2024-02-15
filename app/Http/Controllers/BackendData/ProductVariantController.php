<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductVariantDataTable $datatable, Request $request)
    {   
        $product = Product::findOrFail($request->product)->first();
        return $datatable->render('admin.products.ProductVariant.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        $product = Product::findOrFail($request->product);
        return view('admin.products.ProductVariant.create', compact('product'));
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
        $productVariant->product_variant_vendor_id = Auth::user()->vendor->first()->id;
        $productVariant->save();
        toastr()->success("Product Variant Added Successfully!");
        return redirect()->route('admin.product-variant.index', ['product' => $request->product_variant_product_id]);
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
        $productVariant = ProductVariant::findOrFail($id);
        return view('admin.products.ProductVariant.update', compact('productVariant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
            'product_variant_name' => ['required', 'string', 'max:254', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_variant_status' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
       ]);
    
       $productVariant = ProductVariant::findOrFail($id);
       $productVariant->product_variant_name = $request->product_variant_name;
       $productVariant->product_variant_status = $request->product_variant_status;
       $productVariant->save();
       toastr()->success("Product " . $request->product_variant_name . "Variant Updated Successfully!");
       return redirect()->route('admin.product-variant.index', ['product' => $productVariant->product_variant_product_id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $productVariant = ProductVariant::findOrFail($id);
       $productVariant->delete();
       return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function UpdateStatus(Request $request){
        $productVariant = ProductVariant::findOrFail($request->id);
        $productVariant->product_variant_status = $request->product_variant_status == 'true' ? '1' : '0';
        $productVariant->save();
        return response(['message' => 'Status Changed Successfully!'], 200);
    }
}
