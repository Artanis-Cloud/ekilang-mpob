<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatUser extends Model
{
    use HasFactory;

    protected $table = 'stat_user';
    public $timestamps = false;

    protected $fillable = [
        'userid',
        'userpwd',
        'user_kat',
        'user_priv',
        'user_name',
    ];
}
