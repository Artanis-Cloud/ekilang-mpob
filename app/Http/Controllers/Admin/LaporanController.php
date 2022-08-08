<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use App\Models\Daerah;
use App\Models\EBioInit;
use App\Models\H91Init;
use App\Models\HBioB;
use App\Models\HBioC;
use App\Models\HBioInit;
use App\Models\HebahanProses;
use App\Models\HebahanStokAkhir;
use App\Models\HHari;
use App\Models\Kapasiti;
use App\Models\KumpProduk;
use App\Models\Negara;
use App\Models\Produk;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\ProdukCategory;
use App\Models\ProdukGroup;
use App\Models\ProdukSubgroup;
use App\Models\Region;
use App\Models\RegPelesen;
use App\Models\SyarikatPembeli;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use DB;
use FontLib\Table\Type\post;
use Svg\Tag\Rect;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{

    public function admin_maklumat_penyata_bulanan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');



        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.ringkasan.maklumat-penyata-bulanan', compact('returnArr', 'layout'));
    }

    // protected function validation_terdahulu(array $data)
    // {
    //     return Validator::make($data, [
    //         'tahun' => ['required', 'string'],
    //         'negeri' => ['required', 'string'],
    //     ]);
    // }

    public function admin_ringkasan_penyata(Request $request)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.ringkasan.penyata'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::get();
        $produk = Produk::get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();
        $tahun = $request->tahun;



        //RINGKASAN URUSNIAGA
        $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->groupBy('ebio_nl')->get();


        if ($request->tahun) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->tahun && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->tahun && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->tahun && $request->e_negeri && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }


        $layout = 'layouts.admin';

        $array = [
            'produk' => $produk,
            'users2' => $users2,
            'pembeli' => $pembeli,
            'kumpproduk' => $kumpproduk,
            'negeri' => $negeri,
            'result' => $result,
            'tahun' => $tahun,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];

        return view('admin.laporan_dq.ringkasan.ringkasan-penyata', $array);
    }



    public function admin_laporan_ringkasan($ebio_nl, $tahun)
    {
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        //RINGKASAN URUSNIAGA

        //dapatkan no batch
        $no_batches = HBioInit::where('ebio_nl', $ebio_nl)->where('ebio_thn', $tahun)->get();

        for ($i=1; $i <= 12; $i++) {
            $data_bulanan_ebio_b3[$i] = 0;
            $data_bulanan_ebio_b4[$i] = 0;
            $data_bulanan_ebio_b5[$i] = 0;
            $data_bulanan_ebio_b6[$i] = 0;
            $data_bulanan_ebio_b7[$i] = 0;
            $data_bulanan_ebio_b8[$i] = 0;
            $data_bulanan_ebio_b9[$i] = 0;
            $data_bulanan_ebio_b10[$i] = 0;
            $data_bulanan_ebio_b11[$i] = 0;
            $data_bulanan_ebio_b13[$i] = 0;
            $data_bulanan_ebio_date[$i] = 0;

        }


        foreach ($no_batches as $key =>  $no_batch) {
            $hbiob[] = DB::table('h_bio_b_s')->where('ebio_nobatch', $no_batch->ebio_nobatch)->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
            ->first();

            $data_bulanan_ebio_b3[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b3 ?? 0;
            $data_bulanan_ebio_b4[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b4 ?? 0;
            $data_bulanan_ebio_b5[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b5 ?? 0;
            $data_bulanan_ebio_b6[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b6 ?? 0;
            $data_bulanan_ebio_b7[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b7 ?? 0;
            $data_bulanan_ebio_b8[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b8 ?? 0;
            $data_bulanan_ebio_b9[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b9 ?? 0;
            $data_bulanan_ebio_b10[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b10 ?? 0;
            $data_bulanan_ebio_b11[$no_batch->ebio_bln] = $hbiob[$key]->ebio_b11 ?? 0;
            // $test[] = $data_bulanan_ebio_b5;
        }

        foreach($no_batches as    $batch){
            // $hbiodate[] = DB::table('h_bio_inits')->where('ebio_nl', $ebio_nl)->where('ebio_thn', $tahun)->first();
            $myDateTime = DateTime::createFromFormat('Y-m-d', $batch->ebio_sdate);
            $formatteddate = $myDateTime->format('d-m-Y');
                $data_bulanan_ebio_date[$batch->ebio_bln] = $formatteddate ?? '-';


           }
//  dd($formatteddate);
// dd($data_bulanan_ebio_date);


        $data2 = HBioInit::find($ebio_nl);
        // $datas = HBioInit::where('ebio_nl', $ebio_nl)->get();

        // $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $data = Pelesen::where('e_nl', $ebio_nl)->first();
        $negeri = Negeri::where('kod_negeri', $data->e_negeri)->first();
        // $bio1 = HBioB::where('ebio_nobatch',$data2->ebio_nobatch)->first();






        //RINGKASAN URUSNIAGA



        $array = [

            'negeri' => $negeri,
            'data' => $data,

            'data_bulanan_ebio_date'=> $data_bulanan_ebio_date,

            // 'i'=> $i,
            'data_bulanan_ebio_b4'=> $data_bulanan_ebio_b4,
            'data_bulanan_ebio_b5'=> $data_bulanan_ebio_b5,
            'data_bulanan_ebio_b6'=> $data_bulanan_ebio_b6,
            'data_bulanan_ebio_b7'=> $data_bulanan_ebio_b7,
            'data_bulanan_ebio_b8'=> $data_bulanan_ebio_b8,
            'data_bulanan_ebio_b9'=> $data_bulanan_ebio_b9,
            'data_bulanan_ebio_b10'=> $data_bulanan_ebio_b10,
            'data_bulanan_ebio_b11'=> $data_bulanan_ebio_b11,
            'hbiob' => $hbiob,
            'no_batches' => $no_batches,
            // 'formatteddate' => $formatteddate,
            'data2' => $data2,

            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];

        return view('admin.laporan_dq.ringkasan.laporan-ringkasan-penyata', $array);
    }

    public function admin_ringkasan_bahagian1()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.ringkasan.penyata'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::get();
        $produk = Produk::get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();




        $layout = 'layouts.admin';

        $array = [
            'produk' => $produk,
            'users2' => $users2,
            'pembeli' => $pembeli,
            'kumpproduk' => $kumpproduk,
            'negeri' => $negeri,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];

        return view('admin.laporan_dq.ringkasan.ringkasan-bahagian1', $array);
    }

    public function admin_ringkasan_bahagian1_table(Request $request)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.ringkasan.penyata'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::get();
        $produk = Produk::get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();
        $tahun = $request->tahun;
        $tahun = $request->tahun;
        $start_month = $request->start_month;
        $end_month = $request->end_month;
        $bulan = $request->bulan;
        $laporan = $request->laporan;


        //RINGKASAN URUSNIAGA
        $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')->where('ebio_thn',$tahun)->groupBy('ebio_nl')->get();


        if ($request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')->where('ebio_thn',$tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal') {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')->where('ebio_thn',$tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->groupBy('ebio_nl')->get();

        }
        if ($request->bulan == 'between') {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')->where('ebio_thn',$tahun)->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )->groupBy('ebio_nl')->get();

        }
// dd( $result);



        for ($i=1; $i <= 12; $i++) {
            $ebio_b5[$i] = 0;
            $data_kapasiti[$i] = 0;
        }

//  dd( $result);
        foreach ($result as  $list_result) {

                $hbiob_s= DB::table('h_bio_b_s')->where('ebio_nobatch', $list_result->ebio_nobatch)->first();


                $ebio_b5[$list_result->ebio_bln] = $hbiob_s->ebio_b5 ?? 0;

                // $data_kapasiti[$list_result->bulan] = $hbiob->kapasiti ?? 0;
                $test[] = $data_kapasiti;
// $test_hari[] = $data_hari_operasi;

        }

        $layout = 'layouts.admin';

        $array = [
            'produk' => $produk,
            'users2' => $users2,
            'pembeli' => $pembeli,
            'kumpproduk' => $kumpproduk,
            'negeri' => $negeri,
            'result' => $result,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'kembali' => $kembali,
            'returnArr' => $returnArr,
            'layout' => $layout,
            'laporan' => $laporan,
            'start_month' => $start_month,
            'end_month' => $end_month,

        ];

        return view('admin.laporan_dq.ringkasan.ringkasan-bahagian1-table', $array);
    }

    public function admin_ringkasan_bahagian2()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.ringkasan.penyata'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::get();
        $produk = Produk::get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();
        // $tahun = $request->tahun;

        // dd($result);




        $layout = 'layouts.admin';

        $array = [
            'produk' => $produk,
            'users2' => $users2,
            'pembeli' => $pembeli,
            'kumpproduk' => $kumpproduk,
            'negeri' => $negeri,
            'kembali' => $kembali,
            'returnArr' => $returnArr,
            'layout' => $layout,

        ];

        return view('admin.laporan_dq.ringkasan.ringkasan-bahagian2', $array);
    }

    public function admin_ringkasan_bahagian2_table(Request $request)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.ringkasan.penyata'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::get();
        $produk = Produk::get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();
        $tahun = $request->tahun;
        $start_month = $request->start_month;
        $end_month = $request->end_month;
        $bulan = $request->bulan;
        $laporan = $request->laporan;

        //RINGKASAN OPERASI
        $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahun',$tahun)
        ->groupBy('lesen')->get();

    //  dd($result);
        if ($request->e_nl) {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahun',$tahun)
            ->where('lesen', 'LIKE', '%' . $request->e_nl . '%') ->groupBy('lesen')->get();

        }
        if ($request->bulan == 'equal') {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahun',$tahun)
            ->where('bulan', 'LIKE', '%' . $request->start . '%')->groupBy('lesen')->get();

        }
        if ($request->bulan == 'between') {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahun',$tahun)
            ->whereBetween('bulan', [$start_month. '%', $end_month.'%'] )->groupBy('lesen')->get();

        }
        if ($request->e_negeri) {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahun',$tahun)
            ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%') ->groupBy('lesen')->get();

        }






        // if( $result){

            for ($i=1; $i <= 12; $i++) {
                $data_hari_operasi[$i] = 0;
                $data_kapasiti[$i] = 0;
            }


            foreach ($result as  $list_result) {

                    $hbiob= DB::table('h_hari')->where('lesen', $list_result->lesen)->first();

// dd( $hbiob);
                    $data_hari_operasi[$list_result->bulan] = $hbiob->hari_operasi ?? 0;

                    $data_kapasiti[$list_result->bulan] = $hbiob->kapasiti ?? 0;
                    $test[] = $data_kapasiti;
                    $test_hari[] = $data_hari_operasi;



            }
            // $hbiob= DB::table('h_hari')->where()->get();






            $layout = 'layouts.admin';

            $array = [
                'produk' => $produk,
                'users2' => $users2,
                'pembeli' => $pembeli,
                'kumpproduk' => $kumpproduk,
                'negeri' => $negeri,
                'result' => $result,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kembali' => $kembali,
                'returnArr' => $returnArr,
                'layout' => $layout,
                'laporan' => $laporan,
                'start_month' => $start_month,
                'end_month' => $end_month,

            ];

                return view('admin.laporan_dq.ringkasan.ringkasan-bahagian2-table', $array);
        // } else {
        //     return redirect()->back()
        //         ->with('error', 'Rekod Tidak Wujud!');
        // }


    }

    public function admin_ringkasan_bahagian3(Request $request)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.ringkasan.penyata'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::get();
        $produk = Produk::get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();
        $tahun = $request->tahun;



        //RINGKASAN URUSNIAGA
        $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->groupBy('ebio_nl')->get();


        if ($request->tahun) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->tahun && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->tahun && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->tahun && $request->e_negeri && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }


        $layout = 'layouts.admin';

        $array = [
            'produk' => $produk,
            'users2' => $users2,
            'pembeli' => $pembeli,
            'kumpproduk' => $kumpproduk,
            'negeri' => $negeri,
            'result' => $result,
            'tahun' => $tahun,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];

        return view('admin.laporan_dq.ringkasan.ringkasan-bahagian3', $array);
    }

    public function admin_ringkasan_jualan_bio(Request $request)
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.ringkasan.penyata'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::get();
        $produk = Produk::get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();
        $tahun = $request->tahun;



        //RINGKASAN URUSNIAGA
        $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->groupBy('ebio_nl')->get();


        if ($request->tahun) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->tahun && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->tahun && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->tahun && $request->e_negeri && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }


        $layout = 'layouts.admin';

        $array = [
            'produk' => $produk,
            'users2' => $users2,
            'pembeli' => $pembeli,
            'kumpproduk' => $kumpproduk,
            'negeri' => $negeri,
            'result' => $result,
            'tahun' => $tahun,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];

        return view('admin.laporan_dq.ringkasan.ringkasan-jualanbio', $array);

    }



    public function admin_laporan_ringkasan_operasi()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $produk = Produk::whereIn('prodcat', ['03', '06', '08', '12'])->orderBy('proddesc')->get();
        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $layout = 'layouts.admin';

        return view('admin.laporan_dq.ringkasan.laporan-operasi', compact('returnArr', 'layout', 'produk', 'users2', 'negeri'));
    }

    public function admin_laporan_ringkasan_jualan_bio()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];


        $produk = Produk::whereIn('prodcat', ['03', '06', '08', '12'])->orderBy('proddesc')->get();
        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $layout = 'layouts.admin';

        return view('admin.laporan_dq.ringkasan.laporan-jualan-bio', compact('returnArr', 'layout', 'produk', 'users2', 'negeri'));
    }

    public function admin_pl_lewat()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Tarikh Penerimaan PL"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.pl-lewat', compact('returnArr', 'layout'));
    }

    public function admin_pl_lewat_process(Request $request)
    {
        $kategori = $request->kategori;
        $sdate = $request->sdate;
        $edate = $request->edate;
        // dd($edate);
        // $date_tepat = EBioInit::where(date())

        // $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
        // FROM e_bio_inits e
        // LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
        // LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
        // WHERE DAY(e.ebio_sdate) BETWEEN 1 AND 10");
        // dd($list_penyata);
        $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
        FROM e_bio_inits e
        LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
        LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
        WHERE DAY(e.ebio_sdate) BETWEEN $sdate AND $edate");

        // if ($kategori == "tepat") {
        //     $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
        //         FROM e_bio_inits e
        //         LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
        //         LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
        //         WHERE DAY(e.ebio_sdate) BETWEEN 1 AND 7");
        //     // dd($list_penyata);

        // } elseif ($kategori == "lewat") {
        //     $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
        //         FROM e_bio_inits e
        //         LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
        //         LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
        //         WHERE DAY(e.ebio_sdate) BETWEEN 8 AND 10");
        // } else {
        //     $list_penyata = DB::select("SELECT DAY(e.ebio_sdate) AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
        //         FROM e_bio_inits e
        //         LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
        //         LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
        //         WHERE DAY(e.ebio_sdate) BETWEEN 1 AND 10");
        // }
        // dd($list_penyata);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.pl.lewat'), 'name' => "Tarikh Penerimaan PL"],
            ['link' => route('admin.pl.lewat'), 'name' => "Senarai Penerimaan PL"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $array = [
            'kategori' => $kategori,
            'list_penyata' => $list_penyata,

            'breadcrumbs' => $breadcrumbs,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];

        return view('admin.laporan_dq.pl-lewat-proses', $array);
    }

    public function admin_kapasiti()
    {

        // $pelesen = Pelesen::find($id);
        // $pelesen = Pelesen::with('regpelesen')->where('e_nl', $reg_pelesen[0]->e_nl)->get();
        // dd($pelesen);
        // $date= date("m");

        // $reg_pelesen = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        $kapasiti = Kapasiti::with('pelesen')->get();
        // $pelesen = Pelesen::with('regpelesen')->where('e_nl', $reg_pelesen[0]->e_nl)->get();
        // dd($kapasiti);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Kapasiti Kilang Biodiesel"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.kapasiti', compact('returnArr', 'layout', 'kapasiti'));
    }

    public function admin_edit_kapasiti($id, Pelesen $pelesen)
    {

        $pelesen = Pelesen::find($id);
        // $pelesen = Pelesen::with('regpelesen')->where('e_nl', $reg_pelesen[0]->e_nl)->get();
        // dd($pelesen);

        $bulan = Bulan::get();


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.kapasiti'), 'name' => "Kapasiti Kilang Biodiesel"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Kemaskini Kapasiti"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.edit-kapasiti', compact('returnArr', 'layout', 'pelesen'));
    }


    public function admin_edit_kapasiti_jan(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->jan = $request->jan;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_feb(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->feb = $request->feb;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_mac(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->mac = $request->mac;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_apr(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->apr = $request->apr;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_mei(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->mei = $request->mei;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_jun(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->jun = $request->jun;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_jul(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->jul = $request->jul;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_ogs(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->ogs = $request->ogs;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_sept(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->sept = $request->sept;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_okt(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->okt = $request->okt;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_nov(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->nov = $request->nov;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_edit_kapasiti_dec(Request $request, $id)
    {
        // dd($request->all());
        $pelesen = Kapasiti::findOrFail($id);
        $pelesen->dec = $request->dec;
        $pelesen->save();


        return redirect()->back()
            ->with('success', 'Maklumat Kapasiti telah dikemaskini');
    }

    public function admin_laporan_tahunan()
    {

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.laporan-tahunan', compact('returnArr', 'layout'));
    }


    public function admin_laporan_tahunan_proses(Request $request)
    {

        $laporan = $request->laporan;
        $tahun = $request->tahun;

        if ($request->tahun) {
            $tahun_sql = "k.tahun = $request->tahun";
        } else {
            $tahun_sql = "";
        }
        if ($request->bulan) {
            $bulan_sql = "bulan = '$request->bulan'";
        } else {
            $bulan_sql = "";
        }
        if ($laporan == 'kapasiti') {


            $kapasiti_johor = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '01'");
            // dd($kapasiti_kedah);

            $kapasiti_kedah = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '02'");
            // dd($kapasiti_kedah);

            $kapasiti_kelantan = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '03'");
            // dd($kapasiti_kedah);

            $kapasiti_melaka = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '04'");
            // dd($kapasiti_kedah);

            $kapasiti_n9 = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '05'");
            // dd($kapasiti_kedah);

            $kapasiti_pahang = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '06'");
            // dd($kapasiti_kedah);

            $kapasiti_perak = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '07'");
            // dd($kapasiti_perak);

            $kapasiti_perlis = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '08'");
            // dd($kapasiti_kedah);

            $kapasiti_penang = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '09'");
            // dd($kapasiti_kedah);

            $kapasiti_selangor = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '10'");
            // dd($kapasiti_kedah);

            $kapasiti_terengganu = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '11'");
            // dd($kapasiti_kedah);

            $kapasiti_wp = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '12'");
            // dd($kapasiti_kedah);

            $kapasiti_sabah = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '13'");
            // dd($kapasiti_kedah);

            $kapasiti_sarawak = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_negeri = '14'");
            // dd($kapasiti_kedah);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Tahunan Kapasiti"],

            ];

            $kembali = route('admin.dashboard');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            $layout = 'layouts.admin';

            $array = [
                'laporan' => $laporan,
                'tahun_sql' => $tahun_sql,
                'tahun' => $tahun,

                'kapasiti_kedah' => $kapasiti_kedah,
                'kapasiti_johor' => $kapasiti_johor,
                'kapasiti_kelantan' => $kapasiti_kelantan,
                'kapasiti_melaka' => $kapasiti_melaka,
                'kapasiti_n9' => $kapasiti_n9,
                'kapasiti_pahang' => $kapasiti_pahang,
                'kapasiti_perak' => $kapasiti_perak,
                'kapasiti_perlis' => $kapasiti_perlis,
                'kapasiti_selangor' => $kapasiti_selangor,
                'kapasiti_terengganu' => $kapasiti_terengganu,
                'kapasiti_wp' => $kapasiti_wp,
                'kapasiti_sabah' => $kapasiti_sabah,
                'kapasiti_sarawak' => $kapasiti_sarawak,
                'kapasiti_penang' => $kapasiti_penang,

                'breadcrumbs' => $breadcrumbs,
                'kembali' => $kembali,

                'returnArr' => $returnArr,
                'layout' => $layout,

            ];

            return view('admin.laporan_dq.laporan-kapasiti', $array);
        } elseif ($laporan == 'beroperasi') {


            if ($request->tahun) {
                $tahun_sql = "ebio_thn = $request->tahun";
            } else {
                $tahun_sql = "";
            }
            if ($request->bulan == 'equal') {
                $bulan_sql = "AND ebio_bln = $request->start";
            } elseif ($request->bulan == 'between') {
                $bulan_sql = "AND ebio_bln BETWEEN $request->start_month AND $request->end_month";
            } else {
                $bulan_sql = "";
            }

            $tahun2 = $request->tahun;
            $bulan = $request->bulan;
            $start_month = $request->start_month;
            $end_month = $request->end_month;



            // $nobatch = HBioInit::where('ebio_thn', $request->tahun)->where('ebio_bln', $request->bulan)->get('ebio_nobatch');


            // $operasi =  DB::select("SELECT p.e_np, p.kap_proses, p.e_negeri, h.ebio_c3, h.ebio_c6, h.ebio_nobatch
            // FROM kapasiti k, pelesen p, h_bio_c_s h
            // WHERE h.ebio_nobatch = $batch
            // AND k.e_nl = p.e_nl
            // AND h.ebio_c3 = 'AW'");

            $nbatch =  DB::select("SELECT ebio_nobatch
            FROM h_bio_inits
            WHERE $tahun_sql.$bulan_sql");

            // $batch = $nbatch[0]->ebio_nobatch;

            // dd($batch);

            $operasi =   DB::select("SELECT p.e_np, p.e_nl, p.kap_proses, p.e_negeri, h.ebio_c3, h.ebio_c6, h.ebio_nobatch, p.e_nl, innit.ebio_bln, innit.ebio_thn
            FROM h_bio_c_s h
            LEFT JOIN h_bio_inits innit ON h.ebio_nobatch = innit.ebio_nobatch
            LEFT JOIN pelesen p ON p.e_nl = innit.ebio_nl
            WHERE h.ebio_c3 = 'AW';");

            // dd($operasi);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Tahunan Kapasiti"],

            ];

            $kembali = route('admin.dashboard');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            $layout = 'layouts.admin';

            $array = [
                'laporan' => $laporan,
                'tahun_sql' => $tahun_sql,
                'tahun2' => $tahun2,
                'bulan' => $bulan,
                'start_month' => $start_month,
                'end_month' => $end_month,

                'operasi' => $operasi,


                'breadcrumbs' => $breadcrumbs,
                'kembali' => $kembali,

                'returnArr' => $returnArr,
                'layout' => $layout,

            ];
            return view('admin.laporan_dq.laporan-operasi', $array);
        } elseif ($laporan == 'pengeluaran') {


            if ($request->tahun) {
                $tahun_sql = "ebio_thn = $request->tahun";
            } else {
                $tahun_sql = "";
            }
            if ($request->bulan == 'equal') {
                $bulan_sql = "AND ebio_bln = $request->start";
            } elseif ($request->bulan == 'between') {
                $bulan_sql = "AND ebio_bln BETWEEN $request->start_month AND $request->end_month";
            } else {
                $bulan_sql = "";
            }
            $bulan = $request->bulan;
            $tahun2 = $request->tahun;
            $start_month = $request->start_month;
            $end_month = $request->end_month;


            $pengeluaran =   DB::select("SELECT p.e_np, p.e_nl, p.kap_proses, p.e_negeri, h.ebio_c3, h.ebio_c6,  k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, h.ebio_nobatch, p.e_nl, innit.ebio_bln, innit.ebio_thn
            FROM h_bio_c_s h
            LEFT JOIN h_bio_inits innit ON h.ebio_nobatch = innit.ebio_nobatch
            LEFT JOIN pelesen p ON p.e_nl = innit.ebio_nl
            LEFT JOIN kapasiti k ON k.e_nl = innit.ebio_nl
            WHERE $tahun_sql.$bulan_sql
            AND  h.ebio_c3 = 'AW';");

            // dd($pengeluaran);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Tahunan Kapasiti"],

            ];

            $kembali = route('admin.dashboard');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            $layout = 'layouts.admin';

            $array = [
                'laporan' => $laporan,
                'tahun_sql' => $tahun_sql,
                'tahun2' => $tahun2,
                'bulan' => $bulan,

                'pengeluaran' => $pengeluaran,

                'start_month' => $start_month,
                'end_month' => $end_month,


                // 'breadcrumbs' => $breadcrumbs,
                // 'kembali' => $kembali,

                'returnArr' => $returnArr,
                'layout' => $layout,

            ];
            return view('admin.laporan_dq.laporan-pengeluaran', $array);
        } elseif ($laporan == 'eksport') {


            if ($request->tahun) {
                $tahun_sql = "e.ebio_thn = $request->tahun";
            } else {
                $tahun_sql = "";
            }
            if ($request->bulan == 'equal') {
                $bulan_sql = "AND e.ebio_bln = $request->start";
            } elseif ($request->bulan == 'between') {
                $bulan_sql = "AND e.ebio_bln BETWEEN $request->start_month AND $request->end_month";
            } else {
                $bulan_sql = "";
            }
            $bulan = $request->bulan;
            // dd($bulan);
            $tahun2 = $request->tahun;
            $start_month = $request->start_month;
            $end_month = $request->end_month;

            // $nobatch = HBioInit::where('ebio_thn', $request->tahun)->where('ebio_bln', $request->bulan)->get('ebio_nobatch');


            // $operasi =  DB::select("SELECT p.e_np, p.kap_proses, p.e_negeri, h.ebio_c3, h.ebio_c6, h.ebio_nobatch
            // FROM kapasiti k, pelesen p, h_bio_c_s h
            // WHERE h.ebio_nobatch = $batch
            // AND k.e_nl = p.e_nl
            // AND h.ebio_c3 = 'AW'");

            // $nbatch =  DB::select("SELECT ebio_nobatch
            // FROM h_bio_inits
            // WHERE $tahun_sql.$bulan_sql");

            // $batch = $nbatch[0]->ebio_nobatch;

            // dd($nbatch);

            $eksport =   DB::select("SELECT p.e_np, p.e_nl, h.ebio_c3, h.ebio_c9, h.ebio_nobatch, p.e_nl, innit.ebio_bln, innit.ebio_thn
            FROM h_bio_c_s h
            LEFT JOIN h_bio_inits innit ON h.ebio_nobatch = innit.ebio_nobatch
            LEFT JOIN pelesen p ON p.e_nl = innit.ebio_nl
            LEFT JOIN h_bio_inits e ON h.ebio_nobatch = e.ebio_nobatch
            WHERE $tahun_sql.$bulan_sql
            AND h.ebio_c3 = 'AW'
            GROUP BY p.e_nl ;");

            // dd($eksport);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Tahunan Kapasiti"],

            ];

            $kembali = route('admin.dashboard');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            $layout = 'layouts.admin';

            $array = [
                'laporan' => $laporan,
                'tahun_sql' => $tahun_sql,
                'tahun2' => $tahun2,
                'start_month' => $start_month,
                'end_month' => $end_month,
                'bulan' => $bulan,

                'eksport' => $eksport,


                // 'breadcrumbs' => $breadcrumbs,
                // 'kembali' => $kembali,

                'returnArr' => $returnArr,
                'layout' => $layout,

            ];
            return view('admin.laporan_dq.laporan-eksport', $array);
        } else {
            return redirect()->back()
                ->with('error', 'Rekod Tidak Wujud!');
        }
    }

    public function admin_stok_akhir()
    {

        // $stok_akhir = DB::connection('mysql2')->select("SELECT * FROM hebahan_stok_akhir
        // order by tahun, bulan");
        $stok_akhir = HebahanStokAkhir::orderBy('tahun')->orderBy('bulan')->get();
        // dd($stok_akhir);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.stok-akhir', compact('returnArr', 'layout', 'stok_akhir'));
    }


    public function admin_edit_stok_akhir(Request $request, $id)
    {

        // $produk = Produk::where('prodname', $request->e101_b4)->first();/

        // dd($request->all());
        $hebahan = HebahanStokAkhir::findOrFail($id);
        // $hebahan->tahun = $request->tahun;
        // $hebahan->bulan = $request->bulan;
        $hebahan->cpo_sm = $request->cpo_sm;
        $hebahan->ppo_sm = $request->ppo_sm;
        $hebahan->cpko_sm = $request->cpko_sm;
        $hebahan->ppko_sm = $request->ppko_sm;
        $hebahan->cpo_sbh = $request->cpo_sbh;
        $hebahan->ppo_sbh = $request->ppo_sbh;
        $hebahan->cpko_sbh = $request->cpko_sbh;
        $hebahan->ppko_sbh = $request->ppko_sbh;
        $hebahan->cpo_srwk = $request->cpo_srwk;
        $hebahan->ppo_srwk = $request->ppo_srwk;
        $hebahan->cpko_srwk = $request->cpko_srwk;
        $hebahan->ppko_srwk = $request->ppko_srwk;
        $hebahan->save();


        return redirect()->route('admin.stok.akhir')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function admin_delete_stok_akhir($id)
    {
        $hebahan = HebahanStokAkhir::findOrFail($id);
        // dd($penyata);

        $hebahan->delete();
        return redirect()->route('admin.stok.akhir')
            ->with('success', 'Maklumat Dihapuskan');
    }

    public function admin_tambah_stok_akhir()
    {
        $bulan = Bulan::get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.tambah-stok-akhir', compact('returnArr', 'layout', 'bulan'));
    }

    public function admin_tambah_stok_akhir_proses(Request $request)
    {

        // dd($request->all());
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        //semenanjung malaysia
        //cpo
        $querycpo1 = DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_sm_1
             FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPO'");

        //  dd($querycpo1[0]->cpo_sm_1);

        $querycpo2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_sm_2
            FROM `penyata` ,  kilang, `profile_bulanan`,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('cpo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPO'");

        $querycpo3 =   DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_sm_3
            FROM `penyata` ,  kilang, `profile_bulanan`,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_akhir') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPO'");


        //ppo

        $queryppo = DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_sm
            FROM `penyata` ,  kilang, `profile_bulanan`,produk,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('ppo_hasil') AND
            `kilang`.`jenis` <>  'dummy' AND
            `produk`.`kumpulan_produk` =  '1' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` <> 'CPO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");

        $queryppo1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_sm_1
            FROM `penyata` ,  kilang, `profile_bulanan`,produk,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
            `kilang`.`jenis` <>  'dummy' AND
            `produk`.`kumpulan_produk` =  '1' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` <> 'CPO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");

        $queryppo2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_sm_2
                    FROM `penyata` ,  kilang, `profile_bulanan`,produk,negeri
                    WHERE
                    `penyata`.`tahun` =  '$tahun' AND
                    `penyata`.`bulan` =  '$bulan' AND
                    `profile_bulanan`.`tahun` =  '$tahun' AND
                    `profile_bulanan`.`bulan` =  '$bulan' AND
                    `penyata`.`menu` = 'ppo' AND
                    `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
                    kilang.e_apnegeri = negeri.id_negeri AND
                    `penyata`.`penyata` in  ('ppo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
                    `kilang`.`jenis` <>  'dummy' AND
                    `produk`.`kumpulan_produk` =  '1' AND
                    `penyata`.`lesen` = `kilang`.`e_nl` AND
                    `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
                    `penyata`.`kod_produk` <> 'CPO' AND
                    `penyata`.`kod_produk` =`produk`.`nama_produk`");

        //FORMULA BARU PPO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $queryppo3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_sm_3
            FROM `penyata` ,  kilang, `profile_bulanan`,produk,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_akhir') AND
            `kilang`.`jenis` <>  'dummy' AND
            `produk`.`kumpulan_produk` =  '1' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` <> 'CPO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");


        //cpko

        $querycpko1 = DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_sm_1
             FROM `penyata` ,  kilang, `profile_bulanan`,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPKO'");


        $querycpko2 = DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_sm_2
            FROM `penyata` ,  kilang, `profile_bulanan`,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('cpo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPKO'");


        //FORMULA BARU CPKO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $querycpko3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_sm_3
            FROM `penyata` ,  kilang, `profile_bulanan`,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_akhir') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPKO'");

        $queryppko1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_sm_1
            FROM `penyata` ,  kilang, `profile_bulanan`,produk,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `produk`.`kumpulan_produk` =  '2' AND
            `penyata`.`kod_produk` <> 'CPKO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");


        $queryppko2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_sm_2
            FROM `penyata` ,  kilang, `profile_bulanan`, produk,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('ppo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `produk`.`kumpulan_produk` =  '2' AND
            `penyata`.`kod_produk` <> 'CPKO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");


        //FORMULA BARU PPKO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $queryppko3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_sm_3
             FROM `penyata` ,  kilang, `profile_bulanan`, produk,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'ppo' AND
             `negeri`.`nama_negeri` not in ('SABAH','SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_akhir') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` =  '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");

        //sabah
        //cpo

        $sbhcpo1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_sbh_1
             FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` in ('SABAH') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPO'");


        $sbhcpo2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_sbh_2
            FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` in ('SABAH') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('cpo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPO'");



        //FORMULA BARU CPO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $sbhcpo3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_sbh_3
             FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` in ('SABAH') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_akhir') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPO'");


        //ppo

        $sbhppo =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_sbh
             FROM `penyata` ,  kilang, `profile_bulanan`,produk ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` in ('SABAH') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('ppo_hasil') AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` =  '1' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` <> 'CPO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");


        $sbhppo1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_sbh_1
             FROM `penyata` ,  kilang, `profile_bulanan`,produk ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'ppo' AND
             `negeri`.`nama_negeri` in ('SABAH') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` =  '1' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` <> 'CPO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");

        $sbhppo2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_sbh_2
            FROM `penyata` ,  kilang, `profile_bulanan`,produk ,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri` in ('SABAH') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('ppo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `produk`.`kumpulan_produk` =  '1' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` <> 'CPO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");


        //FORMULA BARU PPO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $sbhppo3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_sbh_3
             FROM `penyata` ,  kilang, `profile_bulanan`,produk ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'ppo' AND
             `negeri`.`nama_negeri` in ('SABAH') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_akhir') AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` =  '1' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` <> 'CPO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");



        //cpko

        $sbhcpko1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_sbh_1
            FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` in ('SABAH') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPKO'");

        $sbhcpko2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_sbh_2
            FROM `penyata` ,  kilang, `profile_bulanan`,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri`  in ('SABAH') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('cpo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPKO'");


        //FORMULA BARU CPKO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $sbhcpko3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_sbh_3
             FROM `penyata` ,  kilang, `profile_bulanan`,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri`  in ('SABAH') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_akhir') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPKO'");


        //ppko


        $sbhppko1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_sbh_1
             FROM `penyata` ,  kilang, `profile_bulanan`,produk ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'ppo' AND
             `negeri`.`nama_negeri` in ('SABAH') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
              `produk`.`kumpulan_produk` =  '2' AND
              `penyata`.`kod_produk` <> 'CPKO' AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`");


        $sbhppko2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_sbh_2
            FROM `penyata` ,  kilang, `profile_bulanan`, produk ,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri`  in ('SABAH') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('ppo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `produk`.`kumpulan_produk` =  '2' AND
            `penyata`.`kod_produk` <> 'CPKO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");


        //FORMULA BARU PPKO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $sbhppko3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_sbh_3
             FROM `penyata` ,  kilang, `profile_bulanan`, produk ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'ppo' AND
             `negeri`.`nama_negeri`  in ('SABAH') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_akhir') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` =  '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");




        //sarawak
        //cpo

        $srwkcpo1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_srwk_1
             FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` in ('SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPO'");

        $srwkcpo2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_srwk_2
             FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` in ('SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('cpo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPO'");

        $srwkcpo3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_srwk_3
            FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` in ('SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_akhir') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPO'");


        //ppo

        $srwkppo =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_srwk
             FROM `penyata` ,  kilang, `profile_bulanan`,produk ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` in ('SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('ppo_hasil') AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` =  '1' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` <> 'CPO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");

        $srwkppo1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_srwk_1
            FROM `penyata` ,  kilang, `profile_bulanan`,produk,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri` in ('SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
            `kilang`.`jenis` <>  'dummy' AND
            `produk`.`kumpulan_produk` =  '1' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` <> 'CPO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");

        $srwkppo2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_srwk_2
             FROM `penyata` ,  kilang, `profile_bulanan`,produk,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'ppo' AND
             `negeri`.`nama_negeri` in ('SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('ppo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` =  '1' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` <> 'CPO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");


        //FORMULA BARU PPO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $srwkppo3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_srwk_3
             FROM `penyata` ,  kilang, `profile_bulanan`,produk,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'ppo' AND
             `negeri`.`nama_negeri` in ('SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_akhir') AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` =  '1' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` <> 'CPO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");


        //cpko

        $srwkcpko1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_srwk_1
             FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` in ('SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPKO'");

        $srwkcpko2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_srwk_2
            FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `negeri`.`nama_negeri` in ('SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('cpo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `penyata`.`kod_produk` = 'CPKO'");

        //FORMULA BARU CPKO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $srwkcpko3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_srwk_3
             FROM `penyata` ,  kilang, `profile_bulanan` ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'cpo_cpko' AND
             `negeri`.`nama_negeri` in ('SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_akhir') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `penyata`.`kod_produk` = 'CPKO'");


        //ppko

        $srwkppko1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_srwk_1
            FROM `penyata` ,  kilang, `profile_bulanan`,produk ,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri` in ('SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('stok_awal','bekalan_belian','bekalan_penerimaan','bekalan_import') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `produk`.`kumpulan_produk` =  '2' AND
            `penyata`.`kod_produk` <> 'CPKO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");

        $srwkppko2 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_srwk_2
            FROM `penyata` ,  kilang, `profile_bulanan`, produk ,negeri
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `negeri`.`nama_negeri` in ('SARAWAK') AND
            kilang.e_apnegeri = negeri.id_negeri AND
            `penyata`.`penyata` in  ('ppo_proses','jualan_jualan','jualan_edaran','jualan_eksport') AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
            `produk`.`kumpulan_produk` =  '2' AND
            `penyata`.`kod_produk` <> 'CPKO' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");

        //FORMULA BARU PPKO SELEPAS FIELD STOK AKHIR DILAPOR DIWUJUDKAN MULAI PL BULAN 4 2013
        $srwkppko3 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_srwk_3
             FROM `penyata` ,  kilang, `profile_bulanan`, produk ,negeri
             WHERE
             `penyata`.`tahun` =  '$tahun' AND
             `penyata`.`bulan` =  '$bulan' AND
             `profile_bulanan`.`tahun` =  '$tahun' AND
             `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` = 'ppo' AND
             `negeri`.`nama_negeri` in ('SARAWAK') AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`penyata` in  ('stok_akhir') AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` =  '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
             `penyata`.`kod_produk` =`produk`.`nama_produk`");

        // dd($querycpo2);

        if (($tahun == 2013 and $bulan >= 4) or ($tahun > 2013)) {
            //formula baru
            $cpo_sm = $querycpo3[0]->cpo_sm_3;
            $ppo_sm = $queryppo3[0]->ppo_sm_3;
            $cpko_sm = $querycpko3[0]->cpko_sm_3;
            $ppko_sm = $queryppko3[0]->ppko_sm_3;
            $cpo_sbh = $sbhcpo3[0]->cpo_sbh_3;
            $ppo_sbh = $sbhppo3[0]->ppo_sbh_3;
            $cpko_sbh = $sbhcpko3[0]->cpko_sbh_3;
            $ppko_sbh = $sbhppko3[0]->ppko_sbh_3;
            $cpo_srwk = $srwkcpo3[0]->cpo_srwk_3;
            $ppo_srwk = $srwkppo3[0]->ppo_srwk_3;
            $cpko_srwk = $srwkcpko3[0]->cpko_srwk_3;
            $ppko_srwk = $srwkppko3[0]->ppko_srwk_3;
        } elseif ($tahun > 2013 and $bulan < 4) {
            //formula baru
            $cpo_sm = $querycpo3[0]->cpo_sm_3;
            $ppo_sm = $queryppo3[0]->ppo_sm_3;
            $cpko_sm = $querycpko3[0]->cpko_sm_3;
            $ppko_sm = $queryppko3[0]->ppko_sm_3;
            $cpo_sbh = $sbhcpo3[0]->cpo_sbh_3;
            $ppo_sbh = $sbhppo3[0]->ppo_sbh_3;
            $cpko_sbh = $sbhcpko3[0]->cpko_sbh_3;
            $ppko_sbh = $sbhppko3[0]->ppko_sbh_3;
            $cpo_srwk = $srwkcpo3[0]->cpo_srwk_3;
            $ppo_srwk = $srwkppo3[0]->ppo_srwk_3;
            $cpko_srwk = $srwkcpko3[0]->cpko_srwk_3;
            $ppko_srwk = $srwkppko3[0]->ppko_srwk_3;
        } else {
            $cpo_sm = $querycpo1[0]->cpo_sm_1 - $querycpo2[0]->cpo_sm_2;
            $ppo_sm = $queryppo[0]->ppo_sm + $queryppo1[0]->ppo_sm_1 - $queryppo2[0]->ppo_sm_2;
            $cpko_sm = $querycpko1[0]->cpko_sm_1 - $querycpko2[0]->cpko_sm_2;
            $ppko_sm = $queryppko1[0]->ppko_sm_1 - $queryppko2[0]->ppko_sm_2;
            $cpo_sbh = $sbhcpo1[0]->cpo_sbh_1 - $sbhcpo2[0]->cpo_sbh_2;
            $ppo_sbh = $sbhppo[0]->ppo_sbh + $sbhppo1[0]->ppo_sbh_1 - $sbhppo2[0]->ppo_sbh_2;
            $cpko_sbh = $sbhcpko1[0]->cpko_sbh_1 - $sbhcpko2[0]->cpko_sbh_2;
            $ppko_sbh = $sbhppko1[0]->ppko_sbh_1 - $sbhppko2[0]->ppko_sbh_2;
            $cpo_srwk = $srwkcpo1[0]->cpo_srwk_1 - $srwkcpo2[0]->cpo_srwk_2;
            $ppo_srwk = $srwkppo[0]->ppo_srwk + $srwkppo1[0]->ppo_srwk_1 - $srwkppo2[0]->ppo_srwk_2;
            $cpko_srwk = $srwkcpko1[0]->cpko_srwk_1 - $srwkcpko2[0]->cpko_srwk_2;
            $ppko_srwk = $srwkppko1[0]->ppko_srwk_1 - $srwkppko2[0]->ppko_srwk_2;
        }


        // dd($cpo_sm);



        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        $array = [
            'tahun' => $tahun,
            'bulan' => $bulan,

            'querycpo1' => $querycpo1,
            'querycpo2' => $querycpo2,
            'querycpo3' => $querycpo3,

            'queryppo' => $queryppo,
            'queryppo1' => $queryppo1,
            'queryppo2' => $queryppo2,
            'queryppo3' => $queryppo3,

            'querycpko1' => $querycpko1,
            'querycpko2' => $querycpko2,
            'querycpko3' => $querycpko3,

            'queryppko1' => $queryppko1,
            'queryppko2' => $queryppko2,
            'queryppko3' => $queryppko3,

            'cpo_sm' => $cpo_sm,
            'ppo_sm' => $ppo_sm,
            'cpko_sm' => $cpko_sm,
            'ppko_sm' => $ppko_sm,

            'sbhcpo1' => $sbhcpo1,
            'sbhcpo2' => $sbhcpo2,
            'sbhcpo3' => $sbhcpo3,

            'sbhppo' => $sbhppo,
            'sbhppo1' => $sbhppo1,
            'sbhppo2' => $sbhppo2,
            'sbhppo3' => $sbhppo3,

            'sbhcpko1' => $sbhcpko1,
            'sbhcpko2' => $sbhcpko2,
            'sbhcpko3' => $sbhcpko3,

            'sbhppko1' => $sbhppko1,
            'sbhppko2' => $sbhppko2,
            'sbhppko3' => $sbhppko3,

            'sbhppo' => $sbhppo,
            'sbhppo1' => $sbhppo1,
            'sbhppo2' => $sbhppo2,
            'sbhppo3' => $sbhppo3,

            'cpo_sbh' => $cpo_sbh,
            'ppo_sbh' => $ppo_sbh,
            'cpko_sbh' => $cpko_sbh,
            'ppko_sbh' => $ppko_sbh,

            'srwkcpo1' => $srwkcpo1,
            'srwkcpo2' => $srwkcpo2,
            'srwkcpo3' => $srwkcpo3,

            'srwkppo' => $srwkppo,
            'srwkppo1' => $srwkppo1,
            'srwkppo2' => $srwkppo2,
            'srwkppo3' => $srwkppo3,

            'srwkcpko1' => $srwkcpko1,
            'srwkcpko2' => $srwkcpko2,
            'srwkcpko3' => $srwkcpko3,

            'srwkppko1' => $srwkppko1,
            'srwkppko2' => $srwkppko2,
            'srwkppko3' => $srwkppko3,

            'cpo_srwk' => $cpo_srwk,
            'ppo_srwk' => $ppo_srwk,
            'cpko_srwk' => $cpko_srwk,
            'ppko_srwk' => $ppko_srwk,
        ];
        // return view('admin.laporan_dq.tambah-stok-akhir', $array);
        return response()->json(['success' => $array]);
    }

    protected function admin_tambah_stok_akhir_proses2(Request $request)
    {

        // $count = Pelesen::max('e_id');

        //
        $hebahan = HebahanStokAkhir::create([
            // 'e_id' => $count+ 1,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'cpo_sm' => $request->cpo_sm,
            'ppo_sm' => $request->ppo_sm,
            'cpko_sm' => $request->cpko_sm,
            'ppko_sm' => $request->ppko_sm,
            'cpo_sbh' =>  $request->cpo_sbh,
            'ppo_sbh' =>  $request->ppo_sbh,
            'cpko_sbh' =>  $request->cpko_sbh,
            'ppko_sbh' => $request->ppko_sbh,
            'cpo_srwk' => $request->cpo_srwk,
            'ppo_srwk' => $request->ppo_srwk,
            'cpko_srwk' => $request->cpko_srwk,
            'ppko_srwk' => $request->ppko_srwk,



        ]);

        return redirect()->back()->with('success', 'Maklumat stok akhir sudah ditambah');
    }

    // public function admin_validasi_stok_akhir(Request $request)
    // {
    //     $tahun = $request->tahun;
    //     $bulan = $request->bulan;

    //     $cpo_sem = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
    //     SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
    //     FROM
    //         penyata,
    //         kilang,
    //         negeri,
    //         produk,
    //         profile_bulanan
    //         WHERE
    //         `penyata`.`tahun` =  '$tahun' AND
    //         `penyata`.`bulan` =  '$bulan' AND
    //         `profile_bulanan`.`tahun` =  '$tahun' AND
    //         `profile_bulanan`.`bulan` =  '$bulan' AND
    //          `penyata`.`menu` in ('cpo_cpko') AND
    //          `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
    //          `penyata`.`lesen` = `kilang`.`e_nl` AND
    //           kilang.e_apnegeri = negeri.id_negeri AND
    //          `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
    //          `produk`.`kumpulan_produk` = '1' AND
    //          `kilang`.`jenis` <>  'dummy' AND
    //          `penyata`.`kod_produk` = 'CPO' AND
    //           `penyata`.`kuantiti` <>  0 AND
    //           `penyata`.`kod_produk` =`produk`.`nama_produk`
    //           GROUP by lesen");


    //     $total_3a_3b = 0;
    //     $total_3c_3d = 0;
    //     $total = 0;
    //     $total_all_sem = 0;

    //     foreach ($cpo_sem as $data) {
    //         $total_3a_3b =
    //             ($data->stok_awal) + ($data->bekalan_belian) +
    //             ($data->bekalan_penerimaan) + ($data->bekalan_penerimaan);
    //         $total_3c_3d =
    //             ($data->cpo_proses) + ($data->jualan_jualan) +
    //             ($data->jualan_edaran) + ($data->jualan_eksport);
    //     };

    //     if ($cpo_sem) {
    //         $total = $total_3a_3b + $total_3c_3d;
    //     }

    //     $breadcrumbs    = [
    //         ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
    //         ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
    //     ];

    //     $kembali = route('admin.dashboard');

    //     $returnArr = [
    //         'breadcrumbs' => $breadcrumbs,
    //         'kembali'     => $kembali,
    //     ];
    //     $layout = 'layouts.admin';

    //     return view('admin.laporan_dq.validasi-stok-akhir', compact('returnArr', 'layout', 'bulan', 'cpo_sem','total', 'total_3a_3b', 'total_3c_3d', 'total_all_sem'));
    // }

    public function admin_validasi_stok_akhir_proses(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;


        //cpo semenanjung malaysia
        $cpo_sem = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");

        //   dd($cpo_sem);

        $total_3a_3b = 0;
        $total_3c_3d = 0;
        $total = 0;
        $total_all_sem = 0;

        foreach ($cpo_sem as $data) {
            $total_3a_3b = ($data->stok_awal) + ($data->bekalan_belian) + ($data->bekalan_penerimaan) + ($data->bekalan_import);
            $total_3c_3d = ($data->cpo_proses) + ($data->jualan_jualan) + ($data->jualan_edaran) + ($data->jualan_eksport);

            $total += $total_3a_3b + $total_3c_3d;
            $total_all_sem += $total;
        }

        //cpo sabah
        $cpo_sabah = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
               SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
               FROM
                   penyata,
                   kilang,
                   negeri,
                   produk,
                   profile_bulanan
                   WHERE
                   `penyata`.`tahun` =  '$tahun' AND
                   `penyata`.`bulan` =  '$bulan' AND
                   `profile_bulanan`.`tahun` =  '$tahun' AND
                   `profile_bulanan`.`bulan` =  '$bulan' AND
                    `penyata`.`menu` in ('cpo_cpko') AND
                    `negeri`.`nama_negeri` in ( 'SABAH') AND
                    `penyata`.`lesen` = `kilang`.`e_nl` AND
                     kilang.e_apnegeri = negeri.id_negeri AND
                    `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
                    `produk`.`kumpulan_produk` = '1' AND
                    `kilang`.`jenis` <>  'dummy' AND
                    `penyata`.`kod_produk` = 'CPO' AND
                     `penyata`.`kuantiti` <>  0 AND
                     `penyata`.`kod_produk` =`produk`.`nama_produk`
                     GROUP by lesen");


        //cpo sarawak
        $cpo_srwk = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //ppo semenanjung malaysia
        $ppo_sem = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
           WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` <> 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");



        //ppo sabah
        $ppo_sabah = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SABAH') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` <> 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //ppo sarawak
        $ppo_srwk = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` <> 'CPO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //cpko semenanjung malaysia
        $cpko_sem = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //cpko sabah
        $cpko_sabah = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SABAH') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");


        //cpko sarawak
        $cpko_srwk = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang, negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'cpo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS cpo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('cpo_cpko') AND
             `negeri`.`nama_negeri` in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `penyata`.`kod_produk` = 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");



        //ppko semenanjung malaysia
        $ppko_sem = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo') AND
             `negeri`.`nama_negeri` not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` = '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");



        //ppko sabah
        $ppko_sabah = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang, negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo') AND
             `negeri`.`nama_negeri` in ( 'SABAH') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` = '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");



        //ppko sarawak
        $ppko_srwk = DB::connection('mysql2')->select(" SELECT lesen,e_np as kilang, negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo') AND
             `negeri`.`nama_negeri` in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
              kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND
             `kilang`.`jenis` <>  'dummy' AND
             `produk`.`kumpulan_produk` = '2' AND
             `penyata`.`kod_produk` <> 'CPKO' AND
              `penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");




        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        $array = [
            'tahun' => $tahun,
            'bulan' => $bulan,

            'cpo_sem' => $cpo_sem,
            'cpo_sabah' => $cpo_sabah,
            'cpo_srwk' => $cpo_srwk,

            'ppo_sem' => $ppo_sem,
            'ppo_sabah' => $ppo_sabah,
            'ppo_srwk' => $ppo_srwk,

            'cpko_sem' => $cpko_sem,
            'cpko_sabah' => $cpko_sabah,
            'cpko_srwk' => $cpko_srwk,


            'ppko_sem' => $ppko_sem,
            'ppko_sabah' => $ppko_sabah,
            'ppko_srwk' => $ppko_srwk,


            'total_3a_3b' => $total_3a_3b,
            'total_3c_3d' => $total_3c_3d,
            'total' => $total,
            'total_all_sem' => $total_all_sem,

            'breadcrumbs' => $breadcrumbs,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];


        return view('admin.laporan_dq.validasi-stok-akhir', $array);
    }

    public function admin_validasi_stok_akhir_ikut_produk(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $produk = $request->produk;

        if (($produk == 'RBDPO3') ||  ($produk == 'RBDPL') ||  ($produk == 'RBDPS') || ($produk == 'PFAD'))
            $sqlstmt1 = "`produk`.`kumpulan_produk` = '1' AND";
        else
            $sqlstmt1 = "`produk`.`kumpulan_produk` = '2' AND";

        if ($produk == 'OTHERS')
            $sqlstmt2 = "`penyata`.`kod_produk` NOT IN('RBDPO3','RBDPL','RBDPS','PFAD') AND `penyata`.`kod_produk` <> 'CPO' AND";
        else
            $sqlstmt2 = "`penyata`.`kod_produk`= '$produk' AND ";

        //RBDPO - SEMENANJUNG MALAYSIA

        $ppo_sem = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             negeri.nama_negeri not in ( 'SABAH','SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND" . $sqlstmt1 .
            "`kilang`.`jenis` <>  'dummy' AND" . $sqlstmt2 .
            "`penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");

        //   dd($ppo_sem);

        //RBDPO - SABAH

        $ppo_sabah = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             negeri.nama_negeri in ('SABAH') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND" . $sqlstmt1 .
            "`kilang`.`jenis` <>  'dummy' AND" . $sqlstmt2 .
            "`penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");

        //   dd($ppo_sem);

        //RBDPO - SARAWAK

        $ppo_srwk = DB::connection('mysql2')->select("SELECT lesen,e_np as kilang,negeri.nama_negeri as negeri,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_hasil' and `penyata`.`menu` in ('cpo_cpko') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_hasil,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_awal' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_awal,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_belian' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_belian,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_penerimaan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_penerimaan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'bekalan_import' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS bekalan_import,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'ppo_proses' and `penyata`.`menu` in ('ppo')THEN  `penyata`.`kuantiti` ELSE NULL END)  AS ppo_proses,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_jualan' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_jualan,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_edaran' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_edaran,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'jualan_eksport' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS jualan_eksport,
        SUM(CASE  WHEN `penyata`.`penyata`  = 'stok_akhir' and `penyata`.`menu` in ('ppo') THEN  `penyata`.`kuantiti` ELSE NULL END)  AS stok_akhir
        FROM
            penyata,
            kilang,
            negeri,
            produk,
            profile_bulanan

            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `profile_bulanan`.`tahun` =  '$tahun' AND
            `profile_bulanan`.`bulan` =  '$bulan' AND
             `penyata`.`menu` in ('ppo','cpo_cpko') AND
             negeri.nama_negeri in ( 'SARAWAK') AND
             `penyata`.`lesen` = `kilang`.`e_nl` AND
             kilang.e_apnegeri = negeri.id_negeri AND
             `penyata`.`lesen` = `profile_bulanan`.`no_lesen` AND" . $sqlstmt1 .
            "`produk`.`kumpulan_produk` = '1' AND
             `kilang`.`jenis` <>  'dummy' AND" . $sqlstmt2 .
            "`penyata`.`kuantiti` <>  0 AND
              `penyata`.`kod_produk` =`produk`.`nama_produk`
              GROUP by lesen");

        //   dd($ppo_sem);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';


        $array = [
            'tahun' => $tahun,
            'bulan' => $bulan,
            'produk' => $produk,

            'ppo_sem' => $ppo_sem,
            'ppo_sabah' => $ppo_sabah,
            'ppo_srwk' => $ppo_srwk,


            'breadcrumbs' => $breadcrumbs,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];


        return view('admin.laporan_dq.validasi-stok-akhir-ikut-produk', $array);
    }

    public function admin_minyak_sawit_diproses()
    {
        $bulan = Bulan::get();

        $hebahan = DB::connection('mysql2')->select("SELECT* FROM hebahan_proses
        order by tahun, bulan");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Minyak Sawit Diproses"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.minyak-sawit-diproses', compact('returnArr', 'layout', 'bulan', 'hebahan'));
    }

    public function admin_edit_minyak_sawit_diproses(Request $request, $id)
    {
        // $hebahan = DB::connection('mysql2')->select("SELECT $id FROM hebahan_proses");

        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');
        $cpo_msia = $request->input('cpo_msia');
        $ppo_msia = $request->input('ppo_msia');
        $cpko_msia = $request->input('cpko_msia');
        $ppko_msia = $request->input('ppko_msia');
        DB::connection('mysql2')->select("UPDATE hebahan_proses SET tahun = '$tahun', bulan='$bulan',
        cpo_msia= '$cpo_msia',ppo_msia='$ppo_msia',cpko_msia ='$cpko_msia',ppko_msia='$ppko_msia'
        WHERE id='$id'");

        // $hebahan = DB::connection('mysql2')->table('hebahan_proses')->where('id', $id)->update(array('cpko_msia' => $cpko_msia));


        // $hebahan = DB::connection('mysql2')->select("SELECT * FROM hebahan_proses WHERE id='$id");
        // $hebahan->tahun = $request->tahun;
        // $hebahan->bulan = $request->bulan;
        // $hebahan->cpo_msia = $request->cpo_msia;
        // $hebahan->ppo_msia = $request->ppo_msia;
        // $hebahan->cpko_msia = $request->cpko_msia;
        // $hebahan->ppko_msia = $request->ppko_msia;
        // $hebahan->save();


        return redirect()->route('admin.minyak.sawit.diproses')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function admin_delete_minyak_sawit_diproses($id)
    {
        DB::connection('mysql2')->select("delete from hebahan_proses where id = '$id'");

        return redirect()->route('admin.minyak.sawit.diproses')
            ->with('success', 'Maklumat Dihapuskan');
    }


    public function admin_tambah_proses()
    {
        $data = DB::connection('mysql2')->select("SELECT* FROM hebahan_proses");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Minyak Sawit Diproses"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Tambah Maklumat"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.tambah-proses', compact('returnArr', 'layout', 'data'));
    }


    public function admin_tambah_proses_proses(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        //malaysia
        //--> cpo

        $querycpo1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpo_msia_1
            FROM `penyata` ,produk, kilang
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `penyata`.`penyata` in  ('cpo_proses') AND
            `produk`.`kumpulan_produk` =  '1' AND
            `penyata`.`kod_produk` = 'CPO' AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");

        //--> ppo

        $queryppo1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppo_msia_1
            FROM `penyata` ,  kilang, produk
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `penyata`.`penyata` in  ('ppo_proses') AND
            `produk`.`kumpulan_produk` =  '1' AND
            `penyata`.`kod_produk` <> 'CPO' AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");


        //--> cpko

        $querycpko1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as cpko_msia_1
            FROM `penyata` ,  kilang, produk
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'cpo_cpko' AND
            `penyata`.`penyata` in  ('cpo_proses') AND
            `penyata`.`kod_produk` = 'CPKO' AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");


        //--> ppko

        $queryppko1 =  DB::connection('mysql2')->select("SELECT sum(`penyata`.`kuantiti`) as ppko_msia_1
            FROM `penyata` ,kilang,produk
            WHERE
            `penyata`.`tahun` =  '$tahun' AND
            `penyata`.`bulan` =  '$bulan' AND
            `penyata`.`menu` = 'ppo' AND
            `penyata`.`penyata` in  ('ppo_proses') AND
            `penyata`.`kod_produk` <> 'CPKO' AND
            `kilang`.`jenis` <>  'dummy' AND
            `penyata`.`lesen` = `kilang`.`e_nl` AND
            `produk`.`kumpulan_produk` =  '2' AND
            `penyata`.`kod_produk` =`produk`.`nama_produk`");


        $cpo_msia = $querycpo1[0]->cpo_msia_1;
        $ppo_msia = $queryppo1[0]->ppo_msia_1;
        $cpko_msia = $querycpko1[0]->cpko_msia_1;
        $ppko_msia = $queryppko1[0]->ppko_msia_1;

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Hebahan 10hb"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Minyak Sawit Diproses"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        $array = [
            'tahun' => $tahun,
            'bulan' => $bulan,

            'querycpo1' => $querycpo1,
            'queryppo1' => $queryppo1,
            'querycpko1' => $querycpko1,
            'queryppko1' => $queryppko1,

            'cpo_msia' => $cpo_msia,
            'ppo_msia' => $ppo_msia,
            'cpko_msia' => $cpko_msia,
            'ppko_msia' => $ppko_msia,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];
        // return view('admin.laporan_dq.tambah-stok-akhir', $array);
        return response()->json(['success' => $array]);
    }


    // public function admin_add_minyak_sawit_diproses(Request $request)
    // {
    //     dd($request->all());
    //     $this->validation_tambah_minyak($request->all())->validate();
    //     $this->store_tambah_minyak($request->all());

    //     return redirect()->back()->with('success', 'Maklumat minyak Sawit diproses sudah ditambah');
    // }

    protected function validation_tambah_minyak(array $data)
    {
        return Validator::make($data, [
            // 'Id' => ['required', 'string'],
            'tahun' => ['required', 'string'],
            'bulan' => ['required', 'string'],
            'cpo_msia' => ['required', 'string'],
            'ppo_msia' => ['required', 'string'],
            'cpko_msia' => ['required', 'string'],
            'ppko_msia' => ['required', 'string'],
        ]);
    }

    protected function admin_add_minyak_sawit_diproses(Request $request)
    {


        $proses = HebahanProses::where('tahun', $request->tahun)->where('bulan', $request->bulan)->first();
        if ($proses) {
            return redirect()->back()->with("error", "Tahun dan bulan telah tersedia");
        } else {
            $hebahan = HebahanProses::create([
                // 'e_id' => $count+ 1,
                'tahun' => $request->tahun,
                'bulan' => $request->bulan,
                'cpo_msia' => $request->cpo_msia,
                'ppo_msia' => $request->ppo_msia,
                'cpko_msia' => $request->cpko_msia,
                'ppko_msia' => $request->ppko_msia
            ]);

            return redirect()->back()->with('success', 'Maklumat stok akhir sudah ditambah');
        }
    }

    public function admin_validasi_minyak_sawit_diproses(Request $request)
    {

        $tahun = $request->tahun;
        $bulan = $request->bulan;

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Validasi Minyak Sawit Diproses"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        //--> cpo
        $querycpo1 = DB::connection('mysql2')->select("SELECT e_nl as lesen, e_np as kilang, negeri.nama_negeri as negeri, sum(`penyata`.`kuantiti`) as cpo_msia_1
        FROM `penyata` ,produk, kilang,negeri
        WHERE
        `penyata`.`tahun` =  '$tahun' AND
        `penyata`.`bulan` =  '$bulan' AND
        `penyata`.`menu` = 'cpo_cpko' AND
        `penyata`.`penyata` in  ('cpo_proses') AND
        `produk`.`kumpulan_produk` =  '1' AND
        `penyata`.`kod_produk` = 'CPO' AND
        `kilang`.`jenis` <>  'dummy' AND
        `penyata`.`lesen` = `kilang`.`e_nl` AND
        kilang.e_apnegeri = negeri.id_negeri AND
        `penyata`.`kod_produk` =`produk`.`nama_produk`
        group by e_nl, e_np");

        //--> ppo
        $queryppo1 = DB::connection('mysql2')->select("SELECT e_nl as lesen, e_np as kilang,negeri.nama_negeri as negeri, sum(`penyata`.`kuantiti`) as ppo_msia_1
        FROM `penyata` ,  kilang, produk,negeri
        WHERE
        `penyata`.`tahun` =  '$tahun' AND
        `penyata`.`bulan` =  '$bulan' AND
        `penyata`.`menu` = 'ppo' AND
        `penyata`.`penyata` in  ('ppo_proses') AND
        `produk`.`kumpulan_produk` =  '1' AND
        `penyata`.`kod_produk` <> 'CPO' AND
        `kilang`.`jenis` <>  'dummy' AND
        `penyata`.`lesen` = `kilang`.`e_nl` AND
        kilang.e_apnegeri = negeri.id_negeri AND
        `penyata`.`kod_produk` =`produk`.`nama_produk`
        group by e_nl, e_np");

        //--> cpko
        $querycpko1 = DB::connection('mysql2')->select("SELECT e_nl as lesen, e_np as kilang,nama_negeri as negeri, sum(`penyata`.`kuantiti`) as cpko_msia_1
        FROM `penyata` ,  kilang, produk, negeri
        WHERE
        `penyata`.`tahun` =  '$tahun' AND
        `penyata`.`bulan` =  '$bulan' AND
        `penyata`.`menu` = 'cpo_cpko' AND
        `penyata`.`penyata` in  ('cpo_proses') AND
        `penyata`.`kod_produk` = 'CPKO' AND
        `kilang`.`jenis` <>  'dummy' AND
        `penyata`.`lesen` = `kilang`.`e_nl` AND
        kilang.e_apnegeri = negeri.id_negeri AND
        `penyata`.`kod_produk` =`produk`.`nama_produk`
        group by e_nl, e_np");

        //--> ppko
        $queryppko1 = DB::connection('mysql2')->select("SELECT e_nl as lesen, e_np as kilang,nama_negeri as negeri, sum(`penyata`.`kuantiti`) as ppko_msia_1
        FROM `penyata` ,kilang,produk, negeri
        WHERE
        `penyata`.`tahun` =  '$tahun' AND
        `penyata`.`bulan` =  '$bulan' AND
        `penyata`.`menu` = 'ppo' AND
        `penyata`.`penyata` in  ('ppo_proses') AND
        `penyata`.`kod_produk` <> 'CPKO' AND
        `kilang`.`jenis` <>  'dummy' AND
        `penyata`.`lesen` = `kilang`.`e_nl` AND
        kilang.e_apnegeri = negeri.id_negeri AND
        `produk`.`kumpulan_produk` =  '2' AND
        `penyata`.`kod_produk` =`produk`.`nama_produk`
        group by e_nl, e_np");


        $array = [
            'tahun' => $tahun,
            'bulan' => $bulan,

            'querycpo1' => $querycpo1,
            'queryppo1' => $queryppo1,
            'querycpko1' => $querycpko1,
            'queryppko1' => $queryppko1,

            'breadcrumbs' => $breadcrumbs,
            'kembali' => $kembali,

            'returnArr' => $returnArr,
            'layout' => $layout,

        ];


        return view('admin.laporan_dq.validasi-minyak-sawit-diproses', $array);
    }



    public function admin_oleo_export()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $negara = Negara::distinct()->orderBy('namanegara')->get();

        // $list_pelesen = User::where('id', '942')->get('name');

        // dd($list_pelesen);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.eksport.eksport', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'negeri', 'negara', 'users', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_by_licensee()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-licensee', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'negeri', 'users', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_all()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kawasan = Region::get();



        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Aktiviti"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.activities-all', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'negeri', 'users', 'prodsubgroup', 'produk', 'kawasan'));
    }

    public function admin_activities_by_state()
    {
        $prodgroup = ProdukGroup::get();
        $prodsubgroup = ProdukSubgroup::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-state', compact('returnArr', 'layout', 'prodgroup', 'prodsubgroup'));
    }

    public function admin_activities_by_district()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-district', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'negeri', 'users', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_by_region()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        $kawasan = Region::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-region', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'kawasan', 'users', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_by_product()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        // $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        // $kawasan = Region::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-product', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'prodsubgroup', 'produk'));
    }

    public function admin_activities_by_productgroup()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        // $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        // $kawasan = Region::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.activities.by-productgroup', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'prodsubgroup', 'produk'));
    }


    public function admin_yearly_by_licensee()
    {
        $prodgroup = ProdukGroup::get();
        $prodcat = ProdukCategory::get();
        // $users = User::where('category', 'PLBIO')->get();
        $prodsubgroup = ProdukSubgroup::get();
        $produk = Produk::where('prodcat', '')->get();
        // $kawasan = Region::get();


        // dd($produk);


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-licensee', compact('returnArr', 'layout', 'prodgroup', 'prodcat', 'prodsubgroup', 'produk'));
    }

    public function admin_yearly_by_state()
    {


        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-state', compact('returnArr', 'layout'));
    }

    public function admin_yearly_by_district()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-district', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_yearly_by_region()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-region', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_yearly_by_product()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-product', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_yearly_by_productgroup()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-productgroup', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_yearly_by_month()
    {
        $bulan = Bulan::get();
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $daerah = Daerah::get();
        $subproduct = ProdukSubgroup::get();
        $prodcat = ProdukGroup::get();
        $kumpproduk = DB::connection('mysql2')->select("SELECT * FROM kump_produk");
        $produk = DB::connection('mysql2')->select("SELECT * FROM produk");

        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // $users = Pelesen::where('e_nl', $users2->e_nl)->orderBy('e_np')->first();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.yearly.by-month', compact(
            'returnArr',
            'layout',
            'bulan',
            'negeri',
            'subproduct',
            'kumpproduk',
            'users2',
            'produk',
            'prodcat'
        ));
    }

    public function admin_bulanan_lesen_process(Request $request)
    {
        dd($request->all());
        $tahun = $request->tahun;
        $produk = $request->produk;

        $test = DB::select("SELECT e.ebio_nl,e.ebio_reg ,p.e_nl, b.ebio_b1
        FROM pelesen p, e_bio_inits e, e_bio_b_s b
        WHERE e.ebio_thn = '$request->tahun'
        and p.e_nl = e.ebio_nl
        and e.ebio_nl = e.ebio_reg
        and e.ebio_b5 =  '$request->produk'");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Laporan Tahunan"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        return view('admin.laporan_dq.oleochemical-monthly.table-senarai-lesen', compact('returnArr', 'layout', 'test'));
    }


    public function test(Request $request)
    {
        if ($request->tahun) {
            $tahun_sql = "tahun = '$request->tahun'";
        } else {
            $tahun_sql = "";
        }

        if ($request->bulan) {
            $bulan_sql = "bulan = '$request->bulan'";
        } else {
            $bulan_sql = "";
        }

        $query = DB::select("SELECT e.ebio_nl,e.ebio_reg ,p.e_nl, b.ebio_b1
        FROM pelesen p, e_bio_inits e, e_bio_b_s b
        WHERE $tahun_sql
        AND
        $bulan_sql'");
    }
}
