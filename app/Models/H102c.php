<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H102c extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h102c'; //penyata arkib (history) - kilang isirung
    protected $primaryKey = 'e102_c1';
    public $timestamps = false;
    protected $fillable = [
        'e102_c1',
        'e102_nobatch',
        'e102_c3',
        'e102_c4',
        'e102_c5',
        'e102_c6',
        'e102_c7',
        'e102_c8',
        'e102_c9',
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


    public function h102init()
    {

        return $this->hasMany(H102Init::class, 'e102_nobatch', 'e102_nobatch');
    }
    public function produk()
    {

        return $this->hasMany(Produk::class, 'prodid', 'e102_c4');
    }
    public function negara()
    {

        return $this->hasMany(Negara::class, 'kodnegara', 'e102_c9');
    }
}
