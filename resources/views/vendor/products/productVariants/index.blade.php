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
            <h3><i class="far fa-user"></i>Product Variant Table</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <section>
                   <div class="card">
                    <div class="card-header">
                       <div class="row">
                         <div class="col-md-6"> <h4>Product Variant Table</h4></div>
                         <div class="col-md-6 d-flex justify-content-end">
                          <a class="btn btn-primary btn-sm" href="{{route('vendor.products-variant.create', ['product' => request()->product])}}"><i class="fa-solid fa-plus"></i> Create Product Variant</a>
                         </div>
                       </div>
                    </div>
                    <div class="card-body">
                      {{ $dataTable->table() }}
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
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush