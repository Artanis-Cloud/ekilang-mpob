<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodmsia extends Model
{
    use HasFactory;
    protected $table = 'prodmsia';
    public $timestamps = false;

    protected $fillable = [
        'prodmsia_id',
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
