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
        ]);
    }

    public function admin_senaraipelesenbuah()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 1)->get();



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

}
