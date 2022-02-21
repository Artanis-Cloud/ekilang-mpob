<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\E101B;
use App\Models\E101Init;
use App\Models\Pelesen;
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


        return view('users.KilangPenapis.penapis-maklumat-asas-pelesen', compact('returnArr', 'layout','pelesen'));
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
        $penyata = E101B::with('e101init','produk')->where('e101_reg', $user->e101_reg)->
        whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->get();
        // $noreg = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');
        // $penyata2 = DB::select("SELECT *
        //                         FROM e101_b
        //                         WHERE e101_reg = $noreg'");
        // $penyata2 = E101B::where('e101_reg', $noreg)->first();
        // dd($penyata);

        return view('users.KilangPenapis.penapis-bahagian-i', compact('returnArr', 'layout','produk','penyata','user'));
    }


    public function penapis_update_bahagian_i(Request $request)
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
            'e101_b12' => ['required', 'string' ],
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
            'e101_reg'=> $e101_reg->e101_reg,
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

        $b = E101B::with('e101init','produk')->where('e101_reg', $user->e101_reg)->
        whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->get();
        // dd($b);

        // $penyata = DB::select("SELECT e.e101_b1, e.e101_b2, e.e101_b3, e.e101_b4,
        // e.e101_b5, e.e101_b6, e.e101_b7, e.e101_b8, e.e101_b9, e.e101_b10,
        // e.e101_b11, e.e101_b12, e.e101_b3, e.e101_b14 p.e101_reg, p.e101_nl,
        // k.prodid, k.prodname, k.prodcat
        // FROM e101_init p, e101_b e, produk k
        // WHERE p.e101_reg = e.e101_reg
        // and k.prodid = e.101_b4
        // and k.prodcat = '02'");

        return view('users.KilangPenapis.penapis-bahagian-ii', compact('returnArr', 'layout','produk','b'));
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

        $penyata = E101Init::where('e101_nl', auth()->user()->username)->first();


        return view('users.KilangPenapis.penapis-bahagian-iii', compact('returnArr', 'layout','penyata'));
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


        return view('users.KilangPenapis.penapis-bahagian-iva', compact('returnArr', 'layout','produk'));
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
