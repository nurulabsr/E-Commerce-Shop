@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Shipping Rule Table</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Shipping Rule</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>All Shipping Rule</h4>
                    <div class="card-header-action"> 
                        <a href="" class="btn btn-primary"><i class="fa-solid fa-plus p-2"></i>Creat New Shipping Rule</a>
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
<script>
  $(function(){
      $('body').on('click', '.status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');     
                    // console.log(id);  // let id = $(this).attr('id');                                       
          $.ajax({
            url:'{{route("admin.shipping-rule.status")}}',  //shipping-rule.status
            method: 'PUT',
            data:{
              _token: '{{ csrf_token() }}', 
              category_status:isChecked,
              id:id,
            },
            success: function(data){
              toastr.success(data.message);
            },
            error: function(xhr, status, error){
              console.log(error);
            }


          })
      });
  });
</script>
@endpush

