<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\E101B;
use App\Models\E101C;
use App\Models\E101D;
use App\Models\E101E;
use App\Models\E101Init;
use App\Models\Ekmessage;
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
use Illuminate\Support\Facades\Hash;
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

        $user = User::get();

        return view('users.KilangPenapis.penapis-tukar-password', compact('returnArr', 'layout','user'));
    }

    public function penapis_update_password(Request $request, $id)
    {
        $user = User::findOrFail(auth()->user()->id);
        //compare password
        if(!Hash::check($request->old_password, $user->password)){
            return redirect()->route('penapis.tukarpassword')
            ->with('error', 'Sila masukkan kata laluan lama yang betul');
        }

        $password = Hash::make($request->new_password);
        $user->password = $password;
        $user->save();

        return redirect()->route('penapis.tukarpassword')
            ->with('success', 'Kata Laluan berjaya ditukar');

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
        $total = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b5');

        $total2 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b6');

        $total3 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b7');

        $total4 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b8');

        $total5 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b9');

        $total6 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b10');

        $total7 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b11');

        $total8 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b12');

        $total9 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b13');

        $total10 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','1')->sum('e101_b14');


        return view('users.KilangPenapis.penapis-bahagian-i', compact('returnArr', 'layout', 'produk', 'penyata', 'user',
                    'total', 'total2', 'total3', 'total4', 'total5', 'total6', 'total7', 'total8', 'total9', 'total10'));
    }




    public function penapis_add_bahagian_i(Request $request)
    {
        // dd($request->all());
        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');

        // $e101_produk = E101B::where('e101_reg', $user->e101_reg)->where('e101_b4',$request->e101_b4)->get();
        $penyata = E101B::with('e101init', 'produk')->where('e101_reg', $user->e101_reg)->where('e101_b4', $request->e101_b4)->first();
        if ($penyata) {
            return redirect()->back()->with("error", "Produk telah Tersedia");
        }
        else{
        // dd($e101_produk);

        $this->validation_bahagian_i($request->all())->validate();
        $this->store_bahagian_i($request->all());

        return redirect()->route('penapis.bahagiani')->with('success', 'Maklumat sudah ditambah');
        }
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



        // dd($e101_produk);



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
        return redirect()->route('penapis.bahagiani')
        ->with('success','Produk Dihapuskan');
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

        $total = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b5');

        $total2 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b6');

        $total3 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b7');

        $total4 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b8');

        $total5 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b9');

        $total6 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b10');

        $total7 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b11');

        $total8 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b12');

        $total9 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b13');

        $total10 = DB::table("e101_b")->where('e101_reg', $user->e101_reg)->where('e101_b3','2')->sum('e101_b14');




        return view('users.KilangPenapis.penapis-bahagian-ii', compact('returnArr', 'layout', 'produk', 'b',
        'total', 'total2', 'total3', 'total4', 'total5', 'total6', 'total7', 'total8', 'total9', 'total10'));
    }



    public function penapis_add_bahagian_ii(Request $request)
    {
        // dd($request->all());
        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');

        $penyata = E101B::with('e101init', 'produk')->where('e101_reg', $user->e101_reg)->where('e101_b4', $request->e101_b4)->first();
        if ($penyata) {
            return redirect()->back()->with("error", "Produk telah Tersedia");
        }
        else{
        $this->validation_bahagian_ii($request->all())->validate();
        $this->store_bahagian_ii($request->all());

        return redirect()->route('penapis.bahagianii')->with('success', 'Maklumat sudah ditambah');
        }
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

    public function penapis_delete_bahagian_ii($id)
    {
        $penyata = E101B::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('penapis.bahagianii')
        ->with('success','Produk Dihapuskan');
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

        $total = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','1')->sum('e101_c5');

        $total2 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','1')->sum('e101_c6');

        $total3 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','1')->sum('e101_c7');

        $total4 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','1')->sum('e101_c8');

        $total5 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','1')->sum('e101_c9');

        $total6 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','1')->sum('e101_c10');

        // dd($penyata);

        return view('users.KilangPenapis.penapis-bahagian-iva', compact('returnArr', 'layout', 'produk', 'user', 'penyata',
        'total', 'total2', 'total3', 'total4', 'total5', 'total6'));
    }



    public function penapis_add_bahagian_iva(Request $request)
    {
        // dd($request->all());
        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');

        $penyata = E101C::with('e101init', 'produk')->where('e101_reg', $user->e101_reg)->where('e101_c4', $request->e101_c4)->first();
        if ($penyata) {
            return redirect()->back()->with("error", "Produk telah Tersedia");
        }
        else{

        $this->validation_bahagian_iva($request->all())->validate();
        $this->store_bahagian_iva($request->all());

        return redirect()->route('penapis.bahagianiva')->with('success', 'Maklumat sudah ditambah');
        }
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

    public function penapis_delete_bahagian_iva($id)
    {
        $penyata = E101C::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('penapis.bahagianiva')
        ->with('success','Produk Dihapuskan');
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

        $total = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','2')->sum('e101_c5');

        $total2 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','2')->sum('e101_c6');

        $total3 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','2')->sum('e101_c7');

        $total4 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','2')->sum('e101_c8');

        $total5 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','2')->sum('e101_c9');

        $total6 = DB::table("e101_c")->where('e101_reg', $user->e101_reg)->where('e101_c3','2')->sum('e101_c10');
        // dd($penyata);

        return view('users.KilangPenapis.penapis-bahagian-ivb', compact('returnArr', 'layout', 'produk', 'user', 'penyata',
        'total', 'total2', 'total3', 'total4', 'total5', 'total6'));
    }



    public function penapis_add_bahagian_ivb(Request $request)
    {
        // dd($request->all());
        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');

        $penyata = E101C::with('e101init', 'produk')->where('e101_reg', $user->e101_reg)->where('e101_c4', $request->e101_c4)->first();
        if ($penyata) {
            return redirect()->back()->with("error", "Produk telah Tersedia");
        }
        else{

        $this->validation_bahagian_ivb($request->all())->validate();
        $this->store_bahagian_ivb($request->all());

        return redirect()->route('penapis.bahagianivb')->with('success', 'Maklumat sudah ditambah');
        }
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

    public function penapis_delete_bahagian_ivb($id)
    {
        $penyata = E101C::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('penapis.bahagianivb')
        ->with('success','Produk Dihapuskan');
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


        // $penyata = E101D::with('e101init', 'prodcat', 'kodsl')->where('e101_reg', $user->e101_reg)->get();
        $penyata = E101D::with('e101init', 'prodcat', 'kodsl')->where('e101_reg', $user->e101_reg)->where('e101_d3', 1)->get();
        $penyata2 = E101D::with('e101init', 'prodcat', 'kodsl')->where('e101_reg', $user->e101_reg)->where('e101_d3', 2)->get();

        // $penyata2 = KodSl::where('catid', 1)->get();
        // $penyatava = E101D::with('e101init', 'prodcat')->where('e101_reg', $pelesen2->e101_reg)->get();

        $totala = DB::table("e101_d")->where('e101_reg', $user->e101_reg)->where('e101_d3', 1)->sum('e101_d5');
        $totala2 = DB::table("e101_d")->where('e101_reg', $user->e101_reg)->where('e101_d3', 1)->sum('e101_d6');
        $totala3 = DB::table("e101_d")->where('e101_reg', $user->e101_reg)->where('e101_d3', 1)->sum('e101_d7');
        $totala4 = DB::table("e101_d")->where('e101_reg', $user->e101_reg)->where('e101_d3', 1)->sum('e101_d8');


        $totalb = DB::table("e101_d")->where('e101_reg', $user->e101_reg)->where('e101_d3', 2)->sum('e101_d5');
        $totalb2 = DB::table("e101_d")->where('e101_reg', $user->e101_reg)->where('e101_d3', 2)->sum('e101_d6');
        $totalb3 = DB::table("e101_d")->where('e101_reg', $user->e101_reg)->where('e101_d3', 2)->sum('e101_d7');
        $totalb4 = DB::table("e101_d")->where('e101_reg', $user->e101_reg)->where('e101_d3', 2)->sum('e101_d8');
        // dd($penyata);

        // $kodsl = KodSl::all();
        // dd($kodsl);
        // $selectedKod = E101D::with('e101init', 'prodcat', 'kodsl')->where('e101_d3', $kodsl->catid)->get();
        // dd($selectedKod);


        return view('users.KilangPenapis.penapis-bahagian-v', compact('returnArr', 'layout', 'user', 'penyata', 'penyata2',
        'totala', 'totala2', 'totala3', 'totala4' ,'totalb', 'totalb2', 'totalb3', 'totalb4'));
    }






    public function penapis_add_bahagian_v(Request $request)
    {
        // dd($request->all());
        $user = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');

        $penyata = E101D::with('e101init', 'prodcat', 'kodsl')->where('e101_reg', $user->e101_reg)->where('e101_d3', $request->e101_d3)
        ->where('e101_d4', $request->e101_d4)->first();
        if ($penyata) {
            return redirect()->back()->with("error", "Produk telah Tersedia");
        }
        else{

        $this->validation_bahagian_v($request->all())->validate();
        $this->store_bahagian_v($request->all());

        return redirect()->route('penapis.bahagianv')->with('success', 'Maklumat sudah ditambah');
        }
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
        $e101_reg = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');

        $semak_duplicate = E101D::where('e101_reg',$e101_reg->e101_reg)->where('e101_d3', $request->e101_d3)->where('e101_d4',$request->e101_d4)->first();

        if($semak_duplicate){
            return redirect()->route('penapis.bahagianv')
            ->with('error', 'Maklumat Telah Tersedia');
        }
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

    public function penapis_delete_bahagian_v($id)
    {
        $penyata = E101D::findOrFail($id);
        // dd($penyata);

        $penyata->delete();
        return redirect()->route('penapis.bahagianv')
        ->with('success','Produk Dihapuskan');
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

        $bulan = date("m") - 1;

        $tahun = date("Y");
        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $pelesen2 = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');


        $penyatai = E101B::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->get();
        // dd($penyatai);

        $totalib5 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b5');

                        //  dd($totalib5);

        $totalib6 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b6');

                        //  dd($totalib5);
        $totalib7 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b7');
                        //  dd($totalib5);
        $totalib8 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b8');
                        //  dd($totalib5);
        $totalib9 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b9');
                        //  dd($totalib5);
        $totalib10 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b10');
                        //  dd($totalib5);
        $totalib11 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b11');
                        //  dd($totalib5);
        $totalib12 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b12');
                        //  dd($totalib5);
        $totalib13 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b13');
                        //  dd($totalib5);
        $totalib14 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b14');
                        //  dd($totalib5);

        $penyataii = E101B::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->get();
        // dd($penyataii);

        $totaliib5 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b5');
        //  dd($totaliib5);
        $totaliib6 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b6');
        //  dd($totaliib5);
        $totaliib7 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b7');
        //  dd($totaliib5);
        $totaliib8 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b8');
        //  dd($totaliib5);
        $totaliib9 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b9');
        //  dd($totaliib5);
        $totaliib10 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b10');
        //  dd($totaliib5);
        $totaliib11 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b11');
        //  dd($totaliib5);
        $totaliib12 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b12');
        //  dd($totaliib5);
        $totaliib13 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b13');
        //  dd($totaliib5);
        $totaliib14 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b14');
        //  dd($totaliib5);

        $penyataiii = E101Init::where('e101_nl', auth()->user()->username)->first();
        // dd($penyataiii);

        $penyataiva = E101C::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3', '1')->get();
        // dd($penyataiva);

        $totalivac5 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c5');
        //   dd($totalivac5);
        $totalivac6 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c6');
        //   dd($totalivac5);
        $totalivac7 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c7');
        //   dd($totalivac5);
        $totalivac8 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c8');
        //   dd($totalivac5);
        $totalivac9 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c9');
        //   dd($totalivac5);
        $totalivac10 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c10');
        //   dd($totalivac5);

        $penyataivb = E101C::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3', 2)->get();
        // dd($penyataivb);

        $totalivbc5 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c5');
        //   dd($totalivac5);
        $totalivbc6 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c6');
        //   dd($totalivac5);
        $totalivbc7 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c7');
        //   dd($totalivac5);
        $totalivbc8 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c8');
        //   dd($totalivac5);
        $totalivbc9 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c9');
        //   dd($totalivac5);
        $totalivbc10 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c10');
        //   dd($totalivac5);

        $penyatava = E101D::with('e101init', 'prodcat')->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3', 1)->get();
        // dd($penyatava);
        $totalvad5 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','1')->sum('e101_d5');
        $totalvad6 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','1')->sum('e101_d6');
        $totalvad7 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','1')->sum('e101_d7');
        $totalvad8 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','1')->sum('e101_d8');


        $penyatavb = E101D::with('e101init', 'prodcat')->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3', 2)->get();
        // dd($penyatavb);
        $totalvbd5 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','2')->sum('e101_d5');
        $totalvbd6 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','2')->sum('e101_d6');
        $totalvbd7 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','2')->sum('e101_d7');
        $totalvbd8 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','2')->sum('e101_d8');

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
            'totalib5', 'totaliib5', 'totalivac5', 'totalivbc5', 'totalvad5', 'totalvbd5',
            'totalib6', 'totaliib6', 'totalivac6', 'totalivbc6', 'totalvad6', 'totalvbd6',
            'totalib7', 'totaliib7', 'totalivac7', 'totalivbc7', 'totalvad7', 'totalvbd7',
            'totalib8', 'totaliib8', 'totalivac8', 'totalivbc8', 'totalvad8', 'totalvbd8',
            'totalib9', 'totaliib9', 'totalivac9', 'totalivbc9',
            'totalib10', 'totaliib10', 'totalivac10', 'totalivbc10',
            'totalib11', 'totaliib11',
            'totalib12', 'totaliib12',
            'totalib13', 'totaliib13',
            'totalib14', 'totaliib14',
            'bulan','tahun'
        ));
    }


    public function penapis_hantar_penyata()
    {

        $breadcrumbs    = [
            ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('penapis.paparpenyata'), 'name' => "Penyata Bulanan"],
        ];

        $kembali = route('penapis.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kpenapis';

        $bulan = date("m") - 1;

        $tahun = date("Y");
        $date = date("d-m-Y");
        $user = User::first();
        $pelesen = Pelesen::where('e_nl', auth()->user()->username)->first();

        $pelesen2 = E101Init::where('e101_nl', auth()->user()->username)->first('e101_reg');


        $penyatai = E101B::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 01);
        })->get();
        // dd($penyatai);

        $totalib5 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b5');

                        //  dd($totalib5);

        $totalib6 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b6');

                        //  dd($totalib5);
        $totalib7 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b7');
                        //  dd($totalib5);
        $totalib8 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b8');
                        //  dd($totalib5);
        $totalib9 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b9');
                        //  dd($totalib5);
        $totalib10 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b10');
                        //  dd($totalib5);
        $totalib11 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b11');
                        //  dd($totalib5);
        $totalib12 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b12');
                        //  dd($totalib5);
        $totalib13 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b13');
                        //  dd($totalib5);
        $totalib14 = DB::table("e101_b")
                        ->where('e101_reg', $pelesen2->e101_reg)
                        ->where('e101_b3','1')
                        ->sum('e101_b14');
                        //  dd($totalib5);

        $penyataii = E101B::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', 02);
        })->get();
        // dd($penyataii);

        $totaliib5 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b5');
        //  dd($totaliib5);
        $totaliib6 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b6');
        //  dd($totaliib5);
        $totaliib7 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b7');
        //  dd($totaliib5);
        $totaliib8 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b8');
        //  dd($totaliib5);
        $totaliib9 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b9');
        //  dd($totaliib5);
        $totaliib10 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b10');
        //  dd($totaliib5);
        $totaliib11 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b11');
        //  dd($totaliib5);
        $totaliib12 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b12');
        //  dd($totaliib5);
        $totaliib13 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b13');
        //  dd($totaliib5);
        $totaliib14 = DB::table("e101_b")->where('e101_reg', $pelesen2->e101_reg)->where('e101_b3','2')->sum('e101_b14');
        //  dd($totaliib5);

        $penyataiii = E101Init::where('e101_nl', auth()->user()->username)->first();
        // dd($penyataiii);

        $penyataiva = E101C::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3', '1')->get();
        // dd($penyataiva);

        $totalivac5 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c5');
        //   dd($totalivac5);
        $totalivac6 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c6');
        //   dd($totalivac5);
        $totalivac7 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c7');
        //   dd($totalivac5);
        $totalivac8 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c8');
        //   dd($totalivac5);
        $totalivac9 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c9');
        //   dd($totalivac5);
        $totalivac10 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','1')->sum('e101_c10');
        //   dd($totalivac5);

        $penyataivb = E101C::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3', 2)->get();
        // dd($penyataivb);

        $totalivbc5 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c5');
        //   dd($totalivac5);
        $totalivbc6 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c6');
        //   dd($totalivac5);
        $totalivbc7 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c7');
        //   dd($totalivac5);
        $totalivbc8 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c8');
        //   dd($totalivac5);
        $totalivbc9 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c9');
        //   dd($totalivac5);
        $totalivbc10 = DB::table("e101_c")->where('e101_reg', $pelesen2->e101_reg)->where('e101_c3','2')->sum('e101_c10');
        //   dd($totalivac5);

        $penyatava = E101D::with('e101init', 'prodcat')->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3', 1)->get();
        // dd($penyatava);
        $totalvad5 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','1')->sum('e101_d5');
        $totalvad6 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','1')->sum('e101_d6');
        $totalvad7 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','1')->sum('e101_d7');
        $totalvad8 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','1')->sum('e101_d8');


        $penyatavb = E101D::with('e101init', 'prodcat')->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3', 2)->get();
        // dd($penyatavb);
        $totalvbd5 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','2')->sum('e101_d5');
        $totalvbd6 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','2')->sum('e101_d6');
        $totalvbd7 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','2')->sum('e101_d7');
        $totalvbd8 = DB::table("e101_d")->where('e101_reg', $pelesen2->e101_reg)->where('e101_d3','2')->sum('e101_d8');

        $penyatavii = E101E::with('e101init', 'produk')->where('e101_reg', $pelesen2->e101_reg)->where('e101_e3', 1)->get();
        // dd($penyatavii);




        return view('users.KilangPenapis.penapis-hantar-penyata', compact(
            'layout',
            'returnArr', 'date',
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
            'totalib5', 'totaliib5', 'totalivac5', 'totalivbc5', 'totalvad5', 'totalvbd5',
            'totalib6', 'totaliib6', 'totalivac6', 'totalivbc6', 'totalvad6', 'totalvbd6',
            'totalib7', 'totaliib7', 'totalivac7', 'totalivbc7', 'totalvad7', 'totalvbd7',
            'totalib8', 'totaliib8', 'totalivac8', 'totalivbc8', 'totalvad8', 'totalvbd8',
            'totalib9', 'totaliib9', 'totalivac9', 'totalivbc9',
            'totalib10', 'totaliib10', 'totalivac10', 'totalivbc10',
            'totalib11', 'totaliib11',
            'totalib12', 'totaliib12',
            'totalib13', 'totaliib13',
            'totalib14', 'totaliib14',
            'bulan','tahun'
        ));
    }


    public function penapis_update_papar_penyata(Request $request, $id)
    {
        // dd($request->all());


        $penyata = E101Init::findOrFail($id);
        $penyata->e101_npg = $request->e101_npg;
        $penyata->e101_jpg = $request->e101_jpg;
        $penyata->e101_notel = $request->e101_notel;
        $penyata->save();


        return redirect()->route('penapis.hantar.penyata')
            ->with('success', 'Penyata Sudah Dihantar');

    }


    // public function penapis_email()
    // {

    //     $breadcrumbs    = [
    //         ['link' => route('penapis.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('penapis.email'), 'name' => "Emel Pertanyaan / Pindaan / Cadangan  "],
    //     ];

    //     $kembali = route('penapis.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.kpenapis';



    //     return view('users.KilangPenapis.penapis-email', compact('returnArr', 'layout'));
    // }


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

        if($users){
        $i = H101B::with('h101init', 'produk')->where('e101_nobatch', $users->e101_nobatch)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '01');
        })->get();
        // dd($i);
        $totalib5 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b5');

                        //   dd($totalib5);

        $totalib6 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b6');

                        //  dd($totalib5);
        $totalib7 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b7');
                        //  dd($totalib5);
        $totalib8 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b8');
                        //  dd($totalib5);
        $totalib9 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b9');
                        //  dd($totalib5);
        $totalib10 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b10');
                        //  dd($totalib5);
        $totalib11 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b11');
                        //  dd($totalib5);
        $totalib12 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b12');
                        //  dd($totalib5);
        $totalib13 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b13');
                        //  dd($totalib5);
        $totalib14 = DB::table("h101_b")
                        ->where('e101_nobatch', $users->e101_nobatch)
                        ->where('e101_b3','1')
                        ->sum('e101_b14');
                        //  dd($totalib5);

        $ii = H101B::with('h101init', 'produk')->where('e101_nobatch', $users->e101_nobatch)->whereHas('produk', function ($query) {
            return $query->where('prodcat', '=', '02');
        })->get();
        $totaliib5 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b5');
        //  dd($totaliib5);
        $totaliib6 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b6');
        //  dd($totaliib5);
        $totaliib7 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b7');
        //  dd($totaliib5);
        $totaliib8 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b8');
        //  dd($totaliib5);
        $totaliib9 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b9');
        //  dd($totaliib5);
        $totaliib10 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b10');
        //  dd($totaliib5);
        $totaliib11 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b11');
        //  dd($totaliib5);
        $totaliib12 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b12');
        //  dd($totaliib5);
        $totaliib13 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b13');
        //  dd($totaliib5);
        $totaliib14 = DB::table("h101_b")->where('e101_nobatch', $users->e101_nobatch)->where('e101_b3','2')->sum('e101_b14');
        //  dd($totaliib5);

        $iii = H101Init::where('e101_nl', auth()->user()->username)->first();
        // dd($iii);
        $iva = H101C::with('h101init', 'produk')->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','1')->get();

        $ivb = H101C::with('h101init', 'produk')->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','2')->get();
        // dd($iv);

        $totalivac5 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','1')->sum('e101_c5');
        //   dd($totalivac5);
        $totalivac6 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','1')->sum('e101_c6');
        //   dd($totalivac5);
        $totalivac7 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','1')->sum('e101_c7');
        //   dd($totalivac5);
        $totalivac8 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','1')->sum('e101_c8');
        //   dd($totalivac5);
        $totalivac9 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','1')->sum('e101_c9');
        //   dd($totalivac5);
        $totalivac10 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','1')->sum('e101_c10');
        //   dd($totalivac5);

        $totalivbc5 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','2')->sum('e101_c5');
        //   dd($totalivac5);
        $totalivbc6 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','2')->sum('e101_c6');
        //   dd($totalivac5);
        $totalivbc7 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','2')->sum('e101_c7');
        //   dd($totalivac5);
        $totalivbc8 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','2')->sum('e101_c8');
        //   dd($totalivac5);
        $totalivbc9 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','2')->sum('e101_c9');
        //   dd($totalivac5);
        $totalivbc10 = DB::table("h101_c")->where('e101_nobatch', $users->e101_nobatch)->where('e101_c3','2')->sum('e101_c10');
        //   dd($totalivac5);

        $va = H101D::with('h101init','prodcat')->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3', '1')->get();
        // dd($va);

        $totalvad5 = DB::table("h101_d")->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3','1')->sum('e101_d5');
        $totalvad6 = DB::table("h101_d")->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3','1')->sum('e101_d6');
        $totalvad7 = DB::table("h101_d")->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3','1')->sum('e101_d7');
        $totalvad8 = DB::table("h101_d")->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3','1')->sum('e101_d8');


        $vb = H101D::with('h101init', 'prodcat')->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3', '2')->get();
        $totalvbd5 = DB::table("h101_d")->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3','2')->sum('e101_d5');
        $totalvbd6 = DB::table("h101_d")->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3','2')->sum('e101_d6');
        $totalvbd7 = DB::table("h101_d")->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3','2')->sum('e101_d7');
        $totalvbd8 = DB::table("h101_d")->where('e101_nobatch', $users->e101_nobatch)->where('e101_d3','2')->sum('e101_d8');
    } else {
        return redirect()->back()->with('error', 'Penyata Tidak Wujud!');
    }

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

        return view('users.KilangPenapis.penapis-papar-dahulu', compact(
            'returnArr',
            'layout',
            'user',
            'pelesen',
            'users',
            'i',
            'ii',
            'iii',
            'iva', 'ivb',
            'va',
            'vb',
            'totalib5', 'totaliib5', 'totalivac5', 'totalivbc5', 'totalvad5', 'totalvbd5',
            'totalib6', 'totaliib6', 'totalivac6', 'totalivbc6', 'totalvad6', 'totalvbd6',
            'totalib7', 'totaliib7', 'totalivac7', 'totalivbc7', 'totalvad7', 'totalvbd7',
            'totalib8', 'totaliib8', 'totalivac8', 'totalivbc8', 'totalvad8', 'totalvbd8',
            'totalib9', 'totaliib9', 'totalivac9', 'totalivbc9',
            'totalib10', 'totaliib10', 'totalivac10', 'totalivbc10',
            'totalib11', 'totaliib11',
            'totalib12', 'totaliib12',
            'totalib13', 'totaliib13',
            'totalib14', 'totaliib14',
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

    public function penapis_send_email_proses (Request $request)
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
