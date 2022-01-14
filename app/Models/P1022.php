<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P1022 extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'p102_2';

    protected $fillable = [
        'noid',
        'nolesen',
        'tahun',
        'bulan',
        'produk',
        'jenis_aktiviti',
        'jenis_kilang',
        'kuantiti',

    ];
}
