<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\VendorProductImageGalleryDataTable;
use App\DataTables\VendorProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductImageGalleryController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(VendorProductImageGalleryDataTable $datatables, Request $request)
    {     
        if(Auth::user()->is_vendor !== 1){
            abort(404);
        }
          $product = Product::findOrFail($request->product);
          return $datatables->render('vendor.products.imageGallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_image_gallery_img.*' => ['required', 'image', 'mimes:png,jpg', 'max:91440'],
            'product_image_gallery_product_id' => ['numeric', 'not_regex:/<[^>]*>|[=\';"]/'],

        ]);
       
        $ImagePaths = $this->MultipleImageFilePathHandling($request, 'product_image_gallery_img', 'uploads');
        if($ImagePaths) {
            foreach ($ImagePaths as $ImagePath) {
                $vendorProductImageGallery = new ProductImageGallery();
                $vendorProductImageGallery->product_image_gallery_img = $ImagePath;
                $vendorProductImageGallery->product_image_gallery_product_id = $request->product_image_gallery_product_id;
                $vendorProductImageGallery->save();
            }
            toastr()->success("Image Uploaded Successfully!");
            return redirect()->route('vendor.image-gallery.index', ['product' => $request->product_image_gallery_product_id]);
        } 
        else {
            toastr()->error("No images were uploaded.");
            return redirect()->back()->withErrors(['product_image_gallery_img' => 'No images were uploaded.']);
        }


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
        $vendorProductImageGallery = Product::findOrFail($id);
        $this->DeleteImage($vendorProductImageGallery->product_image_gallery_img);
        $vendorProductImageGallery->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
