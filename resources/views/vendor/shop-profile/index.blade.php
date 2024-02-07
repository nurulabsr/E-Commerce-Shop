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
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <section>
                   <div class="card">
                    <div class="card-header">
                        <h4>basic information</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="form-group">
                               <label for="">Banner</label>
                                   <input type="file" name="vendor_profile_banner" class="form-control">
                            </div>
                            <div class="form-group">
                               <label for="">Vendor Phone</label>
                               <input type="text" name="vendor_profile_phone"  class="form-control" value="{{old('vendor_profile_phone')}}">
                            </div>
        
                            <div class="form-group">
                               <label for="">Vendor Email</label>
                               <input type="email" name="vendor_profile_email" class="form-control" value="{{$vendor->email}}" readonly>
                            </div>
        
                            <div class="form-group">
                               <label for="">Vendor Address</label>
                               <input type="text" name="vendor_profile_address"  class="form-control" value="{{old('vendor_profile_address')}}">
                            </div>
                            <div class="form-group">
                               <label for="">Vendor Description</label>
                              <textarea name="vendor_profile_description" cols="30" rows="10" class="summernote form-control"></textarea>
                            </div>
                             
                            <div class="form-group">
                               <label for="">Vendor Facebook URL</label>
                               <input type="url" name="vendor_profile_facebook_url" class="form-control" value="{{old('vendor_profile_facebook_url')}}">
                            </div>
                            <div class="form-group">
                               <label for="">Vendor Twitter URL</label>
                               <input type="url" name="vendor_profile_twitter_url" class="form-control" value="{{old('vendor_profile_twitter_url')}}">
                            </div>
                            <div class="form-group">
                               <label for="">Vendor Instagram URL</label>
                               <input type="url" name="vendor_profile_insagram_url" class="form-control" value="{{old('vendor_profile_insagram_url')}}">
                            </div>
        
                            <div class="form-group">
                               <label for="">Vendor ID</label>
                               <input type="number" name="vendor_profile_user_id" class="form-control" value="{{$vendor->id}}">
                           </div>
                           
                            <div class="form-group">
                               <label for="">Vendor Active Status</label>
                               <select name="vendor_profile_status" value="" class="form-control">
                                   <option value="">Select</option>
                                   <option value="1">Active</option>
                                   <option value="0">In Active</option>
                               </select>
                            </div>
                             <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                             </div>
                        </form>
                    </div>
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