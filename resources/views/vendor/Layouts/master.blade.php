<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
  @include('Frontend.FrontendCommonLink.header')
      <!--Yajra DataTables -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css"> --}}

{{-- <link rel="stylesheet" href="href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/> --}}
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="{{asset('BackendData/assets/css/bootstrap-iconpicker.min.css')}}"> --}}
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css">
  {{-- @include('vendor.CommonLink.header') --}}
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
    
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    @include('Frontend.FrontendCommonLink.footer')
    <script src="{{asset('BackendData/assets/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    {{-- @include('vendor.CommonLink.footer') --}}
  {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>"></script>
  </body>
    
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
                                } else if (data.status == 'error') {
                                    Swal.fire({
                                        title: "Can't Delete!",
                                        text: data.message,
                                        icon: "error"
                                    });
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
  @stack('scripts')
    </html>