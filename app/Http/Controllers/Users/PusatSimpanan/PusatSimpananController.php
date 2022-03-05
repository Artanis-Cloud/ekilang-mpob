<?php

namespace App\Http\Controllers\Users\PusatSimpanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelesen;

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


        //dd($pelesen);




        return view('users.PusatSimpanan.pusatsimpan-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen'));
    }

    public function pusatsimpan_update_maklumat_asas_pelesen(Request $request, $id)
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


        return redirect()->route('pusatsimpan.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');

    }



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



        return view('users.PusatSimpanan.pusatsimpan-tukar-password', compact('returnArr', 'layout'));
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



        return view('users.PusatSimpanan.pusatsimpan-bahagian-a', compact('returnArr', 'layout'));
    }

    public function pusatsimpan_bahagianb()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.bahagianb'), 'name' => "Bahagian B"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';



        return view('users.PusatSimpanan.pusatsimpan-bahagian-b', compact('returnArr', 'layout'));
    }





    public function pusatsimpan_paparpenyata()
    {

        // $breadcrumbs    = [
        //     ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
        //     ['link' => route('pusatsimpan.paparpenyata'), 'name' => "Penyata Bulanan"],
        // ];

        // $kembali = route('pusatsimpan.bahagianvi');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];
        $layout = 'layouts.psimpan';



        return view('users.PusatSimpanan.pusatsimpan-papar-penyata', compact('layout'));
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

    public function pusatsimpan_prestasioer()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.prestasioer'), 'name' => "Prestasi OER  "],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';



        return view('users.PusatSimpanan.pusatsimpan-prestasi-oer', compact('returnArr', 'layout'));
    }

    public function pusatsimpan_penyatadahulu()
    {

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



        return view('users.PusatSimpanan.pusatsimpan-penyata-dahulu', compact('returnArr', 'layout'));
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
