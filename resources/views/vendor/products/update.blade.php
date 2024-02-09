@extends('vendor.Layouts.master')
@section('dashboard-content')
      <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.Layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i>Update profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <section>
                   <div class="card">
                    <div class="card-header">
                        <h4>Create Product</h4>
                    </div>
                    <div class="card-body">
                        <section class="input_style">
                            <form action="{{route('vendor.shop-profile.store')}}" method="POST" enctype="multipart/form-data"> 
                                @csrf
           
                                <div class="form-group">
                                   <label for="">Product Thumbnail Image</label>
                                   <img src="{{asset($vendorProduct->product_thumnail_img)}}" width="70px">
                                   <input type="file" name="product_thumnail_img"  class="form-control">
                                </div>
                                <div class="form-group">
                                   <label for="">Product Name</label>
                                   <input type="text" name="product_name" value="{{$vendorProduct->product_name}}"  class="form-control">
                                </div>
                                <div class="form-group">
                                   <label for=""> Product Quantity</label>
                                   <input type="number" min="0" name="product_quantity" value="{{$vendorProduct->product_quantity}}"  class="form-control">
                                </div>
                                <div class="form-group">
                                     <div class="row">
                                        <div class="col-md-6">
                                           <label for="">Product Price</label>
                                           <input type="text" name="product_price" value="{{$vendorProduct->product_price}}"  class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                           <label for="">Product Offer Price</label>
                                           <input type="text" name="product_offer_price" value="{{$vendorProduct->product_offer_price}}"  class="form-control">
                                        </div>
                                     </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                     <div class="col-md-6">
                                       <label for="">Product Offer Date Start</label>
                                       <input type="date" name="product_offer_start_date"value="{{$vendorProduct->product_offer_start_date}}"  class="form-control">
                                     </div>
                                     <div class="col-md-6">
                                       <label for="">Product Offer Date End</label>
                                   <input type="date" name="product_offer_end_date"value="{{$vendorProduct->product_offer_end_date}}"  class="form-control">
                                     </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                   <label for="product_short_description">Product Short Description</label>
                                   <textarea style="height: 264px !important;" name="product_short_description"  class="form-control" cols="30" rows="30">{{ $vendorProduct->product_short_description }}</textarea>
                               </div>                    
                                <div class="form-group">
                                   <label for="product_long_description">Product Long Description</label>
                                   <textarea style="height: 264px !important;" name="product_long_description" class="form-control" cols="30" rows="30">{{ $vendorProduct->product_long_description }} </textarea>
                                </div>
                                <div class="form-group">
                                   <label for="">Product Video URL</label>
                                   <input type="text" name="product_video_link" value="{{$vendorProduct->product_video_link}}" class="form-control">
                                </div>
                                <div class="form-group">
                                   <label for="">Product Stock Keeping Unit</label>
                                   <input type="text" name="product_Stock_keeping_unit"value="{{$vendorProduct->product_Stock_keeping_unit}}"  class="form-control">
                                </div>
                                <div class="form-group">
                                   <label for="">Product Features</label>
                                   <select name="product_type" value="{{$vendorProduct->product_type}}"  class="form-control">
                                        <option value="">Select</option>
                                        <option {{$vendorProduct->product_type == 'top_product'      ? 'selected' : ''}} value="top_product">Top Product</option>
                                        <option {{$vendorProduct->product_type == 'best_product'     ? 'selected' : ''}} value="best_product">Best Product</option>
                                        <option {{$vendorProduct->product_type == 'new_product'      ? 'selected' : ''}} value="new_product">New Arraival</option>
                                        <option {{$vendorProduct->product_type == 'featured_product' ? 'selected' : ''}} value="featured_product">Featured Product</option>
           
                                   </select>
                                </div>
                                <div class="form-group">
                                   <label for="">Product SEO Title</label>
                                   <input type="text" name="product_SEO_title" value="{{$vendorProduct->product_SEO_title}}"  class="form-control">
                                </div>
                                <div class="form-group">
                                   <label for="">Product SEO Description</label>
                                   <textarea style="height: 250px !important;" name="product_SEO_description" class="form-control" cols="30" rows="10"> {{$vendorProduct->product_SEO_description}}</textarea>
                                </div>
                                <div class="form-group">
                                   <label for="">Brand</label>
                                   <select name="product_brand_id" value="{{$vendorProduct->product_brand_id}}" class="form-control">
                                       <option value="">Select</option>
                                       @foreach ($brands as $brand)
                                           <option {{$brand->id == $vendorProduct->product_brand_id ? 'selected' : '' }} value="{{$brand->id}}">{{$brand->brand_name}}</option>
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
                                                   <option {{$category->id == $vendorProduct->product_category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                       <div class="col-md-4">
                                           <label for="">Sub Category</label>
                                           <select name="product_sub_category_id" value="{{old("product_sub_category_id")}}" class="form-control subcategory_name">
                                               <option value="">Select</option>
                                               @foreach ($subCategories as $subCategory)
                                                   <option {{$subCategory->id == $vendorProduct->product_sub_category_id ? 'selected' : ''}} value="{{$subCategory->id}}">{{$subCategory->sub_category_name}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                       <div class="col-md-4">
                                           <label for="">Child Category</label>
                                           <select name="product_child_category_id" value="{{old("product_child_category_id")}}" class="form-control childcategory_name">
                                               <option value="">Select</option>
                                               @foreach ($childCategories as $childCategory)
                                                   <option {{$childCategory->id == $vendorProduct->product_child_category_id ? 'selected' : ''}} value="{{$childCategory->id}}">{{$childCategory->child_category_name}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>
                                </div>
                                <div class="fom-group">
                                   <label for="">Product Status</label>
                                   <select name="product_status"value="{{old("product_status")}}"  class="form-control">
                                       <option value="">Select</option>
                                       <option {{$vendorProduct->product_status == 1 ? 'selected' : ''}} value="1">Active</option>
                                       <option {{$vendorProduct->product_status == 0 ? 'selected' : ''}} value="0">In Active</option>
                                   </select>
                               </div>
                                <div class="form-group">
                                   <button class="btn btn-primary mt-3">Submit</button>
                                </div>
                            </form>
                          </section>
                   </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD END
  ==============================-->
@endsection
@push('scripts')

@endpush