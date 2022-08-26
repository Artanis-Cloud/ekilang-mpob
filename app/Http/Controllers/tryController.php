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
        $loginmills = DB::connection('mysql3')->select("SELECT right(f.tahun,2), f.bulan,f.oer_cpo,d.oer_cpo,n.oer_cpo,s.oer_cpo,m.oer_cpo
        FROM oerpelesen f, oerdaerah d, oernegeri n, oersemsia s, oermsia m
        WHERE f.nolesen = '500008704000 ' AND
        (f.tahun = '2017') AND
        f.tahun = d.tahun AND
        f.bulan = d.bulan AND
        f.tahun = n.tahun AND
        f.bulan = n.bulan AND
        f.tahun = s.tahun AND
        f.bulan = s.bulan AND
        f.tahun = m.tahun AND
        f.bulan = m.bulan AND
        f.negeri = d.negeri AND
        f.daerah = d.daerah AND
        f.negeri = n.negeri
        order by f.tahun, f.bulan");
        dd($loginmills);
        return view('users.users-dashboard');
    }
    public function testing4(){
        $loginmills = DB::connection('mysql4')->select("Show tables");
        dd($loginmills);
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

