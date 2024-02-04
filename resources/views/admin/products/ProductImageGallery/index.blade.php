@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Table</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Image Gallery {{$product->product_name}}</div>
      </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                    
                    <section> 
                        <h4>Product: {{$product->product_name}}</h4>
                         <form action="" method="POST" enctype="multipart/form-data">
                           @csrf
                           <div class="form-group">
                             <label for="">Upload Image <code>[Multipe Image Supported]</code> </label>
                            <div>
                                <input type="file" name="product_image_gallery_img[]" multiple class="form-control">
                                <input type="hidden" name="product_image_gallery_product_id" value="{{$product->id}}">
                            </div>
                           </div>
                           <div class="form-group">
                             <button class="btn btn-primary">Upload</button>
                           </div>
                         </form>
                    </section>
                
            </div>
        </div>
      </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Product Image Gallery Table of {{$product->product_name}}</h4>
                    <div class="card-header-action"> 
                        <a href="" class="btn btn-primary"><i class="fa-solid fa-plus p-2"></i>Creat New</a>
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
  </script>
  @endpush

