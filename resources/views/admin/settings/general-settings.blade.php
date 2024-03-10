<div class="tab-pane fade show active" id="tab1" role="tabpanel">
  <div class="card border">
    <div class="card-body">
        <form action="{{route('admin.settings.general')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Site Name</label>
                <input type="text" name="site_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Layout</label>
                <select name="layout" class="form-control">
                    <option value="">Select</option>
                    <option value="LTR">LTR</option>
                    <option value="RTL">RTL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Contact Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Currency</label>
                <select name="currency" style="width: 100%; height: 250px!important;" class="form-select form-control js-example-basic-single" aria-label="Default select example">
                    @foreach (config('settings.currency_list') as $currency)
                        <option value="{{$currency}}">{{$currency}}</option> 
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Currency Icon</label>
                <input type="text" name="currency_icon" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Time Zone</label>
                <select name="timezone" style="width: 100%; height: 250px!important;" class="form-select form-control js-example-basic-single" aria-label="Default select example">
                    <option value="">Select</option>
                    @foreach (config('settings.time_zone') as $timezone)
                        <option value="{{$timezone}}">{{$timezone}}</option>
                    @endforeach
                </select>
            </div>
            
           <div class="form-group">
            <button class="btn btn-primary mt-5">Submit</button>
           </div>
        </form>
    </div>
  </div>
</div>
