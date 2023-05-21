<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
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

// Socialite
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::middleware(['auth', 'verified'])->group(function() {

    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::middleware('roles:user')->group(function() {
        // Checkout
        Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
        Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::get('checkout/invoice/{checkout:id}', [CheckoutController::class, 'invoice'])->name('checkout.invoice');
        Route::get('success-checkout', [CheckoutController::class, 'success_checkout'])->name('checkout.success');

        // User Dashboard
        Route::prefix('user/dashboard')->namespace('User')->name('user.')->group(function() {
            Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
        });
    });

    // Admin Dashboard
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('roles:admin')->group(function() {
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::post('/checkout/update/{checkout}', [AdminDashboard::class, 'updatePaid'])->name('checkout.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
