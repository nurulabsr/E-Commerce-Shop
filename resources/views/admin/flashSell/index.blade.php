@extends('admin.layouts.master')
@section('content')
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
      <div class="container">
        <div class="row">
            <div class="col-md-6">
              <h5>Flash Sell Date</h5>
              <div>
                <form action="{{route('admin.flashsell.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                       <label for="">Flash Sell End Date</label>
                       <input type="date" name="flashsell_end_date" value="{{$flashSell->end_date??''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
              </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <h5>Flash Sell Product</h5>
                </div>
                <div>
                   <form action="{{route('admin.flashsell.store')}}" method="POST">
                    @csrf
                       <div class="form-group">
                          <label for="">Flash Sell Product</label>
                          <select id="flash-sell-product" name="product" class="form-control select2">
                             @foreach ($products as $product)
                                  <option value="{{$product->id}}">{{$product->product_name}}</option>
                             @endforeach
                        </select>
                        </div>
                       <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control ">
                                 <option value="">Select</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">At Home Page?</label>
                                <select name="home_page" class="form-control ">
                                 <option value="">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                              </select>
                            </div>
                        </div>
                       </div>
                       <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                       </div>
                  </form>
                </div>
                    
             </div>                
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Products Table</h4>
                    <div class="card-header-action"> 
                        <a href="{{route('admin.category.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus p-2"></i>Creat New</a>
                        <a href="{{route('admin.products.index')}}" class="btn btn-info"><i class="fas fa-fast-backward p-2"></i>Go Back</a>

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
  $('body').on('click', '.status', function(){
      let isChecked = $(this).is(':checked');
      let id = $(this).data('id');     
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
</script>
@endpush
