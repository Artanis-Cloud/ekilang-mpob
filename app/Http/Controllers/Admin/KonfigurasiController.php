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
use App\Notifications\Admin\DaftarPentadbirNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

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
        // dd($request->all());

        // $this->validation_daftar_pentadbir($request->all())->validate();
        $daripada = $this->store_daftar_pentadbir($request->all()); // data created user masuk dalam variable $daripada
        $this->store_daftar_pentadbir2($request->all());
        // dd($daripada);
        //notification kalau admin, manager dan supervisor daftar admin.
        //kalau admin yg daftar untuk admin, notification akan masuk ke supervisor ke atas
        //kalau supervisor daftar utk sv dan admin, noti masuk manager ke atas
        //sama juga untuk manager
        //notification in system dengan ke email sv, manager and superadmin
        if ($request->role == 'Admin') {
            if (auth()->user()->role == 'Supervisor') {
                $kepadas = User::Where('role', 'Manager')->orWhere('role', 'Superadmin')->get(); // nak hantar kepada siapa, ubah where tu ikut kehendak
            } //tambah untuk auth()->user()->role lain jugak
            elseif (auth()->user()->role == 'Manager') {
                $kepadas = User::Where('role', 'Superadmin')->get(); // nak hantar kepada siapa, ubah where tu ikut kehendak
            } else {
                $kepadas = [];
            }
        }
        elseif ($request->role == 'Supervisor') {
            if (auth()->user()->role == 'Supervisor') {
                $kepadas = User::Where('role', 'Manager')->orWhere('role', 'Superadmin')->get(); // nak hantar kepada siapa, ubah where tu ikut kehendak
            } //tambah untuk auth()->user()->role lain jugak
            elseif (auth()->user()->role == 'Manager') {
                $kepadas = User::Where('role', 'Superadmin')->get(); // nak hantar kepada siapa, ubah where tu ikut kehendak
            } else {
                $kepadas = [];
            }
        } elseif ($request->role == 'Manager') {
            if (auth()->user()->role == 'Manager') {
                $kepadas = User::Where('role', 'Superadmin')->get(); // nak hantar kepada siapa, ubah where tu ikut kehendak
            } else {
                $kepadas = [];
            } //tambah untuk auth()->user()->role lain jugak

        } else {
            return redirect()->route('admin.senarai.pentadbir')->with('success', 'Maklumat Pentadbir sudah ditambah');
        }

        foreach ($kepadas as $kepada) {
            if ($kepada->email != '-') {
                $kepada->notify((new DaftarPentadbirNotification($kepada, $daripada)));
            } else {
                return redirect()->route('admin.senarai.pentadbir')
                    ->with('success', 'Maklumat Pentadbir telah dikemaskini');
            }
        }

        return redirect()->route('admin.senarai.pentadbir')->with('success', 'Maklumat Pentadbir sudah ditambah');
    }

    protected function validation_daftar_pentadbir(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'username' => ['required', 'string'],
            'role' => ['required', 'string'],
            'sub_cat[]' => ['required', 'string'],
            'status' => ['required', 'string'],

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
            'category' => 'admin',
            'role' => $data['role'],
            'sub_category' => json_encode($data['sub_cat']),
            'status' => $data['status'],
            'map_sdate' => now(),


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

        $admin = User::where('category', 'Admin')->get();
        // $admin = User::findOrFail('1686');

        // dd($admin);

        // foreach (json_decode($admin->sub_cat) as $cat) {
        //     dd($cat); //cara keluarkan category
        // }

        return view('admin.konfigurasi.senarai-admin', compact('returnArr', 'layout', 'admin'));
    }

    public function admin_edit_pentadbir(Request $request, $id)
    {


        // dd($request->all());
        $penyata = User::findOrFail($id);
        $penyata->name = $request->name;
        $penyata->email = $request->email;
        $penyata->username = $request->username;
        $penyata->sub_category = $request->sub_category;
        $penyata->role = $request->role;
        $penyata->status = $request->status;
        $penyata->save();



        return redirect()->route('admin.senarai.pentadbir')
            ->with('success', 'Maklumat telah disimpan');
    }


    //notification kalau admin, manager dan supervisor kemaskini data admin.
    //kalau admin yg kemaskini untuk admin, notification akan masuk ke supervisor ke atas
    //kalau supervisor kemaskini utk sv dan admin, noti masuk manager ke atas
    //sama juga untuk manager
    //notification in system dengan ke email sv, manager and superadmin



    public function admin_delete_pentadbir($id)
    {
        $penyata = User::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('admin.senarai.pentadbir')
            ->with('success', 'Pentadbir Dihapuskan');
    }

    public function redirect_notification($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            return redirect($notification->data['route']);
        }
    }
}
