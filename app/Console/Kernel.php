<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */


    protected $commands = [
        Commands\InitializeUpdate::class
    ];

    protected function schedule(Schedule $schedule)
    {


        // $schedule->call([App\Http\Controllers\Admin\Proses3try::class, 'crtest'])->everyMinute()->runInBackground();
        // $schedule->call(function () {
        //     DB::table('cron_jobs_test')->delete();
        // })->everyMinute()->runInBackground();
        $schedule->command('initialize:update')->everyMinute()->runInBackground();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
