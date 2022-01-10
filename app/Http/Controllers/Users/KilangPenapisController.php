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

    public function penapis_bahagiani()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagiani'), 'name' => "Bahagian I"],
        ];

        $kembali = route('penapis.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-i', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianii()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianii'), 'name' => "Bahagian II"],
        ];

        $kembali = route('penapis.bahagiani');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-ii', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianii2()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianii'), 'name' => "Bahagian II"],
        ];

        $kembali = route('penapis.bahagiani');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangBuah.penapis-bahagian-ii2', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianiii'), 'name' => "Bahagian III"],
        ];

        $kembali = route('penapis.bahagianii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-iii', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianiva()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianiva'), 'name' => "Bahagian IV(a)"],
        ];

        $kembali = route('penapis.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-iva', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianivb()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianivb'), 'name' => "Bahagian IV(b)"],
        ];

        $kembali = route('penapis.bahagianiva');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-ivb', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianva()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianva'), 'name' => "Bahagian V(a)"],
        ];

        $kembali = route('penapis.bahagianivb');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-va', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianvb()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianvb'), 'name' => "Bahagian V(b)"],
        ];

        $kembali = route('penapis.bahagianva');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-vb', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianvi()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianvi'), 'name' => "Bahagian VI"],
        ];

        $kembali = route('penapis.bahagianvb');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-vi', compact('returnArr', 'layout'));
    }

    public function penapis_bahagianvii()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianvii'), 'name' => "Bahagian VII"],
        ];

        $kembali = route('penapis.bahagianvi');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-bahagian-vii', compact('returnArr', 'layout'));
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
