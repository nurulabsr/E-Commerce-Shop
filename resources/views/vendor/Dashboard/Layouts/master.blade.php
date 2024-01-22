<!DOCTYPE html>
<html lang="en">
<head>
  @include('CommonLink.header')
</head>
<body>
  <!--=============================
    DASHBOARD MENU START
  ==============================-->
  <div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
      <img src="{{Auth::user()->user_image?asset(Auth::user()->user_image) : asset('FrontendData/images/dashboard_user.jpg')}}" alt="img" class="img-fluid">
      <p>{{Auth::user()->name}}</p>
    </div>
  </div>
  <!--=============================
    DASHBOARD MENU END
  ==============================-->
   @yield('dashboard-content')

  
  <!--============================
      SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
      </div>
      <!--============================
        SCROLL BUTTON  END
      ==============================-->
    
    
    @include('CommonLink.footer')
    </body>
    
    </html>