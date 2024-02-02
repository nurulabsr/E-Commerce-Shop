@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create Product</h1>
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
                   <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data"> 
                     @csrf

                     <div class="form-group">
                        <label for="">Product Thumbnail Image</label>
                        <input type="file" name="product_thumnail_img" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""> Product Quantity</label>
                        <input type="number" name="product_quantity" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="number" name="product_price" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product Offer Price</label>
                        <input type="number" name="product_offer_price" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product Offer Date Start</label>
                        <input type="date" name="product_offer_start_date" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product Offer Date End</label>
                        <input type="date" name="product_offer_end_date" class="form-control">
                     </div>

                     <div class="form-group">
                        <label for="">Product Short Description</label>
                        <textarea name="product_short_description" class="form-control" cols="30" rows="10"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Product Long Description</label>
                        <textarea name="product_long_description" class="form-control" cols="30" rows="10"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="">Product Video URL</label>
                        <input type="text" name="product_video_link" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product Stock Keeping Unit</label>
                        <input type="text" name="product_Stock_keeping_unit" class="form-control">
                     </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Is Product Top</label>
                                <select name="is_product_top" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Is Product Best</label>
                                <select name="is_product_best" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Is Product Featured</label>
                                <select name="is_product_featured" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="">Product SEO Title</label>
                        <input type="text" name="product_SEO_title" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Product SEO Description</label>
                        <textarea name="product_SEO_description" class="form-control" cols="30" rows="10"></textarea>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                     </div>
                     
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection