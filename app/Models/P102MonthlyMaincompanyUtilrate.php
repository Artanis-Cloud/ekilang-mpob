<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P102MonthlyMaincompanyUtilrate extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_monthly_maincompany_utilrate';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'syktinduk',
        'pk_proc',
        'cpko_prod',
        'pkc_prod',
        'cpko_oer_cal',
        'pk_ker_cal',
        'crs_capacity',
        'crs_hours',
        'crs_utilrate',

    ];
}
