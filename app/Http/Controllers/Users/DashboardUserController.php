<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\E07Init;
use App\Models\EBioInit;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use DB;

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
        $now = date('Y-m-d');

        $pengumuman2 = Pengumuman::where('Start_date', '<=', $now)->where('End_date', '>=', $now)->get();
        // $data = htmlspecialchars($pengumuman);
        // echo $data;
        // $data = array(
        //     'messages' => $pengumuman->message
        //     );
            // dd($pengumuman2);
        return view('users.KilangBuah.buah-dashboard', compact('penyata91', 'pengumuman2', 'now'));
    }

    public function penapis_dashboard()
    {
        $now = date('Y-m-d');

        $pengumuman2 = Pengumuman::where('Start_date', '<=', $now)->where('End_date', '>=', $now)->get();
        return view('users.KilangPenapis.penapis-dashboard', compact( 'pengumuman2', 'now'));
    }

    public function isirung_dashboard()
    {
        $now = date('Y-m-d');

        $pengumuman2 = Pengumuman::where('Start_date', '<=', $now)->where('End_date', '>=', $now)->get();
        return view('users.KilangIsirung.isirung-dashboard', compact( 'pengumuman2', 'now'));
    }

    public function oleo_dashboard()
    {
        $now = date('Y-m-d');

        $pengumuman2 = Pengumuman::where('Start_date', '<=', $now)->where('End_date', '>=', $now)->get();
        return view('users.KilangOleokimia.oleo-dashboard', compact( 'pengumuman2', 'now'));
    }

    public function pusatsimpan_dashboard()
    {
        $now = date('Y-m-d');

        $pengumuman2 = Pengumuman::where('Start_date', '<=', $now)->where('End_date', '>=', $now)->get();
        return view('users.PusatSimpanan.pusatsimpan-dashboard', compact( 'pengumuman2', 'now'));
    }

    public function biodiesel_dashboard()
    {
        $now = date('Y-m-d');

        $pengumuman2 = Pengumuman::where('Start_date', '<=', $now)->where('End_date', '>=', $now)->get();
        return view('users.KilangBiodiesel.bio-dashboard', compact( 'pengumuman2', 'now'));
    }

    public function penapis_oleo_dashboard()
    {
        // $now = date('Y-m-d');

        // $pengumuman2 = Pengumuman::where('Start_date', '<=', $now)->where('End_date', '>=', $now)->get();
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
