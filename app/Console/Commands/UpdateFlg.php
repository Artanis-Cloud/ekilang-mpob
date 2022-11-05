<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateFlg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:flg';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update map flg in table users';

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
        $user = User::get();

        // if (auth()->user()->map_flg == 1) {
            if (date('d-m') == '01-01' || date('d-m') == '01-07') {
                foreach($user as $data) {
                    $data->map_flg = 0;
                    $data->save();
                }

            }
        // }
    }
}
