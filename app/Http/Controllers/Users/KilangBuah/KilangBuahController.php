<?php

namespace App\Http\Controllers\Users\KilangBuah;

use App\Http\Controllers\Controller;
use App\Models\E91Init;
use App\Models\Ekmessage;
use App\Models\H91Init;
use Illuminate\Http\Request;
use App\Models\Pelesen;
use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;

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
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();


        // dd($pelesen);
        // $data = .....;




        return view('users.KilangBuah.buah-maklumat-asas-pelesen', compact('returnArr', 'layout','pelesen'));
    }


    public function buah_update_maklumat_asas_pelesen(Request $request, $id)
    {
        // dd($request->all());
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
        // $penyata->e_notelpg = $request->e_notelpg;
        $penyata->e_npgtg = $request->e_npgtg;
        $penyata->e_jpgtg = $request->e_jpgtg;
        $penyata->e_email_pengurus = $request->e_email_pengurus;
        $penyata->save();


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



        return view('users.KilangBuah.buah-tukar-password', compact('returnArr', 'layout'));
    }

    public function buah_bahagiani()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagiani'), 'name' => "Bahagian I"],
        ];

        $kembali = route('buah.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();
        // dd($no_lesen);

        // foreach($no_lesen  as $data){
        //     $penyata = DB::select("SELECT e91_aa1,e91_aa2,e91_aa3,e91_aa4,e91_ab1,e91_ab2,
		// 	e91_ab3,e91_ab4,e91_ac1,e91_ad1,e91_ad2,
		// 	e91_ad3,e91_ae1,e91_ae2,e91_ae3,e91_ae4,
		// 	e91_af1,e91_af2,e91_af3,e91_ag1,e91_ag2,e91_ag3,e91_ag4
        //     FROM e91_init
        //    WHERE e91_nl = $data->e91_nl");
        // }

        // dd($penyata);


        return view('users.KilangBuah.buah-bahagian-i', compact('returnArr', 'layout','penyata'));
    }


    public function buah_update_bahagian_i(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E91Init::findOrFail($id);
        $penyata->e91_flg = '2';
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
            ['link' => route('buah.bahagianii'), 'name' => "Bahagian II"],
        ];

        $kembali = route('buah.bahagiani');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();
        // $oer->assign('checked_flag', $db_data=='0'  ? '' : 'checked');

        return view('users.KilangBuah.buah-bahagian-ii', compact('returnArr', 'layout', 'penyata'));
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
        $penyata->e91_ah6 = $request->e91_ah6 ;
        $penyata->e91_ah7 = $request->e91_ah7 ;
        $penyata->e91_ah8 = $request->e91_ah8 ;
        $penyata->e91_ah9 = $request->e91_ah9 ;
        $penyata->e91_ah10 = $request->e91_ah10 ;
        $penyata->e91_ah11 = $request->e91_ah11 ;
        $penyata->e91_ah12 = $request->e91_ah12 ;
        $penyata->e91_ah13 = $request->e91_ah13 ;
        $penyata->e91_ah14 = $request->e91_ah14 ;
        $penyata->e91_ah15 = $request->e91_ah15 ;
        $penyata->e91_ah16 = $request->e91_ah16 ;
        $penyata->e91_ah17 = $request->e91_ah17 ;
        $penyata->e91_ah18 = $request->e91_ah18 ;
        $penyata->save();


        return redirect()->route('buah.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');

    }

    public function buah_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagianiii'), 'name' => "Bahagian III"],
        ];

        $kembali = route('buah.bahagianii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();
        // dd($penyata);
        $jumlah = ($penyata->e91_ai1 ?? 0) +
            ($penyata->e91_ai2 ?? 0) +
            ($penyata->e91_ai3 ?? 0) +
            ($penyata->e91_ai4 ?? 0) +
            ($penyata->e91_ai5 ?? 0) +
            ($penyata->e91_ai6 ?? 0);


        return view('users.KilangBuah.buah-bahagian-iii', compact('returnArr', 'layout', 'penyata' , 'jumlah'));
    }

    // protected function validation_bahagian_iii(array $data)
    // {
    //     return Validator::make($data, [

    //         'total' => 'required|same:e91_ab1',
    //     ]);
    // }
    public function buah_update_bahagian_iii(Request $request, $id)
    {

    //    dd($request->all());
       $calculate = floatval($request->e91_ai1) + floatval($request->e91_ai2) + floatval($request->e91_ai3) +
       floatval($request->e91_ai4) + floatval($request->e91_ai5) + floatval($request->e91_ai6);

       $total = floatval($request->jumlah);

       if($calculate != $request->jumlah)
       {
            return redirect()->back()->withInput()
            ->with('error', 'Jumlah Tidak Sama!');
       }
       $penyata = E91Init::findOrFail($id);
       $penyata->e91_ai1 = $request->e91_ai1;
       $penyata->e91_ai2 = $request->e91_ai2;
       $penyata->e91_ai3 = $request->e91_ai3;
       $penyata->e91_ai4 = $request->e91_ai4;
       $penyata->e91_ai5 = $request->e91_ai5;
       $penyata->e91_ai6 = $request->e91_ai6;
       $penyata->save();


       return redirect()->route('buah.bahagianiv')
           ->with('success', 'Maklumat telah disimpan');

    }

    public function buah_bahagianiv()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagianiv'), 'name' => "Bahagian IV"],
        ];

        $kembali = route('buah.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();

        $jumlah = ($penyata->e91_aj1 ?? 0) + ($penyata->e91_aj2 ?? 0) + ($penyata->e91_aj3 ?? 0) +
        ($penyata->e91_aj4 ?? 0) + ($penyata->e91_aj5 ?? 0) + ($penyata->e91_aj8 ?? 0);

        return view('users.KilangBuah.buah-bahagian-iv', compact('returnArr', 'layout', 'penyata', 'jumlah'));
    }



    public function buah_update_bahagian_iv(Request $request, $id)
    {
        // dd($request->all());

        $calculate = floatval($request->e91_aj1) + floatval($request->e91_aj2) + floatval($request->e91_aj3) +
        floatval($request->e91_aj4) + floatval($request->e91_aj5) +  floatval($request->e91_aj8);

        $total = floatval($request->jumlah);

        if($calculate != $request->jumlah)
        {
             return redirect()->back()->withInput()
             ->with('error', 'Jumlah Tidak Sama!');
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

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagianv'), 'name' => "Bahagian V"],
        ];

        $kembali = route('buah.bahagianiv');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();

        $jumlah = ($penyata->e91_ak1 ?? 0) + ($penyata->e91_ak2 ?? 0) + ($penyata->e91_ak3 ?? 0);

        return view('users.KilangBuah.buah-bahagian-v', compact('returnArr', 'layout', 'penyata','jumlah'));
    }


    public function buah_update_bahagian_v(Request $request, $id)
    {
        // dd($request->all());
        $calculate = floatval($request->e91_ak1) + floatval($request->e91_ak2) + floatval($request->e91_ak3);

        $total = floatval($request->jumlah);

        if($calculate != $request->jumlah)
        {
             return redirect()->back()->withInput()
             ->with('error', 'Jumlah Tidak Sama!');
        }

        $penyata = E91Init::findOrFail($id);
        $penyata->e91_ak1 = $request->e91_ak1;
        $penyata->e91_ak2 = $request->e91_ak2;
        $penyata->e91_ak3 = $request->e91_ak3;
        $penyata->save();


        return redirect()->route('buah.paparpenyata')
            ->with('success', 'Maklumat telah disimpan');

    }

    public function buah_bahagianvi()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.bahagianvi'), 'name' => "Bahagian VI"],
        ];

        $kembali = route('buah.bahagianv');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';



        return view('users.KilangBuah.buah-bahagian-vi', compact('returnArr', 'layout'));
    }

    public function buah_paparpenyata()
    {

        $breadcrumbs    = [
            ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('buah.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('buah.bahagianvi');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';

        $bulan = date("m") - 1;

        $tahun = date("Y");

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



        return view('users.KilangBuah.buah-papar-penyata', compact('layout','returnArr','user', 'pelesen','penyata','totaliii','bulan','tahun'));
    }

    public function buah_update_papar_penyata(Request $request, $id)
    {
        // dd($request->all());


        $penyata = E91Init::findOrFail($id);
        $penyata->e91_npg = $request->e91_npg;
        $penyata->e91_jpg = $request->e91_jpg;
        $penyata->e91_notel = $request->e91_notel;
        $penyata->save();


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
        $layout = 'layouts.kbuah';

        $bulan = date("m") - 1;

        $tahun = date("Y");

        $date = date("d-m-Y");
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



        return view('users.KilangBuah.buah-hantar-penyata', compact('layout', 'date','returnArr','user', 'pelesen','penyata','totaliii','bulan','tahun'));
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



        return view('users.KilangBuah.buah-email', compact('returnArr', 'layout'));
    }


    public function buah_send_email_proses (Request $request)
    {
        // dd($request->all());
        $this->validation_send_email($request->all())->validate();
        $this->store_send_email($request->all());


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
        ]);
    }

    protected function store_send_email(array $data)
    {

        // $user = User::where('e_nl', auth()->user()->username)->first();

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

        ]);
    }

    public function buah_prestasioer()
    {

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

    public function buah_penyatadahulu()
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




        return view('users.KilangBuah.buah-penyata-dahulu', compact('returnArr', 'layout'));
    }


    public function buah_penyata_dahulu_process(Request $request)
    {
        // //dd($request->all());

        // $tahun = H91Init::where('tahun', $request->e91_thn);
        // $bulan = H91Init::where('bulan', $request->e91_bln);
        // $ekat = RegPelesen::get('e_kat');
        // $ekat = DB::select("SELECT * FROM reg_pelesen");
        // dd($ekat);
        // $users = RegPelesen::with('pelesen')->where('e_kat','PL91')->where('e_status',1)->get();
        // foreach($ekat as $data){
        // if('e_kat' == "PL91")
        // {

            $user = User::first();
            // dd($user);
            $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
            // dd($pelesen);

            $penyata = H91Init::where('e91_nl', auth()->user()->username)
                ->where('e91_thn', $request->tahun)
                ->where('e91_bln', $request->bulan)->first();
            // dd($penyata);

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

        return view('users.KilangBuah.buah-papar-dahulu', compact('returnArr', 'layout', 'user','pelesen','penyata'));
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
