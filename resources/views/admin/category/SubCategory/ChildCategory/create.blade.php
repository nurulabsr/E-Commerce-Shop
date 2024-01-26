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
                     <h4>Sub Category</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('admin.child-category.store')}}" method="POST" enctype="multipart/form-data"> 
                     @csrf
                     <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_name" class="form-control">
                            <option value="">Select</option>
                             @foreach ($categories as $category)
                                 <option value="{{$category->id}}">{{$category->category_name}}</option>
                             @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Sub Category Name</label>
                        <input type="text" name="sub_category_name" value="{{old('sub-category_name')}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Sub-Category Status</label>
                        <select name="sub_category_status" value="{{old('sub-category_status')}}" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">In Active</option>
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