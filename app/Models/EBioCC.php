<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBioCC extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e_bio_cc'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'ebio_cc1';
    public $timestamps = false;

    protected $fillable = [
        'ebio_cc1',
        'ebio_reg',
        'ebio_cc2',
        'ebio_cc3',
        'ebio_cc4',
        // 'ebio_c13',

    ];

    public function ebioinit(){
        return $this->hasOne(EBioInit::class,'ebio_reg', 'ebio_reg');
    }


}
