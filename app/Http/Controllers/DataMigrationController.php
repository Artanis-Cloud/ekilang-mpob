<?php

namespace App\Http\Controllers;

use App\Models\Pelesen;
use App\Models\RegPelesen;
use App\Models\RegUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataMigrationController extends Controller
{
    public function transfer_pelesen_to_users()
    {
        $reg_pelesens = RegPelesen::get();

        foreach ($reg_pelesens as $reg_pelesen) {
            $pelesen = Pelesen::where('e_nl', $reg_pelesen->e_nl)->first();

            $password = Hash::make($reg_pelesen->e_pwd);

            $user = User::create([
                'name' => $pelesen->e_np ?? '-',
                'email' => $pelesen->e_email ?? '-',
                'password' => $password,
                'username' => $reg_pelesen->e_nl ?? '-',
                'category' => $reg_pelesen->e_kat ?? '-',
                'kod_pegawai' => $reg_pelesen->kodpgw ?? '-',
                'no_siri' => $reg_pelesen->nosiri ?? '-',
                'status' =>  $reg_pelesen->e_status ?? '-',
                'stock' =>  $reg_pelesen->e_stock ?? '-',
                'directory' =>  $reg_pelesen->directory ?? '-',
            ]);
        }
    }

    public function transfer_admin_to_users()
    {
        $reg_users = RegUser::get();

        foreach ($reg_users as $reg_user) {
            // $pelesen = Pelesen::where('e_nl', $reg_pelesen->e_nl)->first();
            // dd($reg_user);
            $password = Hash::make($reg_user->e_pwd);

            $user = User::create([
                'name' => $reg_user->e_kat ?? '-',
                'email' => $reg_user->e_email ?? '-',
                'password' => $password,
                'username' => $reg_user->e_userid ?? '-',
                'category' => 'admin',
                'priv' =>  $reg_user->e_priv ?? '-',
            ]);
        }
    }
}
