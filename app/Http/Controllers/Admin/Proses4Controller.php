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

class Proses4Controller extends Controller
{

    public function admin_4ekilangpleid()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Penyata Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID', compact('returnArr', 'layout'));
    }


    public function admin_4ekilangpleidpenapis()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID-penapis', compact('returnArr', 'layout'));
    }


    public function admin_4ekilangpleidisirung()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID-isirung', compact('returnArr', 'layout'));
    }


    public function admin_4ekilangpleidoleokimia()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID-oleokimia', compact('returnArr', 'layout'));
    }


    public function admin_4ekilangpleidsimpanan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Pindahan Data Dari e-Kilang ke PLEID"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses4.4EKilang-PLEID-simpanan', compact('returnArr', 'layout'));
    }

}
