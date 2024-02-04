<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
// use App\Rules\AlphaNumSpacesPunctuation;
class ProductController extends Controller
{
    use UploadImageTrait;
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
            'product_name' => ['required', 'regex:/^[\p{N}\p{L}_\s]+$/', 'max:254', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_quantity' => ['required', 'numeric', 'integer',  'not_regex:/<[^>]*>|[=\';"]/'],
            'product_price' => ['required', 'numeric', 'decimal:2,4', 'not_regex:/<[^>]*>|[=\';"]/'], 
            'product_offer_price' => ['nullable', 'numeric', 'decimal:2', 'not_regex:/<[^>]*>|[\';"]/'],
            'product_offer_start_date' => ['nullable', 'date'],
            'product_offer_end_date' => ['nullable', 'date'],
            'product_short_description' => ['required', 'string', 'not_regex:/<[^>]*>|[=\';"]/', 'max:400'],
            'product_long_description' => ['required',   'string', 'not_regex:/<[^>]*>|[=\';"]/', 'max:1000'],
            'product_video_link' => ['required', 'url'],
            'product_Stock_keeping_unit' => ['required', 'alpha_dash', 'max:60'],
            'product_type' => ['required', 'in:top_product,best_product,new_product,featured_product'],
            'product_SEO_title' => ['required',       'not_regex:/<[^>]*>|[=\';"]/' ],
            'product_SEO_description' => ['required', 'not_regex:/<[^>]*>|[=\';"]/' ],
            'product_brand_id' => ['required', 'integer', 'exists:brands,id'],
            'product_category_id' => ['required', 'integer', 'exists:categories,id'],
            'product_sub_category_id' => ['required', 'integer', 'exists:sub_categories,id'],
            'product_child_category_id' => ['required', 'integer', 'exists:child_categories,id']

        ]);

        $product = new Product();
        $product->product_thumnail_img = $this->ImageFilePathHandling($request, 'product_thumnail_img', 'uploads');
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_offer_price = $request->product_offer_price;
        $product->product_offer_start_date = $request->product_offer_start_date;
        $product->product_offer_end_date = $request->product_offer_end_date;
        $product->product_short_description = $request->product_short_description;
        $product->product_long_description = $request->product_long_description;
        $product->product_video_link = $request->product_video_link;
        $product->product_Stock_keeping_unit = $request->product_Stock_keeping_unit;
        $product->product_type = $request->product_type;
        $product->is_product_approved = 1;
        $product->product_status = $request->product_status;
        $product->product_SEO_title = $request->product_SEO_title;
        $product->product_SEO_description = $request->product_SEO_description;
        $product->product_vendor_id = Auth::user()->vendor->id;
        $product->product_brand_id = $request->product_brand_id;
        $product->product_category_id = $request->product_category_id;
        $product->product_sub_category_id = $request->product_sub_category_id;
        $product->product_child_category_id = $request->product_child_category_id;

        $product->save();
        toastr()->success("Added!");
        return redirect()->back();   //route('admin.products.index');
        
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
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $childCategories = ChildCategory::all();
        return view('admin.products.update', compact('product', 'brands', 'categories', 'subCategories', 'childCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'product_thumnail_img' => ['required', 'image', 'max:4096', 'mimes:png,jpg'],
            'product_name' => ['required', 'regex:/^[\p{N}\p{L}_\s]+$/', 'max:254', 'not_regex:/<[^>]*>|[=\';"]/'],
            'product_quantity' => ['required', 'numeric', 'integer',  'not_regex:/<[^>]*>|[=\';"]/'],
            'product_price' => ['required', 'numeric', 'decimal:2,4', 'not_regex:/<[^>]*>|[=\';"]/'], 
            'product_offer_price' => ['nullable', 'numeric', 'decimal:2', 'not_regex:/<[^>]*>|[\';"]/'],
            'product_offer_start_date' => ['nullable', 'date'],
            'product_offer_end_date' => ['nullable', 'date'],
            'product_short_description' => ['required', 'string', 'not_regex:/<[^>]*>|[=\';"]/', 'max:400'],
            'product_long_description' => ['required',   'string', 'not_regex:/<[^>]*>|[=\';"]/', 'max:1000'],
            'product_video_link' => ['required', 'url'],
            'product_Stock_keeping_unit' => ['required', 'alpha_dash', 'max:60'],
            'product_type' => ['required', 'in:top_product,best_product,new_product,featured_product'],
            'product_SEO_title' => ['required',       'not_regex:/<[^>]*>|[=\';"]/' ],
            'product_SEO_description' => ['required', 'not_regex:/<[^>]*>|[=\';"]/' ],
            'product_brand_id' => ['required', 'integer', 'exists:brands,id'],
            'product_category_id' => ['required', 'integer', 'exists:categories,id'],
            'product_sub_category_id' => ['required', 'integer', 'exists:sub_categories,id'],
            'product_child_category_id' => ['required', 'integer', 'exists:child_categories,id']

        ]);
        $path =  $this->UpdateImageFilePathHandling($request, 'product_thumnail_img', 'uploads', $product->product_thumnail_img);
        $product->product_thumnail_img = empty(!$path) ? $path : $product->product_thumnail_img;
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_offer_price = $request->product_offer_price;
        $product->product_offer_start_date = $request->product_offer_start_date;
        $product->product_offer_end_date = $request->product_offer_end_date;
        $product->product_short_description = $request->product_short_description;
        $product->product_long_description = $request->product_long_description;
        $product->product_video_link = $request->product_video_link;
        $product->product_Stock_keeping_unit = $request->product_Stock_keeping_unit;
        $product->product_type = $request->product_type;
        $product->is_product_approved = 1;
        $product->product_status = $request->product_status;
        $product->product_SEO_title = $request->product_SEO_title;
        $product->product_SEO_description = $request->product_SEO_description;
        $product->product_vendor_id = Auth::user()->vendor->id;
        $product->product_brand_id = $request->product_brand_id;
        $product->product_category_id = $request->product_category_id;
        $product->product_sub_category_id = $request->product_sub_category_id;
        $product->product_child_category_id = $request->product_child_category_id;
        $product->save();
        toastr()->success("Updated Successfully!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $this->DeleteImage($product->product_thumnail_img);
        $product->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

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
