<?php

namespace App\Http\Controllers\Users\PusatSimpanan;

use App\Http\Controllers\Controller;
use App\Models\E07Btranshipment;
use App\Models\E07Init;
use App\Models\Ekmessage;
use App\Models\H07Btranshipment;
use App\Models\H07Init;
use Illuminate\Http\Request;
use App\Models\Pelesen;
use App\Models\Produk;
use App\Models\RegPelesen;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;

class PusatSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function pusatsimpan_maklumatasaspelesen()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        // $pelesen = E91Init::get();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();
        $jumlah = ($pelesen->bil_tangki_cpo ?? 0) +
            ($pelesen->bil_tangki_ppo ?? 0) +
            ($pelesen->bil_tangki_cpko ?? 0) +
            ($pelesen->bil_tangki_ppko ?? 0) +
            ($pelesen->bil_tangki_oleo ?? 0) +
            ($pelesen->bil_tangki_others ?? 0);

        $jumlah2 = ($pelesen->kap_tangki_cpo ?? 0) +
            ($pelesen->kap_tangki_ppo ?? 0) +
            ($pelesen->kap_tangki_cpko ?? 0) +
            ($pelesen->kap_tangki_ppko ?? 0) +
            ($pelesen->kap_tangki_oleo ?? 0) +
            ($pelesen->kap_tangki_others ?? 0);
        // dd($pelesen);


        return view('users.PusatSimpanan.pusatsimpan-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen', 'jumlah', 'jumlah2'));
    }

    public function pusatsimpan_update_maklumat_asas_pelesen(Request $request)
    {
        //  dd($request->all());
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd( $pelesen);

        $this->validation_daftar_pelesen($request->all())->validate();

        if ($pelesen) {
        $this->update_pelesen($request);
        }else{
        $this->store_pelesen($request->all());
        }

        return redirect()->back()->with('success', 'Maklumat Pelesen sudah ditambah');
    }

    protected function validation_daftar_pelesen(array $data)
    {
        return Validator::make($data, [
            // 'e_nl' => ['required', 'string', 'unique:pelesen'],
            // 'e_np' => ['required', 'string'],
            'e_ap1' => ['required', 'string'],
            'e_ap2' => ['required', 'string'],
            'e_ap3' => ['required', 'string'],
            // 'e_as1' => ['required', 'string'],
            // 'e_as2' => ['required', 'string'],
            // 'e_as3' => ['required', 'string'],
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
            // 'e_negeri' => ['required', 'string'],
            // 'e_daerah' => ['required', 'string'],
            // 'e_kawasan' => ['required', 'string'],
            'e_syktinduk' => ['required', 'string'],
            // 'e_year' => ['required', 'string'],
            'e_group' => ['required', 'string'],
            // 'e_poma' => ['required', 'string'],
            'kap_proses' => ['required', 'string'],

        ]);
    }


    protected function store_pelesen(array $data)
    {
// dd($data);
        $count = Pelesen::count();
        //
        return Pelesen::create([
            'e_id' => $count++,
            // 'e_nl' => $data['e_nl'],
            // 'e_np' => $data['e_np'],
            'e_ap1' => $data['e_ap1'],
            'e_ap2' => $data['e_ap2'],
            'e_ap3' => $data['e_ap3'],
            // 'e_as1' => $data['e_as1'],
            // 'e_as2' => $data['e_as2'],
            // 'e_as3' => $data['e_as3'],
            'e_notel' => $data['e_notel'],
            'e_nofax' => $data['e_nofax'],
            'e_email' => $data['e_email'],
            'e_npg' => $data['e_npg'],
            'e_jpg' => $data['e_jpg'],
            'e_notel_pg' => $data['e_notel_pg'],
            'e_email_pg' => $data['e_email_pg'],
            // 'kodpgw' => $data['kodpgw'],
            // 'nosiri' => $data['nosiri'],
            'e_npgtg' => $data['e_npgtg'],
            'e_jpgtg' => $data['e_jpgtg'],
            // 'e_negeri' => $data['e_negeri'],
            // 'e_daerah' => $data['e_daerah'],
            // 'e_kawasan' => $data['e_kawasan'],
            'e_syktinduk' => $data['e_syktinduk'],
            'e_group' => $data['e_group'],
            // 'e_poma' => $data['e_poma'],
            // 'e_year' => $data['e_year'],
            'e_email_pengurus' => $data['e_email_pengurus'],
            'kap_proses' => $data['kap_proses'],
            'tahun' => date("Y"),
            'bulan' => date("m"),

        ]);
    }

    public function update_pelesen(Request $request)
    {

            # code...// dd($request->all());
            if(isset($request['alamat_sama'])){

                $penyata = Pelesen::where('e_nl', auth()->user()->username)->first();
                $penyata->e_ap1 = $request->e_ap1;
                $penyata->e_ap2 = $request->e_ap2;
                $penyata->e_ap3 = $request->e_ap3;
                $penyata->e_as1 = $request->e_ap1;
                $penyata->e_as2 = $request->e_ap2;
                $penyata->e_as3 = $request->e_ap3;
                $penyata->e_notel = $request->e_notel;
                $penyata->e_nofax = $request->e_nofax;
                $penyata->e_email = $request->e_email;
                $penyata->e_npg = $request->e_npg;
                $penyata->e_jpg = $request->e_jpg;
                $penyata->e_notel_pg = $request->e_notel_pg;
                $penyata->e_email_pg = $request->e_email_pg;
                $penyata->e_npgtg = $request->e_npgtg;
                $penyata->e_jpgtg = $request->e_jpgtg;
                $penyata->e_syktinduk = $request->e_syktinduk;
                $penyata->e_group = $request->e_group;
                $penyata->e_email_pengurus = $request->e_email_pengurus;
                $penyata->kap_proses = $request->kap_proses;
                $penyata->kap_tangki = $request->kap_tangki;
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
                $penyata->kap_tangki_jumlah = $request->kap_tangki_jumlah;
            }
            else{

                $penyata = Pelesen::where('e_nl', auth()->user()->username)->first();
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
                $penyata->e_syktinduk = $request->e_syktinduk;
                $penyata->e_group = $request->e_group;
                $penyata->e_email_pengurus = $request->e_email_pengurus;
                $penyata->kap_proses = $request->kap_proses;
                $penyata->kap_tangki = $request->kap_tangki;
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
                $penyata->kap_tangki_jumlah = $request->kap_tangki_jumlah;
            }

            $penyata->save();

        $map = User::where('username', $penyata->e_nl)->first();
        $map->map_flg = '1';
        $map->map_sdate = now();
        $map->save();

        return redirect()->route('pusatsimpan.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');
    }

// --500488007000

    public function pusatsimpan_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        $user = User::get();

        return view('users.PusatSimpanan.pusatsimpan-tukar-password', compact('returnArr', 'layout', 'user'));
    }

    public function pusatsimpan_update_password(Request $request, $id)
    {
        $user = User::findOrFail(auth()->user()->id);
        //compare password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('pusatsimpan.tukarpassword')
                ->with('error', 'Sila masukkan kata laluan lama yang betul');
        }

        if (!Hash::check($request->old_password, $request->new_password)) {
            return redirect()->route('pusatsimpan.tukarpassword')
                ->with('error', 'Kata laluan baru sama dengan kata laluan lama');
        }

        $password = Hash::make($request->new_password);
        $user->password = $password;
        $user->save();

        return redirect()->route('pusatsimpan.tukarpassword')
            ->with('success', 'Kata Laluan berjaya ditukar');
    }

    public function pusatsimpan_bahagiana()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.bahagiana'), 'name' => "Bahagian A"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        $user = E07Init::where('e07_nl', auth()->user()->username)->first('e07_reg');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        if ($user) {
            $penyata = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $user->e07_reg)->get();

            $produks = Produk::where('prodcat', '!=', '07')->orderBy('prodname')->get();
            // dd($produks);
            $total = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_stokawal');
            $total2 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_terima');
            $total3 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_edaran');
            $total4 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_pelarasan');
            $total5 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_stokakhir');

            return view('users.PusatSimpanan.pusatsimpan-bahagian-a', compact(
                'returnArr',
                'layout',
                'user',
                'penyata',
                'produks',
                'total',
                'total2',
                'total3',
                'total4',
                'total5',
                'bulan',
                'tahun',
            ));
        } else {
            return redirect()->back()
                ->with('error', 'Data Tidak Wujud! Sila hubungi pegawai MPOB');
        }
    }

    public function pusatsimpan_add_bahagian_a(Request $request)
    {
        // dd($request->all());
        $user = E07Init::where('e07_nl', auth()->user()->username)->first('e07_reg');

        $penyata = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $user->e07_reg)->where('e07bt_produk', $request->e07bt_produk)->first();
        if ($penyata) {
            return redirect()->back()->with("error", "Produk telah Tersedia");
        } else {

            $this->validation_bahagian_a($request->all())->validate();
            $this->store_bahagian_a($request->all());

            return redirect()->route('pusatsimpan.bahagiana')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_a(array $data)
    {
        return Validator::make($data, [
            'e07bt_produk' => ['required', 'string'],
            'e07bt_stokawal' => ['required', 'string'],
            'e07bt_terima' => ['required', 'string'],
            'e07bt_edaran' => ['required', 'string'],
            // 'e07bt_pelarasan' => ['required', 'string'],
            'e07bt_stokakhir' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_a(array $data)
    {
        $e07bt_idborang = E07Init::where('e07_nl', auth()->user()->username)->first('e07_reg');
        // dd($e101_reg->e101_reg);
        return E07Btranshipment::create([
            'e07bt_idborang' => $e07bt_idborang->e07_reg,
            'e07bt_produk' => $data['e07bt_produk'],
            'e07bt_stokawal' => $data['e07bt_stokawal'],
            'e07bt_terima' => $data['e07bt_terima'],
            // 'e07bt_import' => '0',
            'e07bt_edaran' => $data['e07bt_edaran'],
            // 'e07bt_eksport' => '0',
            // 'e07bt_pelarasan' => $data['e07bt_pelarasan'],
            'e07bt_stokakhir' => $data['e07bt_stokakhir'],
        ]);
        // return $data;
        // dd($data);
    }

    // public function destroy(E101B $penyata)
    // {
    //     $penyata->delete();

    //     return redirect()->route('penapis.bahagiani')
    //                     ->with('success','Product deleted successfully');
    // }


    public function pusatsimpan_edit_bahagian_a(Request $request, $id)
    {
        $e07bt_stokawal = $request->e07bt_stokawal;
        $e07bt_terima = $request->e07bt_terima;
        $e07bt_edaran = $request->e07bt_edaran;
        $e07bt_stokakhir = $request->e07bt_stokakhir;
        $bt2 = str_replace(',', '', $e07bt_stokawal);
        $bt3 = str_replace(',', '', $e07bt_terima);
        $bt4 = str_replace(',', '', $e07bt_edaran);
        $bt5 = str_replace(',', '', $e07bt_stokakhir);



        // dd($request->all());
        $penyata = E07Btranshipment::findOrFail($id);
        // $penyata->e07bt_produk = $produk->prodid;
        $penyata->e07bt_stokawal = $bt2;
        $penyata->e07bt_terima = $bt3;
        // $penyata->e07bt_import = $request->e07bt_import;
        $penyata->e07bt_edaran = $bt4;
        // $penyata->e07bt_eksport = $request->e07bt_eksport;
        // $penyata->e07bt_pelarasan = $request->e07bt_pelarasan;
        $penyata->e07bt_stokakhir = $bt5;
        $penyata->save();


        return redirect()->route('pusatsimpan.bahagiana')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function pusatsimpan_delete_bahagian_a($id)
    {
        $penyata = E07Btranshipment::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('pusatsimpan.bahagiana')
            ->with('success', 'Produk Dihapuskan');
    }



    // public function pusatsimpan_bahagianb()
    // {

    //     $breadcrumbs    = [
    //         ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('pusatsimpan.bahagianb'), 'name' => "Bahagian B"],
    //     ];

    //     $kembali = route('pusatsimpan.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.psimpan';



    //     return view('users.PusatSimpanan.pusatsimpan-bahagian-b', compact('returnArr', 'layout'));
    // }





    public function pusatsimpan_paparpenyata()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('pusatsimpan.bahagiana');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        $bulan = date("m") - 1;

        $tahun = date("Y");

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $user = E07Init::where('e07_nl', auth()->user()->username)->first();

        $penyata = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $user->e07_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '!=', '07');
        })->get();
        // dd($penyata);
        $total = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_stokawal');
        $total2 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_terima');
        $total3 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_edaran');
        $total4 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_pelarasan');
        $total5 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_stokakhir');



        return view('users.PusatSimpanan.pusatsimpan-papar-penyata', compact(
            'layout',
            'returnArr',
            'user',
            'penyata',
            'pelesen',
            'tahun',
            'bulan',
            'total',
            'total2',
            'total3',
            'total4',
            'total5'
        ));
    }

    public function pusatsimpan_update_papar_penyata(Request $request, $id)
    {
        // dd($request->all());


        $penyata = E07Init::findOrFail($id);
        $penyata->e07_flg = '2';
        $penyata->e07_sdate = date("Y-m-d");
        $penyata->e07_npg = $request->e07_npg;
        $penyata->e07_jpg = $request->e07_jpg;
        $penyata->e07_notel = $request->e07_notel;
        $penyata->save();

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        $pelesen->e_npg = $request->e07_npg;
        $pelesen->e_jpg = $request->e07_jpg;
        $pelesen->e_notel_pg = $request->e07_notel;
        $pelesen->save();


        return redirect()->route('pusatsimpan.hantar.penyata')
            ->with('success', 'Penyata Sudah Dihantar');
    }


    public function pusatsimpan_hantar_penyata()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        $bulan = date("m") - 1;

        $tahun = date("Y");

        $date = date("d-m-Y");

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $user = E07Init::where('e07_nl', auth()->user()->username)->first();

        $penyata = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $user->e07_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '!=', '07');
        })->get();
        // dd($penyata);




        return view('users.PusatSimpanan.pusatsimpan-hantar-penyata', compact('layout', 'returnArr', 'date', 'user', 'penyata', 'pelesen', 'tahun', 'bulan'));
    }

    public function pusatsimpan_email()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';



        return view('users.PusatSimpanan.pusatsimpan-email', compact('returnArr', 'layout'));
    }


    public function pusatsimpan_send_email_proses(Request $request)
    {
        // dd($request->all());
        $this->validation_send_email($request->all())->validate();
        //$this->store_send_email($request->all());

        if ($request->file_upload) {
            $this->store_send_email($request->all());
        } else {
            $this->store_send_email2($request->all());
        }


        return redirect()->back()->with('success', 'Emel sudah dihantar');
    }

    protected function validation_send_email(array $data)
    {
        return Validator::make($data, [
            // 'Id' => ['required', 'string'],
            'TypeOfEmail' => ['required', 'string'],
            'FromEmail' => ['required', 'string'],
            'Subject' => ['required', 'string'],
            'Message' => ['required', 'string'],
            'file_upload' => ['mimes:jpeg,doc,docx,pdf,xls,png,jpg,xlsx']


        ]);
    }

    protected function store_send_email(array $data)
    {

        //store file
        if ($data['file_upload']) {
            $file = $data['file_upload']->store('email/attachement', 'public');
        }

        return Ekmessage::create([
            // 'Id' => $data['Id'],
            'Date' => date("Y-m-d H:i:s"),
            'FromName' => auth()->user()->name,
            'FromLicense' => auth()->user()->username,
            'TypeOfEmail' => $data['TypeOfEmail'],
            'FromEmail' => $data['FromEmail'],
            'Category' => auth()->user()->category,
            'Subject' => $data['Subject'],
            'Message' => $data['Message'],
            'file_upload' => $file ?? null,

        ]);
    }

    protected function store_send_email2(array $data)
    {

        return Ekmessage::create([
            // 'Id' => $data['Id'],
            'Date' => date("Y-m-d H:i:s"),
            'FromName' => auth()->user()->name,
            'FromLicense' => auth()->user()->username,
            'TypeOfEmail' => $data['TypeOfEmail'],
            'FromEmail' => $data['FromEmail'],
            'Category' => auth()->user()->category,
            'Subject' => $data['Subject'],
            'Message' => $data['Message'],
            'file_upload' => $file ?? null,

        ]);
    }

    public function pusatsimpan_penyatadahulu()
    {

        $pelesen = RegPelesen::with('pelesen')->where('e_nl', auth()->user()->username)->first();

        $year = $pelesen->pelesen->e_year;
        // dd($year);
        if($year){
            $tahun = $year;
        }else{
            $tahun = 2003;
        }

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';



        return view('users.PusatSimpanan.pusatsimpan-penyata-dahulu', compact('returnArr', 'layout','pelesen','tahun','year'));
    }

    protected function validation_terdahulu(array $data)
    {
        return Validator::make($data, [
            'tahun' => ['required', 'string'],
            'bulan' => ['required', 'string'],
        ]);
    }

    public function pusatsimpan_penyata_dahulu_process(Request $request)
    {
        // dd($request->all());
        $this->validation_terdahulu($request->all())->validate();


        // $user = User::first();
        // dd($user);
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        $user = H07Init::where('e07_nl', auth()->user()->username)
            ->where('e07_thn', $request->tahun)
            ->where('e07_bln', $request->bulan)->first();
        // dd($users->e102_nobatch);

        if ($user) {
            $myDateTime = DateTime::createFromFormat('Y-m-d', $user->e07_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
            $penyata = H07Btranshipment::with('h07init', 'produk')->where('e07bt_nobatch', $user->e07_nobatch)->get();
            // dd($penyata);
            $total = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_stokawal');
            $total2 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_terima');
            $total3 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_edaran');
            $total4 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_pelarasan');
            $total5 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_stokakhir');
        } else {
            return redirect()->back()->with('error', 'Penyata Tidak Wujud!');
        }

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.penyatadahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Senarai Penyata Terdahulu"],
        ];

        $kembali = route('pusatsimpan.penyatadahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        return view('users.PusatSimpanan.pusatsimpan-papar-dahulu', compact(
            'returnArr',
            'myDateTime',
            'formatteddate',
            'layout',
            'user',
            'pelesen',
            'penyata',
            'total',
            'total2',
            'total3',
            'total4',
            'total5'
        ));
    }



    public function index_form()
    {
        return view('users.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
