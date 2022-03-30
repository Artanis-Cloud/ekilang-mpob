<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\E104B;
use App\Models\E104Init;
use App\Models\EBioB;
use App\Models\EBioC;
use App\Models\EBioInit;
use App\Models\Ekmessage;
use App\Models\Hari;
use App\Models\Pelesen;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProfileBulanan;
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

        // $pelesen = E91Init::get();dasfsds
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        $pelesen2 = ProfileBulanan::where('no_lesen', $pelesen->e_nl)->where('bulan', '8')->where('tahun', '2012')->first();
        // dd($pelesen2->alamat_premis);
        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();


        //dd($pelesen);




        return view('users.KilangBiodiesel.bio-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen', 'pelesen2'));
    }

    public function bio_update_maklumat_asas_pelesen(Request $request, $id)
    {
        // dd($request->all());
        $penyata = Pelesen::findOrFail($id);
        $penyata->e_nlkppk = $request->e_nlkppk;
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
        $penyata->e_notel_pg = $request->e_notel_pg;
        $penyata->e_email_pg = $request->e_email_pg;
        $penyata->e_npgtg = $request->e_npgtg;
        $penyata->e_jpgtg = $request->e_jpgtg;
        $penyata->e_email_pengurus = $request->e_email_pengurus;
        $penyata->save();


        return redirect()->route('bio.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');
    }

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


        $produk = Produk::where('prodcat', '01')->orderBy('prodname')->get();

        if ($user) {
            $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '=', '01');
            })->get();
        } else {
            $penyata = [];
        }

        $totaliab5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b5');
        $totaliab6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b6');
        $totaliab7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b7');
        $totaliab8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b8');
        $totaliab9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b9');
        $totaliab10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b10');
        $totaliab11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b11');
        // $totaliab12 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b12');
        // dd($totalia);

        // dd($penyata);
        return view('users.KilangBiodiesel.bio-bahagian-ia', compact(
            'returnArr',
            'layout',
            'produk',
            'penyata',
            'totaliab5',
            'totaliab6',
            'totaliab7',
            'totaliab8',
            'totaliab9',
            'totaliab10',
            'totaliab11'
        ));
    }

    public function bio_add_bahagian_ia(Request $request)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first();

        $penyata = EBioB::where('ebio_reg', $ebio_reg->ebio_reg)
            ->where('ebio_b3', '1')
            ->where('ebio_b4', $request->ebio_b4)
            // ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('bio.bahagiania')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_ia($request->all())->validate();
            $this->store_bahagian_ia($request->all());

            return redirect()->route('bio.bahagiania')->with('success', 'Maklumat sudah ditambah');
        }
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
            // 'ebio_b12' => ['required', 'string'],
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
            // 'ebio_b12' => $data['ebio_b12'],
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
        // $penyata->ebio_b12 = $request->ebio_b12;
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
        if ($user) {
            $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->get();
        } else {
            $penyata = [];
        }

        $totalibb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b5');
        $totalibb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b6');
        $totalibb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b7');
        $totalibb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b8');
        $totalibb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b9');
        $totalibb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b10');
        $totalibb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b11');
        // $totalibb12 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b12');
        // dd($penyata);
        return view('users.KilangBiodiesel.bio-bahagian-ib', compact(
            'returnArr',
            'layout',
            'produk',
            'user',
            'penyata',
            'totalibb5',
            'totalibb6',
            'totalibb7',
            'totalibb8',
            'totalibb9',
            'totalibb10',
            'totalibb11',
        ));
    }

    public function bio_add_bahagian_ib(Request $request)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first();

        $penyata = EBioB::where('ebio_reg', $ebio_reg->ebio_reg)
            ->where('ebio_b3', '2')
            ->where('ebio_b4', $request->ebio_b4)
            // ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('bio.bahagianib')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_ib($request->all())->validate();
            $this->store_bahagian_ib($request->all());

            return redirect()->route('bio.bahagianib')->with('success', 'Maklumat sudah ditambah');
        }
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
            // 'ebio_b12' => ['required', 'string'],

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
            // 'ebio_b12' => $data['ebio_b12'],

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
        // $penyata->ebio_b12 = $request->ebio_b12;
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

        if ($user) {
            $penyata = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->get();
        } else {
            $penyata = [];
        }
        $totalicb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b5');
        $totalicb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b6');
        $totalicb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b7');
        $totalicb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b8');
        $totalicb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b9');
        $totalicb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b10');
        $totalicb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b11');
        // $totalicb12 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b12');

        return view('users.KilangBiodiesel.bio-bahagian-ic', compact(
            'returnArr',
            'layout',
            'user',
            'produk',
            'penyata',
            'totalicb5',
            'totalicb6',
            'totalicb7',
            'totalicb8',
            'totalicb9',
            'totalicb10',
            'totalicb11'
        ));
    }

    public function bio_add_bahagian_ic(Request $request)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first();

        $penyata = EBioB::where('ebio_reg', $ebio_reg->ebio_reg)
            ->where('ebio_b3', '3')
            ->where('ebio_b4', $request->ebio_b4)
            // ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('bio.bahagianic')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_ic($request->all())->validate();
            $this->store_bahagian_ic($request->all());

            return redirect()->route('bio.bahagianic')->with('success', 'Maklumat sudah ditambah');
        }
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
            // 'ebio_b12' => ['required', 'string'],

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
            // 'ebio_b12' => $data['ebio_b12'],

            // 'e101_b15' => $data['e104_b15'],
        ]);
        // return $data;
        // dd($data);
    }

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
        // $penyata->ebio_b12 = $request->ebio_b12;
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


        return view('users.KilangBiodiesel.bio-bahagian-ii', compact('returnArr', 'layout', 'penyata'));
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

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');

        $produk = Produk::where('prodcat', 02)->orderBy('prodname')->get();
        if ($user) {
            $penyata = EBioC::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->get();
        } else {
            $penyata = [];
        }

        $totaliiic4 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c4');
        $totaliiic5 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c5');
        $totaliiic6 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c6');
        $totaliiic7 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c7');
        $totaliiic8 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c8');
        $totaliiic9 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c9');
        $totaliiic10 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c10');

        return view('users.KilangBiodiesel.bio-bahagian-iii', compact(
            'returnArr',
            'layout',
            'user',
            'produk',
            'penyata',
            'totaliiic4',
            'totaliiic5',
            'totaliiic6',
            'totaliiic7',
            'totaliiic8',
            'totaliiic9',
            'totaliiic10',
        ));
    }

    public function bio_add_bahagian_iii(Request $request)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first();

        $penyata = EBioC::where('ebio_reg', $ebio_reg->ebio_reg)
            ->where('ebio_c3', $request->ebio_c3)
            // ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('bio.bahagianiii')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_iii($request->all())->validate();
            $this->store_bahagian_iii($request->all());

            return redirect()->route('bio.bahagianiii')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_iii(array $data)
    {
        return Validator::make($data, [

            'ebio_c4' => ['required', 'string'],
            'ebio_c5' => ['required', 'string'],
            'ebio_c6' => ['required', 'string'],
            'ebio_c7' => ['required', 'string'],
            'ebio_c8' => ['required', 'string'],
            'ebio_c9' => ['required', 'string'],
            'ebio_c10' => ['required', 'string'],
            // 'ebio_c12' => ['required', 'string'],

            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_iii(array $data)
    {
        $ebio_reg = EBioInit::where('ebio_nl', auth()->user()->username)->first('ebio_reg');
        // dd($ebio_reg);
        return EBioC::create([
            'ebio_reg' => $ebio_reg->ebio_reg,
            'ebio_c3' => $data['ebio_c3'],
            'ebio_c4' => $data['ebio_c4'],
            'ebio_c5' => $data['ebio_c5'],
            'ebio_c6' => $data['ebio_c6'],
            'ebio_c7' => $data['ebio_c7'],
            'ebio_c8' => $data['ebio_c8'],
            'ebio_c9' => $data['ebio_c9'],
            'ebio_c10' => $data['ebio_c10'],
            // 'ebio_c12' => $data['ebio_b12'],

            // 'e101_b15' => $data['e104_b15'],
        ]);
        // return $data;
        // dd($data);
    }

    public function bio_edit_bahagian_iii(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->ebio_c3)->first();

        // dd($request->all());
        $penyata = EBioC::findOrFail($id);
        $penyata->ebio_c3 = $produk->prodid;
        $penyata->ebio_c4 = $request->ebio_c4;
        $penyata->ebio_c5 = $request->ebio_c5;
        $penyata->ebio_c6 = $request->ebio_c6;
        $penyata->ebio_c7 = $request->ebio_c7;
        $penyata->ebio_c8 = $request->ebio_c8;
        $penyata->ebio_c9 = $request->ebio_c9;
        $penyata->ebio_c10 = $request->ebio_c10;
        // $penyata->ebio_c12 = $request->ebio_c12;
        $penyata->save();


        return redirect()->route('bio.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
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

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('bio.bahagianiii');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        $pelesen2 = ProfileBulanan::where('no_lesen', $pelesen->e_nl)->where('bulan', '8')->where('tahun', '2012')->first();

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first();
        // dd($user);

        $ia = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '01');
        })->get();


        $ib = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->get();
        // dd($ii);

        $ic = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->get();
        // dd($ic);

        $ii = Hari::where('lesen', auth()->user()->username)->first();

        $iii = EBioC::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->get();

        $totaliab5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b5');
        $totaliab6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b6');
        $totaliab7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b7');
        $totaliab8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b8');
        $totaliab9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b9');
        $totaliab10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b10');
        $totaliab11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b11');

        $totalibb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b5');
        $totalibb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b6');
        $totalibb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b7');
        $totalibb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b8');
        $totalibb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b9');
        $totalibb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b10');
        $totalibb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b11');

        $totalicb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b5');
        $totalicb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b6');
        $totalicb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b7');
        $totalicb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b8');
        $totalicb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b9');
        $totalicb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b10');
        $totalicb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b11');

        $totaliiic4 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c4');
        $totaliiic5 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c5');
        $totaliiic6 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c6');
        $totaliiic7 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c7');
        $totaliiic8 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c8');
        $totaliiic9 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c9');
        $totaliiic10 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c10');

        return view('users.KilangBiodiesel.bio-papar-penyata', compact(
            'layout',
            'returnArr',
            'pelesen',
            'pelesen2',
            'user',
            'ia',
            'ib',
            'ic',
            'ii',
            'iii',
            'totaliab5',
            'totaliab6',
            'totaliab7',
            'totaliab8',
            'totaliab9',
            'totaliab10',
            'totaliab11',
            'totalibb5',
            'totalibb6',
            'totalibb7',
            'totalibb8',
            'totalibb9',
            'totalibb10',
            'totalibb11',
            'totalicb5',
            'totalicb6',
            'totalicb7',
            'totalicb8',
            'totalicb9',
            'totalicb10',
            'totalicb11',
            'totaliiic4',
            'totaliiic5',
            'totaliiic6',
            'totaliiic7',
            'totaliiic8',
            'totaliiic9',
            'totaliiic10',
            'bulan',
            'tahun'
        ));
    }



    public function bio_hantar_penyata()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('bio.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbio';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        $pelesen2 = ProfileBulanan::where('no_lesen', $pelesen->e_nl)->where('bulan', '8')->where('tahun', '2012')->first();

        $user = EBioInit::where('ebio_nl', auth()->user()->username)->first();
        // dd($user);

        $ia = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '01');
        })->get();


        $ib = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->get();
        // dd($ii);

        $ic = EBioB::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->get();
        // dd($ic);

        $ii = Hari::where('lesen', auth()->user()->username)->first();

        $iii = EBioC::with('ebioinit', 'produk')->where('ebio_reg', $user->ebio_reg)->get();

        $totaliab5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b5');
        $totaliab6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b6');
        $totaliab7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b7');
        $totaliab8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b8');
        $totaliab9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b9');
        $totaliab10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b10');
        $totaliab11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '1')->sum('ebio_b11');

        $totalibb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b5');
        $totalibb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b6');
        $totalibb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b7');
        $totalibb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b8');
        $totalibb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b9');
        $totalibb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b10');
        $totalibb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '2')->sum('ebio_b11');

        $totalicb5 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b5');
        $totalicb6 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b6');
        $totalicb7 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b7');
        $totalicb8 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b8');
        $totalicb9 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b9');
        $totalicb10 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b10');
        $totalicb11 = DB::table("e_bio_b_s")->where('ebio_reg', $user->ebio_reg)->where('ebio_b3', '3')->sum('ebio_b11');

        $totaliiic4 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c4');
        $totaliiic5 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c5');
        $totaliiic6 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c6');
        $totaliiic7 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c7');
        $totaliiic8 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c8');
        $totaliiic9 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c9');
        $totaliiic10 = DB::table("e_bio_c_s")->where('ebio_reg', $user->ebio_reg)->sum('ebio_c10');

        return view('users.KilangBiodiesel.bio-hantar-penyata', compact(
            'layout',
            'returnArr',
            'pelesen',
            'pelesen2',
            'user',
            'ia',
            'ib',
            'ic',
            'ii',
            'iii',
            'totaliab5',
            'totaliab6',
            'totaliab7',
            'totaliab8',
            'totaliab9',
            'totaliab10',
            'totaliab11',
            'totalibb5',
            'totalibb6',
            'totalibb7',
            'totalibb8',
            'totalibb9',
            'totalibb10',
            'totalibb11',
            'totalicb5',
            'totalicb6',
            'totalicb7',
            'totalicb8',
            'totalicb9',
            'totalicb10',
            'totalicb11',
            'totaliiic4',
            'totaliiic5',
            'totaliiic6',
            'totaliiic7',
            'totaliiic8',
            'totaliiic9',
            'totaliiic10',
            'bulan',
            'tahun'
        ));
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

    public function bio_send_email_proses(Request $request)
    {
        // dd($request->all());
        $this->validation_send_email($request->all())->validate();
        $this->store_send_email($request->all());


        return redirect()->back()->with('success', 'Emel sudah dihantar');
    }

    protected function validation_send_email(array $data)
    {
        return Validator::make($data, [
            // 'Id' => ['required', 'string'],
            'TypeOfEmail' => ['required', 'string'],
            'FromEmail' => ['required', 'string'],
            'Subject' => ['required', 'string'],
            'Message' => ['required', 'string'],
        ]);
    }

    protected function store_send_email(array $data)
    {

        // $user = User::where('e_nl', auth()->user()->username)->first();

        return Ekmessage::create([
            // 'Id' => $data['Id'],
            'Date' => date("Y-m-d H:i:s"),
            'FromName' => auth()->user()->name,
            'FromLicense' => auth()->user()->username,
            'TypeOfEmail' => $data['TypeOfEmail'],
            'FromEmail' => $data['FromEmail'],
            'Category' => auth()->user()->category,
            'Subject' => $data['Subject'],
            'Message' => $data['Message'],

        ]);
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

    public function try()
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



        return view('users.KilangBiodiesel.try', compact('returnArr', 'layout'));
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
