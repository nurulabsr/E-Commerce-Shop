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
                            <form action="" method="POST" enctype="multipart/form-data"> 
                                @csrf
                                <div class="form-group">
                                   <label for="">Variant Name</label>
                                   <input type="text" name="name"value="{{old("name")}}"  class="form-control">
                                   <input type="hidden" name="product" value="{{$product->id}}">
                                </div>
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
