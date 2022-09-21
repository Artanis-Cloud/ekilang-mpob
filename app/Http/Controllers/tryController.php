<?php

namespace App\Http\Controllers;

use App\Models\E91b;
use App\Models\E91Init;
use App\Models\Oerdaerah;
use App\Models\RegPelesen;
use App\Models\User;
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
        // $loginmills = DB::connection('mysql3')->select("SELECT right(f.tahun,2), f.bulan,f.oer_cpo,d.oer_cpo,n.oer_cpo,s.oer_cpo,m.oer_cpo
        // FROM oerpelesen f, oerdaerah d, oernegeri n, oersemsia s, oermsia m
        // WHERE f.nolesen = '500008704000 ' AND
        // (f.tahun = '2017') AND
        // f.tahun = d.tahun AND
        // f.bulan = d.bulan AND
        // f.tahun = n.tahun AND
        // f.bulan = n.bulan AND
        // f.tahun = s.tahun AND
        // f.bulan = s.bulan AND
        // f.tahun = m.tahun AND
        // f.bulan = m.bulan AND
        // f.negeri = d.negeri AND
        // f.daerah = d.daerah AND
        // f.negeri = n.negeri
        // order by f.tahun, f.bulan");
        $dt = new DateTime();
        // $dt = date('H:i:s');
        $tz = new DateTimeZone('Asia/Kuala_Lumpur');

        $dt->setTimezone($tz);
        $dt->format('dd-mm-yyyy H:i:s');
        // echo $dt->format('H:i:s');
        // $loginmills = DB::connection('mysql3')->select("show databases");
        // if ($loginmills) {
        //     $idno_daerah = $loginmills->maxoerdaerah_id    ;
        //     $oerdaerah_id = $idno_daerah + 1;

        //     // dd($idno);
        // } else {
        //     $idno_daerah = 1;
        // }
        dd($dt);
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
