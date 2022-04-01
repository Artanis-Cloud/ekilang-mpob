<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class Proses1Controller extends Controller
{
    public function admin_login()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.admin-login');
    }


    public function admin_1daftarpelesen()
    {
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Maklumat Asas Pelesen"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Daftar Pelesen Baru"],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses1.1daftarpelesen', compact('returnArr', 'layout', 'negeri'));
    }

    public function admin_1daftarpelesen_proses(Request $request)
    {
        $this->validation_daftar_pelesen($request->all())->validate();
        $this->store_daftar_pelesen($request->all());

        return redirect()->route('admin.senaraipelesenbuah')->with('success', 'Maklumat Pelesen sudah ditambah');
    }

    protected function validation_daftar_pelesen(array $data)
    {
        return Validator::make($data, [
            'jenis_kilang' => ['required', 'string'],
            'status_ekilang' => ['required', 'string'],
            'status_emingguan' => ['required', 'string'],
            'status_direktori' => ['required', 'string'],
            'kod_negeri' => ['required', 'string'],
            'nombor_siri' => ['required', 'string'],
            'nombor_lesen' => ['required', 'string'],
            'nama_premis' => ['required', 'string'],
            'alamat_premis_1' => ['required', 'string' ],
            'alamat_premis_2' => ['required', 'string'],
            'alamat_premis_3' => ['required', 'string'],
            'alamat_surat_1' => ['required', 'string'],
            'alamat_surat_2' => ['required', 'string'],
            'alamat_surat_3' => ['required', 'string'],
            'no_tel_kilang' => ['required', 'string'],
            'no_faks_kilang' => ['required', 'string'],
            'emel_kilang' => ['required', 'string'],
            'nama_pegawai_lapor' => ['required', 'string'],
            'jawatan_pegawai_lapor' => ['required', 'string'],
            'no_pegawai_lapor' => ['required', 'string'],
            'nama_pegawai_jawab' => ['required', 'string'],
            'jawatan_pegawai_jawab' => ['required', 'string'],
            'emel_pengurus' => ['required', 'string'],
            'negeri' => ['required', 'string'],
            'daerah_id' => ['required', 'string'],
            'kawasan_id' => ['required', 'string'],
            'syarikat_induk' => ['required', 'string'],
            'tahun_operasi' => ['required', 'string'],
            'kumpulan' => ['required', 'string'],
            'poma' => ['required', 'string'],
            'sub_poma' => ['required', 'string'],


        ]);
    }

    protected function store_daftar_pelesen(array $data)
    {
        return Pelesen::create([
            'e_nl' => $data['nombor_lesen'],
            'e_np' => $data['nama_premis'],
            'e_ap1' => $data['alamat_premis_1'],
            'e_ap2' => $data['alamat_premis_2'],
            'e_ap3' => $data['alamat_premis_3'],
            'e_as1' => $data['alamat_surat_1'],
            'e_as2' => $data['alamat_surat_2'],
            'e_as3' => $data['alamat_surat_3'],
            'e_notel' => $data['no_tel_kilang'],
            'e_nofax' => $data['no_faks_kilang'],
            'e_email' => $data['emel_kilang'],
            'e_npg' => $data['nama_pegawai_lapor'],
            'e_jpg' => $data['jawatan_pegawai_lapor'],
            'kodpgw' => $data['kod_negeri'],
            'nosiri' => $data['nombor_siri'],
            'e_npgtg' => $data['nama_pegawai_jawab'],
            'e_jpgtg' => $data['jawatan_pegawai_jawab'],
            // 'eqc_npg' => $data['alamat_premis_3'],
            // 'eqc_jpg' => $data['alamat_premis_3'],
            // 'eqc_email' => $data['alamat_premis_3'],
            // 'e_asnegeri' => $data['alamat_premis_3'],
            // 'e_asdaerah' => $data['alamat_premis_3'],
            'e_negeri' => $data['negeri'],
            'e_daerah' => $data['daerah_id'],
            'e_kawasan' => $data['kawasan_id'],
            'e_syktinduk' => $data['syarikat_induk'],
            // 'stk_npg' => $data['alamat_premis_3'],
            // 'stk_notel' => $data['alamat_premis_3'],
            // 'stk_nofax' => $data['alamat_premis_3'],
            // 'stk_email' => $data['alamat_premis_3'],
            // 'stk_syktinduk' => $data['alamat_premis_3'],
            // 'stk_cpo_kap' => $data['alamat_premis_3'],
            // 'stk_rbdpo_kap' => $data['alamat_premis_3'],
            // 'stk_rbdpl_kap' => $data['alamat_premis_3'],
            // 'stk_rbdps_kap' => $data['alamat_premis_3'],
            // 'stk_lainppo_kap' => $data['alamat_premis_3'],
            // 'stk_ppo_kap' => $data['alamat_premis_3'],
            // 'stk_po_kap' => $data['alamat_premis_3'],
            // 'stk_pfad_kap' => $data['alamat_premis_3'],
            'e_group' => $data['kumpulan'],
            'e_subgroup' => $data['sub_poma'],
            'e_poma' => $data['poma'],
            'e_year' => $data['tahun_operasi'],
            // 'e_cluster' => $data['alamat_premis_3'],
            // 'e_katkilang' => $data['alamat_premis_3'],
            'e_status' => $data['jenis_kilang'],
            'e_email_pengurus' => $data['emel_pengurus'],
        ]);
    }

    public function admin_papar_maklumat($e_id, Pelesen $pelesen)
    {
        // dd($e_id);
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen Buah"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $nid = Ekmessage::where ('MsgID', $request->id)->first('MsgID');

        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $pelesen = Pelesen::find($e_id);
        // dd($pelesen);
        // $pengumuman = \DB::table('pengumuman')->get();
        // dd($id);

        return view('admin.proses1.papar-maklumat', compact('returnArr', 'layout', 'pelesen','negeri'));

        // return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_papar_maklumat_batal($e_id, Pelesen $pelesen)
    {
        // dd($e_id);
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbatalbuah'), 'name' => "Senarai Pelesen Buah Dibatalkan"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $nid = Ekmessage::where ('MsgID', $request->id)->first('MsgID');

        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $pelesen = Pelesen::find($e_id);
        // dd($pelesen);
        // $pengumuman = \DB::table('pengumuman')->get();
        // dd($id);

        return view('admin.proses1.papar-maklumat-batal', compact('returnArr', 'layout', 'pelesen','negeri'));

        // return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_senaraipelesenbuah()
    {
        //test data
        // $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 1)->where('e_id', 677)->get();

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 1)->get();
        // dd($users);
        // $pelesen = Pelesen::get();


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen Buah"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-buah', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenpenapis()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL101')->where('e_status', 1)->get();
        // dd($users);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen Penapis"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenisirung()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL102')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen Isirung"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenoleokimia()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL104')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen Oleokimia"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-oleokimia', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesensimpanan()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 1)->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen Pusat Simpanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenbio()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen E-Biodiesel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-bio', compact('returnArr', 'layout'));
    }

    public function admin_senaraipelesenbatalbuah()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen Buah"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-buah', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_penapis()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL101')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen Penapis"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenpenapis');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_isirung()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL102')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen Isirung"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenisirung');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_oleokimia()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL104')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen Oleokimia"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenoleokimia');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-oleokimia', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_simpanan()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen Pusat Simpanan"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesensimpanan');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_bio()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen E-Biodiesel"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenbio');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-bio', compact('returnArr', 'layout', 'users'));
    }

}
