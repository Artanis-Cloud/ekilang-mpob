<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P101Master extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p101_master';

    protected $fillable = [
        'noid',
        'nolesen',
        'tahun',
        'bulan',
        'harioperasi',
        'cap_ref',
        'cap_frac',
        'cpo_proc',
        'cpko_proc',
        'refkap',
        'refutilrate',
        'statusaktif',
        'refutilratecpo',
        'refutilrateckpo',
        'ppo_proc',
        'ppko_proc',
        'refutilrateppo',
        'refutilrateppko',
    ];
}
