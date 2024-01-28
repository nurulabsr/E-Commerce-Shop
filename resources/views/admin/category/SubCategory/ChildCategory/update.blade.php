@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Update Child Category</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Child Category</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('admin.child-category.update', $childCategory->id)}}" method="POST" enctype="multipart/form-data"> 
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="">Child Category</label>
                        <select name="category_id" class="form-control paranet-category">
                            <option value="">Select</option>
                             @foreach ($categories as $category)
                                 <option {{$category->id == $childCategory->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name}}</option>
                             @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Sub Category Name</label>
                        <select name="sub_category_id" class="form-control subcategory_name">
                            <option value="">Select</option>
                            @foreach ($subCategories as $subCategory)
                            <option  {{$subCategory->id == $childCategory->sub_category_id?'selected':''}} value="{{$subCategory->id}}">{{$subCategory->sub_category_name}}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Child Category Name</label>
                        <input type="text" name="child_category_name" value="{{$childCategory->child_category_name}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Sub-Category Status</label>
                        <select name="child_category_status" class="form-control">
                            <option value="">Select</option>
                            <option {{$childCategory->child_category_status ==1?'selected':''}} value="1">Active</option>
                            <option {{$childCategory->child_category_status ==0?'selected':''}}  value="0">In Active</option>
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

@push('scripts')
    <script>
        $(document).ready(function(){
            $('body').on('change', '.paranet-category', function(e){
                // alert('Hi!');
                let id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.get-sub-categories')}}",
                    data: {
                        id:id,
                    },
                    success: function(items){

                    $('.subcategory_name').html('<option value="">Select</option>')       //    console.log(items); 
                    $.each(items, function(i, item){                                        // console.log(item.sub_category_name);
                        $('.subcategory_name').append(`<option value="${item.id}">${item.sub_category_name}</option>`);
                    })

                    },

                    error: function(xhr, status, error){

                    }
                })
            })
        })
    </script>
@endpush