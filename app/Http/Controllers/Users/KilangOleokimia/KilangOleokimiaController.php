<?php

namespace App\Http\Controllers\Users\KilangOleokimia;

use App\Http\Controllers\Controller;
use App\Models\E104B;
use App\Models\E104C;
use App\Models\E104D;
use App\Models\E104Init;
use App\Models\Ekmessage;
use App\Models\H104B;
use App\Models\H104C;
use App\Models\H104D;
use App\Models\H104Init;
use App\Models\Negara;
use App\Models\Pelesen;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\RegPelesen;
use App\Models\User;
use DateTime;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class KilangOleokimiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function oleo_maklumatasaspelesen()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

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




        return view('users.KilangOleokimia.oleo-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen', 'jumlah', 'jumlah2'));
    }

    public function oleo_update_maklumat_asas_pelesen(Request $request, $id)
    {
        // dd($request->all());
        if(isset($request['alamat_sama'])){
            $penyata = Pelesen::findOrFail($id);
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
            // $penyata->kap_tangki_jumlah = $request->kap_tangki_jumlah;
        }
        else{
            $penyata = Pelesen::findOrFail($id);
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
            // $penyata->kap_tangki_jumlah = $request->kap_tangki_jumlah;
        }

        $penyata->save();

        $map = User::where('username',$penyata->e_nl)->first();
        $map->email = $request->e_email;
        $map->map_flg = '1';
        $map->map_sdate = now();
        $map->save();
        // $calculate = floatval($request->bil_tangki_cpo) + floatval($request->bil_tangki_ppo) + floatval($request->bil_tangki_cpko) +
        // floatval($request->bil_tangki_ppko) + floatval($request->bil_tangki_oleo) + floatval($request->bil_tangki_others);

        // $total = floatval($request->jumlah);

        return redirect()->route('oleo.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function oleo_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $user = User::get();

        return view('users.KilangOleokimia.oleo-tukar-password', compact('returnArr', 'layout', 'user'));
    }

    public function oleo_update_password(Request $request, $id)
    {
        $user = User::findOrFail(auth()->user()->id);
        //compare password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('oleo.tukarpassword')
                ->with('error', 'Sila masukkan kata laluan lama yang betul');
        }

        if ($request->new_password != $request->password_confirmation) {
            return redirect()->route('oleo.tukarpassword')
                ->with('error', 'Sila sahkan kata laluan');
        }

        if ($request->old_password == $request->new_password) {
            return redirect()->route('oleo.tukarpassword')
                ->with('error', 'Kata laluan baru sama dengan kata laluan lama');
        } else {
            $password = Hash::make($request->new_password);
            $user->password = $password;
            $user->save();
        }

        return redirect()->route('oleo.tukarpassword')
            ->with('success', 'Kata Laluan berjaya ditukar');
    }

    public function oleo_bahagiania()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagiania'), 'name' => "Bahagian 1 (a)"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $user = E104Init::where('e104_nl', auth()->user()->username)->first();
        // dd($user);

        if ($user) {
            $produk = Produk::where('prodcat', '01')->whereNotIn('prodid', ['KB','JW'])->where('sub_group_rspo', '')->where('sub_group_mspo', '')->orderBy('prodname')->get();


            $penyata = E104B::with('e104init', 'produk')->where('e104_reg', $user->e104_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '01');
            })->orderBy('e104_b4')->get();

            $total = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b5');

            $total2 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b6');

            $total3 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b7');

            $total4 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b8');

            $total5 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b9');

            $total6 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b10');

            $total7 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b11');

            $total8 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b12');

            $total9 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '1')->sum('e104_b13');


            // dd($penyata);
            return view('users.KilangOleokimia.oleo-bahagian-ia', compact(
                'returnArr',
                'layout',
                'produk',
                'penyata',
                'user',
                'total',
                'total2',
                'total3',
                'total4',
                'total5',
                'total6',
                'total7',
                'total8',
                'total9','bulan','tahun',
            ));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function oleo_add_bahagian_ia(Request $request)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first();

        $penyata = E104B::where('e104_reg', $e104_reg->e104_reg)
            ->where('e104_b3', '1')
            ->where('e104_b4', $request->e104_b4)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('oleo.bahagiania')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_ia($request->all())->validate();
            $this->store_bahagian_ia($request->all());

            return redirect()->route('oleo.bahagiania')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_ia(array $data)
    {
        return Validator::make($data, [

            'e104_b4' => ['required', 'string'],
            'e104_b5' => ['required', 'string'],
            'e104_b6' => ['required', 'string'],
            'e104_b7' => ['required', 'string'],
            // 'e104_b8' => ['required', 'string'],
            'e104_b9' => ['required', 'string'],
            'e104_b10' => ['required', 'string'],
            'e104_b11' => ['required', 'string'],
            'e104_b12' => ['required', 'string'],
            'e104_b13' => ['required', 'string'],

            // 'e104_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ia(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg);
        return E104B::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_b3' => '1',
            'e104_b4' => $data['e104_b4'],
            'e104_b5' => $data['e104_b5'],
            'e104_b6' => $data['e104_b6'],
            'e104_b7' => $data['e104_b7'],
            // 'e104_b8' => $data['e104_b8'],
            'e104_b9' => $data['e104_b9'],
            'e104_b10' => $data['e104_b10'],
            'e104_b11' => $data['e104_b11'],
            'e104_b12' => $data['e104_b12'],
            'e104_b13' => $data['e104_b13'],

            // 'e104_b15' => $data['e104_b15'],
        ]);
        // return $data;
        // dd($data);
    }

    public function oleo_edit_bahagian_ia(Request $request, $id)
    {

        $e104_b5 = $request->e104_b5;
        $e104_b6 = $request->e104_b6;
        $e104_b7 = $request->e104_b7;
        $e104_b9 = $request->e104_b9;
        $e104_b10 = $request->e104_b10;
        $e104_b11 = $request->e104_b11;
        $e104_b12 = $request->e104_b12;
        $e104_b13 = $request->e104_b13;
        $b5 = str_replace(',', '', $e104_b5);
        $b6 = str_replace(',', '', $e104_b6);
        $b7 = str_replace(',', '', $e104_b7);
        $b9 = str_replace(',', '', $e104_b9);
        $b10 = str_replace(',', '', $e104_b10);
        $b11 = str_replace(',', '', $e104_b11);
        $b12 = str_replace(',', '', $e104_b12);
        $b13 = str_replace(',', '', $e104_b13);

        // dd($request->all());
        $penyata = E104B::findOrFail($id);
        // $penyata->e104_b4 = $produk->prodid;
        $penyata->e104_b5 = $b5;
        $penyata->e104_b6 = $b6;
        $penyata->e104_b7 = $b7;
        $penyata->e104_b9 = $b9;
        $penyata->e104_b10 = $b10;
        $penyata->e104_b11 = $b11;
        $penyata->e104_b12 = $b12;
        $penyata->e104_b13 = $b13;
        $penyata->save();


        return redirect()->route('oleo.bahagiania')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function oleo_delete_bahagian_ia($id)
    {
        $penyata = E104B::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('oleo.bahagiania')
            ->with('success', 'Produk Dihapuskan');
    }


    public function oleo_bahagianib()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianib'), 'name' => "Bahagian 1 (b)"],
        ];

        $kembali = route('oleo.bahagiania');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');

        if ($user) {
            $produk = Produk::where('prodcat', 02)->where('sub_group_rspo', '')->where('sub_group_mspo', '')->orderBy('prodname')->get();

            $penyata = E104B::with('e104init', 'produk')->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', 02);
            })->orderBy('e104_b4')->get();

            $total = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b5');

            $total2 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b6');

            $total3 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b7');

            $total4 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b8');

            $total5 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b9');

            $total6 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b10');

            $total7 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b11');

            $total8 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b12');

            $total9 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '2')->sum('e104_b13');
            // dd($total);
            return view('users.KilangOleokimia.oleo-bahagian-ib', compact(
                'returnArr',
                'layout',
                'produk',
                'penyata',
                'user',
                'total',
                'total2',
                'total3',
                'total4',
                'total5',
                'total6',
                'total7',
                'total8',
                'total9','bulan','tahun',
            ));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function oleo_add_bahagian_ib(Request $request)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first();

        $penyata = E104B::where('e104_reg', $e104_reg->e104_reg)
            ->where('e104_b3', '2')
            ->where('e104_b4', $request->e104_b4)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('oleo.bahagianib')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_ib($request->all())->validate();
            $this->store_bahagian_ib($request->all());

            return redirect()->route('oleo.bahagianib')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_ib(array $data)
    {
        return Validator::make($data, [

            'e104_b4' => ['required', 'string'],
            'e104_b5' => ['required', 'string'],
            'e104_b6' => ['required', 'string'],
            'e104_b7' => ['required', 'string'],
            // 'e104_b8' => ['required', 'string'],
            'e104_b9' => ['required', 'string'],
            'e104_b10' => ['required', 'string'],
            'e104_b11' => ['required', 'string'],
            'e104_b12' => ['required', 'string'],
            'e104_b13' => ['required', 'string'],

            // 'e104_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ib(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg);
        return E104B::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_b3' => '2',
            'e104_b4' => $data['e104_b4'],
            'e104_b5' => $data['e104_b5'],
            'e104_b6' => $data['e104_b6'],
            'e104_b7' => $data['e104_b7'],
            // 'e104_b8' => $data['e104_b8'],
            'e104_b9' => $data['e104_b9'],
            'e104_b10' => $data['e104_b10'],
            'e104_b11' => $data['e104_b11'],
            'e104_b12' => $data['e104_b12'],
            'e104_b13' => $data['e104_b13'],

            // 'e104_b15' => $data['e104_b15'],
        ]);
        // return $data;
        // dd($data);
    }

    // public function destroy(E104B $penyata)
    // {
    //     $penyata->delete();

    //     return redirect()->route('oleo.bahagiani')
    //                     ->with('success','Product deleted successfully');
    // }


    public function oleo_edit_bahagian_ib(Request $request, $id)
    {

        $e104_b5 = $request->e104_b5;
        $e104_b6 = $request->e104_b6;
        $e104_b7 = $request->e104_b7;
        $e104_b9 = $request->e104_b9;
        $e104_b10 = $request->e104_b10;
        $e104_b11 = $request->e104_b11;
        $e104_b12 = $request->e104_b12;
        $e104_b13 = $request->e104_b13;
        $b5 = str_replace(',', '', $e104_b5);
        $b6 = str_replace(',', '', $e104_b6);
        $b7 = str_replace(',', '', $e104_b7);
        $b9 = str_replace(',', '', $e104_b9);
        $b10 = str_replace(',', '', $e104_b10);
        $b11 = str_replace(',', '', $e104_b11);
        $b12 = str_replace(',', '', $e104_b12);
        $b13 = str_replace(',', '', $e104_b13);

        // dd($request->all());
        $penyata = E104B::findOrFail($id);
        // $penyata->e104_b4 = $produk->prodid;
        $penyata->e104_b5 = $b5;
        $penyata->e104_b6 = $b6;
        $penyata->e104_b7 = $b7;
        $penyata->e104_b9 = $b9;
        $penyata->e104_b10 = $b10;
        $penyata->e104_b11 = $b11;
        $penyata->e104_b12 = $b12;
        $penyata->e104_b13 = $b13;
        $penyata->save();


        return redirect()->route('oleo.bahagianib')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function oleo_delete_bahagian_ib($id)
    {
        $penyata = E104B::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('oleo.bahagianib')
            ->with('success', 'Produk Dihapuskan');
    }




    public function oleo_bahagianic()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianic'), 'name' => "Bahagian 1 (c)"],
        ];

        $kembali = route('oleo.bahagianib');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');

        $produk = Produk::where('prodcat', '08')->where('sub_group_rspo', '')->where('sub_group_mspo', '')->orderBy('prodname')->get();
        if ($user) {
            $penyata = E104B::with('e104init', 'produk')->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '08');
            })->orderBy('e104_b4')->get();

            $total = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b5');

            $total2 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b6');

            $total3 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b7');

            $total4 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b8');

            $total5 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b9');

            $total6 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b10');

            $total7 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b11');

            $total8 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b12');

            $total9 = DB::table("e104_b")->where('e104_reg', $user->e104_reg)->where('e104_b3', '3')->sum('e104_b13');

            return view('users.KilangOleokimia.oleo-bahagian-ic', compact(
                'returnArr',
                'layout',
                'produk',
                'penyata',
                'user',
                'total',
                'total2',
                'total3',
                'total4',
                'total5',
                'total6',
                'total7',
                'total8',
                'total9','bulan','tahun',
            ));
        } else {

            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function oleo_add_bahagian_ic(Request $request)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first();

        $penyata = E104B::where('e104_reg', $e104_reg->e104_reg)
            ->where('e104_b3', '3')
            ->where('e104_b4', $request->e104_b4)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('oleo.bahagianic')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_ic($request->all())->validate();
            $this->store_bahagian_ic($request->all());

            return redirect()->route('oleo.bahagianic')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_ic(array $data)
    {
        return Validator::make($data, [

            'e104_b4' => ['required', 'string'],
            'e104_b5' => ['required', 'string'],
            'e104_b6' => ['required', 'string'],
            'e104_b7' => ['required', 'string'],
            // 'e104_b8' => ['required', 'string'],
            'e104_b9' => ['required', 'string'],
            'e104_b10' => ['required', 'string'],
            'e104_b11' => ['required', 'string'],
            'e104_b12' => ['required', 'string'],
            'e104_b13' => ['required', 'string'],

            // 'e104_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ic(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg);
        return E104B::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_b3' => '3',
            'e104_b4' => $data['e104_b4'],
            'e104_b5' => $data['e104_b5'],
            'e104_b6' => $data['e104_b6'],
            'e104_b7' => $data['e104_b7'],
            // 'e104_b8' => $data['e104_b8'],
            'e104_b9' => $data['e104_b9'],
            'e104_b10' => $data['e104_b10'],
            'e104_b11' => $data['e104_b11'],
            'e104_b12' => $data['e104_b12'],
            'e104_b13' => $data['e104_b13'],

            // 'e104_b15' => $data['e104_b15'],
        ]);
        // return $data;
        // dd($data);
    }

    // public function destroy(E104B $penyata)
    // {
    //     $penyata->delete();

    //     return redirect()->route('oleo.bahagiani')
    //                     ->with('success','Product deleted successfully');
    // }


    public function oleo_edit_bahagian_ic(Request $request, $id)
    {

        $e104_b5 = $request->e104_b5;
        $e104_b6 = $request->e104_b6;
        $e104_b7 = $request->e104_b7;
        $e104_b9 = $request->e104_b9;
        $e104_b10 = $request->e104_b10;
        $e104_b11 = $request->e104_b11;
        $e104_b12 = $request->e104_b12;
        $e104_b13 = $request->e104_b13;
        $b5 = str_replace(',', '', $e104_b5);
        $b6 = str_replace(',', '', $e104_b6);
        $b7 = str_replace(',', '', $e104_b7);
        $b9 = str_replace(',', '', $e104_b9);
        $b10 = str_replace(',', '', $e104_b10);
        $b11 = str_replace(',', '', $e104_b11);
        $b12 = str_replace(',', '', $e104_b12);
        $b13 = str_replace(',', '', $e104_b13);

        // dd($request->all());
        $penyata = E104B::findOrFail($id);
        // $penyata->e104_b4 = $produk->prodid;
        $penyata->e104_b5 = $b5;
        $penyata->e104_b6 = $b6;
        $penyata->e104_b7 = $b7;
        $penyata->e104_b9 = $b9;
        $penyata->e104_b10 = $b10;
        $penyata->e104_b11 = $b11;
        $penyata->e104_b12 = $b12;
        $penyata->e104_b13 = $b13;
        $penyata->save();

        return redirect()->route('oleo.bahagianic')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function oleo_delete_bahagian_ic($id)
    {
        $penyata = E104B::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('oleo.bahagianic')
            ->with('success', 'Produk Dihapuskan');
    }



    public function oleo_bahagianii()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianii'), 'name' => "Bahagian 2"],
        ];

        $kembali = route('oleo.bahagianic');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');

        if ($user) {
            $penyata = E104Init::where('e104_nl', auth()->user()->username)->first();

            return view('users.KilangOleokimia.oleo-bahagian-ii', compact('returnArr', 'layout', 'penyata', 'user','bulan','tahun',));

        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function oleo_update_bahagian_ii(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E104Init::findOrFail($id);
        $penyata->e104_a5 = $request->e104_a5;
        $penyata->e104_a6 = $request->e104_a6;
        $penyata->save();


        return redirect()->route('oleo.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function oleo_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianiii'), 'name' => "Bahagian 3"],
        ];

        $kembali = route('oleo.bahagianii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $produk = Produk::whereIn('prodcat',  ['03','04', '06', '08'])->where('sub_group_rspo', '')->where('sub_group_mspo', '')->orderBy('prodname')->get();

        if ($user) {
            $penyata = E104C::with('e104init', 'produk')->where('e104_reg', $user->e104_reg)->whereHas('produk', function ($query) {
                return $query->whereIn('prodcat', ['03','04', '06', '08']);
            })->orderBy('e104_c3')->get();

            $total = DB::table("e104_c")->where('e104_reg', $user->e104_reg)->sum('e104_c4');

            $total2 = DB::table("e104_c")->where('e104_reg', $user->e104_reg)->sum('e104_c5');

            $total3 = DB::table("e104_c")->where('e104_reg', $user->e104_reg)->sum('e104_c6');

            $total4 = DB::table("e104_c")->where('e104_reg', $user->e104_reg)->sum('e104_c7');

            $total5 = DB::table("e104_c")->where('e104_reg', $user->e104_reg)->sum('e104_c8');



            return view('users.KilangOleokimia.oleo-bahagian-iii', compact(
                'returnArr',
                'layout',
                'penyata',
                'user',
                'produk',
                'total',
                'total2',
                'total3',
                'total4',
                'total5','bulan','tahun',
            ));

        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }
    public function oleo_add_bahagian_iii(Request $request)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first();

        $penyata = E104C::where('e104_reg', $e104_reg->e104_reg)
            ->where('e104_c3', $request->e104_c3)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('oleo.bahagianiii')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_iii($request->all())->validate();
            $this->store_bahagian_iii($request->all());

            return redirect()->route('oleo.bahagianiii')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_iii(array $data)
    {
        return Validator::make($data, [
            'e104_c3' => ['required', 'string'],
            'e104_c4' => ['required', 'string'],
            'e104_c5' => ['required', 'string'],
            'e104_c6' => ['required', 'string'],
            'e104_c7' => ['required', 'string'],
            'e104_c8' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_iii(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg->e104_reg);
        return E104C::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_c3' => $data['e104_c3'],
            'e104_c4' => $data['e104_c4'],
            'e104_c5' => $data['e104_c5'],
            'e104_c6' => $data['e104_c6'],
            'e104_c7' => $data['e104_c7'],
            'e104_c8' => $data['e104_c8'],
        ]);
        // return $data;
        // dd($data);
    }


    public function oleo_edit_bahagian_iii(Request $request, $id)
    {


        $e104_c4 = $request->e104_c4;
        $e104_c5 = $request->e104_c5;
        $e104_c6 = $request->e104_c6;
        $e104_c7 = $request->e104_c7;
        $e104_c8 = $request->e104_c8;
        $c4 = str_replace(',', '', $e104_c4);
        $c5 = str_replace(',', '', $e104_c5);
        $c6 = str_replace(',', '', $e104_c6);
        $c7 = str_replace(',', '', $e104_c7);
        $c8 = str_replace(',', '', $e104_c8);

        // dd($request->all());
        $penyata = E104C::findOrFail($id);
        // $penyata->e104_c3 = $request->e104_c3;
        $penyata->e104_c4 = $c4;
        $penyata->e104_c5 = $c5;
        $penyata->e104_c6 = $c6;
        $penyata->e104_c7 = $c7;
        $penyata->e104_c8 = $c8;

        $penyata->save();


        return redirect()->route('oleo.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function oleo_delete_bahagian_iii($id)
    {
        $penyata = E104C::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('oleo.bahagianiii')
            ->with('success', 'Produk Dihapuskan');
    }



    public function oleo_bahagianiv()
    {
        $bulan = date("m") - 1;
        $tahun = date("Y");

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianiv'), 'name' => "Bahagian 4"],
        ];

        $kembali = route('oleo.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $produk = Produk::whereIn('prodcat', ['03', '06', '08'])->orderBy('prodname')->get();
        // dd($produk);

        $negara = Negara::get();

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');


        $penyata = E104D::with('e104init', 'produk', 'negara')->where('e104_reg', $user->e104_reg)->where('e104_d3', 1)->get();

        $total = DB::table("e104_d")->where('e104_reg', $user->e104_reg)->where('e104_d3', '1')->sum('e104_d7');

        $total2 = DB::table("e104_d")->where('e104_reg', $user->e104_reg)->where('e104_d3', '1')->sum('e104_d8');

        // dd($penyata);


        return view('users.KilangOleokimia.oleo-bahagian-iv', compact(
            'returnArr',
            'layout',
            'produk',
            'negara',
            'penyata',
            'total',
            'total2',
            'bulan',
            'tahun'
        ));
    }
    public function oleo_bahagianv()
    {
        $bulan = date("m") - 1;
        $tahun = date("Y");

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianiv'), 'name' => "Bahagian 5"],
        ];

        $kembali = route('oleo.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $produk = Produk::whereIn('prodcat', ['03', '06', '08'])->orderBy('prodname')->get();
        // dd($produk);

        $negara = Negara::get();

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');


        $penyata = E104D::with('e104init', 'produk', 'negara')->where('e104_reg', $user->e104_reg)->where('e104_d3', 1)->get();

        $total = DB::table("e104_d")->where('e104_reg', $user->e104_reg)->where('e104_d3', '1')->sum('e104_d7');

        $total2 = DB::table("e104_d")->where('e104_reg', $user->e104_reg)->where('e104_d3', '1')->sum('e104_d8');

        // dd($penyata);


        return view('users.KilangOleokimia.oleo-bahagian-v', compact(
            'returnArr',
            'layout',
            'produk',
            'negara',
            'penyata',
            'total',
            'total2',
            'bulan',
            'tahun'
        ));
    }



    public function oleo_add_bahagian_iv(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_iv($request->all())->validate();
        $this->store_bahagian_iv($request->all());

        return redirect()->route('oleo.bahagianiv')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_iv(array $data)
    {
        return Validator::make($data, [
            'e104_d4' => ['required', 'string'],
            'e104_d5' => ['required', 'string'],
            'e104_d6' => ['required', 'string'],
            'e104_d7' => ['required', 'string'],
            'e104_d8' => ['required', 'string'],
            'e104_d9' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_iv(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg->e104_reg);
        return E104D::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_d3' => '1',
            'e104_d4' => $data['e104_d4'],
            'e104_d5' => $data['e104_d5'],
            'e104_d6' => $data['e104_d6'],
            'e104_d7' => $data['e104_d7'],
            'e104_d8' => $data['e104_d8'],
            'e104_d9' => $data['e104_d9'],
        ]);
        // return $data;
        // dd($data);
    }



    public function oleo_edit_bahagian_iv(Request $request, $id)
    {
        // $produk = Produk::where('prodname', $request->e104_e4)->first();
        // $negara = Negara::where('namanegara', $request->e104_e9)->first();


        // dd($request->all());
        $penyata = E104D::findOrFail($id);
        // $penyata->e104_e4 = $produk->prodid;
        $penyata->e104_d5 = $request->e104_d5;
        $penyata->e104_d6 = $request->e104_d6;
        $penyata->e104_d7 = $request->e104_d7;
        $penyata->e104_d8 = $request->e104_d8;
        $penyata->e104_d9 = $request->e104_d9;
        $penyata->save();


        return redirect()->route('oleo.bahagianiv')
            ->with('success', 'Maklumat telah disimpan');
    }




    public function oleo_paparpenyata()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('oleo.bahagianiv');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $bulan = date("m") - 01;

        $tahun = date("Y");

        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $pelesen2 = E104Init::where('e104_nl', auth()->user()->username)->first();
        // dd($pelesen2);

        $penyataia = E104B::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->orderBy('e104_b4')->get();

        $total = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b5');

        $total2 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b6');

        $total3 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b7');

        $total4 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b8');

        $total5 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b9');

        $total6 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b10');

        $total7 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b11');

        $total8 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b12');

        $total9 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b13');

        // dd($penyatai);

        $penyataib = E104B::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->orderBy('e104_b4')->get();

        $totalib = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b5');

        $totalib2 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b6');

        $totalib3 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b7');

        $totalib4 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b8');

        $totalib5 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b9');

        $totalib6 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b10');

        $totalib7 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b11');

        $totalib8 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b12');

        $totalib9 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b13');

        // dd($penyataii);


        $penyataic = E104B::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '08');
        })->orderBy('e104_b4')->get();

        $totalic = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b5');

        $totalic2 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b6');

        $totalic3 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b7');

        $totalic4 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b8');

        $totalic5 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b9');

        $totalic6 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b10');

        $totalic7 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b11');

        $totalic8 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b12');

        $totalic9 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b13');

        // dd($penyataiii);


        $penyataii = E104Init::where('e104_nl', auth()->user()->username)->first();
        // dd($penyataiva);


        $penyataiii = E104C::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->whereIn('prodcat',  ['03', '06', '08']);
        })->orderBy('e104_c3')->get();

        $totaliii = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c4');

        $totaliii2 = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c5');

        $totaliii3 = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c6');

        $totaliii4 = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c7');

        $totaliii5 = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c8');
        // dd($penyataiii);


        $penyataiv = E104D::with('e104init', 'produk', 'negara')->where('e104_reg', $pelesen2->e104_reg)->where('e104_d3', 1)->get();

        $totaliv = DB::table("e104_d")->where('e104_reg', $pelesen2->e104_reg)->where('e104_d3', '1')->sum('e104_d7');

        $totaliv2 = DB::table("e104_d")->where('e104_reg', $pelesen2->e104_reg)->where('e104_d3', '1')->sum('e104_d8');
        // dd($penyatava);

        // dd($penyatavb);






        return view('users.KilangOleokimia.oleo-papar-penyata', compact(
            'layout',
            'returnArr',
            'user',
            'pelesen',
            'pelesen2',
            'penyataia',
            'penyataib',
            'penyataic',
            'penyataii',
            'penyataiii',
            'penyataiv',
            'total',
            'total2',
            'total3',
            'total4',
            'total5',
            'total6',
            'total7',
            'total8',
            'total9',
            'totalib',
            'totalib2',
            'totalib3',
            'totalib4',
            'totalib5',
            'totalib6',
            'totalib7',
            'totalib8',
            'totalib9',
            'totalic',
            'totalic2',
            'totalic3',
            'totalic4',
            'totalic5',
            'totalic6',
            'totalic7',
            'totalic8',
            'totalic9',
            'totaliii',
            'totaliii2',
            'totaliii3',
            'totaliii4',
            'totaliii5',
            'totaliv',
            'totaliv2',
            'bulan',
            'tahun',

        ));
    }

    public function oleo_update_papar_penyata(Request $request, $id)
    {
        // dd($request->all());


        $penyata = E104Init::findOrFail($id);
        $penyata->e104_flg = '2';
        $penyata->e104_sdate = date("Y-m-d");
        $penyata->e104_npg = $request->e104_npg;
        $penyata->e104_jpg = $request->e104_jpg;
        $penyata->e104_notel = $request->e104_notel;
        $penyata->save();

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        $pelesen->e_npg = $request->e104_npg;
        $pelesen->e_jpg = $request->e104_jpg;
        $pelesen->e_notel_pg = $request->e104_notel;
        $pelesen->save();


        return redirect()->route('oleo.hantar.penyata')
            ->with('success', 'Penyata Sudah Dihantar');
    }


    public function oleo_hantar_penyata()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $bulan = date("m") - 01;

        $tahun = date("Y");

        $date = date("d-m-Y");

        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $pelesen2 = E104Init::where('e104_nl', auth()->user()->username)->first();
        // dd($pelesen2);

        $penyataia = E104B::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->orderBy('e104_b4')->get();

        $total = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b5');

        $total2 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b6');

        $total3 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b7');

        $total4 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b8');

        $total5 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b9');

        $total6 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b10');

        $total7 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b11');

        $total8 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b12');

        $total9 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '1')->sum('e104_b13');

        // dd($penyatai);

        $penyataib = E104B::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->orderBy('e104_b4')->get();

        $totalib = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b5');

        $totalib2 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b6');

        $totalib3 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b7');

        $totalib4 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b8');

        $totalib5 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b9');

        $totalib6 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b10');

        $totalib7 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b11');

        $totalib8 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b12');

        $totalib9 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '2')->sum('e104_b13');

        // dd($penyataii);


        $penyataic = E104B::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '08');
        })->orderBy('e104_b4')->get();

        $totalic = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b5');

        $totalic2 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b6');

        $totalic3 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b7');

        $totalic4 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b8');

        $totalic5 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b9');

        $totalic6 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b10');

        $totalic7 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b11');

        $totalic8 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b12');

        $totalic9 = DB::table("e104_b")->where('e104_reg', $pelesen2->e104_reg)->where('e104_b3', '3')->sum('e104_b13');

        // dd($penyataiii);


        $penyataii = E104Init::where('e104_nl', auth()->user()->username)->first();
        // dd($penyataiva);


        $penyataiii = E104C::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->whereIn('prodcat',  ['03', '06', '08']);
        })->orderBy('e104_c3')->get();

        $totaliii = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c4');

        $totaliii2 = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c5');

        $totaliii3 = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c6');

        $totaliii4 = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c7');

        $totaliii5 = DB::table("e104_c")->where('e104_reg', $pelesen2->e104_reg)->sum('e104_c8');
        // dd($penyataiii);


        $penyataiv = E104D::with('e104init', 'produk', 'negara')->where('e104_reg', $pelesen2->e104_reg)->where('e104_d3', 1)->get();

        $totaliv = DB::table("e104_d")->where('e104_reg', $pelesen2->e104_reg)->where('e104_d3', '1')->sum('e104_d7');

        $totaliv2 = DB::table("e104_d")->where('e104_reg', $pelesen2->e104_reg)->where('e104_d3', '1')->sum('e104_d8');
        // dd($penyatava);

        // dd($penyatavb);






        return view('users.KilangOleokimia.oleo-hantar-penyata', compact(
            'layout',
            'returnArr',
            'user',
            'date',
            'pelesen',
            'pelesen2',
            'penyataia',
            'penyataib',
            'penyataic',
            'penyataii',
            'penyataiii',
            'penyataiv',
            'total',
            'total2',
            'total3',
            'total4',
            'total5',
            'total6',
            'total7',
            'total8',
            'total9',
            'totalib',
            'totalib2',
            'totalib3',
            'totalib4',
            'totalib5',
            'totalib6',
            'totalib7',
            'totalib8',
            'totalib9',
            'totalic',
            'totalic2',
            'totalic3',
            'totalic4',
            'totalic5',
            'totalic6',
            'totalic7',
            'totalic8',
            'totalic9',
            'totaliii',
            'totaliii2',
            'totaliii3',
            'totaliii4',
            'totaliii5',
            'totaliv',
            'totaliv2',
            'bulan',
            'tahun',

        ));
    }


    public function oleo_penyatadahulu()
    {
        $pelesen = RegPelesen::with('pelesen')->where('e_nl', auth()->user()->username)->first();

        $year = $pelesen->pelesen->e_year;
        // dd($year);
        if($year){
            $tahun = $year;
        }else{
            $tahun = 2003;
        }
        // dd($pelesen);
        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-penyata-dahulu', compact('returnArr', 'layout','pelesen','year','tahun'));
    }

    protected function validation_terdahulu(array $data)
    {
        return Validator::make($data, [
            'tahun' => ['required', 'string'],
            'bulan' => ['required', 'string'],
        ]);
    }



    public function oleo_penyata_dahulu_process(Request $request)
    {
        // dd($request->all());

        $this->validation_terdahulu($request->all())->validate();


        $user = User::first();
        // dd($user);
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);


        $users = H104Init::where('e104_nl', auth()->user()->username)
            ->where('e104_thn', $request->tahun)
            ->where('e104_bln', $request->bulan)->first();
        // dd($users);

        if ($users) {
            $myDateTime = DateTime::createFromFormat('Y-m-d', $users->e104_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
            $ia = H104B::with('h104init', 'produk')->where('e104_nobatch', $users->e104_nobatch)->where('e104_b3', '1')->orderBy('e104_b4')->get();
            // dd($ia);

            $ib = H104B::with('h104init', 'produk')->where('e104_nobatch', $users->e104_nobatch)->where('e104_b3', '2')->orderBy('e104_b4')->get();

            $ic = H104B::with('h104init', 'produk')->where('e104_nobatch', $users->e104_nobatch)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '08');
            })->orderBy('e104_b4')->get();

            $ii = H104Init::where('e104_nl', auth()->user()->username)->first();
            // dd($iii);


            $iii = H104C::with('h104init', 'produk')->where('e104_nobatch', $users->e104_nobatch)->orderBy('e104_c3')
                ->get();
            // dd($iii);

            $iv = H104D::with('h104init', 'produk', 'negara')->where('e104_nobatch', $users->e104_nobatch)->where('e104_d3', '1')->orderBy('e104_d4')->get();
            $myDateTime2 = DateTime::createFromFormat('Y-m-d', $iv[0]->e104_d6);
            $formatteddat2 = $myDateTime2->format('d-m-Y');
            // $vii = H102c::with('h102init', 'produk', 'negara')->where('e102_nobatch', $users->e102_nobatch)->where('e102_c3', '2')->get();
            // dd($iv);
            $totalia5 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b5');

            $totalia6 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b6');


            $totalia7 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b7');

            $totalia8 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b8');


            $totalia9 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b9');

            $totalia10 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b10');

            $totalia11 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b11');

            $totalia12 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b12');

            $totalia13 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '1')
                ->sum('e104_b13');



            $totalib5 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b5');

            $totalib6 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b6');


            $totalib7 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b7');

            $totalib8 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b8');


            $totalib9 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b9');

            $totalib10 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b10');

            $totalib11 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b11');

            $totalib12 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b12');

            $totalib13 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '2')
                ->sum('e104_b13');


            $totalic5 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b5');

            $totalic6 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b6');


            $totalic7 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b7');

            $totalic8 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b8');


            $totalic9 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b9');

            $totalic10 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b10');

            $totalic11 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b11');

            $totalic12 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b12');

            $totalic13 = DB::table("h104_b")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_b3', '3')
                ->sum('e104_b13');



            $totaliii4 = DB::table("h104_c")
                ->where('e104_nobatch', $users->e104_nobatch)
                // ->where('e104_b3','1')
                ->sum('e104_c4');

            $totaliii5 = DB::table("h104_c")
                ->where('e104_nobatch', $users->e104_nobatch)
                // ->where('e104_b3','1')
                ->sum('e104_c5');

            $totaliii6 = DB::table("h104_c")
                ->where('e104_nobatch', $users->e104_nobatch)
                // ->where('e104_b3','1')
                ->sum('e104_c6');

            $totaliii7 = DB::table("h104_c")
                ->where('e104_nobatch', $users->e104_nobatch)
                // ->where('e104_b3','1')
                ->sum('e104_c7');

            $totaliii8 = DB::table("h104_c")
                ->where('e104_nobatch', $users->e104_nobatch)
                // ->where('e104_b3','1')
                ->sum('e104_c8');



            $totaliv7 = DB::table("h104_d")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_d3', '1')
                ->sum('e104_d7');

            $totaliv8 = DB::table("h104_d")
                ->where('e104_nobatch', $users->e104_nobatch)
                ->where('e104_d3', '1')
                ->sum('e104_d8');
        } else {
            return redirect()->back()->with('error', 'Penyata Tidak Wujud!');
        }

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.penyatadahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Senarai Penyata Terdahulu"],
        ];

        $kembali = route('oleo.penyatadahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        return view('users.KilangOleokimia.oleo-papar-dahulu', compact(
            'returnArr',
            'myDateTime',
            'formatteddate',
            'layout',
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
            'iv',
            'totalia5',
            'totalia6',
            'totalia7',
            'totalia8',
            'totalia9',
            'totalia10',
            'totalia11',
            'totalia12',
            'totalia13',
            'totalib5',
            'totalib6',
            'totalib7',
            'totalib8',
            'totalib9',
            'totalib10',
            'totalib11',
            'totalib12',
            'totalib13',
            'totalic5',
            'totalic6',
            'totalic7',
            'totalic8',
            'totalic9',
            'totalic10',
            'totalic11',
            'totalic12',
            'totalic13',
            'totaliii4',
            'totaliii5',
            'totaliii6',
            'totaliii7',
            'totaliii8',
            'totaliv7',
            'totaliv8'
        ));
    }

    public function oleo_email()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-email', compact('returnArr', 'layout'));
    }

    public function oleo_send_email_proses(Request $request)
    {
        // dd($request->all());
        $this->validation_send_email($request->all())->validate();
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
            // 'FromEmail' => ['required', 'string'],
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

    public function oleo_kod_produk()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.produk'), 'name' => "Senarai Kod dan Nama Produk Sawit"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $produk = Produk::where('sub_group_rspo', '')->where('sub_group_mspo', '')->orderBy('prodid')->get();

        $layout = 'layouts.main';

        return view('admin.menu-lain.kod-produk', compact('returnArr', 'layout', 'produk'));
    }


    public function oleo_kod_negara()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.negara'), 'name' => "Senarai Kod dan Nama Negara"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $negara = Negara::orderBy('kodnegara')->get();
        $layout = 'layouts.main';

        return view('admin.menu-lain.kod-negara', compact('returnArr', 'layout', 'negara'));
    }
}
