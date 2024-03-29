<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P101YearlyRegionUtilrate extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p101_yearly_region_utilrate';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'kawasan',
        'sum_cpo',
        'sum_cpko',
        'sum_refkap',
        'rate_cpocpko',
        'rate_cpo',
        'rate_cpko',

    ];
}
