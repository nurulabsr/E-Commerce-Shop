@extends('vendor.Layouts.master')
@section('dashboard-content')
<section class="section">
    <div class="section-header">
      <h1>Table</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Products</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Products Table</h4>
                    <div class="card-header-action"> 
                        <a href="" class="btn btn-primary"><i class="fa-solid fa-plus  pr-1"></i>Creat New</a>
                        <a href="" class="btn btn-info"><i class="fas fa-fast-backward pr-1"></i>Go Back</a>

                      </div>
                </div>
                <div class="card-body">
                  {{ $dataTable->table() }}
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush