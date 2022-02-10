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

class Proses11Controller extends Controller
{

    public function admin_11emel()
    {

        $listemel = Ekmessage::get();

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


    public function admin_11paparemel($MsgID, Ekmessage $email)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pengumuman'), 'name' => "Pengumuman"],
            ['link' => route('admin.pengumuman'), 'name' => "Kemaskini Pengumuman"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $nid = Ekmessage::where ('MsgID', $request->id)->first('MsgID');
        $email = Ekmessage::find($MsgID);
        // $pengumuman = \DB::table('pengumuman')->get();
        // dd($id);

        return view('admin.proses11.11paparemel', compact('returnArr', 'layout', 'email'));

        // return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

}
