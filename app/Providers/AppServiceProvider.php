<?php

namespace App\Providers;

use App\Models\E07Init;
use App\Models\E101Init;
use App\Models\E102Init;
use App\Models\E104Init;
use App\Models\E91Init;
use App\Models\EBioInit;
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
        view()->composer('*', function ($view)
        {
            $layoutpenyata = null;
            if (auth()->user()) {
                if (auth()->user()->category == 'PL91') {
                $layoutpenyata = E91Init::where('e91_nl', auth()->user()->username)->where('e91_flg', '2')->first();
            } elseif (auth()->user()->category == 'PL101') {
                $layoutpenyata = E101Init::where('e101_nl', auth()->user()->username)->where('e101_flg', '2')->first();
            } elseif (auth()->user()->category == 'PL102') {
                $layoutpenyata = E102Init::where('e102_nl', auth()->user()->username)->where('e102_flg', '2')->first();
            } elseif (auth()->user()->category == 'PL104') {
                $layoutpenyata = E104Init::where('e104_nl', auth()->user()->username)->where('e104_flg', '2')->first();
            } elseif (auth()->user()->category == 'PL111') {
                $layoutpenyata = E07Init::where('e07_nl', auth()->user()->username)->where('e07_flg', '2')->first();
            } elseif (auth()->user()->category == 'PLBIO') {
                $layoutpenyata = EBioInit::where('ebio_nl', auth()->user()->username)->where('ebio_flg', '2')->first();
            }
            }

            $view->with('layoutpenyata', $layoutpenyata );
        });
    }
}
