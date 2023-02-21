<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\E102Init;
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
                $users = DB::select("SELECT DISTINCT e.e91_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, e.e91_nobatch,  date_format(e91_sdate,'%d-%m-%Y') as sdate
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


                $users = DB::select("SELECT DISTINCT  e.e101_nl, p.e_nl, p.e_np, k.kodpgw, e.e101_nobatch, k.nosiri,date_format(e101_sdate,'%d-%m-%Y') as sdate
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


                $users = DB::select("SELECT DISTINCT e.e102_nl, p.e_nl, p.e_np, k.kodpgw, e.e102_nobatch, k.nosiri, date_format(e102_sdate,'%d-%m-%Y') as sdate
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

                $users = DB::select("SELECT DISTINCT  e.e104_nl, p.e_nl, p.e_np, k.kodpgw, e.e104_nobatch, k.nosiri, date_format(e104_sdate,'%d-%m-%Y') as sdate
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

                $users = DB::select("SELECT DISTINCT  e.e07_nl, p.e_nl, p.e_np, k.kodpgw, e.e07_nobatch, k.nosiri, date_format(e07_sdate,'%d-%m-%Y') as sdate
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

                $users = DB::select("SELECT DISTINCT e.ebio_nl, p.e_nl, p.e_np, e.ebio_nobatch, date_format(ebio_sdate,'%d-%m-%Y') as sdate
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
        // dd($request->all());
        if ($request->sumber == 'pleid' && $request->sektor == 'PL91') {
            return $this->process_admin_pleid_buah_form($request->papar_ya, $request->tahun, $request->bulan);
        }
        elseif ($request->sumber == 'pleid' && $request->sektor == 'PL101') {
            return $this->process_admin_pleid_penapis_form($request->papar_ya, $request->tahun, $request->bulan);
        }
        elseif ($request->sumber == 'pleid' && $request->sektor == 'PL102') {
            return $this->process_admin_pleid_isirung_form($request->papar_ya, $request->e_nl, $request->tahun, $request->bulan);
        }
        elseif ($request->sumber == 'pleid' && $request->sektor == 'PL104') {
            return $this->process_admin_pleid_oleo_form($request->papar_ya, $request->e_nl, $request->tahun, $request->bulan);
        }
        elseif ($request->sumber == 'pleid' && $request->sektor == 'PL111') {
            return $this->process_admin_pleid_simpanan_form($request->papar_ya, $request->tahun, $request->bulan);
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
            return $this->process_admin_9penyataterdahulu_bio_form($request->papar_ya, $request->tahun, $request->bulan);

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
            if($penyata[$key]->h_pelesen){

                    $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->e91_sdate);
                    $formatteddate = $myDateTime->format('d-m-Y');

            }
            else{
                return redirect()->back()
                ->with('error', 'Data Tidak Wujud!');
            }
        }
//   dd($pelesens);
        // dd($kembali);

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

        // dd($bulan);
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }

        if ($tahun <= 2022) {

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

                        foreach ($nobatch as $key => $e91_nobatch) {
                            $pelesens[$e91_nobatch] = (object)[];

                            $query[$e91_nobatch] = DB::select("SELECT p.kodpgw, p.nosiri, e.e91_bln, e.e91_thn, p.e_nl, p.e_np, p.e_ap1, p.e_ap2, e.e91_nobatch,
                            p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                            FROM h91_init e, h_pelesen p
                            WHERE p.e_nl = e.e91_nl
                            AND e.e91_nobatch = '$e91_nobatch'
                            AND e.e91_thn = '$tahun'
                            AND p.e_thn = '2022'
                            AND p.e_bln = '10'
                            AND e.e91_bln = '$bulan'");

                            $penyata[$e91_nobatch] = DB::connection('mysql4')->select("SELECT e.F911A nolesen1, e.F911A nolesen, p.F201T namapremis, e.F911B nobatch,
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

                        }

                        $layout = 'layouts.main';

                        // dd($penyata);
                        // $data = DB::table('pelesen')->get();
                        return view('admin.proses9.9papar-pleid-buah-multi', compact('returnArr', 'layout', 'query', 'pelesens', 'penyata', 'tahun', 'bulan','bulans','tahuns'));


        } elseif ($tahun > 2022) {

            foreach ($nobatch as $no){
                // dd($no);
                 $checks = H91Init::with('h_pelesen')->where('e91_nobatch', $no)->where('e91_thn', $tahun)->where('e91_bln', $bulan)->get();
            // dd($checks);
            }

            if ($checks) {

                foreach($checks as $check){
                    if ($check->h_pelesen->e_thn == $tahun && $check->h_pelesen->e_bln == $bulan) {
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

                        foreach ($nobatch as $key => $e91_nobatch) {
                            $pelesens[$e91_nobatch] = (object)[];

                            $query[$e91_nobatch] = DB::select("SELECT p.kodpgw, p.nosiri, e.e91_bln, e.e91_thn, p.e_nl, p.e_np, p.e_ap1, p.e_ap2, e.e91_nobatch,
                            p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                            FROM h91_init e, h_pelesen p
                            WHERE p.e_nl = e.e91_nl
                            AND e.e91_nobatch = '$e91_nobatch'
                            AND e.e91_thn = '$tahun'
                            AND p.e_kat = 'PL91'
                            AND p.e_thn = '$tahun'
                            AND p.e_bln = '$bulan'
                            AND e.e91_bln = '$bulan'");

                            $penyata[$e91_nobatch] = DB::connection('mysql4')->select("SELECT e.F911A nolesen1, e.F911A nolesen, p.F201T namapremis, e.F911B nobatch,
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

                        }

                        $layout = 'layouts.main';

                        // dd($penyata);
                        // $data = DB::table('pelesen')->get();
                        return view('admin.proses9.9papar-pleid-buah-multi', compact('returnArr', 'layout', 'query', 'pelesens', 'penyata', 'tahun', 'bulan','bulans','tahuns','checks'));
                    }
                }
            }
            else {
                    return redirect()->back()->with('error', 'Maklumat pelesen tidak wujud. Sila port data');
            }
        }
        else {
            return redirect()->back()->with('error', 'Maklumat pelesen tidak wujud. Sila port data');

        }
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
            if($penyata[$key]->h_pelesen){

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

            else{
                return redirect()->back()
                ->with('error', 'Data Tidak Wujud!');
            }


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
        // dd($nobatch);
        // dd($bulan);
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }
//  dd($tahun <= 2022);
        if ($tahun <= 2022) {


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

            foreach ($nobatch as $key => $nobatch1) {
                // dd($nobatch1);
                $pelesens[$nobatch1] = (object)[];


            $query[$nobatch1] = DB::select("SELECT p.kodpgw, p.nosiri, e.e101_bln, e.e101_thn, p.e_nl, p.e_np, p.e_ap1, p.e_ap2, e.e101_nobatch,
                p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                FROM h101_init e, h_pelesen p
                WHERE p.e_nl = e.e101_nl
                AND e.e101_nobatch = '$nobatch1'
                AND e.e101_thn = '$tahun'
                AND p.e_thn = '2022'
                AND p.e_bln = '10'
                AND e.e101_bln = '$bulan'");

                // H101Init::with('h_pelesen')->where('e101_nobatch', $nobatch1)->where('e101_thn', $tahun)->where('e101_bln', $bulan)->first();
                // dd($query);
                $users[$nobatch1] = DB::connection('mysql4')->select("SELECT DATE_FORMAT(e.F101A2, '%d-%m-%Y') tkhsubmit from pl101ap3 e where e.F101A4 = '$nobatch1'");


                $penyata1[$nobatch1] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101B4, e.F101B5, e.F101B6, e.F101B7, e.F101B8, e.F101B9,
                e.F101B10, e.F101B11, e.F101B12, e.F101B13, e.F101B14
                from pl101bp3 e, codedb.commodity_l p
                where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l
                order by e.F101B4");

                $totalib5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B5) as total5 FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B6) as total6 FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B7) as total7 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B8) as total8 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib9[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B9) as total9 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib10[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B10) as total10 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib11[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B11) as total11 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib12[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B12) as total12 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib13[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B13) as total13 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                $totalib14[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B14) as total14 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");

                // dd($penyata);

                $penyata2[$nobatch1] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101B4, e.F101B5, e.F101B6, e.F101B7, e.F101B8, e.F101B9,
                e.F101B10, e.F101B11, e.F101B12, e.F101B13, e.F101B14
                from pl101bp3 e, codedb.commodity_l p
                where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l
                order by e.F101B4");
                // dd($penyata);

                $totaliib5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B5) as total5 FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B6) as total6 FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B7) as total7 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B8) as total8 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib9[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B9) as total9 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib10[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B10) as total10 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib11[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B11) as total11 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib12[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B12) as total12 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib13[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B13) as total13 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                $totaliib14[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B14) as total14 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");


                $penyata3[$nobatch1] = DB::connection('mysql4')->select("SELECT F101A7, F101A8, F101A9
                from pl101ap3
                where F101A4 = '$nobatch1'");
                // dd($penyata);

                $penyata4a[$nobatch1] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101C4, e.F101C5, e.F101C6, e.F101C7, e.F101C8, e.F101C9,
                e.F101C10
                from pl101cp3 e, codedb.commodity_l p
                where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                // dd($penyata);

                $totalivac5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C5) as total5 FROM pl101cp3 e, codedb.commodity_l p where  e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                $totalivac6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C6) as total6 FROM pl101cp3 e, codedb.commodity_l p where  e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                $totalivac7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C7) as total7 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                $totalivac8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C8) as total8 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                $totalivac9[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C9) as total9 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                $totalivac10[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C10) as total10 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");


                $penyata4b[$nobatch1] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101C4, e.F101C5, e.F101C6, e.F101C7, e.F101C8, e.F101C9,
                e.F101C10
                from pl101cp3 e, codedb.commodity_l p
                where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                // dd($penyata);

                $totalivbc5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C5) as total5 FROM pl101cp3 e, codedb.commodity_l p where  e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                $totalivbc6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C6) as total6 FROM pl101cp3 e, codedb.commodity_l p where  e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                $totalivbc7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C7) as total7 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                $totalivbc8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C8) as total8 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                $totalivbc9[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C9) as total9 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                $totalivbc10[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C10) as total10 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");


                $penyata5a[$nobatch1] = DB::connection('mysql4')->select("SELECT p.catname, e.F101D5, e.F101D6, e.F101D7, e.F101D8
                from pl101dp3 e, prod_cat p
                where e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");
                // dd($penyata);

                $totalvad5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D5) as total5 FROM pl101dp3 e, prod_cat p where  e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");
                $totalvad6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D6) as total6 FROM pl101dp3 e, prod_cat p where  e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");
                $totalvad7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D7) as total7 FROM pl101dp3 e, prod_cat p where e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");
                $totalvad8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D8) as total8 FROM pl101dp3 e, prod_cat p where e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");


                $penyata5b[$nobatch1] = DB::connection('mysql4')->select("SELECT p.catname, e.F101D5, e.F101D6, e.F101D7, e.F101D8
                from pl101dp3 e, prod_cat p
                where e.F101D2 = '$nobatch1' and e.F101D3= '2' and e.F101D4 = p.catid");
                // dd($penyata);

                $totalvbd5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D5) as total5 FROM pl101dp3 e, prod_cat p where  e.F101D2 = '$nobatch1' and e.F101D3 = '2' and e.F101D4 = p.catid");
                $totalvbd6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D6) as total6 FROM pl101dp3 e, prod_cat p where  e.F101D2 = '$nobatch1' and e.F101D3 = '2' and e.F101D4 = p.catid");
                $totalvbd7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D7) as total7 FROM pl101dp3 e, prod_cat p where e.F101D2 = '$nobatch1' and e.F101D3 = '2' and e.F101D4 = p.catid");
                $totalvbd8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D8) as total8 FROM pl101dp3 e, prod_cat p where e.F101D2 = '$nobatch1' and e.F101D3 = '2' and e.F101D4 = p.catid");



                // $penyata[$key]  = H91Init::with('pelesen')->whereRelation('pelesen','e_nl', $penyata_id[$key] ->e91_nl)->first();
                // $pelesens[$key] = Pelesen::where('e_nl', $penyata_id[$key] ->e91_nl)->first();

                // $myDateTime = DateTime::createFromFormat('Y-m-d', $users->tkhsubmit);
                // $formatteddate = $myDateTime->format('d-m-Y');

            }
            // dd($query);
    //   dd($totaliib5);


            $layout = 'layouts.main';

            // dd($penyata);
            // $data = DB::table('pelesen')->get();
            return view('admin.proses9.9papar-pleid-penapis-multi', compact(
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
                'totaliib5',
                'totaliib6',
                'totaliib7',
                'totaliib8',
                'totaliib9',
                'totaliib10',
                'totaliib11',
                'totaliib12',
                'totaliib13',
                'totaliib14',
                'totalivac5',
                'totalivac6',
                'totalivac7',
                'totalivac8',
                'totalivac9',
                'totalivac10',
                'totalivbc5',
                'totalivbc6',
                'totalivbc7',
                'totalivbc8',
                'totalivbc9',
                'totalivbc10',
                'totalvad5',
                'totalvad6',
                'totalvad7',
                'totalvad8',
                'totalvbd5',
                'totalvbd6',
                'totalvbd7',
                'totalvbd8',
                'users',
            ));

            } elseif ($tahun > 2022) {
                $check = H101Init::with('h_pelesen')->where('e101_nobatch', $nobatch)->where('e101_thn', $tahun)->where('e101_bln', $bulan)->first();

                    foreach($check->h_pelesen as $pelesen) {
                        if ($pelesen->e_thn == $tahun && $pelesen->e_bln == $bulan) {
                            $data_pelesen = $pelesen;
                        }
                    }

                    if ($data_pelesen->e_thn == $tahun && $data_pelesen->e_bln == $bulan) {

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

                        foreach ($nobatch as $key => $nobatch1) {
                            // dd($nobatch1);
                            $pelesens[$nobatch1] = (object)[];
                            $bln = ltrim($bulan, "0");

                            $query[$nobatch1] = DB::select("SELECT p.kodpgw, p.nosiri, e.e101_bln, e.e101_thn, p.e_nl, p.e_np, p.e_kat, p.e_ap1, p.e_ap2, e.e101_nobatch,
                            p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                            FROM h101_init e, h_pelesen p
                            WHERE p.e_nl = e.e101_nl
                            AND e.e101_nobatch = '$nobatch1'
                            AND e.e101_thn = '$tahun'
                            AND p.e_kat = 'PL101'
                            AND p.e_thn = '$tahun'
                            AND p.e_bln = '$bln'
                            AND e.e101_bln = '$bulan'");

                            // H101Init::with('h_pelesen')->where('e101_nobatch', $nobatch1)->where('e101_thn', $tahun)->where('e101_bln', $bulan)->first();
                            // dd($query);
                            $users[$nobatch1] = DB::connection('mysql4')->select("SELECT DATE_FORMAT(e.F101A2, '%d-%m-%Y') tkhsubmit from pl101ap3 e where e.F101A4 = '$nobatch1'");


                            $penyata1[$nobatch1] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101B4, e.F101B5, e.F101B6, e.F101B7, e.F101B8, e.F101B9,
                            e.F101B10, e.F101B11, e.F101B12, e.F101B13, e.F101B14
                            from pl101bp3 e, codedb.commodity_l p
                            where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l
                            order by e.F101B4");

                            $totalib5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B5) as total5 FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B6) as total6 FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B7) as total7 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B8) as total8 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib9[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B9) as total9 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib10[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B10) as total10 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib11[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B11) as total11 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib12[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B12) as total12 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib13[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B13) as total13 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");
                            $totalib14[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B14) as total14 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '1' and e.F101B4 = p.comm_code_l");

                            // dd($penyata);

                            $penyata2[$nobatch1] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101B4, e.F101B5, e.F101B6, e.F101B7, e.F101B8, e.F101B9,
                            e.F101B10, e.F101B11, e.F101B12, e.F101B13, e.F101B14
                            from pl101bp3 e, codedb.commodity_l p
                            where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l
                            order by e.F101B4");
                            // dd($penyata);

                            $totaliib5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B5) as total5 FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B6) as total6 FROM pl101bp3 e, codedb.commodity_l p where  e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B7) as total7 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B8) as total8 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib9[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B9) as total9 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib10[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B10) as total10 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib11[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B11) as total11 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib12[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B12) as total12 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib13[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B13) as total13 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");
                            $totaliib14[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101B14) as total14 FROM pl101bp3 e, codedb.commodity_l p where e.F101B2 = '$nobatch1' and e.F101B3 = '2' and e.F101B4 = p.comm_code_l");


                            $penyata3[$nobatch1] = DB::connection('mysql4')->select("SELECT F101A7, F101A8, F101A9
                            from pl101ap3
                            where F101A4 = '$nobatch1'");
                            // dd($penyata);

                            $penyata4a[$nobatch1] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101C4, e.F101C5, e.F101C6, e.F101C7, e.F101C8, e.F101C9,
                            e.F101C10
                            from pl101cp3 e, codedb.commodity_l p
                            where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                            // dd($penyata);

                            $totalivac5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C5) as total5 FROM pl101cp3 e, codedb.commodity_l p where  e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                            $totalivac6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C6) as total6 FROM pl101cp3 e, codedb.commodity_l p where  e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                            $totalivac7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C7) as total7 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                            $totalivac8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C8) as total8 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                            $totalivac9[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C9) as total9 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");
                            $totalivac10[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C10) as total10 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '1' and e.F101C4 = p.comm_code_l");


                            $penyata4b[$nobatch1] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F101C4, e.F101C5, e.F101C6, e.F101C7, e.F101C8, e.F101C9,
                            e.F101C10
                            from pl101cp3 e, codedb.commodity_l p
                            where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                            // dd($penyata);

                            $totalivbc5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C5) as total5 FROM pl101cp3 e, codedb.commodity_l p where  e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                            $totalivbc6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C6) as total6 FROM pl101cp3 e, codedb.commodity_l p where  e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                            $totalivbc7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C7) as total7 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                            $totalivbc8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C8) as total8 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                            $totalivbc9[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C9) as total9 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");
                            $totalivbc10[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101C10) as total10 FROM pl101cp3 e, codedb.commodity_l p where e.F101C2 = '$nobatch1' and e.F101C3 = '2' and e.F101C4 = p.comm_code_l");


                            $penyata5a[$nobatch1] = DB::connection('mysql4')->select("SELECT p.catname, e.F101D5, e.F101D6, e.F101D7, e.F101D8
                            from pl101dp3 e, prod_cat p
                            where e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");
                            // dd($penyata);

                            $totalvad5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D5) as total5 FROM pl101dp3 e, prod_cat p where  e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");
                            $totalvad6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D6) as total6 FROM pl101dp3 e, prod_cat p where  e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");
                            $totalvad7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D7) as total7 FROM pl101dp3 e, prod_cat p where e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");
                            $totalvad8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D8) as total8 FROM pl101dp3 e, prod_cat p where e.F101D2 = '$nobatch1' and e.F101D3 = '1' and e.F101D4 = p.catid");


                            $penyata5b[$nobatch1] = DB::connection('mysql4')->select("SELECT p.catname, e.F101D5, e.F101D6, e.F101D7, e.F101D8
                            from pl101dp3 e, prod_cat p
                            where e.F101D2 = '$nobatch1' and e.F101D3= '2' and e.F101D4 = p.catid");
                            // dd($penyata);

                            $totalvbd5[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D5) as total5 FROM pl101dp3 e, prod_cat p where  e.F101D2 = '$nobatch1' and e.F101D3 = '2' and e.F101D4 = p.catid");
                            $totalvbd6[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D6) as total6 FROM pl101dp3 e, prod_cat p where  e.F101D2 = '$nobatch1' and e.F101D3 = '2' and e.F101D4 = p.catid");
                            $totalvbd7[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D7) as total7 FROM pl101dp3 e, prod_cat p where e.F101D2 = '$nobatch1' and e.F101D3 = '2' and e.F101D4 = p.catid");
                            $totalvbd8[$nobatch1] = DB::connection('mysql4')->select("SELECT SUM(e.F101D8) as total8 FROM pl101dp3 e, prod_cat p where e.F101D2 = '$nobatch1' and e.F101D3 = '2' and e.F101D4 = p.catid");



                            // $penyata[$key]  = H91Init::with('pelesen')->whereRelation('pelesen','e_nl', $penyata_id[$key] ->e91_nl)->first();
                            // $pelesens[$key] = Pelesen::where('e_nl', $penyata_id[$key] ->e91_nl)->first();

                            // $myDateTime = DateTime::createFromFormat('Y-m-d', $users->tkhsubmit);
                            // $formatteddate = $myDateTime->format('d-m-Y');

                        }
                        // dd($query);
                //   dd($totaliib5);


                        $layout = 'layouts.main';

                        // dd($penyata);
                        // $data = DB::table('pelesen')->get();
                        return view('admin.proses9.9papar-pleid-penapis-multi', compact(
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
                            'totaliib5',
                            'totaliib6',
                            'totaliib7',
                            'totaliib8',
                            'totaliib9',
                            'totaliib10',
                            'totaliib11',
                            'totaliib12',
                            'totaliib13',
                            'totaliib14',
                            'totalivac5',
                            'totalivac6',
                            'totalivac7',
                            'totalivac8',
                            'totalivac9',
                            'totalivac10',
                            'totalivbc5',
                            'totalivbc6',
                            'totalivbc7',
                            'totalivbc8',
                            'totalivbc9',
                            'totalivbc10',
                            'totalvad5',
                            'totalvad6',
                            'totalvad7',
                            'totalvad8',
                            'totalvbd5',
                            'totalvbd6',
                            'totalvbd7',
                            'totalvbd8',
                            'users',
                        ));
                    }
                        else {
                            return redirect()->back()->with('error', 'Maklumat pelesen tidak wujud. Sila port data');
                        }
                }




    }


    public function process_admin_pleid_isirung_form($nobatch, $nolesen, $tahun, $bulan)
    {

        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }

        if ($tahun <= 2022) {
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

            // dd($bulan);
            foreach ($nobatch as $key => $e102_nobatch) {
                // $pelesens[$key] = (object)[];
                // $penyata[$key] = H102Init::with('h_pelesen')->find($e102_nobatch);
                // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e102_nl)->first();
                $pelesens[$e102_nobatch] = (object)[];

                $query[$e102_nobatch] = DB::select("SELECT p.kodpgw, p.nosiri, p.e_nl, p.e_np, p.e_ap1, p.e_ap2,
                    p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                    FROM h_pelesen p
                    WHERE p.e_nl = '$nolesen'
                    AND p.e_thn = '2022'
                    AND p.e_bln = '10'");

                    // dd($nolesen);

                $users[$e102_nobatch] = DB::connection('mysql4')->select("SELECT DATE_FORMAT(e.F1021F, '%d-%m-%Y') tkhsubmit
                from pl1021p3 e where e.F1021B = '$e102_nobatch'");

                $bhg1[$e102_nobatch] = DB::connection('mysql4')->select("SELECT F1021G1,F1021G2,F1021G3,F1021H1,F1021H2,F1021H3,
                        F1021I1,F1021I2,F1021I3,F1021J1,F1021J2,F1021J3,
                        F1021K,F1021L1,F1021L2,F1021M1,F1021M2,F1021M3,
                        F1021N1,F1021N2,F1021N3,F1021O1,F1021O2,F1021O3,
                        F1021Q1,F1021Q2,F1021Q3,F1021R1,F1021R2,F1021R3,
                        F1021S1, F1021S2,
                        F1021S3, F1021S4,F1021K2
                from pl1021p3
                where F1021B = '$e102_nobatch'");

                $bhg3[$e102_nobatch] = DB::connection('mysql4')->select("SELECT p.catname as cat1,c.catname as cat2, e.F1022F
                from pl1022p3 e, kod_sl p, prod_cat2 c
                where e.F1022B = '$e102_nobatch' and e.F1022C = '51' and
                e.F1022D = p.catid and e.F1022E = c.catid");

                $total3[$e102_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F1022F) as total3 from pl1022p3 e, kod_sl p, prod_cat2 c
                where e.F1022B = '$e102_nobatch' and e.F1022C = '51' and
                e.F1022D = p.catid and e.F1022E = c.catid");


                $bhg4[$e102_nobatch] = DB::connection('mysql4')->select("SELECT p.catname as cat1,c.catname as cat2, e.F1022F
                    from pl1022p3 e, kod_sl p, prod_cat2 c
                    where e.F1022B = '$e102_nobatch' and e.F1022C = '04' and
                        e.F1022D = p.catid and e.F1022E = c.catid");

                $total4[$e102_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F1022F) as total4 from pl1022p3 e, kod_sl p, prod_cat2 c
                where e.F1022B = '$e102_nobatch' and e.F1022C = '04' and
                e.F1022D = p.catid and e.F1022E = c.catid");

                $bhg5[$e102_nobatch] = DB::connection('mysql4')->select("SELECT p.catname as cat1,c.catname as cat2, e.F1022F
                from pl1022p3 e, kod_sl p, prod_cat2 c
                where e.F1022B = '$e102_nobatch' and e.F1022C = '33' and
                      e.F1022D = p.catid and e.F1022E = c.catid");


                $total5[$e102_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F1022F) as total5 from pl1022p3 e, kod_sl p, prod_cat2 c
                where e.F1022B = '$e102_nobatch' and e.F1022C = '33' and
                e.F1022D = p.catid and e.F1022E = c.catid");


            }
            $layout = 'layouts.main';

            // dd($query);
            // $data = DB::table('pelesen')->get();
            return view('admin.proses9.9papar-pleid-isirung-multi', compact(
                'returnArr', 'tahun', 'bulan',
                'layout', 'users', 'nolesen',
                'pelesens',
                'query', 'bhg1','total3', 'bhg3', 'bhg4', 'total4', 'bhg5', 'total5'

            ));
    } elseif ($tahun > 2022) {
        $check = H102Init::with('h_pelesen')->where('e102_nobatch', $nobatch)->where('e102_thn', $tahun)->where('e102_bln', $bulan)->first();
        // dd($check);

        foreach($check->h_pelesen as $pelesen) {
            if ($pelesen->e_thn == $tahun && $pelesen->e_bln == $bulan) {
                $data_pelesen = $pelesen;
            }
        }

        if ($data_pelesen) {
          if ($data_pelesen->e_thn == $tahun && $data_pelesen->e_bln == $bulan) {


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

                    foreach ($nobatch as $key => $e102_nobatch) {

                        $pelesens[$e102_nobatch] = (object)[];
                        $bln = ltrim($bulan, "0");


                        $query[$e102_nobatch] = DB::select("SELECT p.kodpgw, p.nosiri, p.e_nl, p.e_np, p.e_ap1, p.e_ap2,
                            p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                            FROM h_pelesen p
                            WHERE p.e_nl = '$nolesen'
                            AND p.e_kat = 'PL102'
                            AND p.e_thn = '$tahun'
                            AND p.e_bln = '$bln'");

                            // dd($query);

                        $users[$e102_nobatch] = DB::connection('mysql4')->select("SELECT DATE_FORMAT(e.F1021F, '%d-%m-%Y') tkhsubmit
                        from pl1021p3 e where e.F1021B = '$e102_nobatch'");

                        $bhg1[$e102_nobatch] = DB::connection('mysql4')->select("SELECT F1021G1,F1021G2,F1021G3,F1021H1,F1021H2,F1021H3,
                                F1021I1,F1021I2,F1021I3,F1021J1,F1021J2,F1021J3,
                                F1021K,F1021L1,F1021L2,F1021M1,F1021M2,F1021M3,
                                F1021N1,F1021N2,F1021N3,F1021O1,F1021O2,F1021O3,
                                F1021Q1,F1021Q2,F1021Q3,F1021R1,F1021R2,F1021R3,
                                F1021S1, F1021S2,
                                F1021S3, F1021S4,F1021K2
                        from pl1021p3
                        where F1021B = '$e102_nobatch'");

                        $bhg3[$e102_nobatch] = DB::connection('mysql4')->select("SELECT p.catname as cat1,c.catname as cat2, e.F1022F
                        from pl1022p3 e, kod_sl p, prod_cat2 c
                        where e.F1022B = '$e102_nobatch' and e.F1022C = '51' and
                        e.F1022D = p.catid and e.F1022E = c.catid");

                        $total3[$e102_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F1022F) as total3 from pl1022p3 e, kod_sl p, prod_cat2 c
                        where e.F1022B = '$e102_nobatch' and e.F1022C = '51' and
                        e.F1022D = p.catid and e.F1022E = c.catid");


                        $bhg4[$e102_nobatch] = DB::connection('mysql4')->select("SELECT p.catname as cat1,c.catname as cat2, e.F1022F
                            from pl1022p3 e, kod_sl p, prod_cat2 c
                            where e.F1022B = '$e102_nobatch' and e.F1022C = '04' and
                                e.F1022D = p.catid and e.F1022E = c.catid");

                        $total4[$e102_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F1022F) as total4 from pl1022p3 e, kod_sl p, prod_cat2 c
                        where e.F1022B = '$e102_nobatch' and e.F1022C = '04' and
                        e.F1022D = p.catid and e.F1022E = c.catid");

                        $bhg5[$e102_nobatch] = DB::connection('mysql4')->select("SELECT p.catname as cat1,c.catname as cat2, e.F1022F
                        from pl1022p3 e, kod_sl p, prod_cat2 c
                        where e.F1022B = '$e102_nobatch' and e.F1022C = '33' and
                              e.F1022D = p.catid and e.F1022E = c.catid");


                        $total5[$e102_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F1022F) as total5 from pl1022p3 e, kod_sl p, prod_cat2 c
                        where e.F1022B = '$e102_nobatch' and e.F1022C = '33' and
                        e.F1022D = p.catid and e.F1022E = c.catid");


                    }
                    $layout = 'layouts.main';

                    // dd($query);
                    // $data = DB::table('pelesen')->get();
                    return view('admin.proses9.9papar-pleid-isirung-multi', compact(
                        'returnArr', 'tahun', 'bulan',
                        'layout', 'users', 'nolesen',
                        'pelesens',
                        'query', 'bhg1','total3', 'bhg3', 'bhg4', 'total4', 'bhg5', 'total5'

                    ));
            }
        }


                else {
                    return redirect()->back()->with('error', 'Maklumat pelesen tidak wujud. Sila port data');
                }
        }


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


            if($penyata[$key]->h_pelesen){

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

            else{
                return redirect()->back()
                ->with('error', 'Data Tidak Wujud!');
            }

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


        // $tahun = H104Init::where('e104_thn', $tahun);
        // $bulan = H104Init::where('e104_bln', $bulan);
        // dd($bulan);
        foreach ($nobatch as $key => $e104_nobatch) {
            $pelesens[$key] = (object)[];
            $penyata[$key] = H104Init::with('h_pelesen')->find($e104_nobatch);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();


            if($penyata[$key]->h_pelesen){

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

            else{
                return redirect()->back()
                ->with('error', 'Data Tidak Wujud!');
            }
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

    public function process_admin_pleid_oleo_form($nobatch, $nolesen, $tahun, $bulan)
    {
        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }
        // dd($nolesen);

        if ($tahun <= 2022) {

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

        // dd($bulan);
        foreach ($nobatch as $key => $e104_nobatch) {
            $pelesens[$e104_nobatch] = (object)[];
            // $penyata[$key] = H104Init::with('h_pelesen')->find($e104_nobatch);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();

            $users[$e104_nobatch] = DB::connection('mysql4')->select("SELECT DATE_FORMAT(e.F104A2, '%d-%m-%Y') tkhsubmit
                    from pl104ap1 e where e.F104A4 = '$e104_nobatch'");



            $query[$e104_nobatch] = DB::select("SELECT p.kodpgw, p.nosiri, e.e104_bln, e.e104_thn, p.e_nl, p.e_np, p.e_ap1, p.e_ap2, e.e104_nobatch,
            p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
            FROM h104_init e, h_pelesen p
            WHERE p.e_nl = e.e104_nl
            AND e.e104_nobatch = '$e104_nobatch'
            AND e.e104_thn = '$tahun'
            AND p.e_thn = '2022'
            AND p.e_bln = '10'
            AND e.e104_bln = '$bulan'");

            $bhg1a[$e104_nobatch] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F104B4, e.F104B5, e.F104B6, e.F104B7, e.F104B8, e.F104B9,
            e.F104B10, e.F104B11, e.F104B12, e.F104B13
            from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");

            $total1ab5[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B5) as total5 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
            $total1ab6[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B6) as total6 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
            $total1ab7[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B7) as total7 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
            $total1ab8[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B8) as total8 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
            $total1ab9[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B9) as total9 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
            $total1ab10[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B10) as total10 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
            $total1ab11[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B11) as total11 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
            $total1ab12[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B12) as total12 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
            $total1ab13[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B13) as total13 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");

            $bhg1b[$e104_nobatch] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F104B4, e.F104B5, e.F104B6, e.F104B7, e.F104B8, e.F104B9,
            e.F104B10, e.F104B11, e.F104B12, e.F104B13
            from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l");

            $total1bb5[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B5) as total5 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
            $total1bb6[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B6) as total6 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
            $total1bb7[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B7) as total7 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
            $total1bb8[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B8) as total8 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
            $total1bb9[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B9) as total9 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
            $total1bb10[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B10) as total10 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
            $total1bb11[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B11) as total11 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
            $total1bb12[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B12) as total12 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
            $total1bb13[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B13) as total13 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");

            $bhg1c[$e104_nobatch] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F104B4, e.F104B5, e.F104B6, e.F104B7, e.F104B8, e.F104B9,
            e.F104B10, e.F104B11, e.F104B12, e.F104B13
           from pl104bp1 e, codedb.commodity_l p
           where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l");

            $total1cb5[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B5) as total5 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
            $total1cb6[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B6) as total6 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
            $total1cb7[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B7) as total7 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
            $total1cb8[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B8) as total8 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
            $total1cb9[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B9) as total9 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
            $total1cb10[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B10) as total10 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
            $total1cb11[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B11) as total11 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
            $total1cb12[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B12) as total12 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
            $total1cb13[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B13) as total13 from pl104bp1 e, codedb.commodity_l p
            where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");

            $bhg2[$e104_nobatch] = DB::connection('mysql4')->select("SELECT F104A7, F104A8
            from pl104ap1
            where F104A4 = '$e104_nobatch'");

            $bhg3[$e104_nobatch] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F104C3, e.F104C4, e.F104C5, e.F104C6, e.F104C7, e.F104C8
            from pl104cp1 e, codedb.commodity_l p
            where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l
            order by e.F104C3");

            $total3c4[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C4) as total4 from pl104cp1 e, codedb.commodity_l p
            where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");
            $total3c5[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C5) as total5 from pl104cp1 e, codedb.commodity_l p
            where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");
            $total3c6[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C6) as total6 from pl104cp1 e, codedb.commodity_l p
            where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");
            $total3c7[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C7) as total7 from pl104cp1 e, codedb.commodity_l p
            where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");
            $total3c8[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C8) as total8 from pl104cp1 e, codedb.commodity_l p
            where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");


        }


        $layout = 'layouts.main';

        // dd($tahun);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-pleid-oleo-multi', compact(
            'returnArr', 'bulan', 'tahun',
            'layout', 'users',
            'pelesens',
            'query',
            'bhg1a', 'total1ab5',  'total1ab6', 'total1ab7', 'total1ab8',  'total1ab9',  'total1ab10', 'total1ab11', 'total1ab12', 'total1ab13',
            'bhg1b', 'total1bb5',  'total1bb6', 'total1bb7', 'total1bb8',  'total1bb9',  'total1bb10', 'total1bb11', 'total1bb12', 'total1bb13',
            'bhg1c', 'total1cb5',  'total1cb6', 'total1cb7', 'total1cb8',  'total1cb9',  'total1cb10', 'total1cb11', 'total1cb12', 'total1cb13',
            'bhg2','total3c4','total3c5',  'total3c6', 'total3c7', 'total3c8',
            'bhg3'

        ));
    } elseif ($tahun > 2022) {
        $checks = H104Init::with('h_pelesen')->where('e104_nobatch', $nobatch)->where('e104_thn', $tahun)->where('e104_bln', $bulan)->get();

        // dd($checks);
    foreach ($checks as $check) {
            # code...

        if ($check->h_pelesen->e_thn == $tahun && $check->h_pelesen->e_bln == $bulan) {

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

                foreach ($nobatch as $key => $e104_nobatch) {
                    $pelesens[$e104_nobatch] = (object)[];
                    // $penyata[$key] = H104Init::with('h_pelesen')->find($e104_nobatch);
                    // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();

                    $users[$e104_nobatch] = DB::connection('mysql4')->select("SELECT DATE_FORMAT(e.F104A2, '%d-%m-%Y') tkhsubmit
                            from pl104ap1 e where e.F104A4 = '$e104_nobatch'");



                    $query[$e104_nobatch] = DB::select("SELECT p.kodpgw, p.nosiri, e.e104_bln, e.e104_thn, p.e_nl, p.e_np, p.e_ap1, p.e_ap2, e.e104_nobatch,
                    p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                    FROM h104_init e, h_pelesen p
                    WHERE p.e_nl = e.e104_nl
                    AND e.e104_nobatch = '$e104_nobatch'
                    AND e.e104_thn = '$tahun'
                    AND p.e_thn = '$tahun'
                    AND p.e_bln = '$bulan'
                    AND e.e104_bln = '$bulan'");

                    $bhg1a[$e104_nobatch] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F104B4, e.F104B5, e.F104B6, e.F104B7, e.F104B8, e.F104B9,
                    e.F104B10, e.F104B11, e.F104B12, e.F104B13
                    from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");

                    $total1ab5[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B5) as total5 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
                    $total1ab6[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B6) as total6 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
                    $total1ab7[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B7) as total7 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
                    $total1ab8[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B8) as total8 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
                    $total1ab9[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B9) as total9 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
                    $total1ab10[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B10) as total10 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
                    $total1ab11[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B11) as total11 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
                    $total1ab12[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B12) as total12 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");
                    $total1ab13[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B13) as total13 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '1' and e.F104B4 = p.comm_code_l ");

                    $bhg1b[$e104_nobatch] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F104B4, e.F104B5, e.F104B6, e.F104B7, e.F104B8, e.F104B9,
                    e.F104B10, e.F104B11, e.F104B12, e.F104B13
                    from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l");

                    $total1bb5[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B5) as total5 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
                    $total1bb6[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B6) as total6 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
                    $total1bb7[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B7) as total7 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
                    $total1bb8[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B8) as total8 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
                    $total1bb9[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B9) as total9 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
                    $total1bb10[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B10) as total10 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
                    $total1bb11[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B11) as total11 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
                    $total1bb12[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B12) as total12 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");
                    $total1bb13[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B13) as total13 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '2' and e.F104B4 = p.comm_code_l ");

                    $bhg1c[$e104_nobatch] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F104B4, e.F104B5, e.F104B6, e.F104B7, e.F104B8, e.F104B9,
                    e.F104B10, e.F104B11, e.F104B12, e.F104B13
                   from pl104bp1 e, codedb.commodity_l p
                   where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l");

                    $total1cb5[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B5) as total5 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
                    $total1cb6[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B6) as total6 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
                    $total1cb7[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B7) as total7 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
                    $total1cb8[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B8) as total8 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
                    $total1cb9[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B9) as total9 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
                    $total1cb10[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B10) as total10 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
                    $total1cb11[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B11) as total11 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
                    $total1cb12[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B12) as total12 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");
                    $total1cb13[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104B13) as total13 from pl104bp1 e, codedb.commodity_l p
                    where e.F104B2 = '$e104_nobatch' and e.F104B3 = '3' and e.F104B4 = p.comm_code_l ");

                    $bhg2[$e104_nobatch] = DB::connection('mysql4')->select("SELECT F104A7, F104A8
                    from pl104ap1
                    where F104A4 = '$e104_nobatch'");

                    $bhg3[$e104_nobatch] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.F104C3, e.F104C4, e.F104C5, e.F104C6, e.F104C7, e.F104C8
                    from pl104cp1 e, codedb.commodity_l p
                    where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l
                    order by e.F104C3");

                    $total3c4[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C4) as total4 from pl104cp1 e, codedb.commodity_l p
                    where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");
                    $total3c5[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C5) as total5 from pl104cp1 e, codedb.commodity_l p
                    where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");
                    $total3c6[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C6) as total6 from pl104cp1 e, codedb.commodity_l p
                    where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");
                    $total3c7[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C7) as total7 from pl104cp1 e, codedb.commodity_l p
                    where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");
                    $total3c8[$e104_nobatch] = DB::connection('mysql4')->select("SELECT SUM(e.F104C8) as total8 from pl104cp1 e, codedb.commodity_l p
                    where e.F104C2 = '$e104_nobatch' and e.F104C3 = p.comm_code_l ");


                }


                $layout = 'layouts.main';

                // dd($tahun);
                // $data = DB::table('pelesen')->get();
                return view('admin.proses9.9papar-pleid-oleo-multi', compact(
                    'returnArr', 'bulan', 'tahun',
                    'layout', 'users',
                    'pelesens',
                    'query',
                    'bhg1a', 'total1ab5',  'total1ab6', 'total1ab7', 'total1ab8',  'total1ab9',  'total1ab10', 'total1ab11', 'total1ab12', 'total1ab13',
                    'bhg1b', 'total1bb5',  'total1bb6', 'total1bb7', 'total1bb8',  'total1bb9',  'total1bb10', 'total1bb11', 'total1bb12', 'total1bb13',
                    'bhg1c', 'total1cb5',  'total1cb6', 'total1cb7', 'total1cb8',  'total1cb9',  'total1cb10', 'total1cb11', 'total1cb12', 'total1cb13',
                    'bhg2','total3c4','total3c5',  'total3c6', 'total3c7', 'total3c8',
                    'bhg3'

                ));
        }
            else {
                return redirect()->back()->with('error', 'Maklumat pelesen tidak wujud. Sila port data');
            }
    }
    } else {
        return redirect()->back()->with('error', 'Maklumat pelesen tidak wujud. Sila port data');

    }
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

            if($penyata[$key]->h_pelesen){

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

            else{
                return redirect()->back()
                ->with('error', 'Data Tidak Wujud!');
            }
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

    public function process_admin_pleid_simpanan_form($nolesen, $tahun, $bulan)
    {
        if (!$nolesen) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }
        if ($tahun <= 2022) {

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

                // dd($bulan);
                foreach ($nolesen as $key => $e07_nl) {
                    $pelesens[$key] = (object)[];

                    $users[$e07_nl] = DB::connection('mysql4')->select("SELECT DATE_FORMAT(e.INS_ID, '%d-%m-%Y') tkhsubmit
                    from mpb_insp3a e, licensedb.license p where e.INS_IA = '$e07_nl' AND  e.INS_IC = '$tahun' and e.INS_IB = '$bulan' and
                    e.INS_IA = p.F201A");

                    $query[$e07_nl] = DB::select("SELECT p.kodpgw, p.nosiri, p.e_nl, p.e_np, p.e_ap1, p.e_ap2,
                    p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                    FROM  h_pelesen p
                    WHERE p.e_nl = '$e07_nl'
                    AND p.e_thn = '2022'
                    AND p.e_bln = '10'");
                    // dd($query);

                    // if ($query[$e07_nl]) {
                        $bhga[$e07_nl] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.INS_KD, e.INS_KE,e.INS_KF,
                        e.INS_KG, e.INS_KH, e.INS_KI, (e.INS_KE - e.INS_KJ) beza,
                        e.INS_KJ
                        from mpb_insp3b e, codedb.commodity_l p
                        where e.INS_KA = '$e07_nl' and
                            e.INS_KB = '$bulan' and
                            e.INS_KC = '$tahun' and
                            e.INS_KD = p.comm_code_l");

                        $totala5[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_KE) as total5 from mpb_insp3b e, codedb.commodity_l p
                        where e.INS_KA = '$e07_nl' and e.INS_KB = '$bulan' and e.INS_KC = '$tahun' and e.INS_KD = p.comm_code_l ");
                        $totala6[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_KF) as total6 from mpb_insp3b e, codedb.commodity_l p
                        where e.INS_KA = '$e07_nl' and e.INS_KB = '$bulan' and e.INS_KC = '$tahun' and e.INS_KD = p.comm_code_l ");
                        $totala7[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_KG) as total7 from mpb_insp3b e, codedb.commodity_l p
                        where e.INS_KA = '$e07_nl' and e.INS_KB = '$bulan' and e.INS_KC = '$tahun' and e.INS_KD = p.comm_code_l ");
                        $totala8[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_KH) as total8 from mpb_insp3b e, codedb.commodity_l p
                        where e.INS_KA = '$e07_nl' and e.INS_KB = '$bulan' and e.INS_KC = '$tahun' and e.INS_KD = p.comm_code_l ");
                        $totala9[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_KI) as total9 from mpb_insp3b e, codedb.commodity_l p
                        where e.INS_KA = '$e07_nl' and e.INS_KB = '$bulan' and e.INS_KC = '$tahun' and e.INS_KD = p.comm_code_l ");
                        $totala10[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_KE - e.INS_KJ) as total10 from mpb_insp3b e, codedb.commodity_l p
                        where e.INS_KA = '$e07_nl' and e.INS_KB = '$bulan' and e.INS_KC = '$tahun' and e.INS_KD = p.comm_code_l ");
                        $totala11[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_KJ) as total11 from mpb_insp3b e, codedb.commodity_l p
                        where e.INS_KA = '$e07_nl' and e.INS_KB = '$bulan' and e.INS_KC = '$tahun' and e.INS_KD = p.comm_code_l ");

                        $bhgb[$e07_nl] = DB::connection('mysql4')->select("SELECT p.comm_desc, e.INS_TD, e.INS_TE, e.INS_TF,
                        e.INS_TG, e.INS_TH, (e.INS_TE - e.INS_TI) beza,
                        e.INS_TI
                        from mpb_insp3c e, codedb.commodity_l p
                        where e.INS_TA = '$e07_nl' and
                            e.INS_TB = '$bulan' and
                            e.INS_TC = '$tahun' and
                            e.INS_TD = p.comm_code_l");

                        $totalb5[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_TE) as total5 from mpb_insp3c e, codedb.commodity_l p
                        where e.INS_TA = '$e07_nl' and e.INS_TB = '$bulan' and e.INS_TC = '$tahun' and e.INS_TD = p.comm_code_l");
                        $totalb6[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_TF) as total6 from mpb_insp3c e, codedb.commodity_l p
                        where e.INS_TA = '$e07_nl' and e.INS_TB = '$bulan' and e.INS_TC = '$tahun' and e.INS_TD = p.comm_code_l");
                        $totalb7[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_TG) as total7 from mpb_insp3c e, codedb.commodity_l p
                        where e.INS_TA = '$e07_nl' and e.INS_TB = '$bulan' and e.INS_TC = '$tahun' and e.INS_TD = p.comm_code_l");
                        $totalb8[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_TH) as total8 from mpb_insp3c e, codedb.commodity_l p
                        where e.INS_TA = '$e07_nl' and e.INS_TB = '$bulan' and e.INS_TC = '$tahun' and e.INS_TD = p.comm_code_l");
                        $totalb10[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_TE - e.INS_TI) as total10 from mpb_insp3c e, codedb.commodity_l p
                        where e.INS_TA = '$e07_nl' and e.INS_TB = '$bulan' and e.INS_TC = '$tahun' and e.INS_TD = p.comm_code_l");
                        $totalb11[$e07_nl] = DB::connection('mysql4')->select("SELECT SUM(e.INS_TI) as total11 from mpb_insp3c e, codedb.commodity_l p
                        where e.INS_TA = '$e07_nl' and e.INS_TB = '$bulan' and e.INS_TC = '$tahun' and e.INS_TD = p.comm_code_l");


                    // } else {
                    //     return redirect()->back()->with('error', "Maklumat Pelesen {$e07_nl} Tidak Wujud");
                    // }


                }
                $layout = 'layouts.main';

                // dd($users);                // $data = DB::table('pelesen')->get();
                return view('admin.proses9.9papar-pleid-simpanan-multi', compact(
                    'returnArr', 'bulan', 'tahun',
                    'layout', 'nolesen',
                    'pelesens',
                    'query', 'users',
                    'bhga', 'totala5', 'totala6', 'totala7', 'totala8', 'totala9', 'totala10', 'totala11',
                    'bhgb', 'totalb5', 'totalb6', 'totalb7', 'totalb8', 'totalb10', 'totalb11',
                ));
    } elseif ($tahun > 2022) {}
    }

    public function process_admin_9penyataterdahulu_bio_form($nobatch, $tahun, $bulan)
    {

        // $this->admin_9penyataterdahulu_process($tahun1);
        // dd($bulan);

        if (!$nobatch) {
            return redirect()->back()
                ->with('error', 'Sila Pilih Pelesen');
        }

        if ($tahun <= 2022 && $bulan <= 10) {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.6penyatapaparcetakbio'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Biodiesel"],
        ];

        $kembali = route('admin.9penyataterdahulu');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        // $tahun = HBioInit::where('ebio_thn', $tahun);
        // $bulan = HBioInit::where('ebio_bln', $bulan);
        // dd($bulan);
        foreach ($nobatch as $key => $ebio_nobatch) {
            // dd($ebio_nobatch);
            $pelesens[$ebio_nobatch] = (object)[];
            // $penyata[$key] = HBioInit::with('h_pelesen')->find($ebio_nobatch);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();

            $penyata[$ebio_nobatch] = DB::select("SELECT *, date_format(e.ebio_sdate,'%d-%m-%Y') as sdate

                            FROM h_bio_inits e, h_pelesen p
                            WHERE p.e_nl = e.ebio_nl
                            AND e.ebio_nobatch = '$ebio_nobatch'
                            AND e.ebio_thn = '$tahun'
                            -- AND p.e_thn = '2022'
                            -- AND p.e_bln = '10'
                            AND e.ebio_bln = '$bulan'");

            // dd($penyata);
            // if($penyata[$key]->h_pelesen){

                $ia[$ebio_nobatch] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $ebio_nobatch)->where('ebio_b3', '1')->orderBy('ebio_b4')->get();


                $ib[$ebio_nobatch] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $ebio_nobatch)->where('ebio_b3', '2')->orderBy('ebio_b4')->get();


                $ic[$ebio_nobatch] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $ebio_nobatch)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();



                $ii[$ebio_nobatch] = HHari::where('lesen',  $penyata[$ebio_nobatch][0]->e_nl)->where('tahunbhg2', $penyata[$ebio_nobatch][0]->ebio_thn)->where('bulanbhg2', $penyata[$ebio_nobatch][0]->ebio_bln)->first();


                $iii[$ebio_nobatch]  = HBioC::with('hbioinit', 'produk')->where('ebio_nobatch', $ebio_nobatch)->get();


                // $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$ebio_nobatch][$key]->ebio_sdate);
                // $formatteddate = $myDateTime->format('d-m-Y');

            // }

            // else{
                // return redirect()->back()
                // ->with('error', 'Data Tidak Wujud!');
            // }

        }
        // dd($penyata);


        $layout = 'layouts.main';

        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-bio-multi', compact(
            'returnArr',
            'layout',
            // 'formatteddate',
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


    } elseif ($tahun > 2022 || ($tahun == 2022 && $bulan >= 10)) {

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


        // $tahun = HBioInit::where('ebio_thn', $tahun);
        // $bulan = HBioInit::where('ebio_bln', $bulan);
        // dd($bulan);
        foreach ($nobatch as $key => $ebio_nobatch) {
            $pelesens[$key] = (object)[];
            // $penyata[$key] = HBioInit::with('h_pelesen')->find($ebio_nobatch);
            // $pelesens[$key] = Pelesen::where('e_nl', $penyata->e104_nl)->first();

            $penyata[$key] = DB::select("SELECT p.kodpgw, p.nosiri, e.ebio_bln, e.ebio_thn, e.ebio_notel, e.ebio_npg, e.ebio_jpg, p.e_nl, p.e_np, p.e_ap1, p.e_ap2, e.ebio_nobatch, date_format(e.ebio_sdate,'%d-%m-%Y') as sdate,
                            p.e_ap3, p.e_as1, p.e_as2, p.e_as3, p.e_notel, p.e_nofax, p.e_email, p.e_npg, p.e_jpg, p.e_npgtg, p.e_jpgtg
                            FROM h_bio_inits e, h_pelesen p
                            WHERE p.e_nl = e.ebio_nl
                            AND e.ebio_nobatch = '$ebio_nobatch'
                            AND e.ebio_thn = '$tahun'
                            AND p.e_thn = '$tahun'
                            AND p.e_bln = '$bulan'
                            AND e.ebio_bln = '$bulan'");

            // dd($penyata[$key][0]);
            // if($penyata[$key]->h_pelesen){

                $ia[$key] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $penyata[$key][0]->ebio_nobatch)->where('ebio_b3', '1')->orderBy('ebio_b4')->get();


                $ib[$key] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $penyata[$key][0]->ebio_nobatch)->where('ebio_b3', '2')->orderBy('ebio_b4')->get();


                $ic[$key] = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $penyata[$key][0]->ebio_nobatch)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();



                $ii[$key] = HHari::where('lesen',  $penyata[$key][0]->e_nl)->where('tahunbhg2', $penyata[$key][0]->ebio_thn)->where('bulanbhg2', $penyata[$key][0]->ebio_bln)->first();


                $iii[$key]  = HBioC::with('hbioinit', 'produk')->where('ebio_nobatch', $penyata[$key][0]->ebio_nobatch)->get();


                // $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata[$key]->ebio_sdate);
                // $formatteddate = $myDateTime->format('d-m-Y');

            // }

            // else{
                // return redirect()->back()
                // ->with('error', 'Data Tidak Wujud!');
            // }

        }
        // dd($ib);


        $layout = 'layouts.main';

        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-bio-multi', compact(
            'returnArr',
            'layout',
            // 'formatteddate',
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
}
