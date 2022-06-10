<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use App\Models\Daerah;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Produk;
use App\Models\ProdukCategory;
use App\Models\ProdukGroup;
use App\Models\ProdukSubgroup;
use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;

class MonthlyController extends Controller
{

    public function admin_monthly_by_licensee()
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

        return view('admin.laporan_dq.monthly.by-licensee', compact('returnArr', 'layout', 'bulan', 'negeri', 'daerah', 'subproduct',
                    'prodcat', 'kumpproduk', 'produk', 'users2'));
    }

    public function admin_monthly_by_state()
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

        return view('admin.laporan_dq.monthly.by-state', compact('returnArr', 'layout', 'bulan', 'negeri', 'daerah', 'subproduct',
                    'prodcat', 'kumpproduk', 'produk', 'users2'));
    }

    public function admin_monthly_by_district()
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

        return view('admin.laporan_dq.monthly.by-district', compact('returnArr', 'layout', 'bulan', 'negeri', 'daerah', 'subproduct',
                    'prodcat', 'kumpproduk', 'produk', 'users2'));
    }

    public function admin_monthly_by_region()
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

        return view('admin.laporan_dq.monthly.by-region', compact('returnArr', 'layout', 'bulan', 'negeri', 'daerah', 'subproduct',
                    'prodcat', 'kumpproduk', 'produk', 'users2'));
    }

    public function admin_monthly_by_product()
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

        return view('admin.laporan_dq.monthly.by-product', compact('returnArr', 'layout', 'bulan', 'negeri', 'daerah', 'subproduct',
                    'prodcat', 'kumpproduk', 'produk', 'users2'));
    }

    public function admin_monthly_by_productgroup()
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

        return view('admin.laporan_dq.monthly.by-productgroup', compact('returnArr', 'layout', 'bulan', 'negeri', 'daerah', 'subproduct',
                    'prodcat', 'kumpproduk', 'produk', 'users2'));
    }

    public function admin_monthly_all()
    {
        $prodgroup=ProdukGroup::get();
        $prodcat=ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

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

        return view('admin.laporan_dq.monthly.monthly-all', compact('returnArr', 'layout','prodgroup', 'prodcat', 'negeri','users','prodsubgroup', 'produk'));
    }
}
