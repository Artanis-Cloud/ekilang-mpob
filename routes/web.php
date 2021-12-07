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
Route::get('/register/2', [App\Http\Controllers\DaftarController::class, 'daftar_akaun2'])->name('daftar.akaun2');
Route::get('/register2', [App\Http\Controllers\DaftarController::class, 'register2'])->name('register2');




// Route::get('login', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(
    function () {
        // Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('admin/form', [App\Http\Controllers\Admin\DashboardController::class, 'index_form'])->name('admin.form');

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    }
);

Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
