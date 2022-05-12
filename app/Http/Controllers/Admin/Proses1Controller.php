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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Proses1Controller extends Controller
{
    public function admin_login()
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

        return view('admin.admin-login');
    }


    public function admin_1daftarpelesen()
    {
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Maklumat Asas Pelesen"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Daftar Pelesen Baru"],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses1.1daftarpelesen', compact('returnArr', 'layout', 'negeri'));
    }

    public function admin_1daftarpelesen_proses(Request $request)
    {
         dd($request->all());

        $this->validation_daftar_pelesen($request->all())->validate();

        $this->store_daftar_pelesen($request->all());
        $this->store_daftar_pelesen2($request->all());
        $this->store_daftar_pelesen3($request->all());

        return redirect()->back()->with('success', 'Maklumat Pelesen sudah ditambah');
    }

    protected function validation_daftar_pelesen(array $data)
    {
        return Validator::make($data, [
            'e_kat' => ['required', 'string'],
            'e_status' => ['required', 'string'],
            'e_stock' => ['required', 'string'],
            'directory' => ['required', 'string'],
            'kodpgw' => ['required', 'string'],
            'nosiri' => ['required', 'string'],
            'e_nl' => ['required', 'string'],
            'e_np' => ['required', 'string'],
            'e_ap1' => ['required', 'string'],
            'e_ap2' => ['required', 'string'],
            'e_ap3' => ['required', 'string'],
            'e_as1' => ['required', 'string'],
            'e_as2' => ['required', 'string'],
            'e_as3' => ['required', 'string'],
            'e_notel' => ['required', 'string'],
            'e_nofax' => ['required', 'string'],
            'e_email' => ['required', 'string'],
            'e_npg' => ['required', 'string'],
            'e_jpg' => ['required', 'string'],
            'e_notel_pg' => ['required', 'string'],
            'e_email_pg' => ['required', 'string'],
            'e_npgtg' => ['required', 'string'],
            'e_jpgtg' => ['required', 'string'],
            'e_email_pengurus' => ['required', 'string'],
            'e_negeri' => ['required', 'string'],
            'e_daerah' => ['required', 'string'],
            'e_kawasan' => ['required', 'string'],
            'e_syktinduk' => ['required', 'string'],
            'e_year' => ['required', 'string'],
            'e_group' => ['required', 'string'],
            'e_poma' => ['required', 'string'],
            'kap_proses' => ['required', 'string'],
            'kap_tangki' => ['required', 'string'],

        ]);
    }

    protected function store_daftar_pelesen(array $data)
    {

        // $count = RegPelesen::count();


        // return RegPelesen::create([
        //     // 'e_id' => $count++,
        //     'e_nl' => $data['e_nl'],
        //     'e_kat' => $data['e_kat'],
        //     'e_pwd' => '12345',
        //     'kodpgw' => $data['kodpgw'],
        //     'nosiri' => $data['nosiri'],
        //     'e_status' => $data['e_status'],
        //     'e_stock' => $data['e_stock'],
        //     'directory' => $data['directory'],
        // ]);

        $count = Pelesen::count();
        //
        return Pelesen::create([
            'e_id' => $count++,
            'e_nl' => $data['e_nl'],
            'e_np' => $data['e_np'],
            'e_ap1' => $data['e_ap1'],
            'e_ap2' => $data['e_ap2'],
            'e_ap3' => $data['e_ap3'],
            'e_as1' => $data['e_as1'],
            'e_as2' => $data['e_as2'],
            'e_as3' => $data['e_as3'],
            'e_notel' => $data['e_notel'],
            'e_nofax' => $data['e_nofax'],
            'e_email' => $data['e_email'],
            'e_npg' => $data['e_npg'],
            'e_jpg' => $data['e_jpg'],
            'e_notel_pg' => $data['e_notel_pg'],
            'e_email_pg' => $data['e_email_pg'],
            'kodpgw' => $data['kodpgw'],
            'nosiri' => $data['nosiri'],
            'e_npgtg' => $data['e_npgtg'],
            'e_jpgtg' => $data['e_jpgtg'],
            'e_negeri' => $data['e_negeri'],
            'e_daerah' => $data['e_daerah'],
            'e_kawasan' => $data['e_kawasan'],
            'e_syktinduk' => $data['e_syktinduk'],
            'e_group' => $data['e_group'],
            'e_poma' => $data['e_poma'],
            'e_year' => $data['e_year'],
            'e_email_pengurus' => $data['e_email_pengurus'],
            'kap_proses' => $data['kap_proses'],
            'kap_tangki' => $data['kap_tangki'],

        ]);
    }
    protected function store_daftar_pelesen2(array $data)
    {
        return RegPelesen::create([
            'e_nl' => $data['e_nl'],
            'e_kat' => $data['e_kat'],
            'e_pwd' => '12345',
            'kodpgw' => $data['kodpgw'],
            'nosiri' => $data['nosiri'],
            'e_status' => $data['e_status'],
            'e_stock' => $data['e_stock'],
            'directory' => $data['directory'],
        ]);
    }
    protected function store_daftar_pelesen3(array $data)
    {
        $password = Hash::make('12345');

        return User::create([
            'name' => $data['e_np'],
            'email' => $data['e_email'],
            'password' => $password,
            'username' => $data['e_nl'],
            'category' => $data['e_kat'],
            'kod_pegawai' => $data['kodpgw'],
            'no_siri' => $data['nosiri'],
            'status' => $data['e_status'],
            'stock' => $data['e_stock'],
            'directory' => $data['directory'],
        ]);
    }

    public function admin_papar_maklumat($e_id, RegPelesen $reg_pelesen)
    {

        $reg_pelesen = RegPelesen::find($e_id);
        $pelesen = Pelesen::where('e_nl', $reg_pelesen->e_nl)->first();
        // dd($pelesen);

        if ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL91') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PL91') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenbatalbuah'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL101') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PL101') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.penapis'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL102') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_kat == 'PL102' && $reg_pelesen->e_status == '2') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.isirung'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL104') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PL104') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.oleokimia'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL111') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PL111') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.simpanan'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        }
        // } elseif($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PLBIO'){
        //     $breadcrumbs    = [
        //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
        //         ['link' => route('admin.senaraipelesen'), 'name' => "Senarai Pelesen Penapis"],
        //         ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

        //     ];
        // } elseif($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PLBIO'){
        //     $breadcrumbs    = [
        //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
        //         ['link' => route('admin.senaraipelesenbatalpenapis'), 'name' => "Senarai Pelesen Penapis Dibatalkan"],
        //         ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

        //     ];
        // }


        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $nid = Ekmessage::where ('MsgID', $request->id)->first('MsgID');

        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();


        // $pelesen = Pelesen::find($e_id);
        // dd($pelesen);
        // $pengumuman = \DB::table('pengumuman')->get();
        // dd($id);

        return view('admin.proses1.papar-maklumat', compact('returnArr', 'layout', 'pelesen', 'negeri', 'reg_pelesen'));

        // return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_papar_maklumat_batal($e_id, Pelesen $pelesen)
    {
        // dd($e_id);
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbatalbuah'), 'name' => "Senarai Pelesen Dibatalkan"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $nid = Ekmessage::where ('MsgID', $request->id)->first('MsgID');

        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $pelesen = Pelesen::find($e_id);
        // dd($pelesen);
        // $pengumuman = \DB::table('pengumuman')->get();
        // dd($id);

        return view('admin.proses1.papar-maklumat-batal', compact('returnArr', 'layout', 'pelesen', 'negeri'));

        // return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_senaraipelesenbuah()
    {
        //test data
        // $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 1)->where('e_id', 677)->get();
        $pelesen = Pelesen::get('e_nl');
        // dd($pelesen);
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 1)->get();
        // dd($users);
        // $pelesen = Pelesen::get();


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-buah', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenpenapis()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL101')->where('e_status', 1)->get();
        // dd($users);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenisirung()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL102')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenoleokimia()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL104')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-oleokimia', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesensimpanan()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenbio()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-bio', compact('returnArr', 'layout'));
    }

    public function admin_senaraipelesenbatalbuah()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-buah', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_penapis()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL101')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenpenapis');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_isirung()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL102')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenisirung');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_oleokimia()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL104')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenoleokimia');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-oleokimia', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_simpanan()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesensimpanan');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_bio()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenbio');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-bio', compact('returnArr', 'layout', 'users'));
    }
}
