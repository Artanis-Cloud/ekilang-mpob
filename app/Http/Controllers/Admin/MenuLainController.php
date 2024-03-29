<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditTrail;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\FailLain;
use App\Models\Negara;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\Produk;
use App\Models\RegPelesen;
use App\Models\ScLog;
use App\Models\SyarikatPembeli;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MenuLainController extends Controller
{

    public function admin_direktori()
    {
        $negeri = Negeri::get();


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.direktori'), 'name' => "Direktori"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.direktori', compact('returnArr', 'layout'));
    }


    protected function validation_direktori(array $data)
    {
        return Validator::make($data, [
            'e_kat' => ['required', 'string'],
            'nama_negeri' => ['required', 'string'],
        ]);
    }

    public function admin_direktori_process(Request $request)
    {

        $this->validation_direktori($request->all())->validate();

        $negeri = Negeri::where('kod_negeri', $request->nama_negeri)->first('nama_negeri');

        $negeri2 = $request->nama_negeri;
        if ($request->e_kat == 'PL91') {
            if ($request->nama_negeri == 'All') {
                $johor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '01'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kedah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '02'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kelantan = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '03'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $melaka = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '04'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $n9 = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '05'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $pahang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '06'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $perak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '07'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");


                $perlis = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '08'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $penang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '09'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $selangor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '10'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $terengganu = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '11'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $wp = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '12'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sabah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '13'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sarawak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and e.e_negeri= '14'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

            } else {
                $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r
                WHERE e.e_nl = r.e_nl
                and r.e_kat = 'PL91'
                and e.e_negeri= $request->nama_negeri
                and  r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,e.e_negeri");
            }
        } elseif ($request->e_kat == 'PL101') {
            if ($request->nama_negeri == 'All') {
                $johor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '01'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kedah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '02'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kelantan = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '03'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $melaka = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '04'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $n9 = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '05'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $pahang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '06'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $perak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '07'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");


                $perlis = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '08'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $penang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '09'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $selangor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '10'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $terengganu = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '11'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $wp = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '12'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sabah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '13'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sarawak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL101'
                and e.e_negeri= '14'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");
            } else {
                $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r
                WHERE e.e_nl = r.e_nl
                and r.e_kat = 'PL101'
                and e.e_negeri= $request->nama_negeri
                and  r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,e.e_negeri");
            }
        } elseif ($request->e_kat == 'PL102') {
            if ($request->nama_negeri == 'All') {
                $johor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '01'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kedah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '02'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kelantan = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '03'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $melaka = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '04'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $n9 = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '05'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $pahang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '06'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $perak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '07'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");


                $perlis = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '08'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $penang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '09'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $selangor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '10'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $terengganu = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '11'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $wp = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '12'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sabah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '13'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sarawak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL102'
                and e.e_negeri= '14'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

            } else {
                $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r
                WHERE e.e_nl = r.e_nl
                and r.e_kat = 'PL102'
                and e.e_negeri= $request->nama_negeri
                and  r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,e.e_negeri");
            }
        } elseif ($request->e_kat == 'PL104') {
            if ($request->nama_negeri == 'All') {
                $johor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '01'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kedah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '02'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kelantan = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '03'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $melaka = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '04'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $n9 = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '05'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $pahang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '06'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $perak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '07'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");


                $perlis = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '08'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $penang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '09'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $selangor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '10'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $terengganu = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '11'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $wp = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '12'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sabah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '13'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sarawak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL104'
                and e.e_negeri= '14'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");
            } else {
                $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r
                WHERE e.e_nl = r.e_nl
                and r.e_kat = 'PL104'
                and e.e_negeri= $request->nama_negeri
                and  r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,e.e_negeri");
            }
        } elseif ($request->e_kat == 'PL111') {
            if ($request->nama_negeri == 'All') {
                $johor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '01'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kedah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '02'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kelantan = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '03'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $melaka = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '04'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $n9 = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '05'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $pahang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '06'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $perak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '07'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");


                $perlis = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '08'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $penang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '09'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $selangor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '10'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $terengganu = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '11'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $wp = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '12'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sabah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '13'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sarawak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= '14'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");
            } else {
                $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL111'
                and e.e_negeri= $request->nama_negeri
                and  r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,e.e_negeri");
            }
        }
         elseif ($request->e_kat == 'PLBIO') {
            if ($request->nama_negeri == 'All') {
                $johor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '01'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kedah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '02'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $kelantan = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '03'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $melaka = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '04'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $n9 = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '05'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $pahang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '06'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $perak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '07'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");


                $perlis = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '08'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $penang = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '09'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $selangor = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '10'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $terengganu = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '11'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $wp = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '12'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sabah = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '13'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

                $sarawak = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= '14'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");
            } else {
                $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PLBIO'
                and e.e_negeri= $request->nama_negeri
                and  r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,e.e_negeri");
            }

        }
        else{
            return redirect()->back()->with('error', 'Data Tidak Wujud');

        }


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.direktori'), 'name' => "Direktori"],
            ['link' => route('admin.direktori.process'), 'name' => "Senarai Direktori"],
        ];

        $kembali = route('admin.direktori');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        if ($request->nama_negeri == 'All') {
            $array = [
                'negeri' => $negeri,
                'negeri2' => $negeri2,
                'johor' => $johor,
                'kedah' => $kedah,
                'kelantan' => $kelantan,
                'melaka' => $melaka,
                'n9' => $n9,
                'pahang' => $pahang,
                'perak' => $perak,
                'perlis' => $perlis,
                'penang' => $penang,
                'selangor' => $selangor,
                'terengganu' => $terengganu,
                'wp' => $wp,
                'sabah' => $sabah,
                'sarawak' => $sarawak,

                'breadcrumbs' => $breadcrumbs,
                'kembali' => $kembali,

                'returnArr' => $returnArr,
                'layout' => $layout,

            ];
        } else {
            $array = [
                'negeri' => $negeri,
                'negeri2' => $negeri2,
                'query' => $query,

                'breadcrumbs' => $breadcrumbs,
                'kembali' => $kembali,

                'returnArr' => $returnArr,
                'layout' => $layout,

            ];
        }


        return view('admin.menu-lain.direktori-papar', $array);
    }

    public function admin_pengumuman()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pengumuman'), 'name' => "Pengumuman"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $pengumuman = DB::select("SELECT Id, Message, Start_date, End_date, Icon_new
        FROM pengumuman
        order by Id Desc");



        return view('admin.menu-lain.pengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_tambah_pengumuman()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pengumuman'), 'name' => "Pengumuman"],
            ['link' => route('admin.tambahpengumuman'), 'name' => "Tambah Pengumuman"],
        ];

        $kembali = route('admin.pengumuman');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';


        return view('admin.menu-lain.tambahpengumuman', compact('returnArr', 'layout'));
    }


    public function admin_tambah_pengumuman_proses(Request $request)
    {

        $this->validation_tambah_pengumuman($request->all())->validate();
        $this->store_tambah_pengumuman($request->all());


        return redirect()->back()->with('success', 'Pengumuman sudah ditambah');
    }

    protected function validation_tambah_pengumuman(array $data)
    {
        return Validator::make($data, [

            'Message' => ['required', 'string'],
            'Start_date' => ['required', 'string'],
            'End_date' => ['required', 'string'],
            'Icon_new' => ['required', 'string'],
        ]);
    }

    protected function store_tambah_pengumuman(array $data)
    {
        return Pengumuman::create([

            'Message' => $data['Message'],
            'Start_date' => $data['Start_date'],
            'End_date' => $data['End_date'],
            'Icon_new' => $data['Icon_new'],

        ]);
    }


    public function admin_editpengumuman($id, Pengumuman $pengumuman)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pengumuman'), 'name' => "Pengumuman"],
            ['link' => route('admin.pengumuman'), 'name' => "Kemaskini Pengumuman"],

        ];

        $kembali = route('admin.pengumuman');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        $pengumuman = Pengumuman::find($id);

        return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_updatepengumuman(Request $request, $id)
    {

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->Message = $request->Message;
        $pengumuman->Start_date = $request->Start_date;
        $pengumuman->End_date = $request->End_date;
        $pengumuman->Icon_new = $request->Icon_new;
        $pengumuman->save();


        return redirect()->back()
            ->with('success', 'Pengumuman telah dikemaskini');
    }


    public function admin_tambah_fail()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pengumuman'), 'name' => "Pengumuman"],
            ['link' => route('admin.tambahfail'), 'name' => "Kemaskini Pengumuman"],

        ];

        $kembali = route('admin.tambahpengumuman');


        $files = FailLain::get();

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';


        return view('admin.menu-lain.tambahfail', compact('returnArr', 'layout', 'files'));
    }


    public function admin_tambah_fail_process(Request $request)
    {
        $emel = $request->TypeOfEmail;


       if ($request->file_upload) {

        $file = $request->file('file_upload');
        $originalname = $file->getClientOriginalName();

        $pelesen = $this->store_send_email($request->all(), $originalname);

       }
        return redirect()->back()->with('success', 'Fail sudah ditambah');
    }

    protected function store_send_email(array $data, $originalname)
    {

        //store file
        if ($data['file_upload']) {
            $file = $data['file_upload']->storeAs('pengumuman/fail', $originalname, 'public');

        }


        return FailLain::create([
            'file_upload' => $file,

        ]);
    }



    public function admin_jadualpenerimaanPL()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.jadualpenerimaanPL'), 'name' => "Jadual Penerimaan PL"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.jadual-penerimaanPL', compact('returnArr', 'layout'));
    }

    public function admin_senaraigagalPL()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraigagalPL'), 'name' => "Senarai Gagal Penerimaan PL"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.senaraigagalPL', compact('returnArr', 'layout'));
    }

    public function admin_panduan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.panduan'), 'name' => "Panduan Penyelenggaraan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.menu-lain.panduan', compact('returnArr', 'layout'));
    }

    public function admin_tukarpassword()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.tukarpassword'), 'name' => "Tukar Kata Laluan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $user = User::get();


        return view('admin.menu-lain.tukarpassword', compact('returnArr', 'layout','user'));
    }


    public function admin_update_password(Request $request, $id)
    {
        $user = User::findOrFail(auth()->user()->id);
        //compare password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('admin.tukarpassword')
                ->with('error', 'Sila masukkan kata laluan lama yang betul');
        }

        if ($request->new_password != $request->password_confirmation) {
            return redirect()->route('admin.tukarpassword')
                ->with('error', 'Sila sahkan kata laluan');
        }

        if ($request->old_password == $request->new_password) {
            return redirect()->route('admin.tukarpassword')
                ->with('error', 'Kata laluan baru sama dengan kata laluan lama');
        } else {
            $password = Hash::make($request->new_password);
            $user->password = $password;
            $user->save();
        }

        return redirect()->route('admin.tukarpassword')
            ->with('success', 'Kata Laluan berjaya ditukar');
    }

    public function try3()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.10portdatatodq'), 'name' => "Port Data Ke Dynamic Query"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.try', compact('returnArr', 'layout'));
    }


    public function graph_dashboard_default()
    {


        $query_now = DB::select("SELECT date_format(e.e101_sdate,'%d-%m-%Y'), count(p.e_nl),
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE p.e_nl = e.e101_nl and p.e_nl = r.e_nl and r.e_kat = 'PL91'
        and e.e101_sdate is not null
        group by e.e101_sdate
        order by e.e101_sdate");


        $returnArr = [
            'query_now' => $query_now,

        ];

        return response($returnArr, 200);
    }



    public function graph_dashboard(Request $request)
    {

        $query_now = DB::select("SELECT date_format(e.e101_sdate,'%d-%m-%Y'), count(p.e_nl),
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE p.e_nl = e.e101_nl and p.e_nl = r.e_nl and r.e_kat = 'PL91'
        and e.e101_sdate is not null
        group by e.e101_sdate
        order by e.e101_sdate");


        $returnArr = [
            'query_now' => $query_now,
        ];

        return response($returnArr, 200);
    }

    public function fetch_daerah($kod_negeri)
    {


        $list_daerah = Daerah::where('kod_negeri', $kod_negeri)->distinct()->orderBy('nama_daerah')->get('nama_daerah');

        return json_decode($list_daerah);
        exit;
    }

    public function admin_kod_produk()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.produk'), 'name' => "Senarai Kod dan Nama Produk Sawit"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $produk = Produk::where('sub_group_rspo', '')->where('sub_group_mspo', '')->orderBy('prodid')->get();

        $layout = 'layouts.main';

        return view('admin.menu-lain.kod-produk', compact('returnArr', 'layout',  'produk'));
    }

    public function admin_kod_produk_file($produk, $file_type)
    {

        $produk = Produk::orderBy('prodid')->get();



        $columns = [
            'Kod Produk',
            'Nama Produk',
            'Kumpulan Produk',
            'Nama Panjang Produk',

        ];


        $title_laporan = "Senarai Kod dan Nama Produk Sawit";

        $results = [
            'produk' => $produk,
            'columns' => $columns,
            'title_laporan' => $title_laporan,
        ];

        $returnArr = [
            'title' => $title_laporan,
            'results' => $results,
        ];

        if ($file_type == "pdf" || $file_type == "print") {
            $pdf_name = $title_laporan  .".pdf";
            $pdf = PDF::loadView('admins.produk.pdf.142', $returnArr)->setPaper('a4', 'landscape');
            if ($file_type == "print") {
                return $pdf->stream($pdf_name);
            }
            return $pdf->download($pdf_name);

        } else {
            return Exce::download(new LaporansExport($returnArr),  $title_laporan . ' Bagi Tahun ' . $tahun  . '.xlsx');
        }
    }


    public function admin_kod_negara()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.negara'), 'name' => "Senarai Kod dan Nama Negara"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $negara = Negara::orderBy('kodnegara')->get();
        $layout = 'layouts.main';

        return view('admin.menu-lain.kod-negara', compact('returnArr', 'layout', 'negara'));
    }

    public function admin_log_admin()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kod.negara'), 'name' => "Senarai Log Admin"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $layout = 'layouts.main';

        $log = AuditTrail::orderBy('id','DESC')->get();
        foreach ($log as $key => $logged){

            $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $log[$key]->created_at);
            $formatteddate[$key] = $myDateTime->format('d-m-Y / H:i:s');


        }


        return view('admin.menu-lain.log-superadmin', compact('returnArr', 'layout', 'log', 'formatteddate', 'myDateTime'));
    }

    public function admin_pembeli()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pembeli'), 'name' => "Pembeli"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $pembeli = DB::select("SELECT id, pembeli
        FROM syarikat_pembeli
        order by id Desc");



        return view('admin.menu-lain.syarikat-pembeli', compact('returnArr', 'layout', 'pembeli'));
    }


    public function admin_tambah_pembeli_proses(Request $request)
    {

        $this->validation_tambah_pembeli($request->all())->validate();
        $this->store_tambah_pembeli($request->all());


        return redirect()->back()->with('success', 'Pembeli sudah ditambah');
    }

    protected function validation_tambah_pembeli(array $data)
    {
        return Validator::make($data, [
            'pembeli' => ['required', 'string'],
        ]);
    }

    protected function store_tambah_pembeli(array $data)
    {
        return SyarikatPembeli::create([
            'pembeli' => $data['pembeli'],

        ]);
    }


    public function admin_editpembeli(Request $request, $id)
    {

        $pembeli = $request->input('pembeli');
        DB::connection('mysql')->select("UPDATE syarikat_pembeli SET pembeli = '$pembeli'
        WHERE id='$id'");

        return redirect()->route('admin.pembeli')
            ->with('success', 'Maklumat telah disimpan');
    }



}
