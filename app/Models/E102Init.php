<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E102Init extends Model
{
    use HasFactory;

    /**
     *
     * The table associated with the model
     *
     * @var string
     *
     */
    protected $table = 'e102_init'; //penyata bulanan terkini - kilang isirung (initialize - proses 3)
    protected $primaryKey = 'e102_reg';
    public $timestamps = false;
    protected $fillable = [
        'e102_reg',
        'e102_nl',
        'e102_bln',
        'e102_thn',
        'e102_flg',
        'e102_sdate',
        'e102_ddate',
        'e102_aa1',
        'e102_aa2',
        'e102_aa3',
        'e102_ab1',
        'e102_ab2',
        'e102_ab3',
        'e102_ac1',
        'e102_ac2',
        'e102_ac3',
        'e102_ad1',
        'e102_ad2',
        'e102_ad3',
        'e102_ae1',
        'e102_af2',
        'e102_af3',
        'e102_ag1',
        'e102_ag2',
        'e102_ag3',
        'e102_ah1',
        'e102_ah2',
        'e102_ah3',
        'e102_ai1',
        'e102_ai2',
        'e102_ai3',
        'e102_aj1',
        'e102_aj2',
        'e102_aj3',
        'e102_ak1',
        'e102_ak2',
        'e102_ak3',
        'e102_al1',
        'e102_al2',
        'e102_al3',
        'e102_al4',
        'e102_npg',
        'e102_jpg',
        'e102_flagcetak',
        'e102_ae3',

    ];

    public function pelesen()
    {

        return $this->hasOne(Pelesen::class, 'e_nl', 'e102_nl');
    }
}
