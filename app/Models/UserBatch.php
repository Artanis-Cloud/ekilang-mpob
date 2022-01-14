<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBatch extends Model
{
    use HasFactory;

    protected $table = 'user_batch';

    protected $fillable = [
        'userid',
        'tahun',
        'bulan',
        'bil',

    ];
}
