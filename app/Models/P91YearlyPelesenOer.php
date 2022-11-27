<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91YearlyPelesenOer extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_yearly_pelesen_oer';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'no_lesen',
        'namapremis',
        'negeri',
        'daerah',
        'kawasan',
        'cluster',
        'katkilang',
        'sum_cpo_prod',
        'sum_ffb_proc',
        'oer_cpo',
];
}
