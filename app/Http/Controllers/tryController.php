<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class tryController extends Controller
{

    public function tryArx(){
        return view('loginArx');
    }
    public function testing3(){
        return view('users.users-dashboard');
    }

    // public function register2(){
    //     return view('auth/registerrrrrrrr');
    // }



}
