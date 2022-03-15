<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KilangBiodiesel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->category == 'PLBIO') {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Anda tidak dibenarkan masuk.');
    }    }

