<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\P101;
use App\Models\P101D;
use App\Models\P101Master;
use App\Models\P102;
use App\Models\P1022;
use App\Models\P104;
use App\Models\P104Master;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\Pl91Individual;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class Proses10Controller extends Controller
{
    public function admin_10portdatatodq()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama "],
            ['link' => route('admin.10portdatatodq'), 'name' => "Pindahan Penyata Bulanan Ke Dynamic Query "],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses10.10portdatatodq', compact('returnArr', 'layout'));
    }


    public function admin_portingdata(Request $request)
    {
        $this->porting_data($request->tahun, $request->bulan);
        return redirect()->back()->with('success', 'Penyata telah dipindahkan daripada Sistem Sybase');
    }

    public function porting_data($tahun, $bulan) {


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


    $qrydelpl =DB::delete("DELETE from pl91_individual
          where tahun = '$tahun' and
            bulan = '$bulan'");

     $qrydelp101master =DB::delete("DELETE from p101_master
                          where tahun = '$tahun' and
                                bulan = '$bulan'");

     $qrydelp101 =DB::delete("DELETE from p101
                    where tahun = '$tahun' and
                          bulan = '$bulan'");

     $qrydelp101d =DB::delete("DELETE  from p101_d
                     where tahun = '$tahun' and
                           bulan = '$bulan'");

     $qrydelp101mstate =DB::delete("DELETE from p101_monthly_state
                          where tahun = '$tahun'");


     $qrydelp101qstate =DB::delete("DELETE from p101_quarterly_state
                          where Year = '$tahun'");

     $qrydelp101qpelesen =DB::delete("DELETE from p101_quarterly_pelesen
                            where Year = '$tahun'");


     $qrydelp104master =DB::delete("DELETE from p104_master
                          where tahun = '$tahun' and
                                bulan = '$bulan'");

     $qrydelp104 =DB::delete("DELETE from p104
                    where tahun = '$tahun' and
                          bulan = '$bulan'");

     $qrydelp104mstate =DB::delete("DELETE from p104_monthly_state
                       where tahun = '$tahun'");

     $qrydelp104qstate =DB::delete("DELETE from p104_quarterly_state
                          where Year = '$tahun'");

     $qrydelp104qpelesen =DB::delete("DELETE  from p104_quarterly_pelesen
                            where Year = '$tahun'");

     $qrydelp102 =DB::delete("DELETE from p102
                    where tahun = '$tahun' and
                          bulan = '$bulan'");

     $qrydelp1022 =DB::delete("DELETE  from p102_2
                     where tahun = '$tahun' and
                           bulan = '$bulan'");

        // individual pelesen - KILANG BUAH

        $qryind = DB::connection('mysql4')->select("SELECT p.F911A, p.F911D, p.F911C,
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

        $maxind_id = Pl91Individual::max('ind_id');

        if ($maxind_id)
            {
             $ind_id = $maxind_id + 1;
            }
        else
             $ind_id = 1;

         $jumind = 0;

         foreach ($qryind as $row)
         {
          $nolesen = $row->F911A ;
          $tahun = $row->F911D ;
          $bulan = $row->F911C ;
          $namakilang = $row->F201T ;
          $namakilang = strtr($namakilang,$trans);
          $negeri = $row->F201U4 ;
          $daerah = $row->F201U2 ;
          $cpo_proc = (float) $row->F911J1 ;
       //   $cpo_proc = number_format($cpo_proc,2);
          $ffb_proc = (float) $row->F911I ;
       //   $ffb_proc = number_format($ffb_proc,2);

          if ($negeri == NULL)
             $negeri = '00';
          elseif (strlen($negeri) == 1)
             $negeri = '0' . $negeri;

          if ($daerah == NULL)
             $daerah = '00';
          elseif (strlen($daerah) == 1)
             $daerah = '0' . $daerah;

          $oer_cpo = (float) $row->oer_cpo ;
          $oer_cpo = number_format($oer_cpo,2);
          $ker_pk = (float) $row->ker_pk ;
          $ker_pk = number_format($ker_pk,2);

      $ffb_sstock = (float) $row->F911G1 ;
      $cpo_sstock = (float) $row->F911G2 ;
      $pk_sstock = (float) $row->F911G3 ;
      $so_sstock = (float) $row->F911G4 ;
      $ffb_rec = (float) $row->F911H1 ;
      $cpo_rec = (float) $row->F911H2 ;
      $pk_rec = (float) $row->F911H3 ;
      $so_rec = (float) $row->F911H4 ;
      $pk_prod = (float) $row->F911J2 ;
      $so_prod = (float) $row->F911J3 ;
      $ffb_sell = (float) $row->F911K1 ;
      $cpo_sell = (float) $row->F911K2 ;
      $pk_sell = (float) $row->F911K3 ;
      $so_sell = (float) $row->F911K4 ;
      $cpo_export = (float) $row->F911L1 ;
      $pk_export = (float) $row->F911L2 ;
      $so_export = (float) $row->F911L3 ;
      $ffb_estock = (float) $row->F911N1 ;
      $cpo_estock = (float) $row->F911N2 ;
      $pk_estock = (float) $row->F911N3 ;
      $so_estock = (float) $row->F911N4 ;
      $mill_hrs = (float) $row->F911O ;
      $ffb_price = (float) $row->F911R ;
      $ffb_tes = (float) $row->F911S1 ;
      $ffb_tel = (float) $row->F911S2 ;
      $ffb_tpb = (float) $row->F911S3 ;
      $ffb_tpk = (float) $row->F911S4 ;
      $ffb_tkb = (float) $row->F911S5 ;
      $ffb_tll = (float) $row->F911S6 ;
      $cpo_jkb = (float) $row->F911T1 ;
      $cpo_jkp = (float) $row->F911T2 ;
      $cpo_jko = (float) $row->F911T3 ;
      $cpo_jp = (float) $row->F911T4 ;
      $cpo_jps = (float) $row->F911T5 ;
      $cpo_je = (float) $row->F911T6 ;
      $cpo_jt = (float) $row->F911T7 ;
      $cpo_jll = (float) $row->F911T8 ;
      $pk_jki = (float) $row->F911U1 ;
      $pk_jp = (float) $row->F911U2 ;
      $pk_jll = (float) $row->F911U3 ;

      $jumind = $jumind + 1;


      $qrycap = DB::connection('mysql4')->select("SELECT m.cap_lulus
      from lesen_master.mpku_caps m
      where m.cap_lesen = '$nolesen'
      and m.cap_mmyyyy = '$blnthn'
      and  m.cap_kat = '04'");

      foreach ($qrycap as $row) {
        $millcap = $row->cap_lulus ;

      }

      $qinsind2 = DB::insert("INSERT into pl91_individual values ('$ind_id','$nolesen',
      '$bulan','$tahun',
        $ffb_sstock, $cpo_sstock, $pk_sstock, $so_sstock,
        $ffb_rec, $cpo_rec, $pk_rec, $so_rec,
        $ffb_proc, $cpo_proc, $pk_prod, $so_prod,
        $ffb_sell, $cpo_sell, $pk_sell, $so_sell,
        $cpo_export, $pk_export, $so_export,
        $ffb_estock, $cpo_estock, $pk_estock, $so_estock,
        $mill_hrs, $oer_cpo, $ker_pk,
        $ffb_price, $ffb_tes, $ffb_tel, $ffb_tpb, $ffb_tpk, $ffb_tkb, $ffb_tll,
        $cpo_jkb, $cpo_jkp, $cpo_jko, $cpo_jp, $cpo_jps, $cpo_je, $cpo_jt, $cpo_jll,
        $pk_jki, $pk_jp, $pk_jll,
        $millcap, NULL)");

        $ind_id = $ind_id + 1;


        }

        //kilang isirung

        $qryindp102 = DB::connection('mysql4')->select("SELECT F1021A, F1021D, F1021C,
        F1021G1,F1021G2,F1021G3,F1021H1,F1021H2,F1021H3,
        F1021I1,F1021I2,F1021I3,F1021J1,F1021J2,F1021J3,
        F1021K,F1021L1,F1021L2,F1021M1,F1021M2,F1021M3,
        F1021N1,F1021N2,F1021N3,F1021O1,F1021O2,F1021O3,
        F1021Q1,F1021Q2,F1021Q3,F1021R1,F1021R2,F1021R3,
        F1021S1, F1021S2,
        F1021S3, F1021S4
        from pl1021p3
        where F1021D = '$tahun' and
        F1021C = '$bulan'
        order by F1021D, F1021C, F1021A");

        $qryindp1022 = DB::connection('mysql4')->select("SELECT p.F1022A, p.F1022B, p.F1022C,
        p.F1022D, p.F1022E, p.F1022F
        from pl1021p3 c, pl1022p3 p
        where c.F1021A = p.F1022A and
        c.F1021B = p.F1022B and
        c.F1021D = '$tahun' and
        c.F1021C = '$bulan'
        order by c.F1021D, c.F1021C, c.F1021A");

        $query3 = P102::max('noid');

        if ($query3)
            {
             $ind_idp102 = $query3 + 1;
            }
        else
             $ind_idp102 = 1;

        $query4 = P1022::max('noid');

        if ($query4)
            {
             $ind_idp1022 = $query4 + 1;
            }
        else
             $ind_idp1022 = 1;

        $jumindp102 = 0;
        $jumindp1022 = 0;


     foreach ($qryindp102 as $row) {

      $nolesen = $row->F1021A ;
      $tahun = $row->F1021D ;
      $bulan = $row->F1021C ;

        $pk_stkawal_premis = (float) $row->F1021G1 ;
        $cpko_stkawal_premis = (float) $row->F1021G2 ;
        $pkc_stkawal_premis = (float) $row->F1021G3 ;
        $pk_stkawal_ps = (float) $row->F1021H1 ;
        $cpko_stkawal_ps = (float) $row->F1021H2 ;
        $pkc_stkawal_ps = (float) $row->F1021H3 ;
        $pk_belian = (float) $row->F1021I1 ;
        $cpko_belian = (float) $row->F1021I2 ;
        $pkc_belian = (float) $row->F1021I3 ;
        $pk_import = (float) $row->F1021J1 ;
        $cpko_import = (float) $row->F1021J2 ;
        $pkc_import = (float) $row->F1021J3 ;
        $pk_proses = (float) $row->F1021K ;
        $cpko_pengeluaran = (float) $row->F1021L1 ;
        $pkc_pengeluaran = (float) $row->F1021L2 ;
        $pk_jualan = (float) $row->F1021M1 ;
        $cpko_jualan = (float) $row->F1021M2 ;
        $pkc_jualan = (float) $row->F1021M3 ;
        $pk_hantar = (float) $row->F1021N1 ;
        $cpko_hantar = (float) $row->F1021N2 ;
        $pkc_hantar = (float) $row->F1021N3 ;
        $pk_eksport = (float) $row->F1021O1 ;
        $cpko_eksport = (float) $row->F1021O2 ;
        $pkc_eksport = (float) $row->F1021O3 ;
        $pk_stkakhir_premis = (float) $row->F1021Q1 ;
        $cpko_stkakhir_premis = (float) $row->F1021Q2 ;
        $pkc_stkakhir_premis = (float) $row->F1021Q3 ;
        $pk_stkakhir_ps = (float) $row->F1021R1 ;
        $cpko_stkakhir_ps = (float) $row->F1021R2 ;
        $pkc_stkakhir_ps = (float) $row->F1021R3 ;
        $cpko_oer = (float) $row->F1021S1 ;
        $cpko_oer = number_format($cpko_oer,2);
        $pkc_ker = (float) $row->F1021S2 ;
        $pkc_ker = number_format($pkc_ker,2);
        $pk_jumjam = (float) $row->F1021S3 ;
        $pk_utilrate = (float) $row->F1021S4 ;



    $qrycapp102 = DB::connection('mysql4')->select("SELECT m.cap_lulus
    from lesen_master.mpku_caps m
    where m.cap_lesen = '$nolesen'
        and m.cap_mmyyyy = '$blnthn'
        and  m.cap_kat = '05'");

    $crs_capacity = 0;

    foreach ($qrycapp102 as $select) {
        $crs_capacity = $select->cap_lulus ;

    }

    if (!$crs_capacity)
    $crs_capacity = 0;



     $qinsindp102 = DB::insert("INSERT into p102 values ('$ind_idp102','$nolesen',
     '$tahun','$bulan',
    $pk_stkawal_premis, $cpko_stkawal_premis, $pkc_stkawal_premis,
    $pk_stkawal_ps, $cpko_stkawal_ps, $pkc_stkawal_ps,
    $pk_belian, $cpko_belian, $pkc_belian,
    $pk_import, $cpko_import, $pkc_import,
    $pk_proses, $cpko_pengeluaran, $pkc_pengeluaran,
    $pk_jualan, $cpko_jualan, $pkc_jualan,
    $pk_hantar, $cpko_hantar, $pkc_hantar,
    $pk_eksport, $cpko_eksport, $pkc_eksport,
    $pk_stkakhir_premis, $cpko_stkakhir_premis, $pkc_stkakhir_premis,
    $pk_stkakhir_ps, $cpko_stkakhir_ps, $pkc_stkakhir_ps,
    $cpko_oer, $pkc_ker, $pk_jumjam, $pk_utilrate,NULL, $crs_capacity)");

    $ind_idp102 = $ind_idp102 + 1;

    $jumindp102 = $jumindp102 + 1;

    }


    foreach ($qryindp1022 as $row)
       {
        $nolesen = $row ->F1022A ;
        $produk = $row ->F1022C ;
        $jenis_aktiviti = $row ->F1022D ;
	    $jenis_kilang = $row ->F1022E ;
        $kuantiti = (float) $row ->F1022F ;

        $qinsindp1022 = DB::insert("INSERT into p102_2 values ('$ind_idp1022','$nolesen','$tahun','$bulan',
                    '$produk','$jenis_aktiviti','$jenis_kilang',
                     $kuantiti)");

        $ind_idp1022 = $ind_idp1022 + 1;

        $jumindp1022 = $jumindp1022 + 1;
     }


     //KILANG PENAPIS

     $qryindp101a = DB::connection('mysql4')->select("SELECT F101A1, F101A5, F101A6, F101A7, F101A8, F101A9
                from pl101ap3
                where F101A6 = '$tahun' and
                      F101A5 = '$bulan'
                order by F101A6, F101A5, F101A1");

    $qryindp101b = DB::connection('mysql4')->select("SELECT p.F101B1, p.F101B3,
            p.F101B4, p.F101B5, p.F101B6, p.F101B7, p.F101B8, p.F101B9,
            p.F101B10, p.F101B11, p.F101B12, p.F101B13, p.F101B14
            from pl101ap3 c, pl101bp3 p
            where c.F101A1 = p.F101B1 and
            c.F101A4 = p.F101B2 and
            c.F101A6 = '$tahun' and
            c.F101A5 = '$bulan'
            order by c.F101A6, c.F101A5, c.F101A1");


	 $qryindp101c = DB::connection('mysql4')->select("SELECT p.F101C1, p.F101C3,
            p.F101C4, p.F101C5, p.F101C6, p.F101C7, p.F101C8, p.F101C9,
            p.F101C10
            from pl101ap3 c, pl101cp3 p
            where c.F101A1 = p.F101C1 and
            c.F101A4 = p.F101C2 and
            c.F101A6 = '$tahun' and
            c.F101A5 = '$bulan'
            order by c.F101A6, c.F101A5, c.F101A1");


	 $qryindp101d = DB::connection('mysql4')->select("SELECT p.F101D1, p.F101D3, p.F101D4,
            p.F101D5, p.F101D6, p.F101D7, p.F101D8
            from pl101ap3 c, pl101dp3 p
            where c.F101A1 = p.F101D1 and
            c.F101A4 = p.F101D2 and
            c.F101A6 = '$tahun' and
            c.F101A5 = '$bulan'
            order by c.F101A6, c.F101A5, c.F101A1");

        $query5 = P101Master::max('noid');


        if ($query5)
            {
             $ind_idp101a = $query5 + 1;
            }
        else
             $ind_idp101a = 1;


        $query6 =  P101::max('noid');

        if ($query6)
            {
             $ind_idp101b = $query6 + 1;
            }
        else
             $ind_idp101b = 1;


        $query7 = P101D::max('id_p101d');

        if ($query7)
            {
             $ind_idp101d = $query7 + 1;
            }
        else
             $ind_idp101d = 1;

     $jumindp101a = 0;
     $jumindp101b = 0;
     $jumindp101c = 0;
     $jumindp101d = 0;


     foreach ($qryindp101a as $row)
       {
        $nolesen = $row ->F101A1 ;
        $tahun = $row ->F101A6 ;
        $bulan = $row ->F101A5 ;

        $harioperasi = (float) $row ->F101A7 ;
        $cap_ref = (float) $row ->F101A8 ;
        $cap_frac = (float) $row ->F101A9 ;

        $qrycapp101 = DB::connection('mysql4')->select("SELECT m.cap_lulus
                       from lesen_master.mpku_caps m
                       where
                       m.cap_lesen = '$nolesen' and
                       m.cap_mmyyyy = '$blnthn' and
                       m.cap_kat = '06'");

        $refkap = 0;
        foreach ($qrycapp101 as $select) {
            $refkap = $select->cap_lulus ;

            if (!$refkap)
            $refkap = 0;
        }




       $qrystatus101 = DB::connection('mysql4')->select("SELECT F220D
       from lesen_master.dbp220 m
       where
       m.F220A = '$nolesen'");

        $status101 = 0;

        foreach ($qrystatus101 as $select) {
            $status101 = $select->F220D ;

        }

        if (!$status101)
        $status101 = 0;


        $qinsindp101a = DB::insert("INSERT into p101_master values ('$ind_idp101a','$nolesen','$tahun','$bulan',
                        $harioperasi, $cap_ref, $cap_frac,
        		 NULL, NULL, $refkap, NULL, $status101, NULL, NULL, NULL, NULL, NULL, NULL)");

        $ind_idp101a = $ind_idp101a + 1;

        $jumindp101a = $jumindp101a + 1;

       }

    //  echo "Jumlah rekod sudah dipindah bagi individual kilang penapis p101_master $jumindp101a <br> ");


        foreach ($qryindp101b as $row)
        {
        $nolesen = $row ->F101B1 ;
        $prodid = $row ->F101B4 ;
        $prodkump = $row ->F101B3 ;
        if (($prodkump == '1') and ($prodid == '01'))
        {
            $prodkumpval = '01';
        }
        if (($prodkump == '1') and ($prodid <> '01'))
        {
                $prodkumpval = '02';
        }
        if (($prodkump == '2') and ($prodid == '04'))
            {
                $prodkumpval = '03';
        }
        if (($prodkump == '2') and ($prodid <> '04'))
        {
                $prodkumpval = '04';
        }

        $stok_awal_premis = (float)$row ->F101B5 ;
        $stok_awal_ps = (float) $row ->F101B6 ;
        $belian = (float)$row ->F101B7 ;
        $import = (float) $row ->F101B8 ;
        $pengeluaran = (float)$row ->F101B9 ;
        $guna_proses = (float) $row ->F101B10 ;
        $jual_edar = (float)$row ->F101B11 ;
        $eksport = (float) $row ->F101B12 ;
        $stok_akhir_premis = (float)$row ->F101B13 ;
        $stok_akhir_ps = (float) $row ->F101B14 ;


        $qinsindp101b = DB::insert("INSERT into p101 values ('$ind_idp101b','$nolesen','$tahun','$bulan',
                    '$prodid','$prodkumpval',NULL,NULL,$stok_awal_premis,$stok_awal_ps,
                    $belian, $import, $pengeluaran, $guna_proses, $jual_edar, $eksport,
                    $stok_akhir_premis, $stok_akhir_ps)");

        $ind_idp101b = $ind_idp101b + 1;

        $jumindp101b = $jumindp101b + 1;
    }
    // echo "Jumlah rekod sudah dipindah bagi individual kilang penapis $jumindp101b <br> ");


    foreach ($qryindp101c as $row)
       {
        $nolesen = $row ->F101C1 ;
        $prodid = $row ->F101C4 ;
        $prodkump = $row ->F101C3 ;
        if ($prodkump == '1')
        {
			$prodkumpval = '05';
		}
	    elseif ($prodkump == '2')
		{
			$prodkumpval = '06';
		}

	    $stok_awal_premis = (float)$row ->F101C5 ;
        $belian = (float)$row ->F101C6 ;
        $pengeluaran = (float)$row ->F101C7 ;
        $jual_edar = (float)$row ->F101C8 ;
        $eksport = (float) $row ->F101C9 ;
        $stok_akhir_premis = (float)$row ->F101C10 ;


        $qinsindp101c = DB::insert("INSERT into p101 values ('$ind_idp101b','$nolesen','$tahun','$bulan',
                    '$prodid','$prodkumpval',NULL,NULL,$stok_awal_premis,NULL,
                     $belian, NULL, $pengeluaran, NULL, $jual_edar, $eksport,
                     $stok_akhir_premis, NULL)");

        $ind_idp101b = $ind_idp101b + 1;

        $jumindp101c = $jumindp101c + 1;
     }

    //  echo "Jumlah rekod sudah dipindah bagi individual kilang penapis $jumindp101c <br> ");


    $updatep101a = DB::update("UPDATE p101 set prodcat = (select prodcat from produk where prodid = p101.prodid)
        where tahun = '$tahun' and bulan = '$bulan' ");
    $updatep101b = DB::update("UPDATE p101 set produk_ingredient = '01' where produk_kump in ('01','02')
        and tahun = '$tahun' and bulan = '$bulan' ");
    $updatep101c = DB::update("UPDATE p101 set produk_ingredient = '02' where produk_kump in ('03','04')
        and tahun = '$tahun' and bulan = '$bulan' ");
    $updatep101d = DB::update("UPDATE p101 set produk_ingredient = '03' where produk_kump = '05'
        and tahun = '$tahun' and bulan = '$bulan' ");
    $updatep101e = DB::update("UPDATE p101 set produk_ingredient = '04' where produk_kump = '06'
        and tahun = '$tahun' and bulan = '$bulan' ");


    $updatep101f = DB::update("UPDATE p101_master set cpo_proc =
    (select sum(guna_proses) from p101
    where
    p101.nolesen= p101_master.nolesen and
    p101.tahun = p101_master.tahun and
    p101.bulan = p101_master.bulan and
    p101.prodid = '01'
    group by p101.tahun, p101.bulan, p101.nolesen) ");

    $updatep101g = DB::update("UPDATE p101_master set cpko_proc =
    (select sum(guna_proses) from p101
    where
    p101.nolesen= p101_master.nolesen and
    p101.tahun = p101_master.tahun and
    p101.bulan = p101_master.bulan and
    p101.prodid = '04'
    group by p101.tahun, p101.bulan, p101.nolesen) ");

    $updatep101h = DB::update("UPDATE p101_master set ppo_proc =
    (select sum(guna_proses) from p101
    where
    p101.nolesen= p101_master.nolesen and
    p101.tahun = p101_master.tahun and
    p101.bulan = p101_master.bulan and
    p101.prodid != '01' and
    p101.prodcat = '01'
    group by p101.tahun, p101.bulan, p101.nolesen) ");

    $updatep101i = DB::update("UPDATE p101_master set ppko_proc =
    (select sum(guna_proses) from p101
    where
    p101.nolesen= p101_master.nolesen and
    p101.tahun = p101_master.tahun and
    p101.bulan = p101_master.bulan and
    p101.prodid != '04' and
    p101.prodcat = '02'
    group by p101.tahun, p101.bulan, p101.nolesen) ");


	$updatep101j = DB::update("UPDATE p101_master set cpo_proc = 0
        where tahun = '$tahun' and bulan = '$bulan' and cpo_proc is NULL ");
    $updatep101k = DB::update("UPDATE p101_master set cpko_proc = 0
        where tahun = '$tahun' and bulan = '$bulan' and cpko_proc is NULL ");
    $updatep101l = DB::update("UPDATE p101_master set ppo_proc = 0
        where tahun = '$tahun' and bulan = '$bulan' and ppo_proc is NULL ");
    $updatep101m = DB::update("UPDATE p101_master set ppko_proc = 0
          where tahun = '$tahun' and bulan = '$bulan' and ppko_proc is NULL ");


    if ($refkap == 0 || $refkap == null) {
        $updatep101n = DB::update("UPDATE p101_master set refutilrate = 0
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep101o = DB::update("UPDATE p101_master set refutilratecpo = 0
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep101p = DB::update("UPDATE p101_master set refutilratecpko = 0
            where tahun = '$tahun' and bulan = '$bulan'");
        $updatep101q = DB::update("UPDATE p101_master set refutilrateppo = 0
            where tahun = '$tahun' and bulan = '$bulan'");
        $updatep101r = DB::update("UPDATE p101_master set refutilrateppko = 0
            where tahun = '$tahun' and bulan = '$bulan'");
    } else {
        $updatep101n = DB::update("UPDATE p101_master set refutilrate = ((cpo_proc + cpko_proc) / (refkap / 12)) * 100
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep101o = DB::update("UPDATE p101_master set refutilratecpo = (cpo_proc  / (refkap / 12)) * 100
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep101p = DB::update("UPDATE p101_master set refutilratecpko = (cpko_proc / (refkap / 12)) * 100
            where tahun = '$tahun' and bulan = '$bulan'");
        $updatep101q = DB::update("UPDATE p101_master set refutilrateppo = (ppo_proc  / (refkap / 12)) * 100
            where tahun = '$tahun' and bulan = '$bulan'");
        $updatep101r = DB::update("UPDATE p101_master set refutilrateppko = (ppko_proc / (refkap / 12)) * 100
            where tahun = '$tahun' and bulan = '$bulan'");

    }


    $updatep101s = DB::update("UPDATE p101_master set refutilrate = 0
        where tahun = '$tahun' and bulan = '$bulan' and refutilrate is NULL");
    $updatep101t = DB::update("UPDATE p101_master set refutilratecpo = 0
        where tahun = '$tahun' and bulan = '$bulan' and refutilratecpo is NULL");
    $updatep101u = DB::update("UPDATE p101_master set refutilratecpko = 0
        where tahun = '$tahun' and bulan = '$bulan' and refutilratecpko is NULL");
    $updatep101v = DB::update("UPDATE p101_master set refutilrateppo = 0
        where tahun = '$tahun' and bulan = '$bulan' and refutilrateppo is NULL");
    $updatep101w = DB::update("UPDATE p101_master set refutilrateppko = 0
        where tahun = '$tahun' and bulan = '$bulan' and refutilrateppko is NULL");


	// $updatep101n = DB::update("UPDATE p101_master set refutilrate = ((cpo_proc + cpko_proc) / (refkap / 12)) * 100
    //     where tahun = '$tahun' and bulan = '$bulan'");
    // $updatep101o = DB::update("UPDATE p101_master set refutilratecpo = (cpo_proc  / (refkap / 12)) * 100
    //     where tahun = '$tahun' and bulan = '$bulan'");
    // $updatep101p = DB::update("UPDATE p101_master set refutilratecpko = (cpko_proc / (refkap / 12)) * 100
    //     where tahun = '$tahun' and bulan = '$bulan'");
    // $updatep101q = DB::update("UPDATE p101_master set refutilrateppo = (ppo_proc  / (refkap / 12)) * 100
    //     where tahun = '$tahun' and bulan = '$bulan'");
    // $updatep101r = DB::update("UPDATE p101_master set refutilrateppko = (ppko_proc / (refkap / 12)) * 100
    //     where tahun = '$tahun' and bulan = '$bulan'");
    // $updatep101s = DB::update("UPDATE p101_master set refutilrate = 0
    //     where tahun = '$tahun' and bulan = '$bulan' and refutilrate is NULL");
    // $updatep101t = DB::update("UPDATE p101_master set refutilratecpo = 0
    //     where tahun = '$tahun' and bulan = '$bulan' and refutilratecpo is NULL");
    // $updatep101u = DB::update("UPDATE p101_master set refutilratecpko = 0
    //     where tahun = '$tahun' and bulan = '$bulan' and refutilratecpko is NULL");
    // $updatep101v = DB::update("UPDATE p101_master set refutilrateppo = 0
    //     where tahun = '$tahun' and bulan = '$bulan' and refutilrateppo is NULL");
    // $updatep101w = DB::update("UPDATE p101_master set refutilrateppko = 0
    //     where tahun = '$tahun' and bulan = '$bulan' and refutilrateppko is NULL");


	$mthstatep101 = DB::insert("INSERT INTO p101_monthly_state (
        tahun, bulan, negeri, prodid, produk_kump, prodcat,
        stkawal_premis, stkawal_ps, belian, import,
        pengeluaran, guna_proses, jual_edar, eksport,
        stkakhir_premis, stkakhir_ps)
    SELECT 	p.tahun, p.bulan, concat(l.e_negeri,' - ',n.nama_negeri),
        p.prodid, p.produk_kump, p.prodcat,
        sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian),
        sum(p.import), sum(p.pengeluaran),
        sum(p.guna_proses),sum(p.jual_edar), sum(p.eksport),
        sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM 	p101 p, pelesen l, negeri n
    WHERE 	p.nolesen = l.e_nl and  p.tahun = '$tahun' and
        p.bulan in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
    GROUP BY p.tahun, p.bulan, concat(l.e_negeri,' - ',n.nama_negeri),
        p.prodid, p.produk_kump, p.prodcat
    UNION
    SELECT 	p.tahun, p.bulan, '121 SEMENANJUNG MALAYSIA', p.prodid, p.produk_kump, p.prodcat,
        sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian),
        sum(p.import), sum(p.pengeluaran), sum(p.guna_proses),
        sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM 	p101 p, pelesen l
    WHERE	p.nolesen = l.e_nl and p.tahun = '$tahun' and
        p.bulan in ('01','02','03','04','05','06','07','08','09','10','11','12')  and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12')
    GROUP BY  p.tahun, p.bulan, '121 SEMENANJUNG MALAYSIA', p.prodid, p.produk_kump, p.prodcat
    union
    SELECT  p.tahun, p.bulan, concat(l.e_negeri,' - ',n.nama_negeri),
        p.prodid, p.produk_kump, p.prodcat,
        sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian),
        sum(p.import), sum(p.pengeluaran), sum(p.guna_proses),
        sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM 	p101 p, pelesen l, negeri n
    WHERE	p.nolesen = l.e_nl and p.tahun = '$tahun' and
        p.bulan in ('01','02','03','04','05','06','07','08','09','10','11','12')  and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
    GROUP BY  p.tahun, p.bulan, concat(l.e_negeri,' - ',n.nama_negeri),
        p.prodid, p.produk_kump, p.prodcat
    union
    SELECT  p.tahun, p.bulan, '141 SABAH/SARAWAK', p.prodid, p.produk_kump, p.prodcat,
        sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian),
        sum(p.import), sum(p.pengeluaran), sum(p.guna_proses),
        sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM 	p101 p, pelesen l
    WHERE	p.nolesen = l.e_nl and p.tahun = '$tahun' and
        p.bulan in ('01','02','03','04','05','06','07','08','09','10','11','12')  and
            l.e_negeri in ('13','14')
    GROUP BY  p.tahun, p.bulan, '141 SABAH/SARAWAK', p.prodid, p.produk_kump, p.prodcat
    union
    SELECT  p.tahun, p.bulan, '151 MALAYSIA', p.prodid, p.produk_kump, p.prodcat,
        sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian),
        sum(p.import), sum(p.pengeluaran), sum(p.guna_proses),
        sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM 	p101 p, pelesen l
    WHERE	p.nolesen = l.e_nl and p.tahun = '$tahun' and
        p.bulan in  ('01','02','03','04','05','06','07','08','09','10','11','12')  and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14')
    GROUP BY  p.tahun, p.bulan, '151 MALAYSIA', p.prodid, p.produk_kump, p.prodcat");


$qtrpelesenp101a = DB::insert("INSERT into p101_quarterly_pelesen (
    Year, Activities, LicenseNo, ProductGroup, ProductCategory, Product,
    Jan,Feb,Mar,Quarter1,Apr,May,Jun,Quarter2,FirstHalf,Jul,Aug,Sep,Quarter3,SecondHalf,Oct,Nov,Dece,Quarter4,TotalAll )
    select p.tahun,'01', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
    sum(p.stkawal_premis) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'01', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'02', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
    sum(p.stkawal_ps) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'02', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'03', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.belian,0)) as Jan,
    sum(if(p.bulan = '02',p.belian,0)) as Feb,
    sum(if(p.bulan = '03',p.belian,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
    sum(if(p.bulan = '04',p.belian,0)) as Apr,
    sum(if(p.bulan = '05',p.belian,0)) as Mei,
    sum(if(p.bulan = '06',p.belian,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.belian,0)) as Jul,
    sum(if(p.bulan = '08',p.belian,0)) as Aug,
    sum(if(p.bulan = '09',p.belian,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.belian,0)) as Oct,
    sum(if(p.bulan = '11',p.belian,0)) as Nov,
    sum(if(p.bulan = '12',p.belian,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
    sum(p.belian) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'03', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'08', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.import,0)) as Jan,
    sum(if(p.bulan = '02',p.import,0)) as Feb,
    sum(if(p.bulan = '03',p.import,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
    sum(if(p.bulan = '04',p.import,0)) as Apr,
    sum(if(p.bulan = '05',p.import,0)) as Mei,
    sum(if(p.bulan = '06',p.import,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.import,0)) as Jul,
    sum(if(p.bulan = '08',p.import,0)) as Aug,
    sum(if(p.bulan = '09',p.import,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.import,0)) as Oct,
    sum(if(p.bulan = '11',p.import,0)) as Nov,
    sum(if(p.bulan = '12',p.import,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
    sum(p.import) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'08', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'05', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
    sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
    sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
    sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
    sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
    sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
    sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
    sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
    sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
    sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
    sum(p.pengeluaran) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'05', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'04', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
    sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
    sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
    sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
    sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
    sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
    sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
    sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
    sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
    sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
    sum(p.guna_proses) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'04', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'06', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
    sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
    sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
    sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
    sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
    sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
    sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
    sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
    sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
    sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
    sum(p.jual_edar) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'06', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'07', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.eksport,0)) as Jan,
    sum(if(p.bulan = '02',p.eksport,0)) as Feb,
    sum(if(p.bulan = '03',p.eksport,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
    sum(if(p.bulan = '04',p.eksport,0)) as Apr,
    sum(if(p.bulan = '05',p.eksport,0)) as Mei,
    sum(if(p.bulan = '06',p.eksport,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.eksport,0)) as Jul,
    sum(if(p.bulan = '08',p.eksport,0)) as Aug,
    sum(if(p.bulan = '09',p.eksport,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.eksport,0)) as Oct,
    sum(if(p.bulan = '11',p.eksport,0)) as Nov,
    sum(if(p.bulan = '12',p.eksport,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
    sum(p.eksport) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'07', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'09', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
    sum(p.stkakhir_premis) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'09', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid
    union
    select p.tahun,'10', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
    sum(p.stkakhir_ps) as TotalAll
    from p101 p
    where p.tahun = '$tahun'
    group by p.tahun,'10', p.nolesen,
    p.produk_kump, p.prodcat, p.prodid");

     $qtrpelesenp101b = DB::delete("DELETE from p101_quarterly_pelesen where Year = '$tahun' and TotalAll <= 0");

     $qtrstatep101a = DB::insert("INSERT into p101_quarterly_state (
        Year, Activities, State, ProductGroup, ProductCategory, Product,
        Jan,Feb,Mar,Quarter1,Apr,May,Jun,Quarter2,FirstHalf,Jul,Aug,Sep,Quarter3,SecondHalf,Oct,Nov,Dece,Quarter4,TotalAll )

        select p.tahun,'01', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
        sum(p.stkawal_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'01', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'01', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
        sum(p.stkawal_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'01', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'01', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
        sum(p.stkawal_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'01', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'01',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
        sum(p.stkawal_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'01',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'01',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
        sum(p.stkawal_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'01',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'02', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
        sum(p.stkawal_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'02', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'02', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
        sum(p.stkawal_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'02', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'02', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
        sum(p.stkawal_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'02', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'02',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
        sum(p.stkawal_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'02',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'02',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
        sum(p.stkawal_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'02',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'03', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.belian,0)) as Jan,
        sum(if(p.bulan = '02',p.belian,0)) as Feb,
        sum(if(p.bulan = '03',p.belian,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
        sum(if(p.bulan = '04',p.belian,0)) as Apr,
        sum(if(p.bulan = '05',p.belian,0)) as Mei,
        sum(if(p.bulan = '06',p.belian,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.belian,0)) as Jul,
        sum(if(p.bulan = '08',p.belian,0)) as Aug,
        sum(if(p.bulan = '09',p.belian,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.belian,0)) as Oct,
        sum(if(p.bulan = '11',p.belian,0)) as Nov,
        sum(if(p.bulan = '12',p.belian,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
        sum(p.belian) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'03', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'03', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.belian,0)) as Jan,
        sum(if(p.bulan = '02',p.belian,0)) as Feb,
        sum(if(p.bulan = '03',p.belian,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
        sum(if(p.bulan = '04',p.belian,0)) as Apr,
        sum(if(p.bulan = '05',p.belian,0)) as Mei,
        sum(if(p.bulan = '06',p.belian,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.belian,0)) as Jul,
        sum(if(p.bulan = '08',p.belian,0)) as Aug,
        sum(if(p.bulan = '09',p.belian,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.belian,0)) as Oct,
        sum(if(p.bulan = '11',p.belian,0)) as Nov,
        sum(if(p.bulan = '12',p.belian,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
        sum(p.belian) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'03', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'03', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.belian,0)) as Jan,
        sum(if(p.bulan = '02',p.belian,0)) as Feb,
        sum(if(p.bulan = '03',p.belian,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
        sum(if(p.bulan = '04',p.belian,0)) as Apr,
        sum(if(p.bulan = '05',p.belian,0)) as Mei,
        sum(if(p.bulan = '06',p.belian,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.belian,0)) as Jul,
        sum(if(p.bulan = '08',p.belian,0)) as Aug,
        sum(if(p.bulan = '09',p.belian,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.belian,0)) as Oct,
        sum(if(p.bulan = '11',p.belian,0)) as Nov,
        sum(if(p.bulan = '12',p.belian,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
        sum(p.belian) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'03', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'03',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.belian,0)) as Jan,
        sum(if(p.bulan = '02',p.belian,0)) as Feb,
        sum(if(p.bulan = '03',p.belian,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
        sum(if(p.bulan = '04',p.belian,0)) as Apr,
        sum(if(p.bulan = '05',p.belian,0)) as Mei,
        sum(if(p.bulan = '06',p.belian,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.belian,0)) as Jul,
        sum(if(p.bulan = '08',p.belian,0)) as Aug,
        sum(if(p.bulan = '09',p.belian,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.belian,0)) as Oct,
        sum(if(p.bulan = '11',p.belian,0)) as Nov,
        sum(if(p.bulan = '12',p.belian,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
        sum(p.belian) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'03',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'03',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.belian,0)) as Jan,
        sum(if(p.bulan = '02',p.belian,0)) as Feb,
        sum(if(p.bulan = '03',p.belian,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
        sum(if(p.bulan = '04',p.belian,0)) as Apr,
        sum(if(p.bulan = '05',p.belian,0)) as Mei,
        sum(if(p.bulan = '06',p.belian,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.belian,0)) as Jul,
        sum(if(p.bulan = '08',p.belian,0)) as Aug,
        sum(if(p.bulan = '09',p.belian,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.belian,0)) as Oct,
        sum(if(p.bulan = '11',p.belian,0)) as Nov,
        sum(if(p.bulan = '12',p.belian,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
        sum(p.belian) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'03',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'08', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.import,0)) as Jan,
        sum(if(p.bulan = '02',p.import,0)) as Feb,
        sum(if(p.bulan = '03',p.import,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
        sum(if(p.bulan = '04',p.import,0)) as Apr,
        sum(if(p.bulan = '05',p.import,0)) as Mei,
        sum(if(p.bulan = '06',p.import,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.import,0)) as Jul,
        sum(if(p.bulan = '08',p.import,0)) as Aug,
        sum(if(p.bulan = '09',p.import,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.import,0)) as Oct,
        sum(if(p.bulan = '11',p.import,0)) as Nov,
        sum(if(p.bulan = '12',p.import,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
        sum(p.import) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'08', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'08', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.import,0)) as Jan,
        sum(if(p.bulan = '02',p.import,0)) as Feb,
        sum(if(p.bulan = '03',p.import,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
        sum(if(p.bulan = '04',p.import,0)) as Apr,
        sum(if(p.bulan = '05',p.import,0)) as Mei,
        sum(if(p.bulan = '06',p.import,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.import,0)) as Jul,
        sum(if(p.bulan = '08',p.import,0)) as Aug,
        sum(if(p.bulan = '09',p.import,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.import,0)) as Oct,
        sum(if(p.bulan = '11',p.import,0)) as Nov,
        sum(if(p.bulan = '12',p.import,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
        sum(p.import) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'08', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'08', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.import,0)) as Jan,
        sum(if(p.bulan = '02',p.import,0)) as Feb,
        sum(if(p.bulan = '03',p.import,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
        sum(if(p.bulan = '04',p.import,0)) as Apr,
        sum(if(p.bulan = '05',p.import,0)) as Mei,
        sum(if(p.bulan = '06',p.import,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.import,0)) as Jul,
        sum(if(p.bulan = '08',p.import,0)) as Aug,
        sum(if(p.bulan = '09',p.import,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.import,0)) as Oct,
        sum(if(p.bulan = '11',p.import,0)) as Nov,
        sum(if(p.bulan = '12',p.import,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
        sum(p.import) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'08', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'08',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.import,0)) as Jan,
        sum(if(p.bulan = '02',p.import,0)) as Feb,
        sum(if(p.bulan = '03',p.import,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
        sum(if(p.bulan = '04',p.import,0)) as Apr,
        sum(if(p.bulan = '05',p.import,0)) as Mei,
        sum(if(p.bulan = '06',p.import,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.import,0)) as Jul,
        sum(if(p.bulan = '08',p.import,0)) as Aug,
        sum(if(p.bulan = '09',p.import,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.import,0)) as Oct,
        sum(if(p.bulan = '11',p.import,0)) as Nov,
        sum(if(p.bulan = '12',p.import,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
        sum(p.import) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'08',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'08',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.import,0)) as Jan,
        sum(if(p.bulan = '02',p.import,0)) as Feb,
        sum(if(p.bulan = '03',p.import,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
        sum(if(p.bulan = '04',p.import,0)) as Apr,
        sum(if(p.bulan = '05',p.import,0)) as Mei,
        sum(if(p.bulan = '06',p.import,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.import,0)) as Jul,
        sum(if(p.bulan = '08',p.import,0)) as Aug,
        sum(if(p.bulan = '09',p.import,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.import,0)) as Oct,
        sum(if(p.bulan = '11',p.import,0)) as Nov,
        sum(if(p.bulan = '12',p.import,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
        sum(p.import) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'08',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'05', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
        sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
        sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
        sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
        sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
        sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
        sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
        sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
        sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
        sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
        sum(p.pengeluaran) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'05', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'05', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
        sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
        sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
        sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
        sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
        sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
        sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
        sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
        sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
        sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
        sum(p.pengeluaran) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'05', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'05', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
        sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
        sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
        sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
        sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
        sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
        sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
        sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
        sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
        sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
        sum(p.pengeluaran) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'05', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'05',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
        sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
        sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
        sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
        sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
        sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
        sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
        sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
        sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
        sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
        sum(p.pengeluaran) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'05',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'05',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
        sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
        sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
        sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
        sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
        sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
        sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
        sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
        sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
        sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
        sum(p.pengeluaran) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'05',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'04', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
        sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
        sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
        sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
        sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
        sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
        sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
        sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
        sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
        sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
        sum(p.guna_proses) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'04', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'04', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
        sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
        sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
        sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
        sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
        sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
        sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
        sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
        sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
        sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
        sum(p.guna_proses) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'04', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'04', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
        sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
        sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
        sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
        sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
        sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
        sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
        sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
        sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
        sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
        sum(p.guna_proses) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'04', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'04',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
        sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
        sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
        sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
        sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
        sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
        sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
        sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
        sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
        sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
        sum(p.guna_proses) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'04',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'04',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
        sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
        sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
        sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
        sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
        sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
        sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
        sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
        sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
        sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
        sum(p.guna_proses) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'04',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'06', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
        sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
        sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
        sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
        sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
        sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
        sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
        sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
        sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
        sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
        sum(p.jual_edar) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'06', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'06', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
        sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
        sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
        sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
        sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
        sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
        sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
        sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
        sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
        sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
        sum(p.jual_edar) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'06', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'06', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
        sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
        sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
        sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
        sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
        sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
        sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
        sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
        sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
        sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
        sum(p.jual_edar) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'06', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'06',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
        sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
        sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
        sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
        sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
        sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
        sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
        sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
        sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
        sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
        sum(p.jual_edar) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'06',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'06',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
        sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
        sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
        sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
        sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
        sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
        sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
        sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
        sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
        sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
        sum(p.jual_edar) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'06',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'07', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.eksport,0)) as Jan,
        sum(if(p.bulan = '02',p.eksport,0)) as Feb,
        sum(if(p.bulan = '03',p.eksport,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
        sum(if(p.bulan = '04',p.eksport,0)) as Apr,
        sum(if(p.bulan = '05',p.eksport,0)) as Mei,
        sum(if(p.bulan = '06',p.eksport,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.eksport,0)) as Jul,
        sum(if(p.bulan = '08',p.eksport,0)) as Aug,
        sum(if(p.bulan = '09',p.eksport,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.eksport,0)) as Oct,
        sum(if(p.bulan = '11',p.eksport,0)) as Nov,
        sum(if(p.bulan = '12',p.eksport,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
        sum(p.eksport) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'07', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'07', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.eksport,0)) as Jan,
        sum(if(p.bulan = '02',p.eksport,0)) as Feb,
        sum(if(p.bulan = '03',p.eksport,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
        sum(if(p.bulan = '04',p.eksport,0)) as Apr,
        sum(if(p.bulan = '05',p.eksport,0)) as Mei,
        sum(if(p.bulan = '06',p.eksport,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.eksport,0)) as Jul,
        sum(if(p.bulan = '08',p.eksport,0)) as Aug,
        sum(if(p.bulan = '09',p.eksport,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.eksport,0)) as Oct,
        sum(if(p.bulan = '11',p.eksport,0)) as Nov,
        sum(if(p.bulan = '12',p.eksport,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
        sum(p.eksport) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'07', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'07', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.eksport,0)) as Jan,
        sum(if(p.bulan = '02',p.eksport,0)) as Feb,
        sum(if(p.bulan = '03',p.eksport,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
        sum(if(p.bulan = '04',p.eksport,0)) as Apr,
        sum(if(p.bulan = '05',p.eksport,0)) as Mei,
        sum(if(p.bulan = '06',p.eksport,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.eksport,0)) as Jul,
        sum(if(p.bulan = '08',p.eksport,0)) as Aug,
        sum(if(p.bulan = '09',p.eksport,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.eksport,0)) as Oct,
        sum(if(p.bulan = '11',p.eksport,0)) as Nov,
        sum(if(p.bulan = '12',p.eksport,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
        sum(p.eksport) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'07', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'07',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.eksport,0)) as Jan,
        sum(if(p.bulan = '02',p.eksport,0)) as Feb,
        sum(if(p.bulan = '03',p.eksport,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
        sum(if(p.bulan = '04',p.eksport,0)) as Apr,
        sum(if(p.bulan = '05',p.eksport,0)) as Mei,
        sum(if(p.bulan = '06',p.eksport,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.eksport,0)) as Jul,
        sum(if(p.bulan = '08',p.eksport,0)) as Aug,
        sum(if(p.bulan = '09',p.eksport,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.eksport,0)) as Oct,
        sum(if(p.bulan = '11',p.eksport,0)) as Nov,
        sum(if(p.bulan = '12',p.eksport,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
        sum(p.eksport) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'07',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'07',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.eksport,0)) as Jan,
        sum(if(p.bulan = '02',p.eksport,0)) as Feb,
        sum(if(p.bulan = '03',p.eksport,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
        sum(if(p.bulan = '04',p.eksport,0)) as Apr,
        sum(if(p.bulan = '05',p.eksport,0)) as Mei,
        sum(if(p.bulan = '06',p.eksport,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.eksport,0)) as Jul,
        sum(if(p.bulan = '08',p.eksport,0)) as Aug,
        sum(if(p.bulan = '09',p.eksport,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.eksport,0)) as Oct,
        sum(if(p.bulan = '11',p.eksport,0)) as Nov,
        sum(if(p.bulan = '12',p.eksport,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
        sum(p.eksport) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'07',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'09', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
        sum(p.stkakhir_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'09', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'09', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
        sum(p.stkakhir_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'09', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'09', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
        sum(p.stkakhir_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'09', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'09',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
        sum(p.stkakhir_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'09',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'09',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
        sum(p.stkakhir_premis) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'09',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid

        union
        select p.tahun,'10', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
        sum(p.stkakhir_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'10', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'10', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
        sum(p.stkakhir_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'10', '121 SEMENANJUNG MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'10', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
        sum(p.stkakhir_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'10', concat(l.e_negeri,' - ',n.nama_negeri),
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'10',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
        sum(p.stkakhir_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'10',  '141 SABAH/SARAWAK',
        p.produk_kump, p.prodcat, p.prodid
        union
        select p.tahun,'10',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid,
        sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
        sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
        sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
        sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
        sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
        sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
        sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
        sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
        sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
        sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
        sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
        sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
        sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
        sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
        sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
        sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
        sum(p.stkakhir_ps) as TotalAll
        from p101 p, pelesen l, negeri n
        where p.nolesen = l.e_nl and p.tahun = '$tahun' and
            l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
            l.e_negeri = n.kod_negeri
        group by p.tahun,'10',  '151 MALAYSIA',
        p.produk_kump, p.prodcat, p.prodid");

         $qtrstatep101b = DB::delete("DELETE from p101_quarterly_state where Year = '$tahun' and TotalAll <= 0");

         foreach ($qryindp101d as $row) {

          $nolesen = $row->F101D1 ;
          $jenis_aktiviti = (float)$row->F101D3 ;
          $beli_daripada = (float)$row->F101D4 ;
          $cpo = (float)$row->F101D5 ;
          $ppo = (float)$row->F101D6 ;
          $cpko = (float) $row->F101D7 ;
          $ppko = (float)$row->F101D8 ;

          $qinsindp101d = DB::insert("INSERT into p101_d values ('$ind_idp101d','$nolesen','$tahun','$bulan',
                       $jenis_aktiviti, $beli_daripada, $cpo, $ppo, $cpko, $ppko)");

          $ind_idp101d = $ind_idp101d + 1;

          $jumindp101d = $jumindp101d + 1;
       }

    //    echo "Jumlah rekod sudah dipindah bagi individual kilang penapis $jumindp101d <br>");

    //KILANG OLEOKIMIA

    $qryindp104a = DB::connection('mysql4')->select("SELECT F104A1, F104A5, F104A6, F104A7, F104A8
    from pl104ap1
    where F104A6 = '$tahun' and F104A5 = '$bulan'
    order by F104A6, F104A5, F104A1");


    $qryindp104b = DB::connection('mysql4')->select("SELECT p.F104B1, p.F104B3,
    p.F104B4, p.F104B5, p.F104B6, p.F104B7, p.F104B8, p.F104B9,
    p.F104B10, p.F104B11, p.F104B12, p.F104B13
    from pl104ap1 c, pl104bp1 p
    where 	c.F104A1 = p.F104B1 and
    c.F104A4 = p.F104B2 and
    c.F104A6 = '$tahun' and
    c.F104A5 = '$bulan'
    order by c.F104A6, c.F104A5, c.F104A1");


	 $qryindp104c = DB::connection('mysql4')->select("SELECT p.F104C1, p.F104C3,
     p.F104C4, p.F104C5, p.F104C6, p.F104C7, p.F104C8
    from pl104ap1 c, pl104cp1 p
    where 	c.F104A1 = p.F104C1 and
        c.F104A4 = p.F104C2 and
        c.F104A6 = '$tahun' and
        c.F104A5 = '$bulan'
    order by c.F104A6, c.F104A5, c.F104A1");


    $query8 = P104Master::max('noid');

    if ($query8)
    {
    $ind_idp104a = $query8 + 1;
    }
    else
    $ind_idp104a = 1;


    $query9 = P104::max('noid');


    if ($query9)
    {
    $ind_idp104b = $query9 + 1;
    }
    else
    $ind_idp104b = 1;

    $jumindp104a = 0;
    $jumindp104b = 0;
    $jumindp104c = 0;


    foreach ($qryindp104a as $row)
    {
     $nolesen = $row->F104A1 ;
     $tahun = $row->F104A6 ;
     $bulan = $row->F104A5 ;

     $harioperasi = (float) $row->F104A7 ;
     $capacity_dec = (float) $row->F104A8 ;

     $qrycapp104 = DB::connection('mysql4')->select("SELECT m.cap_lulus
                    from lesen_master.mpku_caps m
                    where
                    m.cap_lesen = '$nolesen' and
                    m.cap_mmyyyy = '$blnthn' and
                    m.cap_kat = '06'");


     $oleokap = 0;

     foreach ($qrycapp104 as $ad9) {
        $oleokap = $ad9->cap_lulus ;

     }

     if (!$oleokap)
       $oleokap = 0;

    $qrystatus104 = DB::connection('mysql4')->select("SELECT F220D
                    from lesen_master.dbp220 m
                    where
                    m.F220A = '$nolesen'");


     $status104 = 0;

     foreach ($qrystatus104 as $ad44) {
        $status104 = $ad44->F220D ;

     }

     if (!$status104)
       $status104 = 0;

     $qinsindp104a = DB::insert("INSERT into p104_master values ('$ind_idp104a','$nolesen','$tahun','$bulan', $harioperasi, $capacity_dec,
                      NULL, NULL, $oleokap, NULL, $status104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");


     $ind_idp104a = $ind_idp104a + 1;

     $jumindp104a = $jumindp104a + 1;
  }

//   echo "Jumlah rekod sudah dipindah bagi individual kilang oleokimia p101_master $jumindp104a <br>");



    foreach ($qryindp104b as $row)
    {
    $nolesen = $row->F104B1 ;
    $prodid = $row->F104B4 ;
    $prodkump = $row->F104B3 ;
    if (($prodkump == '1') and ($prodid == '01'))
    {
        $prodkumpval = '01';
    }
    if (($prodkump == '1') and ($prodid <> '01'))
    {
        $prodkumpval = '02';
    }
    if (($prodkump == '2') and ($prodid == '04'))
    {
        $prodkumpval = '03';
    }
    if (($prodkump == '2') and ($prodid <> '04'))
    {
        $prodkumpval = '04';
    }
    if ($prodkump == '3')
    {
        $prodkumpval = '08';
    }

    $stok_awal_premis = (float)$row->F104B5 ;
    $stok_awal_ps = (float) $row->F104B6 ;
    $belian = (float)$row->F104B7 ;
    $import = (float) $row->F104B8 ;

    $guna_proses = (float) $row->F104B9 ;
    $jual_edar = (float)$row->F104B10 ;
    $eksport = (float) $row->F104B11 ;
    $stok_akhir_premis = (float)$row->F104B12 ;
    $stok_akhir_ps = (float) $row->F104B13 ;


    $qinsindp104b = DB::INSERT("INSERT into p104 values ('$ind_idp104b','$nolesen','$tahun','$bulan',
                '$prodid','$prodkumpval',NULL,NULL,$stok_awal_premis,$stok_awal_ps,
                $belian, $import, NULL, $guna_proses, $jual_edar, $eksport,
                $stok_akhir_premis, $stok_akhir_ps)");

    // check table structure p104 prodcat, guna_proses set to NULL


    $ind_idp104b = $ind_idp104b + 1;

    $jumindp104b = $jumindp104b + 1;
    }

    // echo "Jumlah rekod sudah dipindah bagi individual kilang oleokimia $jumindp104b <br>");


    foreach ($qryindp104c as $row)
       {
        $nolesen = $row->F104C1 ;
        $prodid = $row->F104C3 ;
        $prodkump = '07';

        $belian = (float)$row->F104C4 ;
        $pengeluaran = (float)$row->F104C5 ;
        $jual_edar = (float)$row->F104C6 ;
        $eksport = (float) $row->F104C7 ;
        $stok_akhir_premis = (float)$row->F104C8 ;


        $qinsindp104c = DB::INSERT("INSERT into p104 values ('$ind_idp104b','$nolesen','$tahun',
                       '$bulan',
                    '$prodid','$prodkump',NULL,NULL,NULL,NULL,
                     $belian, NULL, $pengeluaran, NULL, $jual_edar, $eksport,
                     $stok_akhir_premis, NULL)");

        $ind_idp104b = $ind_idp104b + 1;

        $jumindp104c = $jumindp104c + 1;
     }

    //  echo "Jumlah rekod sudah dipindah bagi individual kilang oleokimia $jumindp104c <br>");


    $updatep104a =DB::update("UPDATE p104 set prodcat = (select prodcat from produk where prodid = p104.prodid)
        where tahun = '$tahun' and bulan = '$bulan' ");
    $updatep104b =DB::update("UPDATE p104 set prodsubcat = (select sub_group from produk where prodid = p104.prodid)
        where tahun = '$tahun' and bulan = '$bulan' ");

    $updatep104f =DB::update("UPDATE p104_master set cpo_proc = (select sum(guna_proses)
    from p104
    where
    p104.nolesen= p104_master.nolesen and
    p104.tahun = p104_master.tahun and
    p104.bulan = p104_master.bulan and
    p104.prodid = '01'
    group by p104.tahun, p104.bulan, p104.nolesen)");

    $updatep104g =DB::update("UPDATE p104_master set cpko_proc = (select sum(guna_proses)
    from p104
    where
    p104.nolesen= p104_master.nolesen and
    p104.tahun = p104_master.tahun and
    p104.bulan = p104_master.bulan and
    p104.prodid = '04'
    group by p104.tahun, p104.bulan, p104.nolesen)");

    $updatep104h =DB::update("UPDATE p104_master set ppo_proc = (select sum(guna_proses)
    from p104
    where
    p104.nolesen= p104_master.nolesen and
    p104.tahun = p104_master.tahun and
    p104.bulan = p104_master.bulan and
    p104.prodid != '01' and
    p104.prodcat = '01'
    group by p104.tahun, p104.bulan, p104.nolesen)");

    $updatep104i =DB::update("UPDATE p104_master set ppko_proc = (select sum(guna_proses)
    from p104
    where
    p104.nolesen= p104_master.nolesen and
    p104.tahun = p104_master.tahun and
    p104.bulan = p104_master.bulan and
    p104.prodid != '04' and
    p104.prodcat = '02'
    group by p104.tahun, p104.bulan, p104.nolesen)");

    $updatep104j =DB::update("UPDATE p104_master set cpo_proc = 0
    where tahun = '$tahun' and bulan = '$bulan' and cpo_proc is NULL");
    $updatep104k =DB::update("UPDATE p104_master set cpko_proc = 0
    where tahun = '$tahun' and bulan = '$bulan' and cpko_proc is NULL");
    $updatep104l =DB::update("UPDATE p104_master set ppo_proc = 0
    where tahun = '$tahun' and bulan = '$bulan' and ppo_proc is NULL");
    $updatep104m =DB::update("UPDATE p104_master set ppko_proc = 0
    where tahun = '$tahun' and bulan = '$bulan' and ppko_proc is NULL");




     if ($oleokap == 0 || $oleokap == null) {
        $updatep104n =DB::update("UPDATE p104_master set oleoutilrate = 0
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep104o =DB::update("UPDATE p104_master set oleoutilratecpo = 0
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep104p =DB::update("UPDATE p104_master set oleoutilratecpko = 0
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep104q =DB::update("UPDATE p104_master set oleoutilrateppo = 0
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep104r =DB::update("UPDATE p104_master set oleoutilrateppko = 0
        where tahun = '$tahun' and bulan = '$bulan'");
     } else {
        $updatep104n =DB::update("UPDATE p104_master set oleoutilrate = ((cpo_proc + cpko_proc) / (oleokap / 12)) * 100
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep104o =DB::update("UPDATE p104_master set oleoutilratecpo = (cpo_proc  / (oleokap / 12)) * 100
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep104p =DB::update("UPDATE p104_master set oleoutilratecpko = (cpko_proc / (oleokap / 12)) * 100
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep104q =DB::update("UPDATE p104_master set oleoutilrateppo = (ppo_proc  / (oleokap / 12)) * 100
        where tahun = '$tahun' and bulan = '$bulan'");
        $updatep104r =DB::update("UPDATE p104_master set oleoutilrateppko = (ppko_proc / (oleokap / 12)) * 100
        where tahun = '$tahun' and bulan = '$bulan'");
     }

    $updatep104s =DB::update("UPDATE p104_master set oleoutilrate = 0
    where tahun = '$tahun' and bulan = '$bulan' and oleoutilrate is NULL");
    $updatep104t =DB::update("UPDATE p104_master set oleoutilratecpo = 0
    where tahun = '$tahun' and bulan = '$bulan' and oleoutilratecpo is NULL");
    $updatep104u =DB::update("UPDATE p104_master set oleoutilratecpko = 0
    where tahun = '$tahun' and bulan = '$bulan' and oleoutilratecpko is NULL");
    $updatep104v =DB::update("UPDATE p104_master set oleoutilrateppo = 0
    where tahun = '$tahun' and bulan = '$bulan' and oleoutilrateppo is NULL");
    $updatep104w =DB::update("UPDATE p104_master set oleoutilrateppko = 0
    where tahun = '$tahun' and bulan = '$bulan' and oleoutilrateppko is NULL");


    $mthstatep104 = DB::insert(
    "INSERT into p104_monthly_state (
    tahun, bulan, negeri, prodid, produk_kump, prodcat, prodsubcat,
    stkawal_premis, stkawal_ps, belian, import,
    pengeluaran, guna_proses, jual_edar, eksport,
    stkakhir_premis, stkakhir_ps)
    SELECT p.tahun, p.bulan, concat(l.e_negeri,' - ',n.nama_negeri), p.prodid, p.produk_kump, p.prodcat, p.prodsubcat,
    sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian), sum(p.import), sum(p.pengeluaran),
    sum(p.guna_proses),sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM p104 p, pelesen l, negeri n
    WHERE p.nolesen = l.e_nl and  p.tahun = '$tahun' and p.bulan in  ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    GROUP BY p.tahun, p.bulan, concat(l.e_negeri,' - ',n.nama_negeri), p.prodid, p.produk_kump, p.prodcat, p.prodsubcat
    union
    SELECT p.tahun, p.bulan, '121 SEMENANJUNG MALAYSIA', p.prodid, p.produk_kump, p.prodcat, p.prodsubcat,
    sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian), sum(p.import), sum(p.pengeluaran), sum(p.guna_proses),
    sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM
    p104 p, pelesen l
    WHERE
    p.nolesen = l.e_nl and  p.tahun = '$tahun' and p.bulan in  ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12')
    GROUP BY  p.tahun, p.bulan, '121 SEMENANJUNG MALAYSIA', p.prodid, p.produk_kump, p.prodcat, p.prodsubcat
    union
    SELECT  p.tahun, p.bulan, concat(l.e_negeri,' - ',n.nama_negeri), p.prodid, p.produk_kump, p.prodcat, p.prodsubcat,
    sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian), sum(p.import), sum(p.pengeluaran), sum(p.guna_proses),
    sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM
    p104 p, pelesen l, negeri n
    WHERE
    p.nolesen = l.e_nl and  p.tahun = '$tahun' and p.bulan in  ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    GROUP BY  p.tahun, p.bulan, concat(l.e_negeri,' - ',n.nama_negeri), p.prodid, p.produk_kump, p.prodcat, p.prodsubcat
    union
    SELECT  p.tahun, p.bulan, '141 SABAH/SARAWAK', p.prodid, p.produk_kump, p.prodcat, p.prodsubcat,
    sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian), sum(p.import), sum(p.pengeluaran), sum(p.guna_proses),
    sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM
    p104 p, pelesen l
    WHERE
    p.nolesen = l.e_nl and  p.tahun = '$tahun' and p.bulan in  ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri in ('13','14')
    GROUP BY  p.tahun, p.bulan, '141 SABAH/SARAWAK', p.prodid, p.produk_kump, p.prodcat, p.prodsubcat
    union
    SELECT  p.tahun, p.bulan, '151 MALAYSIA', p.prodid, p.produk_kump, p.prodcat, p.prodsubcat,
    sum(p.stkawal_premis), sum(p.stkawal_ps), sum(p.belian), sum(p.import), sum(p.pengeluaran), sum(p.guna_proses),
    sum(p.jual_edar), sum(p.eksport), sum(p.stkakhir_premis), sum(p.stkakhir_ps)
    FROM
    p104 p, pelesen l
    WHERE
    p.nolesen = l.e_nl and  p.tahun = '$tahun' and p.bulan in  ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14')
    GROUP BY  p.tahun, p.bulan, '151 MALAYSIA', p.prodid, p.produk_kump, p.prodcat, p.prodsubcat");

    // $rmthstatep104 = mysqli_query($conn_mysql,$mthstatep104);

    $qtrpelesenp104a = DB::insert("INSERT into p104_quarterly_pelesen (
    Year, Activities,LicenseNo, ProductGroup, ProductCategory, ProductSubGroup, Product,
    Jan,Feb,Mar,Quarter1,Apr,May,Jun,Quarter2, FirstHalf,
    Jul,Aug,Sep,Quarter3, SecondHalf,
    Oct,Nov,Dece,Quarter4,TotalAll)
    select p.tahun,'01', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
    sum(p.stkawal_premis) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'01', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'02', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
    sum(p.stkawal_ps) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'02', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'03', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.belian,0)) as Jan,
    sum(if(p.bulan = '02',p.belian,0)) as Feb,
    sum(if(p.bulan = '03',p.belian,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
    sum(if(p.bulan = '04',p.belian,0)) as Apr,
    sum(if(p.bulan = '05',p.belian,0)) as Mei,
    sum(if(p.bulan = '06',p.belian,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.belian,0)) as Jul,
    sum(if(p.bulan = '08',p.belian,0)) as Aug,
    sum(if(p.bulan = '09',p.belian,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.belian,0)) as Oct,
    sum(if(p.bulan = '11',p.belian,0)) as Nov,
    sum(if(p.bulan = '12',p.belian,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
    sum(p.belian) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'03', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'08', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.import,0)) as Jan,
    sum(if(p.bulan = '02',p.import,0)) as Feb,
    sum(if(p.bulan = '03',p.import,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
    sum(if(p.bulan = '04',p.import,0)) as Apr,
    sum(if(p.bulan = '05',p.import,0)) as Mei,
    sum(if(p.bulan = '06',p.import,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.import,0)) as Jul,
    sum(if(p.bulan = '08',p.import,0)) as Aug,
    sum(if(p.bulan = '09',p.import,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.import,0)) as Oct,
    sum(if(p.bulan = '11',p.import,0)) as Nov,
    sum(if(p.bulan = '12',p.import,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
    sum(p.import) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'08', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'05', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
    sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
    sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
    sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
    sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
    sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
    sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
    sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
    sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
    sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
    sum(p.pengeluaran) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'05', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'04', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
    sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
    sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
    sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
    sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
    sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
    sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
    sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
    sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
    sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
    sum(p.guna_proses) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'04', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'06', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
    sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
    sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
    sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
    sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
    sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
    sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
    sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
    sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
    sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
    sum(p.jual_edar) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'06', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'07', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.eksport,0)) as Jan,
    sum(if(p.bulan = '02',p.eksport,0)) as Feb,
    sum(if(p.bulan = '03',p.eksport,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
    sum(if(p.bulan = '04',p.eksport,0)) as Apr,
    sum(if(p.bulan = '05',p.eksport,0)) as Mei,
    sum(if(p.bulan = '06',p.eksport,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.eksport,0)) as Jul,
    sum(if(p.bulan = '08',p.eksport,0)) as Aug,
    sum(if(p.bulan = '09',p.eksport,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.eksport,0)) as Oct,
    sum(if(p.bulan = '11',p.eksport,0)) as Nov,
    sum(if(p.bulan = '12',p.eksport,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
    sum(p.eksport) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'07', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'09', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
    sum(p.stkakhir_premis) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'09', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'10', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
    sum(p.stkakhir_ps) as TotalAll
    from p104 p
    where p.tahun = '$tahun'
    group by p.tahun,'10', p.nolesen,
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid");

    $qtrpelesenp104b = DB::DELETE("DELETE from p104_quarterly_pelesen where Year = '$tahun' and TotalAll <= 0");

    //  $rqtrpelesenp104a = mysqli_query($conn_mysql,$qtrpelesenp104a);
    //  $rqtrpelesenp104b = mysqli_query($conn_mysql,$qtrpelesenp104b);


    $qtrstatep104a = DB::insert("INSERT into p104_quarterly_state (
    Year, Activities, State, ProductGroup, ProductCategory, ProductSubGroup, Product,
    Jan,Feb,Mar,Quarter1,Apr,May,Jun,Quarter2,FirstHalf,Jul,Aug,Sep,Quarter3,SecondHalf,Oct,Nov,Dece,Quarter4,TotalAll )
    select p.tahun,'01', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
    sum(p.stkawal_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'01', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'01', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
    sum(p.stkawal_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'01', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'01', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
    sum(p.stkawal_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'01', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'01',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
    sum(p.stkawal_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'01',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'01',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_premis,0)) as Quarter4,
    sum(p.stkawal_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'01',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid

    union
    select p.tahun,'02', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
    sum(p.stkawal_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'02', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'02', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
    sum(p.stkawal_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'02', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'02', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
    sum(p.stkawal_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'02', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'02',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
    sum(p.stkawal_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'02',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'02',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.stkawal_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkawal_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkawal_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkawal_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkawal_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkawal_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkawal_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkawal_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkawal_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkawal_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkawal_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkawal_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkawal_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkawal_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkawal_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkawal_ps,0)) as Quarter4,
    sum(p.stkawal_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'02',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid

    union
    select p.tahun,'03', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.belian,0)) as Jan,
    sum(if(p.bulan = '02',p.belian,0)) as Feb,
    sum(if(p.bulan = '03',p.belian,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
    sum(if(p.bulan = '04',p.belian,0)) as Apr,
    sum(if(p.bulan = '05',p.belian,0)) as Mei,
    sum(if(p.bulan = '06',p.belian,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.belian,0)) as Jul,
    sum(if(p.bulan = '08',p.belian,0)) as Aug,
    sum(if(p.bulan = '09',p.belian,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.belian,0)) as Oct,
    sum(if(p.bulan = '11',p.belian,0)) as Nov,
    sum(if(p.bulan = '12',p.belian,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
    sum(p.belian) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'03', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'03', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.belian,0)) as Jan,
    sum(if(p.bulan = '02',p.belian,0)) as Feb,
    sum(if(p.bulan = '03',p.belian,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
    sum(if(p.bulan = '04',p.belian,0)) as Apr,
    sum(if(p.bulan = '05',p.belian,0)) as Mei,
    sum(if(p.bulan = '06',p.belian,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.belian,0)) as Jul,
    sum(if(p.bulan = '08',p.belian,0)) as Aug,
    sum(if(p.bulan = '09',p.belian,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.belian,0)) as Oct,
    sum(if(p.bulan = '11',p.belian,0)) as Nov,
    sum(if(p.bulan = '12',p.belian,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
    sum(p.belian) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'03', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'03', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.belian,0)) as Jan,
    sum(if(p.bulan = '02',p.belian,0)) as Feb,
    sum(if(p.bulan = '03',p.belian,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
    sum(if(p.bulan = '04',p.belian,0)) as Apr,
    sum(if(p.bulan = '05',p.belian,0)) as Mei,
    sum(if(p.bulan = '06',p.belian,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.belian,0)) as Jul,
    sum(if(p.bulan = '08',p.belian,0)) as Aug,
    sum(if(p.bulan = '09',p.belian,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.belian,0)) as Oct,
    sum(if(p.bulan = '11',p.belian,0)) as Nov,
    sum(if(p.bulan = '12',p.belian,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
    sum(p.belian) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'03', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'03',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.belian,0)) as Jan,
    sum(if(p.bulan = '02',p.belian,0)) as Feb,
    sum(if(p.bulan = '03',p.belian,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
    sum(if(p.bulan = '04',p.belian,0)) as Apr,
    sum(if(p.bulan = '05',p.belian,0)) as Mei,
    sum(if(p.bulan = '06',p.belian,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.belian,0)) as Jul,
    sum(if(p.bulan = '08',p.belian,0)) as Aug,
    sum(if(p.bulan = '09',p.belian,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.belian,0)) as Oct,
    sum(if(p.bulan = '11',p.belian,0)) as Nov,
    sum(if(p.bulan = '12',p.belian,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
    sum(p.belian) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'03',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'03',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.belian,0)) as Jan,
    sum(if(p.bulan = '02',p.belian,0)) as Feb,
    sum(if(p.bulan = '03',p.belian,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.belian,0)) as Quarter1,
    sum(if(p.bulan = '04',p.belian,0)) as Apr,
    sum(if(p.bulan = '05',p.belian,0)) as Mei,
    sum(if(p.bulan = '06',p.belian,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.belian,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.belian,0)) as Jul,
    sum(if(p.bulan = '08',p.belian,0)) as Aug,
    sum(if(p.bulan = '09',p.belian,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.belian,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.belian,0)) as Oct,
    sum(if(p.bulan = '11',p.belian,0)) as Nov,
    sum(if(p.bulan = '12',p.belian,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.belian,0)) as Quarter4,
    sum(p.belian) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'03',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid

    union
    select p.tahun,'08', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.import,0)) as Jan,
    sum(if(p.bulan = '02',p.import,0)) as Feb,
    sum(if(p.bulan = '03',p.import,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
    sum(if(p.bulan = '04',p.import,0)) as Apr,
    sum(if(p.bulan = '05',p.import,0)) as Mei,
    sum(if(p.bulan = '06',p.import,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.import,0)) as Jul,
    sum(if(p.bulan = '08',p.import,0)) as Aug,
    sum(if(p.bulan = '09',p.import,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.import,0)) as Oct,
    sum(if(p.bulan = '11',p.import,0)) as Nov,
    sum(if(p.bulan = '12',p.import,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
    sum(p.import) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'08', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'08', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.import,0)) as Jan,
    sum(if(p.bulan = '02',p.import,0)) as Feb,
    sum(if(p.bulan = '03',p.import,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
    sum(if(p.bulan = '04',p.import,0)) as Apr,
    sum(if(p.bulan = '05',p.import,0)) as Mei,
    sum(if(p.bulan = '06',p.import,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.import,0)) as Jul,
    sum(if(p.bulan = '08',p.import,0)) as Aug,
    sum(if(p.bulan = '09',p.import,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.import,0)) as Oct,
    sum(if(p.bulan = '11',p.import,0)) as Nov,
    sum(if(p.bulan = '12',p.import,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
    sum(p.import) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'08', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'08', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.import,0)) as Jan,
    sum(if(p.bulan = '02',p.import,0)) as Feb,
    sum(if(p.bulan = '03',p.import,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
    sum(if(p.bulan = '04',p.import,0)) as Apr,
    sum(if(p.bulan = '05',p.import,0)) as Mei,
    sum(if(p.bulan = '06',p.import,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.import,0)) as Jul,
    sum(if(p.bulan = '08',p.import,0)) as Aug,
    sum(if(p.bulan = '09',p.import,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.import,0)) as Oct,
    sum(if(p.bulan = '11',p.import,0)) as Nov,
    sum(if(p.bulan = '12',p.import,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
    sum(p.import) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'08', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'08',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.import,0)) as Jan,
    sum(if(p.bulan = '02',p.import,0)) as Feb,
    sum(if(p.bulan = '03',p.import,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
    sum(if(p.bulan = '04',p.import,0)) as Apr,
    sum(if(p.bulan = '05',p.import,0)) as Mei,
    sum(if(p.bulan = '06',p.import,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.import,0)) as Jul,
    sum(if(p.bulan = '08',p.import,0)) as Aug,
    sum(if(p.bulan = '09',p.import,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.import,0)) as Oct,
    sum(if(p.bulan = '11',p.import,0)) as Nov,
    sum(if(p.bulan = '12',p.import,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
    sum(p.import) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'08',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'08',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.import,0)) as Jan,
    sum(if(p.bulan = '02',p.import,0)) as Feb,
    sum(if(p.bulan = '03',p.import,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.import,0)) as Quarter1,
    sum(if(p.bulan = '04',p.import,0)) as Apr,
    sum(if(p.bulan = '05',p.import,0)) as Mei,
    sum(if(p.bulan = '06',p.import,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.import,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.import,0)) as Jul,
    sum(if(p.bulan = '08',p.import,0)) as Aug,
    sum(if(p.bulan = '09',p.import,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.import,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.import,0)) as Oct,
    sum(if(p.bulan = '11',p.import,0)) as Nov,
    sum(if(p.bulan = '12',p.import,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.import,0)) as Quarter4,
    sum(p.import) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'08',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid

    union
    select p.tahun,'05', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
    sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
    sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
    sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
    sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
    sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
    sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
    sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
    sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
    sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
    sum(p.pengeluaran) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'05', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'05', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
    sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
    sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
    sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
    sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
    sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
    sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
    sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
    sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
    sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
    sum(p.pengeluaran) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'05', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'05', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
    sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
    sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
    sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
    sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
    sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
    sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
    sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
    sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
    sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
    sum(p.pengeluaran) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'05', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'05',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
    sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
    sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
    sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
    sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
    sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
    sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
    sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
    sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
    sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
    sum(p.pengeluaran) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'05',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid
    union
    select p.tahun,'05',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat, p.prodid,
    sum(if(p.bulan = '01',p.pengeluaran,0)) as Jan,
    sum(if(p.bulan = '02',p.pengeluaran,0)) as Feb,
    sum(if(p.bulan = '03',p.pengeluaran,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.pengeluaran,0)) as Quarter1,
    sum(if(p.bulan = '04',p.pengeluaran,0)) as Apr,
    sum(if(p.bulan = '05',p.pengeluaran,0)) as Mei,
    sum(if(p.bulan = '06',p.pengeluaran,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.pengeluaran,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.pengeluaran,0)) as Jul,
    sum(if(p.bulan = '08',p.pengeluaran,0)) as Aug,
    sum(if(p.bulan = '09',p.pengeluaran,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.pengeluaran,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.pengeluaran,0)) as Oct,
    sum(if(p.bulan = '11',p.pengeluaran,0)) as Nov,
    sum(if(p.bulan = '12',p.pengeluaran,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.pengeluaran,0)) as Quarter4,
    sum(p.pengeluaran) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'05',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid

    union
    select p.tahun,'04', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
    sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
    sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
    sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
    sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
    sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
    sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
    sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
    sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
    sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
    sum(p.guna_proses) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'04', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'04', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
    sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
    sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
    sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
    sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
    sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
    sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
    sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
    sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
    sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
    sum(p.guna_proses) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'04', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'04', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
    sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
    sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
    sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
    sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
    sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
    sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
    sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
    sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
    sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
    sum(p.guna_proses) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'04', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'04',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
    sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
    sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
    sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
    sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
    sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
    sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
    sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
    sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
    sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
    sum(p.guna_proses) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'04',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'04',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.guna_proses,0)) as Jan,
    sum(if(p.bulan = '02',p.guna_proses,0)) as Feb,
    sum(if(p.bulan = '03',p.guna_proses,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.guna_proses,0)) as Quarter1,
    sum(if(p.bulan = '04',p.guna_proses,0)) as Apr,
    sum(if(p.bulan = '05',p.guna_proses,0)) as Mei,
    sum(if(p.bulan = '06',p.guna_proses,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.guna_proses,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.guna_proses,0)) as Jul,
    sum(if(p.bulan = '08',p.guna_proses,0)) as Aug,
    sum(if(p.bulan = '09',p.guna_proses,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.guna_proses,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.guna_proses,0)) as Oct,
    sum(if(p.bulan = '11',p.guna_proses,0)) as Nov,
    sum(if(p.bulan = '12',p.guna_proses,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.guna_proses,0)) as Quarter4,
    sum(p.guna_proses) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'04',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid

    union
    select p.tahun,'06', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
    sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
    sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
    sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
    sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
    sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
    sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
    sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
    sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
    sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
    sum(p.jual_edar) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'06', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'06', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
    sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
    sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
    sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
    sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
    sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
    sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
    sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
    sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
    sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
    sum(p.jual_edar) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'06', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'06', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
    sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
    sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
    sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
    sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
    sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
    sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
    sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
    sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
    sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
    sum(p.jual_edar) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'06', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'06',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
    sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
    sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
    sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
    sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
    sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
    sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
    sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
    sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
    sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
    sum(p.jual_edar) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'06',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'06',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.jual_edar,0)) as Jan,
    sum(if(p.bulan = '02',p.jual_edar,0)) as Feb,
    sum(if(p.bulan = '03',p.jual_edar,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.jual_edar,0)) as Quarter1,
    sum(if(p.bulan = '04',p.jual_edar,0)) as Apr,
    sum(if(p.bulan = '05',p.jual_edar,0)) as Mei,
    sum(if(p.bulan = '06',p.jual_edar,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.jual_edar,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.jual_edar,0)) as Jul,
    sum(if(p.bulan = '08',p.jual_edar,0)) as Aug,
    sum(if(p.bulan = '09',p.jual_edar,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.jual_edar,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.jual_edar,0)) as Oct,
    sum(if(p.bulan = '11',p.jual_edar,0)) as Nov,
    sum(if(p.bulan = '12',p.jual_edar,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.jual_edar,0)) as Quarter4,
    sum(p.jual_edar) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'06',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid

    union
    select p.tahun,'07', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.eksport,0)) as Jan,
    sum(if(p.bulan = '02',p.eksport,0)) as Feb,
    sum(if(p.bulan = '03',p.eksport,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
    sum(if(p.bulan = '04',p.eksport,0)) as Apr,
    sum(if(p.bulan = '05',p.eksport,0)) as Mei,
    sum(if(p.bulan = '06',p.eksport,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.eksport,0)) as Jul,
    sum(if(p.bulan = '08',p.eksport,0)) as Aug,
    sum(if(p.bulan = '09',p.eksport,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.eksport,0)) as Oct,
    sum(if(p.bulan = '11',p.eksport,0)) as Nov,
    sum(if(p.bulan = '12',p.eksport,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
    sum(p.eksport) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'07', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'07', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.eksport,0)) as Jan,
    sum(if(p.bulan = '02',p.eksport,0)) as Feb,
    sum(if(p.bulan = '03',p.eksport,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
    sum(if(p.bulan = '04',p.eksport,0)) as Apr,
    sum(if(p.bulan = '05',p.eksport,0)) as Mei,
    sum(if(p.bulan = '06',p.eksport,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.eksport,0)) as Jul,
    sum(if(p.bulan = '08',p.eksport,0)) as Aug,
    sum(if(p.bulan = '09',p.eksport,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.eksport,0)) as Oct,
    sum(if(p.bulan = '11',p.eksport,0)) as Nov,
    sum(if(p.bulan = '12',p.eksport,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
    sum(p.eksport) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'07', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'07', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.eksport,0)) as Jan,
    sum(if(p.bulan = '02',p.eksport,0)) as Feb,
    sum(if(p.bulan = '03',p.eksport,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
    sum(if(p.bulan = '04',p.eksport,0)) as Apr,
    sum(if(p.bulan = '05',p.eksport,0)) as Mei,
    sum(if(p.bulan = '06',p.eksport,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.eksport,0)) as Jul,
    sum(if(p.bulan = '08',p.eksport,0)) as Aug,
    sum(if(p.bulan = '09',p.eksport,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.eksport,0)) as Oct,
    sum(if(p.bulan = '11',p.eksport,0)) as Nov,
    sum(if(p.bulan = '12',p.eksport,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
    sum(p.eksport) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'07', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'07',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.eksport,0)) as Jan,
    sum(if(p.bulan = '02',p.eksport,0)) as Feb,
    sum(if(p.bulan = '03',p.eksport,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
    sum(if(p.bulan = '04',p.eksport,0)) as Apr,
    sum(if(p.bulan = '05',p.eksport,0)) as Mei,
    sum(if(p.bulan = '06',p.eksport,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.eksport,0)) as Jul,
    sum(if(p.bulan = '08',p.eksport,0)) as Aug,
    sum(if(p.bulan = '09',p.eksport,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.eksport,0)) as Oct,
    sum(if(p.bulan = '11',p.eksport,0)) as Nov,
    sum(if(p.bulan = '12',p.eksport,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
    sum(p.eksport) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'07',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'07',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.eksport,0)) as Jan,
    sum(if(p.bulan = '02',p.eksport,0)) as Feb,
    sum(if(p.bulan = '03',p.eksport,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.eksport,0)) as Quarter1,
    sum(if(p.bulan = '04',p.eksport,0)) as Apr,
    sum(if(p.bulan = '05',p.eksport,0)) as Mei,
    sum(if(p.bulan = '06',p.eksport,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.eksport,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.eksport,0)) as Jul,
    sum(if(p.bulan = '08',p.eksport,0)) as Aug,
    sum(if(p.bulan = '09',p.eksport,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.eksport,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.eksport,0)) as Oct,
    sum(if(p.bulan = '11',p.eksport,0)) as Nov,
    sum(if(p.bulan = '12',p.eksport,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.eksport,0)) as Quarter4,
    sum(p.eksport) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'07',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid

    union
    select p.tahun,'09', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
    sum(p.stkakhir_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'09', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'09', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
    sum(p.stkakhir_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'09', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'09', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
    sum(p.stkakhir_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'09', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'09',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
    sum(p.stkakhir_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'09',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'09',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_premis,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_premis,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_premis,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_premis,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_premis,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_premis,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_premis,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_premis,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_premis,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_premis,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_premis,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_premis,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_premis,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_premis,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_premis,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_premis,0)) as Quarter4,
    sum(p.stkakhir_premis) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'09',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid

    union
    select p.tahun,'10', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
    sum(p.stkakhir_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'10', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'10', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
    sum(p.stkakhir_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'10', '121 SEMENANJUNG MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'10', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
    sum(p.stkakhir_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'10', concat(l.e_negeri,' - ',n.nama_negeri),
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'10',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
    sum(p.stkakhir_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'10',  '141 SABAH/SARAWAK',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid
    union
    select p.tahun,'10',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid,
    sum(if(p.bulan = '01',p.stkakhir_ps,0)) as Jan,
    sum(if(p.bulan = '02',p.stkakhir_ps,0)) as Feb,
    sum(if(p.bulan = '03',p.stkakhir_ps,0)) as Mar,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03',p.stkakhir_ps,0)) as Quarter1,
    sum(if(p.bulan = '04',p.stkakhir_ps,0)) as Apr,
    sum(if(p.bulan = '05',p.stkakhir_ps,0)) as Mei,
    sum(if(p.bulan = '06',p.stkakhir_ps,0)) as Jun,
    sum(if(p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as Quarter2,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06',p.stkakhir_ps,0)) as FirstHalf,
    sum(if(p.bulan = '07',p.stkakhir_ps,0)) as Jul,
    sum(if(p.bulan = '08',p.stkakhir_ps,0)) as Aug,
    sum(if(p.bulan = '09',p.stkakhir_ps,0)) as Sep,
    sum(if(p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as Quarter3,
    sum(if(p.bulan = '01' or p.bulan = '02' or p.bulan = '03' or p.bulan = '04' or p.bulan = '05' or p.bulan = '06' or p.bulan = '07' or p.bulan = '08' or p.bulan = '09',p.stkakhir_ps,0)) as SecondHalf,
    sum(if(p.bulan = '10',p.stkakhir_ps,0)) as Oct,
    sum(if(p.bulan = '11',p.stkakhir_ps,0)) as Nov,
    sum(if(p.bulan = '12',p.stkakhir_ps,0)) as Dece,
    sum(if(p.bulan = '10' or p.bulan = '11' or p.bulan = '12',p.stkakhir_ps,0)) as Quarter4,
    sum(p.stkakhir_ps) as TotalAll
    from p104 p, pelesen l, negeri n
    where p.nolesen = l.e_nl and p.tahun = '$tahun' and
    l.e_negeri in ('01','02','03','04','05','06','07','08','09','10','11','12','13','14') and
    l.e_negeri = n.kod_negeri
    group by p.tahun,'10',  '151 MALAYSIA',
    p.produk_kump, p.prodcat, p.prodsubcat,p.prodid");

    $qtrstatep104b = DB::delete("DELETE from p104_quarterly_state where Year = '$tahun' and TotalAll <= 0");

    //  $rqtrstatep104a = mysqli_query($conn_mysql,$qtrstatep104a);
    //  $rqtrstatep104b = mysqli_query($conn_mysql,$qtrstatep104b);

}









}
