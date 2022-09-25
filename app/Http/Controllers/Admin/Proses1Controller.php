<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Kapasiti;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use App\Models\User;
use App\Notifications\Pelesen\HantarPendaftaranPelesenNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BuahExport;

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

        $user = User::where('category', 'Admin')->get();
        // dd($user[3]->sub_cat);
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Daftar Pelesen Baru"],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        return view('admin.proses1.1daftarpelesen', compact('returnArr', 'layout', 'negeri', 'user'));
    }

    public function admin_1daftarpelesen_proses(Request $request)
    {
        // dd($request->all());

        $this->validation_daftar_pelesen($request->all())->validate();

        $this->store_daftar_pelesen($request->all());
        $this->store_kapasiti($request->all());
        $custom_pass = $this->store_daftar_pelesen2($request->all());
        $pelesen = $this->store_daftar_pelesen3($request->all(), $custom_pass);

        $pelesen->notify((new HantarPendaftaranPelesenNotification($custom_pass)));

        //log audit trail admin
        Auth::user()->log(" ADD PELESEN {$pelesen->username}");


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
            'e_nl' => ['required', 'string', 'unique:pelesen'],
            'e_np' => ['required', 'string'],
            'e_ap1' => ['required', 'string'],
            // 'e_ap2' => ['required', 'string'],
            // 'e_ap3' => ['required', 'string'],
            'e_as1' => ['required', 'string'],
            // 'e_as2' => ['required', 'string'],
            // 'e_as3' => ['required', 'string'],
            'e_notel' => ['required', 'string'],
            // 'e_nofax' => ['required', 'string'],
            'e_email' => ['required', 'string'],
            'e_npg' => ['required', 'string'],
            'e_jpg' => ['required', 'string'],
            'e_notel_pg' => ['required', 'string'],
            // 'e_email_pg' => ['required', 'string'],
            'e_npgtg' => ['required', 'string'],
            'e_jpgtg' => ['required', 'string'],
            'e_email_pengurus' => ['required', 'string'],
            'e_negeri' => ['required', 'string'],
            'e_daerah' => ['required', 'string'],
            'e_kawasan' => ['required', 'string'],
            'e_syktinduk' => ['required', 'string'],
            'e_year' => ['required', 'string'],
            'e_group' => ['required', 'string'],
            // 'e_poma' => ['required', 'string'],
            'kap_proses' => ['required', 'string'],
            // 'bil_tangki_cpo' => ['required', 'string'],
            // 'bil_tangki_ppo' => ['required', 'string'],
            // 'bil_tangki_cpko' => ['required', 'string'],
            // 'bil_tangki_ppko' => ['required', 'string'],
            // 'bil_tangki_others' => ['required', 'string'],
            // 'kap_tangki_cpo' => ['required', 'string'],
            // 'kap_tangki_ppo' => ['required', 'string'],
            // 'kap_tangki_cpko' => ['required', 'string'],
            // 'kap_tangki_ppko' => ['required', 'string'],
            // 'kap_tangki_others' => ['required', 'string'],
            // 'e_pwd' => ['required', 'string'],


            // 'kap_tangki' => ['required', 'string'],

        ]);
    }

    protected function store_daftar_pelesen(array $data)
    {

        $count = Pelesen::max('e_id');

        //
        return Pelesen::create([
            'e_id' => $count + 1,
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
            // 'e_email_pg' => $data['e_email_pg'],
            'kodpgw' => $data['kodpgw'],
            'nosiri' => $data['nosiri'],
            'e_npgtg' => $data['e_npgtg'],
            'e_jpgtg' => $data['e_jpgtg'],
            'e_negeri' => $data['e_negeri'],
            'e_daerah' => $data['e_daerah'],
            'e_kawasan' => $data['e_kawasan'],
            'e_syktinduk' => $data['e_syktinduk'],
            'e_group' => $data['e_group'],
            'e_poma' => null,
            'e_year' => $data['e_year'],
            'e_email_pengurus' => $data['e_email_pengurus'],
            'kap_proses' => $data['kap_proses'],
            'tahun' => date("Y"),
            'bulan' => date("m"),
            // 'kap_tangki' => $data['kap_tangki'],
            // 'bil_tangki_cpo' => $data['bil_tangki_cpo'],
            // 'bil_tangki_ppo' => $data['bil_tangki_ppo'],
            // 'bil_tangki_cpko' => $data['bil_tangki_cpko'],
            // 'bil_tangki_ppko' => $data['bil_tangki_ppko'],
            // 'bil_tangki_others' => $data['bil_tangki_others'],
            // 'kap_tangki_cpo' => $data['kap_tangki_cpo'],
            // 'kap_tangki_ppo' => $data['kap_tangki_ppo'],
            // 'kap_tangki_cpko' => $data['kap_tangki_cpko'],
            // 'kap_tangki_ppko' => $data['kap_tangki_ppko'],
            // 'kap_tangki_others' => $data['kap_tangki_others'],

        ]);
    }

    protected function store_kapasiti(array $data)
    {

        // $count = Kapasiti::max('id');

        // dd($data['kap_proses']);
        return Kapasiti::create([
            // 'id' => $count+ 1,
            'e_nl' => $data['e_nl'],
            'tahun' => date("Y"),
            'jan' => $data['kap_proses'],
            'feb' => $data['kap_proses'],
            'mac' => $data['kap_proses'],
            'apr' => $data['kap_proses'],
            'mei' => $data['kap_proses'],
            'jun' => $data['kap_proses'],
            'jul' => $data['kap_proses'],
            'ogs' => $data['kap_proses'],
            'sept' => $data['kap_proses'],
            'okt' => $data['kap_proses'],
            'nov' => $data['kap_proses'],
            'dec' => $data['kap_proses'],
            // 'e_nl' => $request->e_nl,
            // 'tahun' => date("Y"),
            // 'jan' => $request->kap_proses,
            // 'feb' => $request->kap_proses,
            // 'mac' => $request->kap_proses,
            // 'apr' => $request->kap_proses,
            // 'mei' => $request->kap_proses,
            // 'jun' => $request->kap_proses,
            // 'jul' => $request->kap_proses,
            // 'ogs' => $request->kap_proses,
            // 'sept' => $request->kap_proses,
            // 'okt' => $request->kap_proses,
            // 'nov' => $request->kap_proses,
            // 'dec' => $request->kap_proses,

        ]);
    }
    protected function store_daftar_pelesen2(array $data)
    {
        $custom_pass = Str::random(8);

        $reg_pelesen = RegPelesen::create([
            'e_nl' => $data['e_nl'],
            'e_kat' => $data['e_kat'],
            'e_pwd' => Hash::make($custom_pass),
            'kodpgw' => $data['kodpgw'],
            'nosiri' => $data['nosiri'],
            'e_status' => $data['e_status'],
            'e_stock' => $data['e_stock'],
            'directory' => $data['directory'],
        ]);

        return $custom_pass;
    }
    protected function store_daftar_pelesen3(array $data, $custom_pass)
    {
        return User::create([
            'name' => $data['e_np'],
            'email' => $data['e_email'],
            'password' => Hash::make($custom_pass),
            'username' => $data['e_nl'],
            'category' => $data['e_kat'],
            'kod_pegawai' => $data['kodpgw'],
            'no_siri' => $data['nosiri'],
            'status' => $data['e_status'],
            'stock' => $data['e_stock'],
            'directory' => $data['directory'],
            'map_sdate' => now(),
        ]);
    }

    public function admin_papar_maklumat($e_id, RegPelesen $reg_pelesen)
    {

        $reg_pelesen = RegPelesen::find($e_id);
        // $reg_pelesen = RegPelesen::where('e_nl', );
        // dd($reg_pelesen);
        $pelesen = Pelesen::with('negeri', 'negeri.daerahs')->where('e_nl', $reg_pelesen->e_nl)->first();
        $pelesen2 = Pelesen::with('negeri', 'negeri.daerahs')->where('e_nl', $reg_pelesen->e_nl)->whereRelation('negeri.daerahs', 'daerah.kod_daerah', $pelesen->e_daerah)->first();

        // dd($pelesen2);
        $jumlah = ($pelesen->bil_tangki_cpo ?? 0) +
            ($pelesen->bil_tangki_ppo ?? 0) +
            ($pelesen->bil_tangki_cpko ?? 0) +
            ($pelesen->bil_tangki_ppko ?? 0) +
            ($pelesen->bil_tangki_others ?? 0);

        $jumlah2 = ($pelesen->kap_tangki_cpo ?? 0) +
            ($pelesen->kap_tangki_ppo ?? 0) +
            ($pelesen->kap_tangki_cpko ?? 0) +
            ($pelesen->kap_tangki_ppko ?? 0) +
            ($pelesen->kap_tangki_others ?? 0);

        $jumlah3 = ($pelesen->bil_tangki_cpo ?? 0) +
            ($pelesen->bil_tangki_ppo ?? 0) +
            ($pelesen->bil_tangki_cpko ?? 0) +
            ($pelesen->bil_tangki_ppko ?? 0) +
            ($pelesen->bil_tangki_oleo ?? 0) +
            ($pelesen->bil_tangki_others ?? 0);

        $jumlah4 = ($pelesen->kap_tangki_cpo ?? 0) +
            ($pelesen->kap_tangki_ppo ?? 0) +
            ($pelesen->kap_tangki_cpko ?? 0) +
            ($pelesen->kap_tangki_ppko ?? 0) +
            ($pelesen->kap_tangki_oleo ?? 0) +
            ($pelesen->kap_tangki_others ?? 0);



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
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PLBIO') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Penapis"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PLBIO') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.penapis'), 'name' => "Senarai Pelesen Penapis Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        }


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

        return view('admin.proses1.papar-maklumat', compact(
            'returnArr',
            'layout',
            'pelesen',
            'pelesen2',
            'negeri',
            'reg_pelesen',
            'jumlah',
            'jumlah2',
            'jumlah3',
            'jumlah4'
        ));
    }

    public function admin_update_maklumat_asas_pelesen(Request $request, $id)
    {
        $penyata = Pelesen::findOrFail($id);
        $penyata->e_status = $request->e_status;
        // $penyata->directory = $request->directory;
        $penyata->kodpgw = $request->kodpgw;
        $penyata->nosiri = $request->nosiri;
        $penyata->e_nl = $request->e_nl;
        $penyata->e_np = $request->e_np;
        $penyata->e_ap1 = $request->e_ap1;
        $penyata->e_ap2 = $request->e_ap2;
        $penyata->e_ap3 = $request->e_ap3;
        $penyata->e_as1 = $request->e_as1;
        $penyata->e_as2 = $request->e_as2;
        $penyata->e_as3 = $request->e_as3;
        $penyata->e_notel = $request->e_notel;
        $penyata->e_nofax = $request->e_nofax;
        $penyata->e_email = $request->e_email;
        $penyata->e_npg = $request->e_npg;
        $penyata->e_jpg = $request->e_jpg;
        $penyata->e_notel_pg = $request->e_notel_pg;
        $penyata->e_email_pg = $request->e_email_pg;
        $penyata->e_npgtg = $request->e_npgtg;
        $penyata->e_jpgtg = $request->e_jpgtg;
        $penyata->e_negeri = $request->e_negeri;
        $penyata->e_jpgtg = $request->e_jpgtg;
        $penyata->e_daerah = $request->e_daerah;
        $penyata->e_kawasan = $request->e_kawasan;
        $penyata->e_syktinduk = $request->e_syktinduk;
        $penyata->e_group = $request->e_group;
        $penyata->e_poma = $request->e_poma;
        $penyata->e_year = $request->e_year;
        $penyata->e_email_pengurus = $request->e_email_pengurus;
        $penyata->kap_proses = $request->kap_proses;
        $penyata->bil_tangki_cpo = $request->bil_tangki_cpo;
        $penyata->bil_tangki_ppo = $request->bil_tangki_ppo;
        $penyata->bil_tangki_cpko = $request->bil_tangki_cpko;
        $penyata->bil_tangki_ppko = $request->bil_tangki_ppko;
        $penyata->bil_tangki_oleo = $request->bil_tangki_oleo;
        $penyata->bil_tangki_others = $request->bil_tangki_others;
        $penyata->bil_tangki_jumlah = $request->bil_tangki_jumlah;
        $penyata->kap_tangki_cpo = $request->kap_tangki_cpo;
        $penyata->kap_tangki_ppo = $request->kap_tangki_ppo;
        $penyata->kap_tangki_cpko = $request->kap_tangki_cpko;
        $penyata->kap_tangki_ppko = $request->kap_tangki_ppko;
        $penyata->kap_tangki_oleo = $request->kap_tangki_oleo;
        $penyata->kap_tangki_others = $request->kap_tangki_others;
        // $penyata->kap_tangki_jumlah = $request->kap_tangki_jumlah;
        $penyata->save();

        // dd($penyata);

        $penyata2 = RegPelesen::findOrFail($id);
        $penyata2->e_nl = $request->e_nl;
        // $penyata2->e_kat = $request->e_kat;

        $penyata2->nosiri = $request->nosiri;
        $penyata2->kodpgw = $request->kodpgw;
        $penyata2->e_status = $request->e_status;
        $penyata2->e_stock = $request->e_stock;
        $penyata2->directory = $request->directory;
        $penyata2->save();

        //log audit trail admin
        Auth::user()->log(" UPDATE PELESEN {$penyata2->e_nl}");



        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
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
        // dd(auth()->user()->sub_cat);
        if (auth()->user()->sub_cat) {
            foreach (json_decode(auth()->user()->sub_cat) as $cat) {
                // if ($cat == 'PL91'){
                //     return redirect()->route('admin.senaraipelesenbuah');
                // } else
                if ($cat == 'PL101') {
                    return redirect()->route('admin.senaraipelesenpenapis');
                } elseif ($cat == 'PL102') {
                    return redirect()->route('admin.senaraipelesenisirung');
                } elseif ($cat == 'PL104') {
                    return redirect()->route('admin.senaraipelesenoleokimia');
                } elseif ($cat == 'PL111') {
                    return redirect()->route('admin.senaraipelesensimpanan');
                } elseif ($cat == 'PLBIO') {
                    return redirect()->route('admin.senaraipelesenbio');
                } else {

                    // dd($pelesen);
                    $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->get();
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
            }
        } else {
            # code...// dd($pelesen);
            $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->get();
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
    }

    public function exportIntoExcel()
    {
        return Excel::download(new BuahExport, 'senarai pelesen buah.xlsx');
    }

    public function admin_senaraipelesenpenapis()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL101')->get();
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
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL102')->get();

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
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL104')->get();

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
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->get();

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
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();

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



        return view('admin.proses1.senarai-pelesen-bio', compact('returnArr', 'layout', 'users'));
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
