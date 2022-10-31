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
        $blnthn = $bulan . $tahun;

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

            $query2 =  DB::connection('mysql4')->select("SELECT p.F911B as nobatch,p.F911A as nolesen,l.F201T as nama,c.nama_negeri,p.F911C,p.F911D,m.cap_lesen,m.cap_kat
            FROM pldb.PL911P3 AS p
            left JOIN licensedb.license as l ON p.F911A = l.F201A
            left JOIN codedb.negeri as c ON l.F201U4 = c.kod_negeri
            LEFT JOIN lesen_master.mpku_caps as m ON p.F911A = m.cap_lesen and m.cap_mmyyyy = '$blnthn' and m.cap_kat='04'
            WHERE
            p.F911D = '$tahun' AND
            p.F911C = '$bulan'  AND
            (m.cap_lesen is null or l.F201A is null) AND
            p.F911I> 0");



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
            return view('admin.proses12.12-view', compact('returnArr', 'layout', 'tahun','bulan', 'sektor','query1','query2'));


        } elseif ($sektor == 'PL101') {
            $query1 =  DB::connection('mysql4')->select("SELECT a.F101A4 as nobatch, l.F201A as nolesen,l.F201T AS nama,c.kod_negeri,c.nama_negeri,m.cap_lesen,m.cap_kat,m.cap_lulus,
				SUM(CASE  WHEN b.F101B3 = '1' THEN  b.F101B10 ELSE NULL END)  AS minyaksawit_proses,
				SUM(CASE  WHEN b.F101B3 = '2' THEN  b.F101B10 ELSE NULL END)  AS minyakisirong_proses
				FROM
				pldb.pl101bp3 AS b
				LEFT JOIN pldb.pl101ap3 AS a ON b.F101B2 = a.F101A4
				LEFT JOIN licensedb.license AS l ON l.F201A = a.F101A1
				LEFT JOIN codedb.negeri AS c ON l.F201U4 = c.kod_negeri
				LEFT JOIN lesen_master.mpku_caps as m ON a.F101A1 = m.cap_lesen AND m.cap_mmyyyy = '$blnthn' AND m.cap_kat = '06'
				WHERE
				a.F101A6 = '$tahun' AND
				a.F101A5 = '$bulan' and
				(m.cap_lesen IS null OR
				 cap_lulus=0)
				group by l.F201A,nama,c.kod_negeri,c.nama_negeri,m.cap_lesen,m.cap_kat,m.cap_lulus HAVING minyaksawit_proses>0 or minyakisirong_proses>0
				order by l.F201A");



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

        } elseif ($sektor == 'PL102') {
            $query1 =  DB::connection('mysql4')->select("SELECT p.F1021B as nobatch,p.F1021A as nolesen,l.F201T as nama,c.nama_negeri,p.F1021D,p.F1021C,m.cap_lesen,m.cap_kat
				FROM pldb.pl1021p3  AS p
				left JOIN licensedb.license as l ON p.F1021A = l.F201A
				left JOIN codedb.negeri as c ON l.F201U4 = c.kod_negeri
				LEFT JOIN lesen_master.mpku_caps as m ON p.F1021A = m.cap_lesen and m.cap_mmyyyy = '$blnthn' and m.cap_kat='05'
				WHERE
				p.F1021D = '$tahun' AND
				p.F1021C = '$bulan'  AND
				 (m.cap_lesen is null or l.F201A is null) AND
				 p.F1021K> 0");



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

        } elseif ($sektor == 'PL104') {
            $query1 =  DB::connection('mysql4')->select("SELECT a.F104A4 as nobatch, l.F201A as nolesen,l.F201T AS nama,c.kod_negeri,c.nama_negeri,m.cap_lesen,m.cap_kat,m.cap_lulus,
                SUM(CASE  WHEN b.F104B3 = '1' THEN  b.F104B10 ELSE NULL END)  AS minyaksawit_proses,
                SUM(CASE  WHEN b.F104B3 = '2' THEN  b.F104B10 ELSE NULL END)  AS minyakisirong_proses,
                SUM(CASE  WHEN b.F104B3 = '3' THEN  b.F104B10 ELSE NULL END)  AS lainlain_proses
                FROM
                pldb.pl104bp1 AS b
                LEFT JOIN pldb.pl104ap1 AS a ON b.F104B2 = a.F104A4
                LEFT JOIN licensedb.license AS l ON l.F201A = a.F104A1
                LEFT JOIN codedb.negeri AS c ON l.F201U4 = c.kod_negeri
                LEFT JOIN lesen_master.mpku_caps as m ON a.F104A1 = m.cap_lesen AND m.cap_mmyyyy = '$blnthn' AND m.cap_kat = '06'
                WHERE
                a.F104A6 = '$tahun' AND
                a.F104A5 = '$bulan' and
                (m.cap_lesen IS null OR
                cap_lulus=0)
                group by l.F201A,nama,c.kod_negeri,c.nama_negeri,m.cap_lesen,m.cap_kat,m.cap_lulus HAVING minyaksawit_proses>0 or minyakisirong_proses>0 or lainlain_proses>0
                order by l.F201A");



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
        }
        else {
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
