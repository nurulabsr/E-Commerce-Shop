@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{Auth::user()->name}}</h2>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-7">
          
            <form action="{{route('admin.profile.update')}}" method="POST" class="needs-validation" novalidate="">
              @csrf
                <div class="container">
                  <div class="card">
                    <div class="card-header">
                        <h1>Update Profile</h1>
                    </div>
                   <div class="card-body">
                    <div class="form-group">                             
                      <label>Name</label>
                      <input type="text" name="name_admin" class="form-control" value="{{Auth::user()->name}}">
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email_admin" class="form-control" value="{{Auth::user()->email}}">
                  </div>
                  <div class="form-group text-right">
                          <button class="btn btn-primary">Save Changes</button> 
                  </div>   
                  </div> 
                 </div>                     
                </div>
            </form>
            <form action="{{route('admin.password.update')}}" method="POST" enctype="multipart/form-data">
              @csrf
             <div class="container">            
                      <div class="card">
                        <div class="card-header">
                          <h1>Update Password</h1>
                        </div>
                        <div class="card-body">
                          
                            @csrf
                            <div class="form-group">
                              <label for="">Current Password</label>
                              <input type="password" name="current_password" class="form-control">
                              @if ($errors->has('current_password'))
                              <code>{{$errors->first('current_password')}}</code>
                              @endif
                            </div>

                            <div class="form-group">
                              <label for="">New Password</label>
                              <input type="password" name="password" class="form-control">
                              @if ($errors->has('new_password'))
                              <code>{{$errors->first('new_password')}}</code>
                              @endif
                            </div>

                            <div class="form-group">
                              <label for="">Confirm Password</label>
                              <input type="password" name="password_confirmation" class="form-control">
                              @if ($errors->has('password_confirmation'))
                              <code>{{$errors->first('password_confirmation')}}</code>
                              @endif
                            </div>

                            <div class="form-group text-right">
                              <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                      </div>
                </div> 
            </form>
            </div>
                      
            </div>
            </div>
  </section>
@endsection