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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{asset('BackendData/assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/popper.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('BackendData/assets/js/stisla.js')}}"></script>
    
    <!-- JS Libraies -->
    <script src="{{asset('BackendData/assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/chart.min.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('BackendData/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
  
    <!-- Page Specific JS File -->
    <script src="{{asset('BackendData/assets/js/page/index-0.js')}}"></script>
   
    <!-- Template JS File -->
    <script src="{{asset('BackendData/assets/js/scripts.js')}}"></script>
    <script src="{{asset('BackendData/assets/js/custom.js')}}"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <!--main/custom js-->
    <script src="{{asset('FrontendData/js/main.js')}}"></script>
    <script>
        @if($errors->any())
            @foreach ($errors->all() as $error )
                 toastr.error("{{$error}}")
            @endforeach
        @endif
    </script>
       {{--  --}}
       <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $('body').on('click', '.delete-item', function(event) {
                event.preventDefault();
                let DeleteURL = $(this).attr('href');
        
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: DeleteURL,
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: data.message,
                                        icon: "success"
                                    });
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });
        });
    </script>
    
    {{--  // text: "Your file has been deleted.",
                                    // icon: "success" --}}
  @stack('scripts')

