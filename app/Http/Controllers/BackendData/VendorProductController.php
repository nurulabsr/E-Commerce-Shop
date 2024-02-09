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
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class VendorProductController extends Controller
{
     use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(VendorProductDataTable $datatable)
    {   
        if(Auth::user()->is_vendor !== 1){
            abort(404);
        }
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
        
        if(Auth::user()->is_vendor !== 1){
            abort(404);
        }
        
        return view('vendor.products.create', compact('categories', 'brands'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'product_thumnail_img'        =>   ['required',   'image',        'mimes:png,jpg', 'max:4096',                                 ],
           'product_name'                =>   ['required',   'max:254',      'string',                     'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_quantity'            =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_price'               =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_offer_price'         =>   ['nullable',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_offer_start_date'    =>   ['nullable',   'date',                                       'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_offer_end_date'      =>   ['nullable',   'date',                                       'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_short_description'   =>   ['required',   'max:400',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_long_description'    =>   ['required',   'max:1500',      'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_video_link'          =>   ['required',   'max:280',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_Stock_keeping_unit'  =>   ['required',   'max:80',        'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_type'                =>   ['required',   'max:254',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_SEO_title'           =>   ['nullable',   'max:255',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_SEO_description'     =>   ['nullable',   'max:400',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_brand_id'            =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_category_id'         =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_sub_category_id'     =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_child_category_id'   =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_status'              =>   ['required',   'boolean',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
         ]);   


        $vendorProduct = new Product();
        $path = $this->ImageFilePathHandling($request, 'product_thumnail_img', 'uploads');
        $vendorProduct->product_thumnail_img       = $path;
        $vendorProduct->product_name               = $request->product_name;
        $vendorProduct->product_slug               = Str::slug($request->product_slug);
        $vendorProduct->product_quantity           = $request->product_quantity;
        $vendorProduct->product_price              = $request->product_price;
        $vendorProduct->product_offer_price        = $request->product_offer_price;
        $vendorProduct->product_offer_start_date   = $request->product_offer_start_date;
        $vendorProduct->product_offer_end_date     = $request->product_offer_end_date;
        $vendorProduct->product_short_description  = $request->product_short_description;
        $vendorProduct->product_long_description   = $request->product_long_description;
        $vendorProduct->product_video_link         = $request->product_video_link;
        $vendorProduct->product_Stock_keeping_unit = $request->product_Stock_keeping_unit;
        $vendorProduct->product_type               = $request->product_type;
        $vendorProduct->is_product_approved        = '0';
        $vendorProduct->product_status             = $request->product_status;
        $vendorProduct->product_SEO_title          = $request->product_SEO_title;
        $vendorProduct->product_SEO_description    = $request->product_SEO_description;
        $vendorProduct->product_vendor_id          = $request->product_vendor_id;
        $vendorProduct->product_brand_id           = $request->product_brand_id;
        $vendorProduct->product_category_id        = $request->product_category_id;
        $vendorProduct->product_sub_category_id    = $request->product_sub_category_id;
        $vendorProduct->product_child_category_id  = $request->product_child_category_id;
        $vendorProduct->product_vendor_id = Auth::user()->id;  //error encontered 

        $vendorProduct->save();
        toastr()->success("Vendor Product: " . $request->product_name . "added Successfully!");
        return redirect()->route('vendor.products.index');


        
  }   
        
        




        
    /*** 
     * Display the specified resource.  
     **/                     
         
         
    public function  show( string  $id){           

     }      
  
  
    public function edit (string $id) 
    {   
        $vendorProduct = Product::findOrFail($id);
        $categories = Category::all();
        // $category = Category::where('id', $vendorProduct->product_category_id)->first();
        // dd($categories->category_name);
        $subCategories = SubCategory::all();
        // $subCategory = SubCategory::where('id', $vendorProduct->product_sub_category_id)->first();
        // dd($subCategories->sub_category_name);
        $childCategories = ChildCategory::all();
        // $chilCategory = ChildCategory::where('id', $vendorProduct->product_child_category_id)->first();
        // dd($chilCategories->child_category_name);
        $brands= Brand::all(); 
        // $brand = Brand::where('id', $vendorProduct->product_brand_id);
        return view('vendor.products.update', compact('vendorProduct', 'categories', 'subCategories', 'childCategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */    public function update(Request $request, string $id)
    {   
        $request->validate([
            'product_thumnail_img'        =>   ['nullable',   'image',        'mimes:png,jpg', 'max:4096',                                 ],
            'product_name'                =>   ['required',   'max:254',      'string',                     'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_quantity'            =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_price'               =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_offer_price'         =>   ['nullable',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_offer_start_date'    =>   ['nullable',   'date',                                       'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_offer_end_date'      =>   ['nullable',   'date',                                       'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_short_description'   =>   ['required',   'max:400',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_long_description'    =>   ['required',   'max:1500',      'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_video_link'          =>   ['required',   'max:280',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_Stock_keeping_unit'  =>   ['required',   'max:80',        'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_type'                =>   ['required',   'max:254',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_SEO_title'           =>   ['nullable',   'max:255',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_SEO_description'     =>   ['nullable',   'max:400',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_brand_id'            =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_category_id'         =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_sub_category_id'     =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_child_category_id'   =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
            'product_status'              =>   ['required',   'boolean',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
          ]);   

          if(Auth::user()->is_vendor !== 1){
            abort(404);
        }

        $vendorProduct = Product::findOrFil($id);
        $path = $this->UpdateImageFilePathHandling($request, 'product_thumnail_img', 'uploads', $request->product_thumnail_img);
        $vendorProduct->product_thumnail_img = !empty($path) ? $path : $request->product_thumnail_img;
        $vendorProduct->product_name = $request->product_name;
        $vendorProduct->product_slug = Str::slug($request->product_name);
        $vendorProduct->product_quantity = $request->product_quantity;
        $vendorProduct->product_quantity           = $request->product_quantity;
        $vendorProduct->product_price              = $request->product_price;
        $vendorProduct->product_offer_price        = $request->product_offer_price;
        $vendorProduct->product_offer_start_date   = $request->product_offer_start_date;
        $vendorProduct->product_offer_end_date     = $request->product_offer_end_date;
        $vendorProduct->product_short_description  = $request->product_short_description;
        $vendorProduct->product_long_description   = $request->product_long_description;
        $vendorProduct->product_video_link         = $request->product_video_link;
        $vendorProduct->product_Stock_keeping_unit = $request->product_Stock_keeping_unit;
        $vendorProduct->product_type               = $request->product_type;
        $vendorProduct->product_status             = $request->product_status;
        $vendorProduct->product_SEO_title          = $request->product_SEO_title;
        $vendorProduct->product_SEO_description    = $request->product_SEO_description;
        $vendorProduct->product_vendor_id          = $request->product_vendor_id;
        $vendorProduct->product_brand_id           = $request->product_brand_id;
        $vendorProduct->product_category_id        = $request->product_category_id;
        $vendorProduct->product_sub_category_id    = $request->product_sub_category_id;
        $vendorProduct->product_child_category_id  = $request->product_child_category_id;
      
       $vendorProduct->save();
       toastr()->success("Updated");
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
