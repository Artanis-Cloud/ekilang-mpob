<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104QuarterlyDistrictUtilrate extends Model
{
    use HasFactory;
    protected $table = 'p104_quarterly_district_utilrate';

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
        'daerah',
        'sum_cpo',
        'sum_cpko',
        'sum_oleokap',
        'rate_cpocpko',
        'rate_cpo',
        'rate_cpko',
        'rate_ppo',
        'rate_ppko',
        'rate_po',
    ];
}
