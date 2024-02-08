<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\TestModelDataTable;
use App\DataTables\VendorProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class VendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VendorProductDataTable $datatable)
    {
        // return view('vendor.products.index');
        return $datatable->render('vendor.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $brands = Brand::all();
        $categories = Category::all();
        return view('vendor.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function GetSubCategories(Request $request){
        return  $subCategories = SubCategory::where('category_id', $request->id)->get();
      }
 
      public function GetChildCategories(Request $request){
         $subCategories = ChildCategory::where('sub_category_id', $request->id)->get();
         return $subCategories;
      }
     
      public function ChangeProductStatus(Request $request){
         $product = Product::findOrFail($request->id);
         $product->product_status = $request->product_status == 'true' ? '1' : '0';
         $product->save();
         return response(['message' => 'Status Changed Successfully!'], 200);
      }
}
