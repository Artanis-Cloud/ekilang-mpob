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

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $users = User::where('username', $request->username)->get();

        if($users->count() > 1){
            foreach ($users as $key => $user) {
                if(Hash::check($request->password, $user->password)){
                    Auth::loginUsingId($user->id);
                    return $this->authenticated($request, $user);
                }
            }
        }
        if ($this->attemptLogin($request)) {

            if ($request->hasSession()) {

                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function authenticated(Request $request, $user)
    {
        // dd($request->all());
        if (!$request->multilogin) {
            $users = User::where('username', auth()->user()->username)->get();

            if (count($users) > 1) {
                foreach ($users as $key => $cat) {
                    $category[$key] = $cat->category;
                    $password[$key] = $cat->password;
                }

                $check = Hash::check($password[0], $password[1]);

                if ($category[0] != $category[1]) {
                    if (!$check) {

                        foreach ($password as $keypass => $pass) {

                            if (Hash::check($request->password, $pass)) {
                                // dd('h');
                                $user = User::where('username', auth()->user()->username)->where('category', $category[$keypass])->first();

                                Auth::loginUsingId($user->id);

                                if ($category[$keypass] == 'PL91') {
                                    return redirect()->route('buah.dashboard');
                                }

                                if ($category[$keypass] == 'PL101') {
                                    return redirect()->route('penapis.dashboard');
                                }

                                if ($category[$keypass] == 'PL102') {
                                    return redirect()->route('isirung.dashboard');
                                }

                                if ($category[$keypass] == 'PL104') {
                                    return redirect()->route('oleo.dashboard');
                                }

                                if ($category[$keypass] == 'PL111') {
                                    return redirect()->route('pusatsimpan.dashboard');
                                }

                                if ($category[$keypass] == 'PLBIO') {
                                    return redirect()->route('bio.dashboard');
                                }
                            } else {
                                continue;
                            }
                        }
                    } else {
                        $this->guard()->logout();
                        return view('auth.login_multi', compact('users'));
                    }
                }
                    //  else {
                    //     $this->guard()->logout();
                    //     return view('auth.login_multi', compact('users'));
                    // }

                    // dd('test');

            }
        }
    }

    public function multiLogin(Request $request)
    {
        $user = User::where('username', $request->username)->where('category', $request->category)->first();
        Auth::loginUsingId($user->id);


        if ($request->category == 'PL91') {
            return redirect()->route('buah.dashboard');
        }

        if ($request->category == 'PL101') {
            return redirect()->route('penapis.dashboard');
        }

        if ($request->category == 'PL102') {
            return redirect()->route('isirung.dashboard');
        }

        if ($request->category == 'PL104') {
            return redirect()->route('oleo.dashboard');
        }

        if ($request->category == 'PL111') {
            return redirect()->route('pusatsimpan.dashboard');
        }

        if ($request->category == 'PLBIO') {
            return redirect()->route('bio.dashboard');
        }
    }
}
