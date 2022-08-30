<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\E101B;
use App\Models\E101Init;
use App\Models\E91b;
use App\Models\E91Init;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class Proses4Controller extends Controller
{

    public function admin_4ekilangpleid()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"]  ,
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Penyata Dari e-Kilang ke PLEID"]  ,
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID', compact('returnArr', 'layout'));
    }



    public function admin_porting(Request $request)
    {
        // dd($request->e_tahun);
        $this->porting_pl91($request->all());
        $this->porting_pl101($request->all());
        // $this->porting_pl102($request->e_ddate);
        // $this->porting_pl104($request->e_ddate);
        // $this->porting_pl111($request->e_ddate);
        // $this->porting_plbio($request->e_ddate);
        // $this->initialize_proses_plbio($request->e_tahun, $e_bulan, $e_ddate);
        return redirect()->back()->with('success', 'Penyata telah dipindahkan ke PLEID');
    }

    public function porting_pl91()
    {
        //data from e91_init
        $e91init = E91Init::where('e91_flg', '2')->get();
        // dd($e91init);

        $totalpl91 = 0;

        foreach ($e91init as $key => $selects) {

            $regno = $selects->e91_reg;
            $nolesen = $selects->e91_nl;
            $tahun = $selects->e91_thn;
            $bulan = $selects->e91_bln;
            $tarikh = $selects->e91_sdate;
            $tarikh1 = $selects->e91_ddate;
            $aa1 = (float) $selects->e91_aa1;
            $aa2 = (float) $selects->e91_aa2;
            $aa3 = (float) $selects->e91_aa3;
            $aa4 = (float) $selects->e91_aa4;
            $ab1 = (float) $selects->e91_ab1;
            $ab2 = (float) $selects->e91_ab2;
            $ab3 = (float) $selects->e91_ab3;
            $ab4 = (float) $selects->e91_ab4;
            $ac1 = (float) $selects->e91_ac1;
            $ad1 = (float) $selects->e91_ad1 ;
            $ad2 = (float) $selects->e91_ad2 ;
            $ad3 = (float) $selects->e91_ad3 ;
            $ae1 = (float) $selects->e91_ae1 ;
            $ae2 = (float) $selects->e91_ae2 ;
            $ae3 = (float) $selects->e91_ae3 ;
            $ae4 = (float) $selects->e91_ae4 ;
            $af1 = (float) $selects->e91_af1 ;
            $af2 = (float) $selects->e91_af2 ;
            $af3 = (float) $selects->e91_af3 ;
            $ag1 = (float) $selects->e91_ag1 ;
            $ag2 = (float) $selects->e91_ag2 ;
            $ag3 = (float) $selects->e91_ag3 ;
            $ag4 = (float) $selects->e91_ag4 ;
            $ah1 = (float) $selects->e91_ah1 ;
            $ah2 = (float) $selects->e91_ah2 ;
            $ah3 = (float) $selects->e91_ah3 ;
            $ah4 = (float) $selects->e91_ah4 ;
            $ai1 = (float) $selects->e91_ai1 ;
            $ai2 = (float) $selects->e91_ai2 ;
            $ai3 = (float) $selects->e91_ai3 ;
            $ai4 = (float) $selects->e91_ai4 ;
            $ai5 = (float) $selects->e91_ai5 ;
            $ai6 = (float) $selects->e91_ai6 ;
            $aj1 = (float) $selects->e91_aj1 ;
            $aj2 = (float) $selects->e91_aj2 ;
            $aj3 = (float) $selects->e91_aj3 ;
            $aj4 = (float) $selects->e91_aj4 ;
            $aj5 = (float) $selects->e91_aj5 ;
            $aj6 = (float) $selects->e91_aj6 ;
            $aj7 = (float) $selects->e91_aj7 ;
            $aj8 = (float) $selects->e91_aj8 ;
            $ak1 = (float) $selects->e91_ak1 ;
            $ak2 = (float) $selects->e91_ak2 ;
            $ak3 = (float) $selects->e91_ak3 ;

            $npg = $selects->e91_npg ;
            $jpg = $selects->e91_jpg ;

            $ah5 = $selects->e91_ah5 ;
            $ah6 = $selects->e91_ah6 ;
            $ah7 = $selects->e91_ah7 ;
            $ah8 = $selects->e91_ah8 ;
            $ah9 = $selects->e91_ah9 ;
            $ah10 = $selects->e91_ah10 ;
            $ah11 = $selects->e91_ah11 ;
            $ah12 = $selects->e91_ah12 ;
            $ah13 = $selects->e91_ah13 ;
            $ah14 = $selects->e91_ah14 ;
            $ah15 = $selects->e91_ah15 ;
            $ah16 = $selects->e91_ah16 ;
            $ah17 = $selects->e91_ah17 ;
            $ah18 = $selects->e91_ah18 ;

            $regpelesen91 = RegPelesen::where('e_nl', $nolesen)->where('e_kat', 'PL91')->get();

            foreach ($regpelesen91 as $row)
          {
            $kodpgw = $row->kodpgw;
            $nosiri = $row->nosiri;

            $nobatch = "$bulan$tahun$kodpgw$nosiri";
            // dd($nobatch);

          }

        $findstr= array("\'", "'");
        $rplace= array("", "");
        $ah18 = str_replace($findstr, $rplace, $ah18);
            // dd($ah18);

            // insert data to pldb pl91
        $insertpl91 = DB::connection('mysql4')->insert("INSERT into PL911P3 (F911A,F911B,F911C,F911D,F911E,F911F,F911G1,F911G2,F911G3,F911G4,F911H1,F911H2,
                    F911H3,F911H4,F911I ,F911J1,F911J2,F911J3,F911K1,F911K2,F911K3,F911K4,F911L1,F911L2,F911L3,F911N1,F911N2,F911N3,F911N4,F911O,F911P,F911Q,F911R,F911S1,
                    F911S2,F911S3,F911S4,F911S5,F911S6,F911T1,F911T2,F911T3,F911T4,F911T5,F911T6,F911T7,F911T8,F911U1,F911U2,F911U3,F911V,F911W,F911AA,F911AA_date,
                    F911P1,F911P2,F911P3,F911P4,F911P5,F911P6,F911P7,F911P8,F911P9,F911P10,F911P11,
                    F911P12,F911P13,F911P14) values ('$nolesen','$nobatch','$bulan',
                    '$tahun','$tarikh','$tarikh',
                    $aa1,$aa2,$aa3,$aa4,$ab1,$ab2,$ab3,$ab4,
                    $ac1,$ad1,$ad2,$ad3,
                    $ae1,$ae2,$ae3,$ae4,$af1,$af2,$af3,$ag1,$ag2,
                    $ag3,$ag4,$ah1,$ah2,$ah3,$ah4,$ai1,$ai2,$ai3,
                    $ai4,$ai5,$ai6,$aj1,$aj2,$aj3,$aj4,$aj5,$aj6,
                    $aj7,$aj8,$ak1,$ak2,$ak3,NULL,NULL,NULL,NULL,
                    '$ah5','$ah6','$ah7','$ah8','$ah9','$ah10','$ah11','$ah12','$ah13','$ah14','$ah15','$ah16','$ah17','$ah18')");

                    // dd($insertpl91);

                    if ($insertpl91) {
                        $totalpl91 = $totalpl91 + 1;

                        $str="'";
                        $npg = str_replace($str, "\'", $npg);

                        //insert data to h91_init
                        $inserth91 = DB::insert("INSERT into h91_init values ('$nobatch','$nolesen',
                        '$bulan','$tahun','3','$tarikh','$tarikh1',
                        $aa1,$aa2,$aa3,$aa4,$ab1,$ab2,$ab3,$ab4,
                        $ac1,$ad1,$ad2,$ad3,
                        $ae1,$ae2,$ae3,$ae4,$af1,$af2,$af3,$ag1,$ag2,
                        $ag3,$ag4,$ah1,$ah2,$ah3,$ah4,$ai1,$ai2,$ai3,
                        $ai4,$ai5,$ai6,$aj1,$aj2,$aj3,$aj4,$aj5,$aj6,
                        $aj7,$aj8,$ak1,$ak2,$ak3,'$npg','$jpg',
                        '$ah5','$ah6','$ah7','$ah8','$ah9','$ah10','$ah11','$ah12','$ah13','$ah14','$ah15','$ah16','$ah17','$ah18')");

                       $updatee91 = DB::update("UPDATE e91_init
                       set e91_flg = '3'
                       WHERE e91_nl = '$nolesen'");


                    }
                    $e91b = E91b::where('e91_b2', $regno)->get();
                    $jum91b = 0;

                    foreach ($e91b as $rowe91b)
                    {
                        $b6 =  $rowe91b->e91_b6 ;
                        $b7 =  $rowe91b->e91_b7 ;
                        $b8 =  $rowe91b->e91_b8 ;
                        $b9 = (float)  $rowe91b->e91_b9 ;
                        $b10 = (float)  $rowe91b->e91_b10 ;
                        $b11 =  $rowe91b->e91_b11 ;

                        // insert into mysqli history e91b
                        //calculate total row
                        $jum91b = $jum91b + 1;

                        $idmax = E91Init::max('e91_reg');
                        // dd($idmax);

                        if ($idmax)
                        {
                            $idno = $idmax + 1;
                            // dd($idno);
                        }

                        $insert2h91 = DB::insert("INSERT into h91b values ($idno,'$nobatch','$b6',
                        '$b7','$b8',$b9, $b10, '$b11')");
                    }
        }
    }

    public function porting_pl101()
    {
        //data from e101_init
        $e101init = E101Init::where('e101_flg', '2')->get();
        // dd($e91init);

        $totalpl101 = 0;

        foreach ($e101init as $key => $selects) {

            $regno =  $selects->e101_reg ;
            $nolesen =  $selects->e101_nl ;
            $tahun =  $selects->e101_thn ;
            $bulan =  $selects->e101_bln ;
            $tarikh = date( $selects->e101_sdate );
            $tarikh1 = date( $selects->e101_ddate );
            $a1 = (integer)  $selects->e101_a1 ;
            $a2 = (double)  $selects->e101_a2 ;
            $a3 = (double)  $selects->e101_a3 ;

            $npg =  $selects->e101_npg ;
            $jpg =  $selects->e101_jpg ;


            $regpelesen101 = RegPelesen::where('e_nl', $nolesen)->where('e_kat', 'PL101')->get();

            foreach ($regpelesen101 as $row)
          {
            $kodpgw = $row->kodpgw;
            $nosiri = $row->nosiri;

            $nobatch = "$bulan$tahun$kodpgw$nosiri";
            // dd($nobatch);

          }

            // insert data to pldb pl101
        $insertpl101 = DB::connection('mysql4')->insert("INSERT into pl101ap3 (F101A1,F101A2,F101A3,F101A4,F101A5,F101A6,F101A7,F101A8,F101A9,F101AA1,F101AA1_date)
                    values ('$nolesen','$tarikh','$tarikh',
                    '$nobatch','$bulan',
                    '$tahun',$a1,$a2,$a3,NULL,NULL)");

                    // dd($insertpl91);

                    if ($insertpl101) {
                        $totalpl101 = $totalpl101 + 1;

                        $str="'";
                        $npg = str_replace($str, "\'", $npg);

                        //insert data to h101_init
                        $inserth101 = DB::insert("INSERT into h101_init values ('$nobatch','$nolesen',
                        '$bulan','$tahun','3','$tarikh','$tarikh1', $a1, $a2, $a3,'$npg','$jpg')");

                       $updatee101 = DB::update("UPDATE e101_init
                       set e101_flg = '3'
                       WHERE e101_nl = '$nolesen'");


                    }
                    $e101b = E101B::where('e101_reg', $regno)->get();
                    // $jum91b = 0;

                    foreach ($e101b as $rowe101b)
                    {
                        $b3 =  $rowe101b->e101_b3 ;
                        $b4 =  $rowe101b->e101_b4 ;
                        $b5 = (float)  $rowe101b->e101_b5 ;
                        $b6 = (float)  $rowe101b->e101_b6 ;
                        $b7 = (float)  $rowe101b->e101_b7 ;
                        $b8 = (float)  $rowe101b->e101_b8 ;
                        $b9 = (float)  $rowe101b->e101_b9 ;
                        $b10 = (float)  $rowe101b->e101_b10 ;
                        $b11 = (float)  $rowe101b->e101_b11 ;
                        $b12 = (float)  $rowe101b->e101_b12 ;
                        $b13 = (float)  $rowe101b->e101_b13 ;
                        $b14 = (float)  $rowe101b->e101_b14 ;

                        // insert into mysqli history e91b
                        //calculate total row
                        $jum91b = $jum91b + 1;

                        $idmax = E91Init::max('e91_reg');
                        // dd($idmax);

                        if ($idmax)
                        {
                            $idno = $idmax + 1;
                            // dd($idno);
                        }

                        $insert2h91 = DB::insert("INSERT into h91b values ($idno,'$nobatch','$b6',
                        '$b7','$b8',$b9, $b10, '$b11')");


                    }

        }



    }

    public function initialize_proses_pl101($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL101')->where('e_status', '1')->get();

        $e101_init = DB::table('e101_init')->delete();
        $e101_b = DB::table('e101_b')->delete();
        $e101_c = DB::table('e101_c')->delete();
        $e101_d = DB::table('e101_d')->delete();
        $e101_e = DB::table('e101_e')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E101Init::create([
                'e101_reg' => $key + 1,
                'e101_nl' => $e_nl,
                'e101_bln' => now()->month,
                'e101_thn' => now()->year,
                'e101_flg' => '1',
                'e101_sdate' => NULL,
                'e101_ddate' => $e_ddate,
                'e101_a1' => NULL,
                'e101_a2' => NULL,
                'e101_a3' => NULL,
                'e101_npg' => NULL,
                'e101_jpg' => NULL,
                'e101_flagcetak' => NULL,
            ]);
        }
    }

    public function initialize_proses_pl102($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL102')->where('e_status', '1')->get();

        $e102_init = DB::table('e102_init')->delete();
        $e102b = DB::table('e102b')->delete();
        $e102c = DB::table('e102c')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E102Init::create([
                'e102_reg' => $key + 1,
                'e102_nl' => $e_nl,
                'e102_bln' => now()->month,
                'e102_thn' => now()->year,
                'e102_flg' => '1',
                'e102_sdate' => NULL,
                'e102_ddate' => $e_ddate,
                'e102_aa1' => NULL,
                'e102_aa2' => NULL,
                'e102_aa3' => NULL,
                'e102_ab1' => NULL,
                'e102_ab2' => NULL,
                'e102_ab3' => NULL,
                'e102_ac1' => NULL,
                'e102_ac2' => NULL,
                'e102_ac3' => NULL,
                'e102_ad1' => NULL,
                'e102_ad2' => NULL,
                'e102_ad3' => NULL,
                'e102_ae1' => NULL,
                'e102_af2' => NULL,
                'e102_af3' => NULL,
                'e102_ag1' => NULL,
                'e102_ag2' => NULL,
                'e102_ag3' => NULL,
                'e102_ah1' => NULL,
                'e102_ah2' => NULL,
                'e102_ah3' => NULL,
                'e102_ai1' => NULL,
                'e102_ai2' => NULL,
                'e102_ai3' => NULL,
                'e102_aj1' => NULL,
                'e102_aj2' => NULL,
                'e102_aj3' => NULL,
                'e102_ak1' => NULL,
                'e102_ak2' => NULL,
                'e102_ak3' => NULL,
                'e102_al1' => NULL,
                'e102_al2' => NULL,
                'e102_al3' => NULL,
                'e102_al4' => NULL,
                'e102_npg' => NULL,
                'e102_jpg' => NULL,
                'e102_flagcetak' => NULL,
                'e102_ae3' => NULL,
            ]);
        }
    }
    public function initialize_proses_pl104($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL104')->where('e_status', '1')->get();

        $e101_init = DB::table('e104_init')->delete();
        $e104_b = DB::table('e104_b')->delete();
        $e104_c = DB::table('e104_c')->delete();
        $e104_d = DB::table('e104_d')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E104Init::create([
                'e104_reg' => $key + 1,
                'e104_nl' => $e_nl,
                'e104_bln' => now()->month,
                'e104_thn' => now()->year,
                'e104_flg' => '1',
                'e104_sdate' => NULL,
                'e104_ddate' => $e_ddate,
                'e104_a5' => NULL,
                'e104_a6' => NULL,
                'e104_npg' => NULL,
                'e104_jpg' => NULL,
                'e104_flagcetak' => NULL,
            ]);
        }
    }
    public function initialize_proses_pl111($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL111')->where('e_status', '1')->get();

        $e07_init = DB::table('e07_init')->delete();
        $e07_btranshipment = DB::table('e07_btranshipment')->delete();
        $e07_transhipment = DB::table('e07_transhipment')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E07Init::create([
                'e07_reg' => $key + 1,
                'e07_nl' => $e_nl,
                'e07_bln' => now()->month,
                'e07_thn' => now()->year,
                'e07_flg' => '1',
                'e07_sdate' => NULL,
                'e07_ddate' => $e_ddate,
                'e07_npg' => NULL,
                'e07_jpg' => NULL,
                'e07_flagcetak' => NULL,
            ]);
        }
    }
    public function initialize_proses_plbio($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PLBIO')->where('e_status', '1')->get();

        $ebio_init = DB::table('e_bio_inits')->delete();
        $ebio_b = DB::table('e_bio_b_s')->delete();
        $ebio_c = DB::table('e_bio_c_s')->delete();
        $ebio_cc = DB::table('e_bio_cc')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = EBioInit::create([
                'ebio_reg' => $key + 1,
                'ebio_nl' => $e_nl,
                'ebio_bln' => now()->month,
                'ebio_thn' => now()->year,
                'ebio_flg' => '1',
                'ebio_sdate' => NULL,
                'ebio_ddate' => $e_ddate,
                'ebio_a5' => $e_ddate,
                'ebio_a6' => $e_ddate,
                'ebio_npg' => NULL,
                'ebio_jpg' => NULL,
                'ebio_notel' => NULL,
                'ebio_flagcetak' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ]);
        }
    }

    public function admin_initialize_satu(Request $request)
    {
        // dd($request->e_tahun);
        $reg_pelesen = RegPelesen::where('e_nl', $request->e_initlesen)->first();
        // dd($reg_pelesen);
        // $count = RegPelesen::count();
        $e91_init = E91Init::where('e91_nl', $request->e_initlesen)->first();
        $e101_init = E101Init::where('e101_nl', $request->e_initlesen)->first();
        $e102_init = E102Init::where('e102_nl', $request->e_initlesen)->first();
        $e104_init = E104Init::where('e104_nl', $request->e_initlesen)->first();
        $e07_init = E07Init::where('e07_nl', $request->e_initlesen)->first();
        $ebio_init = EBioInit::where('ebio_nl', $request->e_initlesen)->first();


        if ($reg_pelesen->e_status == '1') {
            if ($reg_pelesen->e_kat == 'PL91') {
                if ($e91_init) {
                    return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
                } else {
                    $e_nl = $reg_pelesen->e_nl;
                    $count = E91Init::max('e91_reg');
                    // dd($count);
                    $count2 = E91b::count();

                    $query = E91Init::create([
                        'e91_reg' => $count + 1,
                        'e91_nl' => $request->e_initlesen,
                        'e91_bln' => now()->month,
                        'e91_thn' => now()->year,
                        'e91_flg' => '1',
                        'e91_sdate' => NULL,
                        'e91_ddate' => $request->e_ddate,
                        'e91_aa1' => NULL,
                        'e91_aa2' => NULL,
                        'e91_aa3' => NULL,
                        'e91_aa4' => NULL,
                        'e91_ab1' => NULL,
                        'e91_ab2' => NULL,
                        'e91_ab3' => NULL,
                        'e91_ab4' => NULL,
                        'e91_ac1' => NULL,
                        'e91_ad1' => NULL,
                        'e91_ad2' => NULL,
                        'e91_ad3' => NULL,
                        'e91_ae1' => NULL,
                        'e91_ae2' => NULL,
                        'e91_ae3' => NULL,
                        'e91_ae4' => NULL,
                        'e91_af1' => NULL,
                        'e91_af2' => NULL,
                        'e91_af3' => NULL,
                        'e91_ag1' => NULL,
                        'e91_ag2' => NULL,
                        'e91_ag3' => NULL,
                        'e91_ag4' => NULL,
                        'e91_ah1' => NULL,
                        'e91_ah2' => NULL,
                        'e91_ah3' => NULL,
                        'e91_ah4' => NULL,
                        'e91_ai1' => NULL,
                        'e91_ai2' => NULL,
                        'e91_ai3' => NULL,
                        'e91_ai4' => NULL,
                        'e91_ai5' => NULL,
                        'e91_ai6' => NULL,
                        'e91_aj1' => NULL,
                        'e91_aj2' => NULL,
                        'e91_aj3' => NULL,
                        'e91_aj4' => NULL,
                        'e91_aj5' => NULL,
                        'e91_aj6' => NULL,
                        'e91_aj7' => NULL,
                        'e91_aj8' => NULL,
                        'e91_ak1' => NULL,
                        'e91_ak2' => NULL,
                        'e91_ak3' => NULL,
                        'e91_npg' => NULL,
                        'e91_jpg' => NULL,
                        'e91_flagcetak' => NULL,
                        'e91_ah5' => NULL,
                        'e91_ah6' => NULL,
                        'e91_ah7' => NULL,
                        'e91_ah8' => NULL,
                        'e91_ah9' => NULL,
                        'e91_ah10' => NULL,
                        'e91_ah11' => NULL,
                        'e91_ah12' => NULL,
                        'e91_ah13' => NULL,
                        'e91_ah14' => NULL,
                        'e91_ah15' => NULL,
                        'e91_ah16' => NULL,
                        'e91_ah17' => NULL,
                        'e91_ah18' => NULL,
                    ]);
                    $query2 = E91b::create([
                        'e91_b1' => $count2 + 1,
                        'e91_b2' => $query->e91_reg,
                        'e91_b6' => 0,
                        'e91_b7' => 0,
                        'e91_b8' => NULL,
                        'e91_b9' => 0,
                        'e91_b10' => 0,
                        'e91_b11' => NULL,
                    ]);
                }
            } elseif ($reg_pelesen->e_kat == 'PL101') {
                if ($e101_init) {
                    return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
                } else {
                    $count = E101Init::max('e101_reg');

                    $query = E101Init::create([
                        'e101_reg' => $count + 1,
                        'e101_nl' => $request->e_initlesen,
                        'e101_bln' => now()->month,
                        'e101_thn' => now()->year,
                        'e101_flg' => '1',
                        'e101_sdate' => NULL,
                        'e101_ddate' => $request->e_ddate,
                        'e101_a1' => NULL,
                        'e101_a2' => NULL,
                        'e101_a3' => NULL,
                        'e101_npg' => NULL,
                        'e101_jpg' => NULL,
                        'e101_flagcetak' => NULL,
                    ]);
                }
            } elseif ($reg_pelesen->e_kat == 'PL102') {

                if ($e102_init) {
                    return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
                } else {
                    $count = E102Init::max('e102_reg');

                    $query = E102Init::create([
                        'e102_reg' => $count + 1,
                        'e102_nl' => $request->e_initlesen,
                        'e102_bln' => now()->month,
                        'e102_thn' => now()->year,
                        'e102_flg' => '1',
                        'e102_sdate' => NULL,
                        'e102_ddate' => $request->e_ddate,
                        'e102_aa1' => NULL,
                        'e102_aa2' => NULL,
                        'e102_aa3' => NULL,
                        'e102_ab1' => NULL,
                        'e102_ab2' => NULL,
                        'e102_ab3' => NULL,
                        'e102_ac1' => NULL,
                        'e102_ac2' => NULL,
                        'e102_ac3' => NULL,
                        'e102_ad1' => NULL,
                        'e102_ad2' => NULL,
                        'e102_ad3' => NULL,
                        'e102_ae1' => NULL,
                        'e102_af2' => NULL,
                        'e102_af3' => NULL,
                        'e102_ag1' => NULL,
                        'e102_ag2' => NULL,
                        'e102_ag3' => NULL,
                        'e102_ah1' => NULL,
                        'e102_ah2' => NULL,
                        'e102_ah3' => NULL,
                        'e102_ai1' => NULL,
                        'e102_ai2' => NULL,
                        'e102_ai3' => NULL,
                        'e102_aj1' => NULL,
                        'e102_aj2' => NULL,
                        'e102_aj3' => NULL,
                        'e102_ak1' => NULL,
                        'e102_ak2' => NULL,
                        'e102_ak3' => NULL,
                        'e102_al1' => NULL,
                        'e102_al2' => NULL,
                        'e102_al3' => NULL,
                        'e102_al4' => NULL,
                        'e102_npg' => NULL,
                        'e102_jpg' => NULL,
                        'e102_flagcetak' => NULL,
                        'e102_ae3' => NULL,
                    ]);
                }
            } elseif ($reg_pelesen->e_kat == 'PL104') {

                if ($e104_init) {
                    return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
                } else {
                    $count = E104Init::max('e104_reg');

                    $query = E104Init::create([
                        'e104_reg' => $count + 1,
                        'e104_nl' => $request->e_initlesen,
                        'e104_bln' => now()->month,
                        'e104_thn' => now()->year,
                        'e104_flg' => '1',
                        'e104_sdate' => NULL,
                        'e104_ddate' => $request->e_ddate,
                        'e104_a5' => NULL,
                        'e104_a6' => NULL,
                        'e104_npg' => NULL,
                        'e104_jpg' => NULL,
                        'e104_flagcetak' => NULL,
                    ]);
                }
            } elseif ($reg_pelesen->e_kat == 'PL111') {
                if ($e07_init) {
                    return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
                } else {
                    $count = E07Init::max('e07_reg');

                    $query = E07Init::create([
                        'e07_reg' => $count + 1,
                        'e07_nl' => $request->e_initlesen,
                        'e07_bln' => now()->month,
                        'e07_thn' => now()->year,
                        'e07_flg' => '1',
                        'e07_sdate' => NULL,
                        'e07_ddate' => $request->e_ddate,
                        'e07_npg' => NULL,
                        'e07_jpg' => NULL,
                        'e07_flagcetak' => NULL,
                    ]);
                }
            } elseif ($reg_pelesen->e_kat == 'PLBIO') {
                if ($ebio_init) {
                    return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
                } else {
                    $count = EBioInit::max('ebio_reg');

                    $query = EBioInit::create([
                        'ebio_reg' => $count + 1,
                        'ebio_nl' => $request->e_initlesen,
                        'ebio_bln' => now()->month,
                        'ebio_thn' => now()->year,
                        'ebio_flg' => '1',
                        'ebio_sdate' => NULL,
                        'ebio_ddate' => $request->e_ddate,
                        'ebio_a5' => NULL,
                        'ebio_a6' => NULL,
                        'ebio_npg' => NULL,
                        'ebio_jpg' => NULL,
                        'ebio_notel' => NULL,
                        'ebio_flagcetak' => NULL,
                        'created_at' => NULL,
                        'updated_at' => NULL,
                    ]);
                }
            }
        } elseif ($reg_pelesen->e_status == '2') {
            return redirect()->back()->with('error', 'Pelesen tidak aktif');
        }


        // $this->initialize_proses_plbio($request->e_tahun, $e_bulan, $e_ddate);
        return redirect()->back()->with('success', 'Penyata pelesen ini telah diinitialize');
    }


    // public function admin_4ekilangpleidpenapis()
    // {

    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama ,
    //         ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID ,
    //     ];

    //     $kembali = route('admin.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';



    //     return view('admin.proses4.4EKilang-PLEID-penapis', compact('returnArr', 'layout'));
    // }


    // public function admin_4ekilangpleidisirung()
    // {

    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama ,
    //         ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID ,
    //     ];

    //     $kembali = route('admin.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';



    //     return view('admin.proses4.4EKilang-PLEID-isirung', compact('returnArr', 'layout'));
    // }


    // public function admin_4ekilangpleidoleokimia()
    // {

    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama ,
    //         ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID ,
    //     ];

    //     $kembali = route('admin.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';



    //     return view('admin.proses4.4EKilang-PLEID-oleokimia', compact('returnArr', 'layout'));
    // }


    // public function admin_4ekilangpleidsimpanan()
    // {

    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama ,
    //         ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID ,
    //     ];

    //     $kembali = route('admin.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';



    //     return view('admin.proses4.4EKilang-PLEID-simpanan', compact('returnArr', 'layout'));
    // }
}
