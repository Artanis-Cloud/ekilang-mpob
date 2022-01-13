<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E07Transhipment extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e07_transhipment'; //penyata bulanan terkini - pusat simpanan

    protected $fillable = [
        'e07t_id',
        'e07t_idborang',
        'e07t_produk',
        'e07t_stokawal',
        'e07t_terima',
        'e07t_edaran',
        'e07t_eksport',
        'e07t_pelarasan',
        'e07t_stokakhir',
    ];
}
