<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104MonthlyState extends Model
{
    use HasFactory;
    protected $table = 'p104_monthly_state';
    public $timestamps = false;

    protected $fillable = [
        'id_mth',
        'tahun',
        'bulan',
        'negeri',
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
