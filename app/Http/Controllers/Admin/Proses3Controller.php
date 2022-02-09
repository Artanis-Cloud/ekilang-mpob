<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class Proses3Controller extends Controller
{

    public function admin_3daftarpenyata()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatapenapis()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-penapis', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyataisirung()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-isirung', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyataoleokimia()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-oleokimia', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatasimpanan()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-simpanan', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatabiodiesel()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-biodiesel', compact('returnArr', 'layout'));
    }

}
