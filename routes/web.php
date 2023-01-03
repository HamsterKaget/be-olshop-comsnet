<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingsController;
use App\Http\Controllers\DashboardTransactionsController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Sentry
|--------------------------------------------------------------------------
|
*/
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/success', [CartController::class, 'success'])->name('success');

Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard/products', [DashboardProductController::class, 'index'])->name('dashboard-products');
Route::get('/dashboard/products/create', [DashboardProductController::class, 'create'])->name('dashboard-products-create');
Route::get('/dashboard/products/{id}', [DashboardProductController::class, 'details'])->name('dashboard-products-details');

Route::get('/dashboard/transactions', [DashboardTransactionsController::class, 'index'])->name('dashboard-transactions');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionsController::class, 'details'])->name('dashboard-transactions-details');

Route::get('/dashboard/settings', [DashboardSettingsController::class, 'store'])->name('dashboard-settings-store');
Route::get('/dashboard/account', [DashboardSettingsController::class, 'account'])->name('dashboard-settings-account');

// ->middleware(['auth', 'admin'])
// ->namespace('Admin')
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::resource('category', AdminCategoryController::class);
    Route::resource('user', UserController::class);
});

Auth::routes();
