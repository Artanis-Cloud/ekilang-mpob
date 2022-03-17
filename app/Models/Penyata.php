<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyata extends Model
{
    use HasFactory;
    protected $table = 'penyatas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'lesen',
        'tahun',
        'bulan',
        'menu',
        'penyata',
        'kod_produk',
        'kuantiti',
        'id_penyata',
        'pembekal',
        'noborang',
        'tarikh',
        'nilai',
        'namapengeksport',
        'negara',
    ];
}
