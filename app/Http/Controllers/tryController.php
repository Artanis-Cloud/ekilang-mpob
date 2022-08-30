<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
class tryController extends Controller
{

    public function tryArx(){
        return view('loginArx');
    }
    public function testing3(){
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
        $loginmills = DB::connection('mysql3')->select("show databases");
        dd($loginmills);
        return view('users.users-dashboard');
    }
    public function testing4(){
        $loginmills = DB::connection('mysql4')->select("SELECT e91_reg, e91_nl, e91_bln, e91_thn, e91_flg, e91_sdate,
        e91_ddate, e91_aa1, e91_aa2, e91_aa3, e91_aa4, e91_ab1, e91_ab2, e91_ab3, e91_ab4, e91_ac1, e91_ad1, e91_ad2, e91_ad3,
        e91_ae1, e91_ae2, e91_ae3, e91_ae4, e91_af1, e91_af2, e91_af3, e91_ag1, e91_ag2,
        e91_ag3, e91_ag4, e91_ah1, e91_ah2, e91_ah3, e91_ah4, e91_ai1, e91_ai2, e91_ai3,
        e91_ai4, e91_ai5, e91_ai6, e91_aj1, e91_aj2, e91_aj3, e91_aj4, e91_aj5, e91_aj6,
        e91_aj7, e91_aj8, e91_ak1, e91_ak2, e91_ak3, e91_npg, e91_jpg,
        e91_ah5,e91_ah6,e91_ah7,e91_ah8,e91_ah9,e91_ah10,e91_ah11,e91_ah12,e91_ah13,
        e91_ah14,e91_ah15,e91_ah16,e91_ah17,e91_ah18
        FROM e91_init
        WHERE e91_flg = '2'");
        dd($loginmills[0]->e91_reg);
        return view('users.users-dashboard');
    }
    public function change_pass(){

        // $user = User::where('username','555555555555')->first();

        $password = Hash::make('12345');
        dd($password);

        // $user->password = $password;
        // $user->save();

        return view('users.users-dashboard');
    }
    public function dashArx(){
        return view('dashboardArx');
    }
    // public function register2(){
    //     return view('auth/registerrrrrrrr');
    // }



}

