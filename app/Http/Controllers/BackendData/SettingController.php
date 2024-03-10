<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }

    public function generalSettingsCreateORUpdate(Request $request){
      
       $request->validate([
          'site_name' => ['required', 'string', 'max:255',],
          'layout' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'max:255'],
          'currency' => ['required', 'string', 'max:255'],
          'currency_icon' => ['required', 'string', 'max:255'],
          'timezone' => ['required', 'string', 'max:255'],
       ]);

       
    }
}
