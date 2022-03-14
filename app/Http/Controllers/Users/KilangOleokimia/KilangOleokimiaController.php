<?php

namespace App\Http\Controllers\Users\KilangOleokimia;

use App\Http\Controllers\Controller;
use App\Models\E104B;
use App\Models\E104C;
use App\Models\E104D;
use App\Models\E104Init;
use App\Models\Negara;
use App\Models\Pelesen;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
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
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();


        //dd($pelesen);




        return view('users.KilangOleokimia.oleo-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen'));
    }

    public function oleo_update_maklumat_asas_pelesen(Request $request, $id)
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


        return redirect()->route('oleo.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');
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
            // 'e104_b8' => ['required', 'string'],
            'e104_b9' => ['required', 'string'],
            'e104_b10' => ['required', 'string'],
            'e104_b11' => ['required', 'string'],
            'e104_b12' => ['required', 'string'],
            'e104_b13' => ['required', 'string'],

            // 'e104_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ia(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg);
        return E104B::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_b3' => '1',
            'e104_b4' => $data['e104_b4'],
            'e104_b5' => $data['e104_b5'],
            'e104_b6' => $data['e104_b6'],
            'e104_b7' => $data['e104_b7'],
            // 'e104_b8' => $data['e104_b8'],
            'e104_b9' => $data['e104_b9'],
            'e104_b10' => $data['e104_b10'],
            'e104_b11' => $data['e104_b11'],
            'e104_b12' => $data['e104_b12'],
            'e104_b13' => $data['e104_b13'],

            // 'e104_b15' => $data['e104_b15'],
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

        $kembali = route('oleo.bahagiania');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');


        $produk = Produk::where('prodcat', 02)->orderBy('prodname')->get();

        $penyata = E104B::with('e104init', 'produk')->where('e104_reg', $user->e104_reg)->where('e104_b3','2')->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->get();

        return view('users.KilangOleokimia.oleo-bahagian-ib', compact('returnArr', 'layout', 'produk', 'penyata', 'user'));
    }

    public function oleo_add_bahagian_ib(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ib($request->all())->validate();
        $this->store_bahagian_ib($request->all());

        return redirect()->route('oleo.bahagianib')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ib(array $data)
    {
        return Validator::make($data, [

            'e104_b4' => ['required', 'string'],
            'e104_b5' => ['required', 'string'],
            'e104_b6' => ['required', 'string'],
            'e104_b7' => ['required', 'string'],
            // 'e104_b8' => ['required', 'string'],
            'e104_b9' => ['required', 'string'],
            'e104_b10' => ['required', 'string'],
            'e104_b11' => ['required', 'string'],
            'e104_b12' => ['required', 'string'],
            'e104_b13' => ['required', 'string'],

            // 'e104_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ib(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg);
        return E104B::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_b3' => '2',
            'e104_b4' => $data['e104_b4'],
            'e104_b5' => $data['e104_b5'],
            'e104_b6' => $data['e104_b6'],
            'e104_b7' => $data['e104_b7'],
            // 'e104_b8' => $data['e104_b8'],
            'e104_b9' => $data['e104_b9'],
            'e104_b10' => $data['e104_b10'],
            'e104_b11' => $data['e104_b11'],
            'e104_b12' => $data['e104_b12'],
            'e104_b13' => $data['e104_b13'],

            // 'e104_b15' => $data['e104_b15'],
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


    public function oleo_edit_bahagian_ib(Request $request, $id)
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


        return redirect()->route('oleo.bahagianib')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function oleo_bahagianic()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.bahagianic'), 'name' => "Bahagian Ic"],
        ];

        $kembali = route('oleo.bahagianib');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');


        $produk = Produk::where('prodcat', '08')->orderBy('prodname')->get();

        $penyata = E104B::with('e104init', 'produk')->where('e104_reg', $user->e104_reg)->where('e104_b3','3')->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '08');
        })->get();

        return view('users.KilangOleokimia.oleo-bahagian-ic', compact('returnArr', 'layout', 'produk', 'penyata', 'user'));
    }

    public function oleo_add_bahagian_ic(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ic($request->all())->validate();
        $this->store_bahagian_ic($request->all());

        return redirect()->route('oleo.bahagianic')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ic(array $data)
    {
        return Validator::make($data, [

            'e104_b4' => ['required', 'string'],
            'e104_b5' => ['required', 'string'],
            'e104_b6' => ['required', 'string'],
            'e104_b7' => ['required', 'string'],
            // 'e104_b8' => ['required', 'string'],
            'e104_b9' => ['required', 'string'],
            'e104_b10' => ['required', 'string'],
            'e104_b11' => ['required', 'string'],
            'e104_b12' => ['required', 'string'],
            'e104_b13' => ['required', 'string'],

            // 'e104_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ic(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg);
        return E104B::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_b3' => '3',
            'e104_b4' => $data['e104_b4'],
            'e104_b5' => $data['e104_b5'],
            'e104_b6' => $data['e104_b6'],
            'e104_b7' => $data['e104_b7'],
            // 'e104_b8' => $data['e104_b8'],
            'e104_b9' => $data['e104_b9'],
            'e104_b10' => $data['e104_b10'],
            'e104_b11' => $data['e104_b11'],
            'e104_b12' => $data['e104_b12'],
            'e104_b13' => $data['e104_b13'],

            // 'e104_b15' => $data['e104_b15'],
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


    public function oleo_edit_bahagian_ic(Request $request, $id)
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


        return redirect()->route('oleo.bahagianic')
            ->with('success', 'Maklumat telah disimpan');
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

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');

        $penyata = E104Init::where('e104_nl', auth()->user()->username)->first();




        return view('users.KilangOleokimia.oleo-bahagian-ii', compact('returnArr', 'layout', 'penyata', 'user'));
    }

    public function oleo_update_bahagian_ii(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E104Init::findOrFail($id);
        $penyata->e104_a5 = $request->e104_a5;
        $penyata->e104_a6 = $request->e104_a6;
        $penyata->save();


        return redirect()->route('oleo.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
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

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');

        $produk = Produk::where('prodcat', 02)->orderBy('prodname')->get();

        $penyata = E104C::with('e104init', 'produk')->where('e104_reg', $user->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->get();
        // dd($penyata);

        return view('users.KilangOleokimia.oleo-bahagian-iii', compact('returnArr', 'layout', 'penyata', 'user', 'produk'));
    }


    public function oleo_add_bahagian_iii(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_iii($request->all())->validate();
        $this->store_bahagian_iii($request->all());

        return redirect()->route('oleo.bahagianiii')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_iii(array $data)
    {
        return Validator::make($data, [
            'e104_c3' => ['required', 'string'],
            'e104_c4' => ['required', 'string'],
            'e104_c5' => ['required', 'string'],
            'e104_c6' => ['required', 'string'],
            'e104_c7' => ['required', 'string'],
            'e104_c8' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_iii(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg->e104_reg);
        return E104C::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_c3' => $data['e104_c3'],
            'e104_c4' => $data['e104_c4'],
            'e104_c5' => $data['e104_c5'],
            'e104_c6' => $data['e104_c6'],
            'e104_c7' => $data['e104_c7'],
            'e104_c8' => $data['e104_c8'],
        ]);
        // return $data;
        // dd($data);
    }


    public function oleo_edit_bahagian_iii(Request $request, $id)
    {


        // $produk = Produk::where('prodname', $request->e104_C3)->first();

        // dd($request->all());
        $penyata = E104C::findOrFail($id);
        // $penyata->e104_c3 = $request->e104_c3;
        $penyata->e104_c4 = $request->e104_c4;
        $penyata->e104_c5 = $request->e104_c5;
        $penyata->e104_c6 = $request->e104_c6;
        $penyata->e104_c7 = $request->e104_c7;
        $penyata->e104_c8 = $request->e104_c8;

        $penyata->save();


        return redirect()->route('oleo.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
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

        $produk = Produk::where('prodcat', ['03', '06', '08'])->orderBy('prodname')->get();
        // dd($produk);

        $negara = Negara::get();

        $user = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');


        $penyata = E104D::with('e104init', 'produk', 'negara')->where('e104_reg', $user->e104_reg)->where('e104_d3', 1)->get();
        // dd($penyata);


        return view('users.KilangOleokimia.oleo-bahagian-iv', compact('returnArr', 'layout', 'produk', 'negara', 'penyata'));
    }



    public function oleo_add_bahagian_iv(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_iv($request->all())->validate();
        $this->store_bahagian_iv($request->all());

        return redirect()->route('oleo.bahagianiv')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_iv(array $data)
    {
        return Validator::make($data, [
            'e104_d4' => ['required', 'string'],
            'e104_d5' => ['required', 'string'],
            'e104_d6' => ['required', 'string'],
            'e104_d7' => ['required', 'string'],
            'e104_d8' => ['required', 'string'],
            'e104_d9' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_iv(array $data)
    {
        $e104_reg = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');
        // dd($e104_reg->e104_reg);
        return E104D::create([
            'e104_reg' => $e104_reg->e104_reg,
            'e104_d3' => '1',
            'e104_d4' => $data['e104_d4'],
            'e104_d5' => $data['e104_d5'],
            'e104_d6' => $data['e104_d6'],
            'e104_d7' => $data['e104_d7'],
            'e104_d8' => $data['e104_d8'],
            'e104_d9' => $data['e104_d9'],
        ]);
        // return $data;
        // dd($data);
    }



    public function oleo_edit_bahagian_iv(Request $request, $id)
    {
        // $produk = Produk::where('prodname', $request->e104_e4)->first();
        // $negara = Negara::where('namanegara', $request->e104_e9)->first();


        // dd($request->all());
        $penyata = E104D::findOrFail($id);
        // $penyata->e104_e4 = $produk->prodid;
        $penyata->e104_d5 = $request->e104_d5;
        $penyata->e104_d6 = $request->e104_d6;
        $penyata->e104_d7 = $request->e104_d7;
        $penyata->e104_d8 = $request->e104_d8;
        $penyata->e104_d9 = $request->e104_d9;
        $penyata->save();


        return redirect()->route('oleo.bahagianiv')
            ->with('success', 'Maklumat telah disimpan');
    }




    public function oleo_paparpenyata()
    {

        $breadcrumbs    = [
            ['link' => route('oleo.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('oleo.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('oleo.bahagianiv');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.koleo';

        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $pelesen2 = E104Init::where('e104_nl', auth()->user()->username)->first('e104_reg');


        $penyataia = E104B::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->get();
        // dd($penyatai);

        $penyataib = E104B::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->get();
        // dd($penyataii);

        $penyataic = E104Init::where('e104_nl', auth()->user()->username)->first();
        // dd($penyataiii);

        $penyataii = E104C::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->where('e104_c3', 1)->get();
        // dd($penyataiva);

        $penyataiii = E104C::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->where('e104_c3', 2)->get();
        // dd($penyataivb);

        $penyataiv = E104D::with('e104init', 'produk')->where('e104_reg', $pelesen2->e104_reg)->where('e104_d3', 1)->get();
        // dd($penyatava);

        // dd($penyatavb);






        return view('users.KilangOleokimia.oleo-papar-penyata', compact(
            'layout',
            'returnArr',
            'user',
            'pelesen',
            'penyataia',
            'penyataib',
            'penyataic',
            'penyataii',
            'penyataiii',
            'penyataiv',
        ));
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
