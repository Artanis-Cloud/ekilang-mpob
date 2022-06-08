<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\KumpProduk;
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
            ['link' => route('admin.9penyataterdahulu'), 'name' => "PL Lewat"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.pl-lewat', compact('returnArr', 'layout'));
    }

    public function admin_kapasiti()
    {

        // $pelesen = Pelesen::find($id);
        // $pelesen = Pelesen::with('regpelesen')->where('e_nl', $reg_pelesen[0]->e_nl)->get();
        // dd($pelesen);
        // $date= date("m");

        $reg_pelesen = RegPelesen::with('pelesen')->where('e_kat','PLBIO')->get();
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

        return view('admin.laporan_dq.kapasiti', compact('returnArr', 'layout','reg_pelesen'));
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

        return view('admin.laporan_dq.edit-kapasiti', compact('returnArr', 'layout','pelesen'));

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

        return view('admin.laporan_dq.stok-akhir', compact('returnArr', 'layout'));
    }

    public function admin_tambah_stok_akhir()
    {
        $bulan=Bulan::get();

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

        return view('admin.laporan_dq.tambah-stok-akhir', compact('returnArr', 'layout','bulan'));
    }

    public function admin_validasi_stok_akhir()
    {
        $bulan=Bulan::get();

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

        return view('admin.laporan_dq.validasi-stok-akhir', compact('returnArr', 'layout','bulan'));
    }

    public function admin_validasi_stok_akhir_ikut_produk()
    {
        $bulan=Bulan::get();

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

        return view('admin.laporan_dq.validasi-stok-akhir-ikut-produk', compact('returnArr', 'layout','bulan'));
    }

    public function admin_minyak_sawit_diproses()
    {
        $bulan=Bulan::get();

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

        return view('admin.laporan_dq.minyak-sawit-diproses', compact('returnArr', 'layout','bulan'));
    }

    public function admin_tambah_proses()
    {
        $bulan=Bulan::get();

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

        return view('admin.laporan_dq.tambah-proses', compact('returnArr', 'layout','bulan'));
    }

    public function admin_validasi_minyak_sawit_diproses()
    {
        $bulan=Bulan::get();

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

        return view('admin.laporan_dq.validasi-minyak-sawit-diproses', compact('returnArr', 'layout','bulan'));
    }

    public function admin_activities_by_licensee()
    {
        $prodgroup=ProdukGroup::get();
        $prodcat=ProdukCategory::get();
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

        return view('admin.laporan_dq.activities.by-licensee', compact('returnArr', 'layout','prodgroup', 'prodcat', 'negeri','users','prodsubgroup', 'produk'));
    }

    public function admin_activities_by_state()
    {
        $prodgroup=ProdukGroup::get();
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

        return view('admin.laporan_dq.activities.by-state', compact('returnArr', 'layout','prodgroup','prodsubgroup'));
    }

    public function admin_activities_by_district()
    {
        $prodgroup=ProdukGroup::get();
        $prodcat=ProdukCategory::get();
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

        return view('admin.laporan_dq.activities.by-district', compact('returnArr', 'layout','prodgroup', 'prodcat', 'negeri','users','prodsubgroup', 'produk'));
    }

    public function admin_activities_by_region()
    {
        $prodgroup=ProdukGroup::get();
        $prodcat=ProdukCategory::get();
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

        return view('admin.laporan_dq.activities.by-region', compact('returnArr', 'layout','prodgroup', 'prodcat', 'kawasan','users','prodsubgroup', 'produk'));
    }

    public function admin_activities_by_product()
    {
        $prodgroup=ProdukGroup::get();
        $prodcat=ProdukCategory::get();
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

        return view('admin.laporan_dq.activities.by-product', compact('returnArr', 'layout','prodgroup', 'prodcat','prodsubgroup', 'produk'));
    }

    public function admin_activities_by_productgroup()
    {
        $prodgroup=ProdukGroup::get();
        $prodcat=ProdukCategory::get();
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

        return view('admin.laporan_dq.activities.by-productgroup', compact('returnArr', 'layout','prodgroup', 'prodcat','prodsubgroup', 'produk'));
    }


    public function admin_yearly_by_licensee()
    {
        $prodgroup=ProdukGroup::get();
        $prodcat=ProdukCategory::get();
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

        return view('admin.laporan_dq.yearly.by-licensee', compact('returnArr', 'layout','prodgroup', 'prodcat','prodsubgroup', 'produk'));
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
        $bulan=Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah=Daerah::get();
        $subproduct=ProdukSubgroup::get();
        $prodcat=ProdukGroup::get();
        $kumpproduk=DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk=DB::connection('mysql2')->select("SELECT * FROM produk");

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

        return view('admin.laporan_dq.yearly.by-district', compact('returnArr', 'layout','bulan', 'negeri', 'subproduct', 'kumpproduk',
        'users2', 'produk', 'prodcat'));
    }

    public function admin_yearly_by_region()
    {
        $bulan=Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah=Daerah::get();
        $subproduct=ProdukSubgroup::get();
        $prodcat=ProdukGroup::get();
        $kumpproduk=DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk=DB::connection('mysql2')->select("SELECT * FROM produk");

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

        return view('admin.laporan_dq.yearly.by-region', compact('returnArr', 'layout','bulan', 'negeri', 'subproduct', 'kumpproduk',
        'users2', 'produk', 'prodcat'));
    }

    public function admin_yearly_by_product()
    {
        $bulan=Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah=Daerah::get();
        $subproduct=ProdukSubgroup::get();
        $prodcat=ProdukGroup::get();
        $kumpproduk=DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk=DB::connection('mysql2')->select("SELECT * FROM produk");

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

        return view('admin.laporan_dq.yearly.by-product', compact('returnArr', 'layout','bulan', 'negeri', 'subproduct', 'kumpproduk',
        'users2', 'produk', 'prodcat'));
    }

    public function admin_yearly_by_productgroup()
    {
        $bulan=Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah=Daerah::get();
        $subproduct=ProdukSubgroup::get();
        $prodcat=ProdukGroup::get();
        $kumpproduk=DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk=DB::connection('mysql2')->select("SELECT * FROM produk");

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

        return view('admin.laporan_dq.yearly.by-productgroup', compact('returnArr', 'layout','bulan', 'negeri', 'subproduct', 'kumpproduk',
        'users2', 'produk', 'prodcat'));
    }

    public function admin_yearly_by_month()
    {
        $bulan=Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah=Daerah::get();
        $subproduct=ProdukSubgroup::get();
        $prodcat=ProdukGroup::get();
        $kumpproduk=DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk=DB::connection('mysql2')->select("SELECT * FROM produk");

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

        return view('admin.laporan_dq.yearly.by-month', compact('returnArr', 'layout','bulan', 'negeri', 'subproduct', 'kumpproduk',
        'users2', 'produk', 'prodcat'));
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
