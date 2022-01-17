<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KilangController extends Controller
{
    public function admin_kilangbuah()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.kilang-buah');
    }

    public function admin_kilangpenapis()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.kilang-penapis');
    }
    public function admin_kilangisirung()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.kilang-isirung');
    }
    public function admin_kilangoleokimia()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.kilang-oleokimia');
    }
    public function admin_pusatsimpanan()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.pusat-simpanan');
    }
    public function admin_ebiodiesel()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.e-biodiesel');
    }

    public function admin_1daftarpelesen()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('admin.senaraipelesen');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.1daftarpelesen', compact('returnArr', 'layout'));

    }

    public function admin_senaraipelesen()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.senarai-pelesen', compact('returnArr', 'layout'));

    }


    public function admin_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.tukar-password', compact('returnArr', 'layout'));

    }

    public function admin_daftarpenyata()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.daftar-penyata', compact('returnArr', 'layout'));


    }
public function admin_7portingmaklumat()
{

    $breadcrumbs    = [
        ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
        ['link' => route('admin.7portingmaklumat'), 'name' => "Port Maklumat"],
    ];

    $kembali = route('admin.dashboard');

    $returnArr = [
        'breadcrumbs' => $breadcrumbs,
        'kembali'     => $kembali,
    ];
    $layout = 'layouts.admin';

    return view('admin.7portingmaklumat', compact('returnArr', 'layout'));

}
public function admin_8portdata()
{

    $breadcrumbs    = [
        ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
        ['link' => route('admin.8portdata'), 'name' => "Port Data"],
    ];

    $kembali = route('admin.dashboard');

    $returnArr = [
        'breadcrumbs' => $breadcrumbs,
        'kembali'     => $kembali,
    ];
    $layout = 'layouts.admin';

    return view('admin.8portdata', compact('returnArr', 'layout'));

}



    public function admin_4ekilangpleid()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.4ekilangpleid'), 'name' => "Daftar Penyata Bulanan Baru"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.4EKilang-PLEID', compact('returnArr', 'layout'));

    }
}
