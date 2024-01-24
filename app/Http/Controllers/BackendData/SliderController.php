<?php

namespace App\Http\Controllers\BackendData;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;

class SliderController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
       return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
       return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'slider_banner' => ['required', 'image', 'max:10096'],
            'slider_type' => ['required', 'string', 'min:2', 'max:250'],
            'slider_title' => ['required', 'string', 'min:4', 'max:254'],
            'product_price_slider' => ['required', 'numeric', 'min:0'],
            'slider_button_url' => ['required', 'url'],
            'slider_serial' => ['required', 'integer'],
            'slider_status' => ['required', 'boolean'],
        ]);

       $slider = new Slider();
       $path = $this->ImageFilePathHandling($request, 'slider_banner', 'Uploads');
       $slider->slider_banner = $path;
       $slider->slider_type = $request->slider_type;
       $slider->slider_title = $request->slider_title;
       $slider->product_price_slider = $request->product_price_slider;
       $slider->slider_button_url = $request->slider_button_url;
       $slider->slider_serial = $request->slider_serial;
       $slider->slider_status = $request->slider_status;
       $slider->save();
       toastr()->success('Created Successfully!');
       return redirect()->back();

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
    public function edit(string $id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.update', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'slider_banner' => ['required', 'image', 'max:4096'], // will be nullable 
            'slider_type' => ['required', 'string', 'min:2', 'max:250'],
            'slider_title' => ['required', 'string', 'min:4', 'max:254'],
            'product_price_slider' => ['required', 'numeric', 'min:0'],
            'slider_button_url' => ['required', 'url'],
            'slider_serial' => ['required', 'integer'],
            'slider_status' => ['required', 'boolean'],
        ]);
         

       $slider = Slider::FindOrFail($id);
       $path = $this->UpdateImageFilePathHandling($request, 'slider_banner', 'Uploads', $slider->slider_banner);
       $slider->slider_banner = empty(!$path) ? $path : $slider->slider_banner;   // if validation will nullable then working otherwise throw validation error
       $slider->slider_type = $request->slider_type;
       $slider->slider_title = $request->slider_title;
       $slider->product_price_slider = $request->product_price_slider;
       $slider->slider_button_url = $request->slider_button_url;
       $slider->slider_serial = $request->slider_serial;
       $slider->slider_status = $request->slider_status;
       $slider->save();
       toastr()->success('Updated Successfully!');
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::FindOrFail($id);
        // dd($slider);
        $this->DeleteImage($slider->slider_banner);
        $slider->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        // toastr()->success('Deleted Successfully!');
        // try{ }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // return response()->json(['error' => 'Slider not found'], 404);
        // }
    }
}
