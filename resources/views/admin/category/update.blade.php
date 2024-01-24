@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Update Category</h1>
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
                   <form action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data"> 
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="">Icon</label>
                        <div>
                            <button name="category_icon" type="button" class="btn btn-primary btn-lg" data-selected-class="btn-danger" data-unselected-class="btn-primary" data-rows="4" data-cols="8" role="iconpicker"></button>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" value="{{old('slider_type')}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Category Status</label>
                        <select name="category_status" value="{{old('banner_serial')}}" class="form-control">
                            <option value="">Select</option>
                            <option {{$category->category_status==1?'selected':''}} value="1">Active</option>
                            <option {{$category->category_status==0?'selected':''}} value="0">In Active</option>
                        </select>
                     </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      </div>
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection