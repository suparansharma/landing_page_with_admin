<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes(['register' => false]); // Disable public registration

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('landing-pages', LandingPageController::class, ['as' => 'admin']);
    Route::resource('orders', OrderController::class, ['as' => 'admin'])->only(['index', 'show']);
    Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    Route::resource('customers', CustomerController::class, ['as' => 'admin'])->only(['index']);
    Route::resource('users', UserController::class, ['as' => 'admin'])->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

Route::get('/landing/{slug}', [LandingController::class, 'show'])->name('landing.show');
Route::post('/landing/{slug}/order', [LandingController::class, 'storeOrder'])->name('landing.order');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
