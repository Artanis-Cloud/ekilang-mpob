<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\E104B;
use App\Models\E104Init;
use App\Models\EBioB;
use App\Models\EBioInit;
use App\Models\Hari;
use App\Models\Pelesen;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class KilangBiodieselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function bio_maklumatasaspelesen()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        // $pelesen = E91Init::get();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $pelesen2 = DB::connection('mysql2')->select("SELECT * FROM profile_bulanan
                                                        WHERE no_lesen = $pelesen->e_nl ");
        dd($pelesen2);
        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();


        //dd($pelesen);




        return view('users.KilangBiodiesel.bio-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen'));
    }

    // public function bio_update_maklumat_asas_pelesen(Request $request, $id)
    // {
    //     // dd($request->all());
    //     $penyata = Pelesen::findOrFail($id);
    //     $penyata->e_ap1 = $request->e_ap1;
    //     $penyata->e_ap2 = $request->e_ap2;
    //     $penyata->e_ap3 = $request->e_ap3;
    //     $penyata->e_as1 = $request->e_as1;
    //     $penyata->e_as2 = $request->e_as2;
    //     $penyata->e_as3 = $request->e_as3;
    //     $penyata->e_notel = $request->e_notel;
    //     $penyata->e_nofax = $request->e_nofax;
    //     $penyata->e_email = $request->e_email;
    //     $penyata->e_npg = $request->e_npg;
    //     $penyata->e_jpg = $request->e_jpg;
    //     // $penyata->e_notelpg = $request->e_notelpg;
    //     $penyata->e_npgtg = $request->e_npgtg;
    //     $penyata->e_jpgtg = $request->e_jpgtg;
    //     $penyata->e_email_pengurus = $request->e_email_pengurus;
    //     $penyata->save();


    //     return redirect()->route('bio.maklumatasaspelesen')
    //         ->with('success', 'Maklumat telah dikemaskini');
    // }

    public function bio_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-tukar-password', compact('returnArr', 'layout'));
    }

    public function bio_bahagiania()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagiania'), 'name' => "Bahagian I(a)"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // $user = DB::connection('mysql2')->select("SELECT * FROM profile_bulanan");


        $produk = Produk::where('prodcat', 01)->orderBy('prodname')->get();

        $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->get();

        // dd($penyata);
        return view('users.KilangBiodiesel.bio-bahagian-ia', compact('returnArr', 'layout', 'produk','penyata'));
    }

    public function bio_add_bahagian_ia(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ia($request->all())->validate();
        $this->store_bahagian_ia($request->all());

        return redirect()->route('bio.bahagiania')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ia(array $data)
    {
        return Validator::make($data, [

            'ebio_b4' => ['required', 'string'],
            'ebio_b5' => ['required', 'string'],
            'ebio_b6' => ['required', 'string'],
            'ebio_b7' => ['required', 'string'],
            'ebio_b8' => ['required', 'string'],
            'ebio_b9' => ['required', 'string'],
            'ebio_b10' => ['required', 'string'],
            'ebio_b11' => ['required', 'string'],
            'ebio_b12' => ['required', 'string'],
            // 'ebio_b13' => ['required', 'string'],

            // 'e104_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ia(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($e104_reg);
        return EBioB::create([
            'ebio_reg' => $ebio_reg->ebio_reg,
            'ebio_b3' => '1',
            'ebio_b4' => $data['ebio_b4'],
            'ebio_b5' => $data['ebio_b5'],
            'ebio_b6' => $data['ebio_b6'],
            'ebio_b7' => $data['ebio_b7'],
            'ebio_b8' => $data['ebio_b8'],
            'ebio_b9' => $data['ebio_b9'],
            'ebio_b10' => $data['ebio_b10'],
            'ebio_b11' => $data['ebio_b11'],
            'ebio_b12' => $data['ebio_b12'],
            // 'ebio_b13' => $data['ebio_b13'],

            // 'e101_b15' => $data['e104_b15'],
        ]);
        // return $data;
        // dd($data);
    }

    public function bio_edit_bahagian_ia(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->ebio_b4)->first();

        // dd($request->all());
        $penyata = EBioB::findOrFail($id);
        $penyata->ebio_b4 = $produk->prodid;
        $penyata->ebio_b5 = $request->ebio_b5;
        $penyata->ebio_b6 = $request->ebio_b6;
        $penyata->ebio_b7 = $request->ebio_b7;
        $penyata->ebio_b8 = $request->ebio_b8;
        $penyata->ebio_b9 = $request->ebio_b9;
        $penyata->ebio_b10 = $request->ebio_b10;
        $penyata->ebio_b11 = $request->ebio_b11;
        $penyata->ebio_b12 = $request->ebio_b12;
        // $penyata->ebio_b13 = $request->ebio_b13;
        $penyata->save();


        return redirect()->route('bio.bahagiania')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function bio_bahagianib()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianib'), 'name' => "Bahagian I(b)"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');



        $produk = Produk::where('prodcat', 02)->orderBy('prodname')->get();

        $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3','2')->get();
// dd($penyata);
        return view('users.KilangBiodiesel.bio-bahagian-ib', compact('returnArr', 'layout', 'produk', 'user','penyata'));
    }

    public function bio_add_bahagian_ib(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ib($request->all())->validate();
        $this->store_bahagian_ib($request->all());

        return redirect()->route('bio.bahagianib')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ib(array $data)
    {
        return Validator::make($data, [

            'ebio_b4' => ['required', 'string'],
            'ebio_b5' => ['required', 'string'],
            'ebio_b6' => ['required', 'string'],
            'ebio_b7' => ['required', 'string'],
            'ebio_b8' => ['required', 'string'],
            'ebio_b9' => ['required', 'string'],
            'ebio_b10' => ['required', 'string'],
            'ebio_b11' => ['required', 'string'],
            'ebio_b12' => ['required', 'string'],

            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ib(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($ebio_reg);
        return EBioB::create([
            'ebio_reg' => $ebio_reg->ebio_reg,
            'ebio_b3' => '2',
            'ebio_b4' => $data['ebio_b4'],
            'ebio_b5' => $data['ebio_b5'],
            'ebio_b6' => $data['ebio_b6'],
            'ebio_b7' => $data['ebio_b7'],
            'ebio_b8' => $data['ebio_b8'],
            'ebio_b9' => $data['ebio_b9'],
            'ebio_b10' => $data['ebio_b10'],
            'ebio_b11' => $data['ebio_b11'],
            'ebio_b12' => $data['ebio_b12'],

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


    public function bio_edit_bahagian_ib(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->ebio_b4)->first();

        // dd($request->all());
        $penyata = EBioB::findOrFail($id);
        $penyata->ebio_b4 = $produk->prodid;
        $penyata->ebio_b5 = $request->ebio_b5;
        $penyata->ebio_b6 = $request->ebio_b6;
        $penyata->ebio_b7 = $request->ebio_b7;
        $penyata->ebio_b8 = $request->ebio_b8;
        $penyata->ebio_b9 = $request->ebio_b9;
        $penyata->ebio_b10 = $request->ebio_b10;
        $penyata->ebio_b11 = $request->ebio_b11;
        $penyata->ebio_b12 = $request->ebio_b12;
        $penyata->save();


        return redirect()->route('bio.bahagianib')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function bio_bahagianic()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianic'), 'name' => "Bahagian I(c)"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');


        $produk = Produk::where('prodcat', '08')->orderBy('prodname')->get();


        $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3','3')->get();

        return view('users.KilangBiodiesel.bio-bahagian-ic', compact('returnArr', 'layout','user','produk','penyata'));
    }

    public function bio_add_bahagian_ic(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ic($request->all())->validate();
        $this->store_bahagian_ic($request->all());

        return redirect()->route('bio.bahagianic')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ic(array $data)
    {
        return Validator::make($data, [

            'ebio_b4' => ['required', 'string'],
            'ebio_b5' => ['required', 'string'],
            'ebio_b6' => ['required', 'string'],
            'ebio_b7' => ['required', 'string'],
            'ebio_b8' => ['required', 'string'],
            'ebio_b9' => ['required', 'string'],
            'ebio_b10' => ['required', 'string'],
            'ebio_b11' => ['required', 'string'],
            'ebio_b12' => ['required', 'string'],

            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ic(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($ebio_reg);
        return EBioB::create([
            'ebio_reg' => $ebio_reg->ebio_reg,
            'ebio_b3' => '3',
            'ebio_b4' => $data['ebio_b4'],
            'ebio_b5' => $data['ebio_b5'],
            'ebio_b6' => $data['ebio_b6'],
            'ebio_b7' => $data['ebio_b7'],
            'ebio_b8' => $data['ebio_b8'],
            'ebio_b9' => $data['ebio_b9'],
            'ebio_b10' => $data['ebio_b10'],
            'ebio_b11' => $data['ebio_b11'],
            'ebio_b12' => $data['ebio_b12'],

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


    public function bio_edit_bahagian_ic(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->ebio_b4)->first();

        // dd($request->all());
        $penyata = EBioB::findOrFail($id);
        $penyata->ebio_b4 = $produk->prodid;
        $penyata->ebio_b5 = $request->ebio_b5;
        $penyata->ebio_b6 = $request->ebio_b6;
        $penyata->ebio_b7 = $request->ebio_b7;
        $penyata->ebio_b8 = $request->ebio_b8;
        $penyata->ebio_b9 = $request->ebio_b9;
        $penyata->ebio_b10 = $request->ebio_b10;
        $penyata->ebio_b11 = $request->ebio_b11;
        $penyata->ebio_b12 = $request->ebio_b12;
        $penyata->save();


        return redirect()->route('bio.bahagianic')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function bio_bahagianii()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianii'), 'name' => "Bahagian II"],
        ];

        $kembali = route('bio.bahagianic');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $penyata = Hari::where('lesen', auth()->user()->username)->first();


        return view('users.KilangBiodiesel.bio-bahagian-ii', compact('returnArr', 'layout','penyata'));
    }

    public function bio_add_bahagian_ii(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ii($request->all())->validate();
        $this->store_bahagian_ii($request->all());

        return redirect()->route('bio.bahagianiii')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ii(array $data)
    {
        return Validator::make($data, [
            'hari_operasi' => ['required', 'string'],
            'kapasiti' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ii(array $data)
    {
        $pelesen = User::where('username', auth()->user()->username)->first('username');

        // dd($e101_reg->e101_reg);
        return Hari::create([
            'lesen' => $pelesen->username,
            'tahun' => date("Y"),
            'bulan' => date("m"),
            'hari_operasi' => $data['hari_operasi'],
            'kapasiti' => $data['kapasiti'],

        ]);





        // return $data;
        // dd($data);
    }



    public function bio_edit_bahagian_ii(Request $request, $id)
    {
        // $produk = Produk::where('prodname', $request->e07bt_produk)->first();
        // dd($produk);
        // $prodcat2 = ProdCat2::where('catname', $request->e101_b5)->first();

        $pelesen = User::where('username', auth()->user()->username)->first('username');

        // dd($request->all());
        $penyata = Hari::findOrFail($id);
        $penyata->lesen = $pelesen->username;
        $penyata->hari_operasi = $request->hari_operasi;
        $penyata->kapasiti = $request->kapasiti;
        $penyata->save();


        return redirect()->route('bio.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function bio_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianiii'), 'name' => "Bahagian III"],
        ];

        $kembali = route('bio.bahagianii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-bahagian-iii', compact('returnArr', 'layout'));
    }

    public function bio_bahagianiv()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.bahagianiv'), 'name' => "Bahagian IV"],
        ];

        $kembali = route('bio.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-bahagian-iv', compact('returnArr', 'layout'));
    }




    public function bio_paparpenyata()
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
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-papar-penyata', compact('layout'));
    }

    public function bio_email()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-email', compact('returnArr', 'layout'));
    }


    public function bio_penyatadahulu()
    {

        $breadcrumbs    = [
            ['link' => route('bio.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('bio.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';



        return view('users.KilangBiodiesel.bio-penyata-dahulu', compact('returnArr', 'layout'));
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
