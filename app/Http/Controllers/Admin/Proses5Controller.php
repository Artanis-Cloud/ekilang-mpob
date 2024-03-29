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
use App\Models\EBioCC;
use App\Models\EBioInit;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Hari;
use App\Models\HBioB;
use App\Models\HBioC;
use App\Models\HBioCC;
use App\Models\HBioInit;
use App\Models\HHari;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\Penyata;
use App\Models\Produk;
use App\Models\RegPelesen;
use App\Models\SyarikatPembeli;
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

                    $users = DB::select("SELECT p.e_nl, p.e_np, p.e_email,  r.kodpgw, r.nosiri, e.e91_flg, e.e91_reg, p.e_notel
                        FROM pelesen p, e91_init e, reg_pelesen r
                        WHERE p.e_nl = e.e91_nl
                        and p.e_nl = r.e_nl
                        and r.e_kat = 'PL91'
                        and p.e_kat = 'PL91'
                        and e.e91_flg = '1'
                        order by p.e_nl");

                    $breadcrumbs    = [
                        ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                        ['link' => route('admin.5penyatabelumhantarbuah'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            $users = DB::select("SELECT p.e_nl, p.e_np, p.e_email,  r.kodpgw, r.nosiri, e.e91_flg, e.e91_reg, p.e_notel
            FROM pelesen p, e91_init e, reg_pelesen r
            WHERE p.e_nl = e.e91_nl
            and p.e_nl = r.e_nl
            and r.e_kat = 'PL91'
            and p.e_kat = 'PL91'
            and e.e91_flg = '1'
            order by p.e_nl");

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.5penyatabelumhantarbuah'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            ['link' => route('admin.5papar-belum-buah-multi'), 'name' => "Penyata Bulanan Belum Hantar "],
        ];

        $kembali = route('admin.5penyatabelumhantarbuah');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e91_reg) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = E91Init::with('pelesen', 'regpelesen')->find($e91_reg);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e91_nl)->first();

            // dd($penyata);

            // $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e91_sdate);
            // $formatteddate = $myDateTime->format('d-m-Y');

            $query = E91Init::findOrFail($e91_reg);
            $query->e91_flagcetak = 'Y';
            $query->save();

        }
        $layout = 'layouts.main';

        // dd($penyata);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses5.5papar-belum-buah-multi', compact('returnArr', 'layout', 'tahun', 'bulan', 'penyata', 'pelesens'));
    }


    public function admin_5penyatabelumhantarpenapis()
    {
        $users = DB::select("SELECT e.e101_nl, p.e_nl, p.e_np, p.e_email,  r.nosiri, r.kodpgw, p.e_notel, e.e101_flg, e.e101_reg
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE   p.e_nl = e.e101_nl
        and p.e_nl = r.e_nl
        and r.e_kat = 'PL101'
        and p.e_kat = 'PL101'
        and e.e101_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarpenapis'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            ['link' => route('admin.5papar-belum-penapis-multi'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            $penyata[$key] = E101Init::with('pelesen','regpelesen')->find($e101_reg);
            $pelesens[$key] = Pelesen::where('e_nl', $penyata[$key]->e101_nl)->first();

            $penyatai[$key] = E101B::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->get();

            $totalib5 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b5');

            //  dd($totalib5);

            $totalib6 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b6');

            //  dd($totalib5);
            $totalib7 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b7');
            //  dd($totalib5);
            $totalib8 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b8');
            //  dd($totalib5);
            $totalib9 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b9');
            //  dd($totalib5);
            $totalib10 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b10');
            //  dd($totalib5);
            $totalib11 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b11');
            //  dd($totalib5);
            $totalib12 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b12');
            //  dd($totalib5);
            $totalib13 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b13');
            //  dd($totalib5);
            $totalib14 = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b14');

            $penyataii[$key] = E101B::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->get();
            // dd($penyataii);

            $totaliib5 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b5');
            //  dd($totaliib5);
            $totaliib6 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b6');
            //  dd($totaliib5);
            $totaliib7 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b7');
            //  dd($totaliib5);
            $totaliib8 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b8');
            //  dd($totaliib5);
            $totaliib9 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b9');
            //  dd($totaliib5);
            $totaliib10 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b10');
            //  dd($totaliib5);
            $totaliib11 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b11');
            //  dd($totaliib5);
            $totaliib12 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b12');
            //  dd($totaliib5);
            $totaliib13 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b13');
            //  dd($totaliib5);
            $totaliib14 = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b14');
            //  dd($totaliib5);

            $penyataiii[$key] = E101Init::where('e101_reg', $penyata[$key]->e101_reg)->first();
            // dd($penyataiii);

            $penyataiva[$key] = E101C::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->get();
            // dd($penyataiva);

            $totalivac5 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c5');
            //   dd($totalivac5);
            $totalivac6 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c6');
            //   dd($totalivac5);
            $totalivac7 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c7');
            //   dd($totalivac5);
            $totalivac8 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c8');
            //   dd($totalivac5);
            $totalivac9 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c9');
            //   dd($totalivac5);
            $totalivac10 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c10');
            //   dd($totalivac5);

            $penyataivb[$key] = E101C::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', 2)->get();
            // dd($penyataivb);

            $totalivbc5 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c5');
            //   dd($totalivac5);
            $totalivbc6 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c6');
            //   dd($totalivac5);
            $totalivbc7 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c7');
            //   dd($totalivac5);
            $totalivbc8 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c8');
            //   dd($totalivac5);
            $totalivbc9 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c9');
            //   dd($totalivac5);
            $totalivbc10 = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c10');
            //   dd($totalivac5);

            $penyatava[$key] = E101D::with('e101init', 'prodcat')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', 1)->get();
            // dd($penyatava);
            $totalvad5 = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '1')->sum('e101_d5');
            $totalvad6 = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '1')->sum('e101_d6');
            $totalvad7 = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '1')->sum('e101_d7');
            $totalvad8 = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '1')->sum('e101_d8');


            $penyatavb[$key] = E101D::with('e101init', 'prodcat')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', 2)->get();
            // dd($penyatavb);
            $totalvbd5 = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '2')->sum('e101_d5');
            $totalvbd6 = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '2')->sum('e101_d6');
            $totalvbd7 = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '2')->sum('e101_d7');
            $totalvbd8 = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '2')->sum('e101_d8');

            $penyatavii[$key] = E101E::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_e3', 1)->get();
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
        and p.e_kat = 'PL102'
        and e.e102_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarisirung'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            ['link' => route('admin.5papar-belum-isirung-multi'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            $penyata[$key] = E102Init::with('regpelesen')->find($e102_reg);
            $pelesens[$key] = Pelesen::where('e_nl', $penyata[$key]->e102_nl)->first();

            $penyatai[$key] = E102Init::where('e102_nl', $penyata[$key]->e102_nl)->first();

            $penyataii[$key] = E102Init::where('e102_nl', $penyata[$key]->e102_nl)->first();

            $penyataiii[$key] = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $penyataii[$key]->e102_reg)->where('e102_b3', '51')->get();
            // dd($penyataiii);
            $totaliii = DB::table("e102b")->where('e102_b2', $penyataii[$key]->e102_reg)->where('e102_b3', '51')->sum('e102_b6');
            // dd($totaliii);

            $penyataiv[$key] = E102b::with('e102init')->where('e102_b2', $penyataii[$key]->e102_reg)->where('e102_b3', '04')->get();

            $totaliv = DB::table("e102b")->where('e102_b2', $penyataii[$key]->e102_reg)->where('e102_b3', '04')->sum('e102_b6');

            $penyatav[$key] = E102b::with('e102init')->where('e102_b2', $penyataii[$key]->e102_reg)->where('e102_b3', '33')->get();

            $totalv = DB::table("e102b")->where('e102_b2', $penyataii[$key]->e102_reg)->where('e102_b3', '33')->sum('e102_b6');

            $penyatavi[$key] = E102c::with('e102init', 'produk', 'negara')->where('e102_c2', $penyataii[$key]->e102_reg)->where('e102_c3', '1')->get();
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
        and p.e_kat = 'PL104'
        and e.e104_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantaroleo'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            ['link' => route('admin.5papar-belum-oleo-multi'), 'name' => "Penyata Bulanan Belum Hantar "],
        ];




        $kembali = route('admin.5penyatabelumhantaroleo');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e104_reg) {
            $pelesens[$e104_reg] = (object)[];
            $penyata[$e104_reg] = E104Init::with('regpelesen')->find($e104_reg);
            $pelesens[$e104_reg] = Pelesen::where('e_nl', $penyata[$e104_reg]->e104_nl)->first();

            $penyataia[$e104_reg] = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->get();

            $total[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b5');

            $total2[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b6');

            $total3[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b7');

            $total4[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b8');

            $total5[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b9');

            $total6[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b10');

            $total7[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b11');

            $total8[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b12');

            $total9[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '1')->sum('e104_b13');

            // dd($penyatai);

            $penyataib[$e104_reg] = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->get();

            $totalib[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b5');

            $totalib2[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b6');

            $totalib3[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b7');

            $totalib4[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b8');

            $totalib5[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b9');

            $totalib6[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b10');

            $totalib7[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b11');

            $totalib8[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b12');

            $totalib9[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '2')->sum('e104_b13');

            // dd($penyataii);


            $penyataic[$e104_reg] = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '08');
            })->get();

            $totalic[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b5');

            $totalic2[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b6');

            $totalic3[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b7');

            $totalic4[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b8');

            $totalic5[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b9');

            $totalic6[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b10');

            $totalic7[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b11');

            $totalic8[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b12');

            $totalic9[$e104_reg] = DB::table("e104_b")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_b3', '3')->sum('e104_b13');

            // dd($penyataiii);


            $penyataii[$e104_reg] = E104Init::where('e104_nl',  $penyata[$e104_reg]->e104_nl)->first();
            // dd($penyataiva);


            $penyataiii[$e104_reg] = E104C::with('e104init', 'produk')->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->get();

            $totaliii[$e104_reg] = DB::table("e104_c")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->sum('e104_c4');

            $totaliii2[$e104_reg] = DB::table("e104_c")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->sum('e104_c5');

            $totaliii3[$e104_reg] = DB::table("e104_c")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->sum('e104_c6');

            $totaliii4[$e104_reg] = DB::table("e104_c")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->sum('e104_c7');

            $totaliii5[$e104_reg] = DB::table("e104_c")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->sum('e104_c8');
            // dd($penyataiii);


            $penyataiv[$e104_reg] = E104D::with('e104init', 'produk', 'negara')->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_d3', 1)->get();

            $totaliv[$e104_reg] = DB::table("e104_d")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_d3', '1')->sum('e104_d7');

            $totaliv2[$e104_reg] = DB::table("e104_d")->where('e104_reg',  $penyata[$e104_reg]->e104_reg)->where('e104_d3', '1')->sum('e104_d8');
        }

        // dd($totaliii);



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
        and p.e_kat = 'PL111'
        and e.e07_flg = '1'
        order by p.e_nl");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarsimpanan'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            ['link' => route('admin.5papar-belum-simpanan-multi'), 'name' => "Penyata Bulanan Belum Hantar "],
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
            $penyata[$key] = E07Init::with('regpelesen')->find($e07_reg);
            $pelesens[$key] = Pelesen::where('e_nl', $penyata[$key]->e07_nl)->first();

            $penyatai[$key] = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $penyata[$key]->e07_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '!=', '07');
            })->get();
            // dd($penyata);
            $total = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_stokawal');
            $total2 = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_terima');
            $total3 = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_edaran');
            $total4 = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_pelarasan');
            $total5 = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_stokakhir');
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

        $users = DB::select("SELECT e.ebio_nl, p.e_nl, p.e_np, p.e_email, p.e_notel,  e.ebio_flg,  r.no_siri, r.kod_pegawai, e.ebio_reg
        FROM pelesen p, e_bio_inits e, users r
        WHERE   p.e_nl = e.ebio_nl
        and p.e_nl = r.username
        and r.category = 'PLBIO'
        and e.ebio_flg = '1'
        group by p.e_nl");

        // $users = EBioInit::with('pelesen')

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantarbio'), 'name' => "Penyata Bulanan Belum Hantar "],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.main';



        return view('admin.proses5.5penyata-belum-hantar-bio', compact('returnArr', 'layout','users'));
    }


    public function process_admin_5penyatabelumhantarbio(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Penyata Bulanan Belum Hantar "],
        ];

        $kembali = route('admin.5penyatabelumhantarbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $ebio_reg) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = EBioInit::with('pelesen')->find($ebio_reg);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->ebio_nl)->first();

            $penyataia[$key] = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata[$key]->ebio_reg)->where('ebio_b3', '1')->orderBy('ebio_b4')->get();

            $penyataib[$key] = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata[$key]->ebio_reg)->where('ebio_b3', '2')->orderBy('ebio_b4')->get();

            $penyataic[$key] = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata[$key]->ebio_reg)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();

            $penyataii[$key] = Hari::where('lesen',  $penyata[$key]->ebio_nl)->first();
            // dd($penyataiva);

            $penyataiii[$key] = EBioC::with('ebioinit', 'produk')->where('ebio_reg',  $penyata[$key]->ebio_reg)->orderBy('ebio_c3')->get();

            // $wherestmt = "(";
            // $wherestmt = $wherestmt . "'" . $ebio_reg . "',";
            // $query = DB::select("update e_bio_inits set ebio_flagcetak = 'Y' where ebio_nl in $ebio_reg");

            $query = EBioInit::findOrFail($ebio_reg);
            $query->ebio_flagcetak = 'Y';
            $query->save();

            // $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->ebio_sdate);
            // $formatteddate = $myDateTime->format('d-m-Y');

        }


        $layout = 'layouts.main';

        // dd($penyataia);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses5.5papar-bio-multi', compact(
            'returnArr',
            'layout',
            // 'formatteddate',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'penyataia',
            'penyataib',
            'penyataic',
            'penyataii',
            'penyataiii',
        ));
    }

    public function admin_5penyatakemaskinibio()
    {


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatakemaskinibio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');

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

        // dd($request->all());

        $tahun1 = $request->tahun;
        $bulan1 = $request->bulan;

        $day = date('d');
        $bul = date('m') - 1 ;
        if ($bul == 12 || $bul == 0){
        $month = '12' ;
        } else {
        $month = $bul ;

        }


        $flg = EBioInit::get();


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatakemaskinibio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
            ['link' => route('admin.5penyatakemaskini.process'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.5penyatakemaskinibio');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
//    dd($flg->ebio_flg);
        // if ($tahun1 == now()->year && $bulan1 == now()->month){

            // dd($day <= 31 && $month == $bulan1);

            // foreach($flg as $f){
            // if($flg){
        if ($day <= 31 && $month == $bulan1) {
            $users = DB::select("SELECT e.ebio_nl, e.ebio_flagcetak, p.e_nl, p.e_np, e.ebio_flg, p.e_email, e.ebio_reg, p.e_notel, e.ebio_thn, e.ebio_bln,
            k.kod_pegawai, k.no_siri, date_format(ebio_sdate,'%d-%m-%Y') as sdate
            FROM pelesen p, e_bio_inits e, users k
            WHERE p.e_nl = e.ebio_nl
            -- and e.ebio_flg in ('2','3')
            and p.e_nl = k.username
            and k.category = 'PLBIO'
            and p.e_kat = 'PLBIO'
            and e.ebio_thn = $tahun1
            and e.ebio_bln = $bulan1
            order by k.kod_pegawai, k.no_siri");

            if (!$users) {
                return redirect()->back()
                ->with('error', 'Penyata Tidak Wujud!');
            }else
            {

                // dd($users);
            return view('admin.proses5.5senarai-penyata-bio', compact('returnArr', 'users', 'tahun1', 'bulan1', 'flg', 'day', 'month'));

            }
        // dd($users);

        }

        else {
            $users = DB::select("SELECT e.ebio_nl, p.e_nl, p.e_np, e.ebio_flg, p.e_email, e.ebio_nobatch, p.e_notel, e.ebio_thn, e.ebio_bln,
            k.kod_pegawai, k.no_siri, date_format(ebio_sdate,'%d-%m-%Y') as sdate
            FROM pelesen p, h_bio_inits e, users k
            WHERE p.e_nl = e.ebio_nl
            -- and e.ebio_flg in ('2','3')
            and p.e_nl = k.username
            and k.category = 'PLBIO'
            and p.e_kat = 'PLBIO'
            and e.ebio_thn = $tahun1
            and e.ebio_bln = $bulan1
            order by k.kod_pegawai, k.no_siri");

            // dd($users);

            // return view('admin.proses5.5senarai-penyata-bio', compact('returnArr', 'users', 'tahun1', 'bulan1', 'flg', 'day', 'month'));

            if (!$users) {
                return redirect()->back()
                ->with('error', 'Penyata Tidak Wujud!');
            }else{

            return view('admin.proses5.5senarai-penyata-bio', compact('returnArr', 'users', 'tahun1', 'bulan1', 'flg', 'day', 'month'));

            }
        // dd($users);
        }


    }


    public function admin_kemaskini_maklumat($ebio_reg, EBioInit $penyata)
    {

        // $reg_pelesen = RegPelesen::where('e_nl', );

        // $pelesen = EBioInit::where('ebio_reg', $ebio_reg)->first();
            //  dd($pelesen);
        $kembali = route('admin.5penyatakemaskinibio');

        $bulan = date("m") - 1;
        $tahun = date("Y");
        $produk = Produk::whereIn('prodcat', ['01' ])->orderBy('prodname')->get();
        $produk_b = Produk::whereIn('prodcat', ['02' ])->orderBy('prodname')->get();
        $produk_c = Produk::whereIn('prodcat', ['03', '06', '08'])->orderBy('prodname')->get();
        $produkiii = Produk::whereIn('prodcat', ['03', '06', '08', '12'])->orderBy('prodname')->get();
        $produkiii_1 = Produk::whereIn('prodcat', ['03', '06', '08', '12'])->where('prodid', '!=', 'AW')->orderBy('prodname')->get();
        $produkiii_2 = Produk::where('prodid', 'AW')->orderBy('prodname')->get();
        $syarikat = SyarikatPembeli::get();



        $penyata = EBioInit::with('pelesen')->where('ebio_reg', $ebio_reg)->first();
            //  dd($produkiii_2);
        $senarai_syarikat = EBioCC::with('ebioinit','syarikat')->where('ebio_reg', $penyata->ebio_reg)->get();


            $penyataia = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->get();

            $penyataib = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->get();

            $penyataic = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata->ebio_reg)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat', ['03', '06', '08']);
            })->get();

            $penyataii = Hari::where('lesen',  $penyata->ebio_nl)->where('tahunbhg2', $penyata->ebio_thn)->where('bulanbhg2',$penyata->ebio_bln)->first();


            $penyataiii = EBioC::with('ebioinit', 'produk')->where('ebio_reg',  $penyata->ebio_reg)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat',   ['03', '06', '08', '12']);
            })->get();
//  dd($penyataiii);
            if ($penyata->ebio_sdate) {
                $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata->ebio_sdate);
                $formatteddate = $myDateTime->format('d-m-Y');
            // }



            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.5penyatakemaskinibio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
            ];

            $kembali = route('admin.6penyatapaparcetakbio');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];

            $layout = 'layouts.main';

        // dd($penyataia);
        // $data = DB::table('pelesen')->get();
        // if ($penyata->ebio_sdate) {
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
            'produk_b',
            'produk_c',
            'produkiii',
            'produkiii_1',
            'produkiii_2',
            'senarai_syarikat',
            'syarikat',
        ));
    }
    else {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatakemaskinibio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.5penyatakemaskinibio');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $layout = 'layouts.main';

        return view('admin.proses5.5kemaskini-bio-view', compact(
            'returnArr',
            'layout',
            'tahun',
            'bulan',
            'penyata',
            'penyataia',
            'penyataib',
            'penyataic',
            'penyataii',
            'penyataiii',
            'produk',
            'produk_b',
            'produk_c',
            'produkiii',
            'produkiii_1',
            'produkiii_2',
            'senarai_syarikat',
            'syarikat',
        ));
    }
    }

    public function admin_kemaskini_maklumat_dahulu($ebio_nobatch, Penyata $penyata)
    {

        // $reg_pelesen = RegPelesen::where('e_nl', );

        // $pelesen = EBioInit::where('ebio_reg', $ebio_nobatch)->first();
            //  dd($pelesen);
        $kembali = route('admin.5penyatakemaskinibio');

        $produk = Produk::whereIn('prodcat', ['01' ])->orderBy('prodname')->get();
        $produk_b = Produk::whereIn('prodcat', ['02' ])->orderBy('prodname')->get();
        $produk_c = Produk::whereIn('prodcat', ['03', '06', '08'])->orderBy('prodname')->get();
        $produkiii_2 = Produk::where('prodid', 'AW')->orderBy('prodname')->get();
        $produkiii = Produk::whereIn('prodcat', ['03', '06', '08', '12'])->orderBy('prodname')->get();
        $produkiiiaw = Produk::whereIn('prodcat', ['03', '06', '08', '12'])->where('prodid', '!=', 'AW')->orderBy('prodname')->get();
        $syarikat = SyarikatPembeli::get();

        // $penyata33 = HBioC::findOrFail($ebio_nobatch);

            $penyata = HBioInit::with('pelesen')->where('ebio_nobatch', $ebio_nobatch)->first();
    // dd($ebio_nobatch);
            // $ebio_nobatch = intval($ebio_nobatch);

        $senarai_syarikat = HBioCC::with('hbioinit','syarikat')->where('ebio_nobatch', $penyata->ebio_nobatch)->get();


        $tahun = $penyata->ebio_thn;
        $bulan = $penyata->ebio_bln;

            $penyataia = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch',  $penyata->ebio_nobatch)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->get();

            $penyataib = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch',  $penyata->ebio_nobatch)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->get();

            $penyataic = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch',  $penyata->ebio_nobatch)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat', ['03', '06', '08']);
            })->get();

            $penyataii = HHari::where('lesen',  $penyata->ebio_nl)->where('tahunbhg2', $penyata->ebio_thn)->where('bulanbhg2',$penyata->ebio_bln)->first();

            $penyataiii = HBioC::with('hbioinit', 'produk')->where('ebio_nobatch',  $penyata->ebio_nobatch)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat',   ['03', '06', '08', '12']);
            })->get();




            if ($penyata->ebio_sdate) {
                $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata->ebio_sdate);
                $formatteddate = $myDateTime->format('d-m-Y');
            // }

            // dd($senarai_syarikat);


            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.5penyatakemaskinibio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
            ];

            $kembali = route('admin.6penyatapaparcetakbio');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];

            $layout = 'layouts.main';

        // dd($penyataia);
        // $data = DB::table('pelesen')->get();
        // if ($penyata->ebio_sdate) {
        return view('admin.proses5.5kemaskini-bio-view-dahulu', compact(
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
            'produk_b',
            'produk_c',
            'produkiii',
            'produkiiiaw',
            'produkiii_2',
            'senarai_syarikat',
            'syarikat',
            // 'penyata33',
        ));
    }
    else {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatakemaskinibio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $layout = 'layouts.main';

        return view('admin.proses5.5kemaskini-bio-view', compact(
            'returnArr',
            'layout',
            'tahun',
            'bulan',
            'penyata',
            'penyataia',
            'penyataib',
            'penyataic',
            'penyataii',
            'penyataiii',
            'produk',
            'produk_b',
            'produk_c',
            'produkiii',
        ));
    }
    }

    public function admin_kemaskini_maklumat_exe(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataia_save = EBioB::findOrFail($id);
        // dd($penyataia_save);

        // foreach($penyataia as $penyataia_save ){
            $ebio_b5 =$request->get('ebio_b5');
            $ebio_b6 = $request->get('ebio_b6');
            $ebio_b7 = $request->get('ebio_b7');
            $ebio_b8 = $request->get('ebio_b8');
            $ebio_b9 = $request->get('ebio_b9');
            $ebio_b10 = $request->get('ebio_b10');
            $ebio_b11 = $request->get('ebio_b11');
            $b5 = $ebio_b5 !== null ? str_replace(',', '', $ebio_b5) : '0.00';
            $b6 = $ebio_b6 !== null ? str_replace(',', '', $ebio_b6) : '0.00';
            $b7 = $ebio_b7 !== null ? str_replace(',', '', $ebio_b7) : '0.00';
            $b8 = $ebio_b8 !== null ? str_replace(',', '', $ebio_b8) : '0.00';
            $b9 = $ebio_b9 !== null ? str_replace(',', '', $ebio_b9) : '0.00';
            $b10 = $ebio_b10 !== null ? str_replace(',', '', $ebio_b10) : '0.00';
            $b11 = $ebio_b11 !== null ? str_replace(',', '', $ebio_b11) : '0.00';

            $penyataia_save->ebio_b4 = $request->get('ebio_b4');
            $penyataia_save->ebio_b5 = $b5;
            $penyataia_save->ebio_b6 = $b6;
            $penyataia_save->ebio_b7 = $b7;
            $penyataia_save->ebio_b8 = $b8;
            $penyataia_save->ebio_b9 = $b9;
            $penyataia_save->ebio_b10 =$b10;
            $penyataia_save->ebio_b11 = $b11;
        // dd($penyataia_save->ebio_b4);

            $penyataia_save->save();
        // }




        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function admin_kemaskini_maklumat_ii(Request $request, $lesen)
    {
        // dd($lesen);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel   "],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        // dd($lesen);
        // $lesen = 207;

        $penyataii_save = Hari::where('id' , $lesen)->first();
        // dd($penyataii_save);

        // foreach($penyataia as $penyataia_save ){
            $penyataii_save->hari_operasi = $request->get('hari_operasi') ?? '0';
            $penyataii_save->kapasiti = $request->get('kapasiti') ?? '0';

            $penyataii_save->save();
        // }

        // dd($penyataii_save);


        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function admin_add_maklumat_ii(Request $request, $lesen)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
            $penyataii_save=new Hari();
            $penyataii_save->lesen = $lesen;
            $penyataii_save->tahun = date('Y');
            $penyataii_save->bulan = date('m') - 1 ;
            $penyataii_save->hari_operasi = $request->get('hari_operasi');
            $penyataii_save->kapasiti = $request->get('kapasiti');

            $penyataii_save->save();
        // dd($penyataia_save->ebio_b4);


        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function admin_kemaskini_maklumat_exe_b(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataib_save = EBioB::findOrFail($id);
        // dd($penyataia_save);

        // foreach($penyataia as $penyataia_save ){
            $ebio_b5 =$request->get('ebio_b5');
            $ebio_b6 = $request->get('ebio_b6');
            $ebio_b7 = $request->get('ebio_b7');
            $ebio_b8 = $request->get('ebio_b8');
            $ebio_b9 = $request->get('ebio_b9');
            $ebio_b10 = $request->get('ebio_b10');
            $ebio_b11 = $request->get('ebio_b11');
            $b5 = $ebio_b5 !== null ? str_replace(',', '', $ebio_b5) : '0.00';
            $b6 = $ebio_b6 !== null ? str_replace(',', '', $ebio_b6) : '0.00';
            $b7 = $ebio_b7 !== null ? str_replace(',', '', $ebio_b7) : '0.00';
            $b8 = $ebio_b8 !== null ? str_replace(',', '', $ebio_b8) : '0.00';
            $b9 = $ebio_b9 !== null ? str_replace(',', '', $ebio_b9) : '0.00';
            $b10 = $ebio_b10 !== null ? str_replace(',', '', $ebio_b10) : '0.00';
            $b11 = $ebio_b11 !== null ? str_replace(',', '', $ebio_b11) : '0.00';

            $penyataib_save->ebio_b4 = $request->get('ebio_b4');
            $penyataib_save->ebio_b5 = $b5;
            $penyataib_save->ebio_b6 = $b6;
            $penyataib_save->ebio_b7 = $b7;
            $penyataib_save->ebio_b8 = $b8;
            $penyataib_save->ebio_b9 = $b9;
            $penyataib_save->ebio_b10 =$b10;
            $penyataib_save->ebio_b11 = $b11;
        // dd($penyataia_save->ebio_b4);

            $penyataib_save->save();
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

    public function process_add_bahagian_ib ($ebio_reg, Request $request)
        {

        //   dd($ebio_reg);q
            $penyata = EBioB::where('ebio_reg', $ebio_reg)
                ->where('ebio_b3', '2')
                ->where('ebio_b4', $request->ebio_b4)
                // ->where('e102_b5', $request->e102_b5)
                ->first();

            // dd($request->all());
            if ($penyata) {
                return redirect()->back()->with('error', 'Maklumat sudah tersedia');
            } else {
                // dd($request->all());
                // $this->validation_bahagian_ia($request->all())->validate();

                $post=new EBioB();
                $post->ebio_reg= $ebio_reg;
                $post->ebio_b3= '2';
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

    public function process_delete_bahagian_ib($id)
    {
        $penyataia_save = EBioB::findOrFail($id);

        $penyataia_save->delete();
        return redirect()->back()
            ->with('success', 'Maklumat Telah Dihapuskan');
    }


    public function admin_kemaskini_maklumat_exe_c(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataic_save = EBioB::findOrFail($id);
        // dd($penyataia_save);

        // foreach($penyataia as $penyataia_save ){

            $ebio_b5 =$request->get('ebio_b5');
            $ebio_b6 = $request->get('ebio_b6');
            $ebio_b7 = $request->get('ebio_b7');
            $ebio_b8 = $request->get('ebio_b8');
            $ebio_b9 = $request->get('ebio_b9');
            $ebio_b10 = $request->get('ebio_b10');
            $ebio_b11 = $request->get('ebio_b11');
            $b5 = $ebio_b5 !== null ? str_replace(',', '', $ebio_b5) : '0.00';
            $b6 = $ebio_b6 !== null ? str_replace(',', '', $ebio_b6) : '0.00';
            $b7 = $ebio_b7 !== null ? str_replace(',', '', $ebio_b7) : '0.00';
            $b8 = $ebio_b8 !== null ? str_replace(',', '', $ebio_b8) : '0.00';
            $b9 = $ebio_b9 !== null ? str_replace(',', '', $ebio_b9) : '0.00';
            $b10 = $ebio_b10 !== null ? str_replace(',', '', $ebio_b10) : '0.00';
            $b11 = $ebio_b11 !== null ? str_replace(',', '', $ebio_b11) : '0.00';

            $penyataic_save->ebio_b4 = $request->get('ebio_b4');
            $penyataic_save->ebio_b5 = $b5;
            $penyataic_save->ebio_b6 = $b6;
            $penyataic_save->ebio_b7 = $b7;
            $penyataic_save->ebio_b8 = $b8;
            $penyataic_save->ebio_b9 = $b9;
            $penyataic_save->ebio_b10 =$b10;
            $penyataic_save->ebio_b11 = $b11;

            $penyataic_save->save();
        // }




        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function process_add_bahagian_ic ($ebio_reg, Request $request)
        {

        //   dd($ebio_reg);q
            $penyata = EBioB::where('ebio_reg', $ebio_reg)
                ->where('ebio_b3', '3')
                ->where('ebio_b4', $request->ebio_b4)
                // ->where('e102_b5', $request->e102_b5)
                ->first();

            // dd($request->all());
            if ($penyata) {
                return redirect()->back()->with('error', 'Maklumat sudah tersedia');
            } else {
                // dd($request->all());
                // $this->validation_bahagian_ia($request->all())->validate();

                $post=new EBioB();
                $post->ebio_reg= $ebio_reg;
                $post->ebio_b3= '3';
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

    public function process_delete_bahagian_ic($id)
    {
        $penyataia_save = EBioB::findOrFail($id);

        $penyataia_save->delete();
        return redirect()->back()
            ->with('success', 'Maklumat Telah Dihapuskan');
    }

    public function admin_kemaskini_maklumat_exe_iii(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        // dd($request->all());

        $penyataiii_save = EBioC::findOrFail($id);
        // dd($penyataiii_save);

        // foreach($penyataia as $penyataia_save ){
            $ebio_c4 = $request->get('ebio_c4');
            $ebio_c5 = $request->get('ebio_c5');
            $ebio_c6 = $request->get('ebio_c6');
            $ebio_c7 = $request->get('ebio_c7');
            $ebio_c8 = $request->get('ebio_c8');
            $ebio_c9 = $request->get('ebio_c9');
            $ebio_c10 = $request->get('ebio_c10');


            $c4 = $ebio_c4 !== null ? str_replace(',', '', $ebio_c4) : '0.00';
            $c5 = $ebio_c5 !== null ? str_replace(',', '', $ebio_c5) : '0.00';
            $c6 = $ebio_c6 !== null ? str_replace(',', '', $ebio_c6) : '0.00';
            $c7 = $ebio_c7 !== null ? str_replace(',', '', $ebio_c7) : '0.00';
            $c8 = $ebio_c8 !== null ? str_replace(',', '', $ebio_c8) : '0.00';
            $c9 = $ebio_c9 !== null ? str_replace(',', '', $ebio_c9) : '0.00';
            $c10 = $ebio_c10 !== null ? str_replace(',', '', $ebio_c10) : '0.00';

            $penyataiii_save->ebio_c3 = $request->get('ebio_c3');
            $penyataiii_save->ebio_c4 = $c4;
            $penyataiii_save->ebio_c5 = $c5;
            $penyataiii_save->ebio_c6 = $c6;
            $penyataiii_save->ebio_c7 = $c7;
            $penyataiii_save->ebio_c8 = $c8;
            $penyataiii_save->ebio_c9 = $c9;
            $penyataiii_save->ebio_c10 =$c10;

            // dd($penyataiii_save);

            $penyataiii_save->save();
            // }




        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function process_add_bahagian_iii ($ebio_reg, Request $request)
    {

        //   dd($ebio_reg);q
        $penyata = EBioC::where('ebio_reg', $ebio_reg)
        ->where('ebio_c3', $request->ebio_c3)
        // ->where('e102_b5', $request->e102_b5)
        ->first();

//    dd($request->all());


        if ($penyata) {
            return redirect()->back()->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            // $this->validation_bahagian_iii($request->all())->validate();
            if ($request->ebio_c3 == 'AW') {
                if ($request->ebio_c8 == 0) {
                    return redirect()->back()->with('error', 'Sila isi butiran maklumat jualan/edaran');
                } else{
                    $this->store_bahagian_iii_kini($ebio_reg, $request->all());
                    $this->store_bahagian_iii2_kini($ebio_reg, $request->all());
                }

            } else {
                $this->store_bahagian_iii_kini($ebio_reg, $request->all());
            }


            return redirect()->back()->with('success', 'Maklumat sudah ditambah');
        }


    }

    protected function store_bahagian_iii_kini($ebio_reg, array $data)
    {
        $ebio_nobatch2 = EBioInit::where('ebio_reg', $ebio_reg)->first('ebio_reg');
        // dd($ebio_reg);
        return EBioC::create([
            'ebio_reg' => $ebio_nobatch2->ebio_reg,
            'ebio_c3' => $data['ebio_c3'],
            'ebio_c4' => $data['ebio_c4'] ?? 0,
            'ebio_c5' => $data['ebio_c5'] ?? 0,
            'ebio_c6' => $data['ebio_c6'] ?? 0,
            'ebio_c7' => $data['ebio_c7'] ?? 0,
            'ebio_c8' => $data['ebio_c8'] ?? 0,
            'ebio_c9' => $data['ebio_c9'] ?? 0,
            'ebio_c10' => $data['ebio_c10'] ?? 0,
            // 'ebio_c12' => $data['ebio_b12'],

            // 'e101_b15' => $data['ebio_b15'],
        ]);
        // return $data;
        // dd($data);
    }
    protected function store_bahagian_iii2_kini($ebio_reg, array $data)
    {
        $ebio_nobatch2 = EBioInit::where('ebio_reg', $ebio_reg)->first('ebio_reg');



        // dd($data);
        foreach ($data['jumlah_row_hidden'] as $key => $value) {
            // $nama_syarikat = SyarikatPembeli::where('pembeli', $data['new_syarikat_hidden'][$key])->get();
            // dd($nama_syarikat);
            $bio = EBioCC::create([
                'ebio_reg' => $ebio_nobatch2->ebio_reg,
                'ebio_cc2' => $data['ebio_c3'],
                'ebio_cc3' => $data['new_syarikat_hidden'][$key],
                'ebio_cc4' => $data['jumlah_row_hidden'][$key],

            ]);
        }
        return $bio;
    }

    public function process_delete_bahagian_iii($id)
    {
        $penyataiii_save = EBioC::findOrFail($id);
        $syarikat = EBioCC::where('ebio_reg', $penyataiii_save->ebio_reg)->get();

        // $penyata2 = EBioCC::findOrFail($id);
        // dd($penyata);
        foreach ($syarikat as $data) {

            $data->delete();
        }
        $penyataiii_save->delete();
        return redirect()->back()
            ->with('success', 'Maklumat Telah Dihapuskan');
    }


    public function admin_view_bahagian_iii_sykt_kini($id)
    {
            $penyata = EBioC::find($id);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kemaskini.maklumat.bio', $penyata->ebio_reg), 'name' => "Bahagian 3"],
            ['link' => route('bio.bahagianiii'), 'name' => "Maklumat Jualan/Edaran"],
        ];

        $kembali = route('admin.kemaskini.maklumat.bio',  $penyata->ebio_reg);

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');

        $bulan = date("m") - 1;
        $tahun = date("Y");


            // $penyata_test = DB::select("select * from `e_bio_c_s` where `ebio_reg` = $user->ebio_reg");

            $senarai_syarikat = EBioCC::with('ebioinit','syarikat')->where('ebio_reg', $penyata->ebio_reg)->get();
            // dd($senarai_syarikat);
            // dd($senarai_syarikat);

            $syarikat = SyarikatPembeli::get();

            $seq = EBioCC::where('ebio_reg', $id)->count();
            // dd($seq);

            return view('admin.proses5.5kemaskini-jualan-kini', compact(
                'returnArr',
                'senarai_syarikat',
                'syarikat',
                'user',
                'penyata',
                'bulan',
                'tahun',
                'seq',
            ));

        // $penyata = [];
        // $totaliiic4 = 0;
        // $totaliiic5 = 0;
        // $totaliiic6 = 0;
        // $totaliiic7 = 0;
        // $totaliiic8 = 0;
        // $totaliiic9 = 0;
        // $totaliiic10 = 0;

        // dd($user);


    }

    public function admin_edit_bahagian_iii_sykt_kini(Request $request, $id)
    {
        // dd($request->all());
        $penyataiii = EBioC::findOrFail($id);
        // dd($penyata);
        $syarikat = EBioCC::where('ebio_reg', $penyataiii->ebio_reg)->get();
        $count = EBioCC::max('ebio_cc1');
        // dd($total_jualan);

        // dd($syarikat);
        foreach ($syarikat as $key => $data) {
            $data->delete();
        }
        // dd($syarikat);

        $ebio_nobatch = EBioInit::where('ebio_nl', $penyataiii->ebio_nl)->first('ebio_reg');
        // dd($ebio_reg);
        if($request->new_syarikat_hidden){
            foreach ($request->new_syarikat_hidden as $key => $value) {
                $bio = EBioCC::create([
                    'ebio_reg' => $penyataiii->ebio_reg,
                    'ebio_cc2' => 'AW',
                    'ebio_cc3' => $request->new_syarikat_hidden[$key],
                    'ebio_cc4' => $request->ebio_cc4_hidden[$key],
                ]);
            }
        }

        if($request->ebio_cc3){
            foreach ($request->ebio_cc3 as $key => $value) {
                $syarikat_id = SyarikatPembeli::where('pembeli', $value)->first();

                $ebio_cc4[$key] = str_replace(',', '', $request->ebio_cc4[$key]);

                $bio = EBioCC::create([
                    'ebio_reg' => $penyataiii->ebio_reg,
                    'ebio_cc2' => 'AW',
                    'ebio_cc3' => $syarikat_id->id,
                    'ebio_cc4' => $ebio_cc4[$key],
                ]);

            }
            // dd($request->ebio_cc3);

        }
        $total_jualan = EBioCC::where('ebio_reg', $penyataiii->ebio_reg)->sum('ebio_cc4');

        $penyataiii = EBioC::where('ebio_reg', $penyataiii->ebio_reg)->where('ebio_c3', 'AW')->first();
        $penyataiii->ebio_c8 = $total_jualan;
            // dd($penyataiii);

        $penyataiii->push();


        // return redirect()->route('bio.bahagianiii');
        return redirect()->back()
        ->with('success', 'Maklumat Telah DiKemaskini');
    }



    public function admin_kemaskini_maklumat_exe_dahulu(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataia_save = HBioB::findOrFail($id);
        // dd($penyataia_save);

        // foreach($penyataia as $penyataia_save ){
            $ebio_b5 =$request->get('ebio_b5');
            $ebio_b6 = $request->get('ebio_b6');
            $ebio_b7 = $request->get('ebio_b7');
            $ebio_b8 = $request->get('ebio_b8');
            $ebio_b9 = $request->get('ebio_b9');
            $ebio_b10 = $request->get('ebio_b10');
            $ebio_b11 = $request->get('ebio_b11');
            $b5 = $ebio_b5 !== null ? str_replace(',', '', $ebio_b5) : '0.00';
            $b6 = $ebio_b6 !== null ? str_replace(',', '', $ebio_b6) : '0.00';
            $b7 = $ebio_b7 !== null ? str_replace(',', '', $ebio_b7) : '0.00';
            $b8 = $ebio_b8 !== null ? str_replace(',', '', $ebio_b8) : '0.00';
            $b9 = $ebio_b9 !== null ? str_replace(',', '', $ebio_b9) : '0.00';
            $b10 = $ebio_b10 !== null ? str_replace(',', '', $ebio_b10) : '0.00';
            $b11 = $ebio_b11 !== null ? str_replace(',', '', $ebio_b11) : '0.00';

            $penyataia_save->ebio_b4 = $request->get('ebio_b4');
            $penyataia_save->ebio_b5 = $b5;
            $penyataia_save->ebio_b6 = $b6;
            $penyataia_save->ebio_b7 = $b7;
            $penyataia_save->ebio_b8 = $b8;
            $penyataia_save->ebio_b9 = $b9;
            $penyataia_save->ebio_b10 =$b10;
            $penyataia_save->ebio_b11 = $b11;
        // dd($penyataia_save->ebio_b4);

            $penyataia_save->save();
        // }




        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function admin_kemaskini_maklumat_ii_dahulu(Request $request, $id)
    {
        // dd($id);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataii_save = HHari::findOrFail($id);
        // dd($penyataii_save);

        // foreach($penyataia as $penyataia_save ){
            $penyataii_save->hari_operasi = $request->get('hari_operasi') ?? '0';
            $penyataii_save->kapasiti = $request->get('kapasiti') ?? '0';

            $penyataii_save->save();
        // }

        // dd($penyataia_save->ebio_b4);


        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function admin_kemaskini_maklumat_exe_b_dahulu(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataib_save = HBioB::findOrFail($id);
        // dd($penyataia_save);

        // foreach($penyataia as $penyataia_save ){
            $ebio_b5 =$request->get('ebio_b5');
            $ebio_b6 = $request->get('ebio_b6');
            $ebio_b7 = $request->get('ebio_b7');
            $ebio_b8 = $request->get('ebio_b8');
            $ebio_b9 = $request->get('ebio_b9');
            $ebio_b10 = $request->get('ebio_b10');
            $ebio_b11 = $request->get('ebio_b11');
            $b5 = $ebio_b5 !== null ? str_replace(',', '', $ebio_b5) : '0.00';
            $b6 = $ebio_b6 !== null ? str_replace(',', '', $ebio_b6) : '0.00';
            $b7 = $ebio_b7 !== null ? str_replace(',', '', $ebio_b7) : '0.00';
            $b8 = $ebio_b8 !== null ? str_replace(',', '', $ebio_b8) : '0.00';
            $b9 = $ebio_b9 !== null ? str_replace(',', '', $ebio_b9) : '0.00';
            $b10 = $ebio_b10 !== null ? str_replace(',', '', $ebio_b10) : '0.00';
            $b11 = $ebio_b11 !== null ? str_replace(',', '', $ebio_b11) : '0.00';

            $penyataib_save->ebio_b4 = $request->get('ebio_b4');
            $penyataib_save->ebio_b5 = $b5;
            $penyataib_save->ebio_b6 = $b6;
            $penyataib_save->ebio_b7 = $b7;
            $penyataib_save->ebio_b8 = $b8;
            $penyataib_save->ebio_b9 = $b9;
            $penyataib_save->ebio_b10 =$b10;
            $penyataib_save->ebio_b11 = $b11;
        // dd($penyataia_save->ebio_b4);

            $penyataib_save->save();
        // }




        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }



    public function process_add_bahagian_ia_dahulu ($ebio_nobatch, Request $request)
    {


    //   dd($ebio_reg);q
        $penyata = HBioB::where('ebio_nobatch', $ebio_nobatch)
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

            $post=new HBioB();
            $post->ebio_nobatch= $ebio_nobatch;
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

    public function process_delete_bahagian_ia_dahulu($id)
    {
        $penyataia_save = HBioB::findOrFail($id);

        $penyataia_save->delete();
        return redirect()->back()
            ->with('success', 'Maklumat Telah Dihapuskan');
    }

    public function process_add_bahagian_ib_dahulu ($ebio_nobatch, Request $request)
        {

        //   dd($ebio_reg);q
            $penyata = HBioB::where('ebio_nobatch', $ebio_nobatch)
                ->where('ebio_b3', '2')
                ->where('ebio_b4', $request->ebio_b4)
                // ->where('e102_b5', $request->e102_b5)
                ->first();

            // dd($request->all());
            if ($penyata) {
                return redirect()->back()->with('error', 'Maklumat sudah tersedia');
            } else {
                // dd($request->all());
                // $this->validation_bahagian_ia($request->all())->validate();

                $post=new HBioB();
                $post->ebio_nobatch= $ebio_nobatch;
                $post->ebio_b3= '2';
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

    public function process_delete_bahagian_ib_dahulu($id)
    {
        $penyataia_save = HBioB::findOrFail($id);

        $penyataia_save->delete();
        return redirect()->back()
            ->with('success', 'Maklumat Telah Dihapuskan');
    }


    public function admin_kemaskini_maklumat_exe_c_dahulu(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataic_save = HBioB::findOrFail($id);
        // dd($penyataia_save);

        // foreach($penyataia as $penyataia_save ){

            $ebio_b5 =$request->get('ebio_b5');
            $ebio_b6 = $request->get('ebio_b6');
            $ebio_b7 = $request->get('ebio_b7');
            $ebio_b8 = $request->get('ebio_b8');
            $ebio_b9 = $request->get('ebio_b9');
            $ebio_b10 = $request->get('ebio_b10');
            $ebio_b11 = $request->get('ebio_b11');
            $b5 = $ebio_b5 !== null ? str_replace(',', '', $ebio_b5) : '0.00';
            $b6 = $ebio_b6 !== null ? str_replace(',', '', $ebio_b6) : '0.00';
            $b7 = $ebio_b7 !== null ? str_replace(',', '', $ebio_b7) : '0.00';
            $b8 = $ebio_b8 !== null ? str_replace(',', '', $ebio_b8) : '0.00';
            $b9 = $ebio_b9 !== null ? str_replace(',', '', $ebio_b9) : '0.00';
            $b10 = $ebio_b10 !== null ? str_replace(',', '', $ebio_b10) : '0.00';
            $b11 = $ebio_b11 !== null ? str_replace(',', '', $ebio_b11) : '0.00';

            $penyataic_save->ebio_b4 = $request->get('ebio_b4');
            $penyataic_save->ebio_b5 = $b5;
            $penyataic_save->ebio_b6 = $b6;
            $penyataic_save->ebio_b7 = $b7;
            $penyataic_save->ebio_b8 = $b8;
            $penyataic_save->ebio_b9 = $b9;
            $penyataic_save->ebio_b10 =$b10;
            $penyataic_save->ebio_b11 = $b11;

            $penyataic_save->save();
        // }




        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function process_add_bahagian_ic_dahulu ($ebio_nobatch, Request $request)
        {

        //   dd($ebio_reg);q
            $penyata = HBioB::where('ebio_nobatch', $ebio_nobatch)
                ->where('ebio_b3', '3')
                ->where('ebio_b4', $request->ebio_b4)
                // ->where('e102_b5', $request->e102_b5)
                ->first();

            // dd($request->all());
            if ($penyata) {
                return redirect()->back()->with('error', 'Maklumat sudah tersedia');
            } else {
                // dd($request->all());
                // $this->validation_bahagian_ia($request->all())->validate();

                $post=new HBioB();
                $post->ebio_nobatch= $ebio_nobatch;
                $post->ebio_b3= '3';
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

    public function process_delete_bahagian_ic_dahulu($id)
    {
        $penyataia_save = HBioB::findOrFail($id);

        $penyataia_save->delete();
        return redirect()->back()
            ->with('success', 'Maklumat Telah Dihapuskan');
    }

    public function admin_kemaskini_maklumat_exe_iii_dahulu(Request $request, $id)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Kemaskini Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $penyataiii_save = HBioC::findOrFail($id);
        // dd($penyataia_save);

        // foreach($penyataia as $penyataia_save ){
            $ebio_c4 =$request->get('ebio_c4');
            $ebio_c5 = $request->get('ebio_c5');
            $ebio_c6 = $request->get('ebio_c6');
            $ebio_c7 = $request->get('ebio_c7');
            $ebio_c8 = $request->get('ebio_c8');
            $ebio_c9 = $request->get('ebio_c9');
            $ebio_c10 = $request->get('ebio_c10');
            $c4 = $ebio_c4 !== null ? str_replace(',', '', $ebio_c4) : '0.00';
            $c5 = $ebio_c5 !== null ? str_replace(',', '', $ebio_c5) : '0.00';
            $c6 = $ebio_c6 !== null ? str_replace(',', '', $ebio_c6) : '0.00';
            $c7 = $ebio_c7 !== null ? str_replace(',', '', $ebio_c7) : '0.00';
            $c8 = $ebio_c8 !== null ? str_replace(',', '', $ebio_c8) : '0.00';
            $c9 = $ebio_c9 !== null ? str_replace(',', '', $ebio_c9) : '0.00';
            $c10 = $ebio_c10 !== null ? str_replace(',', '', $ebio_c10) : '0.00';


            $penyataiii_save->ebio_c3 = $request->get('ebio_c3');
            $penyataiii_save->ebio_c4 = $c4;
            $penyataiii_save->ebio_c5 = $c5;
            $penyataiii_save->ebio_c6 = $c6;
            $penyataiii_save->ebio_c7 = $c7;
            $penyataiii_save->ebio_c8 = $c8;
            $penyataiii_save->ebio_c9 = $c9;
            $penyataiii_save->ebio_c10 =$c10;
        // dd($penyataia_save->ebio_b4);

        // }

        $syarikat = HBioCC::where('ebio_nobatch', $penyataiii_save->ebio_nobatch)->get();
        $count = HBioCC::max('ebio_cc1');

        // dd($syarikat);
        foreach ($syarikat as $key => $data) {
            $data->delete();
        }
        // dd($syarikat);

        $ebio_nobatch = HBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_nobatch');
        // dd($ebio_reg);
        if($request->new_syarikat_hidden){
            foreach ($request->new_syarikat_hidden as $key => $value) {
                $bio = HBioCC::create([
                    'ebio_nobatch' => $penyataiii_save->ebio_nobatch,
                    'ebio_cc2' => 'AW',
                    'ebio_cc3' => $request->new_syarikat_hidden[$key],
                    'ebio_cc4' => $request->ebio_cc4_hidden[$key],
                ]);
            }
        }

        if($request->ebio_cc3){
            foreach ($request->ebio_cc3 as $key => $value) {
                $syarikat_id = SyarikatPembeli::where('pembeli', $value)->first();

                $ebio_cc4[$key] = str_replace(',', '', $request->ebio_cc4[$key]);

                $bio = HBioCC::create([
                    'ebio_nobatch' => $penyataiii_save->ebio_nobatch,
                    'ebio_cc2' => 'AW',
                    'ebio_cc3' => $syarikat_id->id,
                    'ebio_cc4' => $ebio_cc4[$key],
                ]);

            }
        }
        // dd($request->all());


        $penyataiii_save->save();


        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function process_add_bahagian_iii_dahulu ($ebio_nobatch, Request $request)
        {

        //   dd($ebio_reg);q
            $penyata = HBioC::where('ebio_nobatch', $ebio_nobatch)
                ->where('ebio_c3', $request->ebio_c3)
                // ->where('e102_b5', $request->e102_b5)
                ->first();

    //    dd($request->all());


            if ($penyata) {
                return redirect()->back()->with('error', 'Maklumat sudah tersedia');
            } else {
                // dd($request->all());
                // $this->validation_bahagian_iii($request->all())->validate();
                if ($request->ebio_c3 == 'AW') {
                    if ($request->ebio_c8 == 0) {
                        return redirect()->back()->with('error', 'Sila isi butiran maklumat jualan/edaran');
                    } else{
                        $this->store_bahagian_iii($ebio_nobatch, $request->all());
                        $this->store_bahagian_iii2($ebio_nobatch, $request->all());
                    }

                } else {
                    $this->store_bahagian_iii($ebio_nobatch, $request->all());
                }


                return redirect()->back()->with('success', 'Maklumat sudah ditambah');
            }
    }

    public function process_delete_bahagian_iii_dahulu($id)
    {
        $penyataiii_save = HBioC::findOrFail($id);

        $syarikat = HBioCC::where('ebio_nobatch', $penyataiii_save->ebio_nobatch)->get();

        // $penyata2 = EBioCC::findOrFail($id);
        // dd($penyata);
        foreach ($syarikat as $data) {

            $data->delete();
        }
        $penyataiii_save->delete();
        return redirect()->back()
            ->with('success', 'Maklumat Telah Dihapuskan');
    }


    public function admin_view_bahagian_iii_sykt_dahulu($id)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Bahagian 3"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Maklumat Jualan/Edaran"],
        ];

        $kembali = route('bio.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $user = HBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_nobatch');

        $bulan = date("m") - 1;
        $tahun = date("Y");


            $penyata = HBioC::find($id);
            // $penyata_test = DB::select("select * from `e_bio_c_s` where `ebio_reg` = $user->ebio_reg");

            $senarai_syarikat = HBioCC::with('hbioinit','syarikat')->where('ebio_nobatch', $penyata->ebio_nobatch)->get();
            // dd($senarai_syarikat);
            // dd($senarai_syarikat);

            $syarikat = SyarikatPembeli::get();

            $seq = HBioCC::where('ebio_nobatch', $id)->count();
            // dd($seq);

            return view('admin.proses5.5kemaskini-jualan-dahulu', compact(
                'returnArr',
                'senarai_syarikat',
                'syarikat',
                'user',
                'penyata',
                'bulan',
                'tahun',
                'seq',
            ));

        // $penyata = [];
        // $totaliiic4 = 0;
        // $totaliiic5 = 0;
        // $totaliiic6 = 0;
        // $totaliiic7 = 0;
        // $totaliiic8 = 0;
        // $totaliiic9 = 0;
        // $totaliiic10 = 0;

        // dd($user);


    }

    public function admin_edit_bahagian_iii_sykt(Request $request, $id)
    {
        // dd($request->all());
        $penyataiii = HBioC::findOrFail($id);
        // dd($penyata);
        $syarikat = HBioCC::where('ebio_nobatch', $penyataiii->ebio_nobatch)->get();
        $count = HBioCC::max('ebio_cc1');
        // dd($total_jualan);

        // dd($syarikat);
        foreach ($syarikat as $key => $data) {
            $data->delete();
        }
        // dd($syarikat);

        $ebio_nobatch = HBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_nobatch');
        // dd($ebio_reg);
        if($request->new_syarikat_hidden){
            foreach ($request->new_syarikat_hidden as $key => $value) {
                $bio = HBioCC::create([
                    'ebio_nobatch' => $penyataiii->ebio_nobatch,
                    'ebio_cc2' => 'AW',
                    'ebio_cc3' => $request->new_syarikat_hidden[$key],
                    'ebio_cc4' => $request->ebio_cc4_hidden[$key],
                ]);
            }
        }

        if($request->ebio_cc3){
            foreach ($request->ebio_cc3 as $key => $value) {
                $syarikat_id = SyarikatPembeli::where('pembeli', $value)->first();

                $ebio_cc4[$key] = str_replace(',', '', $request->ebio_cc4[$key]);

                $bio = HBioCC::create([
                    'ebio_nobatch' => $penyataiii->ebio_nobatch,
                    'ebio_cc2' => 'AW',
                    'ebio_cc3' => $syarikat_id->id,
                    'ebio_cc4' => $ebio_cc4[$key],
                ]);

            }
            // dd($request->ebio_cc3);
            // dd($ebio_cc4);

        }
        $total_jualan = HBioCC::where('ebio_nobatch', $penyataiii->ebio_nobatch)->sum('ebio_cc4');

        $penyata3 = HBioC::where('ebio_nobatch', $penyataiii->ebio_nobatch)->where('ebio_c3', 'AW')->first();
        $penyata3->ebio_c8 = $total_jualan;
        $penyata3->push();


        // return redirect()->route('bio.bahagianiii');
        return redirect()->back()
        ->with('success', 'Maklumat Telah DiKemaskini');
    }

    protected function store_bahagian_iii($ebio_nobatch, array $data)
    {
        $ebio_nobatch2 = HBioInit::where('ebio_nobatch', $ebio_nobatch)->first('ebio_nobatch');
        // dd($ebio_reg);
        return HBioC::create([
            'ebio_nobatch' => $ebio_nobatch2->ebio_nobatch,
            'ebio_c3' => $data['ebio_c3'],
            'ebio_c4' => $data['ebio_c4'],
            'ebio_c5' => $data['ebio_c5'],
            'ebio_c6' => $data['ebio_c6'],
            'ebio_c7' => $data['ebio_c7'],
            'ebio_c8' => $data['ebio_c8'],
            'ebio_c9' => $data['ebio_c9'],
            'ebio_c10' => $data['ebio_c10'],
            // 'ebio_c12' => $data['ebio_b12'],

            // 'e101_b15' => $data['ebio_b15'],
        ]);
        // return $data;
        // dd($data);
    }
    protected function store_bahagian_iii2($ebio_nobatch, array $data)
    {
        $ebio_nobatch2 = HBioInit::where('ebio_nobatch', $ebio_nobatch)->first('ebio_nobatch');



        // dd($ebio_reg);
        foreach ($data['jumlah_row_hidden'] as $key => $value) {
            // $nama_syarikat = SyarikatPembeli::where('pembeli', $data['new_syarikat_hidden'][$key])->get();
            // dd($nama_syarikat);
            $bio = HBioCC::create([
                'ebio_nobatch' => $ebio_nobatch2->ebio_nobatch,
                'ebio_cc2' => $data['ebio_c3'],
                'ebio_cc3' => $data['new_syarikat_hidden'][$key],
                'ebio_cc4' => $data['jumlah_row_hidden'][$key],

            ]);
        }
        return $bio;
    }

}


