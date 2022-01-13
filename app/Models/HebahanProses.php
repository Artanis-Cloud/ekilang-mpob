<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HebahanProses extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'hebahan_proses';

    protected $fillable = [
        'id',
        'tahun',
        'bulan',
        'cpo_msia',
        'ppo_msia',
        'cpko_msia',
        'ppko_msia',
     

    ];
}
