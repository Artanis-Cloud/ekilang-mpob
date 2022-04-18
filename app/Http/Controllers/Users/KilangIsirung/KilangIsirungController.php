<?php

namespace App\Http\Controllers\Users\KilangIsirung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelesen;
use App\Models\E102Init;
use App\Models\E102b;
use App\Models\E102c;
use App\Models\Ekmessage;
use App\Models\H102b;
use App\Models\H102c;
use App\Models\H102Init;
use App\Models\KodSl;
use App\Models\Negara;
use App\Models\ProdCat2;
use App\Models\Produk;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Validator;



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
        // dd($penyata);


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



    // public function isirung_bahagianiii(Request $request)
    // {

    //     $belian = E102b::where('belian', $request->e102b_4);
    //     $dari =E102b::where('dari', $request->e102b_5);
    //     // dd($request->all());
    //     $users = DB::select("SELECT e.e102_b1, p.catname, c.catname, e.e102_b6
    //     FROM e102b e, kod_sl p, prod_cat2 c
    //     WHERE e.e102_b2 = '$request->e102b_5' and e.e102_b3 = '51'
    //     and e.e102_b4 = p.catid and e.e102_b5 = c.catid
    //     order by p.catname, c.catname");


    //     $breadcrumbs    = [
    //         ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('isirung.bahagianiii'), 'name' => "Bahagian III"],
    //     ];

    //     $kembali = route('isirung.bahagianii');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.kisirung';


    //     return view('users.KilangIsirung.isirung-bahagian-iii', compact( 'returnArr', 'layout', 'belian', 'dari',  'users'));
    // }


    public function isirung_bahagianiii()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.bahagianiii'), 'name' => "Bahagian III"],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';

        $kodsl = KodSl::get();
        // dd($prodcat);

        $prodcat2 = ProdCat2::get();

        // $produk = ProdCat2::where('catid', [1, 5, 6, 7])->orderBy('catid')->get();
        // dd($produk);
        $produk = Prodcat2::select('catid', 'catname')->where('catid', [1, 5, 6, 7])->orderBy('catid')->get();
        // $penyata = E101Init::with('e101b')->where('e101_nl', auth()->user()->username)->get();
        $user = E102Init::where('e102_nl', auth()->user()->username)->first('e102_reg');
        // dd($user);

        // $penyata = E101B::with('e101init','produk')->where('e101_reg', $user->e101_reg)->get();
        $penyata = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $user->e102_reg)->where('e102_b3', '51')->where('e102_b4', '1')->get();
        $penyata2 = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $user->e102_reg)->where('e102_b3', '51')->where('e102_b4', '2')->get();

        // dd($penyata);
        $penyatai = E102Init::where('e102_nl', auth()->user()->username)->first();


        $total = DB::table("e102b")->where('e102_b2', $user->e102_reg)->where('e102_b3', '51')->where('e102_b4', '1')->sum('e102_b6');
        $total2 = DB::table("e102b")->where('e102_b2', $user->e102_reg)->where('e102_b3', '51')->where('e102_b4', '2')->sum('e102_b6');

        $total3 = $total + $total2;

        return view('users.KilangIsirung.isirung-bahagian-iii', compact(
            'returnArr',
            'layout',
            'kodsl',
            'prodcat2',
            'penyata',
            'penyata2',
            'user',
            'produk',
            'total',
            'penyatai',
            'total2',
            'total3'
        ));
    }


    public function isirung_add_bahagian_iii(Request $request)
    {
        $e102_reg = E102Init::where('e102_nl', auth()->user()->username)->first();

        $penyata = E102b::where('e102_b2', $e102_reg->e102_reg)
            ->where('e102_b3', '51')
            ->where('e102_b4', $request->e102_b4)
            ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('isirung.bahagianiii')->with('error', 'Maklumat sudah tersedia');
        } else {
            $this->validation_bahagian_iii($request->all())->validate();
            $this->store_bahagian_iii($request->all());

            return redirect()->route('isirung.bahagianiii')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_iii(array $data)
    {
        return Validator::make($data, [
            'e102_b4' => ['required', 'string'],
            'e102_b5' => ['required', 'string'],
            'e102_b6' => ['required', 'string'],

        ]);
    }

    protected function store_bahagian_iii(array $data)
    {
        $e102_reg = E102Init::where('e102_nl', auth()->user()->username)->first('e102_reg');
        // $penyata = E102b::where('e102_b2', $e102_reg)->where('e102_b3', '51')->where('e102_b4', $request->e102_b4)
        // ->where('e102_b5', $request->e102_b5)->first();
        // dd($penyata);
        // $count = E102b::count();

        // if (!$penyata) {
        return E102b::create([
            // 'e102_b1' => $count++,

            'e102_b2' => $e102_reg->e102_reg,
            'e102_b3' => '51',
            'e102_b4' => $data['e102_b4'],
            'e102_b5' => $data['e102_b5'],
            'e102_b6' => $data['e102_b6'],
        ]);
        // } else {
        //     return redirect()->route('isirung.bahagianiii')->with('error', 'Maklumat sudah tersedia');
        // }
        // return $data;
        // dd($data);
    }

    public function destroyiii($id)
    {
        $penyata = E102b::findOrFail($id);
        $penyata->delete();

        return redirect()->route('isirung.bahagianiii')
            ->with('success', 'Produk Dihapuskan');
    }

    public function validation(Request $request)
    {
        // dd($request->all());

        $total3 = floatval($request->total3);

        $jumlah = floatval($request->jumlah);

        if ($total3 != $request->jumlah) {
            return redirect()->back()->withInput()
                ->with('error', 'Jumlah Tidak Sama!');
        } else {
            return redirect()->route('isirung.bahagianiv')
                ->with('success', 'Maklumat telah disimpan');
        }
    }


    public function isirung_edit_bahagian_iii(Request $request, $id)
    {

        $penyata = E102b::findOrFail($id);
        $penyata->e102_b4 = $request->e102_b4;
        $penyata->e102_b5 = $request->e102_b5;
        $penyata->e102_b6 = $request->e102_b6;
        $penyata->save();


        return redirect()->route('isirung.bahagianiii')
            ->with('success', 'Maklumat telah disimpan');
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

        $prodcat = KodSl::get();
        // dd($prodcat);

        // $produk = ProdCat2::where('catid', [1,5,6,7])->orderBy('catid')->get();
        // dd($produk);

        // $penyata = E101Init::with('e101b')->where('e101_nl', auth()->user()->username)->get();
        $user = E102Init::where('e102_nl', auth()->user()->username)->first('e102_reg');
        // dd($user);

        // $penyata = E101B::with('e101init','produk')->where('e101_reg', $user->e101_reg)->get();
        $penyata = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $user->e102_reg)->where('e102_b3', '04')->where('e102_b4', '1')->get();
        $penyata2 = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $user->e102_reg)->where('e102_b3', '04')->where('e102_b4', '2')->get();
// dd($penyata);

        $penyatai = E102Init::where('e102_nl', auth()->user()->username)->first();


        $total = DB::table("e102b")->where('e102_b2', $user->e102_reg)->where('e102_b3', '04')->where('e102_b4', '1')->sum('e102_b6');
        $total2 = DB::table("e102b")->where('e102_b2', $user->e102_reg)->where('e102_b3', '04')->where('e102_b4', '2')->sum('e102_b6');

        $total3 = $total + $total2;


        return view('users.KilangIsirung.isirung-bahagian-iv', compact('returnArr', 'layout', 'prodcat', 'penyata', 'penyata2', 'user', 'total', 'total2', 'total3', 'penyatai'));
    }



    public function isirung_add_bahagian_iv(Request $request)
    {

        $e102_reg = E102Init::where('e102_nl', auth()->user()->username)->first();

        $penyata = E102b::where('e102_b2', $e102_reg->e102_reg)
            ->where('e102_b3', '04')
            ->where('e102_b4', $request->e102_b4)
            ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('isirung.bahagianiv')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_iv($request->all())->validate();
            $this->store_bahagian_iv($request->all());

            return redirect()->route('isirung.bahagianiv')->with('success', 'Maklumat sudah ditambah');
        }

    }

    protected function validation_bahagian_iv(array $data)
    {
        return Validator::make($data, [
            'e102_b4' => ['required', 'string'],
            'e102_b5' => ['required', 'string'],
            'e102_b6' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_iv(array $data)
    {
        $e102_reg = E102Init::where('e102_nl', auth()->user()->username)->first('e102_reg');
        // dd($e101_reg->e101_reg);
        return E102b::create([
            'e102_b2' => $e102_reg->e102_reg,
            'e102_b3' => '04',
            'e102_b4' => $data['e102_b4'],
            'e102_b5' => $data['e102_b5'],
            'e102_b6' => $data['e102_b6'],
        ]);
        // return $data;
        // dd($data);
    }

    public function destroyiv($id)
    {
        $penyata = E102b::findOrFail($id);
        $penyata->delete();

        return redirect()->route('isirung.bahagianiv')
            ->with('success', 'Produk Dihapuskan');

    }

    public function validationiv(Request $request)
    {
        // dd($request->all());
        $total3 = floatval($request->total3);

        $jumlah = floatval($request->jumlah);

        if ($total3 != $request->jumlah) {
            return redirect()->back()->withInput()
                ->with('error', 'Jumlah Tidak Sama!');
        } else {
            return redirect()->route('isirung.bahagianv')
                ->with('success', 'Maklumat telah disimpan');
        }

    }

    public function isirung_edit_bahagian_iv(Request $request, $id)
    {

        // $e102_b6 = floatval($request->e102_b6);

        // $total = floatval($request->jumlah);

        // if($e102_b6 != $request->jumlah)
        // {
        //      return redirect()->back()->withInput()
        //      ->with('error', 'Jumlah Tidak Sama!');
        // }
        // dd($request->all());
        $penyata = E102b::findOrFail($id);
        $penyata->e102_b4 = $request->e102_b4;
        $penyata->e102_b5 = $request->e102_b5;
        $penyata->e102_b6 = $request->e102_b6;
        $penyata->save();


        return redirect()->route('isirung.bahagianiv')
            ->with('success', 'Maklumat telah disimpan');
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

        $prodcat = KodSl::get();
        // dd($prodcat);

        // $produk = ProdCat2::where('catid', [1,5,6,7])->orderBy('catid')->get();
        // dd($produk);

        // $penyata = E101Init::with('e101b')->where('e101_nl', auth()->user()->username)->get();
        $user = E102Init::where('e102_nl', auth()->user()->username)->first('e102_reg');
        // dd($user);

        // $penyata = E101B::with('e101init','produk')->where('e101_reg', $user->e101_reg)->get();
        $penyata = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $user->e102_reg)->where('e102_b3', '33')->where('e102_b4', '1')->get();
        $penyata2 = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $user->e102_reg)->where('e102_b3', '33')->where('e102_b4', '2')->get();
// dd($penyata);


        $total = DB::table("e102b")->where('e102_b2', $user->e102_reg)->where('e102_b3', '33')->where('e102_b4', '1')->sum('e102_b6');
        $total2 = DB::table("e102b")->where('e102_b2', $user->e102_reg)->where('e102_b3', '33')->where('e102_b4', '2')->sum('e102_b6');

        $total3 = $total + $total2;
        // dd($penyata);

        $penyatai = E102Init::where('e102_nl', auth()->user()->username)->first();


        return view('users.KilangIsirung.isirung-bahagian-v', compact('returnArr', 'layout', 'prodcat', 'penyata', 'penyata2', 'user', 'total', 'total2', 'total3', 'penyatai'));
    }



    public function isirung_add_bahagian_v(Request $request)
    {
        $e102_reg = E102Init::where('e102_nl', auth()->user()->username)->first();

        $penyata = E102b::where('e102_b2', $e102_reg->e102_reg)
            ->where('e102_b3', '33')
            ->where('e102_b4', $request->e102_b4)
            ->where('e102_b5', $request->e102_b5)
            ->first();
        // dd($penyata);
        // dd($request->all());
        if ($penyata) {
            return redirect()->route('isirung.bahagianv')->with('error', 'Maklumat sudah tersedia');
        } else {
            // dd($request->all());
            $this->validation_bahagian_v($request->all())->validate();
            $this->store_bahagian_v($request->all());

            return redirect()->route('isirung.bahagianv')->with('success', 'Maklumat sudah ditambah');
        }
    }

    protected function validation_bahagian_v(array $data)
    {
        return Validator::make($data, [
            'e102_b4' => ['required', 'string'],
            'e102_b5' => ['required', 'string'],
            'e102_b6' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_v(array $data)
    {
        $e102_reg = E102Init::where('e102_nl', auth()->user()->username)->first('e102_reg');
        // dd($e101_reg->e101_reg);
        return E102b::create([
            'e102_b2' => $e102_reg->e102_reg,
            'e102_b3' => '33',
            'e102_b4' => $data['e102_b4'],
            'e102_b5' => $data['e102_b5'],
            'e102_b6' => $data['e102_b6'],
        ]);
        // return $data;
        // dd($data);
    }

    public function validationv(Request $request)
    {
        // dd($request->all());
        $total3 = floatval($request->total3);

        $jumlah = floatval($request->jumlah);

        if ($total3 != $request->jumlah) {
            return redirect()->back()->withInput()
                ->with('error', 'Jumlah Tidak Sama!');
        } else {
            return redirect()->route('isirung.paparpenyata')
                ->with('success', 'Maklumat telah disimpan');
        }

    }

    public function destroyv($id)
    {
        $penyata = E102b::findOrFail($id);
        $penyata->delete();

        return redirect()->route('isirung.bahagianv')
            ->with('success', 'Produk Dihapuskan');
    }


    public function isirung_edit_bahagian_v(Request $request, $id)
    {


        // dd($request->all());
        $penyata = E102b::findOrFail($id);
        $penyata->e102_b4 = $request->e102_b4;
        $penyata->e102_b5 = $request->e102_b5;
        $penyata->e102_b6 = $request->e102_b6;
        $penyata->save();


        return redirect()->route('isirung.bahagianv')
            ->with('success', 'Maklumat telah disimpan');
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

        $negara = Negara::get();
        // dd($negara);

        $prodcat = KodSl::get();
        // dd($prodcat);

        // $produk = ProdCat2::where('catid', [1,5,6,7])->orderBy('catid')->get();
        // dd($produk);

        // $produk = Produk::where('prodcat', ['02','05'])->orderBy('prodname')->get();
        // dd($produk);


        // $penyata = E101Init::with('e101b')->where('e101_nl', auth()->user()->username)->get();
        $user = E102Init::where('e102_nl', auth()->user()->username)->first('e102_reg');
        // dd($user);

        // $penyata = E101B::with('e101init','produk')->where('e101_reg', $user->e101_reg)->get();
        $penyata = E102c::with('e102init', 'produk', 'negara')->where('e102_c2', $user->e102_reg)->where('e102_c3', 1)->get();
        // dd($penyata);




        return view('users.KilangIsirung.isirung-bahagian-vi', compact('returnArr', 'layout', 'negara', 'prodcat', 'user', 'penyata'));
    }



    public function isirung_add_bahagian_vi(Request $request)
    {
        // dd($request->all());
        $this->validation_bahagian_vi($request->all())->validate();
        $this->store_bahagian_vi($request->all());

        return redirect()->route('isirung.bahagianvi')->with('success', 'Maklumat sudah ditambah');
    }

    protected function validation_bahagian_vi(array $data)
    {
        return Validator::make($data, [
            'e102_c4' => ['required', 'string'],
            'e102_c5' => ['required', 'string'],
            'e102_c6' => ['required', 'string'],
            'e102_c7' => ['required', 'string'],
            'e102_c8' => ['required', 'string'],
            'e102_c9' => ['required', 'string'],
        ]);
    }

    protected function store_bahagian_vi(array $data)
    {
        $e102_reg = E102Init::where('e102_nl', auth()->user()->username)->first('e102_reg');
        // dd($e101_reg->e101_reg);
        return E102c::create([
            'e102_c2' => $e102_reg->e102_reg,
            'e102_c3' => '1',
            'e102_c4' => $data['e102_c4'],
            'e102_c5' => $data['e102_c5'],
            'e102_c6' => $data['e102_c6'],
            'e102_c7' => $data['e102_c7'],
            'e102_c8' => $data['e102_c8'],
            'e102_c9' => $data['e102_c9'],
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


    public function isirung_edit_bahagian_vi(Request $request, $id)
    {
        $produk = Produk::where('prodname', $request->e102_c4)->first();
        $negara = Negara::where('namanegara', $request->e102_c9)->first();


        // dd($request->all());
        $penyata = E102c::findOrFail($id);
        $penyata->e102_c4 = $produk->prodid;
        $penyata->e102_c5 = $request->e102_c5;
        $penyata->e102_c6 = $request->e102_c6;
        $penyata->e102_c7 = $request->e102_c7;
        $penyata->e102_c8 = $request->e102_c8;
        $penyata->e102_c9 = $negara->kodnegara;
        $penyata->save();


        return redirect()->route('isirung.bahagianvi')
            ->with('success', 'Maklumat telah disimpan');
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

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('isirung.bahagianvi');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $penyatai = E102Init::where('e102_nl', auth()->user()->username)->first();
        // dd($penyatai);

        $penyataii = E102Init::where('e102_nl', auth()->user()->username)->first();

        $penyataiii = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '51')->get();
        // dd($penyataiii);
        $totaliii = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '51')->sum('e102_b6');
        // dd($totaliii);

        $penyataiv = E102b::with('e102init')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '04')->get();

        $totaliv = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '04')->sum('e102_b6');

        $penyatav = E102b::with('e102init')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '33')->get();

        $totalv = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '33')->sum('e102_b6');

        $penyatavi = E102c::with('e102init', 'produk', 'negara')->where('e102_c2', $penyataii->e102_reg)->where('e102_c3', '1')->get();
        // dd($penyatavi);


        return view('users.KilangIsirung.isirung-papar-penyata', compact(
            'layout',
            'returnArr',
            'user',
            'pelesen',
            'penyatai',
            'penyataii',
            'penyataiii',
            'totaliii',
            'penyataiv',
            'totaliv',
            'penyatav',
            'totalv',
            'penyatavi',
            'bulan',
            'tahun'


        ));
    }


    public function isirung_hantar_penyata()
    {

        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('isirung.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';

        $bulan = date("m") - 1;
        $tahun = date("Y");

        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $penyatai = E102Init::where('e102_nl', auth()->user()->username)->first();
        // dd($penyatai);

        $penyataii = E102Init::where('e102_nl', auth()->user()->username)->first();

        $penyataiii = E102b::with('e102init', 'kodsl', 'prodcat2')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '51')->get();
        // dd($penyataiii);
        $totaliii = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '51')->sum('e102_b6');
        // dd($totaliii);

        $penyataiv = E102b::with('e102init')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '04')->get();

        $totaliv = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '04')->sum('e102_b6');

        $penyatav = E102b::with('e102init')->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '33')->get();

        $totalv = DB::table("e102b")->where('e102_b2', $penyataii->e102_reg)->where('e102_b3', '33')->sum('e102_b6');

        $penyatavi = E102c::with('e102init', 'produk', 'negara')->where('e102_c2', $penyataii->e102_reg)->where('e102_c3', '1')->get();
        // dd($penyatavi);


        return view('users.KilangIsirung.isirung-hantar-penyata', compact(
            'layout',
            'returnArr',
            'user',
            'pelesen',
            'penyatai',
            'penyataii',
            'penyataiii',
            'totaliii',
            'penyataiv',
            'totaliv',
            'penyatav',
            'totalv',
            'penyatavi',
            'bulan',
            'tahun'


        ));
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


    public function isirung_send_email_proses(Request $request)
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



    public function isirung_penyata_dahulu_process(Request $request)
    {
        // dd($request->all());

        $user = User::first();
        // dd($user);
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();
        // dd($pelesen);

        $users = H102Init::where('e102_nl', auth()->user()->username)
            ->where('e102_thn', $request->tahun)
            ->where('e102_bln', $request->bulan)->first();
        // dd($users);

        // $i = H102Init::where('e102_nobatch', $users->e102_nobatch)->first();
        // dd($i);
        if ($users) {
            $i = H102Init::where('e102_nobatch', $users->e102_nobatch)->first();
            $iii = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '51')->get();
            // dd($iii);

            $totaliii = DB::table("h102b")->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '51')->sum('e102_b6');


            $iv = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '04')->get();
            // dd($iv);
            $totaliv = DB::table("h102b")->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '04')->sum('e102_b6');


            $v = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '33')->get();
            // dd($v);
            $totalv = DB::table("h102b")->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '33')->sum('e102_b6');


            $vi = H102c::with('h102init', 'produk', 'negara')->where('e102_nobatch', $users->e102_nobatch)->where('e102_c3', '1')->get();
            // dd($vi);

            $vii = H102c::with('h102init', 'produk', 'negara')->where('e102_nobatch', $users->e102_nobatch)->where('e102_c3', '2')->get();
        } else {
            $i = [];
            $iii = [];
            $totaliii = [];
            $iv = [];
            $totaliv = [];
            $v = [];
            $totalv = [];
            $vi = [];
            $vii = [];
        }


        // $iii = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '51')->get();
        // // dd($iii);

        // $totaliii = DB::table("h102b")->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '51')->sum('e102_b6');


        // $iv = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '04')->get();
        // // dd($iv);
        // $totaliv = DB::table("h102b")->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '04')->sum('e102_b6');


        // $v = H102b::with('h102init', 'kodsl', 'prodcat2')->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '33')->get();
        // // dd($v);
        // $totalv = DB::table("h102b")->where('e102_nobatch', $users->e102_nobatch)->where('e102_b3', '33')->sum('e102_b6');


        // $vi = H102c::with('h102init', 'produk', 'negara')->where('e102_nobatch', $users->e102_nobatch)->where('e102_c3', '1')->get();
        // // dd($vi);

        // $vii = H102c::with('h102init', 'produk', 'negara')->where('e102_nobatch', $users->e102_nobatch)->where('e102_c3', '2')->get();
        // dd($vii);


        // $va = H101D::with('h101init')->where('e101_nobatch', $user->e101_nobatch)->where('e101_d3', '1')->get();
        // dd($va);

        // $vb = H101D::with('h101init', 'prodcat')->where('e101_nobatch', $user->e101_nobatch)->where('e101_d3', '2')->get();


        $breadcrumbs    = [
            ['link' => route('isirung.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('isirung.penyatadahulu'), 'name' => "Papar Penyata Terdahulu"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Papar Senarai Penyata Terdahulu"],
        ];

        $kembali = route('isirung.penyatadahulu');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kisirung';

        return view('users.KilangIsirung.isirung-papar-dahulu', compact(
            'returnArr',
            'layout',
            'user',
            'pelesen',
            'users',
            'i',
            'iii',
            'totaliii',
            'iv',
            'totaliv',
            'v',
            'totalv',
            'vi',
            'vii',
        ));
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
