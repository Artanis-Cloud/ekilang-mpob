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

class Proses12Controller extends Controller
{


    public function admin_12validation()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.12validation'), 'name' => "Validasi"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses12.12validation', compact('returnArr', 'layout'));
    }

    public function admin_validasi_proses(Request $request)
    {
        // dd($request->all());
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $sektor = $request->e_kat;

        //kilang buah
        if ($sektor == 'PL91') {
            $query1 = DB::connection('mysql4')->select("SELECT p.F911B as nobatch,l.F201A as nolesen,l.F201T as nama,l.F201U4 as kodnegeri,codedb.negeri.nama_negeri, round(p.F911J1,2) as cpo_prod,round(p.F911J2,2) as pk_prod,round(p.F911I,2) as ffb_proc FROM pldb.PL911P3 AS p
			INNER JOIN licensedb.license as l ON p.F911A = l.F201A
			INNER JOIN codedb.negeri ON l.F201U4 = codedb.negeri.kod_negeri
			where p.F911A = l.F201A and
            p.F911D = '$tahun' and
            p.F911C = '$bulan' and
            (round(p.F911J1,2) > 0 or round(p.F911J2,2)> 0) and
            (p.F911I in (0) or p.F911I is null)
			group by p.F911D, p.F911C, l.F201U4, l.F201U2");


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.12validation'), 'name' => "Validasi"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        // $this->validation_tambah_pembeli($request->all())->validate();
        // $this->store_tambah_pembeli($request->all());
        return view('admin.proses12.12-view', compact('returnArr', 'layout', 'tahun','bulan', 'sektor','query1'));
    } else {
        return redirect()->back()->with('error', 'Data tidak wujud!');

    }


        // return redirect()->back()->with('success', 'Pembeli sudah ditambah');
    }

    // protected function validation_direktori(array $data)
    // {
    //     return Validator::make($data, [
    //         'e_kat' => ['required', 'string'],
    //         'nama_negeri' => ['required', 'string'],
    //     ]);
    // }

}
