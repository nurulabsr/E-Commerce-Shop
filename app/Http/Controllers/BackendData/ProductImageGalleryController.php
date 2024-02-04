<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class ProductImageGalleryController extends Controller
{
    use UploadImageTrait;
    public function index(ProductImageGalleryDataTable $datatable, Request $request)
    {  
        $product = Product::findOrFail($request->product);
        // dd($request->product);
        return $datatable->render('admin.products.ProductImageGallery.index', compact('product'));
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
            'product_image_gallery_img.*' => ['required', 'image', 'mimes:png,jpg', 'max:4096'],
            'product_image_gallery_product_id' => ['required', 'numeric', 'not_regex:/<[^>]*>|[=\';"]/'],
        ]);
        
        $ImagePaths = $this->MultipleImageFilePathHandling($request, 'product_image_gallery_img', 'uploads');
        if ($ImagePaths) {
            foreach ($ImagePaths as $ImagePath) {
                $productImageGallery = new ProductImageGallery();
                $productImageGallery->product_image_gallery_img = $ImagePath;
                $productImageGallery->product_image_gallery_product_id = $request->product_image_gallery_product_id;
                $productImageGallery->save();
            }
    
            toastr()->success("Image Uploaded Successfully!");
            return redirect()->back();
        } else {
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
        //
    }
}
