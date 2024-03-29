<?php

namespace App\Http\Controllers\Users\KilangBuah;

use App\Http\Controllers\Controller;
use App\Models\E91Init;
use App\Models\Ekmessage;
use App\Models\H91Init;
use App\Models\HPelesen;
use App\Models\Negara;
use Illuminate\Http\Request;
use App\Models\Pelesen;
use App\Models\Produk;
use App\Models\RegPelesen;
use App\Models\User;
use App\Notifications\Pelesen\HantarEmelNotification;
use App\Notifications\Pelesen\HantarEmelNotification2;
use App\Notifications\Pelesen\HantarPenyataNotification;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;
use Illuminate\Support\Facades\Crypt;

class KilangBuahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function buah_maklumatasaspelesen()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        // $pelesen = E91Init::get();
        // $pelesen = Pelesen::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->where('e_kat', auth()->user()->category)->first();
        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();
        if ($pelesen) {
            return view('users.KilangBuah.buah-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen'));

        } else {
            return redirect()->back()->with('error', 'Maklumat pelesen tidak wujud. Sila hubungi pegawai MPOB');

        }

    }


    // public function buah_update_maklumat_asas_pelesencuba(Request $request)
    // {
    //     //  dd($request->all());
    //     $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
    //     // dd( $pelesen);

    //     $this->validation_daftar_pelesen($request->all())->validate();

    //     if ($pelesen) {
    //             // dd($request->all());
    //         $this->buah_update_maklumat_asas_pelesen($request);
    //     } else {
    //         $this->store_pelesen($request->all());
    //     }

    // }

    protected function validation_daftar_pelesen(array $data)
    {
        return Validator::make($data, [
            // 'e_nl' => ['required', 'string', 'unique:pelesen'],
            // 'e_np' => ['required', 'string'],
            'e_ap1' => ['required', 'string'],
            // 'e_ap2' => ['required', 'string'],
            // 'e_ap3' => ['required', 'string'],
            //'e_as1' => ['required', 'string'],
            // 'e_as2' => ['required', 'string'],
            // 'e_as3' => ['required', 'string'],
            'e_notel' => ['required', 'string'],
            // 'e_nofax' => ['required', 'string'],
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
        $count = Pelesen::max('e_id');

        return Pelesen::create([
            'e_id' => $count + 1,
            // 'e_nl' => $data['e_nl'],
            // 'e_np' => $data['e_np'],
            'e_ap1' => $data['e_ap1'],
            'e_ap2' => $data['e_ap2'],
            'e_ap3' => $data['e_ap3'],
            // 'e_as1' => $data['e_as1'],
            'e_as2' => $data['e_as2'],
            'e_as3' => $data['e_as3'],
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
            'e_poma' => $data['e_poma'],
            // 'e_year' => $data['e_year'],
            'e_email_pengurus' => $data['e_email_pengurus'],
            'kap_proses' => $data['kap_proses'],
            'tahun' => date("Y"),
            'bulan' => date("m"),

        ]);
    }

    // public function buah_update_maklumat_asas_pelesen2($id)
    // {

    //     $penyata = User::where('username', $penyata->e_nl)->first();
    //     $penyata->map_flg = '1';
    //     $penyata->map_sdate = now();

    //     $penyata->save();


    //     return redirect()->route('buah.maklumatasaspelesen')
    //         ->with('success', 'Maklumat telah dikemaskini');
    // }


    public function buah_update_maklumat_asas_pelesen(Request $request, $id)
    {
        // dd($id);
        if (isset($request['alamat_sama'])) {
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
            $penyata->e_email_pengurus = $request->e_email_pengurus;
            $penyata->e_syktinduk = $request->e_syktinduk;
            $penyata->e_group = $request->e_group;
            $penyata->e_poma = $request->e_poma;
            $penyata->e_biogas = $request->e_biogas;
            $penyata->e_status_biogas = $request->e_status_biogas;
            $penyata->kap_proses = $request->kap_proses;
            $penyata->kap_tangki = $request->kap_tangki;
            $penyata->bil_tangki_cpo = $request->bil_tangki_cpo;
            $penyata->kap_tangki_cpo = $request->kap_tangki_cpo;
        } else {
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
            $penyata->e_email_pengurus = $request->e_email_pengurus;
            $penyata->e_syktinduk = $request->e_syktinduk;
            $penyata->e_group = $request->e_group;
            $penyata->e_poma = $request->e_poma;
            $penyata->e_biogas = $request->e_biogas;
            $penyata->e_status_biogas = $request->e_status_biogas;
            $penyata->kap_proses = $request->kap_proses;
            $penyata->kap_tangki = $request->kap_tangki;
            $penyata->bil_tangki_cpo = $request->bil_tangki_cpo;
            $penyata->kap_tangki_cpo = $request->kap_tangki_cpo;
        }
        // dd($penyata);
        $penyata->save();

        $map = User::where('username', $penyata->e_nl)->where('category', $penyata->e_kat)->first();
        $map->email = $request->e_email;
        $map->map_flg = '1';
        $map->map_sdate = now();
        // dd($map);
        $map->save();

        // dd('tt');



        return redirect()->route('buah.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');
    }


    public function buah_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $user = User::get();

        return view('users.KilangBuah.buah-tukar-password', compact('returnArr', 'layout', 'user'));
    }

    public function buah_update_password(Request $request, $id)
    {
        $user = User::where('username', auth()->user()->username)->where('category', auth()->user()->category)->first();

        //compare password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('buah.tukarpassword')
                ->with('error', 'Sila masukkan kata laluan lama yang betul');
        }

        if ($request->new_password != $request->password_confirmation) {
            return redirect()->route('buah.tukarpassword')
                ->with('error', 'Sila sahkan kata laluan');
        }

        if ($request->old_password == $request->new_password) {
            return redirect()->route('buah.tukarpassword')
                ->with('error', 'Kata laluan baru sama dengan kata laluan lama');
        } else {
            $password = Hash::make($request->new_password);
            $password2 = Crypt::encryptString($request->new_password);
            $user->password = $password;
            $user->crypted_pass = $password2;

            $user->save();
        }

        return redirect()->route('buah.tukarpassword')
            ->with('success', 'Kata Laluan berjaya ditukar');
    }
    public function buah_bahagiani()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagiani'), 'name' => "Bahagian 1"],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $kilang = E91Init::where('e91_nl', auth()->user()->username)->where('e91_flg', '1' )->first();
        // $kilang = E91Init::where('e91_nl', '500028104000')->first();
        // dd($kilang);
        if ($kilang) {
            return view('users.KilangBuah.buah-bahagian-i', compact('returnArr', 'layout', 'kilang', 'bulan', 'tahun',));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }

        // dd($kilang);


    }


    public function buah_update_bahagian_i(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E91Init::findOrFail($id);
        // $penyata->e91_flg = '2';
        $penyata->e91_aa1 = $request->e91_aa1;
        $penyata->e91_aa2 = $request->e91_aa2;
        $penyata->e91_aa3 = $request->e91_aa3;
        $penyata->e91_aa4 = $request->e91_aa4;
        $penyata->e91_ab1 = (float)$request->e91_ab1;
        $penyata->e91_ab2 = $request->e91_ab2;
        $penyata->e91_ab3 = $request->e91_ab3;
        $penyata->e91_ab4 = $request->e91_ab4;
        $penyata->e91_ac1 = $request->e91_ac1;
        $penyata->e91_ad1 = $request->e91_ad1;
        $penyata->e91_ad2 = $request->e91_ad2;
        $penyata->e91_ad3 = $request->e91_ad3;
        $penyata->e91_ae1 = $request->e91_ae1;
        $penyata->e91_ae2 = $request->e91_ae2;
        $penyata->e91_ae3 = $request->e91_ae3;
        $penyata->e91_ae4 = $request->e91_ae4;
        $penyata->e91_ag1 = $request->e91_ag1;
        $penyata->e91_ag2 = $request->e91_ag2;
        $penyata->e91_ag3 = $request->e91_ag3;
        $penyata->e91_ag4 = $request->e91_ag4;
        $penyata->save();


        return redirect()->route('buah.bahagianii')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function buah_bahagianii()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagianii'), 'name' => "Bahagian 2"],
        ];

        $kembali = route('buah.bahagiani');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $penyata = E91Init::where('e91_nl', auth()->user()->username)->where('e91_flg', '1' )->first();
        if ($penyata) {

         // $oer->assign('checked_flag', $db_data=='0'  ? '' : 'checked');
            if ($penyata->e91_ac1 != NULL || $penyata->e91_ac1 != 0) {
                $oer = ($penyata->e91_ad1 / $penyata->e91_ac1) * 100;
                $ker = ($penyata->e91_ad2 / $penyata->e91_ac1) * 100 ;
            } else {
                $oer = 0;
                $ker = 0;
            }

            // dd($penyata);
            // if ($penyata->e91_ah5 ||
            //     $penyata->e91_ah6 ||
            //     $penyata->e91_ah7 ||
            //     $penyata->e91_ah8 ||
            //     $penyata->e91_ah9 ||
            //     $penyata->e91_ah10){
            //     $status_prestasi = "Meningkat";
            // }else{
            //     $status_prestasi = "Menurun";
            // }
            if (
                $penyata->e91_ah5 ||
                $penyata->e91_ah6 ||
                $penyata->e91_ah7 ||
                $penyata->e91_ah8 ||
                $penyata->e91_ah9 ||
                $penyata->e91_ah10
            ) {
                $status_prestasi = "Meningkat";
            } elseif (
                $penyata->e91_ah11 ||
                $penyata->e91_ah12 ||
                $penyata->e91_ah13 ||
                $penyata->e91_ah14 ||
                $penyata->e91_ah15 ||
                $penyata->e91_ah16 ||
                $penyata->e91_ah17
            ) {
                $status_prestasi = "Menurun";
            } else {
                $status_prestasi = "Sila Pilih Prestasi OER";
            }

        $bulan = date("m") - 1;
        $tahun = date("Y");


            return view('users.KilangBuah.buah-bahagian-ii', compact('returnArr', 'layout', 'penyata', 'bulan', 'tahun', 'oer', 'ker', 'status_prestasi'));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }


    public function buah_update_bahagian_ii(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E91Init::findOrFail($id);
        $penyata->e91_ah1 = $request->e91_ah1;
        $penyata->e91_ah2 = $request->e91_ah2;
        $penyata->e91_ah3 = $request->e91_ah3;
        $penyata->e91_ah4 = $request->e91_ah4;
        $penyata->e91_ah5 = $request->e91_ah5;
        $penyata->e91_ah6 = $request->e91_ah6;
        $penyata->e91_ah7 = $request->e91_ah7;
        $penyata->e91_ah8 = $request->e91_ah8;
        $penyata->e91_ah9 = $request->e91_ah9;
        $penyata->e91_ah10 = $request->e91_ah10;
        $penyata->e91_ah11 = $request->e91_ah11;
        $penyata->e91_ah12 = $request->e91_ah12;
        $penyata->e91_ah13 = $request->e91_ah13;
        $penyata->e91_ah14 = $request->e91_ah14;
        $penyata->e91_ah15 = $request->e91_ah15;
        $penyata->e91_ah16 = $request->e91_ah16;
        $penyata->e91_ah17 = $request->e91_ah17;
        $penyata->e91_ah18 = $request->e91_ah18;
        $penyata->save();


        return redirect()->route('buah.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function buah_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagianiii'), 'name' => "Bahagian 3"],
        ];

        $kembali = route('buah.bahagianii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $penyata = E91Init::where('e91_nl', auth()->user()->username)->where('e91_flg', '1' )->first();
        // dd($penyata);
        $jumlah = ($penyata->e91_ai1 ?? 0) +
            ($penyata->e91_ai2 ?? 0) +
            ($penyata->e91_ai3 ?? 0) +
            ($penyata->e91_ai4 ?? 0) +
            ($penyata->e91_ai5 ?? 0) +
            ($penyata->e91_ai6 ?? 0);


        if ($penyata) {
            return view('users.KilangBuah.buah-bahagian-iii', compact('returnArr', 'layout', 'penyata', 'jumlah', 'bulan', 'tahun',));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }

    public function buah_update_bahagian_iii(Request $request, $id)
    {

        //    dd($request->all());
        $calculate = floatval($request->e91_ai1) + floatval($request->e91_ai2) + floatval($request->e91_ai3) +
            floatval($request->e91_ai4) + floatval($request->e91_ai5) + floatval($request->e91_ai6);
        if (round($calculate)!= round(floatval($request->jumlah))) {
            return redirect()->back()->withInput()
            ->with('error', 'Jumlah Belian/Terimaan Tidak Sama dengan Jumlah Bahagian 1 (FFB)!');
        }

        $penyata = E91Init::findOrFail($id);
        $penyata->e91_ai1 = $request->e91_ai1;
        $penyata->e91_ai2 = $request->e91_ai2;
        $penyata->e91_ai3 = $request->e91_ai3;
        $penyata->e91_ai4 = $request->e91_ai4;
        $penyata->e91_ai5 = $request->e91_ai5;
        $penyata->e91_ai6 = $request->e91_ai6;
        $penyata->save();
        // dd($penyata);
        return redirect()->route('buah.bahagianiv')
        ->with('success', 'Maklumat telah disimpan');


    }

    public function buah_bahagianiv()
    {
        //semak jumlah bahagian iii
        $penyata = E91Init::where('e91_nl', auth()->user()->username)->where('e91_flg', '1' )->first();
        // dd($penyata);
        if ($penyata) {

            $jumlah = (floatval($penyata->e91_ai1 ?? 0)) +
                (floatval($penyata->e91_ai2 ?? 0)) +
                (floatval($penyata->e91_ai3 ?? 0)) +
                (floatval($penyata->e91_ai4 ?? 0)) +
                (floatval($penyata->e91_ai5 ?? 0)) +
                (floatval($penyata->e91_ai6 ?? 0));
                // dd($penyata->e91_ab1);
                $jumlah2 = $penyata->e91_ab1;
                // dd($jumlah2);

            //
            // dd($jumlah == $jumlah2);

            if (round($jumlah) != round($penyata->e91_ab1)) {
                return redirect()->back()->with('error', 'Jumlah Bahagian 3 Tidak Sama dengan Jumlah Bahagian 1 (FFB)!');
            }

                $breadcrumbs    = [
                    ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
                    ['link' => route('buah.bahagianiv'), 'name' => "Bahagian 4"],
                ];

                $kembali = route('buah.bahagianiii');

                $returnArr = [
                    'breadcrumbs' => $breadcrumbs,
                    'kembali'     => $kembali,
                ];
                $layout = 'layouts.kbuah';

                $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();

                $bulan = date("m") - 1;
                $tahun = date("Y");

                $jumlah3 = ($penyata->e91_aj1 ?? 0) + ($penyata->e91_aj2 ?? 0) + ($penyata->e91_aj3 ?? 0) +
                    ($penyata->e91_aj4 ?? 0) + ($penyata->e91_aj5 ?? 0) + ($penyata->e91_aj8 ?? 0);
            // } else {

            // }
            //end of semak jumlah bahagian iii


            return view('users.KilangBuah.buah-bahagian-iv', compact('returnArr', 'layout', 'penyata', 'jumlah3', 'bulan', 'tahun','jumlah','jumlah2'));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }



    public function buah_update_bahagian_iv(Request $request, $id)
    {


        // dd($request->all());

        $calculate = floatval($request->e91_aj1) + floatval($request->e91_aj2) + floatval($request->e91_aj3) +
            floatval($request->e91_aj4) + floatval($request->e91_aj5) +  floatval($request->e91_aj8);

        $total = floatval($request->jumlah);

        if (round($calculate) != round($request->jumlah)) {
            return redirect()->back()->withInput()
                ->with('error', 'Jumlah Belian/Terimaan Tidak Sama dengan Jumlah Bahagian 1 (CPO)');
        }


        $penyata = E91Init::findOrFail($id);
        $penyata->e91_aj1 = $request->e91_aj1;
        $penyata->e91_aj2 = $request->e91_aj2;
        $penyata->e91_aj3 = $request->e91_aj3;
        $penyata->e91_aj4 = $request->e91_aj4;
        $penyata->e91_aj5 = $request->e91_aj5;
        // $penyata->e91_aj6 = $request->e91_aj6;
        // $penyata->e91_aj7 = $request->e91_aj7;
        $penyata->e91_aj8 = $request->e91_aj8;
        $penyata->save();


        return redirect()->route('buah.bahagianv')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function buah_bahagianv()
    {

        //semak jumlah bahagian iv
        $penyata = E91Init::where('e91_nl', auth()->user()->username)->where('e91_flg', '1' )->first();
        // dd($penyata);
        if ($penyata) {

        $jumlah = ($penyata->e91_aj1 ?? 0) + ($penyata->e91_aj2 ?? 0) + ($penyata->e91_aj3 ?? 0) +
            ($penyata->e91_aj4 ?? 0) + ($penyata->e91_aj5 ?? 0) + ($penyata->e91_aj8 ?? 0);

        if (round($jumlah) != round($penyata->e91_ae2)) {
            return redirect()->back()->with('error', 'Jumlah Bahagian 4 Tidak Sama dengan Jumlah Bahagian 1 (CPO)!');
        }
        //end of semak jumlah bahagian iv

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagianv'), 'name' => "Bahagian 5"],
        ];

        $kembali = route('buah.bahagianiv');

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();

        $jumlah = ($penyata->e91_ak1 ?? 0) + ($penyata->e91_ak2 ?? 0) + ($penyata->e91_ak3 ?? 0);

            return view('users.KilangBuah.buah-bahagian-v', compact('returnArr', 'layout', 'penyata', 'jumlah', 'bulan', 'tahun',));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }
    }


    public function buah_update_bahagian_v(Request $request, $id)
    {
        // dd($request->all());
        $calculate = floatval($request->e91_ak1) + floatval($request->e91_ak2) + floatval($request->e91_ak3);

        $total = floatval($request->jumlah);

        if (round($calculate) != round($request->jumlah)) {
            return redirect()->back()->withInput()
                ->with('error', 'Jumlah Belian/Terimaan Tidak Sama dengan Jumlah Bahagian 1 (PK)');
        }

        $penyata = E91Init::findOrFail($id);
        $penyata->e91_ak1 = $request->e91_ak1;
        $penyata->e91_ak2 = $request->e91_ak2;
        $penyata->e91_ak3 = $request->e91_ak3;
        $penyata->save();


        return redirect()->route('buah.bahagianvi')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function buah_bahagianvi()
    {
        $bulan = date("m") - 1;
        $tahun = date("Y");

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagianvi'), 'name' => "Bahagian 6"],
        ];

        $kembali = route('buah.bahagianv');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';



        return view('users.KilangBuah.buah-bahagian-vi', compact('returnArr', 'layout', 'bulan', 'tahun'));
    }

    public function buah_paparpenyata()
    {
        //semak jumlah bahagian v
        // $penyata = Pelesen::where('e_nl', auth()->user()->username)->first();
        $penyata = E91Init::where('e91_nl', auth()->user()->username)->where('e91_flg', '1' )->first();

        if ($penyata) {

        $penyata2 = $penyata->e91_ab1;

        $jumlah_3 = ((floatval($penyata->e91_ai1 ?? 0)) +  (floatval($penyata->e91_ai2 ?? 0)) + (floatval($penyata->e91_ai3 ?? 0)) + (floatval($penyata->e91_ai4 ?? 0)) + (floatval($penyata->e91_ai5 ?? 0)) + (floatval($penyata->e91_ai6 ?? 0)));
        // dd($jumlah_3 == $penyata2);

        $jumlah_4 = ($penyata->e91_aj1 ?? 0) + ($penyata->e91_aj2 ?? 0) + ($penyata->e91_aj3 ?? 0) +
            ($penyata->e91_aj4 ?? 0) + ($penyata->e91_aj5 ?? 0) + ($penyata->e91_aj8 ?? 0);
            // dd($jumlah_4);

        $jumlah_5 = ($penyata->e91_ak1 ?? 0) + ($penyata->e91_ak2 ?? 0) + ($penyata->e91_ak3 ?? 0);
        // dd($jumlah_3 != $penyata2);
         if (round($jumlah_3) != round($penyata2)){
            return redirect()->back()->with('error', 'Jumlah Bahagian 3 Tidak Sama dengan Jumlah Bahagian 1 (FFB)2!');
        }
         else if (round($jumlah_4) != round($penyata->e91_ae2)) {
            return redirect()->back()->with('error', 'Jumlah Bahagian 4 Tidak Sama dengan Jumlah Bahagian 1 (CPO)!');
        }
        else if (round($jumlah_5) != round($penyata->e91_ae3)) {
            return redirect()->back()->with('error', 'Jumlah Bahagian 5 Tidak Sama dengan Jumlah Bahagian 1 (PK)!');
        } else {
            $breadcrumbs    = [
                ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('buah.paparpenyata'), 'name' => "Penyata Bulanan"],
            ];

            $kembali = route('buah.bahagianvi');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            // $layout = 'layouts.kbuah';

            $bulan = date("m") - 1;

            $tahun = date("Y");

            $user = User::first();
            $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
            $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();

            $totaliii = DB::table("e91_init")
                ->where('e91_nl', auth()->user()->username)
                ->sum('e91_ai1', 'e91_ai2', 'e91_ai3', 'e91_ai4', 'e91_ai5', 'e91_ai6');
        }

            return view('users.KilangBuah.buah-papar-penyata', compact('returnArr', 'user', 'pelesen', 'penyata', 'totaliii', 'bulan', 'tahun','jumlah_3', 'jumlah_4','jumlah_5','penyata2'));
        } else {
            return redirect()->back()
                ->with('error', 'Sila hubungi pegawai MPOB');
        }

        // dd($penyata->e91_ai1);



        // $totaliii = DB::SUM('e91_ai1', 'e91_ai2', 'e91_ai3', 'e91_ai4', 'e91_ai5', 'e91_ai6')
        //                         FROM e91_init;

        // dd($totaliii);

        // $ekat = DB::select("SELECT * FROM reg_pelesen");



    }

    public function buah_update_papar_penyata(Request $request)
    {
        // dd($request->all());


        $penyata = Pelesen::where('e_nl', auth()->user()->username)->first();
        $penyata->e_npg = $request->e_npg;
        $penyata->e_jpg = $request->e_jpg;
        $penyata->e_notel_pg = $request->e_notel_pg;
        $penyata->save();

        $penyata2 = E91Init::where('e91_nl', auth()->user()->username)->first();
        $penyata2->e91_flg = '2';
        $penyata2->e91_sdate = date("Y-m-d");
        $penyata2->e91_npg = $request->e_npg;
        $penyata2->e91_jpg = $request->e_jpg;
        $penyata2->e91_notel = $request->e_notel_pg;
        $penyata2->save();



        $daripada = $request->all();
        $kepada = User::where('username', auth()->user()->username)->first();

        $kepada->notify((new HantarPenyataNotification($kepada, $daripada)));


        return redirect()->route('buah.hantar.penyata')
            ->with('success', 'Penyata Sudah Dihantar');

    }

    public function buah_hantar_penyata()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        // $layout = 'layouts.kbuah';

        $bulan = date("m") - 1;

        $tahun = date("Y");

        // $date = date("d-m-Y");

        $penyata2 = E91Init::where('e91_nl', auth()->user()->username)->first();
        // $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata2->e91_sdate);
        // $date = $myDateTime->format('d-m-Y');
        // dd($date);

        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();

        $totaliii = DB::table("e91_init")
            ->where('e91_nl', auth()->user()->username)
            ->sum('e91_ai1', 'e91_ai2', 'e91_ai3', 'e91_ai4', 'e91_ai5', 'e91_ai6');

        // $totaliii = DB::SUM('e91_ai1', 'e91_ai2', 'e91_ai3', 'e91_ai4', 'e91_ai5', 'e91_ai6')
        //                         FROM e91_init;

        // dd($totaliii);

        // $ekat = DB::select("SELECT * FROM reg_pelesen");



        return view('users.KilangBuah.buah-hantar-penyata', compact( 'returnArr', 'user', 'pelesen', 'penyata', 'totaliii', 'bulan', 'tahun'));
    }

    public function buah_email()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';



        return view('users.KilangBuah.buah-email-new', compact('returnArr', 'layout'));
    }


    public function buah_send_email_proses(Request $request)
    {
        // dd($request->all());
        $emel = $request->TypeOfEmail;
        $this->validation_send_email($request->all())->validate();

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

    public function buah_prestasioer()
    {
        // $test = DB::connection('mysql3')->select("SELECT tahun, bulan, oer_cpo FROM oercluster
        //                                             WHERE tahun = '2013'
        //                                             AND bulan = '06'");
        // dd($test);
        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.prestasioer'), 'name' => "Prestasi OER  "],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';



        return view('users.KilangBuah.buah-prestasi-oer', compact('returnArr', 'layout'));
    }

    public function buah_oerprocess(Request $request)
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.prestasioer'), 'name' => "Prestasi OER  "],
            ['link' => route('buah.prestasioer'), 'name' => "Paparan Prestasi OER  "],
        ];

        $kembali = route('buah.prestasioer');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $oer = $this->display_oergraph(auth()->user()->username, $request->tahun);
        $data = $this->display_oerdata(auth()->user()->username, $request->tahun);
        $individu = $oer['lineplot_individu'];
        $daerah = $oer['lineplot_daerah'];
        $negeri = $oer['lineplot_negeri'];
        $semsia = $oer['lineplot_semenanjung'];
        $msia = $oer['lineplot_malaysia'];
        $labelx = $oer['labelx'];
        $nama_negeri = $oer['nama_negeri'];
        $nama_daerah = $oer['nama_daerah'];
        $nama_daerah2 = trim(preg_replace('/\s+/', '', $nama_daerah));

        $cluster = $data['cluster'];
        $kawasan = $data['kawasan'];
        $nama_kilang = $data['namakilang'];
        $flgdaerah = $data['flgdaerah'];
        $thn1 = $data['thn1'];
        $thn2 = $data['thn2'];
        $thn3 = $data['thn3'];


        if ($flgdaerah == 'Y') {
            $result3b = $data['result3b'];
            $result2 = $data['result2'];
            $result1 = $data['result1'];


            return view('users.KilangBuah.buah-papar-prestasi-oer', compact('flgdaerah','returnArr', 'result3b', 'result1', 'result2', 'oer', 'individu', 'daerah', 'negeri', 'semsia', 'msia', 'labelx','nama_daerah','nama_negeri','nama_daerah2','nama_kilang','thn1','thn2','thn3','cluster','kawasan'));
        }
        elseif ($flgdaerah == 'N') {
            $result6a = $data['result6a'];
            $result5 = $data['result5'];
            $result7 = $data['result7'];

            // dd($flgdaerah);
            // $this->display_oerdata($request->tahun);

            // $layout = 'layouts.kbuah';


            return view('users.KilangBuah.buah-papar-prestasi-oer', compact('flgdaerah','returnArr', 'result6a', 'result5', 'result7', 'oer', 'individu', 'daerah', 'negeri', 'semsia', 'msia', 'labelx','nama_daerah','nama_negeri','nama_daerah2','nama_kilang','thn1','thn2','thn3','cluster','kawasan'));
        }

    }



    // START PROCESS PRESTASI OER

    function get_pelesen($nolesen)
    {
        //get pelesen
        $qry = DB::connection('mysql3')->select("SELECT p.e_np as namakilang, p.e_cluster, c.nama_cluster,
        p.e_kawasan, n.nama_region
        from pelesen p, negeri n, cluster c
        where p.e_nl = '$nolesen' and p.e_cluster = c.kod_cluster and
        p.e_negeri = n.kod_negeri and p.e_kawasan = n.kod_region");

        return $qry;
    }

    function get_data_pelesen($nolesen)
    {

        //get data pelesen
        $dtlqry = DB::select("SELECT distinct p.e_np as namakilang, n.nama_negeri, d.nama_daerah
        from pelesen p, negeri n, daerah d
        where p.e_nl = '$nolesen' and
        p.e_negeri = n.kod_negeri and
        p.e_negeri = d.kod_negeri and
        p.e_daerah = d.kod_daerah");

        return $dtlqry;
    }


    function check_daerahless($nolesen)
    {
        //fungsi untuk check samada pelesen kurang dari 5 pelesen atau tidak.
        //table daerahless adalah senarai daerah bagi daerah yang kurang dari 5 pelesen

        //check daerahless
        $chkqry = DB::connection('mysql3')->select("SELECT distinct d.daerah from oerpelesen p, daerahless d
        where p.nolesen = '$nolesen' and
              p.negeri = d.negeri and
              p.daerah = d.daerah ");


        if ($chkqry) {
            foreach ($chkqry as $row) {
                $result = $row->daerah;
            }
        } else {
            $result = 0;
        }

        return $result;
    }


    function get_data_oer_year3full($nolesen, $thn3)
    {

        //get data oer year3full
        $query3 = DB::connection('mysql3')->select("SELECT right(f.tahun,2) as tahun, f.bulan,f.oer_cpo as cpo_pelesen,d.oer_cpo as cpo_daerah,n.oer_cpo as cpo_negeri,s.oer_cpo as cpo_semsia,m.oer_cpo as cpo_msia
            from oerpelesen f, oerdaerah d, oernegeri n, oersemsia s, oermsia m
            where f.nolesen = '$nolesen' and
            (f.tahun = '$thn3') and
            f.tahun = d.tahun and
            f.bulan = d.bulan and
            f.tahun = n.tahun and
            f.bulan = n.bulan and
            f.tahun = s.tahun and
            f.bulan = s.bulan and
            f.tahun = m.tahun and
            f.bulan = m.bulan and
            f.negeri = d.negeri and
            f.daerah = d.daerah and
            f.negeri = n.negeri
            order by f.tahun, f.bulan");

        return $query3;
    }


    function get_data_oer_year3full_cluster($cluster, $thn, $bulan)
    {
        //  $conn = db_connect_econ();
        $query3 = DB::connection('mysql3')->select("SELECT tahun, bulan, oer_cpo from oercluster
                where kod_cluster = '$cluster' and tahun = '$thn'
                                  and bulan = '$bulan'");

        //  $result3 = @mysqli_query($conn,$query3);
        //  $row = @mysqli_fetch_array($result3);

        if ($query3) {
            foreach ($query3 as $row) {
                $result = $row->oer_cpo;
            }
        } else {
            $result = 0;
        }

        return $result;
    }


    function get_data_oer_year3full_kawasan($kawasan, $thn, $bulan)
    {

        // $conn = db_connect_econ();
        $query3 = DB::connection('mysql3')->select("SELECT tahun, bulan, oer_cpo from oerkawasan
                where kod_kawasan = '$kawasan' and tahun = '$thn'
                                and bulan = '$bulan'");

        // $result3 = @mysqli_query($conn,$query3);
        // $row = @mysqli_fetch_array($result3);
        if ($query3) {
            foreach ($query3 as $row) {
                $result = $row->oer_cpo;
            }
        } else {
            $result = 0;
        }


        return $result;
    }

    function get_data_oer_year3dfull($nolesen, $thn3)
    {

        // $conn = db_connect_econ();
        $query5 = DB::connection('mysql3')->select("SELECT right(f.tahun,2) as tahun, f.bulan as bulan,f.oer_cpo as cpo_pelesen,n.oer_cpo as cpo_negeri,s.oer_cpo as cpo_semsia,m.oer_cpo as cpo_msia
                from oerpelesen f, oernegeri n, oersemsia s, oermsia m
                where f.nolesen = '$nolesen' and
                (f.tahun = '$thn3') and
                f.tahun = n.tahun and
                f.bulan = n.bulan and
                f.tahun = s.tahun and
                f.bulan = s.bulan and
                f.tahun = m.tahun and
                f.bulan = m.bulan and
                f.negeri = n.negeri
                order by f.tahun, f.bulan");

        // $result5 = @mysqli_query($conn,$query5);
        return $query5;
    }


    function display_oergraph($nolesen, $notahun)
    {

        $thn1 = $notahun;
        //echo $thn1;
        $thn2 = $thn1 - 1;
        $thn3 = $thn1 - 2;
        $thn4 = $thn1 - 3;


        $adadaerah = $this->check_daerahless($nolesen);
        if (!$adadaerah || $adadaerah == 0)
            $flgdaerah = 'Y';
        else
            $flgdaerah = 'N';

        $dtlpelesen = $this->get_data_pelesen($nolesen);

        foreach ($dtlpelesen as $row) {
            $namakilang = trim($row->namakilang);
            $daerah = trim($row->nama_daerah);
            $negeri = trim($row->nama_negeri);
        }

        $makpelesen = $this->get_pelesen($nolesen);

        foreach ($makpelesen as $row1) {
            $enp = $row1->namakilang;
            $cluster = strtoupper($row1->nama_cluster);
            $kodcluster = $row1->e_cluster;
            $kawasan = $row1->nama_region;
            $kodkawasan = $row1->e_kawasan;
        }

        if ($flgdaerah == 'Y') {
            $result1 = $this->get_data_oer_year3full($nolesen, $thn1);
            $result2 = $this->get_data_oer_year3full($nolesen, $thn2);
            $result3 = $this->get_data_oer_year3full($nolesen, $thn3);

            $i = 0;
            foreach ($result3 as $value3) {

                // if ($value3->bulan == '01') {
                //     $bulan = 'Jan';
                // } elseif ($value3->bulan == '02') {
                //     $bulan = 'Feb';
                // } elseif ($value3->bulan == '03') {
                //     $bulan = 'Mac';
                // } elseif ($value3->bulan == '04') {
                //     $bulan = 'Apr';
                // } elseif ($value3->bulan == '05') {
                //     $bulan = 'Mei';
                // } elseif ($value3->bulan == '06') {
                //     $bulan = 'Jun';
                // } elseif ($value3->bulan == '07') {
                //     $bulan = 'Jul';
                // } elseif ($value3->bulan == '08') {
                //     $bulan = 'Ogos';
                // } elseif ($value3->bulan == '09') {
                //     $bulan = 'Sept';
                // } elseif ($value3->bulan == '10') {
                //     $bulan = 'Okt';
                // } elseif ($value3->bulan == '11') {
                //     $bulan = 'Nov';
                // } elseif ($value3->bulan == '12') {
                //     $bulan = 'Dis';
                // } else {
                //     $bulan = 0;
                // }

                $val1[$i] = "$value3->bulan/$value3->tahun";
                $val2[$i] = $value3->cpo_pelesen;
                $val3[$i] = $value3->cpo_daerah;
                $val4[$i] = $value3->cpo_negeri;
                $val5[$i] = $value3->cpo_semsia;
                $val6[$i] = $value3->cpo_msia;

                $valbulan1 = $value3->bulan;
                $oercluster1 = $this->get_data_oer_year3full_cluster($kodcluster, $thn3, $valbulan1);
                $val7[$i] = $oercluster1;
                $oerkawasan1 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn3, $valbulan1);
                $val8[$i] = $oerkawasan1;

                $i++;
            }

            foreach ($result2 as $value2) {

                // if ($value2->bulan == '01') {
                //     $bulan = 'Jan';
                // } elseif ($value2->bulan == '02') {
                //     $bulan = 'Feb';
                // } elseif ($value2->bulan == '03') {
                //     $bulan = 'Mac';
                // } elseif ($value2->bulan == '04') {
                //     $bulan = 'Apr';
                // } elseif ($value2->bulan == '05') {
                //     $bulan = 'Mei';
                // } elseif ($value2->bulan == '06') {
                //     $bulan = 'Jun';
                // } elseif ($value2->bulan == '07') {
                //     $bulan = 'Jul';
                // } elseif ($value2->bulan == '08') {
                //     $bulan = 'Ogos';
                // } elseif ($value2->bulan == '09') {
                //     $bulan = 'Sept';
                // } elseif ($value2->bulan == '10') {
                //     $bulan = 'Okt';
                // } elseif ($value2->bulan == '11') {
                //     $bulan = 'Nov';
                // } elseif ($value2->bulan == '12') {
                //     $bulan = 'Dis';
                // } else {
                //     $bulan = 0;
                // }
                $val1[$i] = "$value2->bulan/$value2->tahun";
                $val2[$i] = $value2->cpo_pelesen;
                $val3[$i] = $value2->cpo_daerah;
                $val4[$i] = $value2->cpo_negeri;
                $val5[$i] = $value2->cpo_semsia;
                $val6[$i] = $value2->cpo_msia;

                $valbulan2 = $value2->bulan;
                $oercluster2 = $this->get_data_oer_year3full_cluster($kodcluster, $thn2, $valbulan2);
                $oerkawasan2 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn2, $valbulan2);
                $val7[$i] = $oercluster2;
                $val8[$i] = $oerkawasan2;

                $i++;
            }

            foreach ($result1 as $value1) {
                // if ($value1->bulan == '01') {
                //     $bulan = 'Jan';
                // } elseif ($value1->bulan == '02') {
                //     $bulan = 'Feb';
                // } elseif ($value1->bulan == '03') {
                //     $bulan = 'Mac';
                // } elseif ($value1->bulan == '04') {
                //     $bulan = 'Apr';
                // } elseif ($value1->bulan == '05') {
                //     $bulan = 'Mei';
                // } elseif ($value1->bulan == '06') {
                //     $bulan = 'Jun';
                // } elseif ($value1->bulan == '07') {
                //     $bulan = 'Jul';
                // } elseif ($value1->bulan == '08') {
                //     $bulan = 'Ogos';
                // } elseif ($value1->bulan == '09') {
                //     $bulan = 'Sept';
                // } elseif ($value1->bulan == '10') {
                //     $bulan = 'Okt';
                // } elseif ($value1->bulan == '11') {
                //     $bulan = 'Nov';
                // } elseif ($value1->bulan == '12') {
                //     $bulan = 'Dis';
                // } else {
                //     $bulan = 0;
                // }

                $val1[$i] = "$value1->bulan/$value1->tahun";
                $val2[$i] = $value1->cpo_pelesen;
                $val3[$i] = $value1->cpo_daerah;
                $val4[$i] = $value1->cpo_negeri;
                $val5[$i] = $value1->cpo_semsia;
                $val6[$i] = $value1->cpo_msia;

                $valbulan3 = $value1->bulan;
                $oercluster3 = $this->get_data_oer_year3full_cluster($kodcluster, $thn1, $valbulan3);
                $oerkawasan3 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn1, $valbulan3);
                $val7[$i] = $oercluster3;
                $val8[$i] = $oerkawasan3;

                $i++;
            }


        } elseif ($flgdaerah == 'N') {

            //$result4 = get_data_oer_year2d($nolesen,$thn1);
            $result4 = $this->get_data_oer_year3dfull($nolesen, $thn1);
            //$result5 = get_data_oer_year2d($nolesen,$thn2);
            $result5 =  $this->get_data_oer_year3dfull($nolesen, $thn2);
            // $result6 = get_data_oer_year3dfull($nolesen,$thn3);
            $result6 =  $this->get_data_oer_year3dfull($nolesen, $thn3);

            $i = 0;
            // dd($result6);
            foreach ($result6 as $value6) {

                // if ($value6->bulan == '01') {
                //     $bulan = 'Jan';
                // } elseif ($value6->bulan == '02') {
                //     $bulan = 'Feb';
                // } elseif ($value6->bulan == '03') {
                //     $bulan = 'Mac';
                // } elseif ($value6->bulan == '04') {
                //     $bulan = 'Apr';
                // } elseif ($value6->bulan == '05') {
                //     $bulan = 'Mei';
                // } elseif ($value6->bulan == '06') {
                //     $bulan = 'Jun';
                // } elseif ($value6->bulan == '07') {
                //     $bulan = 'Jul';
                // } elseif ($value6->bulan == '08') {
                //     $bulan = 'Ogos';
                // } elseif ($value6->bulan == '09') {
                //     $bulan = 'Sept';
                // } elseif ($value6->bulan == '10') {
                //     $bulan = 'Okt';
                // } elseif ($value6->bulan == '11') {
                //     $bulan = 'Nov';
                // } elseif ($value6->bulan == '12') {
                //     $bulan = 'Dis';
                // } else {
                //     $bulan = 0;
                // }
                $val1[$i] = "$value6->bulan/$value6->tahun";
                $val2[$i] = $value6->cpo_pelesen;
                $val4[$i] = $value6->cpo_negeri;
                $val5[$i] = $value6->cpo_semsia;
                $val6[$i] = $value6->cpo_msia;

                $valbulan1 = $value6->bulan;
                $oercluster1 = $this->get_data_oer_year3full_cluster($kodcluster, $thn3, $valbulan1);
                $oerkawasan1 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn3, $valbulan1);
                $val7[$i] = $oercluster1;
                $val8[$i] = $oerkawasan1;

                $i++;
            }

            foreach ($result5 as $value5) {

                if ($value5->bulan == '01') {
                    $bulan = 'Jan';
                } elseif ($value5->bulan == '02') {
                    $bulan = 'Feb';
                } elseif ($value5->bulan == '03') {
                    $bulan = 'Mac';
                } elseif ($value5->bulan == '04') {
                    $bulan = 'Apr';
                } elseif ($value5->bulan == '05') {
                    $bulan = 'Mei';
                } elseif ($value5->bulan == '06') {
                    $bulan = 'Jun';
                } elseif ($value5->bulan == '07') {
                    $bulan = 'Jul';
                } elseif ($value5->bulan == '08') {
                    $bulan = 'Ogos';
                } elseif ($value5->bulan == '09') {
                    $bulan = 'Sept';
                } elseif ($value5->bulan == '10') {
                    $bulan = 'Okt';
                } elseif ($value5->bulan == '11') {
                    $bulan = 'Nov';
                } elseif ($value5->bulan == '12') {
                    $bulan = 'Dis';
                } else {
                    $bulan = 0;
                }
                $val1[$i] = "$value5->bulan/$value5->tahun";
                $val2[$i] = $value5->cpo_pelesen;
                $val4[$i] = $value5->cpo_negeri;
                $val5[$i] = $value5->cpo_semsia;
                $val6[$i] = $value5->cpo_msia;

                $valbulan2 = $value5->bulan;
                $oercluster2 = $this->get_data_oer_year3full_cluster($kodcluster, $thn2, $valbulan2);
                $oerkawasan2 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn2, $valbulan2);
                $val7[$i] = $oercluster2;
                $val8[$i] = $oerkawasan2;

                $i++;
            }

            foreach ($result4 as $value4) {

                if ($value4->bulan == '01') {
                    $bulan = 'Jan';
                } elseif ($value4->bulan == '02') {
                    $bulan = 'Feb';
                } elseif ($value4->bulan == '03') {
                    $bulan = 'Mac';
                } elseif ($value4->bulan == '04') {
                    $bulan = 'Apr';
                } elseif ($value4->bulan == '05') {
                    $bulan = 'Mei';
                } elseif ($value4->bulan == '06') {
                    $bulan = 'Jun';
                } elseif ($value4->bulan == '07') {
                    $bulan = 'Jul';
                } elseif ($value4->bulan == '08') {
                    $bulan = 'Ogos';
                } elseif ($value4->bulan == '09') {
                    $bulan = 'Sept';
                } elseif ($value4->bulan == '10') {
                    $bulan = 'Okt';
                } elseif ($value4->bulan == '11') {
                    $bulan = 'Nov';
                } elseif ($value4->bulan == '12') {
                    $bulan = 'Dis';
                } else {
                    $bulan = 0;
                }
                $val1[$i] = "$value4->bulan/$value4->tahun";
                $val2[$i] = $value4->cpo_pelesen;
                $val4[$i] = $value4->cpo_negeri;
                $val5[$i] = $value4->cpo_semsia;
                $val6[$i] = $value4->cpo_msia;

                $valbulan3 = $value4->bulan;
                $oercluster3 = $this->get_data_oer_year3full_cluster($kodcluster, $thn1, $valbulan3);
                $oerkawasan3 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn1, $valbulan3);
                $val7[$i] = $oercluster3;
                $val8[$i] = $oerkawasan3;

                $i++;
            }

        }


        $pelesen = $this->get_data_pelesen($nolesen);
        $nama_negeri = $pelesen[0]->nama_negeri;
        // dd($nama_negeri);
        $nama_daerah = $pelesen[0]->nama_daerah;


        $labelx = 0;
        $lineplot_individu = 0;
        $lineplot_daerah = 0;
        $lineplot_negeri = 0;
        $lineplot_semenanjung = 0;
        $lineplot_malaysia = 0;

        // for ($i = 0; $i < $key; $i++) {
        //     if ($labelx == 0) {
        //         $labelx = $val1[$i] . ',';
        //     } else {
        //         $labelx = $labelx . $val1[$i] . ",";
        //     }
        //     // $labelx = $labelx ."'". $val1[$i] . "',";
        // }
        // $labelx = substr($labelx, 0, -1);
        // dd($val1);


        for ($x = 0; $x < $i; $x++) {
            if ($lineplot_individu == 0) {
                $lineplot_individu = $val2[$x] . ',';
            } else {
                $lineplot_individu = $lineplot_individu . $val2[$x] . ',';
            }
        }
        $lineplot_individu = substr($lineplot_individu, 0, -1);
        // dd($lineplot_individu);

        if ($flgdaerah == 'Y') {
            for ($x = 0; $x < $i; $x++) {
                if ($lineplot_daerah == 0) {
                    $lineplot_daerah = $val3[$x] . ',';
                } else {
                    $lineplot_daerah = $lineplot_daerah . $val3[$x] . ',';
                }
            }

            $lineplot_daerah = substr($lineplot_daerah, 0, -1);
            //yellow
            // $lineplot2->SetLegend("$daerah");
        }

        for ($x = 0; $x < $i; $x++) {
            if ($lineplot_negeri == 0) {
                $lineplot_negeri = $val4[$x] . ',';
            } else {
                $lineplot_negeri = $lineplot_negeri . $val4[$x] . ',';
            }
        }
        $lineplot_negeri = substr($lineplot_negeri, 0, -1);

        for ($x = 0; $x < $i; $x++) {
            if ($lineplot_semenanjung == 0) {
                $lineplot_semenanjung = $val5[$x] . ',';
            } else {
                $lineplot_semenanjung = $lineplot_semenanjung . $val5[$x] . ',';
            }
        }
        $lineplot_semenanjung = substr($lineplot_semenanjung, 0, -1);

        for ($x = 0; $x < $i; $x++) {
            if ($lineplot_malaysia == 0) {
                $lineplot_malaysia = $val2[$x] . ',';
            } else {
                $lineplot_malaysia = $lineplot_malaysia . $val6[$x] . ',';
            }
        }
        $lineplot_malaysia = substr($lineplot_malaysia, 0, -1);

        $array = [
            'enp' => $enp,
            'nama_negeri' => $nama_negeri,
            'nama_daerah' => $nama_daerah,

            'lineplot_individu' => $lineplot_individu,
            'lineplot_daerah' => $lineplot_daerah,

            'lineplot_negeri' => $lineplot_negeri,
            'lineplot_semenanjung' => $lineplot_semenanjung,
            'lineplot_malaysia' => $lineplot_malaysia,

            'labelx' => $val1,
        ];
        // $tajuk = "LAPURAN PRESTASI OER $namakilang BAGI TAHUN $thn3, $thn2 & $thn1";
        return $array;
    }

    function display_oerdata($nolesen,$notahun)
{

	$thn1 = (integer) $notahun;
	$thn2 = $thn1 - 1;
	$thn3 = $thn1 - 2;
	$thn4 = $thn1 - 3;
	//$bln1 = get_month_firstyear($nobulan);
	//$bln2 = get_month_lastyear($nobulan);

	$adadaerah = $this->check_daerahless($nolesen);
	if (!$adadaerah || $adadaerah == 0)
	   $flgdaerah = 'Y';
	else
		$flgdaerah = 'N';

	//echo $flgdaerah;
// dd($flgdaerah);

	$dtlpelesen = $this->get_data_pelesen($nolesen);
	foreach ($dtlpelesen as $row) {
        $namakilang = trim($row->namakilang);
        $daerah = trim($row->nama_daerah);
        $negeri = trim($row->nama_negeri);
    }

	 $makpelesen = $this->get_pelesen($nolesen);
	 foreach ($makpelesen as $row1) {
        $enp = $row1->namakilang;
        $cluster = strtoupper($row1->nama_cluster);
        $kodcluster = $row1->e_cluster;
        $kawasan = $row1->nama_region;
        $kodkawasan = $row1->e_kawasan;
    }

	if ($flgdaerah == 'Y')
	{



	$result3b = $this->get_data_oer_year3full($nolesen,$thn3);

    foreach ($result3b as $key3 => $value3) {

        $bulhun3[$key3] = $value3->bulan. "/" .$value3->tahun;
        $ind3[$key3] = $value3->cpo_pelesen;
        $negeri3[$key3] = $value3->cpo_negeri;
        $semsia3[$key3] = $value3->cpo_semsia;
        $msia3[$key3] = $value3->cpo_msia;

        $valtahun1 = $value3->tahun;
        $valbulan1 = $value3->bulan;
        $oercluster1 = $this->get_data_oer_year3full_cluster($kodcluster,$thn3,$valbulan1);
            // echo "<td align=center><font size=2>";
            // if (!isset($oercluster1))
            //    { echo "NULL"; }
            // else
            //    { echo $oercluster1;
            //       }
            // echo "</font></td>\n";

        $oerkawasan1 = $this->get_data_oer_year3full_kawasan($kodkawasan,$thn3,$valbulan1);
            // echo "<td align=center><font size=2>";
            // if (!isset($oerkawasan1))
            //    { echo "NULL"; }
            // else
            //    { echo $oerkawasan1;
            //       }
    }

    $result2 = $this->get_data_oer_year3full($nolesen,$thn2);

    foreach ($result2 as $key2 =>  $value2) {

        $bulhun2[$key2] = "$value2->bulan/$value2->tahun";
        $ind2[$key2]  = $value2->cpo_pelesen;
        $daerah2[$key2]  = $value2->cpo_daerah;
        $negeri2[$key2]  = $value2->cpo_negeri;
        $semsia2[$key2]  = $value2->cpo_semsia;
        $msia2[$key2]  = $value2->cpo_msia;


    }

	$result1 = $this->get_data_oer_year3full($nolesen,$thn1);

    foreach ($result1 as $key1 => $value1) {
        $bulhun1[$key1] = "$value1->bulan/$value1->tahun";
        $ind1[$key1] = $value1->cpo_pelesen;
        $daerah1[$key1] = $value1->cpo_daerah;
        $negeri1[$key1] = $value1->cpo_negeri;
        $semsia1[$key1] = $value1->cpo_semsia;
        $msia1[$key1] = $value1->cpo_msia;
    }

    $array = [
        'flgdaerah' => $flgdaerah,

        'thn1' => $thn1,
        'thn2' => $thn2,
        'thn3' => $thn3,

        'namakilang' => $namakilang,
        'daerah' => $daerah,
        'negeri' => $negeri,
        'cluster' => $cluster,
        'kawasan' => $kawasan,

        'result3b' => $result3b,
        'result2' => $result2,
        'result1' => $result1,

    ];

	}
	elseif ($flgdaerah == 'N')
	{

	//untuk tahun ketiga

	$result6a = $this->get_data_oer_year3dfull($nolesen,$thn3);
	$result5 = $this->get_data_oer_year3dfull($nolesen,$thn2);
	$result7 = $this->get_data_oer_year3dfull($nolesen,$thn1);


      $array = [
        'flgdaerah' => $flgdaerah,

        'thn1' => $thn1,
        'thn2' => $thn2,
        'thn3' => $thn3,

        'namakilang' => $namakilang,
        'daerah' => $daerah,
        'negeri' => $negeri,
        'cluster' => $cluster,
        'kawasan' => $kawasan,

        'result6a' => $result6a,
        'result5' => $result5,
        'result7' => $result7,


    ];
    }


    // $tajuk = "LAPURAN PRESTASI OER $namakilang BAGI TAHUN $thn3, $thn2 & $thn1";
    return $array;
	}
	//echo "<br></body></html>";

// }







    public function buah_penyatadahulu()
    {
        $pelesen = RegPelesen::with('pelesen')->where('e_nl', auth()->user()->username)->first();
        // $try = oer();
        // $year = $pelesen->pelesen->e_year;
        $year = $pelesen;
        // dd($year);
        // if ($year) {
        //     $tahun = $year;
        // } else {
        //     $tahun = 2003;
        // }
        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';




        return view('users.KilangBuah.buah-penyata-dahulu', compact('returnArr', 'layout', 'pelesen', 'year'));
    }

    protected function validation_terdahulu(array $data)
    {
        return Validator::make($data, [
            'tahun' => ['required', 'string'],
            'bulan' => ['required', 'string'],
        ]);
    }

    public function buah_penyata_dahulu_process(Request $request)
    {
        $this->validation_terdahulu($request->all())->validate();


        $user = User::first();
        // dd($user);
        $pelesen = HPelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        // $date = DB::select("SELECT DATE_FORMAT(e91_init, %d %c %Y)
        //         FROM h91_init");

        $penyata = H91Init::where('e91_nl', auth()->user()->username)
            ->where('e91_thn', $request->tahun)
            ->where('e91_bln', $request->bulan)->first();
        // dd($penyata);



        if ($penyata) {
            $penyata2 = H91Init::where('e91_nl', auth()->user()->username)->first();
            $myDateTime = DateTime::createFromFormat('Y-m-d', $penyata->e91_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');

            // dd($formatteddate);
        } else {
            return redirect()->back()->with('error', 'Penyata Tidak Wujud!');
        }

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.penyatadahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Senarai Penyata Terdahulu"],
        ];

        $kembali = route('buah.penyatadahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        return view('users.KilangBuah.buah-papar-dahulu', compact('returnArr', 'layout', 'user', 'pelesen', 'penyata', 'penyata2', 'myDateTime', 'formatteddate'));
    }

    public function try()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';



        return view('users.KilangBuah.try', compact('returnArr', 'layout'));
    }

    public function try2()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';



        return view('users.try2', compact('returnArr', 'layout'));
    }

    public function trylogin()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';



        return view('users.KilangBuah.[B]-login', compact('returnArr', 'layout'));
    }

    public function buah_kod_produk()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.produk'), 'name' => "Senarai Kod dan Nama Produk Sawit"],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $produk = Produk::where('sub_group_rspo', '')->where('sub_group_mspo', '')->orderBy('prodid')->get();

        $layout = 'layouts.main';

        return view('admin.menu-lain.kod-produk', compact('returnArr', 'layout', 'produk'));
    }


    public function buah_kod_negara()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.negara'), 'name' => "Senarai Kod dan Nama Negara"],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $negara = Negara::orderBy('kodnegara')->get();
        $layout = 'layouts.main';

        return view('admin.menu-lain.kod-negara', compact('returnArr', 'layout', 'negara'));
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

    public function hashPassword()
    {
        $users = RegPelesen::get();
        // dd($users);
        foreach ($users as $user) {
            $password = $user->epwd;
            $hashed_password = Hash::make($password);
            $user->e_pwd = $hashed_password;
            $user->save();
        }

        return redirect()->route('admin.dashboard');
    }
}
