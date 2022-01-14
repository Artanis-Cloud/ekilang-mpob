<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P101D extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p101_d';

    protected $fillable = [
        'id_p101d',
        'nolesen',
        'tahun',
        'bulan',
        'jenis_aktiviti',
        'beli_daripada',
        'cpo',
        'ppo',
        'cpko',
        'ppko',
    ];
}
