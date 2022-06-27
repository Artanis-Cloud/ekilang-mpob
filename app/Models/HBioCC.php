<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HBioCC extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'h_bio_cc'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'ebio_cc1';
    public $timestamps = false;

    protected $fillable = [

    'ebio_cc1',
	'ebio_nobatch',
    'ebio_cc2',
    'ebio_cc3',
    'ebio_cc4',
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
