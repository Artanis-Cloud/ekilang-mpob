<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Daerah;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Kapasiti;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use App\Models\User;
use App\Notifications\Pelesen\HantarPendaftaranPelesenNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BuahExport;

class Proses1Controller extends Controller
{
    public function admin_login()
    {

        // $breadcrumbs    = [
        //     ['link' => route('home'), 'name' => "Laman Utama"],
        //     ['link' => route('jenis-kayu-kumai', date('Y')), 'name' => "Kemaskini Jenis Kayu Kumai"],
        // ];

        // $kembali = route('home');

        // $returnArr = [
        //     'breadcrumbs' => $breadcrumbs,
        //     'kembali'     => $kembali,
        // ];

        return view('admin.admin-login');
    }


    public function admin_1daftarpelesen()
    {
        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $user = User::where('category', 'Admin')->get();
        // dd($user[3]->sub_cat);
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Daftar Pelesen Baru"],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';
        return view('admin.proses1.1daftarpelesen', compact('returnArr', 'layout', 'negeri', 'user'));
    }

    public function admin_1daftarpelesen_proses(Request $request)
    {
        // dd($request->all());

        $this->validation_daftar_pelesen($request->all())->validate();

        $this->store_daftar_pelesen($request->all());
        $this->store_kapasiti($request->all());
        $custom_pass = $this->store_daftar_pelesen2($request->all());
        $pelesen = $this->store_daftar_pelesen3($request->all(), $custom_pass);

        $pelesen->notify((new HantarPendaftaranPelesenNotification($custom_pass)));

        //log audit trail admin
        Auth::user()->log(" ADD PELESEN {$pelesen->username}");


        return redirect()->back()->with('success', 'Maklumat Pelesen sudah ditambah');
    }

    protected function validation_daftar_pelesen(array $data)
    {
        return Validator::make($data, [
            'e_kat' => ['required', 'string'],
            'e_status' => ['required', 'string'],
            'e_stock' => ['required', 'string'],
            'directory' => ['required', 'string'],

            'kodpgw' => ['nullable', 'string'],
            'nosiri' => ['nullable', 'string'],
            'e_nl' => ['required', 'string', 'unique:pelesen'],
            'e_np' => ['required', 'string'],
            'e_ap1' => ['required', 'string'],
            // 'e_ap2' => ['required', 'string'],
            // 'e_ap3' => ['required', 'string'],
            'e_as1' => ['required', 'string'],
            // 'e_as2' => ['required', 'string'],
            // 'e_as3' => ['required', 'string'],
            'e_notel' => ['required', 'string'],
            // 'e_nofax' => ['required', 'string'],
            'e_email' => ['required', 'string'],
            'e_npg' => ['required', 'string'],
            'e_jpg' => ['required', 'string'],
            'e_notel_pg' => ['required', 'string'],
            'e_email_pg' => ['required', 'string'],
            'e_npgtg' => ['required', 'string'],
            'e_jpgtg' => ['required', 'string'],
            'e_email_pengurus' => ['required', 'string'],
            'e_negeri' => ['required', 'string'],
            'e_daerah' => ['required', 'string'],
            'e_kawasan' => ['required', 'string'],
            'e_syktinduk' => ['required', 'string'],
            'e_year' => ['required', 'string'],
            'e_group' => ['required', 'string'],
            'e_poma' => ['nullable', 'string'],
            'kap_proses' => ['required', 'string'],
            // 'bil_tangki_cpo' => ['required', 'string'],
            // 'bil_tangki_ppo' => ['required', 'string'],
            // 'bil_tangki_cpko' => ['required', 'string'],
            // 'bil_tangki_ppko' => ['required', 'string'],
            // 'bil_tangki_others' => ['required', 'string'],
            // 'kap_tangki_cpo' => ['required', 'string'],
            // 'kap_tangki_ppo' => ['required', 'string'],
            // 'kap_tangki_cpko' => ['required', 'string'],
            // 'kap_tangki_ppko' => ['required', 'string'],
            // 'kap_tangki_others' => ['required', 'string'],
            // 'e_pwd' => ['required', 'string'],


            // 'kap_tangki' => ['required', 'string'],

        ]);
    }

    protected function store_daftar_pelesen(array $data)
    {

        $count = Pelesen::max('e_id');

        //
        return Pelesen::create([
            'e_id' => $count + 1,
            'e_nl' => $data['e_nl'],
            'e_np' => $data['e_np'],
            'e_ap1' => $data['e_ap1'],
            'e_ap2' => $data['e_ap2'],
            'e_ap3' => $data['e_ap3'],
            'e_as1' => $data['e_as1'],
            'e_as2' => $data['e_as2'],
            'e_as3' => $data['e_as3'],
            'e_notel' => $data['e_notel'],
            'e_nofax' => $data['e_nofax'],
            'e_email' => $data['e_email'],
            'e_npg' => $data['e_npg'],
            'e_jpg' => $data['e_jpg'],
            'e_notel_pg' => $data['e_notel_pg'],
            'e_email_pg' => $data['e_email_pg'],
            'kodpgw' => $data['kodpgw'],
            'nosiri' => $data['nosiri'],
            'e_npgtg' => $data['e_npgtg'],
            'e_jpgtg' => $data['e_jpgtg'],
            'e_negeri' => $data['e_negeri'],
            'e_daerah' => $data['e_daerah'],
            'e_kawasan' => $data['e_kawasan'],
            'e_syktinduk' => $data['e_syktinduk'],
            'e_group' => $data['e_group'],
            'e_poma' =>  $data['e_poma'],
            'e_year' => $data['e_year'],
            'e_email_pengurus' => $data['e_email_pengurus'],
            'kap_proses' => $data['kap_proses'],
            'tahun' => date("Y"),
            'bulan' => date("m"),
            // 'kap_tangki' => $data['kap_tangki'],
            // 'bil_tangki_cpo' => $data['bil_tangki_cpo'],
            // 'bil_tangki_ppo' => $data['bil_tangki_ppo'],
            // 'bil_tangki_cpko' => $data['bil_tangki_cpko'],
            // 'bil_tangki_ppko' => $data['bil_tangki_ppko'],
            // 'bil_tangki_others' => $data['bil_tangki_others'],
            // 'kap_tangki_cpo' => $data['kap_tangki_cpo'],
            // 'kap_tangki_ppo' => $data['kap_tangki_ppo'],
            // 'kap_tangki_cpko' => $data['kap_tangki_cpko'],
            // 'kap_tangki_ppko' => $data['kap_tangki_ppko'],
            // 'kap_tangki_others' => $data['kap_tangki_others'],

        ]);
    }

    protected function store_kapasiti(array $data)
    {

        // $count = Kapasiti::max('id');

        // dd($data['kap_proses']);
        return Kapasiti::create([
            // 'id' => $count+ 1,
            'e_nl' => $data['e_nl'],
            'tahun' => date("Y"),
            'jan' => $data['kap_proses'],
            'feb' => $data['kap_proses'],
            'mac' => $data['kap_proses'],
            'apr' => $data['kap_proses'],
            'mei' => $data['kap_proses'],
            'jun' => $data['kap_proses'],
            'jul' => $data['kap_proses'],
            'ogs' => $data['kap_proses'],
            'sept' => $data['kap_proses'],
            'okt' => $data['kap_proses'],
            'nov' => $data['kap_proses'],
            'dec' => $data['kap_proses'],
            // 'e_nl' => $request->e_nl,
            // 'tahun' => date("Y"),
            // 'jan' => $request->kap_proses,
            // 'feb' => $request->kap_proses,
            // 'mac' => $request->kap_proses,
            // 'apr' => $request->kap_proses,
            // 'mei' => $request->kap_proses,
            // 'jun' => $request->kap_proses,
            // 'jul' => $request->kap_proses,
            // 'ogs' => $request->kap_proses,
            // 'sept' => $request->kap_proses,
            // 'okt' => $request->kap_proses,
            // 'nov' => $request->kap_proses,
            // 'dec' => $request->kap_proses,

        ]);
    }
    protected function store_daftar_pelesen2(array $data)
    {
        $custom_pass = Str::random(8);

        $reg_pelesen = RegPelesen::create([
            'e_nl' => $data['e_nl'],
            'e_kat' => $data['e_kat'],
            'e_pwd' => Hash::make($custom_pass),
            'kodpgw' => $data['kodpgw'],
            'nosiri' => $data['nosiri'],
            'e_status' => $data['e_status'],
            'e_stock' => $data['e_stock'],
            'directory' => $data['directory'],
        ]);

        return $custom_pass;
    }
    protected function store_daftar_pelesen3(array $data, $custom_pass)
    {
        return User::create([
            'name' => $data['e_np'],
            'email' => $data['e_email'],
            'password' => Hash::make($custom_pass),
            'username' => $data['e_nl'],
            'category' => $data['e_kat'],
            'kod_pegawai' => $data['kodpgw'],
            'no_siri' => $data['nosiri'],
            'status' => $data['e_status'],
            'stock' => $data['e_stock'],
            'directory' => $data['directory'],
            'map_sdate' => now(),
        ]);
    }

    public function admin_papar_maklumat($e_id, RegPelesen $reg_pelesen)
    {

        $reg_pelesen = RegPelesen::find($e_id);
        // $reg_pelesen = RegPelesen::where('e_nl', );
        // dd($reg_pelesen);
        $pelesen = Pelesen::with('negeri', 'negeri.daerahs')->where('e_nl', $reg_pelesen->e_nl)->first();
        $pelesen2 = Pelesen::with('negeri', 'negeri.daerahs')->where('e_nl', $reg_pelesen->e_nl)->whereRelation('negeri.daerahs', 'daerah.kod_daerah', $pelesen->e_daerah)->first();

        // dd($pelesen2);
        $jumlah = ($pelesen->bil_tangki_cpo ?? 0) +
            ($pelesen->bil_tangki_ppo ?? 0) +
            ($pelesen->bil_tangki_cpko ?? 0) +
            ($pelesen->bil_tangki_ppko ?? 0) +
            ($pelesen->bil_tangki_others ?? 0);

        $jumlah2 = ($pelesen->kap_tangki_cpo ?? 0) +
            ($pelesen->kap_tangki_ppo ?? 0) +
            ($pelesen->kap_tangki_cpko ?? 0) +
            ($pelesen->kap_tangki_ppko ?? 0) +
            ($pelesen->kap_tangki_others ?? 0);

        $jumlah3 = ($pelesen->bil_tangki_cpo ?? 0) +
            ($pelesen->bil_tangki_ppo ?? 0) +
            ($pelesen->bil_tangki_cpko ?? 0) +
            ($pelesen->bil_tangki_ppko ?? 0) +
            ($pelesen->bil_tangki_oleo ?? 0) +
            ($pelesen->bil_tangki_others ?? 0);

        $jumlah4 = ($pelesen->kap_tangki_cpo ?? 0) +
            ($pelesen->kap_tangki_ppo ?? 0) +
            ($pelesen->kap_tangki_cpko ?? 0) +
            ($pelesen->kap_tangki_ppko ?? 0) +
            ($pelesen->kap_tangki_oleo ?? 0) +
            ($pelesen->kap_tangki_others ?? 0);



        if ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL91') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PL91') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenbatalbuah'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL101') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PL101') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.penapis'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL102') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_kat == 'PL102' && $reg_pelesen->e_status == '2') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.isirung'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL104') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PL104') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.oleokimia'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PL111') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PL111') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.simpanan'), 'name' => "Senarai Pelesen Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '1' && $reg_pelesen->e_kat == 'PLBIO') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Penapis"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        } elseif ($reg_pelesen->e_status == '2' && $reg_pelesen->e_kat == 'PLBIO') {
            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senarai.pelesen.batal.penapis'), 'name' => "Senarai Pelesen Penapis Dibatalkan"],
                ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

            ];
        }


        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $nid = Ekmessage::where ('MsgID', $request->id)->first('MsgID');

        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();
        // $pelesen = Pelesen::find($e_id);
        // dd($pelesen);
        // $pengumuman = \DB::table('pengumuman')->get();
        // dd($id);

        return view('admin.proses1.papar-maklumat', compact(
            'returnArr',
            'layout',
            'pelesen',
            'pelesen2',
            'negeri',
            'reg_pelesen',
            'jumlah',
            'jumlah2',
            'jumlah3',
            'jumlah4'
        ));
    }

    public function admin_prestasi_oer($nolesen)
    {
        // $test = DB::connection('mysql3')->select("SELECT tahun, bulan, oer_cpo FROM oercluster
        //                                             WHERE tahun = '2013'
        //                                             AND bulan = '06'");
        // dd($id);
        $reg_pelesen = RegPelesen::where('e_nl', $nolesen)->first();
        // $nolesen = $id->e_nl;
        // dd($reg_pelesen);

        // $notahun = $request->tahun;
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen  "],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Prestasi OER  "],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.kbuah';
        $array = [
            'returnArr' => $returnArr,
            'layout' => $layout,
            'reg_pelesen' => $reg_pelesen,
            // 'nolesen' => $nolesen,
        ];


        return view('admin.proses1.admin-prestasi-oer', $array);
    }


    public function admin_papar_prestasi_oer($nolesen, Request $request)
    {
        // dd($id);
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen  "],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Paparan Prestasi OER  "],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];

        // $oer = $this->admin_prestasi_oer($id);
        // $froer = $oer->id;
        // $nolesen = $froer->e_nl;
        // dd($oer);
        $oer = $this->display_oergraph($nolesen, $request->tahun);
        $data = $this->display_oerdata($nolesen, $request->tahun);
        $dtlpelesen = $this->get_data_pelesen($nolesen);
        $makpelesen = $this->get_pelesen($nolesen);


        if ($dtlpelesen || $makpelesen) {
        $individu = $oer['lineplot_individu'];
        $daerah = $oer['lineplot_daerah'];
        $negeri = $oer['lineplot_negeri'];
        $semsia = $oer['lineplot_semenanjung'];
        $msia = $oer['lineplot_malaysia'];
        $labelx = $oer['labelx'];
        $nama_negeri = $oer['nama_negeri'];
        $nama_daerah = $oer['nama_daerah'];
        $nama_daerah2 = trim(preg_replace('/\s+/', '', $nama_daerah));

        $cluster = $data['cluster'];
        $kawasan = $data['kawasan'];
        $nama_kilang = $data['namakilang'];
        $flgdaerah = $data['flgdaerah'];
        $thn1 = $data['thn1'];
        $thn2 = $data['thn2'];
        $thn3 = $data['thn3'];
        // dd($oer);


        if ($flgdaerah == 'Y') {
            $result3b = $data['result3b'];
            $result2 = $data['result2'];
            $result1 = $data['result1'];


            return view('admin.proses1.admin-papar-prestasi-oer', compact('flgdaerah','nolesen', 'dtlpelesen','returnArr', 'result3b', 'result1', 'result2', 'oer', 'individu', 'daerah', 'negeri', 'semsia', 'msia', 'labelx','nama_daerah','nama_negeri','nama_daerah2','nama_kilang','thn1','thn2','thn3','cluster','kawasan'));
        }
        elseif ($flgdaerah == 'N') {
            $result6a = $data['result6a'];
            $result5 = $data['result5'];
            $result7 = $data['result7'];

            // dd($flgdaerah);
            // $this->display_oerdata($request->tahun);

            // $layout = 'layouts.kbuah';


            return view('admin.proses1.admin-papar-prestasi-oer', compact('flgdaerah','nolesen', 'dtlpelesen','returnArr', 'result6a', 'result5', 'result7', 'oer', 'individu', 'daerah', 'negeri', 'semsia', 'msia', 'labelx','nama_daerah','nama_negeri','nama_daerah2','nama_kilang','thn1','thn2','thn3','cluster','kawasan'));
        }
    }
    else {
        return redirect()->back()
        ->with('error', 'Data Tidak Wujud! ');
    }

    }



    // START PROCESS PRESTASI OER

    function get_pelesen($nolesen)
    {
        //get pelesen
        $qry = DB::connection('mysql3')->select("SELECT p.e_np as namakilang, p.e_cluster, c.nama_cluster,
        p.e_kawasan, n.nama_region
        from pelesen p, negeri n, cluster c
        where p.e_nl = '$nolesen' and p.e_cluster = c.kod_cluster and
        p.e_negeri = n.kod_negeri and p.e_kawasan = n.kod_region");

        return $qry;
    }

    function get_data_pelesen($nolesen)
    {

        //get data pelesen
        $dtlqry = DB::select("SELECT distinct p.e_np as namakilang, n.nama_negeri, d.nama_daerah
        from pelesen p, negeri n, daerah d
        where p.e_nl = '$nolesen' and
        p.e_negeri = n.kod_negeri and
        p.e_negeri = d.kod_negeri and
        p.e_daerah = d.kod_daerah");

        return $dtlqry;
    }


    function check_daerahless($nolesen)
    {
        //fungsi untuk check samada pelesen kurang dari 5 pelesen atau tidak.
        //table daerahless adalah senarai daerah bagi daerah yang kurang dari 5 pelesen

        //check daerahless
        $chkqry = DB::connection('mysql3')->select("SELECT distinct d.daerah from oerpelesen p, daerahless d
        where p.nolesen = '$nolesen' and
              p.negeri = d.negeri and
              p.daerah = d.daerah ");


        if ($chkqry) {
            foreach ($chkqry as $row) {
                $result = $row->daerah;
            }
        } else {
            $result = 0;
        }

        return $result;
    }


    function get_data_oer_year3full($nolesen, $thn3)
    {

        //get data oer year3full
        $query3 = DB::connection('mysql3')->select("SELECT right(f.tahun,2) as tahun, f.bulan,f.oer_cpo as cpo_pelesen,d.oer_cpo as cpo_daerah,n.oer_cpo as cpo_negeri,s.oer_cpo as cpo_semsia,m.oer_cpo as cpo_msia
            from oerpelesen f, oerdaerah d, oernegeri n, oersemsia s, oermsia m
            where f.nolesen = '$nolesen' and
            (f.tahun = '$thn3') and
            f.tahun = d.tahun and
            f.bulan = d.bulan and
            f.tahun = n.tahun and
            f.bulan = n.bulan and
            f.tahun = s.tahun and
            f.bulan = s.bulan and
            f.tahun = m.tahun and
            f.bulan = m.bulan and
            f.negeri = d.negeri and
            f.daerah = d.daerah and
            f.negeri = n.negeri
            order by f.tahun, f.bulan");

        return $query3;
    }


    function get_data_oer_year3full_cluster($cluster, $thn, $bulan)
    {
        //  $conn = db_connect_econ();
        $query3 = DB::connection('mysql3')->select("SELECT tahun, bulan, oer_cpo from oercluster
                where kod_cluster = '$cluster' and tahun = '$thn'
                                  and bulan = '$bulan'");

        //  $result3 = @mysqli_query($conn,$query3);
        //  $row = @mysqli_fetch_array($result3);

        if ($query3) {
            foreach ($query3 as $row) {
                $result = $row->oer_cpo;
            }
        } else {
            $result = 0;
        }

        return $result;
    }


    function get_data_oer_year3full_kawasan($kawasan, $thn, $bulan)
    {

        // $conn = db_connect_econ();
        $query3 = DB::connection('mysql3')->select("SELECT tahun, bulan, oer_cpo from oerkawasan
                where kod_kawasan = '$kawasan' and tahun = '$thn'
                                and bulan = '$bulan'");

        // $result3 = @mysqli_query($conn,$query3);
        // $row = @mysqli_fetch_array($result3);
        if ($query3) {
            foreach ($query3 as $row) {
                $result = $row->oer_cpo;
            }
        } else {
            $result = 0;
        }


        return $result;
    }

    function get_data_oer_year3dfull($nolesen, $thn3)
    {

        // $conn = db_connect_econ();
        $query5 = DB::connection('mysql3')->select("SELECT right(f.tahun,2) as tahun, f.bulan as bulan,f.oer_cpo as cpo_pelesen,n.oer_cpo as cpo_negeri,s.oer_cpo as cpo_semsia,m.oer_cpo as cpo_msia
                from oerpelesen f, oernegeri n, oersemsia s, oermsia m
                where f.nolesen = '$nolesen' and
                (f.tahun = '$thn3') and
                f.tahun = n.tahun and
                f.bulan = n.bulan and
                f.tahun = s.tahun and
                f.bulan = s.bulan and
                f.tahun = m.tahun and
                f.bulan = m.bulan and
                f.negeri = n.negeri
                order by f.tahun, f.bulan");

        // $result5 = @mysqli_query($conn,$query5);
        return $query5;
    }


    function display_oergraph($nolesen, $notahun)
    {

        $thn1 = $notahun;
        //echo $thn1;
        $thn2 = $thn1 - 1;
        $thn3 = $thn1 - 2;
        $thn4 = $thn1 - 3;


        $adadaerah = $this->check_daerahless($nolesen);
        if (!$adadaerah || $adadaerah == 0)
            $flgdaerah = 'Y';
        else
            $flgdaerah = 'N';

        $dtlpelesen = $this->get_data_pelesen($nolesen);
        // dd($dtlpelesen);

        if ($dtlpelesen) {


        foreach ($dtlpelesen as $row) {
            $namakilang = trim($row->namakilang);
            $daerah = trim($row->nama_daerah);
            $negeri = trim($row->nama_negeri);
        }

        $makpelesen = $this->get_pelesen($nolesen);
        // dd($makpelesen);

        if ($makpelesen) {
            # code...
        foreach ($makpelesen as $row1) {
            $enp = $row1->namakilang;
            $cluster = strtoupper($row1->nama_cluster);
            $kodcluster = $row1->e_cluster;
            $kawasan = $row1->nama_region;
            $kodkawasan = $row1->e_kawasan;
        }

        if ($flgdaerah == 'Y') {
            $result1 = $this->get_data_oer_year3full($nolesen, $thn1);
            $result2 = $this->get_data_oer_year3full($nolesen, $thn2);
            $result3 = $this->get_data_oer_year3full($nolesen, $thn3);
            // dd($result3);

            $i = 0;
            foreach ($result3 as $value3) {


                $val1[$i] = "$value3->bulan/$value3->tahun";
                $val2[$i] = $value3->cpo_pelesen;
                $val3[$i] = $value3->cpo_daerah;
                $val4[$i] = $value3->cpo_negeri;
                $val5[$i] = $value3->cpo_semsia;
                $val6[$i] = $value3->cpo_msia;

                $valbulan1 = $value3->bulan;
                $oercluster1 = $this->get_data_oer_year3full_cluster($kodcluster, $thn3, $valbulan1);
                $val7[$i] = $oercluster1;
                $oerkawasan1 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn3, $valbulan1);
                $val8[$i] = $oerkawasan1;

                $i++;
            }

            foreach ($result2 as $value2) {
                // }
                $val1[$i] = "$value2->bulan/$value2->tahun";
                $val2[$i] = $value2->cpo_pelesen;
                $val3[$i] = $value2->cpo_daerah;
                $val4[$i] = $value2->cpo_negeri;
                $val5[$i] = $value2->cpo_semsia;
                $val6[$i] = $value2->cpo_msia;

                $valbulan2 = $value2->bulan;
                $oercluster2 = $this->get_data_oer_year3full_cluster($kodcluster, $thn2, $valbulan2);
                $oerkawasan2 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn2, $valbulan2);
                $val7[$i] = $oercluster2;
                $val8[$i] = $oerkawasan2;

                $i++;
            }

            foreach ($result1 as $value1) {

                $val1[$i] = "$value1->bulan/$value1->tahun";
                $val2[$i] = $value1->cpo_pelesen;
                $val3[$i] = $value1->cpo_daerah;
                $val4[$i] = $value1->cpo_negeri;
                $val5[$i] = $value1->cpo_semsia;
                $val6[$i] = $value1->cpo_msia;

                $valbulan3 = $value1->bulan;
                $oercluster3 = $this->get_data_oer_year3full_cluster($kodcluster, $thn1, $valbulan3);
                $oerkawasan3 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn1, $valbulan3);
                $val7[$i] = $oercluster3;
                $val8[$i] = $oerkawasan3;

                $i++;
            }


        } elseif ($flgdaerah == 'N') {

            //$result4 = get_data_oer_year2d($nolesen,$thn1);
            $result4 = $this->get_data_oer_year3dfull($nolesen, $thn1);
            //$result5 = get_data_oer_year2d($nolesen,$thn2);
            $result5 =  $this->get_data_oer_year3dfull($nolesen, $thn2);
            // $result6 = get_data_oer_year3dfull($nolesen,$thn3);
            $result6 =  $this->get_data_oer_year3dfull($nolesen, $thn3);

            $i = 0;
            // dd($result6);
            foreach ($result6 as $value6) {

                // }
                $val1[$i] = "$value6->bulan/$value6->tahun";
                $val2[$i] = $value6->cpo_pelesen;
                $val4[$i] = $value6->cpo_negeri;
                $val5[$i] = $value6->cpo_semsia;
                $val6[$i] = $value6->cpo_msia;

                $valbulan1 = $value6->bulan;
                $oercluster1 = $this->get_data_oer_year3full_cluster($kodcluster, $thn3, $valbulan1);
                $oerkawasan1 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn3, $valbulan1);
                $val7[$i] = $oercluster1;
                $val8[$i] = $oerkawasan1;

                $i++;
            }

            foreach ($result5 as $value5) {


                $val1[$i] = "$value5->bulan/$value5->tahun";
                $val2[$i] = $value5->cpo_pelesen;
                $val4[$i] = $value5->cpo_negeri;
                $val5[$i] = $value5->cpo_semsia;
                $val6[$i] = $value5->cpo_msia;

                $valbulan2 = $value5->bulan;
                $oercluster2 = $this->get_data_oer_year3full_cluster($kodcluster, $thn2, $valbulan2);
                $oerkawasan2 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn2, $valbulan2);
                $val7[$i] = $oercluster2;
                $val8[$i] = $oerkawasan2;

                $i++;
            }

            foreach ($result4 as $value4) {

                $val1[$i] = "$value4->bulan/$value4->tahun";
                $val2[$i] = $value4->cpo_pelesen;
                $val4[$i] = $value4->cpo_negeri;
                $val5[$i] = $value4->cpo_semsia;
                $val6[$i] = $value4->cpo_msia;

                $valbulan3 = $value4->bulan;
                $oercluster3 = $this->get_data_oer_year3full_cluster($kodcluster, $thn1, $valbulan3);
                $oerkawasan3 = $this->get_data_oer_year3full_kawasan($kodkawasan, $thn1, $valbulan3);
                $val7[$i] = $oercluster3;
                $val8[$i] = $oerkawasan3;

                $i++;
            }

        }


        $pelesen = $this->get_data_pelesen($nolesen);
        $nama_negeri = $pelesen[0]->nama_negeri;
        // dd($nama_negeri);
        $nama_daerah = $pelesen[0]->nama_daerah;


        $labelx = 0;
        $lineplot_individu = 0;
        $lineplot_daerah = 0;
        $lineplot_negeri = 0;
        $lineplot_semenanjung = 0;
        $lineplot_malaysia = 0;

        // for ($i = 0; $i < $key; $i++) {
        //     if ($labelx == 0) {
        //         $labelx = $val1[$i] . ',';
        //     } else {
        //         $labelx = $labelx . $val1[$i] . ",";
        //     }
        //     // $labelx = $labelx ."'". $val1[$i] . "',";
        // }
        // $labelx = substr($labelx, 0, -1);
        // dd($val1);


        for ($x = 0; $x < $i; $x++) {
            if ($lineplot_individu == 0) {
                $lineplot_individu = $val2[$x] . ',';
            } else {
                $lineplot_individu = $lineplot_individu . $val2[$x] . ',';
            }
        }
        $lineplot_individu = substr($lineplot_individu, 0, -1);

        // dd($lineplot_individu);

        if ($flgdaerah == 'Y') {
            for ($x = 0; $x < $i; $x++) {
                if ($lineplot_daerah == 0) {
                    $lineplot_daerah = $val3[$x] . ',';
                } else {
                    $lineplot_daerah = $lineplot_daerah . $val3[$x] . ',';
                }
            }

            $lineplot_daerah = substr($lineplot_daerah, 0, -1);

            //yellow
            // $lineplot2->SetLegend("$daerah");
        }

        for ($x = 0; $x < $i; $x++) {
            if ($lineplot_negeri == 0) {
                $lineplot_negeri = $val4[$x] . ',';
            } else {
                $lineplot_negeri = $lineplot_negeri . $val4[$x] . ',';
            }
        }
        $lineplot_negeri = substr($lineplot_negeri, 0, -1);


        for ($x = 0; $x < $i; $x++) {
            if ($lineplot_semenanjung == 0) {
                $lineplot_semenanjung = $val5[$x] . ',';
            } else {
                $lineplot_semenanjung = $lineplot_semenanjung . $val5[$x] . ',';
            }
        }
        $lineplot_semenanjung = substr($lineplot_semenanjung, 0, -1);

        for ($x = 0; $x < $i; $x++) {
            if ($lineplot_malaysia == 0) {
                $lineplot_malaysia = $val2[$x] . ',';
            } else {
                $lineplot_malaysia = $lineplot_malaysia . $val6[$x] . ',';
            }
        }
        $lineplot_malaysia = substr($lineplot_malaysia, 0, -1);

        $array = [
            'enp' => $enp,
            'nama_negeri' => $nama_negeri,
            'nama_daerah' => $nama_daerah,

            'lineplot_individu' => $lineplot_individu,
            'lineplot_daerah' => $lineplot_daerah,

            'lineplot_negeri' => $lineplot_negeri,
            'lineplot_semenanjung' => $lineplot_semenanjung,
            'lineplot_malaysia' => $lineplot_malaysia,

            'labelx' => $val1,
        ];
        // $tajuk = "LAPURAN PRESTASI OER $namakilang BAGI TAHUN $thn3, $thn2 & $thn1";
        return $array;
    }

    else{
        return redirect()->back()
        ->with('error', 'Data Tidak Wujud! ');
    }
    } else{
        return redirect()->back()
        ->with('error', 'Data Tidak Wujud! ');
    }
}

    function display_oerdata($nolesen,$notahun)
{

	$thn1 = (integer) $notahun;
	$thn2 = $thn1 - 1;
	$thn3 = $thn1 - 2;
	$thn4 = $thn1 - 3;
	//$bln1 = get_month_firstyear($nobulan);
	//$bln2 = get_month_lastyear($nobulan);

	$adadaerah = $this->check_daerahless($nolesen);
	if (!$adadaerah || $adadaerah == 0)
	   $flgdaerah = 'Y';
	else
		$flgdaerah = 'N';

	//echo $flgdaerah;
// dd($flgdaerah);

	$dtlpelesen = $this->get_data_pelesen($nolesen);

    if ($dtlpelesen) {

	foreach ($dtlpelesen as $row) {
        $namakilang = trim($row->namakilang);
        $daerah = trim($row->nama_daerah);
        $negeri = trim($row->nama_negeri);
    }

	 $makpelesen = $this->get_pelesen($nolesen);

     if ($makpelesen) {
        # code...

	 foreach ($makpelesen as $row1) {
        $enp = $row1->namakilang;
        $cluster = strtoupper($row1->nama_cluster);
        $kodcluster = $row1->e_cluster;
        $kawasan = $row1->nama_region;
        $kodkawasan = $row1->e_kawasan;
    }

	if ($flgdaerah == 'Y')
	{



	$result3b = $this->get_data_oer_year3full($nolesen,$thn3);

    foreach ($result3b as $key3 => $value3) {

        $bulhun3[$key3] = $value3->bulan. "/" .$value3->tahun;
        $ind3[$key3] = $value3->cpo_pelesen;
        $negeri3[$key3] = $value3->cpo_negeri;
        $semsia3[$key3] = $value3->cpo_semsia;
        $msia3[$key3] = $value3->cpo_msia;

        $valtahun1 = $value3->tahun;
        $valbulan1 = $value3->bulan;
        $oercluster1 = $this->get_data_oer_year3full_cluster($kodcluster,$thn3,$valbulan1);
            // echo "<td align=center><font size=2>";
            // if (!isset($oercluster1))
            //    { echo "NULL"; }
            // else
            //    { echo $oercluster1;
            //       }
            // echo "</font></td>\n";

        $oerkawasan1 = $this->get_data_oer_year3full_kawasan($kodkawasan,$thn3,$valbulan1);
            // echo "<td align=center><font size=2>";
            // if (!isset($oerkawasan1))
            //    { echo "NULL"; }
            // else
            //    { echo $oerkawasan1;
            //       }
    }

    $result2 = $this->get_data_oer_year3full($nolesen,$thn2);

    foreach ($result2 as $key2 =>  $value2) {

        $bulhun2[$key2] = "$value2->bulan/$value2->tahun";
        $ind2[$key2]  = $value2->cpo_pelesen;
        $daerah2[$key2]  = $value2->cpo_daerah;
        $negeri2[$key2]  = $value2->cpo_negeri;
        $semsia2[$key2]  = $value2->cpo_semsia;
        $msia2[$key2]  = $value2->cpo_msia;


    }

	$result1 = $this->get_data_oer_year3full($nolesen,$thn1);

    foreach ($result1 as $key1 => $value1) {
        $bulhun1[$key1] = "$value1->bulan/$value1->tahun";
        $ind1[$key1] = $value1->cpo_pelesen;
        $daerah1[$key1] = $value1->cpo_daerah;
        $negeri1[$key1] = $value1->cpo_negeri;
        $semsia1[$key1] = $value1->cpo_semsia;
        $msia1[$key1] = $value1->cpo_msia;
    }

    $array = [
        'flgdaerah' => $flgdaerah,

        'thn1' => $thn1,
        'thn2' => $thn2,
        'thn3' => $thn3,

        'namakilang' => $namakilang,
        'daerah' => $daerah,
        'negeri' => $negeri,
        'cluster' => $cluster,
        'kawasan' => $kawasan,

        'result3b' => $result3b,
        'result2' => $result2,
        'result1' => $result1,

    ];

	}
	elseif ($flgdaerah == 'N')
	{

	//untuk tahun ketiga

	$result6a = $this->get_data_oer_year3dfull($nolesen,$thn3);
	$result5 = $this->get_data_oer_year3dfull($nolesen,$thn2);
	$result7 = $this->get_data_oer_year3dfull($nolesen,$thn1);


      $array = [
        'flgdaerah' => $flgdaerah,

        'thn1' => $thn1,
        'thn2' => $thn2,
        'thn3' => $thn3,

        'namakilang' => $namakilang,
        'daerah' => $daerah,
        'negeri' => $negeri,
        'cluster' => $cluster,
        'kawasan' => $kawasan,

        'result6a' => $result6a,
        'result5' => $result5,
        'result7' => $result7,


    ];

    }


    // $tajuk = "LAPURAN PRESTASI OER $namakilang BAGI TAHUN $thn3, $thn2 & $thn1";
    return $array;

    }
    else{
        return redirect()->back()
        ->with('error', 'Data Tidak Wujud! ');
    }
	} else{
        return redirect()->back()
        ->with('error', 'Data Tidak Wujud! ');
    }
}

    public function admin_update_maklumat_asas_pelesen(Request $request, $id)
    {
        $penyata = Pelesen::findOrFail($id);
        $penyata->e_status = $request->e_status;
        // $penyata->directory = $request->directory;
        $penyata->kodpgw = $request->kodpgw;
        $penyata->nosiri = $request->nosiri;
        $penyata->e_nl = $request->e_nl;
        $penyata->e_np = $request->e_np;
        $penyata->e_ap1 = $request->e_ap1;
        $penyata->e_ap2 = $request->e_ap2;
        $penyata->e_ap3 = $request->e_ap3;
        $penyata->e_as1 = $request->e_as1;
        $penyata->e_as2 = $request->e_as2;
        $penyata->e_as3 = $request->e_as3;
        $penyata->e_notel = $request->e_notel;
        $penyata->e_nofax = $request->e_nofax;
        $penyata->e_email = $request->e_email;
        $penyata->e_npg = $request->e_npg;
        $penyata->e_jpg = $request->e_jpg;
        $penyata->e_notel_pg = $request->e_notel_pg;
        $penyata->e_email_pg = $request->e_email_pg;
        $penyata->e_npgtg = $request->e_npgtg;
        $penyata->e_jpgtg = $request->e_jpgtg;
        $penyata->e_negeri = $request->e_negeri;
        $penyata->e_jpgtg = $request->e_jpgtg;
        $penyata->e_daerah = $request->e_daerah;
        $penyata->e_kawasan = $request->e_kawasan;
        $penyata->e_syktinduk = $request->e_syktinduk;
        $penyata->e_group = $request->e_group;
        $penyata->e_poma = $request->e_poma;
        $penyata->e_year = $request->e_year;
        $penyata->e_email_pengurus = $request->e_email_pengurus;
        $penyata->kap_proses = $request->kap_proses;
        $penyata->bil_tangki_cpo = $request->bil_tangki_cpo;
        $penyata->bil_tangki_ppo = $request->bil_tangki_ppo;
        $penyata->bil_tangki_cpko = $request->bil_tangki_cpko;
        $penyata->bil_tangki_ppko = $request->bil_tangki_ppko;
        $penyata->bil_tangki_oleo = $request->bil_tangki_oleo;
        $penyata->bil_tangki_others = $request->bil_tangki_others;
        $penyata->bil_tangki_jumlah = $request->bil_tangki_jumlah;
        $penyata->kap_tangki_cpo = $request->kap_tangki_cpo;
        $penyata->kap_tangki_ppo = $request->kap_tangki_ppo;
        $penyata->kap_tangki_cpko = $request->kap_tangki_cpko;
        $penyata->kap_tangki_ppko = $request->kap_tangki_ppko;
        $penyata->kap_tangki_oleo = $request->kap_tangki_oleo;
        $penyata->kap_tangki_others = $request->kap_tangki_others;
        // $penyata->kap_tangki_jumlah = $request->kap_tangki_jumlah;
        $penyata->save();

        // dd($penyata);

        $penyata2 = RegPelesen::where('e_nl', $request->e_nl)->first();
        $penyata2->e_nl = $request->e_nl;
        // $penyata2->e_kat = $request->e_kat;

        $penyata2->nosiri = $request->nosiri;
        $penyata2->kodpgw = $request->kodpgw;
        $penyata2->e_status = $request->e_status;
        $penyata2->e_stock = $request->e_stock;
        $penyata2->directory = $request->directory;
        $penyata2->save();

        $map = User::where('username', $penyata->e_nl)->first();
        $map->email = $request->e_email;
        $map->map_flg = '1';
        $map->map_sdate = now();
        $map->save();

        //log audit trail admin
        Auth::user()->log(" UPDATE PELESEN {$penyata2->e_nl}");



        return redirect()->back()
            ->with('success', 'Maklumat telah dikemaskini');
    }

    public function admin_papar_maklumat_batal($e_id, Pelesen $pelesen)
    {
        // dd($e_id);
        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbatalbuah'), 'name' => "Senarai Pelesen Dibatalkan"],
            ['link' => route('admin.1daftarpelesen'), 'name' => "Maklumat Asas Pelesen"],

        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';

        // $nid = Ekmessage::where ('MsgID', $request->id)->first('MsgID');

        $negeri = Negeri::distinct()->orderBy('kod_negeri')->get();

        $pelesen = Pelesen::find($e_id);
        // dd($pelesen);
        // $pengumuman = \DB::table('pengumuman')->get();
        // dd($id);

        return view('admin.proses1.papar-maklumat-batal', compact('returnArr', 'layout', 'pelesen', 'negeri'));

        // return view('admin.menu-lain.editpengumuman', compact('returnArr', 'layout', 'pengumuman'));
    }

    public function admin_senaraipelesenbuah()
    {
        //test data
        // dd(auth()->user()->sub_cat);
        if (auth()->user()->sub_cat) {
            foreach (json_decode(auth()->user()->sub_cat) as $cat) {
                // if ($cat == 'PL91'){
                //     return redirect()->route('admin.senaraipelesenbuah');
                // } else
                if ($cat == 'PL101') {
                    return redirect()->route('admin.senaraipelesenpenapis');
                } elseif ($cat == 'PL102') {
                    return redirect()->route('admin.senaraipelesenisirung');
                } elseif ($cat == 'PL104') {
                    return redirect()->route('admin.senaraipelesenoleokimia');
                } elseif ($cat == 'PL111') {
                    return redirect()->route('admin.senaraipelesensimpanan');
                } elseif ($cat == 'PLBIO') {
                    return redirect()->route('admin.senaraipelesenbio');
                } else {

                    // dd($pelesen);
                    $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->orderBy('e_status', 'asc')
                    ->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();
                    // dd($users[10]);
                    // $pelesen = Pelesen::get();


                    $breadcrumbs    = [
                        ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                        ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen"],
                    ];

                    $kembali = route('admin.dashboard');

                    $returnArr = [
                        'breadcrumbs' => $breadcrumbs,
                        'kembali'     => $kembali,
                    ];
                    $layout = 'layouts.admin';

                    return view('admin.proses1.senarai-pelesen-buah', compact('returnArr', 'layout', 'users'));
                }
            }
        } else {
            # code...// dd($pelesen);
            $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->orderBy('e_status', 'asc')
            ->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();
            // dd($users);
            // $pelesen = Pelesen::get();

            $breadcrumbs    = [
                ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
                ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen"],
            ];

            $kembali = route('admin.dashboard');

            $returnArr = [
                'breadcrumbs' => $breadcrumbs,
                'kembali'     => $kembali,
            ];
            $layout = 'layouts.admin';

            return view('admin.proses1.senarai-pelesen-buah', compact('returnArr', 'layout', 'users'));
        }
    }

    public function exportIntoExcel()
    {
        return Excel::download(new BuahExport, 'senarai pelesen buah.xlsx');
    }

    public function admin_senaraipelesenpenapis()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL101')->orderBy('e_status', 'asc')
        ->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();
        // dd($users);

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenisirung()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL102')->orderBy('e_status', 'asc')
        ->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenoleokimia()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL104')->orderBy('e_status', 'asc')
        ->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-oleokimia', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesensimpanan()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->orderBy('e_status', 'asc')
        ->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenbio()
    {
        $users = RegPelesen::with('pelesen')->where('e_kat', 'PLBIO')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen"],
        ];

        $kembali = route('admin.dashboard');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-bio', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senaraipelesenbatalbuah()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL91')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenbuah'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenbuah');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-buah', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_penapis()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL101')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenpenapis'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenpenapis');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-penapis', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_isirung()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL102')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenisirung'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenisirung');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-isirung', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_oleokimia()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL104')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesenoleokimia'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenoleokimia');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-oleokimia', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_simpanan()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesensimpanan');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-simpanan', compact('returnArr', 'layout', 'users'));
    }

    public function admin_senarai_pelesen_batal_bio()
    {

        $users = RegPelesen::with('pelesen')->where('e_kat', 'PL111')->where('e_status', 2)->orderBy('kodpgw', 'asc')->orderBy('nosiri', 'asc')->get();

        $breadcrumbs    = [
            ['link' => route('admin.dashboard'), 'name' => "Laman Utama"],
            ['link' => route('admin.senaraipelesensimpanan'), 'name' => "Senarai Pelesen"],
            ['link' => route('admin.senaraipelesenbio'), 'name' => "Senarai Pelesen Batal"],
        ];

        $kembali = route('admin.senaraipelesenbio');

        $returnArr = [
            'breadcrumbs' => $breadcrumbs,
            'kembali'     => $kembali,
        ];
        $layout = 'layouts.admin';



        return view('admin.proses1.senarai-pelesen-batal-bio', compact('returnArr', 'layout', 'users'));
    }
}
