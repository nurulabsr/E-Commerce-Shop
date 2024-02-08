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
use Illuminate\Support\Str;
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
        $request->validate([
           'product_thumnail_img'        =>   ['required',   'image',        'mimes:png,jpg', 'max:4096',                                 ],
           'product_name'                =>   ['required',   'max:254',      'string',                     'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_quantity'            =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_price'               =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_offer_price'         =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_offer_start_date'    =>   ['required',   'date',                                       'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_offer_end_date'      =>   ['required',   'date',                                       'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_short_description'   =>   ['required',   'max:400',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_long_description'    =>   ['required',   'max:1500',      'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_video_link'          =>   ['required',   'max:280',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_Stock_keeping_unit'  =>   ['required',   'max:80',        'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_type'                =>   ['required',   'max:254',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_SEO_title'           =>   ['required',   'max:255',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_SEO_description'     =>   ['required',   'max:400',       'string',                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_brand_id'            =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_category_id'         =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_sub_category_id'     =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_child_category_id'   =>   ['required',   'numeric',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
           'product_status'              =>   ['required',   'boolean',                                    'not_regex:/<[^>]*>|[=\';"]/', ],
         ]);   


        $vendorProduct = new Product();
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
        


        
  }   
        
        




        
    /*** 
     * Display the specified resource.  
     **/                     
         
         
    public function  show( string  $id){           

     }      
  
  
    public function edit ( string $id) 
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */    public function update(Request $request, string $id)
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
