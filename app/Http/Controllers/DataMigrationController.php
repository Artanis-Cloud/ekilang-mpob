<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use App\Models\EBioInit;
use App\Models\HBioInit;
use App\Models\HebahanStokAkhir;
use App\Models\HPelesen;
use App\Models\Negeri;
use App\Models\Pelesen;
use App\Models\ProfileBulanan;
use App\Models\RegPelesen;
use App\Models\RegUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Crypt;

class DataMigrationController extends Controller
{
    public function change_eyear()
    {
        // $job = DB::table('cron_job_test')->delete();
        $pelesens = Pelesen::get();
        $year = null;

        foreach ($pelesens as $pelesen) {
            // $pelesen = Pelesen::where('e_nl', $reg_pelesen->e_nl)->first();

            // $password = Hash::make($reg_pelesen->e_pwd);
//
        $pelesen->e_year = $year;
        $pelesen->save();
        }
    }
    public function transfer_pelesen_to_users()
    {
        // $users = DB::delete("DELETE FROM users");
        $reg_pelesens = RegPelesen::get();

        foreach ($reg_pelesens as $reg_pelesen) {
            $pelesen = Pelesen::where('e_nl', $reg_pelesen->e_nl)->first();

            $password = Hash::make($reg_pelesen->e_pwd);

            $user = User::create([
                'name' => $pelesen->e_np ?? '-',
                'email' => $pelesen->e_email ?? '-',
                'password' => $password,
                'crypted_pass' => Crypt::encryptString($reg_pelesen->e_pwd),
                'username' => $reg_pelesen->e_nl ?? '-',
                'category' => $reg_pelesen->e_kat ?? '-',
                'kod_pegawai' => $reg_pelesen->kodpgw ?? '-',
                'no_siri' => $reg_pelesen->nosiri ?? '-',
                'status' =>  $reg_pelesen->e_status ?? '-',
                'stock' =>  $reg_pelesen->e_stock ?? '-',
                'directory' =>  $reg_pelesen->directory ?? '-',
                'map_flg' =>  0,
                'map_sdate' =>  NULL,
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
                'crypted_pass' => Crypt::encryptString($reg_user->e_pwd),
                'username' => $reg_user->e_userid ?? '-',
                'category' => 'admin',
                'status' =>  '1',
                'priv' =>  $reg_user->e_priv ?? '-',
                'role' =>  'admin',
            ]);
        }
    }

    public function transfer_adminbio_to_users()
    {
        $admins = DB::connection('mysql2')->select("SELECT * from login_admin");

        foreach ($admins as $admin) {
            $password = Hash::make($admin->PASSWORD);
            $crypted = Crypt::encryptString($admin->PASSWORD);

            $user = User::where('username', $admin->EMAIL)->first();
            if(!$user){
                $user = User::create([
                    'name' => $admin->NAME ?? '-',
                    'email' => $admin->EMAIL ?? '-',
                    'password' => $password,
                    'crypted_pass' => $crypted,
                    'username' => $admin->USERNAME ?? '-',
                    'category' => 'admin',
                    'status' =>  '1',
                    'role' =>  $admin->LEVEL ?? '-',
                ]);
            }else{
                $user->name = $admin->NAME ?? '-';
                $user->email = $admin->EMAIL ?? '-';
                $user->username = $admin->USERNAME ?? '-';
                $user->password = $password;
                $user->crypted_pass = $crypted;
                $user->category = 'admin';
                $user->status = '1';
                $user->role = $admin->LEVEL ?? '-';

                $user->save();
            }


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

    public function add_ebio_notel_to_hbioinits()
    {
        // $login_mill = RegPelesen::get(); // login

        $ebioinits = EBioInit::where('ebio_flg', '3')->get();
        // dd($ebioinits);


        foreach ($ebioinits as $ebioinit) {
            $ebionotel = DB::select("SELECT ebio_notel FROM e_bio_inits where ebio_nl = '$ebioinit->ebio_nl'");
            // DB::connection('mysql2')->select("SELECT * FROM  kilang where e_nl = $loginmill->lesen");

            // dd($kilang[0]);

            // $password = Hash::make($loginmill->password);
            // dd($ebionotel);
            $hbioinits = HBioInit::where('ebio_nl', $ebioinit->ebio_nl)->first();


                $hbioinits->ebio_notel = $ebionotel[0]->ebio_notel ?? NULL;
                $hbioinits->save();


        }
    }

    public function transfer_kilang_to_pelesen()
    {
        // $reg_pelesens = RegPelesen::get(); // login

        $kilangs = DB::connection('mysql2')->select("SELECT * FROM  kilang");

        foreach ($kilangs as $kilang) {

            $daerah = Daerah::where('nama_daerah', $kilang->e_asdaerah)->first();
            $negeri = Negeri::where('nama_negeri', $kilang->e_asnegeri)->first();

            $count = Pelesen::count();
            // dd($count);
            $user = Pelesen::where('e_nl', $kilang->e_nl)->first();
            if($kilang->e_asnegeri == '-Negeri-'){
                $kilang->e_asnegeri = null;
            }
            if($kilang->e_apnegeri == '-Negeri-'){
                $kilang->e_apnegeri = null;
            }
            // if($kilang->e_nl == '616115025000'){
            //     dd($kilang);
            // }
            if(!$user){
                $user = Pelesen::create([
                    'e_id' => $count++,
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
                    'e_asnegeri' =>  $negeri->kod_negeri ?? '-',
                    'e_asdaerah' =>  $daerah->kod_daerah ?? '-',
                    'e_negeri' =>  $negeri->kod_negeri ?? '-',
                    'e_daerah' =>  $daerah->kod_daerah ?? '-',
                    'e_syktinduk' =>  $kilang->e_sykt_induk ?? '-',
                    'e_status' =>  $kilang->e_status ?? '-',
                ]);
            }else{

                    $user->e_nl = $kilang->e_nl ?? '-';
                    $user->e_np = $kilang->e_np ?? '-';
                    $user->e_ap1 = $kilang->e_ap1 ?? '-';
                    $user->e_ap2 = $kilang->e_ap2 ?? '-';
                    $user->e_ap3 = $kilang->e_ap3 ?? '-';
                    $user->e_as1 = $kilang->e_as1 ?? '-';
                    $user->e_as2 = $kilang->e_as2 ?? '-';
                    $user->e_as3 = $kilang->e_as3 ?? '-';
                    $user->e_notel = $kilang->e_notel ?? '-';
                    $user->e_nofax = $kilang->e_nofax ?? '-';
                    $user->e_email = $kilang->e_email ?? '-';
                    $user->e_npg = $kilang->e_npg ?? '-';
                    $user->e_jpg = $kilang->e_jpg ?? '-';
                    $user->kodpgw = $kilang->kodpgw ?? '-';
                    $user->nosiri = $kilang->nosiri ?? '-';
                    $user->e_npgtg = $kilang->e_npgtg ?? '-';
                    $user->e_jpgtg = $kilang->e_jpgtg ?? '-';
                    $user->e_asnegeri = $negeri->kod_negeri ?? '-';
                    $user->e_asdaerah = $daerah->kod_daerah ?? '-';
                    $user->e_negeri = $negeri->kod_negeri ?? '-';
                    $user->e_daerah = $daerah->kod_daerah ?? '-';
                    $user->e_syktinduk = $kilang->e_sykt_induk ?? '-';
                    $user->e_status = $kilang->e_status ?? '-';

                $user->save();
            }

        }
    }

    public function transfer_pelesenbio_to_users()
    {
        // $reg_pelesens = RegPelesen::get(); // login

        $biodiesels = DB::connection('mysql2')->select("SELECT * FROM  kilang k, login_mill m
        where k.e_nl = m.lesen
        and k.e_status='1'
        and k.jenis='kilang biodiesel'");
        // dd($biodiesels);

        foreach ($biodiesels as $biodiesel) {

            $daerahap = Daerah::where('nama_daerah', $biodiesel->e_apdaerah)->first();
            $daerahas = Daerah::where('nama_daerah', $biodiesel->e_asdaerah)->first();
            $negeriap = Negeri::where('nama_negeri', $biodiesel->e_apnegeri)->first();
            $negerias = Negeri::where('nama_negeri', $biodiesel->e_asnegeri)->first();
            // dd($negerias);

            $password = Hash::make('12345678');
            $crypted = Crypt::encryptString('12345678');
            // dd($crypted);

            // $count_rp = RegPelesen::max('e_id');
            $count_user = User::max('e_id');
            $count_pelesen = Pelesen::count();

            if($biodiesel->e_asnegeri == '-Negeri-'){
                $biodiesel->e_asnegeri = null;
            }
            if($biodiesel->e_apnegeri == '-Negeri-'){
                $biodiesel->e_apnegeri = null;
            }

            // $rp = RegPelesen::where('e_nl', $biodiesel->e_nl)->where('e_kat', $biodiesel->e_kat)->first();


                // $rp = RegPelesen::create([
                //     'e_id' => $count_rp + 1,
                //     'e_nl' => $biodiesel->e_nl ,
                //     'e_kat' => 'PLBIO',
                //     'e_pwd' => $password,
                //     'kodpgw' => $biodiesel->kodpgw ?? NULL,
                //     'nosiri' => $biodiesel->nosri ?? NULL,
                //     'e_status' => $biodiesel->e_status ?? NULL,
                //     'e_stock' => NULL,
                //     'directory' =>  NULL,
                // ]);


                $user = User::where('username', $biodiesel->e_nl)->where('category', $biodiesel->e_kat)->first();


                    $user = User::create([
                        'id' => $count_user++,
                        'name' => $biodiesel->e_np ?? '-',
                        'email' => $biodiesel->e_email ?? '-',
                        'password' => $password,
                        'crypted_pass' => $crypted,
                        'username' => $biodiesel->e_nl ?? '-',
                        'category' => $biodiesel->e_kat ?? '-',
                        'sub_cat' => NULL,
                        'status' =>  '1',
                        'map_flg' =>  '0',
                        'map_sdate' =>  NULL,
                    ]);

            }


                $pelesen = Pelesen::where('e_nl', $biodiesel->e_nl)->first();

                if(!$pelesen){
                    $pelesen = Pelesen::create([
                        'e_id' => $count_pelesen++,
                        'e_nl' => $biodiesel->e_nl ?? '-',
                        'e_np' => $biodiesel->e_np ?? '-',
                        'e_kat' => $biodiesel->e_kat ?? '-',
                        'e_ap1' => $biodiesel->e_ap1 ?? '-',
                        'e_ap2' => $biodiesel->e_ap2 ?? '-',
                        'e_ap3' => $biodiesel->e_ap3 ?? '-',
                        'e_as1' => $biodiesel->e_as1 ?? '-',
                        'e_as2' => $biodiesel->e_as2 ?? '-',
                        'e_as3' => $biodiesel->e_as3 ?? '-',
                        'e_notel' =>  $biodiesel->e_notel ?? '-',
                        'e_nofax' =>  $biodiesel->e_nofax ?? '-',
                        'e_email' =>  $biodiesel->e_email ?? '-',
                        'e_npg' =>  $biodiesel->e_npg ?? '-',
                        'e_jpg' =>  $biodiesel->e_jpg ?? '-',
                        'kodpgw' =>  $biodiesel->kodpgw ?? '-',
                        'nosiri' =>  $biodiesel->nosiri ?? '-',
                        'e_npgtg' =>  $biodiesel->e_npgtg ?? '-',
                        'e_jpgtg' =>  $biodiesel->e_jpgtg ?? '-',
                        'e_asnegeri' =>  $negerias->kod_negeri ?? '-',
                        'e_asdaerah' =>  $daerahas->kod_daerah ?? '-',
                        'e_negeri' =>  $negeriap->kod_negeri ?? '-',
                        'e_daerah' =>  $daerahap->kod_daerah ?? '-',
                        'e_syktinduk' =>  $biodiesel->e_sykt_induk ?? '-',
                        'e_status' =>  $biodiesel->e_status ?? '-',
                    ]);
                }else{
                    if ($pelesen->e_kat == $biodiesel->e_kat) {
                        $pelesen->e_nl = $biodiesel->e_nl ?? '-';
                        $pelesen->e_np = $biodiesel->e_np ?? '-';
                        $pelesen->e_kat = $biodiesel->e_kat ?? '-';
                        $pelesen->e_ap1 = $biodiesel->e_ap1 ?? '-';
                        $pelesen->e_ap2 = $biodiesel->e_ap2 ?? '-';
                        $pelesen->e_ap3 = $biodiesel->e_ap3 ?? '-';
                        $pelesen->e_as1 = $biodiesel->e_as1 ?? '-';
                        $pelesen->e_as2 = $biodiesel->e_as2 ?? '-';
                        $pelesen->e_as3 = $biodiesel->e_as3 ?? '-';
                        $pelesen->e_notel = $biodiesel->e_notel ?? '-';
                        $pelesen->e_nofax = $biodiesel->e_nofax ?? '-';
                        $pelesen->e_email = $biodiesel->e_email ?? '-';
                        $pelesen->e_npg = $biodiesel->e_npg ?? '-';
                        $pelesen->e_jpg = $biodiesel->e_jpg ?? '-';
                        $pelesen->kodpgw = $biodiesel->kodpgw ?? '-';
                        $pelesen->nosiri = $biodiesel->nosiri ?? '-';
                        $pelesen->e_npgtg = $biodiesel->e_npgtg ?? '-';
                        $pelesen->e_jpgtg = $biodiesel->e_jpgtg ?? '-';
                        $pelesen->e_asnegeri = $negerias->kod_negeri ?? '-';
                        $pelesen->e_asdaerah = $daerahas->kod_daerah ?? '-';
                        $pelesen->e_negeri = $negeriap->kod_negeri ?? '-';
                        $pelesen->e_daerah = $daerahap->kod_daerah ?? '-';
                        $pelesen->e_syktinduk = $biodiesel->e_sykt_induk ?? '-';
                        $pelesen->e_status = $biodiesel->e_status ?? '-';

                    $pelesen->save();

                    } else {
                        $pelesen = Pelesen::create([
                            'e_id' => $count_pelesen++,
                            'e_nl' => $biodiesel->e_nl ?? '-',
                            'e_np' => $biodiesel->e_np ?? '-',
                            'e_kat' => $biodiesel->e_kat ?? '-',
                            'e_ap1' => $biodiesel->e_ap1 ?? '-',
                            'e_ap2' => $biodiesel->e_ap2 ?? '-',
                            'e_ap3' => $biodiesel->e_ap3 ?? '-',
                            'e_as1' => $biodiesel->e_as1 ?? '-',
                            'e_as2' => $biodiesel->e_as2 ?? '-',
                            'e_as3' => $biodiesel->e_as3 ?? '-',
                            'e_notel' =>  $biodiesel->e_notel ?? '-',
                            'e_nofax' =>  $biodiesel->e_nofax ?? '-',
                            'e_email' =>  $biodiesel->e_email ?? '-',
                            'e_npg' =>  $biodiesel->e_npg ?? '-',
                            'e_jpg' =>  $biodiesel->e_jpg ?? '-',
                            'kodpgw' =>  $biodiesel->kodpgw ?? '-',
                            'nosiri' =>  $biodiesel->nosiri ?? '-',
                            'e_npgtg' =>  $biodiesel->e_npgtg ?? '-',
                            'e_jpgtg' =>  $biodiesel->e_jpgtg ?? '-',
                            'e_asnegeri' =>  $negerias->kod_negeri ?? '-',
                            'e_asdaerah' =>  $daerahas->kod_daerah ?? '-',
                            'e_negeri' =>  $negeriap->kod_negeri ?? '-',
                            'e_daerah' =>  $daerahap->kod_daerah ?? '-',
                            'e_syktinduk' =>  $biodiesel->e_sykt_induk ?? '-',
                            'e_status' =>  $biodiesel->e_status ?? '-',
                        ]);
                    }

                }

            }











    public function transfer_profilebulanans_to_pelesen()
    {
        // $reg_pelesens = RegPelesen::get(); // login

        $profilebulanans = ProfileBulanan::get();

        foreach ($profilebulanans as $profilebulanan) {
            // $pelesen = Pelesen::where('e_nl', $reg_pelesen->e_nl)->first();
            // $e_asdaerah = DB::connection('mysql2')->select("SELECT kod_daerah FROM  daerah where namadaerah = $kilang->e_asdaerah");
            // dd($e_asdaerah);


            $count = Pelesen::count();
            // dd($count);

            $daerah = Daerah::where('nama_daerah', $profilebulanan->daerah)->first();
            $negeri = Negeri::where('nama_negeri', $profilebulanan->negeri)->first();

            $daerah2 = Daerah::where('nama_daerah', $profilebulanan->daerah_premis)->first();
            $negeri2 = Negeri::where('nama_negeri', $profilebulanan->negeri_premis)->first();

            $user = Pelesen::where('e_nl', $profilebulanan->no_lesen)->first();
            if($profilebulanan->negeri_premis == '-Negeri-'){
                $profilebulanan->negeri_premis = null;
            }
            if($profilebulanan->negeri == '-Negeri-'){
                $profilebulanan->negeri = null;
            }
            // if($kilang->e_nl == '616115025000'){
            //     dd($kilang);
            // }
            if(!$user){
                $user = Pelesen::create([
                    'e_id' => $count++,
                    'e_nl' => $profilebulanan->no_lesen ?? '-',
                    'e_np' => $profilebulanan->n_premis ?? '-',
                    'e_ap1' => $profilebulanan->alamat_premis ?? '-',
                    'e_ap2' => $profilebulanan->daerah_premis ?? '-',
                    'e_ap3' => $profilebulanan->negeri_premis ?? '-',
                    'e_as1' => $profilebulanan->alamat_surat ?? '-',
                    'e_as2' => $profilebulanan->daerah ?? '-',
                    'e_as3' => $profilebulanan->negeri ?? '-',
                    'e_notel' =>  $profilebulanan->no_tel ?? '-',
                    'e_nofax' =>  $profilebulanan->no_faks ?? '-',
                    'e_email' =>  '',
                    'e_npg' =>  $profilebulanan->n_pgw_m ?? '-',
                    'e_jpg' =>  $profilebulanan->j_pgw_m ?? '-',
                    'kodpgw' =>  '',
                    'nosiri' =>  '',
                    'e_npgtg' =>  $profilebulanan->n_pgw_b ?? '-',
                    'e_jpgtg' =>  $profilebulanan->j_pgw_b ?? '-',
                    'e_asnegeri' =>  $negeri2->kod_negeri ?? '-',
                    'e_asdaerah' =>  $daerah2->kod_daerah ?? '-',
                    'e_negeri' =>  $negeri->kod_negeri ?? '-',
                    'e_daerah' =>  $daerah->kod_daerah ?? '-',
                    'e_syktinduk' =>  $profilebulanan->srkt_induk ?? '-',
                    'e_status' => '',
                ]);
            }else{

                    $user->e_nl = $profilebulanan->no_lesen ?? '-';
                    $user->e_np = $profilebulanan->n_premis ?? '-';
                    $user->e_ap1 = $profilebulanan->alamat_premis ?? '-';
                    $user->e_ap2 = $profilebulanan->daerah_premis ?? '-';
                    $user->e_ap3 = $profilebulanan->negeri_premis ?? '-';
                    $user->e_as1 = $profilebulanan->alamat_surat ?? '-';
                    $user->e_as2 = $profilebulanan->daerah ?? '-';
                    $user->e_as3 = $profilebulanan->negeri ?? '-';
                    $user->e_notel = $profilebulanan->no_tel ?? '-';
                    $user->e_nofax = $profilebulanan->no_faks ?? '-';
                    $user->e_email = '';
                    $user->e_npg = $profilebulanan->n_pgw_m ?? '-';
                    $user->e_jpg = $profilebulanan->j_pgw_m ?? '-';
                    $user->kodpgw = '';
                    $user->nosiri = '';
                    $user->e_npgtg = $profilebulanan->n_pgw_b ?? '-';
                    $user->e_jpgtg = $profilebulanan->j_pgw_b ?? '-';
                    $user->e_asnegeri = $negeri2->kod_negeri ?? '-';
                    $user->e_asdaerah = $daerah2->kod_daerah ?? '-';
                    $user->e_negeri = $negeri->kod_negeri ?? '-';
                    $user->e_daerah = $daerah->kod_daerah ?? '-';
                    $user->e_syktinduk = $profilebulanan->srkt_induk ?? '-';
                    $user->e_status = '';

                $user->save();
            }

        }
    }

    public function transfer_hebahansa_to_ekilang()
    {

        $hebahans = DB::connection('mysql2')->select("SELECT * FROM  hebahan_stok_akhir");


        foreach ($hebahans as $hebahan) {

            $stok = HebahanStokAkhir::create([
                'tahun' => $hebahan->tahun ?? '0',
                'bulan' => $hebahan->bulan ?? '0',
                'cpo_sm' => $hebahan->cpo_sm ?? '0',
                'ppo_sm' => $hebahan->ppo_sm ?? '0',
                'cpko_sm' =>  $hebahan->cpko_sm ?? '0',
                'ppko_sm' =>  $hebahan->ppko_sm ?? '0',
                'cpo_sbh' =>  $hebahan->cpo_sbh ?? '0',
                'ppo_sbh' =>  $hebahan->ppo_sbh ?? '0',
                'cpko_sbh' =>  $hebahan->cpko_sbh ?? '0',
                'ppko_sbh' =>  $hebahan->ppko_sbh ?? '0',
                'cpo_srwk' =>  $hebahan->cpo_srwk ?? '0',
                'ppo_srwk' =>  $hebahan->ppo_srwk ?? '0',
                'cpko_srwk' =>  $hebahan->cpko_srwk ?? '0',
                'ppko_srwk' =>  $hebahan->ppko_srwk ?? '0',
            ]);


        }
    }

    public function transfer_reguser_to_users()
    {
        $reg_users = RegUser::get();

        foreach ($reg_users as $reg_user) {
            $user = User::where('username', $reg_user->e_userid)->first();

            $e_kat = array($reg_user->e_kat);

            if($user){
                if(!$user->sub_cat){
                    $user->sub_cat = json_encode($e_kat);
                    $user->save();
                }
            }
        }
    }

    public function transfer_cryptpass()
    {

        // $biodiesels = DB::connection('mysql2')->select("SELECT * FROM  login_admin");

        $reg_pelesens = User::get();

        foreach ($reg_pelesens as $rp) {
            // $user = User::where('username', $biodiesel->e_nl)->whereNull('crypted_pass')->first();
            $pelesen = HPelesen::where('e_nl', $rp->username)->where('e_kat', null)->first();
            // dd($pelesen);

            if($pelesen){
                // if(!$user->sub_cat){
                    $pelesen->e_kat = $rp->category;
                    $pelesen->save();
                // }
            }
            // if($user){
            //     // if(!$user->sub_cat){
            //         $user->crypted_pass = Crypt::encryptString($biodiesel->password);
            //         $user->save();
            //     // }
            // }
        }

    }
}
