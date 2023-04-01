<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // dd(Auth::user()->category);
                if(Auth::user()->category=='admin'){

                    return redirect(RouteServiceProvider::HOME);

                }elseif(Auth::user()->category=='PL91'){

                    return redirect(RouteServiceProvider::PL91);

                }elseif(Auth::user()->category=='PL101'){

                    return redirect(RouteServiceProvider::PL101);

                }elseif(Auth::user()->category=='PL102'){

                    return redirect(RouteServiceProvider::PL102);

                }elseif(Auth::user()->category=='PL104'){

                    return redirect(RouteServiceProvider::PL104);

                }elseif(Auth::user()->category=='PL111'){

                    return redirect(RouteServiceProvider::PL111);

                }else{
                    return redirect(RouteServiceProvider::PLBIO);
                }
            }
        }

        return $next($request);
    }
}
