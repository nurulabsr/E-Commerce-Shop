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
                  <form method="POST" action="{{ route('admin.coupons.update', $coupon->id) }}"> 
                     @csrf
                     @method('PUT')
                     <div class="form-group">
                        <label for="">Coupon Name</label>
                        <input type="text" name="coupon_name" value="{{$coupon->coupon_name}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Coupon Code</label>
                        <input type="text" name="coupon_code" value="{{$coupon->coupon_code}}" class="form-control">
                     </div>

                     <div class="form-group">
                        <label for="">Max Use Per Person</label>
                        <input type="text" name="max_use" value="{{$coupon->max_use}}" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" name="quantity" value="{{$coupon->quantity}}" class="form-control">
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Coupon Start Date</label>
                              <input type="date" name="start_date" value="{{$coupon->start_date}}"  class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">Coupon End Date</label>
                              <input type="date" name="end_date" value="{{$coupon->end_date}}" class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Discount Type</label>
                              <select name="discount_type" class="form-control">
                                 <option value="">Select</option>
                                 <option {{$coupon->discount_type == 'percentage' ? 'selected' : ''}} value="percentage">%(Percentage)</option>
                                 <option {{$coupon->discount_type == 'amount' ? 'selected' : ''}} value="amount">Amount {{$settings->currency_icon}}</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Discount Value</label>
                              <input type="text" name="discount_value" value="{{$coupon->discount_value}}" class="form-control">
                            </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="">Status</label>
                        <select name="status"  class="form-control">
                           <option value="">Select</option>
                           <option {{$coupon->status == 1 ? 'selected' : ''}} value="1">Active</option>
                           <option {{$coupon->status == 0 ? 'selected' : ''}} value="0">In Active</option>
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