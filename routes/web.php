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

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/',[App\Http\Controllers\Auth\PelesenLoginController::class, 'showLoginForm'])->name('pelesen.login');
Route::post('/',[App\Http\Controllers\Auth\PelesenLoginController::class, 'login'])->name('pelese.login');
// Route::get('/login-page', function () {
//     return view('auth/login');
// });

Route::middleware('auth')->group(function () {

    }
);


//dashboard
Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardAdminController::class, 'admin_dashboard'])->name('admin.dashboard');
Route::get('admin/dashboard2', [App\Http\Controllers\Admin\DashboardAdminController::class, 'admin_dashboard2'])->name('admin.dashboard2');




//Admin
Route::get('admin/kilang-buah', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangbuah'])->name('admin.kilangbuah');
Route::get('admin/kilang-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangpenapis'])->name('admin.kilangpenapis');
Route::get('admin/kilang-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangisirung'])->name('admin.kilangisirung');
Route::get('admin/kilang-oleokimia', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangoleokimia'])->name('admin.kilangoleokimia');
Route::get('admin/pusat-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_pusatsimpanan'])->name('admin.pusatsimpanan');
Route::get('admin/e-biodiesel', [App\Http\Controllers\Admin\KilangController::class, 'admin_ebiodiesel'])->name('admin.ebiodiesel');
Route::get('admin/1daftarpelesen', [App\Http\Controllers\Admin\KilangController::class, 'admin_1daftarpelesen'])->name('admin.1daftarpelesen');
Route::get('admin/1daftarpelesen', [App\Http\Controllers\Admin\KilangController::class, 'admin_1daftarpelesen'])->name('admin.1daftarpelesen');
Route::get('admin/senarai-pelesen', [App\Http\Controllers\Admin\KilangController::class, 'admin_senaraipelesen'])->name('admin.senaraipelesen');
Route::get('admin/2tukar-password', [App\Http\Controllers\Admin\KilangController::class, 'admin_2tukarpassword'])->name('admin.2tukarpassword');
Route::get('admin/3daftar-penyata', [App\Http\Controllers\Admin\KilangController::class, 'admin_3daftarpenyata'])->name('admin.3daftarpenyata');
Route::get('admin/7-porting-maklumat', [App\Http\Controllers\Admin\KilangController::class, 'admin_7portingmaklumat'])->name('admin.7portingmaklumat');
Route::get('admin/8-port-data', [App\Http\Controllers\Admin\KilangController::class, 'admin_8portdata'])->name('admin.8portdata');
Route::get('admin/4EKilang-PLEID', [App\Http\Controllers\Admin\KilangController::class, 'admin_4ekilangpleid'])->name('admin.4ekilangpleid');
Route::get('admin/9-penyata-terdahulu', [App\Http\Controllers\Admin\KilangController::class, 'admin_9penyataterdahulu'])->name('admin.9penyataterdahulu');
Route::get('admin/10-port-data-to-dq', [App\Http\Controllers\Admin\KilangController::class, 'admin_10portdatatodq'])->name('admin.10portdatatodq');
Route::get('admin/11-emel', [App\Http\Controllers\Admin\KilangController::class, 'admin_11emel'])->name('admin.11emel');
Route::get('admin/5penyata-belum-hantar', [App\Http\Controllers\Admin\KilangController::class, 'admin_5penyatabelumhantar'])->name('admin.5penyatabelumhantar');
Route::get('admin/6penyata-papar-cetak', [App\Http\Controllers\Admin\KilangController::class, 'admin_6penyatapaparcetak'])->name('admin.6penyatapaparcetak');



//Pelesen - Kilang Buah
Route::get('buah/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'buah_dashboard'])->name('buah.dashboard');
Route::get('buah/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_maklumatasaspelesen'])->name('buah.maklumatasaspelesen');
Route::get('buah/tukar-password', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_tukarpassword'])->name('buah.tukarpassword');
Route::get('buah/bahagian-i', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagiani'])->name('buah.bahagiani');
Route::get('buah/bahagian-ii', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianii'])->name('buah.bahagianii');
Route::get('buah/bahagian-iii', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianiii'])->name('buah.bahagianiii');
Route::get('buah/bahagian-iv', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianiv'])->name('buah.bahagianiv');
Route::get('buah/bahagian-v', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianv'])->name('buah.bahagianv');
Route::get('buah/bahagian-vi', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianvi'])->name('buah.bahagianvi');
Route::get('buah/papar-penyata', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_paparpenyata'])->name('buah.paparpenyata');
Route::get('buah/email', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_email'])->name('buah.email');
Route::get('buah/prestasi-oer', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_prestasioer'])->name('buah.prestasioer');
Route::get('buah/penyata-dahulu', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_penyatadahulu'])->name('buah.penyatadahulu');


//Pelesen - Kilang Penapis
Route::get('penapis/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'penapis_dashboard'])->name('penapis.dashboard');
Route::get('penapis/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_maklumatasaspelesen'])->name('penapis.maklumatasaspelesen');
Route::get('penapis/tukar-password', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_tukarpassword'])->name('penapis.tukarpassword');
Route::get('penapis/bahagian-i', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagiani'])->name('penapis.bahagiani');
Route::get('penapis/bahagian-ii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianii'])->name('penapis.bahagianii');
Route::get('penapis/bahagian-iii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianiii'])->name('penapis.bahagianiii');
Route::get('penapis/bahagian-iva', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianiva'])->name('penapis.bahagianiva');
Route::get('penapis/bahagian-ivb', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianivb'])->name('penapis.bahagianivb');
Route::get('penapis/bahagian-va', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianva'])->name('penapis.bahagianva');
Route::get('penapis/bahagian-vb', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianvb'])->name('penapis.bahagianvb');
Route::get('penapis/bahagian-vi', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianvi'])->name('penapis.bahagianvi');
Route::get('penapis/bahagian-vii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianvii'])->name('penapis.bahagianvii');



//Pelesen - Kilang Isirung
Route::get('isirung/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'isirung_dashboard'])->name('isirung.dashboard');



Route::get('/try', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'try'])->name('try');
Route::get('/try2', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'try2'])->name('try2');


Route::get('hashpassword', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'hashPassword'])->name('hashPassword');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
