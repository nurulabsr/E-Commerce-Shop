<?php
use App\Http\Controllers\BackendData\AdminController;
use App\Http\Controllers\BackendData\CategoryController;
use App\Http\Controllers\BackendData\ChildCategoryController;
use App\Http\Controllers\BackendData\ProfileController;
use App\Http\Controllers\BackendData\SliderController;
use App\Http\Controllers\BackendData\SubCategoryController;
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

Route::resource('child-category', ChildCategoryController::class);