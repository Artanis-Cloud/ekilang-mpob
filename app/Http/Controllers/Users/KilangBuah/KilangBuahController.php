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


    // public function admin_update_bahagian_i(Request $request, $id)
    // {
    //     // dd($request->all());
    //     $pengumuman = Pengumuman::findOrFail($id);
    //     $pengumuman->Message = $request->Message;
    //     $pengumuman->Start_date = $request->Start_date;
    //     $pengumuman->End_date = $request->End_date;
    //     $pengumuman->Icon_new = $request->Icon_new;
    //     $pengumuman->save();


    //     return redirect()->back()
    //         ->with('success', 'Pengumuman telah dikemaskini');

    // }

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



        return view('users.KilangBuah.buah-bahagian-ii', compact('returnArr', 'layout'));
    }

    public function buah_bahagianii2()
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



        return view('users.KilangBuah.buah-bahagian-ii2', compact('returnArr', 'layout'));
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



        return view('users.KilangBuah.buah-bahagian-iii', compact('returnArr', 'layout'));
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



        return view('users.KilangBuah.buah-bahagian-iv', compact('returnArr', 'layout'));
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



        return view('users.KilangBuah.buah-bahagian-v', compact('returnArr', 'layout'));
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

        // $breadcrumbs    = [
        //     ['link' => route('buah.dashboard'), 'name' => "Laman Utama"],
        //     ['link' => route('buah.paparpenyata'), 'name' => "Penyata Bulanan"],
        // ];

        // $kembali = route('buah.bahagianvi');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];
        $layout = 'layouts.kbuah';



        return view('users.KilangBuah.buah-papar-penyata', compact('layout'));
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
