<?php

namespace App\Console\Commands;

use App\Models\E07Init;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\EBioInit;
use App\Models\Hari;
use App\Models\Init;
use App\Models\RegPelesen;
use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Facades\Auth;

class InitializeUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initialize:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initializing all data based on the date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tahun = date('Y');
        $bulan = date('m');
        $current_date = date('Y-m-d');
        $date = Init::where('tahun', $tahun)->first();

        if ($bulan == 2) {
            $sdate = $date->sjan;
            $edate = $date->ejan;
        }
        elseif ($bulan == 3) {
            $sdate = $date->sfeb;
            $edate = $date->efeb;
        }
        elseif ($bulan == 4) {
            $sdate = $date->smac;
            $edate = $date->emac;
        }
        elseif ($bulan == 5) {
            $sdate = $date->sapr;
            $edate = $date->eapr;
        }
        elseif ($bulan == 6) {
            $sdate = $date->smei;
            $edate = $date->emei;
        }
        elseif ($bulan == 7) {
            $sdate = $date->sjun;
            $edate = $date->ejun;
        }
        elseif ($bulan == 8) {
            $sdate = $date->sjul;
            $edate = $date->ejul;
        }
        elseif ($bulan == 9) {
            $sdate = $date->sogos;
            $edate = $date->eogos;
        }
        elseif ($bulan == 10) {
            $sdate = $date->ssept;
            $edate = $date->esept;
        }
        elseif ($bulan == 11) {
            $sdate = $date->sokt;
            $edate = $date->eokt;
        }
        elseif ($bulan == 12) {
            $sdate = $date->snov;
            $edate = $date->enov;
        }
        else {
            $sdate = $date->sdec;
            $edate = $date->edec;
        }

        if ($sdate == $current_date ) {
            $this->initialize_proses_pl91($edate);
            $this->initialize_proses_pl101($edate);
            $this->initialize_proses_pl102($edate);
            $this->initialize_proses_pl104($edate);
            $this->initialize_proses_pl111($edate);
            $this->initialize_proses_plbio($edate);

            Auth::user()->log("INITIALIZE PENYATA BULANAN");

            // return redirect()->back()->with('success','CRON RUNNING');
        }

    }

    public function initialize_proses_pl91($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL91')->where('e_status', '1')->get();

        $e91_init = DB::table('e91_init')->delete();
        $e91b = DB::table('e91b')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E91Init::create([
                'e91_reg' => $key + 1,
                'e91_nl' => $e_nl,
                'e91_bln' => now()->format('m') - 1,
                'e91_thn' => now()->year,
                'e91_flg' => '1',
                'e91_sdate' => NULL,
                'e91_ddate' => $e_ddate,
                'e91_aa1' => NULL,
                'e91_aa2' => NULL,
                'e91_aa3' => NULL,
                'e91_aa4' => NULL,
                'e91_ab1' => NULL,
                'e91_ab2' => NULL,
                'e91_ab3' => NULL,
                'e91_ab4' => NULL,
                'e91_ac1' => NULL,
                'e91_ad1' => NULL,
                'e91_ad2' => NULL,
                'e91_ad3' => NULL,
                'e91_ae1' => NULL,
                'e91_ae2' => NULL,
                'e91_ae3' => NULL,
                'e91_ae4' => NULL,
                'e91_af1' => NULL,
                'e91_af2' => NULL,
                'e91_af3' => NULL,
                'e91_ag1' => NULL,
                'e91_ag2' => NULL,
                'e91_ag3' => NULL,
                'e91_ag4' => NULL,
                'e91_ah1' => NULL,
                'e91_ah2' => NULL,
                'e91_ah3' => NULL,
                'e91_ah4' => NULL,
                'e91_ai1' => NULL,
                'e91_ai2' => NULL,
                'e91_ai3' => NULL,
                'e91_ai4' => NULL,
                'e91_ai5' => NULL,
                'e91_ai6' => NULL,
                'e91_aj1' => NULL,
                'e91_aj2' => NULL,
                'e91_aj3' => NULL,
                'e91_aj4' => NULL,
                'e91_aj5' => NULL,
                'e91_aj6' => NULL,
                'e91_aj7' => NULL,
                'e91_aj8' => NULL,
                'e91_ak1' => NULL,
                'e91_ak2' => NULL,
                'e91_ak3' => NULL,
                'e91_npg' => NULL,
                'e91_jpg' => NULL,
                'e91_flagcetak' => NULL,
                'e91_ah5' => NULL,
                'e91_ah6' => NULL,
                'e91_ah7' => NULL,
                'e91_ah8' => NULL,
                'e91_ah9' => NULL,
                'e91_ah10' => NULL,
                'e91_ah11' => NULL,
                'e91_ah12' => NULL,
                'e91_ah13' => NULL,
                'e91_ah14' => NULL,
                'e91_ah15' => NULL,
                'e91_ah16' => NULL,
                'e91_ah17' => NULL,
                'e91_ah18' => NULL,
            ]);

        }
    }
    public function initialize_proses_pl101($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL101')->where('e_status', '1')->get();

        $e101_init = DB::table('e101_init')->delete();
        $e101_b = DB::table('e101_b')->delete();
        $e101_c = DB::table('e101_c')->delete();
        $e101_d = DB::table('e101_d')->delete();
        $e101_e = DB::table('e101_e')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E101Init::create([
                'e101_reg' => $key + 1,
                'e101_nl' => $e_nl,
                'e101_bln' => now()->format('m') - 1,
                'e101_thn' => now()->year,
                'e101_flg' => '1',
                'e101_sdate' => NULL,
                'e101_ddate' => $e_ddate,
                'e101_a1' => NULL,
                'e101_a2' => NULL,
                'e101_a3' => NULL,
                'e101_npg' => NULL,
                'e101_jpg' => NULL,
                'e101_flagcetak' => NULL,
            ]);
        }
    }

    public function initialize_proses_pl102($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL102')->where('e_status', '1')->get();

        $e102_init = DB::table('e102_init')->delete();
        $e102b = DB::table('e102b')->delete();
        $e102c = DB::table('e102c')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E102Init::create([
                'e102_reg' => $key + 1,
                'e102_nl' => $e_nl,
                'e102_bln' => now()->format('m') - 1,
                'e102_thn' => now()->year,
                'e102_flg' => '1',
                'e102_sdate' => NULL,
                'e102_ddate' => $e_ddate,
                'e102_aa1' => NULL,
                'e102_aa2' => NULL,
                'e102_aa3' => NULL,
                'e102_ab1' => NULL,
                'e102_ab2' => NULL,
                'e102_ab3' => NULL,
                'e102_ac1' => NULL,
                'e102_ac2' => NULL,
                'e102_ac3' => NULL,
                'e102_ad1' => NULL,
                'e102_ad2' => NULL,
                'e102_ad3' => NULL,
                'e102_ae1' => NULL,
                'e102_af2' => NULL,
                'e102_af3' => NULL,
                'e102_ag1' => NULL,
                'e102_ag2' => NULL,
                'e102_ag3' => NULL,
                'e102_ah1' => NULL,
                'e102_ah2' => NULL,
                'e102_ah3' => NULL,
                'e102_ai1' => NULL,
                'e102_ai2' => NULL,
                'e102_ai3' => NULL,
                'e102_aj1' => NULL,
                'e102_aj2' => NULL,
                'e102_aj3' => NULL,
                'e102_ak1' => NULL,
                'e102_ak2' => NULL,
                'e102_ak3' => NULL,
                'e102_al1' => NULL,
                'e102_al2' => NULL,
                'e102_al3' => NULL,
                'e102_al4' => NULL,
                'e102_npg' => NULL,
                'e102_jpg' => NULL,
                'e102_flagcetak' => NULL,
                'e102_ae3' => NULL,
            ]);
        }
    }
    public function initialize_proses_pl104($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL104')->where('e_status', '1')->get();

        $e101_init = DB::table('e104_init')->delete();
        $e104_b = DB::table('e104_b')->delete();
        $e104_c = DB::table('e104_c')->delete();
        $e104_d = DB::table('e104_d')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E104Init::create([
                'e104_reg' => $key + 1,
                'e104_nl' => $e_nl,
                'e104_bln' => now()->format('m') - 1,
                'e104_thn' => now()->year,
                'e104_flg' => '1',
                'e104_sdate' => NULL,
                'e104_ddate' => $e_ddate,
                'e104_a5' => NULL,
                'e104_a6' => NULL,
                'e104_npg' => NULL,
                'e104_jpg' => NULL,
                'e104_flagcetak' => NULL,
            ]);
        }
    }
    public function initialize_proses_pl111($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PL111')->where('e_status', '1')->get();

        $e07_init = DB::table('e07_init')->delete();
        $e07_btranshipment = DB::table('e07_btranshipment')->delete();
        $e07_transhipment = DB::table('e07_transhipment')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = E07Init::create([
                'e07_reg' => $key + 1,
                'e07_nl' => $e_nl,
                'e07_bln' => now()->format('m') - 1,
                'e07_thn' => now()->year,
                'e07_flg' => '1',
                'e07_sdate' => NULL,
                'e07_ddate' => $e_ddate,
                'e07_npg' => NULL,
                'e07_jpg' => NULL,
                'e07_flagcetak' => NULL,
            ]);
        }
    }
    public function initialize_proses_plbio($e_ddate)
    {
        $reg_pelesen = RegPelesen::where('e_kat', 'PLBIO')->where('e_status', '1')->get();

        $ebio_init = DB::table('e_bio_inits')->delete();
        $hari = DB::table('haris')->delete();
        $ebio_b = DB::table('e_bio_b_s')->delete();
        $ebio_c = DB::table('e_bio_c_s')->delete();
        $ebio_cc = DB::table('e_bio_cc')->delete();

        foreach ($reg_pelesen as $key => $reg_pelesens) {
            $e_nl = $reg_pelesens->e_nl;
            $query = EBioInit::create([
                'ebio_reg' => $key + 1,
                'ebio_nl' => $e_nl,
                'ebio_bln' => now()->format('m') - 1,
                'ebio_thn' => now()->year,
                'ebio_flg' => '1',
                'ebio_sdate' => NULL,
                'ebio_ddate' => $e_ddate,
                'ebio_a5' => $e_ddate,
                'ebio_a6' => $e_ddate,
                'ebio_npg' => NULL,
                'ebio_jpg' => NULL,
                'ebio_notel' => NULL,
                'ebio_flagcetak' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ]);

            $query = Hari::create([
                'id' => $key + 1,
                'lesen' => $e_nl,
                'bulanbhg2' => now()->format('m') - 1,
                'tahunbhg2' => now()->year,
                'hari_operasi' => NULL,
                'kapasiti' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ]);
        }
    }
}
