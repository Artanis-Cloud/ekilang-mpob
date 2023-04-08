<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EBioB;
use App\Models\EBioC;
use App\Models\EBioCC;
use App\Models\EBioInit;
use App\Models\Hari;
use App\Models\HBioB;
use App\Models\HBioC;
use App\Models\HBioCC;
use App\Models\HBioInit;
use App\Models\HebahanProses;
use App\Models\HebahanStokAkhir;
use App\Models\HHari;
use App\Models\RegPelesen;
use App\Models\SyarikatPembeli;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use DB;
use FontLib\Table\Type\post;
use Svg\Tag\Rect;
use Illuminate\Support\Facades\Validator;

class PortingBiodieselController extends Controller
{

    public function admin_port_stok_akhir()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.stok.akhir'), 'name' => "Stok Akhir"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Porting Stok Akhir"],
        ];

        $kembali = route('admin.stok.akhir');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.porting-stok-akhir', compact('returnArr', 'layout'));
    }

    public function admin_port_stok_akhir_process($id)
    {

        $stokakhirs = DB::select("SELECT * from hebahan_stok_akhir where id = $id");



        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.stok.akhir'), 'name' => "Stok Akhir"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Porting Stok Akhir"],

        ];

        $kembali = route('admin.stok.akhir');


        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';


        return view('admin.laporan_dq.porting-stok-akhir', compact(
            'returnArr',
            'layout',
            'stokakhirs',



        ));
    }

    public function porting_stokakhir(Request $request)
    {


        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $cpo_sm1 = $request->cpo_sm;
        $ppo_sm1 = $request->ppo_sm;
        $cpko_sm1 = $request->cpko_sm;
        $ppko_sm1 = $request->ppko_sm;
        $cpo_sbh1 = $request->cpo_sbh;
        $ppo_sbh1 = $request->ppo_sbh;
        $cpko_sbh1 = $request->cpko_sbh;
        $ppko_sbh1 = $request->ppko_sbh;
        $cpo_srwk1 = $request->cpo_srwk;
        $ppo_srwk1 = $request->ppo_srwk;
        $cpko_srwk1 = $request->cpko_srwk;
        $ppko_srwk1 = $request->ppko_srwk;


        $cpo_sm = str_replace(',', '', $cpo_sm1);
        $ppo_sm = str_replace(',', '', $ppo_sm1);
        $cpko_sm = str_replace(',', '', $cpko_sm1);
        $ppko_sm = str_replace(',', '', $ppko_sm1);
        $cpo_sbh = str_replace(',', '', $cpo_sbh1);
        $ppo_sbh = str_replace(',', '', $ppo_sbh1);
        $cpko_sbh = str_replace(',', '', $cpko_sbh1);
        $ppko_sbh = str_replace(',', '', $ppko_sbh1);
        $cpo_srwk = str_replace(',', '', $cpo_srwk1);
        $ppo_srwk = str_replace(',', '', $ppo_srwk1);
        $cpko_srwk = str_replace(',', '', $cpko_srwk1);
        $ppko_srwk = str_replace(',', '', $ppko_srwk1);

        $query = DB::select("SELECT * from hebahan_stok_akhir where bulan='$bulan' and tahun = '$tahun'");

        $qdel1 = DB::connection('mysql4')->delete("DELETE from hebahan_stok_akhir where bulan='$bulan' and tahun = '$tahun'");

        $qins = DB::connection('mysql4')->insert("INSERT into hebahan_stok_akhir (tahun,bulan,cpo_sm,ppo_sm,cpko_sm,ppko_sm,cpo_sbh,ppo_sbh,cpko_sbh,ppko_sbh,cpo_srwk,ppo_srwk,cpko_srwk,ppko_srwk)
        values ('$tahun',
        '$bulan',
        '$cpo_sm',
        '$ppo_sm',
        '$cpko_sm',
       ' $ppko_sm',
        '$cpo_sbh',
        '$ppo_sbh',
        '$cpko_sbh',
        '$ppko_sbh',
        '$cpo_srwk',
        '$ppo_srwk',
        '$cpko_srwk',
        '$ppko_srwk')");

        $qdelsemuaproduk =  DB::connection('mysql4')->delete("DELETE from hebahan_stok_akhir_detail where bulan=$bulan and tahun = $tahun");

        $qdel2 =  DB::connection('mysql4')->delete("DELETE from penyata_biodiesel where bulan=$bulan and tahun = $tahun");

        $qdel2 = DB::connection('mysql3')->delete("DELETE from hebahan_stok_akhir where bulan='$bulan' and tahun = '$tahun'");

        $qinsss1 =  DB::connection('mysql3')->insert("INSERT into hebahan_stok_akhir (tahun,bulan,cpo_sm,ppo_sm,cpko_sm,ppko_sm,cpo_sbh,ppo_sbh,cpko_sbh,ppko_sbh,cpo_srwk,ppo_srwk,cpko_srwk,ppko_srwk)
        values ('$tahun','$bulan',$cpo_sm,$ppo_sm,$cpko_sm,$ppko_sm,$cpo_sbh,$ppo_sbh,$cpko_sbh,$ppko_sbh,$cpo_srwk,$ppo_srwk,$cpko_srwk,$ppko_srwk)");

        $qdel2 = DB::delete("DELETE from hebahan_stok_akhir where bulan='$bulan' and tahun = '$tahun'");

        $qinsss1 = DB::insert("INSERT into hebahan_stok_akhir (tahun,bulan,cpo_sm,ppo_sm,cpko_sm,ppko_sm,cpo_sbh,ppo_sbh,cpko_sbh,ppko_sbh,cpo_srwk,ppo_srwk,cpko_srwk,ppko_srwk)
        values ('$tahun','$bulan',$cpo_sm,$ppo_sm,$cpko_sm,$ppko_sm,$cpo_sbh,$ppo_sbh,$cpko_sbh,$ppko_sbh,$cpo_srwk,$ppo_srwk,$cpko_srwk,$ppko_srwk)");


        $querycpo = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, b.ebio_b5, b.ebio_b6, b.ebio_b7, b.ebio_b8, b.ebio_b9, b.ebio_b10, b.ebio_b11
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_nl = h.ebio_nl
        AND p.e_negeri = n.kod_negeri
        AND h.ebio_nobatch = b.ebio_nobatch
        AND b.ebio_b3 = '1'
        AND b.ebio_b4 = '01'
        AND b.ebio_b11 <> 0");

        foreach ($querycpo as $cpo) {

            $lesen = $cpo->e_nl;
            $kilang = $cpo->e_np;
            $negeri = $cpo->negeri;
            $totstokakhir_cpo = $cpo->ebio_b11;

            if ($cpo->ebio_b11 <> 0) {

                $qinsCPO = DB::connection('mysql4')->insert("INSERT into hebahan_stok_akhir_detail (no_lesen, nama, negeri, tahun,bulan,produk, stok_akhir)
                values ('$lesen','$kilang', '$negeri', $tahun,$bulan,'CPO',$totstokakhir_cpo)");


            }
        }

        $queryppo1 = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, b.ebio_b5, b.ebio_b6, b.ebio_b7, b.ebio_b8, b.ebio_b9, b.ebio_b10, b.ebio_b11
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_nl = h.ebio_nl
            AND p.e_negeri = n.kod_negeri
            AND h.ebio_nobatch = b.ebio_nobatch
            AND b.ebio_b3 = '1'
            AND b.ebio_b4 <> '01'
            AND b.ebio_b11 <> 0");

        foreach ($queryppo1 as $ppo) {

            $lesen = $ppo->e_nl;
            $kilang = $ppo->e_np;
            $negeri = $ppo->negeri;
            $totstokakhir_ppo = $ppo->ebio_b11;

            if ($ppo->ebio_b11 <> 0) {

                $qinsPPO = DB::connection('mysql4')->insert("INSERT into hebahan_stok_akhir_detail (no_lesen, nama, negeri, tahun,bulan,produk, stok_akhir)
                values ('$lesen','$kilang', '$negeri', $tahun,$bulan,'PPO' ,$totstokakhir_ppo)");


            }
        }

        $querycpko1 = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, b.ebio_b5, b.ebio_b6, b.ebio_b7, b.ebio_b8, b.ebio_b9, b.ebio_b10, b.ebio_b11
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_nl = h.ebio_nl
            AND p.e_negeri = n.kod_negeri
            AND h.ebio_nobatch = b.ebio_nobatch
            AND b.ebio_b3 = '2'
            AND b.ebio_b4 = '04'
            AND b.ebio_b11 <> 0");

        foreach ($querycpko1 as $cpko) {

            $lesen = $cpko->e_nl;
            $kilang = $cpko->e_np;
            $negeri = $cpko->negeri;
            $totstokakhir_cpko = $cpko->ebio_b11;

            if ($cpko->ebio_b11 <> 0) {

                $qinsCPKO = DB::connection('mysql4')->insert("INSERT into hebahan_stok_akhir_detail (no_lesen, nama, negeri, tahun,bulan,produk, stok_akhir)
                values ('$lesen','$kilang', '$negeri', $tahun,$bulan,'CPKO' ,$totstokakhir_cpko)");


            }
        }

        $queryppko1 = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, b.ebio_b5, b.ebio_b6, b.ebio_b7, b.ebio_b8, b.ebio_b9, b.ebio_b10, b.ebio_b11
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_nl = h.ebio_nl
            AND p.e_negeri = n.kod_negeri
            AND h.ebio_nobatch = b.ebio_nobatch
            AND b.ebio_b3 = '2'
            AND b.ebio_b4 <> '04'
            AND b.ebio_b11 <> 0");

        foreach ($queryppko1 as $ppko) {

            $lesen = $ppko->e_nl;
            $kilang = $ppko->e_np;
            $negeri = $ppko->negeri;
            $totstokakhir_ppko = $ppko->ebio_b11;

            if ($ppko->ebio_b11 <> 0) {

                $qinsPPKO = DB::connection('mysql4')->insert("INSERT into hebahan_stok_akhir_detail (no_lesen, nama, negeri, tahun,bulan,produk, stok_akhir)
                values ('$lesen','$kilang', '$negeri', $tahun,$bulan,'PPKO' ,$totstokakhir_ppko)");


            }
        }

        $this->admin_portbio($tahun, $bulan);


        return redirect()->route('admin.stok.akhir')->with('success', 'Maklumat Stok Akhir telah berjaya diport');


    }

    public function admin_portbio($tahun, $bulan)
    {

        $ebioinit = HBioInit::where('ebio_thn', $tahun)->where('ebio_bln', $bulan)->get();


        $qdelplbio = DB::connection('mysql4')->delete("DELETE from h_bio_inits where ebio_bln = '$bulan' and ebio_thn = '$tahun'");


        $totalplbio = 0;

        foreach ($ebioinit as $key => $selects) {


            $nobatch = $selects->ebio_nobatch ;
            $nolesen = $selects->ebio_nl ;
            $tahun = $selects->ebio_thn ;
            $bulan = $selects->ebio_bln ;
            $flg = $selects->ebio_flg ;
            $tarikh = $selects->ebio_sdate ;
            $tarikh1 = $selects->ebio_ddate ;
            $npg = $selects->ebio_npg ;
            $jpg = $selects->ebio_jpg ;
            $notel = $selects->ebio_notel ;


                $totalplbio = $totalplbio + 1;

                $str="'";
                $npg = str_replace($str, "\'", $npg);

                $insertplbio = DB::connection('mysql4')->insert("INSERT into h_bio_inits values
                ('$nobatch','$nolesen','$bulan','$tahun','3','$tarikh','$tarikh1', '$npg', '$jpg', '$notel')");


                    $ebiob = HBioB::where('ebio_nobatch', $nobatch)->get();

                    $qdelplbiob = DB::connection('mysql4')->delete("DELETE from h_bio_b_s where ebio_nobatch = '$nobatch'");


                    foreach ($ebiob as $rowebio_b)
                    {

                        $b3 = $rowebio_b->ebio_b3 ;
                        $b4 = $rowebio_b->ebio_b4 ;
                        $b5 = (float) $rowebio_b->ebio_b5 ;
                        $b6 = (float) $rowebio_b->ebio_b6 ;
                        $b7 = (float) $rowebio_b->ebio_b7 ;
                        $b8 = (float) $rowebio_b->ebio_b8 ;
                        $b9 = (float) $rowebio_b->ebio_b9 ;
                        $b10 = (float) $rowebio_b->ebio_b10 ;
                        $b11 = (float) $rowebio_b->ebio_b11 ;
                        $b13 = (float) $rowebio_b->ebio_b13 ;

                        $idmaxbiob = DB::connection('mysql4')->select("SELECT MAX(ebio_b1) as idmaxbiob from h_bio_b_s");


                        if ($idmaxbiob[0]->idmaxbiob)
                        {
                            $idno = $idmaxbiob[0]->idmaxbiob + 1;

                        } else {
                            $idno = 1;
                        }

                        $insertplbiob = DB::connection('mysql4')->insert("INSERT into h_bio_b_s
                        values ($idno,'$nobatch','$b3','$b4',$b5,$b6, $b7,$b8,$b9,$b10,$b11,$b13)");


                    }

                    $ebioc = HBioC::where('ebio_nobatch', $nobatch)->get();

                    $qdelplbioc = DB::connection('mysql4')->delete("DELETE from h_bio_c_s where ebio_nobatch = '$nobatch'");


                    foreach ($ebioc as $rowebio_c)
                    {
                        $c3 = $rowebio_c->ebio_c3 ;
                        $c4 = (float) $rowebio_c->ebio_c4 ;
                        $c5 = (float) $rowebio_c->ebio_c5 ;
                        $c6 = (float) $rowebio_c->ebio_c6 ;
                        $c7 = (float) $rowebio_c->ebio_c7 ;
                        $c8 = (float) $rowebio_c->ebio_c8 ;
                        $c9 = (float) $rowebio_c->ebio_c9 ;
                        $c10 = (float) $rowebio_c->ebio_c10 ;



                        $idmaxbioc =  DB::connection('mysql4')->select("SELECT MAX(ebio_c1) as idmaxbioc from h_bio_c_s");


                        if ($idmaxbioc[0]->idmaxbioc)
                        {
                            $idno = $idmaxbioc[0]->idmaxbioc + 1;

                        } else {
                            $idno = 1;
                        }


                        $insertplbioc = DB::connection('mysql4')->insert("INSERT into h_bio_c_s values ($idno,'$nobatch',
                        '$c3',$c4,
                         $c5,$c6,$c7,$c8,$c9,$c10,NULL,NULL)");


                    }

                    $ebiocc = HBioCC::where('ebio_nobatch', $nobatch)->get();

                    $qdelplbiocc = DB::connection('mysql4')->delete("DELETE from h_bio_cc where ebio_nobatch = '$nobatch'");


                    foreach ($ebiocc as $ebioccs)
                    {
                        $cc2 = $ebioccs->ebio_cc2 ;
                        $cc3 = $ebioccs->ebio_cc3 ;
                        $cc4 = $ebioccs->ebio_cc4 ;

                        $idmaxbiod = DB::connection('mysql4')->select("SELECT MAX(ebio_cc1) as idmaxbiod from h_bio_cc");

                        if ($idmaxbiod[0]->idmaxbiod)
                        {
                            $idno = $idmaxbiod[0]->idmaxbiod + 1;
                        } else {
                            $idno = 1;
                        }

                        $insertplbiocc = DB::connection('mysql4')->insert("INSERT into h_bio_cc values ($idno,'$nobatch','$cc2',
                        '$cc3','$cc4')");

                    }

                    $hari = HHari::where('lesen', $nolesen)->where('tahunbhg2', $tahun)->where('bulanbhg2', $bulan)->get();

                    $qdelplbiohari = DB::connection('mysql4')->delete("DELETE from h_hari where lesen = '$nolesen' and tahunbhg2 = '$tahun' and bulanbhg2 = '$bulan'");


                    foreach ($hari as $haris)
                    {

                        $tahun = $haris->tahunbhg2 ;
                        $bulan = $haris->bulanbhg2 ;
                        $hari_operasi = $haris->hari_operasi ;
                        $kapasiti = $haris->kapasiti ;

                        $idmaxhari = DB::connection('mysql4')->select("SELECT MAX(id) as idmaxhari from h_hari");


                        if ($idmaxhari[0]->idmaxhari)
                        {
                            $idno = $idmaxhari[0]->idmaxhari + 1;

                        } else {
                            $idno = 1;
                        }

                        $insertplbiohari = DB::connection('mysql4')->insert("INSERT into h_hari values ($idno,'$nolesen','$tahun',
                        '$bulan','$hari_operasi','$kapasiti',null,null)");


                    }

                }



    }


    public function admin_port_minyak_sawit_process($id)
    {

        $minyaksawits = DB::select("SELECT * from hebahan_proses where id = $id");


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Minyak Sawit Diproses"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Porting Minyak Sawit Diproses"],

        ];

        $kembali = route('admin.minyak.sawit.diproses');


        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';


        return view('admin.laporan_dq.porting-minyak-sawit', compact(
            'returnArr',
            'layout',
            'minyaksawits',


        ));
    }


    public function porting_minyaksawit(Request $request)
    {

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $cpo_msia1 = $request->cpo_msia;
        $ppo_msia1 = $request->ppo_msia;
        $cpko_msia1 = $request->cpko_msia;
        $ppko_msia1 = $request->ppko_msia;

        $cpo_msia = str_replace(',', '', $cpo_msia1);
        $ppo_msia = str_replace(',', '', $ppo_msia1);
        $cpko_msia = str_replace(',', '', $cpko_msia1);
        $ppko_msia = str_replace(',', '', $ppko_msia1);

        $query = DB::select("SELECT * from hebahan_proses where bulan='$bulan' and tahun = '$tahun'");

        $qdel1 = DB::connection('mysql4')->delete("DELETE from hebahan_proses where bulan=$bulan and tahun = $tahun");

        $qins = DB::connection('mysql4')->insert("INSERT into hebahan_proses (tahun,bulan,cpo_msia,ppo_msia,cpko_msia,ppko_msia)
        values ($tahun,$bulan,$cpo_msia,$ppo_msia,$cpko_msia,$ppko_msia)");

        $qdel2 = DB::connection('mysql3')->delete("DELETE from hebahan_proses where bulan='$bulan' and tahun = '$tahun'");

        $qinsss1 =  DB::connection('mysql3')->insert("INSERT into hebahan_proses (tahun,bulan,cpo_msia,ppo_msia,cpko_msia,ppko_msia)
        values ($tahun,$bulan,$cpo_msia,$ppo_msia,$cpko_msia,$ppko_msia)");

        $qdel2 = DB::delete("DELETE from hebahan_proses where bulan='$bulan' and tahun = '$tahun'");

        $qinsss1 = DB::insert("INSERT into hebahan_proses (tahun,bulan,cpo_msia,ppo_msia,cpko_msia,ppko_msia)
        values ($tahun,$bulan,$cpo_msia,$ppo_msia,$cpko_msia,$ppko_msia)");



        return redirect()->route('admin.minyak.sawit.diproses')->with('success', 'Maklumat Minyak Sawit Diproses telah berjaya diport');


    }

}
