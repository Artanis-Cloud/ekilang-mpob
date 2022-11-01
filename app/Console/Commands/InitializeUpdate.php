<?php

namespace App\Console\Commands;

use App\Models\E91Init;
use App\Models\Init;
use App\Models\RegPelesen;
use Illuminate\Console\Command;
use DB;

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

        if ($bulan == '01') {
            $sdate = $date->sjan;
            $edate = $date->ejan;
        }
        elseif ($bulan == '02') {
            $sdate = $date->sfeb;
            $edate = $date->efeb;
        }
        elseif ($bulan == '03') {
            $sdate = $date->smac;
            $edate = $date->emac;
        }
        elseif ($bulan == '04') {
            $sdate = $date->sapr;
            $edate = $date->eapr;
        }
        elseif ($bulan == '05') {
            $sdate = $date->smei;
            $edate = $date->emei;
        }
        elseif ($bulan == '06') {
            $sdate = $date->sjun;
            $edate = $date->ejun;
        }
        elseif ($bulan == '07') {
            $sdate = $date->sjul;
            $edate = $date->ejul;
        }
        elseif ($bulan == '08') {
            $sdate = $date->sogos;
            $edate = $date->eogos;
        }
        elseif ($bulan == '09') {
            $sdate = $date->ssept;
            $edate = $date->esept;
        }
        elseif ($bulan == '10') {
            $sdate = $date->sokt;
            $edate = $date->eokt;
        }
        elseif ($bulan == '11') {
            $sdate = $date->snov;
            $edate = $date->enov;
        }
        else {
            $sdate = $date->sdec;
            $edate = $date->edec;
        }

        if ($sdate == $current_date ) {
            $this->initialize_proses_pl91($edate);
            // $this->initialize_proses_pl101($edate);
            // $this->initialize_proses_pl102($edate);
            // $this->initialize_proses_pl104($edate);
            // $this->initialize_proses_pl111($edate);
            // $this->initialize_proses_plbio($edate);
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
}
