<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\VendorProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $variant = ProductVariant::findOrFail($request->variant);
        return view('vendor.products.productVariantItems.create', compact('variant', 'product'));
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
           'product_variant_item_name' => ['required', 'string', 'max:254', 'not_regex:/<[^>]*>|[=\';"]/'],
           'status' => ['required', 'boolean', 'not_regex:/<[^>]*>|[=\';"]/'],
        ]);

        $vendorProductVariantItem = new ProductVariantItem();
        $vendorProductVariantItem->product_variant_item_name = $request->product_variant_item_name;
        $vendorProductVariantItem->product_variant_item_price = $request->product_variant_item_price;
        $vendorProductVariantItem->product_variant_item_is_default = $request->product_variant_item_is_default;
        $vendorProductVariantItem->product_variant_item_status = $request->status;
        $vendorProductVariantItem->product_variant_item_product_variant_id = $request->variant;
        $vendorProductVariantItem->product_variant_item_vendor_id = Auth::user()->id;
        $vendorProductVariantItem->save();
        toastr()->success("Variant Item Created Successfully!");
        return redirect()->route('vendor.products-variant-item.index', ['product' => $request->product, 'variant' => $request->variant]);
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
      $vendorProductVariantItem = ProductVariantItem::findOrFail($id);
      $product = Product::findOrFail($request->product);
      $variant = ProductVariant::findOrFail($request->variant);
      return view('vendor.products.productVariantItems.update', compact('vendorProductVariantItem', 'variant', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendorProductVariantItem = ProductVariantItem::findOrFail($id);
        $vendorProductVariantItem->product_variant_item_name = $request->product_variant_item_name;
        $vendorProductVariantItem->product_variant_item_price = $request->product_variant_item_price;
        $vendorProductVariantItem->product_variant_item_is_default = $request->product_variant_item_is_default;
        $vendorProductVariantItem->product_variant_item_status = $request->status;
        $vendorProductVariantItem->product_variant_item_product_variant_id = $request->variant;
        $vendorProductVariantItem->product_variant_vendor_id = Auth::user()->id;
        $vendorProductVariantItem->save();
        return redirect()->route('vendor.products-variant-item.index', ['product' => $request->product, 'variant' => $request->variant]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendorProductVariantItem = ProductVariantItem::findOrFail($id);
        $vendorProductVariantItem->delete();
        return(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
