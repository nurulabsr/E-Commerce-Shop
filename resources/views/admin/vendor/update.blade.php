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
                     @method('PUT')
                     <div class="form-group">
                        <label for="">Banner</label>
                        <div>
                            <img src="{{asset($vendor_profile->admin_vendor_profile_banner)}}" width="50px">
                            <input type="file" name="admin_vendor_profile_banner" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Phone</label>
                        <input type="text" name="admin_vendor_profile_phone"  class="form-control" value="{{$vendor_profile->admin_vendor_profile_phone}}">
                     </div>

                     <div class="form-group">
                        <label for="">Vendor Email</label>
                        <input type="email" name="admin_vendor_profile_email" class="form-control" value="{{$vendor_profile->admin_vendor_profile_email}}">
                     </div>

                     <div class="form-group">
                        <label for="">Vendor Address</label>
                        <input type="text" name="admin_vendor_profile_address"  class="form-control" value="{{$vendor_profile->admin_vendor_profile_address}}">
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Description</label>
                       <textarea name="admin_vendor_profile_description" cols="30" rows="10" class="summernote form-control"> {{$vendor_profile->admin_vendor_profile_description}}</textarea>
                     </div>
                      
                     <div class="form-group">
                        <label for="">Vendor Facebook URL</label>
                        <input type="url" name="admin_vendor_profile_facebook_url" class="form-control" value="{{$vendor_profile->admin_vendor_profile_facebook_url}}">
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Twitter URL</label>
                        <input type="url" name="admin_vendor_profile_twitter_url" class="form-control" value="{{$vendor_profile->admin_vendor_profile_twitter_url}}">
                     </div>
                     <div class="form-group">
                        <label for="">Vendor Instagram URL</label>
                        <input type="url" name="admin_vendor_profile_insagram_url" class="form-control" value="{{$vendor_profile->admin_vendor_profile_insagram_url}}">
                     </div>

                     <div class="form-group">
                        <label for="">Admin Vendor ID</label>
                        <input type="number" name="admin_vendor_profile_user_id" class="form-control" value="{{ $user_profile ? $user_profile->id : '' }}">
                    </div>
                    
                     <div class="form-group">
                        <label for="">Vendor Active Status</label>
                        <select name="admin_vendor_profile_status"  class="form-control">
                            <option {{$vendor_profile->admin_vendor_profile_status==1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$vendor_profile->admin_vendor_profile_status==0 ? 'selected' : ''}} value="0">In Active</option>
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