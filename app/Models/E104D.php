<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E104D extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e104_d'; //penyata bulanan terkini - kilang oleokimia

    protected $fillable = [
        'e104_d1',
        'e104_reg',
        'e104_d3',
        'e104_d4',
        'e104_d5',
        'e104_d6',
        'e104_d7',
        'e104_d8',
        'e104_d9',
        'nokontrak',
        'port',
        'portdest',
        'matawang',
        'nilai',
        'nolesen_sykt',
        'nama_sykt',
        'nama_produk',
        'nama_pelabuhan',
        'kenderaan',
        'kenderaan_nodaftar',
        'nama_destport',
        'nama_destnegara',
        'nama_sykt1',
        'mpobq_bungkusan',
        'mpobq_nilai_2',

    ];

}
