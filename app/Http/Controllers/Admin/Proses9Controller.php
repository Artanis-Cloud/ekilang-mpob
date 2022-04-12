<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\H07Init;
use App\Models\H101Init;
use App\Models\H102Init;
use App\Models\H104Init;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class Proses9Controller extends Controller
{

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


            $users = DB::select("SELECT e.e91_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, date_format(e91_sdate,'%d-%m-%Y') as sdate
                        FROM pelesen p, h91_init e, reg_pelesen k
                        WHERE e.e91_thn = '$request->tahun'
                        and e.e91_bln = '$request->bulan'
                        and p.e_nl = e.e91_nl
                        and e.e91_flg = '3'
                        and p.e_nl = k.e_nl
                        and k.e_kat = 'PL91'
                        order by k.kodpgw, k.nosiri");

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

        $tahun = H91Init::where('e91_thn', $request->tahun);
        $bulan = H91Init::where('e91_bln', $request->bulan);


            $users = DB::select("SELECT e.e91_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, e.e91_nobatch,  date_format(e91_sdate,'%d-%m-%Y') as sdate
                        FROM pelesen p, h91_init e, reg_pelesen k
                        WHERE e.e91_thn = '$request->tahun'
                        and e.e91_bln = '$request->bulan'
                        and p.e_nl = e.e91_nl
                        and e.e91_flg = '3'
                        and p.e_nl = k.e_nl
                        and k.e_kat = 'PL91'
                        order by k.kodpgw, k.nosiri");


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

    public function process_admin_9penyataterdahulu_buah_form(Request $request)
    {



        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetakbuah'), 'name' => "Papar & Cetak Penyata Bulanan Kilang Buah"],
        ];

        $kembali = route('admin.9penyataterdahulu');
        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $tahun = H91Init::where('e91_thn', $request->tahun);
        $bulan = H91Init::where('e91_bln', $request->bulan);
        // dd($bulan);
                foreach ($request->papar_ya as $key => $e91_nobatch) {
            $pelesens[$key] = (object)[];
            $penyata = H91Init::find($e91_nobatch);
            $pelesens[$key] = Pelesen::where('e_nl', $penyata-> e91_nl)->first();

        }
        $layout = 'layouts.admin';

        // dd($penyata);
        // $data = DB::table('pelesen')->get();
        return view('admin.proses9.9papar-terdahulu-buah-multi',compact('returnArr' ,'layout', 'tahun', 'bulan', 'pelesens', 'penyata' ));

    }

    public function admin_9penyataterdahulu_penapis_process(Request $request)
    {
        //dd($request->all());

        $tahun = H101Init::where('tahun', $request->e101_thn);
        $bulan = H101Init::where('tahun', $request->e101_bln);


            $users = DB::select("SELECT e.e101_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri,date_format(e101_sdate,'%d-%m-%Y') as sdate
                            from pelesen p, h101_init e, reg_pelesen k
                            WHERE e.e101_thn = '$request->tahun'
                            and e.e101_bln = '$request->bulan'
                            and e.e101_flg = '3'
                            and p.e_nl = e.e101_nl
                            and p.e_nl = k.e_nl
                            and k.e_kat = 'PL101'
                            order by k.kodpgw, k.nosiri");

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
        $layout = 'layouts.admin';

        return view('admin.proses9.9papar', compact('returnArr', 'layout', 'tahun', 'bulan', 'users'));
    }

    public function admin_9penyataterdahulu_isirung_process(Request $request)
    {
        //dd($request->all());

        $tahun = H102Init::where('tahun', $request->e102_thn);
        $bulan = H102Init::where('tahun', $request->e102_bln);


            $users = DB::select("SELECT e.e102_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, date_format(e102_sdate,'%d-%m-%Y') as sdate
            FROM  pelesen p, h102_init e, reg_pelesen k
            WHERE e.e102_thn = '$request->tahun'
            and e.e102_bln = '$request->bulan'
            and p.e_nl = e.e102_nl
            and e.e102_flg = '3'
            and p.e_nl = k.e_nl
            and k.e_kat = 'PL102'
            order by k.kodpgw, k.nosiri");


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

    public function admin_9penyataterdahulu_oleokimia_process(Request $request)
    {
        //dd($request->all());

        $tahun = H104Init::where('tahun', $request->e104_thn);
        $bulan = H104Init::where('tahun', $request->e104_bln);


            $users = DB::select("SELECT e.e104_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, date_format(e104_sdate,'%d-%m-%Y') as sdate
                        FROM  pelesen p, h104_init e, reg_pelesen k
                        WHERE e.e104_thn = '$request->tahun'
                        and e.e104_bln = '$request->bulan'
                        and p.e_nl = e.e104_nl
                        and e.e104_flg = '3'
                        and p.e_nl = k.e_nl
                        and k.e_kat = 'PL104'
                        order by k.kodpgw, k.nosiri");



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

    public function admin_9penyataterdahulu_psimpanan_process(Request $request)
    {
        //dd($request->all());

        $tahun = H07Init::where('tahun', $request->e07_thn);
        $bulan = H07Init::where('tahun', $request->e07_bln);


            $users = DB::select("SELECT e.e07_nl, p.e_nl, p.e_np, k.kodpgw, k.nosiri, date_format(e07_sdate,'%d-%m-%Y') as sdate
                        FROM pelesen p, h07_init e, reg_pelesen k
                        WHERE e.e07_thn = '$request->tahun'
                        and e.e07_bln = '$request->bulan'
                        and p.e_nl = e.e07_nl
                        and e.e07_flg = '3'
                        and p.e_nl = k.e_nl
                        and k.e_kat = 'PL111'
                        order by k.kodpgw, k.nosiri");


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
        $layout = 'layouts.admin';

        return view('admin.proses9.9papar', compact('returnArr', 'layout', 'tahun', 'bulan', 'users'));
    }


}
