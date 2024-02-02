@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Admin Vendor Profile</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Admin Vendor</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('admin.vendor-profile.store')}}" method="POST" enctype="multipart/form-data"> 
                     @csrf
                     <div class="form-group">
                        <label for="">Banner</label>
                        <div>
                            <input type="file" name="admin_vendor_profile_banner" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Phone</label>
                        <input type="text" name="admin_vendor_profile_phone" value="{{old('admin_vendor_profile_phone')}}" class="form-control">
                     </div>

                     <div class="form-group">
                        <label for="">Vendor Email</label>
                        <input type="email" name="admin_vendor_profile_email" class="form-control">
                     </div>

                     <div class="form-group">
                        <label for="">Vendor Address</label>
                        <input type="text" name="admin_vendor_profile_address"  class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Description</label>
                       <textarea name="admin_vendor_profile_description" cols="30" rows="10" class="summernote form-control"></textarea>
                     </div>
                      
                     <div class="form-group">
                        <label for="">Vendor Facebook URL</label>
                        <input type="url" name="admin_vendor_profile_facebook_url" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Twitter URL</label>
                        <input type="url" name="admin_vendor_profile_twitter_url" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Instagram URL</label>
                        <input type="url" name="admin_vendor_profile_insagram_url" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Active Status</label>
                        <select name="admin_vendor_profile_status" value="{{old('admin_vendor_profile_status')}}" class="form-control">
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