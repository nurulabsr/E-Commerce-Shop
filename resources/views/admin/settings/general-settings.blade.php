<div class="tab-pane fade show active" id="tab1" role="tabpanel">
  <div class="card border">
    <div class="card-body">
        <form action="">
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
                <select name="currency" class="form-control">
                    <option value="">Select</option>
                    @foreach (config('settings.currency_list') as  $currency)
                       <option value="">{{$currency}}</option> 
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Currency Icon</label>
                <input type="text" name="currency_icon" class="form-control">
            </div>
           <div class="form-group">
            <label for="">Time Zone</label>
            <select name="timezone" class="form-control">
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