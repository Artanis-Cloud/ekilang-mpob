<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class TetapanAkaunController extends Controller
{


    public function admin_akaun_pentadbir()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.akaun.pentadbir'), 'name' => "Akaun Pentadbir"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $user = User::first();;

        return view('admin.tetapan-akaun.akaun-pentadbir', compact('returnArr', 'layout','user'));
    }

    public function admin_akaun_pentadbir_process(Request $request, $id)
    {

        // dd($id);
        $admin = User::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->category = $request->category;
        $admin->sub_cat =  json_encode($request['sub_cat']);
        $admin->status = $request->status;
        $admin->save();

        // dd($admin);

        return redirect()->route('admin.akaun.pentadbir')
            ->with('success', 'Maklumat telah dikemaskini');
    }


    public function sessionTimeout()
    {
        auth()->logout();
        return redirect()->route('login')->with('error', 'Session Ends');
    }

}
    