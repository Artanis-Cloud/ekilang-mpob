<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E102c extends Model
{
    use HasFactory;


    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e102c'; //Penyata bulanan terkini - kilang isirung
    protected $primaryKey = 'e102_c1';
    public $timestamps = false;
    protected $fillable = [
        'e102_c1',
        'e102_c2',
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

    public function e102init()
    {

        return $this->hasOne(E102Init::class, 'e102_reg', 'e102_c2');
    }
}
