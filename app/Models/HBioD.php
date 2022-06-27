<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HBioD extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h_bio_d_s'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'ebio_d1';
    public $timestamps = false;

    protected $fillable = [

    'ebio_d1',
	'ebio_nobatch',
    'ebio_d3',
    'ebio_d4',
    'ebio_d5',
    'ebio_d6',
    'ebio_d7',
    'ebio_d8',
    'ebio_d9',
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
    'mbopq_nilai_2',
        // 'ebio_c13',

    ];

    // public function ebioinit(){
    //     return $this->hasOne(EBioInit::class,'ebio_reg', 'ebio_reg');
    // }

    // public function ebiocc(){
    //     return $this->hasMany(EBioCC::class,'ebio_cc2', 'ebio_c3');
    // }

    // public function produk(){
    //     return $this->hasOne(Produk::class,'prodid','ebio_c3');
    // }
}
