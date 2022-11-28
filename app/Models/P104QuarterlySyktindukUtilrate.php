<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104QuarterlySyktindukUtilrate extends Model
{
    use HasFactory;
    protected $table = 'p104_quarterly_syktinduk_utilrate';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'syktinduk',
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
