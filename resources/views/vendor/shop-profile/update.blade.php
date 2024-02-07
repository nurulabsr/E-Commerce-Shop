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