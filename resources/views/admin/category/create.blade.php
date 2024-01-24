@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create Category</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Category</h4>
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
                        <input type="text" name="slider_type" value="{{old('slider_type')}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Slider Serial</label>
                        <select name="slider_serial" value="{{old('banner_serial')}}" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                     </div>
                     
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection