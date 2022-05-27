<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

        return $this->hasOne(Pelesen::class, 'e_nl', 'e_nl');
    }
}
