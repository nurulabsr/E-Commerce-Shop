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
@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').each(function() {
            $(this).select2({
                placeholder: 'Select an option',
                dropdownParent: $(this).parent()
            });
        });
    });
</script>
@endpush
