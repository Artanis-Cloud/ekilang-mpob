<?php

namespace App\Http\Controllers;

use App\Models\Pelesen;
use App\Models\RegPelesen;
use App\Models\RegUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;


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

    public function transfer_loginmill_to_users()
    {
        // $login_mill = RegPelesen::get(); // login

        $loginmills = DB::connection('mysql2')->select("SELECT * FROM  login_mill");



        foreach ($loginmills as $loginmill) {
            $kilang = DB::connection('mysql2')->select("SELECT * FROM  kilang where e_nl = $loginmill->lesen");

            // dd($kilang[0]);

            $password = Hash::make($loginmill->password);
            // dd($password);
            $user = User::where('username', $loginmill->lesen)->first();
            if(!$user){
                $user = User::create([
                    'name' => $kilang[0]->e_np ?? '-',
                    'name' => $kilang[0]->e_email ?? '-',
                    'password' => $password,
                    'username' => $loginmill->lesen ?? '-',
                    'category' => 'PLBIO',
                    'kod_pegawai' => $kilang[0]->kodpgw ?? '-',
                    'no_siri' => $kilang[0]->nosiri ?? '-',
                    'status' =>  $kilang[0]->e_status ?? '-',
                    // 'stock' =>  $reg_pelesen->e_stock ?? '-',
                    // 'directory' =>  $reg_pelesen->directory ?? '-',
                ]);
            }else{

                $user->name = $kilang[0]->e_np ?? '-';
                $user->email = $kilang[0]->e_email ?? '-';
                $user->username = $loginmill->lesen ?? '-';
                $user->category = 'PLBIO';
                $user->kod_pegawai = $kilang[0]->kodpgw ?? '-';
                $user->no_siri = $kilang[0]->nosiri ?? '-';
                $user->status = $kilang[0]->e_status ?? '-';
                $user->save();
            }

        }
    }

    public function transfer_kilang_to_pelesen()
    {
        // $reg_pelesens = RegPelesen::get(); // login

        $kilangs = DB::connection('mysql2')->select("SELECT * FROM  kilang");

        // dd($users);

        // foreach ($users as $user) {
        //     // dd($user );
        // }

        foreach ($kilangs as $kilang) {
            // $pelesen = Pelesen::where('e_nl', $reg_pelesen->e_nl)->first();
            // $e_asdaerah = DB::connection('mysql2')->select("SELECT kod_daerah FROM  daerah where namadaerah = $kilang->e_asdaerah");
            // dd($e_asdaerah);


            // $password = Hash::make($reg_pelesen->e_pwd);

            $user = Pelesen::create([
                'e_nl' => $kilang->e_nl ?? '-',
                'e_np' => $kilang->e_np ?? '-',
                'e_ap1' => $kilang->e_ap1 ?? '-',
                'e_ap2' => $kilang->e_ap2 ?? '-',
                'e_ap3' => $kilang->e_ap3 ?? '-',
                'e_as1' => $kilang->e_as1 ?? '-',
                'e_as2' => $kilang->e_as2 ?? '-',
                'e_as3' => $kilang->e_as3 ?? '-',
                'e_notel' =>  $kilang->e_notel ?? '-',
                'e_nofax' =>  $kilang->e_nofax ?? '-',
                'e_email' =>  $kilang->e_email ?? '-',
                'e_npg' =>  $kilang->e_npg ?? '-',
                'e_jpg' =>  $kilang->e_jpg ?? '-',
                'kodpgw' =>  $kilang->kodpgw ?? '-',
                'nosiri' =>  $kilang->nosiri ?? '-',
                'e_npgtg' =>  $kilang->e_npgtg ?? '-',
                'e_jpgtg' =>  $kilang->e_jpgtg ?? '-',
                'e_asnegeri' =>  $kilang->e_asnegeri ?? '-',
                'e_asdaerah' =>  $kilang->e_asdaerah ?? '-',
                'e_apnegeri' =>  $kilang->e_negeri ?? '-',
                'e_apdaerah' =>  $kilang->e_daerah ?? '-',
                'e_syktinduk' =>  $kilang->e_sykt_induk ?? '-',
                'e_status' =>  $kilang->e_status ?? '-',
            ]);
        }
    }
}
