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

        foreach ($qryprodrbdpl as $sum) {
            $prod101_rbdpl = (float)  $sum->prod101_rbdpl ;

        }

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

        foreach ($qryprodpfad as $sum) {
            $prod101_pfad = (float)  $sum->prod101_pfad ;

        }

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

        foreach ($qryprodco as $sum) {
            $prod101_co = (float)  $sum->prod101_co ;

        }

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

        foreach ($qryprodmar as $sum) {
            $prod101_mar = (float) $sum->prod101_mar ;

        }

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

        foreach ($qryprodghee as $sum) {
            $prod101_ghee = (float) $sum->prod101_ghee ;
        }

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

        foreach ($qryprodfat as $sum) {
            $prod101_fat = (float) $sum->prod101_fat ;

        }

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

        foreach ($qryprodshort as $sum) {
            $prod101_short = (float) $sum->prod101_short ;

        }

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

        foreach ($qryprodcoco as $sum) {
            $prod101_coco = (float) $sum->prod101_coco ;

        }

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

        foreach ($qryprodsoap as $sum) {
            $prod101_soap = (float) $sum->qryprodsoap ;

        }

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

        foreach ($qryprodredol as $sum) {
            $prod101_redol = (float) $sum->prod101_redol ;

        }

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

        foreach ($qryprodpry as $sum) {
            $prod101_pry = (float) $sum->prod101_pry ;

        }

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

        foreach ($qryprodblend as $sum) {
            $prod101_blend = (float) $sum->prod101_blend ;

        }

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

        foreach ($qryprodotheredb as $sum) {
            $prod101_otheredb = (float) $sum->prod101_otheredb ;

        }

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

        foreach ($qryprodothernot as $sum) {
            $prod101_othernot = (float) $sum->prod101_othernot ;
        }

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

        foreach ($qrystkcps as $sum) {
            $stk101_cps = (float) $sum->stk101_cps ;

        }

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

        foreach ($qrystkcpl as $sum) {
            $stk101_cpl = (float) $sum->stk101_cpl ;

        }

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

        foreach ($qrystkrbdpo as $sum) {
            $stk101_rbdpo = (float) $sum->stk101_rbdpo ;

        }

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

        foreach ($qrystkrbdps as $sum) {
            $stk101_rbdps = (float) $sum->stk101_rbdps ;

        }

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

        foreach ($qrystkrbdpl as $sum) {
            $stk101_rbdpl = (float) $sum->stk101_rbdpl ;

        }

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

        foreach ($qrystkpfad as $sum) {
            $stk101_pfad = (float) $sum->stk101_pfad ;

        }

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

        foreach ($qrystkco as $sum) {
            $stk101_co = (float) $sum->stk101_co ;

        }

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

        foreach ($qrystkmar as $sum) {
            $stk101_mar = (float) $sum->stk101_mar ;
        }

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

        foreach ($qrystkghee as $sum) {
            $stk101_ghee = (float) $sum->stk101_ghee ;

        }

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

        foreach ($qrystkfat as $sum) {
            $stk101_fat = (float) $sum->stk101_fat ;

        }

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

        foreach ($qrystkshort as $sum) {
            $stk101_short = (float) $sum->stk101_short ;

        }

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

        foreach ($qrystkcoco as $sum) {
            $stk101_coco = (float) $sum->stk101_coco ;

        }

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

        foreach ($qrystkcoco as $sum) {
            $stk101_soap = (float) $sum->stk101_soap ;

        }

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

        foreach ($qrystkredol as $sum) {
            $stk101_redol = (float) $sum->stk101_redol ;
        }

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

        foreach ($qrystkpry as $sum) {
            $stk101_pry = (float) $sum->stk101_pry ;

        }

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

        foreach ($qrystkblend as $sum) {
            $stk101_blend = (float) $sum->stk101_blend ;

        }

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

        foreach ($qrystkotheredb as $sum) {
            $stk101_otheredb = (float) $sum->stk101_otheredb ;

        }

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

        foreach ($qrystkothernot as $sum) {
            $stk101_othernot = (float) $sum->stk101_othernot ;

        }

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

        foreach ($qrystkrbdpks as $sum) {
            $stk101_rbdpks = (float) $sum->stk101_rbdpks ;

        }

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

        foreach ($qrystkrbdpkl as $sum) {
            $stk101_rbdpkl = (float) $sum->stk101_rbdpkl ;

        }

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

        foreach ($qryproccpo as $sum) {
            $proc101_cpo = (float) $sum->proc101_cpo ;

        }

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


        foreach ($qryproccpko as $sum) {
            $proc101_cpko = (float) $sum->proc101_cpko ;

        }

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

        foreach ($qrynegeri101cpo as $sum) {
            $stk101_cpo = (float) $sum->stk101_cpo ;

        }

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

        foreach ($qrynegeri101ppo as $sum) {
            $stk101_ppo = (float) $sum->stk101_ppo ;

        }

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

        foreach ($qrynegeri101cpko as $sum) {
            $stk101_cpko = (float) $sum->stk101_cpko ;

        }

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

        foreach ($qrynegeri101ppko as $sum) {
            $stk101_ppko = (float) $sum->stk101_ppko ;

        }

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

        foreach ($qry2 as $sum) {
            $oleocap = (float)  $sum->cap_lulus ;
            $oleono =  $sum->oleono ;
        }

        if ($oleocap == NULL)
        $oleocap = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodcps =  DB::connection('mysql4')->select("SELECT sum(b.F104B9) prod104_cps
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
                    b.F104B9 is not NULL");

        foreach ($qryprodcps as $sum) {
            $prod104_cps = (float)  $sum->prod104_cps ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodcpl = DB::connection('mysql4')->select("SELECT sum(b.F104B9) prod104_cpl
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
                    b.F104B9 is not NULL");

        foreach ($qryprodcpl as $sum) {
            $prod104_cpl = (float)  $sum->prod104_cpl ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdpo = DB::connection('mysql4')->select("SELECT sum(b.F104B9) prod104_rbdpo
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
                    b.F104B9 is not NULL");

        foreach ($qryprodrbdpo as $sum) {
            $prod104_rbdpo = (float)  $sum->prod104_rbdpo ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdps = DB::connection('mysql4')->select("SELECT sum(b.F104B9) prod104_rbdps
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
                    b.F104B9 is not NULL");

        foreach ($qryprodrbdps as $sum) {
            $prod104_rbdps = (float)  $sum->prod104_rbdps ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodrbdpl = DB::connection('mysql4')->select("SELECT sum(b.F104B9) prod104_rbdpl
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
                    b.F104B9 is not NULL");

        foreach ($qryprodrbdpl as $sum) {
            $prod104_rbdpl = (float)  $sum->prod104_rbdpl ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qryprodpfad = DB::connection('mysql4')->select("SELECT sum(b.F104B9) prod104_pfad
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
                    b.F104B9 is not NULL");

        foreach ($variable as $key => $value) {
            $prod104_pfad = (float)  $sum->prod104_pfad ;

        }

        /*        $qryprodsoap = DB::connection('mysql4')->select("SELECT sum(b.F104B9) prod104_soap
                    from pl104ap1 a, pl104bp1 b, licensedb.license l
                    where a.F104A1 = l.F201A and
                    l.F201U4 = $ngr and
                    a.F104A1 = b.F104B1 and
                    a.F104A4 = b.F104B2 and
                    a.F104A6 = '$tahun' and
                    a.F104A5 = '$bulan' and
                    b.F104B3 = '1' and
                    b.F104B4 in ('48','A9') and
                    b.F104B9 not in (NULL,0)");

        $reprodsoap = mysqli_query($qryprodsoap, $conn_odbc);
        $adprodsoap = mysqli_fetch_assoc($reprodsoap);
        $prod104_soap = (float) $sum->prod104_soap ;
        */
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkcps = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_cps
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
                    b.F104B12 is not NULL");

        foreach ($qrystkcps as $sum) {
            $stk104_cps = (float) $sum->stk104_cps ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkcpl = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_cpl
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
                    b.F104B12 is not NULL");

        foreach ($qrystkcpl as $sum) {
            $stk104_cpl = (float) $sum->stk104_cpl ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpo = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_rbdpo
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
                    b.F104B12 is not NULL");

        foreach ($qrystkrbdpo as $sum) {
            $stk104_rbdpo = (float) $sum->stk104_rbdpo ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdps = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_rbdps
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
                    b.F104B12 is not NULL");

        foreach ($qrystkrbdps as $sum) {
            $stk104_rbdps = (float) $sum->stk104_rbdps ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkrbdpl = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_rbdpl
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
                    b.F104B12 is not NULL");

        foreach ($qrystkrbdpl as $sum) {
            $stk104_rbdpl = (float) $sum->stk104_rbdpl ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrystkpfad = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_pfad
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
                    b.F104B12 is not NULL");

        foreach ($qrystkpfad as $sum) {
            $stk104_pfad = (float) $sum->stk104_pfad ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo cpo baca kilang oleo shj
        $qryproccpo = DB::connection('mysql4')->select("SELECT round(sum(b.F104B9),0) proc104_cpo
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
                    b.F104B9 is not NULL");

        foreach ($qryproccpo as $sum) {
            $proc104_cpo = (float) $sum->proc104_cpo ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo cpo baca kilang biodiesel shj
        $qryproccpobio = DB::connection('mysql4')->select("SELECT round(sum(b.F104B9),0) proc104_cpo
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
                    b.F104B9 is not NULL");

        foreach ($qryproccpobio as $sum) {
            $proc104_cpobio = (float) $sum->proc104_cpo ;
        }

        //jum oleo cpo kilang oleo + oleo cpo kilang biodiesel

        $proc104_cpo = $proc104_cpo + $proc104_cpobio;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo ppo baca kilang oleo shj
        $qryprocppo = DB::connection('mysql4')->select("SELECT round(sum(b.F104B9),2) proc104_ppo
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
                    b.F104B9 is not NULL");

        foreach ($qryprocppo as $sum) {
            $proc104_ppo = (float) $sum->proc104_ppo ;

        }


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo ppo baca kilang biodisel shj
        $qryprocppobio = DB::connection('mysql4')->select("SELECT round(sum(b.F104B9),2) proc104_ppo
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
                    b.F104B9 is not NULL");

        foreach ($qryprocppobio as $sum) {
            $proc104_ppobio = (float) $sum->proc104_ppo ;

        }

        //jum oleo ppo kilang oleo + oleo ppo kilang biodiesel

        $proc104_ppo = $proc104_ppo + $proc104_ppobio;


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo cpko baca kilang oleo shj
        $qryproccpko = DB::connection('mysql4')->select("SELECT round(sum(b.F104B9),0) proc104_cpko
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
                    b.F104B9 is not NULL");

        foreach ($qryproccpko as $sum) {
            $proc104_cpko = (float) $sum->proc104_cpko ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo cpko baca kilang biodiesel shj
        $qryproccpkobio = DB::connection('mysql4')->select("SELECT round(sum(b.F104B9),0) proc104_cpko
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
                    b.F104B9 is not NULL");

        foreach ($qryproccpkobio as $sum) {
            $proc104_cpkobio = (float) $sum->proc104_cpko ;
        }

        //jum oleo cpko kilang oleo + oleo cpko kilang biodiesel

        $proc104_cpko = $proc104_cpko + $proc104_cpkobio;


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo ppko baca kilang oleo shj
        $qryprocppko = DB::connection('mysql4')->select("SELECT round(sum(b.F104B9),0) proc104_ppko
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
                    b.F104B9 is not NULL");

        foreach ($qryprocppko as $sum) {
            # code...
        }
        $proc104_ppko = (float) $sum->proc104_ppko ;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        // oleo ppko baca kilang biodiesel shj
        $qryprocppkobio = DB::connection('mysql4')->select("SELECT round(sum(b.F104B9),0) proc104_ppko
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
                    b.F104B9 is not NULL");

        foreach ($qryprocppkobio as $sum) {
            $proc104_ppkobio = (float) $sum->proc104_ppko ;

        }

        //jum oleo ppko kilang oleo + oleo ppko kilang biodiesel

        $proc104_ppko = $proc104_ppko + $proc104_ppkobio;


        if ($oleocap == 0){
            $oleoutilrate = 0;

        }
        else {
            $oleoutilrate = (float) ((($proc104_cpo + $proc104_ppo + $proc104_cpko + $proc104_ppko ) / ($oleocap/12)) * 100);

        }
        // echo "data1");
        // echo "<br>");
        // echo $proc104_cpo;
        // echo "<br>");
        // echo $proc104_ppo;
        // echo "<br>");
        // echo $proc104_cpko;
        // echo "<br>");
        // echo $proc104_ppko;
        // echo "<br>");
        // echo $oleocap;
        // echo "<br>");
        // echo $oleoutilrate;


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri104cpo = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_cpo
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
                    l.F201U4 = $ngr");

        foreach ($qrynegeri104cpo as $sum) {
            $stk104_cpo = (float) $sum->stk104_cpo ;


        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri104ppo = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_ppo
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
                    l.F201U4 = $ngr");

        foreach ($qrynegeri104ppo as $sum) {
            $stk104_ppo = (float) $sum->stk104_ppo ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri104cpko = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_cpko
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
                    l.F201U4 = $ngr");

        foreach ($qrynegeri104cpko as $sum) {
            $stk104_cpko = (float) $sum->stk104_cpko ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri104ppko = DB::connection('mysql4')->select("SELECT sum(b.F104B12) stk104_ppko
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
                    l.F201U4 = $ngr");

        foreach ($qrynegeri104ppko as $sum) {
            $stk104_ppko = (float) $sum->stk104_ppko ;

        }

        // Pusat Simpanan

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri111cpo = DB::connection('mysql4')->select("SELECT sum(a.INS_KJ) stk111_cpo
                from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                where a.INS_KA = l.F201A and
                    a.INS_KC = '$tahun' and
                    a.INS_KB = '$bulan' and
                    a.INS_KJ not in (0) and
                    a.INS_KJ is not NULL and
                    a.INS_KD = '01' and
                    a.INS_KD = c.comm_code_l and
                    c.group_l = '01' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeri111cpo as $sum) {
            $stk111_cpo = (float) $sum->stk111_cpo ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri111ppo = DB::connection('mysql4')->select("SELECT sum(a.INS_KJ) stk111_ppo
                from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                where a.INS_KA = l.F201A and
                    a.INS_KC = '$tahun' and
                    a.INS_KB = '$bulan' and
                    a.INS_KJ not in (0) and
                    a.INS_KJ is not NULL and
                    a.INS_KD != '01' and
                    a.INS_KD = c.comm_code_l and
                    c.group_l = '01' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeri111ppo as $sum) {
            $stk111_ppo = (float) $sum->stk111_ppo ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri111cpko = DB::connection('mysql4')->select("SELECT sum(a.INS_KJ) stk111_cpko
                from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                where a.INS_KA = l.F201A and
                    a.INS_KC = '$tahun' and
                    a.INS_KB = '$bulan' and
                    a.INS_KJ not in (0) and
                    a.INS_KJ is not NULL and
                    a.INS_KD = '04' and
                    a.INS_KD = c.comm_code_l and
                    c.group_l = '02' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeri111cpko as $sum) {
            $stk111_cpko = (float) $sum->stk111_cpko ;

        }

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeri111ppko = DB::connection('mysql4')->select("SELECT sum(a.INS_KJ) stk111_ppko
                from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                where a.INS_KA = l.F201A and
                    a.INS_KC = '$tahun' and
                    a.INS_KB = '$bulan' and
                    a.INS_KJ not in (0) and
                    a.INS_KJ is not NULL and
                    a.INS_KD != '04' and
                    a.INS_KD = c.comm_code_l and
                    c.group_l = '02' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeri111ppko as $sum) {
            $stk111_ppko = (float) $sum->stk111_ppko ;

        }

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
        $qryrbdpo1 = DB::connection('mysql4')->select("SELECT sum(kuantiti)  ppo_hasil_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'ppo_hasil' and
                    a.kuantiti IS NOT NULL and
                    l.F201U4 = $ngr ");

        foreach ($qryrbdpo1 as $sum) {
            $ppo_hasil_rbdpo = (float) $sum->ppo_hasil_rbdpo ;

        }
        if ($ppo_hasil_rbdpo==NULL)
        $ppo_hasil_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qryrbdpo2 = DB::connection('mysql4')->select("SELECT sum(kuantiti)  stok_awl_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'stok_awal' and
                    a.kuantiti IS NOT NULL and
                    l.F201U4 = $ngr");

        // $rerbdpo2 = mysqli_query($conn_odbc,$qryrbdpo2);    echo "test2 rbdpo ",$qrynegeribio_rbdpo2;  echo "--><br>");
        // $adrbdpo2 = mysqli_fetch_assoc($rerbdpo2);
        foreach ($qryrbdpo2 as $sum) {
            $stk_awl_rbdpo = (float)$sum->stok_awl_rbdpo ;
            // echo $stok_awl_rbdpo;
        }

        if ($stk_awl_rbdpo==NULL)
        $stk_awl_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo3 = DB::connection('mysql4')->select("SELECT sum(kuantiti) bekalan_belian_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'bekalan_belian' and
                    a.kuantiti IS NOT NULL and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpo3 as $sum) {
            $bekalan_belian_rbdpo = (float) $sum->bekalan_belian_rbdpo ;

        }

        if ($bekalan_belian_rbdpo==NULL)
        $bekalan_belian_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo4 = DB::connection('mysql4')->select("SELECT sum(kuantiti) bekalan_penerimaan_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'bekalan_penerimaan' and
                    a.kuantiti IS NOT NULL and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpo4 as $sum) {
            $bekalan_penerimaan_rbdpo = (float) $sum->bekalan_penerimaan_rbdpo ;

        }

        if ($bekalan_penerimaan_rbdpo==NULL)
        $bekalan_penerimaan_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo5 = DB::connection('mysql4')->select("SELECT sum(kuantiti)  bekalan_import_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'bekalan_import' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpo5 as $sum) {
            $bekalan_import_rbdpo = (float) $sum->bekalan_import_rbdpo ;

        }

        if ($bekalan_import_rbdpo==NULL)
        $bekalan_import_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo6 = DB::connection('mysql4')->select("SELECT sum(kuantiti)  ppo_proses_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'ppo_proses' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpo6 as $sum) {
            $ppo_proses_rbdpo = (float) $sum->ppo_proses_rbdpo ;
        }

        if ($ppo_proses_rbdpo==NULL)
        $ppo_proses_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo7 = DB::connection('mysql4')->select("SELECT sum(kuantiti)  jualan_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'jualan_jualan' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpo7 as $sum) {
            $jualan_jualan_rbdpo = (float) $sum->jualan_rbdpo ;
        }

        if ($jualan_jualan_rbdpo==NULL)
        $jualan_jualan_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo8 = DB::connection('mysql4')->select("SELECT sum(kuantiti)  jualan_edaran_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'jualan_edaran' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpo8 as $sum) {
            $jualan_edaran_rbdpo = (float) $sum->jualan_edaran_rbdpo ;

        }

        if ($jualan_edaran_rbdpo==NULL)
        $jualan_edaran_rbdpo = 0;

        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpo9 = DB::connection('mysql4')->select("SELECT sum(kuantiti)  jualan_eksport_rbdpo
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk = '25' and
                    a.penyata = 'jualan_eksport' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpo9 as $sum) {
            $jualan_eksport_rbdpo = (float) $sum->jualan_eksport_rbdpo ;
        }

        if ($jualan_eksport_rbdpo==NULL)
        $jualan_eksport_rbdpo = 0;


        //--> RBDPL
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_rbdpl1 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as ppo_hasil_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'ppo_hasil' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpl1 as $sum) {
            $ppo_hasil_rbdpl = (float) $sum->ppo_hasil_rbdpl ;

        }
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl2 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as stok_awl_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'stok_awal' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpl2 as $sum) {
            $stk_awl_rbdpl = (float) $sum->stok_awl_rbdpl ;

        }
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl3 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_belian_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'bekalan_belian' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpl3 as $sum) {
            $bekalan_belian_rbdpl = (float) $sum->bekalan_belian_rbdpl ;

        }
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl4 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_penerimaan_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'bekalan_penerimaan' and
                    l.F201U4 = $ngr");

        foreach ($qrynegeribio_rbdpl4 as $sum) {
            $bekalan_penerimaan_rbdpl = (float) $sum->bekalan_penerimaan_rbdpl ;

        }
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl5 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_import_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'bekalan_import' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdpl5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl5);
        $adnegeribio_rbdpl5 = mysqli_fetch_assoc($renegeribio_rbdpl5);
        $bekalan_import_rbdpl = (float) $sum->bekalan_import_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl6 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as ppo_proses_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'ppo_proses' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdpl6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl6);
        $adnegeribio_rbdpl6 = mysqli_fetch_assoc($renegeribio_rbdpl6);
        $ppo_proses_rbdpl = (float) $sum->ppo_proses_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl7 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'jualan_jualan' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdpl7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl7);
        $adnegeribio_rbdpl7 = mysqli_fetch_assoc($renegeribio_rbdpl7);
        $jualan_jualan_rbdpl = (float) $sum->jualan_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl8 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_edaran_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'jualan_edaran' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdpl8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl8);
        $adnegeribio_rbdpl8 = mysqli_fetch_assoc($renegeribio_rbdpl8);
        $jualan_edaran_rbdpl = (float) $sum->jualan_edaran_rbdpl ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdpl9 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_eksport_rbdpl
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='29' and
                    a.penyata = 'jualan_eksport' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdpl9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpl9);
        $adnegeribio_rbdpl9 = mysqli_fetch_assoc($renegeribio_rbdpl9);
        $jualan_eksport_rbdpl = (float) $sum->jualan_eksport_rbdpl ;



        //odbc_close($conn_odbc);
        //--> RBDPS
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_rbdps1 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as ppo_hasil_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'ppo_hasil' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps1 = mysqli_query($conn_odbc,$qrynegeribio_rbdps1);
        $adnegeribio_rbdps1 = mysqli_fetch_assoc($renegeribio_rbdps1);
        $ppo_hasil_rbdps = (float) $sum->ppo_hasil_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps2 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as stok_awl_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'stok_awal' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps2 = mysqli_query($conn_odbc,$qrynegeribio_rbdps2);
        $adnegeribio_rbdps2 = mysqli_fetch_assoc($renegeribio_rbdps2);
        $stk_awl_rbdps = (float) $sum->stok_awl_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps3 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_belian_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'bekalan_belian' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps3 = mysqli_query($conn_odbc,$qrynegeribio_rbdps3);
        $adnegeribio_rbdps3 = mysqli_fetch_assoc($renegeribio_rbdps3);
        $bekalan_belian_rbdps = (float) $sum->bekalan_belian_rbdps ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps4 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_penerimaan_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'bekalan_penerimaan' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps4 = mysqli_query($conn_odbc,$qrynegeribio_rbdps4);
        $adnegeribio_rbdps4 = mysqli_fetch_assoc($renegeribio_rbdps4);
        $bekalan_penerimaan_rbdps = (float) $sum->bekalan_penerimaan_rbdps ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps5 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_import_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'bekalan_import' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps5 = mysqli_query($conn_odbc,$qrynegeribio_rbdps5);
        $adnegeribio_rbdps5 = mysqli_fetch_assoc($renegeribio_rbdps5);
        $bekalan_import_rbdps = (float) $sum->bekalan_import_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps6 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as ppo_proses_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'ppo_proses' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps6 = mysqli_query($conn_odbc,$qrynegeribio_rbdps6);
        $adnegeribio_rbdps6 = mysqli_fetch_assoc($renegeribio_rbdps6);
        $ppo_proses_rbdps = (float) $sum->ppo_proses_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps7 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'jualan_jualan' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps7 = mysqli_query($conn_odbc,$qrynegeribio_rbdps7);
        $adnegeribio_rbdps7 = mysqli_fetch_assoc($renegeribio_rbdps7);
        $jualan_jualan_rbdps = (float) $sum->jualan_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps8 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_edaran_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'jualan_edaran' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps8 = mysqli_query($conn_odbc,$qrynegeribio_rbdps8);
        $adnegeribio_rbdps8 = mysqli_fetch_assoc($renegeribio_rbdps8);
        $jualan_edaran_rbdps = (float) $sum->jualan_edaran_rbdps ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_rbdps9 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_eksport_rbdps
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='27' and
                    a.penyata = 'jualan_eksport' and
                    l.F201U4 = $ngr");

        $renegeribio_rbdps9 = mysqli_query($conn_odbc,$qrynegeribio_rbdps9);
        $adnegeribio_rbdps9 = mysqli_fetch_assoc($renegeribio_rbdps9);
        $jualan_eksport_rbdps = (float) $sum->jualan_eksport_rbdps ;




        //--> PFAD
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

        $qrynegeribio_pfad1 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as ppo_hasil_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'ppo_hasil' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad1 = mysqli_query($conn_odbc,$qrynegeribio_pfad1);
        $adnegeribio_pfad1 = mysqli_fetch_assoc($renegeribio_pfad1);
        $ppo_hasil_pfad = (float) $sum->ppo_hasil_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad2 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as stok_awl_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'stok_awal' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad2 = mysqli_query($conn_odbc,$qrynegeribio_pfad2);
        $adnegeribio_pfad2 = mysqli_fetch_assoc($renegeribio_pfad2);
        $stk_awl_pfad = (float) $sum->stok_awl_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad3 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_belian_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'bekalan_belian' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad3 = mysqli_query($conn_odbc,$qrynegeribio_pfad3);
        $adnegeribio_pfad3 = mysqli_fetch_assoc($renegeribio_pfad3);
        $bekalan_belian_pfad = (float) $sum->bekalan_belian_pfad ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad4 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_penerimaan_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'bekalan_penerimaan' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad4 = mysqli_query($conn_odbc,$qrynegeribio_pfad4);
        $adnegeribio_pfad4 = mysqli_fetch_assoc($renegeribio_pfad4);
        $bekalan_penerimaan_pfad = (float) $sum->bekalan_penerimaan_pfad ;
        //odbc_close($conn_odbc);


        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad5 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as bekalan_import_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'bekalan_import' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad5 = mysqli_query($conn_odbc,$qrynegeribio_pfad5);
        $adnegeribio_pfad5 = mysqli_fetch_assoc($renegeribio_pfad5);
        $bekalan_import_pfad = (float) $sum->bekalan_import_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad6 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as ppo_proses_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'ppo_proses' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad6 = mysqli_query($conn_odbc,$qrynegeribio_pfad6);
        $adnegeribio_pfad6 = mysqli_fetch_assoc($renegeribio_pfad6);
        $ppo_proses_pfad = (float) $sum->ppo_proses_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad7 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'jualan_jualan' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad7 = mysqli_query($conn_odbc,$qrynegeribio_pfad7);
        $adnegeribio_pfad7 = mysqli_fetch_assoc($renegeribio_pfad7);
        $jualan_jualan_pfad = (float) $adnegeribio_pfad7["jualan_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad8 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_edaran_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'jualan_edaran' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad8 = mysqli_query($conn_odbc,$qrynegeribio_pfad8);
        $adnegeribio_pfad8 = mysqli_fetch_assoc($renegeribio_pfad8);
        $jualan_edaran_pfad = (float) $adnegeribio_pfad8["jualan_edaran_pfad ;
        //odbc_close($conn_odbc);

        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
        $qrynegeribio_pfad9 = DB::connection('mysql4')->select("SELECT round(sum(kuantiti),2)  as jualan_eksport_pfad
                from penyata_biodiesel a, licensedb.license l
                where a.tahun = $tahun and
                    a.bulan = $bulan and
                    a.lesen = l.F201A and
                    a.kod_produk='35' and
                    a.penyata = 'jualan_eksport' and
                    l.F201U4 = $ngr");

        $renegeribio_pfad9 = mysqli_query($conn_odbc,$qrynegeribio_pfad9);
        $adnegeribio_pfad9 = mysqli_fetch_assoc($renegeribio_pfad9);
        $jualan_eksport_pfad = (float) $adnegeribio_pfad9["jualan_eksport_pfad ;


        //stok akhir dikira dan diambil dari e-biodiesel


        $stk_bio_rbdpo1 = ($ppo_hasil_rbdpo + $stk_awl_rbdpo + $bekalan_belian_rbdpo + $bekalan_penerimaan_rbdpo + $bekalan_import_rbdpo);
        $stk_bio_rbdpo2 =($ppo_proses_rbdpo + $jualan_jualan_rbdpo + $jualan_edaran_rbdpo + $jualan_eksport_rbdpo);
        $stk_bio_rbdpo = $stk_bio_rbdpo1 - $stk_bio_rbdpo2;
        echo  "bio check  -",$negeri;
        echo " ",$stk_bio_rbdpo1;
        echo "<br>";
        echo $stk_bio_rbdpo2;
        echo "<br>";

        $stk_bio_rbdpl1 = ($ppo_hasil_rbdpl + $stk_awl_rbdpl + $bekalan_belian_rbdpl + $bekalan_penerimaan_rbdpl + $bekalan_import_rbdpl);
        $stk_bio_rbdpl2 = ($ppo_proses_rbdpl + $jualan_jualan_rbdpl + $jualan_edaran_rbdpl + $jualan_eksport_rbdpl);
        $stk_bio_rbdpl = $stk_bio_rbdpl1- $stk_bio_rbdpl2;

        $stk_bio_rbdps1 = ($ppo_hasil_rbdps + $stk_awl_rbdps + $bekalan_belian_rbdps + $bekalan_penerimaan_rbdps + $bekalan_import_rbdps);
        $stk_bio_rbdps2 = ($ppo_proses_rbdps + $jualan_jualan_rbdps + $jualan_edaran_rbdps + $jualan_eksport_rbdps);
        $stk_bio_rbdps = $stk_bio_rbdps1 - $stk_bio_rbdps2;

        $stk_bio_pfad1 =  $ppo_hasil_pfad + $stk_awl_pfad + $bekalan_belian_pfad + $bekalan_penerimaan_pfad + $bekalan_import_pfad;
        $stk_bio_pfad2 = $ppo_proses_pfad + $jualan_jualan_pfad + $jualan_edaran_pfad + $jualan_eksport_pfad ;
        $stk_bio_pfad = $stk_bio_pfad1 - $stk_bio_pfad2;



      if ($stk_bio_rbdpo==NULL)
         $stk_bio_rbdpo = 0 ;






      //odbc_close($conn_odbc);
      //pusat simpanan - RBDPO
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk1 = "select round(sum(a.INS_KJ),2) stk111_rbdpo
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (0) and
                       a.INS_KJ is not NULL and
                       a.INS_KD = '25' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '01' and
                       l.F201U4 = $ngr";

      $renegeribulk1 = mysqli_query($conn_odbc,$qrynegeribulk1);
      $adnegeribulk1 = mysqli_fetch_assoc($renegeribulk1);
      $stk111_rbdpo = (float) $adnegeribulk1["stk111_rbdpo"];
      //odbc_close($conn_odbc);


      //pusat simpanan - RBDPL
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk2 = "select round(sum(a.INS_KJ),2) stk111_rbdpl
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (0) and
                       a.INS_KJ is not NULL and
                       a.INS_KD = '29' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '01' and
                       l.F201U4 = $ngr";

      $renegeribulk2 = mysqli_query($conn_odbc,$qrynegeribulk2);
      $adnegeribulk2 = mysqli_fetch_assoc($renegeribulk2);
      $stk111_rbdpl = (float) $adnegeribulk2["stk111_rbdpl"];
      //odbc_close($conn_odbc);

      //pusat simpanan - RBDPS
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk3 = "select round(sum(a.INS_KJ),2) stk111_rbdps
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (0) and
                       a.INS_KJ is not NULL and
                       a.INS_KD = '27' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '01' and
                       l.F201U4 = $ngr";

      $renegeribulk3 = mysqli_query($conn_odbc,$qrynegeribulk3);
      $adnegeribulk3 = mysqli_fetch_assoc($renegeribulk3);
      $stk111_rbdps = (float) $adnegeribulk3["stk111_rbdps"];
      //odbc_close($conn_odbc);

      //pusat simpanan - PFAD
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk4 = "select round(sum(a.INS_KJ),2) stk111_pfad
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (0) and
                       a.INS_KJ is not NULL and
                       a.INS_KD = '35' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '01' and
                       l.F201U4 = $ngr";

      $renegeribulk4 = mysqli_query($conn_odbc,$qrynegeribulk4);
      $adnegeribulk4 = mysqli_fetch_assoc($renegeribulk4);
      $stk111_pfad = (float) $adnegeribulk4["stk111_pfad"];



              //start-->
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpko = "select round(sum(b.F101B13),2) stk101_rbdpko
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
                       b.F101B13 is not NULL";

      $restkrbdpko = mysqli_query($conn_odbc,$qrystkrbdpko);
      $adstkrbdpko = mysqli_fetch_assoc($restkrbdpko);
      $stk101_rbdpko = (float) $adstkrbdpko["stk101_rbdpko"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpks = "select round(sum(b.F101B13),2) stk101_rbdpks
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
                       b.F101B13 is not NULL";

      $restkrbdpks = mysqli_query($conn_odbc,$qrystkrbdpks);
      $adstkrbdpks = mysqli_fetch_assoc($restkrbdpks);
      $stk101_rbdpks = (float) $adstkrbdpks["stk101_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpkl = "select round(sum(b.F101B13),2) stk101_rbdpkl
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
                       b.F101B13 is not NULL";

      $restkrbdpkl = mysqli_query($conn_odbc,$qrystkrbdpkl);
      $adstkrbdpkl = mysqli_fetch_assoc($restkrbdpkl);
      $stk101_rbdpkl = (float) $adstkrbdpkl["stk101_rbdpkl"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkpkfad = "select round(sum(b.F101B13),2) stk101_pkfad
                 from pl101ap3 a, pl101bp3 b, licensedb.license l
                 where a.F101A1 = l.F201A and
                       l.F201U4 = $ngr and
                       a.F101A1 = b.F101B1 and
                       a.F101A4 = b.F101B2 and
                       a.F101A6 = '$tahun' and
                       a.F101A5 = '$bulan' and
                       b.F101B3 = '2' and
                       b.F101B4 = '56' and
                       b.F101B13 not in (0) and
                       b.F101B13 is not NULL";

      $restkpkfad = mysqli_query($conn_odbc,$qrystkpkfad);
      $adstkpkfad = mysqli_fetch_assoc($restkpkfad);
      $stk101_pkfad = (float) $adstkpkfad["stk101_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");




//biodiesel


     //--> RBDPKO
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

     $qrynegeribio_rbdpko1 = "select round(sum(kuantiti),2)  as ppo_hasil_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'ppo_hasil' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko1 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko1);
      $adnegeribio_rbdpko1 = mysqli_fetch_assoc($renegeribio_rbdpko1);
      $ppo_hasil_rbdpko = (float) $adnegeribio_rbdpko1["ppo_hasil_rbdpko"];

      if ($ppo_hasil_rbdpko==NULL)
        $ppo_hasil_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko2 = "select round(sum(kuantiti),2)  as stok_awl_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'stok_awal' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko2 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko2);
      $adnegeribio_rbdpko2 = mysqli_fetch_assoc($renegeribio_rbdpko2);
      $stk_awl_rbdpko = (float) $adnegeribio_rbdpko2["stok_awl_rbdpko"];

      if ($stk_awl_rbdpko==NULL)
        $stk_awl_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko3 = "select round(sum(kuantiti),2)  as bekalan_belian_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'bekalan_belian' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko3 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko3);
      $adnegeribio_rbdpko3 = mysqli_fetch_assoc($renegeribio_rbdpko3);
      $bekalan_belian_rbdpko = (float) $adnegeribio_rbdpko3["bekalan_belian_rbdpko"];

      if ($bekalan_belian_rbdpko==NULL)
        $bekalan_belian_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'bekalan_penerimaan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko4 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko4);
      $adnegeribio_rbdpko4 = mysqli_fetch_assoc($renegeribio_rbdpko4);
      $bekalan_penerimaan_rbdpko = (float) $adnegeribio_rbdpko4["bekalan_penerimaan_rbdpko"];

      if ($bekalan_penerimaan_rbdpko==NULL)
        $bekalan_penerimaan_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko5 = "select round(sum(kuantiti),2)  as bekalan_import_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'bekalan_import' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko5);
      $adnegeribio_rbdpko5 = mysqli_fetch_assoc($renegeribio_rbdpko5);
      $bekalan_import_rbdpko = (float) $adnegeribio_rbdpko5["bekalan_import_rbdpko"];

       if ($bekalan_import_rbdpko==NULL)
        $bekalan_import_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko6 = "select round(sum(kuantiti),2)  as ppo_proses_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'ppo_proses' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko6);
      $adnegeribio_rbdpko6 = mysqli_fetch_assoc($renegeribio_rbdpko6);
      $ppo_proses_rbdpko = (float) $adnegeribio_rbdpko6["ppo_proses_rbdpko"];

       if ($ppo_proses_rbdpko ==NULL)
        $ppo_proses_rbdpko  = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko7 = "select round(sum(kuantiti),2)  as jualan_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'jualan_jualan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko7);
      $adnegeribio_rbdpko7 = mysqli_fetch_assoc($renegeribio_rbdpko7);
      $jualan_jualan_rbdpko = (float) $adnegeribio_rbdpko7["jualan_rbdpko"];

       if ($jualan_jualan_rbdpko==NULL)
        $jualan_jualan_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko8 = "select round(sum(kuantiti),2)  as jualan_edaran_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'jualan_edaran' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko8);
      $adnegeribio_rbdpko8 = mysqli_fetch_assoc($renegeribio_rbdpko8);
      $jualan_edaran_rbdpko = (float) $adnegeribio_rbdpko8["jualan_edaran_rbdpko"];

       if ($jualan_edaran_rbdpko==NULL)
        $jualan_edaran_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko9 = "select round(sum(kuantiti),2)  as jualan_eksport_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'jualan_eksport' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko9);
      $adnegeribio_rbdpko9 = mysqli_fetch_assoc($renegeribio_rbdpko9);
      $jualan_eksport_rbdpko = (float) $adnegeribio_rbdpko9["jualan_eksport_rbdpko"];

       if ($jualan_eksport_rbdpko==NULL)
        $jualan_eksport_rbdpko = 0;


      //--> RBDPKL
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

     $qrynegeribio_rbdpkl1 = "select round(sum(kuantiti),2)  as ppo_hasil_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'ppo_hasil' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl1 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl1);
      $adnegeribio_rbdpkl1 = mysqli_fetch_assoc($renegeribio_rbdpkl1);
      $ppo_hasil_rbdpkl = (float) $adnegeribio_rbdpkl1["ppo_hasil_rbdpkl"];

      if ($ppo_hasil_rbdpkl==NULL)
        $ppo_hasil_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl2 = "select round(sum(kuantiti),2)  as stok_awl_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'stok_awal' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl2 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl2);
      $adnegeribio_rbdpkl2 = mysqli_fetch_assoc($renegeribio_rbdpkl2);
      $stk_awl_rbdpkl = (float) $adnegeribio_rbdpkl2["stok_awl_rbdpkl"];

      if ($stk_awl_rbdpkl==NULL)
        $stk_awl_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl3 = "select round(sum(kuantiti),2)  as bekalan_belian_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'bekalan_belian' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl3 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl3);
      $adnegeribio_rbdpkl3 = mysqli_fetch_assoc($renegeribio_rbdpkl3);
      $bekalan_belian_rbdpkl = (float) $adnegeribio_rbdpkl3["bekalan_belian_rbdpkl"];

      if ($bekalan_belian_rbdpkl==NULL)
        $bekalan_belian_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'bekalan_penerimaan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl4 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl4);
      $adnegeribio_rbdpkl4 = mysqli_fetch_assoc($renegeribio_rbdpkl4);
      $bekalan_penerimaan_rbdpkl = (float) $adnegeribio_rbdpkl4["bekalan_penerimaan_rbdpkl"];

      if ($bekalan_penerimaan_rbdpkl==NULL)
        $bekalan_penerimaan_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl5 = "select round(sum(kuantiti),2)  as bekalan_import_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'bekalan_import' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl5);
      $adnegeribio_rbdpkl5 = mysqli_fetch_assoc($renegeribio_rbdpkl5);
      $bekalan_import_rbdpkl = (float) $adnegeribio_rbdpkl5["bekalan_import_rbdpkl"];

       if ($bekalan_import_rbdpkl==NULL)
        $bekalan_import_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl6 = "select round(sum(kuantiti),2)  as ppo_proses_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'ppo_proses' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl6);
      $adnegeribio_rbdpkl6 = mysqli_fetch_assoc($renegeribio_rbdpkl6);
      $ppo_proses_rbdpkl = (float) $adnegeribio_rbdpkl6["ppo_proses_rbdpkl"];

       if ($ppo_proses_rbdpkl ==NULL)
        $ppo_proses_rbdpkl  = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl7 = "select round(sum(kuantiti),2)  as jualan_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'jualan_jualan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl7);
      $adnegeribio_rbdpkl7 = mysqli_fetch_assoc($renegeribio_rbdpkl7);
      $jualan_jualan_rbdpkl = (float) $adnegeribio_rbdpkl7["jualan_rbdpkl"];

       if ($jualan_jualan_rbdpkl==NULL)
        $jualan_jualan_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl8 = "select round(sum(kuantiti),2)  as jualan_edaran_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'jualan_edaran' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl8);
      $adnegeribio_rbdpkl8 = mysqli_fetch_assoc($renegeribio_rbdpkl8);
      $jualan_edaran_rbdpkl = (float) $adnegeribio_rbdpkl8["jualan_edaran_rbdpkl"];

       if ($jualan_edaran_rbdpkl==NULL)
        $jualan_edaran_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl9 = "select round(sum(kuantiti),2)  as jualan_eksport_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKL' and
                       a.penyata = 'jualan_eksport' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl9);
      $adnegeribio_rbdpkl9 = mysqli_fetch_assoc($renegeribio_rbdpkl9);
      $jualan_eksport_rbdpkl = (float) $adnegeribio_rbdpkl9["jualan_eksport_rbdpkl"];

       if ($jualan_eksport_rbdpkl==NULL)
        $jualan_eksport_rbdpkl = 0;

      //--> RBDPKS
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks1 = "select round(sum(kuantiti),2)  as ppo_hasil_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'ppo_hasil' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks1 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks1);
      $adnegeribio_rbdpks1 = mysqli_fetch_assoc($renegeribio_rbdpks1);
      $ppo_hasil_rbdpks = (float) $adnegeribio_rbdpks1["ppo_hasil_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks2 = "select round(sum(kuantiti),2)  as stok_awl_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'stok_awal' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks2 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks2);
      $adnegeribio_rbdpks2 = mysqli_fetch_assoc($renegeribio_rbdpks2);
      $stk_awl_rbdpks = (float) $adnegeribio_rbdpks2["stok_awl_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks3 = "select round(sum(kuantiti),2)  as bekalan_belian_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'bekalan_belian' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks3 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks3);
      $adnegeribio_rbdpks3 = mysqli_fetch_assoc($renegeribio_rbdpks3);
      $bekalan_belian_rbdpks = (float) $adnegeribio_rbdpks3["bekalan_belian_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'bekalan_penerimaan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks4 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks4);
      $adnegeribio_rbdpks4 = mysqli_fetch_assoc($renegeribio_rbdpks4);
      $bekalan_penerimaan_rbdpks = (float) $adnegeribio_rbdpks4["bekalan_penerimaan_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks5 = "select round(sum(kuantiti),2)  as bekalan_import_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'bekalan_import' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks5);
      $adnegeribio_rbdpks5 = mysqli_fetch_assoc($renegeribio_rbdpks5);
      $bekalan_import_rbdpks = (float) $adnegeribio_rbdpks5["bekalan_import_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks6 = "select round(sum(kuantiti),2)  as ppo_proses_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'ppo_proses' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks6);
      $adnegeribio_rbdpks6 = mysqli_fetch_assoc($renegeribio_rbdpks6);
      $ppo_proses_rbdpks = (float) $adnegeribio_rbdpks6["ppo_proses_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks7 = "select round(sum(kuantiti),2)  as jualan_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'jualan_jualan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks7);
      $adnegeribio_rbdpks7 = mysqli_fetch_assoc($renegeribio_rbdpks7);
      $jualan_jualan_rbdpks = (float) $adnegeribio_rbdpks7["jualan_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks8 = "select round(sum(kuantiti),2)  as jualan_edaran_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'jualan_edaran' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks8);
      $adnegeribio_rbdpks8 = mysqli_fetch_assoc($renegeribio_rbdpks8);
      $jualan_edaran_rbdpks = (float) $adnegeribio_rbdpks8["jualan_edaran_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks9 = "select round(sum(kuantiti),2)  as jualan_eksport_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='RBDPKS' and
                       a.penyata = 'jualan_eksport' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks9);
      $adnegeribio_rbdpks9 = mysqli_fetch_assoc($renegeribio_rbdpks9);
      $jualan_eksport_rbdpks = (float) $adnegeribio_rbdpks9["jualan_eksport_rbdpks"];




      //--> PKFAD
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad1 = "select round(sum(kuantiti),2)  as ppo_hasil_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'ppo_hasil' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad1 = mysqli_query($conn_odbc,$qrynegeribio_pkfad1);
      $adnegeribio_pkfad1 = mysqli_fetch_assoc($renegeribio_pkfad1);
      $ppo_hasil_pkfad = (float) $adnegeribio_pkfad1["ppo_hasil_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad2 = "select round(sum(kuantiti),2)  as stok_awl_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'stok_awal' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad2 = mysqli_query($conn_odbc,$qrynegeribio_pkfad2);
      $adnegeribio_pkfad2 = mysqli_fetch_assoc($renegeribio_pkfad2);
      $stk_awl_pkfad = (float) $adnegeribio_pkfad2["stok_awl_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad3 = "select round(sum(kuantiti),2)  as bekalan_belian_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'bekalan_belian' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad3 = mysqli_query($conn_odbc,$qrynegeribio_pkfad3);
      $adnegeribio_pkfad3 = mysqli_fetch_assoc($renegeribio_pkfad3);
      $bekalan_belian_pkfad = (float) $adnegeribio_pkfad3["bekalan_belian_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'bekalan_penerimaan' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad4 = mysqli_query($conn_odbc,$qrynegeribio_pkfad4);
      $adnegeribio_pkfad4 = mysqli_fetch_assoc($renegeribio_pkfad4);
      $bekalan_penerimaan_pkfad = (float) $adnegeribio_pkfad4["bekalan_penerimaan_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad5 = "select round(sum(kuantiti),2)  as bekalan_import_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'bekalan_import' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad5 = mysqli_query($conn_odbc,$qrynegeribio_pkfad5);
      $adnegeribio_pkfad5 = mysqli_fetch_assoc($renegeribio_pkfad5);
      $bekalan_import_pkfad = (float) $adnegeribio_pfad5["bekalan_import_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad6 = "select round(sum(kuantiti),2)  as ppo_proses_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'ppo_proses' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad6 = mysqli_query($conn_odbc,$qrynegeribio_pkfad6);
      $adnegeribio_pkfad6 = mysqli_fetch_assoc($renegeribio_pkfad6);
      $ppo_proses_pkfad = (float) $adnegeribio_pkfad6["ppo_proses_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad7 = "select round(sum(kuantiti),2)  as jualan_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'jualan_jualan' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad7 = mysqli_query($conn_odbc,$qrynegeribio_pkfad7);
      $adnegeribio_pkfad7 = mysqli_fetch_assoc($renegeribio_pkfad7);
      $jualan_jualan_pkfad = (float) $adnegeribio_pkfad7["jualan_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad8 = "select round(sum(kuantiti),2)  as jualan_edaran_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'jualan_edaran' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad8 = mysqli_query($conn_odbc,$qrynegeribio_pkfad8);
      $adnegeribio_pkfad8 = mysqli_fetch_assoc($renegeribio_pkfad8);
      $jualan_edaran_pkfad = (float) $adnegeribio_pkfad8["jualan_edaran_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad9 = "select round(sum(kuantiti),2)  as jualan_eksport_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='PKFAD' and
                       a.penyata = 'jualan_eksport' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad9 = mysqli_query($conn_odbc,$qrynegeribio_pkfad9);
      $adnegeribio_pkfad9 = mysqli_fetch_assoc($renegeribio_pkfad9);
      $jualan_eksport_pkfad = (float) $adnegeribio_pkfad9["jualan_eksport_pkfad"];


      //stok akhir dikira dan diambil dari e-biodiesel


        $stk_bio_rbdpko1 = ($ppo_hasil_rbdpko + $stk_awl_rbdpko + $bekalan_belian_rbdpko + $bekalan_penerimaan_rbdpko + $bekalan_import_rbdpko);
        $stk_bio_rbdpko2 =($ppo_proses_rbdpko + $jualan_jualan_rbdpko + $jualan_edaran_rbdpko + $jualan_eksport_rbdpko);
        $stk_bio_rbdpko = $stk_bio_rbdpko1 - $stk_bio_rbdpko2;

        $stk_bio_rbdpkl1 = ($ppo_hasil_rbdpkl + $stk_awl_rbdpkl + $bekalan_belian_rbdpkl + $bekalan_penerimaan_rbdpkl + $bekalan_import_rbdpkl);
        $stk_bio_rbdpkl2 =($ppo_proses_rbdpkl + $jualan_jualan_rbdpkl + $jualan_edaran_rbdpkl + $jualan_eksport_rbdpkl);
        $stk_bio_rbdpkl = $stk_bio_rbdpkl1 - $stk_bio_rbdpkl2;

        $stk_bio_rbdpks1 = ($ppo_hasil_rbdpks + $stk_awl_rbdpks + $bekalan_belian_rbdpks + $bekalan_penerimaan_rbdpks + $bekalan_import_rbdpks);
        $stk_bio_rbdpks2 = ($ppo_proses_rbdpks + $jualan_jualan_rbdpks + $jualan_edaran_rbdpks + $jualan_eksport_rbdpks);
        $stk_bio_rbdpks = $stk_bio_rbdpks1 - $stk_bio_rbdpks2;

        $stk_bio_pkfad1 =  $ppo_hasil_pkfad + $stk_awl_pkfad + $bekalan_belian_pkfad + $bekalan_penerimaan_pkfad + $bekalan_import_pkfad;
        $stk_bio_pkfad2 = $ppo_proses_pkfad + $jualan_jualan_pkfad + $jualan_edaran_pkfad + $jualan_eksport_pkfad ;
        $stk_bio_pkfad = $stk_bio_pkfad1 - $stk_bio_pkfad2;
      //end

      //pusat simpanan - RBDPKO
       //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk1 = "select round(sum(a.INS_KJ),2) stk111_rbdpko
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (0) and
                       a.INS_KJ is not NULL and
                       a.INS_KD = '30' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '02' and
                       l.F201U4 = $ngr";

      $renegeribulk1 = mysqli_query($conn_odbc,$qrynegeribulk1);
      $adnegeribulk1 = mysqli_fetch_assoc($renegeribulk1);
      $stk111_rbdpko = (float) $adnegeribulk1["stk111_rbdpko"];
      //odbc_close($conn_odbc);


      //pusat simpanan - RBDPKL
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk2 = "select round(sum(a.INS_KJ),2) stk111_rbdpkl
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (0) and
                       a.INS_KJ is not NULL and
                       a.INS_KD = '32' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '02' and
                       l.F201U4 = $ngr";

      $renegeribulk2 = mysqli_query($conn_odbc,$qrynegeribulk2);
      $adnegeribulk2 = mysqli_fetch_assoc($renegeribulk2);
      $stk111_rbdpkl = (float) $adnegeribulk2["stk111_rbdpkl"];
      //odbc_close($conn_odbc);

      //pusat simpanan - RBDPKS
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk3 = "select round(sum(a.INS_KJ),2) stk111_rbdpks
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (0) and
                       a.INS_KJ is not NULL and
                       a.INS_KD = '31' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '02' and
                       l.F201U4 = $ngr";

      $renegeribulk3 = mysqli_query($conn_odbc,$qrynegeribulk3);
      $adnegeribulk3 = mysqli_fetch_assoc($renegeribulk3);
      $stk111_rbdpks = (float) $adnegeribulk3["stk111_rbdpks"];
      //odbc_close($conn_odbc);

      //pusat simpanan - PKFAD
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk4 = "select round(sum(a.INS_KJ),2) stk111_pkfad
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (0) and
                       a.INS_KJ is not NULL and
                       a.INS_KD = '56' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '02' and
                       l.F201U4 = $ngr";

      $renegeribulk4 = mysqli_query($conn_odbc,$qrynegeribulk4);
      $adnegeribulk4 = mysqli_fetch_assoc($renegeribulk4);
      $stk111_pkfad = (float) $adnegeribulk4["stk111_pkfad"];

      //RBDPKO
        //odbc_close($conn_odbc);
        //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpko = "select round(sum(b.F101B13),2) stk101_rbdpko
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
                       b.F101B13 is not NULL";

      $restkrbdpko = mysqli_query($conn_odbc,$qrystkrbdpko);
      $adstkrbdpko = mysqli_fetch_assoc($restkrbdpko);
      $stk101_rbdpko = (float) $adstkrbdpko["stk101_rbdpko"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpks = "select round(sum(b.F101B13),2) stk101_rbdpks
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
                       b.F101B13 is not NULL";

      $restkrbdpks = mysqli_query($conn_odbc,$qrystkrbdpks);
      $adstkrbdpks = mysqli_fetch_assoc($restkrbdpks);
      $stk101_rbdpks = (float) $adstkrbdpks["stk101_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpkl = "select round(sum(b.F101B13),2) stk101_rbdpkl
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
                       b.F101B13 is not NULL";

      $restkrbdpkl = mysqli_query($conn_odbc,$qrystkrbdpkl);
      $adstkrbdpkl = mysqli_fetch_assoc($restkrbdpkl);
      $stk101_rbdpkl = (float) $adstkrbdpkl["stk101_rbdpkl"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkpkfad = "select round(sum(b.F101B13),2) stk101_pkfad
                 from pl101ap3 a, pl101bp3 b, licensedb.license l
                 where a.F101A1 = l.F201A and
                       l.F201U4 = $ngr and
                       a.F101A1 = b.F101B1 and
                       a.F101A4 = b.F101B2 and
                       a.F101A6 = '$tahun' and
                       a.F101A5 = '$bulan' and
                       b.F101B3 = '2' and
                       b.F101B4 = '56' and
                       b.F101B13 not in (0) and
                       b.F101B13 is not NULL";

      $restkpkfad = mysqli_query($conn_odbc,$qrystkpkfad);
      $adstkpkfad = mysqli_fetch_assoc($restkpkfad);
      $stk101_pkfad = (float) $adstkpkfad["stk101_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpko = "select round(sum(b.F104B12),2) stk104_rbdpko
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 = $ngr and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 = '30' and
                       b.F104B12 not in (0) and
                       b.F104B12 is not NULL";

      $restkrbdpko = mysqli_query($conn_odbc,$qrystkrbdpko);
      $adstkrbdpko = mysqli_fetch_assoc($restkrbdpko);
      $stk104_rbdpko = (float) $adstkrbdpko["stk104_rbdpko"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpks = "select round(sum(b.F104B12),2) stk104_rbdpks
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 = $ngr and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 = '31' and
                       b.F104B12 not in (0) and
                       b.F104B12 is not NULL";

      $restkrbdpks = mysqli_query($conn_odbc,$qrystkrbdpks);
      $adstkrbdpks = mysqli_fetch_assoc($restkrbdpks);
      $stk104_rbdpks = (float) $adstkrbdpks["stk104_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkrbdpkl = "select round(sum(b.F104B12),2) stk104_rbdpkl
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 = $ngr and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 = '32' and
                       b.F104B12 not in (0) and
                       b.F104B12 is not NULL";

      $restkrbdpkl = mysqli_query($conn_odbc,$qrystkrbdpkl);
      $adstkrbdpkl = mysqli_fetch_assoc($restkrbdpkl);
      $stk104_rbdpkl = (float) $adstkrbdpkl["stk104_rbdpkl"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrystkpkfad = "select round(sum(b.F104B12),2) stk104_pkfad
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 = $ngr and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 = '56' and
                       b.F104B12 not in (0) and
                       b.F104B12 is not NULL";

      $restkpkfad = mysqli_query($conn_odbc,$qrystkpkfad);
      $adstkpkfad = mysqli_fetch_assoc($restkpkfad);
      $stk104_pkfad = (float) $adstkpkfad["stk104_pkfad"];


//biodiesel


     //--> RBDPKO
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

     $qrynegeribio_rbdpko1 = "select round(sum(kuantiti),2)  as ppo_hasil_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'ppo_hasil' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko1 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko1);
      $adnegeribio_rbdpko1 = mysqli_fetch_assoc($renegeribio_rbdpko1);
      $ppo_hasil_rbdpko = (float) $adnegeribio_rbdpko1["ppo_hasil_rbdpko"];

      if ($ppo_hasil_rbdpko==NULL)
        $ppo_hasil_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko2 = "select round(sum(kuantiti),2)  as stok_awl_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'stok_awal' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko2 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko2);
      $adnegeribio_rbdpko2 = mysqli_fetch_assoc($renegeribio_rbdpko2);
      $stk_awl_rbdpko = (float) $adnegeribio_rbdpko2["stok_awl_rbdpko"];

      if ($stk_awl_rbdpko==NULL)
        $stk_awl_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko3 = "select round(sum(kuantiti),2)  as bekalan_belian_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'bekalan_belian' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko3 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko3); echo $qrynegeribio_rbdpko3; echo "<br>";
      $adnegeribio_rbdpko3 = mysqli_fetch_assoc($renegeribio_rbdpko3);
      $bekalan_belian_rbdpko = (float) $adnegeribio_rbdpko3["bekalan_belian_rbdpko"];

      if ($bekalan_belian_rbdpko==NULL)
        $bekalan_belian_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'bekalan_penerimaan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko4 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko4);
      $adnegeribio_rbdpko4 = mysqli_fetch_assoc($renegeribio_rbdpko4);
      $bekalan_penerimaan_rbdpko = (float) $adnegeribio_rbdpko4["bekalan_penerimaan_rbdpko"];

      if ($bekalan_penerimaan_rbdpko==NULL)
        $bekalan_penerimaan_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko5 = "select round(sum(kuantiti),2)  as bekalan_import_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'bekalan_import' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko5);
      $adnegeribio_rbdpko5 = mysqli_fetch_assoc($renegeribio_rbdpko5);
      $bekalan_import_rbdpko = (float) $adnegeribio_rbdpko5["bekalan_import_rbdpko"];

       if ($bekalan_import_rbdpko==NULL)
        $bekalan_import_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko6 = "select round(sum(kuantiti),2)  as ppo_proses_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'ppo_proses' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko6);  echo $qrynegeribio_rbdpko6; echo "<br>";
      $adnegeribio_rbdpko6 = mysqli_fetch_assoc($renegeribio_rbdpko6);
      $ppo_proses_rbdpko = (float) $adnegeribio_rbdpko6["ppo_proses_rbdpko"];

       if ($ppo_proses_rbdpko ==NULL)
        $ppo_proses_rbdpko  = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko7 = "select round(sum(kuantiti),2)  as jualan_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'jualan_jualan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko7);
      $adnegeribio_rbdpko7 = mysqli_fetch_assoc($renegeribio_rbdpko7);
      $jualan_jualan_rbdpko = (float) $adnegeribio_rbdpko7["jualan_rbdpko"];

       if ($jualan_jualan_rbdpko==NULL)
        $jualan_jualan_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko8 = "select round(sum(kuantiti),2)  as jualan_edaran_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'jualan_edaran' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko8);
      $adnegeribio_rbdpko8 = mysqli_fetch_assoc($renegeribio_rbdpko8);
      $jualan_edaran_rbdpko = (float) $adnegeribio_rbdpko8["jualan_edaran_rbdpko"];

       if ($jualan_edaran_rbdpko==NULL)
        $jualan_edaran_rbdpko = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpko9 = "select round(sum(kuantiti),2)  as jualan_eksport_rbdpko
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='30' and
                       a.penyata = 'jualan_eksport' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpko9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpko9);
      $adnegeribio_rbdpko9 = mysqli_fetch_assoc($renegeribio_rbdpko9);
      $jualan_eksport_rbdpko = (float) $adnegeribio_rbdpko9["jualan_eksport_rbdpko"];

       if ($jualan_eksport_rbdpko==NULL)
        $jualan_eksport_rbdpko = 0;


      //--> RBDPKL
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

     $qrynegeribio_rbdpkl1 = "select round(sum(kuantiti),2)  as ppo_hasil_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'ppo_hasil' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl1 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl1);
      $adnegeribio_rbdpkl1 = mysqli_fetch_assoc($renegeribio_rbdpkl1);
      $ppo_hasil_rbdpkl = (float) $adnegeribio_rbdpkl1["ppo_hasil_rbdpkl"];

      if ($ppo_hasil_rbdpkl==NULL)
        $ppo_hasil_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl2 = "select round(sum(kuantiti),2)  as stok_awl_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'stok_awal' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl2 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl2);
      $adnegeribio_rbdpkl2 = mysqli_fetch_assoc($renegeribio_rbdpkl2);
      $stk_awl_rbdpkl = (float) $adnegeribio_rbdpkl2["stok_awl_rbdpkl"];

      if ($stk_awl_rbdpkl==NULL)
        $stk_awl_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl3 = "select round(sum(kuantiti),2)  as bekalan_belian_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'bekalan_belian' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl3 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl3); echo $qrynegeribio_rbdpkl3; echo "<br>";
      $adnegeribio_rbdpkl3 = mysqli_fetch_assoc($renegeribio_rbdpkl3);
      $bekalan_belian_rbdpkl = (float) $adnegeribio_rbdpkl3["bekalan_belian_rbdpkl"];

      if ($bekalan_belian_rbdpkl==NULL)
        $bekalan_belian_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'bekalan_penerimaan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl4 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl4);
      $adnegeribio_rbdpkl4 = mysqli_fetch_assoc($renegeribio_rbdpkl4);
      $bekalan_penerimaan_rbdpkl = (float) $adnegeribio_rbdpkl4["bekalan_penerimaan_rbdpkl"];

      if ($bekalan_penerimaan_rbdpkl==NULL)
        $bekalan_penerimaan_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl5 = "select round(sum(kuantiti),2)  as bekalan_import_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'bekalan_import' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl5);
      $adnegeribio_rbdpkl5 = mysqli_fetch_assoc($renegeribio_rbdpkl5);
      $bekalan_import_rbdpkl = (float) $adnegeribio_rbdpkl5["bekalan_import_rbdpkl"];

       if ($bekalan_import_rbdpkl==NULL)
        $bekalan_import_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl6 = "select round(sum(kuantiti),2)  as ppo_proses_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'ppo_proses' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl6);
      $adnegeribio_rbdpkl6 = mysqli_fetch_assoc($renegeribio_rbdpkl6);
      $ppo_proses_rbdpkl = (float) $adnegeribio_rbdpkl6["ppo_proses_rbdpkl"];

       if ($ppo_proses_rbdpkl ==NULL)
        $ppo_proses_rbdpkl  = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl7 = "select round(sum(kuantiti),2)  as jualan_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'jualan_jualan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl7);
      $adnegeribio_rbdpkl7 = mysqli_fetch_assoc($renegeribio_rbdpkl7);
      $jualan_jualan_rbdpkl = (float) $adnegeribio_rbdpkl7["jualan_rbdpkl"];

       if ($jualan_jualan_rbdpkl==NULL)
        $jualan_jualan_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl8 = "select round(sum(kuantiti),2)  as jualan_edaran_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'jualan_edaran' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl8);
      $adnegeribio_rbdpkl8 = mysqli_fetch_assoc($renegeribio_rbdpkl8);
      $jualan_edaran_rbdpkl = (float) $adnegeribio_rbdpkl8["jualan_edaran_rbdpkl"];

       if ($jualan_edaran_rbdpkl==NULL)
        $jualan_edaran_rbdpkl = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpkl9 = "select round(sum(kuantiti),2)  as jualan_eksport_rbdpkl
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='32' and
                       a.penyata = 'jualan_eksport' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpkl9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpkl9);
      $adnegeribio_rbdpkl9 = mysqli_fetch_assoc($renegeribio_rbdpkl9);
      $jualan_eksport_rbdpkl = (float) $adnegeribio_rbdpkl9["jualan_eksport_rbdpkl"];

       if ($jualan_eksport_rbdpkl==NULL)
        $jualan_eksport_rbdpkl = 0;

      //--> RBDPKS
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks1 = "select round(sum(kuantiti),2)  as ppo_hasil_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'ppo_hasil' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks1 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks1);
      $adnegeribio_rbdpks1 = mysqli_fetch_assoc($renegeribio_rbdpks1);
      $ppo_hasil_rbdpks = (float) $adnegeribio_rbdpks1["ppo_hasil_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks2 = "select round(sum(kuantiti),2)  as stok_awl_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'stok_awal' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks2 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks2);
      $adnegeribio_rbdpks2 = mysqli_fetch_assoc($renegeribio_rbdpks2);
      $stk_awl_rbdpks = (float) $adnegeribio_rbdpks2["stok_awl_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks3 = "select round(sum(kuantiti),2)  as bekalan_belian_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'bekalan_belian' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks3 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks3);
      $adnegeribio_rbdpks3 = mysqli_fetch_assoc($renegeribio_rbdpks3);
      $bekalan_belian_rbdpks = (float) $adnegeribio_rbdpks3["bekalan_belian_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'bekalan_penerimaan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks4 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks4);
      $adnegeribio_rbdpks4 = mysqli_fetch_assoc($renegeribio_rbdpks4);
      $bekalan_penerimaan_rbdpks = (float) $adnegeribio_rbdpks4["bekalan_penerimaan_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks5 = "select round(sum(kuantiti),2)  as bekalan_import_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'bekalan_import' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks5 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks5);
      $adnegeribio_rbdpks5 = mysqli_fetch_assoc($renegeribio_rbdpks5);
      $bekalan_import_rbdpks = (float) $adnegeribio_rbdpks5["bekalan_import_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks6 = "select round(sum(kuantiti),2)  as ppo_proses_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'ppo_proses' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks6 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks6);
      $adnegeribio_rbdpks6 = mysqli_fetch_assoc($renegeribio_rbdpks6);
      $ppo_proses_rbdpks = (float) $adnegeribio_rbdpks6["ppo_proses_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks7 = "select round(sum(kuantiti),2)  as jualan_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'jualan_jualan' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks7 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks7);
      $adnegeribio_rbdpks7 = mysqli_fetch_assoc($renegeribio_rbdpks7);
      $jualan_jualan_rbdpks = (float) $adnegeribio_rbdpks7["jualan_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks8 = "select round(sum(kuantiti),2)  as jualan_edaran_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'jualan_edaran' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks8 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks8);
      $adnegeribio_rbdpks8 = mysqli_fetch_assoc($renegeribio_rbdpks8);
      $jualan_edaran_rbdpks = (float) $adnegeribio_rbdpks8["jualan_edaran_rbdpks"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_rbdpks9 = "select round(sum(kuantiti),2)  as jualan_eksport_rbdpks
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='31' and
                       a.penyata = 'jualan_eksport' and
                       l.F201U4 = $ngr";

      $renegeribio_rbdpks9 = mysqli_query($conn_odbc,$qrynegeribio_rbdpks9);
      $adnegeribio_rbdpks9 = mysqli_fetch_assoc($renegeribio_rbdpks9);
      $jualan_eksport_rbdpks = (float) $adnegeribio_rbdpks9["jualan_eksport_rbdpks"];




      //--> PKFAD
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad1 = "select round(sum(kuantiti),2)  as ppo_hasil_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'ppo_hasil' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad1 = mysqli_query($conn_odbc,$qrynegeribio_pkfad1);
      $adnegeribio_pkfad1 = mysqli_fetch_assoc($renegeribio_pkfad1);
      $ppo_hasil_pkfad = (float) $adnegeribio_pkfad1["ppo_hasil_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad2 = "select round(sum(kuantiti),2)  as stok_awl_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'stok_awal' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad2 = mysqli_query($conn_odbc,$qrynegeribio_pkfad2);
      $adnegeribio_pkfad2 = mysqli_fetch_assoc($renegeribio_pkfad2);
      $stk_awl_pkfad = (float) $adnegeribio_pkfad2["stok_awl_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad3 = "select round(sum(kuantiti),2)  as bekalan_belian_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'bekalan_belian' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad3 = mysqli_query($conn_odbc,$qrynegeribio_pkfad3);
      $adnegeribio_pkfad3 = mysqli_fetch_assoc($renegeribio_pkfad3);
      $bekalan_belian_pkfad = (float) $adnegeribio_pkfad3["bekalan_belian_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad4 = "select round(sum(kuantiti),2)  as bekalan_penerimaan_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'bekalan_penerimaan' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad4 = mysqli_query($conn_odbc,$qrynegeribio_pkfad4);
      $adnegeribio_pkfad4 = mysqli_fetch_assoc($renegeribio_pkfad4);
      $bekalan_penerimaan_pkfad = (float) $adnegeribio_pkfad4["bekalan_penerimaan_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad5 = "select round(sum(kuantiti),2)  as bekalan_import_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'bekalan_import' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad5 = mysqli_query($conn_odbc,$qrynegeribio_pkfad5);
      $adnegeribio_pkfad5 = mysqli_fetch_assoc($renegeribio_pkfad5);
      $bekalan_import_pkfad = (float) $adnegeribio_pfad5["bekalan_import_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad6 = "select round(sum(kuantiti),2)  as ppo_proses_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'ppo_proses' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad6 = mysqli_query($conn_odbc,$qrynegeribio_pkfad6);
      $adnegeribio_pkfad6 = mysqli_fetch_assoc($renegeribio_pkfad6);
      $ppo_proses_pkfad = (float) $adnegeribio_pkfad6["ppo_proses_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad7 = "select round(sum(kuantiti),2)  as jualan_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'jualan_jualan' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad7 = mysqli_query($conn_odbc,$qrynegeribio_pkfad7);
      $adnegeribio_pkfad7 = mysqli_fetch_assoc($renegeribio_pkfad7);
      $jualan_jualan_pkfad = (float) $adnegeribio_pkfad7["jualan_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad8 = "select round(sum(kuantiti),2)  as jualan_edaran_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'jualan_edaran' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad8 = mysqli_query($conn_odbc,$qrynegeribio_pkfad8);
      $adnegeribio_pkfad8 = mysqli_fetch_assoc($renegeribio_pkfad8);
      $jualan_edaran_pkfad = (float) $adnegeribio_pkfad8["jualan_edaran_pkfad"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qrynegeribio_pkfad9 = "select round(sum(kuantiti),2)  as jualan_eksport_pkfad
                 from penyata_biodiesel a, licensedb.license l
                  where a.tahun = $tahun and
                       a.bulan = $bulan and
                       a.lesen = l.F201A and
                       a.kod_produk='56' and
                       a.penyata = 'jualan_eksport' and
                       l.F201U4 = $ngr";

      $renegeribio_pkfad9 = mysqli_query($conn_odbc,$qrynegeribio_pkfad9);
      $adnegeribio_pkfad9 = mysqli_fetch_assoc($renegeribio_pkfad9);
      $jualan_eksport_pkfad = (float) $adnegeribio_pkfad9["jualan_eksport_pkfad"];


      //stok akhir dikira dan diambil dari e-biodiesel


        $stk_bio_rbdpko1 = ($ppo_hasil_rbdpko + $stk_awl_rbdpko + $bekalan_belian_rbdpko + $bekalan_penerimaan_rbdpko + $bekalan_import_rbdpko);
        $stk_bio_rbdpko2 =($ppo_proses_rbdpko + $jualan_jualan_rbdpko + $jualan_edaran_rbdpko + $jualan_eksport_rbdpko);
        $stk_bio_rbdpko = $stk_bio_rbdpko1 - $stk_bio_rbdpko2;

        $stk_bio_rbdpkl1 = ($ppo_hasil_rbdpkl + $stk_awl_rbdpkl + $bekalan_belian_rbdpkl + $bekalan_penerimaan_rbdpkl + $bekalan_import_rbdpkl);
        $stk_bio_rbdpkl2 =($ppo_proses_rbdpkl + $jualan_jualan_rbdpkl + $jualan_edaran_rbdpkl + $jualan_eksport_rbdpkl);
        $stk_bio_rbdpkl = $stk_bio_rbdpkl1 - $stk_bio_rbdpkl2;

        $stk_bio_rbdpks1 = ($ppo_hasil_rbdpks + $stk_awl_rbdpks + $bekalan_belian_rbdpks + $bekalan_penerimaan_rbdpks + $bekalan_import_rbdpks);
        $stk_bio_rbdpks2 = ($ppo_proses_rbdpks + $jualan_jualan_rbdpks + $jualan_edaran_rbdpks + $jualan_eksport_rbdpks);
        $stk_bio_rbdpks = $stk_bio_rbdpks1 - $stk_bio_rbdpks2;

        $stk_bio_pkfad1 =  $ppo_hasil_pkfad + $stk_awl_pkfad + $bekalan_belian_pkfad + $bekalan_penerimaan_pkfad + $bekalan_import_pkfad;
        $stk_bio_pkfad2 = $ppo_proses_pkfad + $jualan_jualan_pkfad + $jualan_edaran_pkfad + $jualan_eksport_pkfad ;
        $stk_bio_pkfad = $stk_bio_pkfad1 - $stk_bio_pkfad2;
      //end

      //pusat simpanan - RBDPKO
     /*  //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk1 = "select round(sum(a.INS_KJ),2) stk111_rbdpko
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (NULL,0) and
                       a.INS_KD = '30' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '02' and
                       l.F201U4 = $ngr";

      $renegeribulk1 = mysqli_query($conn_odbc,$qrynegeribulk1);
      $adnegeribulk1 = mysqli_fetch_assoc($renegeribulk1);
      $stk111_rbdpko = (float) $adnegeribulk1["stk111_rbdpko"];
      //odbc_close($conn_odbc);


      //pusat simpanan - RBDPKL
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk2 = "select round(sum(a.INS_KJ),2) stk111_rbdpkl
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (NULL,0) and
                       a.INS_KD = '32' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '02' and
                       l.F201U4 = $ngr";

      $renegeribulk2 = mysqli_query($conn_odbc,$qrynegeribulk2);
      $adnegeribulk2 = mysqli_fetch_assoc($renegeribulk2);
      $stk111_rbdpkl = (float) $adnegeribulk2["stk111_rbdpkl"];
      //odbc_close($conn_odbc);

      //pusat simpanan - RBDPKS
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk3 = "select round(sum(a.INS_KJ),2) stk111_rbdpks
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (NULL,0) and
                       a.INS_KD = '31' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '02' and
                       l.F201U4 = $ngr";

      $renegeribulk3 = mysqli_query($conn_odbc,$qrynegeribulk3);
      $adnegeribulk3 = mysqli_fetch_assoc($renegeribulk3);
      $stk111_rbdpks = (float) $adnegeribulk3["stk111_rbdpks"];
      //odbc_close($conn_odbc);

      //pusat simpanan - PKFAD
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");
      $qrynegeribulk4 = "select round(sum(a.INS_KJ),2) stk111_pkfad
                 from mpb_insp3b a, licensedb.license l, codedb.commodity_l c
                 where a.INS_KA = l.F201A and
                       a.INS_KC = '$tahun' and
                       a.INS_KB = '$bulan' and
                       a.INS_KJ not in (NULL,0) and
                       a.INS_KD = '56' and
                       a.INS_KD = c.comm_code_l and
                       c.group_l = '02' and
                       l.F201U4 = $ngr";

      $renegeribulk4 = mysqli_query($conn_odbc,$qrynegeribulk4);
      $adnegeribulk4 = mysqli_fetch_assoc($renegeribulk4);
      $stk111_pkfad = (float) $adnegeribulk4["stk111_pkfad"];

     */


// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

      $jumnegeri = $jumnegeri + 1;

      $stk_cpo = $stk911_cpo + $stk101_cpo + $stk104_cpo + $stk111_cpo;
      $stk_ppo = $stk101_ppo + $stk104_ppo + $stk111_ppo;
      $stk_pk = $stk911_pk + $stk102_pk;
      $stk_cpko = $stk102_cpko + $stk101_cpko + $stk104_cpko + $stk111_cpko;
      $stk_ppko = $stk101_ppko + $stk104_ppko + $stk111_ppko;
      $stk_pkc = $stk102_pkc;

      echo "Negeri $negeri <br>";
      echo "*** Mills <br>";
      echo "----> oer cpo $oer_cpo, ker pk $ker_pk, cpo $cpo, pk $pk cpo proc $cpo ffb proc $ffb_proc  <br>";
      echo "----> ffb proc $ffb_proc ffb rec $ffb_rec <br>";
      echo "----> mill hrs $millhrs, mill capacity $millcap, mill utilrate $millutilrate<br>";
      echo "----> stock cpo $stk911_cpo, pk $stk911_pk <br>";
      echo "*** Crusher <br>";
      echo "----> oer cpko $oer_cpko, ker pkc $ker_pkc, cpko $cpko, pkc $pkc <br>";
      echo "----> pk proc $pk_proc <br>";
      echo "----> crs hrs $crshrs, crs capacity $crscap, crs utilrate $crsutilrate<br>";
      echo "----> stock cpko $stk102_cpko, pk $stk102_pk, pkc $stk102_pkc <br>";
      echo "*** Refinery <br>";
      echo "----> production selected process po cps $prod101_cps, cpl $prod101_cpl, rbdpo $prod101_rbdpo, rbdpl $prod101_rbdpl, rbdps $prod101_rbdps, pfad $prod101_pfad, cooking oil $prod101_co<br>";
      echo "----> production finish product margerine $prod101_mar, ghee $prod101_ghee, doughfat $prod101_fat, shortening $prod101_short, coco $prod101_coco, soap $prod101_soap, red olein $prod101_redol, prayer oil $prod101_pry, blend veg oil $prod101_blend, other edible $prod101_otheredb, other nonedible $prod101_othernot<br>";
      echo "----> stock selected process po cps $stk101_cps, cpl $stk101_cpl, rbdpo $stk101_rbdpo, rbdpl $stk101_rbdpl, rbdps $stk101_rbdps, pfad $stk101_pfad, cooking oil $stk101_co<br>";
      echo "----> stock finish product margerine $stk101_mar, ghee $stk101_ghee, doughfat $stk101_fat, shortening $stk101_short, coco $stk101_coco, soap $stk101_soap, red olein $stk101_redol, prayer oil $stk101_pry, blend veg oil $stk101_blend, other edible $stk101_otheredb, other nonedible $stk101_othernot<br>";
      echo "----> process cpo $proc101_cpo, cpko $proc101_cpko ref capacity $refcap, ref utilrate $refutilrate <br>";
      echo "----> stock cpo $stk101_cpo, ppo $stk101_ppo, cpko $stk101_cpko, ppko $stk101_ppko, rbdpko $stk101_rbdpko,rbdpkl $stk101_rbdpkl,rbdpks $stk101_rbdpks,pkfad $stk101_pkfad<br>";
      echo "*** Oleo <br>";
      echo "----> prod cps $prod104_cps, cpl $prod104_cpl, rbdpo $prod104_rbdpo, rbdpl $prod104_rbdpl, rbdps $prod104_rbdps, pfad $prod104_pfad<br>";
      echo "----> stock cps $stk104_cps, cpl $stk104_cpl, rbdpo $stk104_rbdpo, rbdpl $stk104_rbdpl, rbdps $stk104_rbdps, pfad $stk104_pfad<br>";
      echo "----> process cpo $proc104_cpo, ppo $proc104_ppo, cpko $proc104_cpko ppko $proc104_ppko oleo capacity $oleocap, oleo utilrate $oleoutilrate <br>";
      echo "----> stock cpo $stk104_cpo, ppo $stk104_ppo, cpko $stk104_cpko, ppko $stk104_ppko, rbdpko $stk104_rbdpko,rbdpkl $stk104_rbdpkl,rbdpks $stk104_rbdpks,pkfad $stk104_pkfad<br> ";
      echo "*** e-Biodiesel";
      echo "----> Stok RBDPO $stk_bio_rbdpo, RBDPL $stk_bio_rbdpl, RBDPS $stk_bio_rbdps, PFAD $stk_bio_pfad , RBDPKO $stk_bio_rbdpko, RBDPKL $stk_bio_rbdpkl, RBDPKS $stk_bio_rbdpks,PKFAD $stk_bio_pkfad <br>";
      echo "*** Pusat Simpanan <br>";
      echo "----> stock cpo $stk111_cpo, ppo $stk111_ppo, cpko $stk111_cpko, ppko $stk111_ppko, rbdpo $stk111_rbdpo,rbdpl $stk111_rbdpl, rbdps $stk111_rbdps,pfad $stk111_pfad, rbdpko $stk111_rbdpko,rbdpks $stk111_rbdpks,rbdpkl $stk111_rbdpkl,pkfad $stk111_pkfad<br>";
      echo "*** Stock <br> ";
      echo "----> cpo $stk_cpo, ppo $stk_ppo, pk $stk_pk, cpko $stk_cpko, ppko $stk_ppko, pkc $stk_pkc<br>";








      $query1 = "select max(oernegeri_id) as maxoernegeri_id from oernegeri";
      $result1 = mysqli_query($conn_mysql,$query1);
      $ad1 = mysqli_fetch_assoc($result1);
      if ($result1)
       {
       $maxno =  $ad1["maxoernegeri_id"];
        $oernegeri_id = $maxno + 1;
       }
      else
        $oernegeri_id = 1;

      $qinsnegeri = "insert into oernegeri values ('$oernegeri_id','$tahun',
                     '$bulan','$negeri',
                     $oer_cpo,$oer_cpko,$ker_pk,$ker_pkc,$cpo,$ffb_proc)";

      $rinsnegeri = mysqli_query($conn_mysql,$qinsnegeri);
      //$rinsnegeriecon = mysqli_query($conn_mysql,$qinsnegeri,$conn_mysql_econ);

      $query2 = "select max(prodnegeri_id) as maxprodnegeri_id from prodnegeri";
      $result2 = mysqli_query($conn_mysql,$query2);
      $ad2 = mysqli_fetch_assoc($result2);

      if ($result2)
       {
        $maxno1 =  $ad2["maxprodnegeri_id"];
        $prodnegeri_id = $maxno1 + 1;
       }
      else
         $prodnegeri_id = 1;

       //$conn_mysql_econ = db_connect_econ();
       $conn_mysql = db_connect_ekilangmain_mysqli();

      $qinsnegeri1 = "insert into prodnegeri values ('$prodnegeri_id','$tahun',
                      '$bulan','$negeri',
                      $cpo,$pk,$ffb_proc,$ffb_rec,$millhrs,$millcap,$millutilrate,
                      $cpko,$pkc,$pk_proc,$crshrs,$crscap,$crsutilrate,
                      $prod101_cps, $prod101_cpl, $prod101_rbdpo, $prod101_rbdpl, $prod101_rbdps, $prod101_pfad, $prod101_co,
                      $proc101_cpo, $proc101_cpko, $refcap, $refutilrate,
                      $prod101_mar, $prod101_ghee, $prod101_fat, $prod101_short, $prod101_coco, $prod101_soap, $prod101_redol, $prod101_pry, $prod101_blend, $prod101_otheredb, $prod101_othernot,
                      $prod104_cps, $prod104_cpl, $prod104_rbdpo, $prod104_rbdpl, $prod104_rbdps, $prod104_pfad,
                      $proc104_cpo, $proc104_cpko, $oleocap, $oleoutilrate,
                      $proc104_ppo, $proc104_ppko, $millno, $crsno, $refno,$oleono,$millhrs_actual)";

      $rinsnegeri1 = mysqli_query($conn_mysql,$qinsnegeri1);
      //$rinsnegeri1econ = mysqli_query($conn_mysql,$qinsnegeri1,$conn_mysql_econ);

      $query2a = "select max(stknegeri_id) as maxstknegeri_id from stknegeri";
      $result2a = mysqli_query($conn_mysql,$query2a);
      $ad2 = mysqli_fetch_assoc($result2a);
      if ($result2a)
       {
        $maxno1a =  $ad2["maxstknegeri_id"];
        $stknegeri_id = $maxno1a + 1;
       }
      else
         $stknegeri_id = 1;

      $stk_cpo = $stk_cpo + $stkbio_cpo;
      $stk_ppo = $stk_ppo + $stkbio_ppo;
      $stk_cpko = $stk_cpko + $stkbio_cpko;
      $stk_ppko = $stk_ppko + $stkbio_ppko;





      $qinsnegeri1a = "insert into stknegeri values ('$stknegeri_id','$tahun',
                      '$bulan','$negeri',
                      $stk911_cpo, $stk911_pk, $stk102_cpko, $stk102_pk, $stk102_pkc,
                      $stk101_cps, $stk101_cpl, $stk101_rbdpo, $stk101_rbdpl,
                      $stk101_rbdps, $stk101_pfad, $stk101_co,
                      $stk101_cpo, $stk101_ppo, $stk101_cpko, $stk101_ppko,
                      $stk101_mar, $stk101_ghee, $stk101_fat, $stk101_short, $stk101_coco,
                      $stk101_soap, $stk101_redol, $stk101_pry, $stk101_blend,
                      $stk101_otheredb, $stk101_othernot,
                      $stk104_cps, $stk104_cpl, $stk104_rbdpo, $stk104_rbdpl,
                      $stk104_rbdps, $stk104_pfad,
                      $stk104_cpo, $stk104_ppo, $stk104_cpko, $stk104_ppko,
                      $stk111_cpo, $stk111_ppo, $stk111_cpko, $stk111_ppko,
                      $stk_cpo, $stk_ppo, $stk_cpko, $stk_ppko, $stk_pk, $stk_pkc,
                      $stk_bio_rbdpo, $stk_bio_rbdpl,$stk_bio_rbdps,$stk_bio_pfad,
                      $stk111_rbdpo,$stk111_rbdpl,$stk111_rbdps,$stk111_pfad,
                      $stk101_rbdpko,$stk101_rbdpkl,$stk101_rbdpks,$stk101_pkfad,
                      $stk_bio_rbdpko,$stk_bio_rbdpkl,$stk_bio_rbdpks,$stk_bio_pkfad,
                      $stk111_rbdpko,$stk111_rbdpkl,$stk111_rbdpks,$stk111_pkfad,
                       $stk104_rbdpko,$stk104_rbdpkl,$stk104_rbdpks,$stk104_pkfad)";



      $rinsnegeri1a = mysqli_query($conn_mysql,$qinsnegeri1a);
     //$rinsnegeri1aecon = mysqli_query($conn_mysql,$qinsnegeri1a,$conn_mysql_econ);



      //$rinsnegeri1b = mysqli_query($conn_mysql,$qinsnegeri1b);


     }
    echo "Jumlah rekod sudah dipindah bagi negeri $jumnegeri<br><br>";

    $stk_cpo = 0;
    $stk_ppo = 0;
    $stk_pk = 0;
    $stk_cpko = 0;
    $stk_ppko = 0;
    $stk_pkc = 0;


// Malaysia ----------------------------------------------------------------------------------

// Kilang Buah
    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qrymsia = "select ((sum(round(p.F911J1,2))/sum(round(p.F911I,2)))*100) oer_cpo,
                      ((sum(round(p.F911J2,2))/sum(round(p.F911I,2)))*100) ker_pk,
                      sum(round(p.F911I,2)) ffb_proc,sum(round(p.F911J1,2)) cpo_proc
                from PL911P3 p
                where p.F911D = '$tahun' and
                      p.F911C = '$bulan' and
                      p.F911I not in (0) and
                       p.F911I is not NULL";

    $remsia = mysqli_query($conn_odbc,$qrymsia);
    $armsia = mysqli_fetch_assoc($remsia);
    $oer_cpo = (float) $armsia["oer_cpo"];
    $ker_pk = (float) $armsia["ker_pk"];
    $ffb_proc = (float) $armsia["ffb_proc"];
     //$ffb_proc = number_format($ffb_proc,2);
    $cpo_proc = (float) $armsia["cpo_proc"];
    //$cpo_proc = number_format($cpo_proc,2);

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry2 = "select sum(m.cap_lulus) cap_lulus
               from PL911P3 p, lesen_master.mpku_caps m
               where p.F911D = '$tahun' and
                     p.F911C = '$bulan' and
                     p.F911A = m.cap_lesen and
                     m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '04'";

    $res2 = mysqli_query($conn_odbc,$qry2);
    $ad2 = mysqli_fetch_assoc($res2);
    $millcap = $ad2["cap_lulus"];
    if ($millcap == NULL)
         $millcap = 0;
    if ($millcap == 0)
        $millutilrate = 0;
    else
        $millutilrate = (float) (($ffb_proc / ($millcap/12)) * 100);

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry4 = "select (sum(round(F911O,2))/count(F911A)) millhrs
               from PL911P3
               where F911D = '$tahun' and
                     F911C = '$bulan' and
                     F911J1 not in (0) and
                     F911J1 is not NULL";

    $res4 = mysqli_query($conn_odbc,$qry4);
    $ad4 = mysqli_fetch_assoc($res4);
    $millhrs = (float) $ad4["millhrs"];

// Kilang Isirong
    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry5 = "select ((sum(p.F1021L1)/sum(p.F1021K))*100) oer_cpko,
                    ((sum(p.F1021L2)/sum(p.F1021K))*100) ker_pkc
             from pl1021p3 p
             where p.F1021D = '$tahun' and
                   p.F1021C = '$bulan' and
                   p.F1021K not in (0) and
                   p.F1021K is not NULL";

    $res5 = mysqli_query($conn_odbc,$qry5);
    $ad5 = mysqli_fetch_assoc($res5);
    $oer_cpko = (float) $ad5["oer_cpko"];
    $ker_pkc = (float) $ad5["ker_pkc"];

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry6 = "select sum(m.cap_lulus) cap_lulus,
                    (sum(m.cap_lulus * p.F1021S4) / sum(m.cap_lulus)) crsutilrate
               from pl1021p3 p, lesen_master.mpku_caps m
               where p.F1021D = '$tahun' and
                     p.F1021C = '$bulan' and
                     p.F1021A = m.cap_lesen and
                     m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '05'";

    $res6 = mysqli_query($conn_odbc,$qry6);
    $ad6 = mysqli_fetch_assoc($res6);
    $crscap = (float) $ad6["cap_lulus"];
    $crsutilrate = (float) $ad6["crsutilrate"];

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry7 = "select (sum(round(F1021S3,2))/count(F1021A)) crshrs
               from pl1021p3
               where F1021D = '$tahun' and
                     F1021C = '$bulan' and
                     F1021S3 not in (0) and
                     F1021S3 is not NULL";

    $res7 = mysqli_query($conn_odbc,$qry7);
    $ad7 = mysqli_fetch_assoc($res7);
    $crshrs = (float) $ad7["crshrs"];

// Kilang Penapis
      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qry2 = "select sum(m.cap_lulus) cap_lulus
               from lesen_master.mpku_caps m,
                    lesen_master.dbp220 d
               where  m.cap_mmyyyy = '$blnthn' and
                      m.cap_kat = '06' and
                      m.cap_lesen = d.F220A and
                      d.F220D = '1'";

      $res2 = mysqli_query($conn_odbc,$qry2);
      $ad2 = mysqli_fetch_assoc($res2);
      $refcap = (float) $ad2["cap_lulus"];

      if ($refcap == NULL)
         $refcap = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpo = "select sum(b.F101B10) proc101_cpo
                 from pl101ap3 a, pl101bp3 b,lesen_master.mpku_caps m
                 where m.cap_lesen=a.F101A1 and
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
                       m.cap_lulus is not NULL";

      $reproccpo = mysqli_query($conn_odbc,$qryproccpo);
      $adproccpo = mysqli_fetch_assoc($reproccpo);
      $proc101_cpo = (float) $adproccpo["proc101_cpo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpko = "select sum(b.F101B10) proc101_cpko
                 from pl101ap3 a, pl101bp3 b,lesen_master.mpku_caps m
                 where m.cap_lesen=a.F101A1 and
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
                       m.cap_lulus is not NULL";

      $reproccpko = mysqli_query($conn_odbc,$qryproccpko);
      $adproccpko = mysqli_fetch_assoc($reproccpko);
      $proc101_cpko = (float) $adproccpko["proc101_cpko"];

      if ($refcap == 0)
        $refutilrate = 0;
      else
        $refutilrate = (float) ((($proc101_cpo + $proc101_cpko) / ($refcap/12)) * 100);

// Kilang Oleo

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qry2 = "select sum(m.cap_lulus) cap_lulus
               from lesen_master.mpku_caps m,
               lesen_master.dbp220 d
               where m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '06' and
                     m.cap_lesen = d.F220A and
                     d.F220D = '2'";

      $res2 = mysqli_query($conn_odbc,$qry2);
      $ad2 = mysqli_fetch_assoc($res2);
      $oleocap = (float) $ad2["cap_lulus"];

      if ($oleocap == NULL)
         $oleocap = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpo = "select sum(b.F104B9) proc104_cpo
                 from pl104ap1 a, pl104bp1 b
                 where a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '1' and
                       b.F104B4 = '01' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reproccpo = mysqli_query($conn_odbc,$qryproccpo);
      $adproccpo = mysqli_fetch_assoc($reproccpo);
      $proc104_cpo = (float) $adproccpo["proc104_cpo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryprocppo = "select sum(b.F104B9) proc104_ppo
                 from pl104ap1 a, pl104bp1 b
                 where a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '1' and
                       b.F104B4 != '01' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reprocppo = mysqli_query($conn_odbc,$qryprocppo);
      $adprocppo = mysqli_fetch_assoc($reprocppo);
      $proc104_ppo = (float) $adprocppo["proc104_ppo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpko = "select sum(b.F104B9) proc104_cpko
                 from pl104ap1 a, pl104bp1 b
                 where a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 = '04' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reproccpko = mysqli_query($conn_odbc,$qryproccpko);
      $adproccpko = mysqli_fetch_assoc($reproccpko);
      $proc104_cpko = (float) $adproccpko["proc104_cpko"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryprocppko = "select sum(b.F104B9) proc104_ppko
                 from pl104ap1 a, pl104bp1 b
                 where a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 != '04' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reprocppko = mysqli_query($conn_odbc,$qryprocppko);
      $adprocppko = mysqli_fetch_assoc($reprocppko);
      $proc104_ppko = (float) $adprocppko["proc104_ppko"];

      if ($oleocap == 0)
        $oleoutilrate = 0;
      else
        $oleoutilrate = (float) ((($proc104_cpo + $proc104_ppo + $proc104_cpko + $proc104_ppko) / ($oleocap/12)) * 100);
echo "data2";
echo "<br>";
echo "proc104_cpo: ",$proc104_cpo;
echo "<br>";
echo "proc104_ppo: ",$proc104_ppo;
echo "<br>";
echo "proc104_cpko: ",$proc104_cpko;
echo "<br>";
echo "proc104_ppko: ",$proc104_ppko;
echo "<br>";
echo "oleocap: ",$oleocap;
echo "<br>";
echo "oleoutilrate: ",$oleoutilrate;

    echo "Malaysia <br>";
    echo "*** Mills <br>";
    echo "----> oer cpo $oer_cpo, ker pk $ker_pk cpo proc $cpo_proc ffb proc $ffb_proc<br>";
    echo "----> mill hrs $millhrs, mill capacity $millcap, mill utilrate $millutilrate<br>";
    echo "*** Crusher <br>";
    echo "----> oer cpko $oer_cpko, ker pkc $ker_pkc <br>";
    echo "----> crs hrs $crshrs, crs capacity $crscap, crs utilrate $crsutilrate<br>";
    echo "*** Refinery <br>";
    echo "----> ref capacity $refcap, ref utilrate $refutilrate <br>";
    echo "*** Oleo <br>";
    echo "----> oleo capacity $oleocap, oleo utilrate $oleoutilrate <br>";

    $query1 = "select max(oermsia_id) as maxoermsia_id from oermsia";
    $result1 = mysqli_query($conn_mysql,$query1);
    $ad1 = mysqli_fetch_assoc($result1);

    if ($result1)
      {
        $maxno =  $ad1["maxoermsia_id"];
        $oermsia_id = $maxno + 1;
      }
    else
        $oermsia_id = 1;

    $qinsmsia = "insert into oermsia values ('$oermsia_id','$tahun',
          '$bulan',
          $oer_cpo,$oer_cpko,$ker_pk,$ker_pkc,$cpo_proc,$ffb_proc)";

    $rinsmsia = mysqli_query($conn_mysql,$qinsmsia);
    //$rinsmsiaecon = mysqli_query($conn_mysql,$qinsmsia,$conn_mysql_econ);

    $query2 = "select max(prodmsia_id) as maxprodmsia_id from prodmsia";
    $result2 = mysqli_query($conn_mysql,$query2);
    $ad2 = mysqli_fetch_assoc($result2);

    if ($result2)
      {
        $maxno1 =  $ad2["maxprodmsia_id"];
        $prodmsia_id = $maxno1 + 1;
      }
    else
        $prodmsia_id = 1;

    $qinsmsia1 = "insert into prodmsia values ('$prodmsia_id','$tahun','$bulan',
                $millhrs,$millcap,$millutilrate,
                $crshrs,$crscap,$crsutilrate,
                $refcap, $refutilrate,
                $oleocap, $oleoutilrate)";

    $rinsmsia1 = mysqli_query($conn_mysql,$qinsmsia1);
    //$rinsmsia1econ = mysqli_query($conn_mysql,$qinsmsia1,$conn_mysql_econ);

// Semenanjung Malaysia ---------------------------------------------------------------------

// Kilang Buah
    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qrysemsia = "select ((sum(round(p.F911J1,2))/sum(round(p.F911I,2)))*100) oer_cpo,
                        ((sum(round(p.F911J2,2))/sum(round(p.F911I,2)))*100) ker_pk,
                        sum(round(p.F911I,2)) ffb_proc,sum(round(p.F911J1,2)) cpo_proc
                  from PL911P3 p, licensedb.license l
                  where p.F911A = l.F201A and
                        p.F911D = '$tahun' and
                        p.F911C = '$bulan' and
                        p.F911I not in (0) and
                        p.F911I is not NULL and
                        l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12)";

    $resemsia = mysqli_query($conn_odbc,$qrysemsia);
    $arsemsia = mysqli_fetch_assoc($resemsia);
    $oer_cpo = (float) $arsemsia["oer_cpo"];
    $ker_pk = (float) $arsemsia["ker_pk"];
    $ffb_proc = (float) $arsemsia["ffb_proc"];
    //$ffb_proc = number_format($ffb_proc,2);
    $cpo_proc = (float) $arsemsia["cpo_proc"];
   // $cpo_proc = number_format($cpo_proc,2);

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry2 = "select sum(m.cap_lulus) cap_lulus
               from PL911P3 p, licensedb.license l, lesen_master.mpku_caps m
               where p.F911D = '$tahun' and
                     p.F911C = '$bulan' and
                     p.F911A = l.F201A and
                     l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                     p.F911A = m.cap_lesen and
                     m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '04'";

    $res2 = mysqli_query($conn_odbc,$qry2);
    $ad2 = mysqli_fetch_assoc($res2);
    $millcap = (float) $ad2["cap_lulus"];

    if ($millcap == NULL)
         $millcap = 0;
    if ($millcap == 0)
        $millutilrate = 0;
    else
        $millutilrate = (float) (($ffb_proc / ($millcap/12)) * 100);

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry4 = "select (sum(round(p.F911O,2))/count(p.F911A)) millhrs
             from PL911P3 p, licensedb.license l
             where p.F911A = l.F201A and
                   p.F911D = '$tahun' and
                   p.F911C = '$bulan' and
                   p.F911J1 not in (0) and
                   p.F911J1 is not NULL and
                   l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12)";

    $res4 = mysqli_query($conn_odbc,$qry4);
    $ad4 = mysqli_fetch_assoc($res4);
    $millhrs = (float) $ad4["millhrs"];

// Kilang Isirong

   //odbc_close($conn_odbc);
   //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

   $qry5 = "select ((sum(p.F1021L1)/sum(p.F1021K))*100) oer_cpko,
                    ((sum(p.F1021L2)/sum(p.F1021K))*100) ker_pkc
             from pl1021p3 p, licensedb.license l
             where p.F1021A = l.F201A and
                   p.F1021D = '$tahun' and
                   p.F1021C = '$bulan' and
                   l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                   p.F1021K not in (0) and
                   p.F1021K is not NULL";

    $res5 = mysqli_query($conn_odbc,$qry5);
    $ad5 = mysqli_fetch_assoc($res5);
    $oer_cpko = (float) $ad5["oer_cpko"];
    $ker_pkc = (float) $ad5["ker_pkc"];

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry6 = "select sum(m.cap_lulus) cap_lulus,
                    (sum(m.cap_lulus * p.F1021S4) / sum(m.cap_lulus)) crsutilrate
               from pl1021p3 p, licensedb.license l, lesen_master.mpku_caps m
               where p.F1021D = '$tahun' and
                     p.F1021C = '$bulan' and
                     p.F1021A = l.F201A and
                     l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                     p.F1021A = m.cap_lesen and
                     m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '05'";

    $res6 = mysqli_query($conn_odbc,$qry6);
    $ad6 = mysqli_fetch_assoc($res6);
    $crscap = (float) $ad6["cap_lulus"];
    $crsutilrate = (float) $ad6["crsutilrate"];

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry7 = "select (sum(round(p.F1021S3,2))/count(p.F1021A)) crshrs
             from pl1021p3 p, licensedb.license l
             where p.F1021A = l.F201A and
                   p.F1021D = '$tahun' and
                   p.F1021C = '$bulan' and
                   p.F1021S3 not in (0) and
                   p.F1021S3 is not NULL and
                   l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12)";

    $res7 = mysqli_query($conn_odbc,$qry7);
    $ad7 = mysqli_fetch_assoc($res7);
    $crshrs = (float) $ad7["crshrs"];

// Kilang Penapis

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qry2 = "select sum(m.cap_lulus) cap_lulus
               from licensedb.license l, lesen_master.mpku_caps m,
                    lesen_master.dbp220 d
               where  l.F201A = m.cap_lesen and
                      l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                      m.cap_mmyyyy = '$blnthn' and
                      m.cap_kat = '06' and
                      l.F201A = d.F220A and
                      d.F220D = '1'";

      $res2 = mysqli_query($conn_odbc,$qry2);
      $ad2 = mysqli_fetch_assoc($res2);
      $refcap = (float) $ad2["cap_lulus"];

      if ($refcap == NULL)
         $refcap = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpo = "select sum(b.F101B10) proc101_cpo
                 from pl101ap3 a, pl101bp3 b, licensedb.license l,lesen_master.mpku_caps m
                 where m.cap_lesen=a.F101A1 and
       m.cap_mmyyyy ='$blnthn' and
            m.cap_kat = '06' and
        a.F101A1 = l.F201A and
                       l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                       a.F101A1 = b.F101B1 and
                       a.F101A4 = b.F101B2 and
                       a.F101A6 = '$tahun' and
                       a.F101A5 = '$bulan' and
                       b.F101B3 = '1' and
                       b.F101B4 = '01' and
                       b.F101B10 not in (0) and
                       m.cap_lulus not in (0.00) and
                       b.F101B10 is not NULL and
                       m.cap_lulus is not NULL";

      $reproccpo = mysqli_query($conn_odbc,$qryproccpo);
      $adproccpo = mysqli_fetch_assoc($reproccpo);
      $proc101_cpo = (float) $adproccpo["proc101_cpo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpko = "select sum(b.F101B10) proc101_cpko
                 from pl101ap3 a, pl101bp3 b, licensedb.license l,lesen_master.mpku_caps m
                 where m.cap_lesen=a.F101A1 and
       m.cap_mmyyyy ='$blnthn' and
            m.cap_kat = '06' and
         a.F101A1 = l.F201A and
                       l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                       a.F101A1 = b.F101B1 and
                       a.F101A4 = b.F101B2 and
                       a.F101A6 = '$tahun' and
                       a.F101A5 = '$bulan' and
                       b.F101B3 = '2' and
                       b.F101B4 = '04' and
                       b.F101B10 not in (0) and
                       m.cap_lulus not in (0.00) and
                       b.F101B10 is not NULL and
                       m.cap_lulus is not NULL";

      $reproccpko = mysqli_query($conn_odbc,$qryproccpko);
      $adproccpko = mysqli_fetch_assoc($reproccpko);
      $proc101_cpko = (float) $adproccpko["proc101_cpko"];

      if ($refcap == 0)
        $refutilrate = 0;
      else
        $refutilrate = (float) ((($proc101_cpo + $proc101_cpko) / ($refcap/12)) * 100);

// Kilang Oleo

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qry2 = "select sum(m.cap_lulus) cap_lulus
               from licensedb.license l,lesen_master.mpku_caps m,
               lesen_master.dbp220 d
               where l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                     l.F201A = m.cap_lesen and
                     m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '06' and
                     l.F201A = d.F220A and
                     d.F220D = '2'";

      $res2 = mysqli_query($conn_odbc,$qry2);
      $ad2 = mysqli_fetch_assoc($res2);
      $oleocap = (float) $ad2["cap_lulus"];

      if ($oleocap == NULL)
         $oleocap = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpo = "select sum(b.F104B9) proc104_cpo
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '1' and
                       b.F104B4 = '01' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reproccpo = mysqli_query($conn_odbc,$qryproccpo);
      $adproccpo = mysqli_fetch_assoc($reproccpo);
      $proc104_cpo = (float) $adproccpo["proc104_cpo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryprocppo = "select sum(b.F104B9) proc104_ppo
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '1' and
                       b.F104B4 != '01' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reprocppo = mysqli_query($conn_odbc,$qryprocppo);
      $adprocppo = mysqli_fetch_assoc($reprocppo);
      $proc104_ppo = (float) $adprocppo["proc104_ppo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpko = "select sum(b.F104B9) proc104_cpko
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 = '04' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reproccpko = mysqli_query($conn_odbc,$qryproccpko);
      $adproccpko = mysqli_fetch_assoc($reproccpko);
      $proc104_cpko = (float) $adproccpko["proc104_cpko"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryprocppko = "select sum(b.F104B9) proc104_ppko
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 in (1,2,3,4,5,6,7,8,9,10,11,12) and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 != '04' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reprocppko = mysqli_query($conn_odbc,$qryprocppko);
      $adprocppko = mysqli_fetch_assoc($reprocppko);
      $proc104_ppko = (float) $adprocppko["proc104_ppko"];

      if ($oleocap == 0)
        $oleoutilrate = 0;
      else
        $oleoutilrate = (float) ((($proc104_cpo + $proc104_ppo + $proc104_cpko + $proc104_ppko) / ($oleocap/12)) * 100);

echo $proc104_cpo;
echo "br";
echo $proc104_ppo;
echo "br";
echo $proc104_cpko;
echo "br";
echo $proc104_ppko;
echo "br";
echo $oleocap;



    echo "Semenanjung Malaysia <br>";
    echo "*** Mills <br>";
    echo "----> oer cpo $oer_cpo, ker pk $ker_pk cpo proc $cpo_proc ffb proc $ffb_proc <br>";
    echo "----> mill hrs $millhrs, mill capacity $millcap, mill utilrate $millutilrate<br>";
    echo "*** Crusher <br>";
    echo "----> oer cpko $oer_cpko, ker pkc $ker_pkc <br>";
    echo "----> crs hrs $crshrs, crs capacity $crscap, crs utilrate $crsutilrate<br>";
    echo "*** Refinery <br>";
    echo "----> ref capacity $refcap, ref utilrate $refutilrate <br>";
    echo "*** Oleo <br>";
    echo "----> oleo capacity $oleocap, oleo utilrate $oleoutilrate <br>";

    $query1 = "select max(oersemsia_id) as maxoersemsia_id from oersemsia";
    $result1 = mysqli_query($conn_mysql,$query1);
    $ad1 = mysqli_fetch_assoc($result1);

    if ($result1)
      {
        $maxno =  $ad1["maxoersemsia_id"];
        $oersemsia_id = $maxno + 1;
      }
    else
        $oersemsia_id = 1;

    $qinssemsia = "insert into oersemsia values ('$oersemsia_id','$tahun','$bulan',
                   $oer_cpo,$oer_cpko,$ker_pk,$ker_pkc,$cpo_proc,$ffb_proc)";

    $rinssemsia = mysqli_query($conn_mysql,$qinssemsia);
    //$rinssemsiaecon = mysqli_query($conn_mysql,$qinssemsia,$conn_mysql_econ);

    $query2 = "select max(prodsemsia_id) as maxprodsemsia_id from prodsemsia";
    $result2 = mysqli_query($conn_mysql,$query2);
    $ad2 = mysqli_fetch_assoc($result2);

    if ($result2)
      {
        $maxno1 =  $ad2["maxprodsemsia_id"];
        $prodsemsia_id = $maxno1 + 1;
      }
    else
        $prodsemsia_id = 1;

    $qinssemsia1 = "insert into prodsemsia values ('$prodsemsia_id','$tahun','$bulan',
                $millhrs,$millcap,$millutilrate,
                $crshrs,$crscap,$crsutilrate,
                $refcap, $refutilrate,
                $oleocap, $oleoutilrate)";

    $rinssemsia1 = mysqli_query($conn_mysql,$qinssemsia1);
    //$rinssemsia1econ = mysqli_query($conn_mysql,$qinssemsia1,$conn_mysql_econ);


// Sabah Sarawak

// Kilang Buah

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qryss = "select ((sum(round(p.F911J1,2))/sum(round(p.F911I,2)))*100) oer_cpo,
                    ((sum(round(p.F911J2,2))/sum(round(p.F911I,2)))*100) ker_pk,
                    sum(round(p.F911I,2)) ffb_proc,sum(round(p.F911J1,2)) cpo_proc
              from PL911P3 p, licensedb.license l
              where p.F911A = l.F201A and
                    p.F911D = '$tahun' and
                    p.F911C = '$bulan' and
                    p.F911I not in (0) and
                    p.F911I is not NULL and
                    l.F201U4 in (13,14)";

    $ress = mysqli_query($conn_odbc,$qryss);
    $adss = mysqli_fetch_assoc($ress);
    $oer_cpo = (float) $adss["oer_cpo"];
    $ker_pk = (float) $adss["ker_pk"];
    $ffb_proc = (float) $adss["ffb_proc"];
   // $ffb_proc = number_format($ffb_proc,2);
    $cpo_proc = (float) $adss["cpo_proc"];
   // $cpo_proc = number_format($cpo_proc,2);

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry2 = "select sum(m.cap_lulus) cap_lulus
               from PL911P3 p, licensedb.license l, lesen_master.mpku_caps m
               where p.F911D = '$tahun' and
                     p.F911C = '$bulan' and
                     p.F911A = l.F201A and
                     l.F201U4 in (13,14) and
                     p.F911A = m.cap_lesen and
                     m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '04'";

    $res2 = mysqli_query($conn_odbc,$qry2);
    $ad2 = mysqli_fetch_assoc($res2);
    $millcap = (float) $ad2["cap_lulus"];

    if ($millcap == NULL)
         $millcap = 0;
    if ($millcap == 0)
        $millutilrate = 0;
    else
        $millutilrate = (float) (($ffb_proc / ($millcap/12)) * 100);

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry4 = "select (sum(round(p.F911O,2))/count(p.F911A)) millhrs
             from PL911P3 p, licensedb.license l
             where p.F911A = l.F201A and
                   p.F911D = '$tahun' and
                   p.F911C = '$bulan' and
                   p.F911J1 not in (0) and
                   p.F911J1 is not NULL and
                   l.F201U4 in (13,14)";

    $res4 = mysqli_query($conn_odbc,$qry4);
    $ad4 = mysqli_fetch_assoc($res4);
    $millhrs = (float) $ad4["millhrs"];

// Kilang Isirong

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry5 = "select ((sum(p.F1021L1)/sum(p.F1021K))*100) oer_cpko,
                    ((sum(p.F1021L2)/sum(p.F1021K))*100) ker_pkc
             from pl1021p3 p, licensedb.license l
             where p.F1021A = l.F201A and
                   p.F1021D = '$tahun' and
                   p.F1021C = '$bulan' and
                   l.F201U4 in (13,14) and
                   p.F1021K not in (0) and
                   p.F1021K is not NULL";

    $res5 = mysqli_query($conn_odbc,$qry5);
    $ad5 = mysqli_fetch_assoc($res5);
    $oer_cpko = (float) $ad5["oer_cpko"];
    $ker_pkc = (float) $ad5["ker_pkc"];

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry6 = "select sum(m.cap_lulus) cap_lulus,
                    (sum(m.cap_lulus * p.F1021S4) / sum(m.cap_lulus)) crsutilrate
               from pl1021p3 p, licensedb.license l, lesen_master.mpku_caps m
               where p.F1021D = '$tahun' and
                     p.F1021C = '$bulan' and
                     p.F1021A = l.F201A and
                     l.F201U4 in (13,14) and
                     p.F1021A = m.cap_lesen and
                     m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '05'";

    $res6 = mysqli_query($conn_odbc,$qry6);
    $ad6 = mysqli_fetch_assoc($res6);
    $crscap = (float) $ad6["cap_lulus"];
    $crsutilrate = (float) $ad6["crsutilrate"];

    //odbc_close($conn_odbc);
    //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

    $qry7 = "select (sum(round(p.F1021S3,2))/count(p.F1021A)) crshrs
             from pl1021p3 p, licensedb.license l
             where p.F1021A = l.F201A and
                   p.F1021D = '$tahun' and
                   p.F1021C = '$bulan' and
                   p.F1021S3 not in (0) and
                   p.F1021S3 is not NULL and
                   l.F201U4 in (13,14)";

    $res7 = mysqli_query($conn_odbc,$qry7);
    $ad7 = mysqli_fetch_assoc($res7);
    $crshrs = (float) $ad7["crshrs"];

// Kilang Penapis

     //odbc_close($conn_odbc);
     //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qry2 = "select sum(m.cap_lulus) cap_lulus
               from licensedb.license l, lesen_master.mpku_caps m,
                    lesen_master.dbp220 d
               where  l.F201A = m.cap_lesen and
                      l.F201U4 in (13,14) and
                      m.cap_mmyyyy = '$blnthn' and
                      m.cap_kat = '06' and
                      l.F201A = d.F220A and
                      d.F220D = '1'";

      $res2 = mysqli_query($conn_odbc,$qry2);
      $ad2 = mysqli_fetch_assoc($res2);
      $refcap = (float) $ad2["cap_lulus"];

      if ($refcap == NULL)
         $refcap = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpo = "select sum(b.F101B10) proc101_cpo
                 from pl101ap3 a, pl101bp3 b, licensedb.license l,lesen_master.mpku_caps m
                 where m.cap_lesen=a.F101A1 and
       m.cap_mmyyyy ='$blnthn' and
        m.cap_kat = '06' and
         a.F101A1 = l.F201A and
                       l.F201U4 in (13,14) and
                       a.F101A1 = b.F101B1 and
                       a.F101A4 = b.F101B2 and
                       a.F101A6 = '$tahun' and
                       a.F101A5 = '$bulan' and
                       b.F101B3 = '1' and
                       b.F101B4 = '01' and
                       b.F101B10 not in (0) and
                       m.cap_lulus not in (0.00) and
                       b.F101B10 is not NULL and
                       m.cap_lulus is not NULL";

      $reproccpo = mysqli_query($conn_odbc,$qryproccpo);
      $adproccpo = mysqli_fetch_assoc($reproccpo);
      $proc101_cpo = (float) $adproccpo["proc101_cpo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpko = "select sum(b.F101B10) proc101_cpko
                 from pl101ap3 a, pl101bp3 b, licensedb.license l,lesen_master.mpku_caps m
                 where m.cap_lesen=a.F101A1 and
       m.cap_mmyyyy ='$blnthn' and
        m.cap_kat = '06' and
         a.F101A1 = l.F201A and
                       l.F201U4 in (13,14) and
                       a.F101A1 = b.F101B1 and
                       a.F101A4 = b.F101B2 and
                       a.F101A6 = '$tahun' and
                       a.F101A5 = '$bulan' and
                       b.F101B3 = '2' and
                       b.F101B4 = '04' and
                       b.F101B10 not in (0) and
                       m.cap_lulus not in (0.00) and
                       b.F101B10 is not NULL and
                       m.cap_lulus is not NULL";

      $reproccpko = mysqli_query($conn_odbc,$qryproccpko);
      $adproccpko = mysqli_fetch_assoc($reproccpko);
      $proc101_cpko = (float) $adproccpko["proc101_cpko"];

      if ($refcap == 0)
        $refutilrate = 0;
      else
        $refutilrate = (float) ((($proc101_cpo + $proc101_cpko) / ($refcap/12)) * 100);

// Kilang Oleo

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qry2 = "select sum(m.cap_lulus) cap_lulus
               from licensedb.license l,lesen_master.mpku_caps m,
               lesen_master.dbp220 d
               where l.F201U4 in (13,14) and
                     l.F201A = m.cap_lesen and
                     m.cap_mmyyyy = '$blnthn' and
                     m.cap_kat = '06' and
                     l.F201A = d.F220A and
                     d.F220D = '2'";

      $res2 = mysqli_query($conn_odbc,$qry2);
      $ad2 = mysqli_fetch_assoc($res2);
      $oleocap = (float) $ad2["cap_lulus"];

      if ($oleocap == NULL)
         $oleocap = 0;

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpo = "select sum(b.F104B9) proc104_cpo
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 in (13,14) and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '1' and
                       b.F104B4 = '01' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reproccpo = mysqli_query($conn_odbc,$qryproccpo);
      $adproccpo = mysqli_fetch_assoc($reproccpo);
      $proc104_cpo = (float) $adproccpo["proc104_cpo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryprocppo = "select sum(b.F104B9) proc104_ppo
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 in (13,14) and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '1' and
                       b.F104B4 != '01' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reprocppo = mysqli_query($conn_odbc,$qryprocppo);
      $adprocppo = mysqli_fetch_assoc($reprocppo);
      $proc104_ppo = (float) $adprocppo["proc104_ppo"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryproccpko = "select sum(b.F104B9) proc104_cpko
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 in (13,14) and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 = '04' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reproccpko = mysqli_query($conn_odbc,$qryproccpko);
      $adproccpko = mysqli_fetch_assoc($reproccpko);
      $proc104_cpko = (float) $adproccpko["proc104_cpko"];

      //odbc_close($conn_odbc);
      //$conn_odbc = odbc_connect("SYBASEPLDB","sa","st5120");

      $qryprocppko = "select sum(b.F104B9) proc104_ppko
                 from pl104ap1 a, pl104bp1 b, licensedb.license l
                 where a.F104A1 = l.F201A and
                       l.F201U4 in (13,14) and
                       a.F104A1 = b.F104B1 and
                       a.F104A4 = b.F104B2 and
                       a.F104A6 = '$tahun' and
                       a.F104A5 = '$bulan' and
                       b.F104B3 = '2' and
                       b.F104B4 != '04' and
                       b.F104B9 not in (0) and
                       b.F104B9 is not NULL";

      $reprocppko = mysqli_query($conn_odbc,$qryprocppko);
      $adprocppko = mysqli_fetch_assoc($reprocppko);
      $proc104_ppko = (float) $adprocppko["proc104_ppko"];

      if ($oleocap == 0)
        $oleoutilrate = 0;
      else
        $oleoutilrate = (float) ((($proc104_cpo + $proc104_ppo + $proc104_cpko + $proc104_ppko) / ($oleocap/12)) * 100);






    echo "Sabah dan Sarawak <br>";
    echo "*** Mills <br>";
    echo "----> oer cpo $oer_cpo, ker pk $ker_pk cpo proc $cpo_proc ffb proc $ffb_proc<br>";
    echo "----> mill hrs $millhrs, mill capacity $millcap, mill utilrate $millutilrate<br>";
    echo "*** Crusher <br>";
    echo "----> oer cpko $oer_cpko, ker pkc $ker_pkc <br>";
    echo "----> crs hrs $crshrs, crs capacity $crscap, crs utilrate $crsutilrate<br>";
    echo "*** Refinery <br>";
    echo "----> ref capacity $refcap, ref utilrate $refutilrate <br>";
    echo "*** Oleo <br>";
    echo "----> oleo capacity $oleocap, oleo utilrate $oleoutilrate <br>";

    $query1 = "select max(oerss_id) as maxoerss_id from oerss";
    $result1 = mysqli_query($conn_mysql,$query1);
    $ad1 = mysqli_fetch_assoc($result1);


    if ($result1)
      {
        $maxno =  $ad1["maxoerss_id"];
        $oerss_id = $maxno + 1;
      }
    else
        $oerss_id = 1;

    $qinsss = "insert into oerss values ('$oerss_id','$tahun','$bulan',
               $oer_cpo,$oer_cpko,$ker_pk,$ker_pkc,$cpo_proc,$ffb_proc)";

    $rinsss = mysqli_query($conn_mysql,$qinsss);
    //$rinsssecon = mysqli_query($conn_mysql,$qinsss,$conn_mysql_econ);

    $query2 = "select max(prodss_id) as maxprodss_id from prodss";
    $result2 = mysqli_query($conn_mysql,$query2);
    $ad2 = mysqli_fetch_assoc($result2);

    if ($result2)
      {
        $maxno1 =  $ad2["maxprodss_id"];
        $prodss_id = $maxno1 + 1;
      }
    else
        $prodss_id = 1;

    $qinsss1 = "insert into prodss values ('$prodss_id','$tahun','$bulan',
                $millhrs,$millcap,$millutilrate,
                $crshrs,$crscap,$crsutilrate,
                $refcap, $refutilrate,
                $oleocap, $oleoutilrate)";

    $rinsss1 = mysqli_query($conn_mysql,$qinsss1);
   //$rinsss1 = mysqli_query($conn_mysql,$qinsss1,$conn_mysql_econ);

   //unblock publik supaya boleh tgk website
   $qrytransfer = "update web_current1 set public_view='Y'
                 where public_view='T'";

   //$rtransfer = mysqli_query($conn_mysql,$qrytransfer,$conn_mysql_econ);

   $qrytransfer2 = "update release10hb set public_view='Y'
                 where public_view='T'";

   //$rtransfer2 = mysqli_query($conn_mysql,$qrytransfer2,$conn_mysql_econ);

}



      }

















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
