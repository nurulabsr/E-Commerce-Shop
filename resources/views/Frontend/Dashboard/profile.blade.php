@extends('Frontend.Dashboard.Layouts.master')
@section('dashboard-content')
      <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      
        @include('Frontend.Dashboard.Layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>
                    <div class="col-xl-9">
                      <section class="row">
                        <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="col-xl-3 col-sm-6 col-md-6">
                            <div class="wsus__dash_pro_img">
                              <img src="images/ts-2.jpg" alt="img" class="img-fluid w-100 pt-4">
                              <input type="file" class="pt-4">
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fas fa-user-tie"></i>
                              <input type="text" name="name" placeholder="Name">
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fal fa-envelope-open"></i>
                              <input type="email" name="email" placeholder="Email">
                            </div>
                          </div>
                          <div class="col-xl-12">
                            <div class="wsus__dash_pro_single">
                              <textarea cols="3" rows="5" name="user_detail" placeholder="About You"></textarea>
                            </div>
                          </div>
                          <div class="col-xl-12">
                            <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                          </div>
                        </form>
                      </section>
                  </div>
                  <section>
                    <form action="{{route('profile.password.password')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                      <div class="wsus__dash_pass_change mt-2">
                        <div class="row">
                          <div class="col-xl-4 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fas fa-unlock-alt"></i>
                              <input type="password" placeholder="Current Password">
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fas fa-lock-alt"></i>
                              <input type="password" placeholder="New Password">
                            </div>
                          </div>
                          <div class="col-xl-4">
                            <div class="wsus__dash_pro_single">
                              <i class="fas fa-lock-alt"></i>
                              <input type="password" placeholder="Confirm Password">
                            </div>
                          </div>
                          <div class="col-xl-12">
                            <button class="common_btn" type="submit">upload</button>
                          </div>
                        </div>
                      </div>
                    </form>
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