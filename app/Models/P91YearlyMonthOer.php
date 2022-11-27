<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91YearlyMonthOer extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_yearly_month_oer';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'sum_cpo_prod',
        'sum_ffb_proc',
        'oer_cpo',


    ];
}
