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

                    dd($insertpl91);



        }
        // $loginmills = DB::connection('mysql4')->select("SELECT e91_reg, e91_nl, e91_bln, e91_thn, e91_flg, e91_sdate,
        // e91_ddate, e91_aa1, e91_aa2, e91_aa3, e91_aa4, e91_ab1, e91_ab2, e91_ab3, e91_ab4, e91_ac1, e91_ad1, e91_ad2, e91_ad3,
        // e91_ae1, e91_ae2, e91_ae3, e91_ae4, e91_af1, e91_af2, e91_af3, e91_ag1, e91_ag2,
        // e91_ag3, e91_ag4, e91_ah1, e91_ah2, e91_ah3, e91_ah4, e91_ai1, e91_ai2, e91_ai3,
        // e91_ai4, e91_ai5, e91_ai6, e91_aj1, e91_aj2, e91_aj3, e91_aj4, e91_aj5, e91_aj6,
        // e91_aj7, e91_aj8, e91_ak1, e91_ak2, e91_ak3, e91_npg, e91_jpg,
        // e91_ah5,e91_ah6,e91_ah7,e91_ah8,e91_ah9,e91_ah10,e91_ah11,e91_ah12,e91_ah13,
        // e91_ah14,e91_ah15,e91_ah16,e91_ah17,e91_ah18
        // FROM e91_init
        // WHERE e91_flg = '2'");
        // dd($loginmills[0]->e91_reg);
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

