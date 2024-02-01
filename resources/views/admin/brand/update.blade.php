@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Update Brand</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Brand</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('admin.brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data"> 
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="">Brand Image</label>
                        <img src="{{asset($brand->brand_image)}}" alt="" width="70px">
                        <input type="file" name="brand_image" class="form-controll">
                     </div>
                     <div class="form-group">
                        <label for="">Brand Name</label>
                        <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Is Brand Featured?</label>
                        <select name="is_brand_featured" value="{{$brand->is_brand_featured}}" class="form-control">
                            <option value="">Select</option>
                            <option {{$brand->is_brand_featured == 1 ? 'selected' : ''}} value="1">Yes</option>
                            <option {{$brand->is_brand_featured == 0 ? 'selected' : ''}} value="0">No</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Brand Status</label>
                        <select name="brand_status" value="{{$brand->brand_status}}" class="form-control">
                            <option value="">Select</option>
                            <option {{$brand->brand_status == 1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$brand->brand_status == 0 ? 'selected' : ''}} value="0">In Active</option>
                        </select>
                     </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary mt-3">Create Brand</button>
                      </div>
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection