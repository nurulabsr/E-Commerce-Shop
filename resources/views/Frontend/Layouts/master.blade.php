<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Sazao || e-Commerce HTML Template</title>
    <link rel="icon" type="image/png" href="{{asset('Frontend/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/venobox.min.css')}}">

    <link rel="stylesheet" href="{{asset('FrontendData/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
    <!-- toaster.js -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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


    <!--jquery library js-->
    <script src="{{asset('FrontendData/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('FrontendData/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('FrontendData/js/Font-Awesome.js')}}"></script>
    <!--select2 js-->
    <script src="{{asset('FrontendData/js/select2.min.js')}}"></script>
    <!--slick slider js-->
    <script src="{{asset('FrontendData/js/slick.min.js')}}"></script>
    <!--simplyCountdown js-->
    <script src="{{asset('FrontendData/js/simplyCountdown.js')}}"></script>
    <!--product zoomer js-->
    <script src="{{asset('FrontendData/js/jquery.exzoom.js')}}"></script>
    <!--nice-number js-->
    <script src="{{asset('FrontendData/js/jquery.nice-number.min.js')}}"></script>
    <!--counter js-->
    <script src="{{asset('FrontendData/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('FrontendData/js/jquery.countup.min.js')}}"></script>
    <!--add row js-->
    <script src="{{asset('FrontendData/js/add_row_custon.js')}}"></script>
    <!--multiple-image-video js-->
    <script src="{{asset('FrontendData/js/multiple-image-video.js')}}"></script>
    <!--sticky sidebar js-->
    <script src="{{asset('FrontendData/js/sticky_sidebar.js')}}"></script>
    <!--price ranger js-->
    <script src="{{asset('FrontendData/js/ranger_jquery-ui.min.js')}}"></script>
    <script src="{{asset('FrontendData/js/ranger_slider.js')}}"></script>
    <!--isotope js-->
    <script src="{{asset('FrontendData/js/isotope.pkgd.min.js')}}"></script>
    <!--venobox js-->
    <script src="{{asset('FrontendData/js/venobox.min.js')}}"></script>
    <!--classycountdown js-->
    <script src="{{asset('FrontendData/js/jquery.classycountdown.js')}}"></script>

    <!--main/custom js-->
    <script src="{{asset('FrontendData/js/main.js')}}"></script>
    <!-- toasterjs cdn -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if($errors->any())
            @foreach ($errors->all() as $error )
                 toastr.error({{"$error"}})
            @endforeach
        @endif
    </script>
</body>

</html>