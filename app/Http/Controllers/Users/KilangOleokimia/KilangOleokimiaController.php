<?php

namespace App\Http\Controllers\Users\KilangOleokimia;

use App\Http\Controllers\Controller;
use App\Models\E104B;
use App\Models\E104Init;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Validator;


class KilangOleokimiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function oleo_maklumatasaspelesen()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        // $pelesen = E91Init::get();

        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();


        //dd($pelesen);




        return view('users.KilangOleokimia.oleo-maklumat-asas-pelesen', compact('returnArr', 'layout'));
    }

    public function oleo_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-tukar-password', compact('returnArr', 'layout'));
    }

    public function oleo_bahagiania()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagiania'), 'name' => "Bahagian Ia"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');


        $produk = Produk::where('prodcat', 01)->orderBy('prodname')->get();


        $penyata = E104B::with('e104init', 'produk')->where('e104_reg', $user->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->get();
        // dd($penyata);
        return view('users.KilangOleokimia.oleo-bahagian-ia', compact('returnArr', 'layout','produk', 'penyata', 'user'));
    }

    public function oleo_add_bahagian_ia(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ia($request->all())->validate();
        $this->store_bahagian_ia($request->all());

        return redirect()->route('oleo.bahagiania')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ia(array $data)
    {
        return Validator::make($data, [

            'e104_b4' => ['required', 'string'],
            'e104_b5' => ['required', 'string'],
            'e104_b6' => ['required', 'string'],
            'e104_b7' => ['required', 'string'],
            'e104_b8' => ['required', 'string'],
            'e104_b9' => ['required', 'string'],
            'e104_b10' => ['required', 'string'],
            'e104_b11' => ['required', 'string'],
            'e104_b12' => ['required', 'string'],
            'e104_b13' => ['required', 'string'],

            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ia(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e101_reg->e101_reg);
        return E104B::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_b3' => '1',
            'e104_b4' => $data['e104_b4'],
            'e104_b5' => $data['e104_b5'],
            'e104_b6' => $data['e104_b6'],
            'e104_b7' => $data['e104_b7'],
            'e101_b8' => $data['e104_b8'],
            'e104_b9' => $data['e104_b9'],
            'e104_b10' => $data['e104_b10'],
            'e104_b11' => $data['e104_b11'],
            'e104_b12' => $data['e104_b12'],
            'e104_b13' => $data['e104_b13'],

            // 'e101_b15' => $data['e104_b15'],
        ]);
        // return $data;
        // dd($data);
    }

    // public function destroy(E101B $penyata)
    // {
    //     $penyata->delete();

    //     return redirect()->route('penapis.bahagiani')
    //                     ->with('success','Product deleted successfully');
    // }


    public function oleo_edit_bahagian_ia(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->e104_b4)->first();

        // dd($request->all());
        $penyata = E104B::findOrFail($id);
        $penyata->e104_b4 = $produk->prodid;
        $penyata->e104_b5 = $request->e104_b5;
        $penyata->e104_b6 = $request->e104_b6;
        $penyata->e104_b7 = $request->e104_b7;
        $penyata->e104_b9 = $request->e104_b9;
        $penyata->e104_b10 = $request->e104_b10;
        $penyata->e104_b11 = $request->e104_b11;
        $penyata->e104_b12 = $request->e104_b12;
        $penyata->e104_b13 = $request->e104_b13;
        $penyata->save();


        return redirect()->route('oleo.bahagiania')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function oleo_bahagianib()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianib'), 'name' => "Bahagian Ib"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-bahagian-ib', compact('returnArr', 'layout'));
    }

    public function oleo_bahagianic()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianic'), 'name' => "Bahagian Ic"],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-bahagian-ic', compact('returnArr', 'layout'));
    }

    public function oleo_bahagianii()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianii'), 'name' => "Bahagian II"],
        ];

        $kembali = route('oleo.bahagianic');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-bahagian-ii', compact('returnArr', 'layout'));
    }


    public function oleo_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianiii'), 'name' => "Bahagian III"],
        ];

        $kembali = route('oleo.bahagianii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-bahagian-iii', compact('returnArr', 'layout'));
    }

    public function oleo_bahagianiv()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianiv'), 'name' => "Bahagian IV"],
        ];

        $kembali = route('oleo.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-bahagian-iv', compact('returnArr', 'layout'));
    }




    public function oleo_paparpenyata()
    {

        // $breadcrumbs    = [
        //     ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
        //     ['link' => route('oleo.paparpenyata'), 'name' => "Penyata Bulanan"],
        // ];

        // $kembali = route('oleo.bahagianvi');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-papar-penyata', compact('layout'));
    }

    public function oleo_email()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-email', compact('returnArr', 'layout'));
    }

    public function oleo_prestasioer()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.prestasioer'), 'name' => "Prestasi OER  "],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-prestasi-oer', compact('returnArr', 'layout'));
    }

    public function oleo_penyatadahulu()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('oleo.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';



        return view('users.KilangOleokimia.oleo-penyata-dahulu', compact('returnArr', 'layout'));
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
