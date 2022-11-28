<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104YearlyPelesenUtilrate extends Model
{
    use HasFactory;
    protected $table = 'p104_yearly_pelesen_utilrate';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'nolesen',
        'namapremis',
        'negeri',
        'daerah',
        'kawasan',
        'syktinduk',
        'syktgroup',
        'thnoperasi',
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
