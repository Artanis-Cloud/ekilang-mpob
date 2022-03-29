<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E101E extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e101_e'; //penyata bulanan terkini - kilang penapis
    protected $primaryKey = 'e101_e1';
    public $timestamps = false;


    protected $fillable = [
        'e101_e1',
        'e101_reg',
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


    public function e101init()
    {

        return $this->hasOne(E101Init::class, 'e101_reg', 'e101_reg');
    }

    public function produk()
    {
        return $this->hasOne(Produk::class, 'prodid', 'e101_e4');
    }

    public function negara()
    {
        return $this->hasMany(Negara::class, 'kodnegara', 'e101_e9');
    }
}
