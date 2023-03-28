<?php

namespace App\Providers;

use App\Models\E07Init;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\EBioInit;
use App\Models\Init;
use App\Models\User;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Routing\UrlGenerator as RoutingUrlGenerator;
use Illuminate\Support\Facades\URL;
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
    // public function boot()
    public function boot(RoutingUrlGenerator $url)
    {


        if (strstr(URL::current(),env('SERVER_IP_PRIVATE'))){
            $url->forceScheme('http');
       }
       else
       {
            $url->forceScheme('https');
        }
        // if (env('APP_ENV') !== 'production') {
        //         $url->forceScheme('https');
        // }
        // compose all the views....
        view()->composer('*', function ($view) {

            $layoutpenyata = null;
            $not_admin = null;
            $map_url = true;
            $map_date_expired = null;

            $current_date = date('Y-m-d');
            $year = date('Y');
            $bulan = date('m');
            if ($bulan == '01') {
                $tahun = $year - 1;
            } else {
                $tahun = $year;
            }
            $date = Init::where('tahun', $tahun)->first();

            if ($bulan == 2) {
                $sdate = $date->sjan;
                $edate = $date->ejan;
            } elseif ($bulan == 3) {
                $sdate = $date->sfeb;
                $edate = $date->efeb;
            } elseif ($bulan == 4) {
                $sdate = $date->smac;
                $edate = $date->emac;
            } elseif ($bulan == 5) {
                $sdate = $date->sapr;
                $edate = $date->eapr;
            } elseif ($bulan == 6) {
                $sdate = $date->smei;
                $edate = $date->emei;
            } elseif ($bulan == 7) {
                $sdate = $date->sjun;
                $edate = $date->ejun;
            } elseif ($bulan == 8) {
                $sdate = $date->sjul;
                $edate = $date->ejul;
            } elseif ($bulan == 9) {
                $sdate = $date->sogos;
                $edate = $date->eogos;
            } elseif ($bulan == 10) {
                $sdate = $date->ssept;
                $edate = $date->esept;
            } elseif ($bulan == 11) {
                $sdate = $date->sokt;
                $edate = $date->eokt;
            } elseif ($bulan == 12) {
                $sdate = $date->snov;
                $edate = $date->enov;
            } else {
                $sdate = $date->sdec;
                $edate = $date->edec;
            }


            // dd($tahun);

            if (auth()->user()) {
                if (auth()->user()->category == 'PL91') {
                    $layoutpenyata = E91Init::where([['e91_nl', auth()->user()->username], ['e91_flg', '2']])->orWhere([['e91_nl', auth()->user()->username], ['e91_flg', '3']])->first();
                    $not_admin = true;
                    $open = E91Init::where('e91_nl', auth()->user()->username)->first();
                    if ($open) {

                        $res = ($open->e91_ddate < $current_date);
                    } else {
                        $res = true;
                    }
                } elseif (auth()->user()->category == 'PL101') {
                    $layoutpenyata = E101Init::where([['e101_nl', auth()->user()->username], ['e101_flg', '2']])->orWhere([['e101_nl', auth()->user()->username], ['e101_flg', '3']])->first();
                    $not_admin = true;
                    $open = E101Init::where('e101_nl', auth()->user()->username)->first();
                    if ($open) {

                        $res = ($open->e101_ddate < $current_date);
                    } else {
                        $res = true;
                    }
                } elseif (auth()->user()->category == 'PL102') {
                    $layoutpenyata = E102Init::where([['e102_nl', auth()->user()->username], ['e102_flg', '2']])->orWhere([['e102_nl', auth()->user()->username], ['e102_flg', '3']])->first();
                    $not_admin = true;
                    $open = E102Init::where('e102_nl', auth()->user()->username)->first();
                    if ($open) {

                        $res = ($open->e102_ddate < $current_date);
                    } else {
                        $res = true;
                    }
                } elseif (auth()->user()->category == 'PL104') {
                    $layoutpenyata = E104Init::where([['e104_nl', auth()->user()->username], ['e104_flg', '2']])->orWhere([['e104_nl', auth()->user()->username], ['e104_flg', '3']])->first();
                    $not_admin = true;
                    $open = E104Init::where('e104_nl', auth()->user()->username)->first();
                    if ($open) {

                        $res = ($open->e104_ddate < $current_date);
                    } else {
                        $res = true;
                    }
                } elseif (auth()->user()->category == 'PL111') {
                    $layoutpenyata = E07Init::where([['e07_nl', auth()->user()->username], ['e07_flg', '2']])->orWhere([['e07_nl', auth()->user()->username], ['e07_flg', '3']])->first();
                    $not_admin = true;
                    $open = E07Init::where('e07_nl', auth()->user()->username)->first();
                    if ($open) {

                        $res = ($open->e07_ddate < $current_date);
                    } else {
                        $res = true;
                    }
                } elseif (auth()->user()->category == 'PLBIO') {
                    $layoutpenyata = EBioInit::where([['ebio_nl', auth()->user()->username], ['ebio_flg', '2']])->orWhere([['ebio_nl', auth()->user()->username], ['ebio_flg', '3']])->first();
                    $not_admin = true;
                    $open = EBioInit::where('ebio_nl', auth()->user()->username)->first();
                    if ($open) {
                        $res = ($open->ebio_ddate < $current_date);
                    } else {
                        $res = true;
                    }
                }




                // dd($res);

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

                if (auth()->user()->category == 'admin') {
                    $view->with(
                        [
                            "layoutpenyata" => $layoutpenyata,
                            "map_url" => $map_url,
                            // "edate" => $edate,
                            // "current_date" => $current_date,
                            // "res" => $res,
                            // "map_flg" => $map_flg,
                            // "map_date_expired" => $map_date_expired,
                            "not_admin" => $not_admin
                        ]
                    );
                } else {
                    $view->with(
                        [
                            "layoutpenyata" => $layoutpenyata,
                            "map_url" => $map_url,
                            // "edate" => $edate,
                            // "current_date" => $current_date,
                            "res" => $res,
                            // "map_flg" => $map_flg,
                            // "map_date_expired" => $map_date_expired,
                            "not_admin" => $not_admin
                        ]
                    );
                }
            }
        });
    }
}
