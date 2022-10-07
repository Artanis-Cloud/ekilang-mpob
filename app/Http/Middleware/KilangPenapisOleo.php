<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KilangPenapisOleo
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
        if (auth()->user()->category == 'PL101' ?? 'PL104') {
            return $next($request);

        }
        // dd($request);

        return redirect()->back()->with('error', 'Anda tidak dibenarkan masuk.');
    }
}
