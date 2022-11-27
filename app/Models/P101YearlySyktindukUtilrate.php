<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P101YearlySyktindukUtilrate extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p101_yearly_syktinduk_utilrate';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'syktinduk',
        'sum_cpo',
        'sum_cpko',
        'sum_refkap',
        'rate_cpocpko',
        'rate_cpo',
        'rate_cpko',

    ];
}
