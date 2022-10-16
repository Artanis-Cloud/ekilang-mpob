<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\E07Btranshipment;
use App\Models\E07Init;
use App\Models\E101B;
use App\Models\E101C;
use App\Models\E101D;
use App\Models\E101E;
use App\Models\E101Init;
use App\Models\E102b;
use App\Models\E102c;
use App\Models\E102Init;
use App\Models\E104B;
use App\Models\E104C;
use App\Models\E104D;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\EBioB;
use App\Models\EBioC;
use App\Models\EBioInit;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Hari;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\Produk;
use App\Models\RegPelesen;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class Proses5Controller extends Controller
{
    public function admin_5penyatabelumhantarbuah()
    {

        if (auth()->user()->sub_cat) {
            foreach (json_decode(auth()->user()->sub_cat) as $cat) {
                // if ($cat == 'PL91'){
                //     return redirect()->route('admin.senaraipelesenbuah');
                // } else
                if ($cat == 'PL101') {
                    return redirect()->route('admin.5penyatabelumhantarpenapis');
                } elseif ($cat == 'PL102') {
                    return redirect()->route('admin.5penyatabelumhantarisirung');
                } elseif ($cat == 'PL104') {
                    return redirect()->route('admin.5penyatabelumhantaroleo');
                } elseif ($cat == 'PL111') {
                    return redirect()->route('admin.5penyatabelumhantarsimpanan');
                } elseif ($cat == 'PLBIO') {
                    return redirect()->route('admin.5penyatabelumhantarbio');
                } else {

                    $users = DB::select("SELECT p.e_nl, p.e_np, p.e_email,  r.kodpgw, r.nosiri, e.e91_flg, e.e91_reg
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
                    // $layout = 'layouts.admin';



                    return view('admin.proses5.5penyata-belum-hantar-buah', compact('returnArr', 'users'));
                }
            }
        } else {
            $users = DB::select("SELECT p.e_nl, p.e_np, p.e_email,  r.kodpgw, r.nosiri, e.e91_flg, e.e91_reg
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
            // $layout = 'layouts.admin';



            return view('admin.proses5.5penyata-belum-hantar-buah', compact('returnArr',  'users'));
        }
    }

    public function process_admin_5penyatabelumbuah_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5papar-belum-buah-multi'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Buah"],
        ];

        $kembali = route('admin.5penyatabelumhantarbuah');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        // foreach ($request->papar_ya as $key => $e91_reg) {
        //     $pelesens[$key] = (object)[];
        //     $penyata = E91Init::find($e91_reg);
        //     $pelesens[$key] = Pelesen::where('e_nl', $penyata-> e91_nl)->first();
        // }
        $layout = 'layouts.main';

        // dd($pelesens);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses5.5papar-belum-buah-multi', compact('returnArr', 'layout', 'tahun', 'bulan'));
    }


    public function admin_5penyatabelumhantarpenapis()
    {
        $users = DB::select("SELECT e.e101_nl, p.e_nl, p.e_np, p.e_email,  r.nosiri, r.kodpgw, p.e_notel, e.e101_flg, e.e101_reg
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
        $layout = 'layouts.main';



        return view('admin.proses5.5penyata-belum-hantar-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function process_admin_5penyatabelumpenapis_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5papar-belum-penapis-multi'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Penapis"],
        ];

        $kembali = route('admin.5penyatabelumhantarpenapis');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e101_reg) {
            $pelesens[$key] = (object)[];
            $penyata = E101Init::find($e101_reg);
            $pelesens[$key] = Pelesen::where('e_nl', $penyata->e101_nl)->first();

            $penyatai = E101B::with('e101init', 'produk')->where('e101_reg', $penyata->e101_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->get();

            $totalib5 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b5');

            //  dd($totalib5);

            $totalib6 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b6');

            //  dd($totalib5);
            $totalib7 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b7');
            //  dd($totalib5);
            $totalib8 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b8');
            //  dd($totalib5);
            $totalib9 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b9');
            //  dd($totalib5);
            $totalib10 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b10');
            //  dd($totalib5);
            $totalib11 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b11');
            //  dd($totalib5);
            $totalib12 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b12');
            //  dd($totalib5);
            $totalib13 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b13');
            //  dd($totalib5);
            $totalib14 = DB::table("e101_b")
                ->where('e101_reg', $penyata->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b14');

            $penyataii = E101B::with('e101init', 'produk')->where('e101_reg', $penyata->e101_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->get();
            // dd($penyataii);

            $totaliib5 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b5');
            //  dd($totaliib5);
            $totaliib6 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b6');
            //  dd($totaliib5);
            $totaliib7 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b7');
            //  dd($totaliib5);
            $totaliib8 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b8');
            //  dd($totaliib5);
            $totaliib9 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b9');
            //  dd($totaliib5);
            $totaliib10 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b10');
            //  dd($totaliib5);
            $totaliib11 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b11');
            //  dd($totaliib5);
            $totaliib12 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b12');
            //  dd($totaliib5);
            $totaliib13 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b13');
            //  dd($totaliib5);
            $totaliib14 = DB::table("e101_b")->where('e101_reg', $penyata->e101_reg)->where('e101_b3', '2')->sum('e101_b14');
            //  dd($totaliib5);

            $penyataiii = E101Init::where('e101_reg', $penyata->e101_reg)->first();
            // dd($penyataiii);

            $penyataiva = E101C::with('e101init', 'produk')->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '1')->get();
            // dd($penyataiva);

            $totalivac5 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '1')->sum('e101_c5');
            //   dd($totalivac5);
            $totalivac6 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '1')->sum('e101_c6');
            //   dd($totalivac5);
            $totalivac7 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '1')->sum('e101_c7');
            //   dd($totalivac5);
            $totalivac8 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '1')->sum('e101_c8');
            //   dd($totalivac5);
            $totalivac9 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '1')->sum('e101_c9');
            //   dd($totalivac5);
            $totalivac10 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '1')->sum('e101_c10');
            //   dd($totalivac5);

            $penyataivb = E101C::with('e101init', 'produk')->where('e101_reg', $penyata->e101_reg)->where('e101_c3', 2)->get();
            // dd($penyataivb);

            $totalivbc5 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '2')->sum('e101_c5');
            //   dd($totalivac5);
            $totalivbc6 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '2')->sum('e101_c6');
            //   dd($totalivac5);
            $totalivbc7 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '2')->sum('e101_c7');
            //   dd($totalivac5);
            $totalivbc8 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '2')->sum('e101_c8');
            //   dd($totalivac5);
            $totalivbc9 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '2')->sum('e101_c9');
            //   dd($totalivac5);
            $totalivbc10 = DB::table("e101_c")->where('e101_reg', $penyata->e101_reg)->where('e101_c3', '2')->sum('e101_c10');
            //   dd($totalivac5);

            $penyatava = E101D::with('e101init', 'prodcat')->where('e101_reg', $penyata->e101_reg)->where('e101_d3', 1)->get();
            // dd($penyatava);
            $totalvad5 = DB::table("e101_d")->where('e101_reg', $penyata->e101_reg)->where('e101_d3', '1')->sum('e101_d5');
            $totalvad6 = DB::table("e101_d")->where('e101_reg', $penyata->e101_reg)->where('e101_d3', '1')->sum('e101_d6');
            $totalvad7 = DB::table("e101_d")->where('e101_reg', $penyata->e101_reg)->where('e101_d3', '1')->sum('e101_d7');
            $totalvad8 = DB::table("e101_d")->where('e101_reg', $penyata->e101_reg)->where('e101_d3', '1')->sum('e101_d8');


            $penyatavb = E101D::with('e101init', 'prodcat')->where('e101_reg', $penyata->e101_reg)->where('e101_d3', 2)->get();
            // dd($penyatavb);
            $totalvbd5 = DB::table("e101_d")->where('e101_reg', $penyata->e101_reg)->where('e101_d3', '2')->sum('e101_d5');
            $totalvbd6 = DB::table("e101_d")->where('e101_reg', $penyata->e101_reg)->where('e101_d3', '2')->sum('e101_d6');
            $totalvbd7 = DB::table("e101_d")->where('e101_reg', $penyata->e101_reg)->where('e101_d3', '2')->sum('e101_d7');
            $totalvbd8 = DB::table("e101_d")->where('e101_reg', $penyata->e101_reg)->where('e101_d3', '2')->sum('e101_d8');

            $penyatavii = E101E::with('e101init', 'produk')->where('e101_reg', $penyata->e101_reg)->where('e101_e3', 1)->get();
        }



        $layout = 'layouts.main';

        // dd($pelesens);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses5.5papar-belum-penapis-multi', compact(
            'returnArr',
            'layout',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'penyatai',
            'penyataii',
            'penyataiii',
            'penyataiva',
            'penyataivb',
            'penyatava',
            'penyatavb',
            'penyatavii',
            'totalib5',
            'totaliib5',
            'totalivac5',
            'totalivbc5',
            'totalvad5',
            'totalvbd5',
            'totalib6',
            'totaliib6',
            'totalivac6',
            'totalivbc6',
            'totalvad6',
            'totalvbd6',
            'totalib7',
            'totaliib7',
            'totalivac7',
            'totalivbc7',
            'totalvad7',
            'totalvbd7',
            'totalib8',
            'totaliib8',
            'totalivac8',
            'totalivbc8',
            'totalvad8',
            'totalvbd8',
            'totalib9',
            'totaliib9',
            'totalivac9',
            'totalivbc9',
            'totalib10',
            'totaliib10',
            'totalivac10',
            'totalivbc10',
            'totalib11',
            'totaliib11',
            'totalib12',
            'totaliib12',
            'totalib13',
            'totaliib13',
            'totalib14',
            'totaliib14',
        ));

        $layout = 'layouts.main';
    }




    public function admin_5penyatabelumhantarisirung()
    {

        $users = DB::select("SELECT e.e102_nl, p.e_nl, p.e_np, p.e_email, p.e_notel,  e.e102_flg,  r.nosiri, r.kodpgw, e.e102_reg
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

    public function process_admin_5penyatabelumisirung_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5papar-belum-isirung-multi'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Isirung"],
        ];

        $kembali = route('admin.5penyatabelumhantarisirung');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e102_reg) {
            $pelesens[$key] = (object)[];
            $penyata = E102Init::find($e102_reg);
            $pelesens[$key] = Pelesen::where('e_nl', $penyata->e102_nl)->first();

            $penyatai = E102Init::where('e102_nl', $penyata->e102_nl)->first();

            $penyataii = E102Init::where('e102_nl', $penyata->e102_nl)->first();

            $penyataiii = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '51')->get();
            // dd($penyataiii);
            $totaliii = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '51')->sum('e102_b6');
            // dd($totaliii);

            $penyataiv = E102b::with('e102init')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '04')->get();

            $totaliv = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '04')->sum('e102_b6');

            $penyatav = E102b::with('e102init')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '33')->get();

            $totalv = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '33')->sum('e102_b6');

            $penyatavi = E102c::with('e102init', 'produk', 'negara')->where('e102_c2', $penyataii->e102_reg)->where('e102_c3', '1')->get();
        }

        $layout = 'layouts.main';

        // dd($pelesens);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses5.5papar-belum-isirung-multi', compact(
            'returnArr',
            'layout',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'penyatai',
            'penyataii',
            'penyataiii',
            'totaliii',
            'penyataiv',
            'totaliv',
            'penyatav',
            'totalv',
            'penyatavi'
        ));
    }



    public function admin_5penyatabelumhantaroleo()
    {

        $users = DB::select("SELECT e.e104_nl, p.e_nl, p.e_np, p.e_email, p.e_notel,  e.e104_flg,  r.nosiri, r.kodpgw, e.e104_reg
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
        $layout = 'layouts.main';



        return view('admin.proses5.5penyata-belum-hantar-oleo', compact('returnArr', 'layout', 'users'));
    }

    public function process_admin_5penyatabelumoleo_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5papar-belum-oleo-multi'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Oleokimia"],
        ];

        $kembali = route('admin.5penyatabelumhantaroleo');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e104_reg) {
            $pelesens[$key] = (object)[];
            $penyata = E104Init::find($e104_reg);
            $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();

            $penyataia = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->get();

            $total = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b5');

            $total2 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b6');

            $total3 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b7');

            $total4 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b8');

            $total5 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b9');

            $total6 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b10');

            $total7 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b11');

            $total8 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b12');

            $total9 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '1')->sum('e104_b13');

            // dd($penyatai);

            $penyataib = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->get();

            $totalib = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b5');

            $totalib2 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b6');

            $totalib3 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b7');

            $totalib4 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b8');

            $totalib5 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b9');

            $totalib6 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b10');

            $totalib7 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b11');

            $totalib8 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b12');

            $totalib9 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '2')->sum('e104_b13');

            // dd($penyataii);


            $penyataic = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '08');
            })->get();

            $totalic = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b5');

            $totalic2 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b6');

            $totalic3 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b7');

            $totalic4 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b8');

            $totalic5 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b9');

            $totalic6 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b10');

            $totalic7 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b11');

            $totalic8 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b12');

            $totalic9 = DB::table("e104_b")->where('e104_reg',  $penyata->e104_reg)->where('e104_b3', '3')->sum('e104_b13');

            // dd($penyataiii);


            $penyataii = E104Init::where('e104_nl',  $penyata->e104_nl)->first();
            // dd($penyataiva);


            $penyataiii = E104C::with('e104init', 'produk')->where('e104_reg',  $penyata->e104_reg)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat',  ['03', '06', '08']);
            })->get();

            $totaliii = DB::table("e104_c")->where('e104_reg',  $penyata->e104_reg)->sum('e104_c4');

            $totaliii2 = DB::table("e104_c")->where('e104_reg',  $penyata->e104_reg)->sum('e104_c5');

            $totaliii3 = DB::table("e104_c")->where('e104_reg',  $penyata->e104_reg)->sum('e104_c6');

            $totaliii4 = DB::table("e104_c")->where('e104_reg',  $penyata->e104_reg)->sum('e104_c7');

            $totaliii5 = DB::table("e104_c")->where('e104_reg',  $penyata->e104_reg)->sum('e104_c8');
            // dd($penyataiii);


            $penyataiv = E104D::with('e104init', 'produk', 'negara')->where('e104_reg',  $penyata->e104_reg)->where('e104_d3', 1)->get();

            $totaliv = DB::table("e104_d")->where('e104_reg',  $penyata->e104_reg)->where('e104_d3', '1')->sum('e104_d7');

            $totaliv2 = DB::table("e104_d")->where('e104_reg',  $penyata->e104_reg)->where('e104_d3', '1')->sum('e104_d8');
        }



        $layout = 'layouts.main';


        // dd($pelesens);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses5.5papar-belum-oleo-multi', compact(
            'returnArr',
            'layout',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'penyataia',
            'penyataib',
            'penyataic',
            'penyataii',
            'penyataiii',
            'penyataiv',
            'total',
            'total2',
            'total3',
            'total4',
            'total5',
            'total6',
            'total7',
            'total8',
            'total9',
            'totalib',
            'totalib2',
            'totalib3',
            'totalib4',
            'totalib5',
            'totalib6',
            'totalib7',
            'totalib8',
            'totalib9',
            'totalic',
            'totalic2',
            'totalic3',
            'totalic4',
            'totalic5',
            'totalic6',
            'totalic7',
            'totalic8',
            'totalic9',
            'totaliii',
            'totaliii2',
            'totaliii3',
            'totaliii4',
            'totaliii5',
        ));
    }




    public function admin_5penyatabelumhantarsimpanan()
    {

        $users = DB::select("SELECT e.e07_nl, p.e_nl, p.e_np, p.e_email, p.e_notel,  e.e07_flg,  r.nosiri, r.kodpgw, e.e07_reg
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

    public function process_admin_5penyatabelumsimpanan_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5papar-belum-simpanan-multi'), 'name' => "Papar & Cetak Penyata Bulanan Pusat Simpanan"],
        ];

        $kembali = route('admin.5penyatabelumhantarsimpanan');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e07_reg) {
            $pelesens[$key] = (object)[];
            $penyata = E07Init::find($e07_reg);
            $pelesens[$key] = Pelesen::where('e_nl', $penyata->e07_nl)->first();

            $penyatai = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $penyata->e07_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '!=', '07');
            })->get();
            // dd($penyata);
            $total = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata->e07_reg)->sum('e07bt_stokawal');
            $total2 = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata->e07_reg)->sum('e07bt_terima');
            $total3 = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata->e07_reg)->sum('e07bt_edaran');
            $total4 = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata->e07_reg)->sum('e07bt_pelarasan');
            $total5 = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata->e07_reg)->sum('e07bt_stokakhir');
        }

        $layout = 'layouts.main';

        // dd($pelesens);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses5.5papar-belum-simpanan-multi', compact(
            'returnArr',
            'layout',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'penyatai',
            'total',
            'total2',
            'total3',
            'total4',
            'total5'
        ));
    }




    public function admin_5penyatabelumhantarbio()
    {

        $users = DB::select("SELECT e.ebio_nl, p.e_nl, p.e_np, p.e_email, p.e_notel,  e.ebio_flg,  r.nosiri, r.kodpgw, e.ebio_reg
        FROM pelesen p, e_bio_inits e, reg_pelesen r
        WHERE   p.e_nl = e.ebio_nl
        and p.e_nl = r.e_nl
        and r.e_kat = 'PLBIO'
        and e.ebio_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarbio'), 'name' => "Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.main';



        return view('admin.proses5.5penyata-belum-hantar-bio', compact('returnArr', 'layout', 'users'));
    }

    public function admin_5penyatakemaskinibio()
    {


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatakemaskinibio'), 'name' => "Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.main';

        return view('admin.proses5.5penyata-kemaskini-bio', compact('returnArr', 'layout'));
    }

    protected function validation_terdahulu(array $data)
    {
        return Validator::make($data, [
            'tahun' => ['required', 'string'],
            'bulan' => ['required', 'string'],
        ]);
    }
    public function admin_5penyatakemaskini_process(Request $request)
    {

        $this->validation_terdahulu($request->all())->validate();

        $tahun1 = $request->tahun;
        $bulan1 = $request->bulan;

//    dd($bulan1);

                $users = DB::select("SELECT e.ebio_nl, e.ebio_flagcetak, p.e_nl, p.e_np, e.ebio_flg, p.e_email, e.ebio_reg, p.e_notel,
                k.kodpgw, k.nosiri, date_format(ebio_sdate,'%d-%m-%Y') as sdate
                FROM pelesen p, e_bio_inits e, reg_pelesen k
                WHERE p.e_nl = e.ebio_nl
                and e.ebio_flg in ('2','3')
                and p.e_nl = k.e_nl
                and k.e_kat = 'PLBIO'
                and e.ebio_thn = $tahun1
                and e.ebio_bln = $bulan1
                order by k.kodpgw, k.nosiri");

                if (!$users) {
                    return redirect()->back()
                    ->with('error', 'Penyata Tidak Wujud!');
                }

        // dd($users);

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

        // return view('admin.proses9.9paparsenarai', compact('returnArr', 'layout', 'sektor', 'users', 'tahuns', 'bulans'));
        return view('admin.proses5.5senarai-penyata-bio', compact('returnArr', 'users', 'tahun1', 'bulan1'));
    }


    public function admin_kemaskini_maklumat($ebio_reg, EBioInit $penyata)
    {

        // $reg_pelesen = RegPelesen::where('e_nl', );

        // $pelesen = EBioInit::where('ebio_reg', $ebio_reg)->first();
            //  dd($pelesen);
        $kembali = route('admin.dashboard');

        $bulan = date("m") - 1;
        $tahun = date("Y");
        $produk = Produk::whereIn('prodcat', ['01' ])->orderBy('prodname')->get();


            $penyata = EBioInit::with('pelesen')->where('ebio_reg', $ebio_reg)->first();
            //  dd($penyata);


            $penyataia = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->get();

            $penyataib = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->get();

            $penyataic = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', ['03', '06', '08']);
            })->get();

            $penyataii = Hari::where('lesen',  $penyata->ebio_nl)->first();
            // dd($penyataiva);

            $penyataiii = EBioC::with('ebioinit', 'produk')->where('ebio_reg',  $penyata->ebio_reg)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat',   ['03', '06', '08', '12']);
            })->get();


            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata->ebio_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');


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

            $layout = 'layouts.main';

        // dd($penyataia);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses5.5kemaskini-bio-view', compact(
            'returnArr',
            'layout',
            'formatteddate',
            'tahun',
            'bulan',
            'penyata',
            'penyataia',
            'penyataib',
            'penyataic',
            'penyataii',
            'penyataiii',
            'produk',
        ));
    }


    public function admin_kemaskini_maklumat_exe(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataia_save = EBioB::findOrFail($id);
        // dd($penyataia_save);

        // foreach($penyataia as $penyataia_save ){

            $penyataia_save->ebio_b4 = $request->get('ebio_b4');
            $penyataia_save->ebio_b5 = $request->get('ebio_b5');
            $penyataia_save->ebio_b6 = $request->get('ebio_b6');
            $penyataia_save->ebio_b7 = $request->get('ebio_b7');
            $penyataia_save->ebio_b8 = $request->get('ebio_b8');
            $penyataia_save->ebio_b9 = $request->get('ebio_b9');
            $penyataia_save->ebio_b10 =$request->get('>ebio_b10');
            $penyataia_save->ebio_b11 = $request->get('ebio_b11');
        // dd($penyataia_save->ebio_b4);

            $penyataia_save->save();
        // }




        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }




    public function process_add_bahagian_ia ($ebio_reg, Request $request)
    {

    //   dd($ebio_reg);q
        $penyata = EBioB::where('ebio_reg', $ebio_reg)
            ->where('ebio_b3', '1')
            ->where('ebio_b4', $request->ebio_b4)
            // ->where('e102_b5', $request->e102_b5)
            ->first();

        // dd($request->all());
        if ($penyata) {
            return redirect()->route('admin.proses5.5kemaskini-bio-view')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            // $this->validation_bahagian_ia($request->all())->validate();

            $post=new EBioB();
            $post->ebio_reg= $ebio_reg;
            $post->ebio_reg= '1';
            $post->ebio_b3= '1';
            $post->ebio_b4=$request->get('ebio_b4');
            $post->ebio_b5=$request->get('ebio_b5');
            $post->ebio_b6=$request->get('ebio_b6');
            $post->ebio_b7=$request->get('ebio_b7');
            $post->ebio_b8=$request->get('ebio_b8');
            $post->ebio_b9=$request->get('ebio_b9');
            $post->ebio_b10=$request->get('ebio_b10');
            $post->ebio_b11=$request->get('ebio_b11');
            $post->save();
            // return EBioB::create([


            return redirect()->back()->with('success', 'Maklumat sudah ditambah');
        }

    }

    public function process_delete_bahagian_ia($id)
    {
        $penyataia_save = EBioB::findOrFail($id);

        $penyataia_save->delete();
        return redirect()->back()
            ->with('success', 'Maklumat Telah Dihapuskan');
    }



}
