<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E07Init extends Model
{
    use HasFactory;

     /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e07_init'; //penyata bulanan terkini - pusat simpanan (initialize - proses 3)

    protected $fillable = [
        'e07_reg',
        'e07_nl',
        'e07_bln',
        'e07_thn',
        'e07_flg',
        'e07_sdate',
        'e07_ddate',
        'e07_npg',
        'e07_jpg',
        'e07_flagcetak',
    ];
}
