<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91YearlyClusterOer extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_yearly_cluster_oer';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'kawasan',
        'cluster',
        'sum_cpo_prod',
        'sum_ffb_proc',
        'oer_cpo',
    ];
}
