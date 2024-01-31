<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::name('admin.')->group(function () {
    Route::get('/admin/login', [LoginController::class, 'login']);
    Route::post('/admin/do-login', [LoginController::class, 'doLogin'])->name('do.login');
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::name('product.')->prefix('admin/products')->group(function () {
        Route::get('/', [ProductController::class, 'list'])->name('list');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
    });
});
