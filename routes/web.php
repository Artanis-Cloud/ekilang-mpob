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

Route::get('/',[App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('pelesen.login');

Route::middleware('auth')->group(function () {

    //Data Migration
    Route::get('/migrate/data', [App\Http\Controllers\DataMigrationController::class, 'transfer_pelesen_to_users'])->name('transfer_pelesen_to_users');
    Route::get('/migrate/data/admin', [App\Http\Controllers\DataMigrationController::class, 'transfer_admin_to_users'])->name('transfer_admin_to_users');

    //AJAX
    Route::get('/ajax/fetch-daerah/{kod_negeri}', [App\Http\Controllers\Admin\AjaxController::class, 'fetch_daerah'])->name('ajax-daerah');
    Route::get('/ajax/fetch-kawasan/{kod_negeri}', [App\Http\Controllers\Admin\AjaxController::class, 'fetch_kawasan'])->name('ajax-kawasan');

    Route::group(['middleware' => ['admin']], function () {
        //Admin
        //dashboard
        Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardAdminController::class, 'admin_dashboard'])->name('admin.dashboard');
        Route::get('admin/dashboard2', [App\Http\Controllers\Admin\DashboardAdminController::class, 'admin_dashboard2'])->name('admin.dashboard2');



        Route::get('admin/login', [App\Http\Controllers\Admin\KilangController::class, 'admin_login'])->name('admin.login');
        Route::get('admin/kilang-buah', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangbuah'])->name('admin.kilangbuah');
        Route::get('admin/kilang-penapis', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangpenapis'])->name('admin.kilangpenapis');
        Route::get('admin/kilang-isirung', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangisirung'])->name('admin.kilangisirung');
        Route::get('admin/kilang-oleokimia', [App\Http\Controllers\Admin\KilangController::class, 'admin_kilangoleokimia'])->name('admin.kilangoleokimia');
        Route::get('admin/pusat-simpanan', [App\Http\Controllers\Admin\KilangController::class, 'admin_pusatsimpanan'])->name('admin.pusatsimpanan');
        Route::get('admin/e-biodiesel', [App\Http\Controllers\Admin\KilangController::class, 'admin_ebiodiesel'])->name('admin.ebiodiesel');

        Route::get('admin/1-daftarpelesen', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_1daftarpelesen'])->name('admin.1daftarpelesen');
        Route::post('admin/1-daftarpelesen/proses', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_1daftarpelesen_proses'])->name('admin.1daftarpelesen.proses');

        Route::get('admin/senarai-pelesen-buah', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenbuah'])->name('admin.senaraipelesenbuah');
        Route::get('admin/senarai-pelesen-penapis', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenpenapis'])->name('admin.senaraipelesenpenapis');
        Route::get('admin/senarai-pelesen-isirung', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenisirung'])->name('admin.senaraipelesenisirung');
        Route::get('admin/senarai-pelesen-oleokimia', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenoleokimia'])->name('admin.senaraipelesenoleokimia');
        Route::get('admin/senarai-pelesen-simpanan', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesensimpanan'])->name('admin.senaraipelesensimpanan');
        Route::get('admin/senarai-pelesen-bio', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenbio'])->name('admin.senaraipelesenbio');

        Route::get('admin/senarai-pelesen-batal-buah', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senaraipelesenbatalbuah'])->name('admin.senaraipelesenbatalbuah');
        Route::get('admin/senarai-pelesen-batal-penapis', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_penapis'])->name('admin.senarai.pelesen.batal.penapis');
        Route::get('admin/senarai-pelesen-batal-isirung', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_isirung'])->name('admin.senarai.pelesen.batal.isirung');
        Route::get('admin/senarai-pelesen-batal-oleokimia', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_oleokimia'])->name('admin.senarai.pelesen.batal.oleokimia');
        Route::get('admin/senarai-pelesen-batal-simpanan', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_simpanan'])->name('admin.senarai.pelesen.batal.simpanan');
        Route::get('admin/senarai-pelesen-batal-bio', [App\Http\Controllers\Admin\Proses1Controller::class, 'admin_senarai_pelesen_batal_bio'])->name('admin.senarai.pelesen.batal.bio');


        Route::get('admin/2-tukar-password', [App\Http\Controllers\Admin\Proses2Controller::class, 'admin_2tukarpassword'])->name('admin.2tukarpassword');


        Route::get('admin/3-daftar-penyata-buah', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyata'])->name('admin.3daftarpenyata');
        Route::get('admin/3-daftar-penyata-penapis', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyatapenapis'])->name('admin.3daftarpenyatapenapis');
        Route::get('admin/3-daftar-penyata-isirung', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyataisirung'])->name('admin.3daftarpenyataisirung');
        Route::get('admin/3-daftar-penyata-oleokimia', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyataoleokimia'])->name('admin.3daftarpenyataoleokimia');
        Route::get('admin/3-daftar-penyata-pusat-simpanan', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyatasimpanan'])->name('admin.3daftarpenyatasimpanan');
        Route::get('admin/3-daftar-penyata-biodiesel', [App\Http\Controllers\Admin\Proses3Controller::class, 'admin_3daftarpenyatabiodiesel'])->name('admin.3daftarpenyatabiodiesel');

        Route::get('admin/4-EKilang-PLEID-buah', [App\Http\Controllers\Admin\Proses4Controller::class, 'admin_4ekilangpleid'])->name('admin.4ekilangpleid');
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

        Route::get('admin/6-penyata-papar-cetak-buah', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakbuah'])->name('admin.6penyatapaparcetakbuah');
        Route::get('admin/6-penyata-papar-cetak-penapis', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakpenapis'])->name('admin.6penyatapaparcetakpenapis');
        Route::get('admin/6-penyata-papar-cetak-isirung', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakisirung'])->name('admin.6penyatapaparcetakisirung');
        Route::get('admin/6-penyata-papar-cetak-oleo', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakoleo'])->name('admin.6penyatapaparcetakoleo');
        Route::get('admin/6-penyata-papar-cetak-simpanan', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetaksimpanan'])->name('admin.6penyatapaparcetaksimpanan');
        Route::get('admin/6-penyata-papar-cetak-bio', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6penyatapaparcetakbio'])->name('admin.6penyatapaparcetakbio');
        Route::get('admin/6-papar-buah', [App\Http\Controllers\Admin\Proses6Controller::class, 'admin_6papar_buah'])->name('admin.6papar.buah');

        Route::get('admin/7-porting-maklumat', [App\Http\Controllers\Admin\Proses7Controller::class, 'admin_7portingmaklumat'])->name('admin.7portingmaklumat');
        Route::get('admin/8-port-data', [App\Http\Controllers\Admin\Proses8Controller::class, 'admin_8portdata'])->name('admin.8portdata');

        Route::get('admin/9-penyata-terdahulu', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu'])->name('admin.9penyataterdahulu');
        Route::get('admin/9-penyata-terdahulu-penapis', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulupenapis'])->name('admin.9penyataterdahulupenapis');
        Route::get('admin/9-penyata-terdahulu-isirung', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahuluisirung'])->name('admin.9penyataterdahuluisirung');
        Route::get('admin/9-penyata-terdahulu-oleokimia', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahuluoleokimia'])->name('admin.9penyataterdahuluoleokimia');
        Route::get('admin/9-penyata-terdahulu-simpanan', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulusimpanan'])->name('admin.9penyataterdahulusimpanan');
        Route::get('admin/9-penyata-terdahulu-biodiesel', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulubiodiesel'])->name('admin.9penyataterdahulubiodiesel');
        Route::post('admin/9-penyata-terdahulu/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9penyataterdahulu_process'])->name('admin.9penyataterdahulu.process');
        Route::get('admin/9-penyata-terdahulu-papar/process', [App\Http\Controllers\Admin\Proses9Controller::class, 'admin_9papar_process'])->name('admin.9papar.process');

        Route::get('admin/10-port-data-to-dq', [App\Http\Controllers\Admin\Proses10Controller::class, 'admin_10portdatatodq'])->name('admin.10portdatatodq');
        Route::get('admin/11-emel', [App\Http\Controllers\Admin\Proses11Controller::class, 'admin_11emel'])->name('admin.11emel');
        Route::get('admin/11-papar-emel/{Id}', [App\Http\Controllers\Admin\Proses11Controller::class, 'admin_11paparemel'])->name('admin.11paparemel');
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


        Route::get('admin/kod-produk', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_kod_produk'])->name('admin.kod.produk');
        Route::get('admin/kod-negara', [App\Http\Controllers\Admin\MenuLainController::class, 'admin_kod_negara'])->name('admin.kod.negara');


        Route::get('admin/akaun-pentadbir', [App\Http\Controllers\Admin\TetapanAkaunController::class, 'admin_akaun_pentadbir'])->name('admin.akaun.pentadbir');

        Route::get('admin/pengurusan-pentadbir', [App\Http\Controllers\Admin\KonfigurasiController::class, 'admin_pengurusan_pentadbir'])->name('admin.pengurusan.pentadbir');
        Route::post('admin/pengurusan-pentadbir/process', [App\Http\Controllers\Admin\KonfigurasiController::class, 'admin_pengurusan_pentadbir_process'])->name('admin.pengurusan.pentadbir.process');
    });

    Route::get('try3', [App\Http\Controllers\Admin\KilangController::class, 'try3'])->name('try3');

    Route::group(['middleware' => ['kilang-buah']], function () {
        //Pelesen - Kilang Buah
        Route::get('buah/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'buah_dashboard'])->name('buah.dashboard');

        Route::get('buah/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_maklumatasaspelesen'])->name('buah.maklumatasaspelesen');
        Route::post('buah/update-maklumat-asas-pelesen/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_maklumat_asas_pelesen'])->name('buah.update.maklumat.asas.pelesen');


        Route::get('buah/tukar-password', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_tukarpassword'])->name('buah.tukarpassword');

        Route::get('buah/bahagian-i', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagiani'])->name('buah.bahagiani');
        Route::post('buah/update-bahagian-i/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_i'])->name('buah.update.bahagian.i');

        Route::get('buah/bahagian-ii', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianii'])->name('buah.bahagianii');
        Route::post('buah/update-bahagian-ii/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_ii'])->name('buah.update.bahagian.ii');


        Route::get('buah/bahagian-iii', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianiii'])->name('buah.bahagianiii');
        Route::post('buah/update-bahagian-iii/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_iii'])->name('buah.update.bahagian.iii');

        Route::get('buah/bahagian-iv', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianiv'])->name('buah.bahagianiv');
        Route::post('buah/update-bahagian-iv/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_iv'])->name('buah.update.bahagian.iv');


        Route::get('buah/bahagian-v', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianv'])->name('buah.bahagianv');
        Route::post('buah/update-bahagian-v/{Id}', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_update_bahagian_v'])->name('buah.update.bahagian.v');


        Route::get('buah/bahagian-vi', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_bahagianvi'])->name('buah.bahagianvi');

        Route::get('buah/papar-penyata', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_paparpenyata'])->name('buah.paparpenyata');

        Route::get('buah/email', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_email'])->name('buah.email');
        Route::get('buah/prestasi-oer', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_prestasioer'])->name('buah.prestasioer');

        Route::get('buah/penyata-dahulu', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_penyatadahulu'])->name('buah.penyatadahulu');
        Route::post('buah/penyata-dahulu/process', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'buah_penyata_dahulu_process'])->name('buah.penyata.dahulu.process');

    });

    Route::group(['middleware' => ['kilang-penapis']], function () {
        //Pelesen - Kilang Penapis
        Route::get('penapis/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'penapis_dashboard'])->name('penapis.dashboard');

        Route::get('penapis/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_maklumatasaspelesen'])->name('penapis.maklumatasaspelesen');
        Route::post('penapis/update-maklumat-asas-pelesen/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_update_maklumat_asas_pelesen'])->name('penapis.update.maklumat.asas.pelesen');

        Route::get('penapis/tukar-password', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_tukarpassword'])->name('penapis.tukarpassword');

        Route::get('penapis/bahagian-i', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagiani'])->name('penapis.bahagiani');
        Route::post('penapis/add-bahagian-i', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_i'])->name('penapis.add.bahagian.i');
        Route::post('penapis/edit-bahagian-i/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_i'])->name('penapis.edit.bahagian.i');



        Route::get('penapis/bahagian-ii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianii'])->name('penapis.bahagianii');
        Route::post('penapis/add-bahagian-ii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_ii'])->name('penapis.add.bahagian.ii');
        Route::post('penapis/edit-bahagian-ii/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_ii'])->name('penapis.edit.bahagian.ii');

        Route::get('penapis/bahagian-iii', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianiii'])->name('penapis.bahagianiii');
        Route::post('penapis/update-bahagian-iii/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_update_bahagian_iii'])->name('penapis.update.bahagian.iii');

        Route::get('penapis/bahagian-iva', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianiva'])->name('penapis.bahagianiva');
        Route::post('penapis/add-bahagian-iva', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_iva'])->name('penapis.add.bahagian.iva');
        Route::post('penapis/edit-bahagian-iva/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_iva'])->name('penapis.edit.bahagian.iva');

        Route::get('penapis/bahagian-ivb', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianivb'])->name('penapis.bahagianivb');
        Route::post('penapis/add-bahagian-ivb', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_ivb'])->name('penapis.add.bahagian.ivb');
        Route::post('penapis/edit-bahagian-ivb/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_ivb'])->name('penapis.edit.bahagian.ivb');



        Route::get('penapis/bahagian-v', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianv'])->name('penapis.bahagianv');
        Route::post('penapis/add-bahagian-v', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_v'])->name('penapis.add.bahagian.v');
        Route::post('penapis/edit-bahagian-v/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_v'])->name('penapis.edit.bahagian.v');

        // Route::get('penapis/bahagian-vb', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianvb'])->name('penapis.bahagianvb');'

        Route::get('penapis/bahagian-vi', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_bahagianvi'])->name('penapis.bahagianvi');
        Route::post('penapis/add-bahagian-vi', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_add_bahagian_vi'])->name('penapis.add.bahagian.vi');
        Route::post('penapis/edit-bahagian-vi/{Id}', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_edit_bahagian_vi'])->name('penapis.edit.bahagian.vi');

        Route::get('penapis/papar-penyata', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_paparpenyata'])->name('penapis.paparpenyata');

        Route::get('penapis/email', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_email'])->name('penapis.email');


        Route::get('penapis/penyata-dahulu', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_penyatadahulu'])->name('penapis.penyatadahulu');
        Route::post('penapis/penyata-dahulu/process', [App\Http\Controllers\Users\KilangPenapisController::class, 'penapis_penyata_dahulu_process'])->name('penapis.penyata.dahulu.process');

        Route::get('penapis/try', [App\Http\Controllers\Users\KilangPenapisController::class, 'try'])->name('try');

    });

    Route::group(['middleware' => ['kilang-isirung']], function () {
        //Pelesen - Kilang Isirung
        Route::get('isirung/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'isirung_dashboard'])->name('isirung.dashboard');
        Route::get('isirung/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_maklumatasaspelesen'])->name('isirung.maklumatasaspelesen');
        Route::post('isirung/update-maklumat-asas-pelesen/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_update_maklumat_asas_pelesen'])->name('isirung.update.maklumat.asas.pelesen');

        Route::get('isirung/tukar-password', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_tukarpassword'])->name('isirung.tukarpassword');
        Route::get('isirung/bahagian-i', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagiani'])->name('isirung.bahagiani');
        Route::post('isirung/update-bahagian-i/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_update_bahagian_i'])->name('isirung.update.bahagian.i');

        Route::get('isirung/bahagian-ii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianii'])->name('isirung.bahagianii');
        Route::post('isirung/update-bahagian-ii/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_update_bahagian_ii'])->name('isirung.update.bahagian.ii');

        Route::get('isirung/bahagian-iii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianiii'])->name('isirung.bahagianiii');
        Route::post('isirung/add-bahagian-iii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_add_bahagian_iii'])->name('isirung.add.bahagian.iii');
        Route::post('isirung/edit-bahagian-iii/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_edit_bahagian_iii'])->name('isirung.edit.bahagian.iii');

        Route::get('isirung/bahagian-iv', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianiv'])->name('isirung.bahagianiv');
        Route::post('isirung/add-bahagian-iv', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_add_bahagian_iv'])->name('isirung.add.bahagian.iv');
        Route::post('isirung/edit-bahagian-iv/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_edit_bahagian_iv'])->name('isirung.edit.bahagian.iv');

        Route::get('isirung/bahagian-v', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianv'])->name('isirung.bahagianv');
        Route::post('isirung/add-bahagian-v', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_add_bahagian_v'])->name('isirung.add.bahagian.v');
        Route::post('isirung/edit-bahagian-v/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_edit_bahagian_v'])->name('isirung.edit.bahagian.v');

        Route::get('isirung/bahagian-vi', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianvi'])->name('isirung.bahagianvi');
        Route::post('isirung/add-bahagian-vi', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_add_bahagian_vi'])->name('isirung.add.bahagian.vi');
        Route::post('isirung/edit-bahagian-vi/{Id}', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_edit_bahagian_vi'])->name('isirung.edit.bahagian.vi');

        // Route::get('isirung/bahagian-vii', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_bahagianvii'])->name('isirung.bahagianvii');
        Route::get('isirung/papar-penyata', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_paparpenyata'])->name('isirung.paparpenyata');
        Route::get('isirung/email', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_email'])->name('isirung.email');

        Route::get('isirung/penyata-dahulu', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_penyatadahulu'])->name('isirung.penyatadahulu');
        Route::post('isirung/penyata-dahulu/process', [App\Http\Controllers\Users\KilangIsirung\KilangIsirungController::class, 'isirung_penyata_dahulu_process'])->name('isirung.penyata.dahulu.process');

    });

    Route::group(['middleware' => ['kilang-oleokimia']], function () {
        //Pelesen - Kilang Oleokimia
        Route::get('oleokimia/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'oleo_dashboard'])->name('oleo.dashboard');
        Route::get('oleokimia/maklumat-asas-pelesen', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_maklumatasaspelesen'])->name('oleo.maklumatasaspelesen');
        Route::get('oleokimia/tukar-password', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_tukarpassword'])->name('oleo.tukarpassword');
        Route::get('oleokimia/bahagian-ia', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagiania'])->name('oleo.bahagiania');
        Route::get('oleokimia/bahagian-ib', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianib'])->name('oleo.bahagianib');
        Route::get('oleokimia/bahagian-ic', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianic'])->name('oleo.bahagianic');
        Route::get('oleokimia/bahagian-ii', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianii'])->name('oleo.bahagianii');
        Route::get('oleokimia/bahagian-iii', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianiii'])->name('oleo.bahagianiii');
        Route::get('oleokimia/bahagian-iv', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_bahagianiv'])->name('oleo.bahagianiv');
        Route::get('oleokimia/papar-penyata', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_paparpenyata'])->name('oleo.paparpenyata');
        Route::get('oleokimia/email', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_email'])->name('oleo.email');
        Route::get('oleokimia/prestasi-oer', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_prestasioer'])->name('oleo.prestasioer');
        Route::get('oleokimia/penyata-dahulu', [App\Http\Controllers\Users\KilangOleokimia\KilangOleokimiaController::class, 'oleo_penyatadahulu'])->name('oleo.penyatadahulu');
    });

    Route::group(['middleware' => ['pusat-simpanan']], function () {
        //Pelesen - Pusat Simpanan
        Route::get('pusatsimpan/dashboard', [App\Http\Controllers\Users\DashboardUserController::class, 'pusatsimpan_dashboard'])->name('pusatsimpan.dashboard');

        Route::get('pusatsimpan/maklumat-asas-pelesen', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_maklumatasaspelesen'])->name('pusatsimpan.maklumatasaspelesen');
        Route::post('pusatsimpan/update-maklumat-asas-pelesen/{Id}', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_update_maklumat_asas_pelesen'])->name('pusatsimpan.update.maklumat.asas.pelesen');

        Route::get('pusatsimpan/tukar-password', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_tukarpassword'])->name('pusatsimpan.tukarpassword');

        Route::get('pusatsimpan/bahagian-a', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_bahagiana'])->name('pusatsimpan.bahagiana');
        Route::post('pusatsimpan/add-bahagian-a', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_add_bahagian_a'])->name('pusatsimpan.add.bahagian.a');
        Route::post('pusatsimpan/edit-bahagian-a/{Id}', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_edit_bahagian_a'])->name('pusatsimpan.edit.bahagian.a');

        Route::get('pusatsimpan/bahagian-b', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_bahagianb'])->name('pusatsimpan.bahagianb');
        Route::get('pusatsimpan/papar-penyata', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_paparpenyata'])->name('pusatsimpan.paparpenyata');
        Route::get('pusatsimpan/email', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_email'])->name('pusatsimpan.email');
        Route::get('pusatsimpan/prestasi-oer', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_prestasioer'])->name('pusatsimpan.prestasioer');
        Route::get('pusatsimpan/penyata-dahulu', [App\Http\Controllers\Users\PusatSimpanan\PusatSimpananController::class, 'pusatsimpan_penyatadahulu'])->name('pusatsimpan.penyatadahulu');
    });
});


Route::get('/try', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'try'])->name('try');
Route::get('/try2', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'try2'])->name('try2');

Route::get('hashpassword', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'hashPassword'])->name('hashPassword');

Route::get('/data/graph/default', [App\Http\Controllers\Admin\KilangController::class, 'graph_dashboard_default'])->name('ipjpsm.graph_dashboard.default');

//Data Migration
Route::get('/migrate/data', [App\Http\Controllers\DataMigrationController::class, 'transfer_pelesen_to_users'])->name('transfer_pelesen_to_users');
Route::get('/migrate/data/admin', [App\Http\Controllers\DataMigrationController::class, 'transfer_admin_to_users'])->name('transfer_admin_to_users');


Route::get('/trylogin', [App\Http\Controllers\Users\KilangBuah\KilangBuahController::class, 'trylogin'])->name('trylogin');
