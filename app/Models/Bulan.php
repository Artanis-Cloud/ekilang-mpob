<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'bulan'; //bulan
    public $timestamps = false;


    protected $fillable = [
        'bulan',
        'nama_bulan',
    ];
}
