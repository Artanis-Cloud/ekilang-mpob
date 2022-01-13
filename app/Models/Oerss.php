<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oerss extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'oerss';

    protected $fillable = [
        'oerss_id',
        'tahun',
        'bulan',
        'oer_cpo',
        'oer_cpko',
        'ker_pk',
        'ker_pkc',
        'cpo_proc',
        'ffb_proc',
    ];
}
