<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBioC extends Model
{
    use HasFactory;

      /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e_bio_c_s'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
    protected $primaryKey = 'ebio_c1';
    public $timestamps = false;

    protected $fillable = [
        'ebio_c1',
        'ebio_reg',
        'ebio_c3',
        'ebio_c4',
        'ebio_c5',
        'ebio_c6',
        'ebio_c7',
        'ebio_c8',

    ];
}
