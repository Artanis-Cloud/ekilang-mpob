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
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Notifications\Pelesen\HantarTukarPasswordPelesenNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class Proses2Controller extends Controller
{

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



        return view('admin.proses2.2tukar-password', compact('returnArr', 'layout'));
    }

    public function admin_tukarpass_process(Request $request)
    {

        $this->validation_tukar_password($request->all())->validate();

        $custom_pass = Str::random(8);

        $pelesen = User::where('username', $request->username)->first();
        $pelesen->password = Hash::make($custom_pass);
        $pelesen->save();

        // dd($pelesen);

        $pelesen->notify((new HantarTukarPasswordPelesenNotification($custom_pass)));

        //log audit trail admin
        Auth::user()->log(" UPDATE KATA LALUAN {$pelesen->username}" );


        return redirect()->back()->with('success', 'Emel tukar kata laluan sudah dihantar');
    }

    protected function validation_tukar_password(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string'],

        ]);
    }



    //tukar password by email


}
