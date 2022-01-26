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
Route::get('admin/1-daftarpelesen', [App\Http\Controllers\Admin\KilangController::class, 'admin_1daftarpelesen'])->name('admin.1daftarpelesen');

Route::get('admin/senarai-pelesen-buah', [App\Http\Controllers\Admin\KilangController::class, 'admin_senaraipelesenbuah'])->name('admin.senaraipelesenbuah');
Route::get('admin/senarai-pelesen-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_senaraipelesenpenapis'])->name('admin.senaraipelesenpenapis');
Route::get('admin/senarai-pelesen-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_senaraipelesenisirung'])->name('admin.senaraipelesenisirung');
Route::get('admin/senarai-pelesen-oleokimia', [App\Http\Controllers\Admin\KilangController::class, 'admin_senaraipelesenoleokimia'])->name('admin.senaraipelesenoleokimia');
Route::get('admin/senarai-pelesen-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_senaraipelesensimpanan'])->name('admin.senaraipelesensimpanan');
Route::get('admin/senarai-pelesen-bio', [App\Http\Controllers\Admin\KilangController::class, 'admin_senaraipelesenbio'])->name('admin.senaraipelesenbio');

Route::get('admin/2-tukar-password', [App\Http\Controllers\Admin\KilangController::class, 'admin_2tukarpassword'])->name('admin.2tukarpassword');


Route::get('admin/3-daftar-penyata-buah', [App\Http\Controllers\Admin\KilangController::class, 'admin_3daftarpenyata'])->name('admin.3daftarpenyata');
Route::get('admin/3-daftar-penyata-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_3daftarpenyatapenapis'])->name('admin.3daftarpenyatapenapis');
Route::get('admin/3-daftar-penyata-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_3daftarpenyataisirung'])->name('admin.3daftarpenyataisirung');
Route::get('admin/3-daftar-penyata-oleokimia', [App\Http\Controllers\Admin\KilangController::class, 'admin_3daftarpenyataoleokimia'])->name('admin.3daftarpenyataoleokimia');
Route::get('admin/3-daftar-penyata-pusat-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_3daftarpenyatasimpanan'])->name('admin.3daftarpenyatasimpanan');
Route::get('admin/3-daftar-penyata-biodiesel', [App\Http\Controllers\Admin\KilangController::class, 'admin_3daftarpenyatabiodiesel'])->name('admin.3daftarpenyatabiodiesel');

Route::get('admin/4-EKilang-PLEID-buah', [App\Http\Controllers\Admin\KilangController::class, 'admin_4ekilangpleid'])->name('admin.4ekilangpleid');
Route::get('admin/4-EKilang-PLEID-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_4ekilangpleidpenapis'])->name('admin.4ekilangpleidpenapis');
Route::get('admin/4-EKilang-PLEID-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_4ekilangpleidisirung'])->name('admin.4ekilangpleidisirung');
Route::get('admin/4-EKilang-PLEID-oleokimia', [App\Http\Controllers\Admin\KilangController::class, 'admin_4ekilangpleidoleokimia'])->name('admin.4ekilangpleidoleokimia');
Route::get('admin/4-EKilang-PLEID-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_4ekilangpleidsimpanan'])->name('admin.4ekilangpleidsimpanan');


Route::get('admin/5-penyata-belum-hantar-buah', [App\Http\Controllers\Admin\KilangController::class, 'admin_5penyatabelumhantarbuah'])->name('admin.5penyatabelumhantarbuah');
Route::get('admin/5-penyata-belum-hantar-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_5penyatabelumhantarpenapis'])->name('admin.5penyatabelumhantarpenapis');
Route::get('admin/5-penyata-belum-hantar-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_5penyatabelumhantarisirung'])->name('admin.5penyatabelumhantarisirung');
Route::get('admin/5-penyata-belum-hantar-oleo', [App\Http\Controllers\Admin\KilangController::class, 'admin_5penyatabelumhantaroleo'])->name('admin.5penyatabelumhantaroleo');
Route::get('admin/5-penyata-belum-hantar-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_5penyatabelumhantarsimpanan'])->name('admin.5penyatabelumhantarsimpanan');
Route::get('admin/5-penyata-belum-hantar-bio', [App\Http\Controllers\Admin\KilangController::class, 'admin_5penyatabelumhantarbio'])->name('admin.5penyatabelumhantarbio');

Route::get('admin/6-penyata-papar-cetak-buah', [App\Http\Controllers\Admin\KilangController::class, 'admin_6penyatapaparcetakbuah'])->name('admin.6penyatapaparcetakbuah');
Route::get('admin/6-penyata-papar-cetak-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_6penyatapaparcetakpenapis'])->name('admin.6penyatapaparcetakpenapis');
Route::get('admin/6-penyata-papar-cetak-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_6penyatapaparcetakisirung'])->name('admin.6penyatapaparcetakisirung');
Route::get('admin/6-penyata-papar-cetak-oleo', [App\Http\Controllers\Admin\KilangController::class, 'admin_6penyatapaparcetakoleo'])->name('admin.6penyatapaparcetakoleo');
Route::get('admin/6-penyata-papar-cetak-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_6penyatapaparcetaksimpanan'])->name('admin.6penyatapaparcetaksimpanan');
Route::get('admin/6-penyata-papar-cetak-bio', [App\Http\Controllers\Admin\KilangController::class, 'admin_6penyatapaparcetakbio'])->name('admin.6penyatapaparcetakbio');

Route::get('admin/7-porting-maklumat', [App\Http\Controllers\Admin\KilangController::class, 'admin_7portingmaklumat'])->name('admin.7portingmaklumat');
Route::get('admin/8-port-data', [App\Http\Controllers\Admin\KilangController::class, 'admin_8portdata'])->name('admin.8portdata');

Route::get('admin/9-penyata-terdahulu', [App\Http\Controllers\Admin\KilangController::class, 'admin_9penyataterdahulu'])->name('admin.9penyataterdahulu');
Route::get('admin/9-penyata-terdahulu-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_9penyataterdahulupenapis'])->name('admin.9penyataterdahulupenapis');
Route::get('admin/9-penyata-terdahulu-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_9penyataterdahuluisirung'])->name('admin.9penyataterdahuluisirung');
Route::get('admin/9-penyata-terdahulu-oleokimia', [App\Http\Controllers\Admin\KilangController::class, 'admin_9penyataterdahuluoleokimia'])->name('admin.9penyataterdahuluoleokimia');
Route::get('admin/9-penyata-terdahulu-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_9penyataterdahulusimpanan'])->name('admin.9penyataterdahulusimpanan');
Route::get('admin/9-penyata-terdahulu-biodiesel', [App\Http\Controllers\Admin\KilangController::class, 'admin_9penyataterdahulubiodiesel'])->name('admin.9penyataterdahulubiodiesel');
Route::post('admin/9-penyata-terdahulu/process', [App\Http\Controllers\Admin\KilangController::class, 'admin_9penyataterdahulu_process'])->name('admin.9penyataterdahulu.process');

Route::get('admin/10-port-data-to-dq', [App\Http\Controllers\Admin\KilangController::class, 'admin_10portdatatodq'])->name('admin.10portdatatodq');
Route::get('admin/11-emel', [App\Http\Controllers\Admin\KilangController::class, 'admin_11emel'])->name('admin.11emel');
Route::get('admin/11-papar-emel', [App\Http\Controllers\Admin\KilangController::class, 'admin_11paparemel'])->name('admin.11paparemel');
Route::get('admin/12-validation', [App\Http\Controllers\Admin\KilangController::class, 'admin_12validation'])->name('admin.12validation');
Route::get('admin/direktori', [App\Http\Controllers\Admin\KilangController::class, 'admin_direktori'])->name('admin.direktori');
Route::get('admin/pengumuman', [App\Http\Controllers\Admin\KilangController::class, 'admin_pengumuman'])->name('admin.pengumuman');
Route::get('admin/jadual-penerimanPL', [App\Http\Controllers\Admin\KilangController::class, 'admin_jadualpenerimaanPL'])->name('admin.jadualpenerimaanPL');
Route::get('admin/senaraigagalPL', [App\Http\Controllers\Admin\KilangController::class, 'admin_senaraigagalPL'])->name('admin.senaraigagalPL');
Route::get('admin/panduan', [App\Http\Controllers\Admin\KilangController::class, 'admin_panduan'])->name('admin.panduan');
Route::get('admin/tukarpassword', [App\Http\Controllers\Admin\KilangController::class, 'admin_tukarpassword'])->name('admin.tukarpassword');

Route::get('try3', [App\Http\Controllers\Admin\KilangController::class, 'try3'])->name('try3');


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
Route::get('isirung/dashboard',[App\Http\Controllers\Users\DashboardUserController::class, 'isirung_dashboard'])->name('isirung.dashboard');
Route::get('isirung/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_maklumatasaspelesen'])->name('isirung.maklumatasaspelesen');
Route::get('isirung/tukar-password', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_tukarpassword'])->name('isirung.tukarpassword');
Route::get('isirung/bahagian-i', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagiani'])->name('isirung.bahagiani');
Route::get('isirung/bahagian-ii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianii'])->name('isirung.bahagianii');
Route::get('isirung/bahagian-iii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianiii'])->name('isirung.bahagianiii');
Route::get('isirung/bahagian-iv', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianiv'])->name('isirung.bahagianiv');
Route::get('isirung/bahagian-v', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianv'])->name('isirung.bahagianv');
Route::get('isirung/bahagian-vi', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianvi'])->name('isirung.bahagianvi');
Route::get('isirung/papar-penyata', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_paparpenyata'])->name('isirung.paparpenyata');
Route::get('isirung/email', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_email'])->name('isirung.email');
Route::get('isirung/prestasi-oer', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_prestasioer'])->name('isirung.prestasioer');
Route::get('isirung/penyata-dahulu', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_penyatadahulu'])->name('isirung.penyatadahulu');


Route::get('/try', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'try'])->name('try');
Route::get('/try2', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'try2'])->name('try2');


Route::get('hashpassword', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'hashPassword'])->name('hashPassword');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
