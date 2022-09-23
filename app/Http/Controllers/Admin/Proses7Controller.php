<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Negara;
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
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama "] ,
            ['link' => route('admin.7portingmaklumat'), 'name' => "Pindahan Maklumat Produk & Negara "] ,
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
            return redirect()->back()->with('success', 'Maklumat produk sawit telah dipindahkan dari PLEID ke eKilang');


        } elseif ($maklumat == 'negara') {
            $this->porting_negara($request->all());
            return redirect()->back()->with('success', 'Maklumat negara telah dipindahkan dari PLEID ke eKilang');


        } else {
            $this->porting_daerah($request->all());
            return redirect()->back()->with('success', 'Maklumat daerah telah dipindahkan dari PLEID ke eKilang');


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

        }
        // $result = Produk::get();
        // dd($result);
    }

    public function porting_negara()
    {
        // data from codedb
        $negaras = DB::connection('mysql5')->select("SELECT code, nama, kod_eu, benua from country_l");
        // dd($e91init);

        $delete_negaraekilang = DB::table('negara')->delete();
        $delete_negarastat = DB::connection('mysql3')->delete("DELETE from negara");

        $insertekilang = DB::insert("INSERT into negara values ('','','','','','','','')");
        $insertstat = DB::connection('mysql3')->insert("INSERT into negara values ('','','','','','','','')");

        $totalnegara = 0;

        foreach ($negaras as $negara) {

            $code =  $negara->code ;
            $nama = addslashes( $negara->nama );
            $eu15 =  $negara->kod_eu ;
            $benua =  $negara->benua ;

        $negaraekilang_insert = DB::insert("INSERT into negara values ('$code','$nama','$benua','$eu15',null,null,null,null)");
        $negarastat_insert = DB::connection('mysql3')->insert("INSERT into negara values ('$code','$nama','$benua','$eu15',null,null,null,null)");

        $totalnegara = $totalnegara + 1;

        }
        // $result = Produk::get();
        // dd($result);

        $negara2 = DB::connection('mysql5')->select("SELECT code, nama, kod_eu,kod_eu27,kod_eu28,kod_eu27_2020 from country_l_eu25");

        foreach ($negara2 as $negara) {

        $code =  $negara->code ;
        $nama =  $negara->nama ;
        //$eu15 =  $negara->eu15 ;
        $eu25 =  $negara->kod_eu ;
        $eu27 =  $negara->kod_eu27 ;
		$eu28 =  $negara->kod_eu28 ;
		$eu27_2020 =  $negara->kod_eu27_2020 ;

        if ($eu25=='euc')
        {
            $update25_negaraekilang =  DB::update("UPDATE negara set eu25 ='1' where kodnegara='$code'");
            $update25_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu25='1' where kodnegara='$code'");
        }
         if ($eu27=='euc')
        {
            $update27_negaraekilang =  DB::update("UPDATE negara set eu27='1' where kodnegara='$code'");
            $update27_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu27='1' where kodnegara='$code'");
        }
        if ($eu28=='euc')
        {
            $update28_negaraekilang =  DB::update("UPDATE negara set eu28='1' where kodnegara='$code'");
            $update28_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu28='1' where kodnegara='$code'");
        }
        if ($eu27_2020=='euc')
        {
            $update272022_negaraekilang =  DB::update("UPDATE negara set eu27_2020='1' where kodnegara='$code'");
            $update272022_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu27_2020='1' where kodnegara='$code'");
        }

        }

        // $result = Negara::get();
        // dd($result);

    }

    public function porting_daerah()
    {
        // data from codedb
        $negaras = DB::connection('mysql5')->select("SELECT code, nama, kod_eu, benua from country_l");
        // dd($e91init);

        $delete_negaraekilang = DB::table('negara')->delete();
        $delete_negarastat = DB::connection('mysql3')->delete("DELETE from negara");

        $insertekilang = DB::insert("INSERT into negara values ('','','','','','','','')");
        $insertstat = DB::connection('mysql3')->insert("INSERT into negara values ('','','','','','','','')");

        $totalnegara = 0;

        foreach ($negaras as $negara) {

            $code =  $negara->code ;
            $nama = addslashes( $negara->nama );
            $eu15 =  $negara->kod_eu ;
            $benua =  $negara->benua ;

        $negaraekilang_insert = DB::insert("INSERT into negara values ('$code','$nama','$benua','$eu15',null,null,null,null)");
        $negarastat_insert = DB::connection('mysql3')->insert("INSERT into negara values ('$code','$nama','$benua','$eu15',null,null,null,null)");

        $totalnegara = $totalnegara + 1;

        }
        // $result = Produk::get();
        // dd($result);

        $negara2 = DB::connection('mysql5')->select("SELECT code, nama, kod_eu,kod_eu27,kod_eu28,kod_eu27_2020 from country_l_eu25");

        foreach ($negara2 as $negara) {

        $code =  $negara->code ;
        $nama =  $negara->nama ;
        //$eu15 =  $negara->eu15 ;
        $eu25 =  $negara->kod_eu ;
        $eu27 =  $negara->kod_eu27 ;
		$eu28 =  $negara->kod_eu28 ;
		$eu27_2020 =  $negara->kod_eu27_2020 ;

        if ($eu25=='euc')
        {
            $update25_negaraekilang =  DB::update("UPDATE negara set eu25 ='1' where kodnegara='$code'");
            $update25_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu25='1' where kodnegara='$code'");
        }
         if ($eu27=='euc')
        {
            $update27_negaraekilang =  DB::update("UPDATE negara set eu27='1' where kodnegara='$code'");
            $update27_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu27='1' where kodnegara='$code'");
        }
        if ($eu28=='euc')
        {
            $update28_negaraekilang =  DB::update("UPDATE negara set eu28='1' where kodnegara='$code'");
            $update28_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu28='1' where kodnegara='$code'");
        }
        if ($eu27_2020=='euc')
        {
            $update272022_negaraekilang =  DB::update("UPDATE negara set eu27_2020='1' where kodnegara='$code'");
            $update272022_negarastat =  DB::connection('mysql3')->update("UPDATE negara set eu27_2020='1' where kodnegara='$code'");
        }

        }

        // $result = Negara::get();
        // dd($result);

    }
}
