<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }
}
