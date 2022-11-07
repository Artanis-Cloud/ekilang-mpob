<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\H07Btranshipment;
use App\Models\H07Init;
use App\Models\H101B;
use App\Models\H101C;
use App\Models\H101D;
use App\Models\H101Init;
use App\Models\H102b;
use App\Models\H102c;
use App\Models\H102Init;
use App\Models\H104B;
use App\Models\H104C;
use App\Models\H104D;
use App\Models\H104Init;
use App\Models\HBioB;
use App\Models\HBioC;
use App\Models\HBioD;
use App\Models\HBioInit;
use App\Models\HHari;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use DateTime;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class Proses9Controller extends Controller
{

    public function admin_9penyataterdahulu()
    {

        // if (auth()->user()->sub_cat) {
        //     foreach (json_decode(auth()->user()->sub_cat) as $cat) {
        //         // if ($cat == 'PL91'){
        //         //     return redirect()->route('admin.senaraipelesenbuah');
        //         // } else
        //         if ($cat == 'PL101') {
        //             return redirect()->route('admin.9penyataterdahulupenapis');
        //         } elseif ($cat == 'PL102') {
        //             return redirect()->route('admin.9penyataterdahuluisirung');
        //         } elseif ($cat == 'PL104') {
        //             return redirect()->route('admin.9penyataterdahuluoleo');
        //         } elseif ($cat == 'PL111') {
        //             return redirect()->route('admin.9penyataterdahulusimpanan');
        //         } elseif ($cat == 'PLBIO') {
        //             return redirect()->route('admin.9penyataterdahulubio');
        //         } else {

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
    // }
    //     } else {

    //         $breadcrumbs    = [
    //             ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
    //             ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
    //         ];

    //         $kembali = route('admin.dashboard');

    //         $returnArr = [
    //             'breadcrumbs' => $breadcrumbs,
    //             'kembali'     => $kembali,
    //         ];
    //         $layout = 'layouts.admin';

    //         return view('admin.proses9.9penyataterdahulu', compact('returnArr', 'layout'));
    //     }
    // }

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


    protected function validation_terdahulu(array $data)
    {
        return Validator::make($data, [
            'sektor' => ['required', 'string'],
            'tahun' => ['required', 'string'],
            'data' => ['required', 'string'],
        ]);
    }



    public function admin_9penyataterdahulu_process(Request $request)
    {

        $this->validation_terdahulu($request->all())->validate();

        // dd($request->all());
        $sektor = $request->sektor;
        $sumber = $request->data;
        $tahuns = $request->tahun;
        if ($sektor == 'PLBIO') {
            $bulans = $request->bulan2;
            $bulan1 = $request->bulan2;


        } else {
             $bulans = $request->bulan;
            $bulan1 = $request->bulan;


        }

        // dd($bulans);

        $tahun1 = $request->tahun;

        if ($sumber == 'ekilang') {
            if ($sektor == 'PL91') {
                $tahun = H91Init::where('e91_thn', $request->tahun);
                $bulan = H91Init::where('e91_bln', $request->bulan);

                // dd($bulan);
                $users = DB::select("SELECT e.e91_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, e.e91_nobatch,  date_format(e91_sdate,'%d-%m-%Y') as sdate
                                FROM pelesen p, h91_init e, reg_pelesen k
                                WHERE e.e91_thn = '$request->tahun'
                                and e.e91_bln = '$request->bulan'
                                and p.e_nl = e.e91_nl
                                and e.e91_flg = '3'
                                and p.e_nl = k.e_nl
                                and k.e_kat = 'PL91'
                                order by k.kodpgw, k.nosiri");

                                if (!$users) {
                                    return redirect()->back()
                                    ->with('error', 'Penyata Tidak Wujud!');
                                }
            } elseif ($sektor == 'PL101') {
                $tahun = H101Init::where('tahun', $request->e101_thn);
                $bulan = H101Init::where('tahun', $request->e101_bln);


                $users = DB::select("SELECT e.e101_nl, p.e_nl, p.e_np, k.kodpgw, e.e101_nobatch, k.nosiri,date_format(e101_sdate,'%d-%m-%Y') as sdate
                                from pelesen p, h101_init e, reg_pelesen k
                                WHERE e.e101_thn = '$request->tahun'
                                and e.e101_bln = '$request->bulan'
                                and e.e101_flg = '3'
                                and p.e_nl = e.e101_nl
                                and p.e_nl = k.e_nl
                                and k.e_kat = 'PL101'
                                order by k.kodpgw, k.nosiri");

                                if (!$users) {
                                    return redirect()->back()
                                    ->with('error', 'Penyata Tidak Wujud!');
                                }
            } elseif ($sektor == 'PL102') {
                $tahun = H102Init::where('tahun', $request->e102_thn);
                $bulan = H102Init::where('tahun', $request->e102_bln);


                $users = DB::select("SELECT e.e102_nl, p.e_nl, p.e_np, k.kodpgw, e.e102_nobatch, k.nosiri, date_format(e102_sdate,'%d-%m-%Y') as sdate
                                FROM  pelesen p, h102_init e, reg_pelesen k
                                WHERE e.e102_thn = '$request->tahun'
                                and e.e102_bln = '$request->bulan'
                                and p.e_nl = e.e102_nl
                                and e.e102_flg = '3'
                                and p.e_nl = k.e_nl
                                and k.e_kat = 'PL102'
                                order by k.kodpgw, k.nosiri");

                if (!$users) {
                    return redirect()->back()
                    ->with('error', 'Penyata Tidak Wujud!');
                }
            } elseif ($sektor == 'PL104') {
                $tahun = H104Init::where('tahun', $request->e104_thn);
                $bulan = H104Init::where('tahun', $request->e104_bln);

                $users = DB::select("SELECT e.e104_nl, p.e_nl, p.e_np, k.kodpgw, e.e104_nobatch, k.nosiri, date_format(e104_sdate,'%d-%m-%Y') as sdate
                                FROM  pelesen p, h104_init e, reg_pelesen k
                                WHERE e.e104_thn = '$request->tahun'
                                and e.e104_bln = '$request->bulan'
                                and p.e_nl = e.e104_nl
                                and e.e104_flg = '3'
                                and p.e_nl = k.e_nl
                                and k.e_kat = 'PL104'
                                order by k.kodpgw, k.nosiri");

                if (!$users) {
                    return redirect()->back()
                    ->with('error', 'Penyata Tidak Wujud!');
                }
            } elseif ($sektor == 'PL111') {
                $tahun = H104Init::where('tahun', $request->e104_thn);
                $bulan = H104Init::where('tahun', $request->e104_bln);

                $users = DB::select("SELECT e.e07_nl, p.e_nl, p.e_np, k.kodpgw, e.e07_nobatch, k.nosiri, date_format(e07_sdate,'%d-%m-%Y') as sdate
                FROM pelesen p, h07_init e, reg_pelesen k
                WHERE e.e07_thn = '$request->tahun'
                and e.e07_bln = '$request->bulan'
                and p.e_nl = e.e07_nl
                and e.e07_flg = '3'
                and p.e_nl = k.e_nl
                and k.e_kat = 'PL111'
                order by k.kodpgw, k.nosiri");

            if (!$users) {
                return redirect()->back()
                ->with('error', 'Penyata Tidak Wujud!');
            }
            } elseif ($sektor == 'PLBIO') {
                $tahun = HBioInit::where('tahun', $request->ebio_thn);
                $bulan = HBioInit::where('bulan', $request->ebio_bln);

                $users = DB::select("SELECT e.ebio_nl, p.e_nl, p.e_np, e.ebio_nobatch, date_format(ebio_sdate,'%d-%m-%Y') as sdate
                FROM pelesen p, h_bio_inits e, reg_pelesen k
                WHERE e.ebio_thn = '$request->tahun'
                and e.ebio_bln = '$request->bulan2'
                and p.e_nl = e.ebio_nl
                and e.ebio_flg = '3'
                and p.e_nl = k.e_nl
                and k.e_kat = 'PLBIO'");

                if (!$users) {
                    return redirect()->back()
                    ->with('error', 'Penyata Tidak Wujud!');
                }
            }

        } elseif ($sumber == 'pleid') {
            if ($sektor == 'PL91') {

                // dd($bulan);
                $users = DB::connection('mysql4')->select("SELECT e.F911A nolesen1, e.F911A nolesen, p.F201T namapremis, e.F911B nobatch,
                    DATE_FORMAT(e.F911E, '%d-%m-%Y') tkhsubmit
                    from PL911P3 e, licensedb.license p
                    where e.F911D = '$request->tahun' and e.F911C = '$request->bulan' and
                    e.F911A = p.F201A");

                    // dd($users);

                        if (!$users) {
                            return redirect()->back()
                            ->with('error', 'Penyata Tidak Wujud!');
                        }
            } elseif ($sektor == 'PL101') {

                $users = DB::connection('mysql4')->select("SELECT e.F101A1 nolesen1, e.F101A1 nolesen, p.F201T namapremis, e.F101A4 nobatch,
                    DATE_FORMAT(e.F101A2, '%d-%m-%Y') tkhsubmit
                    from pl101ap3 e, licensedb.license p
                    where e.F101A6 = '$request->tahun' and e.F101A5 = '$request->bulan' and
                    e.F101A1 = p.F201A");

                        if (!$users) {
                            return redirect()->back()
                            ->with('error', 'Penyata Tidak Wujud!');
                        }
            } elseif ($sektor == 'PL102') {


                $users = DB::connection('mysql4')->select("SELECT e.F1021A nolesen1, e.F1021A nolesen, p.F201T namapremis, e.F1021B nobatch,
                    DATE_FORMAT(e.F1021F, '%d-%m-%Y') tkhsubmit
                    from pl1021p3 e, licensedb.license p
                    where e.F1021D = '$request->tahun' and e.F1021C = '$request->bulan' and
                    e.F1021A = p.F201A");

                if (!$users) {
                    return redirect()->back()
                    ->with('error', 'Penyata Tidak Wujud!');
                }
            } elseif ($sektor == 'PL104') {

                $users = DB::connection('mysql4')->select("SELECT e.F104A1 nolesen1, e.F104A1 nolesen, p.F201T namapremis, e.F104A4 nobatch,
                    DATE_FORMAT(e.F104A2, '%d-%m-%Y') tkhsubmit
                    from pl104ap1 e, licensedb.license p
                    where e.F104A6 = '$request->tahun' and e.F104A5 = '$request->bulan' and
                    e.F104A1 = p.F201A");

                if (!$users) {
                    return redirect()->back()
                    ->with('error', 'Penyata Tidak Wujud!');
                }
            } elseif ($sektor == 'PL111') {

                $users = DB::connection('mysql4')->select("SELECT e.INS_IA nolesen1, e.INS_IA nolesen, p.F201T namapremis, e.INS_IF nobatch,
                        DATE_FORMAT(e.INS_ID, '%d-%m-%Y') tkhsubmit
                        from mpb_insp3a e, licensedb.license p
                        where e.INS_IC = '$request->tahun' and e.INS_IB = '$request->bulan' and
                    e.INS_IA = p.F201A");

            if (!$users) {
                return redirect()->back()
                ->with('error', 'Penyata Tidak Wujud!');
            }
            } elseif ($sektor == 'PLBIO') {
                    return redirect()->back()
                    ->with('error', 'Penyata Tidak Wujud!');
            }

        } else {
            return redirect()->back()
                ->with('error', 'Penyata Tidak Wujud!');
        }

        // $this->process_admin_9penyataterdahulu_bio_form($request, $tahun1);

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
        return view('admin.proses9.9paparsenarai', compact('returnArr', 'sektor', 'users', 'tahun1', 'bulan1', 'sumber'));
    }

    public function papar_penyata(Request $request) {
        if ($request->sumber == 'pleid' && $request->sektor == 'PL91') {
            return $this->process_admin_pleid_buah_form($request->papar_ya, $request->tahun, $request->bulan);
        }
        elseif ($request->sumber == 'pleid' && $request->sektor == 'PL101') {
            return $this->process_admin_pleid_penapis_form($request->papar_ya, $request->tahun, $request->bulan);
        }
        elseif ($request->sumber == 'ekilang' && $request->sektor == 'PL91') {
            return $this->process_admin_9penyataterdahulu_buah_form($request->papar_ya, $request->tahun, $request->bulan);

        }
        elseif ($request->sumber == 'ekilang' && $request->sektor == 'PL101') {
            return $this->process_admin_9penyataterdahulu_penapis_form($request->papar_ya, $request->tahun, $request->bulan);

        }
        elseif ($request->sumber == 'ekilang' && $request->sektor == 'PL102') {
            return $this->process_admin_9penyataterdahulu_isirung_form($request->papar_ya, $request->tahun, $request->bulan);

        }
        elseif ($request->sumber == 'ekilang' && $request->sektor == 'PL104') {
            return $this->process_admin_9penyataterdahulu_oleo_form($request->papar_ya, $request->tahun, $request->bulan);

        }
        elseif ($request->sumber == 'ekilang' && $request->sektor == 'PL111') {
            return $this->process_admin_9penyataterdahulu_simpanan_form($request->papar_ya, $request->tahun, $request->bulan);

        }
        elseif ($request->sumber == 'ekilang' && $request->sektor == 'PLBIO') {
            return $this->process_admin_9penyataterdahulu_bio_form($request->papar_ya, $request->tahun, $request->bulan2);

        }
    }

    // public function admin_9penyataterdahulu_process(Request $request)
    // {
    //     //dd($request->all());
    //     $sektor = $request->sektor;


    //     $tahun = H91Init::where('e91_thn', $request->tahun);
    //     $bulan = H91Init::where('e91_bln', $request->bulan);


    //         $users = DB::select("SELECT e.e07_nl, p.e_nl, p.e_np, k.kodpgw, e.e07_nobatch, k.nosiri, date_format(e07_sdate,'%d-%m-%Y') as sdate
    //                     FROM pelesen p, h07_init e, reg_pelesen k
    //                     WHERE e.e07_thn = '$request->tahun'
    //                     and e.e07_bln = '$request->bulan'
    //                     and p.e_nl = e.e07_nl
    //                     and e.e07_flg = '3'
    //                     and p.e_nl = k.e_nl
    //                     and k.e_kat = 'PL111'
    //                     order by k.kodpgw, k.nosiri");


    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
    //         ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Senarai Penyata Terdahulu"],
    //     ];

    //     $kembali = route('admin.9penyataterdahulu');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';

    //     return view('admin.proses9.9paparsenarai', compact('returnArr', 'layout', 'tahun', 'bulan', 'users', 'sektor'));
    // }

    public function process_admin_9penyataterdahulu_buah_form($nobatch, $tahun, $bulan)
    {
        // dd($request->all());
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Buah"],
        ];

        $kembali = route('admin.9penyataterdahulu.process');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        // $sektor = $request->sektor;


        $tahun = H91Init::where('e91_thn', $tahun);
        $bulan = H91Init::where('e91_bln', $tahun);
        // dd($bulan);

        foreach ($nobatch as $key => $e91_nobatch) {
            // dd($e91_nobatch);

            $pelesens[$key] = (object)[];
            $penyata[$key]  = H91Init::with('h_pelesen')->find($e91_nobatch);
            // $penyata[$key]  = H91Init::with('pelesen')->whereRelation('pelesen','e_nl', $penyata_id[$key] ->e91_nl)->first();
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata_id[$key] ->e91_nl)->first();

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e91_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');


        }
//   dd($pelesens);
        // dd($penyata);

        $layout = 'layouts.main';

        // dd($penyata);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-buah-multi', compact('returnArr', 'layout', 'tahun', 'bulan', 'pelesens', 'penyata', 'myDateTime', 'formatteddate'));
    }

    public function process_admin_pleid_buah_form($nobatch, $tahun, $bulan)
    {
        $bulans = array(
            "bulan" => $bulan
          );
        $tahuns = array(
            "tahun" => $tahun
          );
        // dd($bulans);

        // dd($nobatch);
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Buah"],
        ];

        $kembali = route('admin.9penyataterdahulu.process');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        // $sektor = $request->sektor;


        // $tahun = H91Init::where('e91_thn', $request->tahun);
        // $bulan = H91Init::where('e91_bln', $request->bulan);
        // dd($bulan);
        // $nolesen = auth()->users->username;
        foreach ($nobatch as $key => $e91_nobatch) {
            $pelesens[$key] = (object)[];

            $query[$key] = H91Init::with('pelesen')->where('e91_nobatch', $e91_nobatch)->first();

            $penyata[$key] = DB::connection('mysql4')->select("SELECT e.F911A nolesen1, e.F911A nolesen, p.F201T namapremis, e.F911B nobatch,
                      DATE_FORMAT(e.F911E, '%d-%m-%Y') tkhsubmit,
                    F911G1, F911G2, F911G3, F911G4, F911H1, F911H2,
                    F911H3, F911H4, F911I, F911J1, F911J2,
                    F911J3, F911K1, F911K2, F911K3, F911K4,
                    F911L1, F911L2, F911L3, F911N1, F911N2, F911N3, F911N4,
                    F911O, F911P, F911Q,
                    F911R,
                    F911S1, F911S2, F911S3, F911S4, F911S5, F911S6,
                    F911T1, F911T2, F911T3, F911T4, F911T5, F911T6, F911T7, F911T8,
                    F911U1, F911U2, F911U3
               from PL911P3 e, licensedb.license p
               where
                     e.F911A = p.F201A and e.F911B = '$e91_nobatch'");

                    //  dd($penyata[$key]);

            // $penyata[$key]  = H91Init::with('pelesen')->whereRelation('pelesen','e_nl', $penyata_id[$key] ->e91_nl)->first();
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata_id[$key] ->e91_nl)->first();

            // $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->tkhsubmit);
            // $formatteddate = $myDateTime->format('d-m-Y');

        }
//   dd($query);
// dd($penyata);



        $layout = 'layouts.main';

        // dd($penyata);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-pleid-buah-multi', compact('returnArr', 'layout', 'query', 'pelesens', 'penyata', 'tahun', 'bulan','bulans','tahuns'));
    }

    public function process_admin_9penyataterdahulu_penapis_form($nobatch, $tahun, $bulan)
    {
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetakpenapis'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Penapis"],
        ];

        $kembali = route('admin.9penyataterdahulu.penapis.process');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $tahun = H101Init::where('e101_thn', $tahun);
        $bulan = H101Init::where('e101_bln', $bulan);
        // dd($bulan);
        foreach ($nobatch as $key => $e101_nobatch) {
            $pelesens[$key] = (object)[];
            $penyata[$key]  = H101Init::with('h_pelesen')->find($e101_nobatch);

            // $pelesens[$key] = Pelesen::where('e_nl', $penyata[$key] ->e101_nl)->first();
            // dd($penyata);

            $i = H101B::with('h101init', 'produk')->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '01');
            })->get();
            $totalib5 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b5');
            $totalib6 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b6');
            $totalib7 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b7');
            $totalib8 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b8');
            $totalib9 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b9');
            $totalib10 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b10');
            $totalib11 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b11');
            $totalib12 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b12');
            $totalib13 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b13');
            $totalib14 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '1')->sum('e101_b14');

            $ii = H101B::with('h101init', 'produk')->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '02');
            })->get();
            $totaliib5 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b5');
            $totaliib6 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b6');
            $totaliib7 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b7');
            $totaliib8 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b8');
            $totaliib9 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b9');
            $totaliib10 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b10');
            $totaliib11 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b11');
            $totaliib12 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b12');
            $totaliib13 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b13');
            $totaliib14 = DB::table("h101_b")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_b3', '2')->sum('e101_b14');

            $iva = H101C::with('h101init', 'produk')->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '1')->get();
            $totalivac5 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '1')->sum('e101_c5');
            $totalivac6 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '1')->sum('e101_c6');
            $totalivac7 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '1')->sum('e101_c7');
            $totalivac8 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '1')->sum('e101_c8');
            $totalivac9 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '1')->sum('e101_c9');
            $totalivac10 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '1')->sum('e101_c10');

            $ivb = H101C::with('h101init', 'produk')->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '2')->get();
            $totalivbc5 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '2')->sum('e101_c5');
            $totalivbc6 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '2')->sum('e101_c6');
            $totalivbc7 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '2')->sum('e101_c7');
            $totalivbc8 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '2')->sum('e101_c8');
            $totalivbc9 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '2')->sum('e101_c9');
            $totalivbc10 = DB::table("h101_c")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_c3', '2')->sum('e101_c10');

            $va = H101D::with('h101init', 'prodcat')->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '1')->get();
            $totalvad5 = DB::table("h101_d")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '1')->sum('e101_d5');
            $totalvad6 = DB::table("h101_d")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '1')->sum('e101_d6');
            $totalvad7 = DB::table("h101_d")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '1')->sum('e101_d7');
            $totalvad8 = DB::table("h101_d")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '1')->sum('e101_d8');

            $vb = H101D::with('h101init', 'prodcat')->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '2')->get();
            $totalvbd5 = DB::table("h101_d")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '2')->sum('e101_d5');
            $totalvbd6 = DB::table("h101_d")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '2')->sum('e101_d6');
            $totalvbd7 = DB::table("h101_d")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '2')->sum('e101_d7');
            $totalvbd8 = DB::table("h101_d")->where('e101_nobatch', $penyata[$key] ->e101_nobatch)->where('e101_d3', '2')->sum('e101_d8');

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key] ->e101_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
        }
        $layout = 'layouts.main';

        // dd($pelesens);
        // dd($penyata);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-penapis-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'i',
            'ii',
            'iva',
            'ivb',
            'va',
            'vb',
            'totalib5',
            'totaliib5',
            'totalivac5',
            'totalvad5',
            'totalvbd5',
            'totalib6',
            'totaliib6',
            'totalivac6',
            'totalivbc6',
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
            'totaliib12',
            'totalib13',
            'totaliib13',
            'totalib14',
            'totaliib14'
        ));
    }

    public function process_admin_pleid_penapis_form($nobatch, $tahun, $bulan)
    {

        // dd($bulan);
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Buah"],
        ];

        $kembali = route('admin.9penyataterdahulu.process');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        // $sektor = $request->sektor;


        // $tahun = H91Init::where('e91_thn', $request->tahun);
        // $bulan = H91Init::where('e91_bln', $request->bulan);
        // dd($bulan);
        // $nolesen = auth()->users->username;
        foreach ($nobatch as $key => $nobatch1) {
            $pelesens[$key] = (object)[];

            $query = H101Init::with('h_pelesen')->where('e101_nobatch', $nobatch1)->first();
            dd($nobatch);
            $users = DB::connection('mysql4')->select("SELECT DATE_FORMAT(e.F101A2, '%d-%m-%Y') tkhsubmit from pl101ap3 e where e.F101A4 = '$nobatch1'");


            $penyata1[$key] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101B4, e.F101B5, e.F101B6, e.F101B7, e.F101B8, e.F101B9,
            e.F101B10, e.F101B11, e.F101B12, e.F101B13, e.F101B14
            from pl101bp3 e, codedb.commodity_l p
            where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l
            order by e.F101B4");

            $totalib5 = DB::connection('mysql4')->select("SELECT SUM(e.F101B5) FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib6 = DB::connection('mysql4')->select("SELECT SUM(e.F101B6) FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib7 = DB::connection('mysql4')->select("SELECT SUM(e.F101B7) FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib8 = DB::connection('mysql4')->select("SELECT SUM(e.F101B8) FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib9 = DB::connection('mysql4')->select("SELECT SUM(e.F101B9) FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib10 = DB::connection('mysql4')->select("SELECT SUM(e.F101B10) FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib11 = DB::connection('mysql4')->select("SELECT SUM(e.F101B11) FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib12 = DB::connection('mysql4')->select("SELECT SUM(e.F101B12) FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib13 = DB::connection('mysql4')->select("SELECT SUM(e.F101B13) FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
            $totalib14 = DB::connection('mysql4')->select("SELECT SUM(e.F101B14) FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");

            // dd($penyata);

            $penyata2[$key] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101B4, e.F101B5, e.F101B6, e.F101B7, e.F101B8, e.F101B9,
            e.F101B10, e.F101B11, e.F101B12, e.F101B13, e.F101B14
            from pl101bp3 e, codedb.commodity_l p
            where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l
            order by e.F101B4");
            // dd($penyata);

            $penyata3[$key] = DB::connection('mysql4')->select("SELECT F101A7, F101A8, F101A9
            from pl101ap3
            where F101A4 = '$nobatch1'");
            // dd($penyata);

            $penyata4a[$key] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101C4, e.F101C5, e.F101C6, e.F101C7, e.F101C8, e.F101C9,
            e.F101C10
            from pl101cp3 e, codedb.commodity_l p
            where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
            // dd($penyata);

            $penyata4b[$key] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101C4, e.F101C5, e.F101C6, e.F101C7, e.F101C8, e.F101C9,
            e.F101C10
            from pl101cp3 e, codedb.commodity_l p
            where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
            // dd($penyata);

            $penyata5a[$key] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101C4, e.F101C5, e.F101C6, e.F101C7, e.F101C8, e.F101C9,
            e.F101C10
            from pl101cp3 e, codedb.commodity_l p
            where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
            // dd($penyata);

            $penyata5b[$key] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101C4, e.F101C5, e.F101C6, e.F101C7, e.F101C8, e.F101C9,
            e.F101C10
            from pl101cp3 e, codedb.commodity_l p
            where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
            // dd($penyata);

            // $penyata[$key]  = H91Init::with('pelesen')->whereRelation('pelesen','e_nl', $penyata_id[$key] ->e91_nl)->first();
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata_id[$key] ->e91_nl)->first();

            // $myDateTime = DateTime::createFromFormat('Y-m-d', $users->tkhsubmit);
            // $formatteddate = $myDateTime->format('d-m-Y');

        }
//   dd($pelesens);


        $layout = 'layouts.main';

        // dd($penyata);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-pleid-buah-multi', compact(
            'returnArr', 'layout', 'query', 'pelesens',
            'penyata1',
            'penyata2',
            'penyata3',
            'penyata4a',
            'penyata4b',
            'penyata5a',
            'penyata5b',
             'tahun', 'bulan',
            'totalib5',
            'totalib6',
            'totalib7',
            'totalib8',
            'totalib9',
            'totalib10',
            'totalib11',
            'totalib12',
            'totalib13',
            'totalib14',
            'users',
        ));
    }


    public function process_admin_9penyataterdahulu_isirung_form($nobatch, $tahun, $bulan)
    {

        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetakisirung'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Isirung"],
        ];

        $kembali = route('admin.9penyataterdahulu.isirung.process');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $tahun = H102Init::where('e102_thn', $tahun);
        $bulan = H102Init::where('e102_bln', $bulan);
        // dd($bulan);
        foreach ($nobatch as $key => $e102_nobatch) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = H102Init::with('h_pelesen')->find($e102_nobatch);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e102_nl)->first();

            $iii = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $penyata[$key]->e102_nobatch)->where('e102_b3', '51')->get();
            $totaliii = DB::table("h102b")->where('e102_nobatch', $penyata[$key]->e102_nobatch)->where('e102_b3', '51')->sum('e102_b6');
            $iv = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $penyata[$key]->e102_nobatch)->where('e102_b3', '04')->get();
            // dd($iv);
            $totaliv = DB::table("h102b")->where('e102_nobatch', $penyata[$key]->e102_nobatch)->where('e102_b3', '04')->sum('e102_b6');


            $v = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $penyata[$key]->e102_nobatch)->where('e102_b3', '33')->get();
            // dd($v);
            $totalv = DB::table("h102b")->where('e102_nobatch', $penyata[$key]->e102_nobatch)->where('e102_b3', '33')->sum('e102_b6');


            $vi = H102c::with('h102init', 'produk', 'negara')->where('e102_nobatch', $penyata[$key]->e102_nobatch)->where('e102_c3', '1')->get();
            // dd($vi);

            $vii = H102c::with('h102init', 'produk', 'negara')->where('e102_nobatch', $penyata[$key]->e102_nobatch)->where('e102_c3', '2')->get();

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e102_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
        }
        $layout = 'layouts.main';

        // dd($penyata);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-isirung-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'iii',
            'totaliii',
            'iv',
            'totaliv',
            'v',
            'totalv',
            'vi',
            'vii'
        ));
    }


    public function process_admin_9penyataterdahulu_oleo_form($nobatch, $tahun, $bulan)
    {
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetakoleo'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Oleokimia"],
        ];

        $kembali = route('admin.9penyataterdahulu.oleokimia.process');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $tahun = H104Init::where('e104_thn', $tahun);
        $bulan = H104Init::where('e104_bln', $bulan);
        // dd($bulan);
        foreach ($nobatch as $key => $e104_nobatch) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = H104Init::with('h_pelesen')->find($e104_nobatch);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();


            $ia = H104B::with('h104init', 'produk')->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->get();
            $totalia5 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b5');
            $totalia6 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b6');
            $totalia7 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b7');
            $totalia8 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b8');
            $totalia9 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b9');
            $totalia10 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b10');
            $totalia11 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b11');
            $totalia12 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b12');
            $totalia13 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '1')->sum('e104_b13');

            $ib = H104B::with('h104init', 'produk')->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->get();
            $totalib5 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b5');
            $totalib6 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b6');
            $totalib7 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b7');
            $totalib8 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b8');
            $totalib9 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b9');
            $totalib10 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b10');
            $totalib11 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b11');
            $totalib12 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b12');
            $totalib13 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '2')->sum('e104_b13');

            $ic = H104B::with('h104init', 'produk')->where('e104_nobatch', $penyata[$key]->e104_nobatch)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '08');
            })->get();
            $totalic5 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b5');
            $totalic6 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b6');
            $totalic7 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b7');
            $totalic8 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b8');
            $totalic9 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b9');
            $totalic10 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b10');
            $totalic11 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b11');
            $totalic12 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b12');
            $totalic13 = DB::table("h104_b")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_b3', '3')->sum('e104_b13');

            $ii = H104Init::where('e104_nl', auth()->user()->username)->first();


            $iii = H104C::with('h104init', 'produk')->where('e104_nobatch', $penyata[$key]->e104_nobatch)->get();
            $totaliii4 = DB::table("h104_c")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->sum('e104_c4');
            $totaliii5 = DB::table("h104_c")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->sum('e104_c5');
            $totaliii6 = DB::table("h104_c")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->sum('e104_c6');
            $totaliii7 = DB::table("h104_c")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->sum('e104_c7');
            $totaliii8 = DB::table("h104_c")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->sum('e104_c8');

            $iv = H104D::with('h104init', 'produk', 'negara')->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_d3', '1')->get();

            if ($iv) {
                $totaliv7 = DB::table("h104_d")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_d3', '1')->sum('e104_d7');
                $totaliv8 = DB::table("h104_d")->where('e104_nobatch', $penyata[$key]->e104_nobatch)->where('e104_d3', '1')->sum('e104_d8');

                // dd($penyata->e014_nobatch = '062019CA0004');

                // $myDateTime2 = DateTime::createFromFormat('Y-m-d', $iv->e104_d6);
                // $formatteddat2 = $myDateTime2->format('d-m-Y');
            } else {
                $myDateTime2 = [];
                $formatteddat2 = [];
            }

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e104_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
        }


        $layout = 'layouts.main';

        // dd($tahun);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-oleo-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'ia',
            'ib',
            'ic',
            'ii',
            'iii',
            'iv',
            'totalia5',
            'totalia6',
            'totalia7',
            'totalia8',
            'totalia9',
            'totalia10',
            'totalia11',
            'totalia12',
            'totalia13',
            'totalib5',
            'totalib6',
            'totalib7',
            'totalib8',
            'totalib9',
            'totalib10',
            'totalib11',
            'totalib12',
            'totalib13',
            'totalic5',
            'totalic6',
            'totalic7',
            'totalic8',
            'totalic9',
            'totalic10',
            'totalic11',
            'totalic12',
            'totalic13',
            'totaliii4',
            'totaliii5',
            'totaliii6',
            'totaliii7',
            'totaliii8',
            'totaliv7',
            'totaliv8',
            // 'myDateTime',/
            // 'myDateTime2',
            // 'formatteddat2',
            // 'formatteddate',
        ));
    }

    public function process_admin_9penyataterdahulu_simpanan_form($nobatch, $tahun, $bulan)
    {
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetaksimpanan'), 'name' => "Papar & Cetak Penyata Bulanan Pusat Simpanan"],
        ];

        $kembali = route('admin.9penyataterdahulusimpanan');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $tahun = H07Init::where('e07_thn', $tahun);
        $bulan = H07Init::where('e07_bln', $bulan);
        // dd($bulan);
        foreach ($nobatch as $key => $e07_nobatch) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = H07Init::with('h_pelesen')->find($e07_nobatch);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e07_nl)->first();
            $a = H07Btranshipment::with('h07init', 'produk')->where('e07bt_nobatch', $penyata[$key]->e07_nobatch)->get();
            $total = DB::table("h07_btranshipment")->where('e07bt_nobatch', $penyata[$key]->e07_nobatch)->sum('e07bt_stokawal');
            $total2 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $penyata[$key]->e07_nobatch)->sum('e07bt_terima');
            $total3 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $penyata[$key]->e07_nobatch)->sum('e07bt_edaran');
            $total4 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $penyata[$key]->e07_nobatch)->sum('e07bt_pelarasan');
            $total5 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $penyata[$key]->e07_nobatch)->sum('e07bt_stokakhir');

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e07_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
        }
        $layout = 'layouts.main';

        // dd($penyata);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-simpanan-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'a',
            'total',
            'total2',
            'total3',
            'total4',
            'total5'
        ));
    }

    public function process_admin_9penyataterdahulu_bio_form($nobatch, $tahun, $bulan)
    {

        // $this->admin_9penyataterdahulu_process($tahun1);
        // dd($nobatch);

        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.9penyataterdahulu.bio.process');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $tahun = HBioInit::where('ebio_thn', $tahun);
        $bulan = HBioInit::where('ebio_bln', $bulan);
        // dd($bulan);
        foreach ($nobatch as $key => $ebio_nobatch) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = HBioInit::with('h_pelesen')->find($ebio_nobatch);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();


            $ia[$key] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $penyata[$key]->ebio_nobatch)->where('ebio_b3', '1')->orderBy('ebio_b4')->get();


            $ib[$key] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $penyata[$key]->ebio_nobatch)->where('ebio_b3', '2')->orderBy('ebio_b4')->get();


            $ic[$key] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $penyata[$key]->ebio_nobatch)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();



            $ii[$key] = HHari::where('lesen',  $penyata[$key]->ebio_nl)->where('tahunbhg2', $penyata[$key]->ebio_thn)->where('bulanbhg2', $penyata[$key]->ebio_bln)->first();


            $iii[$key]  = HBioC::with('hbioinit', 'produk')->where('ebio_nobatch', $penyata[$key]->ebio_nobatch)->get();
// dd($ib);

            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->ebio_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
        }
        // dd($ib);


        $layout = 'layouts.main';


        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-bio-multi', compact(
            'returnArr',
            'layout',
            'formatteddate',
            'tahun',
            'bulan',
            'pelesens',
            'penyata',
            'ia',
            'ib',
            'ic',
            'ii',
            'iii',

        ));
    }
}
