<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Oerdaerah;
use App\Models\Oerpelesen;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class Proses8Controller extends Controller
{

    public function admin_8portdata()
    {
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama     ,
            ['link' => route('admin.8portdata'), 'name' => "Pindahan Penyata Bulanan ke Stat Admin/Homepage    ,
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses8.8portdata', compact('returnArr', 'layout'));
    }


    public function admin_portingdata(Request $request)
    {
        $destinasi = $request->destinasi;
        // $bulan = $request->bulan;
        // dd($maklumat);
        if ($destinasi == 'admin') {
            $this->porting_admin($request->tahun, $request->bulan);
            return redirect()->back()->with('success', 'Maklumat produk sawit telah dipindahkan dari PLEID ke eKilang');
        } else {
            $this->porting_homepage($request->all());
            return redirect()->back()->with('success', 'Maklumat daerah telah dipindahkan dari PLEID ke eKilang');
        }
    }

    public function porting_admin($tahun, $bulan)
    {
        if ($bulan == '01')
            $bulan_int = 1;
        elseif ($bulan == '02')
            $bulan_int = 2;
        elseif ($bulan == '03')
            $bulan_int = 3;
        elseif ($bulan == '04')
            $bulan_int = 4;
        elseif ($bulan == '05')
            $bulan_int = 5;
        elseif ($bulan == '06')
            $bulan_int = 6;
        elseif ($bulan == '07')
            $bulan_int = 7;
        elseif ($bulan == '08')
            $bulan_int = 8;
        elseif ($bulan == '09')
            $bulan_int = 9;
        elseif ($bulan == '10')
            $bulan_int = 10;
        elseif ($bulan == '11')
            $bulan_int = 11;
        elseif ($bulan == '12')
            $bulan_int = 12;


        $blnthn = $bulan . $tahun;
        $brg = 'PL91';
        $trans = array(
            "/" => "",
            "'" => "",
            "(" => "",
            ")" => "",
            "," => "",
            "-" => ""
        );

        $delete_pl = DB::delete("DELETE from pl91_individual
          where tahun = '$tahun'
          and bulan = '$bulan'");

        $delete_pelesen = DB::delete("DELETE from oerpelesen
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_daerah = DB::delete("DELETE from oerdaerah
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_negeri = DB::delete("DELETE from oernegeri
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_pnegeri = DB::delete("DELETE from prodnegeri
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_snegeri = DB::delete("DELETE from stknegeri
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_semsia = DB::delete("DELETE from oersemsia
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_psemsia = DB::delete("DELETE from prodsemsia
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_msia = DB::delete("DELETE from oermsia
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_pmsia = DB::delete("DELETE from prodmsia
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_ss = DB::delete("DELETE from oerss
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $delete_pss = DB::delete("DELETE from prodss
        where tahun = '$tahun'
        and bulan = '$bulan'");

        $qrytransfer = DB::update("UPDATE web_current1 set public_view='T'
        where public_view ='Y'");

        $qrytransfer2 = DB::update("UPDATE release10hb set public_view='T'
        where public_view='Y'");


        // start individual pelesen
        $select_pelesen = DB::connection('mysql4')->select("SELECT p.F911A, p.F911D, p.F911C,
        p.F911P oer_cpo,
        p.F911Q ker_pk,
        l.F201B,l.F201T, l.F201U4, l.F201U2,
        p.F911G1, p.F911G2, p.F911G3, p.F911G4, p.F911H1,
        p.F911H2, p.F911H3, p.F911H4,
        p.F911I, p.F911J1, p.F911J2,
        p.F911J3, p.F911K1, p.F911K2,
        p.F911K3, p.F911K4, p.F911L1,
        p.F911L2, p.F911L3, p.F911N1,
        p.F911N2, p.F911N3, p.F911N4,
        p.F911O, p.F911R,
        p.F911S1, p.F911S2,
        p.F911S3, p.F911S4, p.F911S5,
        p.F911S6, p.F911T1, p.F911T2,
        p.F911T3, p.F911T4, p.F911T5,
        p.F911T6, p.F911T7, p.F911T8,
        p.F911U1, p.F911U2, p.F911U3
        from PL911P3 p, licensedb.license l
        where p.F911A = l.F201A and
        p.F911D = '$tahun' and
        p.F911C = '$bulan'
        order by p.F911D, p.F911C, p.F911A");

        $maxid = Oerpelesen::max('oerind_id');

        if ($maxid) {
            $idno = $maxid + 1;
            // dd($idno);
        } else {
            $idno = 1;
        }

        $totalind = 0;


        foreach ($select_pelesen as $select) {
            $nolesen = $select->F911A ;
            $tahun = $select->F911D ;
            $bulan = $select->F911C ;
            $namakilang = $select->F201T ;
            $namakilang = strtr($namakilang, $trans);
            $negeri = $select->F201U4 ;
            $daerah = $select->F201U2 ;
            $cpo_proc = (float) $select->F911J1 ;
            //   $cpo_proc = number_format($cpo_proc,2);
            $ffb_proc = (float) $select->F911I ;
            //   $ffb_proc = number_format($ffb_proc,2);

            if ($negeri == NULL)
                $negeri = '00';
            elseif (strlen($negeri) == 1)
                $negeri = '0' . $negeri;

            if ($daerah == NULL)
                $daerah = '00';
            elseif (strlen($daerah) == 1)
                $daerah = '0' . $daerah;

            $oer_cpo = (float) $select->oer_cpo ;
            $oer_cpo = number_format($oer_cpo, 2);
            $ker_pk = (float) $select->ker_pk ;
            $ker_pk = number_format($ker_pk, 2);
            $ffb_sstock = (float) $select->F911G1 ;
            $cpo_sstock = (float) $select->F911G2 ;
            $pk_sstock = (float) $select->F911G3 ;
            $so_sstock = (float) $select->F911G4 ;
            $ffb_rec = (float) $select->F911H1 ;
            $cpo_rec = (float) $select->F911H2 ;
            $pk_rec = (float) $select->F911H3 ;
            $so_rec = (float) $select->F911H4 ;
            $pk_prod = (float) $select->F911J2 ;
            $so_prod = (float) $select->F911J3 ;
            $ffb_sell = (float) $select->F911K1 ;
            $cpo_sell = (float) $select->F911K2 ;
            $pk_sell = (float) $select->F911K3 ;
            $so_sell = (float) $select->F911K4 ;
            $cpo_export = (float) $select->F911L1 ;
            $pk_export = (float) $select->F911L2 ;
            $so_export = (float) $select->F911L3 ;
            $ffb_estock = (float) $select->F911N1 ;
            $cpo_estock = (float) $select->F911N2 ;
            $pk_estock = (float) $select->F911N3 ;
            $so_estock = (float) $select->F911N4 ;
            $mill_hrs = (float) $select->F911O ;
            $ffb_price = (float) $select->F911R ;
            $ffb_tes = (float) $select->F911S1 ;
            $ffb_tel = (float) $select->F911S2 ;
            $ffb_tpb = (float) $select->F911S3 ;
            $ffb_tpk = (float) $select->F911S4 ;
            $ffb_tkb = (float) $select->F911S5 ;
            $ffb_tll = (float) $select->F911S6 ;
            $cpo_jkb = (float) $select->F911T1 ;
            $cpo_jkp = (float) $select->F911T2 ;
            $cpo_jko = (float) $select->F911T3 ;
            $cpo_jp = (float) $select->F911T4 ;
            $cpo_jps = (float) $select->F911T5 ;
            $cpo_je = (float) $select->F911T6 ;
            $cpo_jt = (float) $select->F911T7 ;
            $cpo_jll = (float) $select->F911T8 ;
            $pk_jki = (float) $select->F911U1 ;
            $pk_jp = (float) $select->F911U2 ;
            $pk_jll = (float) $select->F911U3 ;

            $totalind = $totalind + 1;

        $qrycap = DB::connection('mysql4')->selecy("SELECT m.cap_lulus
           from lesen_master.mpku_caps m
           where m.cap_lesen = '$nolesen'
           and m.cap_mmyyyy = '$blnthn'
           and m.cap_kat = '04'");

        $millcap = $qrycap->cap_lulus ;

        $insert_pelesen = DB::insert("INSERT into oerpelesen values ('$idno','$nolesen',
            '$namakilang','$negeri','$daerah','$tahun','$bulan',
            $oer_cpo,$ker_pk,$cpo_proc,$ffb_proc)");

        $idno = $idno + 1;

        $ind_id = 0;
        $ind_id = $ind_id + 1;

        }
        //end individual pelesen

        //start daerah
        $select_daerah = DB::connection('mysql4')->select("SELECT p.F911D, p.F911C, l.F201U4, l.F201U2,
                ((sum(round(p.F911J1,2))/sum(round(p.F911I,2)))*100) oer_cpo,
                ((sum(round(p.F911J2,2))/sum(round(p.F911I,2)))*100) ker_pk,
                sum(round(p.F911J1,2)) cpo_proc,sum(round(p.F911I,2)) ffb_proc
                from PL911P3 p, licensedb.license l
                where p.F911A = l.F201A and
                    p.F911D = '$tahun' and
                    p.F911C = '$bulan' and
                    p.F911I not in (0) and
                    p.F911I is not null
                group by p.F911D, p.F911C, l.F201U4, l.F201U2");

      $jumdaerah = 0;

      foreach ($select_daerah as $select) {
        $tahun =  $select->F911D ;
        $bulan =  $select->F911C ;
        $negeri =  $select->F201U4 ;
        $daerah =  $select->F201U2 ;

        if ($negeri == NULL)
           $negeri = '00';
        elseif (strlen($negeri) == 1)
           $negeri = '0' . $negeri;

        if ($daerah == NULL)
           $daerah = '00';
        elseif (strlen($daerah) == 1)
           $daerah = '0' . $daerah;

        $tahun =  $select->F911D ;
        $bulan =  $select->F911C ;
        $oer_cpo = (float)  $select->oer_cpo ;
        $oer_cpo = number_format($oer_cpo,2);
        $ker_pk = (float)  $select->ker_pk ;
        $ker_pk = number_format($ker_pk,2);
        $cpo_proc = (float)  $select->cpo_proc ;
        //$cpo_proc = number_format($cpo_proc,2);
        $ffb_proc = (float)  $select->ffb_proc ;

        $jumdaerah = $jumdaerah + 1;

        $maxid_daerah = Oerdaerah::max('oerdaerah_id');


        if ($maxid_daerah) {
            $idno = $maxid_daerah + 1;
            // dd($idno);
        } else {
            $idno = 1;
        }

        $insert_daerah = DB::insert("INSERT into oerdaerah values ('$idno','$tahun',
                       '$bulan','$negeri','$daerah', $oer_cpo,NULL,$ker_pk,NULL,$cpo_proc, $ffb_proc)");

      }
      //end daerah


      //start negeri
      $select_negeri = DB::connection('mysql4')->select("SELECT distinct p.F911D, p.F911C, l.F201U4
                   from PL911P3 p, licensedb.license l
                   where p.F911A = l.F201A
                   and p.F911D = '$tahun'
                   and p.F911C  = '$bulan'");

      $jumnegeri = 0;

      foreach ($select_negeri as $select) {
            $ngr = $select->F201U4;
            $negeri = $ngr;
            if ($negeri == NULL)
            $negeri = '00';
            elseif (strlen($negeri) == 1)
            $negeri = '0' . $negeri;

           $qry1 = DB::connection('mysql4')->select("SELECT ((sum(round(p.F911J1,2))/sum(round(p.F911I,2)))*100) oer_cpo,
           ((sum(round(p.F911J2,2))/sum(round(p.F911I,2)))*100) ker_pk,
           sum(round(p.F911J1,2)) cpo,
           sum(round(p.F911J2,2)) pk,
           sum(round(p.F911I,2)) ffb_proc
            from PL911P3 p, licensedb.license l
            where p.F911A = l.F201A
            and p.F911D = '$tahun'
            and p.F911C  = '$bulan'
            and l.F201U4 = $ngr
            and p.F911I not in (0)
            and p.F911I is not null");

            foreach ($qry1 as $sum {
                $oer_cpo = (float) $sum->oer_cpo;
                $ker_pk = (float)  $sum->ker_pk ;
                $cpo = (float)  $sum->cpo ;
                //$cpo = number_format($cpo,2);
                $pk = (float)  $sum->pk ;
                $ffb_proc = (float)  $sum->ffb_proc ;
            }



            $qry2 = DB::connection('mysql4')->select("SELECT sum(m.cap_lulus) cap_lulus, count(m.cap_lulus) millno
                 from PL911P3 p, licensedb.license l, lesen_master.mpku_caps m
                 where p.F911D = '$tahun' and
                       p.F911C = '$bulan' and
                       p.F911A = l.F201A and
                       l.F201U4 = $ngr and
                       p.F911A = m.cap_lesen and
                       m.cap_mmyyyy = '$blnthn' and
                       m.cap_kat = '04' and
                       m.cap_lulus not in (0.00) and
					   m.cap_lulus is not NULL");

            foreach ($qry2 as $sum) {
                $millcap =  $sum->cap_lulus ;
                $millno =  $sum->millno ;
                }

                if ($millcap == NULL)
                $millcap = 0;
                if ($millcap == 0)
                $millutilrate = 0;
                else
                $millutilrate = (float) (($ffb_proc / ($millcap/12)) * 100);


        $qry3 = DB::connection('mysql4')->select("SELECT sum(p.F911H1) ffb_rec
        from PL911P3 p, licensedb.license l
        where p.F911A = l.F201A and
              p.F911D = '$tahun' and
              p.F911C = '$bulan' and
              l.F201U4 = $ngr and
              p.F911H1 not in (0) and
              p.F911H1 is not NULL");

        foreach ($qry3 as $sum) {
            $ffb_rec = (float) $sum->ffb_rec ;

        }


        $qry4 = DB::connection('mysql4')->select("SELECT sum(round(p.F911O,2)) millhrs_actual ,(sum(round(p.F911O,2))/count(p.F911A)) millhrs
                 from PL911P3 p, licensedb.license l
                 where p.F911A = l.F201A and
                       p.F911D = '$tahun' and
                       p.F911C = '$bulan' and
                       p.F911J1 not in (0) and
					   p.F911J1 is not NULL and
                       l.F201U4 = $ngr");

        foreach ($qry4 as $sum) {
            $millhrs = (float)  $sum->millhrs ;
            $millhrs_actual = (float)  $sum->millhrs_actual ;
        }



        $qrynegeri911cpo = DB::connection('mysql4')->select("SELECT sum(p.F911N2) stk911_cpo
                   from PL911P3 p, licensedb.license l
                   where p.F911A = l.F201A and
                         p.F911D = '$tahun' and
                         p.F911C = '$bulan' and
                         p.F911N2 not in (0) and
						 p.F911N2 is not NULL and
                         l.F201U4 = $ngr");

        foreach ($qrynegeri911cpo as $sum) {
            $stk911_cpo = (float)  $sum->stk911_cpo ;

        }

        $qrynegeribio_cpo =  DB::connection('mysql4')->select("SELECT sum(p.stok_akhir) stok_akhir
        from hebahan_stok_akhir_detail p, licensedb.license l
        where p.no_lesen = l.F201A and
              p.tahun = '$tahun' and
              p.bulan = '$bulan_int' and
              p.stok_akhir not in (0) and
              p.stok_akhir is not NULL and
              p.produk ='CPO' and
              l.F201U4 = $ngr");

        foreach ($qrynegeribio_cpo as $sum) {
            $stkbio_cpo = (float)  $sum->stok_akhir ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_ppo =  DB::connection('mysql4')->select("SELECT sum(p.stok_akhir) stok_akhir
                from hebahan_stok_akhir_detail p, licensedb.license l
                where p.no_lesen = l.F201A and
                    p.tahun = '$tahun' and
                    p.bulan = '$bulan_int' and
                    p.stok_akhir not in (0) and
                    p.stok_akhir is not NULL and
                    p.produk ='PPO' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_ppo as $sum) {
            $stkbio_ppo = (float)  $sum->stok_akhir ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_cpko =  DB::connection('mysql4')->select("SELECT sum(p.stok_akhir) stok_akhir
                from hebahan_stok_akhir_detail p, licensedb.license l
                where p.no_lesen = l.F201A and
                    p.tahun = '$tahun' and
                    p.bulan = '$bulan_int' and
                    p.stok_akhir not in (0) and
                    p.stok_akhir is not NULL and
                    p.produk ='CPKO'  and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_cpko as $sum) {
            $stkbio_cpko = (float)  $sum->stok_akhir ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_ppko =  DB::connection('mysql4')->select("SELECT sum(p.stok_akhir) stok_akhir
                from hebahan_stok_akhir_detail p, licensedb.license l
                where p.no_lesen = l.F201A and
                    p.tahun = '$tahun' and
                    p.bulan = '$bulan_int' and
                    p.stok_akhir not in (0) and
                    p.stok_akhir is not NULL and
                    p.produk ='PPKO' and
                    l.F201U4 = $ngr");

       foreach ($qrynegeribio_ppko as $sum) {
            $stkbio_ppko = (float) $sum->stok_akhir ;
       }


        $qrynegeri911pk =  DB::connection('mysql4')->select("SELECT sum(p.F911N3) stk911_pk
                from PL911P3 p, licensedb.license l
                where p.F911A = l.F201A and
                    p.F911D = '$tahun' and
                    p.F911C = '$bulan' and
                    p.F911N3 not in (0) and
                    p.F911N3 is not NULL and
                    l.F201U4 = $ngr");

        foreach ($qrynegeri911pk as $sum) {
            $stk911_pk = (float)  $sum->stk911_pk ;
        }


        // Kilang Isirong


        $qry5 =  DB::connection('mysql4')->select("SELECT((sum(p.F1021L1)/sum(p.F1021K))*100) oer_cpko,
                    ((sum(p.F1021L2)/sum(p.F1021K))*100) ker_pkc,
                    sum(p.F1021L1) cpko,
                    sum(p.F1021L2) pkc,
                    sum(p.F1021K) pk_proc
            from pl1021p3 p, licensedb.license l
            where p.F1021A = l.F201A and
                    p.F1021D = '$tahun' and
                    p.F1021C = '$bulan' and
                    l.F201U4 = $ngr and
                    p.F1021K not in (0) and
                    p.F1021K is not NULL");

        foreach ($qry5 as $sum) {
            $oer_cpko = (float)  $sum->oer_cpko ;
            $ker_pkc = (float)  $sum->ker_pkc ;
            $cpko = (float)  $sum->cpko ;
            $pkc = (float)  $sum->pkc ;
            $pk_proc = (float)  $sum->pk_proc ;
        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qry6 = DB::connection('mysql4')->select("SELECT sum(m.cap_lulus) cap_lulus,
                    (sum(m.cap_lulus * p.F1021S4) / sum(m.cap_lulus)) crsutilrate,
                    count(m.cap_lulus) crsno
            from pl1021p3 p, licensedb.license l, lesen_master.mpku_caps m
            where p.F1021D = '$tahun' and
                    p.F1021C = '$bulan' and
                    p.F1021A = l.F201A and
                    l.F201U4 = $ngr and
                    p.F1021A = m.cap_lesen and
                    m.cap_mmyyyy = '$blnthn' and
                    m.cap_kat = '05' and
                    m.cap_lulus not in (0.00) and
                    m.cap_lulus is not NULL");

        foreach ($qry6 as $sum) {
            $crscap = (float)  $sum->cap_lulus ;
            $crsutilrate = (float)  $sum->crsutilrate ;
            $crsno =  $sum->crsno ;
        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qry7 = DB::connection('mysql4')->select("SELECT (sum(round(p.F1021S3,2))/count(p.F1021A)) crshrs
            from pl1021p3 p, licensedb.license l
            where p.F1021A = l.F201A and
                    p.F1021D = '$tahun' and
                    p.F1021C = '$bulan' and
                    p.F1021S3 not in (0) and
                    p.F1021S3 is not NULL and
                    l.F201U4 = $ngr");

        foreach ($qry7 as $sum) {
            $crshrs = (float)  $sum->crshrs ;
        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri102cpko = DB::connection('mysql4')->select("SELECT sum(p.F1021Q2) stk102_cpko
                from pl1021p3 p, licensedb.license l
                where p.F1021A = l.F201A and
                    p.F1021D = '$tahun' and
                    p.F1021C = '$bulan' and
                    p.F1021Q2 not in (0) and
                    p.F1021Q2 is not NULL and
                    l.F201U4 = $ngr");

        foreach ($qrynegeri102cpko as $sum) {
            $stk102_cpko = (float)  $sum->stk102_cpko ;
        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri102pk = DB::connection('mysql4')->select("SELECT sum(p.F1021Q1) stk102_pk
                from pl1021p3 p, licensedb.license l
                where p.F1021A = l.F201A and
                    p.F1021D = '$tahun' and
                    p.F1021C = '$bulan' and
                    p.F1021Q1 not in (0) and
                    p.F1021Q1 is not NULL and
                    l.F201U4 = $ngr");

        foreach ($qrynegeri102pk as $sum) {
            $stk102_pk = (float) $sum->stk102_pk ;
        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri102pkc = DB::connection('mysql4')->select("SELECT sum(p.F1021Q3) stk102_pkc
                from pl1021p3 p, licensedb.license l
                where p.F1021A = l.F201A and
                    p.F1021D = '$tahun' and
                    p.F1021C = '$bulan' and
                    p.F1021Q3 not in (0) and
                    p.F1021Q3 is not NULL and
                    l.F201U4 = $ngr");

        foreach ($qrynegeri102pkc as $sum) {
            $stk102_pkc = (float)  $sum->stk102_pkc ;
        }

        // Kilang Penapis
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qry2 = DB::connection('mysql4')->select("SELECT sum(m.cap_lulus) cap_lulus, count(m.cap_lulus) refno
            from licensedb.license l, lesen_master.mpku_caps m,
                lesen_master.dbp220 d
            where  l.F201A = m.cap_lesen and
                    l.F201U4 = $ngr and
                    m.cap_mmyyyy = '$blnthn' and
                    m.cap_kat = '06' and
                    l.F201A = d.F220A and
                    d.F220D = '1' and
                    m.cap_lulus not in (0.00) and
                    m.cap_lulus is not NULL");

        foreach ($qry2 as $sum) {
            $refcap = (float)  $sum->cap_lulus ;
            $refno =  $sum->refno ;
        }

        if ($refcap == NULL)
        $refcap = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodcps = DB::connection('mysql4')->select("SELECT sum(b.F101B9) prod101_cps
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '02' and
                    b.F101B9 not in (0) and
                    b.F101B9 is not NULL");

        foreach ($qryprodcps as $sum) {
            $prod101_cps = (float)  $sum->prod101_cps ;
        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodcpl = DB::connection('mysql4')->select("SELECT sum(b.F101B9) prod101_cpl
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '03' and
                    b.F101B9 not in (0) and
                    b.F101B9 is not NULL");

        foreach ($qryprodcpl as $sum) {
            $prod101_cpl = (float)  $sum->prod101_cpl ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdpo = DB::connection('mysql4')->select("SELECT sum(b.F101B9) prod101_rbdpo
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '25' and
                    b.F101B9 not in (0) and
                    b.F101B9 is not NULL");

        foreach ($qryprodrbdpo as $sum) {
            $prod101_rbdpo = (float)  $sum->prod101_rbdpo ;
        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdps = DB::connection('mysql4')->select("SELECT sum(b.F101B9) prod101_rbdps
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '27' and
                    b.F101B9 not in (0) and
                    b.F101B9 is not NULL");

        foreach ($qryprodrbdps as $sum) {
            $prod101_rbdps = (float)  $sum->prod101_rbdps ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdpl = DB::connection('mysql4')->select("SELECT sum(b.F101B9) prod101_rbdpl
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '29' and
                    b.F101B9 not in (0) and
                    b.F101B9 is not null");

        $adprodrbdpl = mysqli_fetch_assoc($qryprodrbdpl);
        $prod101_rbdpl = (float) $adprodrbdpl["prod101_rbdpl ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodpfad = DB::connection('mysql4')->select("SELECT sum(b.F101B9) prod101_pfad
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '35' and
                    b.F101B9 not in (0) and
                    b.F101B9 is not NULL");

        $adprodpfad = mysqli_fetch_assoc($qryprodpfad);
        $prod101_pfad = (float) $adprodpfad["prod101_pfad ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodco = DB::connection('mysql4')->select("SELECT sum(b.F101B9) prod101_co
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 in ('47','H1') and
                    b.F101B9 not in (0) and
                    b.F101B9 is not NULL");

        $adprodco = mysqli_fetch_assoc($qryprodco);
        $prod101_co = (float) $adprodco["prod101_co ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodmar = DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_mar
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = '42' and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodmar = mysqli_fetch_assoc($qryprodmar);
        $prod101_mar = (float) $adprodmar["prod101_mar ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodghee = DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_ghee
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = '41' and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodghee = mysqli_fetch_assoc($qryprodghee);
        $prod101_ghee = (float) $adprodghee["prod101_ghee ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodfat = DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_fat
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 in ('86','M0') and
                    b.F101C7 not in (0) and
                    b.F101C7 is not null");

        $adprodfat = mysqli_fetch_assoc($qryprodfat);
        $prod101_fat = (float) $adprodfat["prod101_fat ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodshort = DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_short
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = '43' and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodshort = mysqli_fetch_assoc($qryprodshort);
        $prod101_short = (float) $adprodshort["prod101_short ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodcoco = DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_coco
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 in ('44','N1','M9','N0','H9') and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodcoco = mysqli_fetch_assoc($qryprodcoco);
        $prod101_coco = (float) $adprodcoco["prod101_coco ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodsoap = DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_soap
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '2' and
                    b.F101C4 = '48' and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodsoap = mysqli_fetch_assoc($qryprodsoap);
        $prod101_soap = (float) $adprodsoap["qryprodsoap ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodredol = DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_redol
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = 'G4' and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodredol = mysqli_fetch_assoc($qryprodredol);
        $prod101_redol = (float) $adprodredol["prod101_redol ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodpry = DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_pry
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '2' and
                    b.F101C4 = 'G5' and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodpry = mysqli_fetch_assoc($qryprodpry);
        $prod101_pry = (float) $adprodpry["prod101_pry ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodblend =  DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_blend
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = 'U7' and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodblend = mysqli_fetch_assoc($qryprodblend);
        $prod101_blend = (float) $adprodblend["prod101_blend ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodotheredb =  DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_otheredb
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 in ('78','G2','H5','M3','46','C0','M2') and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodotheredb = mysqli_fetch_assoc($qryprodotheredb);
        $prod101_otheredb = (float) $adprodotheredb["prod101_otheredb ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodothernot =  DB::connection('mysql4')->select("SELECT sum(b.F101C7) prod101_othernot
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '2' and
                    b.F101C4 in ('A9','S1') and
                    b.F101C7 not in (0) and
                    b.F101C7 is not NULL");

        $adprodothernot = mysqli_fetch_assoc($qryprodothernot);
        $prod101_othernot = (float) $adprodothernot["prod101_othernot ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkcps = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_cps
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '02' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkcps = mysqli_fetch_assoc($qrystkcps);
        $stk101_cps = (float) $adstkcps["stk101_cps ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkcpl = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_cpl
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '03' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkcpl = mysqli_fetch_assoc($qrystkcpl);
        $stk101_cpl = (float) $adstkcpl["stk101_cpl ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpo = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_rbdpo
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '25' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkrbdpo = mysqli_fetch_assoc($qrystkrbdpo);
        $stk101_rbdpo = (float) $adstkrbdpo["stk101_rbdpo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdps = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_rbdps
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '27' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkrbdps = mysqli_fetch_assoc($qrystkrbdps);
        $stk101_rbdps = (float) $adstkrbdps["stk101_rbdps ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpl = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_rbdpl
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '29' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkrbdpl = mysqli_fetch_assoc($qrystkrbdpl);
        $stk101_rbdpl = (float) $adstkrbdpl["stk101_rbdpl ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkpfad = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_pfad
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '35' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkpfad = mysqli_fetch_assoc($qrystkpfad);
        $stk101_pfad = (float) $adstkpfad["stk101_pfad ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkco = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_co
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 in ('47','H1') and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkco = mysqli_fetch_assoc($qrystkco);
        $stk101_co = (float) $adstkco["stk101_co ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkmar = DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_mar
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = '42' and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkmar = mysqli_fetch_assoc($qrystkmar);
        $stk101_mar = (float) $adstkmar["stk101_mar ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkghee = DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_ghee
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = '41' and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkghee = mysqli_fetch_assoc($qrystkghee);
        $stk101_ghee = (float) $adstkghee["stk101_ghee ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkfat = DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_fat
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 in ('86','M0') and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkfat = mysqli_fetch_assoc($qrystkfat);
        $stk101_fat = (float) $adstkfat["stk101_fat ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkshort = DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_short
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = '43' and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkshort = mysqli_fetch_assoc($qrystkshort);
        $stk101_short = (float) $adstkshort["stk101_short ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkcoco = DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_coco
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 in ('44','N1','M9','N0','H9') and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkcoco = mysqli_fetch_assoc($qrystkcoco);
        $stk101_coco = (float) $adstkcoco["stk101_coco ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkcoco = DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_soap
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '2' and
                    b.F101C4 = '48' and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstksoap = mysqli_fetch_assoc($qrystkcoco);
        $stk101_soap = (float) $adstksoap["stk101_soap ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkredol = DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_redol
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = 'G4' and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkredol = mysqli_fetch_assoc($qrystkredol);
        $stk101_redol = (float) $adstkredol["stk101_redol ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkpry = DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_pry
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '2' and
                    b.F101C4 = 'G5' and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkpry = mysqli_fetch_assoc($qrystkpry);
        $stk101_pry = (float) $adstkpry["stk101_pry ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkblend =  DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_blend
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 = 'U7' and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkblend = mysqli_fetch_assoc($qrystkblend);
        $stk101_blend = (float) $adstkblend["stk101_blend ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkotheredb =  DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_otheredb
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '1' and
                    b.F101C4 in ('78','G2','H5','M3','46','C0','M2') and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkotheredb = mysqli_fetch_assoc($qrystkotheredb);
        $stk101_otheredb = (float) $adstkotheredb["stk101_otheredb ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkothernot =  DB::connection('mysql4')->select("SELECT sum(b.F101C10) stk101_othernot
                from pl101ap3 a, pl101cp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101C1 and
                    a.F101A4 = b.F101C2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101C3 = '2' and
                    b.F101C4 in ('A9','S1') and
                    b.F101C10 not in (0) and
                    b.F101C10 is not NULL");

        $adstkothernot = mysqli_fetch_assoc($qrystkothernot);
        $stk101_othernot = (float) $adstkothernot["stk101_othernot ;

        //start-->
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpko =  DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_rbdpko
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '2' and
                    b.F101B4 = '30' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkrbdpko = mysqli_fetch_assoc($qrystkrbdpko);
        $stk101_rbdpko = (float) $adstkrbdpko["stk101_rbdpko ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpks = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_rbdpks
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '2' and
                    b.F101B4 = '31' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkrbdpks = mysqli_fetch_assoc($qrystkrbdpks);
        $stk101_rbdpks = (float) $adstkrbdpks["stk101_rbdpks ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpkl = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_rbdpkl
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '2' and
                    b.F101B4 = '32' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL");

        $adstkrbdpkl = mysqli_fetch_assoc($qrystkrbdpkl);
        $stk101_rbdpkl = (float) $adstkrbdpkl["stk101_rbdpkl ;


        $qryproccpo =  DB::connection('mysql4')->select("SELECT sum(b.F101B10) proc101_cpo
                from pl101ap3 a, pl101bp3 b, licensedb.license l,lesen_master.mpku_caps m
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
        m.cap_lesen=l.F201A and
                    m.cap_mmyyyy ='$blnthn' and
                    m.cap_kat = '06' and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '01' and
                    b.F101B10 not in (0) and
                    m.cap_lulus not in (0.00) and
                    b.F101B10 is not NULL and
                    m.cap_lulus is not NULL");

        $adproccpo = mysqli_fetch_assoc($qryproccpo);
        $proc101_cpo = (float) $adproccpo["proc101_cpo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryproccpko =  DB::connection('mysql4')->select("SELECT sum(b.F101B10) proc101_cpko
                from pl101ap3 a, pl101bp3 b, licensedb.license l,lesen_master.mpku_caps m
                where a.F101A1 = l.F201A and
                    l.F201U4 = $ngr and
            m.cap_lesen=l.F201A and
                    m.cap_mmyyyy ='$blnthn' and
                    m.cap_kat = '06' and
                    a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '2' and
                    b.F101B4 = '04' and
                    b.F101B10 not in (0) and
                    m.cap_lulus not in (0.00) and
                    b.F101B10 is not NULL and
                    m.cap_lulus is not NULL");


        $adproccpko = mysqli_fetch_assoc($qryproccpko);
        $proc101_cpko = (float) $adproccpko["proc101_cpko ;

        if ($refcap == 0)
        $refutilrate = 0;
        else
        $refutilrate = (float) ((($proc101_cpo + $proc101_cpko) / ($refcap/12)) * 100);

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri101cpo =  DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_cpo
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A1 = l.F201A and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 = '01' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL and
                    l.F201U4 = $ngr");

        $adnegeri101cpo = mysqli_fetch_assoc($qrynegeri101cpo);
        $stk101_cpo = (float) $adnegeri101cpo["stk101_cpo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri101ppo =  DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_ppo
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A1 = l.F201A and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '1' and
                    b.F101B4 != '01' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL and
                    l.F201U4 = $ngr");

        $adnegeri101ppo = mysqli_fetch_assoc($qrynegeri101ppo);
        $stk101_ppo = (float) $adnegeri101ppo["stk101_ppo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri101cpko = DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_cpko
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A1 = l.F201A and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '2' and
                    b.F101B4 = '04' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL and
                    l.F201U4 = $ngr");

        $adnegeri101cpko = mysqli_fetch_assoc($qrynegeri101cpko);
        $stk101_cpko = (float) $adnegeri101cpko["stk101_cpko ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri101ppko =  DB::connection('mysql4')->select("SELECT sum(b.F101B13) stk101_ppko
                from pl101ap3 a, pl101bp3 b, licensedb.license l
                where a.F101A1 = b.F101B1 and
                    a.F101A4 = b.F101B2 and
                    a.F101A1 = l.F201A and
                    a.F101A6 = '$tahun' and
                    a.F101A5 = '$bulan' and
                    b.F101B3 = '2' and
                    b.F101B4 != '04' and
                    b.F101B13 not in (0) and
                    b.F101B13 is not NULL and
                    l.F201U4 = $ngr");

        $adnegeri101ppko = mysqli_fetch_assoc($qrynegeri101ppko);
        $stk101_ppko = (float) $adnegeri101ppko["stk101_ppko ;

        // Kilang Oleo
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qry2 =  DB::connection('mysql4')->select("SELECT sum(m.cap_lulus) cap_lulus, count(m.cap_lulus) oleono
            from licensedb.license l,lesen_master.mpku_caps m,
            lesen_master.dbp220 d
            where l.F201U4 = $ngr and
                    l.F201A = m.cap_lesen and
                    m.cap_mmyyyy = '$blnthn' and
                    m.cap_kat = '06' and
                    l.F201A = d.F220A and
                    d.F220D = '2' and
                    m.cap_lulus not in (0.00) and
                    m.cap_lulus is not NULL");

        $ad2 = mysqli_fetch_assoc($qry2);
        $oleocap = (float)  $sum->cap_lulus ;
        $oleono =  $sum->oleono ;

        if ($oleocap == NULL)
        $oleocap = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodcps = "select sum(b.F104B9) prod104_cps
                    from pl104ap1 a, pl104bp1 b, licensedb.license l
                    where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '02' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprodcps = mysqli_query($conn_odbc,$qryprodcps);
        $adprodcps = mysqli_fetch_assoc($reprodcps);
        $prod104_cps = (float)  $sum->prod104_cps ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodcpl = "select sum(b.F104B9) prod104_cpl
                    from pl104ap1 a, pl104bp1 b, licensedb.license l
                    where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '03' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprodcpl = mysqli_query($conn_odbc,$qryprodcpl);
        $adprodcpl = mysqli_fetch_assoc($reprodcpl);
        $prod104_cpl = (float)  $sum->prod104_cpl ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdpo = "select sum(b.F104B9) prod104_rbdpo
                    from pl104ap1 a, pl104bp1 b, licensedb.license l
                    where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '25' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprodrbdpo = mysqli_query($conn_odbc,$qryprodrbdpo);
        $adprodrbdpo = mysqli_fetch_assoc($reprodrbdpo);
        $prod104_rbdpo = (float)  $sum->prod104_rbdpo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdps = "select sum(b.F104B9) prod104_rbdps
                    from pl104ap1 a, pl104bp1 b, licensedb.license l
                    where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '27' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprodrbdps = mysqli_query($conn_odbc,$qryprodrbdps);
        $adprodrbdps = mysqli_fetch_assoc($reprodrbdps);
        $prod104_rbdps = (float)  $sum->prod104_rbdps ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdpl = "select sum(b.F104B9) prod104_rbdpl
                    from pl104ap1 a, pl104bp1 b, licensedb.license l
                    where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '29' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprodrbdpl = mysqli_query($conn_odbc,$qryprodrbdpl);
        $adprodrbdpl = mysqli_fetch_assoc($reprodrbdpl);
        $prod104_rbdpl = (float) $adprodrbdpl["prod104_rbdpl ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodpfad = "select sum(b.F104B9) prod104_pfad
                    from pl104ap1 a, pl104bp1 b, licensedb.license l
                    where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '35' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprodpfad = mysqli_query($conn_odbc,$qryprodpfad);
        $adprodpfad = mysqli_fetch_assoc($reprodpfad);
        $prod104_pfad = (float) $adprodpfad["prod104_pfad ;

        /*        $qryprodsoap = "select sum(b.F104B9) prod104_soap
                    from pl104ap1 a, pl104bp1 b, licensedb.license l
                    where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 in ('48','A9') and
                    b.F104B9 not in (NULL,0)";

        $reprodsoap = mysqli_query($qryprodsoap, $conn_odbc);
        $adprodsoap = mysqli_fetch_assoc($reprodsoap);
        $prod104_soap = (float) $adprodsoap["prod104_soap ;
        */
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkcps = "select sum(b.F104B12) stk104_cps
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '02' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL";

        $restkcps = mysqli_query($conn_odbc,$qrystkcps);
        $adstkcps = mysqli_fetch_assoc($restkcps);
        $stk104_cps = (float) $adstkcps["stk104_cps ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkcpl = "select sum(b.F104B12) stk104_cpl
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '03' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL";

        $restkcpl = mysqli_query($conn_odbc,$qrystkcpl);
        $adstkcpl = mysqli_fetch_assoc($restkcpl);
        $stk104_cpl = (float) $adstkcpl["stk104_cpl ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpo = "select sum(b.F104B12) stk104_rbdpo
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '25' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL";

        $restkrbdpo = mysqli_query($conn_odbc,$qrystkrbdpo);
        $adstkrbdpo = mysqli_fetch_assoc($restkrbdpo);
        $stk104_rbdpo = (float) $adstkrbdpo["stk104_rbdpo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdps = "select sum(b.F104B12) stk104_rbdps
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '27' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL";

        $restkrbdps = mysqli_query($conn_odbc,$qrystkrbdps);
        $adstkrbdps = mysqli_fetch_assoc($restkrbdps);
        $stk104_rbdps = (float) $adstkrbdps["stk104_rbdps ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpl = "select sum(b.F104B12) stk104_rbdpl
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '29' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL";

        $restkrbdpl = mysqli_query($conn_odbc,$qrystkrbdpl);
        $adstkrbdpl = mysqli_fetch_assoc($restkrbdpl);
        $stk104_rbdpl = (float) $adstkrbdpl["stk104_rbdpl ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkpfad = "select sum(b.F104B12) stk104_pfad
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '35' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL";

        $restkpfad = mysqli_query($conn_odbc,$qrystkpfad);
        $adstkpfad = mysqli_fetch_assoc($restkpfad);
        $stk104_pfad = (float) $adstkpfad["stk104_pfad ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo cpo baca kilang oleo shj
        $qryproccpo = "select round(sum(b.F104B9),0) proc104_cpo
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '01' and
                    substring(b.F104B2,7,1)!='B' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reproccpo = mysqli_query($conn_odbc,$qryproccpo);
        $adproccpo = mysqli_fetch_assoc($reproccpo);
        $proc104_cpo = (float) $adproccpo["proc104_cpo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo cpo baca kilang biodiesel shj
        $qryproccpobio = "select round(sum(b.F104B9),0) proc104_cpo
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '01' and
                    substring(b.F104B2,7,1)='B' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reproccpobio = mysqli_query($conn_odbc,$qryproccpobio);
        $adproccpobio = mysqli_fetch_assoc($reproccpobio);
        $proc104_cpobio = (float) $adproccpobio["proc104_cpo ;

        //jum oleo cpo kilang oleo + oleo cpo kilang biodiesel

        $proc104_cpo = $proc104_cpo + $proc104_cpobio;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo ppo baca kilang oleo shj
        $qryprocppo = "select round(sum(b.F104B9),2) proc104_ppo
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 != '01' and
                    substring(b.F104B2,7,1)!='B' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprocppo = mysqli_query($conn_odbc,$qryprocppo);
        $adprocppo = mysqli_fetch_assoc($reprocppo);
        $proc104_ppo = (float) $adprocppo["proc104_ppo ;


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo ppo baca kilang biodisel shj
        $qryprocppobio = "select round(sum(b.F104B9),2) proc104_ppo
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 != '01' and
                    substring(b.F104B2,7,1)='B' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprocppobio = mysqli_query($conn_odbc,$qryprocppobio);
        $adprocppobio = mysqli_fetch_assoc($reprocppobio);
        $proc104_ppobio = (float) $adprocppobio["proc104_ppo ;

        //jum oleo ppo kilang oleo + oleo ppo kilang biodiesel

        $proc104_ppo = $proc104_ppo + $proc104_ppobio;


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo cpko baca kilang oleo shj
        $qryproccpko = "select round(sum(b.F104B9),0) proc104_cpko
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '2' and
                    b.F104B4 = '04' and
                    substring(b.F104B2,7,1)!='B' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reproccpko = mysqli_query($conn_odbc,$qryproccpko);
        $adproccpko = mysqli_fetch_assoc($reproccpko);
        $proc104_cpko = (float) $adproccpko["proc104_cpko ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo cpko baca kilang biodiesel shj
        $qryproccpkobio = "select round(sum(b.F104B9),0) proc104_cpko
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '2' and
                    b.F104B4 = '04' and
                    substring(b.F104B2,7,1)='B' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reproccpkobio = mysqli_query($conn_odbc,$qryproccpkobio);
        $adproccpkobio = mysqli_fetch_assoc($reproccpkobio);
        $proc104_cpkobio = (float) $adproccpkobio["proc104_cpko ;

        //jum oleo cpko kilang oleo + oleo cpko kilang biodiesel

        $proc104_cpko = $proc104_cpko + $proc104_cpkobio;


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo ppko baca kilang oleo shj
        $qryprocppko = "select round(sum(b.F104B9),0) proc104_ppko
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '2' and
                    b.F104B4 != '04' and
                    substring(b.F104B2,7,1)!='B' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprocppko = mysqli_query($conn_odbc,$qryprocppko);
        $adprocppko = mysqli_fetch_assoc($reprocppko);
        $proc104_ppko = (float) $adprocppko["proc104_ppko ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo ppko baca kilang biodiesel shj
        $qryprocppkobio = "select round(sum(b.F104B9),0) proc104_ppko
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '2' and
                    b.F104B4 != '04' and
                    substring(b.F104B2,7,1)='B' and
                    b.F104B9 not in (0) and
                    b.F104B9 is not NULL";

        $reprocppkobio = mysqli_query($conn_odbc,$qryprocppkobio);
        $adprocppkobio = mysqli_fetch_assoc($reprocppkobio);
        $proc104_ppkobio = (float) $adprocppkobio["proc104_ppko ;

        //jum oleo ppko kilang oleo + oleo ppko kilang biodiesel

        $proc104_ppko = $proc104_ppko + $proc104_ppkobio;


        if ($oleocap == 0)
        $oleoutilrate = 0;
        else
        $oleoutilrate = (float) ((($proc104_cpo + $proc104_ppo + $proc104_cpko + $proc104_ppko ) / ($oleocap/12)) * 100);
        echo "data1";
        echo "<br>";
        echo $proc104_cpo;
        echo "<br>";
        echo $proc104_ppo;
        echo "<br>";
        echo $proc104_cpko;
        echo "<br>";
        echo $proc104_ppko;
        echo "<br>";
        echo $oleocap;
        echo "<br>";
        echo $oleoutilrate;


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri104cpo = "select sum(b.F104B12) stk104_cpo
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A1 = l.F201A and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 = '01' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL and
                    l.F201U4 = $ngr";

        $renegeri104cpo = mysqli_query($conn_odbc,$qrynegeri104cpo);
        $adnegeri104cpo = mysqli_fetch_assoc($renegeri104cpo);
        $stk104_cpo = (float) $adnegeri104cpo["stk104_cpo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri104ppo = "select sum(b.F104B12) stk104_ppo
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A1 = l.F201A and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 != '01' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL and
                    l.F201U4 = $ngr";

        $renegeri104ppo = mysqli_query($conn_odbc,$qrynegeri104ppo);
        $adnegeri104ppo = mysqli_fetch_assoc($renegeri104ppo);
        $stk104_ppo = (float) $adnegeri104ppo["stk104_ppo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri104cpko = "select sum(b.F104B12) stk104_cpko
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A1 = l.F201A and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '2' and
                    b.F104B4 = '04' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL and
                    l.F201U4 = $ngr";

        $renegeri104cpko = mysqli_query($conn_odbc,$qrynegeri104cpko);
        $adnegeri104cpko = mysqli_fetch_assoc($renegeri104cpko);
        $stk104_cpko = (float) $adnegeri104cpko["stk104_cpko ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri104ppko = "select sum(b.F104B12) stk104_ppko
                from pl104ap1 a, pl104bp1 b, licensedb.license l
                where a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A1 = l.F201A and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '2' and
                    b.F104B4 != '04' and
                    b.F104B12 not in (0) and
                    b.F104B12 is not NULL and
                    l.F201U4 = $ngr";

        $renegeri104ppko = mysqli_query($conn_odbc,$qrynegeri104ppko);
        $adnegeri104ppko = mysqli_fetch_assoc($renegeri104ppko);
        $stk104_ppko = (float) $adnegeri104ppko["stk104_ppko ;

        // Pusat Simpanan

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri111cpo = "select sum(a.INS_KJ) stk111_cpo
                from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                where a.INS_KA = l.F201A and
                    a.INS_KC = '$tahun' and
                    a.INS_KB = '$bulan' and
                    a.INS_KJ not in (0) and
                    a.INS_KJ is not NULL and
                    a.INS_KD = '01' and
                    a.INS_KD = c.comm_code_l and
                    c.group_l = '01' and
                    l.F201U4 = $ngr";

        $renegeri111cpo = mysqli_query($conn_odbc,$qrynegeri111cpo);
        $adnegeri111cpo = mysqli_fetch_assoc($renegeri111cpo);
        $stk111_cpo = (float) $adnegeri111cpo["stk111_cpo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri111ppo = "select sum(a.INS_KJ) stk111_ppo
                from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                where a.INS_KA = l.F201A and
                    a.INS_KC = '$tahun' and
                    a.INS_KB = '$bulan' and
                    a.INS_KJ not in (0) and
                    a.INS_KJ is not NULL and
                    a.INS_KD != '01' and
                    a.INS_KD = c.comm_code_l and
                    c.group_l = '01' and
                    l.F201U4 = $ngr";

        $renegeri111ppo = mysqli_query($conn_odbc,$qrynegeri111ppo);
        $adnegeri111ppo = mysqli_fetch_assoc($renegeri111ppo);
        $stk111_ppo = (float) $adnegeri111ppo["stk111_ppo ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri111cpko = "select sum(a.INS_KJ) stk111_cpko
                from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                where a.INS_KA = l.F201A and
                    a.INS_KC = '$tahun' and
                    a.INS_KB = '$bulan' and
                    a.INS_KJ not in (0) and
                    a.INS_KJ is not NULL and
                    a.INS_KD = '04' and
                    a.INS_KD = c.comm_code_l and
                    c.group_l = '02' and
                    l.F201U4 = $ngr";

        $renegeri111cpko = mysqli_query($conn_odbc,$qrynegeri111cpko);
        $adnegeri111cpko = mysqli_fetch_assoc($renegeri111cpko);
        $stk111_cpko = (float) $adnegeri111cpko["stk111_cpko ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri111ppko = "select sum(a.INS_KJ) stk111_ppko
                from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                where a.INS_KA = l.F201A and
                    a.INS_KC = '$tahun' and
                    a.INS_KB = '$bulan' and
                    a.INS_KJ not in (0) and
                    a.INS_KJ is not NULL and
                    a.INS_KD != '04' and
                    a.INS_KD = c.comm_code_l and
                    c.group_l = '02' and
                    l.F201U4 = $ngr";

        $renegeri111ppko = mysqli_query($conn_odbc,$qrynegeri111ppko);
        $adnegeri111ppko = mysqli_fetch_assoc($renegeri111ppko);
        $stk111_ppko = (float) $adnegeri111ppko["stk111_ppko ;

        //e-biodiesel
        //         $stk_bio_rbdpo = 0;
        //         $ppo_hasil_rbdpo = 0;
        //         $stk_awl_rbdpo = 0;
        //         $bekalan_belian_rbdpo = 0;
        //         $bekalan_penerimaan_rbdpo = 0;
        //         $bekalan_import_rbdpo = 0;
        //         $ppo_proses_rbdpo = 0;
        //         $jualan_jualan_rbdpo =0 ;
        //         $jualan_edaran_rbdpo = 0;
        //         $jualan_eksport_rbdpo= 0;
        //                  unset($stk_bio_rbdpo);
        // unset($ppo_hasil_rbdpo);
        // unset($stk_awl_rbdpo);

        //--> RBDPO
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qryrbdpo1 = "select sum(kuantiti)  ppo_hasil_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'ppo_hasil' and
                    a.kuantiti IS NOT NULL and
                    l.F201U4 = $ngr ";

        $rerbdpo1 = mysqli_query($conn_odbc,$qryrbdpo1); //echo "test2 rbdpo ",$qryrbdpo1;  echo "--><br>";
        $adrbdpo1 = mysqli_fetch_assoc($rerbdpo1);
        $ppo_hasil_rbdpo = (float)$adrbdpo1["ppo_hasil_rbdpo ;  echo $ppo_hasil_rbdpo;
        if ($ppo_hasil_rbdpo==NULL)
        $ppo_hasil_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qryrbdpo2 = "select sum(kuantiti)  stok_awl_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'stok_awal' and
                    a.kuantiti IS NOT NULL and
                    l.F201U4 = $ngr";

        $rerbdpo2 = mysqli_query($conn_odbc,$qryrbdpo2);    echo "test2 rbdpo ",$qrynegeribio_rbdpo2;  echo "--><br>";
        $adrbdpo2 = mysqli_fetch_assoc($rerbdpo2);
        $stk_awl_rbdpo = (float)$adrbdpo2["stok_awl_rbdpo ;    echo $stok_awl_rbdpo;

        if ($stk_awl_rbdpo==NULL)
        $stk_awl_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo3 = "select sum(kuantiti) bekalan_belian_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'bekalan_belian' and
                    a.kuantiti IS NOT NULL and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpo3 = mysqli_query($conn_odbc,$qrynegeribio_rbdpo3);
        $adnegeribio_rbdpo3 = mysqli_fetch_assoc($renegeribio_rbdpo3);
        $bekalan_belian_rbdpo = (float) $adnegeribio_rbdpo3["bekalan_belian_rbdpo ;

        if ($bekalan_belian_rbdpo==NULL)
        $bekalan_belian_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo4 = "select sum(kuantiti) bekalan_penerimaan_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'bekalan_penerimaan' and
                    a.kuantiti IS NOT NULL and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpo4 = mysqli_query($conn_odbc,$qrynegeribio_rbdpo4);
        $adnegeribio_rbdpo4 = mysqli_fetch_assoc($renegeribio_rbdpo4);
        $bekalan_penerimaan_rbdpo = (float) $adnegeribio_rbdpo4["bekalan_penerimaan_rbdpo ;

        if ($bekalan_penerimaan_rbdpo==NULL)
        $bekalan_penerimaan_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo5 = "select sum(kuantiti)  bekalan_import_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'bekalan_import' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpo5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpo5);
        $adnegeribio_rbdpo5 = mysqli_fetch_assoc($renegeribio_rbdpo5);
        $bekalan_import_rbdpo = (float) $adnegeribio_rbdpo5["bekalan_import_rbdpo ;

        if ($bekalan_import_rbdpo==NULL)
        $bekalan_import_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo6 = "select sum(kuantiti)  ppo_proses_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'ppo_proses' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpo6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpo6);
        $adnegeribio_rbdpo6 = mysqli_fetch_assoc($renegeribio_rbdpo6);
        $ppo_proses_rbdpo = (float) $adnegeribio_rbdpo6["ppo_proses_rbdpo ;

        if ($ppo_proses_rbdpo==NULL)
        $ppo_proses_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo7 = "select sum(kuantiti)  jualan_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'jualan_jualan' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpo7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpo7);
        $adnegeribio_rbdpo7 = mysqli_fetch_assoc($renegeribio_rbdpo7);
        $jualan_jualan_rbdpo = (float) $adnegeribio_rbdpo7["jualan_rbdpo ;

        if ($jualan_jualan_rbdpo==NULL)
        $jualan_jualan_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo8 = "select sum(kuantiti)  jualan_edaran_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'jualan_edaran' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpo8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpo8);
        $adnegeribio_rbdpo8 = mysqli_fetch_assoc($renegeribio_rbdpo8);
        $jualan_edaran_rbdpo = (float) $adnegeribio_rbdpo8["jualan_edaran_rbdpo ;

        if ($jualan_edaran_rbdpo==NULL)
        $jualan_edaran_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo9 = "select sum(kuantiti)  jualan_eksport_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'jualan_eksport' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpo9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpo9);
        $adnegeribio_rbdpo9 = mysqli_fetch_assoc($renegeribio_rbdpo9);
        $jualan_eksport_rbdpo = (float) $adnegeribio_rbdpo9["jualan_eksport_rbdpo ;

        if ($jualan_eksport_rbdpo==NULL)
        $jualan_eksport_rbdpo = 0;


        //--> RBDPL
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_rbdpl1 = "select round(sum(kuantiti),2)  as ppo_hasil_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'ppo_hasil' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl1 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl1);
        $adnegeribio_rbdpl1 = mysqli_fetch_assoc($renegeribio_rbdpl1);
        $ppo_hasil_rbdpl = (float) $adnegeribio_rbdpl1["ppo_hasil_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl2 = "select round(sum(kuantiti),2)  as stok_awl_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'stok_awal' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl2 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl2);
        $adnegeribio_rbdpl2 = mysqli_fetch_assoc($renegeribio_rbdpl2);
        $stk_awl_rbdpl = (float) $adnegeribio_rbdpl2["stok_awl_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl3 = "select round(sum(kuantiti),2)  as bekalan_belian_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'bekalan_belian' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl3 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl3);
        $adnegeribio_rbdpl3 = mysqli_fetch_assoc($renegeribio_rbdpl3);
        $bekalan_belian_rbdpl = (float) $adnegeribio_rbdpl3["bekalan_belian_rbdpl ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'bekalan_penerimaan' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl4 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl4);
        $adnegeribio_rbdpl4 = mysqli_fetch_assoc($renegeribio_rbdpl4);
        $bekalan_penerimaan_rbdpl = (float) $adnegeribio_rbdpl4["bekalan_penerimaan_rbdpl ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl5 = "select round(sum(kuantiti),2)  as bekalan_import_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'bekalan_import' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl5);
        $adnegeribio_rbdpl5 = mysqli_fetch_assoc($renegeribio_rbdpl5);
        $bekalan_import_rbdpl = (float) $adnegeribio_rbdpl5["bekalan_import_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl6 = "select round(sum(kuantiti),2)  as ppo_proses_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'ppo_proses' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl6);
        $adnegeribio_rbdpl6 = mysqli_fetch_assoc($renegeribio_rbdpl6);
        $ppo_proses_rbdpl = (float) $adnegeribio_rbdpl6["ppo_proses_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl7 = "select round(sum(kuantiti),2)  as jualan_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'jualan_jualan' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl7);
        $adnegeribio_rbdpl7 = mysqli_fetch_assoc($renegeribio_rbdpl7);
        $jualan_jualan_rbdpl = (float) $adnegeribio_rbdpl7["jualan_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl8 = "select round(sum(kuantiti),2)  as jualan_edaran_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'jualan_edaran' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl8);
        $adnegeribio_rbdpl8 = mysqli_fetch_assoc($renegeribio_rbdpl8);
        $jualan_edaran_rbdpl = (float) $adnegeribio_rbdpl8["jualan_edaran_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl9 = "select round(sum(kuantiti),2)  as jualan_eksport_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'jualan_eksport' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdpl9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl9);
        $adnegeribio_rbdpl9 = mysqli_fetch_assoc($renegeribio_rbdpl9);
        $jualan_eksport_rbdpl = (float) $adnegeribio_rbdpl9["jualan_eksport_rbdpl ;



        //odbc_close($conn_odbc);
        //--> RBDPS
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_rbdps1 = "select round(sum(kuantiti),2)  as ppo_hasil_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'ppo_hasil' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps1 = mysqli_query($conn_odbc,$qrynegeribio_rbdps1);
        $adnegeribio_rbdps1 = mysqli_fetch_assoc($renegeribio_rbdps1);
        $ppo_hasil_rbdps = (float) $adnegeribio_rbdps1["ppo_hasil_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps2 = "select round(sum(kuantiti),2)  as stok_awl_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'stok_awal' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps2 = mysqli_query($conn_odbc,$qrynegeribio_rbdps2);
        $adnegeribio_rbdps2 = mysqli_fetch_assoc($renegeribio_rbdps2);
        $stk_awl_rbdps = (float) $adnegeribio_rbdps2["stok_awl_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps3 = "select round(sum(kuantiti),2)  as bekalan_belian_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'bekalan_belian' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps3 = mysqli_query($conn_odbc,$qrynegeribio_rbdps3);
        $adnegeribio_rbdps3 = mysqli_fetch_assoc($renegeribio_rbdps3);
        $bekalan_belian_rbdps = (float) $adnegeribio_rbdps3["bekalan_belian_rbdps ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'bekalan_penerimaan' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps4 = mysqli_query($conn_odbc,$qrynegeribio_rbdps4);
        $adnegeribio_rbdps4 = mysqli_fetch_assoc($renegeribio_rbdps4);
        $bekalan_penerimaan_rbdps = (float) $adnegeribio_rbdps4["bekalan_penerimaan_rbdps ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps5 = "select round(sum(kuantiti),2)  as bekalan_import_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'bekalan_import' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps5 = mysqli_query($conn_odbc,$qrynegeribio_rbdps5);
        $adnegeribio_rbdps5 = mysqli_fetch_assoc($renegeribio_rbdps5);
        $bekalan_import_rbdps = (float) $adnegeribio_rbdps5["bekalan_import_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps6 = "select round(sum(kuantiti),2)  as ppo_proses_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'ppo_proses' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps6 = mysqli_query($conn_odbc,$qrynegeribio_rbdps6);
        $adnegeribio_rbdps6 = mysqli_fetch_assoc($renegeribio_rbdps6);
        $ppo_proses_rbdps = (float) $adnegeribio_rbdps6["ppo_proses_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps7 = "select round(sum(kuantiti),2)  as jualan_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'jualan_jualan' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps7 = mysqli_query($conn_odbc,$qrynegeribio_rbdps7);
        $adnegeribio_rbdps7 = mysqli_fetch_assoc($renegeribio_rbdps7);
        $jualan_jualan_rbdps = (float) $adnegeribio_rbdps7["jualan_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps8 = "select round(sum(kuantiti),2)  as jualan_edaran_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'jualan_edaran' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps8 = mysqli_query($conn_odbc,$qrynegeribio_rbdps8);
        $adnegeribio_rbdps8 = mysqli_fetch_assoc($renegeribio_rbdps8);
        $jualan_edaran_rbdps = (float) $adnegeribio_rbdps8["jualan_edaran_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps9 = "select round(sum(kuantiti),2)  as jualan_eksport_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'jualan_eksport' and
                    l.F201U4 = $ngr";

        $renegeribio_rbdps9 = mysqli_query($conn_odbc,$qrynegeribio_rbdps9);
        $adnegeribio_rbdps9 = mysqli_fetch_assoc($renegeribio_rbdps9);
        $jualan_eksport_rbdps = (float) $adnegeribio_rbdps9["jualan_eksport_rbdps ;




        //--> PFAD
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_pfad1 = "select round(sum(kuantiti),2)  as ppo_hasil_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'ppo_hasil' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad1 = mysqli_query($conn_odbc,$qrynegeribio_pfad1);
        $adnegeribio_pfad1 = mysqli_fetch_assoc($renegeribio_pfad1);
        $ppo_hasil_pfad = (float) $adnegeribio_pfad1["ppo_hasil_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad2 = "select round(sum(kuantiti),2)  as stok_awl_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'stok_awal' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad2 = mysqli_query($conn_odbc,$qrynegeribio_pfad2);
        $adnegeribio_pfad2 = mysqli_fetch_assoc($renegeribio_pfad2);
        $stk_awl_pfad = (float) $adnegeribio_pfad2["stok_awl_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad3 = "select round(sum(kuantiti),2)  as bekalan_belian_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'bekalan_belian' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad3 = mysqli_query($conn_odbc,$qrynegeribio_pfad3);
        $adnegeribio_pfad3 = mysqli_fetch_assoc($renegeribio_pfad3);
        $bekalan_belian_pfad = (float) $adnegeribio_pfad3["bekalan_belian_pfad ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'bekalan_penerimaan' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad4 = mysqli_query($conn_odbc,$qrynegeribio_pfad4);
        $adnegeribio_pfad4 = mysqli_fetch_assoc($renegeribio_pfad4);
        $bekalan_penerimaan_pfad = (float) $adnegeribio_pfad4["bekalan_penerimaan_pfad ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad5 = "select round(sum(kuantiti),2)  as bekalan_import_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'bekalan_import' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad5 = mysqli_query($conn_odbc,$qrynegeribio_pfad5);
        $adnegeribio_pfad5 = mysqli_fetch_assoc($renegeribio_pfad5);
        $bekalan_import_pfad = (float) $adnegeribio_pfad5["bekalan_import_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad6 = "select round(sum(kuantiti),2)  as ppo_proses_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'ppo_proses' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad6 = mysqli_query($conn_odbc,$qrynegeribio_pfad6);
        $adnegeribio_pfad6 = mysqli_fetch_assoc($renegeribio_pfad6);
        $ppo_proses_pfad = (float) $adnegeribio_pfad6["ppo_proses_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad7 = "select round(sum(kuantiti),2)  as jualan_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'jualan_jualan' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad7 = mysqli_query($conn_odbc,$qrynegeribio_pfad7);
        $adnegeribio_pfad7 = mysqli_fetch_assoc($renegeribio_pfad7);
        $jualan_jualan_pfad = (float) $adnegeribio_pfad7["jualan_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad8 = "select round(sum(kuantiti),2)  as jualan_edaran_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'jualan_edaran' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad8 = mysqli_query($conn_odbc,$qrynegeribio_pfad8);
        $adnegeribio_pfad8 = mysqli_fetch_assoc($renegeribio_pfad8);
        $jualan_edaran_pfad = (float) $adnegeribio_pfad8["jualan_edaran_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad9 = "select round(sum(kuantiti),2)  as jualan_eksport_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'jualan_eksport' and
                    l.F201U4 = $ngr";

        $renegeribio_pfad9 = mysqli_query($conn_odbc,$qrynegeribio_pfad9);
        $adnegeribio_pfad9 = mysqli_fetch_assoc($renegeribio_pfad9);
        $jualan_eksport_pfad = (float) $adnegeribio_pfad9["jualan_eksport_pfad ;



      }


















        // data from codedb
        $produks = DB::connection('mysql5')->select("SELECT comm_code_l, comm_summary, group_l,comm_desc,sub_group from commodity_l");
        // dd($e91init);

        $delete_produk = DB::table('produk')->delete();

        $totalprod = 0;


        foreach ($produks as $produk) {

            $code = $produk->comm_code_l;
            $nama = $produk->comm_summary;
            $cat = $produk->group_l;
            $desc = $produk->comm_desc;
            $sub_group = $produk->sub_group;

            $produk_insert = DB::insert("INSERT into produk values ('$code','$nama','$cat','$desc',NULL,NULL,NULL,'$sub_group')");

            $totalprod = $totalprod + 1;
        }
        // $result = Produk::get();
        // dd($result);
    }












































    public function porting_negara()
    {
        // data from codedb
        $negaras = DB::connection('mysql5')->select("SELECT code, nama, kod_eu, benua from country_l");
        // dd($e91init);

        $delete_negaraekilang = DB::table('negara')->delete();
        $delete_negarastat = DB::connection('mysql3')->delete("DELETE from negara");

        $insertekilang = DB::insert("INSERT into negara values ('','','','','','','','')");
        $insertstat = DB::connection('mysql3')->insert("INSERT into negara values ('','','','','','','','')");

        $totalnegara = 0;

        foreach ($negaras as $negara) {

            $code =  $negara->code;
            $nama = addslashes($negara->nama);
            $eu15 =  $negara->kod_eu;
            $benua =  $negara->benua;

            $negaraekilang_insert = DB::insert("INSERT into negara values ('$code','$nama','$benua','$eu15',null,null,null,null)");
            $negarastat_insert = DB::connection('mysql3')->insert("INSERT into negara values ('$code','$nama','$benua','$eu15',null,null,null,null)");

            $totalnegara = $totalnegara + 1;
        }
        // $result = Produk::get();
        // dd($result);

        $negara2 = DB::connection('mysql5')->select("SELECT code, nama, kod_eu,kod_eu27,kod_eu28,kod_eu27_2020 from country_l_eu25");

        foreach ($negara2 as $negara) {

            $code =  $negara->code;
            $nama =  $negara->nama;
            //$eu15 =  $negara->eu15 ;
            $eu25 =  $negara->kod_eu;
            $eu27 =  $negara->kod_eu27;
            $eu28 =  $negara->kod_eu28;
            $eu27_2020 =  $negara->kod_eu27_2020;

            if ($eu25 == 'euc') {
                $update25_negaraekilang =  DB::update("UPDATE negara set eu25 ='1' where kodnegara='$code'");
                $update25_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu25='1' where kodnegara='$code'");
            }
            if ($eu27 == 'euc') {
                $update27_negaraekilang =  DB::update("UPDATE negara set eu27='1' where kodnegara='$code'");
                $update27_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu27='1' where kodnegara='$code'");
            }
            if ($eu28 == 'euc') {
                $update28_negaraekilang =  DB::update("UPDATE negara set eu28='1' where kodnegara='$code'");
                $update28_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu28='1' where kodnegara='$code'");
            }
            if ($eu27_2020 == 'euc') {
                $update272022_negaraekilang =  DB::update("UPDATE negara set eu27_2020='1' where kodnegara='$code'");
                $update272022_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu27_2020='1' where kodnegara='$code'");
            }
        }

        // $result = Negara::get();
        // dd($result);

    }
}
