<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E07Btranshipment extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e07_btranshipment'; //penyata bulanan terkini - pusat simpanan

    protected $fillable = [
        'e07bt_id',
        'e07bt_idborang',
        'e07bt_produk',
        'e07bt_stokawal',
        'e07bt_terima',
        'e07bt_import',
        'e07bt_edaran',
        'e07bt_eksport',
        'e07bt_pelarasan',
        'e07bt_stokakhir',
    ];
}
