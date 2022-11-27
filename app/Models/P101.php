<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P101 extends Model
{
    use HasFactory;


/**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p101';
    public $timestamps = false;

    protected $fillable = [
        'noid',
        'nolesen',
        'tahun',
        'bulan',
        'prodid',
        'produk_kump',
        'prodcat',
        'produk_ingredient',
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
