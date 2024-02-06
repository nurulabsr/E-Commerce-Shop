@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Update Product Variant Item</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Product Variant Item</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                  <section>
                    <form action="{{route('admin.product-variant-items.store')}}" method="POST"POST"> 
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                           <label for="">Product Variant Name</label>
                           <input type="text" name="product_variant_name" value="{{$productVariant->product_variant_name}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="product_variant" value="{{$productVariant->id}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="product" value="{{$product->id}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Product Variant Name</label>
                            <input type="text" name="product_variant_item_name" value="{{$productVariantItem->product_variant_item_name}}" class="form-control">
                         </div>
                         <div class="form-group">
                            <label for="">Product Variant Price <code>{set 0 make for it free} </code></label>
                            <input type="text" name="product_variant_item_price" value="{{$productVariantItem->product_variant_item_price}}" class="form-control">
                         </div>

                         <div class="fom-group">
                            <label for="">Is Product Variant Item Default?</label>
                            <select name="product_variant_item_is_default" value=""  class="form-control">
                                <option value="">Select</option>
                                <option {{$productVariantItem->product_variant_item_is_default == '1' ? 'selected' : '0'}} value="1">Yes</option>
                                <option {{$productVariantItem->product_variant_item_is_default == '0' ? 'selected' : '0'}} value="0">No</option>
                            </select>
                        </div>

                        <div class="fom-group mt-4">
                           <label for="">Product Variant Status</label>
                           <select name="product_variant_item_status" value=""  class="form-control">
                               <option value="">Select</option>
                               <option {{$productVariantItem->product_variant_item_status == '1' ? 'selected' : ''}} value="1">Active</option>
                               <option {{$productVariantItem->product_variant_item_status == '0' ? 'selected' : ''}} value="0">In Active</option>
                           </select>
                       </div>

                        <div class="form-group">
                           <button class="btn btn-primary mt-5">Submit</button>
                        </div>
                      </form>
                  </section>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
