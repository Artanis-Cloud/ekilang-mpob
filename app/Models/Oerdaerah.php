<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oerdaerah extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'oerdaerah'; //table stat admin, stat homepage

    protected $fillable = [
        'oerdaerah_id',
        'tahun',
        'bulan',
        'negeri',
        'daerah',
        'oer_cpo',
        'oer_cpko',
        'ker_pk',
        'ker_pkc',
        'cpo_proc',
        'ffb_proc',
    ];
}
