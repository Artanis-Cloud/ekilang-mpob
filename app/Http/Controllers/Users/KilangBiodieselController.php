<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\EBioB;
use App\Models\EBioC;
use App\Models\EBioCC;
use App\Models\EBioInit;
use App\Models\Ekmessage;
use App\Models\Hari;
use App\Models\HBioB;
use App\Models\HBioC;
use App\Models\HBioInit;
use App\Models\HHari;
use App\Models\HPelesen;
use App\Models\Kapasiti;
use App\Models\Negara;
use App\Models\Pelesen;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProfileBulanan;
use App\Models\RegPelesen;
use App\Models\SyarikatPembeli;
use App\Models\User;
use App\Notifications\Pelesen\HantarEmelNotification;
use App\Notifications\Pelesen\HantarEmelNotification2;
use App\Notifications\Pelesen\HantarPenyataNotification;
use Carbon\Carbon;
use DateTime;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Monolog\Handler\IFTTTHandler;
use Symfony\Component\Console\Input\Input;

class KilangBiodieselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function bio_maklumatasaspelesen()
    {
        // dd(date('d-m'));
        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        // $pelesen = E91Init::get();dasfsds
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->where('e_kat', auth()->user()->category)->first();
        // dd($pelesen);
        if ($pelesen) {

        $pelesen2 = ProfileBulanan::where('no_lesen', $pelesen->e_nl)->where('bulan', '8')->where('tahun', '2012')->first();

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

        //dd($pelesen);



            return view('users.KilangBiodiesel.bio-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen', 'pelesen2', 'jumlah', 'jumlah2'));
        } else {
            return redirect()->back()->with('error', 'Maklumat pelesen tidak wujud. Sila hubungi pegawai MPOB');

        }

    }

    public function bio_update_maklumat_asas_pelesen(Request $request, $id)
    {

        $tahun = date('Y');
        $check = Kapasiti::where('e_nl', auth()->user()->username)->where('tahun', $tahun)->first();

        // dd($request->all());
        if (isset($request['alamat_sama'])) {
            $penyata = Pelesen::findOrFail($id);
            $penyata->e_nlkppk = $request->e_nlkppk;
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
            $penyata->e_group = $request->e_group;
            $penyata->e_syktinduk = $request->e_syktinduk;
            $penyata->e_email_pengurus = $request->e_email_pengurus;
            $penyata->kap_proses = $request->kap_proses;
            $penyata->kap_tangki = $request->kap_tangki;
            $penyata->bil_tangki_cpo = $request->bil_tangki_cpo;
            $penyata->bil_tangki_ppo = $request->bil_tangki_ppo;
            $penyata->bil_tangki_cpko = $request->bil_tangki_cpko;
            $penyata->bil_tangki_ppko = $request->bil_tangki_ppko;
            $penyata->bil_tangki_oleo = $request->bil_tangki_oleo;
            $penyata->bil_tangki_others = $request->bil_tangki_others;
            // $penyata->bil_tangki_jumlah = $request->bil_tangki_jumlah;
            $penyata->kap_tangki_cpo = $request->kap_tangki_cpo;
            $penyata->kap_tangki_ppo = $request->kap_tangki_ppo;
            $penyata->kap_tangki_cpko = $request->kap_tangki_cpko;
            $penyata->kap_tangki_ppko = $request->kap_tangki_ppko;
            $penyata->kap_tangki_oleo = $request->kap_tangki_oleo;
            $penyata->kap_tangki_others = $request->kap_tangki_others;
        } else {
            $penyata = Pelesen::findOrFail($id);
            $penyata->e_nlkppk = $request->e_nlkppk;
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
            $penyata->e_group = $request->e_group;
            $penyata->e_syktinduk = $request->e_syktinduk;
            $penyata->e_email_pengurus = $request->e_email_pengurus;
            $penyata->kap_proses = $request->kap_proses;
            $penyata->kap_tangki = $request->kap_tangki;
            $penyata->bil_tangki_cpo = $request->bil_tangki_cpo;
            $penyata->bil_tangki_ppo = $request->bil_tangki_ppo;
            $penyata->bil_tangki_cpko = $request->bil_tangki_cpko;
            $penyata->bil_tangki_ppko = $request->bil_tangki_ppko;
            $penyata->bil_tangki_oleo = $request->bil_tangki_oleo;
            $penyata->bil_tangki_others = $request->bil_tangki_others;
            // $penyata->bil_tangki_jumlah = $request->bil_tangki_jumlah;
            $penyata->kap_tangki_cpo = $request->kap_tangki_cpo;
            $penyata->kap_tangki_ppo = $request->kap_tangki_ppo;
            $penyata->kap_tangki_cpko = $request->kap_tangki_cpko;
            $penyata->kap_tangki_ppko = $request->kap_tangki_ppko;
            $penyata->kap_tangki_oleo = $request->kap_tangki_oleo;
            $penyata->kap_tangki_others = $request->kap_tangki_others;
        }

        $penyata->save();

        $map = User::where('username', $penyata->e_nl)->first();
        $map->email = $request->e_email;
        $map->map_flg = '1';
        $map->map_sdate = now();
        $map->save();

        // dd(!$check);
        if ($check) {
            $kapasiti = Kapasiti::where('e_nl', auth()->user()->username)->where('tahun', $tahun)->first();
            $kapasiti->jan = $request->kap_proses;
            $kapasiti->feb = $request->kap_proses;
            $kapasiti->mac = $request->kap_proses;
            $kapasiti->apr = $request->kap_proses;
            $kapasiti->mei = $request->kap_proses;
            $kapasiti->jun = $request->kap_proses;
            $kapasiti->jul = $request->kap_proses;
            $kapasiti->ogs = $request->kap_proses;
            $kapasiti->sept = $request->kap_proses;
            $kapasiti->okt = $request->kap_proses;
            $kapasiti->nov = $request->kap_proses;
            $kapasiti->dec = $request->kap_proses;
            $kapasiti->save();
        } else {
            return Kapasiti::create([
                // 'id' => $count+ 1,
                'e_nl' => auth()->user()->username,
                'tahun' => date("Y"),
                'jan' => $request->kap_proses,
                'feb' => $request->kap_proses,
                'mac' => $request->kap_proses,
                'apr' => $request->kap_proses,
                'mei' => $request->kap_proses,
                'jun' => $request->kap_proses,
                'jul' => $request->kap_proses,
                'ogs' => $request->kap_proses,
                'sept' => $request->kap_proses,
                'okt' => $request->kap_proses,
                'nov' => $request->kap_proses,
                'dec' => $request->kap_proses,


            ]);
        }


// dd($map);

        return redirect()->route('bio.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function bio_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $user = User::get();

        return view('users.KilangBiodiesel.bio-tukar-password', compact('returnArr', 'layout', 'user'));
    }

    public function bio_update_password(Request $request, $id)
    {
        $user = User::where('username', auth()->user()->username)->where('category', auth()->user()->category)->first();

        //compare password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('bio.tukarpassword')
                ->with('error', 'Sila masukkan kata laluan lama yang betul');
        }

        if ($request->new_password != $request->password_confirmation) {
            return redirect()->route('bio.tukarpassword')
                ->with('error', 'Sila sahkan kata laluan');
        }

        if ($request->old_password == $request->new_password) {
            return redirect()->route('bio.tukarpassword')
                ->with('error', 'Kata laluan baru sama dengan kata laluan lama');
        } else {
            $password = Hash::make($request->new_password);
            $password2 = Crypt::encryptString($request->new_password);

            $user->password = $password;
            $user->crypted_pass = $password2;

            $user->save();
        }

        return redirect()->route('bio.tukarpassword')
            ->with('success', 'Kata Laluan berjaya ditukar');
    }

    public function bio_bahagiania()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagiania'), 'name' => "Bahagian 1 (a)"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // $user = DB::connection('mysql2')->select("SELECT * FROM profile_bulanan");


        $produk = Produk::where('prodcat', '01')->orderBy('prodname')->get();

        if ($user) {
            $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '01');
            })->orderBy('ebio_b4')->get();

            $totaliab5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b5');
            $totaliab6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b6');
            $totaliab7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b7');
            $totaliab8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b8');
            $totaliab9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b9');
            $totaliab10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b10');
            $totaliab11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b11');
            // $totaliab12 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b12');
            // dd($totalia);

            // dd($penyata);
            return view('users.KilangBiodiesel.bio-bahagian-ia', compact(
                'returnArr',
                'layout',
                'produk',
                'penyata',
                'totaliab5',
                'totaliab6',
                'totaliab7',
                'totaliab8',
                'totaliab9',
                'totaliab10',
                'totaliab11',
                'bulan',
                'tahun',
            ));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function bio_add_bahagian_ia(Request $request)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first();

        $penyata = EBioB::where('ebio_reg', $ebio_reg->ebio_reg)
            ->where('ebio_b3', '1')
            ->where('ebio_b4', $request->ebio_b4)
            // ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('bio.bahagiania')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            // $this->validation_bahagian_ia($request->all())->validate();
            $this->store_bahagian_ia($request->all());

            return redirect()->route('bio.bahagiania')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_ia(array $data)
    {
        return Validator::make($data, [

            // 'ebio_b4' => ['required', 'string'],
            // 'ebio_b5' => ['required', 'string'],
            // 'ebio_b6' => ['required', 'string'],
            // 'ebio_b7' => ['required', 'string'],
            // 'ebio_b8' => ['required', 'string'],
            // 'ebio_b9' => ['required', 'string'],
            // 'ebio_b10' => ['required', 'string'],
            // 'ebio_b11' => ['required', 'string'],
            // 'ebio_b12' => ['required', 'string'],
            // 'ebio_b13' => ['required', 'string'],

            // 'ebio_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ia(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($ebio_reg);
        return EBioB::create([
            'ebio_reg' => $ebio_reg->ebio_reg,
            'ebio_b3' => '1',
            'ebio_b4' => $data['ebio_b4'],
            'ebio_b5' => $data['ebio_b5'],
            'ebio_b6' => $data['ebio_b6'],
            'ebio_b7' => $data['ebio_b7'],
            'ebio_b8' => $data['ebio_b8'],
            'ebio_b9' => $data['ebio_b9'],
            'ebio_b10' => $data['ebio_b10'],
            'ebio_b11' => $data['ebio_b11'],
            // 'ebio_b12' => $data['ebio_b12'],
            // 'ebio_b13' => $data['ebio_b13'],

            // 'e101_b15' => $data['ebio_b15'],
        ]);
        // return $data;
        // dd($data);
    }

    public function bio_edit_bahagian_ia(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->ebio_b4)->first();


        $ebio_b5 = $request->ebio_b5;
        $ebio_b6 = $request->ebio_b6;
        $ebio_b7 = $request->ebio_b7;
        $ebio_b8 = $request->ebio_b8;
        $ebio_b9 = $request->ebio_b9;
        $ebio_b10 = $request->ebio_b10;
        $ebio_b11 = $request->ebio_b11;
        $b5 = str_replace(',', '', $ebio_b5);
        $b6 = str_replace(',', '', $ebio_b6);
        $b7 = str_replace(',', '', $ebio_b7);
        $b8 = str_replace(',', '', $ebio_b8);
        $b9 = str_replace(',', '', $ebio_b9);
        $b10 = str_replace(',', '', $ebio_b10);
        $b11 = str_replace(',', '', $ebio_b11);
        // dd($request->all());
        $penyata = EBioB::findOrFail($id);
        // $penyata->ebio_b4 = $produk->prodid;
        $penyata->ebio_b5 = $b5;
        $penyata->ebio_b6 = $b6;
        $penyata->ebio_b7 = $b7;
        $penyata->ebio_b8 = $b8;
        $penyata->ebio_b9 = $b9;
        $penyata->ebio_b10 = $b10;
        $penyata->ebio_b11 = $b11;
        // $penyata->ebio_b12 = $request->ebio_b12;
        // $penyata->ebio_b13 = $request->ebio_b13;
        $penyata->save();


        return redirect()->route('bio.bahagiania')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function bio_delete_bahagian_ia($id)
    {
        $penyata = EBioB::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('bio.bahagiania')
            ->with('success', 'Produk Dihapuskan');
    }




    public function bio_bahagianib()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianib'), 'name' => "Bahagian 1 (b)"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $produk = Produk::where('prodcat', 02)->orderBy('prodname')->get();
        if ($user) {
            $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->orderBy('ebio_b4')->get();


            $totalibb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b5');
            $totalibb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b6');
            $totalibb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b7');
            $totalibb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b8');
            $totalibb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b9');
            $totalibb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b10');
            $totalibb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b11');
            // $totalibb12 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b12');
            // dd($penyata);
            return view('users.KilangBiodiesel.bio-bahagian-ib', compact(
                'returnArr',
                'layout',
                'produk',
                'user',
                'penyata',
                'totalibb5',
                'totalibb6',
                'totalibb7',
                'totalibb8',
                'totalibb9',
                'totalibb10',
                'totalibb11',
                'bulan',
                'tahun',
            ));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function bio_add_bahagian_ib(Request $request)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first();

        $penyata = EBioB::where('ebio_reg', $ebio_reg->ebio_reg)
            ->where('ebio_b3', '2')
            ->where('ebio_b4', $request->ebio_b4)
            // ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('bio.bahagianib')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_ib($request->all())->validate();
            $this->store_bahagian_ib($request->all());

            return redirect()->route('bio.bahagianib')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_ib(array $data)
    {
        return Validator::make($data, [

            'ebio_b4' => ['required', 'string'],
            'ebio_b5' => ['required', 'string'],
            'ebio_b6' => ['required', 'string'],
            'ebio_b7' => ['required', 'string'],
            'ebio_b8' => ['required', 'string'],
            'ebio_b9' => ['required', 'string'],
            'ebio_b10' => ['required', 'string'],
            'ebio_b11' => ['required', 'string'],
            // 'ebio_b12' => ['required', 'string'],

            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ib(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($ebio_reg);
        return EBioB::create([
            'ebio_reg' => $ebio_reg->ebio_reg,
            'ebio_b3' => '2',
            'ebio_b4' => $data['ebio_b4'],
            'ebio_b5' => $data['ebio_b5'],
            'ebio_b6' => $data['ebio_b6'],
            'ebio_b7' => $data['ebio_b7'],
            'ebio_b8' => $data['ebio_b8'],
            'ebio_b9' => $data['ebio_b9'],
            'ebio_b10' => $data['ebio_b10'],
            'ebio_b11' => $data['ebio_b11'],
            // 'ebio_b12' => $data['ebio_b12'],

            // 'e101_b15' => $data['ebio_b15'],
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


    public function bio_edit_bahagian_ib(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->ebio_b4)->first();

        $ebio_b5 = $request->ebio_b5;
        $ebio_b6 = $request->ebio_b6;
        $ebio_b7 = $request->ebio_b7;
        $ebio_b8 = $request->ebio_b8;
        $ebio_b9 = $request->ebio_b9;
        $ebio_b10 = $request->ebio_b10;
        $ebio_b11 = $request->ebio_b11;
        $b5 = str_replace(',', '', $ebio_b5);
        $b6 = str_replace(',', '', $ebio_b6);
        $b7 = str_replace(',', '', $ebio_b7);
        $b8 = str_replace(',', '', $ebio_b8);
        $b9 = str_replace(',', '', $ebio_b9);
        $b10 = str_replace(',', '', $ebio_b10);
        $b11 = str_replace(',', '', $ebio_b11);
        // dd($request->all());
        $penyata = EBioB::findOrFail($id);
        // $penyata->ebio_b4 = $produk->prodid;
        $penyata->ebio_b5 = $b5;
        $penyata->ebio_b6 = $b6;
        $penyata->ebio_b7 = $b7;
        $penyata->ebio_b8 = $b8;
        $penyata->ebio_b9 = $b9;
        $penyata->ebio_b10 = $b10;
        $penyata->ebio_b11 = $b11;
        // $penyata->ebio_b12 = $request->ebio_b12;
        $penyata->save();


        return redirect()->route('bio.bahagianib')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function bio_delete_bahagian_ib($id)
    {
        $penyata = EBioB::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('bio.bahagianib')
            ->with('success', 'Produk Dihapuskan');
    }


    public function bio_bahagianic()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianic'), 'name' => "Bahagian 1 (c)"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $produk = Produk::whereIn('prodcat', ['03', '06', '08'])->orderBy('prodname')->get();

        if ($user) {
            $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();

            $totalicb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b5');
            $totalicb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b6');
            $totalicb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b7');
            $totalicb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b8');
            $totalicb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b9');
            $totalicb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b10');
            $totalicb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b11');
            // $totalicb12 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b12');

            return view('users.KilangBiodiesel.bio-bahagian-ic', compact(
                'returnArr',
                'layout',
                'user',
                'produk',
                'penyata',
                'totalicb5',
                'totalicb6',
                'totalicb7',
                'totalicb8',
                'totalicb9',
                'totalicb10',
                'totalicb11',
                'bulan',
                'tahun',
            ));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function bio_add_bahagian_ic(Request $request)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first();

        $penyata = EBioB::where('ebio_reg', $ebio_reg->ebio_reg)
            ->where('ebio_b3', '3')
            ->where('ebio_b4', $request->ebio_b4)
            // ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('bio.bahagianic')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_ic($request->all())->validate();
            $this->store_bahagian_ic($request->all());

            return redirect()->route('bio.bahagianic')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_ic(array $data)
    {
        return Validator::make($data, [

            'ebio_b4' => ['required', 'string'],
            'ebio_b5' => ['required', 'string'],
            'ebio_b6' => ['required', 'string'],
            'ebio_b7' => ['required', 'string'],
            'ebio_b8' => ['required', 'string'],
            'ebio_b9' => ['required', 'string'],
            'ebio_b10' => ['required', 'string'],
            'ebio_b11' => ['required', 'string'],
            // 'ebio_b12' => ['required', 'string'],

            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ic(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($ebio_reg);
        return EBioB::create([
            'ebio_reg' => $ebio_reg->ebio_reg,
            'ebio_b3' => '3',
            'ebio_b4' => $data['ebio_b4'],
            'ebio_b5' => $data['ebio_b5'],
            'ebio_b6' => $data['ebio_b6'],
            'ebio_b7' => $data['ebio_b7'],
            'ebio_b8' => $data['ebio_b8'],
            'ebio_b9' => $data['ebio_b9'],
            'ebio_b10' => $data['ebio_b10'],
            'ebio_b11' => $data['ebio_b11'],
            // 'ebio_b12' => $data['ebio_b12'],

            // 'e101_b15' => $data['ebio_b15'],
        ]);
        // return $data;
        // dd($data);
    }

    public function bio_edit_bahagian_ic(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->ebio_b4)->first();

        $ebio_b5 = $request->ebio_b5;
        $ebio_b6 = $request->ebio_b6;
        $ebio_b7 = $request->ebio_b7;
        $ebio_b8 = $request->ebio_b8;
        $ebio_b9 = $request->ebio_b9;
        $ebio_b10 = $request->ebio_b10;
        $ebio_b11 = $request->ebio_b11;
        $b5 = str_replace(',', '', $ebio_b5);
        $b6 = str_replace(',', '', $ebio_b6);
        $b7 = str_replace(',', '', $ebio_b7);
        $b8 = str_replace(',', '', $ebio_b8);
        $b9 = str_replace(',', '', $ebio_b9);
        $b10 = str_replace(',', '', $ebio_b10);
        $b11 = str_replace(',', '', $ebio_b11);
        // dd($request->all());
        $penyata = EBioB::findOrFail($id);
        // $penyata->ebio_b4 = $produk->prodid;
        $penyata->ebio_b5 = $b5;
        $penyata->ebio_b6 = $b6;
        $penyata->ebio_b7 = $b7;
        $penyata->ebio_b8 = $b8;
        $penyata->ebio_b9 = $b9;
        $penyata->ebio_b10 = $b10;
        $penyata->ebio_b11 = $b11;
        $penyata->save();


        return redirect()->route('bio.bahagianic')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function bio_delete_bahagian_ic($id)
    {
        $penyata = EBioB::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('bio.bahagianic')
            ->with('success', 'Produk Dihapuskan');
    }

    public function bio_bahagianii()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianii'), 'name' => "Bahagian 2"],
        ];

        $kembali = route('bio.bahagianic');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        if ($user) {

            $penyata = Hari::where('lesen', auth()->user()->username)->first();
            // dd($penyata);

            return view('users.KilangBiodiesel.bio-bahagian-ii', compact('returnArr', 'layout', 'penyata', 'bulan', 'tahun',));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function bio_add_bahagian_ii(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ii($request->all())->validate();
        $this->store_bahagian_ii($request->all());

        return redirect()->route('bio.bahagianiii')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ii(array $data)
    {
        return Validator::make($data, [
            'hari_operasi' => ['required', 'string'],
            'kapasiti' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ii(array $data)
    {
        $pelesen = User::where('username', auth()->user()->username)->first('username');

        // dd($e101_reg->e101_reg);
        return Hari::create([
            'lesen' => $pelesen->username,
            'tahunbhg2' => date("Y"),
            'bulanbhg2' => date("m"),
            'hari_operasi' => $data['hari_operasi'],
            'kapasiti' => $data['kapasiti'],

        ]);
        // return $data;
        // dd($data);
    }



    public function bio_edit_bahagian_ii(Request $request, $id)
    {
        // $produk = Produk::where('prodname', $request->e07bt_produk)->first();
        // dd($produk);
        // $prodcat2 = ProdCat2::where('catname', $request->e101_b5)->first();

        $pelesen = User::where('username', auth()->user()->username)->first('username');

        // dd($request->all());
        $penyata = Hari::where('lesen', auth()->user()->username)->first();
        $penyata->lesen = $pelesen->username;
        $penyata->hari_operasi = $request->hari_operasi;
        $penyata->kapasiti = $request->kapasiti;
        $penyata->save();


        return redirect()->route('bio.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function bio_delete_bahagian_ii($id)
    {
        $penyata = Hari::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('bio.bahagianii')
            ->with('success', 'Produk Dihapuskan');
    }

    public function bio_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianiii'), 'name' => "Bahagian 3"],
        ];

        $kembali = route('bio.bahagianii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $produk = Produk::whereIn('prodcat', ['03', '06', '08', '12'])->orderBy('prodname')->get();
        if ($user) {
            $penyata = EBioC::with('ebioinit', 'produk', 'ebiocc')->where('ebio_reg', $user->ebio_reg)->orderBy('ebio_c3')->get();
            // $penyata_test = DB::select("select * from `e_bio_c_s` where `ebio_reg` = $user->ebio_reg");
            // dd($penyata[0]->ebio_reg);
            $syarikat = SyarikatPembeli::get();
            $senarai_syarikat = EBioCC::with('ebioinit')->where('ebio_reg', $user->ebio_reg)->get();
            // foreach ($data['jumlah_row_hidden'] as $key => $value) {
            // $ebioreg_jualan = $penyata->ebioinit->ebio_reg;
            // dd($ebioreg_jualan);
            // $total_jualan = EBioCC::where('ebio_reg', $penyata[0]->ebio_reg)->sum('ebio_cc4');
            // dd($penyata);
            // }
            $totaliiic4 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c4');
            $totaliiic5 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c5');
            $totaliiic6 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c6');
            $totaliiic7 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c7');
            $totaliiic8 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c8');
            $totaliiic9 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c9');
            $totaliiic10 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c10');

            return view('users.KilangBiodiesel.bio-bahagian-iii', compact(
                'returnArr',
                'senarai_syarikat',
                'layout',
                'user',
                'produk',
                'penyata',
                'totaliiic4',
                'totaliiic5',
                'totaliiic6',
                'totaliiic7',
                'totaliiic8',
                'totaliiic9',
                'totaliiic10',
                'bulan',
                'tahun',
                'syarikat'
            ));
        } else {

            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
        // $penyata = [];
        // $totaliiic4 = 0;
        // $totaliiic5 = 0;
        // $totaliiic6 = 0;
        // $totaliiic7 = 0;
        // $totaliiic8 = 0;
        // $totaliiic9 = 0;
        // $totaliiic10 = 0;

        // dd($user);


    }

    public function bio_maklumat_jualan()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianiii'), 'name' => "Bahagian 3"],
            ['link' => route('bio.bahagianiii'), 'name' => "Maklumat Jualan/Edaran"],
        ];

        $kembali = route('bio.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');

        $bulan = date("m") - 1;
        $tahun = date("Y");


            $penyata = EBioC::with('ebioinit', 'produk', 'ebiocc')->where('ebio_reg', $user->ebio_reg)->get();
            // dd($penyata);
            // $penyata_test = DB::select("select * from `e_bio_c_s` where `ebio_reg` = $user->ebio_reg");

            $senarai_syarikat = EBioCC::with('ebioinit','syarikat')->where('ebio_reg', $user->ebio_reg)->get();
            // dd($senarai_syarikat);

            $syarikat = SyarikatPembeli::get();

            $seq = EBioCC::where('ebio_reg', $user->ebio_reg)->count();
            // dd($seq);

            return view('users.KilangBiodiesel.bio-maklumat-jualan', compact(
                'returnArr',
                'senarai_syarikat',
                'syarikat',
                'user',
                'penyata',
                'bulan',
                'tahun',
                'seq',
            ));

        // $penyata = [];
        // $totaliiic4 = 0;
        // $totaliiic5 = 0;
        // $totaliiic6 = 0;
        // $totaliiic7 = 0;
        // $totaliiic8 = 0;
        // $totaliiic9 = 0;
        // $totaliiic10 = 0;

        // dd($user);


    }

    public function bio_add_bahagian_iii(Request $request)
    {
        // dd($request->all());
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first();

        $penyata = EBioC::where('ebio_reg', $ebio_reg->ebio_reg)
            ->where('ebio_c3', $request->ebio_c3)
            // ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        if ($penyata) {
            return redirect()->route('bio.bahagianiii')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            // $this->validation_bahagian_iii($request->all())->validate();
            if ($request->ebio_c3 == 'AW') {
                if ($request->ebio_c8 <> 0) {
                    $this->store_bahagian_iii($request->all());
                    $this->store_bahagian_iii2($request->all());
                } else {
                    $this->store_bahagian_iii($request->all());
                }

            } else {
                $this->store_bahagian_iii($request->all());
            }


            return redirect()->route('bio.bahagianiii')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_iii(array $data)
    {
        return Validator::make($data, [

            'ebio_c3' => ['required', 'string'],
            'ebio_c4' => ['required', 'string'],
            'ebio_c5' => ['required', 'string'],
            'ebio_c6' => ['required', 'string'],
            'ebio_c7' => ['required', 'string'],
            'ebio_c8' => ['required', 'string'],
            'ebio_c9' => ['required', 'string'],
            'ebio_c10' => ['required', 'string'],
            'ebio_cc2' => ['required', 'string'],
            'ebio_cc3' => ['required', 'string'],
            'ebio_cc4' => ['required', 'string'],
            // 'ebio_c12' => ['required', 'string'],

            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_iii(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($ebio_reg);
        return EBioC::create([
            'ebio_reg' => $ebio_reg->ebio_reg,
            'ebio_c3' => $data['ebio_c3'],
            'ebio_c4' => $data['ebio_c4'],
            'ebio_c5' => $data['ebio_c5'],
            'ebio_c6' => $data['ebio_c6'],
            'ebio_c7' => $data['ebio_c7'],
            'ebio_c8' => $data['ebio_c8'],
            'ebio_c9' => $data['ebio_c9'],
            'ebio_c10' => $data['ebio_c10'],
            // 'ebio_c12' => $data['ebio_b12'],

            // 'e101_b15' => $data['ebio_b15'],
        ]);
        // return $data;
        // dd($data);
    }
    protected function store_bahagian_iii2(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');



        // dd($ebio_reg);
        foreach ($data['jumlah_row_hidden'] as $key => $value) {
            // $nama_syarikat = SyarikatPembeli::where('pembeli', $data['new_syarikat_hidden'][$key])->get();
            // dd($nama_syarikat);
            $bio = EBioCC::create([
                'ebio_reg' => $ebio_reg->ebio_reg,
                'ebio_cc2' => $data['ebio_c3'],
                'ebio_cc3' => $data['new_syarikat_hidden'][$key],
                'ebio_cc4' => $data['jumlah_row_hidden'][$key],

            ]);
        }
        return $bio;
    }

    public function bio_edit_bahagian_iii(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->ebio_c3)->first();


        $ebio_c4 = $request->ebio_c4;
        $ebio_c5 = $request->ebio_c5;
        $ebio_c6 = $request->ebio_c6;
        $ebio_c7 = $request->ebio_c7;
        $ebio_c8 = $request->ebio_c8;
        $ebio_c9 = $request->ebio_c9;
        $ebio_c10 = $request->ebio_c10;
        $c4 = str_replace(',', '', $ebio_c4);
        $c5 = str_replace(',', '', $ebio_c5);
        $c6 = str_replace(',', '', $ebio_c6);
        $c7 = str_replace(',', '', $ebio_c7);
        $c8 = str_replace(',', '', $ebio_c8);
        $c9 = str_replace(',', '', $ebio_c9);
        $c10 = str_replace(',', '', $ebio_c10);
        // dd($request->all());
        $penyata = EBioC::findOrFail($id);
        $penyata->ebio_c4 = $c4;
        $penyata->ebio_c5 = $c5;
        $penyata->ebio_c6 = $c6;
        $penyata->ebio_c7 = $c7;
        $penyata->ebio_c8 = $c8;
        $penyata->ebio_c9 = $c9;
        $penyata->ebio_c10 = $c10;
        // $penyata->ebio_c12 = $request->ebio_c12;
        $penyata->save();


        return redirect()->route('bio.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function bio_update_bahagian_iii_sykt(Request $request, $id)
    {
        // dd($request->all());
        $penyata = EBioCC::findOrFail($id);
        $penyata->ebio_cc4 = $request->ebio_cc4;
        $penyata->save();

        return redirect()->route('bio.bahagianiii')
            ->with('success', 'Maklumat telah dikemaskini');
    }


    // public function bio_iii_edit_add(Request $request)
    // {
    //     // dd($request->e_tahun);
    //     $this->delete_add_sykt($request->e_ddate);
    //     // $this->initialize_proses_plbio($request->e_tahun, $e_bulan, $e_ddate);
    //     return redirect()->back()->with('success', 'Penyata telah diinitialize');
    // }


    public function bio_edit_bahagian_iii_sykt(Request $request, $id)
    {
        // dd($request->all());
        $penyata = EBioC::findOrFail($id);
        // dd($penyata);
        $syarikat = EBioCC::where('ebio_reg', $penyata->ebio_reg)->get();
        $count = EBioCC::max('ebio_cc1');
        // dd($total_jualan);

        // dd($syarikat);
        foreach ($syarikat as $key => $data) {
            $data->delete();
        }
        // dd($syarikat);

        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($ebio_reg);
        if($request->new_syarikat_hidden){
            foreach ($request->new_syarikat_hidden as $key => $value) {
                $bio = EBioCC::create([
                    'ebio_reg' => $penyata->ebio_reg,
                    'ebio_cc2' => 'AW',
                    'ebio_cc3' => $request->new_syarikat_hidden[$key],
                    'ebio_cc4' => $request->ebio_cc4_hidden[$key],
                ]);
            }
        }

        if($request->ebio_cc3){
            foreach ($request->ebio_cc3 as $key => $value) {
                $syarikat_id = SyarikatPembeli::where('pembeli', $value)->first();

                $ebio_cc4[$key] = str_replace(',', '', $request->ebio_cc4[$key]);

                $bio = EBioCC::create([
                    'ebio_reg' => $penyata->ebio_reg,
                    'ebio_cc2' => 'AW',
                    'ebio_cc3' => $syarikat_id->id,
                    'ebio_cc4' => $ebio_cc4[$key],
                ]);

            }
            // dd($ebio_cc4);

        }
        $total_jualan = EBioCC::where('ebio_reg', $penyata->ebio_reg)->sum('ebio_cc4');

        $penyata = EBioC::where('ebio_reg', $penyata->ebio_reg)->where('ebio_c3', 'AW')->first();
        $penyata->ebio_c8 = $total_jualan;
        // dd($bio);
        $penyata->push();

        // return redirect()->route('bio.bahagianiii');
        return redirect()->route('bio.bahagianiii');
    }

    public function bio_delete_bahagian_iii($id)
    {

        $penyata = EBioC::findOrFail($id);

        $syarikat = EBioCC::where('ebio_cc2', $penyata->ebio_c3)->get();

        // $penyata2 = EBioCC::findOrFail($id);
        // dd($penyata);
        foreach ($syarikat as $data) {

            $data->delete();
        }

        $penyata->delete();
        // $penyata2->delete()
        return redirect()->route('bio.bahagianiii')
            ->with('success', 'Produk Dihapuskan');
    }

    public function bio_bahagianiv()
    {
        $bulan = date("m") - 1;

        $tahun = date("Y");
        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianiv'), 'name' => "Bahagian 4"],
        ];

        $kembali = route('bio.bahagianiii');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-bahagian-iv', compact('returnArr', 'layout', 'bulan', 'tahun',));
    }
    public function bio_bahagianv()
    {
        $bulan = date("m") - 1;

        $tahun = date("Y");
        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianiv'), 'name' => "Bahagian 5"],
        ];

        $kembali = route('bio.bahagianiii');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-bahagian-v', compact('returnArr', 'layout', 'bulan', 'tahun',));
    }


    public function bio_paparpenyata()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('bio.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        $pelesen2 = ProfileBulanan::where('no_lesen', $pelesen->e_nl)->where('bulan', '8')->where('tahun', '2012')->first();

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first();
        // dd($user);

        if ($user) {
            $ia = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '01');
            })->orderBy('ebio_b4')->get();

            $ib = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->orderBy('ebio_b4')->get();
            // dd($ii);

            $ic = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();
            // dd($ic);

            $ii = Hari::where('lesen', auth()->user()->username)->first();

            $iii = EBioC::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->orderBy('ebio_c3')->get();
            // dd($iii);

            $totaliab5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b5');
            $totaliab6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b6');
            $totaliab7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b7');
            $totaliab8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b8');
            $totaliab9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b9');
            $totaliab10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b10');
            $totaliab11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b11');

            $totalibb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b5');
            $totalibb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b6');
            $totalibb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b7');
            $totalibb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b8');
            $totalibb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b9');
            $totalibb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b10');
            $totalibb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b11');

            $totalicb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b5');
            $totalicb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b6');
            $totalicb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b7');
            $totalicb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b8');
            $totalicb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b9');
            $totalicb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b10');
            $totalicb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b11');

            $totaliiic4 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c4');
            $totaliiic5 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c5');
            $totaliiic6 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c6');
            $totaliiic7 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c7');
            $totaliiic8 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c8');
            $totaliiic9 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c9');
            $totaliiic10 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c10');

            return view('users.KilangBiodiesel.bio-papar-penyata', compact(
                'layout',
                'returnArr',
                'pelesen',
                'pelesen2',
                'user',
                'ia',
                'ib',
                'ic',
                'ii',
                'iii',
                'totaliab5',
                'totaliab6',
                'totaliab7',
                'totaliab8',
                'totaliab9',
                'totaliab10',
                'totaliab11',
                'totalibb5',
                'totalibb6',
                'totalibb7',
                'totalibb8',
                'totalibb9',
                'totalibb10',
                'totalibb11',
                'totalicb5',
                'totalicb6',
                'totalicb7',
                'totalicb8',
                'totalicb9',
                'totalicb10',
                'totalicb11',
                'totaliiic4',
                'totaliiic5',
                'totaliiic6',
                'totaliiic7',
                'totaliiic8',
                'totaliiic9',
                'totaliiic10',
                'bulan',
                'tahun'
            ));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function bio_update_papar_penyata(Request $request, $id)
    {
        // dd($request->all());


        $penyata = EBioInit::findOrFail($id);
        $penyata->ebio_flg = '2';
        $penyata->ebio_sdate = date("Y-m-d");
        $penyata->ebio_npg = $request->ebio_npg;
        $penyata->ebio_jpg = $request->ebio_jpg;
        $penyata->ebio_notel = $request->ebio_notel;
        $penyata->ebio_flagcetak = 'N';
        $penyata->save();

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        $pelesen->e_npg = $request->ebio_npg;
        $pelesen->e_jpg = $request->ebio_jpg;
        $pelesen->e_notel_pg = $request->ebio_notel;
        $pelesen->save();

        $daripada = $request->all();
        $kepada = User::where('username', auth()->user()->username)->first();

        $kepada->notify((new HantarPenyataNotification($kepada, $daripada)));


        return redirect()->route('bio.hantar.penyata')
            ->with('success', 'Penyata Sudah Dihantar');
    }



    public function bio_hantar_penyata()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $date = date("d-m-Y");

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        $pelesen2 = ProfileBulanan::where('no_lesen', $pelesen->e_nl)->where('bulan', '8')->where('tahun', '2012')->first();

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first();
        // dd($user);

        $ia = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '01');
        })->orderBy('ebio_b4')->get();


        $ib = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->orderBy('ebio_b4')->get();
        // dd($ib);

        $ic = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();
        // dd($ic);

        $ii = Hari::where('lesen', auth()->user()->username)->first();

        $iii = EBioC::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->orderBy('ebio_c3')->get();

        $totaliab5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b5');
        $totaliab6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b6');
        $totaliab7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b7');
        $totaliab8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b8');
        $totaliab9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b9');
        $totaliab10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b10');
        $totaliab11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b11');

        $totalibb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b5');
        $totalibb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b6');
        $totalibb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b7');
        $totalibb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b8');
        $totalibb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b9');
        $totalibb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b10');
        $totalibb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b11');

        $totalicb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b5');
        $totalicb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b6');
        $totalicb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b7');
        $totalicb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b8');
        $totalicb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b9');
        $totalicb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b10');
        $totalicb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b11');

        $totaliiic4 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c4');
        $totaliiic5 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c5');
        $totaliiic6 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c6');
        $totaliiic7 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c7');
        $totaliiic8 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c8');
        $totaliiic9 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c9');
        $totaliiic10 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c10');

        return view('users.KilangBiodiesel.bio-hantar-penyata', compact(
            'layout',
            'returnArr',
            'pelesen',
            'pelesen2',
            'user',
            'date',
            'ia',
            'ib',
            'ic',
            'ii',
            'iii',
            'totaliab5',
            'totaliab6',
            'totaliab7',
            'totaliab8',
            'totaliab9',
            'totaliab10',
            'totaliab11',
            'totalibb5',
            'totalibb6',
            'totalibb7',
            'totalibb8',
            'totalibb9',
            'totalibb10',
            'totalibb11',
            'totalicb5',
            'totalicb6',
            'totalicb7',
            'totalicb8',
            'totalicb9',
            'totalicb10',
            'totalicb11',
            'totaliiic4',
            'totaliiic5',
            'totaliiic6',
            'totaliiic7',
            'totaliiic8',
            'totaliiic9',
            'totaliiic10',
            'bulan',
            'tahun'
        ));
    }

    public function bio_email()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-email', compact('returnArr', 'layout'));
    }

    public function bio_send_email_proses(Request $request)
    {
        $emel = $request->TypeOfEmail;
        // dd($request->all());
        $this->validation_send_email($request->all())->validate();
       // $this->store_send_email($request->all());

       if ($request->file_upload) {
        // $this->store_send_email($request->all());
        $pelesen = $this->store_send_email($request->all());
        $kepada = User::where('username', auth()->user()->username)->first();
        // $daripada = User::where('username', auth()->user()->username)->first();
        $kepada->notify((new HantarEmelNotification2($request->TypeOfEmail, $request->Subject, $request->Message, $kepada, $pelesen)));

    } else {
        // $this->store_send_email2($request->all());
        $pelesen = $this->store_send_email2($request->all());
        $kepada = User::where('username', auth()->user()->username)->first();
        $kepada->notify((new HantarEmelNotification($request->TypeOfEmail, $request->Subject, $request->Message, $kepada, $pelesen)));
    }


        if ($emel == 'pindaan') {
            return redirect()->back()->with('success', 'Pindaan telah dihantar. Salinan pindaan telah dihantar ke emel kilang anda untuk cetakan/simpanan anda');

        } elseif ($emel == 'cadangan') {
            return redirect()->back()->with('success', 'Cadangan telah dihantar. Salinan cadangan telah dihantar ke emel kilang anda untuk cetakan/simpanan anda');

        } else {
            return redirect()->back()->with('success', 'Pertanyaan telah dihantar. Salinan pertanyaan telah dihantar ke emel kilang anda untuk cetakan/simpanan anda');

        }
        // return redirect()->back()->with('success', 'Emel sudah dihantar');
    }

    protected function validation_send_email(array $data)
    {
        return Validator::make($data, [
            // 'Id' => ['required', 'string'],
            'TypeOfEmail' => ['required', 'string'],
            // 'FromEmail' => ['required', 'string'],
            'Subject' => ['required', 'string'],
            'Message' => ['required', 'string'],
            // 'file_upload' => ['mimes:jpeg,doc,docx,pdf,xls,png,jpg,xlsx']


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
            'FromEmail' => auth()->user()->email,
            'Category' => auth()->user()->category,
            'Subject' => $data['Subject'],
            'Message' => $data['Message'],
            'file_upload' => $file,

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
            'FromEmail' => auth()->user()->email,
            'Category' => auth()->user()->category,
            'Subject' => $data['Subject'],
            'Message' => $data['Message'],
            'file_upload' => null,

        ]);
    }


    public function bio_penyatadahulu()
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
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';




        return view('users.KilangBiodiesel.bio-penyata-dahulu', compact('returnArr', 'layout','pelesen', 'year', 'tahun'));
    }

    protected function validation_terdahulu(array $data)
    {
        return Validator::make($data, [
            'tahun' => ['required', 'string'],
            'bulan' => ['required', 'string'],
        ]);
    }



    public function bio_penyata_dahulu_process(Request $request)
    {
        // dd($request->all());

        $this->validation_terdahulu($request->all())->validate();


        $user = User::first();
        // dd($user);
        $pelesen = HPelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);


        $users = HBioInit::where('ebio_nl', auth()->user()->username)
            ->where('ebio_thn', $request->tahun)
            ->where('ebio_bln', $request->bulan)->first();
        // dd($users);

        if ($users) {
            $myDateTime = DateTime::createFromFormat('Y-m-d', $users->ebio_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
            $ia = HBioB::with('hbioinit', 'produk')->where('ebio_nobatch', $users->ebio_nobatch)->where('ebio_b3', '1')->orderBy('ebio_b4')->get();

            $ib = HbioB::with('hbioinit', 'produk')->where('ebio_nobatch', $users->ebio_nobatch)->where('ebio_b3', '2')->orderBy('ebio_b4')->get();

            $ic = HbioB::with('hbioinit', 'produk')->where('ebio_nobatch', $users->ebio_nobatch)->where('ebio_b3', '3')->orderBy('ebio_b4')->get();

            $ii = HHari::where('lesen', auth()->user()->username)->where('tahunbhg2', $users->ebio_thn)->where('bulanbhg2', $users->ebio_bln)->first();

            // dd($iii);

            // $iii = EBioC::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->orderBy('ebio_c3')->get();

            $iii = HBioC::with('hbioinit', 'produk')->where('ebio_nobatch', $users->ebio_nobatch)->orderBy('ebio_c3')->get();
            // dd($iii);

            $myDateTime2 = DateTime::createFromFormat('Y-m-d', $users->ebio_sdate);
            $formatteddat2 = $myDateTime2->format('d-m-Y');
            // $vii = H102c::with('h102init', 'produk', 'negara')->where('e102_nobatch', $users->e102_nobatch)->where('e102_c3', '2')->get();
            // dd($iv);

        } else {
            return redirect()->back()->with('error', 'Penyata Tidak Wujud!');
        }

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.penyatadahulu'), 'name' => "Papar Penyata Terdahulu"],
        ];

        $kembali = route('bio.penyatadahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        return view('users.KilangBiodiesel.bio-papar-dahulu', compact(
            'returnArr',
            'myDateTime',
            'formatteddate',
            'myDateTime2',
            'formatteddat2',
            'user',
            'pelesen',
            'users',
            'ia',
            'ib',
            'ic',
            'ii',
            'iii',
        ));
    }

    public function bio_kod_produk()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.produk'), 'name' => "Senarai Kod dan Nama Produk Sawit"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $produk = Produk::where('sub_group_rspo', '')->where('sub_group_mspo', '')->orderBy('prodid')->get();

        // dd($produk);
        $layout = 'layouts.main';

        return view('admin.menu-lain.kod-produk', compact('returnArr', 'layout', 'produk'));
    }


    public function bio_kod_negara()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.negara'), 'name' => "Senarai Kod dan Nama Negara"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $negara = Negara::orderBy('kodnegara')->get();
        $layout = 'layouts.main';

        return view('admin.menu-lain.kod-negara', compact('returnArr', 'layout', 'negara'));
    }


    public function try()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.try', compact('returnArr', 'layout'));
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
