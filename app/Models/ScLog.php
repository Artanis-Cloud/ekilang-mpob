<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScLog extends Model
{
    use HasFactory;

    protected $table = 'sc_log';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'inserted_date',
        'username',
        'application',
        'creator',
        'ip_user',
        'action',
        'description',
    ];
}
