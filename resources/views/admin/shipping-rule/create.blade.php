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
                  <form method="POST" action=""> 
                     @csrf
                     <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Shipping Type</label>
                        <input type="text" name="coupon_code" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Minimum Cost</label>
                        <input type="text" name="min_cost" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for=""> Cost</label>
                        <input type="text" name="cost" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Status</label>
                        <select name="status"  class="form-control">
                           <option value="">Select</option>
                           <option value="1">Active</option>
                           <option value="0">In Active</option>
                        </select>
                     </div>
                      <div class="form-group">
                         <button type="submit" class="btn btn-primary mt-5">Submit</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection