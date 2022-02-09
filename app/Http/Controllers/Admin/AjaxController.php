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

    public function fetch_daerah($kod_negeri){

        // $list_daerah = Negeri::where('negeri', $kod_negeri)->get();

        $list_daerah = Daerah::where('kod_negeri', $kod_negeri)->distinct()->orderBy('nama_daerah')->get();

        return json_decode($list_daerah);
        exit;
    }

    public function fetch_kawasan($kod_negeri){

        // $list_daerah = Negeri::where('negeri', $kod_negeri)->get();

        $list_kawasan = Negeri::where('kod_negeri', $kod_negeri)->distinct()->orderBy('nama_region')->get();

        return json_decode($list_kawasan);
        exit;
    }
}
