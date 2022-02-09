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

class Proses6Controller extends Controller
{
    public function admin_6penyatapaparcetakbuah()
    {

        $users = DB::select("SELECT e.e91_flagcetak, p.e_nl, p.e_np, e.e91_flg, p.e_email,
        k.kodpgw, k.nosiri, date_format(e91_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e91_init e, reg_pelesen k
        WHERE p.e_nl = e.e91_nl
        and e.e91_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL91'
        order by k.kodpgw, k.nosiri");


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Buah"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-buah', compact('returnArr', 'layout', 'users'));
    }

    public function admin_6penyatapaparcetakpenapis()
    {

        $users = DB::select("SELECT e.e101_nl, e.e101_flagcetak, p.e_nl, p.e_np,e.e101_flg, p.e_email,
        k.kodpgw, k.nosiri, date_format(e101_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e101_init e, reg_pelesen k
        WHERE p.e_nl = e.e101_nl
        and e.e101_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL101'
        order by k.kodpgw, k.nosiri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakpenapis'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Penapis"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_6penyatapaparcetakisirung()
    {

        $users = DB::select("SELECT e.e102_nl, e.e102_flagcetak, p.e_nl, p.e_np, e.e102_flg, p.e_email,
        k.kodpgw, k.nosiri, date_format(e102_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e102_init e, reg_pelesen k
        WHERE p.e_nl = e.e102_nl
        and e.e102_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL102'
        order by k.kodpgw, k.nosiri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakisirung'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Isirung"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_6penyatapaparcetakoleo()
    {

        $users = DB::select("SELECT e.e104_nl, e.e104_flagcetak, p.e_nl, p.e_np, e.e104_flg, p.e_email,
        k.kodpgw, k.nosiri, date_format(e104_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e104_init e, reg_pelesen k
        WHERE p.e_nl = e.e104_nl
        and e.e104_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL104'
        order by k.kodpgw, k.nosiri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakoleo'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Oleokimia"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-oleo', compact('returnArr', 'layout', 'users'));
    }

    public function admin_6penyatapaparcetaksimpanan()
    {

        $users = DB::select("SELECT e.e07_nl, e.e07_flagcetak, p.e_nl, p.e_np, e.e07_flg, p.e_email,
        k.kodpgw, k.nosiri, date_format(e07_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e07_init e, reg_pelesen k
        WHERE p.e_nl = e.e07_nl
        and e.e07_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL111'
        order by k.kodpgw, k.nosiri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetaksimpanan'), 'name' => "Papar & Cetak Penyata Bulanan Pusat Simpanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_6penyatapaparcetakbio()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Papar & Cetak Penyata Bulanan E-Biodiesel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-bio', compact('returnArr', 'layout'));
    }

    public function admin_6papar_process()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Papar & Cetak Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6papar', compact('returnArr', 'layout'));
    }

}
