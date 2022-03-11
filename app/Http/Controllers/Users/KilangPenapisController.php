<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\E101B;
use App\Models\E101C;
use App\Models\E101D;
use App\Models\E101E;
use App\Models\E101Init;
use App\Models\H101Init;
use App\Models\H101B;
use App\Models\H101C;
use App\Models\H101D;
use App\Models\KodSl;
use App\Models\Negara;
use App\Models\User;
use App\Models\Pelesen;
use App\Models\ProdCat;
use App\Models\Produk;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;


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

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();


        return view('users.KilangPenapis.penapis-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen'));
    }

    public function penapis_update_maklumat_asas_pelesen(Request $request, $id)
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


        return redirect()->route('penapis.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');
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

        $produk = Produk::where('prodcat', 01)->orderBy('prodname')->get();
        // $penyata = E101Init::with('e101b')->where('e101_nl', auth()->user()->username)->get();
        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');
        // dd($user);

        // $penyata = E101B::with('e101init','produk')->where('e101_reg', $user->e101_reg)->get();
        $penyata = E101B::with('e101init', 'produk')->where('e101_reg', $user->e101_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->get();
        // dd($penyata);



        return view('users.KilangPenapis.penapis-bahagian-i', compact('returnArr', 'layout', 'produk', 'penyata', 'user'));
    }




    public function penapis_add_bahagian_i(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_i($request->all())->validate();
        $this->store_bahagian_i($request->all());

        return redirect()->route('penapis.bahagiani')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_i(array $data)
    {
        return Validator::make($data, [
            'e101_b4' => ['required', 'string'],
            'e101_b5' => ['required', 'string'],
            'e101_b6' => ['required', 'string'],
            'e101_b7' => ['required', 'string'],
            // 'e101_b8' => ['required', 'string'],
            'e101_b9' => ['required', 'string'],
            'e101_b10' => ['required', 'string'],
            'e101_b11' => ['required', 'string'],
            'e101_b12' => ['required', 'string'],
            'e101_b13' => ['required', 'string'],
            'e101_b14' => ['required', 'string'],
            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_i(array $data)
    {
        $e101_reg = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');
        // dd($e101_reg->e101_reg);
        return E101B::create([
            'e101_reg' => $e101_reg->e101_reg,
            'e101_b3' => '1',
            'e101_b4' => $data['e101_b4'],
            'e101_b5' => $data['e101_b5'],
            'e101_b6' => $data['e101_b6'],
            'e101_b7' => $data['e101_b7'],
            // 'e101_b8' => $data['e101_b8'],
            'e101_b9' => $data['e101_b9'],
            'e101_b10' => $data['e101_b10'],
            'e101_b11' => $data['e101_b11'],
            'e101_b12' => $data['e101_b12'],
            'e101_b13' => $data['e101_b13'],
            'e101_b14' => $data['e101_b14'],
            // 'e101_b15' => $data['e101_b15'],
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


    public function penapis_edit_bahagian_i(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->e101_b4)->first();

        // dd($request->all());
        $penyata = E101B::findOrFail($id);
        $penyata->e101_b4 = $produk->prodid;
        $penyata->e101_b5 = $request->e101_b5;
        $penyata->e101_b6 = $request->e101_b6;
        $penyata->e101_b7 = $request->e101_b7;
        $penyata->e101_b9 = $request->e101_b9;
        $penyata->e101_b10 = $request->e101_b10;
        $penyata->e101_b11 = $request->e101_b11;
        $penyata->e101_b12 = $request->e101_b12;
        $penyata->e101_b13 = $request->e101_b13;
        $penyata->e101_b14 = $request->e101_b14;
        $penyata->save();


        return redirect()->route('penapis.bahagiani')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function penapis_delete_bahagian_i($id)
    {
        $penyata = E101B::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
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

        $produk = Produk::where('prodcat', 02)->orderBy('prodname')->get();
        // $penyatas = E101Init::with('e101b')->where('e101_nl', auth()->user()->username)->get();
        // $b = E101B::with(['e101init'],['produk'])->get();
        $user = E101Init::where('e101_nl', auth()->user()->username)->first();
        // dd($user);
        // $b = E101B::with('e101init')->where('e101_reg', $user->e101_reg)->get();
        // $b = E101B::with('e101init','produk')->where('e101_reg', $user->e101_reg)->get();

        $b = E101B::with('e101init', 'produk')->where('e101_reg', $user->e101_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->get();

        // dd($b);
        // dd($b->produk);


        return view('users.KilangPenapis.penapis-bahagian-ii', compact('returnArr', 'layout', 'produk', 'b'));
    }



    public function penapis_add_bahagian_ii(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ii($request->all())->validate();
        $this->store_bahagian_ii($request->all());

        return redirect()->route('penapis.bahagianii')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ii(array $data)
    {
        return Validator::make($data, [
            'e101_b4' => ['required', 'string'],
            'e101_b5' => ['required', 'string'],
            'e101_b6' => ['required', 'string'],
            'e101_b7' => ['required', 'string'],
            // 'e101_b8' => ['required', 'string'],
            'e101_b9' => ['required', 'string'],
            'e101_b10' => ['required', 'string'],
            'e101_b11' => ['required', 'string'],
            'e101_b12' => ['required', 'string'],
            'e101_b13' => ['required', 'string'],
            'e101_b14' => ['required', 'string'],
            // 'e101_b15' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ii(array $data)
    {
        $e101_reg = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');
        // dd($e101_reg->e101_reg);
        return E101B::create([
            'e101_reg' => $e101_reg->e101_reg,
            'e101_b3' => '2',
            'e101_b4' => $data['e101_b4'],
            'e101_b5' => $data['e101_b5'],
            'e101_b6' => $data['e101_b6'],
            'e101_b7' => $data['e101_b7'],
            // 'e101_b8' => $data['e101_b8'],
            'e101_b9' => $data['e101_b9'],
            'e101_b10' => $data['e101_b10'],
            'e101_b11' => $data['e101_b11'],
            'e101_b12' => $data['e101_b12'],
            'e101_b13' => $data['e101_b13'],
            'e101_b14' => $data['e101_b14'],
            // 'e101_b15' => $data['e101_b15'],
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


    public function penapis_edit_bahagian_ii(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->e101_b4)->first();

        // dd($request->all());
        $penyata = E101B::findOrFail($id);
        $penyata->e101_b4 = $produk->prodid;
        $penyata->e101_b5 = $request->e101_b5;
        $penyata->e101_b6 = $request->e101_b6;
        $penyata->e101_b7 = $request->e101_b7;
        $penyata->e101_b9 = $request->e101_b9;
        $penyata->e101_b10 = $request->e101_b10;
        $penyata->e101_b11 = $request->e101_b11;
        $penyata->e101_b12 = $request->e101_b12;
        $penyata->e101_b13 = $request->e101_b13;
        $penyata->e101_b14 = $request->e101_b14;
        $penyata->save();


        return redirect()->route('penapis.bahagianii')
            ->with('success', 'Maklumat telah disimpan');
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

        $penyata = E101Init::where('e101_nl', auth()->user()->username)->first();


        return view('users.KilangPenapis.penapis-bahagian-iii', compact('returnArr', 'layout', 'penyata'));
    }


    public function penapis_update_bahagian_iii(Request $request, $id)
    {
        // dd($request->all());
        $penyata = E101Init::findOrFail($id);
        $penyata->e101_a1 = $request->e101_a1;
        $penyata->e101_a2 = $request->e101_a2;
        $penyata->e101_a3 = $request->e101_a3;
        $penyata->save();


        return redirect()->route('penapis.bahagianiva')
            ->with('success', 'Maklumat telah disimpan');
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

        $produk = Produk::where('prodcat', 04)->orderBy('prodname')->get();

        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');


        // $penyata = E101C::with('e101init','produk')->where('e101_reg', $user->e101_reg)->
        // whereHas('produk', function ($query) {
        //         return $query->where('prodcat', '=', 04);
        //     })->get();
        $penyata = E101C::with('e101init', 'produk')->where('e101_reg', $user->e101_reg)->where('e101_c3', 1)->get();
        // dd($penyata);

        return view('users.KilangPenapis.penapis-bahagian-iva', compact('returnArr', 'layout', 'produk', 'user', 'penyata'));
    }



    public function penapis_add_bahagian_iva(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_iva($request->all())->validate();
        $this->store_bahagian_iva($request->all());

        return redirect()->route('penapis.bahagianiva')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_iva(array $data)
    {
        return Validator::make($data, [
            'e101_c4' => ['required', 'string'],
            'e101_c5' => ['required', 'string'],
            'e101_c6' => ['required', 'string'],
            'e101_c7' => ['required', 'string'],
            'e101_c8' => ['required', 'string'],
            'e101_c9' => ['required', 'string'],
            'e101_c10' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_iva(array $data)
    {
        $e101_reg = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');
        // dd($e101_reg->e101_reg);
        return E101C::create([
            'e101_reg' => $e101_reg->e101_reg,
            'e101_c3' => '1',
            'e101_c4' => $data['e101_c4'],
            'e101_c5' => $data['e101_c5'],
            'e101_c6' => $data['e101_c6'],
            'e101_c7' => $data['e101_c7'],
            'e101_c8' => $data['e101_c8'],
            'e101_c9' => $data['e101_c9'],
            'e101_c10' => $data['e101_c10'],
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


    public function penapis_edit_bahagian_iva(Request $request, $id)
    {
        $produk = Produk::where('prodname', $request->e101_c4)->first();

        // dd($request->all());
        $penyata = E101C::findOrFail($id);
        $penyata->e101_c4 = $produk->prodid;
        $penyata->e101_c5 = $request->e101_c5;
        $penyata->e101_c6 = $request->e101_c6;
        $penyata->e101_c7 = $request->e101_c7;
        $penyata->e101_c8 = $request->e101_c8;
        $penyata->e101_c9 = $request->e101_c9;
        $penyata->e101_c10 = $request->e101_c10;
        $penyata->save();


        return redirect()->route('penapis.bahagianiva')
            ->with('success', 'Maklumat telah disimpan');
    }



    public function penapis_bahagianivb()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianivb'), 'name' => "Bahagian IV (b)"],
        ];

        $kembali = route('penapis.bahagianiva');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';


        $produk = Produk::where('prodcat', 04)->orderBy('prodname')->get();

        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');


        $penyata = E101C::with('e101init', 'produk')->where('e101_reg', $user->e101_reg)->where('e101_c3', 2)->get();
        // dd($penyata);

        return view('users.KilangPenapis.penapis-bahagian-ivb', compact('returnArr', 'layout', 'produk', 'user', 'penyata'));
    }



    public function penapis_add_bahagian_ivb(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_ivb($request->all())->validate();
        $this->store_bahagian_ivb($request->all());

        return redirect()->route('penapis.bahagianivb')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_ivb(array $data)
    {
        return Validator::make($data, [
            'e101_c4' => ['required', 'string'],
            'e101_c5' => ['required', 'string'],
            'e101_c6' => ['required', 'string'],
            'e101_c7' => ['required', 'string'],
            'e101_c8' => ['required', 'string'],
            'e101_c9' => ['required', 'string'],
            'e101_c10' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_ivb(array $data)
    {
        $e101_reg = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');
        // dd($e101_reg->e101_reg);
        return E101C::create([
            'e101_reg' => $e101_reg->e101_reg,
            'e101_c3' => '2',
            'e101_c4' => $data['e101_c4'],
            'e101_c5' => $data['e101_c5'],
            'e101_c6' => $data['e101_c6'],
            'e101_c7' => $data['e101_c7'],
            'e101_c8' => $data['e101_c8'],
            'e101_c9' => $data['e101_c9'],
            'e101_c10' => $data['e101_c10'],
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


    public function penapis_edit_bahagian_ivb(Request $request, $id)
    {

        $produk = Produk::where('prodname', $request->e101_c4)->first();

        // dd($request->all());
        $penyata = E101C::findOrFail($id);
        $penyata->e101_c4 = $produk->prodid;
        $penyata->e101_c5 = $request->e101_c5;
        $penyata->e101_c6 = $request->e101_c6;
        $penyata->e101_c7 = $request->e101_c7;
        $penyata->e101_c8 = $request->e101_c8;
        $penyata->e101_c9 = $request->e101_c9;
        $penyata->e101_c10 = $request->e101_c10;
        $penyata->save();


        return redirect()->route('penapis.bahagianivb')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function penapis_bahagianv()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianv'), 'name' => "Bahagian V"],
        ];

        $kembali = route('penapis.bahagianivb');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';

        // $produk = ProdCat::where('prodcat', 04)->orderBy('prodname')->get();

        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');


        $penyata = E101D::with('e101init', 'prodcat', 'kodsl')->where('e101_reg', $user->e101_reg)->get();
        // dd($penyata);

        // $kodsl = KodSl::all();
        // dd($kodsl);
        // $selectedKod = E101D::with('e101init', 'prodcat', 'kodsl')->where('e101_d3', $kodsl->catid)->get();
        // dd($selectedKod);


        return view('users.KilangPenapis.penapis-bahagian-v', compact('returnArr', 'layout', 'user', 'penyata'));
    }



    public function penapis_add_bahagian_v(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_v($request->all())->validate();
        $this->store_bahagian_v($request->all());

        return redirect()->route('penapis.bahagianv')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_v(array $data)
    {
        return Validator::make($data, [
            'e101_d3' => ['required', 'string'],
            'e101_d4' => ['required', 'string'],
            'e101_d5' => ['required', 'string'],
            'e101_d6' => ['required', 'string'],
            'e101_d7' => ['required', 'string'],
            'e101_d8' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_v(array $data)
    {
        $e101_reg = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');
        // dd($e101_reg->e101_reg);
        return E101D::create([
            'e101_reg' => $e101_reg->e101_reg,
            'e101_d3' => $data['e101_d3'],
            'e101_d4' => $data['e101_d4'],
            'e101_d5' => $data['e101_d5'],
            'e101_d6' => $data['e101_d6'],
            'e101_d7' => $data['e101_d7'],
            'e101_d8' => $data['e101_d8'],
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


    public function penapis_edit_bahagian_v(Request $request, $id)
    {
        // $produk = Produk::where('prodname', $request->e101_d4)->first();
        // $kodsl = KodSl::where('catname', $request->e101_d3)->first();

        // dd($request->all());
        $penyata = E101D::findOrFail($id);
        $penyata->e101_d3 = $request->e101_d3;
        $penyata->e101_d4 = $request->e101_d4;
        $penyata->e101_d5 = $request->e101_d5;
        $penyata->e101_d6 = $request->e101_d6;
        $penyata->e101_d7 = $request->e101_d7;
        $penyata->e101_d8 = $request->e101_d8;
        $penyata->save();


        return redirect()->route('penapis.bahagianv')
            ->with('success', 'Maklumat telah disimpan');
    }


    // public function penapis_bahagianvb()
    // {

    //     $breadcrumbs    = [
    //         ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('penapis.bahagianvb'), 'name' => "Bahagian V(b)"],
    //     ];

    //     $kembali = route('penapis.bahagianva');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.kpenapis';



    //     return view('users.KilangPenapis.penapis-bahagian-vb', compact('returnArr', 'layout'));
    // }

    public function penapis_bahagianvi()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.bahagianvi'), 'name' => "Bahagian VI"],
        ];

        $kembali = route('penapis.bahagianv');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';

        $produk = Produk::where('prodcat', ['01', '02', '03', '04', '06'])->orderBy('prodname')->get();
        // dd($produk);

        $negara = Negara::get();

        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');


        $penyata = E101E::with('e101init', 'produk', 'negara')->where('e101_reg', $user->e101_reg)->where('e101_e3', 1)->get();
        // dd($penyata);


        return view('users.KilangPenapis.penapis-bahagian-vi', compact('returnArr', 'layout', 'produk', 'negara', 'penyata'));
    }



    public function penapis_add_bahagian_vi(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_vi($request->all())->validate();
        $this->store_bahagian_vi($request->all());

        return redirect()->route('penapis.bahagianvi')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_vi(array $data)
    {
        return Validator::make($data, [
            'e101_e4' => ['required', 'string'],
            'e101_e5' => ['required', 'string'],
            'e101_e6' => ['required', 'string'],
            'e101_e7' => ['required', 'string'],
            'e101_e8' => ['required', 'string'],
            'e101_e9' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_vi(array $data)
    {
        $e101_reg = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');
        // dd($e101_reg->e101_reg);
        return E101E::create([
            'e101_reg' => $e101_reg->e101_reg,
            'e101_e3' => '1',
            'e101_e4' => $data['e101_e4'],
            'e101_e5' => $data['e101_e5'],
            'e101_e6' => $data['e101_e6'],
            'e101_e7' => $data['e101_e7'],
            'e101_e8' => $data['e101_e8'],
            'e101_e9' => $data['e101_e9'],
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


    public function penapis_edit_bahagian_vi(Request $request, $id)
    {
        // $produk = Produk::where('prodname', $request->e101_e4)->first();
        // $negara = Negara::where('namanegara', $request->e101_e9)->first();


        // dd($request->all());
        $penyata = E101E::findOrFail($id);
        // $penyata->e101_e4 = $produk->prodid;
        $penyata->e101_e5 = $request->e101_e5;
        $penyata->e101_e6 = $request->e101_e6;
        $penyata->e101_e7 = $request->e101_e7;
        $penyata->e101_e8 = $request->e101_e8;
        $penyata->e101_e9 = $request->e101_e9;
        $penyata->save();


        return redirect()->route('penapis.bahagianvi')
            ->with('success', 'Maklumat telah disimpan');
    }


    public function penapis_paparpenyata()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('penapis.bahagianvi');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';

        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $pelesen2 = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');


        $penyatai = E101B::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->get();
        // dd($penyatai);

        $penyataii = E101B::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->get();
        // dd($penyataii);

        $penyataiii = E101Init::where('e101_nl', auth()->user()->username)->first();
        // dd($penyataiii);

        $penyataiva = E101C::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3', 1)->get();
        // dd($penyataiva);

        $penyataivb = E101C::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3', 2)->get();
        // dd($penyataivb);

        $penyatava = E101D::with('e101init', 'prodcat')->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3', 1)->get();
        // dd($penyatava);

        $penyatavb = E101D::with('e101init', 'prodcat')->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3', 2)->get();
        // dd($penyatavb);

        $penyatavii = E101E::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->where('e101_e3', 1)->get();
        // dd($penyatavii);




        return view('users.KilangPenapis.penapis-papar-penyata', compact(
            'layout',
            'returnArr',
            'user',
            'pelesen',
            'penyatai',
            'penyataii',
            'penyataiii',
            'penyataiva',
            'penyataivb',
            'penyatava',
            'penyatavb',
            'penyatavii',
        ));
    }


    public function penapis_email()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('penapis.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-email', compact('returnArr', 'layout'));
    }


    public function penapis_penyatadahulu()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('penapis.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';



        return view('users.KilangPenapis.penapis-penyata-dahulu', compact('returnArr', 'layout'));
    }


    public function penapis_penyata_dahulu_process(Request $request)
    {
        // dd($request->all());

        $user = User::first();
        // dd($user);
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);


        $users = H101Init::where('e101_nl', auth()->user()->username)
            ->where('e101_thn', $request->tahun)
            ->where('e101_bln', $request->bulan)->first();
        // dd($users);

        $i = H101B::with('h101init', 'produk')->where('e101_nobatch', $users->e101_nobatch)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '01');
        })->get();
        // dd($i);

        $ii = H101B::with('h101init', 'produk')->where('e101_nobatch', $users->e101_nobatch)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '02');
        })->get();

        $iii = H101Init::where('e101_nl', auth()->user()->username)->first();
        // dd($iii);
        $iv = H101C::with('h101init', 'produk')->where('e101_nobatch', $user->e101_nobatch)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '04');
        })->get();
        // dd($iv);

        $va = H101D::with('h101init')->where('e101_nobatch', $user->e101_nobatch)->where('e101_d3', '1')->get();
        // dd($va);

        $vb = H101D::with('h101init', 'prodcat')->where('e101_nobatch', $user->e101_nobatch)->where('e101_d3', '2')->get();


        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.penyatadahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Senarai Penyata Terdahulu"],
        ];

        $kembali = route('penapis.penyatadahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';

        return view('users.KilangPenapis.penapis-papar-dahulu', compact('returnArr', 'layout', 'user', 'pelesen', 'users', 'i', 'ii', 'iii', 'iv', 'va', 'vb'));
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


    public function try()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('penapis.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';



        return view('users.KilangPenapis.try', compact('returnArr', 'layout'));
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
