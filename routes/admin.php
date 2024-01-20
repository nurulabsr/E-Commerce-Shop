<?php
use App\Http\Controllers\BackendData\AdminController;
use App\Http\Controllers\BackendData\ProfileController;
use Illuminate\Support\Facades\Route;

//admin dashboard
Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');  //->middleware(['auth', 'role:admin']) in the RouteServiceProvider.php, name('admin.dashboard'); is change via as(admin.), admin/dashboard via prefix()
Route::get('profile', [ProfileController::class, 'Index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'UpdateProfile'])->name('profile.update');