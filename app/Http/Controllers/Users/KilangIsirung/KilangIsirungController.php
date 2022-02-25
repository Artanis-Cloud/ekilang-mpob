<?php

namespace App\Http\Controllers\Users\KilangIsirung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelesen;
use App\Models\E102Init;
use App\Models\E102b;
use DB;


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
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();


        //dd($pelesen);




        return view('users.KilangIsirung.isirung-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen'));
    }

    public function isirung_update_maklumat_asas_pelesen(Request $request, $id)
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


        return redirect()->route('isirung.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');

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
        $penyata = E102Init::where('e102_nl', auth()->user()->username)->first();


        return view('users.KilangIsirung.isirung-bahagian-i', compact('returnArr', 'layout', 'penyata'));
    }

    public function isirung_update_bahagian_i(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E102Init::findOrFail($id);
        $penyata->e102_aa1 = $request->e102_aa1;
        $penyata->e102_aa2 = $request->e102_aa2;
        $penyata->e102_aa3 = $request->e102_aa3;
        $penyata->e102_ab1 = $request->e102_ab1;
        $penyata->e102_ab2 = $request->e102_ab2;
        $penyata->e102_ab3 = $request->e102_ab3;
        $penyata->e102_ac1 = $request->e102_ac1;
        $penyata->e102_ac2 = $request->e102_ac2;
        $penyata->e102_ac3 = $request->e102_ac3;
        $penyata->e102_ad1 = $request->e102_ad1;
        $penyata->e102_ad2 = $request->e102_ad2;
        $penyata->e102_ad3 = $request->e102_ad3;
        $penyata->e102_ae1 = $request->e102_ae1;
        $penyata->e102_af2 = $request->e102_af2;
        $penyata->e102_af3 = $request->e102_af3;
        $penyata->e102_ag1 = $request->e102_ag1;
        $penyata->e102_ag2 = $request->e102_ag2;
        $penyata->e102_ag3 = $request->e102_ag3;
        $penyata->e102_ah1 = $request->e102_ah1;
        $penyata->e102_ah2 = $request->e102_ah2;
        $penyata->e102_ah3 = $request->e102_ah3;
        $penyata->e102_ai1 = $request->e102_ai1;
        $penyata->e102_ai2 = $request->e102_ai2;
        $penyata->e102_ai3 = $request->e102_ai3;
        $penyata->e102_aj1 = $request->e102_aj1;
        $penyata->e102_aj2 = $request->e102_aj2;
        $penyata->e102_aj3 = $request->e102_aj3;
        $penyata->e102_ak1 = $request->e102_ak1;
        $penyata->e102_ak2 = $request->e102_ak2;
        $penyata->e102_ak3 = $request->e102_ak3;
        $penyata->save();


        return redirect()->route('isirung.bahagianii')
            ->with('success', 'Maklumat telah disimpan');

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
        $penyata = E102Init::where('e102_nl', auth()->user()->username)->first();


        return view('users.KilangIsirung.isirung-bahagian-ii', compact('returnArr', 'layout', 'penyata'));
    }

    public function isirung_update_bahagian_ii(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E102Init::findOrFail($id);
        $penyata->e102_al1 = $request->e102_al1;
        $penyata->e102_al2 = $request->e102_al2;
        $penyata->e102_al3 = $request->e102_al3;
        $penyata->e102_al4 = $request->e102_al4;

        $penyata->save();


        return redirect()->route('isirung.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');

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



    public function isirung_bahagianiii(Request $request)
    {

        $belian = E102b::where('belian', $request->e102b_4);
        $dari =E102b::where('dari', $request->e102b_5);
        // dd($request->all());
        $users = DB::select("SELECT e.e102_b1, p.catname, c.catname, e.e102_b6
        FROM e102b e, kod_sl p, prod_cat2 c
        WHERE e.e102_b2 = '$request->e102b_5' and e.e102_b3 = '51'
        and e.e102_b4 = p.catid and e.e102_b5 = c.catid
        order by p.catname, c.catname");


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


        return view('users.KilangIsirung.isirung-bahagian-iii', compact( 'returnArr', 'layout', 'belian', 'dari',  'users'));
    }

    public function isirung_update_bahagian_iii(Request $request, $id)
    {

        $belian = E102b::where('belian', $request->e102b_4);
        $dari =E102b::where('dari', $request->e102b_5);
        // dd($request->all());
        $users = DB::select("SELECT e.e102_b1, p.catname, c.catname, e.e102_b6
        FROM e102b e, kod_sl p, prod_cat2 c
        WHERE e.e102_b2 = $noreg and e.e102_b3 = '51'
        and e.e102_b4 = p.catid and e.e102_b5 = c.catid
        order by p.catname, c.catname");

        return view('users.KilangIsirung.isirung-bahagian-iii', compact( 'returnArr', 'layout', 'belian', 'dari',  'users'));

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
