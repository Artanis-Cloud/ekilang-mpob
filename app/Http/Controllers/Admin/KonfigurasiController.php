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
use App\Models\RegUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use DB;

class KonfigurasiController extends Controller
{


    public function admin_pengurusan_pentadbir()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senarai.pentadbir'), 'name' => "Senarai Pentadbir"],
            ['link' => route('admin.pengurusan.pentadbir'), 'name' => "Daftar Akaun Pentadbir"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $user = User::find($id);

        return view('admin.konfigurasi.pengurusan-pentadbir', compact('returnArr', 'layout'));
    }

    public function admin_pengurusan_pentadbir_process(Request $request)
    {
        $this->validation_daftar_pentadbir($request->all())->validate();
        $this->store_daftar_pentadbir($request->all());
        $this->store_daftar_pentadbir2($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Maklumat Pentadbir sudah ditambah');
    }

    protected function validation_daftar_pentadbir(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'username' => ['required', 'string'],
            'role' => ['required', 'string'],

        ]);
    }

    protected function store_daftar_pentadbir(array $data)
    {
        $password = Hash::make('admin123');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'username' => $data['username'],
            'category' => 'Admin',
            'role' => $data['role'],
        ]);
    }

    protected function store_daftar_pentadbir2(array $data)
    {
        // $password = Hash::make('admin123');
        return RegUser::create([
            // 'name' => $data['name'],
            // 'email' => $data['email'],
            // 'e_pwd' => $password,
            'e_userid' => $data['username'],
            // 'category' => $data['category'],
        ]);
    }


    public function admin_senarai_pentadbir()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pengurusan.pentadbir'), 'name' => "Senarai Pentadbir"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $admin = User::where('category','Admin')->get();
        // dd($admin);

        return view('admin.konfigurasi.senarai-admin', compact('returnArr', 'layout', 'admin'));
    }

}
