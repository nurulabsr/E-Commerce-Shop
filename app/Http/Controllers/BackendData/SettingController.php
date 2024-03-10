<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }

    public function generalSettingsCreateORUpdate(Request $request){
    //   dd($request->all());
       $request->validate([
          'site_name' => ['required', 'string', 'max:255',],
          'layout' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'max:255'],
          'currency' => ['required', 'string', 'max:255'],
          'currency_icon' => ['required', 'string', 'max:255'],
          'timezone' => ['required', 'string', 'max:255'],
       ]);

       GeneralSetting::updateOrCreate(
           ['id' => 1],

           [
            'site_name' => $request->site_name,
            'layout' => $request->layout,
            'email' => $request->email,
            'currency' => $request->currency,
            'currency_icon' => $request->currency_icon,
            'timezone' => $request->timezone
           ]
        );

        toastr()->success("Updated General Settings Successfully!");
        return redirect()->back();
    }
}
