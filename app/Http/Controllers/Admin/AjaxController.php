<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\Produk;
use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{

    public function fetch_daerah($kod_negeri)
    {

        // $list_daerah = Negeri::where('negeri', $kod_negeri)->get();

        $list_daerah = Daerah::where('kod_negeri', $kod_negeri)->distinct()->orderBy('nama_daerah')->get();

        return json_decode($list_daerah);
        exit;
    }

    public function fetch_kawasan($kod_negeri)
    {

        // $list_daerah = Negeri::where('negeri', $kod_negeri)->get();

        $list_kawasan = Negeri::where('kod_negeri', $kod_negeri)->distinct()->orderBy('nama_region')->get();
        // dd($list_kawasan);

        return json_decode($list_kawasan);
        exit;
    }

    public function fetch_pelesen($id)
    {

        // $list_daerah = Negeri::where('negeri', $kod_negeri)->get();

        $list_pelesen = User::where('id', $id)->get('name');
        // dd($list_pelesen);

        return json_decode($list_pelesen);
        exit;
    }



    public function fetch_email($encoded)
    {
        // echo $decoded;
        $decoded = $this->decode($encoded);

        $email = User::where('username', $decoded)->get('email');
        // dd($email);

        return json_decode($email);
        exit;
    }

    function decode($encoded) {
        $encoded = base64_decode($encoded);
        $decoded = "";
        for( $i = 0; $i < strlen($encoded); $i++ ) {
        $b = ord($encoded[$i]);
        $a = $b ^ 10; //
        $decoded .= chr($a);
        }
        return base64_decode(base64_decode($decoded));
        }

    public function jumlah_penyata_dashboard()
    {
        $PL101 = DB::select("SELECT date_format(e.e101_sdate,'%d-%m-%Y') as date, count(p.e_nl) as number_submit
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE p.e_nl = e.e101_nl
        AND p.e_nl = r.e_nl
        AND r.e_kat = 'PL101'
        AND e.e101_sdate IS NOT NULL
        GROUP BY e.e101_sdate
        ORDER BY e.e101_sdate");

        $PL102[] =  DB::select("SELECT date_format(e.e102_sdate,'%d-%m-%Y') as date,count(p.e_nl) as number_submit
        from pelesen p, e102_init e, reg_pelesen r
        where p.e_nl = e.e102_nl
        and p.e_nl = r.e_nl
        and r.e_kat = 'PL102'
        and e.e102_sdate is not null
        group by e.e102_sdate
        order by  e.e102_sdate");


        $data = (object)[
            'PL101' => [
                'nama_kilang' => 'Kilang Penapis',
                'count' => $PL101,
            ],
            'PL102' => [
                'nama_kilang' => 'Kilang Isirung',
                'count' => $PL102,
            ],
        ];

        // dd($data);

        return json_encode($data);
        exit;
    }


    public function fetch_produk($kumpulan)
    {

        // $list_daerah = Negeri::where('negeri', $kod_negeri)->get();

        // $list_daerah = Daerah::where('kod_negeri', $kump_produk)->distinct()->orderBy('nama_daerah')->get();

        // $kumpulan_produk =  DB::connection('mysql2')->select("SELECT nama_produk FROM produk WHERE  'kumpulan = $kumpulan")
        // $produk = DB::connection('mysql2')->select("SELECT *  FROM produk WHERE  kumpulan = '$kumpulan'");

        $produk = Produk::where('prodcat', $kumpulan)->get();
        // dd($kumpulan);

        return json_decode($produk);
        exit;
    }
}
