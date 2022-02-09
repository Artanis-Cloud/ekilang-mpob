<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class Proses5Controller extends Controller
{
    public function admin_5penyatabelumhantarbuah()
    {

        $users = DB::select("SELECT p.e_nl, p.e_np, p.e_email,  r.kodpgw, r.nosiri, e.e91_flg
        FROM pelesen p, e91_init e, reg_pelesen r
        WHERE p.e_nl = e.e91_nl
        and p.e_nl = r.e_nl
        and r.e_kat = 'PL91'
        and e.e91_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarbuah'), 'name' => "Penyata Bulanan Kilang Buah"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses5.5penyata-belum-hantar-buah', compact('returnArr', 'layout', 'users'));
    }

    public function admin_5penyatabelumhantarpenapis()
    {
        $users = DB::select("SELECT e.e101_nl, p.e_nl, p.e_np, p.e_email,  r.nosiri, r.kodpgw, p.e_notel, e.e101_flg
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE   p.e_nl = e.e101_nl
        and p.e_nl = r.e_nl
        and r.e_kat = 'PL101'
        and e.e101_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarpenapis'), 'name' => "Penyata Bulanan Kilang Penapis"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses5.5penyata-belum-hantar-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_5penyatabelumhantarisirung()
    {

        $users = DB::select("SELECT e.e102_nl, p.e_nl, p.e_np, p.e_email, p.e_notel,  e.e102_flg,  r.nosiri, r.kodpgw
        FROM pelesen p, e102_init e, reg_pelesen r
        WHERE   p.e_nl = e.e102_nl
        and p.e_nl = r.e_nl
        and r.e_kat = 'PL102'
        and e.e102_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarisirung'), 'name' => "Penyata Bulanan Kilang Isirung"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses5.5penyata-belum-hantar-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_5penyatabelumhantaroleo()
    {

        $users = DB::select("SELECT e.e104_nl, p.e_nl, p.e_np, p.e_email, p.e_notel,  e.e104_flg,  r.nosiri, r.kodpgw
        FROM pelesen p, e104_init e, reg_pelesen r
        WHERE   p.e_nl = e.e104_nl
        and p.e_nl = r.e_nl
        and r.e_kat = 'PL104'
        and e.e104_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantaroleo'), 'name' => "Penyata Bulanan Kilang Oleokimia"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses5.5penyata-belum-hantar-oleo', compact('returnArr', 'layout', 'users'));
    }

    public function admin_5penyatabelumhantarsimpanan()
    {

        $users = DB::select("SELECT e.e07_nl, p.e_nl, p.e_np, p.e_email, p.e_notel,  e.e07_flg,  r.nosiri, r.kodpgw
        FROM pelesen p, e07_init e, reg_pelesen r
        WHERE   p.e_nl = e.e07_nl
        and p.e_nl = r.e_nl
        and r.e_kat = 'PL111'
        and e.e07_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarsimpanan'), 'name' => "Penyata Bulanan Pusat Simpanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses5.5penyata-belum-hantar-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_5penyatabelumhantarbio()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarbio'), 'name' => "Penyata Bulanan Kilang E-Biodiesel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses5.5penyata-belum-hantar-bio', compact('returnArr', 'layout'));
    }

}
