@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create Coupon Data</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Coupon</h4>
                </div>
                <div class="card-body">
                   <form action="" method="POST"> 
                     @csrf
                     <div class="form-group">
                        <label for="">Coupon Name</label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Coupon Code</label>
                        <input type="text" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Coupon Start Date</label>
                        <input type="date" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Coupon End Date</label>
                        <input type="date" name="" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Ttal Coupon</label>
                        <input type="text" name="" class="form-group">
                     </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      </div>
                   </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection