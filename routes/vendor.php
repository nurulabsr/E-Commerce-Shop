<?php

use App\Http\Controllers\BackendData\VendorController;
use App\Http\Controllers\BackendData\VendorProductController;
use App\Http\Controllers\BackendData\VendorProductImageGalleryController;
use App\Http\Controllers\BackendData\VendorProductVariantController;
use App\Http\Controllers\BackendData\VendorShopProfileController;
use App\Http\Controllers\ProfileVendorController;
use App\Http\Controllers\BackendData\VendorProductVariantItemController;
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
Route::get('product/sub-categories', [VendorProductController::class, 'GetSubCategories'])->name('sub-categories');
Route::get('product/child-categories', [VendorProductController::class, 'GetChildCategories'])->name('child-categories');
Route::resource('products', VendorProductController::class);

// Vendor Image Gallery

Route::resource('image-gallery', VendorProductImageGalleryController::class);

Route::resource('products-variant', VendorProductVariantController::class);

Route::resource('products-variant-item', VendorProductVariantItemController::class);