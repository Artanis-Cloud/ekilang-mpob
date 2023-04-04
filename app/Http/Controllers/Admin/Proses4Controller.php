<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\E07Btranshipment;
use App\Models\E07Init;
use App\Models\E07Transhipment;
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
use App\Models\E91b;
use App\Models\E91Init;
use App\Models\EBioB;
use App\Models\EBioC;
use App\Models\EBioCC;
use App\Models\EBioInit;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\H07Btranshipment;
use App\Models\H07Transhipment;
use App\Models\H101B;
use App\Models\H101C;
use App\Models\H101D;
use App\Models\H101E;
use App\Models\H102b;
use App\Models\H102c;
use App\Models\H104B;
use App\Models\H104C;
use App\Models\H104D;
use App\Models\H91b;
use App\Models\Hari;
use App\Models\HBioB;
use App\Models\HBioC;
use App\Models\HBioCC;
use App\Models\HHari;
use App\Models\HPelesen;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class Proses4Controller extends Controller
{

    public function admin_4ekilangpleid()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama "] ,
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Penyata Dari e-Kilang ke PLEID  "]   ,
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID', compact('returnArr', 'layout'));
    }

    public function admin_4ekilangbio()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama "] ,
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Penyata Terkini ke Penyata Arkib  "]   ,
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-biodiesel', compact('returnArr', 'layout'));
    }



    public function admin_porting(Request $request)
    {
        // dd($request->e_tahun);

        // $this->porting_pelesen($request->all());
        // $this->porting_pl91($request->all());
        // $this->porting_pl101($request->all());
        // $this->porting_pl102($request->all());
        $this->porting_pl104($request->all());
        // $this->porting_pl111($request->all());

        //log audit trail admin
        Auth::user()->log(" PORT PENYATA KE SISTEM PLEID" );


        return redirect()->back()->with('success', 'Penyata telah dipindahkan ke PLEID');
    }


    public function admin_portbio()
    {
        // dd($request->e_tahun);
        $this->porting_pelesen();
        $this->admin_portbio2();
        // $this->porting_pl91($request->all());
        // $this->porting_pl101($request->all());
        // $this->porting_pl102($request->all());
        // $this->porting_pl104($request->all());
        // $this->porting_pl111($request->all());

        //log audit trail admin
        Auth::user()->log(" PORT PENYATA KE PENYATA ARKIB" );


        return redirect()->back()->with('success', 'Penyata telah dipindahkan ke penyata arkib');
    }

    public function porting_pelesen()
    {

        $user = User::with('pelesen')->get();

        foreach($user as $selects){
           foreach ($selects->pelesen as $key => $pelesen) {
            // dd($pelesen);
            if ($pelesen->e_kat == $selects->category) {
                $e_nl = $pelesen->e_nl;
                $e_kat = $pelesen->e_kat;
                $e_nlkppk = $pelesen->e_nlkppk;
                $e_thn = date('Y');
                $e_bln = date('m', strtotime('last month'));
                $e_np = $pelesen->e_np;
                $e_ap1 = $pelesen->e_ap1;
                $e_ap2 = $pelesen->e_ap2;
                $e_ap3 = $pelesen->e_ap3;
                $e_as1 = $pelesen->e_as1;
                $e_as2 = $pelesen->e_as2;
                $e_as3 = $pelesen->e_as3;
                $e_notel = $pelesen->e_notel;
                $e_nofax = $pelesen->e_nofax;
                $e_email = $pelesen->e_email;
                $e_npg = $pelesen->e_npg;
                $e_jpg = $pelesen->e_jpg ;
                $e_notel_pg = $pelesen->e_notel_pg ;
                $e_email_pg = $pelesen->e_email_pg ;
                $kodpgw = $pelesen->kodpgw ;
                $nosiri = $pelesen->nosiri ;
                $e_npgtg = $pelesen->e_npgtg ;
                $e_jpgtg = $pelesen->e_jpgtg ;
                $eqc_npg = $pelesen->eqc_npg ;
                $eqc_jpg = $pelesen->eqc_jpg ;
                $eqc_email = $pelesen->eqc_email ;
                $e_asnegeri = $pelesen->e_asnegeri ;
                $e_asdaerah = $pelesen->e_asdaerah ;
                $e_negeri = $pelesen->e_negeri ;
                $e_daerah = $pelesen->e_daerah ;
                $e_kawasan = $pelesen->e_kawasan ;
                $e_syktinduk = $pelesen->e_syktinduk ;
                $stk_npg = $pelesen->stk_npg ;
                $stk_notel = $pelesen->stk_notel ;
                $stk_nofax = $pelesen->stk_nofax  ;
                $stk_email = $pelesen->stk_email  ;
                $stk_syktinduk = $pelesen->stk_syktinduk ;
                $stk_cpo_kap =  (float)  $pelesen->stk_cpo_kap ;
                $stk_rbdpo_kap = (float) $pelesen->stk_rbdpo_kap ;
                $stk_rbdpl_kap = (float)   $pelesen->stk_rbdpl_kap ;
                $stk_rbdps_kap = (float)   $pelesen->stk_rbdps_kap ;
                $stk_lainppo_kap =  (float)  $pelesen->stk_lainppo_kap ;
                $stk_ppo_kap =  (float)  $pelesen->stk_ppo_kap ;
                $stk_po_kap =  (float)  $pelesen->stk_po_kap ;
                $stk_pfad_kap =  (float)  $pelesen->stk_pfad_kap ;
                $e_group =  $pelesen->e_group ;
                $e_subgroup =  $pelesen->e_subgroup ;
                $e_poma =  $pelesen->e_poma ;
                $e_biogas =  $pelesen->e_biogas ;
                $e_status_biogas =  $pelesen->e_status_biogas ;
                $e_year =  $pelesen->e_year ?? 0;
                $e_cluster =  $pelesen->e_cluster ;
                $e_katkilang =  $pelesen->e_katkilang ;
                $e_status =  $pelesen->e_status ;
                $e_email_pengurus =  $pelesen->e_email_pengurus ;
                $kap_proses =  $pelesen->kap_proses ;
                $kap_tangki =  $pelesen->kap_tangki  ;
                $bil_tangki_cpo =  $pelesen->bil_tangki_cpo ;
                $bil_tangki_ppo =  $pelesen->bil_tangki_ppo  ;
                $bil_tangki_cpko =  $pelesen->bil_tangki_cpko ;
                $bil_tangki_ppko =  $pelesen->bil_tangki_ppko ;
                $bil_tangki_oleo =  $pelesen->bil_tangki_oleo  ;
                $bil_tangki_oleo =  $pelesen->bil_tangki_others ;
                $bil_tangki_jumlah =  $pelesen->bil_tangki_jumlah ;
                $kap_tangki_cpo =  $pelesen->kap_tangki_cpo ;
                $kap_tangki_ppo =  $pelesen->kap_tangki_ppo ;
                $kap_tangki_cpko =  $pelesen->kap_tangki_cpko  ;
                $kap_tangki_ppko =  $pelesen->kap_tangki_ppko  ;
                $kap_tangki_oleo =  $pelesen->kap_tangki_oleo  ;
                $kap_tangki_others =  $pelesen->kap_tangki_others ;
                $kap_tangki_jumlah =  $pelesen->kap_tangki_jumlah  ;

                $bln = ltrim($e_bln, "0");
                // dd($e_bln);

                $str="'";
                $np = str_replace($str, "\'", $e_np);
                $ap1 = str_replace($str, "\'", $e_ap1);
                $ap2 = str_replace($str, "\'", $e_ap2);
                $ap3 = str_replace($str, "\'", $e_ap3);
                $as1 = str_replace($str, "\'", $e_as1);
                $as2 = str_replace($str, "\'", $e_as2);
                $as3 = str_replace($str, "\'", $e_as3);
                $npg = str_replace($str, "\'", $e_npg);
                $npg1 = str_replace($str, "\'", $eqc_npg);
                $npg2 = str_replace($str, "\'", $e_npgtg);

                $idmax = HPelesen::max('e_id');

                if ($idmax)
                {
                    $idno = $idmax + 1;
                    // dd($idno);
                } else {
                    $idno = 1;

                }

                $check = HPelesen::where('e_nl', $e_nl)->where('e_kat', $e_kat)->where('e_thn', $e_thn)->where('e_bln', $bln)->first();
                // dd($check);

                if ($check) {
                    $check->delete();
                    // $del_rp = DB::DELETE("DELETE FROM h_pelesen where e_thn = '$e_thn' and e_bln='$e_bln' and e_nl= '$e_nl'");

                    //insert data to hpelesen
                    $inserthpelesen = DB::insert("INSERT into h_pelesen values ($idno,'$e_nl', '$e_kat',
                    $e_thn,$e_bln,'$e_nlkppk','$np','$ap1','$ap2',
                    '$ap3',
                    '$as1',
                    '$as2',
                    '$as3',
                    '$e_notel',
                    '$e_nofax',
                    '$e_email',
                    '$npg',
                    '$e_jpg',
                    '$e_notel_pg',
                    '$e_email_pg',
                    '$kodpgw',
                    '$nosiri',
                    '$npg2',
                    '$e_jpgtg',
                    '$npg1',
                    '$eqc_jpg',
                    '$eqc_email',
                    '$e_asnegeri',
                    '$e_asdaerah',
                    '$e_negeri',
                    '$e_daerah',
                    '$e_kawasan',
                    '$e_syktinduk','$stk_npg','$stk_notel','$stk_nofax','$stk_email','$stk_syktinduk',$stk_cpo_kap,$stk_rbdpo_kap,$stk_rbdpl_kap,
                    $stk_rbdps_kap,$stk_lainppo_kap,$stk_ppo_kap,$stk_po_kap,$stk_pfad_kap,'$e_group','$e_subgroup','$e_poma','$e_biogas',
                    '$e_status_biogas', $e_year,
                    '$e_cluster','$e_katkilang','$e_status','$e_email_pengurus','$kap_proses',
                    '$kap_tangki','$bil_tangki_cpo','$bil_tangki_ppo','$bil_tangki_cpko','$bil_tangki_ppko','$bil_tangki_oleo','$bil_tangki_oleo','$bil_tangki_jumlah','$kap_tangki_cpo','$kap_tangki_ppo','$kap_tangki_cpko','$kap_tangki_ppko','$kap_tangki_oleo','$kap_tangki_others','$kap_tangki_jumlah')");


                } else {
                    $inserthpelesen = DB::insert("INSERT into h_pelesen values ($idno,'$e_nl','$e_kat',
                    $e_thn,$e_bln,'$e_nlkppk','$np','$ap1','$ap2',
                    '$ap3',
                    '$as1',
                    '$as2',
                    '$as3',
                    '$e_notel',
                    '$e_nofax',
                    '$e_email',
                    '$npg',
                    '$e_jpg',
                    '$e_notel_pg',
                    '$e_email_pg',
                    '$kodpgw',
                    '$nosiri',
                    '$npg2',
                    '$e_jpgtg',
                    '$npg1',
                    '$eqc_jpg',
                    '$eqc_email',
                    '$e_asnegeri',
                    '$e_asdaerah',
                    '$e_negeri',
                    '$e_daerah',
                    '$e_kawasan',
                    '$e_syktinduk','$stk_npg','$stk_notel','$stk_nofax','$stk_email','$stk_syktinduk',$stk_cpo_kap,$stk_rbdpo_kap,$stk_rbdpl_kap,
                    $stk_rbdps_kap,$stk_lainppo_kap,$stk_ppo_kap,$stk_po_kap,$stk_pfad_kap,'$e_group','$e_subgroup','$e_poma','$e_biogas',
                    '$e_status_biogas', $e_year,
                    '$e_cluster','$e_katkilang','$e_status','$e_email_pengurus','$kap_proses',
                    '$kap_tangki','$bil_tangki_cpo','$bil_tangki_ppo','$bil_tangki_cpko','$bil_tangki_ppko','$bil_tangki_oleo','$bil_tangki_oleo','$bil_tangki_jumlah','$kap_tangki_cpo','$kap_tangki_ppo','$kap_tangki_cpko','$kap_tangki_ppko','$kap_tangki_oleo','$kap_tangki_others','$kap_tangki_jumlah')");

                }
            }

        }


        }
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

                        $idmax = H91b::max('e91_b1');
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
                    values ('$nolesen','$tarikh','$tarikh','$nobatch','$bulan', '$tahun',$a1,$a2,$a3,NULL,NULL)");

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
                        // $jum91b = $jum91b + 1;

                         // insert data to pldb pl101
                    $insertpl101b = DB::connection('mysql4')->insert("INSERT into pl101bp3 (F101B1,F101B2,F101B3,F101B4,
                        F101B5,F101B6,F101B7,F101B8,F101B9,F101B10,F101B11,F101B12,F101B13,F101B14,F101BB1,F101BB1_date)
                        values ('$nolesen','$nobatch','$b3','$b4',$b5,$b6,
                        $b7,$b8,$b9,$b10,$b11,$b12,$b13,$b14,NULL,NULL)");

                        $idmax101b = H101B::max('e101_b1');
                        // dd($idmax);

                        if ($idmax101b)
                        {
                            $idno = $idmax101b + 1;
                            // dd($idno);
                        }

                        $inserth101b = DB::insert("INSERT into h101_b values ($idno,'$nobatch',
                        '$b3','$b4',$b5,$b6,
                        $b7,$b8,$b9,$b10,$b11,$b12,$b13,$b14)");


                    }

                    $e101c = E101C::where('e101_reg', $regno)->get();

                    foreach ($e101c as $rowe101_c)
                    {
                        $c3 = $rowe101_c->e101_c3 ;
                        $c4 = $rowe101_c->e101_c4 ;
                        $c5 = (float) $rowe101_c->e101_c5 ;
                        $c6 = (float) $rowe101_c->e101_c6 ;
                        $c7 = (float) $rowe101_c->e101_c7 ;
                        $c8 = (float) $rowe101_c->e101_c8 ;
                        $c9 = (float) $rowe101_c->e101_c9 ;
                        $c10 = (float) $rowe101_c->e101_c10 ;

                        $insertpl101c = DB::connection('mysql4')->insert("INSERT into pl101cp3 (F101C1,F101C2,F101C3,F101C4,F101C5,
                        F101C6,F101C7,F101C8,F101C9,F101C10,F101CC1,F101CC1_date) values ('$nolesen','$nobatch',
                        '$c3','$c4', $c5,$c6,$c7,$c8,$c9,$c10,NULL,NULL)");


                        $idmax101c = H101C::max('e101_c1');
                        // dd($idmax);

                        if ($idmax101c)
                        {
                            $idno = $idmax101c + 1;
                            // dd($idno);
                        }

                        $inserth101c = DB::insert("INSERT into h101_c values ($idno,'$nobatch',
                        '$c3','$c4',$c5,$c6,$c7,$c8,$c9,$c10)");
                    }

                    $e101d = E101D::where('e101_reg', $regno)->get();

                    foreach ($e101d as $rowe101_d)
                    {
                        $d3 =  $rowe101_d->e101_d3 ;
                        $d4 =  $rowe101_d->e101_d4 ;
                        $d5 = (float)  $rowe101_d->e101_d5 ;
                        $d6 = (float)  $rowe101_d->e101_d6 ;
                        $d7 = (float)  $rowe101_d->e101_d7 ;
                        $d8 = (float)  $rowe101_d->e101_d8 ;

                        $insertpl101d = DB::connection('mysql4')->insert("INSERT into pl101dp3 (F101D1,F101D2,F101D3,F101D4,
                        F101D5,F101D6,F101D7,F101D8,F101DD1,F101DD1_date) values ('$nolesen','$nobatch','$d3',
                        '$d4',$d5,$d6,$d7,$d8,NULL,NULL)");


                        $idmax101d = H101D::max('e101_d1');
                        // dd($idmax);

                        if ($idmax101d)
                        {
                            $idno = $idmax101d + 1;
                            // dd($idno);
                        }

                        $inserth101d = DB::insert("INSERT into h101_d values ($idno,'$nobatch','$d3',
                        '$d4',$d5,$d6, $d7, $d8)");
                    }


                    $e101e = E101E::where('e101_reg', $regno)->get();

                    foreach ($e101e as $rowe101_e)
                    {
                        $e3 = $rowe101_e->e101_e3 ;
                        $e4 = $rowe101_e->e101_e4 ;
                        $e5 = $rowe101_e->e101_e5 ;
                        $e6 = $rowe101_e->e101_e6 ;
                        $e7 = (float) $rowe101_e->e101_e7 ;
                        $e8 = (float) $rowe101_e->e101_e8 ;
                        $e9 = $rowe101_e->e101_e9 ;
                        $nokontrak = $rowe101_e->nokontrak ;
                        $port = $rowe101_e->port ;
                        $portdest = $rowe101_e->portdest ;
                        $matawang = $rowe101_e->matawang ;
                        $nilai = $rowe101_e->nilai ;
                        $nolesensykt = $rowe101_e->nolesen_sykt ;
                        $namasykt = $rowe101_e->nama_sykt ;
                        $namaproduk = $rowe101_e->nama_produk ;
                        $namapel = $rowe101_e->nama_pelabuhan ;
                        $kenderaan = $rowe101_e->kenderaan ;
                        $nodafkend = $rowe101_e->kenderaan_nodaftar ;
                        $namadestport = $rowe101_e->nama_destport ;
                        $namadestnegara = $rowe101_e->nama_destnegara ;
                        $namasykt1 = $rowe101_e->nama_sykt1 ;
                        $bungkusan = $rowe101_e->mpobq_bungkusan ;
                        $nilairm = $rowe101_e->mpobq_nilai_2 ;

                        $idmax101e = H101E::max('e101_e1');
                        // dd($idmax);

                        if ($idmax101e)
                        {
                            $idno = $idmax101e + 1;
                            // dd($idno);
                        }

                        $inserth101e = DB::insert("INSERT into h101_e values ($idno,'$nobatch','$e3',
                        '$e4','$e5','$e6', $e7, $e8, '$e9','$nokontrak',
                        '$port','$portdest','$matawang','$nilai',
                        '$nolesensykt','$namasykt','$namaproduk',
                        '$namapel','$kenderaan','$nodafkend','$namadestport',
                        '$namadestnegara','$namasykt1','$bungkusan','$nilairm')");
                    }

                }

    }

    public function porting_pl102()
    {
        //data from e102_init
        $e102init = E102Init::where('e102_flg', '2')->get();
        // dd($e91init);

        $totalpl102 = 0;

        foreach ($e102init as $key => $selects) {

            $regno = $selects->e102_reg ;
            $nolesen = $selects->e102_nl ;
            $tahun = $selects->e102_thn ;
            $bulan = $selects->e102_bln ;
            $tarikh = $selects->e102_sdate ;
            $tarikh1 = $selects->e102_ddate ;
            $aa1 = (float) $selects->e102_aa1 ;
            $aa2 = (float) $selects->e102_aa2 ;
            $aa3 = (float) $selects->e102_aa3 ;
            $ab1 = (float) $selects->e102_ab1 ;
            $ab2 = (float) $selects->e102_ab2 ;
            $ab3 = (float) $selects->e102_ab3 ;
            $ac1 = (float) $selects->e102_ac1 ;
            $ac2 = (float) $selects->e102_ac2 ;
            $ac3 = (float) $selects->e102_ac3 ;
            $ad1 = (float) $selects->e102_ad1 ;
            $ad2 = (float) $selects->e102_ad2 ;
            $ad3 = (float) $selects->e102_ad3 ;
            $ae1 = (float) $selects->e102_ae1 ;
            $af2 = (float) $selects->e102_af2 ;
            $af3 = (float) $selects->e102_af3 ;
            $ag1 = (float) $selects->e102_ag1 ;
            $ag2 = (float) $selects->e102_ag2 ;
            $ag3 = (float) $selects->e102_ag3 ;
            $ah1 = (float) $selects->e102_ah1 ;
            $ah2 = (float) $selects->e102_ah2 ;
            $ah3 = (float) $selects->e102_ah3 ;
            $ai1 = (float) $selects->e102_ai1 ;
            $ai2 = (float) $selects->e102_ai2 ;
            $ai3 = (float) $selects->e102_ai3 ;
            $aj1 = (float) $selects->e102_aj1 ;
            $aj2 = (float) $selects->e102_aj2 ;
            $aj3 = (float) $selects->e102_aj3 ;
            $ak1 = (float) $selects->e102_ak1 ;
            $ak2 = (float) $selects->e102_ak2 ;
            $ak3 = (float) $selects->e102_ak3 ;
            $al1 = (float) $selects->e102_al1 ;
            $al2 = (float) $selects->e102_al2 ;
            $al3 = (float) $selects->e102_al3 ;
            $al4 = (float) $selects->e102_al4 ;

            $npg = $selects->e102_npg ;
            $jpg = $selects->e102_jpg ;

            $ae3 = (float) $selects->e102_ae3 ;


            $regpelesen102 = RegPelesen::where('e_nl', $nolesen)->where('e_kat', 'PL102')->get();

            foreach ($regpelesen102 as $row)
          {
            $kodpgw = $row->kodpgw;
            $nosiri = $row->nosiri;

            $nobatch = "$bulan$tahun$kodpgw$nosiri";
            // dd($nobatch);

          }

            // insert data to pldb pl102
            $insertpl102 = DB::connection('mysql4')->insert("INSERT into pl1021p3 (F1021A,F1021B,F1021C,F1021D,F1021E,F1021F,F1021G1,F1021G2,F1021G3,F1021H1,F1021H2,F1021H3,F1021I1,F1021I2,F1021I3,F1021J1,F1021J2,
            F1021J3,F1021K,F1021L1,F1021L2,F1021M1,F1021M2,F1021M3,F1021N1,F1021N2,F1021N3,F1021O1,F1021O2,F1021O3,F1021Q1,F1021Q2,F1021Q3,
            F1021R1,F1021R2,F1021R3,F1021S1,F1021S2,F1021S3,F1021S4,F1021AA,F1021AA_date,F1021K2) values ('$nolesen','$nobatch',
                                 '$bulan','$tahun','$tarikh','$tarikh',
                                $aa1,$aa2,$aa3,$ab1,$ab2,$ab3,$ac1,
                                $ac2,$ac3,$ad1,$ad2,$ad3,
                                $ae1,$af2,$af3,$ag1,$ag2,$ag3,$ah1,$ah2,$ah3,
                                $ai1,$ai2,$ai3,$aj1,$aj2,$aj3,$ak1,$ak2,$ak3,
                                $al1,$al2,$al3,$al4, NULL, NULL,$ae3)");

                    // dd($insertpl91);

                    if ($insertpl102) {
                        $totalpl102 = $totalpl102 + 1;

                        $str="'";
                        $npg = str_replace($str, "\'", $npg);

                        //update flg to 3 (ported)
                       $updatee102 = DB::update("UPDATE e102_init
                       set e102_flg = '3'
                       WHERE e102_nl = '$nolesen'");

                        //insert data to h102_init
                        $inserth102 = DB::insert("INSERT into h102_init values ('$nobatch','$nolesen',
                        '$bulan','$tahun','3','$tarikh','$tarikh1',
                       $aa1,$aa2,$aa3,$ab1,$ab2,$ab3,$ac1,
                       $ac2,$ac3,$ad1,$ad2,$ad3,
                       $ae1,$af2,$af3,$ag1,$ag2,$ag3,$ah1,$ah2,$ah3,
                       $ai1,$ai2,$ai3,$aj1,$aj2,$aj3,$ak1,$ak2,$ak3,
                       $al1,$al2,$al3,$al4,'$npg','$jpg','$ae3')");



                    }

                    $e102b = E102b::where('e102_b2', $regno)->get();
                    // $jum91b = 0;

                    foreach ($e102b as $rowe102b)
                    {
                        $b3 =  $rowe102b->e102_b3 ;
                        $b4 =  $rowe102b->e102_b4 ;
                        $b5 =  $rowe102b->e102_b5 ;
                        $b6 = (float)  $rowe102b->e102_b6 ;

                        // insert into mysqli history e91b
                        //calculate total row
                        // $jum91b = $jum91b + 1;

                         // insert data to pldb pl101
                    $insertpl102b = DB::connection('mysql4')->insert("INSERT into pl1022p3 (F1022A,F1022B,F1022C,F1022D,F1022E,F1022F,F1022AA,F1022AA_date) values ('$nolesen','$nobatch',
                    '$b3','$b4','$b5',$b6,NULL,NULL)");

                        $idmax102b = H102b::max('e102_b1');
                        // dd($idmax);

                        if ($idmax102b)
                        {
                            $idno = $idmax102b + 1;
                            // dd($idno);
                        }

                        $inserth101b = DB::insert("INSERT into h102b values ('$idno','$nobatch',
                        '$b3','$b4','$b5',$b6)");
                    }

                    $e102c = E102c::where('e102_c2', $regno)->get();

                    foreach ($e102c as $rowe102c)
                    {
                        $c3 = $rowe102c->e102_c3 ;
                        $c4 = $rowe102c->e102_c4 ;
                        $c5 = $rowe102c->e102_c5 ;
                        $c6 = $rowe102c->e102_c6 ;
                        $c7 = (float) $rowe102c->e102_c7 ;
                        $c8 = (float) $rowe102c->e102_c8 ;
                        $c9 = $rowe102c->e102_c9 ;
                        $nokontrak = $rowe102c->nokontrak ;
                        $port = $rowe102c->port ;
                        $portdest = $rowe102c->portdest ;
                        $matawang = $rowe102c->matawang ;
                        $nilai = $rowe102c->nilai ;
                        $nolesensykt = $rowe102c->nolesen_sykt ;
                        $namasykt = $rowe102c->nama_sykt ;
                        $namaproduk = $rowe102c->nama_produk ;
                        $namapel = $rowe102c->nama_pelabuhan ;
                        $kenderaan = $rowe102c->kenderaan ;
                        $nodafkend = $rowe102c->kenderaan_nodaftar ;
                        $namadestport = $rowe102c->nama_destport ;
                        $namadestnegara = $rowe102c->nama_destnegara ;
                        $namasykt1 = $rowe102c->nama_sykt1 ;
                        $bungkusan = $rowe102c->mpobq_bungkusan ;
                        $nilairm = $rowe102c->mpobq_nilai_2 ;

                        $idmax102c = H102c::max('e102_c1');
                        // dd($idmax);

                        if ($idmax102c)
                        {
                            $idno = $idmax102c + 1;
                            // dd($idno);
                        }

                        $inserth102c = DB::insert("INSERT into h102c values ($idno,'$nobatch','$c3',
                        '$c4','$c5','$c6', $c7, $c8, '$c9','$nokontrak',
                        '$port','$portdest','$matawang','$nilai',
                        '$nolesensykt','$namasykt','$namaproduk',
                        '$namapel','$kenderaan','$nodafkend','$namadestport',
                        '$namadestnegara','$namasykt1','$bungkusan','$nilairm')");
                    }

                }

    }

    public function porting_pl104()
    {
        //data from e104_init
        $e104init = E104Init::where('e104_flg', '2')->get();
        // dd($e91init);

        $totalpl104 = 0;

        foreach ($e104init as $key => $selects) {

            $regno = $selects->e104_reg ;
            $nolesen = $selects->e104_nl ;
            $tahun = $selects->e104_thn ;
            $bulan = $selects->e104_bln ;
            $tarikh = $selects->e104_sdate ;
            $tarikh1 = $selects->e104_ddate ;
            $a5 = (float) $selects->e104_a5 ;
            $a6 = (float) $selects->e104_a6 ;
            $npg = $selects->e104_npg ;
            $jpg = $selects->e104_jpg ;


            $regpelesen104 = RegPelesen::where('e_nl', $nolesen)->where('e_kat', 'PL104')->get();

            foreach ($regpelesen104 as $row)
          {
            $kodpgw = $row->kodpgw;
            $nosiri = $row->nosiri;

            $nobatch = "$bulan$tahun$kodpgw$nosiri";
            // dd($nobatch);

          }

            // insert data to pldb pl104
            $insertpl104 = DB::connection('mysql4')->insert("INSERT into pl104ap1 (F104A1,F104A2,F104A3,F104A4,F104A5,F104A6,F104A7,F104A8,kodnegeri,F104AA1,F104AA1_date) values
            ('$nolesen','$tarikh','$tarikh','$nobatch','$bulan','$tahun',$a5,$a6,NULL,NULL,NULL)");

                    // dd($insertpl91);

                    if ($insertpl104) {
                        $totalpl104 = $totalpl104 + 1;

                        $str="'";
                        $npg = str_replace($str, "\'", $npg);

                        //update flg to 3 (ported)
                       $updatee104 = DB::update("UPDATE e104_init
                       set e104_flg = '3'
                       WHERE e104_nl = '$nolesen'");

                        //insert data to h102_init
                        $inserth104 = DB::insert("INSERT into h104_init values ('$nobatch','$nolesen',
                        '$bulan','$tahun','3','$tarikh','$tarikh1', $a5, $a6, '$npg', '$jpg')");

                    }

                    $e104b = E104B::where('e104_reg', $regno)->get();
                    // $jum91b = 0;

                    foreach ($e104b as $rowe104_b)
                    {
                        $b3 = $rowe104_b ->e104_b3 ;
                        $b4 = $rowe104_b ->e104_b4 ;
                        $b5 = (float) $rowe104_b ->e104_b5 ;
                        $b6 = (float) $rowe104_b ->e104_b6 ;
                        $b7 = (float) $rowe104_b ->e104_b7 ;
                        $b8 = (float) $rowe104_b ->e104_b8 ;
                        $b9 = (float) $rowe104_b ->e104_b9 ;
                        $b10 = (float) $rowe104_b ->e104_b10 ;
                        $b11 = (float) $rowe104_b ->e104_b11 ;
                        $b12 = (float) $rowe104_b ->e104_b12 ;
                        $b13 = (float) $rowe104_b ->e104_b13 ;

                        // insert into mysqli history e91b
                        //calculate total row
                        // $jum91b = $jum91b + 1;

                         // insert data to pldb pl101
                    $insertpl104b = DB::connection('mysql4')->insert("INSERT into pl104bp1 (F104B1,F104B2,F104B3,F104B4,F104B5,F104B6,F104B7,F104B8,F104B9,F104B10,F104B11,F104B12,F104B13,F104BB1,F104BB1_date)
                    values ('$nolesen','$nobatch','$b3','$b4',$b5,$b6,$b7,$b8,$b9,$b10,$b11,$b12,$b13,NULL,NULL)");

                        $idmax104b = H104B::max('e104_b1');
                        // dd($idmax);

                        if ($idmax104b)
                        {
                            $idno = $idmax104b + 1;
                            // dd($idno);
                        }

                        $inserth104b = DB::insert("INSERT into h104_b values ($idno,'$nobatch',
                        '$b3','$b4',$b5,$b6, $b7,$b8,$b9,$b10,$b11,$b12,$b13)");
                    }

                    $e104c = E104C::where('e104_reg', $regno)->orderBy('e104_c3')->get();

                    foreach ($e104c as $rowe104_c)
                    {
                        $c3 = $rowe104_c->e104_c3 ;
                        $c4 = (float) $rowe104_c->e104_c4 ;
                        $c5 = (float) $rowe104_c->e104_c5 ;
                        $c6 = (float) $rowe104_c->e104_c6 ;
                        $c7 = (float) $rowe104_c->e104_c7 ;
                        $c8 = (float) $rowe104_c->e104_c8 ;

                        $insertpl104c = DB::connection('mysql4')->insert("INSERT into pl104cp1 (F104C1,F104C2,F104C3,F104C4,F104C5,F104C6,F104C7,F104C8,F104CC1,F104CC1_date) values ('$nolesen','$nobatch','$c3',
                        $c4, $c5, $c6, $c7, $c8, NULL, NULL)");

                        $idmax104c = H104C::max('e104_c1');
                        // dd($idmax);

                        if ($idmax104c)
                        {
                            $idno = $idmax104c + 1;
                            // dd($idno);
                        }

                        $inserth104c = DB::insert("INSERT into h104_c values ($idno,'$nobatch',
                        '$c3',$c4,
                         $c5,$c6,$c7,$c8)");
                    }

                    $e104d = E104D::where('e104_reg', $regno)->get();

                    foreach ($e104d as $rowe104_d)
                    {
                        $d3 = $rowe104_d->e104_d3 ;
                        $d4 = $rowe104_d->e104_d4 ;
                        $d5 = $rowe104_d->e104_d5 ;
                        $d6 = $rowe104_d->e104_d6 ;
                        $d7 = (float) $rowe104_d->e104_d7 ;
                        $d8 = (float) $rowe104_d->e104_d8 ;
                        $d9 = $rowe104_d->e104_d9 ;
                        $nokontrak = $rowe104_d->nokontrak ;
                        $port = $rowe104_d->port ;
                        $portdest = $rowe104_d->portdest ;
                        $matawang = $rowe104_d->matawang ;
                        $nilai = $rowe104_d->nilai ;
                        $nolesensykt = $rowe104_d->nolesen_sykt ;
                        $namasykt = $rowe104_d->nama_sykt ;
                        $namaproduk = $rowe104_d->nama_produk ;
                        $namapel = $rowe104_d->nama_pelabuhan ;
                        $kenderaan = $rowe104_d->kenderaan ;
                        $nodafkend = $rowe104_d->kenderaan_nodaftar ;
                        $namadestport = $rowe104_d->nama_destport ;
                        $namadestnegara = $rowe104_d->nama_destnegara ;
                        $namasykt1 = $rowe104_d->nama_sykt1 ;
                        $bungkusan = $rowe104_d->mpobq_bungkusan ;
                        $nilairm = $rowe104_d->mpobq_nilai_2 ;

                        $idmax104d = H104D::max('e104_d1');
                        // dd($idmax);

                        if ($idmax104d)
                        {
                            $idno = $idmax104d + 1;
                            // dd($idno);
                        }

                        $inserth104d = DB::insert("INSERT into h104_d values ($idno,'$nobatch','$d3',
                        '$d4','$d5','$d6', $d7, $d8, '$d9',
                        '$nokontrak',
                        '$port','$portdest','$matawang','$nilai',
                        '$nolesensykt','$namasykt','$namaproduk',
                        '$namapel','$kenderaan','$nodafkend','$namadestport',
                        '$namadestnegara','$namasykt1','$bungkusan','$nilairm')");
                    }

                }

    }

    public function porting_pl111()
    {
        //data from e104_init
        $e111init = E07Init::where('e07_flg', '2')->get();
        // dd($e91init);

        $totalpl111 = 0;

        foreach ($e111init as $key => $selects) {

            $regno =  $selects->e07_reg ;
            $nolesen =  $selects->e07_nl ;
            $tahun =  $selects->e07_thn ;
            $bulan =  $selects->e07_bln ;
            $tarikh =  $selects->e07_sdate ;
            $tarikh1 =  $selects->e07_ddate ;

            $npg =  $selects->e07_npg ;
            $jpg =  $selects->e07_jpg ;


            $regpelesen111 = RegPelesen::where('e_nl', $nolesen)->where('e_kat', 'PL111')->get();

            foreach ($regpelesen111 as $row)
          {
            $kodpgw = $row->kodpgw;
            $nosiri = $row->nosiri;

            $nobatch = "$bulan$tahun$kodpgw$nosiri";
            $nobatch1 = "$bulan$tahun$kodpgw";

            // dd($nobatch);

          }

            // insert data to pldb pl111
            $insertpl111 = DB::connection('mysql4')->insert("INSERT into mpb_insp3a (INS_IA,INS_IB,INS_IC,INS_ID,INS_IE,INS_IF,INS_IAA,INS_IAA_date) values ('$nolesen','$bulan','$tahun',
            '$tarikh','$tarikh','$nobatch1',NULL,NULL)");

            $totalpl111 = $totalpl111 + 1;

            // $str="'";
            // $npg = str_replace($str, "\'", $npg);

            //update flg to 3 (ported)
            $updatee111 = DB::update("UPDATE e07_init
            set e07_flg = '3'
            WHERE e07_nl = '$nolesen'");

            //insert data to h102_init
            $inserth111 = DB::insert("INSERT into h07_init values ('$nobatch','$nolesen',
            '$bulan','$tahun','3','$tarikh','$tarikh1','$npg','$jpg')");


            $e111b = E07Btranshipment::where('e07bt_idborang', $regno)->get();
                    // $jum91b = 0;

                    foreach ($e111b as $rowe111b)
                    {
                        $b3 = $rowe111b->e07bt_produk ;
                        $b4 = (float) $rowe111b->e07bt_stokawal ;
                        $b5 = (float) $rowe111b->e07bt_terima ;
                        $b6 = (float) $rowe111b->e07bt_import ;
                        $b7 = (float) $rowe111b->e07bt_edaran ;
                        $b8 = (float) $rowe111b->e07bt_eksport ;
                        $b9 = (float) $rowe111b->e07bt_pelarasan ;
                        $b10 = (float) $rowe111b->e07bt_stokakhir ;

                        // insert into mysqli history e91b
                        //calculate total row
                        // $jum91b = $jum91b + 1;

                         // insert data to pldb pl101
                    $insertpl111b = DB::connection('mysql4')->insert("INSERT into mpb_insp3b (INS_KA,INS_KB,INS_KC,INS_KD,INS_KE,INS_KF,INS_KG,INS_KH,INS_KI,INS_KJ,INS_KAA,INS_KAA_date) values ('$nolesen',
                    '$bulan','$tahun','$b3',$b4,$b5,$b6,$b7,$b8,$b10,NULL,NULL)");

                        $idmax111b = H07Btranshipment::max('e07bt_id');
                        // dd($idmax);

                        if ($idmax111b)
                        {
                            $idno = $idmax111b + 1;
                            // dd($idno);
                        }

                        $inserth111b = DB::insert("INSERT into h07_btranshipment values ($idno,'$nobatch',
                        '$b3','$b4',$b5,$b6,$b7,$b8,$b9,$b10)");
                    }

                    $e111c = E07Transhipment::where('e07t_idborang', $regno)->get();

                    foreach ($e111c as $rowe111c)
                    {
                        $c3 =  $rowe111c->e07t_produk ;
                        $c4 = (float)  $rowe111c->e07t_stokawal ;
                        $c5 = (float)  $rowe111c->e07t_terima ;
                        $c6 = (float)  $rowe111c->e07t_edaran ;
                        $c7 = (float)  $rowe111c->e07t_eksport ;
                        $c8 = (float)  $rowe111c->e07t_pelarasan ;
                        $c9 = (float)  $rowe111c->e07t_stokakhir ;

                        $insertpl111c = DB::connection('mysql4')->insert("INSERT into mpb_insp3c (INS_TA,INS_TB,INS_TC,INS_TD,INS_TE,INS_TF,INS_TG,INS_TH,INS_TI,INS_TAA,INS_TAA_date) values ('$nolesen',
                        '$bulan','$tahun','$c3',$c4,$c5,$c6,$c7,$c9,NULL,NULL)");

                        $idmax111c = H07Transhipment::max('e07t_id');
                        // dd($idmax);

                        if ($idmax111c)
                        {
                            $idno = $idmax111c + 1;
                            // dd($idno);
                        }

                        $inserth111c = DB::insert("INSERT into h07_transhipment values ($idno,'$nobatch',
                        '$c3',$c4,$c5,$c6,$c7,$c8,$c9)");
                    }

                }

    }
    public function admin_portbio2()
    {
        //data from ebio_init
        $ebioinit = EBioInit::whereIn('ebio_flg', array(2,3))->get();
        // dd($ebioinit);

        $totalplbio = 0;

        foreach ($ebioinit as $key => $selects) {
            // dd($selects);

            $regno = $selects->ebio_reg ;
            $nolesen = $selects->ebio_nl ;
            $tahun = $selects->ebio_thn ;
            $bulan = $selects->ebio_bln ;
            $tarikh = $selects->ebio_sdate ;
            $tarikh1 = $selects->ebio_ddate ;
            $a5 = (float) $selects->ebio_a5 ;
            $a6 = (float) $selects->ebio_a6 ;
            $npg = $selects->ebio_npg ;
            $jpg = $selects->ebio_jpg ;
            $notel = $selects->ebio_notel ;


            $regpelesenbio = User::where('username', $nolesen)->where('category', 'PLBIO')->get();
            // dd($regpelesenbio);

            foreach ($regpelesenbio as $row)
          {
            // dd($row);
            $kodpgw = $row->kodpgw;
            $nosiri = $row->nosiri;

            $nobatch = "$bulan$tahun$regno";
            // dd($nobatch);

          }

        //   $insertplbio = DB::connection('mysql4')->insert("INSERT into h_bio_inits values
        //     ('$nobatch','$nolesen','$bulan','$tahun','3','$tarikh','$tarikh1', '$npg', '$jpg', '$notel')");

                $totalplbio = $totalplbio + 1;

                $str="'";
                $npg = str_replace($str, "\'", $npg);

                //update flg to 3 (ported)


                $deletehbio = DB::delete("DELETE from h_bio_inits where ebio_bln='$bulan' and ebio_thn = '$tahun' and ebio_nobatch='$nobatch'");


                //insert data to hbio_init
                $inserthbio = DB::insert("INSERT into h_bio_inits values ('$nobatch','$nolesen',
                '$bulan','$tahun','3','$tarikh','$tarikh1', '$npg', '$jpg', '$notel')");



                    $ebiob = EBioB::where('ebio_reg', $regno)->get();
                    // dd($ebiob);
                    // $jum91b = 0;

                    foreach ($ebiob as $rowebio_b)
                    {
                        // dd($rowebio_b);
                        $b3 = $rowebio_b->ebio_b3 ;
                        $b4 = $rowebio_b->ebio_b4 ;
                        $b5 = (float) $rowebio_b->ebio_b5 ;
                        $b6 = (float) $rowebio_b->ebio_b6 ;
                        $b7 = (float) $rowebio_b->ebio_b7 ;
                        $b8 = (float) $rowebio_b->ebio_b8 ;
                        $b9 = (float) $rowebio_b->ebio_b9 ;
                        $b10 = (float) $rowebio_b->ebio_b10 ;
                        $b11 = (float) $rowebio_b->ebio_b11 ;
                        $b13 = (float) $rowebio_b->ebio_b13 ;

                        // insert into mysqli history e91b
                        //calculate total row
                        // $jum91b = $jum91b + 1;

                        $idmaxbiob = HBioB::max('ebio_b1');
                        // dd($idmax);

                        if ($idmaxbiob)
                        {
                            $idno = $idmaxbiob + 1;
                            // dd($idno);
                        } else {
                            $idno = 1;
                        }

                    // $insertplbiob = DB::connection('mysql4')->insert("INSERT into h_bio_b_s
                    // values ($idno,'$nobatch','$b3','$b4',$b5,$b6, $b7,$b8,$b9,$b10,$b11,$b13)");

                        // $deletehbiob = DB::delete("DELETE from h_bio_b_s where ebio_nobatch='$nobatch'");
                        if ($b4) {
                            $deletehbiob = DB::delete("DELETE from h_bio_b_s where ebio_nobatch='$nobatch' and ebio_b4='$b4'");

                            $inserthbiob = DB::insert("INSERT into h_bio_b_s values ($idno,'$nobatch','$b3','$b4',$b5,$b6, $b7,$b8,$b9,$b10,$b11,$b13)");
                        } else {
                            $inserthbiob2 = DB::insert("INSERT into h_bio_b_s values ($idno,'$nobatch','$b3','$b4',$b5,$b6, $b7,$b8,$b9,$b10,$b11,$b13)");
                        }

                        // $inserthbiob = DB::insert("INSERT into h_bio_b_s values ($idno,'$nobatch',
                        // '$b3','$b4',$b5,$b6, $b7,$b8,$b9,$b10,$b11,$b13)");
                    }

                    $ebioc = EBioC::where('ebio_reg', $regno)->orderBy('ebio_c3')->get();
                    // dd($ebioc);

                    foreach ($ebioc as $rowebio_c)
                    {
                        $c3 = $rowebio_c->ebio_c3 ;
                        $c4 = (float) $rowebio_c->ebio_c4 ;
                        $c5 = (float) $rowebio_c->ebio_c5 ;
                        $c6 = (float) $rowebio_c->ebio_c6 ;
                        $c7 = (float) $rowebio_c->ebio_c7 ;
                        $c8 = (float) $rowebio_c->ebio_c8 ;
                        $c9 = (float) $rowebio_c->ebio_c9 ;
                        $c10 = (float) $rowebio_c->ebio_c10 ;



                        $idmaxbioc = HBioC::max('ebio_c1');
                        // dd($idmax);

                        if ($idmaxbioc)
                        {
                            $idno = $idmaxbioc + 1;
                            // dd($idno);
                        } else {
                            $idno = 1;
                        }

                        // $insertplbioc = DB::connection('mysql4')->insert("INSERT into h_bio_c_s values ($idno,'$nobatch',
                        // '$c3',$c4,
                        //  $c5,$c6,$c7,$c8,$c9,$c10,NULL,NULL)");
                        if ($c3) {
                            $deletehbioc = DB::delete("DELETE from h_bio_c_s where ebio_nobatch='$nobatch' and ebio_c3='$c3'");
                        }


                        $inserthbioc = DB::insert("INSERT into h_bio_c_s values ($idno,'$nobatch',
                        '$c3',$c4,
                         $c5,$c6,$c7,$c8,$c9,$c10,NULL,NULL)");
                    }

                    $ebiocc = EBioCC::where('ebio_reg', $regno)->get();
                    // dd($ebiocc);

                    foreach ($ebiocc as $ebioccs)
                    {
                        $cc2 = $ebioccs->ebio_cc2 ;
                        $cc3 = $ebioccs->ebio_cc3 ;
                        $cc4 = $ebioccs->ebio_cc4 ;

                        $idmaxbiod = HBioCC::max('ebio_cc1');
                        // dd($idmax);

                        if ($idmaxbiod)
                        {
                            $idno = $idmaxbiod + 1;
                            // dd($idno);
                        } else {
                            $idno = 1;
                        }

                        // $insertplbiocc = DB::connection('mysql4')->insert("INSERT into h_bio_cc values ($idno,'$nobatch','$cc2',
                        // '$cc3','$cc4')");

                        // $deletehbiocc = DB::delete("DELETE from h_bio_c_s where ebio_nobatch='$nobatch'");
                        if ($cc3) {
                            $deletehbiocc = DB::delete("DELETE from h_bio_cc where ebio_nobatch='$nobatch' and ebio_cc3='$cc3'");
                        }

                        $inserthbiocc = DB::insert("INSERT into h_bio_cc values ($idno,'$nobatch','$cc2',
                        '$cc3','$cc4')");
                    }

                    $hari = Hari::where('lesen', $nolesen)->get();
                    // dd($hari);

                    foreach ($hari as $haris)
                    {
                        // dd($haris);
                        $tahun = $haris->tahunbhg2 ;
                        $bulan = $haris->bulanbhg2 ;
                        $hari_operasi = $haris->hari_operasi ;
                        $kapasiti = $haris->kapasiti ;

                        $idmaxhari = HHari::max('id');
                        // dd($idmax);

                        if ($idmaxhari)
                        {
                            $idno = $idmaxhari + 1;
                            // dd($idno);
                        } else {
                            $idno = 1;
                        }

                        // $insertplbiohari = DB::connection('mysql4')->insert("INSERT into h_hari values ($idno,'$nolesen','$tahun',
                        // '$bulan','$hari_operasi','$kapasiti',null,null)");


                        $deletehbiohari = DB::delete("DELETE from h_hari where lesen='$nolesen'");


                        $inserthhari = DB::insert("INSERT into h_hari values ($idno,'$nolesen','$tahun',
                        '$bulan','$hari_operasi','$kapasiti',null,null)");
                        // dd($inserthhari);
                    }
                    $updateebio = DB::update("UPDATE e_bio_inits
                    set ebio_flg = '3'
                    WHERE ebio_nl = '$nolesen'");

                }

                //log audit trail admin


    }
}
