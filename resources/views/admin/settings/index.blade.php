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
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                     <h4>Products Table</h4>
                    <div class="card-header-action"> 
                        <a href="{{route('admin.products.index')}}" class="btn btn-info"><i class="fas fa-fast-backward p-2"></i>Go Back</a>

                      </div>
                </div>
                <div class="card-body">
                  
                    <div class="row">
                        <div class="col-md-4">
                            <!-- List group -->
                            <div class="list-group" id="myList" role="tablist">
                                <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#tab1" role="tab">General Setting</a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#tab2" role="tab">TAB 2</a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#tab3" role="tab">TAB 3</a>
                                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#tab4" role="tab">TAB 4</a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                @include('admin.settings.general-settings')
                                <div class="tab-pane fade" id="tab2" role="tabpanel">This is a tab 2</div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel">this is a tab 3...</div>
                                <div class="tab-pane fade" id="tab4" role="tabpanel">Finally tab 4 content is here...</div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection


