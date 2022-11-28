<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegUser extends Model
{
    use HasFactory;

    protected $table = 'reg_user';
    public $timestamps = false;

    protected $fillable = [
        'e_userid',
        'e_kat',
        'e_pwd',
        'e_priv',
    ];
}
