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
Auth::routes();

Route::get('/', function () {
    return view('auth/login');
});
// Route::get('/login-page', function () {
//     return view('auth/login');
// });




// Route::get('login', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(
    function () {
        // Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('admin/form', [App\Http\Controllers\Admin\DashboardController::class, 'index_form'])->name('admin.form');

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    }
);


//dashboard
Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');
Route::get('users/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'users_dashboard'])->name('users.dashboard');


//Admin - Kilang buah
Route::get('admin/kilang-buah', [App\Http\Controllers\Admin\KilangBuahController::class, 'admin_kilangbuah'])->name('admin.kilangbuah');
Route::get('admin/kilang-buah2', [App\Http\Controllers\Admin\KilangBuahController::class, 'admin_kilangbuah2'])->name('admin.kilangbuah2');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
