<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104MonthlyStateUtilrate extends Model
{
    use HasFactory;
    protected $table = 'p104_monthly_state_utilrate';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
        'sum_cpo',
        'sum_cpko',
        'sum_ppo',
        'sum_ppko',
        'sum_oleokap',
        'rate_cpocpko',
        'rate_cpo',
        'rate_cpko',
        'rate_ppo',
        'rate_ppko',
        'rate_po',
    ];
}
