<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\E07Init;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;

class Proses3Controller extends Controller
{

    public function admin_3daftarpenyata()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatapenapis()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-penapis', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyataisirung()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-isirung', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyataoleokimia()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-oleokimia', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatasimpanan()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-simpanan', compact('returnArr', 'layout'));
    }

    public function admin_3daftarpenyatabiodiesel()

    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.3daftarpenyata'), 'name' => "Daftar Penyata Bulanan Baru"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses3.3daftar-penyata-biodiesel', compact('returnArr', 'layout'));
    }

    public function admin_initialize(Request $request)
    {
        // dd($request->e_tahun);
        $this->initialize_proses_pl91($request->e_tahun, $request->e_bulan, $request->e_ddate);
        $this->initialize_proses_pl101($request->e_tahun, $request->e_bulan, $request->e_ddate);
        $this->initialize_proses_pl102($request->e_tahun, $request->e_bulan, $request->e_ddate);
        $this->initialize_proses_pl104($request->e_tahun, $request->e_bulan, $request->e_ddate);
        $this->initialize_proses_pl111($request->e_tahun, $request->e_bulan, $request->e_ddate);
        // $this->initialize_proses_plbio($request->e_tahun, $e_bulan, $e_ddate);
        return redirect()->back()->with('success', 'Penyata telah diinitialize');
    }

    public function initialize_proses_pl91($e_tahun, $e_bulan, $e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL91')->where('e_status', '1')->get();

        $e91_init = DB::table('e91_init')->delete();
        $e91b = DB::table('e91b')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E91Init::create([
                'e91_reg' => $key + 1,
                'e91_nl' => $e_nl,
                'e91_bln' => $e_bulan,
                'e91_thn' => $e_tahun,
                'e91_flg' => '1',
                'e91_sdate' => NULL,
                'e91_ddate' => $e_ddate,
                'e91_aa1' => NULL,
                'e91_aa2' => NULL,
                'e91_aa3' => NULL,
                'e91_aa4' => NULL,
                'e91_ab1' => NULL,
                'e91_ab2' => NULL,
                'e91_ab3' => NULL,
                'e91_ab4' => NULL,
                'e91_ac1' => NULL,
                'e91_ad1' => NULL,
                'e91_ad2' => NULL,
                'e91_ad3' => NULL,
                'e91_ae1' => NULL,
                'e91_ae2' => NULL,
                'e91_ae3' => NULL,
                'e91_ae4' => NULL,
                'e91_af1' => NULL,
                'e91_af2' => NULL,
                'e91_af3' => NULL,
                'e91_ag1' => NULL,
                'e91_ag2' => NULL,
                'e91_ag3' => NULL,
                'e91_ag4' => NULL,
                'e91_ah1' => NULL,
                'e91_ah2' => NULL,
                'e91_ah3' => NULL,
                'e91_ah4' => NULL,
                'e91_ai1' => NULL,
                'e91_ai2' => NULL,
                'e91_ai3' => NULL,
                'e91_ai4' => NULL,
                'e91_ai5' => NULL,
                'e91_ai6' => NULL,
                'e91_aj1' => NULL,
                'e91_aj2' => NULL,
                'e91_aj3' => NULL,
                'e91_aj4' => NULL,
                'e91_aj5' => NULL,
                'e91_aj6' => NULL,
                'e91_aj7' => NULL,
                'e91_aj8' => NULL,
                'e91_ak1' => NULL,
                'e91_ak2' => NULL,
                'e91_ak3' => NULL,
                'e91_npg' => NULL,
                'e91_jpg' => NULL,
                'e91_flagcetak' => NULL,
                'e91_ah5' => NULL,
                'e91_ah6' => NULL,
                'e91_ah7' => NULL,
                'e91_ah8' => NULL,
                'e91_ah9' => NULL,
                'e91_ah10' => NULL,
                'e91_ah11' => NULL,
                'e91_ah12' => NULL,
                'e91_ah13' => NULL,
                'e91_ah14' => NULL,
                'e91_ah15' => NULL,
                'e91_ah16' => NULL,
                'e91_ah17' => NULL,
                'e91_ah18' => NULL,
            ]);
        }
    }

    public function initialize_proses_pl101($e_tahun, $e_bulan, $e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL101')->where('e_status', '1')->get();

        $e101_init = DB::table('e101_init')->delete();
        $e101_b = DB::table('e101_b')->delete();
        $e101_c = DB::table('e101_c')->delete();
        $e101_d = DB::table('e101_d')->delete();
        $e101_e = DB::table('e101_e')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E101Init::create([
                'e101_reg' => $key + 1,
                'e101_nl' => $e_nl,
                'e101_bln' => $e_bulan,
                'e101_thn' => $e_tahun,
                'e101_flg' => '1',
                'e101_sdate' => NULL,
                'e101_ddate' => $e_ddate,
                'e101_a1' => NULL,
                'e101_a2' => NULL,
                'e101_a3' => NULL,
                'e101_npg' => NULL,
                'e101_jpg' => NULL,
                'e101_flagcetak' => NULL,
            ]);
        }
    }

    public function initialize_proses_pl102($e_tahun, $e_bulan, $e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL102')->where('e_status', '1')->get();

        $e102_init = DB::table('e102_init')->delete();
        $e102b = DB::table('e102b')->delete();
        $e102c = DB::table('e102c')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E102Init::create([
                'e102_reg' => $key + 1,
                'e102_nl' => $e_nl,
                'e102_bln' => $e_bulan,
                'e102_thn' => $e_tahun,
                'e102_flg' => '1',
                'e102_sdate' => NULL,
                'e102_ddate' => $e_ddate,
                'e102_aa1' => NULL,
                'e102_aa2' => NULL,
                'e102_aa3' => NULL,
                'e102_ab1' => NULL,
                'e102_ab2' => NULL,
                'e102_ab3' => NULL,
                'e102_ac1' => NULL,
                'e102_ac2' => NULL,
                'e102_ac3' => NULL,
                'e102_ad1' => NULL,
                'e102_ad2' => NULL,
                'e102_ad3' => NULL,
                'e102_ae1' => NULL,
                'e102_af2' => NULL,
                'e102_af3' => NULL,
                'e102_ag1' => NULL,
                'e102_ag2' => NULL,
                'e102_ag3' => NULL,
                'e102_ah1' => NULL,
                'e102_ah2' => NULL,
                'e102_ah3' => NULL,
                'e102_ai1' => NULL,
                'e102_ai2' => NULL,
                'e102_ai3' => NULL,
                'e102_aj1' => NULL,
                'e102_aj2' => NULL,
                'e102_aj3' => NULL,
                'e102_ak1' => NULL,
                'e102_ak2' => NULL,
                'e102_ak3' => NULL,
                'e102_al1' => NULL,
                'e102_al2' => NULL,
                'e102_al3' => NULL,
                'e102_al4' => NULL,
                'e102_npg' => NULL,
                'e102_jpg' => NULL,
                'e102_flagcetak' => NULL,
                'e102_ae3' => NULL,
            ]);
        }
    }
    public function initialize_proses_pl104($e_tahun, $e_bulan, $e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL104')->where('e_status', '1')->get();

        $e101_init = DB::table('e104_init')->delete();
        $e104_b = DB::table('e104_b')->delete();
        $e104_c = DB::table('e104_c')->delete();
        $e104_d = DB::table('e104_d')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E104Init::create([
                'e104_reg' => $key + 1,
                'e104_nl' => $e_nl,
                'e104_bln' => $e_bulan,
                'e104_thn' => $e_tahun,
                'e104_flg' => '1',
                'e104_sdate' => NULL,
                'e104_ddate' => $e_ddate,
                'e104_a5' => NULL,
                'e104_a6' => NULL,
                'e104_npg' => NULL,
                'e104_jpg' => NULL,
                'e104_flagcetak' => NULL,
            ]);
        }
    }
    public function initialize_proses_pl111($e_tahun, $e_bulan, $e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL111')->where('e_status', '1')->get();

        $e07_init = DB::table('e07_init')->delete();
        $e07_btranshipment = DB::table('e07_btranshipment')->delete();
        $e07_transhipment = DB::table('e07_transhipment')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E07Init::create([
                'e07_reg' => $key + 1,
                'e07_nl' => $e_nl,
                'e07_bln' => $e_bulan,
                'e07_thn' => $e_tahun,
                'e07_flg' => '1',
                'e07_sdate' => NULL,
                'e07_ddate' => $e_ddate,
                'e07_npg' => NULL,
                'e07_jpg' => NULL,
                'e07_flagcetak' => NULL,
            ]);
        }
    }

    public function admin_initialize_satu(Request $request)
    {
        // dd($request->e_tahun);
        $reg_pelesen = RegPelesen::where('e_nl', $request->e_initlesen)->where('e_status', '1')->first();
        // dd($reg_pelesen);
        $count = RegPelesen::count();
        $e91_init = E91Init::where('e91_nl', $request->e_initlesen)->first();
        $e101_init = E101Init::where('e101_nl', $request->e_initlesen)->first();
        $e102_init = E102Init::where('e102_nl', $request->e_initlesen)->first();
        $e104_init = E104Init::where('e104_nl', $request->e_initlesen)->first();
        $e07_init = E07Init::where('e07_nl', $request->e_initlesen)->first();

        if ($reg_pelesen->e_kat == 'PL91') {
            if ($e91_init) {
                return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
            }   else{
                $e_nl = $reg_pelesen->e_nl;

                $query = E91Init::create([
                    'e91_reg' => $count + 1,
                    'e91_nl' => $request->e_initlesen,
                    'e91_bln' => $request->e_bulan,
                    'e91_thn' => $request->e_tahun,
                    'e91_flg' => '1',
                    'e91_sdate' => NULL,
                    'e91_ddate' => $request->e_ddate,
                    'e91_aa1' => NULL,
                    'e91_aa2' => NULL,
                    'e91_aa3' => NULL,
                    'e91_aa4' => NULL,
                    'e91_ab1' => NULL,
                    'e91_ab2' => NULL,
                    'e91_ab3' => NULL,
                    'e91_ab4' => NULL,
                    'e91_ac1' => NULL,
                    'e91_ad1' => NULL,
                    'e91_ad2' => NULL,
                    'e91_ad3' => NULL,
                    'e91_ae1' => NULL,
                    'e91_ae2' => NULL,
                    'e91_ae3' => NULL,
                    'e91_ae4' => NULL,
                    'e91_af1' => NULL,
                    'e91_af2' => NULL,
                    'e91_af3' => NULL,
                    'e91_ag1' => NULL,
                    'e91_ag2' => NULL,
                    'e91_ag3' => NULL,
                    'e91_ag4' => NULL,
                    'e91_ah1' => NULL,
                    'e91_ah2' => NULL,
                    'e91_ah3' => NULL,
                    'e91_ah4' => NULL,
                    'e91_ai1' => NULL,
                    'e91_ai2' => NULL,
                    'e91_ai3' => NULL,
                    'e91_ai4' => NULL,
                    'e91_ai5' => NULL,
                    'e91_ai6' => NULL,
                    'e91_aj1' => NULL,
                    'e91_aj2' => NULL,
                    'e91_aj3' => NULL,
                    'e91_aj4' => NULL,
                    'e91_aj5' => NULL,
                    'e91_aj6' => NULL,
                    'e91_aj7' => NULL,
                    'e91_aj8' => NULL,
                    'e91_ak1' => NULL,
                    'e91_ak2' => NULL,
                    'e91_ak3' => NULL,
                    'e91_npg' => NULL,
                    'e91_jpg' => NULL,
                    'e91_flagcetak' => NULL,
                    'e91_ah5' => NULL,
                    'e91_ah6' => NULL,
                    'e91_ah7' => NULL,
                    'e91_ah8' => NULL,
                    'e91_ah9' => NULL,
                    'e91_ah10' => NULL,
                    'e91_ah11' => NULL,
                    'e91_ah12' => NULL,
                    'e91_ah13' => NULL,
                    'e91_ah14' => NULL,
                    'e91_ah15' => NULL,
                    'e91_ah16' => NULL,
                    'e91_ah17' => NULL,
                    'e91_ah18' => NULL,
                ]);
            }
         } elseif ($reg_pelesen->e_kat == 'PL101') {
            if ($e101_init) {
                return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
            }   else{
                $query = E101Init::create([
                    'e101_reg' => $count + 1,
                    'e101_nl' => $request->e_initlesen,
                    'e101_bln' => $request->e_bulan,
                    'e101_thn' => $request->e_tahun,
                    'e101_flg' => '1',
                    'e101_sdate' => NULL,
                    'e101_ddate' => $request->e_ddate,
                    'e101_a1' => NULL,
                    'e101_a2' => NULL,
                    'e101_a3' => NULL,
                    'e101_npg' => NULL,
                    'e101_jpg' => NULL,
                    'e101_flagcetak' => NULL,
                ]);
            }
        } elseif ($reg_pelesen->e_kat == 'PL102'){

            if ($e102_init) {
                return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
            }   else{
                $query = E102Init::create([
                    'e102_reg' => $count + 1,
                    'e102_nl' => $request->e_initlesen,
                    'e102_bln' => $request->e_bulan,
                    'e102_thn' => $request->e_tahun,
                    'e102_flg' => '1',
                    'e102_sdate' => NULL,
                    'e102_ddate' => $request->e_ddate,
                    'e102_aa1' => NULL,
                    'e102_aa2' => NULL,
                    'e102_aa3' => NULL,
                    'e102_ab1' => NULL,
                    'e102_ab2' => NULL,
                    'e102_ab3' => NULL,
                    'e102_ac1' => NULL,
                    'e102_ac2' => NULL,
                    'e102_ac3' => NULL,
                    'e102_ad1' => NULL,
                    'e102_ad2' => NULL,
                    'e102_ad3' => NULL,
                    'e102_ae1' => NULL,
                    'e102_af2' => NULL,
                    'e102_af3' => NULL,
                    'e102_ag1' => NULL,
                    'e102_ag2' => NULL,
                    'e102_ag3' => NULL,
                    'e102_ah1' => NULL,
                    'e102_ah2' => NULL,
                    'e102_ah3' => NULL,
                    'e102_ai1' => NULL,
                    'e102_ai2' => NULL,
                    'e102_ai3' => NULL,
                    'e102_aj1' => NULL,
                    'e102_aj2' => NULL,
                    'e102_aj3' => NULL,
                    'e102_ak1' => NULL,
                    'e102_ak2' => NULL,
                    'e102_ak3' => NULL,
                    'e102_al1' => NULL,
                    'e102_al2' => NULL,
                    'e102_al3' => NULL,
                    'e102_al4' => NULL,
                    'e102_npg' => NULL,
                    'e102_jpg' => NULL,
                    'e102_flagcetak' => NULL,
                    'e102_ae3' => NULL,
                ]);
            }
            }  elseif ($reg_pelesen->e_kat == 'PL104'){

                if ($e104_init) {
                    return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
                }   else{
                $query = E104Init::create([
                    'e104_reg' => $count + 1,
                    'e104_nl' => $request->e_initlesen,
                    'e104_bln' => $request->e_bulan,
                    'e104_thn' => $request->e_tahun,
                    'e104_flg' => '1',
                    'e104_sdate' => NULL,
                    'e104_ddate' => $request->e_ddate,
                    'e104_a5' => NULL,
                    'e104_a6' => NULL,
                    'e104_npg' => NULL,
                    'e104_jpg' => NULL,
                    'e104_flagcetak' => NULL,
                ]);
            }

            } elseif ($reg_pelesen->e_kat == 'PL111')
            {
                if ($e07_init) {
                    return redirect()->back()->with('error', 'Pelesen ini sudah diinitialize');
                }   else{
                $query = E07Init::create([
                    'e07_reg' => $count + 1,
                    'e07_nl' => $request->e_initlesen,
                    'e07_bln' => $request->e_bulan,
                    'e07_thn' => $request->e_tahun,
                    'e07_flg' => '1',
                    'e07_sdate' => NULL,
                    'e07_ddate' => $request->e_ddate,
                    'e07_npg' => NULL,
                    'e07_jpg' => NULL,
                    'e07_flagcetak' => NULL,
                ]);
            }
        }

        // $this->initialize_proses_plbio($request->e_tahun, $e_bulan, $e_ddate);
        return redirect()->back()->with('success', 'Penyata pelesen ini telah diinitialize');
    }
}
