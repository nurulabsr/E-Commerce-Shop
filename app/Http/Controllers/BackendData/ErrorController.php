<?php

namespace App\Http\Controllers\BackendData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
   public function Handle_404_Error(){
      return view('Error.404-error');
   }

   public function Handle_419_Error(){
     return view('Error.419-error');
   }
}
