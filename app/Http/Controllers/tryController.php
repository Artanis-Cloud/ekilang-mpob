<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
class tryController extends Controller
{

    public function tryArx(){
        return view('loginArx');
    }
    public function testing3(){
        $loginmills = DB::connection('mysql4')->select("Show tables");
        dd($loginmills);
        return view('users.users-dashboard');
    }
    public function dashArx(){
        return view('dashboardArx');
    }
    // public function register2(){
    //     return view('auth/registerrrrrrrr');
    // }



}

