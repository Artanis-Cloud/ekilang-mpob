<?php

namespace App\Providers;

use App\Models\E07Init;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\EBioInit;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        // compose all the views....
        view()->composer('*', function ($view) {

            $layoutpenyata = null;
            $not_admin = null;
            $map_url = true;
            $map_date_expired = null;

            if (auth()->user()) {
                if (auth()->user()->category == 'PL91') {
                    $layoutpenyata = E91Init::where('e91_nl', auth()->user()->username)->where('e91_flg', ['2','3'])->orWhere('e91_flg', '3')->first();
                    $not_admin = true;
                } elseif (auth()->user()->category == 'PL101') {
                    $layoutpenyata = E101Init::where('e101_nl', auth()->user()->username)->where('e101_flg', '2')->orWhere('e101_flg', '3')->first();
                    $not_admin = true;
                } elseif (auth()->user()->category == 'PL102') {
                    $layoutpenyata = E102Init::where('e102_nl', auth()->user()->username)->where('e102_flg', '2')->orWhere('e102_flg', '3')->first();
                    $not_admin = true;
                } elseif (auth()->user()->category == 'PL104') {
                    $layoutpenyata = E104Init::where('e104_nl', auth()->user()->username)->where('e104_flg', '2')->orWhere('e104_flg', '3')->first();
                    $not_admin = true;
                } elseif (auth()->user()->category == 'PL111') {
                    $layoutpenyata = E07Init::where('e07_nl', auth()->user()->username)->where('e07_flg', '2')->orWhere('e07_flg', '3')->first();
                    $not_admin = true;
                } elseif (auth()->user()->category == 'PLBIO') {
                    $layoutpenyata = EBioInit::where('ebio_nl', auth()->user()->username)->where('ebio_flg', '2')->orWhere('ebio_flg', '3')->first();
                    $not_admin = true;
                }
                // dd($layoutpenyata);

                // $map_flg = User::where('username', auth()->user()->username)->first();
                // dd($map_flg);
                // dd(date('d-m'));
                // $map_date_expired = date('Y-m-d', strtotime("+6 months", strtotime(auth()->user()->map_sdate)));
                // if (auth()->user()->map_flg == 1) {
                //     if (date('d-m') == '01-01' || date('m') == '01-07') {
                //         $user = User::find(auth()->user()->id);
                //         $user->map_flg = 0;
                //         $user->save();
                //     }
                // }

                if (\Request::is('*/maklumat-asas-pelesen')) {
                    $map_url = false;
                }
            }
            $view->with(
                [
                    "layoutpenyata" => $layoutpenyata,
                    "map_url" => $map_url,
                    // "map_flg" => $map_flg,
                    // "map_date_expired" => $map_date_expired,
                    "not_admin" => $not_admin
                ]
            );
        });
    }
}
