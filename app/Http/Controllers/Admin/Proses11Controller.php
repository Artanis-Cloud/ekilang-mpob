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

use Barryvdh\DomPDF\Facade\Pdf;
use DB;

class Proses11Controller extends Controller
{

    public function admin_11emel()
    {

        $listemel = Ekmessage::orderBy('Date', 'DESC')->get();
        // dd($listemel);
        // $date = $listemel->Date;
        // $dt = date("d-m-Y H:i:s", strtotime($date));


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

        return view('admin.proses11.11emel', compact('returnArr', 'layout', 'listemel'));
    }

    // public function admin_11paparemel(Request $request)
    // {
    //     $emel = DB::select("SELECT  MsgID, Date as sdate, FromName, FromLicense, FromEmail, Category, TypeOfEmail, Subject, Message
    //          FROM ekmessage");

    //     // dd($emel);

    //     //  $emel = Ekmessage::first();

    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('admin.11emel'), 'name' => "Senarai Emel"],
    //         ['link' => route('admin.11paparemel'), 'name' => "Papar Emel"],
    //     ];

    //     $kembali = route('admin.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';

    //     return view('admin.proses11.11paparemel', compact('returnArr', 'layout', 'emel'));
    // }


    public function admin_11paparemel($MsgID, Ekmessage $emel)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.11emel'), 'name' => "Senarai Emel"],
            ['link' => route('admin.11emel'), 'name' => "Papar Emel"],

        ];

        $kembali = route('admin.11emel');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $nid = Ekmessage::where ('MsgID', $request->id)->first('MsgID');
        $emel = Ekmessage::find($MsgID);
        $mess = $emel->Message;
        // $pengumuman = \DB::table('pengumuman')->get();
        // dd($emel);

        return view('admin.proses11.11paparemel', compact('returnArr', 'layout', 'emel', 'mess'));

        // return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_11papar_cetak($MsgID, Ekmessage $emel)
    {
        # code...
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.11emel'), 'name' => "Senarai Emel"],
            ['link' => route('admin.11emel'), 'name' => "Papar Emel"],

        ];

        $kembali = route('admin.11emel');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        $emel = Ekmessage::find($MsgID);
        $mess = $emel->Message;

        $array = [
            'breadcrumbs' => $breadcrumbs,
            'returnArr' => $returnArr,
            'layout' => $layout,
            'emel' => $emel,
            'mess' => $mess,
            'kembali' => $kembali
        ];

        $pdf = PDF::loadView('admin.proses11.11print', $array)->setPaper('a4', 'vertical');
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'basePath' => public_path()]);
        // return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }

}
