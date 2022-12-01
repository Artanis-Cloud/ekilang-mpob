<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\E07Init;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\EBioInit;
use App\Models\Init;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard()
    {
        $PL91_total = 0;
        $PL101_total = 0;
        $PL102_total = 0;
        $PL104_total = 0;
        $PL111_total = 0;
        $PLBIO_total = 0;
        $bulan = date('m') - 1;
        $tahun = date('Y');
        $initdate = Init::where('tahun', $tahun)->first();

        if($bulan == 1){
            $enddate = $initdate->ejan;

        }
        elseif($bulan == 2){
            $enddate = $initdate->efeb;

        }
        elseif($bulan == 3){

            $enddate = $initdate->emac;
        }
        elseif($bulan == 4){
            $enddate = $initdate->eapr;

        }
        elseif($bulan == 5)
        {
            $enddate = $initdate->emei;

        }
        elseif($bulan == 6){
            $enddate = $initdate->ejun;

        }
        elseif($bulan == 7){
            $enddate = $initdate->ejul;

        }
        elseif($bulan == 8){
            $enddate = $initdate->eogos;

        }
        elseif($bulan == 9){
            $enddate = $initdate->esept;

        }
        elseif($bulan == 10){
            $enddate = $initdate->eokt;

        }
        elseif($bulan == 11){
            $enddate = $initdate->enov;

        }
        else{
            $enddate = $initdate->edec;

        }
        // dd($enddate);
        //total pelesen hantar penyata setiap hari
        // $PL91_total untuk total keseluruhan 10 hari
        // $PL91[$i][0] mengikut hari

        for ($i = 1; $i <= date('d', strtotime($enddate)); $i++) { //haribulan
            $data = DB::select("SELECT e.e91_sdate as date, count(e.e91_nl) as pelesen, DAY(e.e91_sdate) as days
            from e91_init e, reg_pelesen r
            where e.e91_nl = r.e_nl
            and r.e_kat = 'PL91'
            and e.e91_sdate is not null
            and e.e91_flg in ('2','3')
            and DAY(e.e91_sdate) = '$i'");
            // group by e.e91_sdate
            // order by e.e91_sdate
            // dd($data);

            if ($data[0]->date != null) {
                $PL91[$i] = $data;
                $PL91_total += $data[0]->pelesen;
            } else {
                $PL91[$i][0] = (object)[];
                $PL91[$i][0]->date = $i;
                $PL91[$i][0]->days = $i;
                $PL91[$i][0]->pelesen = 0;
                $PL91_total += 0;
            }
        }

        for ($i = 1; $i <= date('d', strtotime($enddate)); $i++) { //haribulan
            $data = DB::select("SELECT e.e101_sdate as date, count(e.e101_nl) as pelesen, DAY(e.e101_sdate) as days
            from e101_init e, reg_pelesen r
            where e.e101_nl = r.e_nl
            and r.e_kat = 'PL101'
            and e.e101_sdate is not null
            and e.e101_flg in ('2','3')
            and DAY(e.e101_sdate) = $i");
            // -- group by e.e101_sdate
            // order by e.e101_sdate

            if ($data[0]->date != null) {
                $PL101[$i] = $data;
                $PL101_total += $data[0]->pelesen;

            } else {
                $PL101[$i][0] = (object)[];
                $PL101[$i][0]->date = $i;
                $PL101[$i][0]->days = $i;
                $PL101[$i][0]->pelesen = 0;
                $PL101_total += 0;
            }
        }
        // dd($PL101);


        for ($i = 1; $i <= date('d', strtotime($enddate)); $i++) { //haribulan
            $data = DB::select("SELECT e.e102_sdate as date, count(e.e102_nl) as pelesen, DAY(e.e102_sdate) as days
            from e102_init e, reg_pelesen r
            where e.e102_nl = r.e_nl
            and r.e_kat = 'PL102'
            and e.e102_sdate is not null
            and e.e102_flg in ('2','3')
            and DAY(e.e102_sdate) = '$i'");
            // group by e.e102_sdate
            // order by e.e102_sdate

            if ($data[0]->date != null) {
                $PL102[$i] = $data;
                $PL102_total += $data[0]->pelesen;
                // dd($PL102);

            } else {
                $PL102[$i][0] = (object)[];
                $PL102[$i][0]->date = $i;
                $PL102[$i][0]->days = $i;
                $PL102[$i][0]->pelesen = 0;
                $PL102_total += 0;
            }

        }

        // dd($PL102);

        for ($i = 1; $i <= date('d', strtotime($enddate)); $i++) { //haribulan
            $data = DB::select("SELECT e.e104_sdate as date, count(e.e104_nl) as pelesen, DAY(e.e104_sdate) as days
            from e104_init e, reg_pelesen r
            WHERE e.e104_nl = r.e_nl
            and r.e_kat = 'PL104'
            and e.e104_sdate is not null
            and e.e104_flg in ('2','3')
            and DAY(e.e104_sdate) = '$i'");
            // group by e.e104_sdate
            // order by e.e104_sdate
            // dd($data);

            if ($data[0]->date != null) {
                $PL104[$i] = $data;
                $PL104_total += $data[0]->pelesen;
            } else {
                $PL104[$i][0] = (object)[];
                $PL104[$i][0]->date = $i;
                $PL104[$i][0]->days = $i;
                $PL104[$i][0]->pelesen = 0;
                $PL104_total += 0;
            }
        }

        for ($i = 1; $i <= date('d', strtotime($enddate)); $i++) { //haribulan
            $data = DB::select("SELECT e.e07_sdate as date, count(e.e07_nl) as pelesen, DAY(e.e07_sdate) as days
            from e07_init e, reg_pelesen r
            where e.e07_nl = r.e_nl
            and r.e_kat = 'PL111'
            and e.e07_sdate is not null
            and e.e07_flg in ('2','3')
            and DAY(e.e07_sdate) = '$i'");
            // group by e.e07_sdate
            // order by e.e07_sdate

            if ($data[0]->date != null) {
                $PL111[$i] = $data;
                $PL111_total += $data[0]->pelesen;
            } else {
                $PL111[$i][0] = (object)[];
                $PL111[$i][0]->date = $i;
                $PL111[$i][0]->days = $i;
                $PL111[$i][0]->pelesen = 0;
                $PL111_total += 0;
            }
        }

        for ($i = 1; $i <= date('d', strtotime($enddate)); $i++) { //haribulan
            $data = DB::select("SELECT e.ebio_sdate as date, count(e.ebio_nl) as pelesen, DAY(e.ebio_sdate) as days
            from e_bio_inits e, reg_pelesen r
            where e.ebio_nl = r.e_nl
            and r.e_kat = 'PLBIO'
            and e.ebio_sdate is not null
            and e.ebio_flg in ('2','3')
            and DAY(e.ebio_sdate) = '$i'");
            // group by e.ebio_sdate
            // order by e.ebio_sdate

            if ($data[0]->date != null) {
                $PLBIO[$i] = $data;
                $PLBIO_total += $data[0]->pelesen;
            } else {
                $PLBIO[$i][0] = (object)[];
                $PLBIO[$i][0]->date = $i;
                $PLBIO[$i][0]->days = $i;
                $PLBIO[$i][0]->pelesen = 0;
                $PLBIO_total += 0;
            }
        }


        //total pelesen yang sudah hantar penyata setiap sektor
        $total91 = E91Init::where('e91_flg', '!=' , '1')->count();
        $total101 = E101Init::where('e101_flg', '!=' ,'1')->count();
        $total102 = E102Init::where('e102_flg', '!=' , '1')->count();
        $total104 = E104Init::where('e104_flg', '!=' , '1')->count();
        $total111 = E07Init::where('e07_flg', '!=' , '1')->count();
        $totalBIO = EBioInit::where('ebio_flg', '!=' , '1')->count();
        // $total91 = E91Init::where('e91_flg', '!=' , '1')->where('e91_sdate', '<=' , $enddate )->count();
        // $total101 = E101Init::where('e101_flg', '!=' ,'1')->where('e101_sdate', '<=' , $enddate )->count();
        // $total102 = E102Init::where('e102_flg', '!=' , '1')->where('e102_sdate', '<=' , $enddate )->count();
        // $total104 = E104Init::where('e104_flg', '!=' , '1')->where('e104_sdate', '<=' , $enddate )->count();
        // $total111 = E07Init::where('e07_flg', '!=' , '1')->where('e07_sdate', '<=' , $enddate )->count();
        // $totalBIO = EBioInit::where('ebio_flg', '!=' , '1')->where('ebio_sdate', '<=' , $enddate )->count();

        $total_overall = ($total91 + $total101 + $total102 + $total104 + $total111 + $totalBIO);
        // dd($total_overall);


        //total pelesen yang belum hantar penyata setiap sektor
        $total91_1 = E91Init::where('e91_flg', '1')->count();
        $total101_1 = E101Init::where('e101_flg', '1')->count();
        $total102_1 = E102Init::where('e102_flg', '1')->count();
        $total104_1 = E104Init::where('e104_flg', '1')->count();
        $total111_1 = E07Init::where('e07_flg', '1')->count();
        $totalBIO_1 = EBioInit::where('ebio_flg', '1')->count();


        $total_overall_1 = ($total91_1 + $total101_1 + $total102_1 + $total104_1 + $total111_1 + $totalBIO_1);

        // dd($total_overall_1);

        // total pelesen aktif setiap sektor
        $PC91 = DB::select("SELECT count(e_nl) as pelesen
        From reg_pelesen
        Where e_status = '1'
        and e_kat = 'PL91'");

        $PC101 = DB::select("SELECT count(e_nl) as pelesen
        From reg_pelesen
        Where e_status = '1'
        and e_kat = 'PL101'");

        $PC102 = DB::select("SELECT count(e_nl) as pelesen
        From reg_pelesen
        Where e_status = '1'
        and e_kat = 'PL102'");

        $PC104 = DB::select("SELECT count(e_nl) as pelesen
        From reg_pelesen
        Where e_status = '1'
        and e_kat = 'PL104'");

        $PC111 = DB::select("SELECT count(e_nl) as pelesen
        From reg_pelesen
        Where e_status = '1'
        and e_kat = 'PL111'");

        $PCBIO = DB::select("SELECT count(e_nl) as pelesen
        From reg_pelesen
        Where e_status = '1'
        and e_kat = 'PLBIO'");


        // pencentage pelesen sudah hantar penyata setiap sektor
            $percent91 = ($PL91_total / $PC91[0]->pelesen) * 100;
            $percent101 = ($PL101_total / $PC101[0]->pelesen) * 100;
            $percent102 = ($PL102_total / $PC102[0]->pelesen) * 100;
            $percent104 = ($PL104_total / $PC104[0]->pelesen) * 100;
            $percent111 = ($PL111_total / $PC111[0]->pelesen) * 100;
            if($PCBIO[0]->pelesen > 0){
               $percentBIO = ($PLBIO_total / $PCBIO[0]->pelesen) * 100;
            } else {
                $percentBIO = 0;
            }


        $days = date('d', strtotime($enddate));

        $array = [
            'PL91_total' => $PL91_total,
            'PL91' => $PL91,

            'PL101_total' => $PL101_total,
            'PL101' => $PL101,

            'PL102_total' => $PL102_total,
            'PL102' => $PL102,

            'PL104_total' => $PL104_total,
            'PL104' => $PL104,

            'PL111_total' => $PL111_total,
            'PL111' => $PL111,

            'PLBIO_total' => $PLBIO_total,
            'PLBIO' => $PLBIO,

            'total_overall' => $total_overall,
            'total_overall_1' => $total_overall_1,

            'PC91' => $PC91,
            'PC101' => $PC101,
            'PC102' => $PC102,
            'PC104' => $PC104,
            'PC111' => $PC111,
            'PCBIO' => $PCBIO,

            'percent91' => $percent91,
            'percent101' => $percent101,
            'percent102' => $percent102,
            'percent104' => $percent104,
            'percent111' => $percent111,
            'percentBIO' => $percentBIO,

            'days' => $days
        ];

        // dd($PCBIO);
        return view('admin.dashboard.main', $array);
    }



    public function jumlah_penyata_all_kilang()
    {
        $PL91 = DB::select("select date_format(e.e101_sdate,'%d-%m-%Y') as date, count(p.e_nl) as pelesen
        from pelesen p, e101_init e, reg_pelesen r
        where p.e_nl = e.e101_nl and p.e_nl = r.e_nl and r.e_kat = 'PL91'
        and e.e101_sdate is not null
        group by e.e101_sdate
        order by e.e101_sdate");

        dd($PL91);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
