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


    public function admin_2tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.2tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.2tukar-password', compact('returnArr', 'layout'));

    }

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



        return view('admin.3daftar-penyata', compact('returnArr', 'layout'));


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

public function admin_9penyataterdahulu()
{

    $breadcrumbs    = [
        ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
        ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Penyata Terdahulu"],
    ];

    $kembali = route('admin.dashboard');

    $returnArr = [
        'breadcrumbs' => $breadcrumbs,
        'kembali'     => $kembali,
    ];
    $layout = 'layouts.admin';

    return view('admin.9paparpenyataterdahulu', compact('returnArr', 'layout'));

}

public function admin_10portdatatodq()
{

    $breadcrumbs    = [
        ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
        ['link' => route('admin.10portdatatodq'), 'name' => "Port Data Ke Dynamic Query"],
    ];

    $kembali = route('admin.dashboard');

    $returnArr = [
        'breadcrumbs' => $breadcrumbs,
        'kembali'     => $kembali,
    ];
    $layout = 'layouts.admin';

    return view('admin.10portdatatodq', compact('returnArr', 'layout'));

}

public function admin_11emel()
{

    $breadcrumbs    = [
        ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
        ['link' => route('admin.11emel'), 'name' => "Senarai Emel"],
    ];

    $kembali = route('admin.dashboard');

    $returnArr = [
        'breadcrumbs' => $breadcrumbs,
        'kembali'     => $kembali,
    ];
    $layout = 'layouts.admin';

    return view('admin.11emel', compact('returnArr', 'layout'));

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


    public function admin_5penyatabelumhantar()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.5penyatabelumhantar'), 'name' => "Penyata Bulanan Belum Dihantar"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.5penyata-belum-hantar', compact('returnArr', 'layout'));

    }

    public function admin_6penyatapaparcetak()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.6penyatapaparcetak'), 'name' => "Papar & Cetak Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.6penyata-papar-cetak', compact('returnArr', 'layout'));

    }
}
