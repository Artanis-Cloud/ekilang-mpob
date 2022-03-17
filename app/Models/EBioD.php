<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBioD extends Model
{
    use HasFactory;

       /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e_bio_d_s'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'ebio_d1';
    public $timestamps = false;

    protected $fillable = [
        'ebio_d1',
        'ebio_reg',
        'ebio_d3',
        'ebio_d4',
        'ebio_d5',
        'ebio_d6',
        'ebio_d7',
        'ebio_d8',
        'ebio_d9',
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
