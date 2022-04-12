<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SenaraiProdukController extends Controller
{
    public function admin_9penyataterdahulu()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraiproduk'), 'name' => "Senarai Kod dan Nama Produk Sawit"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.senaraiproduk', compact('returnArr', 'layout'));
    }
}
