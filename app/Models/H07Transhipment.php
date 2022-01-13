<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H07Transhipment extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h07_transhipment';

    protected $fillable = [
        'e07t_id',
        'e07t_nobatch',
        'e07t_produk',
        'e07t_stokawal',
        'e07t_terima',
        'e07t_edaran',
        'e07t_eksport',
        'e07t_pelarasan',
        'e07t_stokakhir',

    ];
}
