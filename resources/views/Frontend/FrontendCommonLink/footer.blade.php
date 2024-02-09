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
    <!-- toasterjs cdn -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- toasterjs cdn -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--main/custom js-->
    <script src="{{asset('FrontendData/js/main.js')}}"></script>
    <script>
        @if($errors->any())
            @foreach ($errors->all() as $error )
                 toastr.error("{{$error}}")
            @endforeach
        @endif
    </script>

    