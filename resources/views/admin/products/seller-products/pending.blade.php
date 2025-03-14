@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Seller Pending Product Table</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">All Pending Products</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
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
            url:'{{route("admin.products.status")}}',  //products.status
            method: 'PUT',
            data:{
              _token: '{{ csrf_token() }}', 
              product_status:isChecked,
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

      $('body').on('change', '.is_approve', function(){
        let value = $(this).val();
        let id = $(this).data('id');
        console.log(value);
        
        $.ajax({
            url: '{{ route("admin.product.approve.status") }}', 
            method: 'PUT',
            data: {
                _token: '{{ csrf_token() }}', 
                value: value,
                id: id
            },
            success: function(data){
                console.log(data);
                toastr.success(data.message);
                location.reload();
            },
            error: function(xhr, status, error){
                console.log(error);
            }
        });
    });

</script>
@endpush

