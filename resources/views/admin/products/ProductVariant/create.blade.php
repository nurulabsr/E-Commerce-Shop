@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create Product Variant</h1>
    </div>
      <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Product Variant</h4>
                    <div class="card-header-action">
                       
                    </div>
                </div>
                <div class="card-body">
                  <section>
                    <form action="" method="POST" enctype="multipart/form-data"> 
                        @csrf
   
                        <div class="form-group">
                           <label for="">Product Variant</label>
                           <input type="file" name=""  class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="">Product Name</label>
                           <input type="text" name=""value="{{old("")}}"  class="form-control">
                        </div>
                        <div class="fom-group">
                           <label for="">Product Variant Status</label>
                           <select name=""value="{{old("")}}"  class="form-control">
                               <option value="">Select</option>
                               <option value="1">Active</option>
                               <option value="0">In Active</option>
                           </select>
                       </div>
                        <div class="form-group">
                           <button class="btn btn-primary mt-3">Submit</button>
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
