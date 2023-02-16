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
use App\Notifications\Admin\DaftarPentadbirNotification2;
use App\Notifications\Pelesen\HantarPendaftaranPelesenNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request as FacadesRequest;

class KonfigurasiController extends Controller
{


    public function admin_pengurusan_pentadbir()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pengurusan.pentadbir'), 'name' => "Senarai Pentadbir"],
            ['link' => route('admin.pengurusan.pentadbir'), 'name' => "Daftar Akaun Pentadbir"],
        ];

        $kembali = route('admin.senarai.pentadbir');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';


        return view('admin.konfigurasi.pengurusan-pentadbir', compact('returnArr', 'layout'));
    }

    public function admin_pengurusan_pentadbir_process(Request $request)
    {


        if (array_key_exists("sub_cat",$request->all())) {

            $check_users = User::where('username', $request->username)->first();
            $check_regusers = RegUser::where('e_userid', $request->username)->first();



            if (!$check_users || !$check_regusers) {

                $this->validation_daftar_pentadbir($request->all())->validate();
                $daripada = $this->store_daftar_pentadbir($request->all()); // data created user masuk dalam variable $daripada
                $this->store_daftar_pentadbir2($request->all());


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

                } elseif ($request->role == 'Superadmin'){
                    if (auth()->user()->role == 'Superadmin') {
                        $kepadas = User::Where('role', 'Superadmin')->get(); // nak hantar kepada siapa, ubah where tu ikut kehendak
                    } else {
                        $kepadas = [];
                    }
                }
                else {
                    return redirect()->route('admin.senarai.pentadbir')->with('success', 'Maklumat Pentadbir sudah ditambah');
                }



                $kepada2 = User::where('username', auth()->user()->username)->first();


                foreach ($kepadas as $kepada) {

                        $kepada->notify((new DaftarPentadbirNotification2($daripada, $daripada)));

                }
                $kepada2->notify((new DaftarPentadbirNotification($daripada, $daripada)));


                //log audit trail admin
                Auth::user()->log(" ADD ADMIN {$daripada->username}" );

                return redirect()->route('admin.senarai.pentadbir')->with('success', 'Maklumat Pentadbir sudah ditambah');

            }
            else {
                return redirect()->back()
                        ->with('error', 'Username sudah wujud! ');
            }

        }
        else {
                return redirect()->back()
                        ->with('error', 'Sila pilih sekurang-kurangnya satu sub-kategori ');
        }
    }

    protected function validation_daftar_pentadbir(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'username' => ['required', 'string'],
            'role' => ['required', 'string'],
            'sub_cat[]' => ['nullable', 'array', 'min:1'],
            'status' => ['required', 'string'],

        ]);
    }

    protected function store_daftar_pentadbir(array $data)
    {


        $pass = 'admin123';
        $password = Hash::make('admin123');
        $pq = Crypt::encryptString('admin123');

        $password2 =  $pq;

        if (array_key_exists("sub_cat[]",$data)) {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
                'crypted_pass' => $password2,
                'username' => $data['username'],
                'category' => 'admin',
                'role' => $data['role'],
                'sub_cat' => json_encode($data['sub_cat']) ,
                'status' => $data['status'],
                'map_sdate' => now(),


            ]);
        } else {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
                'crypted_pass' => $password2,
                'username' => $data['username'],
                'category' => 'admin',
                'role' => $data['role'],
                'sub_cat' => json_encode($data['sub_cat']) ,
                'status' => $data['status'],
                'map_sdate' => now(),


            ]);
        }

    }

    protected function store_daftar_pentadbir2(array $data)
    {

        if (array_key_exists("sub_cat[]",$data)) {

        return RegUser::create([
            'e_userid' => $data['username'],
            'e_kat' => json_encode($data['sub_cat']),
        ]);
    } else {
        return RegUser::create([
            'e_userid' => $data['username'],

        ]);
    }
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


        return view('admin.konfigurasi.senarai-admin', compact('returnArr', 'layout', 'admin'));
    }

    public function admin_edit_pentadbir(Request $request, $id)
    {


        $penyata = User::findOrFail($id);
        $penyata->name = $request->name;
        $penyata->email = $request->email;
        $penyata->username = $request->username;
        $penyata->sub_cat = json_encode($request['sub_cat']);
        $penyata->role = $request->role;
        $penyata->status = $request->status;
        $penyata->save();

        //log audit trail admin
        Auth::user()->log(" UPDATE ADMIN {$penyata->username}" );


        return redirect()->route('admin.senarai.pentadbir')
            ->with('success', 'Maklumat telah disimpan');
    }




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

            
            if ($notification->data['route']){
            return redirect($notification->data['route']);

            } else {
                return redirect()->back();
            }
        }
    }
}
