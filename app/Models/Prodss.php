<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodss extends Model
{
    use HasFactory;
    protected $table = 'prodss';

    protected $fillable = [
        'prodss_id',
        'tahun',
        'bulan',
        'mill_millhrs',
        'ffb_millcapacity',
        'mill_utilrate',
        'crusher_crshrs',
        'pk_crscapacity',
        'crusher_utilrate',
        'refcap',
        'refutilrate',
        'oleocap',
        'oleoutilrate',
    ];
}
