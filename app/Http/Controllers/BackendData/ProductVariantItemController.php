<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductVariantItemDataTable $datatable, Request $request)
    {  
        $product = Product::findOrFail($request->product);
        $productVariant = ProductVariant::findOrFail($request->variant);
        return $datatable->render('admin.products.ProductVariantItem.index', compact('product', 'productVariant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
       $productVariant = ProductVariant::findOrFail($request->variant);
       $product = Product::findOrFail($request->product);
       return view('admin.products.ProductVariantItem.create', compact('productVariant','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_variant_item_name' => ['required', 'string', 'max:254', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_variant_item_price' => ['required', 'numeric', 'max:24', 'not_regex:/<[^>]*>|[=\';"]/',],
            'product_variant_item_is_default' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_variant_item_status' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_variant' => ['required', 'numeric', 'not_regex:/<[^>]*>|[=\';"]/'],
        ]);

        $productVariantItem = new ProductVariantItem();
        $productVariantItem->product_variant_item_name = $request->product_variant_item_name;
        $productVariantItem->product_variant_item_price = $request->product_variant_item_price;
        $productVariantItem->product_variant_item_is_default = $request->product_variant_item_is_default;
        $productVariantItem->product_variant_item_status = $request->product_variant_item_status;
        $productVariantItem->product_variant_item_product_variant_id = $request->product_variant;
        $productVariantItem->save();
        toastr()->success("Variant Item: " .$request->product_variant_item_name ." Added Successfully!");
        return redirect()->route('admin.product-variant-items.index', ['product' => $request->product, 'variant' => $request->product_variant]);

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
        $productVariantItem = ProductVariantItem::findOrFail($id);
        $productVariant =   ProductVariant::findOrFail($request->variant);
        $product = Product::findOrFail($request->product);
        return view('admin.products.ProductVariantItem.update', compact('productVariantItem', 'productVariant', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_variant_item_name' => ['required', 'string', 'max:254', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_variant_item_price' => ['required', 'numeric', 'max:24', 'not_regex:/<[^>]*>|[=\';"]/',],
            'product_variant_item_is_default' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_variant_item_status' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_variant' => ['required', 'numeric', 'not_regex:/<[^>]*>|[=\';"]/'],
        ]);

        $productVariantItem = ProductVariantItem::findOrFail();
        $productVariantItem->product_variant_item_name = $request->product_variant_item_name;
        $productVariantItem->product_variant_item_price = $request->product_variant_item_price;
        $productVariantItem->product_variant_item_is_default = $request->product_variant_item_is_default;
        $productVariantItem->product_variant_item_status = $request->product_variant_item_status;
        $productVariantItem->product_variant_item_product_variant_id = $request->product_variant;
        $productVariantItem->save();
        toastr()->success("Variant Item: " .$request->product_variant_item_name ." Updated Successfully!");
        return redirect()->route('admin.product-variant-items.index', ['product' => $request->product, 'variant' => $request->product_variant]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $productVariantItem = ProductVariantItem::findOrFail($id);
       $productVariantItem->delete();
       return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function UpdateStatus(Request $request){
       $productVariantItem = ProductVariantItem::findOrFail($request->id);
       $productVariantItem->product_variant_item_status = $request->product_variant_item_status == "true" ? '1' : '0';
       $productVariantItem->save();
       return response(['message' => 'Status Changed Successfully!'], 200);
    }
}
