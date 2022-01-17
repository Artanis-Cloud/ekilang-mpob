<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class PelesenLoginController extends DefaultLoginController
{
    protected $redirectTo = 'buah/dashboard';

    public function __construct()
    {
        $this->middleware('guest:pelesen')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function username()
    {
        return 'e_nl';
    }

    protected function guard()
    {
        return Auth::guard('pelesen');
    }
}


