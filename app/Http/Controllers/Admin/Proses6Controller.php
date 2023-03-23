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
use App\Models\EBioD;
use App\Models\EBioInit;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Hari;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use DateTime;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class Proses6Controller extends Controller
{
    public function admin_6penyatapaparcetakbuah()
    {
        if (auth()->user()->sub_cat) {
            foreach (json_decode(auth()->user()->sub_cat) as $cat) {
                // if ($cat == 'PL91'){
                //     return redirect()->route('admin.senaraipelesenbuah');
                // } else
                if ($cat == 'PL101') {
                    return redirect()->route('admin.6penyatapaparcetakpenapis');
                } elseif ($cat == 'PL102') {
                    return redirect()->route('admin.6penyatapaparcetakisirung');
                } elseif ($cat == 'PL104') {
                    return redirect()->route('admin.6penyatapaparcetakoleo');
                } elseif ($cat == 'PL111') {
                    return redirect()->route('admin.6penyatapaparcetaksimpanan');
                } elseif ($cat == 'PLBIO') {
                    return redirect()->route('admin.6penyatapaparcetakbio');
                } else {

                    $users = DB::select("SELECT e.e91_flagcetak, p.e_nl, p.e_np, e.e91_flg, p.e_email, e.e91_reg,
                            k.kodpgw, k.nosiri, date_format(e91_sdate,'%d-%m-%Y') as sdate
                            FROM pelesen p, e91_init e, reg_pelesen k
                            WHERE p.e_nl = e.e91_nl
                            and e.e91_flg in ('2','3')
                            and p.e_nl = k.e_nl
                            and k.e_kat = 'PL91'
                            order by k.kodpgw, k.nosiri");



                    $breadcrumbs    = [
                        ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                        ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Penyata Bulanan Telah Dihantar "],
                    ];

                    $kembali = route('admin.dashboard');

                    $returnArr = [
                        'breadcrumbs' => $breadcrumbs,
                        'kembali'     => $kembali,
                    ];
                    $layout = 'layouts.admin';



                    return view('admin.proses6.6penyata-papar-cetak-buah', compact('returnArr', 'layout', 'users'));
                }
            }
        } else {
            $users = DB::select("SELECT e.e91_flagcetak, p.e_nl, p.e_np, e.e91_flg, p.e_email, e.e91_reg,
            k.kodpgw, k.nosiri, date_format(e91_sdate,'%d-%m-%Y') as sdate
            FROM pelesen p, e91_init e, reg_pelesen k
            WHERE p.e_nl = e.e91_nl
            and e.e91_flg in ('2','3')
            and p.e_nl = k.e_nl
            and k.e_kat = 'PL91'
            order by k.kodpgw, k.nosiri");



            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Penyata Bulanan Telah Dihantar "],
            ];

            $kembali = route('admin.dashboard');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            $layout = 'layouts.admin';



            return view('admin.proses6.6penyata-papar-cetak-buah', compact('returnArr', 'layout', 'users'));
        }
    }


    public function process_admin_6penyatapaparcetakbuah_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.6penyatapaparcetakbuah');
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

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e91_sdate);
            $formatteddate[$key] = $myDateTime->format('d-m-Y');

            $query = E91Init::findOrFail($e91_reg);
            $query->e91_flagcetak = 'Y';
            $query->save();

        }
        $layout = 'layouts.main';
    // dd($penyata);
        //log audit trail admin
        Auth::user()->log(" VIEW PENYATA {$penyata[$key]->e91_nl}" );

        // $data = DB::table('pelesen')->get();
        return view('admin.proses6.6papar-buah-multi', compact('returnArr', 'layout', 'tahun', 'bulan', 'pelesens', 'penyata','myDateTime','formatteddate'));
    }

    // public function show_admin_6penyatapaparcetakbuah($e91_reg , E91Init $penyata )
    // {
    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Buah"],
    //     ];

    //     $bulan = date("m") - 1;
    //     $tahun = date("Y");

    //     // $data = DB::table('pelesen')->get();
    //     $penyata = E91Init::find($e91_reg);
    //     $pelesen = Pelesen::where('e_nl', $penyata-> e91_nl)->first();

    //     // dd($penyata);
    //     $kembali = route('admin.dashboard');
    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';
    //     return view('admin.proses6.6papar-buah',compact('returnArr' ,'layout', 'tahun', 'bulan', 'pelesen','penyata' ));
    // }

    public function admin_6penyatapaparcetakpenapis()
    {

        $users = DB::select("SELECT e.e101_nl, e.e101_flagcetak, p.e_nl, p.e_np,e.e101_flg, p.e_email, e.e101_reg,
        k.kodpgw, k.nosiri, date_format(e101_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e101_init e, reg_pelesen k
        WHERE p.e_nl = e.e101_nl
        and e.e101_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL101'
        order by k.kodpgw, k.nosiri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakpenapis'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function process_admin_6penyatapaparcetakpenapis_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakpenapis'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.6penyatapaparcetakpenapis');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");

        foreach ($request->papar_ya as $key => $e101_reg) {

            $pelesens[$key] = (object)[];
            $penyata[$key] = E101Init::with('pelesen', 'regpelesen')->find($e101_reg);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e101_nl)->first();

            $penyatai[$key] = E101B::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->orderBy('e101_b4')->get();

            $totalib5[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b5');

            //  dd($totalib5);

            $totalib6[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b6');

            //  dd($totalib5);
            $totalib7[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b7');
            //  dd($totalib5);
            $totalib8[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b8');
            //  dd($totalib5);
            $totalib9[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b9');
            //  dd($totalib5);
            $totalib10[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b10');
            //  dd($totalib5);
            $totalib11[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b11');
            //  dd($totalib5);
            $totalib12[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b12');
            //  dd($totalib5);
            $totalib13[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b13');
            //  dd($totalib5);
            $totalib14[$key] = DB::table("e101_b")
                ->where('e101_reg', $penyata[$key]->e101_reg)
                ->where('e101_b3', '1')
                ->sum('e101_b14');

            $penyataii[$key] = E101B::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->orderBy('e101_b4')->get();
            // dd($penyataii);

            $totaliib5[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b5');
            //  dd($totaliib5);
            $totaliib6[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b6');
            //  dd($totaliib5);
            $totaliib7[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b7');
            //  dd($totaliib5);
            $totaliib8[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b8');
            //  dd($totaliib5);
            $totaliib9[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b9');
            //  dd($totaliib5);
            $totaliib10[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b10');
            //  dd($totaliib5);
            $totaliib11[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b11');
            //  dd($totaliib5);
            $totaliib12[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b12');
            //  dd($totaliib5);
            $totaliib13[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b13');
            //  dd($totaliib5);
            $totaliib14[$key] = DB::table("e101_b")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_b3', '2')->sum('e101_b14');
            //  dd($totaliib5);

            $penyataiii[$key] = E101Init::where('e101_reg', $penyata[$key]->e101_reg)->first();
            // dd($penyataiii);

            $penyataiva[$key] = E101C::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->orderBy('e101_c4')->get();
            // dd($penyataiva);

            $totalivac5[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c5');
            //   dd($totalivac5);
            $totalivac6[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c6');
            //   dd($totalivac5);
            $totalivac7[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c7');
            //   dd($totalivac5);
            $totalivac8[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c8');
            //   dd($totalivac5);
            $totalivac9[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c9');
            //   dd($totalivac5);
            $totalivac10[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '1')->sum('e101_c10');
            //   dd($totalivac5);

            $penyataivb[$key] = E101C::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', 2)->orderBy('e101_c4')->get();
            // dd($penyataivb);

            $totalivbc5[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c5');
            //   dd($totalivac5);
            $totalivbc6[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c6');
            //   dd($totalivac5);
            $totalivbc7[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c7');
            //   dd($totalivac5);
            $totalivbc8[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c8');
            //   dd($totalivac5);
            $totalivbc9[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c9');
            //   dd($totalivac5);
            $totalivbc10[$key] = DB::table("e101_c")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_c3', '2')->sum('e101_c10');
            //   dd($totalivac5);

            $penyatava[$key] = E101D::with('e101init', 'prodcat')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', 1)->get();
            // dd($penyatava);
            $totalvad5[$key] = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '1')->sum('e101_d5');
            $totalvad6[$key] = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '1')->sum('e101_d6');
            $totalvad7[$key] = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '1')->sum('e101_d7');
            $totalvad8[$key] = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '1')->sum('e101_d8');


            $penyatavb[$key] = E101D::with('e101init', 'prodcat')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', 2)->get();
            // dd($penyatavb);
            $totalvbd5[$key] = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '2')->sum('e101_d5');
            $totalvbd6[$key] = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '2')->sum('e101_d6');
            $totalvbd7[$key] = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '2')->sum('e101_d7');
            $totalvbd8[$key] = DB::table("e101_d")->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_d3', '2')->sum('e101_d8');

            $penyatavii[$key] = E101E::with('e101init', 'produk')->where('e101_reg', $penyata[$key]->e101_reg)->where('e101_e3', 1)->get();



            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e101_sdate);
            $formatteddate[$key] = $myDateTime->format('d-m-Y');

            $query = E101Init::findOrFail($e101_reg);
            $query->e101_flagcetak = 'Y';
            $query->save();
        }



        $layout = 'layouts.main';

        //log audit trail admin
        Auth::user()->log(" VIEW PENYATA {$penyata[$key]->e101_nl}" );
        // dd($pelesens);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses6.6papar-penapis-multi', compact(
            'returnArr',
            'formatteddate',
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
    }

    // public function show_admin_6penyatapaparcetakpenapis($e101_reg , E101Init $penyata )
    // {
    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('admin.6penyatapaparcetakpenapis'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Penapis"],
    //     ];

    //     $bulan = date("m") - 1;
    //     $tahun = date("Y");

    //     // $data = DB::table('pelesen')->get();
    //     $penyata = E101Init::find($e101_reg);
    //     $pelesen = Pelesen::where('e_nl', $penyata-> e101_nl)->first();

    //     // dd($penyata);
    //     $kembali = route('admin.dashboard');
    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';
    //     return view('admin.proses6.6papar-penapis',compact('returnArr' ,'layout', 'tahun', 'bulan', 'pelesen','penyata' ));
    // }

    public function admin_6penyatapaparcetakisirung()
    {

        $users = DB::select("SELECT e.e102_nl, e.e102_flagcetak, p.e_nl, p.e_np, e.e102_flg, p.e_email, e.e102_reg,
        k.kodpgw, k.nosiri, date_format(e102_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e102_init e, reg_pelesen k
        WHERE p.e_nl = e.e102_nl
        and e.e102_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL102'
        order by k.kodpgw, k.nosiri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakisirung'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function process_admin_6penyatapaparcetakisirung_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakisirung'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.6penyatapaparcetakisirung');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e102_reg) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = E102Init::with('pelesen', 'regpelesen')->find($e102_reg);
            // dd($penyata);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e102_nl)->first();

            // $penyatai = E102Init::where('e102_nl', $penyata[$key]->e102_nl)->first();

            // $penyataii = E102Init::where('e102_nl', $penyata[$key]->e102_nl)->first();
            // foreach ($penyata as $key => $test) {

            $penyataiii[$key] = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $penyata[$key]->e102_reg)->where('e102_b3', '51')->get();
        // dd($penyataiii[$key]);

            // }
            // dd($penyataiii);
            $totaliii[$key] = DB::table("e102b")->where('e102_b2', $penyata[$key]->e102_reg)->where('e102_b3', '51')->sum('e102_b6');
            // dd($totaliii);

            $penyataiv[$key] = E102b::with('e102init')->where('e102_b2', $penyata[$key]->e102_reg)->where('e102_b3', '04')->get();

            $totaliv[$key] = DB::table("e102b")->where('e102_b2', $penyata[$key]->e102_reg)->where('e102_b3', '04')->sum('e102_b6');

            $penyatav[$key] = E102b::with('e102init')->where('e102_b2', $penyata[$key]->e102_reg)->where('e102_b3', '33')->get();

            $totalv[$key] = DB::table("e102b")->where('e102_b2', $penyata[$key]->e102_reg)->where('e102_b3', '33')->sum('e102_b6');

            $penyatavi[$key] = E102c::with('e102init', 'produk', 'negara')->where('e102_c2', $penyata[$key]->e102_reg)->where('e102_c3', '1')->get();

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e102_sdate);
            $formatteddate[$key] = $myDateTime->format('d-m-Y');

            $query = E102Init::findOrFail($e102_reg);
            $query->e102_flagcetak = 'Y';
            $query->save();
        }

        $layout = 'layouts.main';

        // dd($penyata)
        // $data = DB::table('pelesen')->get();
        return view('admin.proses6.6papar-isirung-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'penyataiii',
            'totaliii',
            'penyataiv',
            'totaliv',
            'penyatav',
            'totalv',
            'penyatavi'
        ));
    }

    public function admin_6penyatapaparcetakoleo()
    {

        $users = DB::select("SELECT e.e104_nl, e.e104_flagcetak, p.e_nl, p.e_np, e.e104_flg, p.e_email, e.e104_reg,
        k.kodpgw, k.nosiri, date_format(e104_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e104_init e, reg_pelesen k
        WHERE p.e_nl = e.e104_nl
        and e.e104_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL104'
        order by k.kodpgw, k.nosiri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakoleo'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-oleo', compact('returnArr', 'layout', 'users'));
    }

    public function process_admin_6penyatapaparcetakoleo_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakoleo'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.6penyatapaparcetakoleo');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e104_reg) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = E104Init::with('pelesen', 'regpelesen')->find($e104_reg);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();

            $penyataia[$key] = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata[$key]->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->get();

            $total[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b5');

            $total2[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b6');

            $total3[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b7');

            $total4[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b8');

            $total5[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b9');

            $total6[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b10');

            $total7[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b11');

            $total8[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b12');

            $total9[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '1')->sum('e104_b13');

            // dd($penyatai);

            $penyataib[$key] = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata[$key]->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->get();

            $totalib[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b5');

            $totalib2[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b6');

            $totalib3[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b7');

            $totalib4[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b8');

            $totalib5[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b9');

            $totalib6[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b10');

            $totalib7[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b11');

            $totalib8[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b12');

            $totalib9[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '2')->sum('e104_b13');

            // dd($penyataii);


            $penyataic[$key] = E104B::with('e104init', 'produk')->where('e104_reg',  $penyata[$key]->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '08');
            })->get();

            $totalic[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b5');

            $totalic2[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b6');

            $totalic3[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b7');

            $totalic4[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b8');

            $totalic5[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b9');

            $totalic6[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b10');

            $totalic7[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b11');

            $totalic8[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b12');

            $totalic9[$key] = DB::table("e104_b")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_b3', '3')->sum('e104_b13');

            // dd($penyataiii);


            $penyataii[$key] = E104Init::where('e104_nl',  $penyata[$key]->e104_nl)->first();
            // dd($penyataiva);


            $penyataiii[$key] = E104C::with('e104init', 'produk')->where('e104_reg',  $penyata[$key]->e104_reg)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat',  ['03', '06', '08']);
            })->get();

            $totaliii[$key] = DB::table("e104_c")->where('e104_reg',  $penyata[$key]->e104_reg)->sum('e104_c4');

            $totaliii2[$key] = DB::table("e104_c")->where('e104_reg',  $penyata[$key]->e104_reg)->sum('e104_c5');

            $totaliii3[$key] = DB::table("e104_c")->where('e104_reg',  $penyata[$key]->e104_reg)->sum('e104_c6');

            $totaliii4[$key] = DB::table("e104_c")->where('e104_reg',  $penyata[$key]->e104_reg)->sum('e104_c7');

            $totaliii5[$key] = DB::table("e104_c")->where('e104_reg',  $penyata[$key]->e104_reg)->sum('e104_c8');
            // dd($penyataiii);


            $penyataiv[$key] = E104D::with('e104init', 'produk', 'negara')->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_d3', 1)->get();

            $totaliv[$key] = DB::table("e104_d")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_d3', '1')->sum('e104_d7');

            $totaliv2[$key] = DB::table("e104_d")->where('e104_reg',  $penyata[$key]->e104_reg)->where('e104_d3', '1')->sum('e104_d8');

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e104_sdate);
            $formatteddate[$key] = $myDateTime->format('d-m-Y');

            $query = E104Init::findOrFail($e104_reg);
            $query->e104_flagcetak = 'Y';
            $query->save();
        }



        $layout = 'layouts.main';

        // dd($pelesens);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses6.6papar-oleo-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
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

    public function admin_6penyatapaparcetaksimpanan()
    {

        $users = DB::select("SELECT e.e07_nl, e.e07_flagcetak, p.e_nl, p.e_np, e.e07_flg, p.e_email, e.e07_reg,
        k.kodpgw, k.nosiri, date_format(e07_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e07_init e, reg_pelesen k
        WHERE p.e_nl = e.e07_nl
        and e.e07_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL111'
        order by k.kodpgw, k.nosiri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetaksimpanan'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function process_admin_6penyatapaparcetaksimpanan_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetaksimpanan'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.6penyatapaparcetaksimpanan');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $bulan = date("m") - 1;
        $tahun = date("Y");
        foreach ($request->papar_ya as $key => $e07_reg) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = E07Init::with('pelesen', 'regpelesen')->find($e07_reg);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e07_nl)->first();

            $penyatai[$key] = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $penyata[$key]->e07_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '!=', '07');
            })->get();
            // dd($penyata);
            $total[$key] = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_stokawal');
            $total2[$key] = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_terima');
            $total3[$key] = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_edaran');
            $total4[$key] = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_pelarasan');
            $total5[$key] = DB::table("e07_btranshipment")->where('e07bt_idborang', $penyata[$key]->e07_reg)->sum('e07bt_stokakhir');

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e07_sdate);
            $formatteddate[$key] = $myDateTime->format('d-m-Y');

            $query = E07Init::findOrFail($e07_reg);
            $query->e07_flagcetak = 'Y';
            $query->save();
        }

        $layout = 'layouts.main';

        // dd($pelesens);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses6.6papar-simpanan-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
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

    public function admin_6penyatapaparcetakbio()
    {
        // $users = DB::select("SELECT e.ebio_nl, e.ebio_flagcetak, p.e_nl, p.e_np, e.ebio_flg, p.e_email, e.ebio_reg,
        // k.kodpgw, k.nosiri, date_format(ebio_sdate,'%d-%m-%Y') as sdate
        // FROM pelesen p, e_bio_inits e, reg_pelesen k
        // WHERE p.e_nl = e.ebio_nl
        // and e.ebio_flg in ('2','3')
        // and p.e_nl = k.e_nl
        // and k.e_kat = 'PLBIO'
        // order by k.kodpgw, k.nosiri");

        $users = DB::select("SELECT e.ebio_nl, e.ebio_flagcetak, p.e_nl, p.e_np, e.ebio_flg, p.e_email, e.ebio_reg, p.e_notel,
        k.kod_pegawai, k.no_siri, date_format(ebio_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e_bio_inits e, users k
        WHERE p.e_nl = e.ebio_nl
        and e.ebio_flg in ('2','3')
        and p.e_nl = k.username
        and e.ebio_nl = k.username
        and k.category = p.e_kat
        and k.category = 'PLBIO'
        order by k.kod_pegawai, k.no_siri");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses6.6penyata-papar-cetak-bio', compact('returnArr', 'layout', 'users'));
    }

    public function process_admin_6penyatapaparcetakbio_form(Request $request)
    {
        // dd($request->all());


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.6penyatapaparcetakbio');
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

            $penyataia[$key] = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata[$key]->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 01);
            })->orderBy('ebio_b4')->get();



            $penyataib[$key] = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata[$key]->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->orderBy('ebio_b4')->get();

            $penyataic[$key] = EBioB::with('ebioinit', 'produk')->where('ebio_reg',  $penyata[$key]->ebio_reg)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();

        // $ic = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->get();


            $penyataii[$key] = Hari::where('lesen',  $penyata[$key]->ebio_nl)->first();
            // dd($penyataiva);

            $penyataiii[$key] = EBioC::with('ebioinit', 'produk')->where('ebio_reg',  $penyata[$key]->ebio_reg)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat',   ['03', '06', '08', '12']);
            })->orderBy('ebio_c3')->get();

            // $wherestmt = "(";
            // $wherestmt = $wherestmt . "'" . $ebio_reg . "',";
            // $query = DB::select("update e_bio_inits set ebio_flagcetak = 'Y' where ebio_nl in $ebio_reg");

            $query = EBioInit::findOrFail($ebio_reg);
            $query->ebio_flagcetak = 'Y';
            $query->save();

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->ebio_sdate);
            $formatteddate[$key] = $myDateTime->format('d-m-Y');

        }


        $layout = 'layouts.main';

        // dd($penyataia);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses6.6papar-bio-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
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

    public function admin_6papar_buah()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Penyata Bulanan Telah Dihantar "],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        $users = DB::select("SELECT e.e91_flagcetak, p.e_nl, p.e_np, e.e91_flg,  e.e91_nl, p.e_email,
        k.kodpgw, k.nosiri, date_format(e91_sdate,'%d-%m-%Y') as sdate
        FROM pelesen p, e91_init e, reg_pelesen k
        WHERE p.e_nl = e.e91_nl
        and e.e91_flg in ('2','3')
        and p.e_nl = k.e_nl
        and k.e_kat = 'PL91'
        order by k.kodpgw, k.nosiri");



        return view('admin.proses6.6papar-buah', compact('returnArr', 'layout', 'users'));
    }
}
