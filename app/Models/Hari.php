<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'haris'; //penyata arkib (history) - kilang penapis
    protected $primaryKey = 'lesen';
    public $timestamps = false;

    protected $fillable = [
        'lesen',
        'tahun',
        'bulan',
        'hari_operasi',
        'kapasiti',

    ];

}
