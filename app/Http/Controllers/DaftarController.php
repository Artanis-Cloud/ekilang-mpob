<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{

    public function daftar_akaun2(){
        return view('auth/register2');
    }

    public function register2(){
        return view('auth/registerrrrrrrr');
    }



}
