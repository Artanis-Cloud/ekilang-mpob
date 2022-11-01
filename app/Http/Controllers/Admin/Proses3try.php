<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CronJobTest;
use App\Models\Daerah;
use App\Models\E07Init;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91b;
use App\Models\E91Init;
use App\Models\EBioInit;
use App\Models\H91Init;
use App\Models\Ekmessage;
use App\Models\Init;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\Pengumuman;
use App\Models\RegPelesen;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class Proses3Controller extends Controller
{

    public function crtest()

    {
        // $time = date("h:i:s");
        // $dt = date("h:i:s", strtotime($time));
        // $sche = $schedule->
        $job = DB::table('cron_job_test')->delete();
        // $schedule->$job->->everyMinute();


        // $data = CronJobTest::
        // $test = CronJobTest::create([
        //     // 'e_id' => $count + 1,
        //     'date' => $dt,
        //     'data' => 'masuk',


        // ]);

        // return view('admin.proses3.3daftar-penyata', compact('time', 'dt', 'test'));
    }

}
