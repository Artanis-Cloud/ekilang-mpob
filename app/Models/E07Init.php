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
    protected $primaryKey = 'e07_reg';
    public $timestamps = false;

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

    public function pelesen()
    {

        return $this->hasOne(Pelesen::class, 'e_nl', 'e07_nl');
    }
    public function regpelesen()
    {

        return $this->hasOne(RegPelesen::class, 'e_nl', 'e07_nl');
    }
}
