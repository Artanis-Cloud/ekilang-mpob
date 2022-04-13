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

        return json_decode($list_kawasan);
        exit;
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

 dd( $PL102);
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

        dd($data);

        return json_encode($data);
        exit;
    }
}
