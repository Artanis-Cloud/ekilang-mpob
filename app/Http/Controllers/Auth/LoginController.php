<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function redirectTo()
    {
        $category = auth()->user()->category;
        switch ($category) {
            case 'PL91':
                return '/buah/dashboard';
                break;
            case 'PL101':
                return '/penapis/dashboard';
                break;
            case 'PL102':
                return '/isirung/dashboard';
                break;
            case 'PL104':
                return '/oleokimia/dashboard';
                break;
            case 'PL111':
                return '/pusatsimpan/dashboard';
                break;
            case 'PLBIO':
                return '/biodiesel/dashboard';
                break;

            default:
                return '/admin/dashboard';
                break;
        }
    }
}
