<?php

namespace App\Http\Controllers;

use App\Models\E91b;
use App\Models\E91Init;
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

        $notahun = '2015';

        $thn1 = $notahun;
        //echo $thn1;
        $thn2 = $thn1 - 1;
        $thn3 = $thn1 - 2;
        $thn4 = $thn1 - 3;


            $nolesen = '500008704000';

            //get data oer year3full
            $query3 = DB::connection('mysql3')->select("SELECT right(f.tahun,2) as tahun, f.bulan,f.oer_cpo as cpo_pelesen,d.oer_cpo as cpo_daerah,n.oer_cpo as cpo_negeri,s.oer_cpo as cpo_semenanjung,m.oer_cpo as cpo_msia
            from oerpelesen f, oerdaerah d, oernegeri n, oersemsia s, oermsia m
            where f.nolesen = '$nolesen' and
            (f.tahun = '$thn3') and
            f.tahun = d.tahun and
            f.bulan = d.bulan and
            f.tahun = n.tahun and
            f.bulan = n.bulan and
            f.tahun = s.tahun and
            f.bulan = s.bulan and
            f.tahun = m.tahun and
            f.bulan = m.bulan and
            f.negeri = d.negeri and
            f.daerah = d.daerah and
            f.negeri = n.negeri
            order by f.tahun, f.bulan");



            //   $result3 = @mysqli_fetch_array($query3);
//

              foreach ($query3 as $value3) {
                $tahun = $value3->tahun;
                $bulan = $value3->bulan;
                $pelesen = $value3->cpo_pelesen;
                $daerah = $value3->cpo_daerah;
                $negeri = $value3->cpo_negeri;
                $semenanjung = $value3->cpo_semenanjung;
                $malaysia = $value3->cpo_msia;


              }

              dd($negeri);

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

        $daerahs = DB::connection('mysql5')->select("SELECT kod_daerah, nama_daerah, kod_negeri from daerah");
        // dd($daerahs);


        foreach ($daerahs as $daerah) {
        // $combine = $daerah->kod_negeri . $daerah->kod_daerah ;

        $negeri =  $daerah->kod_negeri ;
        $kod_daerah =  $daerah->kod_daerah ;
        $kod_combine =  $daerah->kod_negeri . '-' . $daerah->kod_daerah ;
        dd($kod_combine);

        }



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

        $password = Hash::make('12345');
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
