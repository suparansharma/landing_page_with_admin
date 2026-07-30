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

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('admin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('admin', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/office-profile', [\App\Http\Controllers\Admin\OfficeProfileController::class, 'index'])->name('admin.office-profile.index');
    Route::post('/office-profile', [\App\Http\Controllers\Admin\OfficeProfileController::class, 'update'])->name('admin.office-profile.update');
    
    Route::resource('landing-pages', LandingPageController::class, ['as' => 'admin']);
    Route::resource('orders', OrderController::class, ['as' => 'admin']);
    Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    Route::resource('customers', CustomerController::class, ['as' => 'admin'])->only(['index']);
    Route::resource('users', UserController::class, ['as' => 'admin'])->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

Route::get('/product/{slug}', [LandingController::class, 'show'])->name('product.show');
Route::post('/product/{slug}/order', [LandingController::class, 'storeOrder'])->name('product.order');

Route::get('/landing/{slug}', function ($slug) {
    return redirect()->route('product.show', ['slug' => $slug]);
});
Route::post('/landing/{slug}/order', [LandingController::class, 'storeOrder']);




Route::get('/clear-cache', function() {
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    return "Cache cleared successfully!";
});

Route::get('/run-migrations', function() {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return "Migrations run successfully! Output: <pre>" . \Illuminate\Support\Facades\Artisan::output() . "</pre>";
    } catch (\Throwable $e) {
        return "Error running migrations: <pre>" . $e->getMessage() . "</pre>";
    }
});

 // 👉 https://organicrootsbd.com/clear-cache   ২. ব্রাউজারে প্রথমে এই লিংকে গিয়ে ক্যাশ ক্লিয়ার করুন:

 //👉 https://organicrootsbd.com/run-migrations ৩. এরপর এই লিংকে গিয়ে মাইগ্রেশনটি পুনরায় রান করুন:

