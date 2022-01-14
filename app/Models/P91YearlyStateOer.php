<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91YearlyStateOer extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_yearly_state_oer';

    protected $fillable = [
        'tahun',
        'negeri',
        'sum_cpo_prod',
        'sum_ffb_proc',
        'oer_cpo',
    ];
}
