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
use Illuminate\Support\Facades\Validator;
use DB;

class MenuLainController extends Controller
{

    public function admin_direktori()
    {
        $negeri = Negeri::get();

        // $statelist = DB::select("SELECT kod_negeri, nama_negeri
        // FROM negeri");

        // if ($negeri == 'All') {
        //     $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
        // e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
        // e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
        // r.e_status
        // FROM pelesen e, reg_pelesen r, negeri n
        // WHERE e.e_nl = r.e_nl
        // and e.e_negeri = n.kod_negeri
        // and r.e_kat = 'pl91'
        // and (e.e_negeri is not null || e.e_negeri<>'')
        // and r.e_status = '1'
        // and r.directory='Y'
        // order by e.e_np,n.nama_negeri");
        // } else
        //     $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
        // e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
        // e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
        // r.e_status
        // FROM pelesen e, reg_pelesen r
        // WHERE e.e_nl = r.e_nl
        // and r.e_kat = 'PL91'
        // and e.e_negeri='$negeri'
        // and  r.e_status = '1'
        // and r.directory='Y'
        // order by e.e_np,e.e_negeri");


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


    public function admin_direktori_process(Request $request)
    {
        // dd($request->all());
        $negeri= Negeri::where('kod_negeri', $request->nama_negeri)->first('nama_negeri');
        // dd( $negeri);
        // $statelist = DB::select("SELECT kod_negeri, nama_negeri
        // FROM negeri");

        if ($request->nama_negeri == 'All') {
            $query = DB::select("SELECT e.e_id, e.e_nl, e.e_np, e.e_ap1, e.e_ap2, e.e_ap3,
                e.e_as1, e.e_as2, e.e_as3, e.e_notel, e.e_nofax, e.e_email,
                e.e_npg, e.e_jpg, e.e_npgtg, e.e_jpgtg, r.kodpgw, r.nosiri,r.e_pwd,
                r.e_status
                FROM pelesen e, reg_pelesen r, negeri n
                WHERE e.e_nl = r.e_nl
                and e.e_negeri = n.kod_negeri
                and r.e_kat = 'PL91'
                and r.e_status = '1'
                and r.directory='Y'
                order by e.e_np,n.nama_negeri");

        } else

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

        return view('admin.menu-lain.direktori-papar', compact('returnArr', 'layout', 'negeri', 'query'));
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

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';


        return view('admin.menu-lain.tambahpengumuman', compact('returnArr', 'layout'));
    }

    public function admin_tambah_pengumuman_proses (Request $request)
    {
        $this->validation_tambah_pengumuman($request->all())->validate();
        $this->storetambah_pengumuman($request->all());

        return redirect()->back()->with('success', 'Maklumat Pelesen sudah ditambah');
    }

    protected function validation_tambah_pengumuman(array $data)
    {
        return Validator::make($data, [
            'Id' => ['required', 'string'],
            'Message' => ['required', 'string'],
            'Start_date' => ['required', 'string'],
            'End_date' => ['required', 'string'],
            'Icon_new' => ['required', 'string'],
        ]);
    }

    protected function store_tambah_pengumuman(array $data)
    {
        return Pelesen::create([
            'Id' => $data['Id'],
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

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        $pengumuman = Pengumuman::find($id);
        // $pengumuman = \DB::table('pengumuman')->get();

        return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_updatepengumuman(Pengumuman $request, $id, $data )
    {



        $validateData = $request->validate([
                'Id'=>'required',
                'Message'=>'required',
                'Start_date'=>'required',
                'End_date'=>'required',
                'Icon_new'=>'required',

            ]);

            Pengumuman::whereId($id)->update($validateData);

            return redirect()->back()
            ->with('message','Job updated Succesfully');
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

        return view('admin.menu-lain.tukarpassword', compact('returnArr', 'layout'));
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
        // dd($request->all());

        $query_now = DB::select("SELECT date_format(e.e101_sdate,'%d-%m-%Y'), count(p.e_nl),
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE p.e_nl = e.e101_nl and p.e_nl = r.e_nl and r.e_kat = 'PL91'
        and e.e101_sdate is not null
        group by e.e101_sdate
        order by e.e101_sdate");



        // $shuttle_type = '3';
        // $query_now = DB::select("SELECT shuttles.negeri_id, COUNT(shuttles.negeri_id) as total_kilang
        // FROM form_a_s
        // INNER JOIN shuttles
        // ON form_a_s.shuttle_id = shuttles.id
        // WHERE shuttles.shuttle_type = $shuttle_type
        // AND YEAR(date(form_a_s.created_at)) = YEAR(now())
        // GROUP BY shuttles.negeri_id");

        // $query_past = DB::select("SELECT shuttles.negeri_id, COUNT(shuttles.negeri_id) as total_kilang
        // FROM form_a_s
        // INNER JOIN shuttles
        // ON form_a_s.shuttle_id = shuttles.id
        // WHERE shuttles.shuttle_type = $shuttle_type
        // AND YEAR(date(form_a_s.created_at)) = YEAR(now())-1
        // GROUP BY shuttles.negeri_id");

        $returnArr = [
            'query_now' => $query_now,
            // 'query_past' => $query_past
        ];

        return response($returnArr, 200);
    }



    public function graph_dashboard(Request $request)
    {
        // dd($request->all());

        $query_now = DB::select("SELECT date_format(e.e101_sdate,'%d-%m-%Y'), count(p.e_nl),
        FROM pelesen p, e101_init e, reg_pelesen r
        WHERE p.e_nl = e.e101_nl and p.e_nl = r.e_nl and r.e_kat = 'PL91'
        and e.e101_sdate is not null
        group by e.e101_sdate
        order by e.e101_sdate");
        // $shuttle_type = $request->shuttle_type ?? '3';
        // $query_now = DB::select("SELECT shuttles.negeri_id, COUNT(shuttles.negeri_id) as total_kilang
        // FROM form_a_s
        // INNER JOIN shuttles
        // ON form_a_s.shuttle_id = shuttles.id
        // WHERE shuttles.shuttle_type = $shuttle_type
        // AND YEAR(date(form_a_s.created_at)) = YEAR(now())
        // GROUP BY shuttles.negeri_id");

        // $query_past = DB::select("SELECT shuttles.negeri_id, COUNT(shuttles.negeri_id) as total_kilang
        // FROM form_a_s
        // INNER JOIN shuttles
        // ON form_a_s.shuttle_id = shuttles.id
        // WHERE shuttles.shuttle_type = $shuttle_type
        // AND YEAR(date(form_a_s.created_at)) = YEAR(now())-1
        // GROUP BY shuttles.negeri_id");

        $returnArr = [
            'query_now' => $query_now,
            // 'query_past' => $query_past
        ];

        return response($returnArr, 200);
    }

    public function fetch_daerah($kod_negeri){

        // $list_daerah = Negeri::where('negeri', $kod_negeri)->get();

        $list_daerah = Daerah::where('kod_negeri', $kod_negeri)->distinct()->orderBy('nama_daerah')->get('nama_daerah');

        return json_decode($list_daerah);
        exit;
    }
}
