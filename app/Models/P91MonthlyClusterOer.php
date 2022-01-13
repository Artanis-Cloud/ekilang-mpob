<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91MonthlyClusterOer extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_monthly_cluster_oer';

    protected $fillable = [

    'tahun',
    'bulan',
    'kawasan',
    'cluster',
    'sum_cpo_prod',
    'sum_ffb_proc',
    'oer_cpo',
];
}
