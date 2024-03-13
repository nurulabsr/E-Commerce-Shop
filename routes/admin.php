<?php
use App\Http\Controllers\BackendData\AdminController;
use App\Http\Controllers\BackendData\AdminVendorProfileController;
use App\Http\Controllers\BackendData\BrandController;
use App\Http\Controllers\BackendData\CategoryController;
use App\Http\Controllers\BackendData\ChildCategoryController;
use App\Http\Controllers\BackendData\CouponController;
use App\Http\Controllers\BackendData\ProductController;
use App\Http\Controllers\BackendData\ProductImageGalleryController as BackendDataProductImageGalleryController;
use App\Http\Controllers\BackendData\ProfileController;
use App\Http\Controllers\BackendData\SliderController;
use App\Http\Controllers\BackendData\SubCategoryController;
use App\Http\Controllers\BackendData\ProductImageGalleryController;
use App\Http\Controllers\BackendData\ProductVariantController;
use App\Http\Controllers\BackendData\ProductVariantItemController;
use App\Http\Controllers\BackendData\SellerProductsController;
use App\Http\Controllers\BackendData\SettingController;
use App\Http\Controllers\FlashSaleController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;

//admin dashboard
Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');  //->middleware(['auth', 'role:admin']) in the RouteServiceProvider.php, name('admin.dashboard'); is change via as(admin.), admin/dashboard via prefix()
Route::get('profile', [ProfileController::class, 'Index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'UpdateProfile'])->name('profile.update');
Route::post('password/update', [ProfileController::class, 'UpdatePassword'])->name('password.update');

//slider
Route::resource('slider', SliderController::class);

//Category Resource Controller
Route::put('change-status', [CategoryController::class, 'UpdateStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

//SubCategory 
Route::put('change-sub-category-status', [SubCategoryController::class, 'UpdateStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);

//Child Category
/*
 
Route::put('change-child-category-status', [ChildCategoryController::class, 'UpdateStatus'])->name('child-category.change-status');

 */
Route::get('only-trashed', [ChildCategoryController::class, 'RestoreDeletedChildCategory'])->name('only-trashed.restore');
Route::get('get-sub-categories', [ChildCategoryController::class, 'GetSubCategories'])->name('get-sub-categories');
Route::put('change-child-category-status', [ChildCategoryController::class, 'UpdateStatus'])->name('child-category.change-status');
Route::resource('child-category', ChildCategoryController::class);

Route::put('chane-brand-satatus', [BrandController::class, 'UpdateStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);


Route::resource('vendor-profile', AdminVendorProfileController::class);

/**
 * Products
 */

Route::get('product/sub-categories', [ProductController::class, 'GetSubCategories'])->name('sub-categories');
Route::get('product/child-categories', [ProductController::class, 'GetChildCategories'])->name('child-categories');
Route::put('product-status', [ProductController::class, 'ChangeProductStatus'])->name('products.status');
Route::resource('products', ProductController::class);

// Product Image Gallery



Route::resource('products-image-gallery', ProductImageGalleryController::class);

//product variant 
Route::put('product-variant-status', [ProductVariantController::class, 'UpdateStatus'])->name('product-variant.status');
Route::resource('product-variant', ProductVariantController::class);

//Product Vatriant Item 
Route::put('product-variant-items-status', [ProductVariantItemController::class, 'UpdateStatus'])->name('product-variant-items.status');
Route::resource('product-variant-items', ProductVariantItemController::class);

//seller product


Route::get('seller-product', [SellerProductsController::class, 'sellerProduct'])->name('seller-product.all');
Route::put('product-approve-status', [SellerProductsController::class, 'changeProductPendingStatus'])->name('product.approve.status');
Route::put('pending', [SellerProductsController::class, 'changeProductApproveStatus'])->name('product.pending');
Route::get('pending-product', [SellerProductsController::class, 'sellerPendingProduct'])->name('sellers.pending.product');


//FlashSell
Route::put('flashsell-status', [FlashSaleController::class, 'UpdateStatus'])->name('flashsell.status');
Route::put('at_home_page', [FlashSaleController::class, 'changeAtHomePageStatus'])->name('flashsell.home_page_status');
Route::post('flash-sell-product', [FlashSaleController::class, 'FlashSellProduct'])->name('flashsell.product.store');
Route::resource('flashsell', FlashSaleController::class);

//Coupon
Route::put('status', [CouponController::class, 'Changestatus'])->name('coupons.status');
Route::resource('coupons', CouponController::class);

// General Sttings

Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('general', [SettingController::class, 'generalSettingsCreateORUpdate'])->name('settings.general');