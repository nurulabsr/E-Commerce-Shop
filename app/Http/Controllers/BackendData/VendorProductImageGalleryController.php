<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\VendorProductImageGalleryDataTable;
use App\DataTables\VendorProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductImageGallery;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class VendorProductImageGalleryController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(VendorProductImageGalleryDataTable $datatables)
    {
          return $datatables->render('vendor.products.imageGallery.index');
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
            'product_image_gallery_product_id.*' => ['required', 'image', 'mimes:png,jpg', 'max:5120'],
            'product' => ['numeric', 'not_regex:/<[^>]*>|[=\';"]/'],

        ]);
       
         $path = $this->MultipleImageFilePathHandling($request, 'product_image_gallery_product_id', 'uploads');
        $vendorProductImageGallery = new ProductImageGallery();
        $vendorProductImageGallery->product_image_gallery_img = $request->product_image_gallery_img;
        $vendorProductImageGallery->product_image_gallery_product_id = $request->product_image_gallery_product_id;
        $vendorProductImageGallery->save();


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
