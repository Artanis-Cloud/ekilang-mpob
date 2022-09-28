<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HBioC extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h_bio_c_s'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'ebio_c1';
    public $timestamps = false;

    protected $fillable = [

    'ebio_c1',
	'ebio_nobatch',
    'ebio_c3',
    'ebio_c4',
    'ebio_c5',
    'ebio_c6',
    'ebio_c7',
    'ebio_c8',
    'ebio_c9',
    'ebio_c10',
    'ebio_sykt',
    'ebio_jumlah',
        // 'ebio_c13',

    ];

    // public function ebioinit(){
    //     return $this->hasOne(EBioInit::class,'ebio_reg', 'ebio_reg');
    // }

    // public function ebiocc(){
    //     return $this->hasMany(EBioCC::class,'ebio_cc2', 'ebio_c3');
    // }

    public function produk(){
        return $this->hasOne(Produk::class,'prodid','ebio_c3');
    }
}
