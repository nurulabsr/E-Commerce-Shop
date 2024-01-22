@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create Slider</h1>
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
                   <form action="">
                     @csrf
                     <div class="form-group">
                        <label for="">Banner</label>
                        <input type="file" name="slider_banner" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="slider_title" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Starting Price</label>
                        <input type="text" name="product_price_slider" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Button URL</label>
                        <input type="text" name="slider_button_url" class="form-control">
                     </div>
                     <div class="form-group">
                        <select name="banner_serial" class="form-control">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <select name="slidder_status" class="form-control">
                            <option value="">Select</option>
                            <option value="">Active</option>
                            <option value="">Inactive</option>
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