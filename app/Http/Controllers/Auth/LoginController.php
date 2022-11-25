<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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


        //log audit trail admin
        Auth::user()->log("LOGGED IN");
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
            // case 'PL101' && 'PL104':
            //     return '/biodiesel/dashboard';
            //     break;

            default:
                return '/admin/dashboard';
                break;
        }
        // dd($category);
    }

    protected function authenticated(Request $request, $user)
    {
        if(!$request->multilogin){
            $users = User::where('username', auth()->user()->username)->get();

            if(count($users) > 1){

                    foreach ($users as $key => $cat) {
                        $category[$key] = $cat->category;
                        // $password[$key] = $cat->password;
                    }

                    // $check = Hash::check($password[0], $password[1]);
                    // dd($check);

                    if ($category[0] != $category[1]) {
                        // if ($check == true) {
                            $this->guard()->logout();
                            return view('auth.login_multi', compact('users'));
                        // }

                    }



            }
        }
    }

    public function multiLogin(Request $request)
    {
        $user = User::where('username', $request->username)->where('category', $request->category)->first();
        Auth::loginUsingId($user->id);


        if($request->category == 'PL91') {
            return redirect()->route('buah.dashboard');
        }

        if($request->category == 'PL101') {
            return redirect()->route('penapis.dashboard');
        }

        if($request->category == 'PL102') {
            return redirect()->route('isirung.dashboard');
        }

        if($request->category == 'PL104') {
            return redirect()->route('oleo.dashboard');
        }

        if($request->category == 'PL111') {
            return redirect()->route('pusatsimpan.dashboard');
        }

        if($request->category == 'PLBIO') {
            return redirect()->route('bio.dashboard');
        }

    }
}
