<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaerahAsal extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'daerah_asal';
    public $timestamps = false;


    protected $fillable = [
        'kod_negeri',
        'kod_sbsw',
        'kod_daerah',
        'nama_daerah',
        'nama_daesbsw',
    ];
}
