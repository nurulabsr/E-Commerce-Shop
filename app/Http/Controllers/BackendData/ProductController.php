<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $datatable)
    {
        //
        return $datatable->render('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_thumnail_img' => ['required', 'image', 'max:4096', 'mimes:png,jpg'],
            'product_name' => ['required', 'regex:/^[\p{N}\p{L}_]+$/u', 'max:254'],
            'product_quantity' => ['required', 'numeric', 'integer'],
            'product_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], 
            'product_offer_price' => ['nullable', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'product_offer_start_date' => ['nullable', 'date'],
            'product_offer_end_date' => ['nullable', 'date'],
            'product_short_description' => ['required', 'regex:/^[\p{L}\d\s\-_.,:;!?()&%$@#*\'"[\]{}|\\\/]+$/u', 'max:400'],
            'product_long_description' => ['required', 'regex:/^[\p{L}\d\s\-_.,:;!?()&%$@#*\'"[\]{}|\\\/]+$/u', 'max:1000'],
            'product_video_link' => ['required', 'url'],
            'product_Stock_keeping_unit' => ['required', 'alpha_dash', 'max:60'],
            'product_type' => ['required', 'in:top_product,best_product,new_product,featured_product'],
            'product_SEO_title' => ['required', 'regex:/^[a-zA-Z0-9\s\-.,:;!?()&%$@#*\'"[\]{}|\\\/]+$/'],
            'product_SEO_description' => ['required', 'regex:/^[a-zA-Z0-9\s\-.,:;!?()&%$@#*\'"[\]{}|\\\/]+$/'],
            'product_brand_id' => ['required', 'integer', 'exists:brands,id'],
            'product_category_id' => ['required', 'integer', 'exists:categories,id'],
            'product_sub_category_id' => ['required', 'integer', 'exists:sub_categories,id'],
            'product_child_category_id' => ['required', 'integer', 'exists:child_categories,id']







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


    /**
     * Get Sub Categories of Product
     */

     public function GetSubCategories(Request $request){
       return  $subCategories = SubCategory::where('category_id', $request->id)->get();
     }

     public function GetChildCategories(Request $request){
        $subCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return $subCategories;
     }
}
