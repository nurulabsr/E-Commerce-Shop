<div class="tab-pane fade show active" id="tab1" role="tabpanel">
  <div class="card border">
    <div class="card-body">
        <form action="">
            <div class="form-group">
                <label for="">Site Name</label>
                <input type="text" name="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Layout</label>
                <select name="" class="form-control">
                    <option value="">Select</option>
                    <option value="">LTR</option>
                    <option value="">RTL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Contact Email</label>
                <input type="email" name="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Currency</label>
                <select name="" class="form-control">
                    <option value="">Select</option>
                    @foreach (config('settings.currency_list') as  $currency)
                       <option value="">{{$currency}}</option> 
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Currency Icon</label>
                <input type="text" name="" class="form-control">
            </div>
           <div class="form-group">
            <label for="">Time Zone</label>
            <select name="" class="form-control">
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