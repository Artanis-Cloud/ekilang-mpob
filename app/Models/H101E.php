<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H101E extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h101_e'; //penyata arkib (history) - kilang penapis
    public $timestamps = false;

    protected $fillable = [
        'e101_e1',
        'e101_nobatch',
        'e101_e3',
        'e101_e4',
        'e101_e5',
        'e101_e6',
        'e101_e7',
        'e101_e8',
        'e101_e9',
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
