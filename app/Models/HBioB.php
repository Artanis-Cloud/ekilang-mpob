<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HBioB extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h_bio_b_s'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'ebio_b1';
    public $timestamps = false;

    protected $fillable = [

    'ebio_b1',
	'ebio_nobatch',
    'ebio_b3',
    'ebio_b4',
    'ebio_b5',
    'ebio_b6',
    'ebio_b7',
    'ebio_b8',
    'ebio_b9',
    'ebio_b10',
    'ebio_b11',
    'ebio_b13',
        // 'ebio_c13',

    ];

    // public function ebioinit(){
    //     return $this->hasOne(EBioInit::class,'ebio_reg', 'ebio_reg');
    // }

    // public function ebiocc(){
    //     return $this->hasMany(EBioCC::class,'ebio_cc2', 'ebio_c3');
    // }

    // public function produk(){
    //     return $this->hasMany(Produk::class,'prodid','ebio_b4');
    // }
}
