<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HBioInit extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h_bio_inits'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'ebio_nobatch';
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = [

    'ebio_nobatch',
	'ebio_nl',
    'ebio_bln',
    'ebio_thn',
    'ebio_flg',
    'ebio_sdate',
    'ebio_ddate',
    'ebio_npg',
    'ebio_jpg'
        // 'ebio_c13',

    ];

    // public function ebioinit(){
    //     return $this->hasOne(EBioInit::class,'ebio_reg', 'ebio_reg');
    // }

    public function hbiocc(){
        return $this->hasOne(hbiocc::class,'ebio_nobatch', 'ebio_nobatch');
    }

    // public function produk(){
    //     return $this->hasOne(Produk::class,'prodid','ebio_c3');
    // }
    public function pelesen()
    {

        return $this->hasOne(Pelesen::class, 'e_nl', 'ebio_nl');
    }

    // public function negeri()
    // {

    //     return $this->hasOne(Negeri::class, 'e_nl', 'ebio_nl');
    // }
}
