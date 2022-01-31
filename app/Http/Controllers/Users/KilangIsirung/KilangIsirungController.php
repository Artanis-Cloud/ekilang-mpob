<?php

namespace App\Http\Controllers\Users\KilangIsirung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class KilangIsirungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function isirung_maklumatasaspelesen()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';

        // $pelesen = E91Init::get();

        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();


        //dd($pelesen);




        return view('users.KilangIsirung.isirung-maklumat-asas-pelesen', compact('returnArr', 'layout'));
    }

    public function isirung_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-tukar-password', compact('returnArr', 'layout'));
    }

    public function isirung_bahagiani()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagiani'), 'name' => "Bahagian I"],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-bahagian-i', compact('returnArr', 'layout'));
    }

    public function isirung_bahagianii()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagianii'), 'name' => "Bahagian II"],
        ];

        $kembali = route('isirung.bahagiani');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-bahagian-ii', compact('returnArr', 'layout'));
    }

    public function isirung_bahagianii2()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagianii'), 'name' => "Bahagian II"],
        ];

        $kembali = route('isirung.bahagiani');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-bahagian-ii2', compact('returnArr', 'layout'));
    }

    public function isirung_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagianiii'), 'name' => "Bahagian III"],
        ];

        $kembali = route('isirung.bahagianii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-bahagian-iii', compact('returnArr', 'layout'));
    }

    public function isirung_bahagianiv()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagianiv'), 'name' => "Bahagian IV"],
        ];

        $kembali = route('isirung.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-bahagian-iv', compact('returnArr', 'layout'));
    }

    public function isirung_bahagianv()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagianv'), 'name' => "Bahagian V"],
        ];

        $kembali = route('isirung.bahagianiv');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-bahagian-v', compact('returnArr', 'layout'));
    }

    public function isirung_bahagianvi()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagianvi'), 'name' => "Bahagian VI"],
        ];

        $kembali = route('isirung.bahagianv');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-bahagian-vi', compact('returnArr', 'layout'));
    }

    public function isirung_bahagianvii()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagianvii'), 'name' => "Bahagian VII"],
        ];

        $kembali = route('isirung.bahagianvi');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-bahagian-vii', compact('returnArr', 'layout'));
    }


    public function isirung_paparpenyata()
    {

        // $breadcrumbs    = [
        //     ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
        //     ['link' => route('isirung.paparpenyata'), 'name' => "Penyata Bulanan"],
        // ];

        // $kembali = route('isirung.bahagianvi');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-papar-penyata', compact('layout'));
    }

    public function isirung_email()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-email', compact('returnArr', 'layout'));
    }

    public function isirung_prestasioer()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.prestasioer'), 'name' => "Prestasi OER  "],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-prestasi-oer', compact('returnArr', 'layout'));
    }

    public function isirung_penyatadahulu()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.isirung-penyata-dahulu', compact('returnArr', 'layout'));
    }

    public function try()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



        return view('users.KilangIsirung.try', compact('returnArr', 'layout'));
    }

    public function try2()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';



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

}
