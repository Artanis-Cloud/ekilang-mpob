<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyarikatPembeli extends Model
{
    use HasFactory;

    protected $table = 'syarikat_pembeli';
    public $timestamps = false;


    protected $fillable = [
        'id',
        'pembeli',

    ];
}
