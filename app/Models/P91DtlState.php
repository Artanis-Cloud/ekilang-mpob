<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P91DtlState extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p91_dtl_state';
    public $timestamps = false;

    protected $fillable = [
        'tahun',
        'bulan',
        'negeri',
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
