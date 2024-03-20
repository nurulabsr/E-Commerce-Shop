<!DOCTYPE html>
<html lang="en">
    <head>
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/style.css')}}">
   @include('Frontend.FrontendCommonLink.header')
    </head>
<body>

    <!--============================
        HEADER START
    ==============================-->
   @include('Frontend.Layouts.header')
   


    <!--============================
        MAIN MENU START
    ==============================-->
    @include('Frontend.Layouts.manu')


     <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
           @yield('content')



    <!--============================
        FOOTER PART START
    ==============================-->
     @include('Frontend.Layouts.footer')
 


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


 @include('Frontend.FrontendCommonLink.footer')
@stack('scripts')
</body>

</html>