<?php

use App\Http\Controllers\BackendData\VendorController;
use Illuminate\Support\Facades\Route;

//Vendor Route
Route::get('dashboard', [VendorController::class, 'Dashboard'])->name('dashboard');
