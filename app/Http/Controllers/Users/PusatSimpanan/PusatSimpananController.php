<?php

namespace App\Http\Controllers\Users\PusatSimpanan;

use App\Http\Controllers\Controller;
use App\Models\E07Btranshipment;
use App\Models\E07Init;
use App\Models\Ekmessage;
use App\Models\H07Btranshipment;
use App\Models\H07Init;
use Illuminate\Http\Request;
use App\Models\Pelesen;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;

class PusatSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function pusatsimpan_maklumatasaspelesen()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.maklumatasaspelesen'), 'name' => "Maklumat Asas Pelesen"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        // $pelesen = E91Init::get();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // $pelesen = E91Init::where('e91_nl', auth()->user()->$no_lesen)->first();


        //dd($pelesen);




        return view('users.PusatSimpanan.pusatsimpan-maklumat-asas-pelesen', compact('returnArr', 'layout', 'pelesen'));
    }

    public function pusatsimpan_update_maklumat_asas_pelesen(Request $request, $id)
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


        return redirect()->route('pusatsimpan.maklumatasaspelesen')
            ->with('success', 'Maklumat telah dikemaskini');
    }



    public function pusatsimpan_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        $user = User::get();

        return view('users.PusatSimpanan.pusatsimpan-tukar-password', compact('returnArr', 'layout','user'));
    }

    public function pusatsimpan_update_password(Request $request, $id)
    {
        $user = User::findOrFail(auth()->user()->id);
        //compare password
        if(!Hash::check($request->old_password, $user->password)){
            return redirect()->route('pusatsimpan.tukarpassword')
            ->with('error', 'Sila masukkan kata laluan lama yang betul');
        }

        $password = Hash::make($request->new_password);
        $user->password = $password;
        $user->save();

        return redirect()->route('pusatsimpan.tukarpassword')
            ->with('success', 'Kata Laluan berjaya ditukar');

    }

    public function pusatsimpan_bahagiana()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.bahagiana'), 'name' => "Bahagian A"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        $user = E07Init::where('e07_nl', auth()->user()->username)->first('e07_reg');

        $penyata = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $user->e07_reg)->get();

        $produks = Produk::select('prodid', 'prodname')->where('prodcat', '!=', '07')->orderBy('prodname')->get();
        // dd($penyata);
        $total = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_stokawal');
        $total2 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_terima');
        $total3 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_edaran');
        $total4 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_pelarasan');
        $total5 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_stokakhir');





        return view('users.PusatSimpanan.pusatsimpan-bahagian-a', compact(
            'returnArr',
            'layout',
            'user',
            'penyata',
            'produks',
            'total',
            'total2',
            'total3',
            'total4',
            'total5'
        ));
    }

    public function pusatsimpan_add_bahagian_a(Request $request)
    {
        // dd($request->all());
        $user = E07Init::where('e07_nl', auth()->user()->username)->first('e07_reg');

        $penyata = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $user->e07_reg)->where('e07bt_produk', $request->e07bt_produk)->first();
        if ($penyata) {
            return redirect()->back()->with("error", "Produk telah Tersedia");
        } else {

            $this->validation_bahagian_a($request->all())->validate();
            $this->store_bahagian_a($request->all());

            return redirect()->route('pusatsimpan.bahagiana')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_a(array $data)
    {
        return Validator::make($data, [
            'e07bt_produk' => ['required', 'string'],
            'e07bt_stokawal' => ['required', 'string'],
            'e07bt_terima' => ['required', 'string'],
            'e07bt_edaran' => ['required', 'string'],
            'e07bt_pelarasan' => ['required', 'string'],
            'e07bt_stokakhir' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_a(array $data)
    {
        $e07bt_idborang = E07Init::where('e07_nl', auth()->user()->username)->first('e07_reg');
        // dd($e101_reg->e101_reg);
        return E07Btranshipment::create([
            'e07bt_idborang' => $e07bt_idborang->e07_reg,
            'e07bt_produk' => $data['e07bt_produk'],
            'e07bt_stokawal' => $data['e07bt_stokawal'],
            'e07bt_terima' => $data['e07bt_terima'],
            // 'e07bt_import' => '0',
            'e07bt_edaran' => $data['e07bt_edaran'],
            // 'e07bt_eksport' => '0',
            'e07bt_pelarasan' => $data['e07bt_pelarasan'],
            'e07bt_stokakhir' => $data['e07bt_stokakhir'],
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


    public function pusatsimpan_edit_bahagian_a(Request $request, $id)
    {
        // $produk = Produk::where('prodname', $request->e07bt_produk)->first();
        // dd($produk);
        // $prodcat2 = ProdCat2::where('catname', $request->e101_b5)->first();


        // dd($request->all());
        $penyata = E07Btranshipment::findOrFail($id);
        // $penyata->e07bt_produk = $produk->prodid;
        $penyata->e07bt_stokawal = $request->e07bt_stokawal;
        $penyata->e07bt_terima = $request->e07bt_terima;
        $penyata->e07bt_import = $request->e07bt_import;
        $penyata->e07bt_edaran = $request->e07bt_edaran;
        $penyata->e07bt_eksport = $request->e07bt_eksport;
        $penyata->e07bt_pelarasan = $request->e07bt_pelarasan;
        $penyata->e07bt_stokakhir = $request->e07bt_stokakhir;
        $penyata->save();


        return redirect()->route('pusatsimpan.bahagiana')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function pusatsimpan_delete_bahagian_a($id)
    {
        $penyata = E07Btranshipment::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('pusatsimpan.bahagiana')
            ->with('success', 'Produk Dihapuskan');
    }



    public function pusatsimpan_bahagianb()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.bahagianb'), 'name' => "Bahagian B"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';



        return view('users.PusatSimpanan.pusatsimpan-bahagian-b', compact('returnArr', 'layout'));
    }





    public function pusatsimpan_paparpenyata()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('pusatsimpan.bahagiana');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        $bulan = date("m") - 1;

        $tahun = date("Y");

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $user = E07Init::where('e07_nl', auth()->user()->username)->first();

        $penyata = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $user->e07_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '!=', '07');
        })->get();
        // dd($penyata);
        $total = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_stokawal');
        $total2 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_terima');
        $total3 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_edaran');
        $total4 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_pelarasan');
        $total5 = DB::table("e07_btranshipment")->where('e07bt_idborang', $user->e07_reg)->sum('e07bt_stokakhir');



        return view('users.PusatSimpanan.pusatsimpan-papar-penyata', compact(
            'layout',
            'returnArr',
            'user',
            'penyata',
            'pelesen',
            'tahun',
            'bulan',
            'total',
            'total2',
            'total3',
            'total4',
            'total5'
        ));
    }

    public function pusatsimpan_update_papar_penyata(Request $request, $id)
    {
        // dd($request->all());


        $penyata = E07Init::findOrFail($id);
        $penyata->e07_npg = $request->e07_npg;
        $penyata->e07_jpg = $request->e07_jpg;
        $penyata->e07_notel = $request->e07_notel;
        $penyata->save();


        return redirect()->route('pusatsimpan.hantar.penyata')
            ->with('success', 'Penyata Sudah Dihantar');

    }


    public function pusatsimpan_hantar_penyata()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        $bulan = date("m") - 1;

        $tahun = date("Y");

        $date = date("d-m-Y");

        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $user = E07Init::where('e07_nl', auth()->user()->username)->first();

        $penyata = E07Btranshipment::with('e07init', 'produk')->where('e07bt_idborang', $user->e07_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '!=', '07');
        })->get();
        // dd($penyata);




        return view('users.PusatSimpanan.pusatsimpan-hantar-penyata', compact('layout', 'returnArr', 'date', 'user', 'penyata', 'pelesen', 'tahun', 'bulan'));
    }

    public function pusatsimpan_email()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';



        return view('users.PusatSimpanan.pusatsimpan-email', compact('returnArr', 'layout'));
    }


    public function pusatsimpan_send_email_proses(Request $request)
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

    public function pusatsimpan_penyatadahulu()
    {

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.penyatadahulu'), 'name' => "Penyata Bulanan Terdahulu  "],
        ];

        $kembali = route('pusatsimpan.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';



        return view('users.PusatSimpanan.pusatsimpan-penyata-dahulu', compact('returnArr', 'layout'));
    }


    public function pusatsimpan_penyata_dahulu_process(Request $request)
    {
        // dd($request->all());

        // $user = User::first();
        // dd($user);
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        $user = H07Init::where('e07_nl', auth()->user()->username)
            ->where('e07_thn', $request->tahun)
            ->where('e07_bln', $request->bulan)->first();
        // dd($users->e102_nobatch);

        if ($user) {
            $penyata = H07Btranshipment::with('e07init', 'produk')->where('e07bt_nobatch', $user->e07_nobatch)->whereHas('produk', function ($query) {
                return $query->where('prodcat', '!=', '07');
            })->get();
            // dd($penyata);
            $total = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_stokawal');
            $total2 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_terima');
            $total3 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_edaran');
            $total4 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_pelarasan');
            $total5 = DB::table("h07_btranshipment")->where('e07bt_nobatch', $user->e07_nobatch)->sum('e07bt_stokakhir');
        } else {
            return redirect()->back()->with('error', 'Penyata Tidak Wujud!');
        }

        $breadcrumbs    = [
            ['link' => route('pusatsimpan.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('pusatsimpan.penyatadahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Senarai Penyata Terdahulu"],
        ];

        $kembali = route('pusatsimpan.penyatadahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.psimpan';

        return view('users.PusatSimpanan.pusatsimpan-papar-dahulu', compact(
            'returnArr',
            'layout',
            'user',
            'pelesen',
            'penyata',
            'total',
            'total2',
            'total3',
            'total4',
            'total5'
        ));
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
