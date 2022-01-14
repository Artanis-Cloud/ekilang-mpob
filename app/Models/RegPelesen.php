<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegPelesen extends Model
{
    use HasFactory;

    protected $table = 'reg_pelesen';

    protected $fillable = [
        'e_id',
        'e_nl',
        'e_kat',
        'e_pwd',
        'kodpgw',
        'nosiri',
        'e_status',
        'e_stock',
        'directory',
    ];
}
