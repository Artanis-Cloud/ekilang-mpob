<?php

namespace App\Http\Controllers\Users\KilangBuah;

use App\Http\Controllers\Controller;
use App\Models\E91Init;
use Illuminate\Http\Request;
use App\Models\Pelesen;
use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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


        //dd($pelesen);
        // $data = .....;




        return view('users.KilangBuah.buah-maklumat-asas-pelesen', compact('returnArr', 'layout','pelesen'));
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
        $penyata->e91_aa1 = $request->e91_aa1;
        $penyata->e91_aa2 = $request->e91_aa2;
        $penyata->e91_aa3 = $request->e91_aa3;
        $penyata->e91_aa4 = $request->e91_aa4;
        $penyata->e91_ab1 = $request->e91_ab1;
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
        $penyata->e91_ah5 = $request->e91_ah5 ?? 'N';
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

    // public function buah_bahagianii2()
    // {

    //     $breadcrumbs    = [
    //         ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('buah.bahagianii'), 'name' => "Bahagian II"],
    //     ];

    //     $kembali = route('buah.bahagiani');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.kbuah';



    //     return view('users.KilangBuah.buah-bahagian-ii2', compact('returnArr', 'layout'));
    // }

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


        return view('users.KilangBuah.buah-bahagian-iii', compact('returnArr', 'layout', 'penyata'));
    }


    public function buah_update_bahagian_iii(Request $request, $id)
    {


        // dd($request->all());
        $penyata = E91Init::findOrFail($id);
        $penyata->e91_ai1 = $request->e91_ai1;
        $penyata->e91_ai2 = $request->e91_ai2;
        $penyata->e91_ai3 = $request->e91_ai3;
        $penyata->e91_ai4 = $request->e91_ai4;
        $penyata->e91_ai5 = $request->e91_ai5;
        $penyata->e91_ai6 = $request->e91_ai6;
        // $penyata->e91_ah7 = $request->e91_ah7;
        // $penyata->e91_ah8 = $request->e91_ah8;
        // $penyata->e91_ah9 = $request->e91_ah9;
        // $penyata->e91_ah10 = $request->e91_ah10;
        // $penyata->e91_ah11 = $request->e91_ah11;
        // $penyata->e91_ah12 = $request->e91_ah12;
        // $penyata->e91_ah13 = $request->e91_ah13;
        // $penyata->e91_ah14 = $request->e91_ah14;
        // $penyata->e91_ah15 = $request->e91_ah15;
        // $penyata->e91_ah16 = $request->e91_ah16;
        // $penyata->e91_ah17 = $request->e91_ah17;
        // $penyata->e91_ah18 = $request->e91_ah18;
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


        return view('users.KilangBuah.buah-bahagian-iv', compact('returnArr', 'layout', 'penyata'));
    }



    public function buah_update_bahagian_iv(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E91Init::findOrFail($id);
        $penyata->e91_aj1 = $request->e91_aj1;
        $penyata->e91_aj2 = $request->e91_aj2;
        $penyata->e91_aj3 = $request->e91_aj3;
        $penyata->e91_aj4 = $request->e91_aj4;
        $penyata->e91_aj5 = $request->e91_aj5;
        $penyata->e91_aj6 = $request->e91_aj6;
        $penyata->e91_aj7 = $request->e91_aj7;
        $penyata->e91_aj8 = $request->e91_aj8;
        // $penyata->e91_ac1 = $request->e91_ac1;
        // $penyata->e91_ad1 = $request->e91_ad1;
        // $penyata->e91_ad2 = $request->e91_ad2;
        // $penyata->e91_ad3 = $request->e91_ad3;
        // $penyata->e91_ae1 = $request->e91_ae1;
        // $penyata->e91_ae2 = $request->e91_ae2;
        // $penyata->e91_ae3 = $request->e91_ae3;
        // $penyata->e91_ae4 = $request->e91_ae4;
        // $penyata->e91_ag1 = $request->e91_ag1;
        // $penyata->e91_ag2 = $request->e91_ag2;
        // $penyata->e91_ag3 = $request->e91_ag3;
        // $penyata->e91_ag4 = $request->e91_ag4;
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


        return view('users.KilangBuah.buah-bahagian-v', compact('returnArr', 'layout', 'penyata'));
    }


    public function buah_update_bahagian_v(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E91Init::findOrFail($id);
        $penyata->e91_ak1 = $request->e91_ak1;
        $penyata->e91_ak2 = $request->e91_ak2;
        $penyata->e91_ak3 = $request->e91_ak3;
        // $penyata->e91_aj4 = $request->e91_aj4;
        // $penyata->e91_aj5 = $request->e91_aj5;
        // $penyata->e91_aj6 = $request->e91_aj6;
        // $penyata->e91_aj7 = $request->e91_aj7;
        // $penyata->e91_aj8 = $request->e91_aj8;
        // $penyata->e91_ac1 = $request->e91_ac1;
        // $penyata->e91_ad1 = $request->e91_ad1;
        // $penyata->e91_ad2 = $request->e91_ad2;
        // $penyata->e91_ad3 = $request->e91_ad3;
        // $penyata->e91_ae1 = $request->e91_ae1;
        // $penyata->e91_ae2 = $request->e91_ae2;
        // $penyata->e91_ae3 = $request->e91_ae3;
        // $penyata->e91_ae4 = $request->e91_ae4;
        // $penyata->e91_ag1 = $request->e91_ag1;
        // $penyata->e91_ag2 = $request->e91_ag2;
        // $penyata->e91_ag3 = $request->e91_ag3;
        // $penyata->e91_ag4 = $request->e91_ag4;
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

        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        $penyata = E91Init::where('e91_nl', auth()->user()->username)->first();



        return view('users.KilangBuah.buah-papar-penyata', compact('layout','returnArr','user', 'pelesen','penyata'));
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
