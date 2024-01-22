<?php

use App\Http\Controllers\BackendData\VendorController;
use App\Http\Controllers\ProfileVendorController;
use Illuminate\Support\Facades\Route;

//Vendor Route
Route::get('dashboard', [VendorController::class, 'Dashboard'])->name('dashboard');
Route::get('profile', [ProfileVendorController::class, 'Index'])->name('profile');
