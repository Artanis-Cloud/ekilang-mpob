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


    public function admin_senarai_laporan()
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

        return view('admin.laporan_dq.monthly.table-senarai-lesen', compact('returnArr', 'layout'));
    }
}
