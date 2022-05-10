<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\E07Init;
use App\Models\EBioInit;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function layout()
    {
        $penyata91 = E91Init::get();
        $penyata101 = E101Init::get();
        $penyata102 = E102Init::get();
        $penyata104 =E07Init::get();
        $penyataBIO = EBioInit::get(); E104Init::get();
       

        return view('layouts.main', compact('penyata91','penyata101','penyata102','penyata104','penyata111','penyataBIO'));
    }

    public function buah_dashboard()
    {
        $penyata91 = E91Init::get();
        return view('users.KilangBuah.buah-dashboard', compact('penyata91'));
    }

    public function penapis_dashboard()
    {
        return view('users.KilangPenapis.penapis-dashboard');
    }

    public function isirung_dashboard()
    {
        return view('users.KilangIsirung.isirung-dashboard');
    }

    public function oleo_dashboard()
    {
        return view('users.KilangOleokimia.oleo-dashboard');
    }

    public function pusatsimpan_dashboard()
    {
        return view('users.PusatSimpanan.pusatsimpan-dashboard');
    }

    public function biodiesel_dashboard()
    {
        return view('users.KilangBiodiesel.bio-dashboard');
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
