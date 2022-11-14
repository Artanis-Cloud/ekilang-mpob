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
    protected $table = 'h_bio_cc';
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


    public function hbioinit(){
        return $this->hasOne(HBioInit::class,'ebio_nobatch', 'ebio_nobatch');
    }
    public function hbioc(){
        return $this->hasOne(HBioC::class,'ebio_cc3', 'ebio_cc2');
    }
    public function syarikat(){
        return $this->hasOne(SyarikatPembeli::class,'id', 'ebio_cc3');
    }

    // public function daerah(){
    //     return $this->hasOne(SyarikatPembeli::class,'id', 'ebio_cc3');
    // }
}
