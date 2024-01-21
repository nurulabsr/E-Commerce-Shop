<?php

use App\Http\Controllers\BackendData\AdminController;
use App\Http\Controllers\BackendData\VendorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Frontend.Home.home');
});


// Route::get('admin/dashboard', [AdminController::class, 'Dashboard'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/dashboard', function () {
    return view('Frontend.Dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
