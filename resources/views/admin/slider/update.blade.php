@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Update Slider</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Slider</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="">Banner</label>
                        <input type="file" name="slider_banner" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Slider Type</label>
                        <input type="text" name="slider_type" value="{{$slider->slider_type}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="slider_title" value="{{$slider->slider_title}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Starting Price</label>
                        <input type="text" name="product_price_slider" value="{{$slider->product_price_slider}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Button URL</label>
                        <input type="text" name="slider_button_url" value="{{$slider->slider_button_url}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Slider Serial</label>
                        <select name="slider_serial" value="{{$slider->slider_serial}}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Slider Status</label>
                        <select name="slidder_status" value="{{$slider->slidder_status}}" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary rounded">Create Slider</button>
                     </div>
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection