<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102 extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102';
    public $timestamps = false;


    protected $fillable = [
        'noid',
        'nolesen',
        'tahun',
        'bulan',
        'pk_stkawal_premis',
        'cpko_stkawal_premis',
        'pkc_stkawal_premis',
        'pk_stkawal_ps',
        'cpko_stkawal_ps',
        'pkc_stkawal_ps',
        'pk_belian',
        'cpko_belian',
        'pkc_belian',
        'pk_import',
        'cpko_import',
        'pkc_import',
        'pk_proses',
        'cpko_pengeluaran',
        'pkc_pengeluaran',
        'pk_jualan',
        'cpko_jualan',
        'pkc_jualan',
        'pk_hantar',
        'cpko_hantar',
        'pkc_hantar',
        'pk_eksport',
        'cpko_eksport',
        'pkc_eksport',
        'pk_stkakhir_premis',
        'cpko_stkakhir_premis',
        'pkc_stkakhir_premis',
        'pk_stkakhir_ps',
        'cpko_stkakhir_ps',
        'pkc_stkakhir_ps',
        'cpko_oer',
        'pkc_ker',
        'pk_jumjam',
        'pk_utilrate',
        'pk_capacity',
        'crs_capacity',

    ];
}
