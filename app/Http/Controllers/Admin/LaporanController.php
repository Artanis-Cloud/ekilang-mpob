<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use App\Models\Daerah;
use App\Models\EBioCC;
use App\Models\EBioInit;
use App\Models\H91Init;
use App\Models\HBioB;
use App\Models\HBioC;
use App\Models\HBioCC;
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

    public function admin_ringkasan_penyata()
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

        $users2 = User::with('pelesen')->where('category', 'PLBIO')->get();
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

        return view('admin.laporan_dq.ringkasan.ringkasan-penyata', $array);
    }

    public function admin_ringkasan_penyata_table(Request $request)
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
        // dd($result);

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

        if ($request->tahun && $request->e_negeri && $request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('ebio_thn', 'LIKE', '%' . $request->tahun . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
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

        if (!$result->isEmpty()) {
            foreach ($result as $key =>  $res_daerah) {
                $data_daerah[$key] = Daerah::where('kod_negeri', $res_daerah->e_negeri)->where('kod_daerah', $res_daerah->e_daerah)->first();
            }
            // dd($data_daerah);
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
                'data_daerah' => $data_daerah,

                'returnArr' => $returnArr,
                'layout' => $layout,

            ];

            return view('admin.laporan_dq.ringkasan.ringkasan-penyata-table', $array);
        } else {
            return redirect()->back()->with('error', 'Data Tidak Wujud');
        }
    }



    public function admin_laporan_ringkasan($ebio_nl, $tahun)
    {
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.9penyataterdahulu'), 'name' => "Maklumat Penyata Bulanan"],
        ];

        $kembali = route('admin.ringkasan.penyata');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        //RINGKASAN URUSNIAGA

        //dapatkan no batch
        $no_batches = HBioInit::where('ebio_nl', $ebio_nl)->where('ebio_thn', $tahun)->get();

        foreach ($no_batches as  $no_batch) {
            $hbiob = DB::table('h_bio_b_s')->where('ebio_nobatch', $no_batch->ebio_nobatch)
                ->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')->orderBy('ebio_b4')
                ->get();

            $hbiob_b = DB::table('h_bio_c_s')->where('ebio_nobatch', $no_batch->ebio_nobatch)
                ->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->orderBy('ebio_c3')
                ->get();

            // $hbiob = $hbiob_a->merge($hbiob_b);

            // $hbiob = DB::select("SELECT '*'
            // FROM h_bio_b_s b, h_bio_c_s c, produk p
            // WHERE b.ebio_nobatch = $no_batch->ebio_nobatch
            // and b.ebio_b4 = p.prodid
            // and c.ebio_c4 = p.prodid
            // order by b.ebio_b4");

            // dd($hbiob_b);
            // $new_bulan = $no_batch->ebio_bln - 1;
            $data_bulanan_ebio_b5 = [];
            $data_bulanan_ebio_b6 = [];
            $data_bulanan_ebio_b7 = [];
            $data_bulanan_ebio_b8 = [];
            $data_bulanan_ebio_b9 = [];
            $data_bulanan_ebio_b10 = [];
            $data_bulanan_ebio_b11 = [];

            for ($i = 1; $i <= 12; $i++) {
                // if($new_bulan == 0){
                //     $new_bulan = 12;
                // }
                if ($i ==  $no_batch->ebio_bln)

                    foreach ($hbiob as  $data3) {

                        $data_bulanan_ebio_b5[$data3->ebio_b4][$i] = $data3->ebio_b5 ?? 0;
                        $data_bulanan_ebio_b6[$data3->ebio_b4][$i] = $data3->ebio_b6 ?? 0;
                        $data_bulanan_ebio_b7[$data3->ebio_b4][$i] = $data3->ebio_b7 ?? 0;
                        $data_bulanan_ebio_b8[$data3->ebio_b4][$i] = $data3->ebio_b8 ?? 0;
                        $data_bulanan_ebio_b9[$data3->ebio_b4][$i] = $data3->ebio_b9 ?? 0;
                        $data_bulanan_ebio_b10[$data3->ebio_b4][$i] = $data3->ebio_b10 ?? 0;
                        $data_bulanan_ebio_b11[$data3->ebio_b4][$i] = $data3->ebio_b11 ?? 0;
                        $proddesc[$data3->ebio_b4] = $data3->proddesc ?? 0;
                    }

            }

            for ($i2 = 1; $i2 <= 12; $i2++) {
                if ($i2 ==  $no_batch->ebio_bln)

                    foreach ($hbiob_b as  $data4) {

                        $data_bulanan_ebio_c4[$data4->ebio_c3][$i2] = $data4->ebio_c4 ?? 0;
                        $data_bulanan_ebio_c5[$data4->ebio_c3][$i2] = $data4->ebio_c5 ?? 0;
                        $data_bulanan_ebio_c6[$data4->ebio_c3][$i2] = $data4->ebio_c6 ?? 0;
                        $data_bulanan_ebio_c7[$data4->ebio_c3][$i2] = $data4->ebio_c7 ?? 0;
                        $data_bulanan_ebio_c8[$data4->ebio_c3][$i2] = $data4->ebio_c8 ?? 0;
                        $data_bulanan_ebio_c9[$data4->ebio_c3][$i2] = $data4->ebio_c9 ?? 0;
                        $data_bulanan_ebio_c10[$data4->ebio_c3][$i2] = $data4->ebio_c10 ?? 0;
                        $proddesc[$data4->ebio_c3] = $data4->proddesc ?? 0;
                    }
            }
        }
        // dd($proddesc);
        foreach ($data_bulanan_ebio_b5 as $key => $v) :

            $total5[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_b6 as $key => $v) :

            $total6[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_b7 as $key => $v) :

            $total7[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_b8 as $key => $v) :

            $total8[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_b9 as $key => $v) :

            $total9[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_b10 as $key => $v) :

            $total10[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_b11 as $key => $v) :

            $total11[$key] = array_sum($v);

        endforeach;


        foreach ($data_bulanan_ebio_c4 as $key => $v) :

            $totalc4[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_c5 as $key => $v) :

            $totalc5[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_c6 as $key => $v) :

            $totalc6[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_b7 as $key => $v) :

            $totalc7[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_c8 as $key => $v) :

            $totalc8[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_c9 as $key => $v) :

            $totalc9[$key] = array_sum($v);

        endforeach;
        foreach ($data_bulanan_ebio_c10 as $key => $v) :

            $totalc10[$key] = array_sum($v);

        endforeach;



        //loop untuk dapatkan tarikh by format
        foreach ($no_batches as  $list_result) {

            $date = DB::table('h_bio_inits')->where('ebio_nobatch', $list_result->ebio_nobatch)->get();
            for ($i = 1; $i <= 12; $i++) {

                if ($i ==  $no_batch->ebio_bln)
                    foreach ($date as $hbiob) {
                        $myDateTime = DateTime::createFromFormat('Y-m-d', $hbiob->ebio_sdate);
                        $formatteddate = $myDateTime->format('d-m-Y');
                        $ebio_sdate[$i] = $formatteddate ?? 0;
                    }
            }
        }


        $data2 = HBioInit::find($ebio_nl);
        $data = Pelesen::where('e_nl', $ebio_nl)->first();
        $negeri = Negeri::where('kod_negeri', $data->e_negeri)->first();
        $data_daerah = Daerah::where('kod_negeri', $data->e_negeri)->where('kod_daerah', $data->e_daerah)->first();



        $array = [

            'negeri' => $negeri,
            'data' => $data,
            'ebio_sdate' => $ebio_sdate,
            'data_daerah' => $data_daerah,
            'data_bulanan_ebio_b5' => $data_bulanan_ebio_b5,
            'data_bulanan_ebio_b6' => $data_bulanan_ebio_b6,
            'data_bulanan_ebio_b7' => $data_bulanan_ebio_b7,
            'data_bulanan_ebio_b8' => $data_bulanan_ebio_b8,
            'data_bulanan_ebio_b9' => $data_bulanan_ebio_b9,
            'data_bulanan_ebio_b10' => $data_bulanan_ebio_b10,
            'data_bulanan_ebio_b11' => $data_bulanan_ebio_b11,
            'data_bulanan_ebio_c4' => $data_bulanan_ebio_c4,
            'data_bulanan_ebio_c5' => $data_bulanan_ebio_c5,
            'data_bulanan_ebio_c6' => $data_bulanan_ebio_c6,
            'data_bulanan_ebio_c7' => $data_bulanan_ebio_c7,
            'data_bulanan_ebio_c8' => $data_bulanan_ebio_c8,
            'data_bulanan_ebio_c9' => $data_bulanan_ebio_c9,
            'data_bulanan_ebio_c10' => $data_bulanan_ebio_c10,
            'hbiob' => $hbiob,
            'no_batches' => $no_batches,
            'data2' => $data2,
            'data3' => $data3,
            'total5' => $total5,
            'total6' => $total6,
            'total7' => $total7,
            'total8' => $total8,
            'total9' => $total9,
            'total10' => $total10,
            'total11' => $total11,
            'totalc4' => $totalc4,
            'totalc5' => $totalc5,
            'totalc6' => $totalc6,
            'totalc7' => $totalc7,
            'totalc8' => $totalc8,
            'totalc9' => $totalc9,
            'totalc10' => $total10,
            'kembali' => $kembali,
            'returnArr' => $returnArr,
            'layout' => $layout,
            'proddesc' => $proddesc,

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
        $negeri = Negeri::distinct('prodcat')->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::whereIn('kumpulan', ['01', '02', '03', '06', '08'])->get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();
        $produk = Produk::whereIn('prodcat', ['01', '02', '03', '06', '08'])->orderBy('prodname')->get();




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

        // dd($request->all());
        $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();
        // dd($users2);
        $negeri = Negeri::distinct('prodcat')->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::whereIn('kumpulan', ['01', '02', '03', '06', '08'])->get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();
        $produk = Produk::whereIn('prodcat', ['01', '02', '03', '06', '08'])->orderBy('prodname')->get();
        $tahun = $request->tahun;
        $tahun = $request->tahun;
        $start_month = $request->start_month;
        $end_month = $request->end_month;
        $equal_month = $request->start;
        $bulan = $request->bulan;
        $laporan = $request->laporan;
        $lesen = $request->e_nl;
        $negeri_req = $request->e_negeri;
        $kump_prod = $request->kumpproduk;

        $equal_month = intval($equal_month);

        $start_month = intval($start_month);
        $end_month = intval($end_month);
        //RINGKASAN URUSNIAGA
        $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
            ->where('ebio_thn', $tahun)->groupBy('ebio_nl')->get();


        if ($request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal') {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between') {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->groupBy('ebio_nl')->get();
        }

        if ($request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        // dd($request->all());
        if ($request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_negeri && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_negeri && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_negeri && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_negeri && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_nl && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_nl && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_nl && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_nl && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_daerah && $request->bulan == 'equal' && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_daerah && $request->bulan == 'between' && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_daerah && $request->bulan == 'equal' && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_daerah && $request->bulan == 'between' && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'between' && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_negeri && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_negeri && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_nl && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_nl && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_daerah && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_daerah && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }



        // dd($result);

        // dd($request->kod_produk);

        // if ($request->e_nl && $request->kod_produk) {
        //     $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_b_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_b_s.ebio_nobatch')
        //     ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_b_s.ebio_b4', '=', 'produk.prodid')
        //     ->where('ebio_thn',$tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
        //     ->where('prodname', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        // }
        //  dd( $result);
        if (!$result->isEmpty()) {

            foreach ($result as $key =>  $list_result) {
                $no_batches = DB::table('h_bio_inits')->where('ebio_nl', $list_result->ebio_nl)->where('ebio_thn', $tahun)->get();
                $data_daerah[$key] = Daerah::where('kod_negeri', $list_result->kod_negeri)->where('kod_daerah', $list_result->e_daerah)->first();

                //   dd( $no_batches);

                foreach ($no_batches as $no_batch) {


                    if ($request->kod_produk != null) {

                        $hbiob_s = DB::select("SELECT *
                        from  h_bio_b_s h, produk p, h_bio_inits s
                        where h.ebio_nobatch = $no_batch->ebio_nobatch
                        and p.prodid =  h.ebio_b4
                        and h.ebio_b4 = '$request->kod_produk';");

                        // $hbiob_s = HBioB::with('produk')->where('ebio_nobatch', $no_batch->ebio_nobatch)->where('ebio_b4',$request->kod_produk)->get();
                    } elseif ($request->kumpproduk != null) {
                        $produk = Produk::where('prodcat', $request->kumpproduk)->get();

                        foreach ($produk as $data) {

                            $hbiob_s = DB::select("SELECT *
                            from  h_bio_b_s h, produk p, h_bio_inits s
                            where h.ebio_nobatch = $no_batch->ebio_nobatch
                            and p.prodcat = $data->prodcat
                            and h.ebio_b4 = p.prodid;");
                        }
                    } else {

                        $hbiob_s = DB::select("SELECT *
                        from h_bio_b_s h, produk p, h_bio_inits s
                        where h.ebio_nobatch = $no_batch->ebio_nobatch
                        and p.prodid =  h.ebio_b4
                        ");

                        // $hbiob_s = HBioB::with('produk')->where('ebio_nobatch', $no_batch->ebio_nobatch)->get();
                    }

                    // dd($hbiob_s);

                    for ($i = 1; $i <= 12; $i++) {
                        if ($i == $no_batch->ebio_bln) {
                            foreach ($hbiob_s as  $hbiob) {
                                $ebio_b5_bhg1[$list_result->ebio_nl][$hbiob->ebio_b4][$i] = $hbiob->ebio_b5 ?? 0;
                                $ebio_b6_bhg1[$list_result->ebio_nl][$hbiob->ebio_b4][$i] = $hbiob->ebio_b6 ?? 0;
                                $ebio_b7_bhg1[$list_result->ebio_nl][$hbiob->ebio_b4][$i] = $hbiob->ebio_b7 ?? 0;
                                $ebio_b8_bhg1[$list_result->ebio_nl][$hbiob->ebio_b4][$i] = $hbiob->ebio_b8 ?? 0;
                                $ebio_b9_bhg1[$list_result->ebio_nl][$hbiob->ebio_b4][$i] = $hbiob->ebio_b9 ?? 0;
                                $ebio_b10_bhg1[$list_result->ebio_nl][$hbiob->ebio_b4][$i] = $hbiob->ebio_b10 ?? 0;
                                $ebio_b11_bhg1[$list_result->ebio_nl][$hbiob->ebio_b4][$i] = $hbiob->ebio_b11 ?? 0;
                                if ($request->kumpproduk != null) {
                                    $proddesc[$list_result->ebio_nl][$hbiob->ebio_b4] = $hbiob->proddesc ?? '';
                                }

                                // elseif([$request->kumpproduk != null]  && [$request->kod_produk != null]  ){
                                //     $proddesc[$list_result->ebio_nl][$hbiob->ebio_b4] = $hbiob->proddesc ?? '';
                                // }

                                else {
                                    $proddesc[$list_result->ebio_nl][$hbiob->ebio_b4] = $hbiob->proddesc ?? '';
                                }
                            }
                        }
                    }
                }
            }
            // dd($hbiob_s);


            // dd($no_batches);
            // dd($ebio_b5_bhg1);


            $layout = 'layouts.main';


            $array = [
                'produk' => $produk,
                'users2' => $users2,
                'pembeli' => $pembeli,
                'kumpproduk' => $kumpproduk,
                'kump_prod' => $kump_prod,
                'negeri' => $negeri,
                'negeri_req' => $negeri_req,
                'lesen' => $lesen,
                'result' => $result,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kembali' => $kembali,
                'returnArr' => $returnArr,
                'layout' => $layout,
                'laporan' => $laporan,
                'start_month' => $start_month,
                'end_month' => $end_month,
                'equal_month' => $equal_month,
                'ebio_b5_bhg1' => $ebio_b5_bhg1,
                'ebio_b6_bhg1' => $ebio_b6_bhg1,
                'ebio_b7_bhg1' => $ebio_b7_bhg1,
                'ebio_b8_bhg1' => $ebio_b8_bhg1,
                'ebio_b9_bhg1' => $ebio_b9_bhg1,
                'ebio_b10_bhg1' => $ebio_b10_bhg1,
                'ebio_b11_bhg1' => $ebio_b11_bhg1,
                'data_daerah' => $data_daerah,
                'proddesc' => $proddesc,

            ];

            return view('admin.laporan_dq.ringkasan.ringkasan-bahagian1-table', $array);
        } else {
            return redirect()->back()->with('error', 'Data Tidak Wujud');
        }
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
        $equal_month = $request->start;
        $bulan = $request->bulan;
        $laporan = $request->laporan;
        $lesen = $request->e_nl;
        $negeri_req = $request->e_negeri;

        //RINGKASAN OPERASI
        $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahunbhg2', $tahun)
            ->groupBy('lesen')->get();


        if ($request->e_nl) {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahunbhg2', $tahun)
                ->where('lesen', 'LIKE', '%' . $request->e_nl . '%')->groupBy('lesen')->get();
        }
        if ($request->bulan == 'equal') {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahunbhg2', $tahun)
                ->where('bulanbhg2', 'LIKE', '%' . $request->start . '%')->groupBy('lesen')->get();
        }
        //  dd($result);
        if ($request->bulan == 'between') {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahunbhg2', $tahun)
                ->whereBetween('bulanbhg2', [$start_month,  $end_month])->get();
        }
        if ($request->e_negeri) {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahunbhg2', $tahun)
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('lesen')->get();
        }
        if ($request->e_daerah) {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahunbhg2', $tahun)
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')
                ->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('e_negeri')->get();
        }
        if ($request->bulan == 'equal' && $request->e_nl) {
            $result = DB::table('h_hari')->leftJoin('pelesen', 'h_hari.lesen', '=', 'pelesen.e_nl')->where('tahunbhg2', $tahun)
                ->where('bulanbhg2', 'LIKE', '%' . $request->start . '%')->where('lesen', 'LIKE', '%' . $request->e_nl . '%')->groupBy('lesen')->get();
        }
        // dd( $result);
        // if( $result){

        // for ($i=1; $i <= 12; $i++) {
        //     $data_hari_operasi[$i] = 0;
        //     $data_kapasiti[$i] = 0;
        // }


        if (!$result->isEmpty()) {
            foreach ($result as $key =>  $list_result) {
                // dd( $list_result);

                $hbiob_s = DB::table('h_hari')->where('lesen', $list_result->lesen)->where('tahunbhg2', $tahun)->get();
                $data_daerah[$key] = Daerah::where('kod_negeri', $list_result->e_negeri)->where('kod_daerah', $list_result->e_daerah)->first();

                foreach ($hbiob_s as  $hbiob) {
                    // $new_bulan = $hbiob->bulanbhg2 - 1;
                    // if($new_bulan == 0){
                    //     $new_bulan = 12;
                    // }

                    for ($i = 1; $i <= 12; $i++) {
                        if ($i ==  $hbiob->bulanbhg2) {
                            $data_hari_operasi[$list_result->lesen][$i] = $hbiob->hari_operasi ?? 0;
                            $data_kapasiti[$list_result->lesen][$i] = $hbiob->kapasiti ?? 0;
                        }
                    }
                }
            }
            // dd( $data_hari_operasi);

            $equal_month = intval($equal_month);
            $start_month = intval($start_month);
            $end_month = intval($end_month);

            $layout = 'layouts.admin';

            $array = [
                'produk' => $produk,
                'users2' => $users2,
                'pembeli' => $pembeli,
                'kumpproduk' => $kumpproduk,
                'negeri' => $negeri,
                'data_daerah' => $data_daerah,
                'negeri_req' => $negeri_req,
                'lesen' => $lesen,
                'result' => $result,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kembali' => $kembali,
                'returnArr' => $returnArr,
                'layout' => $layout,
                'laporan' => $laporan,
                'start_month' => $start_month,
                'end_month' => $end_month,
                'equal_month' => $equal_month,
                'data_hari_operasi' => $data_hari_operasi,
                'data_kapasiti' => $data_kapasiti,

            ];

            return view('admin.laporan_dq.ringkasan.ringkasan-bahagian2-table', $array);
        } else {
            return redirect()->back()->with('error', 'Data Tidak Wujud');
        }
    }
    public function admin_ringkasan_bahagian3()
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
        $negeri = Negeri::distinct('prodcat')->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::whereIn('kumpulan', ['03', '06', '08', '12'])->get();
        $produk = Produk::whereIn('prodcat', ['03', '06', '08'])->orderBy('prodname')->get();
        $pembeli = SyarikatPembeli::orderBy('id')->get();


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

        return view('admin.laporan_dq.ringkasan.ringkasan-bahagian3', $array);
    }

    public function admin_ringkasan_bahagian3_table(Request $request)
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
        $negeri = Negeri::distinct('prodcat')->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::whereIn('kumpulan', ['03', '06', '08', '12'])->get();
        $produk = Produk::whereIn('prodcat', ['03', '06', '08'])->orderBy('prodname')->get();
        $tahun = $request->tahun;
        $tahun = $request->tahun;
        $start_month = $request->start_month;
        $end_month = $request->end_month;
        $equal_month = $request->start;
        $bulan = $request->bulan;
        $laporan = $request->laporan;
        $lesen = $request->e_nl;
        $negeri_req = $request->e_negeri;
        $kump_prod = $request->kumpproduk;


        $equal_month = intval($equal_month);

        $start_month = intval($start_month);
        $end_month = intval($end_month);

        // dd($request->all());

        //RINGKASAN URUSNIAGA
        $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)->groupBy('ebio_nl')->get();


        if ($request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_negeri && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->e_negeri && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal') {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between') {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->groupBy('ebio_nl')->get();
        }
        // dd($result);
        if ($request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal' && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_nl) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal' && $request->e_nl && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_nl && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal' && $request->e_nl && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_nl && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        // dd($request->all());
        if ($request->bulan == 'equal' && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        // dd( $result);
        if ($request->bulan == 'between' && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal' && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal' && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal' && $request->kumpproduk && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->kumpproduk && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'equal' && $request->kod_produk && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')
                ->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->kod_produk && $request->e_negeri) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->kumpproduk && $request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')
                ->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->kumpproduk && $request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)
                ->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->where('e_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->kod_produk && $request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                ->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')
                ->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between' && $request->kod_produk && $request->e_daerah) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')->where('ebio_thn', $tahun)
                // ->whereBetween('ebio_bln', [$start_month. '%', $end_month.'%'] )
                ->where('ebio_bln', '>=', $start_month)->where('ebio_bln', '<=', $end_month)->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')
                ->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }


        if ($request->e_nl && $request->kumpproduk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodcat', 'LIKE', '%' . $request->kumpproduk . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->e_nl && $request->kod_produk) {
            $result = DB::table('h_bio_inits')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_c_s', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_c_s.ebio_nobatch')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('produk', 'h_bio_c_s.ebio_c3', '=', 'produk.prodid')
                ->where('ebio_thn', $tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')
                ->where('prodid', 'LIKE', '%' . $request->kod_produk . '%')->groupBy('ebio_nl')->get();
        }
        // dd($result);

        if (!$result->isEmpty()) {

            foreach ($result as $key => $list_result) {


                $no_batches = DB::table('h_bio_inits')->where('ebio_nl', $list_result->ebio_nl)->where('ebio_thn', $tahun)->get();
                $data_daerah[$key] = Daerah::where('kod_negeri', $list_result->kod_negeri)->where('kod_daerah', $list_result->e_daerah)->first();

                foreach ($no_batches as $no_batch) {

                    // dd($no_batch);



                    if ($request->kod_produk != null) {

                        $hbiob_s = DB::select("SELECT *
                        from  h_bio_c_s h, produk p, h_bio_inits s
                        where h.ebio_nobatch = $no_batch->ebio_nobatch
                        and p.prodid =  h.ebio_c3
                        and h.ebio_c3 = '$request->kod_produk';");

                        // $hbiob_s = HBioB::with('produk')->where('ebio_nobatch', $no_batch->ebio_nobatch)->where('ebio_b4',$request->kod_produk)->get();
                    } elseif ($request->kumpproduk != null) {
                        $produk = Produk::where('prodcat', $request->kumpproduk)->get();

                        foreach ($produk as $data) {

                            $hbiob_s = DB::select("SELECT *
                            from  h_bio_c_s h, produk p, h_bio_inits s
                            where h.ebio_nobatch = $no_batch->ebio_nobatch
                            and p.prodcat = $data->prodcat
                            and h.ebio_c3 = p.prodid;");
                        }
                    } else {
                        $hbiob_s = DB::select("SELECT *
                        from h_bio_c_s h, produk p, h_bio_inits s
                        where h.ebio_nobatch = $no_batch->ebio_nobatch
                        and p.prodid =  h.ebio_c3

                        ");

                        // $hbiob_s = HBioC::with('produk')->where('ebio_nobatch', $no_batch->ebio_nobatch)->get();

                    }

                    // dd($no_batch);
                    // dd($request->all());

                    for ($i = 1; $i <= 12; $i++) {
                        // $new_bulan = $no_batch->ebio_bln - 1;
                        // if($new_bulan == 0){
                        //     $new_bulan = 12;
                        // }
                        if ($i == $no_batch->ebio_bln) {
                            foreach ($hbiob_s as  $hbiob) {
                                $ebio_c4_bhg3[$list_result->ebio_nl][$hbiob->ebio_c3][$i] = $hbiob->ebio_c4 ?? 0;
                                $ebio_c5_bhg3[$list_result->ebio_nl][$hbiob->ebio_c3][$i] = $hbiob->ebio_c5 ?? 0;
                                $ebio_c6_bhg3[$list_result->ebio_nl][$hbiob->ebio_c3][$i] = $hbiob->ebio_c6 ?? 0;
                                $ebio_c7_bhg3[$list_result->ebio_nl][$hbiob->ebio_c3][$i] = $hbiob->ebio_c7 ?? 0;
                                $ebio_c8_bhg3[$list_result->ebio_nl][$hbiob->ebio_c3][$i] = $hbiob->ebio_c8 ?? 0;
                                $ebio_c9_bhg3[$list_result->ebio_nl][$hbiob->ebio_c3][$i] = $hbiob->ebio_c9 ?? 0;
                                $ebio_c10_bhg3[$list_result->ebio_nl][$hbiob->ebio_c3][$i] = $hbiob->ebio_c10 ?? 0;
                                if ($request->kumpproduk != null) {
                                    $proddesc[$list_result->ebio_nl][$hbiob->ebio_c3] = $hbiob->proddesc ?? '';
                                } else {
                                    $proddesc[$list_result->ebio_nl][$hbiob->ebio_c3] = $hbiob->proddesc  ?? '';
                                }
                            }
                        }
                    }
                }
            }


            //  dd($ebio_c4_bhg3) ;
            $array = [
                'produk' => $produk,
                'users2' => $users2,
                'kumpproduk' => $kumpproduk,
                'kump_prod' => $kump_prod,
                'negeri' => $negeri,
                'data_daerah' => $data_daerah,
                'negeri_req' => $negeri_req,
                'lesen' => $lesen,
                'result' => $result,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kembali' => $kembali,
                'returnArr' => $returnArr,
                'laporan' => $laporan,
                'start_month' => $start_month,
                'end_month' => $end_month,
                'equal_month' => $equal_month,
                'ebio_c4_bhg3' => $ebio_c4_bhg3,
                'ebio_c5_bhg3' => $ebio_c5_bhg3,
                'ebio_c6_bhg3' => $ebio_c6_bhg3,
                'ebio_c7_bhg3' => $ebio_c7_bhg3,
                'ebio_c8_bhg3' => $ebio_c8_bhg3,
                'ebio_c9_bhg3' => $ebio_c9_bhg3,
                'ebio_c10_bhg3' => $ebio_c10_bhg3,
                'proddesc' => $proddesc,

            ];

            return view('admin.laporan_dq.ringkasan.ringkasan-bahagian3-table', $array);
        } else {
            return redirect()->back()->with('error', 'Data Tidak Wujud');
        }
    }

    public function admin_ringkasan_jualan_bio()
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

        // $users2 = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();

        $users2 = DB::select("SELECT r.e_nl, p.e_np
        FROM pelesen p, reg_pelesen r
        WHERE p.e_nl = r.e_nl
        AND r.e_kat = 'PLBIO'
        AND p.e_kat = 'PLBIO'
        ORDER BY p.e_nl");


        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        $kumpproduk = KumpProduk::get();
        $produk = Produk::get();
        $pembeli = SyarikatPembeli::orderBy('pembeli')->get();

        // dd($users2);

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

        return view('admin.laporan_dq.ringkasan.ringkasan-jualanbio', $array);
    }

    public function admin_ringkasan_jualan_bio_table(Request $request)
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
        $pembeli = SyarikatPembeli::orderBy('pembeli')->get();
        $tahun = $request->tahun;
        $lesen = $request->e_nl;
        $negeri_req = $request->e_negeri;
        $pemb_req = $request->pembeli;
        $syk = HBioCC::get();
        $start_month = $request->start_month;
        $end_month = $request->end_month;
        $equal_month = $request->start;
        $bulan = $request->bulan;


        $equal_month = intval($equal_month);

        $start_month = intval($start_month);
        $end_month = intval($end_month);
        //    dd($syk);
        //RINGKASAN URUSNIAGA()
        foreach ($syk as $cc) {

            $syk_batch = $cc->ebio_nobatch;
        }
        //   dd($syk_batch);
        // $result = HBioInit::with('hbiocc')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')->leftJoin('h_bio_cc', 'h_bio_inits.ebio_nobatch', '=', 'h_bio_cc.ebio_nobatch')
        // ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
        // ->where('ebio_thn',$tahun)->groupBy('ebio_nl')->get();
        // dd($request->all());
        $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
            ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
            ->where('ebio_thn', $tahun)->groupBy('ebio_nl')->get();


        if ($request->e_negeri) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->where('kod_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
            // dd($result);
        }
        if ($request->e_daerah) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->where('kod_negeri', 'LIKE', '%' . $request->e_negeri . '%')->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal') {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->bulan == 'between') {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->whereBetween('ebio_bln', [$start_month . '%', $end_month . '%'])->groupBy('ebio_nl')->get();
        }

        if ($request->e_nl) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }
        if ($request->pembeli) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->where('ebio_cc3', 'LIKE', '%' . $request->pembeli . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_nl) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'between' && $request->e_nl) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->whereBetween('ebio_bln', [$start_month . '%', $end_month . '%'])->where('ebio_nl', 'LIKE', '%' . $request->e_nl . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_negeri) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('kod_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'between' && $request->e_negeri) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->whereBetween('ebio_bln', [$start_month . '%', $end_month . '%'])->where('kod_negeri', 'LIKE', '%' . $request->e_negeri . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'equal' && $request->e_daerah) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->where('ebio_bln', 'LIKE', '%' . $request->start . '%')->where('kod_negeri', 'LIKE', '%' . $request->e_negeri . '%')
                ->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }

        if ($request->bulan == 'between' && $request->e_daerah) {
            $result = DB::table('h_bio_cc')->leftJoin('h_bio_inits', 'h_bio_cc.ebio_nobatch', '=', 'h_bio_inits.ebio_nobatch')->leftJoin('pelesen', 'h_bio_inits.ebio_nl', '=', 'pelesen.e_nl')
                ->leftJoin('negeri', 'pelesen.e_negeri', '=', 'negeri.kod_negeri')->leftJoin('syarikat_pembeli', 'h_bio_cc.ebio_cc3', '=', 'syarikat_pembeli.id')
                ->where('ebio_thn', $tahun)->whereBetween('ebio_bln', [$start_month . '%', $end_month . '%'])->where('kod_negeri', 'LIKE', '%' . $request->e_negeri . '%')
                ->where('e_daerah', 'LIKE', '%' . $request->e_daerah . '%')->groupBy('ebio_nl')->get();
        }


        //    dd($result);
        if (!$result->isEmpty()) {
            foreach ($result as $key => $list_result) {
                $no_batches = DB::table('h_bio_inits')->where('ebio_nobatch', $list_result->ebio_nobatch)->where('ebio_thn', $tahun)->get();
                $data_daerah[$key] = Daerah::where('kod_negeri', $list_result->kod_negeri)->where('kod_daerah', $list_result->e_daerah)->first();

                // dd($no_batches);
                foreach ($no_batches as $no_batch) {

                    if ($request->pembeli) {
                        $hbiob_s = DB::table('h_bio_cc')->where('ebio_nobatch', $no_batch->ebio_nobatch)->where('ebio_cc3', $request->pembeli)->get();
                    } else {
                        $hbiob_s = DB::table('h_bio_cc')->where('ebio_nobatch', $no_batch->ebio_nobatch)->get();
                    }
                    // $hbiob_s = HBioCC::with('syarikat')->where('ebio_nobatch', $no_batch->ebio_nobatch)->get();
                    // dd($hbiob_s);


                    foreach ($hbiob_s as  $hbiob) {

                        $hb = SyarikatPembeli::where('id', $hbiob->ebio_cc3)->get();

                        // $jualan_bio[$list_result->ebio_nl][$hbiob->ebio_cc4] = $hbiob->ebio_cc4 ?? 0;

                        foreach ($hb as  $test) {

                            $syk_bio[$list_result->ebio_nl][$hbiob->ebio_cc4] = $test->pembeli ?? 0;
                        }
                        // foreach ($syk_bio as  $s) {
                        //     $test = SyarikatPembeli::find($s);
                        //     foreach ($test as  $new_test) {

                        //         $new_syk[$list_result->ebio_nl][$hbiob->ebio_cc4]  = $new_test->pembeli ?? 0;

                        //     }

                        // }


                        for ($i = 1; $i <= 12; $i++) {
                            // $new_bulan = $no_batch->ebio_bln - 1;
                            // if($new_bulan == 0){
                            //     $new_bulan = 12;
                            // }

                            if ($i == $no_batch->ebio_bln) {

                                // foreach ($hb as  $sya) {

                                // dd($hbiob);

                                // $syk_bio[$list_result->ebio_nl][$hbiob->ebio_cc3][$i] =  $sya->pembeli  ?? 0;
                                $jualan_bio[$list_result->ebio_nl][$hbiob->ebio_cc4][$i] =  $hbiob->ebio_cc4  ?? 0;

                                // }
                            }
                        }
                    }
                }
            }
            //   dd($jualan_bio);

            $array = [
                'produk' => $produk,
                'users2' => $users2,
                'pembeli' => $pembeli,
                'kumpproduk' => $kumpproduk,
                'negeri' => $negeri,
                'data_daerah' => $data_daerah,
                'result' => $result,
                'tahun' => $tahun,
                'kembali' => $kembali,
                'returnArr' => $returnArr,
                'jualan_bio' => $jualan_bio,
                'syk_bio' => $syk_bio,
                'pemb_req' => $pemb_req,
                'negeri_req' => $negeri_req,
                'lesen' => $lesen,
                'bulan' => $bulan,
                'start_month' => $start_month,
                'end_month' => $end_month,
                'equal_month' => $equal_month,

            ];

            return view('admin.laporan_dq.ringkasan.ringkasan-jualanbio-table', $array);
        } else {
            return redirect()->back()->with('error', 'Data Tidak Wujud');
        }
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
        // $list_penyata = DB::raw("SELECT e.ebio_sdate AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
        // FROM e_bio_inits e
        // LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
        // LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
        // WHERE e.ebio_sdate BETWEEN $sdate AND $edate");
        $list_penyata = DB::select("SELECT date_format(e.ebio_sdate ,'%d-%m-%Y') AS date, p.e_np, p.e_nl, e.ebio_nl, e.ebio_sdate, p.e_negeri, n.nama_negeri, n.kod_negeri
        FROM e_bio_inits e
        LEFT JOIN pelesen p ON p.e_nl = e.ebio_nl
        LEFT JOIN negeri n ON p.e_negeri = n.kod_negeri
        WHERE e.ebio_sdate BETWEEN '$sdate' AND '$edate'");

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

        $kembali = route('admin.pl.lewat');

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
        $kapasiti = Kapasiti::with('pelesen', 'user')->whereHas('user', function ($query) {
            return $query->where('category', '=', 'PLBIO');
        })->get();
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
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '01'");
            // dd($kapasiti_kedah);

            $kapasiti_kedah = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '02'");
            // dd($kapasiti_kedah);

            //     SELECT DISTINCT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
            // FROM kapasiti k, pelesen p, users u
            // WHERE k.tahun = '2022'
            // AND k.e_nl = p.e_nl
            // AND p.e_nl = u.username
            // AND u.category = 'PLBIO'
            // AND p.e_negeri = '02'

            $kapasiti_kelantan = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '03'");
            // dd($kapasiti_kedah);

            $kapasiti_melaka = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '04'");
            // dd($kapasiti_kedah);

            $kapasiti_n9 = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '05'");
            // dd($kapasiti_kedah);

            $kapasiti_pahang = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '06'");
            // dd($kapasiti_kedah);

            $kapasiti_perak = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '07'");
            // dd($kapasiti_perak);

            $kapasiti_perlis = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '08'");
            // dd($kapasiti_kedah);

            $kapasiti_penang = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '09'");
            // dd($kapasiti_kedah);

            $kapasiti_selangor = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '10'");
            // dd($kapasiti_kedah);

            $kapasiti_terengganu = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '11'");
            // dd($kapasiti_kedah);

            $kapasiti_wp = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '12'");
            // dd($kapasiti_kedah);

            $kapasiti_sabah = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '13'");
            // dd($kapasiti_kedah);

            $kapasiti_sarawak = DB::select("SELECT k.e_nl, k.tahun, k.jan, k.feb, k.mac, k.apr, k.mei, k.jun, k.jul, k.ogs, k.sept, k.okt, k.nov, k.dec, p.e_np, p.e_nl, p.e_negeri
        FROM kapasiti k, pelesen p, users u
        WHERE $tahun_sql
        AND k.e_nl = p.e_nl
        AND p.e_nl = u.username
        AND u.category = 'PLBIO'
        AND p.e_negeri = '14'");
            // dd($kapasiti_kedah);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Tahunan Kapasiti"],

            ];

            $kembali = route('admin.laporan.tahunan');

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
            $bulan2 = $request->start;
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
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Kilang Biodiesel Beroperasi"],

            ];

            $kembali = route('admin.laporan.tahunan');

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
                'bulan2' => $bulan2,
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
            // dd($request->tahun);

            if ($request->tahun) {
                $tahun_sql = "innit.ebio_thn = '$request->tahun' ";
            } else {
                $tahun_sql = "";
            }
            if ($request->bulan == 'equal') {
                $bulan_sql = "AND innit.ebio_bln = $request->start";
            } elseif ($request->bulan == 'between') {
                $bulan_sql = "AND innit.ebio_bln BETWEEN $request->start_month AND $request->end_month";
            } else {
                $bulan_sql = "";
            }
            $bulan = $request->bulan;
            $bulan2 = $request->start;
            $tahun2 = $request->tahun;
            $start_month = $request->start_month;
            $end_month = $request->end_month;


            $pengeluaran =   DB::select("SELECT p.e_np, p.e_nl, p.kap_proses, p.e_negeri, h.ebio_c3, h.ebio_c6, h.ebio_nobatch, p.e_nl, innit.ebio_bln, innit.ebio_thn
            FROM h_bio_c_s h
            LEFT JOIN h_bio_inits innit ON h.ebio_nobatch = innit.ebio_nobatch
            LEFT JOIN pelesen p ON p.e_nl = innit.ebio_nl
            LEFT JOIN kapasiti k ON k.e_nl = innit.ebio_nl
            WHERE $tahun_sql" . "$bulan_sql
            AND  h.ebio_c3 = 'AW'");

            // dd($pengeluaran);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Pengeluaran Produk Biodiesel"],

            ];

            $kembali = route('admin.laporan.tahunan');

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
                'bulan2' => $bulan2,

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
                $tahun_sql = "e.ebio_thn = '$request->tahun' ";
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
            $bulan2 = $request->start;

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
            WHERE $tahun_sql" . "$bulan_sql
            AND h.ebio_c3 = 'AW'
            GROUP BY p.e_nl ;");

            // dd($eksport);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Eksport Produk Biodiesel"],

            ];

            $kembali = route('admin.laporan.tahunan');

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
                'bulan2' => $bulan2,

                'eksport' => $eksport,


                // 'breadcrumbs' => $breadcrumbs,
                // 'kembali' => $kembali,

                'returnArr' => $returnArr,
                'layout' => $layout,

            ];
            return view('admin.laporan_dq.laporan-eksport', $array);
        } elseif ($laporan == 'proses') {
            // dd($request->tahun);

            if ($request->tahun) {
                $tahun_sql = "innit.ebio_thn = '$request->tahun' ";
            } else {
                $tahun_sql = "";
            }
            if ($request->bulan == 'equal') {
                $bulan_sql = "AND innit.ebio_bln = $request->start";
            } elseif ($request->bulan == 'between') {
                $bulan_sql = "AND innit.ebio_bln BETWEEN $request->start_month AND $request->end_month";
            } else {
                $bulan_sql = "";
            }
            $bulan = $request->bulan;
            $bulan2 = $request->start;
            $tahun2 = $request->tahun;
            $start_month = $request->start_month;
            $end_month = $request->end_month;

            if ($start_month == '1') {
                $start = 'Jan';
            } elseif ($start_month == '2') {
                $start = 'Feb';
            } elseif ($start_month == '3') {
                $start = 'Mac';
            } elseif ($start_month == '4') {
                $start = 'Apr';
            } elseif ($start_month == '5') {
                $start = 'Mei';
            } elseif ($start_month == '6') {
                $start = 'Jun';
            } elseif ($start_month == '7') {
                $start = 'Jul';
            } elseif ($start_month == '8') {
                $start = 'Ogos';
            } elseif ($start_month == '9') {
                $start = 'Sept';
            } elseif ($start_month == '10') {
                $start = 'Okt';
            } elseif ($start_month == '11') {
                $start = 'Nov';
            } elseif ($start_month == '12') {
                $start = 'Dec';
            }

            if ($end_month == '1') {
                $end = 'Jan';
            } elseif ($end_month == '2') {
                $end = 'Feb';
            } elseif ($end_month == '3') {
                $end = 'Mac';
            } elseif ($end_month == '4') {
                $end = 'Apr';
            } elseif ($end_month == '5') {
                $end = 'Mei';
            } elseif ($end_month == '6') {
                $end = 'Jun';
            } elseif ($end_month == '7') {
                $end = 'Jul';
            } elseif ($end_month == '8') {
                $end = 'Ogos';
            } elseif ($end_month == '9') {
                $end = 'Sept';
            } elseif ($end_month == '10') {
                $end = 'Okt';
            } elseif ($end_month == '11') {
                $end = 'Nov';
            } elseif ($end_month == '12') {
                $end = 'Dis';
            }

            $proses =   DB::select("SELECT p.e_np, p.e_nl, p.kap_proses, p.e_negeri, h.ebio_b3 as ebio_c3, SUM(h.ebio_b8) as ebio_c6, h.ebio_nobatch, p.e_nl, innit.ebio_bln, innit.ebio_thn
            FROM h_bio_b_s h
            LEFT JOIN h_bio_inits innit ON h.ebio_nobatch = innit.ebio_nobatch
            LEFT JOIN pelesen p ON p.e_nl = innit.ebio_nl
            LEFT JOIN kapasiti k ON k.e_nl = innit.ebio_nl
            WHERE $tahun_sql" . "$bulan_sql
            AND  h.ebio_b3 in ('1', '2')
            GROUP by innit.ebio_bln, p.e_nl");
            // dd($proses);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Proses Selanjutnya Produk Biodiesel"],

            ];

            $kembali = route('admin.laporan.tahunan');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            $layout = 'layouts.admin';

            if ($start_month) {
                $array = [
                    'laporan' => $laporan,
                    'tahun_sql' => $tahun_sql,
                    'tahun2' => $tahun2,
                    'bulan' => $bulan,
                    'bulan2' => $bulan2,
                    'start' => $start,
                    'end' => $end,

                    'proses' => $proses,

                    'start_month' => $start_month,
                    'end_month' => $end_month,

                    'returnArr' => $returnArr,
                    'layout' => $layout,

                ];
            } else {
                $array = [
                    'laporan' => $laporan,
                    'tahun_sql' => $tahun_sql,
                    'tahun2' => $tahun2,
                    'bulan' => $bulan,
                    'bulan2' => $bulan2,
                    // 'start' => $start,
                    // 'end' => $end,

                    'proses' => $proses,

                    'start_month' => $start_month,
                    'end_month' => $end_month,

                    'returnArr' => $returnArr,
                    'layout' => $layout,

                ];
            }

            return view('admin.laporan_dq.laporan-proses', $array);
        } elseif ($laporan == 'utilrate') {
            // dd($request->tahun);

            if ($request->tahun) {
                $tahun_sql = "innit.ebio_thn = '$request->tahun' ";
            } else {
                $tahun_sql = "";
            }
            if ($request->bulan == 'equal') {
                $bulan_sql = "AND innit.ebio_bln = $request->start";
            } elseif ($request->bulan == 'between') {
                $bulan_sql = "AND innit.ebio_bln BETWEEN $request->start_month AND $request->end_month";
            } else {
                $bulan_sql = "";
            }
            $bulan = $request->bulan;
            $bulan2 = $request->start;
            $tahun2 = $request->tahun;
            $start_month = $request->start_month;
            $end_month = $request->end_month;

            if ($start_month == '1') {
                $start = 'Jan';
            } elseif ($start_month == '2') {
                $start = 'Feb';
            } elseif ($start_month == '3') {
                $start = 'Mac';
            } elseif ($start_month == '4') {
                $start = 'Apr';
            } elseif ($start_month == '5') {
                $start = 'Mei';
            } elseif ($start_month == '6') {
                $start = 'Jun';
            } elseif ($start_month == '7') {
                $start = 'Jul';
            } elseif ($start_month == '8') {
                $start = 'Ogos';
            } elseif ($start_month == '9') {
                $start = 'Sept';
            } elseif ($start_month == '10') {
                $start = 'Okt';
            } elseif ($start_month == '11') {
                $start = 'Nov';
            } elseif ($start_month == '12') {
                $start = 'Dec';
            }

            if ($end_month == '1') {
                $end = 'Jan';
            } elseif ($end_month == '2') {
                $end = 'Feb';
            } elseif ($end_month == '3') {
                $end = 'Mac';
            } elseif ($end_month == '4') {
                $end = 'Apr';
            } elseif ($end_month == '5') {
                $end = 'Mei';
            } elseif ($end_month == '6') {
                $end = 'Jun';
            } elseif ($end_month == '7') {
                $end = 'Jul';
            } elseif ($end_month == '8') {
                $end = 'Ogos';
            } elseif ($end_month == '9') {
                $end = 'Sept';
            } elseif ($end_month == '10') {
                $end = 'Okt';
            } elseif ($end_month == '11') {
                $end = 'Nov';
            } elseif ($end_month == '12') {
                $end = 'Dis';
            }

            if ($bulan2 == '1') {
                $bulan3 = 'Januari';
            } elseif ($bulan2 == '2') {
                $bulan3 = 'Februari';
            } elseif ($bulan2 == '3') {
                $bulan3 = 'Mac';
            } elseif ($bulan2 == '4') {
                $bulan3 = 'April';
            } elseif ($bulan2 == '5') {
                $bulan3 = 'Mei';
            } elseif ($bulan2 == '6') {
                $bulan3 = 'Jun';
            } elseif ($bulan2 == '7') {
                $bulan3 = 'Julai';
            } elseif ($bulan2 == '8') {
                $bulan3 = 'Ogos';
            } elseif ($bulan2 == '9') {
                $bulan3 = 'September';
            } elseif ($bulan2 == '10') {
                $bulan3 = 'Oktober';
            } elseif ($bulan2 == '11') {
                $bulan3 = 'November';
            } elseif ($bulan2 == '12') {
                $bulan3 = 'Dissember';
            }

            $proses_sm =   DB::select("SELECT p.e_np, p.e_nl, p.kap_proses, p.e_negeri, h.ebio_b3 as ebio_c3, SUM(h.ebio_b8) as ebio_c6, h.ebio_nobatch, p.e_nl, innit.ebio_bln, innit.ebio_thn
            FROM h_bio_b_s h
            LEFT JOIN h_bio_inits innit ON h.ebio_nobatch = innit.ebio_nobatch
            LEFT JOIN pelesen p ON p.e_nl = innit.ebio_nl
            LEFT JOIN kapasiti k ON k.e_nl = innit.ebio_nl
            WHERE $tahun_sql" . "$bulan_sql
            AND p.e_negeri not in ('13','14')
            AND  h.ebio_b3 in ('1', '2')
            GROUP by p.e_nl");

            $proses_sbh =   DB::select("SELECT p.e_np, p.e_nl, p.kap_proses, p.e_negeri, h.ebio_b3 as ebio_c3, SUM(h.ebio_b8) as ebio_c6, h.ebio_nobatch, p.e_nl, innit.ebio_bln, innit.ebio_thn
            FROM h_bio_b_s h
            LEFT JOIN h_bio_inits innit ON h.ebio_nobatch = innit.ebio_nobatch
            LEFT JOIN pelesen p ON p.e_nl = innit.ebio_nl
            LEFT JOIN kapasiti k ON k.e_nl = innit.ebio_nl
            WHERE $tahun_sql" . "$bulan_sql
            AND p.e_negeri = '13'
            AND  h.ebio_b3 in ('1', '2')
            GROUP by p.e_nl");

            $proses_srwk =   DB::select("SELECT p.e_np, p.e_nl, p.kap_proses, p.e_negeri, h.ebio_b3 as ebio_c3, SUM(h.ebio_b8) as ebio_c6, h.ebio_nobatch, p.e_nl, innit.ebio_bln, innit.ebio_thn
            FROM h_bio_b_s h
            LEFT JOIN h_bio_inits innit ON h.ebio_nobatch = innit.ebio_nobatch
            LEFT JOIN pelesen p ON p.e_nl = innit.ebio_nl
            LEFT JOIN kapasiti k ON k.e_nl = innit.ebio_nl
            WHERE $tahun_sql" . "$bulan_sql
            AND p.e_negeri = '14'
            AND  h.ebio_b3 in ('1', '2')
            GROUP by p.e_nl");


            // dd($proses_srwk);

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.laporan.tahunan'), 'name' => "Laporan Tahunan"],
                ['link' => route('admin.pl.lewat'), 'name' => "Laporan Proses Selanjutnya Produk Biodiesel"],

            ];

            $kembali = route('admin.laporan.tahunan');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            $layout = 'layouts.admin';

            foreach ($proses_sm as $key => $data) {
                $kap_proses_sm[$key] = $data->kap_proses;
            }

            foreach ($proses_sbh as $key => $data) {
                $kap_proses_sbh[$key] = $data->kap_proses;
            }
            foreach ($proses_srwk as $key => $data) {
                $kap_proses_srwk[$key] = $data->kap_proses;
            }

            if (in_array("0", $kap_proses_sm) || in_array("0", $kap_proses_sbh) || in_array("0", $kap_proses_srwk)) {
                return redirect()->back()
                    ->with('error', 'Kapasiti pemprosesan bernilai 0. Pengiraan kadar penggunaan tidak dapat dikeluarkan!');
            } else {

                if ($start_month) {
                    $array = [
                        'laporan' => $laporan,
                        'tahun_sql' => $tahun_sql,
                        'tahun2' => $tahun2,
                        'bulan' => $bulan,
                        'bulan2' => $bulan2,
                        'start' => $start,
                        'end' => $end,

                        'proses_sm' => $proses_sm,
                        'proses_sbh' => $proses_sbh,
                        'proses_srwk' => $proses_srwk,

                        'start_month' => $start_month,
                        'end_month' => $end_month,

                        'returnArr' => $returnArr,
                        'layout' => $layout,

                    ];
                } elseif ($bulan2) {
                    $array = [
                        'laporan' => $laporan,
                        'tahun_sql' => $tahun_sql,
                        'tahun2' => $tahun2,
                        'bulan' => $bulan,
                        'bulan2' => $bulan2,
                        'bulan3' => $bulan3,
                        // 'end' => $end,

                        'proses_sm' => $proses_sm,
                        'proses_sbh' => $proses_sbh,
                        'proses_srwk' => $proses_srwk,

                        'start_month' => $start_month,
                        'end_month' => $end_month,

                        'returnArr' => $returnArr,
                        'layout' => $layout,

                    ];
                } else {
                    $array = [
                        'laporan' => $laporan,
                        'tahun_sql' => $tahun_sql,
                        'tahun2' => $tahun2,
                        'bulan' => $bulan,
                        'bulan2' => $bulan2,
                        // 'end' => $end,

                        'proses_sm' => $proses_sm,
                        'proses_sbh' => $proses_sbh,
                        'proses_srwk' => $proses_srwk,

                        'start_month' => $start_month,
                        'end_month' => $end_month,

                        'returnArr' => $returnArr,
                        'layout' => $layout,

                    ];
                }

                return view('admin.laporan_dq.laporan-utilrate', $array);

        }
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

        $cposm = $request->cpo_sm;
        $pposm = $request->ppo_sm;
        $cpkosm = $request->cpko_sm;
        $ppkosm = $request->ppko_sm;
        $cposbh = $request->cpo_sbh;
        $pposbh = $request->ppo_sbh;
        $cpkosbh = $request->cpko_sbh;
        $ppkosbh = $request->ppko_sbh;
        $cposrwk = $request->cpo_srwk;
        $pposrwk = $request->ppo_srwk;
        $cpkosrwk = $request->cpko_srwk;
        $ppkosrwk = $request->ppko_srwk;

        $cposm1 = str_replace(',', '', $cposm);
        $pposm1 = str_replace(',', '', $pposm);
        $cpkosm1 = str_replace(',', '', $cpkosm);
        $ppkosm1 = str_replace(',', '', $ppkosm);
        $cposbh1 = str_replace(',', '', $cposbh);
        $pposbh1 = str_replace(',', '', $pposbh);
        $cpkosbh1 = str_replace(',', '', $cpkosbh);
        $ppkosbh1 = str_replace(',', '', $ppkosbh);
        $cposrwk1 = str_replace(',', '', $cposrwk);
        $pposrwk1 = str_replace(',', '', $pposrwk);
        $cpkosrwk1 = str_replace(',', '', $cpkosrwk);
        $ppkosrwk1 = str_replace(',', '', $ppkosrwk);
        // dd($request->all());
        $hebahan = HebahanStokAkhir::findOrFail($id);
        // $hebahan->tahun = $request->tahun;
        // $hebahan->bulan = $request->bulan;
        $hebahan->cpo_sm = $cposm1;
        $hebahan->ppo_sm = $pposm1;
        $hebahan->cpko_sm = $cpkosm1;
        $hebahan->ppko_sm = $ppkosm1;
        $hebahan->cpo_sbh = $cposbh1;
        $hebahan->ppo_sbh = $pposbh1;
        $hebahan->cpko_sbh = $cpkosbh1;
        $hebahan->ppko_sbh = $ppkosbh1;
        $hebahan->cpo_srwk = $cposrwk1;
        $hebahan->ppo_srwk = $pposrwk1;
        $hebahan->cpko_srwk = $cpkosrwk1;
        $hebahan->ppko_srwk = $ppkosrwk1;
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

        $kembali = route('admin.stok.akhir');

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
        $querycpo = DB::select("SELECT sum(b.ebio_b11) as cpo_sm
                    FROM h_bio_b_s b, h_bio_inits h, pelesen p
                    WHERE h.ebio_thn = '$tahun'
                    AND h.ebio_bln = '$bulan'
                    AND p.e_kat = 'PLBIO'
                    AND p.e_nl = h.ebio_nl
                    AND h.ebio_nobatch = b.ebio_nobatch
                    AND b.ebio_b3 = '1'
                    AND b.ebio_b4 = '01'
                    AND p.e_negeri not in ('13','14')");


        //ppo


        $queryppo = DB::select("SELECT sum(b.ebio_b11) as ppo_sm
                    FROM h_bio_b_s b, h_bio_inits h, pelesen p
                    WHERE h.ebio_thn = '$tahun'
                    AND h.ebio_bln = '$bulan'
                    AND p.e_kat = 'PLBIO'
                    AND p.e_nl = h.ebio_nl
                    AND h.ebio_nobatch = b.ebio_nobatch
                    AND b.ebio_b3 = '1'
                    AND b.ebio_b4 <> '01'
                    AND p.e_negeri not in ('13','14')");


        //cpko

        $querycpko = DB::select("SELECT sum(b.ebio_b11) as cpko_sm
                FROM h_bio_b_s b, h_bio_inits h, pelesen p
                WHERE h.ebio_thn = '$tahun'
                AND h.ebio_bln = '$bulan'
                AND p.e_kat = 'PLBIO'
                AND p.e_nl = h.ebio_nl
                AND h.ebio_nobatch = b.ebio_nobatch
                AND b.ebio_b3 = '2'
                AND b.ebio_b4 = '04'
                AND p.e_negeri not in ('13','14')");

        //ppko

        $queryppko = DB::select("SELECT sum(b.ebio_b11) as ppko_sm
                FROM h_bio_b_s b, h_bio_inits h, pelesen p
                WHERE h.ebio_thn = '$tahun'
                AND h.ebio_bln = '$bulan'
                AND p.e_kat = 'PLBIO'
                AND p.e_nl = h.ebio_nl
                AND h.ebio_nobatch = b.ebio_nobatch
                AND b.ebio_b3 = '2'
                AND b.ebio_b4 <> '04'
                AND p.e_negeri not in ('13','14')");

        //sabah
        $sbhcpo = DB::select("SELECT sum(b.ebio_b11) as cpo_sbh
                    FROM h_bio_b_s b, h_bio_inits h, pelesen p
                    WHERE h.ebio_thn = '$tahun'
                    AND h.ebio_bln = '$bulan'
                    AND p.e_kat = 'PLBIO'
                    AND p.e_nl = h.ebio_nl
                    AND h.ebio_nobatch = b.ebio_nobatch
                    AND b.ebio_b3 = '1'
                    AND b.ebio_b4 = '01'
                    AND p.e_negeri = '13'");


        //ppo


        $sbhppo = DB::select("SELECT sum(b.ebio_b11) as ppo_sbh
                    FROM h_bio_b_s b, h_bio_inits h, pelesen p
                    WHERE h.ebio_thn = '$tahun'
                    AND h.ebio_bln = '$bulan'
                    AND p.e_kat = 'PLBIO'
                    AND p.e_nl = h.ebio_nl
                    AND h.ebio_nobatch = b.ebio_nobatch
                    AND b.ebio_b3 = '1'
                    AND b.ebio_b4 <> '01'
                    AND p.e_negeri ='13'");


        //cpko

        $sbhcpko = DB::select("SELECT sum(b.ebio_b11) as cpko_sbh
                    FROM h_bio_b_s b, h_bio_inits h, pelesen p
                    WHERE h.ebio_thn = '$tahun'
                    AND h.ebio_bln = '$bulan'
                    AND p.e_kat = 'PLBIO'
                    AND p.e_nl = h.ebio_nl
                    AND h.ebio_nobatch = b.ebio_nobatch
                    AND b.ebio_b3 = '2'
                    AND b.ebio_b4 = '04'
                    AND p.e_negeri ='13'");
        //ppko


        $sbhppko =  DB::select("SELECT sum(b.ebio_b11) as ppko_sbh
                FROM h_bio_b_s b, h_bio_inits h, pelesen p
                WHERE h.ebio_thn = '$tahun'
                AND h.ebio_bln = '$bulan'
                AND p.e_kat = 'PLBIO'
                AND p.e_nl = h.ebio_nl
                AND h.ebio_nobatch = b.ebio_nobatch
                AND b.ebio_b3 = '2'
                AND b.ebio_b4 <> '04'
                AND p.e_negeri ='13'");

        //sarawak
        //cpo

        $srwkcpo = DB::select("SELECT sum(b.ebio_b11) as cpo_srwk
                    FROM h_bio_b_s b, h_bio_inits h, pelesen p
                    WHERE h.ebio_thn = '$tahun'
                    AND h.ebio_bln = '$bulan'
                    AND p.e_kat = 'PLBIO'
                    AND p.e_nl = h.ebio_nl
                    AND h.ebio_nobatch = b.ebio_nobatch
                    AND b.ebio_b3 = '1'
                    AND b.ebio_b4 = '01'
                    AND p.e_negeri ='14'");

        //ppo

        $srwkppo = DB::select("SELECT sum(b.ebio_b11) as ppo_srwk
                FROM h_bio_b_s b, h_bio_inits h, pelesen p
                WHERE h.ebio_thn = '$tahun'
                AND h.ebio_bln = '$bulan'
                AND p.e_kat = 'PLBIO'
                AND p.e_nl = h.ebio_nl
                AND h.ebio_nobatch = b.ebio_nobatch
                AND b.ebio_b3 = '1'
                AND b.ebio_b4 <> '01'
                AND p.e_negeri ='14'");

        //cpko

        $srwkcpko = DB::select("SELECT sum(b.ebio_b11) as cpko_srwk
                    FROM h_bio_b_s b, h_bio_inits h, pelesen p
                    WHERE h.ebio_thn = '$tahun'
                    AND h.ebio_bln = '$bulan'
                    AND p.e_kat = 'PLBIO'
                    AND p.e_nl = h.ebio_nl
                    AND h.ebio_nobatch = b.ebio_nobatch
                    AND b.ebio_b3 = '2'
                    AND b.ebio_b4 = '04'
                    AND p.e_negeri ='14'");

        $srwkppko = DB::select("SELECT sum(b.ebio_b11) as ppko_srwk
                    FROM h_bio_b_s b, h_bio_inits h, pelesen p
                    WHERE h.ebio_thn = '$tahun'
                    AND h.ebio_bln = '$bulan'
                    AND p.e_kat = 'PLBIO'
                    AND p.e_nl = h.ebio_nl
                    AND h.ebio_nobatch = b.ebio_nobatch
                    AND b.ebio_b3 = '2'
                    AND b.ebio_b4 <> '04'
                    AND p.e_negeri ='14'");


        // if (($tahun == 2013 and $bulan >= 4) or ($tahun > 2013)) {
        //formula baru
        $cpo_sm = $querycpo[0]->cpo_sm;
        $ppo_sm = $queryppo[0]->ppo_sm;
        $cpko_sm = $querycpko[0]->cpko_sm;
        $ppko_sm = $queryppko[0]->ppko_sm;
        $cpo_sbh = $sbhcpo[0]->cpo_sbh;
        $ppo_sbh = $sbhppo[0]->ppo_sbh;
        $cpko_sbh = $sbhcpko[0]->cpko_sbh;
        $ppko_sbh = $sbhppko[0]->ppko_sbh;
        $cpo_srwk = $srwkcpo[0]->cpo_srwk;
        $ppo_srwk = $srwkppo[0]->ppo_srwk;
        $cpko_srwk = $srwkcpko[0]->cpko_srwk;
        $ppko_srwk = $srwkppko[0]->ppko_srwk;

        $cposm = number_format($cpo_sm, 2);
        $pposm = number_format($ppo_sm, 2);
        $cpkosm = number_format($cpko_sm, 2);
        $ppkosm = number_format($ppko_sm, 2);
        $cposbh = number_format($cpo_sbh, 2);
        $pposbh = number_format($ppo_sbh, 2);
        $cpkosbh = number_format($cpko_sbh, 2);
        $ppkosbh = number_format($ppko_sbh, 2);
        $cposrwk = number_format($cpo_srwk, 2);
        $pposrwk = number_format($ppo_srwk, 2);
        $cpkosrwk = number_format($cpko_srwk, 2);
        $ppkosrwk = number_format($ppko_srwk, 2);
        // dd($ppko_srwk);
        // } elseif ($tahun > 2013 and $bulan < 4) {
        //formula baru
        //     $cpo_sm = $querycpo3[0]->cpo_sm_3;
        //     $ppo_sm = $queryppo3[0]->ppo_sm_3;
        //     $cpko_sm = $querycpko3[0]->cpko_sm_3;
        //     $ppko_sm = $queryppko3[0]->ppko_sm_3;
        //     $cpo_sbh = $sbhcpo3[0]->cpo_sbh_3;
        //     $ppo_sbh = $sbhppo3[0]->ppo_sbh_3;
        //     $cpko_sbh = $sbhcpko3[0]->cpko_sbh_3;
        //     $ppko_sbh = $sbhppko3[0]->ppko_sbh_3;
        //     $cpo_srwk = $srwkcpo3[0]->cpo_srwk_3;
        //     $ppo_srwk = $srwkppo3[0]->ppo_srwk_3;
        //     $cpko_srwk = $srwkcpko3[0]->cpko_srwk_3;
        //     $ppko_srwk = $srwkppko3[0]->ppko_srwk_3;
        // } else {
        // $cpo_sm = $querycpo1[0]->cpo_sm_1 - $querycpo2[0]->cpo_sm_2;
        // $ppo_sm = $queryppo[0]->ppo_sm + $queryppo1[0]->ppo_sm_1 - $queryppo2[0]->ppo_sm_2;
        // $cpko_sm = $querycpko1[0]->cpko_sm_1 - $querycpko2[0]->cpko_sm_2;
        // $ppko_sm = $queryppko1[0]->ppko_sm_1 - $queryppko2[0]->ppko_sm_2;
        // $cpo_sbh = $sbhcpo1[0]->cpo_sbh_1 - $sbhcpo2[0]->cpo_sbh_2;
        // $ppo_sbh = $sbhppo[0]->ppo_sbh + $sbhppo1[0]->ppo_sbh_1 - $sbhppo2[0]->ppo_sbh_2;
        // $cpko_sbh = $sbhcpko1[0]->cpko_sbh_1 - $sbhcpko2[0]->cpko_sbh_2;
        // $ppko_sbh = $sbhppko1[0]->ppko_sbh_1 - $sbhppko2[0]->ppko_sbh_2;
        // $cpo_srwk = $srwkcpo1[0]->cpo_srwk_1 - $srwkcpo2[0]->cpo_srwk_2;
        // $ppo_srwk = $srwkppo[0]->ppo_srwk + $srwkppo1[0]->ppo_srwk_1 - $srwkppo2[0]->ppo_srwk_2;
        // $cpko_srwk = $srwkcpko1[0]->cpko_srwk_1 - $srwkcpko2[0]->cpko_srwk_2;
        // $ppko_srwk = $srwkppko1[0]->ppko_srwk_1 - $srwkppko2[0]->ppko_srwk_2;
        // }


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

            'querycpo' => $querycpo,
            'queryppo' => $queryppo,
            'querycpko' => $querycpko,
            'queryppko' => $queryppko,

            'cposm' => $cposm,
            'pposm' => $pposm,
            'cpkosm' => $cpkosm,
            'ppkosm' => $ppkosm,
            'cposbh' => $cposbh,
            'pposbh' => $pposbh,
            'cpkosbh' => $cpkosbh,
            'ppkosbh' => $ppkosbh,
            'cposrwk' => $cposrwk,
            'pposrwk' => $pposrwk,
            'cpkosrwk' => $cpkosrwk,
            'ppkosrwk' => $ppkosrwk,

            'cpo_sm' => $cpo_sm,
            'ppo_sm' => $ppo_sm,
            'cpko_sm' => $cpko_sm,
            'ppko_sm' => $ppko_sm,

            'sbhcpo' => $sbhcpo,
            'sbhppo' => $sbhppo,
            'sbhcpko' => $sbhcpko,
            'sbhppko' => $sbhppko,
            'sbhppo' => $sbhppo,

            'cpo_sbh' => $cpo_sbh,
            'ppo_sbh' => $ppo_sbh,
            'cpko_sbh' => $cpko_sbh,
            'ppko_sbh' => $ppko_sbh,

            'srwkcpo' => $srwkcpo,
            'srwkppo' => $srwkppo,
            'srwkcpko' => $srwkcpko,
            'srwkppko' => $srwkppko,

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
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        $check = HebahanStokAkhir::where('tahun', $tahun)->where('bulan', $bulan)->first();
        // dd($check);
        if ($check) {
            return redirect()->back()
                ->with('error', 'Maklumat stok akhir sudah tersedia');
        } else {
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
    }


    public function admin_validasi_stok_akhir_proses(Request $request)
    {
        // dd($request->all());
        $tahun = $request->tahun;
        $bulan = $request->bulan;


        //cpo semenanjung malaysia
        $cpo_sem = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as cpo_sm
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_negeri not in ('13','14')
            AND p.e_kat = 'PLBIO'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '1'
            AND b.ebio_b4 = '01'
            GROUP by p.e_nl");

        // dd($cpo_sem);

        $totala_cposem = 0;
        $totalb_cposem = 0;
        $dipremis_cposem = 0;
        $total_dipremis_cposem = 0;

        foreach ($cpo_sem as $data) {
            $totala_cposem = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_cposem = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_cposem = $totala_cposem - $totalb_cposem;
            $total_dipremis_cposem += $dipremis_cposem;
        }

        //cpo sabah

        $cpo_sabah = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as cpo_sbh
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_kat = 'PLBIO'
            AND p.e_negeri = '13'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '1'
            AND b.ebio_b4 = '01'
            GROUP by p.e_nl");


        $totala_cposbh = 0;
        $totalb_cposbh = 0;
        $dipremis_cposbh = 0;
        $total_dipremis_cposbh = 0;

        foreach ($cpo_sabah as $data) {
            $totala_cposbh = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_cposbh = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_cposbh = $totala_cposbh - $totalb_cposbh;
            $total_dipremis_cposbh += $dipremis_cposbh;
        }


        //cpo sarawak

        $cpo_srwk = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as cpo_srwk
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_kat = 'PLBIO'
            AND p.e_negeri = '14'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '1'
            AND b.ebio_b4 = '01'
            GROUP by p.e_nl");


        $totala_cposrwk = 0;
        $totalb_cposrwk = 0;
        $dipremis_cposrwk = 0;
        $total_dipremis_cposrwk = 0;

        foreach ($cpo_srwk as $data) {
            $totala_cposrwk = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_cposrwk = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_cposrwk = $totala_cposrwk - $totalb_cposrwk;
            $total_dipremis_cposrwk += $dipremis_cposrwk;
        }

        //ppo semenanjung malaysia
        $ppo_sem = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as ppo_sm
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_negeri not in ('13','14')
            AND p.e_kat = 'PLBIO'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '1'
            AND b.ebio_b4 <> '01'
            GROUP by p.e_nl");



        $totala_pposem = 0;
        $totalb_pposem = 0;
        $dipremis_pposem = 0;
        $total_dipremis_pposem = 0;

        foreach ($ppo_sem as $data) {
            $totala_pposem = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_pposem = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_pposem = $totala_pposem - $totalb_pposem;
            $total_dipremis_pposem += $dipremis_pposem;
        }




        //ppo sabah
        $ppo_sabah = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as ppo_sbh
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_kat = 'PLBIO'
            AND p.e_negeri = '13'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '1'
            AND b.ebio_b4 <> '01'
            GROUP by p.e_nl");



        $totala_pposbh = 0;
        $totalb_pposbh = 0;
        $dipremis_pposbh = 0;
        $total_dipremis_pposbh = 0;

        foreach ($ppo_sabah as $data) {
            $totala_pposbh = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_pposbh = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_pposbh = $totala_pposbh - $totalb_pposbh;
            $total_dipremis_pposbh += $dipremis_pposbh;
        }

        //ppo sarawak
        $ppo_srwk = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as ppo_srwk
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_kat = 'PLBIO'
            AND p.e_negeri = '14'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '1'
            AND b.ebio_b4 <> '01'
            GROUP by p.e_nl");


        $totala_pposrwk = 0;
        $totalb_pposrwk = 0;
        $dipremis_pposrwk = 0;
        $total_dipremis_pposrwk = 0;

        foreach ($ppo_srwk as $data) {
            $totala_pposrwk = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_pposrwk = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_pposrwk = $totala_pposrwk - $totalb_pposrwk;
            $total_dipremis_pposrwk += $dipremis_pposrwk;
        }



        //cpko semenanjung malaysia
        $cpko_sem = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as cpko_sm
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_negeri not in ('13','14')
            AND p.e_kat = 'PLBIO'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '2'
            AND b.ebio_b4 = '04'
            GROUP by p.e_nl");


        $totala_cpkosem = 0;
        $totalb_cpkosem = 0;
        $dipremis_cpkosem = 0;
        $total_dipremis_cpkosem = 0;

        foreach ($cpko_sem as $data) {
            $totala_cpkosem = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_cpkosem = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_cpkosem = $totala_cpkosem - $totalb_cpkosem;
            $total_dipremis_cpkosem += $dipremis_cpkosem;
        }


        //cpko sabah
        $cpko_sabah = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as cpko_sbh
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_kat = 'PLBIO'
            AND p.e_negeri = '13'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '2'
            AND b.ebio_b4 = '04'
            GROUP by p.e_nl");


        $totala_cpkosbh = 0;
        $totalb_cpkosbh = 0;
        $dipremis_cpkosbh = 0;
        $total_dipremis_cpkosbh = 0;

        foreach ($cpko_sabah as $data) {
            $totala_cpkosbh = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_cpkosbh = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_cpkosbh = $totala_cpkosbh - $totalb_cpkosbh;
            $total_dipremis_cpkosbh += $dipremis_cpkosbh;
        }

        //cpko sarawak
        $cpko_srwk = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as cpko_srwk
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_kat = 'PLBIO'
            AND p.e_negeri = '14'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '2'
            AND b.ebio_b4 = '04'
            GROUP by p.e_nl");


        $totala_cpkosrwk = 0;
        $totalb_cpkosrwk = 0;
        $dipremis_cpkosrwk = 0;
        $total_dipremis_cpkosrwk = 0;

        foreach ($cpko_srwk as $data) {
            $totala_cpkosrwk = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_cpkosrwk = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_cpkosrwk = $totala_cpkosrwk - $totalb_cpkosrwk;
            $total_dipremis_cpkosrwk += $dipremis_cpkosrwk;
        }


        //ppko semenanjung malaysia
        $ppko_sem = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as ppko_sm
            FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
            WHERE h.ebio_thn = '$tahun'
            AND h.ebio_bln = '$bulan'
            AND p.e_negeri not in ('13','14')
            AND p.e_kat = 'PLBIO'
            AND h.ebio_nl = p.e_nl
            AND h.ebio_nobatch = b.ebio_nobatch
            AND p.e_negeri = n.kod_negeri
            AND b.ebio_b3 = '2'
            AND b.ebio_b4 <> '04'
            GROUP by p.e_nl");


        $totala_ppkosem = 0;
        $totalb_ppkosem = 0;
        $dipremis_ppkosem = 0;
        $total_dipremis_ppkosem = 0;

        foreach ($ppko_sem as $data) {
            $totala_ppkosem = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_ppkosem = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_ppkosem = $totala_ppkosem - $totalb_ppkosem;
            $total_dipremis_ppkosem += $dipremis_ppkosem;
        }


        //ppko sabah
        $ppko_sabah = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as ppko_sbh
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_negeri = '13'
        AND p.e_kat = 'PLBIO'
        AND h.ebio_nl = p.e_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b3 = '2'
        AND b.ebio_b4 <> '04'
        GROUP by p.e_nl");


        $totala_ppkosbh = 0;
        $totalb_ppkosbh = 0;
        $dipremis_ppkosbh = 0;
        $total_dipremis_ppkosbh = 0;

        foreach ($ppko_sabah as $data) {
            $totala_ppkosbh = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_ppkosbh = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_ppkosbh = $totala_ppkosbh - $totalb_ppkosbh;
            $total_dipremis_ppkosbh += $dipremis_ppkosbh;
        }


        //ppko sarawak
        $ppko_srwk = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, sum(b.ebio_b5) as ebio_b5, sum(b.ebio_b6) as ebio_b6, sum(b.ebio_b7) as ebio_b7, sum(b.ebio_b8) as ebio_b8, sum(b.ebio_b9) as ebio_b9, sum(b.ebio_b10) as ebio_b10, sum(b.ebio_b11) as ppko_srwk
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_kat = 'PLBIO'
        AND p.e_negeri = '14'
        AND h.ebio_nl = p.e_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b3 = '2'
        AND b.ebio_b4 <> '04'
        GROUP by p.e_nl");


        $totala_ppkosrwk = 0;
        $totalb_ppkosrwk = 0;
        $dipremis_ppkosrwk = 0;
        $total_dipremis_ppkosrwk = 0;

        foreach ($ppko_sabah as $data) {
            $totala_ppkosrwk = ($data->ebio_b5) + ($data->ebio_b6) + ($data->ebio_b7);
            $totalb_ppkosrwk = ($data->ebio_b8) + ($data->ebio_b9) + ($data->ebio_b10);

            $dipremis_ppkosrwk = $totala_ppkosrwk - $totalb_ppkosrwk;
            $total_dipremis_ppkosrwk += $dipremis_ppkosrwk;
        }


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


            'totala_cposem' => $totala_cposem,
            'totalb_cposem' => $totalb_cposem,
            'dipremis_cposem' => $dipremis_cposem,
            'total_dipremis_cposem' => $total_dipremis_cposem,

            'totala_cposbh' => $totala_cposbh,
            'totalb_cposbh' => $totalb_cposbh,
            'dipremis_cposbh' => $dipremis_cposbh,
            'total_dipremis_cposbh' => $total_dipremis_cposbh,

            'totala_cposrwk' => $totala_cposrwk,
            'totalb_cposrwk' => $totalb_cposrwk,
            'dipremis_cposrwk' => $dipremis_cposrwk,
            'total_dipremis_cposrwk' => $total_dipremis_cposrwk,

            'totala_pposem' => $totala_pposem,
            'totalb_pposem' => $totalb_pposem,
            'dipremis_pposem' => $dipremis_pposem,
            'total_dipremis_pposem' => $total_dipremis_pposem,

            'totala_pposbh' => $totala_pposbh,
            'totalb_pposbh' => $totalb_pposbh,
            'dipremis_pposbh' => $dipremis_pposbh,
            'total_dipremis_pposbh' => $total_dipremis_pposbh,

            'totala_pposrwk' => $totala_pposrwk,
            'totalb_pposrwk' => $totalb_pposrwk,
            'dipremis_pposrwk' => $dipremis_pposrwk,
            'total_dipremis_pposrwk' => $total_dipremis_pposrwk,

            'totala_cpkosem' => $totala_cpkosem,
            'totalb_cpkosem' => $totalb_cpkosem,
            'dipremis_cpkosem' => $dipremis_cpkosem,
            'total_dipremis_cpkosem' => $total_dipremis_cpkosem,

            'totala_cpkosbh' => $totala_cpkosbh,
            'totalb_cpkosbh' => $totalb_cpkosbh,
            'dipremis_cpkosbh' => $dipremis_cpkosbh,
            'total_dipremis_cpkosbh' => $total_dipremis_cpkosbh,

            'totala_cpkosrwk' => $totala_cpkosrwk,
            'totalb_cpkosrwk' => $totalb_cpkosrwk,
            'dipremis_cpkosrwk' => $dipremis_cpkosrwk,
            'total_dipremis_cpkosrwk' => $total_dipremis_cpkosrwk,

            'totala_ppkosem' => $totala_ppkosem,
            'totalb_ppkosem' => $totalb_ppkosem,
            'dipremis_ppkosem' => $dipremis_ppkosem,
            'total_dipremis_ppkosem' => $total_dipremis_ppkosem,

            'totala_ppkosbh' => $totala_ppkosbh,
            'totalb_ppkosbh' => $totalb_ppkosbh,
            'dipremis_ppkosbh' => $dipremis_ppkosbh,
            'total_dipremis_ppkosbh' => $total_dipremis_ppkosbh,

            'totala_ppkosrwk' => $totala_ppkosrwk,
            'totalb_ppkosrwk' => $totalb_ppkosrwk,
            'dipremis_ppkosrwk' => $dipremis_ppkosrwk,
            'total_dipremis_ppkosrwk' => $total_dipremis_ppkosrwk,

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

        $lsprod = DB::select("SELECT * FROM produk
        where prodcat in ('01','02')
        and sub_group_rspo = ''
        and sub_group_mspo = '' ");
        // Produk::where('prodcat', ['01','02'])->get();

        // dd($lsprod);

        // if (($produk == 'GK') ||  ($produk == '29') ||  ($produk == '27') || ($produk == '35'))
        // $sqlstmt1 = "`produk`.`kumpulan_produk` = '1' AND";
        //     $sqlstmt1 = "k.prodcat = '01' ";
        // else
        //     $sqlstmt1 = "k.prodcat = '02' ";

        // if ($produk == 'OTHERS')
        //     $sqlstmt2 = "b.ebio_b4 NOT IN ('GK','29','27','35') ";
        // else
        //     $sqlstmt2 = "b.ebio_b4 = '$produk' ";

        //RBDPO - SEMENANJUNG MALAYSIA

        $ppo_sem = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, b.ebio_b5, b.ebio_b6, b.ebio_b7, b.ebio_b8, b.ebio_b9, b.ebio_b10, b.ebio_b11
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b, produk k
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_negeri not in ('13','14')
        AND p.e_kat = 'PLBIO'
        AND h.ebio_nl = p.e_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND k.prodid = b.ebio_b4
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b4 = '$produk'
        GROUP by p.e_nl");
        // dd($ppo_sem);

        //   dd($ppo_sem);

        //RBDPO - SABAH
        $ppo_sabah = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, b.ebio_b5, b.ebio_b6, b.ebio_b7, b.ebio_b8, b.ebio_b9, b.ebio_b10, b.ebio_b11
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b, produk k
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_negeri = '13'
        AND p.e_kat = 'PLBIO'
        AND h.ebio_nl = p.e_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND k.prodid = b.ebio_b4
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b4 = '$produk'
        GROUP by p.e_nl");


        //RBDPO - SARAWAK

        $ppo_srwk = DB::select("SELECT p.e_nl, p.e_np, n.nama_negeri as negeri, b.ebio_b5, b.ebio_b6, b.ebio_b7, b.ebio_b8, b.ebio_b9, b.ebio_b10, b.ebio_b11
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b, produk k
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_negeri = '14'
        AND p.e_kat = 'PLBIO'
        AND h.ebio_nl = p.e_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND k.prodid = b.ebio_b4
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b4 = '$produk'
        GROUP by p.e_nl");


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
            'lsprod' => $lsprod,

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

        $hebahan = HebahanProses::orderBy('tahun')->orderBy('bulan')->get();
        // dd($hebahan);
        // DB::connection('mysql2')->select("SELECT * FROM hebahan_proses
        // order by tahun, bulan");

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

        $cpo1 = $request->cpo_msia;
        $ppo1 = $request->ppo_msia;
        $cpko1 = $request->cpko_msia;
        $ppko1 = $request->ppko_msia;

        $cpo = str_replace(',', '', $cpo1);
        $ppo = str_replace(',', '', $ppo1);
        $cpko = str_replace(',', '', $cpko1);
        $ppko = str_replace(',', '', $ppko1);


        $hebahan = HebahanProses::findOrFail($id);
        $hebahan->tahun = $request->tahun;
        $hebahan->bulan = $request->bulan;
        $hebahan->cpo_msia = $cpo;
        $hebahan->ppo_msia = $ppo;
        $hebahan->cpko_msia = $cpko;
        $hebahan->ppko_msia = $ppko;

        $hebahan->save();


        return redirect()->route('admin.minyak.sawit.diproses')
            ->with('success', 'Maklumat telah disimpan');
    }

    public function admin_delete_minyak_sawit_diproses($id)
    {
        $hebahan = HebahanProses::findOrFail($id);
        // dd($penyata);

        $hebahan->delete();
        // DB::delete("delete from hebahan_proses where id = '$id'");

        return redirect()->route('admin.minyak.sawit.diproses')
            ->with('success', 'Maklumat Dihapuskan');
    }


    public function admin_tambah_proses()
    {
        $data = HebahanProses::get();
        // dd($data);
        // DB::connection('mysql2')->select("SELECT* FROM hebahan_proses");

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Minyak Sawit Diproses"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Tambah Maklumat"],
        ];

        $kembali = route('admin.minyak.sawit.diproses');

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

        $querycpo1 = DB::select("SELECT sum(b.ebio_b8) as cpo_msia_1
        FROM h_bio_b_s b, h_bio_inits h, pelesen p
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_kat = 'PLBIO'
        AND p.e_nl = h.ebio_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND b.ebio_b3 = '1'
        AND b.ebio_b4 = '01'");


        //--> ppo

        $queryppo1 = DB::select("SELECT sum(b.ebio_b8) as ppo_msia_1
        FROM h_bio_b_s b, h_bio_inits h, pelesen p
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_kat = 'PLBIO'
        AND p.e_nl = h.ebio_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND b.ebio_b3 = '1'
        AND b.ebio_b4 <> '01'");



        //--> cpko

        $querycpko1 =  DB::select("SELECT sum(b.ebio_b8) as cpko_msia_1
        FROM h_bio_b_s b, h_bio_inits h, pelesen p
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_kat = 'PLBIO'
        AND p.e_nl = h.ebio_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND b.ebio_b3 = '2'
        AND b.ebio_b4 = '04'");



        //--> ppko

        $queryppko1 =  DB::select("SELECT sum(b.ebio_b8) as ppko_msia_1
        FROM h_bio_b_s b, h_bio_inits h, pelesen p
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND p.e_kat = 'PLBIO'
        AND p.e_nl = h.ebio_nl
        AND h.ebio_nobatch = b.ebio_nobatch
        AND b.ebio_b3 = '2'
        AND b.ebio_b4 <> '04'");



        $cpo_msia1 = $querycpo1[0]->cpo_msia_1;
        $ppo_msia1 = $queryppo1[0]->ppo_msia_1;
        $cpko_msia1 = $querycpko1[0]->cpko_msia_1;
        $ppko_msia1 = $queryppko1[0]->ppko_msia_1;

        $cpo_msia = number_format($cpo_msia1, 2);
        $ppo_msia = number_format($ppo_msia1, 2);
        $cpko_msia = number_format($cpko_msia1, 2);
        $ppko_msia = number_format($ppko_msia1, 2);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Hebahan 10hb"],
            ['link' => route('admin.minyak.sawit.diproses'), 'name' => "Minyak Sawit Diproses"],
        ];

        $kembali = route('admin.minyak.sawit.diproses');

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

            return redirect()->route('admin.minyak.sawit.diproses')->with('success', 'Maklumat stok akhir sudah ditambah');
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
        $querycpo1 = DB::select("SELECT p.e_nl as lesen, p.e_np as kilang, n.nama_negeri as negeri, sum(b.ebio_b8) as ebio_b8
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND h.ebio_nl = p.e_nl
        AND p.e_kat = 'PLBIO'
        AND h.ebio_nobatch = b.ebio_nobatch
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b3 = '1'
        AND b.ebio_b4 = '01'
        GROUP by p.e_nl, p.e_np");




        //--> ppo
        $queryppo1 = DB::select("SELECT p.e_nl as lesen, p.e_np as kilang, n.nama_negeri as negeri, sum(b.ebio_b8) as ebio_b8
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND h.ebio_nl = p.e_nl
        AND p.e_kat = 'PLBIO'
        AND h.ebio_nobatch = b.ebio_nobatch
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b3 = '1'
        AND b.ebio_b4 <> '01'
        GROUP by p.e_nl, p.e_np");


        //--> cpko
        $querycpko1 = DB::select("SELECT p.e_nl as lesen, p.e_np as kilang, n.nama_negeri as negeri, sum(b.ebio_b8) as ebio_b8
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND h.ebio_nl = p.e_nl
        AND p.e_kat = 'PLBIO'
        AND h.ebio_nobatch = b.ebio_nobatch
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b3 = '2'
        AND b.ebio_b4 = '04'
        GROUP by p.e_nl, p.e_np");


        //--> ppko
        $queryppko1 = DB::select("SELECT p.e_nl as lesen, p.e_np as kilang, n.nama_negeri as negeri, sum(b.ebio_b8) as ebio_b8
        FROM pelesen p, negeri n, h_bio_inits h, h_bio_b_s b
        WHERE h.ebio_thn = '$tahun'
        AND h.ebio_bln = '$bulan'
        AND h.ebio_nl = p.e_nl
        AND p.e_kat = 'PLBIO'
        AND h.ebio_nobatch = b.ebio_nobatch
        AND p.e_negeri = n.kod_negeri
        AND b.ebio_b3 = '2'
        AND b.ebio_b4 <> '04'
        GROUP by p.e_nl, p.e_np");



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
