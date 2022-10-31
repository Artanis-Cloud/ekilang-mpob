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
Route::group(['middleware' => 'prevent-back-history'],function(){
Auth::routes();

//forget password
Route::get('/testingOER', [App\Http\Controllers\tryController::class, 'testing3'])->name('testing3');
Route::get('/testingPLEID', [App\Http\Controllers\tryController::class, 'testing4'])->name('testing4');
Route::get('/testingpldb', [App\Http\Controllers\tryController::class, 'testDB_PLDB'])->name('testingPLDB');
Route::get('/testingcodedb', [App\Http\Controllers\tryController::class, 'test_codedb'])->name('testingcodedb');
Route::get('/password', [App\Http\Controllers\tryController::class, 'change_pass'])->name('change');
Route::get('/testArx', [App\Http\Controllers\tryController::class, 'tryArx'])->name('tryArx');
Route::get('/terlupa-kata-laluan', [App\Http\Controllers\ForgetPasswordController::class, 'forgetPassword'])->name('forget-password.show');

Route::post('/terlupa-kata-laluan/submit', [App\Http\Controllers\ForgetPasswordController::class, 'forgetPasswordSubmit'])->name('forget-password.submit');

Route::post('/terlupa-kata-laluan/kemaskini-kata-laluan-baru', [App\Http\Controllers\ForgetPasswordController::class, 'customChangePassword'])->name('forget.password.update');

Route::get('/password/resets/{token}/{email}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//end of forget password

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('pelesen.login');
Route::get('/login-new', [App\Http\Controllers\Auth\LoginController::class, 'login_new'])->name('pelesen.login.new');
Route::get('/dashboard/test', [App\Http\Controllers\Admin\DashboardAdminController::class, 'admin_dashboard2'])->name('admin.dashboard2');


Route::middleware('auth')->group(function () {

    Route::get('/session/timeout',[App\Http\Controllers\Admin\TetapanAkaunController::class, 'sessionTimeout'])->name('session.timeout');
    //Data Migration
    Route::get('/migrate/data', [App\Http\Controllers\DataMigrationController::class, 'transfer_pelesen_to_users'])->name('transfer_pelesen_to_users');
    Route::get('/migrate/data/admin', [App\Http\Controllers\DataMigrationController::class, 'transfer_admin_to_users'])->name('transfer_admin_to_users');
    Route::get('/migrate/data/loginmill', [App\Http\Controllers\DataMigrationController::class, 'transfer_loginmill_to_users'])->name('transfer_loginmill_to_users');
    Route::get('/migrate/data/kilang', [App\Http\Controllers\DataMigrationController::class, 'transfer_kilang_to_pelesen'])->name('transfer_kilang_to_pelesen');
    Route::get('/migrate/data/profilebulanan', [App\Http\Controllers\DataMigrationController::class, 'transfer_profilebulanans_to_pelesen'])->name('transfer_profilebulanans_to_pelesen');
    Route::get('/migrate/data/reguser', [App\Http\Controllers\DataMigrationController::class, 'transfer_reguser_to_users'])->name('transfer_reguser_to_users');
    Route::get('/migrate/data/hebahan-stok-akhir', [App\Http\Controllers\DataMigrationController::class, 'transfer_hebahansa_to_ekilang'])->name('transfer_hebahansa_to_ekilang');
    Route::get('/change_eyear', [App\Http\Controllers\DataMigrationController::class, 'change_eyear'])->name('change.eyear');

    //AJAX
    Route::get('/ajax/fetch-daerah/{kod_negeri}', [App\Http\Controllers\Admin\AjaxController::class, 'fetch_daerah'])->name('ajax-daerah');
    Route::get('/ajax/fetch-kawasan/{kod_negeri}', [App\Http\Controllers\Admin\AjaxController::class, 'fetch_kawasan'])->name('ajax-kawasan');
    Route::get('/ajax/fetch-pelesen/{id}', [App\Http\Controllers\Admin\AjaxController::class, 'fetch_pelesen'])->name('ajax-pelesen');
    Route::get('/ajax/fetch-email/{username}', [App\Http\Controllers\Admin\AjaxController::class, 'fetch_email'])->name('ajax-email');
    Route::get('/ajax/fetch-produk/{kumpulan}', [App\Http\Controllers\Admin\AjaxController::class, 'fetch_produk'])->name('ajax-produk');

    Route::group(['middleware' => ['admin']], function () {
        //Admin
        //dashboard
        Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardAdminController::class, 'admin_dashboard'])->name('admin.dashboard');
        Route::get('admin/dashboard3', [App\Http\Controllers\Admin\DashboardAdminController::class, 'admin_dashboard3'])->name('admin.dashboard3');
        Route::get('ajax/dashboard', [App\Http\Controllers\Admin\AjaxController::class, 'jumlah_penyata_dashboard'])->name('jumlah_penyata_dashboard');


        Route::get('admin/login', [App\Http\Controllers\Admin\KilangController::class, 'admin_login'])->name('admin.login');
        Route::get('admin/kilang-buah', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangbuah'])->name('admin.kilangbuah');
        Route::get('admin/kilang-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangpenapis'])->name('admin.kilangpenapis');
        Route::get('admin/kilang-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangisirung'])->name('admin.kilangisirung');
        Route::get('admin/kilang-oleokimia', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangoleokimia'])->name('admin.kilangoleokimia');
        Route::get('admin/pusat-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_pusatsimpanan'])->name('admin.pusatsimpanan');
        Route::get('admin/biodiesel', [App\Http\Controllers\Admin\KilangController::class, 'admin_ebiodiesel'])->name('admin.ebiodiesel');

        Route::get('admin/1-daftarpelesen', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_1daftarpelesen'])->name('admin.1daftarpelesen');
        Route::post('admin/1-daftarpelesen/proses', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_1daftarpelesen_proses'])->name('admin.1daftarpelesen.proses');

        Route::get('admin/papar-maklumat/{Id}', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_papar_maklumat'])->name('admin.papar.maklumat');
        Route::get('admin/cetak_surat/{Id}', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_cetak_surat'])->name('admin.cetak.surat');
        Route::get('admin/prestasi-oer/{Id}', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_prestasi_oer'])->name('admin.prestasi.oer');
        Route::get('admin/papar-oer/{Id}', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_papar_prestasi_oer'])->name('admin.papar.prestasi.oer');
        Route::get('admin/papar-maklumat-batal/{Id}', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_papar_maklumat_batal'])->name('admin.papar.maklumat.batal');
        Route::post('admin/updatemaklumat-asas-pelesen/{Id}', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_update_maklumat_asas_pelesen'])->name('admin.update.maklumat.asas.pelesen');

        Route::get('admin/senarai-pelesen-buah', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenbuah'])->name('admin.senaraipelesenbuah');
        Route::get('admin/senarai-pelesen-penapis', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenpenapis'])->name('admin.senaraipelesenpenapis');
        Route::get('admin/senarai-pelesen-isirung', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenisirung'])->name('admin.senaraipelesenisirung');
        Route::get('admin/senarai-pelesen-oleokimia', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenoleokimia'])->name('admin.senaraipelesenoleokimia');
        Route::get('admin/senarai-pelesen-simpanan', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesensimpanan'])->name('admin.senaraipelesensimpanan');
        Route::get('admin/senarai-pelesen-bio', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenbio'])->name('admin.senaraipelesenbio');
        Route::get('admin/export-Excel', [App\Http\Controllers\Admin\Proses1Controller::class, 'exportIntoExcel'])->name('admin.exportIntoExcel');

        Route::get('admin/senarai-pelesen-batal-buah', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenbatalbuah'])->name('admin.senaraipelesenbatalbuah');
        Route::get('admin/senarai-pelesen-batal-penapis', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_penapis'])->name('admin.senarai.pelesen.batal.penapis');
        Route::get('admin/senarai-pelesen-batal-isirung', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_isirung'])->name('admin.senarai.pelesen.batal.isirung');
        Route::get('admin/senarai-pelesen-batal-oleokimia', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_oleokimia'])->name('admin.senarai.pelesen.batal.oleokimia');
        Route::get('admin/senarai-pelesen-batal-simpanan', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_simpanan'])->name('admin.senarai.pelesen.batal.simpanan');
        Route::get('admin/senarai-pelesen-batal-bio', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_bio'])->name('admin.senarai.pelesen.batal.bio');


        Route::get('admin/2-tukar-password', [App\Http\Controllers\Admin\Proses2Controller::class, 'admin_2tukarpassword'])->name('admin.2tukarpassword');
        Route::post('admin/2-tukar-password/process', [App\Http\Controllers\Admin\Proses2Controller::class, 'admin_tukarpass_process'])->name('admin.2tukarpassword.process');


        Route::get('admin/3-daftar-penyata-buah', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyata'])->name('admin.3daftarpenyata');
        Route::get('admin/3-daftar-penyata-penapis', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyatapenapis'])->name('admin.3daftarpenyatapenapis');
        Route::get('admin/3-daftar-penyata-isirung', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyataisirung'])->name('admin.3daftarpenyataisirung');
        Route::get('admin/3-daftar-penyata-oleokimia', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyataoleokimia'])->name('admin.3daftarpenyataoleokimia');
        Route::get('admin/3-daftar-penyata-pusat-simpanan', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyatasimpanan'])->name('admin.3daftarpenyatasimpanan');
        Route::get('admin/3-daftar-penyata-biodiesel', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyatabiodiesel'])->name('admin.3daftarpenyatabiodiesel');

        Route::get('admin/3-daftar-penyata/process', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_initialize'])->name('admin.initialize');
        Route::get('admin/3-daftar-satu-penyata/process', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_initialize_satu'])->name('admin.initialize.satu');


        Route::get('admin/4-EKilang-PLEID', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_4ekilangpleid'])->name('admin.4ekilangpleid');
        Route::get('admin/4-EKilang-BIO', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_4ekilangbio'])->name('admin.4ekilangbio');
        Route::get('admin/4-EKilang-PLEID/process', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_porting'])->name('admin.porting.process');
        Route::get('admin/4-EKilang-BIO/process', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_portbio'])->name('admin.portbio.process');
        Route::get('admin/4-EKilang-PLEID-penapis', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_4ekilangpleidpenapis'])->name('admin.4ekilangpleidpenapis');
        Route::get('admin/4-EKilang-PLEID-isirung', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_4ekilangpleidisirung'])->name('admin.4ekilangpleidisirung');
        Route::get('admin/4-EKilang-PLEID-oleokimia', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_4ekilangpleidoleokimia'])->name('admin.4ekilangpleidoleokimia');
        Route::get('admin/4-EKilang-PLEID-simpanan', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_4ekilangpleidsimpanan'])->name('admin.4ekilangpleidsimpanan');


        Route::get('admin/5-penyata-belum-hantar-buah', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_5penyatabelumhantarbuah'])->name('admin.5penyatabelumhantarbuah');
        Route::get('admin/5-penyata-belum-hantar-penapis', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_5penyatabelumhantarpenapis'])->name('admin.5penyatabelumhantarpenapis');
        Route::get('admin/5-penyata-belum-hantar-isirung', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_5penyatabelumhantarisirung'])->name('admin.5penyatabelumhantarisirung');
        Route::get('admin/5-penyata-belum-hantar-oleo', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_5penyatabelumhantaroleo'])->name('admin.5penyatabelumhantaroleo');
        Route::get('admin/5-penyata-belum-hantar-simpanan', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_5penyatabelumhantarsimpanan'])->name('admin.5penyatabelumhantarsimpanan');
        Route::get('admin/5-penyata-belum-hantar-bio', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_5penyatabelumhantarbio'])->name('admin.5penyatabelumhantarbio');
        Route::post('admin/5-papar-belum_bio/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumhantarbio'])->name('admin.5papar.bio.form');
        Route::get('admin/5-penyata-kemaskini-bio', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_5penyatakemaskinibio'])->name('admin.5penyatakemaskinibio');

        Route::get('admin/5-penyata-kemaskini/process', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_5penyatakemaskini_process'])->name('admin.5penyatakemaskini.process');
        Route::get('admin/5-kemaskini-maklumat/{Id}', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_kemaskini_maklumat'])->name('admin.kemaskini.maklumat.bio');
        Route::post('admin/5-kemaskini-maklumat-exe/{Id}', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_kemaskini_maklumat_exe'])->name('admin.kemaskini.maklumat.bio.exe.a');
        Route::post('admin/5-add-bio/form/{ebio_reg}', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_add_bahagian_ia'])->name('admin.add.bahagian.ia');
        Route::get('admin/5-delete-bio/form/{Id}',  [App\Http\Controllers\Admin\Proses5Controller::class, 'process_delete_bahagian_ia'])->name('admin.delete.bahagian.ia');
        Route::post('admin/5-kemaskini-maklumat-exeb/{Id}', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_kemaskini_maklumat_exe_b'])->name('admin.kemaskini.maklumat.bio.exe.b');
        Route::post('admin/5-add-bio/formb/{ebio_reg}', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_add_bahagian_ib'])->name('admin.add.bahagian.ib');
        Route::get('admin/5-delete-bio/formb/{Id}',  [App\Http\Controllers\Admin\Proses5Controller::class, 'process_delete_bahagian_ib'])->name('admin.delete.bahagian.ib');
        Route::post('admin/5-kemaskini-maklumat-exec/{Id}', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_kemaskini_maklumat_exe_c'])->name('admin.kemaskini.maklumat.bio.exe.c');
        Route::post('admin/5-add-bio/formc/{ebio_reg}', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_add_bahagian_ic'])->name('admin.add.bahagian.ic');
        Route::get('admin/5-delete-bio/formc/{Id}',  [App\Http\Controllers\Admin\Proses5Controller::class, 'process_delete_bahagian_ic'])->name('admin.delete.bahagian.ic');
        Route::post('admin/5-kemaskini-maklumat-exeiii/{Id}', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_kemaskini_maklumat_exe_iii'])->name('admin.kemaskini.maklumat.bio.exe.iii');
        Route::post('admin/5-add-bio/formiii/{ebio_reg}', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_add_bahagian_iii'])->name('admin.add.bahagian.iii');
        Route::get('admin/5-delete-bio/formiii/{Id}',  [App\Http\Controllers\Admin\Proses5Controller::class, 'process_delete_bahagian_iii'])->name('admin.delete.bahagian.iii');
        Route::post('admin/5-kemaskini-maklumat-ii/{lesen}', [App\Http\Controllers\Admin\Proses5Controller::class, 'admin_kemaskini_maklumat_ii'])->name('admin.kemaskini.maklumat.bio.ii');




        Route::post('admin/5-papar-belum-buah/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumbuah_form'])->name('admin.5papar.belum.buah.form');
        Route::get('admin/5-papar-belum-buah/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumbuah_form'])->name('admin.5papar-belum-buah-multi');
        Route::post('admin/5-papar-belum-penapis/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumpenapis_form'])->name('admin.5papar.belum.penapis.form');
        Route::get('admin/5-papar-belum-penapis/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumpenapis_form'])->name('admin.5papar-belum-penapis-multi');
        Route::post('admin/5-papar-belum-isirung/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumisirung_form'])->name('admin.5papar.belum.isirung.form');
        Route::get('admin/5-papar-belum-isirung/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumisirung_form'])->name('admin.5papar-belum-isirung-multi');
        Route::post('admin/5-papar-belum-oleo/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumoleo_form'])->name('admin.5papar.belum.oleo.form');
        Route::get('admin/5-papar-belum-oleo/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumoleo_form'])->name('admin.5papar-belum-oleo-multi');
        Route::post('admin/5-papar-belum-simpanan/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumsimpanan_form'])->name('admin.5papar.belum.simpanan.form');
        Route::get('admin/5-papar-belum-simpanan/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumsimpanan_form'])->name('admin.5papar-belum-simpanan-multi');
        Route::post('admin/5-papar-belum-bio/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumbio_form'])->name('admin.5papar.belum.bio.form');
        Route::get('admin/5-papar-belum-bio/form', [App\Http\Controllers\Admin\Proses5Controller::class, 'process_admin_5penyatabelumbio_form'])->name('admin.5papar-belum-bio-multi');

        Route::get('admin/6-penyata-papar-cetak-buah', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakbuah'])->name('admin.6penyatapaparcetakbuah');
        Route::get('admin/6-penyata-papar-cetak-penapis', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakpenapis'])->name('admin.6penyatapaparcetakpenapis');
        Route::get('admin/6-penyata-papar-cetak-isirung', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakisirung'])->name('admin.6penyatapaparcetakisirung');
        Route::get('admin/6-penyata-papar-cetak-oleo', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakoleo'])->name('admin.6penyatapaparcetakoleo');
        Route::get('admin/6-penyata-papar-cetak-simpanan', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetaksimpanan'])->name('admin.6penyatapaparcetaksimpanan');
        Route::get('admin/6-penyata-papar-cetak-bio', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakbio'])->name('admin.6penyatapaparcetakbio');
        // Route::get('admin/6-papar-buah', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6papar_buah'])->name('admin.6papar.buah');
        Route::post('admin/6-papar-buah/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakbuah_form'])->name('admin.6papar.buah.form');
        Route::get('admin/6-papar-buah/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakbuah_form'])->name('admin.6papar-buah-multi');
        Route::post('admin/6-papar-penapis/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakpenapis_form'])->name('admin.6papar.penapis.form');
        Route::get('admin/6-papar-penapis/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakpenapis_form'])->name('admin.6papar-penapis-multi');
        Route::post('admin/6-papar-isirung/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakisirung_form'])->name('admin.6papar.isirung.form');
        Route::get('admin/6-papar-isirung/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakisirung_form'])->name('admin.6papar-isirung-multi');
        Route::post('admin/6-papar-oleo/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakoleo_form'])->name('admin.6papar.oleo.form');
        Route::get('admin/6-papar-oleo/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakoleo_form'])->name('admin.6papar-oleo-multi');
        Route::post('admin/6-papar-simpanan/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetaksimpanan_form'])->name('admin.6papar.simpanan.form');
        Route::get('admin/6-papar-simpanan/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetaksimpanan_form'])->name('admin.6papar-simpanan-multi');
        Route::post('admin/6-papar-bio/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakbio_form'])->name('admin.6papar.bio.form');
        Route::get('admin/6-papar-bio/form', [App\Http\Controllers\Admin\Proses6Controller::class, 'process_admin_6penyatapaparcetakbio_form'])->name('admin.6papar-bio-multi');

        // Route::get('admin/6-papar-buah/{id}', [App\Http\Controllers\Admin\Proses6Controller::class, 'show_admin_6penyatapaparcetakbuah'])->name('admin.6papar.buah');

        Route::get('admin/7-porting-maklumat', [App\Http\Controllers\Admin\Proses7Controller::class, 'admin_7portingmaklumat'])->name('admin.7portingmaklumat');
        Route::get('admin/7-porting-maklumat/process', [App\Http\Controllers\Admin\Proses7Controller::class, 'admin_portingmaklumat'])->name('admin.porting.maklumat.process');

        Route::get('admin/8-port-data', [App\Http\Controllers\Admin\Proses8Controller::class, 'admin_8portdata'])->name('admin.8portdata');
        Route::get('admin/8-port-data/process', [App\Http\Controllers\Admin\Proses8Controller::class, 'admin_portingdata'])->name('admin.porting.data.process');


        Route::get('admin/9-penyata-terdahulu', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu'])->name('admin.9penyataterdahulu');
        Route::get('admin/9-penyata-terdahulu-penapis', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulupenapis'])->name('admin.9penyataterdahulupenapis');
        Route::get('admin/9-penyata-terdahulu-isirung', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahuluisirung'])->name('admin.9penyataterdahuluisirung');
        Route::get('admin/9-penyata-terdahulu-oleokimia', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahuluoleokimia'])->name('admin.9penyataterdahuluoleokimia');
        Route::get('admin/9-penyata-terdahulu-simpanan', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulusimpanan'])->name('admin.9penyataterdahulusimpanan');
        Route::get('admin/9-penyata-terdahulu-biodiesel', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulubiodiesel'])->name('admin.9penyataterdahulubiodiesel');

        Route::get('admin/9-penyata-terdahulu/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu_process'])->name('admin.9penyataterdahulu.process');
        // Route::get('admin/9-penyata-terdahulu-buah/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu_process'])->name('admin.9penyataterdahulu.process');
        Route::post('admin/9-penyata-terdahulu-penapis/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu_penapis_process'])->name('admin.9penyataterdahulu.penapis.process');
        Route::post('admin/9-penyata-terdahulu-isirung/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu_isirung_process'])->name('admin.9penyataterdahulu.isirung.process');
        Route::post('admin/9-penyata-terdahulu-oleokimia/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu_oleokimia_process'])->name('admin.9penyataterdahulu.oleokimia.process');
        Route::post('admin/9-penyata-terdahulu-psimpanan/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu_psimpanan_process'])->name('admin.9penyataterdahulu.psimpanan.process');
        Route::post('admin/9-penyata-terdahulu-bio/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu_bio_process'])->name('admin.9penyataterdahulu.bio.process');

        // Route::get('admin/9-penyata-terdahulu-papar/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9papar_process'])->name('admin.9papar.process');
        // Route::get('admin/9-penyata-terdahulu-papar/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9papar_process'])->name('admin.9papar.process');

        Route::post('admin/9-papar-terdahulu-buah/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_buah_form'])->name('admin.9papar-terdahulu-buah.form');
        Route::post('admin/9-papar-pleid-buah/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_buah_form'])->name('admin.9papar-terdahulu-buah.form');
        Route::post('admin/9-papar-terdahulu-buah/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_pleid_buah_form'])->name('admin.pleid.buah.multi');
        Route::post('admin/9-papar-penyata/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'papar_penyata'])->name('admin.papar.penyata');
        Route::post('admin/9-papar-terdahulu-penapis/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_penapis_form'])->name('admin.9papar-terdahulu-penapis.form');
        Route::get('admin/9-papar-terdahulu-penapis/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_penapis_form'])->name('admin.9papar-terdahulu-penapis-multi');
        Route::post('admin/9-papar-terdahulu-isirung/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_isirung_form'])->name('admin.9papar-terdahulu-isirung.form');
        Route::get('admin/9-papar-terdahulu-isirung/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_isirung_form'])->name('admin.9papar-terdahulu-isirung-multi');
        Route::post('admin/9-papar-terdahulu-oleo/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_oleo_form'])->name('admin.9papar-terdahulu-oleo.form');
        Route::get('admin/9-papar-terdahulu-oleo/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_oleo_form'])->name('admin.9papar-terdahulu-oleo-multi');
        Route::post('admin/9-papar-terdahulu-simpanan/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_simpanan_form'])->name('admin.9papar-terdahulu-simpanan.form');
        Route::get('admin/9-papar-terdahulu-simpanan/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_simpanan_form'])->name('admin.9papar-terdahulu-simpanan-multi');
        Route::post('admin/9-papar-terdahulu-bio/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_bio_form'])->name('admin.9papar-terdahulu-bio.form');
        Route::get('admin/9-papar-terdahulu-bio/form', [App\Http\Controllers\Admin\Proses9Controller::class, 'process_admin_9penyataterdahulu_bio_form'])->name('admin.9papar-terdahulu-bio-multi');


        Route::get('admin/10-port-data-to-dq', [App\Http\Controllers\Admin\Proses10Controller::class, 'admin_10portdatatodq'])->name('admin.10portdatatodq');
        Route::get('admin/10-port-data-to-dq/process', [App\Http\Controllers\Admin\Proses10Controller::class, 'admin_portingdata'])->name('admin.porting.data.dq.process');


        Route::get('admin/11-emel', [App\Http\Controllers\Admin\Proses11Controller::class, 'admin_11emel'])->name('admin.11emel');
        Route::get('admin/11-emel/data', [App\Http\Controllers\Admin\Proses11Controller::class, 'admin_11emel_data'])->name('admin.11emel.data');
        Route::get('admin/11-papar-emel/{Id}', [App\Http\Controllers\Admin\Proses11Controller::class, 'admin_11paparemel'])->name('admin.11paparemel');
        Route::get('admin/11-papar-emel-cetak/{Id}', [App\Http\Controllers\Admin\Proses11Controller::class, 'admin_11papar_cetak'])->name('admin.11papar_cetak');
        Route::get('admin/12-validation', [App\Http\Controllers\Admin\Proses12Controller::class, 'admin_12validation'])->name('admin.12validation');

        Route::get('admin/direktori', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_direktori'])->name('admin.direktori');
        Route::get('admin/direktori/process', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_direktori_process'])->name('admin.direktori.process');

        Route::get('admin/pengumuman', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_pengumuman'])->name('admin.pengumuman');
        Route::get('admin/tambahpengumuman', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_tambah_pengumuman'])->name('admin.tambahpengumuman');
        Route::post('admin/tambahpengumuman/proses', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_tambah_pengumuman_proses'])->name('admin.tambahpengumuman.proses');

        Route::get('admin/editpengumuman/{Id}', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_editpengumuman'])->name('admin.editpengumuman');
        Route::post('admin/updatepengumuman/{Id}', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_updatepengumuman'])->name('admin.updatepengumuman');

        Route::get('admin/jadual-penerimanPL', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_jadualpenerimaanPL'])->name('admin.jadualpenerimaanPL');
        Route::get('admin/senaraigagalPL', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_senaraigagalPL'])->name('admin.senaraigagalPL');
        Route::get('admin/panduan', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_panduan'])->name('admin.panduan');
        Route::get('admin/tukarpassword', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_tukarpassword'])->name('admin.tukarpassword');
        Route::post('admin/update-password/{Id}', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_update_password'])->name('admin.update.password');



        Route::get('admin/kod-produk', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_kod_produk'])->name('admin.kod.produk');
        Route::get('admin/kod-negara', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_kod_negara'])->name('admin.kod.negara');

        Route::get('admin/log-admin', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_log_admin'])->name('admin.log.superadmin');

        Route::get('admin/pembeli', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_pembeli'])->name('admin.pembeli');
        Route::post('admin/editpembeli/{Id}', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_editpembeli'])->name('admin.edit.pembeli');

        Route::get('admin/tambahpembeli', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_tambah_pembeli'])->name('admin.tambahpembeli');
        Route::post('admin/tambahpembeli/proses', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_tambah_pembeli_proses'])->name('admin.tambahpembeli.proses');
        Route::post('admin/updatepembeli/{Id}', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_updatepembeli'])->name('admin.updatepembeli');

        Route::get('admin/akaun-pentadbir', [App\Http\Controllers\Admin\TetapanAkaunController::class, 'admin_akaun_pentadbir'])->name('admin.akaun.pentadbir');
        Route::post('admin/akaun-pentadbir/process', [App\Http\Controllers\Admin\TetapanAkaunController::class, 'admin_akaun_pentadbir_process'])->name('admin.akaun.pentadbir.process');

        Route::get('admin/pengurusan-pentadbir', [App\Http\Controllers\Admin\KonfigurasiController::class, 'admin_pengurusan_pentadbir'])->name('admin.pengurusan.pentadbir');
        Route::post('admin/pengurusan-pentadbir/process', [App\Http\Controllers\Admin\KonfigurasiController::class, 'admin_pengurusan_pentadbir_process'])->name('admin.pengurusan.pentadbir.process');
        Route::get('admin/senarai-pentadbir', [App\Http\Controllers\Admin\KonfigurasiController::class, 'admin_senarai_pentadbir'])->name('admin.senarai.pentadbir');
        Route::post('admin/edit-pentadbir/{Id}', [App\Http\Controllers\Admin\KonfigurasiController::class, 'admin_edit_pentadbir'])->name('admin.edit.pentadbir');
        Route::get('admin/delete-pentadbir/{id}', [App\Http\Controllers\Admin\KonfigurasiController::class, 'admin_delete_pentadbir'])->name('admin.delete.pentadbir');
        Route::get('/notifikasi/papar/{id}', [App\Http\Controllers\Admin\KonfigurasiController::class, 'redirect_notification'])->name('notification.show');


        Route::get('admin/maklumat-penyata-bulanan', [App\Http\Controllers\Admin\LaporanController::class, 'admin_maklumat_penyata_bulanan'])->name('admin.maklumat.penyata.bulanan');
        Route::get('admin/ringkasan-penyata', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_penyata'])->name('admin.ringkasan.penyata');
        Route::get('admin/ringkasan-penyata-table', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_penyata_table'])->name('admin.ringkasan.penyata.process');
        // Route::get('admin/ringkasan-penyata/process', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_penyata'])->name('admin.ringkasan.penyata.process');
        Route::get('admin/ringkasan-bahagian-1', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_bahagian1'])->name('admin.ringkasan.bahagian1');
        Route::get('admin/ringkasan-bahagian-1-table', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_bahagian1_table'])->name('admin.ringkasan.bahagian1.process');
        Route::get('admin/ringkasan-bahagian-2', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_bahagian2'])->name('admin.ringkasan.bahagian2');
        Route::get('admin/ringkasan-bahagian-2-table', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_bahagian2_table'])->name('admin.ringkasan.bahagian2.process');
        Route::get('admin/ringkasan-bahagian-3', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_bahagian3'])->name('admin.ringkasan.bahagian3');
        Route::get('admin/ringkasan-bahagian-3-table', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_bahagian3_table'])->name('admin.ringkasan.bahagian3.process');
        Route::get('admin/ringkasan-jualan-bio', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_jualan_bio'])->name('admin.ringkasan.jualan.bio');
        Route::get('admin/ringkasan-jualan-bio-table', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_jualan_bio_table'])->name('admin.ringkasan.jualan.bio.process');
        // Route::get('admin/ringkasan-bahagian-2/process', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_bahagian2'])->name('admin.ringkasan.bahagian2.process');

        Route::get('admin/laporan-ringkasan/{Id}/{data}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_laporan_ringkasan'])->name('admin.laporan.ringkasan');
        Route::get('admin/laporan-ringkasan-operasi', [App\Http\Controllers\Admin\LaporanController::class, 'admin_laporan_ringkasan_operasi'])->name('admin.laporan.operasi');
        Route::get('admin/laporan-ringkasan-jualan-bio', [App\Http\Controllers\Admin\LaporanController::class, 'admin_laporan_ringkasan_jualan_bio'])->name('admin.laporan.jualan.bio');
        // Route::post('admin/laporan-ringkasan', [App\Http\Controllers\Admin\LaporanController::class, 'admin_ringkasan_penyata_process'])->name('admin.ringkasan.process');


        Route::get('admin/pl-lewat', [App\Http\Controllers\Admin\LaporanController::class, 'admin_pl_lewat'])->name('admin.pl.lewat');
        Route::get('admin/pl-lewat/process', [App\Http\Controllers\Admin\LaporanController::class, 'admin_pl_lewat_process'])->name('admin.pl.lewat.process');

        Route::get('admin/kapasiti', [App\Http\Controllers\Admin\LaporanController::class, 'admin_kapasiti'])->name('admin.kapasiti');
        Route::get('admin/edit-kapasiti/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti'])->name('admin.edit.kapasiti');
        Route::post('admin/edit-kapasiti-jan/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_jan'])->name('admin.edit.kapasiti.jan');
        Route::post('admin/edit-kapasiti-feb/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_feb'])->name('admin.edit.kapasiti.feb');
        Route::post('admin/edit-kapasiti-mac/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_mac'])->name('admin.edit.kapasiti.mac');
        Route::post('admin/edit-kapasiti-apr/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_apr'])->name('admin.edit.kapasiti.apr');
        Route::post('admin/edit-kapasiti-mei/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_mei'])->name('admin.edit.kapasiti.mei');
        Route::post('admin/edit-kapasiti-jun/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_jun'])->name('admin.edit.kapasiti.jun');
        Route::post('admin/edit-kapasiti-jul/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_jul'])->name('admin.edit.kapasiti.jul');
        Route::post('admin/edit-kapasiti-ogs/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_ogs'])->name('admin.edit.kapasiti.ogs');
        Route::post('admin/edit-kapasiti-sept/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_sept'])->name('admin.edit.kapasiti.sept');
        Route::post('admin/edit-kapasiti-okt/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_okt'])->name('admin.edit.kapasiti.okt');
        Route::post('admin/edit-kapasiti-nov/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_nov'])->name('admin.edit.kapasiti.nov');
        Route::post('admin/edit-kapasiti-dec/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_kapasiti_dec'])->name('admin.edit.kapasiti.dec');

        Route::get('admin/laporan-tahunan', [App\Http\Controllers\Admin\LaporanController::class, 'admin_laporan_tahunan'])->name('admin.laporan.tahunan');
        Route::get('admin/laporan-tahunan-proses', [App\Http\Controllers\Admin\LaporanController::class, 'admin_laporan_tahunan_proses'])->name('admin.laporan.tahunan.proses');
        Route::get('admin/laporan-bulanan-lesen', [App\Http\Controllers\Admin\LaporanController::class, 'admin_bulanan_lesen'])->name('admin.laporan.bulanan');
        Route::get('admin/carian-bulanan-lesen', [App\Http\Controllers\Admin\LaporanController::class, 'admin_carian_bulanan_lesen'])->name('admin.carian.bulanan');
        Route::get('admin/laporan-bulanan-lesen/process', [App\Http\Controllers\Admin\LaporanController::class, 'admin_bulanan_lesen_process'])->name('admin.laporan.bulanan.process');


        Route::get('admin/stok-akhir', [App\Http\Controllers\Admin\LaporanController::class, 'admin_stok_akhir'])->name('admin.stok.akhir');
        Route::post('admin/edit-stok-akhir/{id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_stok_akhir'])->name('admin.edit.stok.akhir');
        Route::get('admin/delete-stok-akhir/{id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_delete_stok_akhir'])->name('admin.delete.stok.akhir');
        Route::get('admin/tambah-stok-akhir', [App\Http\Controllers\Admin\LaporanController::class, 'admin_tambah_stok_akhir'])->name('admin.tambah.stok.akhir');
        Route::post('admin/tambah-stok-akhir-proses', [App\Http\Controllers\Admin\LaporanController::class, 'admin_tambah_stok_akhir_proses'])->name('admin.tambah.stok.akhir.proses');
        Route::post('admin/tambah-stok-akhir-proses2', [App\Http\Controllers\Admin\LaporanController::class, 'admin_tambah_stok_akhir_proses2'])->name('admin.tambah.stok.akhir.proses2');
        Route::get('admin/validasi-stok-akhir', [App\Http\Controllers\Admin\LaporanController::class, 'admin_validasi_stok_akhir'])->name('admin.validasi.stok.akhir');
        Route::get('admin/validasi-stok-akhir/proses', [App\Http\Controllers\Admin\LaporanController::class, 'admin_validasi_stok_akhir_proses'])->name('admin.validasi.stok.akhir.proses');
        Route::get('admin/validasi-stok-akhir-ikut-produk', [App\Http\Controllers\Admin\LaporanController::class, 'admin_validasi_stok_akhir_ikut_produk'])->name('admin.validasi.stok.akhir.ikut.produk');

        Route::get('admin/minyak-sawit-diproses', [App\Http\Controllers\Admin\LaporanController::class, 'admin_minyak_sawit_diproses'])->name('admin.minyak.sawit.diproses');
        Route::post('admin/minyak-sawit-diproses/edit/{Id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_edit_minyak_sawit_diproses'])->name('admin.edit.minyak.sawit.diproses');
        Route::get('admin/minyak-sawit-diproses/delete/{id}', [App\Http\Controllers\Admin\LaporanController::class, 'admin_delete_minyak_sawit_diproses'])->name('admin.delete.minyak.sawit.diproses');
        Route::post('admin/minyak-sawit-diproses/add', [App\Http\Controllers\Admin\LaporanController::class, 'admin_add_minyak_sawit_diproses'])->name('admin.add.minyak.sawit.diproses');
        Route::get('admin/validasi-minyak-sawit-diproses', [App\Http\Controllers\Admin\LaporanController::class, 'admin_validasi_minyak_sawit_diproses'])->name('admin.validasi.minyak.sawit.diproses');
        // Route::get('admin/validasi-minyak-sawit/proses', [App\Http\Controllers\Admin\LaporanController::class, 'admin_validasi_minyak_sawit_proses'])->name('admin.validasi.minyak.sawit.proses');


        Route::get('admin/tambah-minyak-sawit-diproses', [App\Http\Controllers\Admin\LaporanController::class, 'admin_tambah_proses'])->name('admin.tambah.proses');
        Route::post('admin/tambah-proses-proses', [App\Http\Controllers\Admin\LaporanController::class, 'admin_tambah_proses_proses'])->name('admin.tambah.proses.proses');



        Route::get('admin/activities', [App\Http\Controllers\Admin\LaporanController::class, 'admin_activities_all'])->name('admin.activities.all');
        Route::get('admin/activities-by-licensee', [App\Http\Controllers\Admin\LaporanController::class, 'admin_activities_by_licensee'])->name('admin.activities.by.licensee');
        Route::get('admin/activities-by-state', [App\Http\Controllers\Admin\LaporanController::class, 'admin_activities_by_state'])->name('admin.activities.by.state');
        Route::get('admin/activities-by-district', [App\Http\Controllers\Admin\LaporanController::class, 'admin_activities_by_district'])->name('admin.activities.by.district');
        Route::get('admin/activities-by-region', [App\Http\Controllers\Admin\LaporanController::class, 'admin_activities_by_region'])->name('admin.activities.by.region');
        Route::get('admin/activities-by-product', [App\Http\Controllers\Admin\LaporanController::class, 'admin_activities_by_product'])->name('admin.activities.by.product');
        Route::get('admin/activities-by-productgroup', [App\Http\Controllers\Admin\LaporanController::class, 'admin_activities_by_productgroup'])->name('admin.activities.by.productgroup');

        Route::get('admin/eksport', [App\Http\Controllers\Admin\LaporanController::class, 'admin_oleo_export'])->name('admin.eksport');

        Route::get('admin/monthly-by-licensee', [App\Http\Controllers\Admin\MonthlyController::class, 'admin_monthly_by_licensee'])->name('admin.monthly.by.licensee');
        Route::get('admin/monthly-by-state', [App\Http\Controllers\Admin\MonthlyController::class, 'admin_monthly_by_state'])->name('admin.monthly.by.state');
        Route::get('admin/monthly-by-district', [App\Http\Controllers\Admin\MonthlyController::class, 'admin_monthly_by_district'])->name('admin.monthly.by.district');
        Route::get('admin/monthly-by-region', [App\Http\Controllers\Admin\MonthlyController::class, 'admin_monthly_by_region'])->name('admin.monthly.by.region');
        Route::get('admin/monthly-by-product', [App\Http\Controllers\Admin\MonthlyController::class, 'admin_monthly_by_product'])->name('admin.monthly.by.product');
        Route::get('admin/monthly-by-productgroup', [App\Http\Controllers\Admin\MonthlyController::class, 'admin_monthly_by_productgroup'])->name('admin.monthly.by.productgroup');
        Route::get('admin/monthly', [App\Http\Controllers\Admin\MonthlyController::class, 'admin_monthly_all'])->name('admin.monthly.all');
        Route::get('admin/senarai-laporan', [App\Http\Controllers\Admin\MonthlyController::class, 'admin_senarai_laporan'])->name('admin.senarai.monthly');

        Route::get('admin/yearly-by-licensee', [App\Http\Controllers\Admin\YearlyController::class, 'admin_yearly_by_licensee'])->name('admin.yearly.by.licensee');
        Route::get('admin/yearly-by-state', [App\Http\Controllers\Admin\YearlyController::class, 'admin_yearly_by_state'])->name('admin.yearly.by.state');
        Route::get('admin/yearly-by-district', [App\Http\Controllers\Admin\YearlyController::class, 'admin_yearly_by_district'])->name('admin.yearly.by.district');
        Route::get('admin/yearly-by-region', [App\Http\Controllers\Admin\YearlyController::class, 'admin_yearly_by_region'])->name('admin.yearly.by.region');
        Route::get('admin/yearly-by-product', [App\Http\Controllers\Admin\YearlyController::class, 'admin_yearly_by_product'])->name('admin.yearly.by.product');
        Route::get('admin/yearly-by-productgroup', [App\Http\Controllers\Admin\YearlyController::class, 'admin_yearly_by_productgroup'])->name('admin.yearly.by.productgroup');
        Route::get('admin/yearly-by-month', [App\Http\Controllers\Admin\YearlyController::class, 'admin_yearly_by_month'])->name('admin.yearly.by.month');
        Route::get('admin/yearly', [App\Http\Controllers\Admin\YearlyController::class, 'admin_yearly_all'])->name('admin.yearly.all');


    });

    Route::get('try3', [App\Http\Controllers\Admin\KilangController::class, 'try3'])->name('try3');

    Route::group(['middleware' => ['kilang-buah']], function () {
        //Pelesen - Kilang Buah
        Route::get('buah/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'buah_dashboard'])->name('buah.dashboard');

        Route::get('buah/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_maklumatasaspelesen'])->name('buah.maklumatasaspelesen');
        Route::post('buah/updatmaklumat-asas-pelesen/', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_maklumat_asas_pelesen'])->name('buah.update.maklumat.asas.pelesen');
        Route::post('buah/updatmaklumat-asas-pelesen/', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_maklumat_asas_pelesencuba'])->name('buah.update.maklumat.asas.pelesen.cuba');
        Route::post('buah/updatmaklumat-asas-pelesen-2/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_maklumat_asas_pelesen2'])->name('buah.update.maklumat.asas.pelesen2');


        Route::get('buah/tukar-password', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_tukarpassword'])->name('buah.tukarpassword');
        Route::post('buah/update-password/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_password'])->name('buah.update.password');


        Route::get('buah/bahagian-i', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagiani'])->name('buah.bahagiani');
        Route::post('buah/updatbahagian-i/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_i'])->name('buah.update.bahagian.i');

        Route::get('buah/bahagian-ii', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianii'])->name('buah.bahagianii');
        Route::post('buah/updatbahagian-ii/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_ii'])->name('buah.update.bahagian.ii');


        Route::get('buah/bahagian-iii', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianiii'])->name('buah.bahagianiii');
        Route::post('buah/updatbahagian-iii/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_iii'])->name('buah.update.bahagian.iii');

        Route::get('buah/bahagian-iv', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianiv'])->name('buah.bahagianiv');
        Route::post('buah/updatbahagian-iv/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_iv'])->name('buah.update.bahagian.iv');


        Route::get('buah/bahagian-v', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianv'])->name('buah.bahagianv');
        Route::post('buah/updatbahagian-v/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_v'])->name('buah.update.bahagian.v');


        Route::get('buah/bahagian-vi', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianvi'])->name('buah.bahagianvi');

        Route::get('buah/papar-penyata', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_paparpenyata'])->name('buah.paparpenyata');
        Route::post('buah/update-penyata', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_papar_penyata'])->name('buah.update.papar.penyata');

        Route::get('buah/hantar-penyata', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_hantar_penyata'])->name('buah.hantar.penyata');

        Route::get('buah/email', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_email'])->name('buah.email');
        Route::post('buah/send-email', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_send_email_proses'])->name('buah.send.email.proses');

        Route::get('buah/prestasi-oer', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_prestasioer'])->name('buah.prestasioer');
        Route::get('buah/papar-prestasi-oer', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_oerprocess'])->name('buah.papar.prestasi.oer');

        Route::get('buah/penyata-dahulu', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_penyatadahulu'])->name('buah.penyatadahulu');
        Route::post('buah/penyata-dahulu/process', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_penyata_dahulu_process'])->name('buah.penyata.dahulu.process');

        Route::get('buah/kod-produk', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_kod_produk'])->name('buah.kod.produk');
        Route::get('buah/kod-negara', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_kod_negara'])->name('buah.kod.negara');

    });

    Route::group(['middleware' => ['kilang-penapis']], function () {
        //Pelesen - Kilang Penapis
        Route::get('penapis/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'penapis_dashboard'])->name('penapis.dashboard');

        Route::get('penapis/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_maklumatasaspelesen'])->name('penapis.maklumatasaspelesen');
        Route::post('penapis/updatmaklumat-asas-pelesen/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_update_maklumat_asas_pelesen'])->name('penapis.update.maklumat.asas.pelesen');

        Route::get('penapis/tukar-password', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_tukarpassword'])->name('penapis.tukarpassword');
        Route::post('penapis/update-password/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_update_password'])->name('penapis.update.password');


        Route::get('penapis/test', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_test'])->name('penapis.test');
        Route::get('penapis/bahagian-i', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagiani'])->name('penapis.bahagiani');
        Route::post('penapis/add-bahagian-i', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_i'])->name('penapis.add.bahagian.i');
        Route::post('penapis/edit-bahagian-i/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_i'])->name('penapis.edit.bahagian.i');
        Route::get('penapis/deletbahagian-i/{id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_delete_bahagian_i'])->name('penapis.delete.bahagiani');


        Route::get('penapis/bahagian-ii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianii'])->name('penapis.bahagianii');
        Route::post('penapis/add-bahagian-ii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_ii'])->name('penapis.add.bahagian.ii');
        Route::post('penapis/edit-bahagian-ii/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_ii'])->name('penapis.edit.bahagian.ii');
        Route::get('penapis/deletbahagian-ii/{id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_delete_bahagian_ii'])->name('penapis.delete.bahagianii');

        Route::get('penapis/bahagian-iii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianiii'])->name('penapis.bahagianiii');
        Route::post('penapis/updatbahagian-iii/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_update_bahagian_iii'])->name('penapis.update.bahagian.iii');

        Route::get('penapis/bahagian-iva', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianiva'])->name('penapis.bahagianiva');
        Route::post('penapis/add-bahagian-iva', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_iva'])->name('penapis.add.bahagian.iva');
        Route::post('penapis/edit-bahagian-iva/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_iva'])->name('penapis.edit.bahagian.iva');
        Route::get('penapis/deletbahagian-iva/{id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_delete_bahagian_iva'])->name('penapis.delete.bahagianiva');

        Route::get('penapis/bahagian-ivb', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianivb'])->name('penapis.bahagianivb');
        Route::post('penapis/add-bahagian-ivb', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_ivb'])->name('penapis.add.bahagian.ivb');
        Route::post('penapis/edit-bahagian-ivb/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_ivb'])->name('penapis.edit.bahagian.ivb');
        Route::get('penapis/deletbahagian-ivb/{id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_delete_bahagian_ivb'])->name('penapis.delete.bahagianivb');



        Route::get('penapis/bahagian-v', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianv'])->name('penapis.bahagianv');
        Route::post('penapis/add-bahagian-v', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_v'])->name('penapis.add.bahagian.v');
        Route::post('penapis/edit-bahagian-v/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_v'])->name('penapis.edit.bahagian.v');
        Route::get('penapis/deletbahagian-v/{id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_delete_bahagian_v'])->name('penapis.delete.bahagianv');

        // Route::get('penapis/bahagian-vb', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianvb'])->name('penapis.bahagianvb');'

        Route::get('penapis/bahagian-vi', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianvi'])->name('penapis.bahagianvi');
        Route::get('penapis/bahagian-vii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianvii'])->name('penapis.bahagianvii');
        Route::post('penapis/add-bahagian-vi', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_vi'])->name('penapis.add.bahagian.vi');
        Route::post('penapis/edit-bahagian-vi/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_vi'])->name('penapis.edit.bahagian.vi');

        Route::get('penapis/papar-penyata', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_paparpenyata'])->name('penapis.paparpenyata');
        Route::post('penapis/update-penyata/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_update_papar_penyata'])->name('penapis.update.papar.penyata');

        Route::get('penapis/hantar-penyata', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_hantar_penyata'])->name('penapis.hantar.penyata');

        Route::get('penapis/email', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_email'])->name('penapis.email');
        Route::post('penapis/send-email', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_send_email_proses'])->name('penapis.send.email.proses');


        Route::get('penapis/penyata-dahulu', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_penyatadahulu'])->name('penapis.penyatadahulu');
        Route::post('penapis/penyata-dahulu/process', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_penyata_dahulu_process'])->name('penapis.penyata.dahulu.process');

        Route::get('penapis/kod-produk', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_kod_produk'])->name('penapis.kod.produk');
        Route::get('penapis/kod-negara', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_kod_negara'])->name('penapis.kod.negara');
        Route::get('penapis/try', [App\Http\Controllers\Users\KilangPenapisController::class, 'try'])->name('try');
    });

    Route::group(['middleware' => ['kilang-isirung']], function () {
        //Pelesen - Kilang Isirung
        Route::get('isirung/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'isirung_dashboard'])->name('isirung.dashboard');
        Route::get('isirung/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_maklumatasaspelesen'])->name('isirung.maklumatasaspelesen');
        Route::post('isirung/updatmaklumat-asas-pelesen/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_update_maklumat_asas_pelesen'])->name('isirung.update.maklumat.asas.pelesen');

        Route::get('isirung/tukar-password', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_tukarpassword'])->name('isirung.tukarpassword');
        Route::post('isirung/update-password/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_update_password'])->name('isirung.update.password');


        Route::get('isirung/bahagian-i', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagiani'])->name('isirung.bahagiani');
        Route::post('isirung/updatbahagian-i/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_update_bahagian_i'])->name('isirung.update.bahagian.i');

        Route::get('isirung/bahagian-ii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianii'])->name('isirung.bahagianii');
        Route::post('isirung/updatbahagian-ii/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_update_bahagian_ii'])->name('isirung.update.bahagian.ii');

        Route::get('isirung/bahagian-iii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianiii'])->name('isirung.bahagianiii');
        Route::post('isirung/add-bahagian-iii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_add_bahagian_iii'])->name('isirung.add.bahagian.iii');
        Route::post('isirung/edit-bahagian-iii/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_edit_bahagian_iii'])->name('isirung.edit.bahagian.iii');
        Route::post('isirung/bahagian-iii/process', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'validation'])->name('isirung.bahagianiii.process');
        Route::get('isirung/bahagian-iii/delete/{id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'destroyiii'])->name('isirung.bahagianiii.delete');

        Route::get('isirung/bahagian-iv', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianiv'])->name('isirung.bahagianiv');
        Route::post('isirung/add-bahagian-iv', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_add_bahagian_iv'])->name('isirung.add.bahagian.iv');
        Route::post('isirung/edit-bahagian-iv/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_edit_bahagian_iv'])->name('isirung.edit.bahagian.iv');
        Route::post('isirung/bahagian-iv/process', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'validationiv'])->name('isirung.bahagianiv.process');
        Route::get('isirung/bahagian-iv/delete/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'destroyiv'])->name('isirung.bahagianiv.delete');

        Route::get('isirung/bahagian-v', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianv'])->name('isirung.bahagianv');
        Route::post('isirung/add-bahagian-v', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_add_bahagian_v'])->name('isirung.add.bahagian.v');
        Route::post('isirung/bahagian-v/process', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'validationv'])->name('isirung.bahagianv.process');
        Route::post('isirung/edit-bahagian-v/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_edit_bahagian_v'])->name('isirung.edit.bahagian.v');
        Route::get('isirung/bahagian-v/delete/{id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'destroyv'])->name('isirung.bahagianv.delete');

        Route::get('isirung/bahagian-vi', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianvi'])->name('isirung.bahagianvi');
        Route::get('isirung/bahagian-vii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianvii'])->name('isirung.bahagianvii');
        Route::post('isirung/add-bahagian-vi', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_add_bahagian_vi'])->name('isirung.add.bahagian.vi');
        Route::post('isirung/edit-bahagian-vi/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_edit_bahagian_vi'])->name('isirung.edit.bahagian.vi');

        // Route::get('isirung/bahagian-vii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianvii'])->name('isirung.bahagianvii');
        Route::get('isirung/papar-penyata', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_paparpenyata'])->name('isirung.paparpenyata');
        Route::post('isirung/update-penyata/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_update_papar_penyata'])->name('isirung.update.papar.penyata');

        Route::get('isirung/hantar-penyata', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_hantar_penyata'])->name('isirung.hantar.penyata');

        Route::get('isirung/email', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_email'])->name('isirung.email');
        Route::post('isirung/send-email', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_send_email_proses'])->name('isirung.send.email.proses');

        Route::get('isirung/kod-produk', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_kod_produk'])->name('isirung.kod.produk');
        Route::get('isirung/kod-negara', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_kod_negara'])->name('isirung.kod.negara');

        Route::get('isirung/penyata-dahulu', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_penyatadahulu'])->name('isirung.penyatadahulu');
        Route::post('isirung/penyata-dahulu/process', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_penyata_dahulu_process'])->name('isirung.penyata.dahulu.process');

    });

    Route::group(['middleware' => ['kilang-oleokimia']], function () {
        //Pelesen - Kilang Oleokimia
        Route::get('oleokimia/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'oleo_dashboard'])->name('oleo.dashboard');
        Route::get('oleokimia/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_maklumatasaspelesen'])->name('oleo.maklumatasaspelesen');
        Route::post('oleokimia/updatmaklumat-asas-pelesen/{Id}',  [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_update_maklumat_asas_pelesen'])->name('oleo.update.maklumat.asas.pelesen');

        Route::get('oleokimia/tukar-password', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_tukarpassword'])->name('oleo.tukarpassword');
        Route::post('oleokimia/update-password/{Id}', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_update_password'])->name('oleo.update.password');

        Route::get('oleokimia/bahagian-ia', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagiania'])->name('oleo.bahagiania');
        Route::post('oleokimia/add-bahagian-ia', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class,  'oleo_add_bahagian_ia'])->name('oleo.add.bahagian.ia');
        Route::post('oleokimia/edit-bahagian-ia/{Id}', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_edit_bahagian_ia'])->name('oleo.edit.bahagian.ia');
        Route::get('oleokimia/deletbahagian-ia/{id}',  [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_delete_bahagian_ia'])->name('oleo.delete.bahagiania');

        Route::get('oleokimia/bahagian-ib', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianib'])->name('oleo.bahagianib');
        Route::post('oleokimia/add-bahagian-ib', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class,  'oleo_add_bahagian_ib'])->name('oleo.add.bahagian.ib');
        Route::post('oleokimia/edit-bahagian-ib/{Id}', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_edit_bahagian_ib'])->name('oleo.edit.bahagian.ib');
        Route::get('oleokimia/deletbahagian-ib/{id}',  [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_delete_bahagian_ib'])->name('oleo.delete.bahagianib');

        Route::get('oleokimia/bahagian-ic', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianic'])->name('oleo.bahagianic');
        Route::post('oleokimia/add-bahagian-ic', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class,  'oleo_add_bahagian_ic'])->name('oleo.add.bahagian.ic');
        Route::post('oleokimia/edit-bahagian-ic/{Id}', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_edit_bahagian_ic'])->name('oleo.edit.bahagian.ic');
        Route::get('oleokimia/deletbahagian-ic/{id}',  [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_delete_bahagian_ic'])->name('oleo.delete.bahagianic');

        Route::get('oleokimia/bahagian-ii', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianii'])->name('oleo.bahagianii');
        Route::post('oleokimia/updatbahagian-ii/{Id}', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_update_bahagian_ii'])->name('oleo.update.bahagian.ii');

        Route::get('oleokimia/bahagian-iii', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianiii'])->name('oleo.bahagianiii');
        Route::post('oleokimia/add-bahagian-iii', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_add_bahagian_iii'])->name('oleo.add.bahagian.iii');
        Route::post('oleokimia/edit-bahagian-iii/{Id}',  [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_edit_bahagian_iii'])->name('oleo.edit.bahagian.iii');
        Route::get('oleokimia/deletbahagian-iii/{id}',  [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_delete_bahagian_iii'])->name('oleo.delete.bahagianiii');

        Route::get('oleokimia/bahagian-iv', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianiv'])->name('oleo.bahagianiv');
        Route::get('oleokimia/bahagian-v', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianv'])->name('oleo.bahagianv');
        Route::post('oleokimia/add-bahagian-iv', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_add_bahagian_iv'])->name('oleo.add.bahagian.iv');
        Route::post('oleokimia/edit-bahagian-iv/{Id}',  [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_edit_bahagian_iv'])->name('oleo.edit.bahagian.iv');

        Route::get('oleokimia/papar-penyata', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_paparpenyata'])->name('oleo.paparpenyata');
        Route::post('oleokimia/update-penyata/{Id}', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_update_papar_penyata'])->name('oleo.update.papar.penyata');

        Route::get('oleokimia/hantar-penyata', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_hantar_penyata'])->name('oleo.hantar.penyata');

        Route::get('oleokimia/email', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_email'])->name('oleo.email');
        Route::post('oleokimia/send-email', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_send_email_proses'])->name('oleo.send.email.proses');

        Route::get('oleokimia/kod-produk', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_kod_produk'])->name('oleo.kod.produk');
        Route::get('oleokimia/kod-negara', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_kod_negara'])->name('oleo.kod.negara');
        Route::get('oleokimia/penyata-dahulu', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_penyatadahulu'])->name('oleo.penyatadahulu');
        Route::post('oleokimia/penyata-dahulu/process', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_penyata_dahulu_process'])->name('oleo.penyata.dahulu.process');
    });

    Route::group(['middleware' => ['pusat-simpanan']], function () {
        //Pelesen - Pusat Simpanan
        Route::get('pusatsimpan/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'pusatsimpan_dashboard'])->name('pusatsimpan.dashboard');

        Route::get('pusatsimpan/maklumat-asas-pelesen', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_maklumatasaspelesen'])->name('pusatsimpan.maklumatasaspelesen');
        Route::post('pusatsimpan/updatmaklumat-asas-pelesen', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_update_maklumat_asas_pelesen'])->name('pusatsimpan.update.maklumat.asas.pelesen');

        Route::get('pusatsimpan/tukar-password', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_tukarpassword'])->name('pusatsimpan.tukarpassword');
        Route::post('pusatsimpan/update-password/{Id}', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_update_password'])->name('pusatsimpan.update.password');


        Route::get('pusatsimpan/bahagian-a', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_bahagiana'])->name('pusatsimpan.bahagiana');
        Route::post('pusatsimpan/add-bahagian-a', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_add_bahagian_a'])->name('pusatsimpan.add.bahagian.a');
        Route::post('pusatsimpan/edit-bahagian-a/{Id}', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_edit_bahagian_a'])->name('pusatsimpan.edit.bahagian.a');
        Route::get('pusatsimpan/deletbahagian-a/{id}',  [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_delete_bahagian_a'])->name('pusatsimpan.delete.bahagiana');

        Route::get('pusatsimpan/bahagian-b', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_bahagianb'])->name('pusatsimpan.bahagianb');

        Route::get('pusatsimpan/papar-penyata', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_paparpenyata'])->name('pusatsimpan.paparpenyata');
        Route::post('pusatsimpan/update-penyata/{Id}', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_update_papar_penyata'])->name('pusatsimpan.update.papar.penyata');

        Route::get('pusatsimpan/hantar-penyata', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_hantar_penyata'])->name('pusatsimpan.hantar.penyata');

        Route::get('pusatsimpan/email', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_email'])->name('pusatsimpan.email');
        Route::post('pusatsimpan/send-email', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_send_email_proses'])->name('pusatsimpan.send.email.proses');

        Route::get('pusatsimpan/kod-produk', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_kod_produk'])->name('pusatsimpan.kod.produk');
        Route::get('pusatsimpan/kod-negara', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_kod_negara'])->name('pusatsimpan.kod.negara');

        Route::get('pusatsimpan/penyata-dahulu', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_penyatadahulu'])->name('pusatsimpan.penyatadahulu');
        Route::post('pusatsimpan/penyata-dahulu/process', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_penyata_dahulu_process'])->name('pusatsimpan.penyata.dahulu.process');
    });

    Route::group(['middleware' => ['kilang-biodiesel']], function () {


        Route::get('biodiesel/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'biodiesel_dashboard'])->name('bio.dashboard');
        Route::get('biodiesel/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_maklumatasaspelesen'])->name('bio.maklumatasaspelesen');

        Route::post('biodiesel/updatmaklumat-asas-pelesen/{Id}',  [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_update_maklumat_asas_pelesen'])->name('bio.update.maklumat.asas.pelesen');
        Route::get('biodiesel/tukar-password', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_tukarpassword'])->name('bio.tukarpassword');
        Route::post('biodiesel/update-password/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_update_password'])->name('bio.update.password');


        Route::get('biodiesel/bahagian-ia', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagiania'])->name('bio.bahagiania');
        Route::post('biodiesel/add-bahagian-ia', [App\Http\Controllers\Users\KilangBiodieselController::class,  'bio_add_bahagian_ia'])->name('bio.add.bahagian.ia');
        Route::post('biodiesel/edit-bahagian-ia/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_edit_bahagian_ia'])->name('bio.edit.bahagian.ia');
        Route::get('biodiesel/deletbahagian-ia/{id}',  [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_delete_bahagian_ia'])->name('bio.delete.bahagian.ia');


        Route::get('biodiesel/bahagian-ib', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianib'])->name('bio.bahagianib');
        Route::post('biodiesel/add-bahagian-ib', [App\Http\Controllers\Users\KilangBiodieselController::class,  'bio_add_bahagian_ib'])->name('bio.add.bahagian.ib');
        Route::post('biodiesel/edit-bahagian-ib/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_edit_bahagian_ib'])->name('bio.edit.bahagian.ib');
        Route::get('biodiesel/deletbahagian-ib/{id}',  [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_delete_bahagian_ib'])->name('bio.delete.bahagian.ib');



        Route::get('biodiesel/bahagian-ic', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianic'])->name('bio.bahagianic');
        Route::post('biodiesel/add-bahagian-ic', [App\Http\Controllers\Users\KilangBiodieselController::class,  'bio_add_bahagian_ic'])->name('bio.add.bahagian.ic');
        Route::post('biodiesel/edit-bahagian-ic/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_edit_bahagian_ic'])->name('bio.edit.bahagian.ic');
        Route::get('biodiesel/deletbahagian-ic/{id}',  [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_delete_bahagian_ic'])->name('bio.delete.bahagian.ic');


        Route::get('biodiesel/bahagian-ii', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianii'])->name('bio.bahagianii');
        Route::post('biodiesel/add-bahagian-ii', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_add_bahagian_ii'])->name('bio.add.bahagian.ii');
        Route::post('biodiesel/edit-bahagian-ii/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_edit_bahagian_ii'])->name('bio.edit.bahagian.ii');
        Route::get('biodiesel/deletbahagian-ii/{id}',  [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_delete_bahagian_ii'])->name('bio.delete.bahagian.ii');


        Route::get('biodiesel/bahagian-iii', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianiii'])->name('bio.bahagianiii');
        Route::get('biodiesel/bahagian-iii/maklumat-jualan', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_maklumat_jualan'])->name('bio.maklumat.jualan');
        Route::post('biodiesel/add-bahagian-iii', [App\Http\Controllers\Users\KilangBiodieselController::class,  'bio_add_bahagian_iii'])->name('bio.add.bahagian.iii');
        Route::post('biodiesel/edit-bahagian-iii/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_edit_bahagian_iii'])->name('bio.edit.bahagian.iii');
        Route::post('biodiesel/update-bahagian-iii-sykt/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_update_bahagian_iii_sykt'])->name('bio.update.bahagian.iii.sykt');
        Route::post('biodiesel/edit-bahagian-iii-sykt/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_edit_bahagian_iii_sykt'])->name('bio.edit.bahagian.iii.sykt');
        Route::post('biodiesel/add-bahagian-iii-jualan', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_add_bahagian_iii_jualan'])->name('bio.add.bahagian.iii.jualan');
        Route::get('biodiesel/deletbahagian-iii/{id}',  [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_delete_bahagian_iii'])->name('bio.delete.bahagian.iii');


        Route::get('biodiesel/bahagian-iv', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianiv'])->name('bio.bahagianiv');
        Route::get('biodiesel/bahagian-v', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianv'])->name('bio.bahagianv');

        Route::get('biodiesel/papar-penyata', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_paparpenyata'])->name('bio.paparpenyata');
        Route::post('biodiesel/update-penyata/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_update_papar_penyata'])->name('bio.update.papar.penyata');

        Route::get('biodiesel/hantar-penyata', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_hantar_penyata'])->name('bio.hantar.penyata');

        Route::get('biodiesel/email', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_email'])->name('bio.email');
        Route::post('biodiesel/send-email', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_send_email_proses'])->name('bio.send.email.proses');

        Route::get('biodiesel/penyata-dahulu', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_penyatadahulu'])->name('bio.penyatadahulu');
        Route::post('biodiesel/penyata-dahulu/process', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_penyata_dahulu_process'])->name('bio.penyata.dahulu.process');


        Route::get('biodiesel/kod-produk', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_kod_produk'])->name('bio.kod.produk');
        Route::get('biodiesel/kod-negara', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_kod_negara'])->name('bio.kod.negara');
        Route::get('biodiesel/try', [App\Http\Controllers\Users\KilangBiodieselController::class, 'try'])->name('try');
    });
});
});

// Route::get('penapisss/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'penapis_oleo_dashboard'])->name('penapis.oleo.dashboard');

Route::get('/try', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'try'])->name('try');
Route::get('/try2', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'try2'])->name('try2');

Route::get('hashpassword', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'hashPassword'])->name('hashPassword');

Route::get('/data/graph/default', [App\Http\Controllers\Admin\KilangController::class, 'graph_dashboard_default'])->name('ipjpsm.graph_dashboard.default');



Route::get('/trylogin', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'trylogin'])->name('trylogin');

Route::get('/loginArx', [App\Http\Controllers\tryController::class, 'tryArx'])->name('loginArx');
Route::get('/dashboardArx', [App\Http\Controllers\tryController::class, 'dashArx'])->name('dashboardArx');

// //Kilang Biodiesel
// Route::get('biodiesel/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'biodiesel_dashboard'])->name('bio.dashboard');
// Route::get('biodiesel/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_maklumatasaspelesen'])->name('bio.maklumatasaspelesen');
// Route::post('biodiesel/updatmaklumat-asas-pelesen/{Id}',  [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_update_maklumat_asas_pelesen'])->name('bio.update.maklumat.asas.pelesen');

// Route::get('biodiesel/tukar-password', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_tukarpassword'])->name('bio.tukarpassword');

// Route::get('biodiesel/bahagian-ia', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagiania'])->name('bio.bahagiania');
// Route::post('biodiesel/add-bahagian-ia', [App\Http\Controllers\Users\KilangBiodieselController::class,  'bio_add_bahagian_ia'])->name('bio.add.bahagian.ia');
// Route::post('biodiesel/edit-bahagian-ia/{Id}', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_edit_bahagian_ia'])->name('bio.edit.bahagian.ia');

// Route::get('biodiesel/bahagian-ib', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianib'])->name('bio.bahagianib');
// Route::post('biodiesel/add-bahagian-ib', [App\Http\Controllers\Users\KilangBiodieselController::class,  'bio_add_bahagian_ib'])->name('bio.add.bahagian.ib');

// Route::get('biodiesel/bahagian-ic', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianic'])->name('bio.bahagianic');
// Route::get('biodiesel/bahagian-ii', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianii'])->name('bio.bahagianii');
// Route::get('biodiesel/bahagian-iii', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianiii'])->name('bio.bahagianiii');
// Route::get('biodiesel/bahagian-iv', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_bahagianiv'])->name('bio.bahagianiv');
// Route::get('biodiesel/papar-penyata', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_paparpenyata'])->name('bio.paparpenyata');
// Route::get('biodiesel/email', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_email'])->name('bio.email');
// Route::get('biodiesel/prestasi-oer', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_prestasioer'])->name('bio.prestasioer');
// Route::get('biodiesel/penyata-dahulu', [App\Http\Controllers\Users\KilangBiodieselController::class, 'bio_penyatadahulu'])->name('bio.penyatadahulu');
