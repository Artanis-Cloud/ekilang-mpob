<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KilangPenapisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function penapis_maklumatasaspelesen()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('penapis.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-maklumat-asas-pelesen', compact('returnArr', 'layout'));
    }

    public function penapis_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('penapis.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-tukar-password', compact('returnArr', 'layout'));
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



        return view('users.KilangBuah.buah-bahagian-i', compact('returnArr', 'layout'));
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
