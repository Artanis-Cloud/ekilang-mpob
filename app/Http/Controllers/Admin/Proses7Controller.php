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
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class Proses7Controller extends Controller
{
    public function admin_7portingmaklumat()
    {
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama ,
            ['link' => route('admin.7portingmaklumat'), 'name' => "Pindahan Maklumat Produk & Negara ,
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.proses7.7portingmaklumat', compact('returnArr', 'layout'));
    }


    public function admin_portingmaklumat(Request $request)
    {
        $maklumat = $request->maklumat;
        // dd($maklumat);
        if ($maklumat == 'produk_sawit') {
            $this->porting_produk($request->all());
            return redirect()->back()->with('success', 'Maklumat produk sawit telah dipindahkan ke PLEID');


        } elseif ($maklumat == 'negara') {
            $this->porting_negara($request->all());
            return redirect()->back()->with('success', 'Maklumat negara telah dipindahkan ke PLEID');


        } else {
            $this->porting_daerah($request->all());
            return redirect()->back()->with('success', 'Maklumat daerah telah dipindahkan ke PLEID');


        }
    }

    public function porting_produk()
    {
        // data from codedb
        $produks = DB::connection('mysql5')->select("SELECT comm_code_l, comm_summary, group_l,comm_desc,sub_group from commodity_l");
        // dd($e91init);

        $delete_produk = DB::table('produk')->delete();

        $totalprod = 0;


        foreach ($produks as $produk) {

        $code = $produk->comm_code_l ;
        $nama = $produk->comm_summary ;
        $cat = $produk->group_l ;
        $desc = $produk->comm_desc ;
		$sub_group = $produk->sub_group ;

        $produk_insert = DB::insert("INSERT into produk values ('$code','$nama','$cat','$desc',NULL,NULL,NULL,'$sub_group')");

        $totalprod = $totalprod + 1;

        $result = Produk::get();
        dd($result);

        }
    }
}
