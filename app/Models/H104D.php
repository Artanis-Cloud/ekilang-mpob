<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H104D extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h104_d'; //penyata arkib - kilang oleokimia
    protected $primaryKey = 'e104_d1';
    public $timestamps = false;

    protected $fillable = [
        'e104_d1',
        'e104_nobatch',
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

    public function h104init()
    {

        return $this->hasOne(H104Init::class, 'e104_nobatch', 'e104_nobatch');
    }

    public function produk()
    {
        return $this->hasOne(Produk::class, 'prodid', 'e104_d4');
    }

    public function negara()
    {
        return $this->hasOne(Negara::class, 'kodnegara', 'e104_d9');
    }
}
