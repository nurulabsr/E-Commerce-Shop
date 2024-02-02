@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create Product</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Product</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data"> 
                     @csrf

                     <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                     </div>
                     
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection