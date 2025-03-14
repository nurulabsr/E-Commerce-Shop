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
            <h3><i class="far fa-user"></i>Product Variant Items of  {{Auth::user()->name}}</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <section>
                   <div class="card">
                    <div class="card-header">
                         <div class="row">
                          <div class="col-md-6">
                            <h4>{{$product->product_name}} : Variant Items Table</h4>
                          </div>
                          <div class="col-md-6 d-flex justify-content-end">
                            <a class="btn btn-primary btn-m" href="{{route('vendor.products-variant-item.create', ['product' => request()->product, 'variant' => request()->variant])}}"><i class="fa-solid fa-plus"></i> Create Variant Items</a>
                            <a href="{{route('vendor.products-variant.index', ['product' => request()->product])}}" class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-backward p-2"></i>Back</a>
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