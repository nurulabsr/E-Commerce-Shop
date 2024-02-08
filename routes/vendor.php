<?php

use App\Http\Controllers\BackendData\VendorController;
use App\Http\Controllers\BackendData\VendorProductController;
use App\Http\Controllers\BackendData\VendorShopProfileController;
use App\Http\Controllers\ProfileVendorController;
use Illuminate\Support\Facades\Route;

//Vendor Route
Route::get('dashboard', [VendorController::class, 'Dashboard'])->name('dashboard');
Route::get('profile', [ProfileVendorController::class, 'Index'])->name('profile');

Route::put('profile/update', [ProfileVendorController::class, 'UpdateVendorProfile'])->name('profile.update');
Route::put('profile/password', [ProfileVendorController::class, 'UpdateVendorPassword'])->name('profile.password');

/**
 * Shop profile
 */

 Route::resource('shop-profile', VendorShopProfileController::class);


 /**
  * Products
  */
Route::resource('products', VendorProductController::class);