<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P101MonthlyState extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p101_monthly_state';

    protected $fillable = [
        'id_mth',
        'tahun',
        'bulan',
        'negeri',
        'prodid',
        'produk_kump',
        'prodcat',
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
