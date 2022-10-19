<?php

namespace App\Http\Controllers;

use App\Models\E91b;
use App\Models\E91Init;
use App\Models\EBioCC;
use App\Models\EBioInit;
use App\Models\Hari;
use App\Models\HBioCC;
use App\Models\HHari;
use App\Models\Oerdaerah;
use App\Models\Oernegeri;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class tryController extends Controller
{

    public function tryArx()
    {
        return view('loginArx');
    }
    public function testing3()
    {

        // $dt = new DateTime();
        // // $dt = date('H:i:s');
        // $tz = new DateTimeZone('Asia/Kuala_Lumpur');

        // $dt->setTimezone($tz);
        // $dt->format('dd-mm-yyyy H:i:s');
        // $dt = date('Y-m-d');
        // echo $dt->format('H:i:s');

        // if ($loginmills) {
        //     $idno_daerah = $loginmills->maxoerdaerah_id    ;
        //     $oerdaerah_id = $idno_daerah + 1;

        //     // dd($idno);
        // } else {
        //     $idno_daerah = 1;
        // }

        // $now = date('Y-m-d');

        // $date = DB::select("SELECT Message from pengumuman where Start_date <= '$now' and End_date >= '$now'");

        // $thn = '2015';
        // $bulan = '2015';

        // $thn1 = $notahun;
        //echo $thn1;
        // $thn2 = $thn1 - 1;
        // $thn3 = $thn1 - 2;
        // $thn4 = $thn1 - 3;


            // $nolesen = '000002704000';

            //get data oer year3full
            //check daerahless
            $ebioinit = EBioInit::where('ebio_flg', '2')->get();
            // dd($ebioinit);

            $totalplbio = 0;

            foreach ($ebioinit as $key => $selects) {

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


                $regpelesenbio = RegPelesen::where('e_nl', $nolesen)->where('e_kat', 'PLBIO')->get();
                foreach ($regpelesenbio as $row)
                {
                    $kodpgw = $row->kodpgw;
                    $nosiri = $row->nosiri;

                    $nobatch = "$bulan$tahun$kodpgw$nosiri";
                    // dd($nobatch);

                }

                $hari = Hari::where('lesen', $nolesen)->get();

                foreach ($hari as $haris)
                {
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
                    }

                    $inserthhari = DB::insert("INSERT into h_hari values ($idno,'$nolesen','$tahun',
                    '$bulan','$hari_operasi','$kapasiti',null,null)");
                    // dd($inserthhari);
                }
                // $ebiocc = EBioCC::where('ebio_reg', $regno)->get();

                // foreach ($ebiocc as $ebioccs)
                // {
                //     $cc2 = $ebioccs->ebio_cc2 ;
                //     $cc3 = $ebioccs->ebio_cc3 ;
                //     $cc4 = $ebioccs->ebio_cc4 ;

                //     $idmaxbiod = HBioCC::max('ebio_cc1');
                //     // dd($idmax);

                //     if ($idmaxbiod)
                //     {
                //         $idno = $idmaxbiod + 1;
                //         // dd($idno);
                //     }

                //     $inserthbiocc = DB::insert("INSERT into h_bio_cc values ($idno,'$nobatch','$cc2',
                //     '$cc3','$cc4')");
                // // dd($inserthbiocc);

                // }
            }

            // return $dtlqry;

            // return $qry;


            // foreach ($qry as $row1)
            // {

            //  $enp = $row1->namakilang ;
            //  $cluster = strtoupper($row1->nama_cluster );
            //  $kodcluster = $row1->e_cluster ;
            //  $kawasan = $row1->nama_region ;
            //  $kodkawasan = $row1->e_kawasan ;
            // }

                // for ($count=0; $row = $query3; $count++)
                // {
                // dd($ebiocc);
                // //   $val1[$count] = $row[1] . '/' . $row[0];
                //   $val2[$count] = $row[2];
                //   $val3[$count] = $row[3];
                //   $val4[$count] = $row[4];
                //   $val5[$count] = $row[5];
                //   $val6[$count] = $row[6];



                //   $valbulan1 = $row[1];
                //   $oercluster1 = $this->get_data_oer_year3full_cluster($kodcluster,$thn3,$valbulan1);
                //   $val7[$count] = $oercluster1;
                //   $oerkawasan1 = $this->get_data_oer_year3full_kawasan($kodkawasan,$thn3,$valbulan1);
                //   $val8[$count] = $oerkawasan1;

                // }
                // dd($val3);




        // $date2 = Carbon::createFromFormat('Y-m-d', $now);


        // foreach ($date as $key => $dates) {
        //     $date1 = Carbon::createFromFormat('Y-m-d', $dates[$key]->Start_date);

        //     $result = $date2->gte($date1);

        // }
        // dd($qrystkcpl);
        return view('users.users-dashboard');
    }

    public function testdb_pldb()
    {

        // $loginmills = DB::connection('mysql4')->select("SELECT F911A FROM PL911P3");
        // $loginmills = DB::select("SELECT max(oerdaerah_id) as maxoerdaerah_id from oerdaerah");

        // $produks = DB::connection('mysql5')->select("SELECT comm_code_l, comm_summary, group_l,comm_desc,sub_group, sub_group_rspo, sub_group_mspo from  commodity_l");
        $password = Hash::make('admin123');
        dd($password);






        // $refkap = DB::select("SELECT refkap from p101_master where tahun = '2017' and bulan = '07'");

        // if (!$refkap)
        // $refkap = 2;
        // $updatep101n = DB::update("UPDATE p101_master set refutilrate = ((cpo_proc + cpko_proc) / (refkap / 12)) * 100
		// 	where tahun = '2017' and bulan = '07'");

        // $query1 = DB::connection('mysql3')->select("SELECT max(oerind_id) as maxoerind_id from oerpelesen");

        // foreach ($query1 as $result) {
        //     $result1 = $result->maxoerind_id;
        // // $result1 = mysqli_query($conn_mysql_econ,$query1);
		// // $ar1 = mysqli_fetch_assoc($result1);

        // }
        // if ($result1)
        //     {
        //     //  $maxno =  $ar1["maxoerind_id"];
        //      $oerind_id = $result1 + 1;
        //     }
        // else {
        //      $oerind_id = 1;
        // }



        // if ($loginmills) {
        //     $idno_daerah = $loginmills[0]->maxoerdaerah_id    ;
        //     $oerdaerah_id = $idno_daerah + 1;

        //     // dd($idno);
        // } else {
        //     $idno_daerah = 1;
        // }
        // dd($qrycapp101);
        // $e91b = E91b::where('e91_b2', $regno)->get();

        // dd($daerah);
        return view('users.users-dashboard');
    }

    public function test_codedb()
    {

        $loginmills = DB::connection('mysql5')->select("SELECT comm_code_l, comm_summary, group_l,comm_desc,sub_group from commodity_l");

        // $e91b = E91b::where('e91_b2', $regno)->get();

        dd($loginmills);
        return view('users.users-dashboard');
    }
    public function testing4()
    {


        // return view('users.users-dashboard');
    }
    public function change_pass()
    {

        // $user = User::where('username','555555555555')->first();

        $password = Hash::make('admin123');
        dd($password);

        // $user->password = $password;
        // $user->save();

        return view('users.users-dashboard');
    }
    public function dashArx()
    {
        return view('dashboardArx');
    }
    // public function register2(){
    //     return view('auth/registerrrrrrrr');
    // }



}
