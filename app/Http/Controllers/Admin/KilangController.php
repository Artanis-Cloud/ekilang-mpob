<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class KilangController extends Controller
{
    public function admin_login()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.admin-login');
    }

    public function admin_kilangbuah()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.kilang-buah');
    }

    public function admin_kilangpenapis()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.kilang-penapis');
    }
    public function admin_kilangisirung()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.kilang-isirung');
    }
    public function admin_kilangoleokimia()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.kilang-oleokimia');
    }
    public function admin_pusatsimpanan()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.pusat-simpanan');
    }
    public function admin_ebiodiesel()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.e-biodiesel');
    }

    public function admin_1daftarpelesen()
    {
        $negeri = Negeri::get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.1daftarpelesen', compact('returnArr', 'layout', 'negeri'));
    }

    public function admin_senaraipelesenbuah()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 1)->get();



        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen Buah"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-buah', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenpenapis()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL101')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen Penapis"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenisirung()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL102')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen Isirung"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenoleokimia()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL104')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen Oleokimia"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-oleokimia', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesensimpanan()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen Pusat Simpanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenbio()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen E-Biodiesel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-bio', compact('returnArr', 'layout'));
    }


    public function admin_2tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.2tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses2.2tukar-password', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyata()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatapenapis()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-penapis', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyataisirung()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-isirung', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyataoleokimia()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-oleokimia', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatasimpanan()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-simpanan', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatabiodiesel()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-biodiesel', compact('returnArr', 'layout'));
    }



    public function admin_4ekilangpleid()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Penyata Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID', compact('returnArr', 'layout'));
    }


    public function admin_4ekilangpleidpenapis()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID-penapis', compact('returnArr', 'layout'));
    }


    public function admin_4ekilangpleidisirung()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID-isirung', compact('returnArr', 'layout'));
    }


    public function admin_4ekilangpleidoleokimia()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID-oleokimia', compact('returnArr', 'layout'));
    }


    public function admin_4ekilangpleidsimpanan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID-simpanan', compact('returnArr', 'layout'));
    }




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



        return view('admin.proses5.5penyata-belum-hantar-penapis', compact('returnArr', 'layout'));
    }

    public function admin_5penyatabelumhantarisirung()
    {

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



        return view('admin.proses5.5penyata-belum-hantar-isirung', compact('returnArr', 'layout'));
    }

    public function admin_5penyatabelumhantaroleo()
    {

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



        return view('admin.proses5.5penyata-belum-hantar-oleo', compact('returnArr', 'layout'));
    }

    public function admin_5penyatabelumhantarsimpanan()
    {

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



        return view('admin.proses5.5penyata-belum-hantar-simpanan', compact('returnArr', 'layout'));
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



        return view('admin.proses6.6penyata-papar-cetak-penapis', compact('returnArr', 'layout'));
    }

    public function admin_6penyatapaparcetakisirung()
    {

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



        return view('admin.proses6.6penyata-papar-cetak-isirung', compact('returnArr', 'layout'));
    }

    public function admin_6penyatapaparcetakoleo()
    {

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



        return view('admin.proses6.6penyata-papar-cetak-oleo', compact('returnArr', 'layout'));
    }

    public function admin_6penyatapaparcetaksimpanan()
    {

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



        return view('admin.proses6.6penyata-papar-cetak-simpanan', compact('returnArr', 'layout'));
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

    public function admin_7portingmaklumat()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.7portingmaklumat'), 'name' => "Pindahan Maklumat Produk & Negara"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses7.7portingmaklumat', compact('returnArr', 'layout'));
    }
    public function admin_8portdata()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.8portdata'), 'name' => "Pindahan Penyata Bulanan ke Stat Admin/Homepage"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses8.8portdata', compact('returnArr', 'layout'));
    }

    public function admin_9penyataterdahulu()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses9.9penyataterdahulu', compact('returnArr', 'layout'));
    }

    public function admin_9penyataterdahulupenapis()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses9.9penyataterdahulupenapis', compact('returnArr', 'layout'));
    }

    public function admin_9penyataterdahuluisirung()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses9.9penyataterdahuluisirung', compact('returnArr', 'layout'));
    }

    public function admin_9penyataterdahuluoleokimia()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses9.9penyataterdahuluoleokimia', compact('returnArr', 'layout'));
    }

    public function admin_9penyataterdahulusimpanan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses9.9penyataterdahulusimpanan', compact('returnArr', 'layout'));
    }

    public function admin_9penyataterdahulubiodiesel()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses9.9penyataterdahulubiodiesel', compact('returnArr', 'layout'));
    }

    public function admin_9papar_process(Request $request)
    {
        //dd($request->all());

        $tahun = H91Init::where('tahun', $request->e91_thn);
        $bulan = H91Init::where('tahun', $request->e91_bln);
        // $ekat = RegPelesen::get('e_kat');
        // $ekat = DB::select("SELECT * FROM reg_pelesen");
        // dd($ekat);
        // $users = RegPelesen::with('pelesen')->where('e_kat','PL91')->where('e_status',1)->get();
        // foreach($ekat as $data){
        //     if($data->e_kat == 'PL91')
        //     {
        $users = DB::select("SELECT e.e91_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, date_format(e91_sdate,'%d-%m-%Y') as sdate
                    FROM pelesen p, h91_init e, reg_pelesen k
                    WHERE e.e91_thn = '$request->tahun'
                    and e.e91_bln = '$request->bulan'
                    and p.e_nl = e.e91_nl
                    and e.e91_flg = '3'
                    and p.e_nl = k.e_nl
                    and k.e_kat = 'PL91'
                    order by k.kodpgw, k.nosiri");
        // }
        // elseif($data->e_kat == 'PL101')
        // {
        //     $users = DB::select("SELECT e.e101_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, date_format(e101_sdate,'%d-%m-%Y') as sdate
        //     FROM pelesen p, h101_init e, reg_pelesen k
        //     WHERE e.e101_thn = '$request->tahun'
        //     and e.e101_bln = '$request->bulan'
        //     and p.e_nl = e.e101_nl
        //     and e.e101_flg = '3'
        //     and p.e_nl = k.e_nl
        //     and k.e_kat = 'PL101'
        //     order by k.kodpgw, k.nosiri");
        // }

        // }

        // dd($users);

        // dd($users[1]);
        // $tarikh = H91Init::get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.9penyataterdahulu.process'), 'name' => "Papar Senarai Penyata Terdahulu"],
            ['link' => route('admin.9papar.process'), 'name' => "Papar Penyata Bulanan"],
        ];

        $kembali = route('admin.9penyataterdahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses9.9papar-process', compact('returnArr', 'layout', 'tahun', 'bulan', 'users'));
    }

    public function admin_9penyataterdahulu_process(Request $request)
    {
        //dd($request->all());

        $tahun = H91Init::where('tahun', $request->e91_thn);
        $bulan = H91Init::where('tahun', $request->e91_bln);
        // $ekat = RegPelesen::get('e_kat');
        // $ekat = DB::select("SELECT * FROM reg_pelesen");
        // dd($ekat);
        // $users = RegPelesen::with('pelesen')->where('e_kat','PL91')->where('e_status',1)->get();
        // foreach($ekat as $data){
        //     if($data->e_kat == 'PL91')
        //     {
        $users = DB::select("SELECT e.e91_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, date_format(e91_sdate,'%d-%m-%Y') as sdate
                    FROM pelesen p, h91_init e, reg_pelesen k
                    WHERE e.e91_thn = '$request->tahun'
                    and e.e91_bln = '$request->bulan'
                    and p.e_nl = e.e91_nl
                    and e.e91_flg = '3'
                    and p.e_nl = k.e_nl
                    and k.e_kat = 'PL91'
                    order by k.kodpgw, k.nosiri");
        // }
        // elseif($data->e_kat == 'PL101')
        // {
        //     $users = DB::select("SELECT e.e101_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, date_format(e101_sdate,'%d-%m-%Y') as sdate
        //     FROM pelesen p, h101_init e, reg_pelesen k
        //     WHERE e.e101_thn = '$request->tahun'
        //     and e.e101_bln = '$request->bulan'
        //     and p.e_nl = e.e101_nl
        //     and e.e101_flg = '3'
        //     and p.e_nl = k.e_nl
        //     and k.e_kat = 'PL101'
        //     order by k.kodpgw, k.nosiri");
        // }

        // }

        // dd($users);

        // dd($users[1]);
        // $tarikh = H91Init::get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Senarai Penyata Terdahulu"],
        ];

        $kembali = route('admin.9penyataterdahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses9.9papar', compact('returnArr', 'layout', 'tahun', 'bulan', 'users'));
    }

    public function admin_10portdatatodq()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.10portdatatodq'), 'name' => "Pindahan Penyata Bulanan Ke Dynamic Query"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses10.10portdatatodq', compact('returnArr', 'layout'));
    }


    public function admin_11emel()
    {

        $listemel = Ekmessage::get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.11emel'), 'name' => "Senarai Emel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses11.11emel', compact('returnArr', 'layout', 'listemel'));
    }

    public function admin_11paparemel(Request $request)
    {
        $emel = DB::select("SELECT  MsgID, Date as sdate, FromName, FromLicense, FromEmail, Category, TypeOfEmail, Subject, Message
             FROM ekmessage");

        // dd($emel);

        //  $emel = Ekmessage::first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.11emel'), 'name' => "Senarai Emel"],
            ['link' => route('admin.11paparemel'), 'name' => "Papar Emel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses11.11paparemel', compact('returnArr', 'layout', 'emel'));
    }

    public function admin_12validation()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.12validation'), 'name' => "Validasi"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses12.12validation', compact('returnArr', 'layout'));
    }

    public function admin_direktori()
    {
        $negeri = Negeri::get();

        // $statelist = DB::select("SELECT kod_negeri, nama_negeri
        // FROM negeri");

        // if ($negeri == 'All') {
        //     $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
        // e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
        // e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
        // r.e_status
        // FROM pelesen e, reg_pelesen r, negeri n
        // WHERE e.e_nl = r.e_nl
        // and e.e_negeri = n.kod_negeri
        // and r.e_kat = 'pl91'
        // and (e.e_negeri is not null || e.e_negeri<>'')
        // and r.e_status = '1'
        // and r.directory='Y'
        // order by e.e_np,n.nama_negeri");
        // } else
        //     $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
        // e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
        // e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
        // r.e_status
        // FROM pelesen e, reg_pelesen r
        // WHERE e.e_nl = r.e_nl
        // and r.e_kat = 'PL91'
        // and e.e_negeri='$negeri'
        // and  r.e_status = '1'
        // and r.directory='Y'
        // order by e.e_np,e.e_negeri");


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.direktori'), 'name' => "Direktori"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.direktori', compact('returnArr', 'layout'));
    }


    public function admin_direktori_process(Request $request)
    {
        // dd($request->all());
        $negeri= Negeri::where('kod_negeri', $request->nama_negeri)->first('nama_negeri');
        // dd( $negeri);
        // $statelist = DB::select("SELECT kod_negeri, nama_negeri
        // FROM negeri");

        if ($request->nama_negeri == 'All') {
            $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

        } else

            $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r
                WHERE e.e_nl = r.e_nl
                and r.e_kat = 'PL91'
                and e.e_negeri= $request->nama_negeri
                and  r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,e.e_negeri");


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.direktori'), 'name' => "Direktori"],
            ['link' => route('admin.direktori.process'), 'name' => "Senarai Direktori"],
        ];

        $kembali = route('admin.direktori');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.direktori-papar', compact('returnArr', 'layout', 'negeri', 'query'));
    }

    public function admin_pengumuman()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pengumuman'), 'name' => "Pengumuman"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $pengumuman = DB::select("SELECT Id, Message, Start_date, End_Date, Icon_new
        FROM pengumuman
        order by Id Desc");



        return view('admin.menu-lain.pengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_jadualpenerimaanPL()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.jadualpenerimaanPL'), 'name' => "Jadual Penerimaan PL"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.jadual-penerimaanPL', compact('returnArr', 'layout'));
    }

    public function admin_senaraigagalPL()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraigagalPL'), 'name' => "Senarai Gagal Penerimaan PL"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.senaraigagalPL', compact('returnArr', 'layout'));
    }

    public function admin_panduan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.panduan'), 'name' => "Panduan Penyelenggaraan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.panduan', compact('returnArr', 'layout'));
    }

    public function admin_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.tukarpassword', compact('returnArr', 'layout'));
    }

    public function try3()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.10portdatatodq'), 'name' => "Port Data Ke Dynamic Query"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.try', compact('returnArr', 'layout'));
    }


    public function graph_dashboard_default()
    {
        // dd($request->all());

        $query_now = DB::select("SELECT date_format(e.e101_sdate,'%d-%m-%Y'), count(p.e_nl),
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE p.e_nl = e.e101_nl and p.e_nl = r.e_nl and r.e_kat = 'PL91'
        and e.e101_sdate is not null
        group by e.e101_sdate
        order by e.e101_sdate");



        // $shuttle_type = '3';
        // $query_now = DB::select("SELECT shuttles.negeri_id, COUNT(shuttles.negeri_id) as total_kilang
        // FROM form_a_s
        // INNER JOIN shuttles
        // ON form_a_s.shuttle_id = shuttles.id
        // WHERE shuttles.shuttle_type = $shuttle_type
        // AND YEAR(date(form_a_s.created_at)) = YEAR(now())
        // GROUP BY shuttles.negeri_id");

        // $query_past = DB::select("SELECT shuttles.negeri_id, COUNT(shuttles.negeri_id) as total_kilang
        // FROM form_a_s
        // INNER JOIN shuttles
        // ON form_a_s.shuttle_id = shuttles.id
        // WHERE shuttles.shuttle_type = $shuttle_type
        // AND YEAR(date(form_a_s.created_at)) = YEAR(now())-1
        // GROUP BY shuttles.negeri_id");

        $returnArr = [
            'query_now' => $query_now,
            // 'query_past' => $query_past
        ];

        return response($returnArr, 200);
    }



    public function graph_dashboard(Request $request)
    {
        // dd($request->all());

        $query_now = DB::select("SELECT date_format(e.e101_sdate,'%d-%m-%Y'), count(p.e_nl),
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE p.e_nl = e.e101_nl and p.e_nl = r.e_nl and r.e_kat = 'PL91'
        and e.e101_sdate is not null
        group by e.e101_sdate
        order by e.e101_sdate");
        // $shuttle_type = $request->shuttle_type ?? '3';
        // $query_now = DB::select("SELECT shuttles.negeri_id, COUNT(shuttles.negeri_id) as total_kilang
        // FROM form_a_s
        // INNER JOIN shuttles
        // ON form_a_s.shuttle_id = shuttles.id
        // WHERE shuttles.shuttle_type = $shuttle_type
        // AND YEAR(date(form_a_s.created_at)) = YEAR(now())
        // GROUP BY shuttles.negeri_id");

        // $query_past = DB::select("SELECT shuttles.negeri_id, COUNT(shuttles.negeri_id) as total_kilang
        // FROM form_a_s
        // INNER JOIN shuttles
        // ON form_a_s.shuttle_id = shuttles.id
        // WHERE shuttles.shuttle_type = $shuttle_type
        // AND YEAR(date(form_a_s.created_at)) = YEAR(now())-1
        // GROUP BY shuttles.negeri_id");

        $returnArr = [
            'query_now' => $query_now,
            // 'query_past' => $query_past
        ];

        return response($returnArr, 200);
    }
}
