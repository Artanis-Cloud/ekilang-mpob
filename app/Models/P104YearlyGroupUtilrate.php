<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P104YearlyGroupUtilrate extends Model
{
    use HasFactory;
    protected $table = 'p104_yearly_group_utilrate';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'syktgroup',
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
