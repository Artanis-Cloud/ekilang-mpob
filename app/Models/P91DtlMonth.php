<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91DtlMonth extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_dtl_month';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'ffb_sstock',
        'cpo_sstock',
        'ffb_rec',
        'cpo_rec',
        'ffb_proc',
        'cpo_proc',
        'ffb_estock',
        'cpo_estock',
        'oer',
    ];
}
