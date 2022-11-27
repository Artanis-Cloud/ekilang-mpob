<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oerpelesen extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'oerpelesen';
    public $timestamps = false;

    protected $fillable = [
        'oerind_id',
        'nolesen',
        'namakilang',
        'negeri',
        'daerah',
        'tahun',
        'bulan',
        'oer_cpo',
        'ker_pk',
        'cpo_proc',
        'ffb_proc',
    ];
}
