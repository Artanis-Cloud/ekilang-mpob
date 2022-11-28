<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104 extends Model
{
    use HasFactory;
    protected $table = 'p104';
    public $timestamps = false;

    protected $fillable = [
        'noid',
        'nolesen',
        'tahun',
        'bulan',
        'prodid',
        'produk_kump',
        'prodcat',
        'prodsubcat',
        'stkawal_premis',
        'stkawal_ps',
        'belian',
        'import',
        'pengeluaran',
        'guna_proses',
        'jual_edar',
        'eksport',
        'stkakhir_premis',
        'stkakhir_ps',
    ];
}
