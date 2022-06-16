<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use App\Models\Daerah;
use App\Models\EBioInit;
use App\Models\H91Init;
use App\Models\HebahanProses;
use App\Models\KumpProduk;
use App\Models\Negara;
use App\Models\Produk;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\ProdukCategory;
use App\Models\ProdukGroup;
use App\Models\ProdukSubgroup;
use App\Models\Region;
use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Svg\Tag\Rect;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{

    public function admin_maklumat_penyata_bulanan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.maklumat-penyata-bulanan', compact('returnArr', 'layout'));
    }

    public function admin_pl_lewat()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Tarikh Penerimaan PL"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.pl-lewat', compact('returnArr', 'layout'));
    }

    public function admin_pl_lewat_process(Request $request)
    {
        $kategori = $request->kategori;
        // dd($kategori);
        // $date_tepat = EBioInit::where(date())

        // $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
        // FROM e_bio_inits e
        // LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
        // LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
        // WHERE DAY(e.ebio_sdate) BETWEEN 1 AND 10");
        // dd($list_penyata);

        if ($kategori == "tepat") {
            $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
                FROM e_bio_inits e
                LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
                LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
                WHERE DAY(e.ebio_sdate) BETWEEN 1 AND 7");
            // dd($list_penyata);

        } elseif ($kategori == "lewat") {
            $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
                FROM e_bio_inits e
                LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
                LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
                WHERE DAY(e.ebio_sdate) BETWEEN 8 AND 10");
        } else {
            $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
                FROM e_bio_inits e
                LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
                LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
                WHERE DAY(e.ebio_sdate) BETWEEN 1 AND 10");
        }
        // dd($list_penyata);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pl.lewat'), 'name' => "Tarikh Penerimaan PL"],
            ['link' => route('admin.pl.lewat'), 'name' => "Senarai Penerimaan PL"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $array = [
            'kategori' => $kategori,
            'list_penyata' => $list_penyata,

            'breadcrumbs' => $breadcrumbs,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];

        return view('admin.laporan_dq.pl-lewat-proses', $array);
    }

    public function admin_kapasiti()
    {

        // $pelesen = Pelesen::find($id);
        // $pelesen = Pelesen::with('regpelesen')->where('e_nl', $reg_pelesen[0]->e_nl)->get();
        // dd($pelesen);
        // $date= date("m");

        $reg_pelesen = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $pelesen = Pelesen::with('regpelesen')->where('e_nl', $reg_pelesen[0]->e_nl)->get();
        // dd($reg_pelesen);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Kapasiti Kilang Biodiesel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.kapasiti', compact('returnArr', 'layout', 'reg_pelesen'));
    }

    public function admin_edit_kapasiti($id, Pelesen $pelesen)
    {

        $pelesen = Pelesen::find($id);
        // $pelesen = Pelesen::with('regpelesen')->where('e_nl', $reg_pelesen[0]->e_nl)->get();
        // dd($pelesen);

        $bulan = Bulan::get();


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kapasiti'), 'name' => "Kapasiti Kilang Biodiesel"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Kemaskini Kapasiti"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.edit-kapasiti', compact('returnArr', 'layout', 'pelesen'));
    }


    public function admin_edit_kapasiti_proses(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Pelesen::findOrFail($id);
        $pelesen->tahun = $request->tahun;
        $pelesen->bulan = $request->bulan;
        $pelesen->kap_proses = $request->kap_proses;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_laporan_tahunan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.laporan-tahunan', compact('returnArr', 'layout'));
    }

    public function admin_stok_akhir()
    {

        $stok_akhir = DB::connection('mysql2')->select("SELECT * FROM hebahan_stok_akhir
        order by tahun, bulan");


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.stok-akhir', compact('returnArr', 'layout', 'stok_akhir'));
    }

    public function admin_tambah_stok_akhir()
    {
        $bulan = Bulan::get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.tambah-stok-akhir', compact('returnArr', 'layout', 'bulan'));
    }

    // public function admin_validasi_stok_akhir(Request $request)
    // {
    //     $tahun = $request->tahun;
    //     $bulan = $request->bulan;

    //     $cpo_sem = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
    //     FROM
    //         penyata,
    //         kilang,
    //         negeri,
    //         produk,
    //         profile_bulanan
    //         WHERE
    //         `penyata`.`tahun` =  '$tahun' AND
    //         `penyata`.`bulan` =  '$bulan' AND
    //         `profile_bulanan`.`tahun` =  '$tahun' AND
    //         `profile_bulanan`.`bulan` =  '$bulan' AND
    //          `penyata`.`menu` in ('cpo_cpko') AND
    //          `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
    //          `penyata`.`lesen` = `kilang`.`e_nl` AND
    //           kilang.e_apnegeri = negeri.id_negeri AND
    //          `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
    //          `produk`.`kumpulan_produk` = '1' AND
    //          `kilang`.`jenis` <>  'dummy' AND
    //          `penyata`.`kod_produk` = 'CPO' AND
    //           `penyata`.`kuantiti` <>  0 AND
    //           `penyata`.`kod_produk` =`produk`.`nama_produk`
    //           GROUP by lesen");


    //     $total_3a_3b = 0;
    //     $total_3c_3d = 0;
    //     $total = 0;
    //     $total_all_sem = 0;

    //     foreach ($cpo_sem as $data) {
    //         $total_3a_3b =
    //             ($data->stok_awal) + ($data->bekalan_belian) +
    //             ($data->bekalan_penerimaan) + ($data->bekalan_penerimaan);
    //         $total_3c_3d =
    //             ($data->cpo_proses) + ($data->jualan_jualan) +
    //             ($data->jualan_edaran) + ($data->jualan_eksport);
    //     };

    //     if ($cpo_sem) {
    //         $total = $total_3a_3b + $total_3c_3d;
    //     }

    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
    //     ];

    //     $kembali = route('admin.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';

    //     return view('admin.laporan_dq.validasi-stok-akhir', compact('returnArr', 'layout', 'bulan', 'cpo_sem','total', 'total_3a_3b', 'total_3c_3d', 'total_all_sem'));
    // }

    public function admin_validasi_stok_akhir_proses(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;


        //cpo semenanjung malaysia
        $cpo_sem = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");

            //   dd($cpo_sem);

        $total_3a_3b = 0;
        $total_3c_3d = 0;
        $total = 0;
        $total_all_sem = 0;

        foreach ($cpo_sem as $data) {
            $total_3a_3b = ($data->stok_awal) + ($data->bekalan_belian) + ($data->bekalan_penerimaan) + ($data->bekalan_import);
            $total_3c_3d = ($data->cpo_proses) + ($data->jualan_jualan) + ($data->jualan_edaran) + ($data->jualan_eksport);

            $total += $total_3a_3b + $total_3c_3d;
            $total_all_sem += $total;
        }

        //cpo sabah
        $cpo_sabah = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
               FROM
                   penyata,
                   kilang,
                   negeri,
                   produk,
                   profile_bulanan
                   WHERE
                   `penyata`.`tahun` =  '$tahun' AND
                   `penyata`.`bulan` =  '$bulan' AND
                   `profile_bulanan`.`tahun` =  '$tahun' AND
                   `profile_bulanan`.`bulan` =  '$bulan' AND
                    `penyata`.`menu` in ('cpo_cpko') AND
                    `negeri`.`nama_negeri` in ( 'SABAH') AND
                    `penyata`.`lesen` = `kilang`.`e_nl` AND
                     kilang.e_apnegeri = negeri.id_negeri AND
                    `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
                    `produk`.`kumpulan_produk` = '1' AND
                    `kilang`.`jenis` <>  'dummy' AND
                    `penyata`.`kod_produk` = 'CPO' AND
                     `penyata`.`kuantiti` <>  0 AND
                     `penyata`.`kod_produk` =`produk`.`nama_produk`
                     GROUP by lesen");


        //cpo sarawak
        $cpo_srwk = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //ppo semenanjung malaysia
        $ppo_sem = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
           WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` <> 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");



        //ppo sabah
        $ppo_sabah = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SABAH') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` <> 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //ppo sarawak
        $ppo_srwk = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` <> 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //cpko semenanjung malaysia
        $cpko_sem = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //cpko sabah
        $cpko_sabah = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SABAH') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //cpko sarawak
        $cpko_srwk = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang, negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");



        //ppko semenanjung malaysia
        $ppko_sem = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo') AND
             `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` = '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");



        //ppko sabah
        $ppko_sabah = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang, negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo') AND
             `negeri`.`nama_negeri` in ( 'SABAH') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` = '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");



        //ppko sarawak
        $ppko_srwk = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang, negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo') AND
             `negeri`.`nama_negeri` in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` = '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");




        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $array = [
            'tahun' => $tahun,
            'bulan' => $bulan,

            'cpo_sem' => $cpo_sem,
            'cpo_sabah' => $cpo_sabah,
            'cpo_srwk' => $cpo_srwk,

            'ppo_sem' => $ppo_sem,
            'ppo_sabah' => $ppo_sabah,
            'ppo_srwk' => $ppo_srwk,

            'cpko_sem' => $cpko_sem,
            'cpko_sabah' => $cpko_sabah,
            'cpko_srwk' => $cpko_srwk,


            'ppko_sem' => $ppko_sem,
            'ppko_sabah' => $ppko_sabah,
            'ppko_srwk' => $ppko_srwk,


            'total_3a_3b' => $total_3a_3b,
            'total_3c_3d' => $total_3c_3d,
            'total' => $total,
            'total_all_sem' => $total_all_sem,

            'breadcrumbs' => $breadcrumbs,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];


        return view('admin.laporan_dq.validasi-stok-akhir', $array);
    }

    public function admin_validasi_stok_akhir_ikut_produk(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $produk = $request->produk;

        if (($produk == 'RBDPO3') ||  ($produk == 'RBDPL') ||  ($produk == 'RBDPS') || ($produk == 'PFAD'))
            $sqlstmt1 = "`produk`.`kumpulan_produk` = '1' AND";
        else
            $sqlstmt1 = "`produk`.`kumpulan_produk` = '2' AND";

        if ($produk == 'OTHERS')
            $sqlstmt2 = "`penyata`.`kod_produk` NOT IN('RBDPO3','RBDPL','RBDPS','PFAD') AND `penyata`.`kod_produk` <> 'CPO' AND";
        else
            $sqlstmt2 = "`penyata`.`kod_produk`= '$produk' AND ";

        //RBDPO - SEMENANJUNG MALAYSIA

        $ppo_sem = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             negeri.nama_negeri not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND" . $sqlstmt1 .
            "`kilang`.`jenis` <>  'dummy' AND" . $sqlstmt2 .
            "`penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");

            //   dd($ppo_sem);

        //RBDPO - SABAH

        $ppo_sabah = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             negeri.nama_negeri in ('SABAH') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND".$sqlstmt1.
             "`kilang`.`jenis` <>  'dummy' AND".$sqlstmt2.
              "`penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");

            //   dd($ppo_sem);

        //RBDPO - SARAWAK

        $ppo_srwk = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             negeri.nama_negeri in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND".$sqlstmt1.
             "`produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND".$sqlstmt2.
              "`penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");

            //   dd($ppo_sem);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';


        $array = [
            'tahun' => $tahun,
            'bulan' => $bulan,
            'produk' => $produk,

            'ppo_sem' => $ppo_sem,
            'ppo_sabah' => $ppo_sabah,
            'ppo_srwk' => $ppo_srwk,


            'breadcrumbs' => $breadcrumbs,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];


        return view('admin.laporan_dq.validasi-stok-akhir-ikut-produk', $array);
    }

    public function admin_minyak_sawit_diproses()
    {
        $bulan = Bulan::get();

        $hebahan = DB::connection('mysql2')->select("SELECT* FROM hebahan_proses
        order by tahun, bulan");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.minyak-sawit-diproses', compact('returnArr', 'layout', 'bulan', 'hebahan'));
    }

    public function admin_edit_minyak_sawit_diproses(Request $request, $id)
    {
        // $hebahan = DB::connection('mysql2')->select("SELECT $id FROM hebahan_proses");

        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');
        $cpo_msia = $request->input('cpo_msia');
        $ppo_msia = $request->input('ppo_msia');
        $cpko_msia = $request->input('cpko_msia');
        $ppko_msia = $request->input('ppko_msia');
        DB::connection('mysql2')->select("UPDATE hebahan_proses SET tahun = '$tahun', bulan='$bulan',
        cpo_msia= '$cpo_msia',ppo_msia='$ppo_msia',cpko_msia ='$cpko_msia',ppko_msia='$ppko_msia'
        WHERE id='$id'");

        // $hebahan = DB::connection('mysql2')->table('hebahan_proses')->where('id', $id)->update(array('cpko_msia' => $cpko_msia));


        // $hebahan = DB::connection('mysql2')->select("SELECT * FROM hebahan_proses WHERE id='$id");
        // $hebahan->tahun = $request->tahun;
        // $hebahan->bulan = $request->bulan;
        // $hebahan->cpo_msia = $request->cpo_msia;
        // $hebahan->ppo_msia = $request->ppo_msia;
        // $hebahan->cpko_msia = $request->cpko_msia;
        // $hebahan->ppko_msia = $request->ppko_msia;
        // $hebahan->save();


        return redirect()->route('admin.minyak.sawit.diproses')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function admin_delete_minyak_sawit_diproses($id)
    {
        DB::connection('mysql2')->select("delete from hebahan_proses where id = '$id'");

        return redirect()->route('admin.minyak.sawit.diproses')
            ->with('success', 'Maklumat Dihapuskan');
    }


    public function admin_tambah_proses()
    {
        $data = DB::connection('mysql2')->select("SELECT* FROM hebahan_proses");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.tambah-proses', compact('returnArr', 'layout', 'data'));
    }

    public function admin_add_minyak_sawit_diproses(Request $request)
    {
        // dd($request->all());
        $this->validation_tambah_minyak($request->all())->validate();
        $this->store_tambah_minyak($request->all());

        return redirect()->back()->with('success', 'Minyak Sawit diproses sudah ditambah');
    }

    protected function validation_tambah_minyak(array $data)
    {
        return Validator::make($data, [
            // 'Id' => ['required', 'string'],
            'tahun' => ['required', 'string'],
            'bulan' => ['required', 'string'],
            'cpo_msia' => ['required', 'string'],
            'ppo_msia' => ['required', 'string'],
            'cpko_msia' => ['required', 'string'],
            'ppko_msia' => ['required', 'string'],
        ]);
    }

    protected function store_tambah_minyak(array $data)
    {
        return HebahanProses::create([
            // 'Id' => $data['Id'],
            'tahun' => $data['tahun'],
            'bulan' => $data['bulan'],
            'cpo_msia' => $data['cpo_msia'],
            'ppo_msia' => $data['ppo_msia'],
            'cpko_msia' => $data['cpko_msia'],
            'ppko_msia' => $data['ppko_msia'],
        ]);
    }

    public function admin_validasi_minyak_sawit_diproses(Request $request)
    {

        $tahun = $request->tahun;
        $bulan = $request->bulan;

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        //--> cpo
        $querycpo1 = DB::connection('mysql2')->select("SELECT e_nl as lesen, e_np as kilang, negeri.nama_negeri as negeri, sum(`penyata`.`kuantiti`) as cpo_msia_1
        FROM `penyata` ,produk, kilang,negeri
        WHERE
        `penyata`.`tahun` =  '$tahun' AND
        `penyata`.`bulan` =  '$bulan' AND
        `penyata`.`menu` = 'cpo_cpko' AND
        `penyata`.`penyata` in  ('cpo_proses') AND
        `produk`.`kumpulan_produk` =  '1' AND
        `penyata`.`kod_produk` = 'CPO' AND
        `kilang`.`jenis` <>  'dummy' AND
        `penyata`.`lesen` = `kilang`.`e_nl` AND
        kilang.e_apnegeri = negeri.id_negeri AND
        `penyata`.`kod_produk` =`produk`.`nama_produk`
        group by e_nl, e_np");

        //--> ppo
        $queryppo1 = DB::connection('mysql2')->select("SELECT e_nl as lesen, e_np as kilang,negeri.nama_negeri as negeri, sum(`penyata`.`kuantiti`) as ppo_msia_1
        FROM `penyata` ,  kilang, produk,negeri
        WHERE
        `penyata`.`tahun` =  '$tahun' AND
        `penyata`.`bulan` =  '$bulan' AND
        `penyata`.`menu` = 'ppo' AND
        `penyata`.`penyata` in  ('ppo_proses') AND
        `produk`.`kumpulan_produk` =  '1' AND
        `penyata`.`kod_produk` <> 'CPO' AND
        `kilang`.`jenis` <>  'dummy' AND
        `penyata`.`lesen` = `kilang`.`e_nl` AND
        kilang.e_apnegeri = negeri.id_negeri AND
        `penyata`.`kod_produk` =`produk`.`nama_produk`
        group by e_nl, e_np");

        //--> cpko
        $querycpko1 = DB::connection('mysql2')->select("SELECT e_nl as lesen, e_np as kilang,nama_negeri as negeri, sum(`penyata`.`kuantiti`) as cpko_msia_1
        FROM `penyata` ,  kilang, produk, negeri
        WHERE
        `penyata`.`tahun` =  '$tahun' AND
        `penyata`.`bulan` =  '$bulan' AND
        `penyata`.`menu` = 'cpo_cpko' AND
        `penyata`.`penyata` in  ('cpo_proses') AND
        `penyata`.`kod_produk` = 'CPKO' AND
        `kilang`.`jenis` <>  'dummy' AND
        `penyata`.`lesen` = `kilang`.`e_nl` AND
        kilang.e_apnegeri = negeri.id_negeri AND
        `penyata`.`kod_produk` =`produk`.`nama_produk`
        group by e_nl, e_np");

        //--> ppko
        $queryppko1 = DB::connection('mysql2')->select("SELECT e_nl as lesen, e_np as kilang,nama_negeri as negeri, sum(`penyata`.`kuantiti`) as ppko_msia_1
        FROM `penyata` ,kilang,produk, negeri
        WHERE
        `penyata`.`tahun` =  '$tahun' AND
        `penyata`.`bulan` =  '$bulan' AND
        `penyata`.`menu` = 'ppo' AND
        `penyata`.`penyata` in  ('ppo_proses') AND
        `penyata`.`kod_produk` <> 'CPKO' AND
        `kilang`.`jenis` <>  'dummy' AND
        `penyata`.`lesen` = `kilang`.`e_nl` AND
        kilang.e_apnegeri = negeri.id_negeri AND
        `produk`.`kumpulan_produk` =  '2' AND
        `penyata`.`kod_produk` =`produk`.`nama_produk`
        group by e_nl, e_np");


        $total_cpo = DB::connection('mysql2')->table("penyata")->where('tahun', $tahun)->where('bulan', $bulan)->where('penyata', 'cpo_proses')->sum('kuantiti');
        $total_ppo = DB::connection('mysql2')->table("penyata")->where('tahun', $tahun)->where('bulan', $bulan)->where('penyata', 'ppo_proses')->where('penyata', 'ppo_proses')->sum('kuantiti');
        $total_cpko = DB::connection('mysql2')->table("penyata")->where('tahun', $tahun)->where('bulan', $bulan)->where('penyata', 'cpko_proses')->sum('kuantiti');
        $total_ppko = DB::connection('mysql2')->table("penyata")->where('tahun', $tahun)->where('bulan', $bulan)->where('penyata', 'ppko_proses')->sum('kuantiti');

        // $total_cpo =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`)
        // FROM 'penyata'
        // WHERE
        // `penyata`.`tahun` =  '$tahun' AND
        // `penyata`.`bulan` =  '$bulan'");



        // foreach ($querycpo1 as $data) {
        //     $total_cpo = ($data->stok_awal) + ($data->bekalan_belian) + ($data->bekalan_penerimaan) + ($data->bekalan_import);

        //     $total += $total_3a_3b + $total_3c_3d;
        //     $total_all_sem += $total;
        // }

        $array = [
            'tahun' => $tahun,
            'bulan' => $bulan,

            'querycpo1' => $querycpo1,
            'queryppo1' => $queryppo1,
            'querycpko1' => $querycpko1,
            'queryppko1' => $queryppko1,
            'total_cpo' => $total_cpo,
            'total_ppo' => $total_ppo,
            'total_cpko' => $total_cpko,
            'total_ppko' => $total_ppko,

            'breadcrumbs' => $breadcrumbs,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];


        return view('admin.laporan_dq.validasi-minyak-sawit-diproses', $array);
    }



    public function admin_oleo_export()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $negara = Negara::distinct()->orderBy('namanegara')->get();

        // $list_pelesen = User::where('id', '942')->get('name');

        // dd($list_pelesen);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.eksport.eksport', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'negeri', 'negara', 'users', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_by_licensee()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-licensee', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'negeri', 'users', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_all()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kawasan = Region::get();



        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Aktiviti"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.activities-all', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'negeri', 'users', 'prodsubgroup', 'produk', 'kawasan'));
    }

    public function admin_activities_by_state()
    {
        $prodgroup = ProdukGroup::get();
        $prodsubgroup = ProdukSubgroup::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-state', compact('returnArr', 'layout', 'prodgroup', 'prodsubgroup'));
    }

    public function admin_activities_by_district()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-district', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'negeri', 'users', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_by_region()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $kawasan = Region::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-region', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'kawasan', 'users', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_by_product()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        // $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        // $kawasan = Region::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-product', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_by_productgroup()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        // $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        // $kawasan = Region::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-productgroup', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'prodsubgroup', 'produk'));
    }


    public function admin_yearly_by_licensee()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        // $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        // $kawasan = Region::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-licensee', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'prodsubgroup', 'produk'));
    }

    public function admin_yearly_by_state()
    {


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-state', compact('returnArr', 'layout'));
    }

    public function admin_yearly_by_district()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-district', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_yearly_by_region()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-region', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_yearly_by_product()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-product', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_yearly_by_productgroup()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-productgroup', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_yearly_by_month()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-month', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_bulanan_lesen_process(Request $request)
    {
        dd($request->all());
        $tahun = $request->tahun;
        $produk = $request->produk;

        $test = DB::select("SELECT e.ebio_nl,e.ebio_reg ,p.e_nl, b.ebio_b1
        FROM pelesen p, e_bio_inits e, e_bio_b_s b
        WHERE e.ebio_thn = '$request->tahun'
        and p.e_nl = e.ebio_nl
        and e.ebio_nl = e.ebio_reg
        and e.ebio_b5 =  '$request->produk'");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.oleochemical-monthly.table-senarai-lesen', compact('returnArr', 'layout', 'test'));
    }
}
