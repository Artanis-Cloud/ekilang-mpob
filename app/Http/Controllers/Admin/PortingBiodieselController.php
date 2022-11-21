<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HebahanStokAkhir;
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
        $stokakhir = HebahanStokAkhir::find($id);

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
            'stokakhir',


        ));
    }

    public function porting_stokakhir(Request $request)
    {

        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $cpo_sm = $request->cpo_sm;
        $ppo_sm = $request->ppo_sm;
        $cpko_sm = $request->cpko_sm;
        $ppko_sm = $request->ppko_sm;
        $cpo_sbh = $request->cpo_sbh;
        $ppo_sbh = $request->ppo_sbh;
        $cpko_sbh = $request->cpko_sbh;
        $ppko_sbh = $request->ppko_sbh;
        $cpo_srwk = $request->cpo_srwk;
        $ppo_srwk = $request->ppo_srwk;
        $cpko_srwk = $request->cpko_srwk;
        $ppko_srwk = $request->ppko_srwk;

        $query = DB::select("SELECT * from hebahan_stok_akhir where bulan='$bulan' and tahun = '$tahun'");

        $qdel1 = DB::connection('mysql4')->delete("DELETE from hebahan_stok_akhir where bulan=$bulan and tahun = $tahun");

        $qins = DB::connection('mysql4')->insert("INSERT into hebahan_stok_akhir (tahun,bulan,cpo_sm,ppo_sm,cpko_sm,ppko_sm,cpo_sbh,ppo_sbh,cpko_sbh,ppko_sbh,cpo_srwk,ppo_srwk,cpko_srwk,ppko_srwk)
        values ($tahun,$bulan,$cpo_sm,$ppo_sm,$cpko_sm,$ppko_sm,$cpo_sbh,$ppo_sbh,$cpko_sbh,$ppko_sbh,$cpo_srwk,$ppo_srwk,$cpko_srwk,$ppko_srwk)");

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
                //$rinsCPO = odbc_exec($conn_odbc,$qinsCPO);

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
                //$rinsCPO = odbc_exec($conn_odbc,$qinsCPO);

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
                //$rinsCPO = odbc_exec($conn_odbc,$qinsCPO);

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

            if ($cpko->ebio_b11 <> 0) {

                $qinsPPKO = DB::connection('mysql4')->insert("INSERT into hebahan_stok_akhir_detail (no_lesen, nama, negeri, tahun,bulan,produk, stok_akhir)
                values ('$lesen','$kilang', '$negeri', $tahun,$bulan,'PPKO' ,$totstokakhir_ppko)");
                //$rinsCPO = odbc_exec($conn_odbc,$qinsCPO);

            }
        }

        // $querycpo1 = " SELECT lesen,tahun,bulan,menu,penyata,penyata.kod_produk as nama_produk,produk.kod_produk as kod_produk,kuantiti,id_penyata,pembekal,noborang,tarikh,nilai,namapengeksport,negara.kod_negara as negara,kilang.e_apnegeri as kod_negeri
        //        FROM
        //            kilang ,
        //            produk,
        //            penyata
        //            left  JOIN negara ON penyata.negara = negara.negara
        //            WHERE
        //            `penyata`.`tahun` =  '$tahun' AND
        //            `penyata`.`bulan` =  '$bulan' AND
        //            penyata.lesen = kilang.e_nl AND
        //            penyata.kod_produk = produk.nama_produk AND
        //             penyata.menu IS NOT NULL AND
        //             penyata.penyata IS NOT NULL AND
        //             kilang.jenis <> 'dummy' ";


        return redirect()->back()->with('success', 'Maklumat Stok Akhir telah berjaya diport');


    }

}
