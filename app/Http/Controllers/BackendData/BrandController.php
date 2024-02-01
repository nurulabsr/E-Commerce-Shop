<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    use UploadImageTrait;
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){   
        $request->validate([
           'brand_image' => ['required', 'image', 'mimes:png,jpg', 'max:4096'],
           'brand_name'  => ['required', 'string', 'max:254'],
           'is_brand_featured' => ['boolean'],
           'brand_status' => ['boolean']
        ]);

        $brand = new Brand();
        $path = $this->ImageFilePathHandling($request, 'brand_image', 'BrandImage');
        $brand->brand_image = $path;
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name);
        $brand->is_brand_featured = $request->is_brand_featured;
        $brand->brand_status = $request->brand_status;
        $brand->save();
        toastr()->success("Brand Created Successfully!");
        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.update', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand_image' => ['image', 'mimes:png,jpg', 'max:4096'],
            'brand_name'  => ['required', 'string', 'max:254'],
            'is_brand_featured' => ['boolean'],
            'brand_status' => ['boolean']
         ]);
 
         $brand = Brand::findOrFail($id);
         $path = $this->UpdateImageFilePathHandling($request, 'brand_image', 'BrandImage', $brand->brand_image);
         $brand->brand_image =  empty(!$path) ? $path : $brand->brand_image; 
         $brand->brand_name = $request->brand_name;
         $brand->brand_slug = Str::slug($request->brand_name);
         $brand->is_brand_featured = $request->is_brand_featured;
         $brand->brand_status = $request->brand_status;
         $brand->save();
         toastr()->success("Brand Updated Successfully!");
         return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
