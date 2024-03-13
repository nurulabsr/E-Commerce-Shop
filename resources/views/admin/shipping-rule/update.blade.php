@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Shipping Rule Data</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.shipping-rule.update')}}">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="rule_name" value="{{ old('rule_name') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Shipping Type</label>
                                <select name="shipping_type" class="form-control">
                                    <option value="">Select</option>
                                    <option value="flat_cost">Flat Cost</option>
                                    <option value="min_amount">Minimum Amount</option>
                                </select>
                            </div>
                            <div class="form-group min_amount d-none">
                                <label for="">Minimum Cost</label>
                                <input type="text" name="min_amount" value="{{old('min_amount')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cost</label>
                                <input type="text" name="cost"  value="{{old('cost')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
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

@push('scripts')
<script>
    $(document).ready(function(){
        $('select[name="shipping_type"]').on('change', function(){
            let value = $(this).val();

            if(value === 'min_amount'){
                $('.min_amount').removeClass('d-none');
            } else {
                $('.min_amount').addClass('d-none');
            }
        });
    });
</script>
@endpush
