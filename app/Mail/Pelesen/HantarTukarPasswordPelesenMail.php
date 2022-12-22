<?php

namespace App\Mail\Pelesen;

use App\Models\RegPelesen;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DB;

class HantarTukarPasswordPelesenMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pelesen, $password)
    {
        $this->pelesen = $pelesen;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pelesen = $this->pelesen;
        $password = $this->password;

        $route = route('login');
        // $reg_pelesen = RegPelesen::where('e_nl', $pelesen->username)->first();
        $reg_pelesen = User::where('username', $pelesen->username)->first();
        if($reg_pelesen->category == 'PL91'){
            $route = route('buah.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PL101'){
            $route = route('penapis.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PL102'){
            $route = route('isirung.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PL104'){
            $route = route('oleo.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PL111'){
            $route = route('pusatsimpan.tukarpassword');
        }
        elseif($reg_pelesen->category == 'PLBIO'){
            $route = route('bio.tukarpassword');
        } elseif($reg_pelesen->category == 'admin'){
            $route = route('admin.tukarpassword');
        }

        // $emails = str_replace('', ',', $this->pelesen->email);
        $to = explode(',', $this->pelesen->email);
        // dd($to[0]);
        // $email = DB::select("SELECT STRING_SPLIT (email, ',')  from users");


        // $reg_pelesen = User::where('username', $pelesen->username)->first();
        // if($reg_pelesen->category == 'PL91'){
        //     $route = route('buah.tukarpassword');
        // }
        // elseif($reg_pelesen->category == 'PL101'){
        //     $route = route('penapis.tukarpassword');
        // }
        // elseif($reg_pelesen->category == 'PL102'){
        //     $route = route('isirung.tukarpassword');
        // }
        // elseif($reg_pelesen->category == 'PL104'){
        //     $route = route('oleo.tukarpassword');
        // }
        // elseif($reg_pelesen->category == 'PL111'){
        //     $route = route('pusatsimpan.tukarpassword');
        // }
        // elseif($reg_pelesen->category == 'PLBIO'){
        //     $route = route('bio.tukarpassword');
        // }
        // elseif($reg_pelesen->category == 'admin'){
        //     $route = route('admin.tukarpassword');
        // }

        // if ($this->pelesen->email == NULL || $this->pelesen->email == '' || $this->pelesen->email='-') {
        //     return redirect()->back()->with('error', 'Pengguna tiada emel. Sila hubungi administator untuk penetapan emel pengguna');

        // } else {
            $email = $to[0];
            return $this->to($email, $this->pelesen->name)
        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
        ->subject('Tukar Kata Laluan '. $this->pelesen->username)
        ->view('email.pelesen.newpass', compact('pelesen', 'password', 'route'));    }
        }



