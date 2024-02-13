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
                        <div class="row">
                          <div class="col-md-6"> <h4>Product Variant Table</h4></div>
                          <div class="col-md-6 d-flex justify-content-end">
                           <a class="btn btn-primary btn-sm" href="{{route('vendor.products-variant.index', ['product' => request()->product])}}"><i class="fa-solid fa-backward p-2"></i>Back</a>
                          </div>
                        </div>
                     </div>
                    <div class="card-body">
                        <section class="input_style">
                            <form action="{{route('vendor.products-variant-item.store')}}" method="POST"> 
                                @csrf
                                <div class="form-group">
                                   <label for="">Variant Name</label>
                                   <input type="text" name="name"value="{{$vendorProductVariant->product_variant_name}}"  class="form-control" readonly>
                                   <input type="hidden" name="product" value="{{$product->id}}">
                                   <input type="hidden" name="product" value="{{$vendorProductVariant->id}}">

                                </div>
                                <div class="form-group">
                                  <label for="">Price</label>
                                  <input type="text" name="product_variant_item_name" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Price</label>
                                  <input type="text" name="product_variant_item_price" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">is Default? <code>[Make 0 set as default]</code> </label>
                                  <select name="product_variant_item_is_default" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                   </select>                                </div>
                                <div class="form-group">
                                   <label for=""> Product Status</label>
                                   <select name="status" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                   </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary mt-5">Submit</button>
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
