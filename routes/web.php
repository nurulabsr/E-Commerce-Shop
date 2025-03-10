<?php

use App\Http\Controllers\BackendData\AdminController;
use App\Http\Controllers\BackendData\ErrorController;
use App\Http\Controllers\BackendData\VendorController;
use App\Http\Controllers\ForntendData\CartController;
use App\Http\Controllers\FrontendData\DashboardController;
use App\Http\Controllers\FrontendData\FlashSellController;
use App\Http\Controllers\FrontendData\FrontendProductController;
use App\Http\Controllers\FrontendData\UserAddressController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileDahboardController;
use App\Http\Controllers\ProfileUserController;
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

Route::get('/', [HomeController::class, 'Index'])->name('home');


// Route::get('admin/dashboard', [AdminController::class, 'Dashboard'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('flash-sale', [FlashSellController::class, 'index'])->name('flashsell');
Route::get('product-detail/{slug}', [FrontendProductController::class, 'producDetails'])->name('product-detail');

// add to cart route

Route::post('add-to-cart', [CartController::class, 'AddToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class, 'CartDetails'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'UpdateCartQuantity'])->name('update-cart-quantity');
Route::get('clear-cart', [CartController::class, 'ClearCart'])->name("clear.cart");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [DashboardController::class, 'Index'])->name('dashboard');
    Route::get('profile', [ProfileUserController::class, 'Index'])->name('profile');
    Route::put('profile/update', [ProfileUserController::class, 'UpdateUserProfile'])->name('profile.update');
    Route::put('profile/password', [ProfileUserController::class, 'UpdateUserPassword'])->name('profile.password');
    Route::resource('user-address', UserAddressController::class);
}); 



Route::get('exist', function(){
  return view('admin.already-exist');
})->name('already.exist');
Route::get('/error-page', [ErrorController::class, 'Handle_419_Error'])->name('error.page');


Route::get('page-exfire', [ErrorController::class, 'Handle_419_Error'])->name('error.419');
// Route::get('/{any}', [ErrorController::class, 'Handle_404_Error'])->where('any', '.*');

