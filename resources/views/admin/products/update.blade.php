@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Update Product</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Product</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data"> 
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="">Product Thumbnail Imagee</label>
                        <img src="{{asset($product->product_thumnail_img)}}" alt="" width="50px">
                        <input type="file" name="product_thumnail_img"  class="form-control">

                     </div>
                     <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name"value="{{$product->product_name}}"  class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""> Product Quantity</label>
                        <input type="number" min="0" name="product_quantity"value="{{$product->product_quantity}}"  class="form-control">
                     </div>
                     <div class="form-group">
                          <div class="row">
                             <div class="col-md-6">
                                <label for="">Product Price</label>
                                <input type="text" name="product_price"value="{{$product->product_price}}"  class="form-control">
                             </div>
                             <div class="col-md-6">
                                <label for="">Product Offer Price</label>
                                <input type="text" name="product_offer_price"value="{{$product->product_offer_price}}"  class="form-control">
                             </div>
                          </div>
                     </div>
                     <div class="form-group">
                       <div class="row">
                          <div class="col-md-6">
                            <label for="">Product Offer Date Start</label>
                            <input type="date" name="product_offer_start_date"value="{{$product->product_offer_start_date}}"  class="form-control">
                          </div>
                          <div class="col-md-6">
                            <label for="">Product Offer Date End</label>
                        <input type="date" name="product_offer_end_date"value="{{$product->product_offer_end_date}}"  class="form-control">
                          </div>
                       </div>
                     </div>
                     <div class="form-group">
                        <label for="">Product Short Description</label>
                        <textarea name="product_short_description" class="form-control summernote"   cols="30" rows="10">{{$product->product_short_description}}</textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Product Long Description</label>
                        <textarea name="product_long_description" class="form-control summernote" cols="30" rows="10">{{$product->product_long_description}} </textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Product Video URL</label>
                        <input type="text" name="product_video_link" value="{{$product->product_video_link}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product Stock Keeping Unit</label>
                        <input type="text" name="product_Stock_keeping_unit"value="{{$product->product_Stock_keeping_unit}}"  class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product Features</label>
                        <select name="product_type" class="form-control">
                             <option value="">Select</option>
                             <option {{$product->product_type == "top_product" ? 'selected' : ''}} value="top_product">Top Product</option>
                             <option {{$product->product_type == "best_product" ? 'selected' : ''}} value="best_product">Best Product</option>
                             <option {{$product->product_type == "new_product" ? 'selected' : ''}} value="new_product">New Arraival</option>
                             <option {{$product->product_type == "featured_product" ? 'selected' : ''}} value="featured_product">Featured Product</option>

                        </select>
                     </div>
                     <div class="form-group">
                        <label for="">Product SEO Title</label>
                        <input type="text" name="product_SEO_title" value="{{$product->product_SEO_title}}"  class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product SEO Description</label>
                        <textarea name="product_SEO_description" class="form-control" cols="30" rows="10"> {{$product->product_SEO_description}}</textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Brand</label>
                        <select name="product_brand_id" value="{{$product->product_brand_id}}" class="form-control">
                            <option value="">Select</option>
                            @foreach ($brands as $brand)
                                <option {{$brand->id == $product->product_brand_id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Category</label>
                                <select name="product_category_id" value="{{old("product_category_id")}}" class="form-control paranet-category">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option {{$category->id==$product->product_category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Sub Category</label>
                                <select name="product_sub_category_id" value="{{old("product_sub_category_id")}}" class="form-control subcategory_name">
                                    <option value="">Select</option>
                                   @foreach ($subCategories as $subCategory)
                                       <option {{$subCategory->id == $product->product_sub_category_id ? 'selected' : ''}} value="{{$subCategory->id}}">{{$subCategory->sub_category_name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Child Category</label>
                                <select name="product_child_category_id" value="{{old("product_child_category_id")}}" class="form-control childcategory_name">
                                    <option value="">Select</option>
                                    @foreach ($childCategories as $childCategory)
                                        <option {{$childCategory->id == $product->product_child_category_id ? 'selected' : ''}} value="{{$childCategory->id}}">{{$childCategory->child_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                     </div>
                     <div class="fom-group">
                        <label for="">Product Status</label>
                        <select name="product_status"value="{{old("product_status")}}"  class="form-control">
                            <option value="">Select</option>
                            <option {{$product->product_status == 1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$product->product_status == 0 ? 'selected' : ''}} value="0">In Active</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <button class="btn btn-primary mt-3">Submit</button>
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
                $('.childcategory_name').html('<option value="">Select</option>')      
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.sub-categories')}}",
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
    /*  
     Get Child Category Via Ajax
    */
    $(document).ready(function(){
        $('body').on('change', '.subcategory_name', function(e){
            // alert('Hi!');
            let id = $(this).val();

            $.ajax({
                method: 'GET',
                url: "{{route('admin.child-categories')}}",
                data: {
                    id:id,
                },
                success: function(items){

                $('.childcategory_name').html('<option value="">Select</option>')      
                //    console.log(items); 
                $.each(items, function(i, item){ 
                    // console.log(item.child_category_name);
                    $('.childcategory_name').append(`<option value="${item.id}">${item.child_category_name}</option>`);
                })

                },

                error: function(xhr, status, error){

                }
            })
        })
    })
  </script>
@endpush