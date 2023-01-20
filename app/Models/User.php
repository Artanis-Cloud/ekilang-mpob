<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Http\Client\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'crypted_pass',
        'username',
        'category',
        'sub_category',
        'sub_cat',
        'kod_pegawai',
        'no_siri',
        'status',
        'stock',
        'directory',
        'priv',
        'role',
        'map_flg',
        'map_sdate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function pelesen()
    {

        return $this->hasOne(Pelesen::class, 'e_nl', 'username');
    }

    public function audit_trail()
    {
        return $this->hasMany(AuditTrail::class);
    }

    public function log($message)
    {
        $message = ucwords($message);
        // $dt = new DateTime();
        // $tz = new DateTimeZone('Asia/Kuala_Lumpur');
        // $dt-> setTimezone($tz);
        // $dt-> format('H:i:s');

        $data = [
                'username' => $this->username,
                'activity' => " $message",
                'date' =>Carbon::parse(now())->toDateString(),
                'ip_address' => request()->ip()
            ];

        AuditTrail::query()->create($data);
    }


}
//    public function log($message)
//     {
//         $message = ucwords($message);
//         $data = [
//                 'username' => $this->username,
//                 'activity' => "{$this->username} $message",
//                 'date' => Carbon::parse(now()) ->toDateString(),
//                 'ip_address' => request()->ip()
//             ];

//         AuditTrail::query()->create($data);
//     }
