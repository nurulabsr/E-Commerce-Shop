<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
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
        $ImagePath = $this->MultipleImageFilePathHandling($request, '', '');
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
