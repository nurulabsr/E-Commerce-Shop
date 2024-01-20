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
          <div class="card">
            <form action="{{route('admin.profile.update')}}" method="POST" class="needs-validation" novalidate="">
              @csrf
                <div class="container">
                    <div class="card-header">
                        <h4>Update Profile</h4>
                      </div>
                    <div class="form-group">                             
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{Auth::user()->name}}" required="">
                     </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{Auth::user()->email}}" required="">
                      </div>
                      <div class="form-group">
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>   
                     </div>  
                 </div>       
                                
                    
               
                           
                </div>
             </div>
                      
            </div>
            </div>
            </form>
  </section>
@endsection