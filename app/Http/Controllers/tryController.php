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

        // $query1 = Oernegeri::max('oernegeri_id');
        $qrystkcpl = DB::connection('mysql3')->select("SELECT sum(b.F101B13) stk101_cpl
        from pl101ap3 a, pl101bp3 b, licensedb.license l
        where a.F101A1 = l.F201A and
              a.F101A1 = b.F101B1 and
              a.F101A4 = b.F101B2 and
              a.F101A6 = '2017' and
              a.F101A5 = 09' and
              b.F101B3 = '1' and
              b.F101B4 = '03' and
              b.F101B13 not in (0) and
              b.F101B13 is not NULL");

        // $date2 = Carbon::createFromFormat('Y-m-d', $now);


        // foreach ($date as $key => $dates) {
        //     $date1 = Carbon::createFromFormat('Y-m-d', $dates[$key]->Start_date);

        //     $result = $date2->gte($date1);

        // }
        dd($qrystkcpl);
        return view('users.users-dashboard');
    }

    public function testdb_pldb()
    {

        // $loginmills = DB::connection('mysql4')->select("SELECT F911A FROM PL911P3");
        // $loginmills = DB::select("SELECT max(oerdaerah_id) as maxoerdaerah_id from oerdaerah");
        $qrycapp101 = DB::connection('mysql4')->select("SELECT m.cap_lulus
                       from lesen_master.mpku_caps m
                       where
                       m.cap_mmyyyy = '072017' and
                       m.cap_kat = '06'");
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
        dd($qrycapp101);
        // $e91b = E91b::where('e91_b2', $regno)->get();

        // dd($loginmills);
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
